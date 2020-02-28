<?php

class User {
	
	var $data; // User session data is stored here
	
	function User() {
		// Setup session data
		if (!isset($_SESSION['user'])) {
            if (isset($_COOKIE['userdata'])){
                $this->data = json_decode($_COOKIE['userdata'], true);
                $_SESSION['user'] = $this->data;
                $this->data['permissions'] = array();
            } else {
                $this->data = array();
                $this->data['user_id'] = 0;
                $this->data['permissions'] = array();

		// Grab public user permissions
				$query = new Query(sprintf("SELECT action_type FROM %spermissions WHERE public_users=TRUE", TABLE_PREFIX));
				while ($row = $query->fetch_row()) {
					$this->data['permissions'][] = $row['action_type'];
				}
                

                $_SESSION['user'] =& $this->data; 
            }
			
			if (USER_DEBUG) {
				trigger_error("Creating new User object... not logged in.", E_USER_NOTICE);
				print_r($_SESSION);
				echo "<br />";
			}
		} else {
			$this->data =& $_SESSION['user'];
			if (USER_DEBUG) {
				$user_id = $this->data['user_id'];
				trigger_error("Creating new User object... logged in as user $user_id.", E_USER_NOTICE);
				print_r($_SESSION);
				echo "<br />";
			}
		}
        
		
		// Process user login 
		// $this->data['permissions'] = array();
		if (isset($_POST['login_email']) && isset($_POST['login_passphrase'])) {
			$this->login($_POST['login_email'], $_POST['login_passphrase']);
		}
		
        if(!isset($_COOKIE['userdata']) || $_COOKIE['userid'] == 0){ 
            setcookie('userdata', json_encode($this->data), time() + 86400*30);
            setcookie('userid', $this->data['user_id'], time() + 86400*30);
        }

	}
	
	/**
	 * Add a new account to the system. User must be logged in and have
	 * admin privileges. Records of this action will be kept. */
	function create_account($email, $passphrase, $firstname, $lastname, $pledgeclass) {
		if (!isset($email) || !$this->is_valid_email($email)) {
			$email = isset($email) ? $email : "";
			trigger_error("Your email address $email is not valid.", E_USER_ERROR);
			return false;
		} else if (!isset($passphrase) || strlen($passphrase) < 6) {
			trigger_error("You must provide a passphrase with at least 6 characters.", E_USER_ERROR);
			return false;
		} else if (!isset($firstname) || !$firstname) {
			trigger_error("You must provide a firstname.", E_USER_ERROR);
			return false;
		} else if (!isset($lastname) || !$lastname) {
			trigger_error("You must provide a lastname.", E_USER_ERROR);
			return false;
		} else if (!$this->is_logged_in()) {
			trigger_error("You must be logged in as an admin to do that.", E_USER_ERROR);
			return false;
		} else {
			$salt = Query::escape_string($this->generate_salt());
			$passphrase = Query::escape_string($passphrase);
			$firstname = Query::escape_string(trim($firstname));
			$lastname = Query::escape_string(trim($lastname));
			$pledgeclass = Query::escape_string(trim($pledgeclass));
			$timestamp = date("Y-m-d H:i:s");
			// Need to add permissions
			$query = new Query(sprintf("INSERT INTO %susers SET email='%s', salt='%s', passphrase=sha1(concat('%s', '%s')), firstname='%s', lastname='%s', pledgeclass='%s', registration_timestamp='%s', registration_user=%d", 
				TABLE_PREFIX, $email, $salt, $salt, $passphrase, $firstname, $lastname, $pledgeclass, $timestamp, $this->data['user_id']));
			return true;
		}
	}
	
	/**
	 * Encrypt a passphrase using a salt and SHA-1. */
	function encrypt_passphrase($salt, $passphrase) {
		return sha1($salt . $passphrase);
	}
	
	/**
	 * Generate a 32 character (128 bit) hash salt. */
	function generate_salt() {
		return substr(md5(uniqid(rand(), true)), 0, 32);
	}
	
	/**
	 * Returns true if user is logged in. */
	function is_logged_in() {
        return isset($this->data['user_id']) && $this->data['user_id'] > 0;
	}
	
	/**
	 * Returns true if user is a pledge. */
	function is_pledge() {
		$query = new Query(sprintf("SELECT user_id FROM %spledges WHERE user_id=%d LIMIT 1", TABLE_PREFIX, $this->data['user_id']));
		if ($row = $query->fetch_row()) {
			return true;
		} else {
			return false;
		}
	}
	
	/**
	 * Only letters, numbers, periods, underscores, and hyphens are allowed. */
	function is_valid_email($email) {
		return isset($email) && eregi('^[0-9a-zA-Z\._\-]+@[0-9a-zA-Z\._\-]+\.[a-zA-Z]+$', $email);
	}
	
	/**
	 * Returns true on successful login. */
	function login($email, $passphrase) {
		$login_email = $email;
		$row = false;
		if (isset($email) && isset($passphrase)) {
			// Query database for email and passphrase pair
			$email = Query::escape_string($email);
			$passphrase_sha1 = Query::escape_string($passphrase);
			$query = new Query(sprintf('SELECT user_id, email, firstname, lastname, pledgeclass, disabled FROM %susers WHERE email="%s" AND passphrase=sha1(concat(salt, "%s")) LIMIT 1', TABLE_PREFIX, $email, $passphrase_sha1));
			$row = $query->fetch_row();
		}
		// BEGIN Gamma Gamma user account migration code
		if (isset($email) && isset($passphrase) && !$row) {
			// Check for old password using MD5 hash
			$passphrase_md5 = Query::escape_string(md5($passphrase));
			$query = new Query(sprintf("SELECT user_id, email, firstname, lastname, pledgeclass, disabled FROM %susers WHERE email='%s' AND old_passphrase='%s' LIMIT 1", TABLE_PREFIX, $email, $passphrase_md5));
			if ($row = $query->fetch_row()) {
				// Update the records to use the new SHA-1 salted hash
				$query = new Query(sprintf("UPDATE %susers SET passphrase=sha1(concat(salt, '%s')) WHERE user_id = %d LIMIT 1", TABLE_PREFIX, $passphrase_sha1, $row['user_id']));
				$query = new Query(sprintf("UPDATE %susers SET old_passphrase=NULL WHERE user_id = %d LIMIT 1", TABLE_PREFIX, $row['user_id']));
			}
		}
		// END Gamma Gamma
		if ($row && $row['disabled'] && $row['user_id'] != 1) {
			trigger_error("Our records currently indicate that you are in bad standing. Please talk to the Membership VP to regain access to the website.", E_USER_ERROR);
			return false;
		} else if ($row) {
			// Load account information into current session
			$this->data['user_id'] = $row['user_id'];
			$this->data['email'] = $row['email'];
			$this->data['firstname'] = $row['firstname'];
			$this->data['lastname'] = $row['lastname'];
			$_SESSION['user'] = $this->data;
			
			// Grab all of the user's permissions
			$query_perm = new Query(sprintf("SELECT DISTINCT action_type FROM %spermissions_groups JOIN %spermissions USING (group_id) WHERE user_id=%d UNION SELECT action_type FROM %spermissions WHERE all_members=TRUE", TABLE_PREFIX, TABLE_PREFIX, $this->data['user_id'], TABLE_PREFIX));
			while ($row_perm = $query_perm->fetch_row()) {
				$this->data['permissions'][] = $row_perm['action_type'];
			}
            if (in_array("calendar view deleted", $this->data['permissions'])){
                $query = new Query(sprintf("SELECT hide_deleted FROM %suser_settings WHERE user_id=%d", TABLE_PREFIX, $this->data['user_id']));
                $this->data['hide_deleted'] = ($row_del = $query->fetch_row() and $row_del['hide_deleted']==1);
            }
            
			
			// Update the user's login timestamp
			$query_timestamp = new Query(sprintf("UPDATE %susers SET last_login = '%s' WHERE user_id=%d LIMIT 1", TABLE_PREFIX, date("Y-m-d H:i:s"), $this->data['user_id']));
			
			// Register for Gallery
			ApoGallery::register($this->data['user_id'], $this->data['firstname'] . ' ' . $this->data['lastname'], $row['pledgeclass'], $this->data['email']);
            
			// Process login redirect
			if (isset($this->data['login_redirect'])) {
				$url = $this->data['login_redirect'];
				unset($this->data['login_redirect']);
				$this->redirect($url);
			}
			
			if (USER_DEBUG) {
				$user_id = $this->data['user_id'];
				trigger_error("Logged in as user $user_id", E_USER_NOTICE);
				print_r($_SESSION);
				echo "<br />";
			} else {
				$this->redirect($_SERVER['REQUEST_URI']);
			}
			return true;
		}
		// BEGIN Gamma Gamma user account migration code
		else if (is_numeric($email)) {
			$email = Query::escape_string($email);
			$passphrase_md5 = Query::escape_string(md5($passphrase));
			$passphrase_sha1 = Query::escape_string($passphrase);
			$query = new Query(sprintf("SELECT user_id, email, firstname, lastname FROM %susers WHERE sid=%d AND (passphrase=sha1(concat(salt, '%s')) OR old_passphrase='%s') AND disabled=FALSE LIMIT 1", TABLE_PREFIX, $email, $passphrase_sha1, $passphrase_md5));
			if ($row = $query->fetch_row()) {
				$message = sprintf("Hello %s %s, your account's email address is: %s. <strong>Note that you are not logged in yet.</strong> Please login with your email address.", $row['firstname'], $row['lastname'], $row['email']);
				trigger_error($message, E_USER_NOTICE);
				return false;
			}
		}
		// END Gamma Gamma
		session_start();
		$_SESSION['login_email'] = $login_email;
		trigger_error("Incorrect email or passphrase. You can login using your SID in place of your email to retrieve your account's email address, or ask one of the webmasters to reset your passphrase.", E_USER_WARNING);
		return false;
	}
	
	/**
	 * Destroy the user's session and redirect to home page */
	function logout() {
		@session_unset();
		@session_destroy();
        setcookie("userdata", "", time() - 3600);
        setcookie('userid', "", time() - 3600);
		$this->redirect(".");
	}
	
	/**
	 * Returns true if user has the given permissions action_type */
	function permit($action_type, $pure_permission = FALSE) {
        if (!$pure_permission && $action_type === "calendar view deleted" && in_array("calendar view deleted", $this->data['permissions'])){
            return !$this->data['hide_deleted'];
        }
		return in_array($action_type, $this->data['permissions']);
	}
	
    function change_data($dataname, $data){
        $this->data[$dataname] = $data;
    }
    
    function hide_family($hide_id) {
        //remove to unhide active fams but keep p/dcomm hidden
        
        $hide_family = false;
        if (!$this->is_logged_in() or $this->is_pledge()) {
            if($GLOBALS['hide all fams']){
                return true;
            }
            $current_month = (int) (date('m') > 7); // 0 in spring, 1 in fall
            $current_year = date('Y'); //return current year, i.e. 2001
            $query = new Query(sprintf("SELECT 1 FROM apo_wiki_positions as pos, apo_wiki_positions_basic_info as bas WHERE user_id=%d AND pos.basic_info_id=bas.basic_info_id AND (pos.position_type=4 OR pos.position_title LIKE '%%Dynasty Director') AND bas.semester=%u AND bas.year=%u", $hide_id, $current_month, $current_year));
            if ($row = $query->fetch_row()){
                $hide_family = true;
            }
        }
        return $hide_family;
    }
    
	function print_change_passphrase() {
		if (!$this->is_logged_in()) {
			trigger_error("You must be logged in to change your passphrase.", E_USER_ERROR);
		} else {
			echo <<<HEREDOC_change_passphrase
<div id="change_passphrase">
<form action="" method="post">
<table>
<tr><td>Old Passphrase: </td><td><input type="password" name="old_passphrase" /></td></tr>
<tr><td>New Passphrase: </td><td><input type="password" name="new_passphrase" /></td></tr>
<tr><td>Repeat Passphrase: </td><td><input type="password" name="repeat_passphrase" /></td></tr>
</table>
<button class="btn btn-small btn-primary" type="submit" name="function" value="Change Passphrase">Change Passphrase</button>
</form>
</div>

HEREDOC_change_passphrase;
		}
	}
	
	function print_login() {
		session_start();
		if (!$this->is_logged_in()) {
			$saved_email = $_SESSION['login_email'];

			echo <<<HEREDOC_login
				<div class="">
<form id="login_form" method="post" action="">
<div id="login_email">Email: <input type="text" name="login_email" value="$saved_email" /></div>
<div id="login_passphrase">Passphrase: <input type="password" name="login_passphrase" /></div>
<div id="login_submit"><input class="btn btn-primary btn-mini" type="submit" value="Login" /></div>
</form>
<div id="login_footer"></div>
	</div>

HEREDOC_login;
/*
			echo <<<HEREDOC_login
	<div class="login">
	  <form>
	    E-mail: <input type="text" size="12" name="email" />
	    Passphrase: <input type="password" size="12" name="password" />
	    <input type="submit" value="Login" />
	  </form>
	</div>

HEREDOC_login;
*/
		}
	}
	
	function print_mailer($anonymous) {
		if ($anonymous || $this->is_logged_in()) {
			$query = new Query(sprintf("SELECT group_id, group_name FROM %smailer_control ORDER BY ordering ASC", TABLE_PREFIX));
			$recipients = "";
			while ($row = $query->fetch_row()) {
				$recipients .= "<option value=\"$row[group_id]\">$row[group_name]</option>";
			}
			if ($anonymous) {
				require_once("CaptchasDotNet.php");
				$captchas = new CaptchasDotNet('apogg', 'BCPGFiUGLQcZSqTKIR2Jcey3LVWBf7YFgFuykXo6',
								'/tmp/captchasnet-random-strings' , '3600',
								'abcdefghkmnopqrstuvwxyz','6',
								'240','80');
				$random = "<input type=\"hidden\" name=\"random\" value=\"" . $captchas->random() . "\" />";
				$image = $captchas->image();
				$email_field = "<p class=\"messageBody\">Your email: <input type=\"text\" name=\"email\" size=\"50\" /></p>";
				$captcha = "<p class=\"messageBody\">$image<br />\r\nEnter the letters in the CAPTCHA:\r\n<input type=\"text\" name=\"password\" size=\"6\" /></p>";
			} else {
				$random = "";
				$image = "";
				$email_field = "";
				$captcha = "";
			}
			echo <<<DOCHERE_print_mailer
	<div class="mailer">
	  <p class="moduleTitle">MAILER</p>
	  <form action="" method="post">
	    $email_field
	    <p class="messageBody">Type your message below</p>
	      <textarea name="body" rows="7"></textarea>
	    $captcha
	    <p class="recipients">
	      Recipients:<br />
	      <select name="recipient">$recipients</select>
	    </p>
	    <p class="buttons">
	      <input class="btn btn-primary" type="submit" name="function" value="Send" /> <input class="btn" type="reset" value="Reset" />
	    </p>
	    $random
	  </form>
	</div>

DOCHERE_print_mailer;
		}
	}
	
	function print_personal_messages() {
		return; // Not completed yet
		if ($this->is_logged_in()) {
			$query = new Query(sprintf("SELECT from_id, firstname, lastname, pledgeclass, body FROM %spersonal_messages JOIN %susers USING (user_id) WHERE %spersonal_messages.user_id=%d",
				TABLE_PREFIX, TABLE_PREFIX, TABLE_PREFIX, $this->data['user_id']));
			while ($row = $query->fetch_row()) {
				echo <<<DOCHERE_print_personal_messages_item
	  <h3>Message from $row[firstname] $row[lastname] ($row[pledgeclass]):</h3>
	  <p>$row[body]</p>

DOCHERE_print_personal_messages_item;
			}
			
			echo <<<DOCHERE_print_personal_messages
	<div class="blueInfoBox">
	  <h2>Personal Messages</h2>
$messages
	</div>
DOCHERE_print_personal_messages;
		}
	}
	
	function process_change_passphrase() {
		if (isset($_POST['function']) && $_POST['function'] == 'Change Passphrase') {
			if (!isset($_POST['old_passphrase'])) {
				trigger_error("Incorrect passphrase.", E_USER_ERROR);
				return false;
			}
			$old_passphrase = $_POST['old_passphrase'];
			if (!isset($_POST['new_passphrase']) || strlen($_POST['new_passphrase']) < 6) {
				trigger_error("Your new passphrase must be at least 6 characters long.", E_USER_ERROR);
				return false;
			}
			$new_passphrase = $_POST['new_passphrase'];
			if (!isset($_POST['repeat_passphrase']) || $new_passphrase != $_POST['repeat_passphrase']) {
				trigger_error("Please check that you typed your new passphrase exactly the same both times, including letter capitalization.", E_USER_ERROR);
				return false;
			}
			$salt = $this->generate_salt();
			$old_passphrase = Query::escape_string($old_passphrase);
			$new_passphrase = Query::escape_string($new_passphrase);
			$query = new Query(sprintf("UPDATE %susers SET passphrase=sha1(concat('%s', '%s')), salt='%s' WHERE user_id=%d AND passphrase=sha1(concat(salt, '%s')) LIMIT 1",
				TABLE_PREFIX, $salt, $new_passphrase, $salt, $this->data['user_id'], $old_passphrase));
			if ($query->affected_rows() > 0) {
				echo <<<DOCHERE_process_change_passphrase
<div id="change_passphrase">
<div class="successMessage">Your passphrase has been successfully changed.</div>
</div>

DOCHERE_process_change_passphrase;
				return true;
			} else {
				trigger_error("Your old passphrase is incorrect.", E_USER_ERROR);
				return false;
			}
		}
		return false;
	}
	
	function print_edit_roster() {
		global $g_user;
		if (!$this->is_logged_in()) {
			trigger_error("You must be logged in to edit your personal information.", E_USER_ERROR);
			return;
		}
		
		$query = new Query(sprintf("SELECT email, address, city, zipcode, phone, cellphone, major, birthday, aim, shirtsize, carrier, mail_requirements_update FROM %susers WHERE user_id=%d LIMIT 1", TABLE_PREFIX, $g_user->data['user_id']));
		if ($row = $query->fetch_row()) {
			// Process birthday
			$month = "<option value=\"\"></option>";
			$day = "<option value=\"\"></option>";
			$year = "<option value=\"\"></option>";
			$birthday = $row['birthday'] ? strtotime($row['birthday']) : false;
			$month_array = array("", "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");
			for ($i = 1; $i <= 12; $i++) {
				$selected = $birthday && $i == date("m", $birthday) ? " selected=\"selected\"" : "";
				$month .= "<option value=\"$i\"$selected>$month_array[$i]</option>";
			}
			for ($i = 1; $i <= 31; $i++) {
				$selected = $birthday && $i == date("d", $birthday) ? " selected=\"selected\"" : "";
				$day .= "<option value=\"$i\"$selected>$i</option>";
			}
			for ($i = date("Y"); $i >= date("Y") - 120; $i--) {
				$selected = $birthday && $i == date("Y", $birthday) ? " selected=\"selected\"" : "";
				$year .= "<option value=\"$i\"$selected>$i</option>";
			}
			
			// Process shirtsize
			$shirtsize = "";
			$shirt_size_array = array("XS", "S", "M", "L", "XL", "XXL", "XXXL", "XXXXL");
			foreach ($shirt_size_array as $size) {
				$selected = $size == $row['shirtsize'] ? " selected=\"selected\"" : "";
				$shirtsize .= "<option value=\"$size\"$selected>$size</option>";
			}
			
			// Process carrier
			$carrier = "";
			$carrier_array = array("", "Verizon", "ATT", "Sprint", "T-Mobile", "Boost Mobile", "Cricket", "Virgin Mobile", "US Cellular", "MetroPCS", "Tracfone");
			foreach ($carrier_array as $phone_carrier) {
				$selected_carrier = $phone_carrier == $row['carrier'] ? " selected=\"selected\"" : "";
				$carrier .= "<option value=\"$phone_carrier\"$selected_carrier>$phone_carrier</option>";
			}

			$checked = $row['mail_requirements_update'] ? "checked=\"checked\"" : "";
			
			echo <<<DOCHERE_print_edit_roster
<div id="edit_roster">
<form action="" method="post">
<table>
<caption>Edit Personal Information</caption>
<tr><td axis="name">E-mail</td><td axis="value"><input type="text" name="email", value="$row[email]" /></td></tr>
<tr><td axis="name">Street Address</td><td axis="value"><input type="text" name="address", value="$row[address]" /></td></tr>
<tr><td axis="name">City</td><td axis="value"><input type="text" name="city", value="$row[city]" /></td></tr>
<tr><td axis="name">Zipcode</td><td axis="value"><input type="text" name="zipcode", value="$row[zipcode]" /></td></tr>
<tr><td axis="name">How to reach me</td><td axis="value"><input type="text" name="phone", value="$row[phone]" /></td></tr>
<tr><td axis="name">Phone #</td><td axis="value"><input type="text" name="cellphone", value="$row[cellphone]" /></td></tr>
<tr><td axis="name">Major</td><td axis="value"><input type="text" name="major", value="$row[major]" /></td></tr>
<tr><td axis="name">AIM</td><td axis="value"><input type="text" name="aim", value="$row[aim]" /></td></tr>
<tr><td axis="name">Birthday</td><td axis="value"><select name="birthday_month">$month</select><select name="birthday_day">$day</select><select name="birthday_year">$year</select></td></tr>
<tr><td axis="name">Shirt Size</td><td axis="value"><select name="shirtsize">$shirtsize</td></tr>
<tr><td axis="name">Phone Carrier</td><td axis="value"><select name="carrier">$carrier</td></tr>
<tr><td axis="name">Email Requirements Reminders</td><td axis="value"><input type="checkbox" name="mail_requirements_update" $checked/></td></tr>
</table>
<button class="btn btn-small btn-primary" type="submit" name="function" value="Submit">Submit</button>
<button class="btn btn-small btn-inverse" type="reset">Reset</button>
</form>
</div>
DOCHERE_print_edit_roster;
		}
	}
	
	function process_edit_roster() {
		global $g_user;
		if ($this->is_logged_in() && isset($_POST['function']) && $_POST['function'] == "Submit") {
			// Validate data
			if (!User::is_valid_email(trim($_POST['email']))) {
				trigger_error("Your specified email address is not valid.", E_USER_ERROR);
				return;
			}
			if ($_POST['birthday_month'] && $_POST['birthday_day'] && $_POST['birthday_year'] && !strtotime("$_POST[birthday_year]-$_POST[birthday_month]-$_POST[birthday_day]")) {
				trigger_error("Your specified birthday is not valid.", E_USER_ERROR);
				return;
			}
			if (!in_array($_POST['shirtsize'], array("", "XS", "S", "M", "L", "XL", "XXL", "XXXL", "XXXXL"))) {
				trigger_error("Your specified shirt size is not valid.", E_USER_ERROR);
				return;
			}
			if (!in_array($_POST['carrier'], array("", "Verizon", "ATT", "Sprint", "T-Mobile", "Boost Mobile", "Cricket", "Virgin Mobile", "US Cellular", "MetroPCS", "Tracfone"))) {
				trigger_error("Your specified phone carrier is not valid.", E_USER_ERROR);
				return;
			}
			
			// Retrieve and clean data
			$email = Query::escape_string(trim($_POST['email']));
			$birthday = $_POST['birthday_month'] && $_POST['birthday_day'] && $_POST['birthday_year'] ? "'$_POST[birthday_year]-$_POST[birthday_month]-$_POST[birthday_day]'" : "NULL";
			$set_array = array();
			$set_array[] = "email='$email'";
			$set_array[] = "birthday=$birthday";
			foreach (array("address", "city", "zipcode", "phone", "cellphone", "major", "aim", "shirtsize", "carrier") as $key) {
				$value = Query::escape_string(htmlentities(trim($_POST[$key]), ENT_QUOTES, 'UTF-8'));
				$set_array[] = "$key='$value'";
			}
			
			// Perform the update
			$set_expression = implode(", ", $set_array);
			$query = new Query(sprintf("UPDATE %susers SET %s WHERE user_id=%d LIMIT 1", TABLE_PREFIX, $set_expression, $g_user->data['user_id']));

			if ($_POST['mail_requirements_update'] && isset($_POST['mail_requirements_update'])) {
				$query2 = new Query(sprintf("UPDATE %susers SET mail_requirements_update = TRUE WHERE user_id=%d LIMIT 1", TABLE_PREFIX, $g_user->data['user_id']));
			}
			else {
				$query2 = new Query(sprintf("UPDATE %susers SET mail_requirements_update = FALSE WHERE user_id=%d LIMIT 1", TABLE_PREFIX, $g_user->data['user_id']));	
			}
			
			// Update data cached in User class
			$this->data['email'] = trim($_POST['email']);
			
			echo <<<DOCHERE_process_edit_roster
<div class="successMessage">Your personal information has been successfully changed.</div>

DOCHERE_process_edit_roster;
		}
	}
	
	function process_mailer($anonymous) {
		global $g_user;
		if (($anonymous || $g_user->is_logged_in()) && isset($_POST['function']) && $_POST['function'] == 'Send' && isset($_POST['recipient']) && is_numeric($_POST['recipient'])) {
			if (isset($_POST['email']) && strpos($_POST['email'], array("\r", "\n"))) {
				trigger_error("Illegal characters in email address.", E_USER_ERROR);
				return;
			}
			if ($anonymous) {
				require_once("CaptchasDotNet.php");
				$password = $_REQUEST['password'];
				$random_string = $_REQUEST['random'];
				$captchas = new CaptchasDotNet('apogg', 'BCPGFiUGLQcZSqTKIR2Jcey3LVWBf7YFgFuykXo6',
									'/tmp/captchasnet-random-strings' , '3600',
									'abcdefghkmnopqrstuvwxyz','6',
									'240','80');
				if (!$captchas->validate($random_string)) {
					trigger_error("Every CAPTCHA can only be used once. The current CAPTCHA has already been used. Try again.", E_USER_ERROR);
					return;
				} else if (!$captchas->verify($password)) {
					trigger_error("You entered the wrong CAPTCHA. Aren't you human? Use the back button and try again.", E_USER_ERROR);
					return;
				} else {
					
				}
			}
			$recipient = $_POST['recipient'];
			$query = new Query(sprintf("SELECT firstname, lastname, email FROM %smailer JOIN %susers USING (user_id) WHERE group_id=%d",
				TABLE_PREFIX, TABLE_PREFIX, $recipient));
			$emails_array = array();
			while ($row = $query->fetch_row()) {
				$emails_array[] = $row['email'];
			}
			
			$name    = $anonymous ? $_POST['email'] : $g_user->data['firstname'] . " " . $g_user->data['lastname'];
			$from    = $anonymous ? $_POST['email'] : $g_user->data['email'];
			$to      = implode(", ", $emails_array);
			$subject = "[APO] Message from $name";
			$message = get_magic_quotes_gpc() ? stripslashes($_POST['body']) : $_POST['body']; // This needs to be checked for security flaws
			$headers = "From: $from\r\n" .
				"Reply-To: $from\r\n" .
				"Return-Path: $from\r\n" .
				"X-Mailer: PHP/" . phpversion();
			mail($to, $subject, $message, $headers);
		}
	}
	
	function process_roster() {
		if (!$this->is_logged_in()) {
			trigger_error("You must be logged in to view the roster.", E_USER_ERROR);
			return;
		}
		
		// Grab and scrub user input
		$quick_search = isset($_REQUEST['quick_search']) ? Query::escape_string($_REQUEST['quick_search']) : false;
		$firstname = isset($_REQUEST['firstname']) ? Query::escape_string($_REQUEST['firstname']) : false;
		$lastname = isset($_REQUEST['lastname']) ? Query::escape_string($_REQUEST['lastname']) : false;
		$pledgeclass = isset($_REQUEST['pledgeclass']) ? Query::escape_string(trim($_REQUEST['pledgeclass'])) : false;
		$major = isset($_REQUEST['major']) ? Query::escape_string($_REQUEST['major']) : false;
		$user_id = isset($_REQUEST['user_id']) ? Query::escape_string($_REQUEST['user_id']) : false;
		$phoneno = isset($_REQUEST['cellphone']) ? Query::escape_string($_REQUEST['cellphone']) : false;
		
		$search_results_wrapper = "";
		if (isset($_REQUEST['function']) && $_REQUEST['function'] == 'Search') {
			// Setup the WHERE expression
			$where_expression_array = array();
			if ($quick_search) {
				$quick_search_array = array();
				if ($space_pos = strpos($quick_search, " ")) {
					$part1 = substr($quick_search, 0, $space_pos);
					$part2 = substr($quick_search, $space_pos + 1, strlen($quick_search) - $space_pos - 1);
					$quick_search_array[] = "firstname LIKE '$part1%' AND lastname LIKE '$part2%'";
				}
				$quick_search_array[] = "firstname LIKE '$quick_search%'";
				$quick_search_array[] = "lastname LIKE '$quick_search%'";
				$quick_search_array[] = "pledgeclass = '$quick_search'";
				$quick_search_array[] = "major LIKE '$quick_search%'";
				$quick_search_array[] = "cellphone LIKE '$quick_search%'";
				$where_expression_array[] = "(" . implode(" OR ", $quick_search_array) . ")";
			}
			if ($firstname) {
				$where_expression_array[] = "firstname LIKE '$firstname%'";
			}
			if ($lastname) {
				$where_expression_array[] = "lastname LIKE '$lastname%'";
			}
			if ($pledgeclass) {
				$where_expression_array[] = "pledgeclass = '$pledgeclass'";
			}
			if ($major) {
				$where_expression_array[] = "major LIKE '$major%'";
			}
			if ($user_id) {
				$where_expression_array[] = "user_id = '$user_id'";
			}
			if ($phoneno) {
				$phonedigits = ereg_replace("[^0-9]", "", $phoneno);
				if (strlen($phonedigits) >= 3) {
					$areacode = substr($phonedigits, 0, 3);
				}
				if (strlen($phonedigits) >= 6) {
					$first3 = substr($phonedigits, 3, 3);
				}
				if (strlen($phonedigits) >= 10) {
					$last4 = substr($phonedgits, 6, 4);
				}
				$fullphone = "%".$areacode."%".$first3."%".last4."%";
                $where_expression_array[] = "cellphone LIKE '%$areacode%$first3%$last4%'";
			}
			$where_expression_array[] = "depledged = FALSE";
			
			if ($where_expression_array) {
				$where_expression = implode(" AND ", $where_expression_array);
			} else {
				$where_expression = "FALSE";
			}
			
			// Query the database
			$count = 0;
			$search_results = "";
			$my_firstname = $this->data['firstname'];
			$my_lastname = $this->data['lastname'];
			$odd_row = false;
			$query = new Query(sprintf("SELECT user_id, email, firstname, lastname, address, city, zipcode, phone, cellphone, birthday, major, pledgeclass, aim, shirtsize FROM %susers
				WHERE %s ORDER BY lastname ASC", TABLE_PREFIX, $where_expression));
			while ($row = $query->fetch_row()) {
				$odd_row = !$odd_row;
				$odd_row_class = $odd_row ? "odd_row" : "";
				$birthday = $row['birthday'] ? date("m-d-Y", strtotime($row['birthday'])) : "";
				#$aim = $row['aim'] ? "$row[aim]<a href=\"aim:goim?screenname=$row[aim]&message=Hi.+It's+$my_firstname+$my_lastname.\"><img src=\"images/im.gif\" alt=\"Send $row[firstname] $row[lastname] an IM\" /></a> <a href=\"aim:addbuddy?screenname=$row[aim]\"><img src=\"images/bl.gif\" alt=\"Add $row[firstname] $row[lastname] to your AIM buddy list\" /></a>" : "";
				$aim = $row['aim'] ? "$row[aim]": "";
				if(file_exists("face/$row[user_id].png")) {
					list($width, $height, $type, $attr) = getimagesize("face/$row[user_id].png");
					#$person_pic = "<Center><a style=\"cursor: pointer\" onClick=\"window.open('face/$row[user_id].png','','width=$width,height=$height')\"><img src=\"face/$row[user_id].png\" width=20 height=22></a></Center>";
					$person_pic = "<Center><a class=\"pic\" href =\"face/$row[user_id].png\" ><img src=\"face/$row[user_id].png\" width=20 height=22 alt=\"$row[firstname] $row[lastname]\"></a></Center>";		
				} else if(file_exists("face/$row[user_id].jpg")) {
					list($width, $height, $type, $attr) = getimagesize("face/$row[user_id].jpg");
					#$person_pic = "<Center><a style=\"cursor: pointer\" onClick=\"window.open('face/$row[user_id].jpg','','width=$width,height=$height')\"><img src=\"face/$row[user_id].jpg\" width=20 height=22></a></Center>";
					$person_pic = "<Center><a class=\"pic\" href =\"face/$row[user_id].jpg\")\"><img src=\"face/$row[user_id].jpg\" width=20 height=22 alt=\"$row[firstname] $row[lastname]\"></a></Center>";
				} else {
					#$person_pic = "<Center><a  style=\"cursor: pointer\" onClick=\"window.open('face/default.jpg','','width=325,height=384')\"><img src=\"face/default.jpg\" width=20 height=22></a></Center>";	
					$person_pic = "<Center><a class=\"pic\" href =\"face/default.jpg\")\"><img src=\"face/default.jpg\" width=20 height=22 alt=\"$row[firstname] $row[lastname]\"></a></Center>";	
				}
				#<a href="buddy_list.php?pledgeclass=$row[pledgeclass]"><img src="images/bl.gif" alt="Add the pledge class to your AIM buddy list" /></a> took out of the Dochere from pledgeclass row
				$search_results .= <<<DOCHERE_process_roster_results
<tr class="$odd_row_class">
  <td axis="pic">$person_pic</td>
  <td axis="name"><a href="profile.php?user_id=$row[user_id]">$row[firstname] $row[lastname]</a></td>
  <td axis="email"><a href="mailto:$row[email]">$row[email]</a></td>
  <td axis="address">$row[address]<br/>$row[city] $row[zipcode]</td>
  <td axis="phone">$row[phone]</td>
  <td axis="cellphone">$row[cellphone]</td>
  <td axis="major">$row[major]</td>
  <td axis="pledgeclass">$row[pledgeclass]</td>
  <td axis="aim">$aim</td>
</tr>

DOCHERE_process_roster_results;
			}

			$search_results_wrapper = <<<DOCHERE_process_roster_results_wrapper
<div id="process_roster_results">
<table>
<tr>
  <th axis="pic">Pic</th>
  <th axis="name">Name</th>
  <th axis="email">E-mail</th>
  <th axis="address">Address</th>
  <th axis="phone">Phone</th>
  <th axis="cellphone">Cellphone</th>
  <th axis="major">Major</th>
  <th axis="pledgeclass">Pledge Class</th>
  <th axis="aim">AIM</th>
</tr>
$search_results
</table>
</div>

DOCHERE_process_roster_results_wrapper;
		}
		
		if (isset($query) && $query->num_rows() == 0) {
			$search_results_wrapper = "<strong>No Results</strong>\r\n";
		}
		
		// Output search form and results
		echo <<<DOCHERE_process_roster
<div id="process_roster">
<form action="" method="get">
<table>
<tr><td axis="form_label">First Name: </td><td axis="form_input"><input type="text" name="firstname" value="$firstname" /></td></tr>
<tr><td axis="form_label">Last Name: </td><td axis="form_input"><input type="text" name="lastname" value="$lastname" /></td></tr>
<tr><td axis="form_label">Major: </td><td axis="form_input"><input type="text" name="major" value="$major" /></td></tr>
<tr><td axis="form_label">Pledge Class: </td><td axis="form_input"><input type="text" name="pledgeclass" value="$pledgeclass" /></td></tr>
<tr><td axis="form_label">Phone #: </td><td axis="form_input"><input type="text" name="cellphone" value="$phoneno" /></td></tr>
</table>
<button class="btn btn-primary btn-small" type="submit" name="function" value="Search">Search</button>
</form>

<br />
<script type="text/javascript" src="ajax.js"></script>
<script type="text/javascript" src="short_search.js"></script>
Quick Search: <input id="apo_short_search_input" type="text" />
<div id="apo_short_search_result"></div>


$search_results_wrapper
</div>

DOCHERE_process_roster;
	}
	
	/**
	 * Redirect the user's browser to another page
	 * and ensure that session data is saved. */
	function redirect($url) {
		session_write_close(); // Necessary to ensure that session variables are saved
		header("Location: $url");
		exit();
	}
	
	/**
	 * If user is not logged in, redirect to the login page.
	 * This will return to the original page after logging in. */
	function require_login() {
		if (!$this->is_logged_in()) {
			$this->data['login_redirect'] = $_SERVER['REQUEST_URI'];
			$this->redirect('login.php');
		}
	}
	
}
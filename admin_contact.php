<?php
/**
 * This file is intended as a kluge to keep the chapter running until I have
 * time to create a real dynamic requirements tracker. -Geoffrey Lee
 */
require("include/includes.php");
require("include/Calendar.class.php");
require("include/Template.class.php");
Template::print_head(array());
Template::print_body_header('Home', 'ADMIN');

?>

<script language="javascript" type="text/javascript" src="popup.js"></script>
<?php

/**
 *
 */

/**
 *
 */


if ($g_user->data['user_id'] == 1190) {
	$is_tomo = true;
} else {
	$is_tomo = false;
}

if (!$g_user->is_logged_in()) {
	trigger_error("You must be logged in to view this page.");
} else {

function members($num, $str) {
	$person = "Current " . $str . " Mailing List: <br>";
	$query = new Query(sprintf("
	select * from apo_mailer where group_id = %s
	", $num));
	while ($row = $query->fetch_row()) {
		$queryPerson = new Query(sprintf("
		select * from apo_users where user_id = %s
		", $row['user_id']));
		$rowPerson = $queryPerson->fetch_row();
		$person .= $rowPerson['user_id'] . " = " . $rowPerson['firstname'] . " " . $rowPerson['lastname'] . " (" . 	$rowPerson['pledgeclass'] . ") <br>";
	}
	return $person;
}

function add($group_id, $user_id, $str) {
	if (is_numeric($user_id)) {				
		$queryCheckOne = new Query(sprintf("SELECT * FROM apo_mailer WHERE user_id = %s AND group_id = %s", $user_id, $group_id));	
		$rowCheckOne = $queryCheckOne->fetch_row();
		$queryCheckTwo = new Query(sprintf("SELECT * FROM apo_users WHERE user_id = %s AND disabled = 0", $user_id));
		$rowCheckTwo = $queryCheckTwo->fetch_row();
		if ($rowCheckOne == false) {
			if ($rowCheckTwo != false)
			{
			$query = new Query("start transaction");
			$query = new Query(sprintf("INSERT INTO apo_mailer values (%s, %s)", $group_id, $user_id));	
			$query = new Query("commit");	
			$result = $str . ": SUCCESSFUL ADDING";					
			}
			else {		
				$result = $str . ": NOT A VALID NUMBER (USER ID DOES NOT EXIST)";
			}
		}
		else {
			$result = $str . ": MEMBER ALREADY IN THE LIST SO CANNOT ADD";		
		}
	}
	else {
		$result = $str . ": NOT A NUMBER";
	}
	return $result;
}

function remove($group_id, $user_id, $str) {
	if (is_numeric($user_id)) {				
		$queryCheckOne = new Query(sprintf("SELECT * FROM apo_mailer WHERE user_id = %s AND group_id = %s", $user_id, $group_id));	
		$rowCheckOne = $queryCheckOne->fetch_row();
		$queryCheckTwo = new Query(sprintf("SELECT * FROM apo_users WHERE user_id = %s AND disabled = 0", $user_id));
		$rowCheckTwo = $queryCheckTwo->fetch_row();
		if ($rowCheckOne != false) {
			if ($rowCheckTwo != false)
			{
			$query = new Query("start transaction");
			$query = new Query(sprintf("DELETE FROM apo_mailer where user_id = %s AND group_id = %s", $user_id, $group_id));	
			$query = new Query("commit");	
			$result = $str . ": SUCCESSFUL REMOVING";					
			}
			else {		
				$result = $str . ": NOT A VALID NUMBER (USER ID DOES NOT EXIST)";
			}
		}
		else {
			$result = $str . ": MEMBER DOES NOT EXIST IN THE LIST TO REMOVE";		
		}
	}
	else {
		$result = $str . ": NOT A NUMBER";
	}
	return $result;
}

$rushPerson = members(5, "Rush Chairs");

$presidentPerson = members(1, "President");

$pledgemasterPerson = members(2, "Pledge Master");

$webmastersPerson = members(3, "Webmasters");

$stylusPerson = members(4, "Stylus");

if (!$g_user->is_logged_in() || !$g_user->permit("admin view requirements")) {
	trigger_error("You must be logged in as an admin to access this feature", E_USER_ERROR);
} else {

	if (isset($_REQUEST['rushAdd']) && $_REQUEST['rushAdd'] == 'Search') {
		$rushWritten = Query::escape_string($_REQUEST['rushA']);
		$result = add(5, $rushWritten, "Rush Chairs");
		$rushPerson = members(5, "Rush Chairs");
	}
	
	else if (isset($_REQUEST['rushRemove']) && $_REQUEST['rushRemove'] == 'Search') {
		$rushWritten = Query::escape_string($_REQUEST['rushR']);
		$result = remove(5, $rushWritten, "Rush Chairs");
		$rushPerson = members(5, "Rush Chairs");
	}
	
	else if (isset($_REQUEST['presidentAdd']) && $_REQUEST['presidentAdd'] == 'Search') {
		$presidentWritten = Query::escape_string($_REQUEST['presidentA']);
		$result = add(1, $presidentWritten, "President");
		$presidentPerson = members(1, "President");
	}
	
	else if (isset($_REQUEST['presidentRemove']) && $_REQUEST['presidentRemove'] == 'Search') {
		$presidentWritten = Query::escape_string($_REQUEST['presidentR']);
		$result = remove(1, $presidentWritten, "President");
		$presidentPerson = members(1, "President");
	}
	
	else if (isset($_REQUEST['pledgemasterAdd']) && $_REQUEST['pledgemasterAdd'] == 'Search') {
		$pledgemasterWritten = Query::escape_string($_REQUEST['pledgemasterA']);
		$result = add(2, $pledgemasterWritten, "Pledge Master");
		$pledgemasterPerson = members(2, "Pledge Master");
	}
	
	else if (isset($_REQUEST['pledgemasterRemove']) && $_REQUEST['pledgemasterRemove'] == 'Search') {
		$pledgemasterWritten = Query::escape_string($_REQUEST['pledgemasterR']);
		$result = remove(2, $pledgemasterWritten, "Pledge Master");
		$pledgemasterPerson = members(2, "Pledge Master");
	}
	
	else if (isset($_REQUEST['webmastersAdd']) && $_REQUEST['webmastersAdd'] == 'Search') {
		$webmastersWritten = Query::escape_string($_REQUEST['webmastersA']);
		$result = add(3, $webmastersWritten, "Webmasters");
		$webmastersPerson = members(3, "Webmasters");
		}
	
	else if (isset($_REQUEST['webmastersRemove']) && $_REQUEST['webmastersRemove'] == 'Search') {
		$webmastersWritten = Query::escape_string($_REQUEST['webmastersR']);
		$result = remove(3, $webmastersWritten, "Webmasters");
		$webmastersPerson = members(3, "Webmasters");
	}

	else if (isset($_REQUEST['stylusAdd']) && $_REQUEST['stylusAdd'] == 'Search') {
		$stylusWritten = Query::escape_string($_REQUEST['stylusA']);
		$result = add(4, $stylusWritten, "Stylus");
		$stylusPerson = members(4, "Stylus");
	}

	else if (isset($_REQUEST['stylusRemove']) && $_REQUEST['stylusRemove'] == 'Search') {
		$stylusWritten = Query::escape_string($_REQUEST['stylusR']);
		$result = remove(4, $stylusWritten, "Stylus");
		$stylusPerson = members(4, "Stylus");
	}
	
echo <<<HEREDOC
<h2>Mailing List</h2>
<form style="margin-top: 1em">
	<p>PLEASE READ THIS INSTRUCTION BEFORE YOU USE THIS!!! DON'T PLAY AROUND WITH THIS! NO DECIMAL NUMBER, COMMAS, ANYTHING THAT COULD MESS THINGS UP!<br>
	<br>
	You have to set the contact mailer by typing their User IDs. Please do one person at a time! Don't put multiple users at once! 
	To find the User ID of an active, go to the Brothers Tab, and Quick Search the person and click on his/her name.
	The User ID will be at the end of his/her URL. For example, if you want to add or remove Tomomasa Terazaki from
	one of the mailig list, Quick Search Tomo, Tomomasa Terazaki should pop up, then click on his name. At the end of the URL
	says, user_id=1190, which means Tomomasa Terazaki's User ID is 1190, so you type 1190 to the text fields to add or
	remove him. Or you can use: <a href="user_id.php">User ID List</a>.<br>
	<br>
	<font color="red"><b>$result</b></font><br>
	<br>

	<form>
	Rush Chairs Add: <input type="text" name="rushA" value="" /><br>
	<button type="submit" name="rushAdd" value="Search"> Add </button><br>
	</form>
	
	<form>
	Rush Chairs Remove: <input type="text" name="rushR" value="" /><br>
	<button type="submit" name="rushRemove" value="Search"> Remove </button><br>	
	</form>
	
	<br>
	$rushPerson<br>	
	<br>
	
	<form>
	President Add: <input type="text" name="presidentA" value="" /><br>
	<button type="submit" name="presidentAdd" value="Search"> Add </button><br>
	</form>

	<form>
	President Remove: <input type="text" name="presidentR" value="" /><br>
	<button type="submit" name="presidentRemove" value="Search"> Remove </button><br>	
	</form>

	<br>
	$presidentPerson<br>	
	<br>
	
	<form>
	Pledgemaster Add: <input type="text" name="pledgemasterA" value="" /><br>
	<button type="submit" name="pledgemasterAdd" value="Search"> Add </button><br>
	</form>

	<form>
	Pledgemaster Remove: <input type="text" name="pledgemasterR" value="" /><br>
	<button type="submit" name="pledgemasterRemove" value="Search"> Remove </button><br>	
	</form>
	
	<br>
	$pledgemasterPerson<br>	
	<br>
	
	<form>
	Webmasters Add: <input type="text" name="webmastersA" value="" /><br>
	<button type="submit" name="webmastersAdd" value="Search"> Add </button><br>
	</form>

	<form>
	Webmasters Remove: <input type="text" name="webmastersR" value="" /><br>
	<button type="submit" name="webmastersRemove" value="Search"> Remove </button><br>	
	</form>

	<br>
	$webmastersPerson<br>	
	<br>

	<form>
	Stylus Add: <input type="text" name="stylusA" value="" /><br>
	<button type="submit" name="stylusAdd" value="Search"> Add </button><br>
	</form>

	<form>
	Stylus Remove: <input type="text" name="stylusR" value="" /><br>
	<button type="submit" name="stylusRemove" value="Search"> Remove </button><br>	
	</form>

	<br>
	$stylusPerson<br>	
	<br>
</form>
HEREDOC;

}
}

?>
<?php
Template::print_body_footer();
Template::print_disclaimer();
?>
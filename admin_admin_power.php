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
	$person = "Current " . $str . " Power Members: <br>";
	$query = new Query(sprintf("
	select * from apo_permissions_groups where group_id = %s
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
		$queryCheckOne = new Query(sprintf("SELECT * FROM apo_permissions_groups WHERE user_id = %s AND group_id = %s", $user_id, $group_id));	
		$rowCheckOne = $queryCheckOne->fetch_row();
		$queryCheckTwo = new Query(sprintf("SELECT * FROM apo_users WHERE user_id = %s AND disabled = 0", $user_id));
		$rowCheckTwo = $queryCheckTwo->fetch_row();
		if ($rowCheckOne == false) {
			if ($rowCheckTwo != false)
			{
			$query = new Query("start transaction");
			$query = new Query(sprintf("INSERT INTO apo_permissions_groups (group_id, user_id) values (%s, %s)", $group_id, $user_id));	
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
		$queryCheckOne = new Query(sprintf("SELECT * FROM apo_permissions_groups WHERE user_id = %s AND group_id = %s", $user_id, $group_id));	
		$rowCheckOne = $queryCheckOne->fetch_row();
		$queryCheckTwo = new Query(sprintf("SELECT * FROM apo_users WHERE user_id = %s AND disabled = 0", $user_id));
		$rowCheckTwo = $queryCheckTwo->fetch_row();
		if ($rowCheckOne != false) {
			if ($rowCheckTwo != false)
			{
			$query = new Query("start transaction");
			$query = new Query(sprintf("DELETE FROM apo_permissions_groups where user_id = %s AND group_id = %s", $user_id, $group_id));	
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

$admincommPerson = members(1, "Admin");

$excommPerson = members(2, "ExComm");

$pcommPerson = members(3, "PComm");

$webcommPerson = members(4, "WebComm");

$wikiPerson = members(6, "Wiki");

if (!$g_user->is_logged_in() || !$g_user->permit("admin view requirements")) {
	trigger_error("You must be logged in as an admin to access this feature", E_USER_ERROR);
} else {

	if (isset($_REQUEST['adminAdd']) && $_REQUEST['adminAdd'] == 'Search') {
		$adminWritten = Query::escape_string($_REQUEST['adminA']);
		$result = add(1, $adminWritten, "Admin");
		$admincommPerson = members(1, "Admin");		
	}
	
	else if (isset($_REQUEST['adminRemove']) && $_REQUEST['adminRemove'] == 'Search') {
		$adminWritten = Query::escape_string($_REQUEST['adminR']);
		$result = remove(1, $adminWritten, "Admin");
		$admincommPerson = members(1, "Admin");				
	}
	
	else if (isset($_REQUEST['excommAdd']) && $_REQUEST['excommAdd'] == 'Search') {
		$excommWritten = Query::escape_string($_REQUEST['excommA']);
		$result = add(2, $excommWritten, "ExComm");
		$excommPerson = members(2, "ExComm");			
	}
	
	else if (isset($_REQUEST['excommRemove']) && $_REQUEST['excommRemove'] == 'Search') {
		$excommWritten = Query::escape_string($_REQUEST['excommR']);
		$result = remove(2, $excommWritten, "ExComm");
		$excommPerson = members(2, "ExComm");		
	}
	
	else if (isset($_REQUEST['pcommAdd']) && $_REQUEST['pcommAdd'] == 'Search') {
		$pcommWritten = Query::escape_string($_REQUEST['pcommA']);
		$result = add(3, $pcommWritten, "PComm");
		$pcommPerson = members(3, "PComm");			
	}
	
	else if (isset($_REQUEST['pcommRemove']) && $_REQUEST['pcommRemove'] == 'Search') {
		$pcommWritten = Query::escape_string($_REQUEST['pcommR']);
		$result = remove(3, $pcommWritten, "PComm");
		$pcommPerson = members(3, "PComm");			
	}
	
	else if (isset($_REQUEST['webcommAdd']) && $_REQUEST['webcommAdd'] == 'Search') {
		$webcommWritten = Query::escape_string($_REQUEST['webcommA']);
		$result = add(4, $webcommWritten, "WebComm");
		$webcommPerson = members(4, "WebComm");		
		}
	
	else if (isset($_REQUEST['webcommRemove']) && $_REQUEST['webcommRemove'] == 'Search') {
		$webcommWritten = Query::escape_string($_REQUEST['webcommR']);
		$result = remove(4, $webcommWritten, "WebComm");
		$webcommPerson = members(4, "WebComm");		
	}

	else if (isset($_REQUEST['wikiAdd']) && $_REQUEST['wikiAdd'] == 'Search') {
		$wikiWritten = Query::escape_string($_REQUEST['wikiA']);
		$result = add(6, $wikiWritten, "Wiki");
		$wikiPerson = members(6, "Wiki");		
		}
	
	else if (isset($_REQUEST['wikiRemove']) && $_REQUEST['wikiRemove'] == 'Search') {
		$wikiWritten = Query::escape_string($_REQUEST['wikiR']);
		$result = remove(6, $wikiWritten, "Wiki");
		$wikiPerson = members(6, "Wiki");		
	}
	
	
echo <<<HEREDOC
<h2>Admin Powers</h2>
<form style="margin-top: 1em">
	<p>THIS IS FOR ADMIN VP! PLEASE READ THIS INSTRUCTION BEFORE YOU USE THIS!!! DON'T PLAY AROUND WITH THIS! NO DECIMAL NUMBER, COMMAS, ANYTHING THAT 	COULD MESS THINGS UP!<br>
	<br>
	Admin VP! Before adding all the new members, please do not forget to make a new table in the database for the previous semester! The instruction is below. More detailed version will be on your Admin VP Manual. <br>
	<br>
	CREATE TABLE new_table_name LIKE apo_permissions_groups;<br>
	INSERT INTO new_table_name SELECT * FROM apo_permissions_groups;<br>
	<br>
	new_table_name should be like apo_permissions_groups_fa11 but with different semester at the end.<br>
	<br>
	You give people Admin Powers by typing their User IDs. Please do one person at a time! Don't put multiple users at once! 
	To find the User ID of an active, go to the Brothers Tab, and Quick Search the person and click on his/her name.
	The User ID will be at the end of his/her URL. For example, if you want to add or remove Tomomasa Terazaki from
	one of the powers, Quick Search Tomo, Tomomasa Terazaki should pop up, then click on his name. At the end of the URL
	says, user_id=1190, which means Tomomasa Terazaki's User ID is 1190, so you type 1190 to the text fields to add or
	remove him from admin powers. Or you can use: <a href="user_id.php">User ID List</a>.<br>
<br>
	<font color="red"><b>$result</b></font><br>
	<br>
	
	<form>
	Admin Add: <input type="text" name="adminA" value="" /><br>
	<button type="submit" name="adminAdd" value="Search"> Add </button><br>
	</form>
	
	<form>
	Admin Remove: <input type="text" name="adminR" value="" /><br>
	<button type="submit" name="adminRemove" value="Search"> Remove </button><br>	
	</form>
	
	<br>
	$admincommPerson<br>	
	<br>
	
	<form>
	ExComm Add: <input type="text" name="excommA" value="" /><br>
	<button type="submit" name="excommAdd" value="Search"> Add </button><br>
	</form>

	<form>
	ExComm Remove: <input type="text" name="excommR" value="" /><br>
	<button type="submit" name="excommRemove" value="Search"> Remove </button><br>	
	</form>

	<br>
	$excommPerson<br>	
	<br>
	
	<form>
	PComm Add: <input type="text" name="pcommA" value="" /><br>
	<button type="submit" name="pcommAdd" value="Search"> Add </button><br>
	</form>

	<form>
	PComm Remove: <input type="text" name="pcommR" value="" /><br>
	<button type="submit" name="pcommRemove" value="Search"> Remove </button><br>	
	</form>
	
	<br>
	$pcommPerson<br>	
	<br>
	
	<form>
	WebComm Add: <input type="text" name="webcommA" value="" /><br>
	<button type="submit" name="webcommAdd" value="Search"> Add </button><br>
	</form>

	<form>
	WebComm Remove: <input type="text" name="webcommR" value="" /><br>
	<button type="submit" name="webcommRemove" value="Search"> Remove </button><br>	
	</form>

	<br>
	$webcommPerson<br>	
	<br>

	<form>
	Wiki Add: <input type="text" name="wikiA" value="" /><br>
	<button type="submit" name="wikiAdd" value="Search"> Add </button><br>
	</form>

	<form>
	Wiki Remove: <input type="text" name="wikiR" value="" /><br>
	<button type="submit" name="wikiRemove" value="Search"> Remove </button><br>	
	</form>

	<br>
	$wikiPerson<br>	
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
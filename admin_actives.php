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

function currentMembers() {
	$person = "Current Actives List: <br>";
	$query = new Query(sprintf("
	select * from apo_actives"));
	while ($row = $query->fetch_row()) {
		$queryPerson = new Query(sprintf("
		select * from apo_users where user_id = %s
		", $row['user_id']));
		$rowPerson = $queryPerson->fetch_row();
		$person .= $rowPerson['user_id'] . " = " . $rowPerson['firstname'] . " " . $rowPerson['lastname'] . " (" . 	$rowPerson['pledgeclass'] . ") <br>";
	}
	return $person;
}

function add($user_id) {
	if (is_numeric($user_id)) {				
		$queryCheckOne = new Query(sprintf("SELECT * FROM apo_actives WHERE user_id = %s", $user_id));	
		$rowCheckOne = $queryCheckOne->fetch_row();
		$queryCheckTwo = new Query(sprintf("SELECT * FROM apo_users WHERE user_id = %s AND disabled = 0", $user_id));
		$rowCheckTwo = $queryCheckTwo->fetch_row();
		if ($rowCheckOne == false) {
			if ($rowCheckTwo != false)
			{
			$query = new Query("start transaction");
			$query = new Query(sprintf("INSERT INTO apo_actives values (%s)", $user_id));	
			$query = new Query("commit");	
			$result = "SUCCESSFUL ADDING";	
			}
			else {
				$result = "NOT A VALID NUMBER (USER ID DOES NOT EXIST)";
			}
		}
		else {
			$result = "MEMBER ALREADY IN THE LIST SO CANNOT ADD";		
		}
	}
	else {
		$result = "NOT A NUMBER";
	}
	return $result;
}

function remove($user_id) {
	if (is_numeric($user_id)) {				
		$queryCheckOne = new Query(sprintf("SELECT * FROM apo_actives WHERE user_id = %s", $user_id));	
		$rowCheckOne = $queryCheckOne->fetch_row();
		$queryCheckTwo = new Query(sprintf("SELECT * FROM apo_users WHERE user_id = %s AND disabled = 0", $user_id));
		$rowCheckTwo = $queryCheckTwo->fetch_row();
		if ($rowCheckOne != false) {
			if ($rowCheckTwo != false)
			{
			$query = new Query("start transaction");
			$query = new Query(sprintf("DELETE FROM apo_actives where user_id = %s", $user_id));	
			$query = new Query("commit");	
			$result = "SUCCESSFUL REMOVING";					
			}
			else {		
				$result = "NOT A VALID NUMBER (USER ID DOES NOT EXIST)";
			}
		}
		else {
			$result = "MEMBER DOES NOT EXIST IN THE LIST TO REMOVE";		
		}
	}
	else {
		$result = "NOT A NUMBER";
	}
	return $result;
}

$actives = currentMembers();

if (!$g_user->is_logged_in() || !$g_user->permit("admin view requirements")) {
	trigger_error("You must be logged in as an admin to access this feature", E_USER_ERROR);
} else {

	if (isset($_REQUEST['activeAdd']) && $_REQUEST['activeAdd'] == 'Search') {
		$activeWritten = Query::escape_string($_REQUEST['activeA']);
		$result = add($activeWritten);
		$actives = currentMembers();
	}
	
	else if (isset($_REQUEST['activeRemove']) && $_REQUEST['activeRemove'] == 'Search') {
		$activeWritten = Query::escape_string($_REQUEST['activeR']);
		$result = remove($activeWritten);
		$actives = currentMembers();
	}
		
echo <<<HEREDOC
<h2>Active List</h2>
<form style="margin-top: 1em">
	<p>PLEASE READ THIS INSTRUCTION BEFORE YOU USE THIS!!! DON'T PLAY AROUND WITH THIS! NO DECIMAL NUMBER, COMMAS, ANYTHING THAT COULD MESS THINGS UP!<br>
	<br>
	You need to update the Actives list when the new semester starts. This is important for MVP Power. Before you start
	adding and removing people, you need to make a table for last semester's actives list.<br>
	<br>
	CREATE TABLE new_table_name LIKE apo_actives;<br>
	INSERT INTO new_table_name SELECT * FROM apo_actives;<br>
	<br>
	new_table_name should be like apo_actives_fa11 but with different semester at the end.<br>
	<br>
	To find the User ID of an active, go to the Brothers Tab, and Quick Search the person and click on his/her name.
	The User ID will be at the end of his/her URL. For example, if you want to add or remove Tomomasa Terazaki from
	one of the mailig list, Quick Search Tomo, Tomomasa Terazaki should pop up, then click on his name. At the end of the URL
	says, user_id=1190, which means Tomomasa Terazaki's User ID is 1190, so you type 1190 to the text fields to add or
	remove him. Or you can use: <a href="user_id.php">User ID List</a>. Please do one person at a time! Don't put multiple 
	users at once! <br>
	<br>
	<font color="red"><b>$result</b></font><br>
	<br>

	<form>
	Active List Add: <input type="text" name="activeA" value="" /><br>
	<button type="submit" name="activeAdd" value="Search"> Add </button><br>
	</form>
	
	<form>
	Active List Remove: <input type="text" name="activeR" value="" /><br>
	<button type="submit" name="activeRemove" value="Search"> Remove </button><br>	
	</form>
	
	<br>
	$actives<br>	
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
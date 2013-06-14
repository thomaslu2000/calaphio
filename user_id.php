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

if (!$g_user->is_logged_in()) {
	trigger_error("You must be logged in to view this page.");
} else {

if (!$g_user->is_logged_in() || !$g_user->permit("admin view requirements")) {
	trigger_error("You must be logged in as an admin to access this feature", E_USER_ERROR);
} else {
	
echo <<<HEREDOC
<h2>User ID</h2>
<br>
HEREDOC;

$query = new Query(sprintf("SELECT user_id, firstname, lastname, pledgeclass FROM apo_users WHERE disabled = 0 ORDER BY lastname"));

while ($row = $query->fetch_row()) {
	
	$user_id = $row['user_id'];
	$firstname = $row['firstname'];
	$lastname = $row['lastname'];
	$pledgeclass = $row['pledgeclass'];

echo <<<HEREDOC
	<form>
	$user_id = $firstname $lastname ($pledgeclass)
	</form>
HEREDOC;

}
}
}

?>
<?php
Template::print_body_footer();
Template::print_disclaimer();
?>
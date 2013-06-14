<?php
require("include/includes.php");
require("include/Calendar.class.php");
require("include/Template.class.php");
Template::print_head(array());
Template::print_body_header('Brothers', 'ROSTER');
if (!$g_user->is_logged_in()) {
	trigger_error("You must be logged in to view the roster.", E_USER_ERROR);
} else {
	echo <<<HEREDOC
<table>
<tr><th style="font-weight: bold">Name</th><th style="font-weight: bold">Pledgeclass</th><th style="font-weight: bold">Birthday</th></tr>

HEREDOC;
	$query = new Query(sprintf("SELECT apo_users.user_id, firstname, lastname, pledgeclass, birthday FROM apo_users join apo_actives using (user_id) order by birthday"));
	while ($row = $query->fetch_row()) {
		$birthday = $row['birthday'] ? date("M d, Y", strtotime($row['birthday'])) : "";
		echo <<<HEREDOC
<tr><td>$row[lastname], $row[firstname]</td><td>$row[pledgeclass]</td><td>$birthday</td></tr>

HEREDOC;
	}

	$query = new Query(sprintf("SELECT apo_users.user_id, firstname, lastname, pledgeclass, birthday FROM apo_users join apo_pledges using (user_id) where depledged = 0 order by birthday"));
	while ($row = $query->fetch_row()) {
		$birthday = $row['birthday'] ? date("M d, Y", strtotime($row['birthday'])) : "";
		echo <<<HEREDOC
<tr><td>$row[lastname], $row[firstname]</td><td>$row[pledgeclass]</td><td>$birthday</td></tr>

HEREDOC;
	}
	echo "</table>\r\n";
}
Template::print_body_footer();
Template::print_disclaimer();
?>
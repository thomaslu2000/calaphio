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
<tr><th style="font-weight: bold">Name</th><th style="font-weight: bold">Pledgeclass</th><th style="font-weight: bold">T-Shirt Size</th></tr>

HEREDOC;
	$query = new Query("SELECT firstname, lastname, pledgeclass, shirtsize FROM apo_users where pledgeclass = 'cpz' and depledged = 0 ORDER BY lastname, firstname, pledgeclass");
	while ($row = $query->fetch_row()) {
		echo <<<HEREDOC
<tr><td>$row[lastname], $row[firstname]</td><td>$row[pledgeclass]</td><td>$row[shirtsize]</td></tr>

HEREDOC;
	}

	$query = new Query(sprintf("SELECT apo_users.user_id, firstname, lastname, pledgeclass, shirtsize FROM apo_users join apo_actives using (user_id) order by lastname, firstname"));

	while ($row = $query->fetch_row()) {
		echo <<<HEREDOC
<tr><td>$row[lastname], $row[firstname]</td><td>$row[pledgeclass]</td><td>$row[shirtsize]</td></tr>

HEREDOC;
	}
	echo "</table>\r\n";
}
Template::print_body_footer();
Template::print_disclaimer();
?>
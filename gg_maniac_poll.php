<?php
require("include/includes.php");
require("include/Template.class.php");
require("include/Calendar.class.php");
Template::print_head(array());
Template::print_body_header('Home', 'ADMIN');
if (!$g_user->is_logged_in() || !$g_user->permit("admin change passphrase") || $g_user->data['user_id'] != 4772) /* 4772 = Brian's (SP18 Historian) ID */ {
	trigger_error("You must be logged in as a historian to access this feature", E_USER_ERROR);
} else {

$query = new Query(sprintf("SELECT poll_name FROM gg_maniac_polls WHERE id=%s", $_REQUEST['id']));
$row = $query->fetch_row();
$poll_name = $row['poll_name'];

$table_rows = '<tr>
			   <td style="font-weight:bold;width:200px;padding-top:.5em;padding-bottom:.5em;padding-left:.5em"> Name </td>
			   <td style="font-weight:bold;width:200px;padding-top:.5em;padding-bottom:.5em;padding-left:.5em"> Voted For </td>
			   <td style="font-weight:bold;width:500px;padding-top:.5em;padding-bottom:.5em;padding-left:.5em;word-wrap: break-word;"> Reason </td>
			   <tr>';
$query = new Query(sprintf("SELECT concat(apo_users.firstname, ' ', apo_users.lastname) AS fullname, gg_maniac_votes.name, gg_maniac_votes.reason FROM apo_users INNER JOIN gg_maniac_votes ON apo_users.user_id = gg_maniac_votes.user_id WHERE poll_id=%s", $_REQUEST['id']));
while ($row = $query->fetch_row()) {
	$fullname = $row['fullname'];
	$name = $row['name'];
	$reason = $row['reason'];
	$table_rows .= <<<DOCHERE
					<tr>
					<td style="width:200px;padding-top:.5em;padding-bottom:.5em;padding-left:.5em"> $fullname </td>
					<td style="width:200px;padding-top:.5em;padding-bottom:.5em;padding-left:.5em"> $name </td>
					<td style="width:500px;padding-top:.5em;padding-bottom:.5em;padding-left:.5em;word-wrap: break-word;"> $reason </td>
					<tr>
DOCHERE;
}

echo <<<DOCHERE
	<h2>$poll_name</h2>
	<div style="margin-top:1em">
		<table border="1">
			$table_rows
		</table>
	</div>
DOCHERE;
}

Template::print_body_footer();
Template::print_disclaimer();
?>
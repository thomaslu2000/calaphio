<?php
require("include/includes.php");
require("include/Template.class.php");
require("include/Calendar.class.php");
Template::print_head(array());
Template::print_body_header('Home', 'ADMIN');
if (!$g_user->is_logged_in() || !$g_user->permit("admin change passphrase")) {
	trigger_error("You must be logged in as an admin to access this feature", E_USER_ERROR);
	return;
} else if (isset($_REQUEST['cancel'])) {
	$poll_id = $_REQUEST['cancel'];
	$query = new Query(sprintf("UPDATE gg_maniac_polls SET cancelled=TRUE WHERE id=%s", $poll_id));
	header( 'Location: http://members.calaphio.com/admin_GG_maniac.php' );
} else if (isset($_REQUEST['month']) && isset($_REQUEST['day']) && isset($_REQUEST['year']) && isset($_REQUEST['poll_name'])) {
	if ($_REQUEST['poll_name'] == "") {
		trigger_error("Cannot Create Poll w/ no Poll Name", E_USER_ERROR);	
	} else {
		$start_time = time();
		$end_time = mktime(23, 59, 59, $_REQUEST['month'], $_REQUEST['day'], $_REQUEST['year']);
		$poll_name = $_REQUEST['poll_name'];
		$query = new Query(sprintf("INSERT INTO gg_maniac_polls SET start_time='%s', end_time='%s', cancelled=FALSE, poll_name='%s'", date( 'Y-m-d H:i:s', $start_time), date( 'Y-m-d H:i:s', $end_time), $poll_name));
	}
}

$current_time = time();
$current_day = date( 'd', $current_time);
$current_month =  date( 'm', $current_time);
$current_year =  date( 'Y', $current_time);
$calendar = new Calendar();
$date_days = $calendar->format_list_days("", $current_day);
$date_months = $calendar->format_list_months("", $current_month);
$date_years = $calendar->format_list_years("", $current_year);

$polls = "";
$query = new Query(sprintf("SELECT id, end_time, poll_name, cancelled FROM gg_maniac_polls ORDER BY end_time ASC"));
while ($row = $query->fetch_row()) {
	if (!$row['cancelled']) {
		$poll_id = $row['id'];
		$poll_name = $row['poll_name'];
		$poll_end_time = $row['end_time'];
		$poll_link = "gg_maniac_poll.php" . "?id=" . $poll_id; 
		$remove_poll_link = "admin_GG_maniac.php" . "?cancel=" . $poll_id;
		$polls = $polls . '<div><a href="'. $poll_link . '">' . $poll_name . '</a> <span> Expires on: ' . $poll_end_time . '</span>' . '<a href="' . $remove_poll_link . '"> Remove Poll </a></div>';
	}
}

echo <<<DOCHERE_print_gg_maniac_poll_create
	<h2>Create GG Maniac Poll</h2>
	<div style="margin-top:1em">
		<form id="addEventForm" action="#" method="post" onsubmit="">
			<span style="font-weight:bold;margin-right:1em"> Poll Name </span>
			<input type="text" name="poll_name">
			</br>
			<span style="font-weight:bold;margin-right:1em"> Poll Expiration Date </span>
    		<select id="addEventMonth" name="month">$date_months</select>
    		<select id="addEventDay" name="day">$date_days</select>
    		<select id="addEventYear" name="year">$date_years</select>
    		<input class="btn btn-primary btn-small" type="submit" value="Create Poll">
    	</form>
	</div>	
	<h2 style="margin-top:1em"> Current GG Maniac Polls </h2>
	<div style="margin-top:1em">
		$polls
	</div>
DOCHERE_print_gg_maniac_poll_create;

Template::print_body_footer();
Template::print_disclaimer();
?>
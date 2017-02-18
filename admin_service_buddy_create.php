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
	$id = $_REQUEST['cancel'];
	$query = new Query(sprintf("UPDATE apo_service_buddy SET canceled=TRUE WHERE id=%d", $id));
	header( 'Location: http://live.calaphio.com/admin_service_buddy_create.php' );
} else if (isset($_REQUEST['month']) && isset($_REQUEST['day']) && isset($_REQUEST['year']) && isset($_REQUEST['person1']) && 
	isset($_REQUEST['endMonth']) && isset($_REQUEST['endDay']) && isset($_REQUEST['endYear']) && isset($_REQUEST['person2'])) {
	$start_time = mktime(0, 0, 0, $_REQUEST['month'], $_REQUEST['day'], $_REQUEST['year']);
	$end_time = mktime(23, 59, 59, $_REQUEST['endMonth'], $_REQUEST['endDay'], $_REQUEST['endYear']);
	$query = new Query(sprintf("INSERT INTO apo_service_buddy SET begin='%s', end='%s', user_id=%d, buddy_id = %d" , date( 'Y-m-d H:i:s', $start_time), date( 'Y-m-d H:i:s', $end_time), $_REQUEST['person1'], $_REQUEST['person2']));
}

$current_time = time();
$current_day = date( 'd', $current_time);
$current_month =  date( 'm', $current_time);
$current_year =  date( 'Y', $current_time);
$calendar = new Calendar();
$date_days = $calendar->format_list_days("", $current_day);
$date_months = $calendar->format_list_months("", $current_month);
$date_years = $calendar->format_list_years("", $current_year);
$people = "";
$query = new Query(sprintf("SELECT apo_users.user_id as user_id, firstname, lastname FROM apo_users where apo_users.user_id IN (SELECT user_id from apo_actives UNION SELECT user_id from apo_pledges) ORDER BY firstname ASC"));
while ($row = $query->fetch_row()) {
	$user_id = $row['user_id'];
	$firstname = $row['firstname'];
	$lastname = $row['lastname'];
	$people = $people . '<option class="" value="' . $user_id . '" >' . $firstname . " " . $lastname . '</option>';
}

$buddies = "";
$query = new Query(sprintf("SELECT canceled, B.id, B.user_id, B.buddy_id, begin, end, U1.firstname AS firstname, U1.lastname AS lastname, U2.firstname AS firstname2, U2.lastname AS lastname2 FROM apo_service_buddy B, apo_users U1, apo_users U2 WHERE B.user_id = U1.user_id AND B.buddy_id = U2.user_id ORDER BY firstname ASC"));
while ($row = $query->fetch_row()) {
	if (!$row['canceled']) {
		$person1 = $row['user_id'];
		$person2 = $row['buddy_id'];
		$id = $row['id'];
		$begin = $row['begin'];
		$end = $row['end'];
		$buddy_link = "apo_service_buddy.php" . "?id=" . $id; 
		$remove_buddy_link = "https://members.calaphio.com/admin_service_buddy_create.php" . "?cancel=" . $id;
		$buddies = $buddies . '<div><a href="'. $buddy_link . '">' . $row['firstname'] . " " . $row['lastname'] . " & " . $row['firstname2'] . " " . $row['lastname2'] . '</a> <span> Begin: ' . $begin . '</span>' . '<span> End: ' . $end . '</span>' . '<a href="' . $remove_buddy_link . '"> Delete Pair </a></div>';
	}
}

echo <<<DOCHERE_print_service_buddy_create
	<h2>Create Service Buddy Pair </h2>
	<div style="margin-top:1em">
		<form id="addEventForm" action="#" method="post" onsubmit="">
			<span style="font-weight:bold;margin-right:1em"> Person 1 </span>
			<select id="p1" name="person1">$people</select>
			</br>
			<span style="font-weight:bold;margin-right:1em"> Person 2 </span>
			<select id="p2" name="person2">$people</select>
			</br>
			<span style="font-weight:bold;margin-right:1em"> Start Date </span>
    		<select id="addEventMonth" name="month">$date_months</select>
    		<select id="addEventDay" name="day">$date_days</select>
    		<select id="addEventYear" name="year">$date_years</select>
    		</br>
    		<span style="font-weight:bold;margin-right:1em"> End Date </span>
    		<select id="addEventMonth" name="endMonth">$date_months</select>
    		<select id="addEventDay" name="endDay">$date_days</select>
    		<select id="addEventYear" name="endYear">$date_years</select>
    		<input class="btn btn-primary btn-small" type="submit" value="Create Pair">
    	</form>
	</div>	
	<h2 style="margin-top:1em"> Current Service Buddies </h2>
	<div style="margin-top:1em">
		$buddies
	</div>
DOCHERE_print_service_buddy_create;

Template::print_body_footer();
Template::print_disclaimer();
?>
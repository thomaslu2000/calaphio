<?php
require("include/includes.php");
require("include/Template.class.php");
require ('GCalendar.class.php');
Template::print_head(array());
Template::print_body_header('Home', 'ADMIN');
if (!$g_user->is_logged_in() || !$g_user->permit("admin account disable")) {
	trigger_error("You must be logged in as an admin to access this feature", E_USER_ERROR);
} else {
	if (isset($_POST['submit'])) {
        $enddate = $_POST['enddate'];
        $gcal = new GCalendar();
        $startdate = $_POST['startdate'];
		$query = new Query("SELECT event_id, title, location, description, start_at, end_at, type_service_chapter, type_service_campus, type_service_community, type_service_country, type_fellowship FROM apo_calendar_event WHERE date >= '$startdate' AND date <= '$enddate' AND deleted=0");
        while ($row = $query->fetch_row()) {
            if($row['type_service_chapter'] ||  $row['type_service_campus'] || $row['type_service_community'] || $row['type_service_country']) {
                $gcal_type = "service";
            } elseif ($row['type_fellowship']) {
                $gcal_type = "fellowship";
            } else {
                $gcal_type = "none";
            }
            $gcal->addEvent($row['title'], $row['location'], $row['description'], $row['start_at'], $row['end_at'], $row['event_id'], $gcal_type);
        }
        echo "Events added to calendar";
    }
    $today = date("Y-m-d");
	echo <<<HEREDOC

<h1>Add / Update all events in the following days to google calendar? </h1>
<form method="post" action="">
<p>Start date: <input type="text" name="startdate" value="$today" /> End date: <input type="text" name="enddate" value="$today" />
<button type="submit" name="submit">YES</button>
</form>


HEREDOC;
}
Template::print_body_footer();
Template::print_disclaimer();
?>
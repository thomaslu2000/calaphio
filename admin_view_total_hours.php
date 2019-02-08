<?php
require("include/includes.php");
require("include/Template.class.php");
Template::print_head(array('admin_view_requirements.css'));
Template::print_body_header('Home', 'ADMIN');

if ($g_user->is_logged_in()) {

$view_hours_code = '<h1>View Total Service Hours</h1>
<p style="padding: 1em 0px">Note that this is only as accurate as what is reported on the calendar. Events need to be <strong>evaluated</strong> and marked with the appropriate event types to count.</p>
<table style="width: auto;">
<caption></caption>
<tr><th axis="semester" style="width: 40%; font-weight: bold; padding: 0px 2px">Semester</th><th axis="hours" style="width: 20%; font-weight: bold; padding: 0px 2px">Service Hours</th><th axis="projects" style="width: 20%; font-weight: bold; padding: 0px 2px">Service Events</th><th axis="fellowships" style="width: 20%; font-weight: bold; padding: 0px 2px">Fellowships</th></tr>';

$semesters_query = new Query("SELECT semester, start, end, namesake_short FROM apo_semesters ORDER BY id DESC");
while ($semester = $semesters_query->fetch_row()) {
    $start = $semester['start'];
    $end = $semester['end'];
    $sem = $semester['semester'];
    $namesake = $semester['namesake_short'];
    $dates = date("M d, Y", strtotime($start)) . " - " . date("M d, Y", strtotime($end));
    $query = new Query("
            SELECT sum(hours) AS hours FROM apo_calendar_event
                JOIN apo_calendar_attend USING (event_id)
                WHERE (type_service_chapter=TRUE OR type_service_campus=TRUE OR type_service_community=TRUE OR type_service_country=TRUE OR type_fundraiser=TRUE)
                AND flaked=FALSE AND attended=TRUE AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
    $row = $query->fetch_row();
    $hours = round($row['hours']);
    $query = new Query("
		SELECT count(*) AS count FROM apo_calendar_event
			WHERE (type_service_chapter=TRUE OR type_service_campus=TRUE OR type_service_community=TRUE OR type_service_country=TRUE OR type_fundraiser=TRUE)
			AND evaluated=TRUE AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
    $row = $query->fetch_row();
    $projects = $row['count'];

    $query = new Query("
            SELECT count(*) AS count FROM apo_calendar_event
                WHERE (type_fellowship=TRUE)
                AND evaluated=TRUE AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
    $row = $query->fetch_row();
    $fellowships = $row['count'];
    $view_hours_code .= "
    <tr align='center'><td axis='semester'> $dates ($sem) <br> $namesake Semester</td><td axis='hours'>$hours</td><td axis='hours'>$projects</td><td axis='hours'>$fellowships</td></tr>";  
}
$view_hours_code .= "</table>";
echo $view_hours_code;
}

Template::print_body_footer();
Template::print_disclaimer();

?>
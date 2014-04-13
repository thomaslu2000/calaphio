<?php
require("include/includes.php");
require("include/Template.class.php");
Template::print_head(array('admin_view_requirements.css'));
Template::print_body_header('Home', 'ADMIN');

$start = '2012-8-28';
$end = '2012-11-27';
$query = new Query("
		SELECT sum(hours) AS hours FROM apo_calendar_event
			JOIN apo_calendar_attend USING (event_id)
			WHERE (type_service_chapter=TRUE OR type_service_campus=TRUE OR type_service_community=TRUE OR type_service_country=TRUE OR type_fundraiser=TRUE)
			AND flaked=FALSE  AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$fall12 = $row['hours'];
$fall12_dates = date("M d, Y", strtotime($start)) . " - " . date("M d, Y", strtotime($end));

$query = new Query("
		SELECT count(*) AS count FROM apo_calendar_event
			WHERE (type_service_chapter=TRUE OR type_service_campus=TRUE OR type_service_community=TRUE OR type_service_country=TRUE OR type_fundraiser=TRUE)
			 AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$fall12_projects = $row['count'];

$query = new Query("
		SELECT count(*) AS count FROM apo_calendar_event
			WHERE (type_fellowship=TRUE)
			 AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$fall12_fellowships = $row['count'];

$start = '2013-1-22';
$end = '2013-4-30';
$query = new Query("
		SELECT sum(hours) AS hours FROM apo_calendar_event
			JOIN apo_calendar_attend USING (event_id)
			WHERE (type_service_chapter=TRUE OR type_service_campus=TRUE OR type_service_community=TRUE OR type_service_country=TRUE OR type_fundraiser=TRUE)
			AND flaked=FALSE  AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$spring13 = $row['hours'];
$spring13_dates = date("M d, Y", strtotime($start)) . " - " . date("M d, Y", strtotime($end));

$query = new Query("
		SELECT count(*) AS count FROM apo_calendar_event
			WHERE (type_service_chapter=TRUE OR type_service_campus=TRUE OR type_service_community=TRUE OR type_service_country=TRUE OR type_fundraiser=TRUE)
			 AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$spring13_projects = $row['count'];

$query = new Query("
		SELECT count(*) AS count FROM apo_calendar_event
			WHERE (type_fellowship=TRUE)
			 AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$spring13_fellowships = $row['count'];

$start = '2013-9-3';
$end = '2013-12-3';
$query = new Query("
		SELECT sum(hours) AS hours FROM apo_calendar_event
			JOIN apo_calendar_attend USING (event_id)
			WHERE (type_service_chapter=TRUE OR type_service_campus=TRUE OR type_service_community=TRUE OR type_service_country=TRUE OR type_fundraiser=TRUE)
			AND flaked=FALSE  AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$fall13 = $row['hours'];
$fall13_dates = date("M d, Y", strtotime($start)) . " - " . date("M d, Y", strtotime($end));

$query = new Query("
		SELECT count(*) AS count FROM apo_calendar_event
			WHERE (type_service_chapter=TRUE OR type_service_campus=TRUE OR type_service_community=TRUE OR type_service_country=TRUE OR type_fundraiser=TRUE)
			 AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$fall13_projects = $row['count'];

$query = new Query("
		SELECT count(*) AS count FROM apo_calendar_event
			WHERE (type_fellowship=TRUE)
			 AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$fall13_fellowships = $row['count'];

$start = '2014-1-21';
$end = '2014-4-29';
$query = new Query("
		SELECT sum(hours) AS hours FROM apo_calendar_event
			JOIN apo_calendar_attend USING (event_id)
			WHERE (type_service_chapter=TRUE OR type_service_campus=TRUE OR type_service_community=TRUE OR type_service_country=TRUE OR type_fundraiser=TRUE)
			AND flaked=FALSE  AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$spring14 = $row['hours'];
$spring14_dates = date("M d, Y", strtotime($start)) . " - " . date("M d, Y", strtotime($end));

$query = new Query("
		SELECT count(*) AS count FROM apo_calendar_event
			WHERE (type_service_chapter=TRUE OR type_service_campus=TRUE OR type_service_community=TRUE OR type_service_country=TRUE OR type_fundraiser=TRUE)
			 AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$spring14_projects = $row['count'];

$query = new Query("
		SELECT count(*) AS count FROM apo_calendar_event
			WHERE (type_fellowship=TRUE)
			 AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$spring14_fellowships = $row['count'];

	
	echo <<<HEREDOC
<h1>View Total Service Hours</h1>
<p style="padding: 1em 0px">This is a service report on the calendar showing as much data on the progress and trends of service events!</p>
<table style="width: auto;">
<caption></caption>
<tr><th axis="semester" style="width: 300px; font-weight: bold; padding: 0px 2px">Semester</th><th axis="hours" style="width: 70px; font-weight: bold; padding: 0px 2px">Service Hours</th><th axis="projects" style="width: 70px; font-weight: bold; padding: 0px 2px">Service Events</th><th axis="fellowships" style="width: 100px; font-weight: bold; padding: 0px 2px">Fellowships</th><th axis="Comments" style="font-weight: bold; padding: 0px 2px">Comments</th></tr>
<tr><td axis="semester">$fall12_dates (Fall 2012) MH Semester</td><td axis="hours">$fall12</td><td axis="hours">$fall12_projects</td><td axis="hours">$fall12_fellowships</td><td axis="comments"></td></tr>
<tr><td axis="semester">$spring13_dates (Spring 2013) KK Semester</td><td axis="hours">$spring13</td><td axis="hours">$spring13_projects</td><td axis="hours">$spring13_fellowships</td><td axis="comments"></td></tr>
<tr><td axis="semester">$fall13_dates (Fall 2013) DE Semester</td><td axis="hours">$fall13</td><td axis="hours">$fall13_projects</td><td axis="hours">$fall13_fellowships</td><td axis="comments"></td></tr>
<tr><td axis="semester">$spring14_dates (Spring 2014) CM Semester</td><td axis="hours">$fall13</td><td axis="hours">$spring14_projects</td><td axis="hours">$spring14_fellowships</td><td axis="comments"></td></tr>
</table>

HEREDOC;

Template::print_body_footer();
Template::print_disclaimer();
?>
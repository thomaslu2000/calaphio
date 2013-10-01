<?php
require("include/includes.php");
require("include/Template.class.php");
Template::print_head(array('admin_view_requirements.css'));
Template::print_body_header('Home', 'ADMIN');

$start = '2004-08-23';
$end = '2004-12-13';
$query = new Query("
		SELECT sum(hours) AS hours FROM apo_calendar_event
			JOIN apo_calendar_attend USING (event_id)
			WHERE (type_service_chapter=TRUE OR type_service_campus=TRUE OR type_service_community=TRUE OR type_service_country=TRUE OR type_fundraiser=TRUE)
			AND flaked=FALSE AND attended=TRUE AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$fall04 = $row['hours'];
$fall04_dates = date("M d, Y", strtotime($start)) . " - " . date("M d, Y", strtotime($end));

$query = new Query("
		SELECT count(*) AS count FROM apo_calendar_event
			WHERE (type_service_chapter=TRUE OR type_service_campus=TRUE OR type_service_community=TRUE OR type_service_country=TRUE OR type_fundraiser=TRUE)
			AND evaluated=TRUE AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$fall04_projects = $row['count'];

$query = new Query("
		SELECT count(*) AS count FROM apo_calendar_event
			WHERE (type_fellowship=TRUE)
			AND evaluated=TRUE AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$fall04_fellowships = $row['count'];

$start = '2005-01-10';
$end = '2005-05-11';
$query = new Query("
		SELECT sum(hours) AS hours FROM apo_calendar_event
			JOIN apo_calendar_attend USING (event_id)
			WHERE (type_service_chapter=TRUE OR type_service_campus=TRUE OR type_service_community=TRUE OR type_service_country=TRUE OR type_fundraiser=TRUE)
			AND flaked=FALSE AND attended=TRUE AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$spring05 = $row['hours'];
$spring05_dates = date("M d, Y", strtotime($start)) . " - " . date("M d, Y", strtotime($end));

$query = new Query("
		SELECT count(*) AS count FROM apo_calendar_event
			WHERE (type_service_chapter=TRUE OR type_service_campus=TRUE OR type_service_community=TRUE OR type_service_country=TRUE OR type_fundraiser=TRUE)
			AND evaluated=TRUE AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$spring05_projects = $row['count'];

$query = new Query("
		SELECT count(*) AS count FROM apo_calendar_event
			WHERE (type_fellowship=TRUE)
			AND evaluated=TRUE AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$spring05_fellowships = $row['count'];

$start = '2005-08-23';
$end = '2005-12-11';
$query = new Query("
		SELECT sum(hours) AS hours FROM apo_calendar_event
			JOIN apo_calendar_attend USING (event_id)
			WHERE (type_service_chapter=TRUE OR type_service_campus=TRUE OR type_service_community=TRUE OR type_service_country=TRUE OR type_fundraiser=TRUE)
			AND flaked=FALSE AND attended=TRUE AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$fall05 = $row['hours'];
$fall05_dates = date("M d, Y", strtotime($start)) . " - " . date("M d, Y", strtotime($end));

$query = new Query("
		SELECT count(*) AS count FROM apo_calendar_event
			WHERE (type_service_chapter=TRUE OR type_service_campus=TRUE OR type_service_community=TRUE OR type_service_country=TRUE OR type_fundraiser=TRUE)
			AND evaluated=TRUE AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$fall05_projects = $row['count'];

$query = new Query("
		SELECT count(*) AS count FROM apo_calendar_event
			WHERE (type_fellowship=TRUE)
			AND evaluated=TRUE AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$fall05_fellowships = $row['count'];

$start = '2006-01-09';
$end = '2006-05-19';
$query = new Query("
		SELECT sum(hours) AS hours FROM apo_calendar_event
			JOIN apo_calendar_attend USING (event_id)
			WHERE (type_service_chapter=TRUE OR type_service_campus=TRUE OR type_service_community=TRUE OR type_service_country=TRUE OR type_fundraiser=TRUE)
			AND flaked=FALSE AND attended=TRUE AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$spring06 = $row['hours'];
$spring06_dates = date("M d, Y", strtotime($start)) . " - " . date("M d, Y", strtotime($end));

$query = new Query("
		SELECT count(*) AS count FROM apo_calendar_event
			WHERE (type_service_chapter=TRUE OR type_service_campus=TRUE OR type_service_community=TRUE OR type_service_country=TRUE OR type_fundraiser=TRUE)
			AND evaluated=TRUE AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$spring06_projects = $row['count'];

$query = new Query("
		SELECT count(*) AS count FROM apo_calendar_event
			WHERE (type_fellowship=TRUE)
			AND evaluated=TRUE AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$spring06_fellowships = $row['count'];

$start = '2006-08-21';
$end = '2006-12-19';
$query = new Query("
		SELECT sum(hours) AS hours FROM
		(
			(SELECT sum(hours) AS hours FROM apo_calendar_event
				JOIN apo_calendar_attend USING (event_id)
				WHERE (type_service_chapter=TRUE OR type_service_campus=TRUE OR type_service_community=TRUE OR type_service_country=TRUE OR type_fundraiser=TRUE)
				AND flaked=FALSE AND attended=TRUE AND deleted=FALSE AND date BETWEEN '$start' AND '$end')
		UNION
			(SELECT count(*) AS hours FROM apo_calendar_event
				JOIN apo_calendar_attend USING (event_id)
				WHERE (type_service_chapter=TRUE OR type_service_campus=TRUE OR type_service_community=TRUE OR type_service_country=TRUE OR type_fundraiser=TRUE)
				AND flaked=FALSE AND attended=TRUE AND deleted=FALSE AND date BETWEEN '$start' AND '$end' AND driver != 0)
		) AS foo");
$row = $query->fetch_row();
$fall06 = $row['hours'];
$fall06_dates = date("M d, Y", strtotime($start)) . " - " . date("M d, Y", strtotime($end));

$query = new Query("
		SELECT count(*) AS count FROM apo_calendar_event
			WHERE (type_service_chapter=TRUE OR type_service_campus=TRUE OR type_service_community=TRUE OR type_service_country=TRUE OR type_fundraiser=TRUE)
			AND evaluated=TRUE AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$fall06_projects = $row['count'];

$query = new Query("
		SELECT count(*) AS count FROM apo_calendar_event
			WHERE (type_fellowship=TRUE)
			AND evaluated=TRUE AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$fall06_fellowships = $row['count'];

$start = '2007-01-08';
$end = '2007-05-18';
$query = new Query("
		SELECT sum(hours) AS hours FROM apo_calendar_event
			JOIN apo_calendar_attend USING (event_id)
			WHERE (type_service_chapter=TRUE OR type_service_campus=TRUE OR type_service_community=TRUE OR type_service_country=TRUE OR type_fundraiser=TRUE)
			AND flaked=FALSE AND attended=TRUE AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$spring07 = $row['hours'];
$spring07_dates = date("M d, Y", strtotime($start)) . " - " . date("M d, Y", strtotime($end));

$query = new Query("
		SELECT count(*) AS count FROM apo_calendar_event
			WHERE (type_service_chapter=TRUE OR type_service_campus=TRUE OR type_service_community=TRUE OR type_service_country=TRUE OR type_fundraiser=TRUE)
			AND evaluated=TRUE AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$spring07_projects = $row['count'];

$query = new Query("
		SELECT count(*) AS count FROM apo_calendar_event
			WHERE (type_fellowship=TRUE)
			AND evaluated=TRUE AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$spring07_fellowships = $row['count'];

$start = '2007-08-20';
$end = '2007-12-11';
$query = new Query("
		SELECT sum(hours) AS hours FROM apo_calendar_event
			JOIN apo_calendar_attend USING (event_id)
			WHERE (type_service_chapter=TRUE OR type_service_campus=TRUE OR type_service_community=TRUE OR type_service_country=TRUE OR type_fundraiser=TRUE)
			AND flaked=FALSE AND attended=TRUE AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$fall07 = $row['hours'];
$fall07_dates = date("M d, Y", strtotime($start)) . " - " . date("M d, Y", strtotime($end));

$query = new Query("
		SELECT count(*) AS count FROM apo_calendar_event
			WHERE (type_service_chapter=TRUE OR type_service_campus=TRUE OR type_service_community=TRUE OR type_service_country=TRUE OR type_fundraiser=TRUE)
			AND evaluated=TRUE AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$fall07_projects = $row['count'];

$query = new Query("
		SELECT count(*) AS count FROM apo_calendar_event
			WHERE (type_fellowship=TRUE)
			AND evaluated=TRUE AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$fall07_fellowships = $row['count'];

$start = '2008-01-14';
$end = '2008-05-12';
$query = new Query("
		SELECT sum(hours) AS hours FROM apo_calendar_event
			JOIN apo_calendar_attend USING (event_id)
			WHERE (type_service_chapter=TRUE OR type_service_campus=TRUE OR type_service_community=TRUE OR type_service_country=TRUE OR type_fundraiser=TRUE)
			AND flaked=FALSE AND attended=TRUE AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$spring08 = $row['hours'];
$spring08_dates = date("M d, Y", strtotime($start)) . " - " . date("M d, Y", strtotime($end));

$query = new Query("
		SELECT count(*) AS count FROM apo_calendar_event
			WHERE (type_service_chapter=TRUE OR type_service_campus=TRUE OR type_service_community=TRUE OR type_service_country=TRUE OR type_fundraiser=TRUE)
			AND evaluated=TRUE AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$spring08_projects = $row['count'];

$query = new Query("
		SELECT count(*) AS count FROM apo_calendar_event
			WHERE (type_fellowship=TRUE)
			AND evaluated=TRUE AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$spring08_fellowships = $row['count'];

$start = '2008-08-20';
$end = '2008-12-11';
$query = new Query("
		SELECT sum(hours) AS hours FROM apo_calendar_event
			JOIN apo_calendar_attend USING (event_id)
			WHERE (type_service_chapter=TRUE OR type_service_campus=TRUE OR type_service_community=TRUE OR type_service_country=TRUE OR type_fundraiser=TRUE)
			AND flaked=FALSE AND attended=TRUE AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$fall08 = $row['hours'];
$fall08_dates = date("M d, Y", strtotime($start)) . " - " . date("M d, Y", strtotime($end));

$query = new Query("
		SELECT count(*) AS count FROM apo_calendar_event
			WHERE (type_service_chapter=TRUE OR type_service_campus=TRUE OR type_service_community=TRUE OR type_service_country=TRUE OR type_fundraiser=TRUE)
			AND evaluated=TRUE AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$fall08_projects = $row['count'];

$query = new Query("
		SELECT count(*) AS count FROM apo_calendar_event
			WHERE (type_fellowship=TRUE)
			AND evaluated=TRUE AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$fall08_fellowships = $row['count'];

$start = '2009-01-18';
$end = '2009-05-12';
$query = new Query("
		SELECT sum(hours) AS hours FROM apo_calendar_event
			JOIN apo_calendar_attend USING (event_id)
			WHERE (type_service_chapter=TRUE OR type_service_campus=TRUE OR type_service_community=TRUE OR type_service_country=TRUE OR type_fundraiser=TRUE)
			AND flaked=FALSE AND attended=TRUE AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$spring09 = $row['hours'];
$spring09_dates = date("M d, Y", strtotime($start)) . " - " . date("M d, Y", strtotime($end));

$query = new Query("
		SELECT count(*) AS count FROM apo_calendar_event
			WHERE (type_service_chapter=TRUE OR type_service_campus=TRUE OR type_service_community=TRUE OR type_service_country=TRUE OR type_fundraiser=TRUE)
			AND evaluated=TRUE AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$spring09_projects = $row['count'];

$query = new Query("
		SELECT count(*) AS count FROM apo_calendar_event
			WHERE (type_fellowship=TRUE)
			AND evaluated=TRUE AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$spring09_fellowships = $row['count'];

$start = '2009-05-27';
$end = '2009-12-10';
$query = new Query("
		SELECT sum(hours) AS hours FROM apo_calendar_event
			JOIN apo_calendar_attend USING (event_id)
			WHERE (type_service_chapter=TRUE OR type_service_campus=TRUE OR type_service_community=TRUE OR type_service_country=TRUE OR type_fundraiser=TRUE)
			AND flaked=FALSE AND attended=TRUE AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$fall09 = $row['hours'];
$fall09_dates = date("M d, Y", strtotime($start)) . " - " . date("M d, Y", strtotime($end));

$query = new Query("
		SELECT count(*) AS count FROM apo_calendar_event
			WHERE (type_service_chapter=TRUE OR type_service_campus=TRUE OR type_service_community=TRUE OR type_service_country=TRUE OR type_fundraiser=TRUE)
			AND evaluated=TRUE AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$fall09_projects = $row['count'];

$query = new Query("
		SELECT count(*) AS count FROM apo_calendar_event
			WHERE (type_fellowship=TRUE)
			AND evaluated=TRUE AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$fall09_fellowships = $row['count'];

$start = '2010-01-08';
$end = '2010-05-18';
$query = new Query("
		SELECT sum(hours) AS hours FROM apo_calendar_event
			JOIN apo_calendar_attend USING (event_id)
			WHERE (type_service_chapter=TRUE OR type_service_campus=TRUE OR type_service_community=TRUE OR type_service_country=TRUE OR type_fundraiser=TRUE)
			AND flaked=FALSE AND attended=TRUE AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$spring10 = $row['hours'];
$spring10_dates = date("M d, Y", strtotime($start)) . " - " . date("M d, Y", strtotime($end));

$query = new Query("
		SELECT count(*) AS count FROM apo_calendar_event
			WHERE (type_service_chapter=TRUE OR type_service_campus=TRUE OR type_service_community=TRUE OR type_service_country=TRUE OR type_fundraiser=TRUE)
			AND evaluated=TRUE AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$spring10_projects = $row['count'];

$query = new Query("
		SELECT count(*) AS count FROM apo_calendar_event
			WHERE (type_fellowship=TRUE)
			AND evaluated=TRUE AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$spring10_fellowships = $row['count'];

$start = '2010-05-05';
$end = '2010-12-07';
$query = new Query("
		SELECT sum(hours) AS hours FROM apo_calendar_event
			JOIN apo_calendar_attend USING (event_id)
			WHERE (type_service_chapter=TRUE OR type_service_campus=TRUE OR type_service_community=TRUE OR type_service_country=TRUE OR type_fundraiser=TRUE)
			AND flaked=FALSE AND attended=TRUE AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$fall10 = $row['hours'];
$fall10_dates = date("M d, Y", strtotime($start)) . " - " . date("M d, Y", strtotime($end));

$query = new Query("
		SELECT count(*) AS count FROM apo_calendar_event
			WHERE (type_service_chapter=TRUE OR type_service_campus=TRUE OR type_service_community=TRUE OR type_service_country=TRUE OR type_fundraiser=TRUE)
			AND evaluated=TRUE AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$fall10_projects = $row['count'];

$query = new Query("
		SELECT count(*) AS count FROM apo_calendar_event
			WHERE (type_fellowship=TRUE)
			AND evaluated=TRUE AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$fall10_fellowships = $row['count'];

$start = '2010-12-08';
$end = '2011-05-03';
$query = new Query("
		SELECT sum(hours) AS hours FROM apo_calendar_event
			JOIN apo_calendar_attend USING (event_id)
			WHERE (type_service_chapter=TRUE OR type_service_campus=TRUE OR type_service_community=TRUE OR type_service_country=TRUE OR type_fundraiser=TRUE)
			AND flaked=FALSE AND attended=TRUE AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$spring11 = $row['hours'];
$spring11_dates = date("M d, Y", strtotime($start)) . " - " . date("M d, Y", strtotime($end));

$query = new Query("
		SELECT count(*) AS count FROM apo_calendar_event
			WHERE (type_service_chapter=TRUE OR type_service_campus=TRUE OR type_service_community=TRUE OR type_service_country=TRUE OR type_fundraiser=TRUE)
			AND evaluated=TRUE AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$spring11_projects = $row['count'];

$query = new Query("
		SELECT count(*) AS count FROM apo_calendar_event
			WHERE (type_fellowship=TRUE)
			AND evaluated=TRUE AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$spring11_fellowships = $row['count'];

$start = '2011-5-3';
$end = '2011-11-29';
$query = new Query("
		SELECT sum(hours) AS hours FROM apo_calendar_event
			JOIN apo_calendar_attend USING (event_id)
			WHERE (type_service_chapter=TRUE OR type_service_campus=TRUE OR type_service_community=TRUE OR type_service_country=TRUE OR type_fundraiser=TRUE)
			AND flaked=FALSE AND attended=TRUE AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$fall11 = $row['hours'];
$fall11_dates = date("M d, Y", strtotime($start)) . " - " . date("M d, Y", strtotime($end));

$query = new Query("
		SELECT count(*) AS count FROM apo_calendar_event
			WHERE (type_service_chapter=TRUE OR type_service_campus=TRUE OR type_service_community=TRUE OR type_service_country=TRUE OR type_fundraiser=TRUE)
			AND evaluated=TRUE AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$fall11_projects = $row['count'];

$query = new Query("
		SELECT count(*) AS count FROM apo_calendar_event
			WHERE (type_fellowship=TRUE)
			AND evaluated=TRUE AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$fall11_fellowships = $row['count'];

$start = '2011-11-30';
$end = '2012-5-1';
$query = new Query("
		SELECT sum(hours) AS hours FROM apo_calendar_event
			JOIN apo_calendar_attend USING (event_id)
			WHERE (type_service_chapter=TRUE OR type_service_campus=TRUE OR type_service_community=TRUE OR type_service_country=TRUE OR type_fundraiser=TRUE)
			AND flaked=FALSE AND attended=TRUE AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$spring12 = $row['hours'];
$spring12_dates = date("M d, Y", strtotime($start)) . " - " . date("M d, Y", strtotime($end));

$query = new Query("
		SELECT count(*) AS count FROM apo_calendar_event
			WHERE (type_service_chapter=TRUE OR type_service_campus=TRUE OR type_service_community=TRUE OR type_service_country=TRUE OR type_fundraiser=TRUE)
			AND evaluated=TRUE AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$spring12_projects = $row['count'];

$query = new Query("
		SELECT count(*) AS count FROM apo_calendar_event
			WHERE (type_fellowship=TRUE)
			AND evaluated=TRUE AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$spring12_fellowships = $row['count'];

$start = '2012-5-2';
$end = '2012-12-2';
$query = new Query("
		SELECT sum(hours) AS hours FROM apo_calendar_event
			JOIN apo_calendar_attend USING (event_id)
			WHERE (type_service_chapter=TRUE OR type_service_campus=TRUE OR type_service_community=TRUE OR type_service_country=TRUE OR type_fundraiser=TRUE)
			AND flaked=FALSE AND attended=TRUE AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$fall12 = $row['hours'];
$fall12_dates = date("M d, Y", strtotime($start)) . " - " . date("M d, Y", strtotime($end));

$query = new Query("
		SELECT count(*) AS count FROM apo_calendar_event
			WHERE (type_service_chapter=TRUE OR type_service_campus=TRUE OR type_service_community=TRUE OR type_service_country=TRUE OR type_fundraiser=TRUE)
			AND evaluated=TRUE AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$fall12_projects = $row['count'];

$query = new Query("
		SELECT count(*) AS count FROM apo_calendar_event
			WHERE (type_fellowship=TRUE)
			AND evaluated=TRUE AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$fall12_fellowships = $row['count'];

$start = '2012-12-4';
$end = '2013-4-30';
$query = new Query("
		SELECT sum(hours) AS hours FROM apo_calendar_event
			JOIN apo_calendar_attend USING (event_id)
			WHERE (type_service_chapter=TRUE OR type_service_campus=TRUE OR type_service_community=TRUE OR type_service_country=TRUE OR type_fundraiser=TRUE)
			AND flaked=FALSE AND attended=TRUE AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$spring13 = $row['hours'];
$spring13_dates = date("M d, Y", strtotime($start)) . " - " . date("M d, Y", strtotime($end));

$query = new Query("
		SELECT count(*) AS count FROM apo_calendar_event
			WHERE (type_service_chapter=TRUE OR type_service_campus=TRUE OR type_service_community=TRUE OR type_service_country=TRUE OR type_fundraiser=TRUE)
			AND evaluated=TRUE AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$spring13_projects = $row['count'];

$query = new Query("
		SELECT count(*) AS count FROM apo_calendar_event
			WHERE (type_fellowship=TRUE)
			AND evaluated=TRUE AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$spring13_fellowships = $row['count'];
	
	echo <<<HEREDOC
<h1>View Total Service Hours</h1>
<p style="padding: 1em 0px">Note that this is only as accurate as what is reported on the calendar. Events need to be <strong>evaluated</strong> and marked with the appropriate event types to count.</p>
<table style="width: auto;">
<caption></caption>
<tr><th axis="semester" style="width: 300px; font-weight: bold; padding: 0px 2px">Semester</th><th axis="hours" style="width: 70px; font-weight: bold; padding: 0px 2px">Service Hours</th><th axis="projects" style="width: 70px; font-weight: bold; padding: 0px 2px">Service Events</th><th axis="fellowships" style="width: 100px; font-weight: bold; padding: 0px 2px">Fellowships</th><th axis="Comments" style="font-weight: bold; padding: 0px 2px">Comments</th></tr>
<tr><td axis="semester">$fall04_dates (Fall 2004)</td><td axis="hours">$fall04</td><td axis="hours">$fall04_projects</td><td axis="hours">$fall04_fellowships</td><td axis="comments"></td></tr>
<tr><td axis="semester">$spring05_dates (Spring 2005)</td><td axis="hours">$spring05</td><td axis="hours">$spring05_projects</td><td axis="hours">$spring05_fellowships</td><td axis="comments"></td></tr>
<tr><td axis="semester">$fall05_dates (Fall 2005)</td><td axis="hours">$fall05</td><td axis="hours">$fall05_projects</td><td axis="hours">$fall05_fellowships</td><td axis="comments"></td></tr>
<tr><td axis="semester">$spring06_dates (Spring 2006)</td><td axis="hours">$spring06</td><td axis="hours">$spring06_projects</td><td axis="hours">$spring06_fellowships</td><td axis="comments"></td></tr>
<tr><td axis="semester">$fall06_dates (Fall 2006)</td><td axis="hours">$fall06</td><td axis="hours">$fall06_projects</td><td axis="hours">$fall06_fellowships</td><td axis="comments">Driving to a service project counted as 1 service hour.</td></tr>
<tr><td axis="semester">$spring07_dates (Spring 2007)</td><td axis="hours">$spring07</td><td axis="hours">$spring07_projects</td><td axis="hours">$spring07_fellowships</td><td axis="comments"></td></tr>
<tr><td axis="semester">$fall07_dates (Fall 2007)</td><td axis="hours">$fall07</td><td axis="hours">$fall07_projects</td><td axis="hours">$fall07_fellowships</td><td axis="comments"></td></tr>
<tr><td axis="semester">$spring08_dates (Spring 2008)</td><td axis="hours">$spring08</td><td axis="hours">$spring08_projects</td><td axis="hours">$spring08_fellowships</td><td axis="comments"></td></tr>
<tr><td axis="semester">$fall08_dates (Fall 2008)</td><td axis="hours">$fall08</td><td axis="hours">$fall08_projects</td><td axis="hours">$fall08_fellowships</td><td axis="comments"></td></tr>
<tr><td axis="semester">$spring09_dates (Spring 2009)</td><td axis="hours">$spring09</td><td axis="hours">$spring09_projects</td><td axis="hours">$spring09_fellowships</td><td axis="comments"></td></tr>
<tr><td axis="semester">$fall09_dates (Fall 2009)</td><td axis="hours">$fall09</td><td axis="hours">$fall09_projects</td><td axis="hours">$fall09_fellowships</td><td axis="comments"></td></tr>
<tr><td axis="semester">$spring10_dates (Spring 2010)</td><td axis="hours">$spring10</td><td axis="hours">$spring10_projects</td><td axis="hours">$spring10_fellowships</td><td axis="comments"></td></tr>
<tr><td axis="semester">$fall10_dates (Fall 2010)</td><td axis="hours">$fall10</td><td axis="hours">$fall10_projects</td><td axis="hours">$fall10_fellowships</td><td axis="comments"></td></tr>
<tr><td axis="semester">$spring11_dates (Spring 2011)</td><td axis="hours">$spring11</td><td axis="hours">$spring11_projects</td><td axis="hours">$spring11_fellowships</td><td axis="comments"></td></tr>
<tr><td axis="semester">$fall11_dates (Fall 2011)</td><td axis="hours">$fall11</td><td axis="hours">$fall11_projects</td><td axis="hours">$fall11_fellowships</td><td axis="comments"></td></tr>
<tr><td axis="semester">$spring12_dates (Spring 2012)</td><td axis="hours">$spring12</td><td axis="hours">$spring12_projects</td><td axis="hours">$spring12_fellowships</td><td axis="comments"></td></tr>
<tr><td axis="semester">$fall12_dates (Fall 2012)</td><td axis="hours">$fall12</td><td axis="hours">$fall12_projects</td><td axis="hours">$fall12_fellowships</td><td axis="comments"></td></tr>
<tr><td axis="semester">$spring13_dates (Spring 2013)</td><td axis="hours">$spring13</td><td axis="hours">$spring13_projects</td><td axis="hours">$spring13_fellowships</td><td axis="comments"></td></tr>
</table>

HEREDOC;

Template::print_body_footer();
Template::print_disclaimer();
?>
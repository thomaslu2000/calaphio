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
$fall12 = floor($fall12);
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
$spring13 = floor($spring13);
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

$start = '2013-5-1';
$end = '2013-12-10';
$query = new Query("
		SELECT sum(hours) AS hours FROM apo_calendar_event
			JOIN apo_calendar_attend USING (event_id)
			WHERE (type_service_chapter=TRUE OR type_service_campus=TRUE OR type_service_community=TRUE OR type_service_country=TRUE OR type_fundraiser=TRUE)
			AND flaked=FALSE AND attended=TRUE AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$fall13 = $row['hours'];
$fall13 = floor($fall13);
$fall13_dates = date("M d, Y", strtotime($start)) . " - " . date("M d, Y", strtotime($end));

$query = new Query("
		SELECT count(*) AS count FROM apo_calendar_event
			WHERE (type_service_chapter=TRUE OR type_service_campus=TRUE OR type_service_community=TRUE OR type_service_country=TRUE OR type_fundraiser=TRUE)
			AND evaluated=TRUE AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$fall13_projects = $row['count'];

$query = new Query("
		SELECT count(*) AS count FROM apo_calendar_event
			WHERE (type_fellowship=TRUE)
			AND evaluated=TRUE AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$fall13_fellowships = $row['count'];

$start = '2013-12-9';
$end = '2014-5-5';
$query = new Query("
		SELECT sum(hours) AS hours FROM apo_calendar_event
			JOIN apo_calendar_attend USING (event_id)
			WHERE (type_service_chapter=TRUE OR type_service_campus=TRUE OR type_service_community=TRUE OR type_service_country=TRUE OR type_fundraiser=TRUE)
			AND flaked=FALSE AND attended=TRUE AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$spring14 = $row['hours'];
$spring14 = floor($spring14);
$spring14_dates = date("M d, Y", strtotime($start)) . " - " . date("M d, Y", strtotime($end));

$query = new Query("
		SELECT count(*) AS count FROM apo_calendar_event
			WHERE (type_service_chapter=TRUE OR type_service_campus=TRUE OR type_service_community=TRUE OR type_service_country=TRUE OR type_fundraiser=TRUE)
			AND evaluated=TRUE AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$spring14_projects = $row['count'];

$query = new Query("
		SELECT count(*) AS count FROM apo_calendar_event
			WHERE (type_fellowship=TRUE)
			AND evaluated=TRUE AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$spring14_fellowships = $row['count'];


$start = '2014-5-6';
$end = '2014-12-8';
$query = new Query("
		SELECT sum(hours) AS hours FROM apo_calendar_event
			JOIN apo_calendar_attend USING (event_id)
			WHERE (type_service_chapter=TRUE OR type_service_campus=TRUE OR type_service_community=TRUE OR type_service_country=TRUE OR type_fundraiser=TRUE)
			AND flaked=FALSE AND attended=TRUE AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$fall14 = $row['hours'];
$fall14 = floor($fall14);
$fall14_dates = date("M d, Y", strtotime($start)) . " - " . date("M d, Y", strtotime($end));

$query = new Query("
		SELECT count(*) AS count FROM apo_calendar_event
			WHERE (type_service_chapter=TRUE OR type_service_campus=TRUE OR type_service_community=TRUE OR type_service_country=TRUE OR type_fundraiser=TRUE)
			AND evaluated=TRUE AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$fall14_projects = $row['count'];

$query = new Query("
		SELECT count(*) AS count FROM apo_calendar_event
			WHERE (type_fellowship=TRUE)
			AND evaluated=TRUE AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$fall14_fellowships = $row['count'];

$start = '2014-12-9';
$end = '2015-5-4';
$query = new Query("
		SELECT sum(hours) AS hours FROM apo_calendar_event
			JOIN apo_calendar_attend USING (event_id)
			WHERE (type_service_chapter=TRUE OR type_service_campus=TRUE OR type_service_community=TRUE OR type_service_country=TRUE OR type_fundraiser=TRUE)
			AND flaked=FALSE AND attended=TRUE AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$spring15 = $row['hours'];
$spring15 = floor($spring15);
$spring15_dates = date("M d, Y", strtotime($start)) . " - " . date("M d, Y", strtotime($end));

$query = new Query("
		SELECT count(*) AS count FROM apo_calendar_event
			WHERE (type_service_chapter=TRUE OR type_service_campus=TRUE OR type_service_community=TRUE OR type_service_country=TRUE OR type_fundraiser=TRUE)
			AND evaluated=TRUE AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$spring15_projects = $row['count'];

$query = new Query("
		SELECT count(*) AS count FROM apo_calendar_event
			WHERE (type_fellowship=TRUE)
			AND evaluated=TRUE AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$spring15_fellowships = $row['count'];

$start = '2015-5-5';
$end = '2015-12-6';
$query = new Query("
		SELECT sum(hours) AS hours FROM apo_calendar_event
			JOIN apo_calendar_attend USING (event_id)
			WHERE (type_service_chapter=TRUE OR type_service_campus=TRUE OR type_service_community=TRUE OR type_service_country=TRUE OR type_fundraiser=TRUE)
			AND flaked=FALSE AND attended=TRUE AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$fall15 = $row['hours'];
$fall15 = floor($fall15);
$fall15_dates = date("M d, Y", strtotime($start)) . " - " . date("M d, Y", strtotime($end));

$query = new Query("
		SELECT count(*) AS count FROM apo_calendar_event
			WHERE (type_service_chapter=TRUE OR type_service_campus=TRUE OR type_service_community=TRUE OR type_service_country=TRUE OR type_fundraiser=TRUE)
			AND evaluated=TRUE AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$fall15_projects = $row['count'];

$query = new Query("
		SELECT count(*) AS count FROM apo_calendar_event
			WHERE (type_fellowship=TRUE)
			AND evaluated=TRUE AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$fall15_fellowships = $row['count'];

$start = '2015-12-7';
$end = '2016-5-2';
$query = new Query("
		SELECT sum(hours) AS hours FROM apo_calendar_event
			JOIN apo_calendar_attend USING (event_id)
			WHERE (type_service_chapter=TRUE OR type_service_campus=TRUE OR type_service_community=TRUE OR type_service_country=TRUE OR type_fundraiser=TRUE)
			AND flaked=FALSE AND attended=TRUE AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$spring16 = $row['hours'];
$spring16 = floor($spring16);
$spring16_dates = date("M d, Y", strtotime($start)) . " - " . date("M d, Y", strtotime($end));

$query = new Query("
		SELECT count(*) AS count FROM apo_calendar_event
			WHERE (type_service_chapter=TRUE OR type_service_campus=TRUE OR type_service_community=TRUE OR type_service_country=TRUE OR type_fundraiser=TRUE)
			AND evaluated=TRUE AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$spring16_projects = $row['count'];

$query = new Query("
		SELECT count(*) AS count FROM apo_calendar_event
			WHERE (type_fellowship=TRUE)
			AND evaluated=TRUE AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$spring16_fellowships = $row['count'];

$start = '2016-5-3';
$end = '2016-12-5';
$query = new Query("
		SELECT sum(hours) AS hours FROM apo_calendar_event
			JOIN apo_calendar_attend USING (event_id)
			WHERE (type_service_chapter=TRUE OR type_service_campus=TRUE OR type_service_community=TRUE OR type_service_country=TRUE OR type_fundraiser=TRUE)
			AND flaked=FALSE AND attended=TRUE AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$fall16 = $row['hours'];
$fall16 = floor($fall16);
$fall16_dates = date("M d, Y", strtotime($start)) . " - " . date("M d, Y", strtotime($end));

$query = new Query("
		SELECT count(*) AS count FROM apo_calendar_event
			WHERE (type_service_chapter=TRUE OR type_service_campus=TRUE OR type_service_community=TRUE OR type_service_country=TRUE OR type_fundraiser=TRUE)
			AND evaluated=TRUE AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$fall16_projects = $row['count'];

$query = new Query("
		SELECT count(*) AS count FROM apo_calendar_event
			WHERE (type_fellowship=TRUE)
			AND evaluated=TRUE AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$fall16_fellowships = $row['count'];

$start = '2016-12-6';
$end = '2017-5-8';
$query = new Query("
		SELECT sum(hours) AS hours FROM apo_calendar_event
			JOIN apo_calendar_attend USING (event_id)
			WHERE (type_service_chapter=TRUE OR type_service_campus=TRUE OR type_service_community=TRUE OR type_service_country=TRUE OR type_fundraiser=TRUE)
			AND flaked=FALSE AND attended=TRUE AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$spring17 = $row['hours'];
$spring17 = floor($spring17);
$spring17_dates = date("M d, Y", strtotime($start)) . " - " . date("M d, Y", strtotime($end));

$query = new Query("
		SELECT count(*) AS count FROM apo_calendar_event
			WHERE (type_service_chapter=TRUE OR type_service_campus=TRUE OR type_service_community=TRUE OR type_service_country=TRUE OR type_fundraiser=TRUE)
			AND evaluated=TRUE AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$spring17_projects = $row['count'];

$query = new Query("
		SELECT count(*) AS count FROM apo_calendar_event
			WHERE (type_fellowship=TRUE)
			AND evaluated=TRUE AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$spring17_fellowships = $row['count'];

$start = '2017-5-9';
$end = '2017-12-4';
$query = new Query("
		SELECT sum(hours) AS hours FROM apo_calendar_event
			JOIN apo_calendar_attend USING (event_id)
			WHERE (type_service_chapter=TRUE OR type_service_campus=TRUE OR type_service_community=TRUE OR type_service_country=TRUE OR type_fundraiser=TRUE)
			AND flaked=FALSE AND attended=TRUE AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$fall17 = $row['hours'];
$fall17 = floor($fall17);
$fall17_dates = date("M d, Y", strtotime($start)) . " - " . date("M d, Y", strtotime($end));

$query = new Query("
		SELECT count(*) AS count FROM apo_calendar_event
			WHERE (type_service_chapter=TRUE OR type_service_campus=TRUE OR type_service_community=TRUE OR type_service_country=TRUE OR type_fundraiser=TRUE)
			AND evaluated=TRUE AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$fall17_projects = $row['count'];

$query = new Query("
		SELECT count(*) AS count FROM apo_calendar_event
			WHERE (type_fellowship=TRUE)
			AND evaluated=TRUE AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$fall17_fellowships = $row['count'];	

$start = '2017-12-5';
$end = '2018-4-30';
$query = new Query("
		SELECT sum(hours) AS hours FROM apo_calendar_event
			JOIN apo_calendar_attend USING (event_id)
			WHERE (type_service_chapter=TRUE OR type_service_campus=TRUE OR type_service_community=TRUE OR type_service_country=TRUE OR type_fundraiser=TRUE)
			AND flaked=FALSE AND attended=TRUE AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$spring18 = $row['hours'];
$spring18 = floor($spring18);
$spring18_dates = date("M d, Y", strtotime($start)) . " - " . date("M d, Y", strtotime($end));

$query = new Query("
		SELECT count(*) AS count FROM apo_calendar_event
			WHERE (type_service_chapter=TRUE OR type_service_campus=TRUE OR type_service_community=TRUE OR type_service_country=TRUE OR type_fundraiser=TRUE)
			AND evaluated=TRUE AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$spring18_projects = $row['count'];

$query = new Query("
		SELECT count(*) AS count FROM apo_calendar_event
			WHERE (type_fellowship=TRUE)
			AND evaluated=TRUE AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$spring18_fellowships = $row['count'];


$start = '2018-5-1';
$end = '2018-12-5';
$query = new Query("
		SELECT sum(hours) AS hours FROM apo_calendar_event
			JOIN apo_calendar_attend USING (event_id)
			WHERE (type_service_chapter=TRUE OR type_service_campus=TRUE OR type_service_community=TRUE OR type_service_country=TRUE OR type_fundraiser=TRUE)
			AND flaked=FALSE AND attended=TRUE AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$fall18 = $row['hours'];
$fall18 = floor($fall18);
$fall18_dates = date("M d, Y", strtotime($start)) . " - " . date("M d, Y", strtotime($end));

$query = new Query("
		SELECT count(*) AS count FROM apo_calendar_event
			WHERE (type_service_chapter=TRUE OR type_service_campus=TRUE OR type_service_community=TRUE OR type_service_country=TRUE OR type_fundraiser=TRUE)
			AND evaluated=TRUE AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$fall18_projects = $row['count'];

$query = new Query("
		SELECT count(*) AS count FROM apo_calendar_event
			WHERE (type_fellowship=TRUE)
			AND evaluated=TRUE AND deleted=FALSE AND date BETWEEN '$start' AND '$end'");
$row = $query->fetch_row();
$fall18_fellowships = $row['count'];	
	echo <<<HEREDOC

	<?php if ($g_user->is_logged_in()): ?>

<h1>View Total Service Hours</h1>
<p style="padding: 1em 0px">Note that this is only as accurate as what is reported on the calendar. Events need to be <strong>evaluated</strong> and marked with the appropriate event types to count.</p>
<table style="width: auto;">
<caption></caption>
<tr><th axis="semester" style="width: 300px; font-weight: bold; padding: 0px 2px">Semester</th><th axis="hours" style="width: 70px; font-weight: bold; padding: 0px 2px">Service Hours</th><th axis="projects" style="width: 70px; font-weight: bold; padding: 0px 2px">Service Events</th><th axis="fellowships" style="width: 100px; font-weight: bold; padding: 0px 2px">Fellowships</th><th axis="Comments" style="font-weight: bold; padding: 0px 2px">Comments</th></tr>
<tr><td axis="semester">$fall18_dates (Fall 2018) PVL Semester</td><td axis="hours">$fall18</td><td axis="hours">$fall18_projects</td><td axis="hours">$sfall18_fellowships</td><td axis="comments"></td></tr>
<tr><td axis="semester">$spring18_dates (Spring 2018) RT Semester</td><td axis="hours">$spring18</td><td axis="hours">$spring18_projects</td><td axis="hours">$spring18_fellowships</td><td axis="comments"></td></tr>
<tr><td axis="semester">$fall17_dates (Fall 2017) DP Semester</td><td axis="hours">$fall17</td><td axis="hours">$fall17_projects</td><td axis="hours">$fall17_fellowships</td><td axis="comments"></td></tr>
<tr><td axis="semester">$spring17_dates (Spring 2017) MMC Semester</td><td axis="hours">$spring17</td><td axis="hours">$spring17_projects</td><td axis="hours">$spring17_fellowships</td><td axis="comments"></td></tr>
<tr><td axis="semester">$fall16_dates (Fall 2016) FH Semester</td><td axis="hours">$fall16</td><td axis="hours">$fall16_projects</td><td axis="hours">$fall16_fellowships</td><td axis="comments"></td></tr>
<tr><td axis="semester">$spring16_dates (Spring 2016) RBD Semester</td><td axis="hours">$spring16</td><td axis="hours">$spring16_projects</td><td axis="hours">$spring16_fellowships</td><td axis="comments"></td></tr>
<tr><td axis="semester">$fall15_dates (Fall 2015) PMP Semester</td><td axis="hours">$fall15</td><td axis="hours">$fall15_projects</td><td axis="hours">$fall15_fellowships</td><td axis="comments"></td></tr>
<tr><td axis="semester">$spring15_dates (Spring 2015) TT Semester</td><td axis="hours">$spring15</td><td axis="hours">$spring15_projects</td><td axis="hours">$spring15_fellowships</td><td axis="comments"></td></tr>
<tr><td axis="semester">$fall14_dates (Fall 2014) KHK Semester</td><td axis="hours">$fall14</td><td axis="hours">$fall14_projects</td><td axis="hours">$fall14_fellowships</td><td axis="comments"></td></tr>
<tr><td axis="semester">$spring14_dates (Spring 2014) CM Semester</td><td axis="hours">$spring14</td><td axis="hours">$spring14_projects</td><td axis="hours">$spring14_fellowships</td><td axis="comments"></td></tr>
<tr><td axis="semester">$fall13_dates (Fall 2013) DE Semester</td><td axis="hours">$fall13</td><td axis="hours">$fall13_projects</td><td axis="hours">$fall13_fellowships</td><td axis="comments"></td></tr>
<tr><td axis="semester">$spring13_dates (Spring 2013) KK Semester</td><td axis="hours">$spring13</td><td axis="hours">$spring13_projects</td><td axis="hours">$spring13_fellowships</td><td axis="comments"></td></tr>
<tr><td axis="semester">$fall12_dates (Fall 2012) MH Semester</td><td axis="hours">$fall12</td><td axis="hours">$fall12_projects</td><td axis="hours">$fall12_fellowships</td><td axis="comments"></td></tr>
<tr><td axis="semester">$spring12_dates (Spring 2012) JS Semester</td><td axis="hours">$spring12</td><td axis="hours">$spring12_projects</td><td axis="hours">$spring12_fellowships</td><td axis="comments"></td></tr>
<tr><td axis="semester">$fall11_dates (Fall 2011) CPZ Semester</td><td axis="hours">$fall11</td><td axis="hours">$fall11_projects</td><td axis="hours">$fall11_fellowships</td><td axis="comments"></td></tr>
<tr><td axis="semester">$spring11_dates (Spring 2011) KS Semester</td><td axis="hours">$spring11</td><td axis="hours">$spring11_projects</td><td axis="hours">$spring11_fellowships</td><td axis="comments"></td></tr>
<tr><td axis="semester">$fall10_dates (Fall 2010)  JLC Semester</td><td axis="hours">$fall10</td><td axis="hours">$fall10_projects</td><td axis="hours">$fall10_fellowships</td><td axis="comments"></td></tr>
<tr><td axis="semester">$spring10_dates (Spring 2010) GL Semester</td><td axis="hours">$spring10</td><td axis="hours">$spring10_projects</td><td axis="hours">$spring10_fellowships</td><td axis="comments"></td></tr>
<tr><td axis="semester">$fall09_dates (Fall 2009) JM Semester</td><td axis="hours">$fall09</td><td axis="hours">$fall09_projects</td><td axis="hours">$fall09_fellowships</td><td axis="comments"></td></tr>
<tr><td axis="semester">$spring09_dates (Spring 2009) ST Semester</td><td axis="hours">$spring09</td><td axis="hours">$spring09_projects</td><td axis="hours">$spring09_fellowships</td><td axis="comments"></td></tr>
<tr><td axis="semester">$fall08_dates (Fall 2008) WK Semester</td><td axis="hours">$fall08</td><td axis="hours">$fall08_projects</td><td axis="hours">$fall08_fellowships</td><td axis="comments"></td></tr>
<tr><td axis="semester">$spring08_dates (Spring 2008) CC Semester</td><td axis="hours">$spring08</td><td axis="hours">$spring08_projects</td><td axis="hours">$spring08_fellowships</td><td axis="comments"></td></tr>
<tr><td axis="semester">$fall07_dates (Fall 2007) JCJ Semester</td><td axis="hours">$fall07</td><td axis="hours">$fall07_projects</td><td axis="hours">$fall07_fellowships</td><td axis="comments"></td></tr>
<tr><td axis="semester">$spring07_dates (Spring 2007)</td><td axis="hours">$spring07</td><td axis="hours">$spring07_projects</td><td axis="hours">$spring07_fellowships</td><td axis="comments"></td></tr>
<tr><td axis="semester">$fall06_dates (Fall 2006)</td><td axis="hours">$fall06</td><td axis="hours">$fall06_projects</td><td axis="hours">$fall06_fellowships</td><td axis="comments">Driving to a service project counted as 1 service hour.</td></tr>
<tr><td axis="semester">$spring06_dates (Spring 2006)</td><td axis="hours">$spring06</td><td axis="hours">$spring06_projects</td><td axis="hours">$spring06_fellowships</td><td axis="comments"></td></tr>
<tr><td axis="semester">$fall05_dates (Fall 2005)</td><td axis="hours">$fall05</td><td axis="hours">$fall05_projects</td><td axis="hours">$fall05_fellowships</td><td axis="comments"></td></tr>
<tr><td axis="semester">$spring05_dates (Spring 2005)</td><td axis="hours">$spring05</td><td axis="hours">$spring05_projects</td><td axis="hours">$spring05_fellowships</td><td axis="comments"></td></tr>
<tr><td axis="semester">$fall04_dates (Fall 2004)</td><td axis="hours">$fall04</td><td axis="hours">$fall04_projects</td><td axis="hours">$fall04_fellowships</td><td axis="comments"></td></tr>
</table>
<?php endif ?>

HEREDOC;

Template::print_body_footer();
Template::print_disclaimer();
?>
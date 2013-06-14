<?php
require("include/includes.php");
require("include/Template.class.php");
Template::print_head(array("admin_view_service_projects.css"));
Template::print_body_header('Home', 'ADMIN');

if (!$g_user->is_logged_in()) {
	trigger_error("You must be logged in to view this page.");
} else {
$import_http_request = array(
	"start" => date("Y-m-d", strtotime("-1 year")),
	"end" => date("Y-m-d", strtotime("now"))
	);
foreach ($import_http_request as $var => $default) {
	if (isset($_REQUEST[$var])) {
		$$var = $_REQUEST[$var];
	} else {
		$$var = $default;
	}
}

$total_hours = 0;
$total_events = 0;
$events = array();
$query = new Query(sprintf("
	SELECT event_id, title, location, description, date FROM apo_calendar_event
	WHERE date >= '%s' AND date <= '%s' AND evaluated=1 AND deleted=0
		AND (type_service_chapter=1 OR type_service_community=1 OR type_service_campus=1 OR type_service_country=1 OR type_fundraiser=1)
	ORDER BY date ASC
	", date("Y-m-d", strtotime($start)), date("Y-m-d", strtotime($end))));
while ($row = $query->fetch_row()) {
	$id = $row['event_id'];
	$events[$id] = $row;
	$events[$id]['attendance'] = array();
	$events[$id]['total_hours'] = 0;
	$events[$id]['evaluation'] = array();
}

$query = new Query(sprintf("
	SELECT attend.event_id, attend.flaked, attend.chair, attend.attended, attend.hours, attend.driver,
		user.user_id, user.firstname, user.lastname, user.pledgeclass
	FROM apo_calendar_event AS event
	JOIN apo_calendar_attend AS attend ON (event.event_id = attend.event_id)
	JOIN apo_users AS user ON (attend.user_id = user.user_id)
	WHERE date >= '%s' AND date <= '%s' AND evaluated=1 AND deleted=0
		AND (type_service_chapter=1 OR type_service_community=1 OR type_service_campus=1 OR type_service_country=1 OR type_fundraiser=1)
	", date("Y-m-d", strtotime($start)), date("Y-m-d", strtotime($end))));
while ($row = $query->fetch_row()) {
	$id = $row['event_id'];
	$events[$id]['attendance'][] = $row;
	if (!$row['flaked'] && $row['hours']) {
		$events[$id]['total_hours'] += $row['hours'];
		$total_hours += $row['hours'];
	}
	$total_events++;
}

$query = new Query(sprintf("
	SELECT eval.event_id, eval.text_response, control.description
	FROM apo_calendar_event AS event
	JOIN apo_event_evaluation AS eval ON (event.event_id = eval.event_id)
	JOIN apo_event_evaluation_control AS control ON (eval.field_id = control.field_id)
	WHERE date >= '%s' AND date <= '%s' AND evaluated=1 AND deleted=0
		AND (type_service_chapter=1 OR type_service_community=1 OR type_service_campus=1 OR type_service_country=1 OR type_fundraiser=1)
	ORDER BY date ASC
	", date("Y-m-d", strtotime($start)), date("Y-m-d", strtotime($end))));
while ($row = $query->fetch_row()) {
	$id = $row['event_id'];
	$events[$id]['evaluation'][] = $row;
}

echo <<<HEREDOC
<h2>Service Report - $total_hours hours total, and $total_events events total</h2>
<form style="margin-top: 1em">
<p>Start date: <input type="text" name="start" value="$start" /> End date: <input type="text" name="end" value="$end" /> <button type="submit">Submit</button>
</form>
<table class="service_report">

HEREDOC;

foreach ($events as $event) {
	$date = date("M d, Y", strtotime($event['date']));
	echo <<<HEREDOC
<tr><td colspan="6" class="heading"><div><span>$date</span> - <a href="event.php?id=$event[event_id]">$event[title]</a></div></td></tr>
<tr><td colspan="6"><strong>Description:</strong><br />$event[description]</td></tr>
<tr><th style="text-align: left">Name</th><th>Attended</th><th>Drove</th><th>Chaired</th><th>Flaked</th><th>Hours</th></tr>

HEREDOC;
	foreach ($event['attendance'] as $attend) {
		$attended = $attend['attended'] && !$attend['flaked'] ? "X" : "";
		$drove = $attend['attended'] && $attend['driver'] && !$attend['flaked'] ? "X" : "";
		$chaired = $attend['chair'] && !$attend['flaked'] ? "X" : "";
		$flaked = $attend['flaked'] ? "X" : "";
		$hours = !$attend['flaked'] ? $attend['hours'] : "0";
		echo <<<HEREDOC
<tr>
  <td class="name">$attend[firstname] $attend[lastname] ($attend[pledgeclass])</td>
  <td class="checklist">$attended</td>
  <td class="checklist">$drove</td>
  <td class="checklist">$chaired</td>
  <td class="checklist">$flaked</td>
  <td class="checklist">$hours</td>
</tr>

HEREDOC;
	}
	echo <<<HEREDOC
<tr><td colspan="6" style="text-align: right;">$event[total_hours] total hours</td></tr>

HEREDOC;
	foreach ($event['evaluation'] as $eval) {
		echo <<<HEREDOC
<tr><th colspan="6" style="text-align: left;">$eval[description]</th></tr>
<tr><td colspan="6" style="padding-left: 1em">$eval[text_response]</td></tr>

HEREDOC;
	}
}

echo <<<HEREDOC
</table>

HEREDOC;
}

Template::print_body_footer();
Template::print_disclaimer();
?>
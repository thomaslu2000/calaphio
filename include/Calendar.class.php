<?php

/**
 * AVAILABLE PERMISSIONS:
 * calendar view deleted
 * calendar edit events
 * calendar delete events
 * calendar delete comments
 * calendar view logs
 * calendar add events
 * calendar drop users
 * calendar add users
 * calendar add evaluations
 * calendar view evaluations
 */
define('CALENDAR_POPUP_WIDTH', 700);
define('CALENDAR_POPUP_HEIGHT', 700);

class Calendar {
	
	var $event_type_names = array(
		'type_interchapter' => 'Interchapter',
		'type_interchapter_half' => 'Interchapter Half',
		'type_service_chapter' => 'Service to Chapter',
		'type_service_campus' => 'Service to Campus',
		'type_service_community' => 'Service to Community',
		'type_service_country' => 'Service to Country',
		'type_fellowship' => 'Fellowship',
		'type_fundraiser' => 'Fundraiser',
		'type_leadership' => 'Leadership',
		'type_scouting' => 'Boy Scout',
		'type_rush' => 'Rush',
		'type_alumni' => 'Alumni',
		'type_family' => 'Family',
		'type_active_meeting' => 'Active Meeting',
		'type_pledge_meeting' => 'Pledge Meeting');
	
	/**
	 * This is an array in which the key references the event type field
	 * name in the SQL table and the value is set to true if that event
	 * type should be returned by the query. */
	var $filter = array(
		'type_interchapter' => true,
		'type_interchapter_half' => true,
		'type_service_chapter' => true,
		'type_service_campus' => true,
		'type_service_community' => true,
		'type_service_country' => true,
		'type_fellowship' => true,
		'type_fundraiser' => true,
		'type_leadership' => true,
		'type_scouting' => true,
		'type_rush' => true,
		'type_alumni' => true,
		'type_family' => true,
		'type_active_meeting' => true,
		'type_pledge_meeting' => true);
	
	/**
	 * Custom event types need to special handling.
	 * -1 = none
	 * 0 = all
	 * Any positive number refers to a specific event type. */
	var $filter_type_custom = 0;
	
	function Calendar() {
		// Check to see if any filters are being applied
		foreach ($this->filter as $key => $value) {
			if (isset($_REQUEST[$key]) && $_REQUEST[$key] === 0) {
				$this->filter[$key] = false;
			}
		}
		// Special handling for custom event types
		if (isset($_REQUEST['type_custom']) && is_numeric($_REQUEST['type_custom'])) {
			$this->filter_type_custom = $_REQUEST['type_custom'];
		}
	}
	
	function format_add_links($text) {
		// match protocol://address/path/
		$text = ereg_replace("https?://([.]?[a-zA-Z0-9#!_/?&=%+~:;,\\-])*", "<a href=\"\\0\" target=\"_blank\">\\0</a>", $text);
		// match www.something
		$text = ereg_replace("(^| |\(|\[|>)(www([.]?[a-zA-Z0-9#!_/?&=%+~;:,\\-])*)", "\\1<a href=\"http://\\2\" target=\"_blank\">\\2</a>", $text);
		return $text;
	}
	
	/**
	 * This takes in an associative array containing data for an event
	 * and returns an HTML formatted title. */
	function format_event_title($row) {
		if ($row['type_scouting']) {
			$prefix = '<span class="service" style="color: #0CF;">[BSA]</span> ';
		} else if ($row['type_interchapter'] || $row['type_interchapter_half']) {
			$prefix = '<span class="ic">[IC]</span> ';
		} else if ($row['type_rush']) {
			$prefix = '<span class="rush" style="color: #F3C;">[RUSH]</span> ';
		} else if ($row['type_fundraiser']) {
			$prefix = '<span class="fundraiser">[FUN]</span> ';
		} else if ($row['type_service_campus'] || $row['type_service_chapter'] || $row['type_service_community'] || $row['type_service_country']) {
			$prefix = '<span class="service">[SER]</span> ';
		} else if ($row['type_custom'] == 12) {
			$prefix = '<span class="active" style="color: #609;">[ACT]</span> ';
		} else if ($row['type_alumni']) {
			$prefix = '<span class="alumni" style="color: #F60;">[ALM]</span> ';
		} else if ($row['type_fellowship']) {
			$prefix = '<span class="fellowship">[FEL]</span> ';
		} else if ($row['type_custom'] == 1 || $row['type_custom'] == 3 || $row['type_custom'] == 4 || $row['type_custom'] == 5 || $row['type_custom'] == 6 || $row['type_custom'] == 7 || $row['type_custom'] == 11 || $row['type_custom'] == 13 || $row['type_pledge_meeting']) {
			$prefix = '<span class="pledge" style="color: #399;">[PLE]</span> ';
		} else if ($row['type_custom'] == 14) {
			$prefix = '<span class="active" style="color: #355E3B;">[ADM]</span> ';
		} else {
			$prefix = '';
		}
		$event_id = $row['event_id'];
		$class = isset($row['attending']) ? "attending" : "";
		$class .= $row['deleted'] ? " deleted" : "";
		$title = $row['title'];
		$popup_width = CALENDAR_POPUP_WIDTH;
		$popup_height = CALENDAR_POPUP_HEIGHT;
		$session_id = session_id(); // JavaScript popups in IE tend to block cookies, so need to explicitly set session id
		return "<a href=\"event.php?id=$event_id\" class=\"$class\" onclick=\"return popup('event.php?id=$event_id&sid=$session_id', $popup_width, $popup_height)\">$prefix$title</a>";
	}
	
	function format_list_minutes($class, $select, $interval) {
		$class = is_string($class) ? " class=\"$class\"" : "";
		$select = is_numeric($select) ? $select : 0;
		$interval = is_numeric($interval) && $interval > 0 ? $interval : 1;
		$minutes = "";
		for ($i = 0; $i <= 59; $i += $interval) {
			$selected = $i == $select ? " selected=\"selected\"" : "";
			$min = str_pad($i, 2, "0", STR_PAD_LEFT);
			$minutes .= "<option$class value=\"$min\"$selected>$min</option>";
		}
		return $minutes;
	}
	
	function format_list_hours($class, $select) {
		$class = is_string($class) ? " class=\"$class\"" : "";
		$select = is_numeric($select) ? $select : 1;
		$hours = "";
		for ($i = 1; $i <= 12; $i++) {
			$selected = $i == $select ? " selected=\"selected\"" : "";
			$hours .= "<option$class value=\"$i\"$selected>$i</option>";
		}
		return $hours;
	}
	
	function format_list_days($class, $select) {
		$class = is_string($class) ? " class=\"$class\"" : "";
		$select = is_numeric($select) ? $select : 0;
		$days = "";
		for ($i = 1; $i <= 31; $i++) {
			$selected = $i == $select ? " selected=\"selected\"" : "";
			$days .= "<option$class value=\"$i\"$selected>$i</option>";
		}
		return $days;
	}
	
	function format_list_months($class, $select) {
		$class = is_string($class) ? " class=\"$class\"" : "";
		$select = is_numeric($select) ? $select : 0;
		$months = "";
		for ($i = 1; $i <= 12; $i++) {
			$selected = $i == $select ? " selected=\"selected\"" : "";
			$months .= sprintf("<option$class value=\"%d\"$selected>%s</option>", $i, date("M", strtotime("+$i months", strtotime("2000-12-1"))));
		}
		return $months;
	}
	
	function format_list_years($class, $select) {
		$class = is_string($class) ? " class=\"$class\"" : "";
		$select = is_numeric($select) ? $select : 0;
		$start_year = strtotime("$select-1-1") < strtotime("now") ? $select : date("Y", strtotime("now"));
		$end_year = strtotime("$select-1-1") > strtotime("now") ? $select : date("Y", strtotime("+1 year"));
		$years = "";
		for ($i = $start_year; $i <= $end_year; $i++) {
			$selected = $i == $select ? " selected=\"selected\"" : "";
			$years .= sprintf("<option value=\"%d\"$selected>%d</option>", $i, $i);
		}
		return $years;
	}
	
	function print_add_evaluation() {
		global $g_user;
		session_start();
		// Make sure user is allowed to evaluate this event
		if (!isset($_REQUEST['id']) || !is_numeric($_REQUEST['id'])) {
			trigger_error("Print Add Evaluation: Invalid event id $_REQUEST[id].", E_USER_ERROR);
			return;
		}
		$event_id = $_REQUEST['id'];
		if (!$g_user->permit("calendar add evaluations")) {
			$query = new Query(sprintf("SELECT user_id FROM %scalendar_attend WHERE event_id=%d AND user_id=%d AND chair=TRUE LIMIT 1", TABLE_PREFIX, $event_id, $g_user->data['user_id']));
			$row = $query->fetch_row();
			if (!$row) {
				trigger_error("You do not have permission to evaluate this event.", E_USER_ERROR);
				return;
			}
		}
		
		// Get event details
		$query = new Query(sprintf("SELECT title, signup_limit FROM %scalendar_event WHERE event_id=%d LIMIT 1", TABLE_PREFIX, $event_id));
		if ($row = $query->fetch_row()) {
			$title = $row['title'];
			$signup_limit = $row['signup_limit'];
		} else {
			trigger_error("No such event exists.", E_USER_ERROR);
			return;
		}
		
		// Get the attendees
		$attendees = "";
		$odd_row = true;
		$attendee_count = 0;
		$query = new Query(sprintf("SELECT %scalendar_attend.user_id, firstname, lastname, attended, flaked, chair, driver, hours, miles FROM %scalendar_attend JOIN %susers USING (user_id) WHERE event_id=%d ORDER BY signup_time",
			TABLE_PREFIX, TABLE_PREFIX, TABLE_PREFIX, $event_id));
		while ($row = $query->fetch_row()) {
			$attendee_count++;
			$user_id = $row['user_id'];
			$firstname = $row['firstname'];
			$lastname = $row['lastname'];
			$row_class = $odd_row ? "odd" : "";
			$waitlist_disabled = $signup_limit && $attendee_count > $signup_limit ? " checked=\"checked\"" : " disabled=\"disabled\"";
			if (isset($_SESSION['$event_id']) && $_SESSION['$event_id']['error']) {
				$attend_selected = $_SESSION['$event_id']["attend$user_id"] == 'attended' ? " checked=\"checked\"" : "";
				$chair_selected = $_SESSION['$event_id']["attend$user_id"] == 'chaired' ? " checked=\"checked\"" : "";
				$flake_selected = $_SESSION['$event_id']["attend$user_id"] == 'flaked' ? " checked=\"checked\"" : "";
				$driver_selected = $_SESSION['$event_id']["drove$user_id"] ? " checked=\"checked\"" : "";
				$driver = $_SESSION['$event_id']["droveAmount$user_id"];
				$hours_selected = $_SESSION['$event_id']["hours$user_id"] ? " checked=\"checked\"" : "";
				$hours = $_SESSION['$event_id']["hoursAmount$user_id"];
				$miles_selected = $_SESSION['$event_id']["miles$user_id"] ? " checked=\"checked\"" : "";
				$miles = $_SESSION['$event_id']["milesAmount$user_id"];
			} else {
				$attend_selected = !$row['chair'] && !$row['flaked'] && (!$signup_limit || $attendee_count <= $signup_limit) || $row['attended'] ? " checked=\"checked\"" : "";
				$chair_selected = $row['chair'] ? " checked=\"checked\"" : '';
				$flake_selected = $row['flaked'] ? " checked=\"checked\"" : "";
				$driver_selected = $row['driver'] ? " checked=\"checked\"" : "";
				$driver = $row['driver'];
				$hours_selected = $row['hours'] ? " checked=\"checked\"" : "";
				$hours = $row['hours'] ? $row['hours'] : "";
				$miles_selected = $row['driver'] ? " checked=\"checked\"" : "";
				$miles = $row['miles'] ? $row['miles'] / $driver : "";
			}
			$attendees .= <<<DOCHERE_print_add_evaluation_attendees
<tr class="$row_class">
<td axis="name">$firstname $lastname</td>
<td axis="attended" class="center"><input type="radio" name="attend$user_id" value="attended"$attend_selected /></td>
<td axis="chaired" class="center"><input type="radio" name="attend$user_id" value="chaired"$chair_selected /></td>
<td axis="flaked" class="center"><input type="radio" name="attend$user_id" value="flaked"$flake_selected /></td>
<td axis="waitlisted" class="center"><input type="radio" name="attend$user_id" value="waitlisted"$waitlist_disabled /></td>
<td axis="drove" class="center"><input type="checkbox" name="drove$user_id"$driver_selected /> <input type="text" name="droveAmount$user_id" value="$driver" size="2" /></td>
<td axis="hours" class="center"><input type="checkbox" name="hours$user_id"$hours_selected /> <input type="text" name="hoursAmount$user_id" size="2" value="$hours" maxlength="5" /></td>
<td axis="miles" class="center"><input type="checkbox" name="miles$user_id"$miles_selected /> <input type="text" name="milesAmount$user_id" size="2" value="$miles" /></td>
</tr>

DOCHERE_print_add_evaluation_attendees;
		}
		
		// Get the evaluation questions
		$questions = "";
		$query = new Query(sprintf("SELECT %sevent_evaluation_control.field_id, description, type, text_response, numerical_response
				FROM %sevent_evaluation_control
				LEFT JOIN %sevent_evaluation ON (%sevent_evaluation.field_id = %sevent_evaluation_control.field_id AND event_id=%d)
				WHERE enabled=TRUE ORDER BY ordering DESC",
				TABLE_PREFIX,
				TABLE_PREFIX,
				TABLE_PREFIX, TABLE_PREFIX, TABLE_PREFIX, $event_id));
		while ($row = $query->fetch_row()) {
			$question = $row['description'];
			if ($row['type'] == 'numerical') {
				$response = $row['numerical_response']  ? $row['numerical_response'] : "";
				$answer = "<input type=\"text\" name=\"eval$row[field_id]\" size=\"2\" value=\"$response\" />";
			} else if ($row['type'] == 'text') {
				if (isset($_SESSION['$event_id']) && $_SESSION['$event_id']['error']) {
					$response = $_SESSION['$event_id']["eval$row[field_id]"];
				} else {
					$response = $row['text_response'] ? $row['text_response'] : (isset($_SESSION['fields']) ? $_SESSION['fields']["eval$row[field_id]$event_id"] : "");
				}
				//$response = isset($_SESSION['fields']) ? $_SESSION['fields']["eval$row[field_id]"] : ($row['text_response'] ? $row['text_response'] : "");
				$answer = "<textarea name=\"eval$row[field_id]\" rows=\"5\" cols=\"57\" />$response</textarea>";
			}
			$answer_class = $row['type'];
			
			$questions .= "<div class=\"question\">$question</div>\r\n<div class=\"$answer_class\">$answer</div>\r\n";
		}
		
		echo <<<DOCHERE_print_add_evaluation
<div id="add_evaluation">
<form action="evaluate_event.php" method="post">
<table id="evaluation_attendance">
<caption id="event_title">
$title
<div class="subtitle">Select the "Hours" checkbox to assign a special amount of hours.</div>
<div class="subtitle">Note that you must finish adding people before filling out the evaluation.</div>
<div class="subtitle">Lastly, you may not assign 0 hours.</div>
<div class="subtitle">For drivers, please assign them the total amount of miles they drove to/from the event rounded to the nearest whole number.</div>
</caption>
<tr>
<th axis="name">Name</th>
<th axis="attended" class="center">Attended</th>
<th axis="chaired" class="center">Chaired</th>
<th axis="flaked" class="center">Flaked</th>
<th axis="waitlisted" class="center">Waitlisted</th>
<th axis="drove" class="center">&nbsp;&nbsp;&nbsp;Drove&nbsp;&nbsp;&nbsp;</th>
<th axis="hours" class="center">&nbsp;&nbsp;&nbsp;Hours&nbsp;&nbsp;&nbsp;</th>
<th axis="miles" class="center">&nbsp;&nbsp;&nbsp;Miles Drove&nbsp;&nbsp;&nbsp;</th>
</tr>
$attendees
</table>
<div class="center">[<a href="event_add_people.php?id=$event_id&evaluate=true">Add People</a>]</div>
<div id="eval_questions">
<div class="question">How many hours was this event? (Required)</div>
<div class="numerical"><input type="text" name="event_hours" size="2" maxlength="5"/></div>
$questions
<div id="eval_submit">
<button type="submit" name="function" value="Submit Evaluation">Submit Evaluation</button>
</div>
<input type="hidden" name="id" value="$event_id" />
</div>
</form>
</div>
DOCHERE_print_add_evaluation;
	}
	
	function print_add_event() {
		global $g_user;
		// Make sure user has permissions to add events
		if (!$g_user->permit("calendar add events")) {
			trigger_error("You do not have permission to add events.", E_USER_ERROR);
			return;
		}
		
		$year = isset($_REQUEST['year']) ? $_REQUEST['year'] : false;
		$month = isset($_REQUEST['month']) ? $_REQUEST['month'] : false;
		$day = isset($_REQUEST['day']) ? $_REQUEST['day'] : false;
		
		// Validate the requested date
		if (!(is_numeric($year) && is_numeric($month) && is_numeric($day)
			&& $year >= 1925 && $month >= 1 && $month <= 12 && $day >= 1 && $day <= 31)) {
			$year = date("Y");
			$month = date("m");
			$day = date("d");
		}
		
		$title = isset($_POST['title']) ? $_POST['title'] : "";
		$location = isset($_POST['location']) ? $_POST['location'] : "";
		
		$date_days = $this->format_list_days("", $day);
		$date_months = $this->format_list_months("", $month);
		$date_years = $this->format_list_years("", $year);
		
		$start_hour = $this->format_list_hours("", isset($_POST['start_hour']) ? $_POST['start_hour'] : 1);
		$start_minute = $this->format_list_minutes("", isset($_POST['start_minute']) ? $_POST['start_minute'] : 0, 5);
		$end_hour = $this->format_list_hours("", isset($_POST['end_hour']) ? $_POST['end_hour'] : 1);
		$end_minute = $this->format_list_minutes("", isset($_POST['end_hour']) ? $_POST['end_hour'] : 0, 5);
		
		$start_am_selected = isset($_POST['start_period']) && $_POST['start_period'] == 0 ? " selected=\"selected\"" : "";
		$start_pm_selected = isset($_POST['start_period']) && $_POST['start_period'] == 1 ? " selected=\"selected\"" : "";
		$end_am_selected = isset($_POST['end_period']) && $_POST['end_period'] == 0 ? " selected=\"selected\"" : "";
		$end_pm_selected = isset($_POST['end_period']) && $_POST['end_period'] == 1 ? " selected=\"selected\"" : "";
		
		$allday_selected = isset($_POST['allday']) && $_POST['allday'] ? " checked=\"checked\"" : "";
		$tba_selected = isset($_POST['tba']) && $_POST['tba'] ? " checked=\"checked\"" : "";
		$never_ends_selected = isset($_POST['never_ends']) && $_POST['never_ends'] ? " checked=\"checked\"" : "";
		
		$signup_begin_days = $this->format_list_days("", isset($_POST['signup_begin_day']) ? $_POST['signup_begin_day'] : $day);
		$signup_begin_months = $this->format_list_months("", isset($_POST['signup_begin_month']) ? $_POST['signup_begin_month'] : $month);
		$signup_begin_years = $this->format_list_years("", isset($_POST['signup_begin_year']) ? $_POST['signup_begin_year'] : $year);
		$signup_begin_selected = isset($_POST['signup_begin']) && $_POST['signup_begin'] ? " checked=\"checked\"" : "";
		
		$signup_cutoff_days = $this->format_list_days("", isset($_POST['signup_cutoff_day']) ? $_POST['signup_cutoff_day'] : $day);
		$signup_cutoff_months = $this->format_list_months("", isset($_POST['signup_cutoff_month']) ? $_POST['signup_cutoff_month'] : $month);
		$signup_cutoff_years = $this->format_list_years("", isset($_POST['signup_cutoff_year']) ? $_POST['signup_cutoff_year'] : $year);
		$signup_cutoff_selected = isset($_POST['signup_cutoff']) && $_POST['signup_cutoff'] ? " checked=\"checked\"" : "";
		
		$signup_limit = isset($_POST['signup_limit']) && is_numeric($_POST['signup_limit']) ? $_POST['signup_limit'] : 0;
		$signup_no_limit_selected = isset($_POST['signup_no_limit']) && $_POST['signup_no_limit'] ? " checked=\"checked\"" : "";
		
		foreach ($this->filter as $key => $value) {
			$$key = isset($_POST[$key]) && $_POST[$key] ? " checked=\"checked\"" : "";
		}
		$type_custom_selected = isset($_POST['type_custom_selected']) && $_POST['type_custom_selected'] ? " checked=\"checked\"" : "";
		
		$type_custom = "";
		$query = new Query(sprintf("SELECT type_id, type_name FROM %scalendar_event_type_custom WHERE disabled=FALSE ORDER BY type_name ASC", TABLE_PREFIX));
		while ($row = $query->fetch_row()) {
			$type_custom .= sprintf("<option value=\"%d\">%s</option>", $row['type_id'], $row['type_name']);
		}
		
		$description = isset($_POST['description']) ? $_POST['description'] : "";
		
		echo <<<DOCHERE_add_event
<div id="addEvent">
<form id="addEventForm" action="#" method="post" onsubmit="">
<table>
<caption>Add Event</caption>
<tr>
  <td class="fieldName" axis="Field Name">Event Title</td>
  <td class="fieldInput" axis="Field Input" colspan="3"><input type="text" class="text" name="title" value="$title" /></td>
</tr>
<tr>
  <td class="fieldName" axis="Field Name">Location</td>
  <td class="fieldInput" axis="Field Input" colspan="3"><input type="text" class="text" name="location" value="$location" /></td>
</tr>
<tr>
  <td class="fieldName" axis="Field Name">Date</td>
  <td class="fieldInput" axis="Field Input" colspan="3">
    <select id="addEventMonth" name="month">$date_months</select>
    <select id="addEventDay" name="day">$date_days</select>
    <select id="addEventYear" name="year">$date_years</select>
  </td>
</tr>
<tr>
  <td class="fieldName" axis="Field Name">Time</td>
  <td class="fieldInput" axis="Field Input" colspan="3">
    <select id="addEventStartHour" name="start_hour">$start_hour</select><select id="addEventStartMinute" name="start_minute">$start_minute</select><select id="addEventStartPeriod" name="start_period"><option value="0"$start_am_selected>am</option><option value="1"$start_pm_selected>pm</option></select>
    to <select id="addEventEndHour" name="end_hour">$end_hour</select><select id="addEventEndMinute" name="end_minute">$end_minute</select><select id="addEventEndPeriod" name="end_period"><option value="0"$end_am_selected>am</option><option value="1"$end_pm_selected>pm</option></select>
    <div id="timeOptions"><span><input type="checkbox" name="allday" onclick=""$allday_selected />All Day</span><span><input type="checkbox" name="tba" onclick=""$tba_selected />TBA</span><span><input type="checkbox" name="never_ends" onclick=""$never_ends_selected />Never Ends!</span></div>
  </td>
</tr>
<tr>
  <td class="fieldName" axis="Field Name">Create Multiple Events</td>
  <td class="fieldInput" axis="Field Input" colspan="3">
    Every <input type="text" size="2" name="interval"/> days up til
    <select id="multipleEventsBeginMonth" name="multiple_events_begin_month">$date_months</select>
    <select id="multipleEventsBeginDay" name="multiple_events_begin_day">$date_days</select>
    <select id="multipleEventsBeginYear" name="multiple_events_begin_year">$date_years</select>
    <input id="multipleEvents" type="checkbox" name="multiple_events"/>Enable
  </td>
</tr>
<tr>
  <td class="fieldName" axis="Field Name">Signup Start</td>
  <td class="fieldInput" axis="Field Input" colspan="3">
    <select id="addEventSignupBeginMonth" name="signup_begin_month">$signup_begin_months</select>
    <select id="addEventSignupBeginDay" name="signup_begin_day">$signup_begin_days</select>
    <select id="addEventSignupBeginYear" name="signup_begin_year">$signup_begin_years</select>
    <input id="signupBegin" type="checkbox" name="signup_begin"$signup_begin_selected />Enable
  </td>
</tr>
<tr>
  <td class="fieldName" axis="Field Name">Signup Cutoff</td>
  <td class="fieldInput" axis="Field Input" colspan="3">
    <select id="addEventSignupCutoffMonth" name="signup_cutoff_month">$signup_cutoff_months</select>
    <select id="addEventSignupCutoffDay" name="signup_cutoff_day">$signup_cutoff_days</select>
    <select id="addEventSignupCutoffYear" name="signup_cutoff_year">$signup_cutoff_years</select>
    <input id="signupCutoff" type="checkbox" name="signup_cutoff"$signup_cutoff_selected />Enable
  </td>
</tr>
<tr>
  <td class="fieldName" axis="Field Name">Signup Limit</td>
  <td class="fieldInput" axis="Field Input" colspan="3"><input type="text" size="2" name="signup_limit" value="$signup_limit" /> <input type="checkbox" name="signup_no_limit"$signup_no_limit_selected />No Limit</td>
</tr>
<tr>
  <td class="fieldName" axis="Field Name" rowspan="7">Event Type</td>
  <th class="typeHeading" axis="Chapter">Chapter</th><th class="typeHeading" axis="Fellowship">Friendship</th><th class="typeHeading" axis="Service">Service</th>
</tr>
<tr><td axis="Chapter"><input type="checkbox" name="type_active_meeting"$type_active_meeting />Active Meeting</td><td axis="Fellowship"><input type="checkbox" name="type_fellowship"$type_fellowship />Fellowship</td><td axis="Service"><input type="checkbox" name="type_service_chapter"$type_service_chapter />Chapter</td></tr>
<tr><td axis="Chapter"><input type="checkbox" name="type_pledge_meeting"$type_pledge_meeting />Pledge Meeting</td><td axis="Fellowship"><input type="checkbox" name="type_alumni"$type_alumni />Alumni</td><td axis="Service"><input type="checkbox" name="type_service_campus"$type_service_campus />Campus</td></tr>
<tr><td axis="Chapter"><input type="checkbox" name="type_leadership"$type_leadership />Leadership</td><td axis="Fellowship"><input type="checkbox" name="type_family"$type_family />Family</td><td axis="Service"><input type="checkbox" name="type_service_community"$type_service_community />Community</td></tr>
<tr><td axis="Chapter"><input type="checkbox" name="type_rush"$type_rush />Rush</td><td axis="Fellowship"><input type="checkbox" name="type_scouting"$type_scouting />Scouting</td><td axis="Service"><input type="checkbox" name="type_service_country"$type_service_country />Country</td></tr>
<tr><td axis="Chapter"><input type="checkbox" name="type_custom_selected"$type_custom_selected /><select name="type_custom">$type_custom</select></td><td axis="Fellowship"><input type="checkbox" name="type_interchapter"$type_interchapter />Interchapter</td><td axis="Service"><input type="checkbox" name="type_fundraiser"$type_fundraiser />Fundraiser</td></tr>
<tr><td axis="Chapter"></td><td axis="Fellowship"><input type="checkbox" name="type_interchapter_half"$type_interchapter_half />Interchapter Half</td><td axis="Service"></td></tr>
<tr>
  <td class="fieldName" axis="Field Name">Description</td>
  <td class="fieldInput" axis="Field Input" colspan="3"><textarea id="addEventDescription" name="description" rows="4" cols="40">$description</textarea></td>
</tr>
</table>
<div style="text-align:center">
<input type="hidden" name="submit" value="true" />
<input type="submit" value="Submit" />
</div>
</form>
</div>

DOCHERE_add_event;
	}
	
	function print_add_people() {
		global $g_user;
		
		if (!isset($_REQUEST['id']) || !is_numeric($_REQUEST['id'])) {
			trigger_error("Print Add People: Invalid event id.", E_USER_ERROR);
			return;
		} else if (!$g_user->is_logged_in()) {
			trigger_error("You must be logged in to do that.", E_USER_ERROR);
			return;
		}
		$event_id = $_REQUEST['id'];
		
		// Find out if user is chair or has permissions
		$query = new Query(sprintf("SELECT chair FROM %scalendar_attend WHERE event_id=%d AND user_id=%d LIMIT 1", TABLE_PREFIX, $event_id, $g_user->data['user_id']));
		$row = $query->fetch_row();
		if ((!$row || !$row['chair']) && !$g_user->permit("calendar add users")) {
			trigger_error("You do not have permission to do that.", E_USER_ERROR);
			return;
		}
		
		$search_results = "";
		if (isset($_REQUEST['function'])) {
			$where_array = array();
			if (isset($_REQUEST['firstname']) && $_REQUEST['firstname']) {
				$firstname = Query::escape_string($_REQUEST['firstname']);
				$where_array[] = "firstname LIKE '$firstname%'";
			}
			if (isset($_REQUEST['lastname']) && $_REQUEST['lastname']) {
				$lastname = Query::escape_string($_REQUEST['lastname']);
				$where_array[] = "lastname LIKE '$lastname%'";
			}
			if (isset($_REQUEST['pledgeclass']) && $_REQUEST['pledgeclass']) {
				$pledgeclass = Query::escape_string(trim($_REQUEST['pledgeclass']));
				$where_array[] = "pledgeclass = '$pledgeclass'";
			}
			$where_array[] = "depledged = FALSE";
			$where_expression = $_REQUEST['function'] == "Search" && $where_array ? "WHERE " . implode(" AND ", $where_array) : "";
			$query = new Query(sprintf("SELECT user_id, firstname, lastname, pledgeclass FROM %susers %s ORDER BY lastname ASC, firstname ASC", TABLE_PREFIX, $where_expression));
			while ($row = $query->fetch_row()) {
				$search_results .= sprintf("<tr><td axis=\"add\"><input type=\"checkbox\" name=\"result%d\" value=\"%d\" /></td><td axis=\"name\">%s, %s</td><td axis=\"pledgeclass\">%s</td></tr>\r\n",
					$row['user_id'], $row['user_id'], $row['lastname'], $row['firstname'], $row['pledgeclass']);
			}
			if ($search_results) {
				$evaluate = isset($_REQUEST['evaluate']) && $_REQUEST['evaluate'] ? "<input type=\"hidden\" name=\"evaluate\" value=\"true\" />" : "";
				$search_results = <<<DOCHERE_print_add_people_search
<form action="event.php" method="post">
<table>
<tr><th axis="add">Add</th><th axis="name">Name</th><th axis="pledgeclass">Pledge Class</th></tr>
$search_results
</table>
<button type="submit" name="function" value="Add People To Event">Add People To Event</button>
<input type="hidden" name="id" value="$event_id" />
$evaluate
</form>

DOCHERE_print_add_people_search;
			} else {
				$search_results = "<p><strong>No Results</strong></p>";
			}
		}
		
		$evaluate = isset($_REQUEST['evaluate']) && $_REQUEST['evaluate'] ? "<input type=\"hidden\" name=\"evaluate\" value=\"true\" />" : "";
		echo <<<DOCHERE_print_add_people
<div id="add_people">
<div style="text-align:center">
<form action="event_add_people.php" method="get">
<table style="margin-left:auto; margin-right:auto">
<caption style="font-size:larger">Search for people to add</caption>
<tr><td>Firstname: </td><td><input type="text" name="firstname" /></td></tr>
<tr><td>Lastname: </td><td><input type="text" name="lastname" /></td></tr>
<tr><td>Pledgeclass: </td><td><input type="text" name="pledgeclass" /></td></tr>
</table>
<button type="submit" name="function" value="Search">Search</button> 
<input type="hidden" name="id" value="$event_id" />
$evaluate
</form>
<form action="event_add_people.php" method="get">
<button type="submit" name="function" value="Show All">Show All</button>
<input type="hidden" name="id" value="$event_id" />
$evaluate
</form>
</div>
$search_results
</div>

DOCHERE_print_add_people;
	}
	
	function print_edit_event() {
		global $g_user;
		// Make sure user is allowed to edit this event
		if (!isset($_REQUEST['id']) || !is_numeric($_REQUEST['id'])) {
			trigger_error("Print Edit Event: Invalid event id.", E_USER_ERROR);
			return;
		}
		$event_id = $_REQUEST['id'];
		if (!$g_user->permit("calendar edit events")) {
			$query = new Query(sprintf("SELECT user_id FROM %scalendar_attend WHERE event_id=%d AND user_id=%d AND chair=TRUE LIMIT 1", TABLE_PREFIX, $event_id, $g_user->data['user_id']));
			$row = $query->fetch_row();
			if (!$row) {
				trigger_error("You do not have permission to edit this event.", E_USER_ERROR);
				return;
			}
		}
		
		$query = new Query(sprintf("SELECT * FROM %scalendar_event WHERE event_id=%d LIMIT 1", TABLE_PREFIX, $event_id));
		$row = $query->fetch_row();
		$event_time = strtotime($row['date']);
		$time_start = $row['time_start'] ? strtotime($row['time_start']) : strtotime("1:00am");
		$time_end = $row['time_end'] ? strtotime($row['time_end']) : strtotime("1:00am");
		$signup_begin = $row['signup_begin'] ? strtotime($row['signup_begin']) : $event_time;
		$signup_cutoff = $row['signup_cutoff'] ? strtotime($row['signup_cutoff']) : $event_time;
		$creator_id = $row['creator_id'];  
		
		$year = isset($_REQUEST['year']) ? $_REQUEST['year'] : false;
		$month = isset($_REQUEST['month']) ? $_REQUEST['month'] : false;
		$day = isset($_REQUEST['day']) ? $_REQUEST['day'] : false;
		
		// Validate the requested date
		if (!(is_numeric($year) && is_numeric($month) && is_numeric($day)
			&& $year >= 1925 && $month >= 1 && $month <= 12 && $day >= 1 && $day <= 31)) {
			$year = date("Y", $event_time);
			$month = date("m", $event_time);
			$day = date("d", $event_time);
		}
		
		$title = isset($_POST['title']) ? $_POST['title'] : $row['title'];
		$location = isset($_POST['location']) ? $_POST['location'] : $row['location'];
		
		if ($g_user->permit("calendar edit events") || $creator_id == $g_user->data['user_id']) {
			$date_disabled = "";
		} else {
			$date_disabled = "disabled";
		}
		$date_days = $this->format_list_days("", $day);
		$date_months = $this->format_list_months("", $month);
		$date_years = $this->format_list_years("", $year);
		
		$start_hour = $this->format_list_hours("", isset($_POST['start_hour']) ? $_POST['start_hour'] : date("h", $time_start));
		$start_minute = $this->format_list_minutes("", isset($_POST['start_minute']) ? $_POST['start_minute'] : date("i", $time_start), 5);
		$end_hour = $this->format_list_hours("", isset($_POST['end_hour']) ? $_POST['end_hour'] : date("h", $time_end));
		$end_minute = $this->format_list_minutes("", isset($_POST['end_hour']) ? $_POST['end_hour'] : date("i", $time_end), 5);
		
		$start_am_selected = isset($_POST['start_period']) && $_POST['start_period'] == 0 || date("a", $time_start) == 'am' ? " selected=\"selected\"" : "";
		$start_pm_selected = isset($_POST['start_period']) && $_POST['start_period'] == 1 || date("a", $time_start) == 'pm' ? " selected=\"selected\"" : "";
		$end_am_selected = isset($_POST['end_period']) && $_POST['end_period'] == 0 || date("a", $time_end) == 'am' ? " selected=\"selected\"" : "";
		$end_pm_selected = isset($_POST['end_period']) && $_POST['end_period'] == 1 || date("a", $time_end) == 'pm' ? " selected=\"selected\"" : "";
		
		$allday_selected = isset($_POST['allday']) && $_POST['allday'] || $row['time_allday'] ? " checked=\"checked\"" : "";
		$tba_selected = isset($_POST['tba']) && $_POST['tba'] || !$row['time_allday'] && !$row['time_start'] ? " checked=\"checked\"" : "";
		$never_ends_selected = isset($_POST['never_ends']) && $_POST['never_ends'] || !$row['time_allday'] && $row['time_start'] && !$row['time_end'] ? " checked=\"checked\"" : "";
		
		$signup_begin_days = $this->format_list_days("", isset($_POST['signup_begin_day']) ? $_POST['signup_begin_day'] : date("d", $signup_begin));
		$signup_begin_months = $this->format_list_months("", isset($_POST['signup_begin_month']) ? $_POST['signup_begin_month'] : date("m", $signup_begin));
		$signup_begin_years = $this->format_list_years("", isset($_POST['signup_begin_year']) ? $_POST['signup_begin_year'] : date("Y", $signup_begin));
		$signup_begin_selected = isset($_POST['signup_begin']) && $_POST['signup_begin'] || $row['signup_begin'] != null ? " checked=\"checked\"" : "";
		
		$signup_cutoff_days = $this->format_list_days("", isset($_POST['signup_cutoff_day']) ? $_POST['signup_cutoff_day'] : date("d", $signup_cutoff));
		$signup_cutoff_months = $this->format_list_months("", isset($_POST['signup_cutoff_month']) ? $_POST['signup_cutoff_month'] : date("m", $signup_cutoff));
		$signup_cutoff_years = $this->format_list_years("", isset($_POST['signup_cutoff_year']) ? $_POST['signup_cutoff_year'] : date("Y", $signup_cutoff));
		$signup_cutoff_selected = isset($_POST['signup_cutoff']) && $_POST['signup_cutoff'] || $row['signup_cutoff'] != null ? " checked=\"checked\"" : "";
		
		$signup_limit = isset($_POST['signup_limit']) && is_numeric($_POST['signup_limit']) ? $_POST['signup_limit'] : $row['signup_limit'];
		$signup_no_limit_selected = isset($_POST['signup_no_limit']) && $_POST['signup_no_limit'] || $row['signup_limit'] == 0 ? " checked=\"checked\"" : "";
		
		foreach ($this->filter as $key => $value) {
			$$key = isset($_POST[$key]) && $_POST[$key] || $row[$key] ? " checked=\"checked\"" : "";
		}
		$type_custom_selected = isset($_POST['type_custom_selected']) && $_POST['type_custom_selected'] || $row['type_custom'] ? " checked=\"checked\"" : "";
		
		$type_custom = "";
		$query = new Query(sprintf("SELECT type_id, type_name FROM %scalendar_event_type_custom WHERE disabled=FALSE ORDER BY type_name ASC", TABLE_PREFIX));
		while ($row2 = $query->fetch_row()) {
			$type_selected = $row['type_custom'] == $row2['type_id'] ? " selected=\"selected\"" : "";
			$type_custom .= sprintf("<option value=\"%d\"$type_selected>%s</option>", $row2['type_id'], $row2['type_name']);
		}
		
		$description = isset($_POST['description']) ? $_POST['description'] : html_entity_decode(str_replace("<br />", "\r\n", $row['description']), ENT_QUOTES, 'UTF-8');
		
		echo <<<DOCHERE_edit_event
<div id="addEvent">
<form id="addEventForm" action="#" method="post" onsubmit="">
<table>
<caption>Edit Event</caption>
<tr>
  <td class="fieldName" axis="Field Name">Event Title</td>
  <td class="fieldInput" axis="Field Input" colspan="3"><input type="text" class="text" name="title" value="$title" /></td>
</tr>
<tr>
  <td class="fieldName" axis="Field Name">Location</td>
  <td class="fieldInput" axis="Field Input" colspan="3"><input type="text" class="text" name="location" value="$location" /></td>
</tr>
<tr>
  <td class="fieldName" axis="Field Name">Date</td>
  <td class="fieldInput" axis="Field Input" colspan="3">
    <select id="addEventMonth" name="month" $date_disabled>$date_months</select>
    <select id="addEventDay" name="day" $date_disabled>$date_days</select>
    <select id="addEventYear" name="year" $date_disabled>$date_years</select>
  </td>
</tr>
<tr>
  <td class="fieldName" axis="Field Name">Time</td>
  <td class="fieldInput" axis="Field Input" colspan="3">
    <select id="addEventStartHour" name="start_hour">$start_hour</select><select id="addEventStartMinute" name="start_minute">$start_minute</select><select id="addEventStartPeriod" name="start_period"><option value="0"$start_am_selected>am</option><option value="1"$start_pm_selected>pm</option></select>
    to <select id="addEventEndHour" name="end_hour">$end_hour</select><select id="addEventEndMinute" name="end_minute">$end_minute</select><select id="addEventEndPeriod" name="end_period"><option value="0"$end_am_selected>am</option><option value="1"$end_pm_selected>pm</option></select>
    <div id="timeOptions"><span><input type="checkbox" name="allday" onclick=""$allday_selected />All Day</span><span><input type="checkbox" name="tba" onclick=""$tba_selected />TBA</span><span><input type="checkbox" name="never_ends" onclick=""$never_ends_selected />Never Ends!</span></div>
  </td>
</tr>
<tr>
  <td class="fieldName" axis="Field Name">Signup Start</td>
  <td class="fieldInput" axis="Field Input" colspan="3">
    <select id="addEventSignupBeginMonth" name="signup_begin_month">$signup_begin_months</select>
    <select id="addEventSignupBeginDay" name="signup_begin_day">$signup_begin_days</select>
    <select id="addEventSignupBeginYear" name="signup_begin_year">$signup_begin_years</select>
    <input id="signupBegin" type="checkbox" name="signup_begin"$signup_begin_selected />Enable
  </td>
</tr>
<tr>
  <td class="fieldName" axis="Field Name">Signup Cutoff</td>
  <td class="fieldInput" axis="Field Input" colspan="3">
    <select id="addEventSignupCutoffMonth" name="signup_cutoff_month">$signup_cutoff_months</select>
    <select id="addEventSignupCutoffDay" name="signup_cutoff_day">$signup_cutoff_days</select>
    <select id="addEventSignupCutoffYear" name="signup_cutoff_year">$signup_cutoff_years</select>
    <input id="signupCutoff" type="checkbox" name="signup_cutoff"$signup_cutoff_selected />Enable
  </td>
</tr>
<tr>
  <td class="fieldName" axis="Field Name">Signup Limit</td>
  <td class="fieldInput" axis="Field Input" colspan="3"><input type="text" size="2" name="signup_limit" value="$signup_limit" /> <input type="checkbox" name="signup_no_limit"$signup_no_limit_selected />No Limit</td>
</tr>
<tr>
  <td class="fieldName" axis="Field Name" rowspan="7">Event Type</td>
  <th class="typeHeading" axis="Chapter">Chapter</th><th class="typeHeading" axis="Fellowship">Friendship</th><th class="typeHeading" axis="Service">Service</th>
</tr>
<tr><td axis="Chapter"><input type="checkbox" name="type_active_meeting"$type_active_meeting />Active Meeting</td><td axis="Fellowship"><input type="checkbox" name="type_fellowship"$type_fellowship />Fellowship</td><td axis="Service"><input type="checkbox" name="type_service_chapter"$type_service_chapter />Chapter</td></tr>
<tr><td axis="Chapter"><input type="checkbox" name="type_pledge_meeting"$type_pledge_meeting />Pledge Meeting</td><td axis="Fellowship"><input type="checkbox" name="type_alumni"$type_alumni />Alumni</td><td axis="Service"><input type="checkbox" name="type_service_campus"$type_service_campus />Campus</td></tr>
<tr><td axis="Chapter"><input type="checkbox" name="type_leadership"$type_leadership />Leadership</td><td axis="Fellowship"><input type="checkbox" name="type_family"$type_family />Family</td><td axis="Service"><input type="checkbox" name="type_service_community"$type_service_community />Community</td></tr>
<tr><td axis="Chapter"><input type="checkbox" name="type_rush"$type_rush />Rush</td><td axis="Fellowship"><input type="checkbox" name="type_scouting"$type_scouting />Scouting</td><td axis="Service"><input type="checkbox" name="type_service_country"$type_service_country />Country</td></tr>
<tr><td axis="Chapter"><input type="checkbox" name="type_custom_selected"$type_custom_selected /><select name="type_custom">$type_custom</select></td><td axis="Fellowship"><input type="checkbox" name="type_interchapter"$type_interchapter />Interchapter</td><td axis="Service"><input type="checkbox" name="type_fundraiser"$type_fundraiser />Fundraiser</td></tr>
<tr><td axis="Chapter"></td><td axis="Fellowship"><input type="checkbox" name="type_interchapter_half"$type_interchapter_half />Interchapter Half</td><td axis="Service"></td></tr>
<tr>
  <td class="fieldName" axis="Field Name">Description</td>
  <td class="fieldInput" axis="Field Input" colspan="3"><textarea id="addEventDescription" name="description" rows="4" cols="40">$description</textarea></td>
</tr>
</table>
<div style="text-align:center">
<input type="hidden" name="submit" value="true" />
<input class="btn btn-primary btn-small" type="submit" value="Submit" />
</div>
</form>
</div>

DOCHERE_edit_event;
	}
	
	function print_evaluation() {
		global $g_user;
		// Make sure user is allowed to evaluate this event
		if (!isset($_REQUEST['id']) || !is_numeric($_REQUEST['id'])) {
			trigger_error("Print Evaluation: Invalid event id.", E_USER_ERROR);
			return;
		}
		$event_id = $_REQUEST['id'];
		if (!$g_user->permit("calendar view evaluations")) {
			trigger_error("You do not have permission to view this evaluation.", E_USER_ERROR);
			return;
		}
		
		// Get event details
		$deleted = $g_user->permit("calendar view deleted") ? "" : " AND deleted=FALSE";
		$query = new Query(sprintf("SELECT %scalendar_event.*, type_name FROM %scalendar_event LEFT JOIN %scalendar_event_type_custom ON (type_custom = type_id) WHERE event_id=%d$deleted LIMIT 1", TABLE_PREFIX, TABLE_PREFIX, TABLE_PREFIX, $event_id));
		if ($row = $query->fetch_row()) {
			$title = $row['title'];
			$event_time = strtotime($row['date']);
			$date = date("l, M d, Y", $event_time);
			$location = $row['location'] ? " @ " . $row['location'] : "";
			$signup_limit = $row['signup_limit'] == 0 ? "No Max!" : $row['signup_limit'];
			$description = $this->format_add_links($row['description']);
			$signup_begin_time = $row['signup_begin'] ? strtotime($row['signup_begin']) : false;
			$signup_cutoff_time = $row['signup_cutoff'] ? strtotime($row['signup_cutoff']) : strtotime("-3 days", strtotime($row['date']));
			$signup_cutoff = date("l, M d, Y", $signup_cutoff_time);
			
			// Figure out the Time formatting
			if ($row['time_allday']) {
				$time = "All Day";
			} else if ($row['time_start'] && $row['time_end']) {
				$time = sprintf("%s to %s", date("g:ia", strtotime($row['time_start'])), date("g:ia", strtotime($row['time_end'])));
			} else if ($row['time_start']) {
				$time = date("g:ia", strtotime($row['time_start']));
			} else {
				$time = "TBA";
			}
			
			// Figure out what event types this encompasses
			$event_types_array = array();
			foreach ($this->event_type_names as $key => $value) {
				if ($row[$key]) {
					$event_types_array[] = $value;
				}
			}
			if ($row['type_name']) {
				$event_types_array[] = $row['type_name'];
			}
			$event_types = implode(", ", $event_types_array);
			
			// Figure out who the chairs are
			$query = new Query(sprintf("SELECT email, firstname, lastname, pledgeclass FROM %scalendar_attend JOIN %susers USING (user_id) WHERE event_id=%d AND chair=TRUE", TABLE_PREFIX, TABLE_PREFIX, $event_id));
			$chairs_array = array();
			while ($row = $query->fetch_row()) {
				$chairs_array[] = sprintf("%s %s (%s)", $row['firstname'], $row['lastname'], $row['pledgeclass']);
			}
			$chairs = $chairs_array ? implode(", ", $chairs_array) : "None";
			$chair_count = $query->num_rows();
		}
		
		// Get the attendees
		$attendees = "";
		$attendee_count = 0;
		$odd_row = true;
		$query = new Query(sprintf("SELECT %scalendar_attend.user_id, firstname, lastname, attended, flaked, chair, driver, hours, miles FROM %scalendar_attend JOIN %susers USING (user_id) WHERE event_id=%d ORDER BY signup_time",
			TABLE_PREFIX, TABLE_PREFIX, TABLE_PREFIX, $event_id));
		while ($row = $query->fetch_row()) {
			$realMiles = $row['miles'] / $row['driver'];
			$attendee_count++;
			$row_class = $odd_row ? "odd" : "";
			$attended = $row['attended'] && !$row['chair'] ? "<span style=\"font-weight: bold\">X</span>" : "&nbsp;";
			$chaired = $row['chair'] ? "<span style=\"font-weight: bold\">X</span>" : "&nbsp;";
			$flaked = $row['flaked'] ? "<span style=\"font-weight: bold\">X</span>" : "&nbsp;";
			$drove = $row['driver'] > 0 ? "<span style=\"font-weight: bold\">$row[driver]</span>" : "&nbsp;";
			$hours = is_numeric($row['hours']) ? "<span style=\"font-weight: bold\">$row[hours]</span>" : "<span style=\"font-weight: bold; color: red;\">???</span>";
			$miles = is_numeric($row['miles']) ? "<span style=\"font-weight: bold\">$realMiles</span>" : "<span style=\"font-weight: bold; color: red;\">???</span>";
			$attendees .= <<<DOCHERE
<tr class="$row_class">
<td axis="name">$attendee_count. <span style="font-weight: bold">$row[firstname] $row[lastname]</span></td>
<td axis="attended" class="center">$attended</td>
<td axis="chaired" class="center">$chaired</td>
<td axis="flaked" class="center">$flaked</td>
<td axis="drove" class="center">$drove</td>
<td axis="hours" class="center">$hours</td>
<td axis="Person-Miles Drove" class="center">$miles</td>
</tr>

DOCHERE;
		}
		
		// Get the evaluation questions
		$questions = "";
		$query = new Query(sprintf("SELECT %sevent_evaluation.user_id, firstname, lastname, pledgeclass, text_response, numerical_response, description, type FROM %sevent_evaluation JOIN %sevent_evaluation_control USING (field_id) JOIN %susers ON (%sevent_evaluation.user_id = %susers.user_id) WHERE event_id=%d ORDER BY ordering DESC",
			TABLE_PREFIX, TABLE_PREFIX, TABLE_PREFIX, TABLE_PREFIX, TABLE_PREFIX, TABLE_PREFIX, $event_id));
		while ($row = $query->fetch_row()) {
			switch ($row['type']) {
			case 'text':
				$response = $row['text_response'];
				break;
			case 'numerical':
				$response = $row['numerical_response'];
				break;
			default:
				$response = "";
				trigger_error("There was a problem reading the event evaluation. Please contact the webmaster.", E_USER_ERROR);
			}
			$questions .= <<<DOCHERE
<div class="question">$row[description]</div>
<div class="response">$response <span class="author">-$row[firstname] $row[lastname] ($row[pledgeclass])</span></div>

DOCHERE;
		}
		
		echo <<<DOCHERE_print_evaluation
<div id="evaluation">

<div id="event">

<div id="event_title">$title</div>

<div id="event_body">

<table id="event_details">
<caption>Event Details</caption>
<tr><th axis="date">Date:</th><td axis="date">$date</td></tr>
<tr><th axis="time">Time:</th><td axis="time">$time$location</td></tr>
<tr><th axis="types">Type(s):</th><td axis="types">$event_types</td></tr>
<tr><th axis="chairs">Chair(s):</th><td axis="chairs">$chairs</td></tr>
<tr><th axis="cutoff">Cutoff:</th><td axis="cutoff">$signup_cutoff</td></tr>
<tr><th axis="limit">Limit:</th><td axis="limit">$signup_limit</td></tr>
</table>

<div id="event_description_title"><hr />Description:</div>
<div id="event_description">$description</div>
<hr />

<div>
<table id="evaluation_attendance">
<caption></caption>
<tr>
<th axis="name">Name</th>
<th axis="attended" class="center">Attended</th>
<th axis="chaired" class="center">Chaired</th>
<th axis="flaked" class="center">Flaked</th>
<th axis="drove" class="center">Drove</th>
<th axis="hours" class="center">Hours</th>
<th axis="miles" class="center">Miles Drove</th>
</tr>
$attendees
</table>
$questions
</div>

</div>
</div>

</div>

DOCHERE_print_evaluation;
	}
	
	function make_title() {
		global $g_user;
		if (!isset($_REQUEST['id']) || !is_numeric($_REQUEST['id'])) {
			trigger_error("Bad event id", E_USER_ERROR);
			return;
		}
		if (isset($_REQUEST['refresh']) && $_REQUEST['refresh']) {
			echo '<script language="javascript" type="text/javascript">window.opener.location.reload(true)</script>';
		}
		$event_id = $_REQUEST['id'];
		$deleted = $g_user->permit("calendar view deleted") ? "" : " AND deleted=FALSE";
		$query = new Query(sprintf("SELECT %scalendar_event.*, type_name FROM %scalendar_event LEFT JOIN %scalendar_event_type_custom ON (type_custom = type_id) WHERE event_id=%d$deleted LIMIT 1", TABLE_PREFIX, TABLE_PREFIX, TABLE_PREFIX, $event_id));
		if ($row = $query->fetch_row()) {
			$title = $row['title'];
		} else {
			$title = "Event";
		}
		
echo <<<HEREDOC
	<title>Alpha Phi Omega - $title</title>
HEREDOC;

	}

	function print_event() {
		global $g_user;
		if (!isset($_REQUEST['id']) || !is_numeric($_REQUEST['id'])) {
			trigger_error("Bad event id", E_USER_ERROR);
			return;
		}
		if (isset($_REQUEST['refresh']) && $_REQUEST['refresh']) {
			echo '<script language="javascript" type="text/javascript">window.opener.location.reload(true)</script>';
		}
		$event_id = $_REQUEST['id'];
		$deleted = $g_user->permit("calendar view deleted") ? "" : " AND deleted=FALSE";
		$query = new Query(sprintf("SELECT %scalendar_event.*, type_name FROM %scalendar_event LEFT JOIN %scalendar_event_type_custom ON (type_custom = type_id) WHERE event_id=%d$deleted LIMIT 1", TABLE_PREFIX, TABLE_PREFIX, TABLE_PREFIX, $event_id));
		if ($row = $query->fetch_row()) {
			$title = $row['title'];
			$event_time = strtotime($row['date']);
			$date = date("l, M d, Y", $event_time);
			$location = $row['location'] && $g_user->is_logged_in() ? "<a href=\"https://maps.google.com/maps?hl=en&q=" . $row['location'] . "&near=Berkeley, CA" . "\">" . $row['location'] . "</a>" : "";
			$signup_limit = $row['signup_limit'] == 0 ? "No Max!" : $row['signup_limit'];
			$description = $this->format_add_links($row['description']);
			$signup_begin_time = $row['signup_begin'] ? strtotime($row['signup_begin']) : false;
			$signup_cutoff_time = $row['signup_cutoff'] ? strtotime($row['signup_cutoff']) : strtotime("-3 days", strtotime($row['date']));
			$signup_cutoff = date("l, M d, Y", $signup_cutoff_time);
			$signup_hardlock = $row['signup_lock'];
			$now = strtotime("now");
			$deleted = $row['deleted'];
			$is_evaluated = $row['evaluated'];
			
			$signup_lock = $signup_hardlock || $signup_cutoff_time <= $now || $signup_begin_time && $signup_begin_time > $now;
			
			// Find out if user is chair
			$query2 = new Query(sprintf("SELECT chair FROM %scalendar_attend WHERE event_id=%d AND user_id=%d LIMIT 1", TABLE_PREFIX, $event_id, $g_user->data['user_id']));
			if ($row2 = $query2->fetch_row()) {
				$is_chair = $row2['chair'];
			} else {
				$is_chair = false;
			}
			// Find out if user is photographer
			$query2 = new Query(sprintf("SELECT photographer FROM %scalendar_attend WHERE event_id=%d AND user_id=%d LIMIT 1", TABLE_PREFIX, $event_id, $g_user->data['user_id']));
			if ($row2 = $query2->fetch_row()) {
				$is_photographer = $row2['photographer'];
			} else {
				$is_photographer = false;
			}
			
			// Figure out the Time formatting
			if ($row['time_allday']) {
				$time = "All Day";
			} else if ($row['time_start'] == "01:00:00" && $row['time_end'] == "01:00:00") {
				$time = "TBA";
			} else if ($row['time_start'] && $row['time_end']) {
				$time = sprintf("%s to %s", date("g:ia", strtotime($row['time_start'])), date("g:ia", strtotime($row['time_end'])));
			} else if ($row['time_start']) {
				$time = date("g:ia", strtotime($row['time_start']));
			} else {
				$time = "TBA";
			}
			
			// Figure out what event types this encompasses
			$event_types_array = array();
			foreach ($this->event_type_names as $key => $value) {
				if ($row[$key]) {
					$event_types_array[] = $value;
				}
			}
			if ($row['type_name']) {
				$event_types_array[] = $row['type_name'];
			}
			$event_types = implode(", ", $event_types_array);
			
			// Figure out who the chairs are
			$query = new Query(sprintf("SELECT email, firstname, lastname, pledgeclass FROM %scalendar_attend JOIN %susers USING (user_id) WHERE event_id=%d AND chair=TRUE", TABLE_PREFIX, TABLE_PREFIX, $event_id));
			$chairs_array = array();
			$chair_emails = array();
			while ($row = $query->fetch_row()) {
				//$chairs_array[] = sprintf("<a href=\"mailto:%s\">%s %s</a>", $row['email'], $row['firstname'], $row['lastname']);
				$chairs_array[] = sprintf("%s %s (%s)", $row['firstname'], $row['lastname'], $row['pledgeclass']);
				$chair_emails[] = $row['email'];
			}
			$chairs = $chairs_array && $g_user->is_logged_in() ? implode(", ", $chairs_array) : "";
			$chair_count = $query->num_rows();
			
			// Figure out who the attendees are
			$query = new Query(sprintf("SELECT %scalendar_attend.user_id, email, firstname, lastname, signup_time, driver, pledgeclass, phone, cellphone, chair, photographer FROM %scalendar_attend JOIN %susers USING (user_id) WHERE event_id=%d ORDER BY signup_time", TABLE_PREFIX, TABLE_PREFIX, TABLE_PREFIX, $event_id));
			$attendees = "";
			$attendee_emails = array();
			$waitlist = $signup_limit != 0 && $query->num_rows() > $signup_limit ? "<tr><th axis=\"subheading\">Waitlist</th></tr>\r\n" : "";
			$attendee_count = 0;
			$remove_attendee_heading = !$signup_hardlock && $is_chair && $now < $event_time || $g_user->permit("calendar drop users") ? "<th axis=\"remove\">Drop</th>" : "";
			while ($row = $query->fetch_row()) {
				$driving = $row['driver'] ? $row['driver'] : "";

				$photographer = $row['photographer'] ? "<Center><img src=\"images/Camera_icon.gif\" width=20 height=22></Center>" : "";
				$signup_time = date("m-d-Y H:i:s", strtotime($row['signup_time']));
				$attendee_count++;
				$attendee_emails[] = $row['email'];
				$remove_attendee = !$signup_hardlock && $is_chair && $now < $event_time && $row['user_id'] != $g_user->data['user_id'] || $g_user->permit("calendar drop users") ? "<td axis=\"remove\">[<a href=\"event.php?id=$event_id&function=removeUser&user_id=$row[user_id]\" onclick=\"return confirm('Are you sure you want to REMOVE this person?')\">x</a>]</td>" : "";
				if ($signup_limit == 0 || $attendee_count <= $signup_limit) {
					$attendees .= sprintf("<tr><td axis=\"name\">%d. %s %s</td><td axis=\"pledgeclass\">%s</td><td axis=\"photographer\">%s</td><td axis=\"driving\">%s</td><td axis=\"phone\">%s</td><td axis=\"cell\">%s</td><td axis=\"signup\">%s</td>$remove_attendee</tr>\r\n",
						$attendee_count, $row['firstname'], $row['lastname'], $row['pledgeclass'], $photographer, $driving, $row['phone'], $row['cellphone'], $signup_time);
				} else {
					$waitlist .= sprintf("<tr><td axis=\"name\">%d. %s %s</td><td axis=\"pledgeclass\">%s</td><td axis=\"photographer\">%s</td><td axis=\"driving\">%s</td><td axis=\"phone\">%s</td><td axis=\"cell\">%s</td><td axis=\"signup\">%s</td>$remove_attendee</tr>\r\n",
						$attendee_count, $row['firstname'], $row['lastname'], $row['pledgeclass'], $photographer, $driving, $row['phone'], $row['cellphone'], $signup_time);
				}
			}
			
			// Figure out user permissions
			// This code needs to be cleaned up
			$five_days_expired = $now >= strtotime("-5 days", $event_time);
			$max_chairs = ceil((is_numeric($signup_limit) && $signup_limit ? min($signup_limit, $attendee_count) : $attendee_count) / 20);
			$query = new Query(sprintf("SELECT chair, driver FROM %scalendar_attend WHERE event_id=%d AND user_id=%d LIMIT 1", TABLE_PREFIX, $event_id, $g_user->data['user_id']));
			if ($row = $query->fetch_row()) {
				$signup = '';
				$make_me_chair = !$signup_hardlock && !$row['chair'] && $chair_count < $max_chairs ? "<li><form action=\"event.php\" method=\"post\"><button class=\"btn btn-small\" type=\"submit\" name=\"function\" value=\"Make Me Chair\">Make Me Chair</button><input type=\"hidden\" name=\"id\" value=\"$event_id\" /></form></li>" : '';
				$take_me_off = $is_chair && $five_days_expired ? '<strong>Chair Can\'t Drop</strong>' : (!$signup_lock ? "<li><form action=\"event.php\" method=\"post\"><button class=\"btn btn-small\" type=\"submit\" name=\"function\" value=\"Take Me Off\">Take Me Off</button><input type=\"hidden\" name=\"id\" value=\"$event_id\" /></form></li>" : '<strong>Signup Closed</strong>');
				if (!$signup_lock && !$is_photographer) {
					$photographer = "<li><form action=\"event.php\" method=\"post\"><button class=\"btn btn-small\" type=\"submit\" name=\"function\" value=\"Make Me Photographer\">Make Me Photographer</button><input type=\"hidden\" name=\"id\" value=\"$event_id\" /></form></li>";
				} 
				else if (!$signup_lock && $is_photographer){
					$photographer = "<li><form action=\"event.php\" method=\"post\"><button class=\"btn btn-small\" type=\"submit\" name=\"function\" value=\"Remove As Photographer\">Remove As Photographer</button><input type=\"hidden\" name=\"id\" value=\"$event_id\" /></form></li>";
				} else {
					$photographer = '';
				}
				$ics = "<li><form action=\"ICS.php\" method=\"post\"><button class=\"btn btn-small\" type=\"submit\" name=\"function\" value=\"icalendar\">Add to (Apple) iCalendar</button><input type=\"hidden\" name=\"id\" value=\"$event_id\" /></form></li>";
				$google_calendar = "<li><form action=\"ICS.php\" method=\"post\"><button class=\"btn btn-small\" type=\"submit\" name=\"function\" value=\"google_calendar\">Add to Google calendar</button><input type=\"hidden\" name=\"id\" value=\"$event_id\" /></form></li>";
				$email_attendees = $row['chair'] || $g_user->permit("calendar edit events") ? '<li><a href="mailto:' . implode(",", $attendee_emails) . '">Email Attendees</a></li>' : '';
				$email_chair = $row['chair'] || !$chair_emails ? '' : '<li><a href="mailto:' . implode(",", $chair_emails) . '">Email Chairs</a></li>';
				$edit_event = !$signup_hardlock && $row['chair'] || $g_user->permit("calendar edit events") ? '<li><a href="edit_event.php?id=' . $event_id . '">Edit Event</a></li>' : '';
				//$evaluate = $row['chair'] && $now > $event_time || $g_user->permit("calendar add evaluations") && $now > $event_time ? "<li><form action=\"event.php\" method=\"post\"><button type=\"submit\" name=\"function\" value=\"Evaluate Event\">Evaluate Event</button><input type=\"hidden\" name=\"id\" value=\"$event_id\" /></form></li>" : '';
				$driver = !$signup_hardlock ? "<div id=\"event_driver\"><form action=\"event.php\" method=\"post\">I can drive <input type=\"text\" name=\"driving\" size=\"2\" value=\"$row[driver]\" /> people including myself. <button class=\"btn btn-small\" type=\"submit\" name=\"function\" value=\"Edit Rides\">Edit Rides</button><input type=\"hidden\" name=\"id\" value=\"$event_id\" /></form></div>" : '';
			} else if ($g_user->is_logged_in()) {
				$signup = !$signup_lock ? "<li><form action=\"event.php\" method=\"post\"><button class=\"btn btn-small\" type=\"submit\" name=\"function\" value=\"Signup\">Signup</button><input type=\"hidden\" name=\"id\" value=\"$event_id\" /></form></li>" : '<strong>Signup Closed</strong>';
				$make_me_chair = !$signup_lock && ($chair_count < $max_chairs || $attendee_count == 0) ? "<li><form action=\"event.php\" method=\"post\"><button class=\"btn btn-small\" type=\"submit\" name=\"function\" value=\"Make Me Chair\">Make Me Chair</button><input type=\"hidden\" name=\"id\" value=\"$event_id\" /></form></li>" : '';
				$take_me_off = '';
				$photographer = '';
				$email_chair = $g_user->is_logged_in() && $chair_emails ? '<li><a href="mailto:' . implode(",", $chair_emails) . '">Email Chairs</a></li>' : '';
				$email_attendees = $g_user->permit("calendar edit events") ? '<li><a href="mailto:' . implode(",", $attendee_emails) . '">Email Attendees</a></li>' : '';
				$edit_event = $g_user->is_logged_in() && $g_user->permit("calendar edit events") ? '<li><a href="edit_event.php?id=' . $event_id . '">Edit Event</a></li>' : '';
				$evaluate = '';
				$driver = '';
			} else {
				$signup = !$signup_lock ? '<strong>Login to signup</strong>' : '<strong>Signup Closed</strong>';
				$make_me_chair = "";
				$photographer = "";
				$take_me_off = "";
				$email_chair = "";
				$email_attendees = "";
				$edit_event = "";
				$evaluate = "";
				$driver = "";
			}
			$post_comment = $g_user->is_logged_in() ? '<li><a href="#event_post_comment">Post Comment</a></li>' : '';
			$delete_event = !$deleted && $g_user->is_logged_in() && $g_user->permit("calendar delete events") ? "<li><a href=\"?id=$event_id&function=delete\" onclick=\"return confirm('Are you sure you want to DELETE this event?')\">Delete Event</a></li>" : '';
			$restore_event = $deleted && $g_user->is_logged_in() && $g_user->permit("calendar delete events") ? "<li><a href=\"?id=$event_id&function=restore\" onclick=\"return confirm('Are you sure you want to Restore this event?')\">Restore Event</a></li>" : '';
			$view_access_logs = $is_chair || $g_user->permit("calendar view logs") ? '<li><a href="event_log.php?id=' . $event_id . '">View Access Logs</a></li>' : '';
			$add_people = $is_chair && !$signup_hardlock || $g_user->is_logged_in() && $g_user->permit("calendar add users") && !$signup_hardlock ? '<li><a href="event_add_people.php?id=' . $event_id . '">Add People</a></li>' : '';
			$view_evaluation = $is_evaluated && ($is_chair || $g_user->permit("calendar view evaluations")) ? '<li><strong><a href="evaluation.php?id=' . $event_id . '">View Evaluation</a></strong></li>' : '';
			$evaluate = $is_chair && $now > $event_time || $g_user->permit("calendar add evaluations") && $now > $event_time ? "<li><form action=\"event.php\" method=\"post\"><button class=\"btn btn-small\" type=\"submit\" name=\"function\" value=\"Evaluate Event\">Evaluate Event</button><input type=\"hidden\" name=\"id\" value=\"$event_id\" /></form></li>" : '';
			
			// Retrieve the user comments
			$query = new Query(sprintf("SELECT comment_id, %scalendar_comment.user_id, timestamp, body, firstname, lastname FROM %scalendar_comment JOIN %susers USING (user_id) WHERE event_id=%d AND deleted=FALSE", TABLE_PREFIX, TABLE_PREFIX, TABLE_PREFIX, $event_id));
			$comments = "";
			while ($row = $query->fetch_row()) {
				$unlike = 0;
				$comment_body = $this->format_add_links($row['body']);
				$name = $row['firstname'] . " " . $row['lastname'];
				$post_time = date("M d, Y g:ia", strtotime($row['timestamp']));
				$queryLike = new Query(sprintf("SELECT count(*) as total FROM apo_calendar_comment_like WHERE comment_id=%d and unlike=0", $row['comment_id']));
				$rowLike = $queryLike->fetch_row();
				$queryPeople = new Query(sprintf("SELECT firstname, lastname, apo_calendar_comment_like.user_id as user_id FROM apo_calendar_comment_like JOIN apo_users USING (user_id) WHERE comment_id=%d and unlike=0", $row['comment_id']));
				$likePeople = "";
				if ($rowLike['total'] == 0) {
					$likeComment = "";
					$likePeople .= "No one liked this";
				} else if ($rowLike['total'] == 1) {
					$likeComment = "- <b>1</b> Like";
				} else {
					$likeComment = "- <b>" . $rowLike['total'] . "</b> Likes";
				}
				$count = 0;
				while($rowPeople = $queryPeople->fetch_row()) {
					if ($count == $rowLike['total'] - 1) {
						$likePeople .= $rowPeople['firstname'] . " " . $rowPeople['lastname'] . " liked this";
					} else {
						$likePeople .= $rowPeople['firstname'] . " " . $rowPeople['lastname'] . ", ";
					}
					if ($rowPeople['user_id'] == $g_user->data['user_id']) {
						$unlike = 1;
					}
					$count++;
				}
				if ($unlike == 0) {
					$like_button = "<a href=\"event.php?id=$event_id&function=like_comment&comment=$row[comment_id]\" title=\"$likePeople\">Like</a>";
				} else {
					$like_button = "<a href=\"event.php?id=$event_id&function=like_comment&comment=$row[comment_id]\" title=\"$likePeople\">Unlike</a>";
				}
				$delete_comment = $g_user->data['user_id'] === $row['user_id'] || $g_user->permit("calendar delete comments") ? " - <a href=\"event.php?id=$event_id&function=delete_comment&comment=$row[comment_id]\">Delete</a>" : "";
				$comments .= <<<DOCHERE_comments
<div class="event_comment">
<div class="event_comment_body">
$comment_body <br/>
</div>
<div class="event_comment_like">
$like_button $likeComment
</div>
<div class="event_comment_signature">
Posted by <strong>$name</strong> @ $post_time$delete_comment
</div>
</div>

DOCHERE_comments;
			}
			
			if ($g_user->is_logged_in()) {
				$body = <<<DOCHERE_event_body
<table id="event_attendees">
<caption>Event Attendees</caption>
<tr><th axis="name">Name</th><th axis="pledgeclass">Pledge Class</th><th axis="photographer"></th><th axis="driving">Driving</th><th axis="phone">Phone</th><th axis="cell">Cell</th><th axis="signup">Signed Up</th>$remove_attendee_heading</tr>
$attendees
$waitlist
</table>
<hr />

<div id="event_special_people">
$driver
</div>

<div id="event_comments">
<div id="event_comments_title">Comments:</div>
$comments

<div name="event_post_comment" id="event_post_comment">
<form action="#" method="post">
<div><textarea name="body" rows="10" cols="50"></textarea></div>
<div><button class="btn btn-small" type="submit" name="function" value="Post Comment">Post Comment</button></div>
</form>
</div>
</div>

DOCHERE_event_body;
			} else {
				$body = '<div style="text-align:center"><strong>You must login to view event attendance</strong></div>';
			}
			echo <<<DOCHERE_event
<div id="event">

<div id="event_title">$title</div>
<div id="event_navbar">
<ul>
$signup
$take_me_off
$make_me_chair
$photographer
$ics
$google_calendar
$post_comment
$email_chair
$email_attendees
$add_people
$edit_event
$delete_event
$restore_event
$view_access_logs
$evaluate
$view_evaluation
</ul>
</div>

<div id="event_body">

<table id="event_details">
<caption>Event Details</caption>
<tr><th axis="date">Date:</th><td axis="date">$date</td></tr>
<tr><th axis="time">Time:</th><td axis="time">$time</td></tr>
<tr><th axis="location">Location:</th><td axis="location">$location</td></tr>
<tr><th axis="types">Type(s):</th><td axis="types">$event_types</td></tr>
<tr><th axis="chairs">Chair(s):</th><td axis="chairs">$chairs</td></tr>
<tr><th axis="cutoff">Cutoff:</th><td axis="cutoff">$signup_cutoff</td></tr>
<tr><th axis="limit">Limit:</th><td axis="limit">$signup_limit</td></tr>
</table>

<div id="event_description_title"><hr />Description:</div>
<div id="event_description">$description</div>
<hr />

$body

</div>
</div>

DOCHERE_event;
		} else {
			trigger_error("Bad event id", E_USER_ERROR);
		}
	}
	
	function print_log() {
		global $g_user;
		if (!isset($_REQUEST['id']) || !is_numeric($_REQUEST['id'])) {
			trigger_error("Print Log: Invalid event id.", E_USER_ERROR);
			return;
		}
		$event_id = $_REQUEST['id'];
		
		// Find out if user is chair
		$query2 = new Query(sprintf("SELECT chair FROM %scalendar_attend WHERE event_id=%d AND user_id=%d LIMIT 1", TABLE_PREFIX, $event_id, $g_user->data['user_id']));
		if ($row2 = $query2->fetch_row()) {
			$is_chair = $row2['chair'];
		} else {
			$is_chair = false;
		}
		
		if (!$g_user->permit("calendar view logs") && !$is_chair) {
			trigger_error("You do not have permission to view the event access logs.", E_USER_ERROR);
			return;
		}
		$table = "";
		$query = new Query(sprintf("SELECT timestamp, description, user.firstname, user.lastname, target.firstname AS target_firstname, target.lastname AS target_lastname FROM %sevent_audit_trail LEFT JOIN %susers AS user USING (user_id) LEFT JOIN %susers AS target ON (target_user_id = target.user_id) WHERE event_id=%d", 
			TABLE_PREFIX, TABLE_PREFIX, TABLE_PREFIX, $event_id));
		while ($row = $query->fetch_row()) {
			$timestamp = date("n/j/y H:i:s", strtotime($row['timestamp']));
			$table .= sprintf("<tr><td axis=\"timestamp\">%s</td><td axis=\"user\">%s %s</td><td axis=\"target\">%s %s</td><td axis=\"description\">%s</td></tr>",
				$timestamp, $row['firstname'], $row['lastname'], $row['target_firstname'], $row['target_lastname'], $row['description']);
		}
		echo <<<DOCHERE_log
<table border="1">
<rt><th axis="timestamp">Timestamp</th><th axis="user">User</th><th axis="target">Target User</th><th axis="description">Description</th></tr>
$table
</table>

DOCHERE_log;
	}
	
	/**
	 * Year and Month are numerical values, or Timestamp may be used in their place */
	function print_month() {
		global $g_user;
		
		// User input validation
		$year = isset($_REQUEST['year']) && is_numeric($_REQUEST['year']) ? $_REQUEST['year'] : date("Y");
		$month = isset($_REQUEST['month']) && is_numeric($_REQUEST['month']) && $_REQUEST['month'] >= 1 && $_REQUEST['month'] <= 12 ? $_REQUEST['month'] : date("m");
		$first_day = strtotime("$year-$month-01");
		$first_day = !$first_day || $first_day == -1 ? strtotime(date("Y-m-01")) : $first_day;
		
		// Process alternate selection via Unix Timestamp
		$timestamp = isset($_REQUEST['timestamp']) ? $_REQUEST['timestamp'] : false;
		$first_day = $timestamp ? strtotime(date("Y-m-01", $timestamp)) : $first_day;
		
		// Other useful dates that we need
		$last_day = strtotime("-1 day", strtotime("+1 month", $first_day)); // Last day of this month
		$first_dow = date("w", $first_day); // First day of week
		$today = strtotime(date("Y-m-d", strtotime("now"))); // Strip the time
		
		// Query events for all visible days, including days outside this month
		$query_start_day = date("Ymd", strtotime("-$first_dow days", $first_day));
		$query_end_day = date("Ymd", strtotime("this saturday", $last_day));
		$query = $this->query_range($query_start_day, $query_end_day);
		$row = $query->fetch_row();
		
		// Generate values for month selection pulldown menu
		$select_month_options = "\r\n";
		$select_month = strtotime("-5 months", $first_day);
		for ($i = 0; $i < 12; $i++) {
			$month_selected = $select_month == $first_day ? ' selected="selected"' : '';
			$select_month_options .= sprintf("<option onclick=\"location.href='?year=%d&month=%d'\" value=\"%d\"$month_selected>%s</option>\r\n", date("Y", $select_month), date("m", $select_month), $select_month, date("F Y", $select_month));
			$select_month = strtotime("+1 month", $select_month);
		}
		
		// Calendar header
		$month_title = date("F Y", $first_day);
		$this_month_time = strtotime("+0 month", $first_day);
		$last_month_time = strtotime("-1 month", $first_day);
		$next_month_time = strtotime("+1 month", $first_day);
		$this_year = date("Y", $this_month_time);
		$this_month = date("m", $this_month_time);
		$prev_year = date("Y", $last_month_time);
		$prev_month = date("m", $last_month_time);
		$next_year = date("Y", $next_month_time);
		$next_month = date("m", $next_month_time);
		echo <<<DOCHERE_calendar_header
<div id="month_selection">
<form id="monthSelect" action="#" method="get">
<select name="timestamp">$select_month_options</select> <input class="btn btn-primary btn-mini" type="submit" value="Go!" /> <a href="calendar.php?year=$prev_year&month=$prev_month">Prev</a> <a href="calendar.php?year=$next_year&month=$next_month">Next</a>

<div style="float:right">
<a href="event_search.php">Event Search</a>
</div>

</form>
</div>
<form>
<select name=navi onkeypress="location.href = this.form.navi.options[this.form.navi.selectedIndex].value">
	<option value="#" selected>Calendar
	<option value="service_calendar.php?year=$this_year&month=$this_month">Service Calendar
	<option value="service_calendar_chapter.php?year=$this_year&month=$this_month">Service Calendar - Chapter
	<option value="service_calendar_campus.php?year=$this_year&month=$this_month">Service Calendar - Campus
	<option value="service_calendar_community.php?year=$this_year&month=$this_month">Service Calendar - Community
	<option value="service_calendar_country.php?year=$this_year&month=$this_month">Service Calendar - Country
	<option value="fellowship_calendar.php?year=$this_year&month=$this_month">Fellowship Calendar
	<option value="interchapter_calendar.php?year=$this_year&month=$this_month">IC Calendar
	<option value="attending_calendar.php?year=$this_year&month=$this_month">Attending Calendar
</select>
<input class="btn btn-primary btn-mini" type=button value=Go! onClick="location.href = this.form.navi.options[this.form.navi.selectedIndex].value">
</form> 

<table id="calendar">
  <caption>$month_title</caption>
  <tr>
    <th axis="Sunday">Sunday</th>
    <th axis="Monday">Monday</th>
    <th axis="Tuesday">Tuesday</th>
    <th axis="Wednesday">Wednesday</th>
    <th axis="Thursday">Thursday</th>
    <th axis="Friday">Friday</th>
    <th axis="Saturday">Saturday</th>
  </tr>

DOCHERE_calendar_header;
		
		$current_day = strtotime("-$first_dow days", $first_day);
		while ($current_day <= $last_day) {
			// Begin WEEK
			echo "  <tr>\r\n";
			for ($i = 0; $i < 7; $i++) {
				// Begin DAY
				$day_of_week = date("l", $current_day);
				$day = date("j", $current_day);
				
				// Determine the shading and formatting for this day
				if ($current_day < $first_day || $current_day > $last_day) {
					$class = "shade";
					$month = date("M ", $current_day);
				} else if ($current_day == $today) {
					$class = "today";
					$month = "";
				} else {
					$class = "";
					$month = "";
				}
				$internal_year = date("Y", $current_day);
				$internal_month = date("m", $current_day);
				$internal_day = date("d", $current_day);
				
				// Process all the events for this day
				$event_items = "";
				$service_items = "";
				$fellowship_items = "";
				$fundraiser_items = "";
				while ($row && strtotime($row['date']) <= $current_day) {
					if (($row['type_service_chapter'] | $row['type_service_campus'] | $row['type_service_community'] | $row['type_service_country']) && ! $row['type_fundraiser']) {
						$service_items .= "        <li style=\"line-height:15px;\">" . $this->format_event_title($row) . "</li>\r\n";
					} elseif ($row['type_fellowship']) {
						$fellowship_items .= "        <li style=\"line-height:15px;\">" . $this->format_event_title($row) . "</li>\r\n";
					} elseif ($row['type_fundraiser']) {
						$fundraiser_items .= "        <li style=\"line-height:15px;\">" . $this->format_event_title($row) . "</li>\r\n";
					} else {
						$event_items .= "        <li style=\"line-height:15px;\">" . $this->format_event_title($row) . "</li>\r\n";
					}
					$row = $query->fetch_row();
				}
				
				$popup_width = CALENDAR_POPUP_WIDTH;
				$popup_height = CALENDAR_POPUP_HEIGHT;
				$session_id = session_id(); // JavaScript popups in IE tend to block cookies, so need to explicitly set session id
				$referrer = urlencode($_SERVER['REQUEST_URI']);
				echo <<<DOCHERE_calendar_day
    <td axis="$day_of_week" class="$class">
      <a href="add_event.php?year=$internal_year&month=$internal_month&day=$internal_day&referrer=$referrer" class="dateTitle" onclick="return popup('add_event.php?year=$internal_year&month=$internal_month&day=$internal_day&sid=$session_id&referrer=$referrer', $popup_width, $popup_height)">$month$day</a>
      <ul>
$event_items
$fundraiser_items
$service_items
$fellowship_items
      </ul>
    </td>

DOCHERE_calendar_day;
				// Increment to next day
				$current_day = strtotime("+1 day", $current_day);
			}
			echo "  </tr>\r\n";
		}
		// Calendar footer
		if ($g_user->is_logged_in()) {
			$feed = <<<DOCHERE_comments_feed
<p style="float: right; padding: 1em 7px 0px 0px;">
<a href="comments.rss.php?id={$g_user->data[user_id]}" style="margin-left: 3px; padding: 0 0 0 19px; background: url(images/feed-icon-14x14.png) no-repeat 0 50%;">subscribe to the comments feed for your signed-up events</a>
</p>
<p style="float: right; padding: 5px 7px 1em 0px; clear: right;">
<a href="calendar.rss.php" style="margin-left: 3px; padding: 0 0 0 19px; background: url(images/feed-icon-14x14.png) no-repeat 0 50%;">subscribe to the calendar events feed</a>
</p>
DOCHERE_comments_feed;
		} else {
			$feed = <<<DOCHERE_comments_feed
<p style="float: right; padding: 1em 7px 1em 0px; clear: right;">
<a href="comments.rss.php?id={$g_user->data[user_id]}" style="margin-left: 3px; padding: 0 0 0 19px; background: url(images/feed-icon-14x14.png) no-repeat 0 50%;">subscribe to the calendar events feed</a>
</p>
DOCHERE_comments_feed;
		}
		echo <<<DOCHERE_calendar_footer
</table>
$feed
<form id="monthSelect2" action="#" method="get" style="margin-top: 1em;">
<select name="timestamp">$select_month_options</select> <input class="btn btn-primary btn-mini" type="submit" value="Go!" /> <a href="calendar.php?year=$prev_year&month=$prev_month">Prev</a> <a href="calendar.php?year=$next_year&month=$next_month">Next</a>
</form>



DOCHERE_calendar_footer;
	}

	function print_upcoming_events_for($user_id, $count) {
		global $g_user;
		if ($g_user->is_logged_in()) {
			$query = new Query(sprintf("SELECT %scalendar_event.* FROM %scalendar_event JOIN %scalendar_attend USING (event_id) WHERE %scalendar_attend.user_id = %d AND date >= '%s' AND deleted = FALSE ORDER BY date ASC LIMIT %d",
				TABLE_PREFIX, TABLE_PREFIX, TABLE_PREFIX, TABLE_PREFIX, $user_id, date("Y-m-d"), $count));
			$odd = true;
			$event = array();
			if ($g_user->data['user_id'] == $user_id) {
				$moduleTitle = "YOUR NEXT " . $count . " EVENTS";
			} else {
				$moduleTitle = "NEXT " . $count . " EVENTS";
			}
			while ($row = $query->fetch_row()) {
				$odd = !$odd;
				$class = $odd ? " odd" : "";
				$title = Calendar::format_event_title($row);
				$date = date("l, M d", strtotime($row['date']));
				$location = $row['location'] ? " @ " . $row['location'] : "";
				
				// Figure out the Time formatting
				if ($row['time_allday']) {
					$time = "All Day";
				} else if ($row['time_start'] && $row['time_end']) {
					$time = sprintf("%s to %s", date("g:ia", strtotime($row['time_start'])), date("g:ia", strtotime($row['time_end'])));
				} else if ($row['time_start']) {
					$time = date("g:ia", strtotime($row['time_start']));
				} else {
					$time = "TBA";
				}
				
				$event[] = <<<DOCHERE_print_upcoming_events_item
<div class="eventBox$class">
  <p class="title">$title</p>
  <p class="date">$date</p>
  <p class="location">$time$location</p>
</div>

DOCHERE_print_upcoming_events_item;
			}
			$events = implode("<hr />\r\n", $event);
			echo <<<DOCHERE_print_upcoming_events
<div class="upcomingEvents">
  <p class="moduleTitle">$moduleTitle</p>
$events
</div>

DOCHERE_print_upcoming_events;
		}
	}
	
	function print_upcoming_events($count) {
		global $g_user;
		if ($g_user->is_logged_in()) {
			self::print_upcoming_events_for($g_user->data['user_id'], $count);
		}
	}
	
	function process_add_evaluation() {
		session_start();
		global $g_user;
		$event_id = $_REQUEST['id'];
		if (!isset($_REQUEST['function']) || $_REQUEST['function'] != 'Submit Evaluation') {
			$_SESSION['$event_id']['error'] = false;
			return false;
		}
		
		// Make sure user is allowed to evaluate this event
		if (!isset($_REQUEST['id']) || !is_numeric($_REQUEST['id'])) {
			trigger_error("Add Evaluation: Invalid event id $_REQUEST[id].", E_USER_ERROR);
			return false;
		}
		if (!$g_user->permit("calendar add evaluations")) {
			$query = new Query(sprintf("SELECT user_id FROM %scalendar_attend WHERE event_id=%d AND user_id=%d AND chair=TRUE LIMIT 1", TABLE_PREFIX, $event_id, $g_user->data['user_id']));
			$row = $query->fetch_row();
			if (!$row) {
				trigger_error("You do not have permission to evaluate this event.", E_USER_ERROR);
				return false;
			}
		}
		
		if (!isset($_POST['event_hours']) || !is_numeric($_POST['event_hours'])) {
			self::save_evaluation();
			trigger_error("You must specify the number of hours for this event.", E_USER_ERROR);
			return false;
		} else if ($_POST['event_hours'] < 0) {
			self::save_evaluation();
			trigger_error("You may not specify negative hours.", E_USER_ERROR);
			return false;	
		} else if ($_POST['event_hours'] <= 0 && $g_user->data['user_id'] != 1190 && $g_user->data['user_id'] != 1070 && $g_user->data['user_id'] != 1078 && $g_user->data['user_id'] != 1405 && $g_user->data['user_id'] != 1289) {
			self::save_evaluation();
			trigger_error("You may not specify 0 hours.", E_USER_ERROR);
			return false;
		}
		$event_hours = $_POST['event_hours'];
		
		// Get the attendees
		$timestamp = date("Y-m-d H:i:s");
		$query = new Query("START TRANSACTION");
		$query = new Query(sprintf("SELECT user_id FROM %scalendar_attend WHERE event_id=%d", TABLE_PREFIX, $event_id));
		while ($row = $query->fetch_row()) {
			$user_id = $row['user_id'];
			
			// Attendance type
			if (!isset($_POST["attend$user_id"])) {
				self::save_evaluation();
				trigger_error("You must specify an attendance for everybody.", E_USER_ERROR);
				$query = new Query("ROLLBACK");
				return false;
			}
			$attend = $_POST["attend$user_id"];
			if ($attend == 'attended') {
				$description = "Evaluated as attended";
				$attended = "TRUE";
				$chaired = "FALSE";
				$flaked = "FALSE";
			} else if ($attend == 'chaired') {
				$description = "Evaluated as chaired";
				$attended = "TRUE";
				$chaired = "TRUE";
				$flaked = "FALSE";
			} else if ($attend == 'flaked') {
				$description = "Evaluated as flaked";
				$attended = "FALSE";
				$chaired = "FALSE";
				$flaked = "TRUE";
			} else if ($attend == 'waitlisted') {
				$description = "Evaluated as waitlisted and dropped";
				$query2 = new Query(sprintf("DELETE FROM %scalendar_attend WHERE event_id=%d AND user_id=%d LIMIT 1", TABLE_PREFIX, $event_id, $user_id));
				$query2 = new Query(sprintf("INSERT INTO %sevent_audit_trail SET event_id=%d, user_id=%d, target_user_id=%d, timestamp='%s', description='%s'",
					TABLE_PREFIX, $event_id, $g_user->data['user_id'], $user_id, $timestamp, $description));
				continue;
			} else {
				self::save_evaluation();
				trigger_error("Invalid attendance type.", E_USER_ERROR);
				$query = new Query("ROLLBACK");
				return false;
			}
			
			// Drivers
			if (isset($_POST["drove$user_id"]) && $_POST["drove$user_id"]) {
				if (isset($_POST["droveAmount$user_id"]) && is_numeric($_POST["droveAmount$user_id"]) && $_POST["droveAmount$user_id"] > 0) {
					$driver = $_POST["droveAmount$user_id"];
				} else {
					$driver = 1;
				}
			} else {
				$driver = 0;
			}
			
			// Special hours - entering 0 or any non-numeric value is ignored
			if (isset($_POST["hours$user_id"]) && $_POST["hours$user_id"] && isset($_POST["hoursAmount$user_id"]) && is_numeric($_POST["hoursAmount$user_id"])) {
				if ($_POST["hoursAmount$user_id"] <= 0 && $g_user->data['user_id'] != 1405 && $g_user->data['user_id'] != 1289) {
					self::save_evaluation();
					trigger_error("You may not assign 0 hours", E_USER_ERROR);
					$query = new Query("ROLLBACK");
					return false;
				}
				$hours = $_POST["hoursAmount$user_id"];
				$description .= " with special $hours hours";
			} else {
				$hours = $event_hours;
				$description .= " with $hours hours";
			}
			
			//Give Driver miles to drivers.
			if (isset($_POST["miles$user_id"]) && $_POST["miles$user_id"] && isset($_POST["milesAmount$user_id"]) && is_numeric($_POST["milesAmount$user_id"])) {
				if ($_POST["milesAmount$user_id"] <= 0) {
					self::save_evaluation();
					trigger_error("You may not assign 0 or Negative Miles to people who drove.", E_USER_ERROR);
					$query = new Query("ROLLBACK");
					return false;
				}
				$miles = $_POST["milesAmount$user_id"] * $driver;
			} else {
				if (!isset($_POST["drove$user_id"]) && !$_POST["drove$user_id"]) {
					$miles = 0;
				} else {
					self::save_evaluation();
					trigger_error("You must assign hours to people who drove.", E_USER_ERROR);
					$query = new Query("ROLLBACK");
					return false;
				}		
			}
			$query2 = new Query(sprintf("UPDATE %scalendar_attend SET attended=%s, chair=%s, flaked=%s, driver=%d, hours=%f, miles=%d WHERE event_id=%s AND user_id=%s LIMIT 1",
				TABLE_PREFIX, $attended, $chaired, $flaked, $driver, $hours, $miles, $event_id, $user_id));
			$query2 = new Query(sprintf("INSERT INTO %sevent_audit_trail SET event_id=%d, user_id=%d, target_user_id=%d, timestamp='%s', description='%s'",
					TABLE_PREFIX, $event_id, $g_user->data['user_id'], $user_id, $timestamp, $description));
		}

		// Process evaluation questions
		$query = new Query(sprintf("SELECT field_id, type FROM %sevent_evaluation_control WHERE enabled=TRUE ORDER BY ordering DESC", TABLE_PREFIX));
		while ($row = $query->fetch_row()) {
			if ($row['type'] == 'text' && isset($_POST["eval$row[field_id]"])) {
				$response = htmlentities($_POST["eval$row[field_id]"], ENT_QUOTES, 'UTF-8');
				$response = str_replace("\r\n", "<br />", $response);
				$response = str_replace(array("\r", "\n"), "<br />", $response);
				$response = Query::escape_string($response);
				$query2 = new Query(sprintf("INSERT INTO %sevent_evaluation SET event_id=%d, field_id=%d, user_id=%d, text_response='%s' ON DUPLICATE KEY UPDATE text_response='%s'",
					TABLE_PREFIX, $event_id, $row['field_id'], $g_user->data['user_id'], $response, $response));
			} else if ($row['type'] == 'numerical' && isset($_POST["eval$row[field_id]"])) {
				$response = $_POST["eval$row[field_id]"];
				if (!is_numeric($response)) {
					self::save_evaluation();
					trigger_error("Response must be numeric where indicated.", E_USER_ERROR);
					$query = new Query("ROLLBACK");
					return false;
				}
				$query2 = new Query(sprintf("INSERT INTO %sevent_evaluation SET event_id=%d, field_id=%d, user_id=%d, numerical_response=%d ON DUPLICATE KEY UPDATE numerical_response=%d",
					TABLE_PREFIX, $event_id, $row['field_id'], $g_user->data['user_id'], $response, $response));
			}
		}
		
		$query = new Query(sprintf("UPDATE %scalendar_event SET evaluated=TRUE, signup_lock=TRUE WHERE event_id=%d LIMIT 1", TABLE_PREFIX, $event_id));
		$query = new Query("COMMIT");
		$_SESSION['$event_id']['error'] = false;
		$g_user->redirect("evaluation.php?id=$event_id");
		return true;
	}

	function save_evaluation() {
		$event_id = $_REQUEST['id'];
		$_SESSION['$event_id']['event_hours'] = $_POST['event_hours'];
		$_SESSION['$event_id']['error'] = true;

    	// Save evaluation questions
		$query = new Query(sprintf("SELECT field_id, type FROM %sevent_evaluation_control WHERE enabled=TRUE ORDER BY ordering DESC", TABLE_PREFIX));
		while ($row = $query->fetch_row()) {
			$_SESSION['$event_id']["eval$row[field_id]"] = $_POST["eval$row[field_id]"];
		}

		// Save attendees
		$query = new Query(sprintf("SELECT user_id FROM %scalendar_attend WHERE event_id=%d", TABLE_PREFIX, $event_id));
		while ($row = $query->fetch_row()) {
			$user_id = $row['user_id'];
			
			// Attendance type
			$_SESSION['$event_id']["attend$user_id"] = $_POST["attend$user_id"];
			
			// Drivers
			$_SESSION['$event_id']["drove$user_id"] = $_POST["drove$user_id"];
			$_SESSION['$event_id']["droveAmount$user_id"] = $_POST["droveAmount$user_id"];
			
			// Special hours
			$_SESSION['$event_id']["hours$user_id"] = $_POST["hours$user_id"];
			$_SESSION['$event_id']["hoursAmount$user_id"] = $_POST["hoursAmount$user_id"];
			
			//Give Driver miles to drivers.
			$_SESSION['$event_id']["miles$user_id"] = $_POST["miles$user_id"];
			$_SESSION['$event_id']["milesAmount$user_id"] = $_POST["milesAmount$user_id"];
		}
	}
	
	function process_add_event() {
		global $g_user;
		if (!isset($_POST['submit'])) {
			return false;
		} else if (!$g_user->is_logged_in()) {
			trigger_error("You must be logged in to create events.", E_USER_ERROR);
		}
		
		// Make sure user has permissions to add events
		if (!$g_user->permit("calendar add events")) {
			trigger_error("You do not have permission to add events.", E_USER_ERROR);
			return;
		}

		$user_id = $g_user->data['user_id'];
		
		// Retrieve and validate user input
		$error = false;
		if (isset($_POST['title']) && strlen($_POST['title']) > 0 && !preg_match('/^[ ]+$/', $_POST['title'])) {
			$title = Query::escape_string(htmlentities(trim($_POST['title']), ENT_QUOTES, 'UTF-8'));
		} else {
			trigger_error("You must specify a title.", E_USER_ERROR);
			$error = true;
		}
		
		if (isset($_POST['location']) && strlen($_POST['location']) > 0) {
			$location = Query::escape_string(htmlentities(trim($_POST['location']), ENT_QUOTES, 'UTF-8'));
		} else {
			$location = "";
		}
		
		if (isset($_POST['description']) && strlen($_POST['description']) > 0) {
			$description = htmlentities($_POST['description'], ENT_QUOTES, 'UTF-8');
			$description = str_replace("\r\n", "<br />", $description);
			$description = str_replace(array("\r", "\n"), "<br />", $description);
			$description = Query::escape_string($description);
		} else {
			$description = "";
		}
		
		if (isset($_POST['year']) && isset($_POST['month']) && isset($_POST['day']) && $_POST['year'] >= 1925) {
			$date = strtotime(sprintf("%s-%s-%s", $_POST['year'], $_POST['month'], $_POST['day']));
			if (!$date || $date == -1) {
				trigger_error("Please check your date.", E_USER_ERROR);
				$error = true;
			} else {
				$date_string = date("Y-m-d", $date);
			}
		} else {
			trigger_error("Please check your date.");
		}
		
		if (isset($_POST['allday']) && $_POST['allday']) {
			$time_start = "NULL";
			$time_end = "NULL";
			$time_allday = "TRUE";
			$time_tba = "FALSE";
		} else if (isset($_POST['tba']) && $_POST['tba']) {
			$time_start = "NULL";
			$time_end = "NULL";
			$time_allday = "FALSE";
			$time_tba = "TRUE";
		} else if (isset($_POST['never_ends']) && $_POST['never_ends']) {
			if (isset($_POST['start_hour']) && isset($_POST['start_minute']) && isset($_POST['start_period'])) {
				$time_start = strtotime(sprintf("%s:%s%s", $_POST['start_hour'], $_POST['start_minute'], $_POST['start_period'] == 1 ? "pm" : "am"));
				if (!$time_start || $time_start == -1) {
					trigger_error("Please check your start time.", E_USER_ERROR);
					$error = true;
				} else {
					$time_start = date("\"H:i:00\"", $time_start);
				}
				$time_end = "NULL";
				$time_allday = "FALSE";
				$time_tba = "FALSE";
			}
		} else if (isset($_POST['start_hour']) && isset($_POST['start_minute']) && isset($_POST['start_period'])
		&& isset($_POST['end_hour']) && isset($_POST['end_minute']) && isset($_POST['end_period'])) {
			$time_start = strtotime(sprintf("%s:%s%s", $_POST['start_hour'], $_POST['start_minute'], $_POST['start_period'] == 1 ? "pm" : "am"));
			if (!$time_start || $time_start == -1) {
				trigger_error("Please check your start time.", E_USER_ERROR);
				$error = true;
			} else {
				$time_start = date("\"H:i:00\"", $time_start);
			}
			$time_end = strtotime(sprintf("%s:%s%s", $_POST['end_hour'], $_POST['end_minute'], $_POST['end_period'] == 1 ? "pm" : "am"));
			if (!$time_end || $time_end == -1) {
				trigger_error("Please check your end time.", E_USER_ERROR);
				$error = true;
			} else {
				$time_end = date("\"H:i:00\"", $time_end);
			}
			$time_allday = "FALSE";
			$time_tba = "FALSE";
		} else {
			trigger_error("You must specify a time.", E_USER_ERROR);
			$error = true;
		}
		
		if (isset($_POST['signup_begin_year']) && isset($_POST['signup_begin_month']) && isset($_POST['signup_begin_day'])
		&& isset($_POST['signup_begin']) && $_POST['signup_begin']) {
			$signup_begin = strtotime(sprintf("%s-%s-%s", $_POST['signup_begin_year'], $_POST['signup_begin_month'], $_POST['signup_begin_day']));
			if (!$signup_begin || $signup_begin == -1) {
				trigger_error("Please check your signup start date.", E_USER_ERROR);
				$error = true;
			} else {
				$signup_begin_string = date("Ymd", $signup_begin);
			}
		} else {
			$signup_begin_string = "NULL";
		}
		
		if (isset($_POST['signup_cutoff_year']) && isset($_POST['signup_cutoff_month']) && isset($_POST['signup_cutoff_day'])
		&& isset($_POST['signup_cutoff']) && $_POST['signup_cutoff']) {
			$signup_cutoff = strtotime(sprintf("%s-%s-%s", $_POST['signup_cutoff_year'], $_POST['signup_cutoff_month'], $_POST['signup_cutoff_day']));
			if (!$signup_cutoff || $signup_cutoff == -1) {
				trigger_error("Please check your signup cutoff date.", E_USER_ERROR);
				$error = true;
			} else {
				$signup_cutoff_string = date("Ymd", $signup_cutoff);
			}
		} else {
			$signup_cutoff_string = "NULL";
		}
		
		if ((isset($_POST['signup_no_limit']) && !$_POST['signup_no_limit'] || !isset($_POST['signup_no_limit'])) && isset($_POST['signup_limit']) && is_numeric($_POST['signup_limit']) && $_POST['signup_limit'] > 0) {
			$signup_limit = $_POST['signup_limit'];
		} else {
			$signup_limit = 0;
		}
		
		foreach ($this->filter as $key => $value) {
			$$key = isset($_POST[$key]) && $_POST[$key] ? "TRUE" : "FALSE";
		}
		
		if (isset($_POST['type_custom_selected']) && $_POST['type_custom_selected']
		&& isset($_POST['type_custom']) && is_numeric($_POST['type_custom']) && $_POST['type_custom'] > 0) {
			$type_custom = $_POST['type_custom'];
		} else {
			$type_custom = "NULL";
		}

		if (isset($_POST['multiple_events']) && $_POST['multiple_events']) {
			if (!(isset($_POST['interval']) && $_POST['interval'])) {
				trigger_error("Please enter in an interval.", E_USER_ERROR);
				$error = true;
			} else {
				$interval = $_POST['interval'];
				$interval = 86400 * $interval;
			}
			$multiple_events_end = strtotime(sprintf("%s-%s-%s", $_POST['multiple_events_begin_year'], $_POST['multiple_events_begin_month'], $_POST['multiple_events_begin_day']));
			if (!$multiple_events_end|| $multiple_events_end == -1) {
				trigger_error("Please check your multiple events end date.", E_USER_ERROR);
				$error = true;
			} else {
				$multiple_events_end_string = date("Ymd", $multiple_events_end);
			}
		}
		
		// FINALLY done dealing with user input!  T___T
		
		if (!$error) {
			do {
				if ($time_start == "NULL") {
					$start_at = $date_string . " " . "00:00:00";
				} else {
					$start_at = $date_string . " " . $time_start;
				}

				if ($time_end == "NULL") {
					$end_at = $date_string . " " . "00:00:00";
				} else {
					$end_at = $date_string . " " . $time_end;
				}

				$insert_statement = sprintf("INSERT INTO %scalendar_event SET title='%s', location='%s', 
					description='%s', date='%s', time_start=%s, time_end=%s, time_allday=%s,
					signup_begin=%s, signup_cutoff=%s, signup_limit=%d, signup_lock=FALSE, creator_id=%s, time_tba=%s, start_at='%s', end_at='%s'",
					TABLE_PREFIX, $title, $location, $description, $date_string, $time_start, $time_end, $time_allday, $signup_begin_string, $signup_cutoff_string, $signup_limit, $user_id, $time_tba, $start_at, $end_at);
				foreach ($this->filter as $key => $value) {
					$insert_statement .= ", $key=" . $$key;
				}
				$insert_statement .= ", type_custom=$type_custom, evaluated=FALSE, deleted=FALSE";
				
				$timestamp = date("Y-m-d H:i:s");
				$description2 = "Event created: " . Query::escape_string($insert_statement);
				$query = new Query("start transaction");
				$query = new Query($insert_statement);
				$event_id = $query->last_insert_id();
				$query = new Query(sprintf("INSERT INTO %sevent_audit_trail SET event_id=%d, user_id=%d, timestamp='%s', description='%s'", TABLE_PREFIX, $event_id, $g_user->data['user_id'], $timestamp, $description2));
				$query = new Query("commit");
				$old_date = date("m-d-Y", $date);
				$date = $date + $interval;
				$date_string = date("Y-m-d", $date);
				if ($signup_begin_string != "NULL") {
					$signup_begin = $signup_begin + $interval;
					$signup_begin_string = date("Ymd", $signup_begin);
				}
				if ($signup_cutoff_string != "NULL") {
					$signup_cutoff = $signup_cutoff + $interval;
					$signup_cutoff_string = date("Ymd", $signup_cutoff);
				}

				if ($type_fellowship == 'TRUE') {
					$to = 'fellowship-vp@calaphio.com';
				} else if ($type_service_country == 'TRUE' || $type_service_community== 'TRUE'
					|| $type_service_campus == 'TRUE' || $type_service_chapter == 'TRUE') {
					$to = 'service-vp@calaphio.com';
				} else {
					$to = false;
				}
				if ($to) {
					$headers  = 'MIME-Version: 1.0' . "\r\n";
					$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
					$subject = 'New event created';
					$message = '<html>
								<head>
								  <title>
								';
					$message .= 'Event: ' . $title;
					$message .= '</title>
								</head>
								<body>';
					$message .= 'Event: ' . $title . '<br/>';
					$message .= 'Location: ' . $location . '<br/>';
					$message .= 'Description: ' . $description . '<br/>';
					$message .= 'Date: ' . $old_date . '<br/>';
					$message .= 'http://live.calaphio.com/event.php?id=' . $event_id;
					$message .= '<br/>
								</body>
								</html>
								';
					mail($to, $subject, $message, $headers);
				}
			} while ($date <= $multiple_events_end);
			if ($event_id) {
				$g_user->redirect("event.php?id=$event_id&refresh=true");
			}
		}
		
		return !$error;
	}
	
	function process_edit_event() {
		global $g_user;
		if (!isset($_POST['submit'])) {
			return false;
		} else if (!$g_user->is_logged_in()) {
			trigger_error("You must be logged in to create events.", E_USER_ERROR);
		}
		
		// Make sure user is allowed to edit this event
		if (!isset($_REQUEST['id']) || !is_numeric($_REQUEST['id'])) {
			trigger_error("Edit Event: Invalid event id.", E_USER_ERROR);
			return;
		}
		$event_id = $_REQUEST['id'];
		if (!$g_user->permit("calendar edit events")) {
			$query = new Query(sprintf("SELECT user_id FROM %scalendar_attend WHERE event_id=%d AND user_id=%d AND chair=TRUE LIMIT 1", TABLE_PREFIX, $event_id, $g_user->data['user_id']));
			$row = $query->fetch_row();
			if (!$row) {
				trigger_error("You do not have permission to edit this event.", E_USER_ERROR);
				return;
			}
		}
		
		// Retrieve and validate user input
		$error = false;
		if (isset($_POST['title']) && strlen($_POST['title']) > 0 && !preg_match('/^[ ]+$/', $_POST['title'])) {
			$title = Query::escape_string(htmlentities(trim($_POST['title']), ENT_QUOTES, 'UTF-8'));
		} else {
			trigger_error("You must specify a title.", E_USER_ERROR);
			$error = true;
		}
		
		if (isset($_POST['location']) && strlen($_POST['location']) > 0) {
			$location = Query::escape_string(htmlentities(trim($_POST['location']), ENT_QUOTES, 'UTF-8'));
		} else {
			$location = "";
		}
		
		if (isset($_POST['description']) && strlen($_POST['description']) > 0) {
			$description = htmlentities($_POST['description'], ENT_QUOTES, 'UTF-8');
			$description = str_replace("\r\n", "<br />", $description);
			$description = str_replace(array("\r", "\n"), "<br />", $description);
			$description = Query::escape_string($description);
		} else {
			$description = "";
		}
		
		if (isset($_POST['year']) && isset($_POST['month']) && isset($_POST['day']) && $_POST['year'] >= 1925) {
			$date = strtotime(sprintf("%s-%s-%s", $_POST['year'], $_POST['month'], $_POST['day']));
			if (!$date || $date == -1) {
				trigger_error("Please check your date.", E_USER_ERROR);
				$error = true;
			} else {
				$date = date("Y-m-d", $date);
			}
		} else {
			trigger_error("Please check your date.");
		}
		
		if (isset($_POST['allday']) && $_POST['allday']) {
			$time_start = "NULL";
			$time_end = "NULL";
			$time_allday = "TRUE";
			$time_tba = "FALSE";
		} else if (isset($_POST['tba']) && $_POST['tba']) {
			$time_start = "NULL";
			$time_end = "NULL";
			$time_allday = "FALSE";
			$time_tba = "TRUE";
		} else if (isset($_POST['never_ends']) && $_POST['never_ends']) {
			if (isset($_POST['start_hour']) && isset($_POST['start_minute']) && isset($_POST['start_period'])) {
				$time_start = strtotime(sprintf("%s:%s%s", $_POST['start_hour'], $_POST['start_minute'], $_POST['start_period'] == 1 ? "pm" : "am"));
				if (!$time_start || $time_start == -1) {
					trigger_error("Please check your start time.", E_USER_ERROR);
					$error = true;
				} else {
					$time_start = date("\"H:i:00\"", $time_start);
				}
				$time_end = "NULL";
				$time_allday = "FALSE";
				$time_tba = "FALSE";
			}
		} else if (isset($_POST['start_hour']) && isset($_POST['start_minute']) && isset($_POST['start_period'])
		&& isset($_POST['end_hour']) && isset($_POST['end_minute']) && isset($_POST['end_period'])) {
			$time_start = strtotime(sprintf("%s:%s%s", $_POST['start_hour'], $_POST['start_minute'], $_POST['start_period'] == 1 ? "pm" : "am"));
			if (!$time_start || $time_start == -1) {
				trigger_error("Please check your start time.", E_USER_ERROR);
				$error = true;
			} else {
				$time_start = date("\"H:i:00\"", $time_start);
			}
			$time_end = strtotime(sprintf("%s:%s%s", $_POST['end_hour'], $_POST['end_minute'], $_POST['end_period'] == 1 ? "pm" : "am"));
			if (!$time_end || $time_end == -1) {
				trigger_error("Please check your end time.", E_USER_ERROR);
				$error = true;
			} else {
				$time_end = date("\"H:i:00\"", $time_end);
			}
			$time_allday = "FALSE";
			$time_tba = "FALSE";
		} else {
			trigger_error("You must specify a time.", E_USER_ERROR);
			$error = true;
		}
		
		if (isset($_POST['signup_begin_year']) && isset($_POST['signup_begin_month']) && isset($_POST['signup_begin_day'])
		&& isset($_POST['signup_begin']) && $_POST['signup_begin']) {
			$signup_begin = strtotime(sprintf("%s-%s-%s", $_POST['signup_begin_year'], $_POST['signup_begin_month'], $_POST['signup_begin_day']));
			if (!$signup_begin || $signup_begin == -1) {
				trigger_error("Please check your signup start date.", E_USER_ERROR);
				$error = true;
			} else {
				$signup_begin = date("Ymd", $signup_begin);
			}
		} else {
			$signup_begin = "NULL";
		}
		
		if (isset($_POST['signup_cutoff_year']) && isset($_POST['signup_cutoff_month']) && isset($_POST['signup_cutoff_day'])
		&& isset($_POST['signup_cutoff']) && $_POST['signup_cutoff']) {
			$signup_cutoff = strtotime(sprintf("%s-%s-%s", $_POST['signup_cutoff_year'], $_POST['signup_cutoff_month'], $_POST['signup_cutoff_day']));
			if (!$signup_cutoff || $signup_cutoff == -1) {
				trigger_error("Please check your signup cutoff date.", E_USER_ERROR);
				$error = true;
			} else {
				$signup_cutoff = date("Ymd", $signup_cutoff);
			}
		} else {
			$signup_cutoff = "NULL";
		}
		
		if ((isset($_POST['signup_no_limit']) && !$_POST['signup_no_limit'] || !isset($_POST['signup_no_limit'])) && isset($_POST['signup_limit']) && is_numeric($_POST['signup_limit']) && $_POST['signup_limit'] > 0) {
			$signup_limit = $_POST['signup_limit'];
		} else {
			$signup_limit = 0;
		}
		
		foreach ($this->filter as $key => $value) {
			$$key = isset($_POST[$key]) && $_POST[$key] ? "TRUE" : "FALSE";
		}
		
		if (isset($_POST['type_custom_selected']) && $_POST['type_custom_selected']
		&& isset($_POST['type_custom']) && is_numeric($_POST['type_custom']) && $_POST['type_custom'] > 0) {
			$type_custom = $_POST['type_custom'];
		} else {
			$type_custom = "NULL";
		}
		
		// FINALLY done dealing with user input!  T___T
		
		if (!$error) {
			if ($date != null) {
				if ($time_start == "NULL") {
					$start_at = $date . " " . "00:00:00";
				} else {
					$start_at = $date . " " . $time_start;
				}

				if ($time_end == "NULL") {
					$end_at = $date . " " . "00:00:00";
				} else {
					$end_at = $date . " " . $time_end;
				}
				$insert_statement = sprintf("UPDATE %scalendar_event SET title='%s', location='%s', 
					description='%s', date='%s', time_start=%s, time_end=%s, time_allday=%s,
					signup_begin=%s, signup_cutoff=%s, signup_limit=%d, time_tba=%s, start_at='%s', end_at='%s'",
					TABLE_PREFIX, $title, $location, $description, $date, $time_start, $time_end, $time_allday, $signup_begin, $signup_cutoff, $signup_limit, $time_tba, $start_at, $end_at);
			} else {
				$insert_statement = sprintf("UPDATE %scalendar_event SET title='%s', location='%s', 
					description='%s', time_start=%s, time_end=%s, time_allday=%s,
					signup_begin=%s, signup_cutoff=%s, signup_limit=%d, time_tba=%s",
					TABLE_PREFIX, $title, $location, $description, $time_start, $time_end, $time_allday, $signup_begin, $signup_cutoff, $signup_limit, $time_tba);
			}
			foreach ($this->filter as $key => $value) {
				$insert_statement .= ", $key=" . $$key;
			}
			$insert_statement .= ", type_custom=$type_custom";
			$insert_statement .= " WHERE event_id=$event_id LIMIT 1";
			
			$timestamp = date("Y-m-d H:i:s");
			$description = "Event updated: " . Query::escape_string($insert_statement);
			$query = new Query("start transaction");
			$query = new Query($insert_statement);
			$query = new Query(sprintf("INSERT INTO %sevent_audit_trail SET event_id=%d, user_id=%d, timestamp='%s', description='%s'", TABLE_PREFIX, $event_id, $g_user->data['user_id'], $timestamp, $description));
			$query = new Query("commit");
			if ($event_id) {
				$g_user->redirect("event.php?id=$event_id&refresh=true");
			}
		}
		
		return !$error;
	}
	
	function process_event() {
		global $g_user;
		$error = false;
		if (isset($_REQUEST['function']) && isset($_REQUEST['id']) && is_numeric($_REQUEST['id'])) {
			if (!$g_user->is_logged_in()) {
				trigger_error("You must be logged in to do that.", E_USER_ERROR);
				return;
			}
			
			if (EVENT_FUNCTIONS_DEBUG) {
				trigger_error("Calling event function: $_REQUEST[function]", E_USER_NOTICE);
				$error = true;
			}
			
			$event_id = $_REQUEST['id'];
			$timestamp = date("Y-m-d H:i:s");
			switch ($_REQUEST['function']) {
			case 'Signup':
				// Find out if user has permissions
				$query = new Query(sprintf("SELECT date, signup_lock FROM %scalendar_event WHERE event_id=%d LIMIT 1", TABLE_PREFIX, $event_id));
				$row = $query->fetch_row();
				$event_time = strtotime($row['date']);
				$now = strtotime(date("Y-m-d", strtotime("now")));
				$signup_lock = $row['signup_lock'];
				if ($now > $event_time || $signup_lock) {
					trigger_error("You do not have permission to do that.", E_USER_ERROR);
					return;
				}
				
				$description = "Signed up";
				$query = new Query("start transaction");
				$query = new Query(sprintf("INSERT INTO %scalendar_attend SET event_id=%d, user_id=%d, signup_time='%s'", TABLE_PREFIX, $event_id, $g_user->data['user_id'], $timestamp));
				$query = new Query(sprintf("INSERT INTO %sevent_audit_trail SET event_id=%d, user_id=%d, timestamp='%s', description='%s'", TABLE_PREFIX, $event_id, $g_user->data['user_id'], $timestamp, $description));
				$query = new Query("commit");
				break;
			case 'Add People To Event':
				// Find out if user is chair or has permissions
				$query = new Query(sprintf("SELECT chair FROM %scalendar_attend WHERE event_id=%d AND user_id=%d LIMIT 1", TABLE_PREFIX, $event_id, $g_user->data['user_id']));
				$row = $query->fetch_row();
				if ((!$row || !$row['chair']) && !$g_user->permit("calendar add users")) {
					trigger_error("You do not have permission to do that.", E_USER_ERROR);
					return;
				}
				
				$query = new Query("start transaction");
				foreach ($_REQUEST AS $key => $value) {
					if (strcmp(substr($key, 0, 6), "result") == 0) {
						if (!is_numeric($value)) {
							trigger_error("Invalid user id.", E_USER_ERROR);
							$query = new Query("rollback");
							return;
						}
						$target_user_id = $value;
						$description = "Added user";
						$query = new Query(sprintf("INSERT INTO %scalendar_attend SET event_id=%d, user_id=%d, signup_time='%s'", TABLE_PREFIX, $event_id, $target_user_id, $timestamp));
						$query = new Query(sprintf("INSERT INTO %sevent_audit_trail SET event_id=%d, user_id=%d, target_user_id=%d, timestamp='%s', description='%s'", TABLE_PREFIX, $event_id, $g_user->data['user_id'], $target_user_id, $timestamp, $description));
					}
				}
				$query = new Query("commit");
				if (isset($_REQUEST['evaluate']) && $_REQUEST['evaluate']) {
					$g_user->redirect("evaluate_event.php?id=$event_id");
				}
				break;
			case 'Make Me Chair':
				$description = "Signed up as Chair";
				$query = new Query("start transaction");
				$query = new Query(sprintf("INSERT INTO %scalendar_attend SET event_id=%d, user_id=%d, signup_time='%s', chair=TRUE ON DUPLICATE KEY UPDATE chair=TRUE", TABLE_PREFIX, $event_id, $g_user->data['user_id'], $timestamp));
				$query = new Query(sprintf("INSERT INTO %sevent_audit_trail SET event_id=%d, user_id=%d, timestamp='%s', description='%s'", TABLE_PREFIX, $event_id, $g_user->data['user_id'], $timestamp, $description));
				$query = new Query("commit");			
				$query = new Query(sprintf("SELECT %scalendar_event.*, type_name FROM %scalendar_event LEFT JOIN %scalendar_event_type_custom ON (type_custom = type_id) WHERE event_id=%d LIMIT 1", TABLE_PREFIX, TABLE_PREFIX, TABLE_PREFIX, $event_id));
				if ($row = $query->fetch_row()) {
					$title = $row['title'];
					$date = $row['date'];
				}
				if ($row['type_service_country'] || $row['type_service_community']
					|| $row['type_service_campus'] || $row['type_service_chapter']) {
					$to = 'service-vp@calaphio.com';
				} else {
					$to = false;
				}
				$query = new Query(sprintf("SELECT firstname, lastname, email FROM %susers WHERE user_id=%d", TABLE_PREFIX, $g_user->data['user_id']));
				if ($row = $query->fetch_row()) {
					$firstname = $row['firstname'];
					$lastname = $row['lastname'];
					$email =  $row['email'];
					$date = date("m-d-Y", strtotime($date));
				}
				if ($to) {
					$headers  = 'MIME-Version: 1.0' . "\r\n";
					$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
					$subject = 'Chair Found for ' . $title . " (" . $date . ")";
					$message = '<html>
								<head>
								  <title>
								';
					$message .= 'Event: ' . $title;
					$message .= '</title>
								</head>
								<body>';
					$message .= 'Event: ' . $title . '<br/>';
					$message .= 'Date: ' . $date . '<br/>';
					$message .= 'Chair Name: ' . $firstname . " " . $lastname . '<br/>';
					$message .= 'Email: ' . $email . '<br/>';
					$message .= 'http://live.calaphio.com/event.php?id=' . $event_id;
					$message .= '<br/>
								</body>
								</html>
								';
					mail($to, $subject, $message, $headers);
				}
				break;
			case 'Make Me Photographer':
				$description = "Signed up as Photographer";
				$query = new Query("start transaction");
				$query = new Query(sprintf("INSERT INTO %scalendar_attend SET event_id=%d, user_id=%d, signup_time='%s', photographer=TRUE ON DUPLICATE KEY UPDATE photographer=TRUE", TABLE_PREFIX, $event_id, $g_user->data['user_id'], $timestamp));
				$query = new Query(sprintf("INSERT INTO %sevent_audit_trail SET event_id=%d, user_id=%d, timestamp='%s', description='%s'", TABLE_PREFIX, $event_id, $g_user->data['user_id'], $timestamp, $description));
				$query = new Query("commit");
				break;
 			case 'Remove As Photographer':
				$description = "Removed as Photographer";
				$query = new Query("start transaction");
				$query = new Query(sprintf("INSERT INTO %scalendar_attend SET event_id=%d, user_id=%d, signup_time='%s', photographer=FALSE ON DUPLICATE KEY UPDATE photographer=FALSE", TABLE_PREFIX, $event_id, $g_user->data['user_id'], $timestamp));
				$query = new Query(sprintf("INSERT INTO %sevent_audit_trail SET event_id=%d, user_id=%d, timestamp='%s', description='%s'", TABLE_PREFIX, $event_id, $g_user->data['user_id'], $timestamp, $description));
				$query = new Query("commit");
				break;
			case 'Take Me Off':
				// Find out if user has permissions
				$query = new Query(sprintf("SELECT title, date, signup_lock, signup_limit FROM %scalendar_event WHERE event_id=%d LIMIT 1", TABLE_PREFIX, $event_id));
				$row = $query->fetch_row();
				$title_event = $row['title'];
				$time_event = $row['date'];
				$event_time = strtotime($row['date']);
				$now = strtotime(date("Y-m-d", strtotime("now")));
				$signup_lock = $row['signup_lock'];
				$signup_limit = $row['signup_limit'];
				if ($now > $event_time || $signup_lock) {
					trigger_error("You do not have permission to do that.", E_USER_ERROR);
					return;
				}
				$queryAttendTotal = new Query(sprintf("SELECT count(*) as total FROM %scalendar_attend WHERE event_id=%d LIMIT 1", TABLE_PREFIX, $event_id));
				$rowAttendTotal = $queryAttendTotal->fetch_row();
				if ($rowAttendTotal['total'] > $signup_limit && $signup_limit != 0) {
					$attendingCounter = 0;
					$found = 0;
					$queryAttend = new Query(sprintf("SELECT * FROM %scalendar_attend WHERE event_id=%d ORDER BY signup_time ASC", TABLE_PREFIX, $event_id));
					while($attendingCounter < $signup_limit) {
						$rowAttend = $queryAttend->fetch_row();
						if ($rowAttend['user_id'] == $g_user->data['user_id']) {
							$found = 1;
						}
						$attendingCounter++;
					}
					if ($found == 1) {
						$rowAttend = $queryAttend->fetch_row();
						$queryAttendEmail = new Query(sprintf("SELECT * FROM %susers WHERE user_id=%d LIMIT 1", TABLE_PREFIX, $rowAttend['user_id']));
						$rowAttendEmail = $queryAttendEmail->fetch_row();
						$message = "You are not on the Waitlist anymore for the event, " . $title_event . " on " . $time_event . ". \n" . "http://live.calaphio.com/event.php?id=" . $event_id;
						$message = str_replace(array("’", "–", "—", "“", "”", "&amp;", "&lt;", "&gt;", "&#039;", "&quot;"), array("'", "-", "-", "\"", "\"", "&", "<", ">", "'", "\""), $message);
						$title_event = str_replace(array("’", "–", "—", "“", "”", "&amp;", "&lt;", "&gt;", "&#039;", "&quot;"), array("'", "-", "-", "\"", "\"", "&", "<", ">", "'", "\""), $title_event);
						mail($rowAttendEmail['email'], "[APO] Off the waitlist for " . $title_event, $message);
					}
				}
				$description = "Dropped";
				$query = new Query("start transaction");
				$query = new Query(sprintf("DELETE FROM %scalendar_attend WHERE event_id=%d AND user_id=%d LIMIT 1", TABLE_PREFIX, $event_id, $g_user->data['user_id']));
				$query = new Query(sprintf("INSERT INTO %sevent_audit_trail SET event_id=%d, user_id=%d, target_user_id=%d, timestamp='%s', description='%s'", TABLE_PREFIX, $event_id, $g_user->data['user_id'], $g_user->data['user_id'], $timestamp, $description));
				$query = new Query("commit");
				break;
			case 'removeUser':
				if (!isset($_REQUEST['user_id']) || !is_numeric($_REQUEST['user_id'])) {
					trigger_error("Invalid user id.", E_USER_ERROR);
					return;
				}
				
				// Find out if user is chair or has permissions
				$query = new Query(sprintf("SELECT title, date, signup_lock, signup_limit FROM %scalendar_event WHERE event_id=%d LIMIT 1", TABLE_PREFIX, $event_id));
				$row = $query->fetch_row();
				$title_event = $row['title'];
				$time_event = $row['date'];
				$event_time = strtotime($row['date']);
				$now = strtotime("now");
				$signup_lock = $row['signup_lock'];
				$signup_limit = $row['signup_limit'];
				$query = new Query(sprintf("SELECT chair FROM %scalendar_attend WHERE event_id=%d AND user_id=%d LIMIT 1", TABLE_PREFIX, $event_id, $g_user->data['user_id']));
				$row = $query->fetch_row();
				if (!($row && $row['chair'] && $now < $event_time && !$signup_lock || $g_user->permit("calendar drop users"))) {
					trigger_error("You do not have permission to do that.", E_USER_ERROR);
					return;
				}
				$target_user_id = $_REQUEST['user_id'];
				$queryAttendTotal = new Query(sprintf("SELECT count(*) as total FROM %scalendar_attend WHERE event_id=%d LIMIT 1", TABLE_PREFIX, $event_id));
				$rowAttendTotal = $queryAttendTotal->fetch_row();
				if ($rowAttendTotal['total'] > $signup_limit && $signup_limit != 0) {
					$attendingCounter = 0;
					$found = 0;
					$queryAttend = new Query(sprintf("SELECT * FROM %scalendar_attend WHERE event_id=%d ORDER BY signup_time ASC", TABLE_PREFIX, $event_id));
					while($attendingCounter < $signup_limit) {
						$rowAttend = $queryAttend->fetch_row();
						if ($rowAttend['user_id'] == $target_user_id) {
							$found = 1;
						}
						$attendingCounter++;
					}
					if ($found == 1) {
						$rowAttend = $queryAttend->fetch_row();
						$queryAttendEmail = new Query(sprintf("SELECT * FROM %susers WHERE user_id=%d LIMIT 1", TABLE_PREFIX, $rowAttend['user_id']));
						$rowAttendEmail = $queryAttendEmail->fetch_row();
						$message = "You are not on the Waitlist anymore for the event, " . $title_event . " on " . $time_event . ". \n" . "http://live.calaphio.com/event.php?id=" . $event_id;
						$message = str_replace(array("’", "–", "—", "“", "”", "&amp;", "&lt;", "&gt;", "&#039;", "&quot;"), array("'", "-", "-", "\"", "\"", "&", "<", ">", "'", "\""), $message);
						$title_event = str_replace(array("’", "–", "—", "“", "”", "&amp;", "&lt;", "&gt;", "&#039;", "&quot;"), array("'", "-", "-", "\"", "\"", "&", "<", ">", "'", "\""), $title_event);
						mail($rowAttendEmail['email'], "[APO] Off the waitlist for " . $title_event, $message);
					}
				}
				$description = "Dropped";
				$query = new Query("start transaction");
				$query = new Query(sprintf("DELETE FROM %scalendar_attend WHERE event_id=%d AND user_id=%d LIMIT 1", TABLE_PREFIX, $event_id, $target_user_id));
				$query = new Query(sprintf("INSERT INTO %sevent_audit_trail SET event_id=%d, user_id=%d, target_user_id=%d, timestamp='%s', description='%s'", TABLE_PREFIX, $event_id, $g_user->data['user_id'], $target_user_id, $timestamp, $description));
				$query = new Query("commit");
				
				break;
			case 'delete':
				if ($g_user->permit("calendar delete events")) {
					$description = "Event deleted";
					$query = new Query("start transaction");
					$query = new Query(sprintf("UPDATE %scalendar_event SET deleted=TRUE, signup_lock=TRUE WHERE event_id=%d LIMIT 1", TABLE_PREFIX, $event_id));
					$query = new Query(sprintf("INSERT INTO %sevent_audit_trail SET event_id=%d, user_id=%d, timestamp='%s', description='%s'", TABLE_PREFIX, $event_id, $g_user->data['user_id'], $timestamp, $description));
					$query = new Query("commit");
				} else {
					trigger_error("You don't permission to do that.", E_USER_ERROR);
					return;
				}
				break;
		    case 'restore':
				if ($g_user->permit("calendar delete events")) {
					$description = "Event restored";
					$query = new Query("start transaction");
					$query = new Query(sprintf("UPDATE %scalendar_event SET deleted=FALSE, signup_lock=FALSE WHERE event_id=%d LIMIT 1", TABLE_PREFIX, $event_id));
					$query = new Query(sprintf("INSERT INTO %sevent_audit_trail SET event_id=%d, user_id=%d, timestamp='%s', description='%s'", TABLE_PREFIX, $event_id, $g_user->data['user_id'], $timestamp, $description));
					$query = new Query("commit");
				} else {
					trigger_error("You don't permission to do that.", E_USER_ERROR);
					return;
				}
				break;
			case 'Edit Rides':
				// Find out if user has permissions
				$query = new Query(sprintf("SELECT date, signup_lock FROM %scalendar_event WHERE event_id=%d LIMIT 1", TABLE_PREFIX, $event_id));
				$row = $query->fetch_row();
				$event_time = strtotime($row['date']);
				$now = strtotime("now");
				$signup_lock = $row['signup_lock'];
				if ($signup_lock) {
					trigger_error("You do not have permission to do that.", E_USER_ERROR);
					return;
				}
				
				if (isset($_POST['driving']) && is_numeric($_POST['driving'])) {
					$driving = $_REQUEST['driving'];
					$description = "Changed driver ride count to $driving";
					$query = new Query("start transaction");
					$query = new Query(sprintf("UPDATE %scalendar_attend SET driver=%d WHERE event_id=%d AND user_id=%d LIMIT 1", TABLE_PREFIX, $driving, $event_id, $g_user->data['user_id']));
					$query = new Query(sprintf("INSERT INTO %sevent_audit_trail SET event_id=%d, user_id=%d, timestamp='%s', description='%s'", TABLE_PREFIX, $event_id, $g_user->data['user_id'], $timestamp, $description));
					$query = new Query("commit");
				}
				break;
			case 'Post Comment':
				if (EVENT_FUNCTIONS_DEBUG) {
					trigger_error("Posting comment: $_POST[body]", E_USER_NOTICE);
					return;
				}
				if (isset($_POST['body']) && $_POST['body']) {
				    $commentNoHTML = $_POST['body'];
					$comment = htmlentities($_POST['body'], ENT_QUOTES, 'UTF-8');
					$comment = str_replace("\r\n", "<br />", $comment);
					$comment = str_replace(array("\r", "\n"), "<br />", $comment);
					$comment = Query::escape_string($comment);
					$query = new Query("start transaction");
					#Figure out who chairs are
					$query = new Query(sprintf("SELECT user_id FROM %scalendar_attend JOIN %susers USING (user_id) WHERE event_id=%d AND chair=TRUE", TABLE_PREFIX, TABLE_PREFIX, $event_id));
			        $chairs_array = array();
                    while ($row = $query->fetch_row()) {
                        array_push($chairs_array, $row['user_id']);
                    }
                    foreach ($chairs_array as $chair_id) {
                        if ($chair_id != $g_user->data['user_id']) {
					        $query = new Query(sprintf("INSERT INTO notifications SET event_id = %d, message='%s', viewed=%d, sender_id=%d, receiver_id=%d", $event_id, $commentNoHTML, 0, $g_user->data['user_id'], $chair_id));
					    }
					}
					$query = new Query(sprintf("INSERT INTO %scalendar_comment SET event_id=%d, user_id=%d, timestamp='%s', body='%s'", TABLE_PREFIX, $event_id, $g_user->data['user_id'], $timestamp, $comment));
					$comment_id = $query->last_insert_id();
					$description = "Added comment id #$comment_id";
					$query = new Query(sprintf("INSERT INTO %sevent_audit_trail SET event_id=%d, user_id=%d, timestamp='%s', description='%s'", TABLE_PREFIX, $event_id, $g_user->data['user_id'], $timestamp, $description));
					$query = new Query("commit");
				}
				break;
			case 'delete_comment':
				if (isset($_REQUEST['comment']) && is_numeric($_REQUEST['comment'])) {
					$unprivileged = $g_user->permit("calendar delete comments") ? "" : sprintf(" AND user_id=%d", $g_user->data['user_id']);
					$comment_id = $_REQUEST['comment'];
					$description = "Removed comment id #$comment_id";
					$query = new Query("start transaction");
					$query = new Query(sprintf("UPDATE %scalendar_comment SET deleted=TRUE WHERE comment_id=%d$unprivileged LIMIT 1", TABLE_PREFIX, $comment_id));
					if ($query->affected_rows() > 0) {
						$query = new Query(sprintf("INSERT INTO %sevent_audit_trail SET event_id=%d, user_id=%d, timestamp='%s', description='%s'", TABLE_PREFIX, $event_id, $g_user->data['user_id'], $timestamp, $description));
					}
					$query = new Query("commit");
				}
				break;
			case 'Evaluate Event':
				$g_user->redirect("evaluate_event.php?id=$event_id");
				break;
			case 'like_comment':
				$comment_id = $_REQUEST['comment'];
				$query = new Query(sprintf("SELECT * FROM apo_calendar_comment_like WHERE event_id=%d AND comment_id=%d AND user_id=%d LIMIT 1", $event_id, $comment_id, $g_user->data['user_id']));
				$row = $query->fetch_row();
				if (!$row) {
					$query = new Query("start transaction");
					$query = new Query(sprintf("INSERT INTO apo_calendar_comment_like SET comment_id=%d, event_id=%d, user_id=%d, timestamp='%s'", $comment_id, $event_id, $g_user->data['user_id'], $timestamp));
					$query = new Query("commit");
				} else if ($row['unlike'] == 0) {
					$query = new Query("start transaction");
					$query = new Query(sprintf("update apo_calendar_comment_like SET unlike = 1 where like_id=%d", $row['like_id']));
					$query = new Query("commit");
				} else {
					$query = new Query("start transaction");
					$query = new Query(sprintf("update apo_calendar_comment_like SET unlike = 0 where like_id=%d", $row['like_id']));
					$query = new Query("commit");
				}
				break;
			default:
				if (VERBOSE_ERRORS) {
					trigger_error("Unrecognized function: $_REQUEST[function]", E_USER_ERROR);
				} else {
					trigger_error("Sorry, we ran into an error, but it probably isn't your fault. Please notify the webmaster.", E_USER_ERROR);
				}
				return;
			}
			if (!$error) {
				$g_user->redirect("event.php?id=$event_id&refresh=true");
			}
		}
	}
	
	/**
	 * Returns a Query containing events ordered by ascending date.
	 * Begin and End are integers formatted YYYYMMDD and are inclusive. */
	function query_range($begin, $end) {
		global $g_user;
		$select_expression = sprintf("%scalendar_event.event_id, title, date, signup_begin, signup_cutoff, signup_lock, deleted, type_custom", TABLE_PREFIX);
		$join_expression = "";
		$where_expression = $g_user->is_logged_in() && $g_user->permit("calendar view deleted") ? "TRUE" : "deleted=FALSE";
		
		// Append date range to where_expression
		$where_expression .= sprintf(" AND date >= %d AND date <= %d", $begin, $end);
		
		// Process the event types
		$where_expression .= " AND (FALSE";
		foreach ($this->filter as $key => $value) {
			// Add each event type to the select_expression
			$select_expression .= ", $key";
			
			// Filter out unwanted event types as set in constructor
			if ($value) {
				$where_expression .= " OR $key=TRUE";
			}
		}
		// Special handling for custom event types
		if ($this->filter_type_custom == 0) {
			$where_expression .= " OR !(type_custom IS NULL)";
			// Include events with no assigned type
			$where_expression .= " OR type_custom IS NULL";
			foreach ($this->filter as $key => $value) {
				$where_expression .= " AND $key=FALSE";
			}
		} else if ($this->filter_type_custom > 0) {
			$where_expression .= sprintf(" OR type_custom = %d", $this->filter_type_custom);
		}
		$where_expression .= ")";
		
		// If user is logged in, mark the events that the user is attending
		if ($g_user->is_logged_in()) {
			new Query("CREATE TEMPORARY TABLE my_attend (event_id INT UNSIGNED NOT NULL PRIMARY KEY, attending BOOLEAN)");
			new Query(sprintf("INSERT INTO my_attend (event_id, attending) SELECT event_id, TRUE AS attending FROM %scalendar_attend WHERE user_id = %d", TABLE_PREFIX, $g_user->data['user_id']));
			$select_expression .= ", my_attend.attending";
			$join_expression .= " LEFT JOIN my_attend USING (event_id)";
		}
		
		return new Query(sprintf("SELECT %s FROM %scalendar_event%s WHERE %s ORDER BY date ASC", $select_expression, TABLE_PREFIX, $join_expression, $where_expression));
	}
}
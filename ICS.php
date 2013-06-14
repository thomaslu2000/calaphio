<?php
global $g_user;
include 'include/includes.php';
include 'include/Calendar.class.php';
$calendar = new Calendar();

if (isset($_REQUEST['function']) && isset($_REQUEST['id']) && is_numeric($_REQUEST['id'])) {
	if (!$g_user->is_logged_in()) {
		trigger_error("You must be logged in to do that.", E_USER_ERROR);
		return;
	}
	
	$event_id = $_REQUEST['id'];
	$query = new Query(sprintf("SELECT %scalendar_event.*, type_name FROM %scalendar_event LEFT JOIN %scalendar_event_type_custom ON (type_custom = type_id) WHERE event_id=%d$deleted LIMIT 1", TABLE_PREFIX, TABLE_PREFIX, TABLE_PREFIX, $event_id));
	if ($row = $query->fetch_row()) {
		$title = html_entity_decode($row['title'], ENT_QUOTES, 'UTF-8');
		$event_time = strtotime($row['date']);
		$date = date("Ymd", $event_time);
		$location = $row['location'] && $g_user->is_logged_in() ? html_entity_decode($row['location'], ENT_QUOTES, 'UTF-8') : "";
		$description = html_entity_decode($row['description'], ENT_QUOTES, 'UTF-8');
		$description = str_replace("<br />", "%0A", $description);
		$now = time();
		$stampDate = date("Ymd", $now);
		$stampTime = date("His", $now);
			
		// Figure out the Time formatting
		if ($row['time_allday']) {
			$timeStart = "000000";
			$timeEnd="240000";
		} else if ($row['time_start'] == "01:00:00" && $row['time_end'] == "01:00:00") {
			$timeStart = "010000";
			$timeEnd="010000";
		} else if ($row['time_start'] && $row['time_end']) {
			$timeStart = date("His", strtotime($row['time_start']));
			$timeEnd = date("His", strtotime($row['time_end']));
		} else if ($row['time_start']) {
			$timeStart = date("His", strtotime($row['time_start']));
		} else {
			$timeStart = "010000";
			$timeEnd="010000";
		}
	}
	
	
	switch ($_REQUEST['function']) {
	case 'icalendar': 
		header("Content-Type: text/Calendar");
		header("Content-Disposition: inline; filename=APOEvent.ics");
		echo "BEGIN:VCALENDAR\n";
		echo "PRODID:-//Calaphio//Benjamin Le//EN\n";
		echo "VERSION:2.0\n";
		echo "CALSCALE:GREGORIAN\n";
		echo "METHOD:PUBLISH\n";
		echo "BEGIN:VEVENT\n";
		echo "DESCRIPTION:" . $description . "\n";
		echo "DTSTAMP:" . $stampDate . "T" . $stampTime . "\n";
		echo "DTSTART:" . $date . "T" . $timeStart . "\n";
		if ($timeEnd) {
			echo "DTEND:" . $date . "T" . $timeEnd . "\n";
		}
		echo "LOCATION:" . $location . "\n";
		echo "PRIORITY:5\n";
		echo "SUMMARY:APO Event-" . $title . "\n";
		echo "UID:www.calaphio.com/eventID=" . $event_id . "\n";
		//Here is to set the reminder for the event.
		//echo "BEGIN:VALARM\n";
		//echo "TRIGGER:-PT1440M\n";
		//echo "ACTION:DISPLAY\n";
		//echo "DESCRIPTION:Reminder\n";
		//echo "END:VALARM\n";
		echo "END:VEVENT\n";
		echo "END:VCALENDAR\n";
		break;
	case 'google_calendar':
		$base_url = "http://www.google.com/calendar/event?action=TEMPLATE";
		$text = "&text=" . urlencode($title);
		$dates = "&dates=" .  urlencode($date) . "T" . urlencode($timeStart) . "/" . urlencode($date) . "T" . $timeEnd;
		$details = "&details=" . $description;
		$google_loc = "&location=" . urlencode($location);
		$busy = "&trp=true";
		$prop = "&sprop=calaphio.com";
		$prop_name = "&prop=name:Calaphio\" ";
		$target = "target=\"_blank";
		header('Location: ' . $base_url . $text . $dates . $details . $google_loc . $busy . $prop . $prop_name . $target);
		break;
	}
}
?>
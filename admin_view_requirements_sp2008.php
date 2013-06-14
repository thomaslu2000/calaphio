<?php
require("include/includes.php");
require("include/Template.class.php");
Template::print_head(array('admin_view_requirements.css'));
Template::print_body_header('Home', 'ADMIN');

function process_attendance($attended, $flaked, $chair)
{
	if (!$attended && !$flaked && $chair) {
		return "Chairing";
	} else if (!$attended && !$flaked && !$chair) {
		return "Signed Up";
	} else if ($flaked) {
		return "Flaked!";
	} else if ($attended && $chair) {
		return "Chaired";
	} else if ($attended) {
		return "Attended";
	} else {
		trigger_error("Woops, something happened behind the scenes that wasn't expected. Please contact the webmaster!", E_USER_ERROR);
		return "";
	}
}

// SQL fields for event types
$event_types = array(
	'type_interchapter',
	'type_service_chapter',
	'type_service_campus',
	'type_service_community',
	'type_service_country',
	'type_fellowship',
	'type_fundraiser',
	'type_leadership',
	'type_scouting',
	'type_rush',
	'type_alumni',
	'type_family',
	'type_active_meeting',
	'type_pledge_meeting');

// Get custom event types
$custom_types = array();
$query = new Query("SELECT type_id, type_name FROM apo_calendar_event_type_custom WHERE disabled=FALSE");
while ($row = $query->fetch_row()) {
	$custom_types[$row['type_id']] = $row['type_name'];
}

if (!$g_user->is_logged_in() || !$g_user->permit("admin view requirements")) {
	// Require user to have permissions
	trigger_error("You must be logged in as an admin to access this feature", E_USER_ERROR);
} else {
	$results = "";
	if (isset($_POST['submit'])) {
		// Generate SQL query
		$where_statement_array = array();
		
		foreach ($event_types as $event_type) {
			if (isset($_POST[$event_type]) && $_POST[$event_type]) {
				$where_statement_array[] = "$event_type=TRUE";
			}
		}
		if (isset($_POST['type_custom_selected']) && $_POST['type_custom_selected'] && isset($_POST['type_custom']) && in_array($_POST['type_custom'], array_keys($custom_types))) {
			$where_statement_array[] = "type_custom=$_POST[type_custom]";
		}
		
		$begin_date = "2008-1-14";
		$end_date = "2008-5-12";
		
		$where_statement = $where_statement_array ? "WHERE " . implode(" OR ", $where_statement_array) : '';
		
		$query = new Query(sprintf("SELECT * FROM %susers
			JOIN %scalendar_attend USING (user_id)
			JOIN %scalendar_event ON (%scalendar_attend.event_id = %scalendar_event.event_id AND deleted=FALSE AND date BETWEEN '$begin_date' AND '$end_date')
			%s
			ORDER BY lastname, firstname, date ASC",
			TABLE_PREFIX,
			TABLE_PREFIX,
			TABLE_PREFIX, TABLE_PREFIX, TABLE_PREFIX,
			$where_statement));
		$results .= "<table style=\"margin-top: 1em;\">\r\n<caption style=\"margin-bottom: 1em;\">Note that people who are not signed up for events will not appear on this list</caption>\r\n";
		$prev_id = 0;
		$hours = 0;
		$hours_array = array();
		while ($row = $query->fetch_row()) {
			if ($prev_id != $row['user_id']) {
				if ($prev_id != 0) {
					$results .= "<tr><td style=\"font-weight:bold\">Total: $hours hours</td></tr>\r\n";
					$results .= "<tr><td>&nbsp;</td></tr>\r\n";
				}
				$results .= "<tr><th style=\"font-weight:bold\">$row[lastname], $row[firstname] ($row[pledgeclass])</th></tr>\r\n";
				$prev_id = $row['user_id'];
				$hours = 0;
			}
			if ($row['attended'] && is_numeric($row['hours'])) {
				$hours += $row['hours'];
			} else if ($row['flaked'] && is_numeric($row['hours'])) {
				$hours -= $row['hours'];
			}
			$attend_type = process_attendance($row['attended'], $row['flaked'], $row['chair']);
			$attend_hours = $row['hours'] > 0 ? $row['hours'] : '';
			if ($row['flaked']) {
				$attend_hours = "-" . $attend_hours;
			}
			$attend_date = date("M d, Y", strtotime($row['date']));
			$results .= <<<HEREDOC
<tr><td>$row[title]</td><td>$attend_hours</td><td>$attend_type</td><td>$attend_date</td></tr>

HEREDOC;
		}
		if ($prev_id != 0) {
			$results .= "<tr><td style=\"font-weight:bold\">Total: $hours hours</td></tr>\r\n";
			$results .= "<tr><td>&nbsp;</td></tr>\r\n";
		}
		$results .= "</table>";
	}
	
	// Remember which event types were checked by the user
	foreach ($event_types as $event_type) {
		$$event_type = isset($_POST[$event_type]) && $_POST[$event_type] ? ' checked="checked"' : '';
	}
	$type_custom_selected = isset($_POST['type_custom_selected']) && $_POST['type_custom_selected'] ? ' checked="checked"' : '';
	$type_custom = "";
	foreach ($custom_types as $custom_id => $custom_name) {
		$selected = isset($_POST['type_custom']) && $_POST['type_custom'] == $custom_id ? ' selected="selected"' : '';
		$type_custom .= "<option value=\"$custom_id\"$selected>$custom_name</option>";
	}
	
	echo <<<HEREDOC
<h1>View Active/Pledge Requirements (CC)</h1>
<form method="post" action="">
<table>
<caption></caption>
<tr><th class="typeHeading" axis="Chapter">Chapter</th><th class="typeHeading" axis="Fellowship">Friendship</th><th class="typeHeading" axis="Service">Service</th></tr>
<tr><td axis="Chapter"><input type="checkbox" name="type_active_meeting"$type_active_meeting />Active Meeting</td><td axis="Fellowship"><input type="checkbox" name="type_fellowship"$type_fellowship />Fellowship</td><td axis="Service"><input type="checkbox" name="type_service_chapter"$type_service_chapter />Chapter</td></tr>
<tr><td axis="Chapter"><input type="checkbox" name="type_pledge_meeting"$type_pledge_meeting />Pledge Meeting</td><td axis="Fellowship"><input type="checkbox" name="type_alumni"$type_alumni />Alumni</td><td axis="Service"><input type="checkbox" name="type_service_campus"$type_service_campus />Campus</td></tr>
<tr><td axis="Chapter"><input type="checkbox" name="type_leadership"$type_leadership />Leadership</td><td axis="Fellowship"><input type="checkbox" name="type_family"$type_family />Family</td><td axis="Service"><input type="checkbox" name="type_service_community"$type_service_community />Community</td></tr>
<tr><td axis="Chapter"><input type="checkbox" name="type_rush"$type_rush />Rush</td><td axis="Fellowship"><input type="checkbox" name="type_interchapter"$type_interchapter />Interchapter</td><td axis="Service"><input type="checkbox" name="type_service_country"$type_service_country />Country</td></tr>
<tr><td axis="Chapter"><input type="checkbox" name="type_custom_selected"$type_custom_selected /><select name="type_custom">$type_custom</select></td><td axis="Fellowship"><input type="checkbox" name="type_scouting"$type_scouting />Scouting</td><td axis="Service"><input type="checkbox" name="type_fundraiser"$type_fundraiser />Fundraiser</td></tr>
</table>
<button name="submit" type="submit">Submit</button>
</form>

$results
<br/>
<a href="admin_view_requirements.php">Fall 2012 (MH) Admin Powers ></a> <br/>
<a href="admin_view_requirements.php">Spring 2012 (JS) Admin Powers ></a> <br/>
<a href="admin_view_requirements_fa2011.php">Fall 2011 (CPZ) Admin Powers ></a> <br/>
<a href="admin_view_requirements_sp2011.php">Spring 2011 (KS) Admin Powers ></a> <br/>
<a href="admin_view_requirements_fa2010.php">Fall 2010 (JLC) Admin Powers ></a> <br/>
<a href="admin_view_requirements_sp2010.php">Spring 2010 (GL) Admin Powers ></a> <br/>
<a href="admin_view_requirements_fa2009.php">Fall 2009 (JM) Admin Powers ></a> <br/>
<a href="admin_view_requirements_sp2009.php">Spring 2009 (ST) Admin Powers ></a> <br/>
<a href="admin_view_requirements_fa2008.php">Fall 2008 (WK) Admin Powers ></a> <br/>
<a href="admin_view_requirements_sp2008.php">Spring 2008 (CC) Admin Powers ></a> <br/>
<a href="admin_view_requirements_fa2007.php">Fall 2007 (JCJ) Admin Powers ></a> <br/>
<a href="admin_view_requirements_sp2007.php">Spring 2007 (MLN) Admin Powers ></a> <br/>

HEREDOC;
}
Template::print_body_footer();
Template::print_disclaimer();
?>
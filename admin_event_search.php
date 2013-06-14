<?php
/**
 * This file is intended as a kluge to keep the chapter running until I have
 * time to create a real dynamic requirements tracker. -Geoffrey Lee
 */
require("include/includes.php");
require("include/Template.class.php");
Template::print_head(array('admin_view_requirements.css'));
Template::print_body_header('Home', 'ADMIN');

?>

<script language="javascript" type="text/javascript" src="popup.js"></script>
<div id="requirements">

<?php

function event_link($event_id, $title, $date)
{
	$popup_width = 550;
	$popup_height = 560;
	$session_id = session_id(); // JavaScript popups in IE tend to block cookies, so need to explicitly set session id
	return "<a href=\"event.php?id=$event_id&sid=$session_id\" onclick=\"return popup('event.php?id=$event_id&sid=$session_id', $popup_width, $popup_height)\">$title</a> on $date";
}

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

		$eventname = isset($_REQUEST['eventname']) ? Query::escape_string($_REQUEST['eventname']) : false;
				
		$where_statement = $where_statement_array ? " AND (" . implode(" OR ", $where_statement_array) . ")": '';

		if ($eventname) {
			$where_statement .= " AND title LIKE '%$eventname%'";
		}
			
		$query = new Query(sprintf("SELECT * FROM apo_calendar_event WHERE deleted = 0 %s ORDER BY date DESC", $where_statement));
		while ($row = $query->fetch_row()) {
			$results .= event_link($row['event_id'], $row['title'], $row['date']) . "<br>";
		}
		$results .= "NO RESULT <br>";

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
<h1>Event Search </h1>
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
<tr><td axis="form_label">Event Name: </td><td axis="form_input"><input type="text" name="eventname" value="$eventname" /></td></tr><br>
<button name="submit" type="submit">Submit</button>
</form>
<br>
$results
HEREDOC;
}
	
?>
<?php
Template::print_body_footer();
Template::print_disclaimer();
?>
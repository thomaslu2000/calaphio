<?php
/**
 * This file is intended as a kluge to keep the chapter running until I have
 * time to create a real dynamic requirements tracker. -Geoffrey Lee
 */
require("include/includes.php");
require("include/Calendar.class.php");
require("include/Template.class.php");
Template::print_head(array("requirements.css"));
Template::print_body_header('Home', 'ADMIN');

?>

<script language="javascript" type="text/javascript" src="popup.js"></script>
<div id="requirements">

<?php

/**
 *
 */
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

/**
 *
 */
function event_link($event_id, $title)
{
	$popup_width = CALENDAR_POPUP_WIDTH;
	$popup_height = CALENDAR_POPUP_HEIGHT;
	$session_id = session_id(); // JavaScript popups in IE tend to block cookies, so need to explicitly set session id
	return "<a href=\"event.php?id=$event_id&sid=$session_id\" onclick=\"return popup('event.php?id=$event_id&sid=$session_id', $popup_width, $popup_height)\">$title</a>";
}

if ($g_user->data['user_id'] == 1190 || $g_user->data['user_id'] == 1086) {
	$is_tomo_or_bonnie = true;
} else {
	$is_tomo_or_bonnie = false;
}

			echo <<<DOCHERE
<h1>PComm Power (PMP)</h1>
<br/>
DOCHERE;

if (!$g_user->is_logged_in() || !$g_user->permit("admin view pledge requirements")) {
	trigger_error("You must be logged in as an admin to access this feature", E_USER_ERROR);
//} else if (!$is_tomo_or_bonnie) {
//	trigger_error("You must be Tomo or Bonnie to access this feature", E_USER_ERROR);
} else {
	
	$query = new Query(sprintf("SELECT apo_users.user_id, firstname, lastname FROM apo_users join apo_pledges using (user_id) where depledged=0 order by apo_users.lastname"));

	$start_date = strtotime("2015-05-18");
	$end_date = strtotime("2015-12-30");
	$sql_start_date = date("Y-m-d", $start_date);
	$sql_end_date = date("Y-m-d", $end_date);
	
	$result = "";
	
	while ($peopleRow = $query->fetch_row()) {
		// Retrieve IC events
		$user_id = $peopleRow['user_id'];
		$firstname = $peopleRow['firstname'];
		$lastname = $peopleRow['lastname'];
		$ic_events = "";
		$ic_events_count = 0;
		$queryIC = new Query(sprintf("SELECT %scalendar_event.event_id, title, date, attended, flaked, chair FROM %scalendar_event
			JOIN %scalendar_attend USING (event_id)
			WHERE type_interchapter=TRUE AND deleted=FALSE AND date BETWEEN '%s' AND '%s' AND user_id=%d ORDER BY date ASC",
			TABLE_PREFIX, TABLE_PREFIX,
			TABLE_PREFIX,
			$sql_start_date, $sql_end_date, $user_id));
		while ($row = $queryIC->fetch_row()) {
			if ($row['attended']) {
				$ic_events_count++;
			//} else if ($row['flaked']) {
			//	$ic_events_count--;
			}
		}
		if ($ic_events_count < 1) {
			$ic_events = "<FONT COLOR='RED'>1 IC Event: $ic_events_count Events <br/></FONT>";
		} else {
			$ic_events = "1 IC Event: $ic_events_count Events <br/>";
		}

		// Retrieve Service events
		$service_events = "";
		$service_hours = 0;
		$querySER = new Query(sprintf("SELECT %scalendar_event.event_id, title, date, attended, flaked, chair, hours, driver FROM %scalendar_event
			JOIN %scalendar_attend USING (event_id)
			WHERE (type_service_chapter=TRUE OR type_service_campus=TRUE OR type_service_community=TRUE OR type_service_country=TRUE OR type_fundraiser=TRUE) AND deleted=FALSE AND date BETWEEN '%s' AND '%s' AND user_id=%d ORDER BY date ASC",
			TABLE_PREFIX, TABLE_PREFIX,
			TABLE_PREFIX,
			$sql_start_date, $sql_end_date, $user_id));
		while ($row = $querySER->fetch_row()) {
			if ($row['attended'] && is_numeric($row['hours'])) {
				$service_hours += $row['hours'];
			} else if ($row['flaked'] && is_numeric($row['hours'])) {
				$service_hours -= $row['hours'];
			}
		}
		if ($service_hours < 20) {
			$service_events = "<FONT COLOR='RED'>20 Service Hours: $service_hours Hours <br/></FONT>";
		} else {
			$service_events = "20 Service Hours: $service_hours Hours <br/>";
		}
		
		// Retrieve Fellowship events
		$fellowship_events = "";
		$fellowship_events_count = 0;
		$queryFEL = new Query(sprintf("SELECT %scalendar_event.event_id, title, date, attended, flaked, chair FROM %scalendar_event
			JOIN %scalendar_attend USING (event_id)
			WHERE type_fellowship=TRUE AND deleted=FALSE AND date BETWEEN '%s' AND '%s' AND user_id=%d ORDER BY date ASC",
			TABLE_PREFIX, TABLE_PREFIX,
			TABLE_PREFIX,
			$sql_start_date, $sql_end_date, $user_id));
		while ($row = $queryFEL->fetch_row()) {
			if ($row['attended']) {
				$fellowship_events_count++;
			} else if ($row['flaked']) {
				$fellowship_events_count--;
			}
		}
		if ($fellowship_events_count < 5) {
			$fellowship_events = "<FONT COLOR='RED'>5 Fellowships: $fellowship_events_count Fellowships <br/></FONT>";
		} else {
			$fellowship_events = "5 Fellowships: $fellowship_events_count Fellowships <br/>";
		}
		
		// Retrieve Fundraiser events
		$fundraiser_events = "";
		$fundraiser_events_count = 0;
		$queryFUN = new Query(sprintf("SELECT %scalendar_event.event_id, title, date, attended, flaked, chair FROM %scalendar_event
			JOIN %scalendar_attend USING (event_id)
			WHERE type_fundraiser=TRUE AND deleted=FALSE AND date BETWEEN '%s' AND '%s' AND user_id=%d ORDER BY date ASC",
			TABLE_PREFIX, TABLE_PREFIX,
			TABLE_PREFIX,
			$sql_start_date, $sql_end_date, $user_id));
		while ($row = $queryFUN->fetch_row()) {
			if ($row['attended']) {
				$fundraiser_events_count++;
			} else if ($row['flaked']) {
				$fundraiser_events_count--;
			}
		}
		if ($fundraiser_events_count < 1) {
			$fundraiser_events = "<FONT COLOR='RED'>1 Fundraiser: $fundraiser_events_count Fundraiser <br/></FONT>";
		} else {
			$fundraiser_events = "1 Fundraiser: $fundraiser_events_count Fundraiser <br/>";
		}

		// Retrieve Election events
		$election_events = "";
		$election_events_count = 0;
		$queryE = new Query(sprintf("SELECT %scalendar_event.event_id, title, date, attended, flaked, chair FROM %scalendar_event
			JOIN %scalendar_attend USING (event_id)
			JOIN %scalendar_event_type_custom ON (type_id=type_custom AND type_name='Elections')
			WHERE deleted=FALSE AND date BETWEEN '%s' AND '%s' AND user_id=%d ORDER BY date ASC",
			TABLE_PREFIX, TABLE_PREFIX,
			TABLE_PREFIX,
			TABLE_PREFIX,
			$sql_start_date, $sql_end_date, $user_id));
		while ($row = $queryE->fetch_row()) {
			if ($row['attended']) {
				$election_events_count++;
			//} else if ($row['flaked']) {
			//	$election_events_count--;
			}
		}
		if ($election_events_count < 1) {
			$election_events = "<FONT COLOR='RED'>1 Election: $election_events_count Election <br/></FONT>";
		} else {
			$election_events = "1 Election: $election_events_count Election <br/>";
		}
		
		// Retrieve Chapter Meeting events
		$chaptermeeting_events = "";
		$chaptermeeting_events_count = 0;
		$queryCM = new Query(sprintf("SELECT %scalendar_event.event_id, title, date, attended, flaked, chair FROM %scalendar_event
			JOIN %scalendar_attend USING (event_id)
			WHERE type_active_meeting=TRUE AND deleted=FALSE AND date BETWEEN '%s' AND '%s' AND user_id=%d ORDER BY date ASC",
			TABLE_PREFIX, TABLE_PREFIX,
			TABLE_PREFIX,
			$sql_start_date, $sql_end_date, $user_id));
		while ($row = $queryCM->fetch_row()) {
			if ($row['attended']) {
				$chaptermeeting_events_count++;
			//} else if ($row['flaked']) {
			//	$chaptermeeting_events_count--;
			}
		}
		if ($chaptermeeting_events_count < 4) {
			$chaptermeeting_events = "<FONT COLOR='RED'>4 Chapter Meetings: $chaptermeeting_events_count Meetings <br/></FONT>";
		} else {
			$chaptermeeting_events = "4 Chapter Meetings: $chaptermeeting_events_count Meetings <br/>";
		}


		// Retrieve Leadership Credit
		$leadership = "";
		$leadership_count = 0;
		$queryLeadership = new Query(sprintf("SELECT %scalendar_event.event_id, title, date, attended, flaked, chair FROM %scalendar_event
			JOIN %scalendar_attend USING (event_id)
			WHERE (type_interchapter=TRUE OR type_service_chapter=TRUE OR type_service_campus=TRUE OR type_service_community=TRUE OR type_service_country=TRUE OR type_fellowship=TRUE OR type_fundraiser=TRUE) AND deleted=FALSE AND date BETWEEN '%s' AND '%s' AND user_id=%d AND chair = 1 ORDER BY date ASC",
			TABLE_PREFIX, TABLE_PREFIX,
			TABLE_PREFIX,
			$sql_start_date, $sql_end_date, $user_id));
		while ($row = $queryLeadership->fetch_row()) {
			if ($row['attended']) {
				$leadership_count++;
			}
		}
		if ($leadership_count < 3) {
			$leadership = "<FONT COLOR='RED'>3 Leadership Credits: $leadership_count Leadership Credits <br/></FONT>";
		} else {
			$leadership = "3 Leadership Credits: $leadership_count Leadership Credits <br/>";
		}

$interfam_events = "";
		$interfam_events_count = 0;
		$queryInter = new Query(sprintf("SELECT %scalendar_event.event_id, title, date, attended, flaked, chair FROM %scalendar_event
			JOIN %scalendar_attend USING (event_id)
			JOIN %scalendar_event_type_custom ON (type_id=type_custom AND type_name='Interfam')
			WHERE deleted=FALSE AND date BETWEEN '%s' AND '%s' AND user_id=%d ORDER BY date ASC",
			TABLE_PREFIX, TABLE_PREFIX,
			TABLE_PREFIX,
			TABLE_PREFIX,
			$sql_start_date, $sql_end_date, $user_id));
		while ($row = $queryInter->fetch_row()) {
			if ($row['attended']) {
				$interfam_events_count++;
			}
		}
		if ($interfam_events_count < 1) {
			$interfam_events = "<FONT COLOR='RED'>1 Interfams: $interfam_events_count Interfams <br/></FONT>";
		} else {
			$interfam_events = "1 Interfams: $interfam_events_count Interfams <br/>";
		}

		// Retrieve ExComm Meeting events
		$excomm_events = "";
		$excomm_events_count = 0;
		$queryEx = new Query(sprintf("SELECT %scalendar_event.event_id, title, date, attended, flaked, chair FROM %scalendar_event
			JOIN %scalendar_attend USING (event_id)
			JOIN %scalendar_event_type_custom ON (type_id=type_custom AND type_name='ExComm Meeting')
			WHERE deleted=FALSE AND date BETWEEN '%s' AND '%s' AND user_id=%d ORDER BY date ASC",
			TABLE_PREFIX, TABLE_PREFIX,
			TABLE_PREFIX,
			TABLE_PREFIX,
			$sql_start_date, $sql_end_date, $user_id));
		while ($row = $queryEx->fetch_row()) {
			if ($row['attended']) {
				$excomm_events_count++;
			}
		}
		if ($excomm_events_count < 1) {
			$excomm_events = "<FONT COLOR='RED'>1 ExComm Meeting: $excomm_events_count ExComm Meeting <br/></FONT>";
		} else {
			$excomm_events = "1 ExComm Meeting: $excomm_events_count ExComm Meeting <br/>";
		}

			echo <<<DOCHERE
<b>$firstname $lastname:</b><br/>
$ic_events
$fundraiser_events
$chaptermeeting_events
$election_events
$service_events
$fellowship_events
$interfam_events
$excomm_events
<br/>
DOCHERE;
	}
			echo <<<DOCHERE
Pay your \$45 active dues (\$55 at CM3, \$65 at CM5) <br/>
Attend Ritual <br/>
Join a Pledge committee <br/>
Join an ExComm committee - <a href="cpz_chairs.php">Search for one here</a> <br/>
Demonstrate leadership within the pledge committee <br/>
Complete committee requirements <br/>
Attend both pledge class service projects <br/>
Attend Sib Social <br/>
Attend Broomball <br/>
Attend Talent Show <br/>
Attend Campout <br/>
Attend 2 pledge committee office hours <br/>
Attend all pledge reviews <br/>
Pass all pledge quizzes <br/>
Write 20 interviews (1 page, double spaced) <br/>
Write 4 reflections (1.5 page, double spaced) <br/>
Complete signature page <br/>
Pass pledge test <br/>
Attend activation <br/>

DOCHERE;
}
?>

</div>

<?php
Template::print_body_footer();
Template::print_disclaimer();
?>
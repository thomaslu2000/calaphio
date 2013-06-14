<?php
require("include/includes.php");
require("include/Template.class.php");
require("include/Calendar.class.php");
Template::print_head(array());
Template::print_body_header('Home', 'ADMIN');
if (!$g_user->is_logged_in() || !$g_user->permit("admin change passphrase")) {
	trigger_error("You must be logged in as an admin to access this feature", E_USER_ERROR);
	return;
} else if (isset($_REQUEST['person']) && isset($_REQUEST['semester'])) {
	// Retrieve IC events
	$user_id = $_REQUEST['person'];
	$query = new Query(sprintf("SELECT start, end FROM apo_semesters WHERE semester='%s'", $_REQUEST['semester']));
	$row = $query->fetch_row();
	$start_date = strtotime($row['start']);
	$end_date = strtotime($row['end']);	
	$sql_start_date = date("Y-m-d", $start_date);
	$sql_end_date = date("Y-m-d", $end_date);

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
	//Retrieve IC Halfs
	$queryICHalf = new Query(sprintf("SELECT %scalendar_event.event_id, title, date, attended, flaked, chair FROM %scalendar_event
		JOIN %scalendar_attend USING (event_id)
		WHERE type_interchapter_half=TRUE AND deleted=FALSE AND date BETWEEN '%s' AND '%s' AND user_id=%d ORDER BY date ASC",
		TABLE_PREFIX, TABLE_PREFIX,
		TABLE_PREFIX,
		$sql_start_date, $sql_end_date, $user_id));
	while ($row = $queryICHalf->fetch_row()) {
		if ($row['attended']) {
			$ic_events_count += .5;
		//} else if ($row['flaked']) {
		//	$ic_events_count--;
		}
	}
	if ($ic_events_count < 1) {
		$ic_events = "<FONT COLOR='RED'>1 IC Credit: $ic_events_count Credits <br/></FONT>";
	} else {
		$ic_events = "1 IC Credit: $ic_events_count Credits <br/>";
	}

	// Retrieve Service events
	$service_events = "";
	$service_hours = 0;
	$querySER = new Query(sprintf("SELECT %scalendar_event.event_id, title, date, attended, flaked, chair, hours, driver, type_service_chapter, type_service_campus, type_service_community, type_service_country, type_fundraiser FROM %scalendar_event
		JOIN %scalendar_attend USING (event_id)
		WHERE (type_service_chapter=TRUE OR type_service_campus=TRUE OR type_service_community=TRUE OR type_service_country=TRUE OR type_fundraiser=TRUE) AND deleted=FALSE AND date BETWEEN '%s' AND '%s' AND user_id=%d ORDER BY date ASC",
		TABLE_PREFIX, TABLE_PREFIX,
		TABLE_PREFIX,
		$sql_start_date, $sql_end_date, $user_id));
	$service_chapter = 0;
	$service_campus = 0;
	$service_community = 0;
	$service_country = 0;
	$service_total = 0;
	while ($row = $querySER->fetch_row()) {
		if ($row['attended'] && is_numeric($row['hours'])) {
			$service_hours += $row['hours'];
			if ($row['type_service_chapter'] || $row['type_fundraiser']) {
				$service_chapter = 1;
			}
			if ($row['type_service_campus']) {
				$service_campus = 1;
			}
			if ($row['type_service_community']) {
				$service_community = 1;
			}
			if ($row['type_service_country']) {
				$service_country = 1;
			}
		} else if ($row['flaked'] && is_numeric($row['hours'])) {
			$service_hours -= $row['hours'];
		}
	}
	if ($service_hours < 20) {
		$service_events = "<FONT COLOR='RED'>20 Service Hours: $service_hours Hours <br/></FONT>";
	} else {
		$service_events = "20 Service Hours: $service_hours Hours <br/>";
	}

	$service_total = $service_chapter + $service_campus + $service_community + $service_country;

	if ($service_total < 0) {
		$four_cs = "<FONT COLOR='RED'>0 Cs of Service: $service_total Cs <br/></FONT>";
	} else {
		$four_cs = "0 Cs of Service: $service_total Cs <br/>";
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
	
	// Retrieve Tabling hours
	$tabling_events = "";
	$tabling_hours = 0;
	$queryTAB = new Query(sprintf("SELECT %scalendar_event.event_id, title, date, attended, flaked, chair, hours FROM %scalendar_event
		JOIN %scalendar_attend USING (event_id)
		JOIN %scalendar_event_type_custom ON (type_id=type_custom AND type_name='Tabling')
		WHERE deleted=FALSE AND date BETWEEN '%s' AND '%s' AND user_id=%d ORDER BY date ASC",
		TABLE_PREFIX, TABLE_PREFIX,
		TABLE_PREFIX,
		TABLE_PREFIX,
		$sql_start_date, $sql_end_date, $user_id));
	while ($row = $queryTAB->fetch_row()) {
		if ($row['attended']) {
			$tabling_hours += $row['hours'];
		} else if ($row['flaked']) {
			$tabling_hours -= $row['hours'];
		}
	}
	if ($tabling_hours < 3) {
		$tabling_events = "<FONT COLOR='RED'>3 Hours of Tabling: $tabling_hours Hours <br/></FONT>";
	} else {
		$tabling_events = "3 Hours of Tabling: $tabling_hours Hours <br/>";
	}
	
	// Retrieve Rush events
	$rush_events = "";
	$rush_events_count = 0;
	$queryR = new Query(sprintf("SELECT %scalendar_event.event_id, title, date, attended, flaked, chair FROM %scalendar_event
		JOIN %scalendar_attend USING (event_id)
		WHERE type_rush=TRUE AND deleted=FALSE AND date BETWEEN '%s' AND '%s' AND user_id=%d ORDER BY date ASC",
		TABLE_PREFIX, TABLE_PREFIX,
		TABLE_PREFIX,
		$sql_start_date, $sql_end_date, $user_id));
	while ($row = $queryR->fetch_row()) {
		if ($row['attended']) {
			$rush_events_count++;
		//} else if ($row['flaked']) {
		//	$rush_events_count--;
		}
	}
	if ($rush_events_count < 4) {
		$rush_events = "<FONT COLOR='RED'>4 Rush Events: $rush_events_count Events <br/></FONT>";
	} else {
		$rush_events = "4 Rush Events: $rush_events_count Events <br/>";
	}
	
	// Retrieve Chapter events
	$chapter_events = "";
	$chapter_events_count = 0;
	$queryC = new Query(sprintf("SELECT %scalendar_event.event_id, title, date, attended, flaked, chair FROM %scalendar_event
		JOIN %scalendar_attend USING (event_id)
		JOIN %scalendar_event_type_custom ON (type_id=type_custom AND type_name IN ('Ritual', 'Activation', 'Chapter Forum'))
		WHERE deleted=FALSE AND date BETWEEN '%s' AND '%s' AND user_id=%d ORDER BY date ASC",
		TABLE_PREFIX, TABLE_PREFIX,
		TABLE_PREFIX,
		TABLE_PREFIX,
		$sql_start_date, $sql_end_date, $user_id));
	while ($row = $queryC->fetch_row()) {
		if ($row['attended']) {
			$chapter_events_count++;
		//} else if ($row['flaked']) {
		//	$chapter_events_count--;
		}
	}
	if ($chapter_events_count < 2) {
		$chapter_events = "<FONT COLOR='RED'>2 Chapter Events: $chapter_events_count Events <br/></FONT>";
	} else {
		$chapter_events = "2 Chapter Events: $chapter_events_count Events <br/>";
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
	if ($chaptermeeting_events_count < 5) {
		$chaptermeeting_events = "<FONT COLOR='RED'>5 Chapter Meetings: $chaptermeeting_events_count Meetings <br/></FONT>";
	} else {
		$chaptermeeting_events = "5 Chapter Meetings: $chaptermeeting_events_count Meetings <br/>";
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
		$leadership = "<FONT COLOR='RED'>5 Leadership Credits: $leadership_count Chairing Credits <br/></FONT>";
	} else {
		$leadership = "5 Leadership Credits: $leadership_count Chairing Credits <br/>";
	}

	//Retrieve Active events
	$active_events = "";
	$active_events_count = 0;
	$queryACT = new Query(sprintf("SELECT %scalendar_event.event_id, title, date, attended, flaked, chair FROM %scalendar_event
		JOIN %scalendar_attend USING (event_id)
		WHERE type_custom=12 AND deleted=FALSE AND date BETWEEN '%s' AND '%s' AND user_id=%d ORDER BY date ASC",
		TABLE_PREFIX, TABLE_PREFIX,
		TABLE_PREFIX,
		$sql_start_date, $sql_end_date, $user_id));
	while ($row = $queryACT->fetch_row()) {
		if ($row['attended']) {
			$active_events_count++;
		} else if ($row['flaked']) {
			$active_events_count--;
		}
	}
	if ($active_events_count < 0) {
		$active_event = "<FONT COLOR='RED'>0 Active Event: $active_events_count Active Event <br/></FONT>";
	} else {
		$active_event = "0 Active Event: $active_events_count Active Event <br/>";
	}
}

$query = new Query(sprintf("SELECT apo_actives.user_id as user_id, firstname, lastname FROM apo_users INNER JOIN apo_actives ON apo_actives.user_id = apo_users.user_id ORDER BY firstname ASC"));
while ($row = $query->fetch_row()) {
	$user_id = $row['user_id'];
	$firstname = $row['firstname'];
	$lastname = $row['lastname'];
	if ($user_id == $_REQUEST['person']) {
		$people = $people . '<option class="" value="' . $user_id . '" selected="selected">' . $firstname . " " . $lastname . '</option>';	
	} else {
		$people = $people . '<option class="" value="' . $user_id . '" >' . $firstname . " " . $lastname . '</option>';
	}
}

$query = new Query(sprintf("SELECT semester FROM apo_semesters ORDER BY semester ASC"));
while ($row = $query->fetch_row()) {
	$semester = $row['semester'];
	if ($semester == $_REQUEST['semester']) {
		$semesters = $semesters . '<option class="" value="' . $semester . '" selected="selected">' . $semester . '</option>';
	} else {
		$semesters = $semesters . '<option class="" value="' . $semester . '" >' . $semester . '</option>';
	}
}

echo <<<DOCHERE_print_gg_maniac_poll_create
	<h2>View Individual Requirements by Semester</h2>
	<div style="margin-top:1em">
		<form id="addEventForm" action="#" method="post" onsubmit="">
			<span style="font-weight:bold;margin-right:1em"> Active Name </span>
			<select id="person" name="person">$people</select>
			</br>
			<span style="font-weight:bold;margin-right:1em"> Semester </span>
			<select id="semester" name="semester">$semesters</select>
    		<input class="btn btn-primary btn-small" type="submit" value="View">
    	</form>
	</div>	
	$ic_events
	$rush_events
	$tabling_events
	$fundraiser_events
	$chapter_events
	$chaptermeeting_events
	$election_events
	$service_events
	$four_cs
	$fellowship_events
	$leadership
	$active_event
	<br/>
DOCHERE_print_gg_maniac_poll_create;

Template::print_body_footer();
Template::print_disclaimer();
?>
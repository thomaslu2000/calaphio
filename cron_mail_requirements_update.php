<?php
//define("DB_HOST",		"mysql.calaphio.com");
//define("DB_USER",		"website");
//define("DB_PASSWORD",		"apogg1939");
//define("DB_DATABASE",		"website");
//define("TABLE_PREFIX",		"apo_");

require("include/includes.php");
require("include/Calendar.class.php");
require("include/Template.class.php");

if (!$g_user->is_logged_in() || !$g_user->permit("admin view requirements")) {
	trigger_error("You must be logged in as an admin to access this feature", E_USER_ERROR);
} else {

//require("/home/calaphio/live.calaphio.com/include/Database.class.php");	

	$query = new Query(sprintf("SELECT apo_users.user_id, firstname, lastname, pledgeclass, email, mail_requirements_update FROM apo_users join apo_actives using (user_id) WHERE apo_users.disabled=False and apo_users.depledged=False order by lastname, firstname;"));

		$start_date = strtotime("2015-1-01");
		$end_date = strtotime("2015-5-30");
		$sql_start_date = date("Y-m-d", $start_date);
		$sql_end_date = date("Y-m-d", $end_date);
		$today = time();
		$counter = 0;
		if ($today > $start_date && $today < $end_date) {
			
			while ($peopleRow = $query->fetch_row()) {
				// Retrieve IC events
				$user_id = $peopleRow['user_id'];
				$to = $peopleRow['email'];
				$mail_requirements_update = $peopleRow['mail_requirements_update'];
				$firstname = $peopleRow['firstname'];
				$lastname = $peopleRow['lastname'];
				$pledgeclass =  $peopleRow['pledgeclass'];
				if ($mail_requirements_update) {
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
						$ic_events = "<FONT COLOR='GREEN'>1 IC Credit: $ic_events_count Credits <br/></FONT>";
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
						$service_events = "<FONT COLOR='GREEN'>20 Service Hours: $service_hours Hours <br/></FONT>";
					}

					$service_total = $service_chapter + $service_campus + $service_community + $service_country;

					if ($service_total < 3) {
						$four_cs = "<FONT COLOR='RED'>3 Cs of Service: $service_total Cs <br/></FONT>";
					} else {
						$four_cs = "<FONT COLOR='GREEN'>3 Cs of Service: $service_total Cs <br/></FONT>";
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
						$fellowship_events = "<FONT COLOR='GREEN'>5 Fellowships: $fellowship_events_count Fellowships <br/></FONT>";
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
						$fundraiser_events = "<FONT COLOR='GREEN'>1 Fundraiser: $fundraiser_events_count Fundraiser <br/></FONT>";
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
						$election_events = "<FONT COLOR='GREEN'>1 Election: $election_events_count Election <br/>";
					}

					// Retrieve Interfam events
					$interfam_events = "";
					$interfam_events_count = 0;
					$queryIF = new Query(sprintf("SELECT %scalendar_event.event_id, title, date, attended, flaked, chair FROM %scalendar_event
						JOIN %scalendar_attend USING (event_id)
						JOIN %scalendar_event_type_custom ON (type_id=type_custom AND type_name='Interfam')
						WHERE deleted=FALSE AND date BETWEEN '%s' AND '%s' AND user_id=%d ORDER BY date ASC",
						TABLE_PREFIX, TABLE_PREFIX,
						TABLE_PREFIX,
						TABLE_PREFIX,
						$sql_start_date, $sql_end_date, $user_id));
					while ($row = $queryIF->fetch_row()) {
						$date = date("M d", strtotime($row['date']));
						$attendance = process_attendance($row['attended'], $row['flaked'], $row['chair']);
						$title_link = event_link($row['event_id'], $row['title']);
						$interfam_events .= "<tr><td class=\"date\" axis=\"date\">$date</td><td axis=\"title\">$title_link</td><td class=\"attendance\" axis=\"attendance\">$attendance</td><td class=\"hours\" axis=\"hours\"></td></tr>\r\n";
						if ($row['attended']) {
							$interfam_events_count++;
						}
					}

					if ($interfam_events_count < 1) {
						$interfam_events = "<FONT COLOR='RED'>1 Active Pledge Bonding: $interfam_events_count event <br/></FONT>";
					} else {
						$interfam_events = "<FONT COLOR='GREEN'>1 Active Pledge Bonding: $interfam_events_count event <br/></FONT>";
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
					if ($tabling_hours < 4) {
						$tabling_events = "<FONT COLOR='RED'>4 Hours of Tabling: $tabling_hours Hours <br/></FONT>";
					} else {
						$tabling_events = "<FONT COLOR='GREEN'>4 Hours of Tabling: $tabling_hours Hours <br/></FONT>";
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
					if ($rush_events_count < 3) {
						$rush_events = "<FONT COLOR='RED'>3 Rush Events: $rush_events_count Events <br/></FONT>";
					} else {
						$rush_events = "<FONT COLOR='GREEN'>3 Rush Events: $rush_events_count Events <br/></FONT>";
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
						$chapter_events = "<FONT COLOR='GREEN'>2 Chapter Events: $chapter_events_count Events <br/></FONT>";
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
						$chaptermeeting_events = "<FONT COLOR='GREEN'>5 Chapter Meetings: $chaptermeeting_events_count Meetings <br/></FONT>";
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
					if ($leadership_count < 5) {
						$leadership = "<FONT COLOR='RED'>5 Leadership Credits: $leadership_count Chairing Credits <br/></FONT>";
					} else {
						$leadership = "<FONT COLOR='GREEN'>5 Leadership Credits: $leadership_count Chairing Credits <br/></FONT>";
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
					if ($active_events_count < 1) {
						$active_event = "<FONT COLOR='RED'>1 Active Event: $active_events_count Active Event <br/></FONT>";
					} else {
						$active_event = "<FONT COLOR='GREEN'>1 Active Event: $active_events_count Active Event <br/></FONT>";
					}

					$headers  = 'MIME-Version: 1.0' . "\r\n";
					$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
					$headers .= 'From: admin-vp@calaphio.com' . "\r\n" .
   								'Reply-To: admin-vp@calaphio.com' . "\r\n";
					$subject = '[APO] Requirements Update For ' . $firstname . ' ' . $lastname;
					$message = '<html>
								<head>
								  <title>
								';
					$message .= 'Requirements Update For ' . $firstname . ' ' . $lastname;
					$message .= '</title>
								</head>
								<body>';
					$message .= '<p><FONT COLOR="gray">This is a progress update for ' . $firstname . ' ' . $lastname . ' on active requirements! 
								<br/>Requirements are due by CM 8 so please make sure to complete them by then if you have not done so!</FONT></p>';
					$message .= $ic_events . $rush_events . $tabling_events . $fundraiser_events . $chapter_events . $chaptermeeting_events . $election_events . $interfam_events . $service_events . $fellowship_events . $leadership;
					$message .= '<p><FONT COLOR="aqua">You are also required to join a committee as part of your requirements! Join one
					 			if you have not done so yet!</FONT></p>';
					$message .= '<br/>
								</body>
								</html>
								';
					mail($to, $subject, $message, $headers);
					$counter= $counter+1;
					echo "$counter) You have sent a successful message to <strong>$firstname $lastname</strong> with the following email: <strong>$to</strong></br>";
				}

			}
			
		}
	}

?>
<?php

require("include/includes.php");
require("include/Calendar.class.php");
require("include/Template.class.php");
Template::print_head(array("admin_superstar.css"));
Template::print_body_header('Home', 'ADMIN');

?>

<script language="javascript" type="text/javascript" src="popup.js"></script>
<?php

if (!$g_user->is_logged_in()) {
	trigger_error("You must be logged in to view this page.");
}


if (!$g_user->is_logged_in() || !$g_user->permit("admin view pledge requirements")) {
	trigger_error("You must be logged in as PComm access this feature", E_USER_ERROR);
} else {
    
    if (isset($_POST['submit']) && isset($_POST["name"])) {
        $start_date = strtotime("-1 year");
        $end_date = strtotime("now");
        $sql_start_date = date("Y-m-d", $start_date);
        $sql_end_date = date("Y-m-d", $end_date);
        $name = $_POST["name"];
        $peopleQuery = new Query("SELECT firstname, lastname, apo_pledges.user_id as user_id FROM apo_pledges JOIN apo_users USING (user_id) WHERE CONCAT(firstname,' ',lastname) like '$name%'");
        while($peopleRow = $peopleQuery->fetch_row()) {
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
            $ic_events = "IC Credit: $ic_events_count Credits <br/>";
            //Retrieve Dynasty events
            $dynasty_events = "";
            $dynasty_events_count = 0;
            $queryICHalf = new Query(sprintf("SELECT %scalendar_event.event_id, title, date, attended, flaked, chair FROM %scalendar_event
                JOIN %scalendar_attend USING (event_id)
                WHERE type_interchapter_half=TRUE AND deleted=FALSE AND date BETWEEN '%s' AND '%s' AND user_id=%d ORDER BY date ASC",
                TABLE_PREFIX, TABLE_PREFIX,
                TABLE_PREFIX,
                $sql_start_date, $sql_end_date, $user_id));
            while ($row = $queryICHalf->fetch_row()) {
                if ($row['attended']) {
                    $dynasty_events_count++;
                //} else if ($row['flaked']) {
                //	$ic_events_count--;
                }
            }
            $dynasty_events = "Dynasty Events: $ic_events_count Events <br/>";

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
            $service_events = "Service Hours: $service_hours Hours <br/>";

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
            $fellowship_events = "Fellowships: $fellowship_events_count Fellowships <br/>";
           

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
            $fundraiser_events = "Fundraisers: $fundraiser_events_count Fundraisers <br/>";
            

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
            $election_events = "Elections: $election_events_count Elections <br/>";

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
            $chaptermeeting_events = "Chapter Meetings: $chaptermeeting_events_count Meetings <br/>";
    
                echo <<<DOCHERE
<b>$firstname $lastname:</b><br/>
$ic_events
$dynasty_events
$tabling_events
$fundraiser_events
$chaptermeeting_events
$election_events
$service_events
$fellowship_events
<br/>
DOCHERE;
        }
    }
    
    echo <<<HEREDOC
    <h2>View Individual Pledge Data</h2>
    <form method="post" action="">
    <p>Pledge's name (can include last name as well): <input type="text" name="name" value="" /> <button type="submit" name="submit">Submit</button>
    </form>
HEREDOC;
    
}
?>
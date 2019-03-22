<?php
require("include/includes.php");
require("include/Calendar.class.php");
require("include/Template.class.php");
if (isset($_POST['start']) and isset($_POST['end'])) {
        $start = date($_POST['start']);
        $end = date($_POST['end']);
    } else {
        $start = date("2018-12-06");
        $end = date("Y-m-d", strtotime("now"));
    }
 if (isset($_POST['start'])) {

        $data_arr = array();
        $query = new Query(sprintf("
        select firstname, lastname, user_id, attendedTime + COALESCE(flakedTime, 0 )as totalTime from (SELECT firstname, lastname, user_id, pledgeclass, sum(hours) as attendedTime FROM (apo_calendar_event JOIN apo_calendar_attend USING (event_id)) Join apo_users USING (user_id)  WHERE (type_service_chapter=TRUE OR type_service_campus=TRUE OR type_service_community=TRUE OR type_service_country=TRUE OR type_fundraiser=TRUE) AND attended = TRUE AND deleted=FALSE AND date BETWEEN '%s' AND '%s' AND disabled = 0 Group By user_id) as attendedHours left join (SELECT user_id, sum(hours) * -1 as flakedTime FROM (apo_calendar_event JOIN apo_calendar_attend USING (event_id)) Join apo_users USING (user_id)  WHERE (type_service_chapter=TRUE OR type_service_campus=TRUE OR type_service_community=TRUE OR type_service_country=TRUE OR type_fundraiser=TRUE) AND flaked = TRUE AND deleted=FALSE AND date BETWEEN '%s' AND '%s' AND disabled = 0 Group By user_id) as flakedHours using (user_id) group by user_id
            ", date("Y-m-d", strtotime($start)), date("Y-m-d", strtotime($end)), date("Y-m-d", strtotime($start)), date("Y-m-d", strtotime($end))));

        while ($row = $query->fetch_row()) {
            if (!isset($data_arr[$row['user_id']])) {
                $data_arr[$row['user_id']] = array();
                $data_arr[$row['user_id']]['firstname'] = $row['firstname'];
                $data_arr[$row['user_id']]['lastname'] = $row['lastname'];
            }
            $data_arr[$row['user_id']]['service'] = $row['totalTime'];
        }


        $query = new Query(sprintf("
        select firstname, lastname, user_id, attendedTime + COALESCE(flakedTime, 0 ) as totalTime
        from (SELECT firstname, lastname, user_id, pledgeclass, count(hours) as attendedTime
        FROM (apo_calendar_event JOIN apo_calendar_attend USING (event_id)) Join apo_users USING (user_id)
        WHERE (type_fellowship=TRUE) AND attended = TRUE AND deleted=FALSE AND date BETWEEN '%s' AND '%s' AND disabled = 0 Group By user_id) as attendedHours
        left join (SELECT user_id, count(hours) * -1 as flakedTime
        FROM (apo_calendar_event JOIN apo_calendar_attend USING (event_id)) Join apo_users USING (user_id)
        WHERE (type_fellowship = TRUE) AND flaked = TRUE AND deleted=FALSE AND date BETWEEN '%s' AND '%s' AND disabled = 0 Group By user_id) as flakedHours
        using (user_id) group by user_id
        ", date("Y-m-d", strtotime($start)), date("Y-m-d", strtotime($end)), date("Y-m-d", strtotime($start)), date("Y-m-d", strtotime($end))));

        while ($row = $query->fetch_row()) {

            if (!isset($data_arr[$row['user_id']])) {
                $data_arr[$row['user_id']] = array();
                $data_arr[$row['user_id']]['firstname'] = $row['firstname'];
                $data_arr[$row['user_id']]['lastname'] = $row['lastname'];
            }
            $data_arr[$row['user_id']]['fellowships'] = $row['totalTime'];
        }

        $query = new Query(sprintf("
                SELECT count(chair) as num_chaired, firstname, lastname, user_id FROM apo_calendar_event
                JOIN apo_calendar_attend USING (event_id)
                JOIN apo_users USING (user_id)
                WHERE (type_interchapter=TRUE OR type_service_chapter=TRUE OR type_service_campus=TRUE OR type_service_community=TRUE OR type_service_country=TRUE OR type_fellowship=TRUE OR type_fundraiser=TRUE) AND deleted=FALSE AND date BETWEEN '%s' AND '%s' AND disabled = 0 AND chair = 1 Group By user_id",
                date("Y-m-d", strtotime($start)), date("Y-m-d", strtotime($end))));

        while ($row = $query->fetch_row()) {
            if (!isset($data_arr[$row['user_id']])) {
                $data_arr[$row['user_id']] = array();
                $data_arr[$row['user_id']]['firstname'] = $row['firstname'];
                $data_arr[$row['user_id']]['lastname'] = $row['lastname'];
            }
            $data_arr[$row['user_id']]['chairing'] = $row['num_chaired'];
        }

        $query = new Query(sprintf("
        select firstname, lastname, user_id, attendedTime + COALESCE(flakedTime, 0 ) as totalTime
        from (SELECT firstname, lastname, user_id, pledgeclass, count(hours) as attendedTime
        FROM (apo_calendar_event JOIN apo_calendar_attend USING (event_id)) Join apo_users USING (user_id)
        WHERE (type_interchapter=TRUE) AND attended = TRUE AND deleted=FALSE AND date BETWEEN '%s' AND '%s' AND disabled = 0 Group By user_id) as attendedHours
        left join (SELECT user_id, count(hours) * -1 as flakedTime
        FROM (apo_calendar_event JOIN apo_calendar_attend USING (event_id)) Join apo_users USING (user_id)
        WHERE (type_interchapter = TRUE) AND flaked = TRUE AND deleted=FALSE AND date BETWEEN '%s' AND '%s' AND disabled = 0 Group By user_id) as flakedHours
        using (user_id) group by user_id
        ", date("Y-m-d", strtotime($start)), date("Y-m-d", strtotime($end)), date("Y-m-d", strtotime($start)), date("Y-m-d", strtotime($end))));

        while ($row = $query->fetch_row()) {

            if (!isset($data_arr[$row['user_id']])) {
                $data_arr[$row['user_id']] = array();
                $data_arr[$row['user_id']]['firstname'] = $row['firstname'];
                $data_arr[$row['user_id']]['lastname'] = $row['lastname'];
            }
            $data_arr[$row['user_id']]['IC'] = $row['totalTime'];
        }
        
        
        //FINISHED LOADING DATA, NOW PUTTING INTO CSV
        
        $info_cats = array('firstname', 'lastname', 'service', 'fellowships', 'chairing', 'IC');        
        ob_end_clean();
        $f = fopen('php://memory', 'w'); 
        $delimiter = ', ';
        fputcsv($f, $info_cats, $delimiter);
        // loop over the input array
        foreach ( $data_arr as $arr ) {
            $temp = array();
            foreach ($info_cats as $type) {
                if (isset($arr[$type])) {
                    $temp[] = $arr[$type];
                } else {
                    $temp[] = 0;
                }
            }
            fputcsv($f, $temp, $delimiter);
        }
        // reset the file pointer to the start of the file
        fseek($f, 0);
        // tell the browser it's going to be a csv file
        header('Content-Type: application/csv');
        // tell the browser we want to save it instead of displaying it
        header('Content-Disposition: attachment; filename="userData.csv";');
        // make php send the generated csv lines to the browser
        fpassthru($f);
        fclose($f);
        exit;

    }

Template::print_head(array("admin_superstar.css"));
Template::print_body_header('Home', 'ADMIN');

?>

<script language="javascript" type="text/javascript" src="popup.js"></script>
<?php

if (!$g_user->is_logged_in()) {
	trigger_error("You must be logged in to view this page.");
} else {
    
    

    if (!$g_user->is_logged_in() || !$g_user->permit("admin view requirements")) {
        trigger_error("You must be logged in as an admin to access this feature", E_USER_ERROR);
    } else {

    echo <<<HEREDOC
    <h2>Data Spreadsheet Generator (CSV)</h2>
    <p style="color: black">To Use CSVs, do one of the following: <br>
    • Upload to Google Drive and Open With Google Sheets <br>
    • Open with Microsoft Excel <br>
    • Find an online csv to excel converter like <a href="https://convertio.co/csv-xlsx/">this one (link) </a>
    
    </p>
    <form style="margin-top: 1em" method="post" action="">
    <p>Start date: <input type="text" name="start" value="$start" /> End date: <input type="text" name="end" value="$end" /> <button type="submit">Submit</button>
    </form>
HEREDOC;
    

   
    
    }
}

?>
<?php
Template::print_body_footer();
Template::print_disclaimer();
?>
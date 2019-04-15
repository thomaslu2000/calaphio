<?php
/**
 * This file is intended as a kluge to keep the chapter running until I have
 * time to create a real dynamic requirements tracker. -Geoffrey Lee
 */
require("include/includes.php");
require("include/Calendar.class.php");
require("include/Template.class.php");
Template::print_head(array("admin_superstar.css"));
Template::print_body_header('Home', 'ADMIN');

?>

<script language="javascript" type="text/javascript" src="popup.js"></script>
<style>
    table, th, td {
  border: 1px solid black;
}
</style>
<?php

if (!$g_user->is_logged_in() || !$g_user->permit("admin view requirements")) {
	trigger_error("You must be logged in as an admin to access this feature", E_USER_ERROR);
} else {
$start = date("Y-m-d", strtotime("now"));
$end = date("Y-m-d", strtotime("now"));
$sem = "now";
$query = new Query("SELECT semester, start, end FROM apo_semesters ORDER BY id DESC LIMIT 1");
if ($row = $query->fetch_row()) {
    $start = date("Y-m-d", strtotime($row['start']));
    $end = date("Y-m-d", strtotime($row['end']));
    $sem = $row['semester'];
}
    
//Points from Service
$service_array = array("ALPHA"=>0, "PHI"=>0, "OMEGA"=>0);
    
    //dynasty is either ALPHA, PHI, or OMEGA
$query = new Query(sprintf("
select *, attendedTime + COALESCE(flakedTime, 0 )as totalTime from (SELECT user_id, dynasty, sum(hours) as attendedTime FROM (apo_calendar_event JOIN apo_calendar_attend USING (event_id)) Join apo_users USING (user_id)  WHERE (type_service_chapter=TRUE OR type_service_campus=TRUE OR type_service_community=TRUE OR type_service_country=TRUE OR type_fundraiser=TRUE) AND attended = TRUE AND deleted=FALSE AND date BETWEEN '%s' AND '%s' AND disabled = 0 Group By user_id) as attendedHours left join (SELECT user_id, sum(hours) * -1 as flakedTime FROM (apo_calendar_event JOIN apo_calendar_attend USING (event_id)) Join apo_users USING (user_id)  WHERE (type_service_chapter=TRUE OR type_service_campus=TRUE OR type_service_community=TRUE OR type_service_country=TRUE OR type_fundraiser=TRUE) AND flaked = TRUE AND deleted=FALSE AND date BETWEEN '%s' AND '%s' AND disabled = 0 Group By user_id) as flakedHours using (user_id) group by user_id order by totalTime DESC
	", $start, $end, $start, $end));
	
while ($row = $query->fetch_row()) {
		$total = $row['totalTime'];
		$total = $total * 4;
		$total = floor($total);
		$total = $total / 4;
        switch (strtoupper($row['dynasty'])) {
            case 'ALPHA':
                $service_array['ALPHA'] += $total;
                break;
            case 'PHI':
                $service_array['PHI'] += $total;
                break;
            case 'OMEGA':
                $service_array['OMEGA'] += $total;
                break;
        }
    }


//Points from Fellowships	
    $fellowship_array = array("ALPHA"=>0, "PHI"=>0, "OMEGA"=>0);
	$query = new Query(sprintf("
	select *, attendedTime + COALESCE(flakedTime, 0 ) as totalTime
	from (SELECT user_id, dynasty, count(hours) as attendedTime
	FROM (apo_calendar_event JOIN apo_calendar_attend USING (event_id)) Join apo_users USING (user_id)
	WHERE (type_fellowship=TRUE) AND attended = TRUE AND deleted=FALSE AND date BETWEEN '%s' AND '%s' AND disabled = 0 Group By user_id) as attendedHours
	left join (SELECT user_id, count(hours) * -1 as flakedTime
	FROM (apo_calendar_event JOIN apo_calendar_attend USING (event_id)) Join apo_users USING (user_id)
	WHERE (type_fellowship = TRUE) AND flaked = TRUE AND deleted=FALSE AND date BETWEEN '%s' AND '%s' AND disabled = 0 Group By user_id) as flakedHours
	using (user_id) group by user_id order by totalTime DESC
	", $start, $end, $start, $end));
	
	while ($row = $query->fetch_row()) {
		$fellowship_array[strtoupper($row['dynasty'])] += $row['totalTime'];
	}

//Points from Attending Dynasties
    $dynasty_attend_array = array("ALPHA"=>0, "PHI"=>0, "OMEGA"=>0);
    $query = new Query(sprintf("
	SELECT user_id, dynasty, count(hours) as totalTime
	FROM (apo_calendar_event JOIN apo_calendar_attend USING (event_id)) Join apo_users USING (user_id)
	WHERE (type_interchapter_half=TRUE) AND attended = TRUE AND deleted=FALSE AND date BETWEEN '%s' AND '%s' AND disabled = 0 Group By user_id
	", $start, $end, $start, $end));
	
	while ($row = $query->fetch_row()) {
		$dynasty_attend_array[strtoupper($row['dynasty'])] += $row['totalTime'];
	}
    
$total_array = array();
foreach ($service_array as $key => $service){
    $total_array[$key] = $service + $fellowship_array[$key] + $dynasty_attend_array[$key];
}
echo <<<HEREDOC
<h2>Dynasty Points for $sem (still needs to include points from competitions)</h2>
<table width="100%">
  <tr>
    <td></td>
    <th scope="col"><b>Alpha</b></th>
    <th scope="col"><b>Phi</b></th>
    <th scope="col"><b>Omega</b></th>
  </tr>
  <tr>
    <th scope="row">Points from Service</th>
    <td>$service_array[ALPHA]</td>
    <td>$service_array[PHI]</td>
    <td>$service_array[OMEGA]</td>
  </tr>
  <tr>
    <th scope="row">Points from Fellowships</th>
    <td>$fellowship_array[ALPHA]</td>
    <td>$fellowship_array[PHI]</td>
    <td>$fellowship_array[OMEGA]</td>
  </tr>
  <tr>
    <th scope="row">Points from Attending Dynasty Events</th>
    <td>$dynasty_attend_array[ALPHA]</td>
    <td>$dynasty_attend_array[PHI]</td>
    <td>$dynasty_attend_array[OMEGA]</td>
  </tr>
  <tr>
    <th scope="row">Total Points</th>
    <td><b>$total_array[ALPHA]</b></td>
    <td><b>$total_array[PHI]</b></td>
    <td><b>$total_array[OMEGA]</b></td>
  </tr>
</table>
HEREDOC;
}

?>
<?php
Template::print_body_footer();
Template::print_disclaimer();
?>
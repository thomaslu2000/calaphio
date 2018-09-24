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
<?php

/**
 *
 */

/**
 *
 */


if ($g_user->data['user_id'] == 1190) {
	$is_tomo = true;
} else {
	$is_tomo = false;
}

if (!$g_user->is_logged_in()) {
	trigger_error("You must be logged in to view this page.");
} else {
$import_http_request = array(
	"start" => date("2018-05-12"),
	"end" => date("Y-m-d", strtotime("now"))
	);
foreach ($import_http_request as $var => $default) {
	if (isset($_REQUEST[$var])) {
		$$var = $_REQUEST[$var];
	} else { 
		$$var = $default;
	}
}

if (!$g_user->is_logged_in() || !$g_user->permit("admin view requirements")) {
	trigger_error("You must be logged in as an admin to access this feature", E_USER_ERROR);
} else {

echo <<<HEREDOC
<h2>Superstars!</h2>
<form style="margin-top: 1em">
<p>Start date: <input type="text" name="start" value="$start" /> End date: <input type="text" name="end" value="$end" /> <button type="submit">Submit</button>
</form>
HEREDOC;

$ranknum = 1;

$ranking = "";

$query = new Query(sprintf("
select *, attendedTime + COALESCE(flakedTime, 0 )as totalTime from (SELECT firstname, lastname, user_id, pledgeclass, sum(hours) as attendedTime FROM (apo_calendar_event JOIN apo_calendar_attend USING (event_id)) Join apo_users USING (user_id)  WHERE (type_service_chapter=TRUE OR type_service_campus=TRUE OR type_service_community=TRUE OR type_service_country=TRUE OR type_fundraiser=TRUE) AND attended = TRUE AND deleted=FALSE AND date BETWEEN '%s' AND '%s' AND disabled = 0 Group By user_id) as attendedHours left join (SELECT user_id, sum(hours) * -1 as flakedTime FROM (apo_calendar_event JOIN apo_calendar_attend USING (event_id)) Join apo_users USING (user_id)  WHERE (type_service_chapter=TRUE OR type_service_campus=TRUE OR type_service_community=TRUE OR type_service_country=TRUE OR type_fundraiser=TRUE) AND flaked = TRUE AND deleted=FALSE AND date BETWEEN '%s' AND '%s' AND disabled = 0 Group By user_id) as flakedHours using (user_id) group by user_id order by totalTime DESC
	", date("Y-m-d", strtotime($start)), date("Y-m-d", strtotime($end)), date("Y-m-d", strtotime($start)), date("Y-m-d", strtotime($end))));
	
while ($row = $query->fetch_row()) {
		$rank = $ranknum . ".";
		$firstname = $row['firstname'];
		$lastname = $row['lastname'];
		$name = $firstname . " " . $lastname . " (" . $row['pledgeclass'] . ")";
		$attended = $row['attendedTime'];
		$attended = $row['attendedTime'];
		$attended = $attended * 4;
		$attended = floor($attended);
		$attended = $attended / 4;
		$flaked = $row['flakedTime'] == NULL ? 0 : $row['flakedTime'];
		$total = $row['totalTime'];
		$total = $total * 4;
		$total = floor($total);
		$total = $total / 4;
		$ranking .= "<tr><td class=\"rank\">$rank</td><td class=\"name\">$name</td><td class=\"attendedTime\">$attended</td><td class=\"flakedTime\">$flaked</td><td class=\"totalTime\">$total</td></tr>\r\n";
		$ranknum++;
		}

		echo <<<DOCHERE

<div style="float:left; width:450px;">
<table class="admin_superstar">
<caption>Service Superstars (Hours)</caption>
<tr><th>Rank</th><th>Name</th><th>Attended</th><th>Flaked</th><th>Total</th></tr>
$ranking
</table>
</div>

DOCHERE;

	$ranknum = 1;

	$ranking = "";
	
	$query = new Query(sprintf("
	select *, attendedTime + COALESCE(flakedTime, 0 ) as totalTime
	from (SELECT firstname, lastname, user_id, pledgeclass, count(hours) as attendedTime
	FROM (apo_calendar_event JOIN apo_calendar_attend USING (event_id)) Join apo_users USING (user_id)
	WHERE (type_fellowship=TRUE) AND attended = TRUE AND deleted=FALSE AND date BETWEEN '%s' AND '%s' AND disabled = 0 Group By user_id) as attendedHours
	left join (SELECT user_id, count(hours) * -1 as flakedTime
	FROM (apo_calendar_event JOIN apo_calendar_attend USING (event_id)) Join apo_users USING (user_id)
	WHERE (type_fellowship = TRUE) AND flaked = TRUE AND deleted=FALSE AND date BETWEEN '%s' AND '%s' AND disabled = 0 Group By user_id) as flakedHours
	using (user_id) group by user_id order by totalTime DESC
	", date("Y-m-d", strtotime($start)), date("Y-m-d", strtotime($end)), date("Y-m-d", strtotime($start)), date("Y-m-d", strtotime($end))));
	
	while ($row = $query->fetch_row()) {

		$rank = $ranknum . ".";
		$firstname = $row['firstname'];
		$lastname = $row['lastname'];
		$name = $firstname . " " . $lastname . " (" . $row['pledgeclass'] . ")";
		$attended = $row['attendedTime'];
		$flaked = $row['flakedTime'] == NULL ? 0 : $row['flakedTime'];
		$total = $row['totalTime'];
		$ranking .= "<tr><td class=\"rank\">$rank</td><td class=\"name\">$name</td><td class=\"attendedTime\">$attended</td><td class=\"flakedTime\">$flaked</td><td class=\"totalTime\">$total</td></tr>\r\n";
		$ranknum++;
	}
	
	echo <<<DOCHERE
	<div style="float:right; width:450px;">
	<table class="admin_superstar">
	<caption>Fellowship Superstars (Events)</caption>
	<tr><th>Rank</th><th>Name</th><th>Attended</th><th>Flaked</th><th>Total</th></tr>
	$ranking
	</table>
	</div>
	
DOCHERE;

     

	
	$ranknum = 1;
	
	$ranking = "";
	
	$query = new Query(sprintf("
	SELECT firstname, lastname, user_id, pledgeclass, sum(miles) as drivenMiles, miles as drivenEvents
	FROM (apo_calendar_event JOIN apo_calendar_attend USING (event_id)) JOIN apo_users USING (user_id)
	WHERE (type_fellowship=TRUE OR type_service_chapter=TRUE OR type_service_campus=TRUE OR type_service_community=TRUE OR type_service_country=TRUE OR
	type_fundraiser=TRUE OR type_alumni=TRUE OR type_interchapter=TRUE OR (type_custom=5 OR type_custom=12 OR type_custom=13 OR type_custom=3))
	AND attended = TRUE AND deleted=FALSE AND date BETWEEN '%s' AND '%s' AND disabled = 0 Group By user_id order by drivenMiles DESC
		", date("Y-m-d", strtotime($start)), date("Y-m-d", strtotime($end))));
	
	while ($row = $query->fetch_row()) {
	
	$rank = $ranknum . ".";
	$firstname = $row['firstname'];
			$lastname = $row['lastname'];
			$name = $firstname . " " . $lastname . " (" . $row['pledgeclass'] . ")";
			$drivenMiles = $row['drivenMiles'];
			$ranking .= "<tr><td class=\"rank\">$rank</td><td class=\"name\">$name</td><td class=\"totalTime\">$drivenMiles</td></tr>\r\n";
			$ranknum++;
	}
	
	echo <<<DOCHERE
	<div style="float:left; clear:both; width:450px;">
		<table class="admin_superstar">
		<caption>Driving Superstars (Events)</caption>
		<tr><th>Rank</th><th>Name</th><th>Total Miles</th></tr>
		$ranking
		</table>
	</div>
		
DOCHERE;

	$ranknum = 1;
	
	$ranking = "";
	
	$query = new Query(sprintf("
			SELECT count(chair) as num_chaired, firstname, lastname, pledgeclass FROM apo_calendar_event
			JOIN apo_calendar_attend USING (event_id)
			JOIN apo_users USING (user_id)
			WHERE (type_interchapter=TRUE OR type_service_chapter=TRUE OR type_service_campus=TRUE OR type_service_community=TRUE OR type_service_country=TRUE OR type_fellowship=TRUE OR type_fundraiser=TRUE) AND deleted=FALSE AND date BETWEEN '%s' AND '%s' AND disabled = 0 AND chair = 1 Group By user_id ORDER BY num_chaired DESC",
			date("Y-m-d", strtotime($start)), date("Y-m-d", strtotime($end))));
	
	while ($row = $query->fetch_row()) {

		$rank = $ranknum . ".";
		$firstname = $row['firstname'];
		$lastname = $row['lastname'];
		$name = $firstname . " " . $lastname . " (" . $row['pledgeclass'] . ")";
		$chaired = $row['num_chaired'];
		$ranking .= "<tr><td class=\"rank\">$rank</td><td class=\"name\">$name</td><td class=\"chaired\">$chaired</td>";
		$ranknum++;
	}
	
	echo <<<DOCHERE
	<div style="float:right; width:450px;">
	<table class="admin_superstar">
	<caption>Chairing Superstars</caption>
	<tr><th>Rank</th><th>Name</th><th>Chaired</th></tr>
	$ranking
	</table>
	</div>
		
DOCHERE;

}
}

?>
<?php
Template::print_body_footer();
Template::print_disclaimer();
?>
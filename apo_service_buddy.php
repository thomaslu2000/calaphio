<?php
require("include/includes.php");
require("include/Template.class.php");
require("include/Calendar.class.php");
Template::print_head(array());
Template::print_body_header('Home', 'ADMIN');

if (!$g_user->is_logged_in() || !$g_user->permit("admin view requirements")) {
	// Require user to have permissions
	trigger_error("You must be logged in as an admin to access this feature", E_USER_ERROR);
} else if (isset($_REQUEST['id']))  {
	$id = $_REQUEST['id'];
	$query = new Query(sprintf("
		SELECT concat(users.lastname, ', ', users.firstname) AS name, concat(buddy.lastname, ', ', buddy.firstname) AS buddy, event.title AS title, event.event_id as event_id, event.type_service_chapter AS service_chapter, event.type_service_community AS service_community, event.type_service_country AS service_country, event.type_service_campus AS service_campus, event.type_fundraiser AS fundraiser, user_attend.hours AS hours, event.* FROM apo_calendar_attend AS user_attend
		JOIN apo_calendar_event AS event ON (user_attend.event_id = event.event_id AND (event.type_service_campus = TRUE OR event.type_service_chapter = TRUE OR event.type_service_community = TRUE OR event.type_service_country = TRUE OR event.type_fundraiser = TRUE OR event.type_fellowship = TRUE OR event.type_interchapter = TRUE))
		JOIN apo_service_buddy AS user_buddy ON (user_attend.user_id = user_buddy.user_id AND event.date >= user_buddy.begin AND event.date <= user_buddy.end) 
		JOIN apo_calendar_attend AS buddy_attend ON (user_buddy.buddy_id = buddy_attend.user_id AND user_attend.event_id = buddy_attend.event_id) 
		JOIN apo_users AS users ON (user_attend.user_id = users.user_id) 
		JOIN apo_users AS buddy ON (user_buddy.buddy_id = buddy.user_id) 
		WHERE user_attend.attended = TRUE AND user_attend.flaked = FALSE AND buddy_attend.attended = TRUE AND buddy_attend.flaked = FALSE AND user_buddy.id=%d ORDER BY users.lastname, users.firstname;", $id));
	$result = "";
	while ($row = $query->fetch_row()) {
		$title = Calendar::format_event_title($row);
		if ($row['service_campus'] || $row['service_chapter'] || $row['service_community'] || $row['service_country'] || $row['fundraiser']) {
			$result .= "<tr><td>$row[name]</td><td>$row[hours]</td><td>$title</td><td>$row[buddy]</td></tr>\r\n";
		} else {
			$result .= "<tr><td>$row[name]</td><td>1</td><td>$title</td><td>$row[buddy]</td></tr>\r\n";
		}
	}
	
	echo <<<HEREDOC
<h1>View Service Buddy Hours</h1>
<table style="width: 100%">
<caption></caption>
<tr><th>Name</th><th>Hours</th><th>Event</th><th>Buddy</th></tr>
$result
</table>

HEREDOC;
} else {
	trigger_error("Not enough arguments in URL", E_USER_ERROR);
}
Template::print_body_footer();
Template::print_disclaimer();
?>
<?php
require("include/includes.php");
require("include/Template.class.php");
require("include/Calendar.class.php");
Template::print_head(array());
Template::print_body_header('Home', 'ADMIN');

if (!$g_user->is_logged_in() || !$g_user->permit("admin view requirements")) {
	// Require user to have permissions
	trigger_error("You must be logged in as an admin to access this feature", E_USER_ERROR);
} else {
	$query = new Query("
		SELECT concat(users.firstname, ' ', users.lastname, ' & ', buddy.firstname, ' ', buddy.lastname) AS pair, 
		sum(CASE 
			WHEN event.type_fellowship = TRUE THEN 1
			END) AS hours
		, user_buddy.id AS id, user_buddy.begin AS begin, user_buddy.end AS end FROM apo_calendar_attend AS user_attend
		JOIN apo_calendar_event AS event ON (user_attend.event_id = event.event_id AND event.type_fellowship = TRUE)
		JOIN apo_fellowship_buddy AS user_buddy ON (user_attend.user_id = user_buddy.user_id AND event.date >= user_buddy.begin AND event.date <= user_buddy.end) 
		JOIN apo_calendar_attend AS buddy_attend ON (user_buddy.buddy_id = buddy_attend.user_id AND user_attend.event_id = buddy_attend.event_id) 
		JOIN apo_users AS users ON (user_attend.user_id = users.user_id) 
		JOIN apo_users AS buddy ON (user_buddy.buddy_id = buddy.user_id) 
		WHERE user_attend.attended = TRUE AND user_attend.flaked = FALSE AND buddy_attend.attended = TRUE AND buddy_attend.flaked = FALSE AND user_buddy.canceled = FALSE GROUP BY user_buddy.id ORDER BY hours DESC;
	");
	$result = "";
	$count = 1;
	while ($row = $query->fetch_row()) {
		$title = Calendar::format_event_title($row);
		$buddy_link = "apo_fellowship_buddy.php" . "?id=" . $row['id']; 
		$result .= "<tr><td>$count.</td><td><a href=$buddy_link>$row[pair]</a></td><td>$row[begin]</td><td>$row[end]</td><td>$row[hours]</td></tr>\r\n";
		$count = $count + 1;
	}
	
	echo <<<HEREDOC
<h1>View Fellowship Buddy Hours</h1>
<table style="width: 100%">
<caption></caption>
<tr><th><strong>Place</strong></th><th><strong>Pair</strong></th><th><strong>Begin</strong><th><strong>End</strong><th><strong>Hours</strong></th></tr>
$result
</table>

HEREDOC;
}
Template::print_body_footer();
Template::print_disclaimer();
?>
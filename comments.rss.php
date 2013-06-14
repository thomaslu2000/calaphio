<?php
require_once "include/includes.php";
header("Content-type: application/rss+xml; charset=UTF-8");

$last_build_date = "";
$items = "";
$user_id = isset($_GET['id']) && is_numeric($_GET['id']) ? $_GET['id'] : 0;
$query = new Query(sprintf("SELECT apo_calendar_comment.*, apo_calendar_event.title, apo_calendar_event.type_scouting, apo_calendar_event.type_interchapter, apo_calendar_event.type_rush, apo_calendar_event.type_fundraiser, apo_calendar_event.type_service_campus, apo_calendar_event.type_service_chapter, apo_calendar_event.type_service_community, apo_calendar_event.type_service_country, apo_calendar_event.type_fellowship, email, firstname, lastname, pledgeclass FROM apo_calendar_comment JOIN apo_calendar_attend USING (event_id) JOIN apo_calendar_event USING (event_id) JOIN apo_users ON (apo_calendar_comment.user_id = apo_users.user_id) WHERE apo_calendar_attend.user_id = %d ORDER BY timestamp DESC LIMIT 30", $user_id));
while ($row = $query->fetch_row())
{
	if ($row['type_scouting']) {
		$prefix = '[BSA] ';
	} else if ($row['type_interchapter']) {
		$prefix = '[IC] ';
	} else if ($row['type_rush']) {
		$prefix = '[RUSH] ';
	} else if ($row['type_fundraiser']) {
		$prefix = '[FUN] ';
	} else if ($row['type_service_campus'] || $row['type_service_chapter'] || $row['type_service_community'] || $row['type_service_country']) {
		$prefix = '[SER] ';
	} else if ($row['type_custom'] == 12) {
		$prefix = '[ACT] ';
	} else if ($row['type_alumni']) {
		$prefix = '[ALM] ';
	} else if ($row['type_fellowship']) {
		$prefix = '[FEL] ';
	} else if ($row['type_custom'] == 1 || $row['type_custom'] == 3 || $row['type_custom'] == 4 || $row['type_custom'] == 5 || $row['type_custom'] == 6 || $row['type_custom'] == 7 || $row['type_custom'] == 11 || $row['type_custom'] == 13 || $row['type_pledge_meeting']) {
		$prefix = '[PLE] ';
	} else {
		$prefix = '';
	}
	
	$last_build_date = date("D, d M Y H:i:s T", strtotime($row['timestamp']));
	$title = str_replace("<br />", "", $row['body']);
	$title = str_replace(array("<", ">"), array("&lt;", "&gt;"), "$prefix$row[title] - $title");
	$title = str_replace(array("’", "–", "—", "“", "”"), array("'", "-", "-", "\"", "\""), $title);
	$message = str_replace(array("<", ">"), array("&lt;", "&gt;"), "<h3>$row[title]</h3>" . $row['body']);
	$message = str_replace(array("’", "–", "—", "“", "”"), array("'", "-", "-", "\"", "\""), $message);
	$items .= <<<HEREDOC
		<item>
			<title>$title</title>
			<link>http://live.calaphio.com/event.php?id=$row[event_id]</link>
			<description>$row[firstname] $row[lastname] ($row[pledgeclass]): $message</description>
			<author>$row[firstname] $row[lastname] ($row[pledgeclass])</author>
			<category>$row[title]</category>
			<pubDate>$last_build_date</pubDate>
			<guid>$row[comment_id]</guid>
		</item>

HEREDOC;
}
echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
?>
<rss version="2.0">
	<channel>
		<title>Calaphio Signed-Up Event Comments</title>
		<link>http://www.calaphio.com</link>
		<description>Gamma Gamma user comments for your signed-up events.</description>
		<language>en-us</language>
		<lastBuildDate><?php echo $last_build_date; ?></lastBuildDate>
		<docs>http://blogs.law.harvard.edu/tech/rss</docs>
		<ttl>30</ttl>
<?php echo $items; ?>
	</channel>
</rss>
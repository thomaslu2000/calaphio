<?php
require_once "include/includes.php";
header("Content-type: application/rss+xml; charset=UTF-8");

$last_build_date = "";
$items = "";
$query = new Query("SELECT apo_calendar_event.* FROM apo_calendar_event WHERE deleted=FALSE ORDER BY event_id DESC LIMIT 30");
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
	
	if ($row['time_allday']) {
		$time = "All Day";
	} else if ($row['time_start'] && $row['time_end']) {
		$time = sprintf("%s to %s", date("g:ia", strtotime($row['time_start'])), date("g:ia", strtotime($row['time_end'])));
	} else if ($row['time_start']) {
		$time = date("g:ia", strtotime($row['time_start']));
	} else {
		$time = "TBA";
	}
		
	$last_build_date = date("D, d M Y H:i:s T", strtotime($row['timestamp']));
	$title = $prefix . $row['title'];
	$date = date("l, M d", strtotime($row['date']));
	$short_date = date("n/j", strtotime($row['date']));
	$location = $row['location'] ? " @ " . $row['location'] : "";
	$message = <<<HEREDOC

				<h3>$title</h3>
				<strong>Date:</strong> $date<br />
				<strong>Time:</strong> $time$location<br /><br />
				$row[description]
			
HEREDOC;
	$message = str_replace(array("<", ">"), array("&lt;", "&gt;"), $message);
	$message = str_replace(array("’", "–", "—", "“", "”"), array("'", "-", "-", "\"", "\""), $message);
	$items .= <<<HEREDOC
		<item>
			<title>$title - $short_date</title>
			<link>http://live.calaphio.com/event.php?id=$row[event_id]</link>
			<description>$message</description>
			<pubDate>$last_build_date</pubDate>
			<guid>$row[event_id]</guid>
		</item>

HEREDOC;
}
echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
?>
<rss version="2.0">
	<channel>
		<title>Calaphio Events</title>
		<link>http://www.calaphio.com</link>
		<description>Gamma Gamma events.</description>
		<language>en-us</language>
		<lastBuildDate><?php echo $last_build_date; ?></lastBuildDate>
		<docs>http://blogs.law.harvard.edu/tech/rss</docs>
		<ttl>60</ttl>
<?php echo $items; ?>
	</channel>
</rss>
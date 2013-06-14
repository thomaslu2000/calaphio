<?php
require_once "include/includes.php";
header("Content-type: application/rss+xml; charset=UTF-8");

$last_build_date = "";
$items = "";
$query = new Query("SELECT apo_shoutbox.*, firstname, lastname, pledgeclass FROM apo_shoutbox JOIN apo_users ON (apo_shoutbox.user_id = apo_users.user_id) ORDER BY post_time DESC LIMIT 30");
while ($row = $query->fetch_row())
{
	$last_build_date = date("D, d M Y H:i:s T", strtotime($row['post_time']));
	$title = str_replace("<br />", "", $row['message']);
	$title = str_replace(array("’", "–", "—", "“", "”"), array("'", "-", "-", "\"", "\""), $title);
	$message = str_replace(array("<", ">"), array("&lt;", "&gt;"), $row['message']);
	$message = str_replace(array("’", "–", "—", "“", "”"), array("'", "-", "-", "\"", "\""), $message);
	$items .= <<<HEREDOC
		<item>
			<title>$title</title>
			<description>$row[firstname] $row[lastname] ($row[pledgeclass]): $message</description>
			<author>$row[firstname] $row[lastname] ($row[pledgeclass])</author>
			<pubDate>$last_build_date</pubDate>
			<guid>$row[shout_id]</guid>
		</item>

HEREDOC;
}
echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
?>
<rss version="2.0">
	<channel>
		<title>Calaphio Shoutbox</title>
		<link>http://www.calaphio.com</link>
		<description>Gamma Gamma chapter website shoutbox.</description>
		<language>en-us</language>
		<lastBuildDate><?php echo $last_build_date; ?></lastBuildDate>
		<docs>http://blogs.law.harvard.edu/tech/rss</docs>
		<ttl>30</ttl>
<?php echo $items; ?>
	</channel>
</rss>
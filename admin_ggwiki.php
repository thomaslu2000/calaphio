<?php
/**
 * This file is intended as a kluge to keep the chapter running until I have
 * time to create a real dynamic requirements tracker. -Geoffrey Lee
 */
require("include/includes.php");
require("include/Calendar.class.php");
require("include/Template.class.php");
Template::print_head(array());
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
$import_http_request = array("num" => 10);
foreach ($import_http_request as $var => $default) {
	if (isset($_REQUEST[$var])) {
		$$var = $_REQUEST[$var];
	} else {
		$$var = $default;
	}
}

if (!$g_user->is_logged_in() || !$g_user->permit("wiki editing")) {
	trigger_error("You must be logged in as an admin to access this feature", E_USER_ERROR);
} else {

echo <<<HEREDOC
<h2>GG Wiki Pages</h2>
<form style="margin-top: 1em">
<p>How many wiki pages: <input type="text" name="num" value="$num" />
<button type="submit">Submit</button>
</form>
HEREDOC;

$count = 1;

$wikiLinks = "";

$query = new Query(sprintf("SELECT * FROM apo_wiki_pages order by timestamp DESC LIMIT %d", $num)); 
	
while ($row = $query->fetch_row()) {
		$page_id = $row['page_id'];
		$title = $row['page_name'];
		$creator = $row['creator_user_id'];
		$timestamp = date("Y-m-d", strtotime($row['timestamp']));
		$queryPerson = new Query(sprintf("SELECT * FROM apo_users WHERE user_id='%d' LIMIT 1", $creator)); 
		$rowPerson = $queryPerson->fetch_row();
		$name = $rowPerson['firstname'] . " " . $rowPerson['lastname'] . " (" . $rowPerson['pledgeclass']  . ")";
		$wikiLinks .= "$count: <a href=\"ggwiki.php?page_id=$page_id#home\"> $title </a> - Created by $name on $timestamp <br />";
		$count++;
		}

echo <<<DOCHERE
<br />
<caption>Most recently created $num Pages</caption><br />
<br />
$wikiLinks

DOCHERE;

	}
}

?>
<?php
Template::print_body_footer();
Template::print_disclaimer();
?>
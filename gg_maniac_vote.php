<?php
require("include/includes.php");
require("include/Template.class.php");
require("include/Calendar.class.php");
Template::print_head(array());
Template::print_body_header('Home', '');

if (!$g_user->is_logged_in()) {
	trigger_error("You must be logged in to access this feature", E_USER_ERROR);
	return;
}

$query = new Query(sprintf("SELECT user_id FROM gg_maniac_votes WHERE poll_id=%s", $_REQUEST['id']));
while ($row = $query->fetch_row()) {
	if ($row['user_id'] ==  $g_user->data['user_id']) {
		trigger_error("Cannot Vote in Poll Multiple Times", E_USER_ERROR);
		return;
	}
}

$query = new Query(sprintf("SELECT poll_name, expired, cancelled FROM gg_maniac_polls WHERE id=%s", $_REQUEST['id']));
$row = $query->fetch_row();
$poll_name = $row['poll_name'];
if ($row['expired'] || $row['cancelled']) {
		trigger_error("Cannot Vote in Expired/Cancelled Poll", E_USER_ERROR);
		return;
}

if (isset($_REQUEST['active_name']) && isset($_REQUEST['reason'])) {
	if ($_REQUEST['active_name'] == "" || $_REQUEST['reason'] == "") {
		trigger_error("You must fill out all the fields", E_USER_ERROR);
	} else {
	    $query = new Query("start transaction");
		$query = new Query(sprintf("INSERT INTO gg_maniac_votes SET name='%s', reason='%s', poll_id=%s, user_id='%d'", mysql_real_escape_string($_REQUEST['active_name']), mysql_real_escape_string($_REQUEST['reason']), $_REQUEST['id'], $g_user->data['user_id']));
		$query = new Query("commit");
		header( 'Location: http://live.calaphio.com' );
	}
}

echo <<<DOCHERE
	<h2>$poll_name</h2>
	<p style="color: #000;">Remember you cannot vote for <a href="gg_maniacs.php">Past Maniacs!</a></p>
	<div style="margin-top:1em">
		<form id="GGManiacVote" action="#" method="post" onsubmit="">
			<span style="font-weight:bold;margin-right:1em"> Active Name </span>
			<input type="text" name="active_name">
			</br>
			<span style="font-weight:bold;margin-top:1em;display:block"> Why Did You Vote For This Active? </span>
    		<textarea  style="display:block;margin-top:1em" id="ggManiacVoteReason" name="reason" rows="4" cols="60"></textarea>
    		<input class="btn btn-primary btn-small" style="margin-top:1em" type="submit" value="Submit Vote">
    	</form>
	</div>	
DOCHERE;

Template::print_body_footer();
Template::print_disclaimer();
?>
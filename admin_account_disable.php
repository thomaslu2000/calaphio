<?php
require("include/includes.php");
require("include/Template.class.php");
Template::print_head(array());
Template::print_body_header('Home', 'ADMIN');
if (!$g_user->is_logged_in() || !$g_user->permit("admin account disable")) {
	trigger_error("You must be logged in as an admin to access this feature", E_USER_ERROR);
} else {
	if (isset($_POST['submit'])) {
		$query = new Query("SELECT max(user_id) AS max_user_id FROM apo_users");
		if ($row = $query->fetch_row()) {
			$max_user_id = $row['max_user_id'];
			$disabled_users_array = array();
			$enabled_users_array = array();
			for ($i = 1; $i <= $max_user_id; $i++) {
				if (isset($_POST["user_$i"]) && $_POST["user_$i"]) {
					$disabled_users_array[] = $i;
				} else {
					$enabled_users_array[] = $i;
				}
			}
			if ($enabled_users_array)
				$query = new Query(sprintf("UPDATE apo_users SET disabled=FALSE WHERE user_id IN (%s)", implode(", ", $enabled_users_array)));
			if ($disabled_users_array)
				$query = new Query(sprintf("UPDATE apo_users SET disabled=TRUE WHERE user_id IN (%s)", implode(", ", $disabled_users_array)));
		}
		
		$depledged_users_array = array();
		$non_depledged_users_array = array();
		foreach ($_POST['depledged'] as $user_id => $depledged)
		{
			if ($depledged)
			{
				$depledged_users_array[] = $user_id;
			}
			else
			{
				$non_depledged_users_array[] = $user_id;
			}
		}
		if ($depledged_users_array)
		{
			$query = new Query(sprintf("UPDATE apo_users SET depledged=TRUE WHERE user_id IN (%s)", implode(", ", $depledged_users_array)));
		}
		if ($non_depledged_users_array)
		{
			$query = new Query(sprintf("UPDATE apo_users SET depledged=FALSE WHERE user_id IN (%s)", implode(", ", $non_depledged_users_array)));
		}
	}
	$actives = "";
	$query = new Query("SELECT user_id, email, firstname, lastname, pledgeclass, disabled, depledged FROM apo_users WHERE user_id NOT IN (SELECT user_id FROM apo_pledges) ORDER BY lastname, firstname");
	while ($row = $query->fetch_row()) {
		$checked = $row['disabled'] ? "checked=\"checked\" " : "";
		$depledged_checked = $row['depledged'] ? "checked=\"checked\" " : "";
		$actives .= <<<HEREDOC
		<tr><td axis="name" style="padding: 0px 5px;"><a href="mailto:$row[email]">$row[lastname], $row[firstname]</a></td><td axis="pledgeclass" style="padding: 0px 5px;">$row[pledgeclass]</td><td axis="disabled" style="padding-left: 1em;"><input type="checkbox" name="user_$row[user_id]" $checked/></td><td axis="depledged" style="padding-left: 1em;"><input type="checkbox" name="depledged[$row[user_id]]" $depledged_checked/></td></tr>

HEREDOC;
	}
	$pledges = "";
	$query = new Query("SELECT user_id, email, firstname, lastname, pledgeclass, disabled, depledged FROM apo_users JOIN apo_pledges USING (user_id) ORDER BY lastname, firstname");
	while ($row = $query->fetch_row()) {
		$checked = $row['disabled'] ? "checked=\"checked\" " : "";
		$depledged_checked = $row['depledged'] ? "checked=\"checked\" " : "";
		$pledges .= <<<HEREDOC
		<tr><td axis="name" style="padding: 0px 5px;"><a href="mailto:$row[email]">$row[lastname], $row[firstname]</a></td><td axis="pledgeclass" style="padding: 0px 5px;">$row[pledgeclass]</td><td axis="disabled" style="padding-left: 1em;"><input type="checkbox" name="user_$row[user_id]" $checked/></td><td axis="depledged" style="padding-left: 1em;"><input type="checkbox" name="depledged[$row[user_id]]" $depledged_checked/></td></tr>

HEREDOC;
	}
	echo <<<HEREDOC

<h1>Account Access Control</h1>
<p style="margin: 1em 0px;">
<strong>Disabled</strong> means that the person may not log-in to the website.<br />
<strong>Depledged</strong> means that the person will not appear on the Roster page.
</p>
<p style="margin: 1em 0px;">
Don't forget to click "Submit" at the bottom of the page to save your changes.
</p>
<form method="post" action="">
<table style="margin-bottom: 1.5em;">
<caption></caption>
<tr><th axis="name" style="font-weight: bold;">Name</th><th axis="pledgeclass" style="font-weight: bold;">Pledgeclass</th><th axis="disabled" style="font-weight: bold; padding-left: 1em;">Disabled</th><th axis="depledged" style="font-weight: bold; padding-left: 1em;">Depledged</th></tr>
$pledges
<tr><th axis="name" style="font-weight: bold; padding-top: 1em;">Name</th><th axis="pledgeclass" style="font-weight: bold; padding-top: 1em;">Pledgeclass</th><th axis="disabled" style="font-weight: bold; padding-left: 1em; padding-top: 1em;">Disabled</th><th axis="depledged" style="font-weight: bold; padding-left: 1em; padding-top: 1em;">Depledged</th></tr>
$actives
</table>
<button type="submit" name="submit">Submit</button>
</form>


HEREDOC;
}
Template::print_body_footer();
Template::print_disclaimer();
?>
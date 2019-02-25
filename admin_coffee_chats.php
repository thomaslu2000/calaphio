<?php
require("include/includes.php");
require("include/Template.class.php");
Template::print_head(array());
Template::print_body_header('Home', 'ADMIN');
if (!$g_user->is_logged_in() || !$g_user->permit("admin view requirements")) {
	trigger_error("You must be logged in as an admin to access this feature", E_USER_ERROR);
} else {
	if (isset($_POST['submit'])) {
        $query = new Query("SELECT user_id FROM apo_users JOIN apo_actives USING (user_id) ORDER BY firstname, lastname");
        $values = array();
        $sem = $_POST['semester']; $cm = $_POST['cm'];
        while ($row = $query->fetch_row()) {
            $id = $row['user_id'];
            $attended = $_POST["user_$row[user_id]"] ? 1 : 0;
            $values[] = "($id, $sem, $cm, $attended)";
        }
        $values = implode($values, ", ");
        $query = new Query("INSERT INTO apo_coffee_chats (user_id, semester, cm, attended) VALUES $values ON DUPLICATE KEY UPDATE attended=VALUES(attended)");
        echo "<h1 style='color: green'> Successfully Updated! </h1>";
	}
	$actives = "";
	$query = new Query("SELECT user_id, firstname, lastname, pledgeclass FROM apo_users JOIN apo_actives USING (user_id) ORDER BY firstname, lastname");
	while ($row = $query->fetch_row()) {
		$actives .= <<<HEREDOC
		<tr><td axis="name" style="padding: 0px 5px;">$row[firstname] $row[lastname]</td><td axis="pledgeclass" style="padding: 0px 5px;">$row[pledgeclass]</td><td axis="attended" style="padding-left: 1em;"><input type="checkbox" name="user_$row[user_id]" checked='checked'/></td></tr>

HEREDOC;
	}
    $semesters = "<select name='semester'>";
    $query = new Query("SELECT semester, id FROM apo_semesters WHERE id > 19 ORDER BY id DESC");
    while ($row = $query->fetch_row()){
        $id = $row['id']; $sem = $row['semester'];
        $semesters .= "<option value='$id'>$sem</option>";
    }
    $semesters .= "</select>";
    
    $cm = "<select name='cm'>";
    for ($i = 2; $i < 9; $i++) {
        $cm .= "<option value='$i'>CM $i</option>";
    }
    $cm .= "</select>";
    
	echo <<<HEREDOC

<h1>Coffee Chat Control</h1>
<p style="margin: 1em 0px;">
Don't forget to click "Submit" at the bottom of the page to save your changes.
</p>
<form method="post" action="">
$semesters
$cm
<table style="margin-bottom: 1.5em;">
<caption></caption>
<tr><th axis="name" style="font-weight: bold; padding-top: 1em;">Name</th><th axis="pledgeclass" style="font-weight: bold; padding-top: 1em;">Pledgeclass</th><th axis="attended" style="font-weight: bold; padding-left: 1em; padding-top: 1em;">Attended Chat?</th></tr>
$actives
</table>
<button type="submit" name="submit">Submit</button>
</form>


HEREDOC;
}
Template::print_body_footer();
Template::print_disclaimer();
?>
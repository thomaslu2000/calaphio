<?php
require("include/includes.php");
require("include/Template.class.php");
Template::print_head(array());
Template::print_body_header('Home', '');
if (!$g_user->is_logged_in() || !$g_user->permit("admin change passphrase")) {
	trigger_error("You must be logged in as an admin to access this feature", E_USER_ERROR);
} else if (isset($_POST['email']) && isset($_POST['passphrase']) && isset($_POST['repeat_passphrase'])) {
	$email = $_POST['email'];
	$passphrase = $_POST['passphrase'];
	if ($passphrase != $_POST['repeat_passphrase']) {
		trigger_error("Please check that you entered the passphrase correctly both times.", E_USER_ERROR);
	} else {
		$query = new Query(sprintf("SELECT user_id FROM %susers WHERE email='%s' LIMIT 1", TABLE_PREFIX, Query::escape_string($email)));
		if ($row = $query->fetch_row()) {
			$user_id = $row['user_id'];
			$query = new Query(sprintf("UPDATE %susers SET passphrase=sha1(concat(salt, '%s')) WHERE user_id=%d LIMIT 1", TABLE_PREFIX, Query::escape_string($passphrase), $user_id));
			if ($query->affected_rows() > 0) {
?>

<h1>Reset User Passphrase</h1>
<div class="successMessage">
Passphrase successfully changed.
</div>

<?php
			} else {
				trigger_error("It looks like your new passphrase is the same as the old one.", E_USER_NOTICE);
			}
		} else {
			trigger_error("Please check that your e-mail address is correct.", E_USER_ERROR);
		}
	}
} else {
?>

<h1>Reset User Passphrase</h1>
<form method="post" action="">
<table>
<caption></caption>
<tr><td axis="name">E-mail: </td><td axis="value"><input type="text" name="email" /><td></tr>
<tr><td axis="name">Passphrase: </td><td axis="value"><input type="password" name="passphrase" /></td></tr>
<tr><td axis="name">Repeat Passphrase: </td><td axis="value"><input type="password" name="repeat_passphrase" /></td></tr>
</table>
<button type="submit">Submit</button>
</form>

<?php
}
Template::print_body_footer();
Template::print_disclaimer();
?>
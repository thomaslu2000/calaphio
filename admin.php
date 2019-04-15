<?php
require("include/includes.php");
require("include/Template.class.php");
Template::print_head(array());
Template::print_body_header('Home', 'ADMIN');

$available_permissions = array(
    'Service' => 'title',
	'<a href="admin_superstar.php">Superstars</a>' => 'admin view requirements',
	'<a href="admin_view_total_hours.php">View Total Service Hours</a>' => 'admin view requirements',
	'<a href="admin_view_service_projects.php">View Service Report</a>' => 'admin view requirements',
	'<a href="admin_view_service_buddy_hours.php">View Service Buddy Hours</a>' => 'admin view requirements',
	'<a href="admin_service_buddy_create.php">Create Service Buddies</a>' => 'admin view requirements',
    'Admin' => 'title',
    '<a href="admin_user_settings.php">Change Admin Settings</a>' => 'admin view requirements',
    '<a href="admin_undisable_user.php">Disable/Undisable a User</a>' => 'admin account disable',
	'<a href="admin_account_disable.php">Account Access Control</a>' => 'admin account disable',
	'<a href="admin_change_passphrase.php">Reset User Passphrase</a>' => 'admin change passphrase',
	'<a href="admin_admin_power.php">Admin Power Control (For Admin VP)</a>' => 'admin view requirements',
	'<a href="admin_contact.php">Mailing List (Contact Tab) </a>' => 'admin view requirements',
	'<a href="admin_actives.php">Active List Update </a>' => 'admin view requirements',
    'Membership' => 'title',
	'<a href="admin_add_leadership_credit.php">Add Leadership Credits</a>' => 'admin view requirements',
    '<a href="admin_coffee_chats.php">Add Coffee Chat Credit</a>' => 'admin view requirements',
	'<a href="admin_view_requirements.php">View Active/Pledge Requirements</a>' => 'admin view requirements',
	'<a href="admin_view_individual_requirements.php">View Individual Requirements by Semester</a>' => 'admin view requirements',
	'<a href="admin_view_dynasty_points.php"> Dynasty Points </a>' => 'admin view requirements',
	'<a href="admin_mvp.php">MVP Power</a>' => 'admin view requirements',
    'Pledges' => 'title',
	'<a href="batch_load.php">Add Pledges</a>' => 'admin add users',
    '<a href="admin_view_individual_pledge.php">View Individual Pledge Progress</a>' => 'admin view pledge requirements',
	'<a href="admin_view_pledge_requirements.php">View Pledge Requirements</a>' => 'admin view pledge requirements',
	'<a href="admin_pcomm.php">PComm Power</a>' => 'admin view pledge requirements',
	'<a href="admin_pledge_superstar.php">Pledge Superstars</a>' => 'admin view pledge requirements',
    'Historian' => 'title',
	'<a href="admin_GG_maniac.php">GG Maniac Control</a>' => 'admin view requirements',
	'<a href="admin_ggwiki.php">GG Wiki Check</a>' => 'wiki editing',
    'Fellowship' => 'title',
	'<a href="admin_view_fellowship_buddy_hours.php">View Fellowship Buddy Hours (UNDER CONSTRUCTION WEBMASTERS ONLY)</a>' => 'admin view requirements',
	'<a href="admin_fellowship_buddy_create.php">Create Fellowship Buddies</a>' => 'admin view requirements',
    );
$is_admin = false;
foreach ($available_permissions as $permission) {
	if ($g_user->permit($permission)) {
		$is_admin = true;
		break;
	}
}
if (!$g_user->is_logged_in() || !$is_admin) {
	trigger_error("You must be logged in as an admin to access this feature", E_USER_ERROR);
} else {
?>
<h1>Web Admin Tools</h1>
<br />
<ul style="list-style: disc inside">
<?php
foreach ($available_permissions as $link => $permission) {
    if ($permission === 'title' and $g_user->permit("admin view requirements")) {
        echo '<br><hr><br><h1>'.$link.'</h1><br>';
    }
    else if ($g_user->permit($permission)) {
		echo "<li>$link</li>\r\n";
	}
}
?>
</ul>
<?php
}
Template::print_body_footer();
Template::print_disclaimer();
?>
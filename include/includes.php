<?php
require('downtime.php');
/*
// This "feature" is being abused, so it is now disabled. -geofflee
if (isset($_REQUEST['sid'])) {
	session_id(strip_tags($_REQUEST['sid'])); // JavaScript popups in IE tend to block cookies, so need to explicitly set session id
}
*/
header("Cache-control: private"); // Hack to fix IE sessions
ob_start();
require('/home/calaphio/configs/members.calaphio.com/Settings.php');
//require('/home/calaphio/settings/Settings.php');
if (SESSION_DEBUG) {
	print_r($_SESSION);
	echo "<br />";
}
require('Error.class.php');
require('Database.class.php');
require('User.class.php');
require('Gallery.class.php');
require('init.php');
?>
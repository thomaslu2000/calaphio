<?php
require("include/includes.php");
require("include/Calendar.class.php");
require("include/Template.class.php");
Template::print_head(array());
Template::print_body_header('Brothers', 'TESTBANK');
if (!$g_user->is_logged_in()) {
	trigger_error("You must be logged in to view the testbank.", E_USER_ERROR);
} else {
	echo "<ul style=\"list-style: disc inside; margin-left: 6px;\">\n"
	echo "<li><a href=\"testbank_cs.php\">Computer Science</a></li>"
	echo "</ul>"
}
Template::print_body_footer();
Template::print_disclaimer();
?>
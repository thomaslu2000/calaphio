<?php
require("include/includes.php");
require("include/Attending_Calendar.class.php");
require("include/Template.class.php");
Template::print_head(array("site.css", "calendar.css"));
Template::print_body_header('Calendar', 'ACALENDAR');
if (!$g_user->is_logged_in()) {
	Template::print_body_footer();
	Template::print_disclaimer();
}
$calendar = new Calendar();
$calendar->print_month();
Template::print_body_footer();
Template::print_disclaimer();
?>
<?php
require("include/includes.php");
require("include/Fellowship_Calendar.class.php");
require("include/Template.class.php");
Template::print_head(array("site.css", "calendar.css"));
Template::print_body_header('Calendar', 'FCALENDAR');
$calendar = new Calendar();
$calendar->print_month();
Template::print_body_footer();
Template::print_disclaimer();
?>
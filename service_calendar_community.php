<?php
require("include/includes.php");
require("include/Service_Calendar_Community.class.php");
require("include/Template.class.php");
Template::print_head(array("site.css", "calendar.css"));
Template::print_body_header('Calendar', 'SCALENDAR3');
$calendar = new Calendar();
$calendar->print_month();
Template::print_body_footer();
Template::print_disclaimer();
?>
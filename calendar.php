<?php
require("include/includes.php");
require("include/Calendar.class.php");
require("include/Template.class.php");
Template::print_head(array("site.css", "calendar.css"));
Template::print_body_header('Calendar', 'CALENDAR');

$calendar = new Calendar();
$calendar->print_month();

$gg_maniac_nag = new GGManiacNag();
echo $gg_maniac_nag->display();

Template::print_body_footer();
Template::print_disclaimer();
?>
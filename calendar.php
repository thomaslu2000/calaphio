<?php
require("include/includes.php");
require("include/Calendar.class.php");
require("include/Template.class.php");
Template::print_head(array("site.css", "calendar.css"));
Template::print_body_header('Calendar', 'CALENDAR');

echo "Google Calendars: <a href='https://calendar.google.com/calendar/embed?src=sq28uo3jif4hii23l41ub6t2e8%40group.calendar.google.com&ctz=America%2FLos_Angeles'> Fellowships </a> <a href='https://calendar.google.com/calendar/embed?src=nqaqte7vci1aaplii55a1p5404%40group.calendar.google.com&ctz=America%2FLos_Angeles'> Service </a> <a href='https://calendar.google.com/calendar/embed?src=v1np8cnn4hcqb0jevl3ratc4hs%40group.calendar.google.com&ctz=America%2FLos_Angeles'> Other </a>";

$calendar = new Calendar();
$calendar->print_month();

Template::print_body_footer();
Template::print_disclaimer();
?>
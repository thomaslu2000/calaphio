<?php
require("include/includes.php");
require("include/Calendar.class.php");
require("include/Template.class.php");
Template::print_head(array("site.css", "calendar.css"));
Template::print_body_header('Calendar', 'CALENDAR');

echo "<a href='https://calendar.google.com/calendar?cid=cTFodGJpcDE0YjVrMmo4Zmg5Z29hMGVxdDRAZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ'> Link to Google Calendar </a>";

$calendar = new Calendar();
$calendar->print_month();

Template::print_body_footer();
Template::print_disclaimer();
?>
<?php
require("include/includes.php");
require("include/Calendar.class.php");
require("include/Template.class.php");
Template::print_head(array());
Template::print_body_header('Calendar', 'IC CALENDAR');
?>
<iframe src="http://www.google.com/calendar/embed?src=c7lfsv2o4bfpdaa872l7hips68%40group.calendar.google.com&height=614" style=" border-width:0 " width="950" frameborder="0" height="614"></iframe>
<?php
Template::print_body_footer();
Template::print_disclaimer();
?>
<?php
require("include/includes.php");
require("include/Calendar.class.php");
require("include/Template.class.php");
Template::print_head(array());
Template::print_body_header('Brothers', 'HISTORY');
?>
<h2><a name="intro">Our History: Chapter History</a></h2><br/>
<p>
<?php
Template::print_body_footer();
Template::print_disclaimer();
?>
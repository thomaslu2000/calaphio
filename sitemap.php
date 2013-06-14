<?php
require("include/includes.php");
require("include/Calendar.class.php");
require("include/Template.class.php");
Template::print_head(array());
Template::print_body_header('Home', '');
?>
<p>Sorry, we're not quite ready to release this feature yet!</p>
<?php
Template::print_body_footer();
Template::print_disclaimer();
?>
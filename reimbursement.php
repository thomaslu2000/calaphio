<?php
require("include/includes.php");
require("include/Calendar.class.php");
require("include/Template.class.php");
Template::print_head(array());
Template::print_body_header('Calendar', 'REIMBURSE');
?>


<?php if ($g_user->is_logged_in()): ?>


	<h2><b>REIMBURSEMENTS</h2><br/>

	<p>You are required to fill out the following <a href="https://goo.gl/forms/wl4B7QyoexsN5R4c2" target="_blank">FORM</a><br/>





<?php
Template::print_body_footer();
Template::print_disclaimer();
?>
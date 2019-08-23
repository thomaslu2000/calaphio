<?php
require("include/includes.php");
require("include/Template.class.php");
Template::print_head(array());
Template::print_body_header('Home', '');


$permitted = $g_user->permit("admin view requirements");
echo "$permitted";

Template::print_body_footer();
Template::print_disclaimer();
?>

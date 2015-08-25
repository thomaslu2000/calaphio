<?php
require("include/includes.php");
require("include/Calendar.class.php");
require("include/Template.class.php");
Template::print_head(array("site.css", "roster.css"));
Template::print_body_header('Home', 'BROTHERS');
$g_user->process_roster();
echo <<<DOCHERE_print_photobox_script
<script>
	$('#process_roster_results').photobox('a.pic',{ thumbs:true });
</script>
DOCHERE_print_photobox_script;
Template::print_body_footer();
Template::print_disclaimer();
?>
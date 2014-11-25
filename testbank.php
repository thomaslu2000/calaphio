<?php
require("include/includes.php");
require("include/Calendar.class.php");
require("include/Template.class.php");
Template::print_head(array());
Template::print_body_header('Brothers', 'TESTBANK');
if (!$g_user->is_logged_in()) {
	trigger_error("You must be logged in to view the testbank.", E_USER_ERROR);
} else {
	echo "<ul style=\"list-style: disc inside; margin-left: 6px;\">\n";
	echo "<li><a href=\"testbank_astro.php\">Astronomy</a></li>\n";
	echo "<li><a href=\"testbank_bioe.php\">Bioengineering</a></li>\n";
	echo "<li><a href=\"testbank_budds.php\">Buddhist Studies</a></li>\n";
	echo "<li><a href=\"testbank_chem.php\">Chemistry</a></li>\n";
	echo "<li><a href=\"testbank_cogsci.php\">Cognitive Science</a></li>\n";
	echo "<li><a href=\"testbank_cs.php\">Computer Science</a></li>\n";
	echo "<li><a href=\"testbank_econ.php\">Economics</a></li>\n";
	echo "<li><a href=\"testbank_ee.php\">Electrical Engineering</a></li>\n";
	echo "<li><a href=\"testbank_envde.php\">Environmental Design</a></li>\n";
	echo "<li><a href=\"testbank_hist.php\">History</a></li>\n";
	echo "<li><a href=\"testbank_ls.php\">Legal Studies</a></li>\n";
	echo "<li><a href=\"testbank_math.php\">Mathematics</a></li>\n";
	echo "<li><a href=\"testbank_mcb.php\">Molecular and Cell Biology</a></li>\n";
	echo "<li><a href=\"testbank_nutrisci.php\">Nutritional Science</a></li>\n";
	echo "<li><a href=\"testbank_physics.php\">Physics</a></li>\n";
	echo "<li><a href=\"testbank_polisci.php\">Political Science</a></li>\n";
	echo "<li><a href=\"testbank_stats.php\">Statistics</a></li>\n";
	echo "<li><a href=\"testbank_ugba.php\">UGBA</a></li>\n";
	echo "</ul>\n";
}
Template::print_body_footer();
Template::print_disclaimer();
?>
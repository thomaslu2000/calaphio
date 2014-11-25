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
	$files = array();
	$dir = opendir("testbank/Economics");
	while (false !== ($filename = readdir($dir))) {
		if (is_file("testbank/Economics/$filename")) {
			$files[] = $filename;
		}
	}
	natcasesort($files);
	foreach ($files as $filename) {
		$escaped_filename = htmlentities($filename);
		echo "<li><a href=\"testbank/Economics/$escaped_filename\">$escaped_filename</a></li>\n";
	}
	echo "</ul>\n";
	echo <<<HEREDOC


HEREDOC;
}
Template::print_body_footer();
Template::print_disclaimer();
?>o
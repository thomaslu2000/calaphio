<?php
require("include/includes.php");
require("include/Calendar.class.php");
require("include/Template.class.php");

if (!$g_user->is_logged_in()) {
	trigger_error("You must be logged in to view the photo gallery.");
	Template::print_head(array());
	Template::print_body_header('Brothers', 'GALLERY');
	
	Template::print_body_footer();
	Template::print_disclaimer();
} else {
	$userid = $g_user->data['user_id'];
	require_once('gallery2/embed.php');
	$uri = 'gallery.php';
	$ret = GalleryEmbed::init(array(
		'embedUri' => $uri, 'relativeG2Path' => 'gallery2', 'loginRedirect' => '/index.php',
		'activeUserId' => $userid));
	if ($ret->isError()) {
		$ret->getAsHtml() ;//has error details..
		exit;
	}
	$g2data = GalleryEmbed::handleRequest();
	if ($g2data['isDone']) {
		exit; // G2 has already sent output (redirect or binary data)
	}
	// Use $g2data['headHtml'] and $g2data['bodyHtml']
	// to display G2 content inside embedding application
	
	Template::print_head(array(), $g2data['headHtml']);
	Template::print_body_header('Brothers', 'GALLERY');
	
	$g_error->output_error();
	echo $g2data['bodyHtml']; 
	
	Template::print_body_footer();
	Template::print_disclaimer();
}
?>

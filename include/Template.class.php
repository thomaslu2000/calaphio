<?php

    $picDir  = opendir("header_photos");
    $picFile = array();
    while (false !== ($name = readdir($picDir))) {
        if (is_file("header_photos/$name") && substr($name, strlen($name) - 4, 4) == '.jpg') {
            $picFile[] = $name;
        }
    }
    
class Template {

	function Template() {

	}

	/**
	 * $css_file is an array of css files to include. */
	function print_head($css_file, $meta = '') {
		if (!isset($css_file) || is_null($css_file)) {
			$css_file = array();
		}
		if (!is_array($css_file)) {
			$css_file = array($css_file);
		}
		$css_include = "";
		foreach ($css_file as $file) {
			$css_include .= "  <link type=\"text/css\" rel=\"stylesheet\" href=\"$file\" />\r\n";
		}

		$template = "template.css";
		if (isset($_REQUEST['new_template'])) {
			$template = 'old_template.css';
			output_add_rewrite_var('new_template', '1');
		}

		echo <<<DOCHERE_print_head
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
  <meta http-equiv="Content-Style-Type" content="text/css" />
  <link type="text/css" rel="stylesheet" href="reset.css" />
  <link type="text/css" rel="stylesheet" media="screen" href="$template" />
  <link type="text/css" rel="stylesheet" href="bootstrap.css" />
  <link type="text/css" rel="stylesheet" media="screen" href="site.css" />
  <link type="text/css" rel="stylesheet" media="print" href="print.css" />
  <link rel="stylesheet" href="photobox/photobox.css">
  <link rel="shortcut icon" type="image/x-icon" href="http://www.calaphio.com/apo_favicon.ico" />
  <script language="javascript" type="text/javascript" src="popup.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
  <script language="javascript" type="text/javascript" src="bootstrap.min.js"></script>
  <script src='photobox/photobox.js'></script>
$css_include  <title>Alpha Phi Omega - Gamma Gamma Chapter at University of California Berkeley</title>
$meta
</head>

DOCHERE_print_head;
	}

	/**
	 * $section and $page are case sensitive. */
	function print_body_header($section, $page) {
		global $g_user, $g_error;
		// $section_links_array = array(
		// 	'Home' => "news.php",
		// 	'Service' => "service.php",
		// 	'Fellowship' => "fellowship.php",
		// 	'Calendar' => "calendar.php",
		// 	'Brothers' => "roster.php",
		// 	'Contact' => "contact.php");
		$section_array = array(
			'Home' => array(
				"NEWS" => "news.php",
				"PLEDGING" => "pledging.php",
				"OFFICERS" => "excomm.php", 
				"BYLAWS" => "bylaws.php",
				"SECTION 4" => "http://www.aposection4.org",
				"REGION X" => "http://www.apor10.org",
				"NATIONAL" => "http://www.apo.org"
				),
			'Service' => array(
				"PLEDGING" => "pledging.php",
				"FELLOWSHIP" => "fellowship.php",
				"REIMBURSEMENT" => "reimbursement.php"
				),
			'Fellowship' => array(
				"PLEDGING" => "pledging.php",
				"SERVICE" => "service.php",
				"REIMBURSEMENT" => "reimbursement.php"
				),
			'Calendar' => array(
				"ADD EVENT" => array("popup", "add_event.php"),
				"CALENDAR" => "calendar.php",
				"IC CALENDAR" => "ic_calendar.php",
				"REQUIREMENTS" => "profile.php?requirements=true&user_id=" . $g_user->data['user_id'],
				"BUDGET" => "https://docs.google.com/spreadsheets/d/1CgFV2Pt4AWtsJTbh4asi2Xi_CoshFJgHvfK93lAneC0/edit#gid=0",
				"AWARDS" => "awards.php"
				),
			'Brothers' => array(
				"HISTORY" => "history.php",
				"ALUMNI" => "alumni.php",
				"ROSTER" => "roster.php",
				"WIKI" => "ggwiki.php",
				"GALLERY" => "http://calaphio.smugmug.com/",
				"TESTBANK" => "https://drive.google.com/folderview?id=0B1PYMBbhnLMsNms3Uk4wcFQxLTQ&usp=sharing",
				"ACCOUNT" => "edit_roster.php"
				),
			'Contact' => array(
				));

		// Show the admin tab
		$admin_permissions = array("admin add users", "admin change passphrase", "admin view requirements", "admin view pledge requirements");
		$is_admin = false;
		foreach ($admin_permissions as $permission) {
			if ($g_user->permit($permission)) {
				$is_admin = true;
				break;
			}
		}
		if ($is_admin) {
			foreach ($section_array as $key => $value) {
				$section_array[$key]["ADMIN"] = "admin.php";
			}
		}

		// Display each section button
		$sections = "";
		$i = 1;
		foreach ($section_array as $key => $value) {
			$class = $section == $key ? "active" : "";
			$sections .= "\r\n	  <li><a class=\"$class\" id=\"link_$i\" href=\"$section_links_array[$key]\">$key</a></li>";
			$i++;
		}

		// Display each subnavigation tab
		$sublinks = "";
		foreach ($section_array[$section] as $key => $value) {
			if (is_array($value) && $value[0] == "popup") {
				$popup_width = CALENDAR_POPUP_WIDTH;
				$popup_height = CALENDAR_POPUP_HEIGHT;
				$session_id = session_id(); // JavaScript popups in IE tend to block cookies, so need to explicitly set session id
				$referrer = urlencode($_SERVER['REQUEST_URI']);
				$onclick = "return popup('$value[1]?sid=$session_id&referrer=$referrer', $popup_width, $popup_height)";
				$url = $value[1];
			} else {
				$url = $value;
				$onclick = "";
			}
			$class = $page == $key ? "active" : "";
			$sublinks .= "\r\n	  <li><a class=\"$class\" href=\"$url\" onclick=\"$onclick\">$key</a></li>";
		}

		// Process welcome bar
		$logout = $g_user->is_logged_in() ? "<a href=\"logout.php\">Logout</a>" : "<div style=\"float: right\">Region 10 - Section 4</div>";
		$welcome_message = $g_user->is_logged_in() ? "Hello, " . $g_user->data['firstname'] . " " . $g_user->data['lastname'] . "! " . "<a href=\"profile.php?user_id=" . $g_user->data['user_id'] . "\">(My Profile)</a>"  : "Welcome to the Gamma Gamma Chapter of Alpha Phi Omega!";
		$notifications = ($g_user->is_logged_in() &&  $g_user->data['user_id'] == 2000) ? "<div class=\"dropdown\" style=\"display:inline\">
            <a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\">Dropdown trigger</a>
            <ul class=\"dropdown-menu\" role=\"menu\" aria-labelledby=\"dLabel\">
            </ul></div>" : "";

		// Grab a random image file
		$dir  = opendir("header_photos");
		$file = array();
		while (false !== ($filename = readdir($dir))) {
			if (is_file("header_photos/$filename") && substr($filename, strlen($filename) - 4, 4) == '.jpg') {
				$file[] = $filename;
			}
		}
		$header_photo = $file[rand(0, count($file) - 1)];

		echo <<<DOCHERE_print_body_header
<body>
<img id="header" src="images/header.jpg" alt="Region 10 Section 4 APO Gamma Gamma at Berkeley" />
<div id="paperLayer1">
  <div id="paperLayer2">
    <div id="paperHeader">
	<!-- img id="logo" src="images/logo.jpg" alt="alpha phi omega" -->
	<div id="logo"></div>
	<img id="header_photo" src="header_photos/$header_photo" alt="Photo of brothers" />
	<!-- img id="quote" src="images/quote.jpg" alt="Be the change that you want to see" -->
	<div id="quote"></div>
	<ul>$sections</ul>
    </div>
    <div id="paperSubHeader">
	<div id="welcomeBar">
	  <p id="logout">$logout</p>
	  <p>$welcome_message</p>
	   $notifications
	</div>
	<ul>$sublinks</ul>
    </div>
    <div id="paper">

DOCHERE_print_body_header;
		$g_user->print_login();
		$g_error->output_error();
	}

	function print_body_footer() {
		echo <<<DOCHERE_print_body_footer
    </div>
    <div id="paperFooter">
	<p><a href="pledging.php">About Us</a> | <a href="sitemap.php">Site Map</a> | <a href="http://www.apo.org">National Website</a> | <a href="http://www.berkeley.edu">UC Berkeley</a> | <a href="http://www.asuc.org/">ASUC Sponsored</a> | <a href="contact.php">Contact Us</a></p>
    </div>
  </div>
</div>

DOCHERE_print_body_footer;
	}

	function print_disclaimer() {
		echo <<<DOCHERE_print_disclaimer
<div id="disclaimer">
  <p style="margin-bottom: 1em;">112 Hearst gym #4520 Berkeley, CA 94720-4520 / ASUC Funded / Wheelchair Accessible</p>
  <p style="margin-bottom: 1em;">This electronic document is intended for public viewing and is solely for personal reference. It should not be considered an authoritative source nor an official publication of Alpha Phi Omega. Inquiries regarding Alpha Phi Omega and its official publications may be directed to: Alpha Phi Omega, 14901 E. 42nd Street, Independence, MO, 64055 - USA. "Alpha Phi Omega" is a copyrighted, registered trademark in the USA. All rights reserved.</p>
  <p>This electronic document also does not represent any opinion or statement of the University of California, Berkeley.</p>
</div>
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-6554136-1");
pageTracker._trackPageview();
} catch(err) {}
</script>
</body>
</html>
DOCHERE_print_disclaimer;
	}
}
?>

<script language="javascript" type="text/javascript">

<?php print("var images = " . json_encode($picFile) . ";");?>

function changeImage() {
    
    var num = Math.floor(Math.random()*images.length)
    
    var img = document.getElementById("header_photo");
    
    img.src = "header_photos/" + images[num];
    
    setTimeout("changeImage()", 10000);
    
}

setTimeout("changeImage()", 10000);

</script>

<?php
include 'include/includes.php';
include 'include/Calendar.class.php';
$calendar = new Calendar();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" >
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<link type="text/css" rel="stylesheet" href="site.css" />
<link type="text/css" rel="stylesheet" href="calendar.css" />
<script language="javascript" type="text/javascript" src="popup.js"></script>
<title>Alpha Phi Omega - Event Access Log</title>
</head>
<body>
<?php
$g_user->print_login();
$g_error->output_error();
$calendar->print_log();
?>
</body>
</html>
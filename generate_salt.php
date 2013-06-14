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
<title>Alpha Phi Omega - Calendar</title>
</head>
<body>
<?php
echo Query::escape_string(User::generate_salt());
?>
</body>
</html>
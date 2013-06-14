<?php
return;
if (!isset($_COOKIE['override']) || isset($_COOKIE['override']) && $_COOKIE['override'] != "1")
{
	header("$_SERVER[SERVER_PROTOCOL] 503 Service Unavailable", true, 503);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
  <meta http-equiv="Content-Style-Type" content="text/css" />
  <link rel="shortcut icon" type="image/x-icon" href="http://www.calaphio.com/apo_favicon.ico" />
  <title>Alpha Phi Omega - Gamma Gamma Chapter at University of California Berkeley</title>
</head>
<body>
<h1>Temporary Maintenance</h1>
<p>Sorry guys, the chapter website is temporarily unavailable while we transfer to a new server. -Geoffrey Lee</p>
</body>
</html>
<?php
	exit();
}
?>
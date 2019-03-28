<?php

/**
 * If register_globals is ON, prevent injection via arguments.
 * http://andreineculau.wordpress.com/?s=register_globals */
/*
if (ini_get('register_globals')) {
	foreach ($GLOBALS as $s_variable_name => $m_variable_value) {
		if (!in_array($s_variable_name, array('GLOBALS', 'argv', 'argc', '_FILES', '_COOKIE', '_POST', '_GET', '_SERVER', '_ENV', '_SESSION', ‘_REQUEST’, ’s_variable_name’, ‘m_variable_value’))) {
			unset($GLOBALS[$s_variable_name]);
		}
	}
	unset($GLOBALS[’s_variable_name’]);
	unset($GLOBALS[’m_variable_value’]);
}
*/

//date_default_timezone_set(TIMEZONE); This is only supported by PHP 5
putenv("TZ=" . TIMEZONE);
require('initVariables.php');

$g_error = new Error();
$g_user = new User();

?>
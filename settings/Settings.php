<?php

/*********************
 * DATABASE SETTINGS *
 *********************/
<<<<<<< HEAD
define("DB_HOST",		"mysql.calaphio.com");
define("DB_USER",		"website");
define("DB_PASSWORD",		"GammaGammaAdmin");
define("DB_DATABASE",		"website");
define("TABLE_PREFIX",		"apo_");
=======
define("DB_HOST",	 "calaphio");
define("DB_USER",	 "apo");
define("DB_PASSWORD", "GammaGammaAdmin");
define("DB_DATABASE",	 "website");
define("TABLE_PREFIX",	 "apo_");
>>>>>>> origin/master

/********************
 * SESSION SETTINGS *
 ********************/
define("SESSION_TIMEOUT",	2*60*60); // 2 hours
define("UPLOAD_MAX_FILESIZE",	5242880); // 5 megabytes
define("TIMEZONE",	 "America/Los_Angeles"); // Refer to http://us2.php.net/manual/en/timezones.php

/******************
 * DEBUG SETTINGS *
 ******************/
// WARNING, do not enable any of these on a public server!
define("VERBOSE_ERRORS",	/*true*/false);
define("EXPLICIT_SQL_ERRORS",	/*true*/false);
define("OUTPUT_SQL",	 false);
define("SESSION_DEBUG",	 false);
define("USER_DEBUG",	 false);
define("EVENT_FUNCTIONS_DEBUG",	false);

?>
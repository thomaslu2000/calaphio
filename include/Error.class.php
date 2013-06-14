<?php

class Error {
	
	function Error() {
		if (VERBOSE_ERRORS) {
			error_reporting(E_ALL); // Note that this does not include E_STRICT
		} else {
			error_reporting(E_USER_ERROR | E_USER_WARNING | E_USER_NOTICE);
		}
		set_error_handler("error_handler");
	}
	
	/**
	 * This function will output any existing errors. */
	function output_error() {
		// We need to wait until the script is finished to get all the errors
		ob_start("output_error_end");
	}
	
}

/**
 * This function gets called at the end of the script
 * execution if output_error() is called. */
function output_error_end($buffer) {
	global $error_msg;
	if (isset($error_msg) && $error_msg) {
		$formatted_error = <<<DOCHERE_error_msg
<div class="errorMessage">
$error_msg
</div>

DOCHERE_error_msg;
		return $formatted_error . $buffer;
	} else {
		return false;
	}
}

/**
 * This function replaces the default PHP error handler
 * outside of parsing errors. */
function error_handler($errno, $errstr, $errfile, $errline, $errcontext) {
	global $error_msg;
	if (!isset($error_msg)) {
		$error_msg = "";
	}
	if ((ini_get('error_reporting') & $errno) != 0) {
		switch ($errno) {
		case E_WARNING:
			$error_msg .= "<p><strong>WARNING</strong>: $errstr in <strong>$errfile</strong> on line <strong>$errline</strong></p>\r\n"; 
			break;
		case E_NOTICE:
			$error_msg .= "<p><strong>NOTICE</strong>: $errstr in <strong>$errfile</strong> on line <strong>$errline</strong></p>\r\n";
			break;
		case E_USER_ERROR:
			$error_msg .= "<p><strong>$errstr</strong></p>";
			break;
		case E_USER_WARNING:
			$error_msg .= "<p>$errstr</p>";
			break;
		case E_USER_NOTICE:
			$error_msg .= "<p>$errstr</p>";
			break;
		default:
			$error_msg .= "<p><strong>#$errno</strong>: $errstr in <strong>$errfile</strong> on line <strong>$errline</strong></p>\r\n";
		}
	}
}

?>
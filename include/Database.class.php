<?php

class Query {
	
	var $result;
	var $link;
	
	/**
	 * This will automatically connect on the first query. */
	function Query($query) {
		// Automatically connect on first query
		static $link;
		if (!isset($link)) {
			$link = @mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
			if (!$link) {
				trigger_error("Could not connect to the server. Please notify the webmaster.", E_USER_ERROR);
				return;
			}
			if (!@mysql_select_db(DB_DATABASE)) {
				trigger_error("Could not open the database. Please notify the webmaster.", E_USER_ERROR);
				return;
			}
		}
		$this->link = $link;
		
		// Execute query statement
		$this->result = @mysql_query($query, $link);
		
		// Report errors
		if (OUTPUT_SQL) {
			echo "<p>$query</p>\r\n";
		}
		if (!$this->result && EXPLICIT_SQL_ERRORS) {
			$error = sprintf("<strong>%s:</strong> %s<br />\r\n<strong><br />The full query was:</strong> %s", @mysql_errno($link), @mysql_error($link), $query);
			trigger_error($error, E_USER_ERROR);
		} else if (!$this->result) {
			trigger_error("Sorry, we were unable to complete your request due to an error communicating with the database. Please notify the webmaster.", E_USER_ERROR);
		}
	}
	
	function affected_rows() {
		return mysql_affected_rows($this->link);
	}
	
	/**
	 * Run this on all user input to prevent SQL injection attacks. */
	function escape_string($string) {
		if (get_magic_quotes_gpc()) {
			$string = stripslashes($string);
		}
		return mysql_escape_string($string);
	}
	
	/**
	 * Return an associative array of the next result row. */
	function fetch_row() {
		if (isset($this->result) && $this->result) {
			return mysql_fetch_assoc($this->result);
		} else {
			return false;
		}
	}
	
	function last_insert_id() {
		return mysql_insert_id($this->link);
	}
	
	function num_rows() {
		return mysql_num_rows($this->result);
	}
	
}

?>
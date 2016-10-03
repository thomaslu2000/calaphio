<?php

	require("include/includes.php");

	function contains($substring, $string) {
        	$pos = strpos($string, $substring);
	        if($pos === false) {
                	return false;
	        }
        	else {
         	       return true;
	        }
	}

	function db_safe_string($str) {
		$str = htmlentities($str, ENT_QUOTES, 'UTF-8');
		$str = str_replace("\r\n", "<br />", $str);
		$str = str_replace(array("\r", "\n"), "<br />", $str);
		$str = Query::escape_string($str);
		return $str;
	}

	function edit_position_maker($pos, $position_name, $semester, $year, $basic_info_id) {
		$str = "";
		
		switch ($pos) {
		case 1:
		case 2:
		case 3:
		case 4:
		case 7:
		case 8:
		case 9:
		case 10:
		case 14:
			$str .= "<form action=\"#\" method=\"post\">";
			$str .= "<div class=\"edittable\">";
			$str .= "<input type=\"hidden\" name=\"basic_info_id\" value=\"$basic_info_id\" />";
			$str .= "<input type=\"hidden\" name=\"position_name\" value=\"$position_name\" />";
			$str .= "<b>Position Name: </b>$position_name<br />";
			if ($semester == 0) {
				$str .= "<b>Semester: </b><select name=\"semester\"><option value=\"0\" selected=\"selected\">Spring</option><option value=\"1\">Fall</option></select><br />";
			}
			else {
				$str .= "<b>Semester: </b><select name=\"semester\"><option value=\"0\">Spring</option><option value=\"1\" selected=\"selected\">Fall</option></select><br />";
			}
			$current_year = date("Y");
			$str .= "<b>Year: </b><select name=\"year\">";
			for ($i = $current_year + 1; $i >= $current_year - 20; $i--) {
				if ($i == $year) {
					$str .= "<option value=\"$i\" selected=\"selected\">$i</option>";
				}
				else {
					$str .= "<option value=\"$i\">$i</option>";
				}
			}
			$str .= "</select>";
			$str .= "</div>";
			$str .= "<button type=\"submit\" name=\"update\" value=\"update_position_basic_info\" onclick=\"return confirm('Are you sure you want to SAVE this?')\"> Save Changes </button>";
			$str .= "</form>";
			break;

		case 6:
		case 11:
		case 12:
		case 13:
			$str .= "<form action=\"#\" method=\"post\">";
			$str .= "<div class=\"edittable\">";
			$str .= "<input type=\"hidden\" name=\"basic_info_id\" value=\"$basic_info_id\" />";
			$str .= "<b>Committee/Faminly/Other Name: </b><br />";
			$str .= "<input type=\"text\" name=\"position_name\" value=\"$position_name\" size=\"60\" /><br />";
			if ($semester == 0) {
				$str .= "<b>Semester: </b><select name=\"semester\"><option value=\"0\" selected=\"selected\">Spring</option><option value=\"1\">Fall</option></select><br />";
			}
			else {
				$str .= "<b>Semester: </b><select name=\"semester\"><option value=\"0\">Spring</option><option value=\"1\" selected=\"selected\">Fall</option></select><br />";
			}
			$current_year = date("Y");
			$str .= "<b>Year: </b><select name=\"year\">";
			for ($i = $current_year + 1; $i >= $current_year - 20; $i--) {
				if ($i == $year) {
					$str .= "<option value=\"$i\" selected=\"selected\">$i</option>";
				}
				else {
					$str .= "<option value=\"$i\">$i</option>";
				}
			}
			$str .= "</select>";
			$str .= "</div>";
			$str .= "<button type=\"submit\" name=\"update\" value=\"update_position_basic_info\" onclick=\"return confirm('Are you sure you want to SAVE this?')\"> Save Changes </button>";
			$str .= "</form>";
			break;

		case 5:
			$str .= "<form action=\"#\" method=\"post\">";
			$str .= "<div class=\"edittable\">";
			$str .= "<input type=\"hidden\" name=\"basic_info_id\" value=\"$basic_info_id\" />";
			$str .= "<b>Chairs under which ExComm Position (or special position): </b><br />";
			$str .= "<select name=\"position_name\" onChange=\"toggleField(this.value);\">";
			$excomm_query = new Query(sprintf("SELECT * FROM apo_wiki_excomm ORDER BY ordering ASC"));
			$other = True;
			while ($excomm_row = $excomm_query->fetch_row()) {
				$excomm_name = $excomm_row['excomm_name'];
				if ($position_name == $excomm_name) {
					$str .= "<option value=\"$excomm_name\" selected=\"selected\" >$excomm_name</option>";
					$other = False;
				}
				else {
					$str .= "<option value=\"$excomm_name\">$excomm_name</option>";
				}
			}
			if ($other) {
				$str .= "<option value=\"other\" selected=\"selected\">Other</option>";
				$str .= "</select>";
				$str .= "<input type=\"text\" name=\"other\" id=\"other\" value=\"$position_name\" size=\"30\" style=\"display: block;\">";
			}
			else {
				$str .= "<option value=\"other\">Other</option>";
				$str .= "</select>";
				$str .= "<input type=\"text\" name=\"other\" id=\"other\" size=\"30\" style=\"display: none;\">";
			}
			$str .= "<br />";
			if ($semester == 0) {
				$str .= "<b>Semester: </b><select name=\"semester\"><option value=\"0\" selected=\"selected\">Spring</option><option value=\"1\">Fall</option></select><br />";
			}
			else {
				$str .= "<b>Semester: </b><select name=\"semester\"><option value=\"0\">Spring</option><option value=\"1\" selected=\"selected\">Fall</option></select><br />";
			}
			$current_year = date("Y");
			$str .= "<b>Year: </b><select name=\"year\">";
			for ($i = $current_year + 1; $i >= $current_year - 20; $i--) {
				if ($i == $year) {
					$str .= "<option value=\"$i\" selected=\"selected\">$i</option>";
				}
				else {
					$str .= "<option value=\"$i\">$i</option>";
				}
			}
			$str .= "</select>";
			$str .= "</div>";
			$str .= "<button type=\"submit\" name=\"update\" value=\"update_position_basic_info\" onclick=\"return confirm('Are you sure you want to SAVE this?')\"> Save Changes </button>";
			$str .= "</form>";
			break;

		default:
			$str = "This ID does not exist";
		}
		return $str;
	}

	if (!$g_user->is_logged_in()) {
		trigger_error("You must be logged in to access this feature", E_USER_ERROR);
	}

	$query = new Query(sprintf("SELECT * FROM apo_wiki_pages WHERE page_id =%d", $_REQUEST['page_id']));
	$row = $query->fetch_row();
	$is_admin = $g_user->permit("wiki editing") || ($_REQUEST['function'] == "make_new_page" && ($_REQUEST['update'] == "" || $_REQUEST['update'] == "create_new_page")) || $g_user->data['user_id'] == $row['creator_user_id'] || $g_user->data['user_id'] == $_REQUEST['user_id'];

	if (!$is_admin) {
		trigger_error("You must be the Page Admin to Edit pages", E_USER_ERROR);
	}

	else {

	$page_success = "";

	$page_error = "";

	if (isset($_REQUEST['update']) && $_REQUEST['update']) {
		
		if (contains("delete_right_top", $_REQUEST['update'])) {
			$command = "delete_right_top";
			$rest = substr($_REQUEST['update'], strlen($command));
			if (substr($rest, 0, 1) == '_' && is_numeric(substr($rest, 1))) {
				$temp_id = substr($rest, 1);
			}
			else {
				$command = "";
			}
		}
		elseif (contains("up_right_top", $_REQUEST['update'])) {
			$command = "up_right_top";
			$rest = substr($_REQUEST['update'], strlen($command));
			if (substr($rest, 0, 1) == '_' && is_numeric(substr($rest, 1))) {
				$temp_id = substr($rest, 1);
			}
			else {
				$command = "";
			}
		}
		elseif (contains("down_right_top", $_REQUEST['update'])) {
			$command = "down_right_top";
			$rest = substr($_REQUEST['update'], strlen($command));
			if (substr($rest, 0, 1) == '_' && is_numeric(substr($rest, 1))) {
				$temp_id = substr($rest, 1);
			}
			else {
				$command = "";
			}
		}
		elseif (contains("delete_toc_content", $_REQUEST['update'])) {
			$command = "delete_toc_content";
			$rest = substr($_REQUEST['update'], strlen($command));
			if (substr($rest, 0, 1) == '_' && is_numeric(substr($rest, 1))) {
				$temp_id = substr($rest, 1);
			}
			else {
				$command = "";
			}
		}
		elseif (contains("delete_toc_subcontent", $_REQUEST['update'])) {
			$command = "delete_toc_subcontent";
			$rest = substr($_REQUEST['update'], strlen($command));
			if (substr($rest, 0, 1) == '_' && is_numeric(substr($rest, 1))) {
				$temp_id = substr($rest, 1);
			}
			else {
				$command = "";
			}
		}
		elseif (contains("up_toc_content", $_REQUEST['update'])) {
			$command = "up_toc_content";
			$rest = substr($_REQUEST['update'], strlen($command));
			if (substr($rest, 0, 1) == '_' && is_numeric(substr($rest, 1))) {
				$temp_id = substr($rest, 1);
			}
			else {
				$command = "";
			}
		}
		elseif (contains("down_toc_content", $_REQUEST['update'])) {
			$command = "down_toc_content";
			$rest = substr($_REQUEST['update'], strlen($command));
			if (substr($rest, 0, 1) == '_' && is_numeric(substr($rest, 1))) {
				$temp_id = substr($rest, 1);
			}
			else {
				$command = "";
			}
		}
		elseif (contains("add_toc_subcontent", $_REQUEST['update'])) {
			$command = "add_toc_subcontent";
			$rest = substr($_REQUEST['update'], strlen($command));
			if (substr($rest, 0, 1) == '_' && is_numeric(substr($rest, 1))) {
				$temp_id = substr($rest, 1);
			}
			else {
				$command = "";
			}
		}
		elseif (contains("up_toc_subcontent", $_REQUEST['update'])) {
			$command = "up_toc_subcontent";
			$rest = substr($_REQUEST['update'], strlen($command));
			if (substr($rest, 0, 1) == '_' && is_numeric(substr($rest, 1))) {
				$temp_id = substr($rest, 1);
			}
			else {
				$command = "";
			}
		}
		elseif (contains("down_toc_subcontent", $_REQUEST['update'])) {
			$command = "down_toc_subcontent";
			$rest = substr($_REQUEST['update'], strlen($command));
			if (substr($rest, 0, 1) == '_' && is_numeric(substr($rest, 1))) {
				$temp_id = substr($rest, 1);
			}
			else {
				$command = "";
			}
		}
		elseif (contains("delete_person", $_REQUEST['update'])) {
			$command = "delete_person";
			$rest = substr($_REQUEST['update'], strlen($command));
			if (substr($rest, 0, 1) == '_' && is_numeric(substr($rest, 1))) {
				$temp_id = substr($rest, 1);
			}
			else {
				$command = "";
			}
		}
		elseif (contains("up_person", $_REQUEST['update'])) {
			$command = "up_person";
			$rest = substr($_REQUEST['update'], strlen($command));
			if (substr($rest, 0, 1) == '_' && is_numeric(substr($rest, 1))) {
				$temp_id = substr($rest, 1);
			}
			else {
				$command = "";
			}
		}
		elseif (contains("down_person", $_REQUEST['update'])) {
			$command = "down_person";
			$rest = substr($_REQUEST['update'], strlen($command));
			if (substr($rest, 0, 1) == '_' && is_numeric(substr($rest, 1))) {
				$temp_id = substr($rest, 1);
			}
			else {
				$command = "";
			}
		}
		else {
			$command = $_REQUEST['update'];
		}
		
		switch ($command) {

		case 'update_main':
			if (isset($_POST['main_name']) && $_POST['main_name'] && isset($_POST['main_description'])) {
				$page_id = $_REQUEST['page_id'];
				$main_name = db_safe_string($_POST['main_name']);
				$main_description = db_safe_string($_POST['main_description']);
				$query = new Query(sprintf("SELECT * FROM apo_wiki_pages WHERE page_id !=%d and page_name='%s'", $page_id, $main_name));
				$row = $query->fetch_row();
				if (!$row) {
					$query = new Query("start transaction");
					$query = new Query(sprintf("UPDATE apo_wiki_pages SET page_name='%s', description='%s' WHERE page_id=%d", $main_name, $main_description, $page_id));
					$query = new Query("commit");
					$page_success .= "<p class=\"success\">Successfully updated the page</p>";
					$reload = "<script language=\"javascript\" type=\"text/javascript\">window.opener.location.reload(true)</script>";
				}
				else {
					$page_error .= "<p class=\"error\">There is already a Wiki Page with the same name. Please edit the existing page and add your information or make a new page with a different name. </p>";
				}
			}
			else {
				$page_error .= "<p class=\"error\">The Wiki Page Title Cannot Be Empty</p>";
			}
			break;

		case 'update_right_top':
			$page_id = $_REQUEST['page_id'];
			$query = new Query(sprintf("SELECT * FROM apo_wiki_pages_info WHERE page_id=%d ORDER BY ordering ASC", $page_id));
			$counter = 1;
			while ($row = $query->fetch_row()) {
				$info_id = $row['info_id'];
				$key_name = "key_" . $counter;
				$value_name = "value_" . $counter;
				$key = db_safe_string($_POST[$key_name]);
				$value = db_safe_string($_POST[$value_name]);
				if ($key == "" || $value == "") {
					$page_error .= "<p class=\"error\">Keys and Values Cannot Be Empty</p>";
				}
				else {
					$update_query= new Query("start transaction");
					$update_query = new Query(sprintf("UPDATE apo_wiki_pages_info SET info_key='%s', info_value='%s' WHERE info_id=%d", $key, $value, $info_id));
					$update_query = new Query("commit");
				}
				$counter++;
			}
			if ($page_error == "") {
				$page_success .= "<p class=\"success\">Successfully updated the info</p>";
			}
			$reload = "<script language=\"javascript\" type=\"text/javascript\">window.opener.location.reload(true)</script>";
			break;

		case 'add_right_top':
			$page_id = $_REQUEST['page_id'];
			$query = new Query(sprintf("SELECT COUNT(*) as num FROM apo_wiki_pages_info WHERE page_id=%d", $page_id));
			$row = $query->fetch_row();
			if (!$row) {
				$num = 0;
			}
			else {
				$num = $row['num'];
			}
			$num++;
			$query = new Query("start transaction");
			$query = new Query(sprintf("INSERT INTO apo_wiki_pages_info SET page_id=%d, ordering=%d", $page_id, $num));
			$query = new Query("commit");
			$page_success .= "<p class=\"success\">Successfully Added Key/Value</p>";
			$reload = "<script language=\"javascript\" type=\"text/javascript\">window.opener.location.reload(true)</script>";
			break;

		case 'delete_right_top':
			$page_id = $_REQUEST['page_id'];
			$info_id = $temp_id;
			$query = new Query(sprintf("SELECT * FROM apo_wiki_pages_info WHERE info_id=%d LIMIT 1", $info_id));
			$row = $query->fetch_row();
			$ordering = $row['ordering'];
			$query = new Query("start transaction");
			$query = new Query(sprintf("DELETE FROM apo_wiki_pages_info WHERE info_id=%d LIMIT 1", $info_id));
			$query = new Query("commit");
			$query = new Query(sprintf("SELECT * FROM apo_wiki_pages_info WHERE page_id=%d and ordering > %d", $page_id, $ordering));
			while ($row = $query->fetch_row()) {
				$temp_info_id = $row['info_id'];
				$temp_ordering = $row['ordering'];
				$new_query = new Query("start transaction");
				$new_query = new Query(sprintf("UPDATE apo_wiki_pages_info SET ordering=%d WHERE info_id=%d LIMIT 1", $temp_ordering - 1, $temp_info_id));
				$new_query = new Query("commit");
			}
			$page_success .= "<p class=\"success\">Successfully Deleted Key/Value</p>";
			$reload = "<script language=\"javascript\" type=\"text/javascript\">window.opener.location.reload(true)</script>";
			break;

		case 'up_right_top':
			$page_id = $_REQUEST['page_id'];
			$info_id = $temp_id;
			$query = new Query(sprintf("SELECT * FROM apo_wiki_pages_info WHERE info_id=%d LIMIT 1", $info_id));
			$row = $query->fetch_row();
			$ordering = $row['ordering'];
			if ($ordering != 1) {
				$query = new Query("start transaction");
				$query = new Query(sprintf("UPDATE apo_wiki_pages_info SET ordering=%d WHERE page_id=%d and ordering=%d LIMIT 1", $ordering, $page_id, $ordering - 1));
				$query = new Query(sprintf("UPDATE apo_wiki_pages_info SET ordering=%d WHERE info_id=%d LIMIT 1", $ordering - 1, $info_id));
				$query = new Query("commit");
				$reload = "<script language=\"javascript\" type=\"text/javascript\">window.opener.location.reload(true)</script>";
				$page_success .= "<p class=\"success\">Successfully Moved Up Key/Value</p>";
			}
			else {
				$page_error .= "<p class=\"error\">Cannot Move The Top Object Up</p>";
			}
			break;

		case 'down_right_top':
			$page_id = $_REQUEST['page_id'];
			$info_id = $temp_id;
			$query = new Query(sprintf("SELECT COUNT(*) as num FROM apo_wiki_pages_info WHERE page_id=%d", $page_id));
			$row = $query->fetch_row();
			$num = $row['num'];
			$query = new Query(sprintf("SELECT * FROM apo_wiki_pages_info WHERE info_id=%d", $info_id));
			$row = $query->fetch_row();
			$ordering = $row['ordering'];
			if ($ordering != $num) {
				$query = new Query("start transaction");
				$query = new Query(sprintf("UPDATE apo_wiki_pages_info SET ordering=%d WHERE page_id=%d and ordering=%d LIMIT 1", $ordering, $page_id, $ordering + 1));
				$query = new Query(sprintf("UPDATE apo_wiki_pages_info SET ordering=%d WHERE info_id=%d LIMIT 1", $ordering + 1, $info_id));
				$query = new Query("commit");
				$reload = "<script language=\"javascript\" type=\"text/javascript\">window.opener.location.reload(true)</script>";
				$page_success .= "<p class=\"success\">Successfully Moved Down Key/Value</p>";
			}
			else {
				$page_error .= "<p class=\"error\">Cannot Move The Bottom Object Down</p>";
			}
			break;

		case 'update_toc':
			$page_id = $_REQUEST['page_id'];
			$query = new Query(sprintf("SELECT * FROM apo_wiki_contents WHERE page_id=%d and parent_content_id=0 and subcontent_ordering=0 ORDER BY content_ordering ASC", $page_id));
			$counter = 1;
			while ($row = $query->fetch_row()) {
				$content_id = $row['content_id'];
				$content_name = "content_name_" . $counter;
				$new_content_name = db_safe_string($_POST[$content_name]);
				if ($new_content_name == "") {
					$page_error .= "<p class=\"error\">Content Names Cannot Be Empty</p>";
				}
				else {
					$update_query = new Query("start transaction");
					$update_query = new Query(sprintf("UPDATE apo_wiki_contents SET content_name='%s' WHERE content_id=%d LIMIT 1", $new_content_name, $content_id));
					$update_query = new Query("commit");
					$subquery = new Query(sprintf("SELECT * FROM apo_wiki_contents WHERE page_id=%d and parent_content_id=%d and content_ordering=0 ORDER BY subcontent_ordering ASC", $page_id, $content_id));
					$subcounter = 1;
					while ($subrow = $subquery->fetch_row()) {
						$subcontent_id = $subrow['content_id'];
						$subcontent_name = "subcontent_name_" . $counter . "_" . $subcounter;
						$new_subcontent_name = db_safe_string($_POST[$subcontent_name]);
						if ($new_subcontent_name == "") {
							$page_error .= "<p class=\"error\">Subontent Names Cannot Be Empty</p>";
						}
						else {
							$update_subquery = new Query("start transaction");
							$update_subquery = new Query(sprintf("UPDATE apo_wiki_contents SET content_name='%s' WHERE content_id=%d LIMIT 1", $new_subcontent_name, $subcontent_id));
							$update_subquery = new Query("commit");
						}
						$subcounter++;
					}
				}
				$counter++;
			}
			if ($page_error == "") {
				$page_success .= "<p class=\"success\">Successfully Updated Table of Contents</p>";
			}
			$reload = "<script language=\"javascript\" type=\"text/javascript\">window.opener.location.reload(true)</script>";
			break;

		case 'add_toc':
			$page_id = $_REQUEST['page_id'];
			$query = new Query(sprintf("SELECT COUNT(*) as num FROM apo_wiki_contents WHERE page_id=%d and parent_content_id=0 and subcontent_ordering=0", $page_id));
			$row = $query->fetch_row();
			if (!$row) {
				$num = 0;
			}
			else {
				$num = $row['num'];
			}
			$num++;
			$query = new Query("start transaction");
			$query = new Query(sprintf("INSERT INTO apo_wiki_contents SET page_id=%d, parent_content_id=0, content_ordering=%d, subcontent_ordering=0", $page_id, $num));
			$query = new Query("commit");
			$page_success .= "<p class=\"success\">Successfully Added a New Content</p>";
			$reload = "<script language=\"javascript\" type=\"text/javascript\">window.opener.location.reload(true)</script>";
			break;

		case 'delete_toc_content':
			$page_id = $_REQUEST['page_id'];
			$content_id = $temp_id;
			$query = new Query(sprintf("SELECT * FROM apo_wiki_contents WHERE content_id=%d LIMIT 1", $content_id));
			$row = $query->fetch_row();
			$content_ordering = $row['content_ordering'];
			$query = new Query("start transaction");
			$query = new Query(sprintf("DELETE FROM apo_wiki_contents WHERE content_id=%d LIMIT 1", $content_id));
			$query = new Query(sprintf("DELETE FROM apo_wiki_contents WHERE parent_content_id=%d", $content_id));
			$query = new Query("commit");
			$query = new Query(sprintf("SELECT * FROM apo_wiki_contents WHERE page_id=%d and parent_content_id=0 and content_ordering > %d and subcontent_ordering=0", $page_id, $content_ordering));
			while ($row = $query->fetch_row()) {
				$temp_content_id = $row['content_id'];
				$temp_content_ordering = $row['content_ordering'];
				$new_query = new Query("start transaction");
				$new_query = new Query(sprintf("UPDATE apo_wiki_contents SET content_ordering=%d WHERE content_id=%d LIMIT 1", $temp_content_ordering - 1, $temp_content_id));
				$new_query = new Query("commit");
			}
			$page_success .= "<p class=\"success\">Successfully Deleted the Content</p>";
			$reload = "<script language=\"javascript\" type=\"text/javascript\">window.opener.location.reload(true)</script>";
			break;

		case 'delete_toc_subcontent':
			$page_id = $_REQUEST['page_id'];
			$content_id = $temp_id;
			$query = new Query(sprintf("SELECT * FROM apo_wiki_contents WHERE content_id=%d LIMIT 1", $content_id));
			$row = $query->fetch_row();
			$subcontent_ordering = $row['subcontent_ordering'];
			$parent_content_id = $row['parent_content_id'];
			$query = new Query("start transaction");
			$query = new Query(sprintf("DELETE FROM apo_wiki_contents WHERE content_id=%d LIMIT 1", $content_id));
			$query = new Query("commit");
			$query = new Query(sprintf("SELECT * FROM apo_wiki_contents WHERE page_id=%d and parent_content_id=%d and subcontent_ordering > %d and content_ordering=0", $page_id, $parent_content_id, $subcontent_ordering));
			while ($row = $query->fetch_row()) {
				$temp_content_id = $row['content_id'];
				$temp_subcontent_ordering = $row['subcontent_ordering'];
				$new_query = new Query("start transaction");
				$new_query = new Query(sprintf("UPDATE apo_wiki_contents SET subcontent_ordering=%d WHERE content_id=%d LIMIT 1", $temp_subcontent_ordering - 1, $temp_content_id));
				$new_query = new Query("commit");
			}
			$page_success .= "<p class=\"success\">Successfully Deleted the Subcontent</p>";
			$reload = "<script language=\"javascript\" type=\"text/javascript\">window.opener.location.reload(true)</script>";
			break;

		case 'up_toc_content':
			$page_id = $_REQUEST['page_id'];
			$content_id = $temp_id;
			$query = new Query(sprintf("SELECT * FROM apo_wiki_contents WHERE content_id=%d LIMIT 1", $content_id));
			$row = $query->fetch_row();
			$content_ordering = $row['content_ordering'];
			if ($content_ordering != 1) {
				$query = new Query("start transaction");
				$query = new Query(sprintf("UPDATE apo_wiki_contents SET content_ordering=%d WHERE page_id=%d and content_ordering=%d and parent_content_id=0 and subcontent_ordering=0 LIMIT 1", $content_ordering, $page_id, $content_ordering - 1));
				$query = new Query(sprintf("UPDATE apo_wiki_contents SET content_ordering=%d WHERE content_id=%d LIMIT 1", $content_ordering - 1, $content_id));
				$query = new Query("commit");
				$page_success .= "<p class=\"success\">Successfully Moved Up the Content</p>";
				$reload = "<script language=\"javascript\" type=\"text/javascript\">window.opener.location.reload(true)</script>";
			}
			else {
				$page_error .= "<p class=\"error\">Cannot Move The Top Object Up</p>";
			}
			break;

		case 'down_toc_content':
			$page_id = $_REQUEST['page_id'];
			$content_id = $temp_id;
			$query = new Query(sprintf("SELECT COUNT(*) as num FROM apo_wiki_contents WHERE page_id=%d and parent_content_id=0 and subcontent_ordering=0", $page_id));
			$row = $query->fetch_row();
			$num = $row['num'];
			$query = new Query(sprintf("SELECT * FROM apo_wiki_contents WHERE content_id=%d", $content_id));
			$row = $query->fetch_row();
			$content_ordering = $row['content_ordering'];
			if ($content_ordering != $num) {
				$query = new Query("start transaction");
				$query = new Query(sprintf("UPDATE apo_wiki_contents SET content_ordering=%d WHERE page_id=%d and content_ordering=%d and parent_content_id=0 and subcontent_ordering=0 LIMIT 1", $content_ordering, $page_id, $content_ordering + 1));
				$query = new Query(sprintf("UPDATE apo_wiki_contents SET content_ordering=%d WHERE content_id=%d LIMIT 1", $content_ordering + 1, $content_id));
				$query = new Query("commit");
				$page_success .= "<p class=\"success\">Successfully Moved Down the Content</p>";
				$reload = "<script language=\"javascript\" type=\"text/javascript\">window.opener.location.reload(true)</script>";
			}
			else {
				$page_error .= "<p class=\"error\">Cannot Move The Bottom Object Down</p>";
			}
			break;

		case 'add_toc_subcontent':
			$page_id = $_REQUEST['page_id'];
			$content_id = $temp_id;
			$query = new Query(sprintf("SELECT COUNT(*) as num FROM apo_wiki_contents WHERE page_id=%d and parent_content_id=%d and content_ordering=0", $page_id, $content_id));
			$row = $query->fetch_row();
			if (!$row) {
				$num = 0;
			}
			else {
				$num = $row['num'];
			}
			$num++;
			$query = new Query("start transaction");
			$query = new Query(sprintf("INSERT INTO apo_wiki_contents SET page_id=%d, parent_content_id=%d, content_ordering=0, subcontent_ordering=%d", $page_id, $content_id, $num));
			$query = new Query("commit");
			$page_success .= "<p class=\"success\">Successfully Added a New Subontent</p>";
			$reload = "<script language=\"javascript\" type=\"text/javascript\">window.opener.location.reload(true)</script>";
			break;

		case 'up_toc_subcontent':
			$page_id = $_REQUEST['page_id'];
			$subcontent_id = $temp_id;
			$query = new Query(sprintf("SELECT * FROM apo_wiki_contents WHERE content_id=%d LIMIT 1", $subcontent_id));
			$row = $query->fetch_row();
			$subcontent_ordering = $row['subcontent_ordering'];
			$parent_content_id = $row['parent_content_id'];
			if ($subcontent_ordering != 1) {
				$query = new Query("start transaction");
				$query = new Query(sprintf("UPDATE apo_wiki_contents SET subcontent_ordering=%d WHERE page_id=%d and subcontent_ordering=%d and parent_content_id=%d and content_ordering=0 LIMIT 1", $subcontent_ordering, $page_id, $subcontent_ordering - 1, $parent_content_id));
				$query = new Query(sprintf("UPDATE apo_wiki_contents SET subcontent_ordering=%d WHERE content_id=%d LIMIT 1", $subcontent_ordering - 1, $subcontent_id));
				$query = new Query("commit");
				$page_success .= "<p class=\"success\">Successfully Moved Up the Subcontent</p>";
				$reload = "<script language=\"javascript\" type=\"text/javascript\">window.opener.location.reload(true)</script>";
			}
			else {
				$page_error .= "<p class=\"error\">Cannot Move The Top Object Up</p>";
			}
			break;

		case 'down_toc_subcontent':
			$page_id = $_REQUEST['page_id'];
			$subcontent_id = $temp_id;
			$query = new Query(sprintf("SELECT * FROM apo_wiki_contents WHERE content_id=%d LIMIT 1", $subcontent_id));
			$row = $query->fetch_row();
			$parent_content_id = $row['parent_content_id'];
			$subcontent_ordering = $row['subcontent_ordering'];
			$query = new Query(sprintf("SELECT COUNT(*) as num FROM apo_wiki_contents WHERE page_id=%d and parent_content_id=%d and content_ordering=0", $page_id, $parent_content_id));
			$row = $query->fetch_row();
			$num = $row['num'];
			if ($subcontent_ordering != $num) {
				$query = new Query("start transaction");
				$query = new Query(sprintf("UPDATE apo_wiki_contents SET subcontent_ordering=%d WHERE page_id=%d and subcontent_ordering=%d and parent_content_id=%d and content_ordering=0 LIMIT 1", $subcontent_ordering, $page_id, $subcontent_ordering + 1, $parent_content_id));
				$query = new Query(sprintf("UPDATE apo_wiki_contents SET subcontent_ordering=%d WHERE content_id=%d LIMIT 1", $subcontent_ordering + 1, $subcontent_id));
				$query = new Query("commit");
				$page_success .= "<p class=\"success\">Successfully Moved Down the Subcontent</p>";
				$reload = "<script language=\"javascript\" type=\"text/javascript\">window.opener.location.reload(true)</script>";
			}
			else {
				$page_error .= "<p class=\"error\">Cannot Move The Bottom Object Down</p>";
			}
			break;

		case 'update_content_description':
			if (isset($_POST['content_description'])) {
				$page_id = $_REQUEST['page_id'];
				$content_id = $_REQUEST['content_id'];
				$content_description = db_safe_string($_POST['content_description']);
				$query = new Query("start transaction");
				$query = new Query(sprintf("UPDATE apo_wiki_contents SET description='%s' WHERE content_id=%d", $content_description, $content_id));
				$query = new Query("commit");
				$page_success .= "<p class=\"success\">Successfully Updated the Content Description</p>";
				$reload = "<script language=\"javascript\" type=\"text/javascript\">window.opener.location.reload(true)</script>";
			}
			else {
				$page_error .= "<p class=\"error\">The Wiki Page Title Cannot Be Empty</p>";
			}
			break;

		case 'create_new_page':
			if (isset($_POST['page_name']) && $_POST['page_name'] != "") {
				$page_id = $_REQUEST['page_id'];
				$page_name = db_safe_string($_POST['page_name']);
				$page_name = db_safe_string($page_name);
				$query = new Query(sprintf("SELECT * FROM apo_wiki_pages WHERE page_id !=%d and page_name='%s'", $page_id, $page_name));
				$row = $query->fetch_row();
				if (!$row) {
					$query = new Query("start transaction");
					$query = new Query(sprintf("INSERT INTO apo_wiki_pages SET page_name='%s', creator_user_id=%d, description=''", $page_name, $g_user->data['user_id']));
					$query = new Query("commit");
					$query = new Query(sprintf("SELECT * FROM apo_wiki_pages WHERE page_name='%s'", $page_name));
					$row = $query->fetch_row();
					$new_page_id = $row['page_id'];
					$page_success .= "<p class=\"success\">Successfully Made a New Page</p>";
					$reload = "<script language=\"javascript\" type=\"text/javascript\">window.opener.location='ggwiki.php?page_id=$new_page_id#home'</script>";
					$reload .= "<script language=\"javascript\" type=\"text/javascript\">window.close()</script>";
				}
				else {
					$page_error .= "<p class=\"error\">There is already a Wiki Page with the same name. Please edit the existing page and add your information or make a new page with a different name. </p>";
				}
			}
			else {
				$page_error .= "<p class=\"error\">Page Title cannot be Empty</p>";
			}
			break;

		case 'add_content_link':
			if (isset($_POST['target_id']) && is_numeric($_POST['target_id']) && isset($_POST['human']) && is_numeric($_POST['human'])) {
				$page_id = $_REQUEST['page_id'];
				$content_id = $_REQUEST['content_id'];
				$target_id = $_POST['target_id'];
				$human = $_POST['human'];
				$query = new Query(sprintf("SELECT * FROM apo_wiki_contents WHERE content_id=%d LIMIT 1", $content_id));
				$row = $query->fetch_row();
				if (!$row) {
					$page_error .= "<p class=\"error\">Content does not exist</p>";
				}
				else {
					if ($human == 0) {
						$query = new Query(sprintf("SELECT * FROM apo_wiki_pages WHERE page_id=%d LIMIT 1", $target_id));
						$row = $query->fetch_row();
						if (!$row) {
							$page_error .= "<p class=\"error\">Target content does not exist</p>";
						}
						else {
							$query = new Query("start transaction");
							$query = new Query(sprintf("UPDATE apo_wiki_contents SET link_id=%d, link_human_type=0 WHERE content_id=%d LIMIT 1", $target_id, $content_id));
							$query = new Query("commit");
							$reload = "<script language=\"javascript\" type=\"text/javascript\">window.opener.location.reload(true)</script>";
							$page_success .= "<p class=\"success\">Successfully Added the Page as a Link</p>";
						}
					}
					elseif ($human == 1) {
						$query = new Query(sprintf("SELECT * FROM apo_users WHERE user_id=%d LIMIT 1", $target_id));
						$row = $query->fetch_row();
						if (!$row) {
							$page_error .= "<p class=\"error\">Target user does not exist</p>";
						}
						else {
							$query = new Query("start transaction");
							$query = new Query(sprintf("UPDATE apo_wiki_contents SET link_id=%d, link_human_type=1 WHERE content_id=%d LIMIT 1", $target_id, $content_id));
							$query = new Query("commit");
							$reload = "<script language=\"javascript\" type=\"text/javascript\">window.opener.location.reload(true)</script>";
							$page_success .= "<p class=\"success\">Successfully Added the User as a Link</p>";
						}
					}
					else {
						$page_error .= "<p class=\"error\">Unknown human field</p>";
					}

				}
			}
			else {
				$page_error .= "<p class=\"error\">Some field is not set</p>";
			}
			break;

		case 'delete_content_link':
			$page_id = $_REQUEST['page_id'];
			$content_id = $_REQUEST['content_id'];
			$query = new Query(sprintf("SELECT * FROM apo_wiki_contents WHERE content_id=%d LIMIT 1", $content_id));
			$row = $query->fetch_row();
			if (!$row) {
				$page_error .= "<p class=\"error\">Content does not exist to delete</p>";
			}
			else {
				$query = new Query("start transaction");
				$query = new Query(sprintf("UPDATE apo_wiki_contents SET link_id=0, link_human_type=0 WHERE content_id=%d LIMIT 1", $content_id));
				$query = new Query("commit");
				$reload = "<script language=\"javascript\" type=\"text/javascript\">window.opener.location.reload(true)</script>";
				$page_success .= "<p class=\"success\">Successfully Deleted Link</p>";
			}
			break;

		case 'update_main_human':
			if (isset($_POST['user_description'])) {
				$user_id = $_REQUEST['user_id'];
				$user_description = db_safe_string($_POST['user_description']);
				$query = new Query(sprintf("SELECT * FROM apo_users WHERE user_id=%d", $user_id));
				$row = $query->fetch_row();
				if (!$row) {
					$page_error .= "<p class=\"error\">The User ID does not exist. </p>";
				}
				else {
					$query = new Query(sprintf("SELECT * FROM apo_wiki_user_description WHERE user_id=%d", $user_id));
					$row = $query->fetch_row();
					if (!$row) {
						$query = new Query("start transaction");
						$query = new Query(sprintf("INSERT INTO apo_wiki_user_description SET user_id=%d, description='%s'", $user_id, $user_description));
						$query = new Query("commit");
					}
					else {
						$query = new Query("start transaction");
						$query = new Query(sprintf("UPDATE apo_wiki_user_description SET description='%s' WHERE user_id=%d", $user_description, $user_id));
						$query = new Query("commit");
					}
					$page_success .= "<p class=\"success\">Successfully updated the User Bio</p>";
					$reload = "<script language=\"javascript\" type=\"text/javascript\">window.opener.location.reload(true)</script>";
				}
			}
			else {
				$page_error .= "<p class=\"error\">There is no description to update</p>";
			}
			break;

		case 'add_position_type':
			$this_year = date("Y") + 1;
			if ($g_user->permit("wiki editing") && isset($_POST['position_select']) && is_numeric($_POST['position_select']) && $_POST['position_select'] > 0 && $_POST['position_select'] <= 14 && ($_POST['semester'] == 0 || $_POST['semester'] == 1) && ($_POST['year'] <= $this_year && $_POST['year'] >= $this_year - 21)) {
				$content_id = $_REQUEST['content_id'];
				$query = new Query(sprintf("SELECT COUNT(*) as num FROM apo_wiki_positions_basic_info WHERE content_id=%d", $content_id));
				$row = $query->fetch_row();
				if (!$row) {
					$num = 0;
				}
				else {
					$num = $row['num'];
				}
				$num++;
				$query = new Query(sprintf("SELECT * FROM apo_wiki_positions_controller WHERE position_type=%d", $_POST['position_select']));
				$row = $query->fetch_row();
				$query = new Query("start transaction");
				$query = new Query(sprintf("INSERT INTO apo_wiki_positions_basic_info SET content_id=%d, position_type=%d, ordering=%d, position_name='%s', semester=%d, year=%d", $content_id, $_POST['position_select'], $num, $row['position_name'], $_POST['semester'], $_POST['year']));
				$query = new Query("commit");
				$query = new Query(sprintf("SELECT * FROM apo_wiki_positions_basic_info WHERE content_id=%d and ordering=%d", $content_id, $num));
				$row = $query->fetch_row();
				$basic_info_id = $row['basic_info_id'];
				$reload = "<script language=\"javascript\" type=\"text/javascript\">window.location = \"ggwiki_edit.php?function=edit_position_description&content_id=$content_id&basic_info_id=$basic_info_id\"</script>";
			}
			else {
				$page_error .= "<p class=\"error\">Unknown Inputs</p>";
			}
			break;

		case 'up_position':
			if ($g_user->permit("wiki editing") && isset($_POST['basic_info_id']) && is_numeric($_POST['basic_info_id'])) {
				$basic_info_id = $_POST['basic_info_id'];
				$query = new Query(sprintf("SELECT * FROM apo_wiki_positions_basic_info WHERE basic_info_id=%d", $basic_info_id));
				$row = $query->fetch_row();
				if (!$row) {
					$page_error .= "<p class=\"error\"> This Basic Info ID does not exist</p>";
				}
				else {
					if ($row['ordering'] != 1) {
						$query = new Query("start transaction");
						$query = new Query(sprintf("UPDATE apo_wiki_positions_basic_info SET ordering=%d WHERE content_id=%d and ordering=%d LIMIT 1", $row['ordering'], $row['content_id'], $row['ordering'] - 1));
						$query = new Query(sprintf("UPDATE apo_wiki_positions_basic_info SET ordering=%d WHERE basic_info_id=%d LIMIT 1", $row['ordering'] - 1, $row['basic_info_id']));
						$query = new Query("commit");
						$reload = "<script language=\"javascript\" type=\"text/javascript\">window.opener.location.reload(true)</script>";
						$page_success .= "<p class=\"success\">Successfully Moved Up The Position</p>";
					}
					else {
						$page_error .= "<p class=\"error\"> You can't move the top object up</p>";
					}
				}

			}
			else {
				$page_error .= "<p class=\"error\">Basic Info ID was not valid</p>";
			}
			break;

		case 'down_position':
			if ($g_user->permit("wiki editing") && isset($_POST['basic_info_id']) && is_numeric($_POST['basic_info_id'])) {
				$basic_info_id = $_POST['basic_info_id'];
				$content_id = $_REQUEST['content_id'];
				$query = new Query(sprintf("SELECT COUNT(*) as num FROM apo_wiki_positions_basic_info WHERE content_id=%d", $content_id));
				$row = $query->fetch_row();
				$num = $row['num'];
				$query = new Query(sprintf("SELECT * FROM apo_wiki_positions_basic_info WHERE basic_info_id=%d", $basic_info_id));
				$row = $query->fetch_row();
				if (!$row) {
					$page_error .= "<p class=\"error\"> This Basic Info ID does not exist</p>";
				}
				else {
					if ($row['ordering'] != $num) {
						$query = new Query("start transaction");
						$query = new Query(sprintf("UPDATE apo_wiki_positions_basic_info SET ordering=%d WHERE content_id=%d and ordering=%d LIMIT 1", $row['ordering'], $row['content_id'], $row['ordering'] + 1));
						$query = new Query(sprintf("UPDATE apo_wiki_positions_basic_info SET ordering=%d WHERE basic_info_id=%d LIMIT 1", $row['ordering'] + 1, $row['basic_info_id']));
						$query = new Query("commit");
						$reload = "<script language=\"javascript\" type=\"text/javascript\">window.opener.location.reload(true)</script>";
						$page_success .= "<p class=\"success\">Successfully Moved Down The Position</p>";
					}
					else {
						$page_error .= "<p class=\"error\"> You can't move the bottom object down</p>";
					}
				}

			}
			else {
				$page_error .= "<p class=\"error\">Basic Info ID was not valid</p>";
			}
			break;

		case 'delete_position':
			if ($g_user->permit("wiki editing") && isset($_POST['basic_info_id']) && is_numeric($_POST['basic_info_id'])) {
				$basic_info_id = $_POST['basic_info_id'];
				$query = new Query(sprintf("SELECT * FROM apo_wiki_positions_basic_info WHERE basic_info_id=%d", $basic_info_id));
				$row = $query->fetch_row();
				if (!$row) {
					$page_error .= "<p class=\"error\"> This Basic Info ID does not exist</p>";
				}
				else {
					$ordering = $row['ordering'];
					$content_id = $row['content_id'];
					$query = new Query("start transaction");
					$query = new Query(sprintf("DELETE FROM apo_wiki_positions_basic_info WHERE basic_info_id=%d LIMIT 1", $basic_info_id));
					$query = new Query(sprintf("DELETE FROM apo_wiki_positions WHERE basic_info_id=%d", $basic_info_id));
					$query = new Query(sprintf("UPDATE apo_wiki_positions_basic_info SET ordering = ordering - 1 WHERE content_id=%d and ordering > %d", $content_id, $ordering));
					$query = new Query("commit");
					$page_success .= "<p class=\"success\">Successfully Deleted the Position</p>";
					$reload = "<script language=\"javascript\" type=\"text/javascript\">window.opener.location.reload(true)</script>";
				}

			}
			else {
				$page_error .= "<p class=\"error\">Basic Info ID was not valid</p>";
			}
			break;

		case 'update_position_basic_info':
			$this_year = date("Y") + 1;
			if ($g_user->permit("wiki editing") && ($_POST['semester'] == 0 || $_POST['semester'] == 1) && ($_POST['year'] <= $this_year && $_POST['year'] >= $this_year - 21) && is_numeric($_POST['basic_info_id']) && $_POST['position_name'] != "") {
				if ($_POST['position_name'] == "other") {
					$position_name = $_POST['other'];
				}
				else {
					$position_name = $_POST['position_name'];
				}
				$query = new Query("start transaction");
				$query = new Query(sprintf("UPDATE apo_wiki_positions_basic_info SET semester=%d, year=%d, position_name='%s' WHERE basic_info_id=%d", $_POST['semester'], $_POST['year'], $position_name, $_POST['basic_info_id']));
				$query = new Query("commit");
				$page_success .= "<p class=\"success\">Successfully Updated the Position</p>";
				$reload = "<script language=\"javascript\" type=\"text/javascript\">window.opener.location.reload(true)</script>";
			}
			else {
				$page_error .= "<p class=\"error\">A field was not valid</p>";
			}
			break;

		case 'add_person_position':
			if ($g_user->permit("wiki editing") && is_numeric($_POST['basic_info_id'])) {
				$basic_info_id = $_POST['basic_info_id'];
				$query = new Query(sprintf("SELECT * FROM apo_wiki_positions_basic_info WHERE basic_info_id=%d", $basic_info_id));
				$row = $query->fetch_row();
				if (!$row) {
					$page_error .= "<p class=\"error\">Basic Info ID does not exist</p>";
				}
				else {
					$position_title = $row['position_name'];
					$query = new Query(sprintf("SELECT COUNT(*) as num FROM apo_wiki_positions WHERE basic_info_id=%d", $basic_info_id));
					$row = $query->fetch_row();
					$num = $row['num'];
					if (!$row) {
						$num = 0;
					}
					else {
						$num = $row['num'];
					}
					$num++;
					$query = new Query("start transaction");
					$query = new Query(sprintf("INSERT INTO apo_wiki_positions SET user_id=0, position_title='%s', ordering=%d, basic_info_id=%d", $position_title, $num, $basic_info_id));
					$query = new Query("commit");
					$page_success .= "<p class=\"success\">Successfully Added a Human</p>";
					$reload = "<script language=\"javascript\" type=\"text/javascript\">window.opener.location.reload(true)</script>";
				}
			}
			else {
				$page_error .= "<p class=\"error\">Basic Info ID was not set</p>";
			}
			break;

		case 'delete_person_position':
			if ($g_user->permit("wiki editing") && isset($_POST['position_id']) && is_numeric($_POST['position_id'])) {
				$position_id = $_POST['position_id'];
				$query = new Query(sprintf("SELECT * FROM apo_wiki_positions WHERE position_id=%d", $position_id));
				$row = $query->fetch_row();
				if (!$row) {
					$page_error .= "<p class=\"error\"> This Position ID does not exist</p>";
				}
				else {
					$ordering = $row['ordering'];
					$basic_info_id = $row['basic_info_id'];
					$query = new Query("start transaction");
					$query = new Query(sprintf("DELETE FROM apo_wiki_positions WHERE position_id=%d LIMIT 1", $position_id));
					$query = new Query(sprintf("UPDATE apo_wiki_positions SET ordering = ordering - 1 WHERE basic_info_id=%d and ordering > %d", $basic_info_id, $ordering));
					$query = new Query("commit");
					$page_success .= "<p class=\"success\">Successfully Deleted the Person</p>";
					$reload = "<script language=\"javascript\" type=\"text/javascript\">window.opener.location.reload(true)</script>";
				}

			}
			else {
				$page_error .= "<p class=\"error\">Position ID was not valid</p>";
			}
			break;

		case 'update_people':
			if ($g_user->permit("wiki editing") && isset($_REQUEST['basic_info_id']) && is_numeric($_REQUEST['basic_info_id'])) {
				$basic_info_id = $_REQUEST['basic_info_id'];
				$query = new Query(sprintf("SELECT * FROM apo_wiki_positions WHERE basic_info_id=%d ORDER BY ordering ASC", $basic_info_id));
				while ($row = $query->fetch_row()) {
					$title = "title_" . $row['position_id'];
					$position_title = $_POST[$title];
					$up_query = new Query("start transaction");
					$up_query = new Query(sprintf("UPDATE apo_wiki_positions SET position_title='%s' WHERE position_id=%d", $position_title, $row['position_id']));
					$up_query = new Query("commit");
				}
				$page_success .= "<p class=\"success\">Successfully Saved the Names</p>";
				$reload = "<script language=\"javascript\" type=\"text/javascript\">window.opener.location.reload(true)</script>";
			}
			else {
				$page_error .= "<p class=\"error\">Basic Info ID was not set</p>";
			}
			break;

		case 'delete_person':
			$position_id = $temp_id;
			$query = new Query(sprintf("SELECT * FROM apo_wiki_positions WHERE position_id=%d", $position_id));
			$row = $query->fetch_row();
			if (!$row) {
				$page_error .= "<p class=\"error\"> This Position ID does not exist</p>";
			}
			else {
				$ordering = $row['ordering'];
				$basic_info_id = $row['basic_info_id'];
				$query = new Query("start transaction");
				$query = new Query(sprintf("DELETE FROM apo_wiki_positions WHERE position_id=%d LIMIT 1", $position_id));
				$query = new Query(sprintf("UPDATE apo_wiki_positions SET ordering = ordering - 1 WHERE basic_info_id=%d and ordering > %d", $basic_info_id, $ordering));
				$query = new Query("commit");
				$page_success .= "<p class=\"success\">Successfully Deleted the Person</p>";
				$reload = "<script language=\"javascript\" type=\"text/javascript\">window.opener.location.reload(true)</script>";
			}
			break;

		case 'give_human_position':
			if ($g_user->permit("wiki editing") && isset($_POST['target_id']) && is_numeric($_POST['target_id']) && isset($_REQUEST['basic_info_id']) && is_numeric($_REQUEST['basic_info_id'])) {
				$target_id = $_POST['target_id'];
				$basic_info_id = $_REQUEST['basic_info_id'];	
				$query = new Query(sprintf("SELECT * FROM apo_users WHERE user_id=%d", $target_id));
				$row = $query->fetch_row();
				if (!$row) {
					$page_error .= "<p class=\"error\"> This Target ID does not exist</p>";
				}
				else {
					$query = new Query(sprintf("SELECT COUNT(*) as num FROM apo_wiki_positions WHERE basic_info_id=%d", $basic_info_id));
					$row = $query->fetch_row();
					if (!$row) {
						$num = 0;
						}
					else {
						$num = $row['num'];
					}
					$num++;
					$query = new Query(sprintf("SELECT * FROM apo_wiki_positions_basic_info WHERE basic_info_id=%d", $basic_info_id));
					$row = $query->fetch_row();
					if ($row['position_type'] == 4) {
						$position_title = "Leadership Committee Trainer";
					}
					elseif ($row['position_type'] == 3) {
						$position_title = "President";
					}
					elseif ($row['position_type'] == 5) {
						$position_title = "";
					}
					elseif ($row['position_type'] == 6) {
						$position_title = "Committee Member";
					}
					elseif ($row['position_type'] == 9 || $row['position_type'] == 10) {
						$position_title = "CM1";
					}
					elseif ($row['position_type'] == 11) {
						$position_title = "Little";
					}
					elseif ($row['position_type'] == 12) {
						$position_title = "Kid";
					}
					elseif ($row['position_type'] == 14) {
						$position_title = "Associate Member";
					}
					else {
						$position_title = $row['position_name'];
					}
					$position_type = $row['position_type'];
					$query = new Query("start transaction");
					$query = new Query(sprintf("INSERT INTO apo_wiki_positions SET user_id=%d, position_title='%s', ordering=%d, basic_info_id=%d, position_type=%d", $target_id, $position_title, $num, $basic_info_id, $position_type));
					$query = new Query("commit");
					$page_success .= "<p class=\"success\">Successfully Added the Person</p>";
					$reload = "<script language=\"javascript\" type=\"text/javascript\">window.opener.location.reload(true)</script>";
				}
			}
			else {
				$page_error .= "<p class=\"error\">Position ID or Basic Info ID is not set</p>";
			}
			break;

		case 'up_person':
			$position_id = $temp_id;
			$query = new Query(sprintf("SELECT * FROM apo_wiki_positions WHERE position_id=%d", $position_id));
			$row = $query->fetch_row();
			if (!$row) {
				$page_error .= "<p class=\"error\"> This Position ID does not exist</p>";
			}
			else {
				if ($row['ordering'] != 1) {
					$query = new Query("start transaction");
					$query = new Query(sprintf("UPDATE apo_wiki_positions SET ordering=%d WHERE basic_info_id=%d and ordering=%d", $row['ordering'], $row['basic_info_id'], $row['ordering'] - 1));
					$query = new Query(sprintf("UPDATE apo_wiki_positions SET ordering=%d WHERE position_id=%d", $row['ordering'] - 1, $position_id));
					$query = new Query("commit");
					$reload = "<script language=\"javascript\" type=\"text/javascript\">window.opener.location.reload(true)</script>";
					$page_success .= "<p class=\"success\">Successfully Moved Up The Person</p>";
				}
				else {
					$page_error .= "<p class=\"error\"> You can't move the top object up</p>";
				}
			}
			break;

		case 'down_person':
			$position_id = $temp_id;
			$query = new Query(sprintf("SELECT * FROM apo_wiki_positions WHERE position_id=%d", $position_id));
			$row = $query->fetch_row();
			$ordering = $row['ordering'];
			$basic_info_id = $row['basic_info_id'];
			$query = new Query(sprintf("SELECT COUNT(*) as num FROM apo_wiki_positions WHERE basic_info_id=%d", $basic_info_id));;
			$row = $query->fetch_row();
			$num = $row['num'];
			if ($ordering != $num) {
				$query = new Query("start transaction");
				$query = new Query(sprintf("UPDATE apo_wiki_positions SET ordering=%d WHERE basic_info_id=%d and ordering=%d", $ordering, $basic_info_id, $ordering + 1));
				$query = new Query(sprintf("UPDATE apo_wiki_positions SET ordering=%d WHERE position_id=%d", $ordering + 1, $position_id));
				$query = new Query("commit");
				$reload = "<script language=\"javascript\" type=\"text/javascript\">window.opener.location.reload(true)</script>";
				$page_success .= "<p class=\"success\">Successfully Moved Down The Person</p>";
			}
			else {
				$page_error .= "<p class=\"error\"> You can't move the bottom object down</p>";
			}
			break;

		case 'delete_old_page':
			$page_id = $_REQUEST['page_id'];
			if ($page_id == 1) {
				$page_error .= "<p class=\"error\">This is the home page id. Cannot delete it</p>";
				break;
			}
			$query = new Query(sprintf("SELECT * FROM apo_wiki_pages WHERE page_id='%d'", $page_id));
			$row = $query->fetch_row();
			if ($row) {
				$query = new Query("start transaction");
				$query = new Query(sprintf("DELETE FROM apo_wiki_pages WHERE page_id='%d'", $page_id));
				$query = new Query(sprintf("DELETE FROM apo_wiki_pages_info WHERE page_id='%d'", $page_id));
				$query = new Query("commit");	
				$query = new Query(sprintf("SELECT * FROM apo_wiki_contents WHERE page_id='%d'", $page_id));
				while ($row = $query->fetch_row()) {
					$content_id = $row['content_id'];
					$queryPBI = new Query(sprintf("SELECT * FROM apo_wiki_positions_basic_info WHERE content_id='%d'", $content_id));
					while ($rowPBI = $queryPBI->fetch_row()) {
						$basic_info_id = $rowPBI['basic_info_id'];
						$queryP = new Query("start transaction");
						$queryP = new Query(sprintf("DELETE FROM apo_wiki_positions WHERE basic_info_id='%d'", $basic_info_id));
						$queryP = new Query("commit");	
					}
					$queryPBI = new Query("start transaction");
					$queryPBI = new Query(sprintf("DELETE FROM apo_wiki_positions_basic_info WHERE content_id='%d'", $content_id));
					$queryPBI = new Query("commit");	
				}
				$query = new Query("start transaction");
				$query = new Query(sprintf("DELETE FROM apo_wiki_contents WHERE page_id='%d'", $page_id));
				$query = new Query("commit");
				if (file_exists("./ggwiki_images/" . $page_id . ".jpg")) {
					unlink("./ggwiki_images/" . $page_id . ".jpg");
				} 
				else if (file_exists("./ggwiki_images/" . $page_id . ".png")) {
					unlink("./ggwiki_images/" . $page_id . ".png");
				}
				$page_success .= "<p class=\"success\">Successfully Deleted The Page</p>";
				$reload = "<script language=\"javascript\" type=\"text/javascript\">window.opener.location='ggwiki.php#home'</script>";
				$reload .= "<script language=\"javascript\" type=\"text/javascript\">window.close()</script>";
			}
			else {
				$page_error .= "<p class=\"error\">This Page ID Does Not Exist. </p>";
			}
			break;

		default:
			$page_error .= "<p class=\"error\">This Update Function Does Not Exist</p>";
		}
	}

	if (is_uploaded_file($_FILES["upfile"]["tmp_name"])) {
		if ($file = getimagesize($_FILES["upfile"]["tmp_name"])) {
			$page_id = $_REQUEST['page_id'];
			$reload = "<script language=\"javascript\" type=\"text/javascript\">window.opener.location.reload(true)</script>";
			if($_FILES["upfile"]["size"] <= 1000000 && $file[2] == IMAGETYPE_PNG) {
				if (file_exists("./ggwiki_images/" . $page_id . ".jpg")) {
					unlink("./ggwiki_images/" . $page_id . ".jpg");
				} 
				if (move_uploaded_file($_FILES["upfile"]["tmp_name"], "ggwiki_images/" . $page_id . ".png")) {
					chmod("files/" . $page_id . ".png", 0644);
					$name = $_FILES["upfile"]["name"];
					$page_success .= "<p class=\"success\">$name upload successful</p>";
				} 
				else {
					$page_error .= "<p class=\"error\">Cannot upload the Image for an unknown reason</p>";
				}
			} 
			else if ($_FILES["upfile"]["size"] <= 1000000 && $file[2] == IMAGETYPE_JPEG) { 
				if (file_exists("./ggwiki_images/" . $page_id . ".png")) {
					unlink("./ggwiki_images/" . $page_id . ".png");
				}
				if (move_uploaded_file($_FILES["upfile"]["tmp_name"], "ggwiki_images/" . $page_id . ".jpg")) {
					chmod("files/" . $page_id . ".jpg", 0644);
					$name = $_FILES["upfile"]["name"];
					$page_success .= "<p class=\"success\">$name upload successful</p>";
				} 
				else {
					$page_error .= "<p class=\"error\">Cannot upload the Image for an unknown reason</p>";
				}
		  	} 
			else {
				$page_error .= "<p class=\"error\">The image size is too big or the image is not .jpg or .png</p>";
			}
		}
		else {
			$page_error .= "<p class=\"error\">You did not upload an image</p>";
		}
	}

	if (isset($_REQUEST['function']) && $_REQUEST['function']) {
		switch ($_REQUEST['function']) {
		case 'edit_main':
			if (isset($_REQUEST['page_id']) && is_numeric($_REQUEST['page_id'])) {
				$query = new Query(sprintf("SELECT * FROM apo_wiki_pages WHERE page_id=%d LIMIT 1", $_REQUEST['page_id']));
				$row = $query->fetch_row();
				if (!$row) {
					$page_error .= "<p class=\"error\">This Page ID Does Not Exist</p>";
				}
				else {
					$main = $row['page_name'];
					$description = html_entity_decode(str_replace("<br />", "\r\n", $row['description']), ENT_QUOTES, 'UTF-8');
					$edit = "";
					$edit .= "<form action=\"#\" method=\"post\">";
					$edit .= "<div class=\"edittable\">";
					$edit .= "<b>Page Title: </b><br />";
					$edit .= "<input type=\"text\" name=\"main_name\" value=\"$main\" size=\"60\" />";
					$edit .= "</div>";
					$edit .= "<div class=\"edittable\">";
					$edit .= "<b>Page Description: </b>";
					$edit .= "<textarea class=\"description\" name=\"main_description\">$description</textarea>";
					$edit .= "</div>";
					$edit .= "<button type=\"submit\" name=\"update\" value=\"update_main\" onclick=\"return confirm('Are you sure you want to SAVE these changes?')\"> Save Changes </button>";
					$edit .= "</form>";
					$edit .= "<button id=\"link_button\" onclick=\"link_explanation()\"> How to put links </button> <p id=\"link_explanation\"></p>";
				}
			}
			else {
				$page_error .= "<p class=\"error\">No Page ID Or User ID Was Selected</p>";
			}
			break;

		case 'edit_right_top':
			if (isset($_REQUEST['page_id']) && is_numeric($_REQUEST['page_id'])) {
				$query = new Query(sprintf("SELECT * FROM apo_wiki_pages WHERE page_id=%d LIMIT 1", $_REQUEST['page_id']));
				$row = $query->fetch_row();
				if (!$row) {
					$page_error .= "<p class=\"error\">This Page ID Does Not Exist</p>";
				}
				else {
					$query = new Query(sprintf("SELECT * FROM apo_wiki_pages_info WHERE page_id=%d ORDER BY ordering ASC", $_REQUEST['page_id']));
					$counter = 1;
					$edit = "";
					$edit .= "<form action=\"#\" method=\"post\">";
					while ($row = $query->fetch_row()) {
						$key = $row['info_key'];
						$value = $row['info_value'];
						$info_id = $row['info_id'];
						$edit .= "<div class=\"edittable\">";
						$edit .= "<b>Key: </b>";
						$edit .= "<input type=\"text\" name=\"key_$counter\" value=\"$key\" size=\"53\" /><br />";
						$edit .= "<b>Value: </b>";
						$edit .= "<input type=\"text\" name=\"value_$counter\" value=\"$value\" size=\"51\" /><br />";
						$edit .= "<button type=\"submit\" name=\"update\" value=\"delete_right_top_$info_id\" onclick=\"return confirm('Are you sure you want to DELETE this Key/Value pair?')\"> Delete this Key/Value Pair </button><br />";
						$edit .= "<button type=\"submit\" name=\"update\" value=\"up_right_top_$info_id\" onclick=\"return confirm('Are you sure you want to MOVE this Key/Value pair UP?')\"> Move Up One in the list</button>";
						$edit .= "<button type=\"submit\" name=\"update\" value=\"down_right_top_$info_id\" onclick=\"return confirm('Are you sure you want to MOVE this Key/Value pair DOWN?')\"> Move Down One in the list</button>";
						$edit .= "</div>";
						$counter++;
					}
					$edit .= "<button type=\"submit\" name=\"update\" value=\"update_right_top\" onclick=\"return confirm('Are you sure you want to SAVE these changes?')\"> Save Changes </button>";
					$edit .= "</form>";

					$edit .= "<form action=\"#\" method=\"post\"><button type=\"submit\" name=\"update\" value=\"add_right_top\" onclick=\"return confirm('Are you sure you want to ADD a new Key/Value pair?')\"> Add a new Key/Value Pair </button></form>";

					$edit .= "<form action=\"#\" method=\"post\" enctype=\"multipart/form-data\"><div class=\"pic\">Upload the Picture for this Wiki Page <br />(Under 1000KB and has to be either .jpg or .png)<br /></div><input type=\"file\" name=\"upfile\" size=\"30\" /><br /><input type=\"submit\" value=\"Upload\" /></form>";

				}
			}
			else {
				$page_error .= "<p class=\"error\">No Page ID Or User ID Was Selected</p>";
			}
			break;

		case 'edit_toc':
			if (isset($_REQUEST['page_id']) && is_numeric($_REQUEST['page_id'])) {
				$page_id = $_REQUEST['page_id'];
				$query = new Query(sprintf("SELECT * FROM apo_wiki_pages WHERE page_id=%d LIMIT 1", $page_id));
				$row = $query->fetch_row();
				if (!$row) {
					$page_error .= "<p class=\"error\">This Page ID Does Not Exist</p>";
				}
				else {
					$query = new Query(sprintf("SELECT * FROM apo_wiki_contents WHERE page_id=%d and parent_content_id=0 and subcontent_ordering=0 ORDER BY content_ordering ASC", $page_id));
					$edit = "";
					$edit .= "<form action=\"#\" method=\"post\">";
					$counter = 1;
					while ($row = $query->fetch_row()) {
						$content_name = $row['content_name'];
						$content_id = $row['content_id'];
						$edit .= "<div class=\"content_edittable\">";
						$edit .= "<div class=\"edittable\">";
						$edit .= "<b>Content Name: </b><br />";
						$edit .= "<input type=\"text\" name=\"content_name_$counter\" value=\"$content_name\" size=\"60\" /><br />";
						$edit .= "<button type=\"submit\" name=\"update\" value=\"delete_toc_content_$content_id\" onclick=\"return confirm('Are you sure you want to DELETE this Content?')\"> Delete this Content </button><br />";
						$edit .= "<button type=\"submit\" name=\"update\" value=\"up_toc_content_$content_id\" onclick=\"return confirm('Are you sure you want to MOVE this Content UP?')\"> Move Up One in the list</button>";
						$edit .= "<button type=\"submit\" name=\"update\" value=\"down_toc_content_$content_id\" onclick=\"return confirm('Are you sure you want to MOVE this Content DOWN?')\"> Move Down One in the list</button>";
						$edit .= "</div>";
						$subquery = new Query(sprintf("SELECT * FROM apo_wiki_contents WHERE page_id=%d and parent_content_id=%d and content_ordering=0 ORDER BY subcontent_ordering ASC", $page_id, $content_id));
						$subcounter= 1;
						while ($subrow = $subquery->fetch_row()) {
							$subcontent_id = $subrow['content_id'];
							$post_number = $counter . "_" . $subcounter;
							$subcontent_name = $subrow['content_name'];
							$edit .= "<div class=\"subcontent_edittable\">";
							$edit .= "<b>Subcontent Name: </b><br />";
							$edit .= "<input type=\"text\" name=\"subcontent_name_$post_number\" value=\"$subcontent_name\" size=\"56\" /><br />";
							$edit .= "<button type=\"submit\" name=\"update\" value=\"delete_toc_subcontent_$subcontent_id\" onclick=\"return confirm('Are you sure you want to DELETE this Subcontent?')\"> Delete this Subcontent </button><br />";
							$edit .= "<button type=\"submit\" name=\"update\" value=\"up_toc_subcontent_$subcontent_id\" onclick=\"return confirm('Are you sure you want to MOVE this Subcontent UP?')\"> Move Up One in the list</button>";
							$edit .= "<button type=\"submit\" name=\"update\" value=\"down_toc_subcontent_$subcontent_id\" onclick=\"return confirm('Are you sure you want to MOVE this Subcontent DOWN?')\"> Move Down One in the list</button>";
							$edit .= "</div>";
							$subcounter++;
						}
						$edit .= "<button class=\"subcontent_button\"type=\"submit\" name=\"update\" value=\"add_toc_subcontent_$content_id\" onclick=\"return confirm('Are you sure you want to ADD a Subcontent?')\"> Add a Subcontent </button>";
						$counter++;
						$edit .= "</div>";
					}
					$edit .= "<button class=\"top_button\" type=\"submit\" name=\"update\" value=\"update_toc\" onclick=\"return confirm('Are you sure you want to SAVE these changes?')\"> Save Changes </button><br />";
					$edit .= "<button type=\"submit\" name=\"update\" value=\"add_toc\" onclick=\"return confirm('Are you sure you want to ADD a new Content?')\"> Add a new Content </button>";
					$edit .= "</form>";
				}
			}
			else {
				$page_error .= "<p class=\"error\">No Page ID Or User ID Was Selected</p>";
			}
			break;

		case 'edit_content_description':
			if (isset($_REQUEST['page_id']) && is_numeric($_REQUEST['page_id']) && isset($_REQUEST['content_id']) && is_numeric($_REQUEST['content_id'])) {
				$page_id = $_REQUEST['page_id'];
				$content_id = $_REQUEST['content_id'];
				$query = new Query(sprintf("SELECT * FROM apo_wiki_contents WHERE content_id=%d LIMIT 1", $content_id));
				$row = $query->fetch_row();	
				if (!$row) {
					$page_error .= "<p class=\"error\">This Content ID Does Not Exist</p>";
				}
				else {
					$content_name = $row['content_name'];
					$description = $row['description'];
					$description = html_entity_decode(str_replace("<br />", "\r\n", $description), ENT_QUOTES, 'UTF-8');
					$edit = "";
					$edit .= "<div class=\"edittable\">";
					$query = new Query(sprintf("SELECT * FROM apo_wiki_contents WHERE content_id=%d", $content_id));
					$row = $query->fetch_row();
					$link_id = $row['link_id'];
					$link_human_type = $row['link_human_type'];
					$edit .= "<b>Add a link to a related GG Wiki article (type in the Page Title, if the autofill does not work, try using another browser): </b>";
					$edit .= "<div class=\"search_wrapper\">";
					if ($link_id != 0) {
						if ($link_human_type == 0) {
							$query = new Query(sprintf("SELECT * FROM apo_wiki_pages WHERE page_id=%d", $link_id));
							$row = $query->fetch_row();
							$link_name = $row['page_name'];
						}
						else {
							$query = new Query(sprintf("SELECT * FROM apo_users WHERE user_id=%d", $link_id));
							$row = $query->fetch_row();
							$link_name = $row['firstname'] . " " . $row['lastname'];
						}
						$edit .= "<input type=\"text\" id=\"search_input\" name=\"added_link\" value=\"$link_name\" size=\"60\" onclick=\"search_help(this.value, $page_id, $content_id, 0)\" onkeyup=\"search_help(this.value, $page_id, $content_id, event)\" autocomplete=\"off\" />";						}
					else {
						$edit .= "<input type=\"text\" id=\"search_input\" name=\"added_link\" size=\"60\" onclick=\"search_help(this.value, $page_id, $content_id, 0)\" onkeyup=\"search_help(this.value, $page_id, $content_id, event)\" autocomplete=\"off\" />";
					}
					$edit .= "<div id=\"search_help\"></div>";
					$edit .= "</div>";
					$edit .= "<form action=\"#\" method=\"post\">";
					$edit .= "<button type=\"submit\" name=\"update\" value=\"delete_content_link\" onclick=\"return confirm('Do you want to REMOVE your current link?')\"> Remove the link </button>";
					$edit .= "</form>";
					$edit .= "</div>";
					$edit .= "<form action=\"#\" method=\"post\">";
					$edit .= "<div class=\"edittable\">";
					$edit .= "<b>$content_name Description: </b><br />";
					$edit .= "<textarea class=\"description\" name=\"content_description\">$description</textarea>";
					$edit .= "</div>";
					$edit .= "<button type=\"submit\" name=\"update\" value=\"update_content_description\" onclick=\"return confirm('Are you sure you want to SAVE these changes?')\"> Save Changes </button>";
					$edit .= "</form>";
					$edit .= "<button id=\"link_button\" onclick=\"link_explanation()\"> How to put links </button> <p id=\"link_explanation\"></p>";
					$content_id = $_REQUEST['content_id'];
					$edit .= "<form action=\"#\" method=\"post\">";
					if ($g_user->permit("wiki editing")) {
						$edit .= "<div class=\"edittable\">";
						$edit .= "<b>Add a new position related to this section: </b>";
						$edit .= "<select name=\"position_select\">";
						$query = new Query(sprintf("SELECT * FROM apo_wiki_positions_controller ORDER BY ordering ASC"));
						while ($row = $query->fetch_row()) {
							$id = $row['position_type'];
							$title = $row['position_name'];
							$edit .= "<option value=\"$id\">$title</option>";
						}
						$edit .= "</select><br />";
						$current_month = date("M");
						if ($current_month < 6) {
						  $edit .= "<b>Semester: </b><select name=\"semester\"><option value=\"0\" selected=\"selected\">Spring</option><option value=\"1\">Fall</option></select><br />";
						}
						else {
						  $edit .= "<b>Semester: </b><select name=\"semester\"><option value=\"0\">Spring</option><option value=\"1\" selected=\"selected\">Fall</option></select><br />";
						}
						$current_year = date("Y");
						$edit .= "<b>Year: </b><select name=\"year\">";
						for ($i = $current_year + 1; $i >= $current_year - 20; $i--) {
							if ($i == $current_year) {
								$edit .= "<option value=\"$i\" selected=\"selected\">$i</option>";
							}
							else {
								$edit .= "<option value=\"$i\">$i</option>";
							}
						}
						$edit .= "</select><br />";
						$edit .= "<button type=\"submit\" name=\"update\" value=\"add_position_type\" onclick=\"return confirm('Are you sure you want to ADD this position?')\"> Add This Position </button>";
						$edit .= "</div>";
						$edit .= "</form>";
						$edit .= "<br />";
						$query = new Query(sprintf("SELECT * FROM apo_wiki_positions_basic_info WHERE content_id=%d ORDER BY ordering ASC", $content_id));
						while ($row = $query->fetch_row()) {
							$basic_info_id = $row['basic_info_id'];
							$semester = $row['semester'] == 0 ? "Spring" : "Fall";
							$year = $row['year'];
							$name = $row['position_name'];
							$type = $row['position_type'];
							$query_sub = new Query(sprintf("SELECT * FROM apo_wiki_positions_controller WHERE position_type=%d", $type));
							$row_sub = $query_sub->fetch_row();
							$type_name = $row_sub['position_name'];
							$edit .= "<form action=\"#\" method=\"post\">";
							$edit .= "<div class=\"edittable\">";
							$edit .= "<b>Position Name: </b>$name (Type: $type_name)<br />";
							$edit .= "<b>Semester: </b> $semester<br />";
							$edit .= "<b>Year: </b> $year<br />";
							$edit .= "<input type=\"hidden\" name=\"basic_info_id\" value=\"$basic_info_id\" />";
							$edit .= "<input type=\"button\" value=\"Edit Position Info / Add People\" onClick=\"window.location.href='ggwiki_edit.php?function=edit_position_description&content_id=$content_id&basic_info_id=$basic_info_id&page_id=$page_id'\">";
							$edit .= "<button type=\"submit\" name=\"update\" value=\"delete_position\" onclick=\"return confirm('Are you sure you want to DELETE this position?')\"> Delete This Position </button><br />";
							$edit .= "<button type=\"submit\" name=\"update\" value=\"up_position\" onclick=\"return confirm('Are you sure you want to MOVE this position UP one?')\"> Move Up One in the list</button>";
							$edit .= "<button type=\"submit\" name=\"update\" value=\"down_position\" onclick=\"return confirm('Are you sure you want to MOVE this position DOWN one?')\"> Move Down One in the list</button>";
							$edit .= "</div>";
							$edit .= "</form>";
						}
					}
				}
			}
			else {
				$page_error .= "<p class=\"error\">No Page ID And/Or Content ID Was Selected</p>";
			}
			break;

		case 'make_new_page':
			$edit = "";
			$edit .= "<form action=\"#\" method=\"post\">";
			$edit .= "<div class=\"edittable\">";
			$edit .= "<b>New Page Title: </b><br /><br />";
			$edit .= "<input type=\"text\" name=\"page_name\" value=\"$main\" size=\"60\" />";
			$edit .= "</div>";
			$edit .= "<button type=\"submit\" name=\"update\" value=\"create_new_page\" onclick=\"return confirm('Are you sure you want to MAKE this new page?')\"> Make a New Page </button>";
			$edit .= "</form>";
			break;

		case 'edit_main_human':
			if (isset($_REQUEST['user_id']) && is_numeric($_REQUEST['user_id'])) {
				$user_id = $_REQUEST['user_id'];
				$query = new Query(sprintf("SELECT * FROM apo_users WHERE user_id=%d", $user_id));
				$row = $query->fetch_row();
				if (!$row) {
					$page_error .= "<p class=\"error\">User ID Does not Exist</p>";
				}
				else {
					$query = new Query(sprintf("SELECT * FROM apo_wiki_user_description WHERE user_id=%d", $user_id));
					$row = $query->fetch_row();
					$description = $row['description'];
					$description = html_entity_decode(str_replace("<br />", "\r\n", $description), ENT_QUOTES, 'UTF-8');
					$edit = "";
					$edit .= "<form action=\"#\" method=\"post\">";
					$edit .= "<div class=\"edittable\">";
					$edit .= "<b>User Bio & Description: </b><br /><br />";
					$edit .= "<textarea class=\"description\" name=\"user_description\">$description</textarea>";
					$edit .= "</div>";
					$edit .= "<button type=\"submit\" name=\"update\" value=\"update_main_human\" onclick=\"return confirm('Are you sure you want to SAVE these changes?')\"> Save the Changes </button>";
					$edit .= "</form>";
					$edit .= "<button id=\"link_button\" onclick=\"link_explanation()\"> How to put links </button> <p id=\"link_explanation\"></p>";
				}
			}
			else {
				$page_error .= "<p class=\"error\">User ID Was Not Set</p>";
			}
			break;

		case 'edit_position_description':
			if (isset($_REQUEST['content_id']) && is_numeric($_REQUEST['content_id']) && isset($_REQUEST['basic_info_id']) && is_numeric($_REQUEST['basic_info_id'])) {
				$content_id = $_REQUEST['content_id'];
				$basic_info_id = $_REQUEST['basic_info_id'];
				$query = new Query(sprintf("SELECT * FROM apo_wiki_positions_basic_info WHERE basic_info_id=%d", $basic_info_id));
				$row = $query->fetch_row();
				if (!$row) {
					$page_error .= "<p class=\"error\">Basic Info ID does not exist</p>";
				}
				else {
					$special_click = True;
					$position_type = $row['position_type'];
					$position_name = $row['position_name'];
					$semester = $row['semester'];
					$year = $row['year'];
					$edit = "";
					$edit .= edit_position_maker($position_type, $position_name, $semester, $year, $basic_info_id);
					$edit .= "<br />";
					$edit .= "<div class=\"edittable\">";
					$edit .= "<div class=\"search_wrapper\">";
					$edit .= "<b>Add a person to this list (if the autofill does not work, try using another browser): </b><br />";
					$edit .= "<input type=\"text\" id=\"search_input\" name=\"added_human\" size=\"60\" onclick=\"search_help_person(this.value, $basic_info_id, 0)\" onkeyup=\"search_help_person(this.value, $basic_info_id, event)\" autocomplete=\"off\" />";
					$edit .= "<div id=\"search_help\"></div>";
					$edit .= "</div>";
					$edit .= "</div>";
					$query = new Query(sprintf("SELECT * FROM apo_wiki_positions WHERE basic_info_id=%d ORDER BY ordering ASC", $basic_info_id));
					$edit .= "<form action=\"#\" method=\"post\">";
					$count = 0;
					while ($row = $query->fetch_row()) {
						$count++;
						$position_id = $row['position_id'];
						$user_id = $row['user_id'];
						$position_title = $row['position_title'];
						$edit .= "<div class=\"edittable\">";
						$person_query = new Query(sprintf("SELECT * FROM apo_users WHERE user_id=%d", $user_id));
						$person_row = $person_query->fetch_row();
						$person = $person_row['firstname'] . " " . $person_row['lastname'];
						if ($position_type == 1 || $position_type == 2 || $position_type == 6 || $position_type == 7 || $position_type == 8 || $position_type == 14) {
							$edit .= "<b>Title of $person: $position_title</b><br />";
							$edit .= "<input type=\"hidden\" name=\"title_$position_id\" value=\"$position_title\" size=\"60\" />";
						}
						elseif ($position_type == 9 || $position_type == 10) {
							$edit .= "<b>$person - Received at: </b><br />";
							$edit .= "<select name=\"title_$position_id\">";
							for ($i = 1; $i < 9; $i++) {
								$cm_name = "CM" . $i;
								if ($position_title == $cm_name) {
									$edit .= "<option value=\"$cm_name\" selected=\"selected\" >$cm_name</option>";
								}
								else {
									$edit .= "<option value=\"$cm_name\">$cm_name</option>";
								}
							}
							$edit .= "</select><br />";
						}
						elseif ($position_type == 3) { 
							$edit .= "<b>Position name of $person: </b>";
							$edit .= "<select name=\"title_$position_id\">";
							$excomm_query = new Query(sprintf("SELECT * FROM apo_wiki_excomm ORDER BY ordering ASC"));
							while ($excomm_row = $excomm_query->fetch_row()) {
								$excomm_name = $excomm_row['excomm_name'];
								if ($position_title == $excomm_name) {
									$edit .= "<option value=\"$excomm_name\" selected=\"selected\" >$excomm_name</option>";
								}
								else {
									$edit .= "<option value=\"$excomm_name\">$excomm_name</option>";
								}
							}
							$edit .= "</select><br />";
						}
						elseif ($position_type == 4) {
							$edit .= "<b>Position name of $person: </b>";
							$edit .= "<select name=\"title_$position_id\">";
							$pcomm_query = new Query(sprintf("SELECT * FROM apo_wiki_pcomm ORDER BY ordering ASC"));
							while ($pcomm_row = $pcomm_query->fetch_row()) {
								$pcomm_name = $pcomm_row['pcomm_name'];
								if ($position_title == $pcomm_name) {
									$edit .= "<option value=\"$pcomm_name\" selected=\"selected\" >$pcomm_name</option>";
								}
								else {
									$edit .= "<option value=\"$pcomm_name\">$pcomm_name</option>";
								}
							}
							$edit .= "</select><br />";
						}
						elseif ($position_type == 5 || $position_type == 13) {
							$edit .= "<b>Position name of $person (i.e Rush Chair, Webmaster, etc.): </b><br />";
							$edit .= "<input type=\"text\" name=\"title_$position_id\" value=\"$position_title\" size=\"60\" /><br />";
						}
						elseif ($position_type == 11) {
							$edit .= "<b>Position for $person in $position_name:</b><br />";
							$edit .= "<select name=\"title_$position_id\">";
							$sf_query = new Query(sprintf("SELECT * FROM apo_wiki_sf ORDER BY ordering ASC"));
							while ($sf_row = $sf_query->fetch_row()) {
								$sf_name = $sf_row['sf_name'];
								if ($position_title == $sf_name) {
									$edit .= "<option value=\"$sf_name\" selected=\"selected\" >$sf_name</option>";
								}
								else {
									$edit .= "<option value=\"$sf_name\">$sf_name</option>";
								}
							}
							$edit .= "</select><br />";
						}
						elseif ($position_type == 12) {
							$edit .= "<b>Position for $person in $position_name:</b><br />";
							$edit .= "<select name=\"title_$position_id\">";
							$bf_query = new Query(sprintf("SELECT * FROM apo_wiki_bf ORDER BY ordering ASC"));
							while ($bf_row = $bf_query->fetch_row()) {
								$bf_name = $bf_row['bf_name'];
								if ($position_title == $bf_name) {
									$edit .= "<option value=\"$bf_name\" selected=\"selected\" >$bf_name</option>";
								}
								else {
									$edit .= "<option value=\"$bf_name\">$bf_name</option>";
								}
							}
							$edit .= "</select><br />";
						}
						$edit .= "<button type=\"submit\" name=\"update\" value=\"delete_person_$position_id\" onclick=\"return confirm('Are you sure you want to DELETE this person?')\"> Delete this person </button><br />";
						$edit .= "<button type=\"submit\" name=\"update\" value=\"up_person_$position_id\" onclick=\"return confirm('Are you sure you want to MOVE this person UP one?')\"> Move Up One in the list</button>";
						$edit .= "<button type=\"submit\" name=\"update\" value=\"down_person_$position_id\" onclick=\"return confirm('Are you sure you want to MOVE this person DOWN one?')\"> Move Down One in the list</button>";
						$edit .= "</div>";
					}
					if ($count > 0) {
						$edit .= "<button type=\"submit\" name=\"update\" value=\"update_people\" onclick=\"return confirm('Are you sure you want to SAVE the changes you made?')\"> Save these changes </button>";
					}
					$edit .= "</form>";
				}
			}
			else {
				$page_error .= "<p class=\"error\">Content ID or Basic Info ID Was Not Set</p>";
			}
			break;

		case 'delete_page':
			if (isset($_REQUEST['page_id']) && is_numeric($_REQUEST['page_id'])) {
				$page_id = $_REQUEST['page_id'];
				if ($page_id == 1) {
					$page_error .= "<p class=\"error\">This page is the homepage, you cannot delete this page</p>";
				}
				else {
					$query = new Query(sprintf("SELECT * FROM apo_wiki_pages WHERE page_id=%d", $page_id));
					$row = $query->fetch_row();
					if ($row) {
						$page_name = $row['page_name'];
						$edit = "";
						$edit .= "Delete Page: <b>$page_name</b><br /><br />";
						$edit .= "<form id=\"delete_form\" action=\"#\" method=\"post\">";
						$edit .= "<button name=\"update\" value=\"delete_old_page\" onclick=\"return deleteCheck()\"> Delete Page </button>";
						$edit .= "</form>";
					}
					else {
						$page_error .= "<p class=\"error\">Page ID Is Not Real</p>";
					}
				}
			}
			else {
				$page_error .= "<p class=\"error\">Page ID Is Not Set</p>";
			}
			break;

		default:
			$page_error .= "<p class=\"error\">This Function Does Not Exist</p>";
		}
	}
	else {
		$page_error .= "<p class=\"error\">No Function Was Selected</p>";
	}

echo <<<HEREDOC

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" >

	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
		<meta http-equiv="Content-Style-Type" content="text/css" />
		<link type="text/css" rel="stylesheet" href="ggwiki_edit.css" />		

		<title>
			Gamma Gamma Wiki Edit
		</title>

		<script type="text/javascript" src="ajax.js"></script>
		<script language="javascript" type="text/javascript" src="popup.js"></script>
		<script language="javascript" type="text/javascript">
		var position = -1;
		var clicked = "";
		var selected = "";

		function link_explanation() {
			document.getElementById("link_explanation").innerHTML = "In order to have a link on your wiki page, you need to format it in <br /><br /> LINK \"TITLE\" <br /><br /> For example: <br /><br /> http://members.calaphio.com/ggwiki.php#home \"Home Page\" <br /><br /> This will show up as <br /><br /> <font style=\"text-decoration: underline; color: blue\">Home Page</font> <br /><br /> as a link to http://members.calaphio.com/ggwiki.php#home.<br /><br /> Or you can simply copy and paste a URL on the page and that will become a link, so <br /><br /> http://members.calaphio.com/ggwiki.php#home <br /><br /> will become <br /><br /> <font style=\"text-decoration: underline; color: blue\">http://members.calaphio.com/ggwiki.php#home</font> <br /><br /> This is a bonus feature: If you put a youtube link, it will still do the same and it will automatically embed the video at the end of the article. But it will only embed one youtube video (so even if you put multiple youtube links, it will only embed the first link).";
		}

		function clicked_position_person(e) {
			var targ;
			if (!e) {
				var e=window.event;
			}
			if (e.target) {
				targ=e.target;
			}
			else if (e.srcElement) {
				targ=e.srcElement;
			}
			clicked = targ.className;
			if(clicked!="quick_search") {
				position = -1;
				search_help_person("", 0, 0);
			}
		}

		function clicked_position(e) {
			var targ;
			if (!e) {
				var e=window.event;
			}
			if (e.target) {
				targ=e.target;
			}
			else if (e.srcElement) {
				targ=e.srcElement;
			}
			clicked = targ.className;
			if(clicked!="quick_search") {
				position = -1;
				search_help("", 0, 0, 0);
			}
		}
		
		function cursorOnColor(x) {
			x.style.backgroundColor = "lightBlue";
			selected = x;
			var links = document.getElementsByClassName("quick_search");
			links[position].style.backgroundColor = "white";
			position = -1;
		}
		
		function cursorOffColor(x) {
			x.style.backgroundColor = "white";
			var links = document.getElementsByClassName("quick_search");
			links[position].style.backgroundColor = "white";
			position = -1;
		}

		function search_help(str, page_id, content_id, e) {
			if (e == 0) {
				position = 0;
				xmlhttp=new XMLHttpRequest(); 
				xmlhttp.onreadystatechange=function() {
					if (xmlhttp.readyState==4 && xmlhttp.status==200) {
						document.getElementById("search_help").innerHTML=xmlhttp.responseText; 
						var links = document.getElementsByClassName("quick_search");
						links[position].style.backgroundColor = "lightBlue";
					}
				}
				xmlhttp.open("GET", "ggwiki_add_link.php?name="+str+"&page_id="+page_id+"&content_id="+content_id, true); 
				xmlhttp.send(); 
			}
			else {

				var keynum = 0;
				var evt = e || window.event;
  				var keynum = evt.which || evt.keyCode;

				var links = document.getElementsByClassName("quick_search");
				if(keynum == 38) {
					if(selected != "") {
						selected.style.backgroundColor = "white";
						selected = "";
					}
					if (position > 0) {
						position--;
						links[position].style.backgroundColor = "lightBlue";
						links[position + 1].style.backgroundColor = "white";
					}
				}
				else if(keynum == 40) {
					if (position < links.length - 1) {
						position++;
						links[position].style.backgroundColor = "lightBlue";
						links[position - 1].style.backgroundColor = "white";
					}
					if(selected != "") {
						selected.style.backgroundColor = "white";
						selected = "";
					}
				}
				else if(keynum == 13) {
					if (position != -1) {
						links[position].click();
					}
				}
				else {
					position = 0;
					xmlhttp=new XMLHttpRequest(); 
					xmlhttp.onreadystatechange=function() {
						if (xmlhttp.readyState==4 && xmlhttp.status==200) {
							document.getElementById("search_help").innerHTML=xmlhttp.responseText; 
							var links = document.getElementsByClassName("quick_search");
							links[position].style.backgroundColor = "lightBlue";
						}
					}
					xmlhttp.open("GET", "ggwiki_add_link.php?name="+str+"&page_id="+page_id+"&content_id="+content_id, true); 
					xmlhttp.send(); 
				}
			}
		} 

		function search_help_person(str, basic_info_id, e) {
			if (e == 0) {
				position = 0;
				xmlhttp=new XMLHttpRequest(); 
				xmlhttp.onreadystatechange=function() {
					if (xmlhttp.readyState==4 && xmlhttp.status==200) {
						document.getElementById("search_help").innerHTML=xmlhttp.responseText; 
						var links = document.getElementsByClassName("quick_search");
						links[position].style.backgroundColor = "lightBlue";
					}
				}
				xmlhttp.open("GET", "ggwiki_add_person.php?name="+str, true); 
				xmlhttp.send(); 
			}
			else {

				var keynum = 0;
				var evt = e || window.event;
  				var keynum = evt.which || evt.keyCode;

				var links = document.getElementsByClassName("quick_search");
				if(keynum == 38) {
					if(selected != "") {
						selected.style.backgroundColor = "white";
						selected = "";
					}
					if (position > 0) {
						position--;
						links[position].style.backgroundColor = "lightBlue";
						links[position + 1].style.backgroundColor = "white";
					}
				}
				else if(keynum == 40) {
					if (position < links.length - 1) {
						position++;
						links[position].style.backgroundColor = "lightBlue";
						links[position - 1].style.backgroundColor = "white";
					}
					if(selected != "") {
						selected.style.backgroundColor = "white";
						selected = "";
					}
				}
				else if(keynum == 13) {
					if (position != -1) {
						links[position].click();
					}
				}
				else {
					position = 0;
					xmlhttp=new XMLHttpRequest(); 
					xmlhttp.onreadystatechange=function() {
						if (xmlhttp.readyState==4 && xmlhttp.status==200) {
							document.getElementById("search_help").innerHTML=xmlhttp.responseText; 
							var links = document.getElementsByClassName("quick_search");
							links[position].style.backgroundColor = "lightBlue";
						}
					}
					xmlhttp.open("GET", "ggwiki_add_person.php?name="+str, true); 
					xmlhttp.send(); 
				}
			}
		} 
		
		function toggleField(val) {
			var o = document.getElementById('other');
			(val == 'other') ? o.style.display = 'block' : o.style.display = 'none';
		}
		
		function deleteCheck() {
			var r = confirm("Are you REALLY sure to DELETE this page (two more times)?");
			if (r) {
				r = confirm("Are you REALLY REALLY sure to DELETE this page (one more time)?");
				if (r) {
					r = confirm("Are you REALLY REALLY REALLY sure to DELETE this page (no more chance after this)?");
					if (r) {
						return true;
					}
				}
			}
			return false;
		}

		</script>
		
	</head>

HEREDOC;

	if ($special_click) {
		echo "<body onmousedown=\"clicked_position_person()\">";
	}
	else {
		echo "<body onmousedown=\"clicked_position()\">";
	}

echo <<<HEREDOC

		$reload

		$page_success

		$page_error

		$edit
	
	</body>

</html>

HEREDOC;

}

?>

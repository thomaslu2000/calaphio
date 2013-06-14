<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" >

	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
		<meta http-equiv="Content-Style-Type" content="text/css" />
		<link type="text/css" rel="stylesheet" href="ggwiki_new_edit.css" />		

		<script type="text/javascript" src="ajax.js"></script>
		<script language="javascript" type="text/javascript" src="popup.js"></script>
		<script language="javascript" type="text/javascript">
		var position = -1;
		var clicked = "";
		var selected = "";
		
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
		
		function clean_search(page_id, content_id) {
			position = -1;
			if(clicked!="quick_search") {
				search_help("", page_id, content_id, 0);
			}
		}

		function displayDate() {
			document.getElementById("demo").innerHTML = Date();
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
				xmlhttp.open("GET", "ggwiki_new_add_link.php?name="+str+"&page_id="page_id+"&content_id="+content_id, true); 
				xmlhttp.send(); 
			}
			else {
				var keynum = 0;
				if(window.event) {
					keynum = e.keyCode;
				}
				else if(event.which) {
					keynum = e.which;
				}
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
						window.open(links[position], '_self');
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
					xmlhttp.open("GET", "ggwiki_new_add_link.php?name="+str+"&page_id="page_id+"&content_id="+content_id, true); 
					xmlhttp.send(); 
				}
			}
		} 
		</script>
		
		<title>
			Gamma Gamma Wiki Edit
		</title>
	</head>

	<body onmousedown="where_got_clicked()">

	<?php

echo <<<HEREDOC
	
		$reload

		$page_success

		$page_error

		$edit

		<button type="button" onclick="displayDate()">Display Date</button>
		
		<p id="demo">This is a paragraph.</p>

		$add

		$photo

HEREDOC;

	?>

	</body>
</html>



<?php

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

	if ($g_user->data['user_id'] == 1190 || $g_user->data['user_id'] == 1299) {
		$is_tomo_or_toshiki = true;
	}
	else {
		$is_tomo_or_toshiki = false;
	}

	/*

	if (!$g_user->is_logged_in()) {
		trigger_error("You must be logged in to access this feature", E_USER_ERROR);
	}

	$is_admin = $g_user->permit("admin view requirements");

	*/

	$is_admin = $g_user->permit("admin view requirements");

	if (!$is_tomo_or_toshiki) {
		trigger_error("You must be Tomo or Toshiki to view this page", E_USER_ERROR);
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
					$page_error .= "<p class=\"error\">Keys and Values Cannot Be Empty</p>";
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
							$page_error .= "<p class=\"error\">Keys and Values Cannot Be Empty</p>";
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
			$query = new Query(sprintf("INSERT INTO apo_wiki_contents SET page_id=%d, parent_content_id=0, content_ordering=%d, subcontent_ordering=0, type_id=1", $page_id, $num));
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
			$query = new Query(sprintf("INSERT INTO apo_wiki_contents SET page_id=%d, parent_content_id=%d, content_ordering=0, subcontent_ordering=%d, type_id=1", $page_id, $content_id, $num));
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
					$query = new Query(sprintf("INSERT INTO apo_wiki_pages SET page_name='%s', type_id=1, description=''", $page_name));
					$query = new Query("commit");
					$query = new Query(sprintf("SELECT * FROM apo_wiki_pages WHERE page_name='%s'", $page_name));
					$row = $query->fetch_row();
					$new_page_id = $row['page_id'];
					$page_success .= "<p class=\"success\">Successfully Made a New Page</p>";
					$reload = "<script language=\"javascript\" type=\"text/javascript\">window.opener.location='ggwiki_new_template.php?page_id=$new_page_id#home'</script>";
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
			echo "IT WORKED!!!";
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
				if (file_exists("./ggwiki_new_images/" . $page_id . ".jpg")) {
					unlink("./ggwiki_new_images/" . $page_id . ".jpg");
				} 
				if (move_uploaded_file($_FILES["upfile"]["tmp_name"], "ggwiki_new_images/" . $page_id . ".png")) {
					chmod("files/" . $page_id . ".png", 0644);
					$name = $_FILES["upfile"]["name"];
					$page_success .= "<p class=\"success\">$name upload successful</p>";
				} 
				else {
					$page_error .= "<p class=\"error\">Cannot upload the Image for an unknown reason</p>";
				}
			} 
			else if ($_FILES["upfile"]["size"] <= 1000000 && $file[2] == IMAGETYPE_JPEG) { 
				if (file_exists("./ggwiki_new_images/" . $page_id . ".png")) {
					unlink("./ggwiki_new_images/" . $page_id . ".png");
				}
				if (move_uploaded_file($_FILES["upfile"]["tmp_name"], "ggwiki_new_images/" . $page_id . ".jpg")) {
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
						$edit .= "<b>Key: </b><br />";
						$edit .= "<input type=\"text\" name=\"key_$counter\" value=\"$key\" size=\"60\" /><br />";
						$edit .= "<b>Value: </b><br />";
						$edit .= "<input type=\"text\" name=\"value_$counter\" value=\"$value\" size=\"60\" /><br />";
						$edit .= "<button type=\"submit\" name=\"update\" value=\"delete_right_top_$info_id\" onclick=\"return confirm('Are you sure you want to DELETE this Key/Value pair?')\"> Delete this Key/Value Pair </button><br />";
						$edit .= "<button type=\"submit\" name=\"update\" value=\"up_right_top_$info_id\" onclick=\"return confirm('Are you sure you want to MOVE this Key/Value pair UP?')\"> Move Up One </button>";
						$edit .= "<button type=\"submit\" name=\"update\" value=\"down_right_top_$info_id\" onclick=\"return confirm('Are you sure you want to MOVE this Key/Value pair DOWN?')\"> Move Down One </button>";
						$edit .= "</div>";
						$counter++;
					}
					$edit .= "<button type=\"submit\" name=\"update\" value=\"update_right_top\" onclick=\"return confirm('Are you sure you want to SAVE these changes?')\"> Save Changes </button>";
					$edit .= "</form>";

					$add = "<form action=\"#\" method=\"post\"><button type=\"submit\" name=\"update\" value=\"add_right_top\" onclick=\"return confirm('Are you sure you want to ADD a new Key/Value pair?')\"> Add a new Key/Value Pair </button></form>";

					$photo = "<form action=\"#\" method=\"post\" enctype=\"multipart/form-data\"><div class=\"pic\">Upload the Picture for this Wiki Page <br />(Under 1000KB and has to be either .jpg or .png)<br /></div><input type=\"file\" name=\"upfile\" size=\"30\" /><br /><input type=\"submit\" value=\"Upload\" /></form>";

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
						$edit .= "<button type=\"submit\" name=\"update\" value=\"up_toc_content_$content_id\" onclick=\"return confirm('Are you sure you want to MOVE this Content UP?')\"> Move Up One </button>";
						$edit .= "<button type=\"submit\" name=\"update\" value=\"down_toc_content_$content_id\" onclick=\"return confirm('Are you sure you want to MOVE this Content DOWN?')\"> Move Down One </button>";
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
							$edit .= "<button type=\"submit\" name=\"update\" value=\"up_toc_subcontent_$subcontent_id\" onclick=\"return confirm('Are you sure you want to MOVE this Subcontent UP?')\"> Move Up One </button>";
							$edit .= "<button type=\"submit\" name=\"update\" value=\"down_toc_subcontent_$subcontent_id\" onclick=\"return confirm('Are you sure you want to MOVE this Subcontent DOWN?')\"> Move Down One </button>";
							$edit .= "</div>";
							$subcounter++;
						}
						$edit .= "<button class=\"subcontent_button\"type=\"submit\" name=\"update\" value=\"add_toc_subcontent_$content_id\" onclick=\"return confirm('Are you sure you want to ADD a Subcontent?')\"> Add a Subcontent </button>";
						$counter++;
						$edit .= "</div>";
					}
					$edit .= "<button type=\"submit\" name=\"update\" value=\"update_toc\" onclick=\"return confirm('Are you sure you want to SAVE these changes?')\"> Save Changes </button>";
					$edit .= "</form>";
					$add = "<form action=\"#\" method=\"post\"><button type=\"submit\" name=\"update\" value=\"add_toc\" onclick=\"return confirm('Are you sure you want to ADD a new Content?')\"> Add a new Content </button></form>";
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
					$edit .= "<form action=\"#\" method=\"post\">";
					$edit .= "<div class=\"edittable\">";
					$query = new Query(sprintf("SELECT * FROM apo_wiki_contents WHERE content_id=%d", $content_id));
					$row = $query->fetch_row();
					$link_id = $row['link_id'];
					$edit .= "<b>Add a link: </b><br /><br />";
					$edit .= "<form action=\"#\" method=\"post\">";
					$edit .= "<div class=\"search_wrapper\">";
					if ($link_id != 0) {
						$query = new Query(sprintf("SELECT * FROM apo_wiki_pages WHERE page_id=%d", $link_id));
						$row = $query->fetch_row();
						$link_name = $row['page_name'];
						$edit .= "<input type=\"text\" id=\"search_input\" name=\"added_link\" value=\"$link_name\" size=\"60\" onclick=\"search_help(this.value, $page_id, $content_id, 0)\" onkeyup=\"search_help(this.value, $page_id, $content_id, event)\" onblur=\"clean_search($page_id, $content_id)\" />";					}
					else {
						$edit .= "<input type=\"text\" id=\"search_input\" name=\"added_link\" size=\"60\" onclick=\"search_help(this.value, $page_id, $content_id, 0)\" onkeyup=\"search_help(this.value, $page_id, $content_id, event)\" onblur=\"clean_search($page_id, $content_id)\" />";
					}
					$edit .= "<p id=\"search_help\"></p>";
					$edit .= "</div>";
					$edit .= "<button type=\"submit\" name=\"update\" value=\"delete_content_link\" onclick=\"return confirm('Do you want to REMOVE your current link?')\"> Remove the link </button>";
					$edit .= "</div>";
					$edit .= "</form>";
					$edit .= "<form action=\"#\" method=\"post\">";
					$edit .= "<div class=\"edittable\">";
					$edit .= "<b>$content_name Description: </b><br /><br />";
					$edit .= "<textarea class=\"description\" name=\"content_description\">$description</textarea>";
					$edit .= "</div>";
					$edit .= "<button type=\"submit\" name=\"update\" value=\"update_content_description\" onclick=\"return confirm('Are you sure you want to SAVE these changes?')\"> Save Changes </button>";
					$edit .= "</form>";
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

		default:
			$page_error .= "<p class=\"error\">This Function Does Not Exist</p>";
		}
	}
	else {
		$page_error .= "<p class=\"error\">No Function Was Selected</p>";
	}
}
?>

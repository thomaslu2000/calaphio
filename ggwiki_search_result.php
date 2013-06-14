
<?php
	require("include/includes.php");
	require("include/Calendar.class.php");
	require("include/Template.class.php");
	Template::print_head(array("ggwiki.css"));
	Template::print_body_header('Brothers', 'WIKI');
?>

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

	function clean_search(event) {
		position = -1;
		if(clicked!="quick_search") {
			search_help(event, "", 0);
		}
	}

	function search_help(event, str, e) {
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
			xmlhttp.open("GET", "ggwiki_search.php?name="+str, true); 
			xmlhttp.send(); 
		}
		else {

			var keynum = 0;
			var evt = event || window.event;
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
				xmlhttp.open("GET", "ggwiki_search.php?name="+str, true); 
				xmlhttp.send(); 
			}
		}
	} 
</script>

<?php

	if (!$g_user->is_logged_in()) {
		trigger_error("You must be logged in to access this feature", E_USER_ERROR);
	}

	else {

		function auto_link($text) {
			$pattern = "/(((http[s]?:\/\/)|(www\.))(([a-z][-a-z0-9]+\.)?[a-z][-a-z0-9]+\.[a-z]+(\.[a-z]{2,2})?)\/?[a-z0-9.,_\/~#&=;%+?-]+[a-z0-9\/#=?]{1,1})( &quot;([\w\W ]+)&quot;)/is";
			$text = preg_replace($pattern, "<a href='$1'>$9</a>", $text);
			$text = preg_replace("/href='www/", "href='http://www", $text);
			$pattern = "/([^href='])(((http[s]?:\/\/)(www\.))(([a-z][-a-z0-9]+\.)?[a-z][-a-z0-9]+\.[a-z]+(\.[a-z]{2,2})?)\/?[a-z0-9.,_\/~#&=;%+?-]+[a-z0-9\/#=?]{1,1})/is";
			$text = preg_replace($pattern, "$1 <a href='$2'>$2</a>", $text);
			$text = preg_replace("/href='www/", "href='http://www", $text);
			return $text;
		}

		if (isset($_REQUEST['search_input'])) {
			$search_field= $_REQUEST['search_input'];
		}
		else {
			$search_field= "";
		}
		$person_found = array();
		$search_field = preg_replace('/[^\w- \']/','', $search_field);
		$description = "Searched for " . $search_field . "<br /><br />";
		$query = new Query(sprintf("SELECT * FROM apo_wiki_pages WHERE page_name LIKE '%%%s%%' ORDER BY page_name DESC", $search_field));
		while ($row = $query->fetch_row()) {
    			$description .= "<a href=ggwiki.php?page_id=" .  $row['page_id'] . "#home>" .  $row['page_name'] . "</a><br />";
		}
		$names = explode(" ", $search_field);
		for ($i = 0; $i < count($names) ; $i++) {
			if ($i == 0) {
				$firstname .= $names[$i];
			}
			else {
				$firstname .= " " . $names[$i];
			}
			$lastname = "";
			for ($j = $i + 1; $j < count($names); $j++) {
				$lastname = $names[$j] . " ";
			}
			$lastname = substr($lastname, 0, strlen($lastname) - 1);
 			$query = new Query(sprintf("SELECT user_id, firstname, lastname, pledgeclass FROM apo_users WHERE firstname LIKE '%s%%' and lastname like '%%%s%%' AND depledged=0 ORDER BY user_id DESC", $firstname, $lastname));
			while ($row = $query->fetch_row()) {
				if (!in_array($row['user_id'], $person_found)) {
				  $description .= "<a href=ggwiki.php?user_id=" . $row['user_id'] . "#home>" . $row['firstname'] . " " . $row['lastname'] .  " (" . $row['pledgeclass'] . ")</a><br />";
				  array_push($person_found, $row['user_id']);
				}
	 		 }
		}
		
echo <<<HEREDOC
	<body onmousedown="clicked_position()">
		<div class="wiki_wrapper">
			<div class="top">
				<a name="home" href="ggwiki.php#home">
					<img class="logo" src="/ggwiki_images/ggwiki_logo.png">
				</a>
				
				<div class="search_wrapper">
					<form action="ggwiki_search_result.php#home" method="get">
					<input type="text" name="search_input" id="search_input" onclick="search_help(event, this.value, 0)" onkeyup="search_help(event, this.value, event)" onblur="clean_search(event)" />
					<input class="button" type="submit" value="Search" />
					<p id="search_help"></p>
					</form>
				</div>

				<h1 class="title">
					Search Results
				</h1>
	
				<p class="description">
					$description
				</p>
			</div>
			
			<div class="cleaner"></div>

		</div>
	</body>
HEREDOC;

	}
?>

<?php
Template::print_body_footer();
Template::print_disclaimer();
?>
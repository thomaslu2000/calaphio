<?php

require("include/includes.php");
require("include/Calendar.class.php");
require("include/Template.class.php");
Template::print_head(array("tomo_test.css"));
Template::print_body_header('Home', 'ADMIN');

?>

<script language="javascript" type="text/javascript" src="popup.js"></script>

<script language="javascript" type="text/javascript">

var position = -1;

var up = KeyboardInfo.GetKeyState(Keys.Up);

var down = KeyboardInfo.GetKeyState(Keys.Down);

var clicked = ""

var selected = ""

function where_got_clicked(e) {
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

function selectColor(x) {
	x.style.backgroundColor = "lightBlue";
	selected=x;
	var links = document.getElementsByClassName("quick_search");
	links[position].style.backgroundColor = "white";
	position = -1;
}

function normalColor(x) {
	position = -1;
	x.style.backgroundColor = "white";
}

function clean() {
	position = -1;
	if(clicked!="quick_search") {
		showHint("", 0);
	}	
/*
	var links = document.getElementsByClassName("quick_search");
	var names = '';
	for(var i=0; i<links.length; i++) {
   		names += links[i].innerHTML;
	}
	document.getElementById("demo").innerHTML = names;
*/
}

function displayDate()
{
	document.getElementById("demo").innerHTML = Date();
}


function showHint(str, e) 
{
	if (e == 0) {
	position = -1;
	xmlhttp=new XMLHttpRequest(); 
	xmlhttp.onreadystatechange=function() {
		if (xmlhttp.readyState==4 && xmlhttp.status==200) {
			document.getElementById("txtHint").innerHTML=xmlhttp.responseText; 
		}
	}
	xmlhttp.open("GET", "tomo_test_search.php?name="+str, true); 
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
		if (position > 0) {
		position--;
		links[position].style.backgroundColor = "lightBlue";
		links[position + 1].style.backgroundColor = "white";
				if(selected != "") {
			selected.style.backgroundColor = "white";
			selected = "";
		}
		}
	}
	else if(keynum == 40) {
		if (position < links.length - 1) {
			position++;
			links[position].style.backgroundColor = "lightBlue";
			links[position - 1].style.backgroundColor = "white";
			if(selected != "") {
			selected.style.backgroundColor = "white";
			selected = "";
			}
		}
	}
	else if(keynum == 13) {
		if (position != -1) {
			window.open(links[position], '_self');
		}
	}

	else {
	position = -1;
	xmlhttp=new XMLHttpRequest(); 
	xmlhttp.onreadystatechange=function() {
		if (xmlhttp.readyState==4 && xmlhttp.status==200) {
			document.getElementById("txtHint").innerHTML=xmlhttp.responseText; 
		}
	}
	xmlhttp.open("GET", "tomo_test_search.php?name="+str, true); 
	xmlhttp.send(); 
	}
}
} 

</script>

<?php


if (isset($_GET['function'])) {
	echo "<div> cool </div>";
}

else {

/**
 *
 */

/**
 *
 */

if ($g_user->data['user_id'] == 1190) 
	$is_tomo = true;
 else 
	$is_tomo = false;

if (!$g_user->is_logged_in()) 
	trigger_error("You must be logged in to view this page.");

else if (!$is_tomo)
	trigger_error("You must be Tomo to access this feature", E_USER_ERROR);

else if (!$g_user->is_logged_in() || !$g_user->permit("admin view requirements")) 
	trigger_error("You must be logged in as an admin to access this feature", E_USER_ERROR);

else {

	echo <<<HEREDOC
<body onmousedown="where_got_clicked()">
<h1>Tomo Is So Cool!</h1>
<br/>
WOW WOW WOW!
<a href="http://google.com       "> google! </a>
<p id="demo">This is a paragraph.</p>
<button type="button" onclick="displayDate()">Display Date</button>
<br>
<input type="text" size="35" onclick="showHint(this.value, 0)" onkeyup="showHint(this.value, event)" onblur="clean()" />
<br>
<p><span id="txtHint"></span></p> </body>

HEREDOC;
}
}

Template::print_body_footer();
Template::print_disclaimer();
?>
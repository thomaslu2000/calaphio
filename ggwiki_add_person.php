<?php
require 'include/includes.php';
header('Content-type: text/xml');
echo <<<HEREDOC
<?xml version="1.0" encoding="UTF-8" ?>

<results>
HEREDOC;
	echo sprintf("<div id=\"quick_search\">");
	$person_found = array();
	$name = $_GET['name'];
	$name = preg_replace('/[^\w- \']/','', $name);
	$num = 1;
	if ($name != "") {	
		$names = explode(" ", $name);
		for ($i = -1; $i < count($names) ; $i++) {
			if ($i == -1) {
				$firstname = "";
			}
			elseif ($i == 0) {
				$firstname .= $names[$i];
			}
			else {
				$firstname .= " " . $names[$i];
			}
			$lastname = "";
			for ($j = $i + 1; $j < count($names); $j++) {
				$lastname .= $names[$j] . " ";
			}
			$lastname = substr($lastname, 0, strlen($lastname) - 1);
 			$query = new Query(sprintf("SELECT user_id, firstname, lastname, pledgeclass FROM apo_users WHERE firstname LIKE '%s%%' and lastname like '%s%%' AND depledged=0 ORDER BY user_id DESC", $firstname, $lastname));
			while ($row = $query->fetch_row()) {
				if (!in_array($row['user_id'], $person_found)) {
    					echo sprintf("<form action=\"#\" method=\"post\" ><input type=\"hidden\" name=\"target_id\" value=%d /><button class=\"quick_search\" onmousemove=\"cursorOnColor(this)\" onmouseout=\"cursorOffColor(this)\" type=\"submit\" name=\"update\" value=\"give_human_position\"> %s %s (%s) </button></form>", $row['user_id'], $row['firstname'], $row['lastname'], $row['pledgeclass']);
					array_push($person_found, $row['user_id']);
				}
	 		 }
		}
	}
	echo sprintf("</div>");
echo <<<HEREDOC
</results>

HEREDOC;
?>
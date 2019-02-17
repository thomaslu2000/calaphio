<?php
	require("include/includes.php");
	require("include/Calendar.class.php");
	require("include/Template.class.php");
	Template::print_head(array("ggwiki.css"));
	Template::print_body_header('Brothers', 'WIKI');

$template = new Template();

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
					if (links[position] == window.location.href) {
						window.location.reload()
					}
					else {
						window.open(links[position], '_self');
					}
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

		// Best Function Ever
		function auto_link($text) {
			$pattern = "/(((http[s]?:\/\/)|(www\.))(([a-z][-a-z0-9]+\.)?[a-z][-a-z0-9]+\.[a-z]+(\.[a-z]{2,3})?)\/?[a-z0-9.,_\/~#&=;%+?-]+[a-z0-9\/#=?]{1,1})/is";
			$text = preg_replace($pattern, "<a href='$1'>$1</a>", $text);
			$text = preg_replace("/href='www\./", "href='http://www\.", $text);
			$pattern = "/((<a href='(((http[s]?:\/\/)|(www\.))(([a-z][-a-z0-9]+\.)?[a-z][-a-z0-9]+\.[a-z]+(\.[a-z]{2,3})?)\/?[a-z0-9.,_\/~#&=;%+?-]+[a-z0-9\/#=?]{1,1})'>)(((http[s]?:\/\/)|(www\.))(([a-z][-a-z0-9]+\.)?[a-z][-a-z0-9]+\.[a-z]+(\.[a-z]{2,3})?)\/?[a-z0-9.,_\/~#&=;%+?-]+[a-z0-9\/#=?]{1,1})(<\/a>)( &quot;([\w\W ]+)&quot;))/is";
            $orig_text = $text;
            $count = 14;
            while ($count < strlen($orig_text)) {
                $text = preg_replace($pattern, "$2$19$17", substr($orig_text, 0, $count));
                $orig_text = $text . substr($orig_text, $count);
                $count = strlen($text);
                if ($count + 1 == strlen($orig_text)) {
                    break;
                } else {
                    $count = $count + 14;
                    if ($count >= strlen($orig_text)) {
                        $count = strlen($orig_text) - 1;
                    }
                }
            }
			return $orig_text;
		}

		// Second Best Function Ever
		function auto_youtube($text) {
			$pattern = "/http[s]?:\/\/(?:[a-zA_Z]{2,3}.)?(?:youtube\.com\/watch\?)((?:[\w\d\-\_\=]+&amp;(?:amp;)?)*v(?:&lt;[A-Z]+&gt;)?=([0-9a-zA-Z\-\_]+))/i";
			preg_match($pattern, $text, $matches);
			if($matches[2]) {
				$ret = "<br /><br /><iframe width=\"560\" height=\"315\" src=\"http://www.youtube.com/embed/" . $matches[2] . "\" frameborder=\"0\" allowfullscreen></iframe>";
			}
			return $ret;
		}

		function top_right_info_maker_helper ($key, $value) {
			$top_right_info = "<tr>";
			$top_right_info .= "<td class=\"key\">";
			$top_right_info .= $key;
			$top_right_info .= "</td>";
			$top_right_info .= "<td class=\"value\">";
			$top_right_info .= $value;
			$top_right_info .= "</td>";
			$top_right_info .= "</tr>";
			return $top_right_info;
		}

		function top_right_info_maker ($page_id) {
			$top_right_info = "";
			$query = new Query(sprintf("SELECT * FROM apo_wiki_pages_info WHERE page_id=%d ORDER BY ordering ASC", $page_id));
			while ($row = $query->fetch_row()) {
				$top_right_info .= top_right_info_maker_helper($row['info_key'], $row['info_value']);
			}	
			return $top_right_info;
		}

		function top_right_info_maker_human ($user_id) {
			$top_right_info = "";
			$query = new Query(sprintf("SELECT * FROM apo_users WHERE user_id=%d and depledged=0 LIMIT 1", $user_id));
			$row = $query->fetch_row();
			$top_right_info .= top_right_info_maker_helper("Pledge Class", $row['pledgeclass']);
			$top_right_info .= top_right_info_maker_helper("Major", $row['major']);
			$top_right_info .= top_right_info_maker_helper("Birthday", $row['birthday']);
			return $top_right_info;
		}

		function toc_maker ($page_id, $is_admin) {
			$toc = "";
			$toc .= "<div class=\"tableoc\">";
			$num = 0;
			$query = new Query(sprintf("SELECT * FROM apo_wiki_contents WHERE page_id=%d and parent_content_id=0 ORDER BY content_ordering ASC", $page_id));
			while ($row = $query->fetch_row()) {
				$content_id = $row['content_id'];
				$content_name = $row['content_name'];
				$num++;
				$toc .= "<div class=\"subject\">";
				$toc .= $num . ". ";
				$toc .= "<a href=\"#$num\">";
				$toc .= $content_name;
				$toc .= "</a>";
				$letter = 'A';
				$query_subsubject = new Query(sprintf("SELECT * FROM apo_wiki_contents WHERE page_id=%d and parent_content_id=%d ORDER BY subcontent_ordering ASC", $page_id, $content_id));
				while ($row_subsubject = $query_subsubject->fetch_row()) {
					$subcontent_name = $row_subsubject['content_name'];
					$toc .= "<div class=\"subsubject\">";
					$toc .= $letter . ". ";
					$toc .= "<a href=\"#$num$letter\">";
					$toc .= $subcontent_name;
					$toc .= "</a>";
					$toc .= "</div>";
					$letter++;
				}
				$toc .= "</div>";
			}
			if ($toc == "<div class=\"tableoc\">") {
				$toc = "";
			}
			if ($is_admin && $_REQUEST['not_admin'] != "true") {
				$edit_toc = "<div class=\"subject\"><button href=\"ggwiki_edit.php?function=edit_toc&page_id=$page_id\" class=\"edit\" onclick=\"return popup('ggwiki_edit.php?function=edit_toc&page_id=$page_id', 550, 560)\" resize=\"none\">Add Contents</button></div>";
				$toc .= $edit_toc;
			}
			$toc .= "</div>";
			return $toc;
		}

		function content_maker ($page_id, $is_admin) {
            global $g_user;
			$content = "";
			$counter = 0;
			$query = new Query(sprintf("SELECT * FROM apo_wiki_contents WHERE page_id=%d and parent_content_id=0 ORDER BY content_ordering ASC", $page_id));
            
            //change this to hide/unhide families
            $hide_all_fams = User::$hide_all_fams;
            //hiding fams of dcomm and pcomm from pledges
            $hidden_fam_ids = array();
            if (!$hide_all_fams and $g_user->is_pledge()) {
                $hidden_fam_query = new Query(sprintf("SELECT user_id FROM apo_wiki_positions as pos, apo_wiki_positions_basic_info as bas WHERE pos.basic_info_id=bas.basic_info_id AND (pos.position_type=4 OR pos.position_title LIKE '%%Dynasty Director') AND semester=%u AND year=%u", (int) (date('m') > 7), date('Y')));
                //finds this semesters pcomm and dcomm
                
                while ($row = $hidden_fam_query->fetch_row()){
                    $hidden_fam_ids[] = $row['user_id'];
                }
            }
            
			while ($row = $query->fetch_row()) {
				$content_id = $row['content_id'];
				$content_name = $row['content_name'];
				$description = $row['description'];
                if ($g_user->is_pledge() && $content_name == "Family System") {
                    if ($hide_all_fams) continue;
                    $description = "Note: Pledges Cannot See DComm and PComm Families";
                }
				$link_id = $row['link_id'];
				$link_human_type = $row['link_human_type'];
				$pos = $counter + 1;
				$content .= "<div class=\"section\">";
				$content .= "<div class=\"main_section\">";
				$content .= "<h2 class=\"title\">";
				$content .= "<a name=\"$pos\">";
				$content .= $content_name;
				$content .= "</a>";
				$content .= "</h2>";
				if ($link_id != 0) {
					if ($link_human_type == 0) {
						$link_query = new Query(sprintf("SELECT * FROM apo_wiki_pages WHERE page_id=%d LIMIT 1", $link_id));
						$link_row = $link_query->fetch_row();
						$content .= "<p class=\"related_article\">";
						$content .= "<a href=\"ggwiki.php?page_id=$link_id#home\">";
						$content .= "More Information about \"" . $content_name . "\" in the Related Article: \"" . $link_row['page_name'] . "\"</a></p>";
					}
					else {
						$link_query = new Query(sprintf("SELECT * FROM apo_users WHERE user_id=%d LIMIT 1", $link_id));
						$link_row = $link_query->fetch_row();
						$content .= "<p class=\"related_article\">";
						$content .= "<a href=\"ggwiki.php?user_id=$link_id#home\">";
						$content .= "More Information about \"" . $content_name . "\" in the Related Article: \"" . $link_row['firstname'] . " " . $link_row['lastname'] . "\"</a></p>";
					}
				}
				if ($description != "") {
					$content .= "<p class=\"description\">";
					$youtube = auto_youtube($description);
					$description = auto_link($description);
					$description .= $youtube;
					$content .= $description;
					$content .= "</p>";
				}
				if ($is_admin && $_REQUEST['not_admin'] != "true") {
					$edit_content_description = "<p class=\"description\"><button href=\"ggwiki_edit.php?function=edit_content_description&page_id=$page_id&content_id=$content_id\" class=\"edit\" onclick=\"return popup('ggwiki_edit.php?function=edit_content_description&page_id=$page_id&content_id=$content_id', 550, 560)\" resize=\"none\"> Edit Content Description </button></p>";
					$content .= $edit_content_description;
				}
				$position_query = new Query(sprintf("SELECT * FROM apo_wiki_positions_basic_info WHERE content_id=%d ORDER BY ordering ASC", $content_id));
				while($position_row = $position_query->fetch_row()) {
					$position_title = $position_row['position_name'];
					$basic_info_id = $position_row['basic_info_id'];
					$position_type = $position_row['position_type'];
					$semester = $position_row['semester'] == 0 ? "Spring" : "Fall";
					$year = $position_row['year'];
					$sem_query = new Query(sprintf("SELECT * FROM apo_wiki_semesters WHERE semester=%d and year=%d", $position_row['semester'], $position_row['year']));
					if ($sem_row = $sem_query->fetch_row()) {
						$ns = $sem_row['namesake_short'];
					}
					else {
						$ns = "Unknown Namesake";
					}
					$content .= "<div class=\"subsection\">";
					$content .= "<h2 class =\"subtitle\">";
					if ($position_type == 5) {
						$content .= "Chairs (" . $ns . ": " . $semester . " " . $year . ")";
					}
					elseif ($position_type == 11) {
						$content .= "Small Family: " . $position_title . " (" . $ns . ": " . $semester . " " . $year . ")";
					}
					elseif ($position_type == 12) {
						$content .= "Big Family: " . $position_title . " (" . $ns . ": " . $semester . " " . $year . ")";
					}
					else {
						$content .= $position_title . " (" . $ns . ": " . $semester . " " . $year . ")";
					}
					$content .= "</h2>";
					$content .= "</div>";
					$content .= "<div class=\"subsection\">";
					$content .= "<table class=\"position_table\">";
					$content .= "<thead class=\"position_table\">";
					$content .= "<tr class=\"position_table\">";
					$content .= "<th class=\"position_table\"><b>Name</b></th>";
					$content .= "<th class=\"position_table\"><b>Pledge Class</b></th>";
					$content .= "<th class=\"position_table\"><b>More Info</b></th>";
					$content .= "</tr>";
					$content .= "</thead>";
					$content .= "<tbody class=\"position_table\">";
					$human_query = new Query(sprintf("SELECT * FROM apo_wiki_positions WHERE basic_info_id=%d ORDER BY ordering ASC", $basic_info_id));
					while($human_row = $human_query->fetch_row()) {
                        if (($position_type == 11 || $position_type == 12) && ($hide_all_fams || in_array($human_row['user_id'], $hidden_fam_ids))) continue;
						$user_query = new Query(sprintf("SELECT * FROM apo_users WHERE user_id=%d", $human_row['user_id']));
						$user_row = $user_query->fetch_row();
						$name = "<a href=\"ggwiki.php?user_id=" . $user_row['user_id'] . "#home\" > " . $user_row['firstname'] . " " . $user_row['lastname'] . " </a>";
						$pc = $user_row['pledgeclass'];
						$pt = $human_row['position_title'];
						$content .= "<tr class=\"position_table\">";
						$content .= "<th class=\"position_table\">$name </th>";
						$content .= "<th class=\"position_table\">$pc</th>";
						$content .= "<th class=\"position_table\">$pt</th>";
						$content .= "</tr>";
					}
					$content .= "</tbody>";
					$content .= "</table>";
					if ($is_admin && $_REQUEST['not_admin'] != "true") {
						$content .= "<p class=\"description\"><button href=\"ggwiki_edit.php?function=edit_position_description&content_id=$content_id&basic_info_id=$basic_info_id&page_id=$page_id\" class=\"edit\" onclick=\"return popup('ggwiki_edit.php?function=edit_position_description&content_id=$content_id&basic_info_id=$basic_info_id&page_id=$page_id', 550, 560)\" resize=\"none\"> Edit Position Info / Add People </button></p>";
					}
					$content .= "</div>";
				}
				$content .= "</div>";
				$letter = 'A';
				$query_sub = new Query(sprintf("SELECT * FROM apo_wiki_contents WHERE page_id=%d and parent_content_id=%d ORDER BY subcontent_ordering ASC", $page_id, $content_id));
				while ($row_sub = $query_sub->fetch_row()) {
					$subcontent = $row_sub['content_name'];
					$subcontent_id = $row_sub['content_id'];
					$subcontent_description = $row_sub['description'];
					$subcontent_link_id = $row_sub['link_id'];
					$subcontent_link_human_type = $row_sub['link_human_type'];
					$content .= "<div class=\"subsection\">";
					$content .= "<h2 class =\"subtitle\">";
					$content .= "<a name=\"$pos$letter\">";
					$content .= $subcontent;
					$content .= "</a>";
					$content .= "</h2>";
					if ($subcontent_link_id != 0) {
						if ($subcontent_link_human_type == 0) {
							$sub_link_query = new Query(sprintf("SELECT * FROM apo_wiki_pages WHERE page_id=%d LIMIT 1", $subcontent_link_id));
							$sub_link_row = $sub_link_query->fetch_row();
							$content .= "<p class=\"related_article\">";
							$content .= "<a href=\"ggwiki.php?page_id=$subcontent_link_id#home\">";
							$content .= "More Information about \"" . $subcontent . "\" in the Related Article: \"" . $sub_link_row['page_name'] . "\"</a></p>";
						}
						else {
							$sub_link_query = new Query(sprintf("SELECT * FROM apo_users WHERE user_id=%d LIMIT 1", $subcontent_link_id));
							$sub_link_row = $sub_link_query->fetch_row();
							$content .= "<p class=\"related_article\">";
							$content .= "<a href=\"ggwiki.php?user_id=$subcontent_link_id#home\">";
							$content .= "More Information about \"" . $subcontent . "\" in the Related Article: \"" . $sub_link_row['firstname'] . " " . $sub_link_row['lastname'] . "\"</a></p>";
						}
					}
					if ($subcontent_description != "") {
						$content .= "<p class=\"description\">";
						$youtube = auto_youtube($subcontent_description);
						$subcontent_description = auto_link($subcontent_description);
						$subcontent_description .= $youtube;
						$content .= "$subcontent_description";
						$content .= "</p>";
					}
					if ($is_admin && $_REQUEST['not_admin'] != "true") {
						$edit_content_description = "<p class=\"description\"><button href=\"ggwiki_edit.php?function=edit_content_description&page_id=$page_id&content_id=$subcontent_id\" class=\"edit\" onclick=\"return popup('ggwiki_edit.php?function=edit_content_description&page_id=$page_id&content_id=$subcontent_id', 550, 560)\" resize=\"none\"> Edit Content Description </button></p>";
						$content .= $edit_content_description;
					}
					$position_query = new Query(sprintf("SELECT * FROM apo_wiki_positions_basic_info WHERE content_id=%d ORDER BY ordering ASC", $subcontent_id));
					while($position_row = $position_query->fetch_row()) {
						$position_title = $position_row['position_name'];
						$basic_info_id = $position_row['basic_info_id'];
						$position_type = $position_row['position_type'];
						$semester = $position_row['semester'] == 0 ? "Spring" : "Fall";
						$year = $position_row['year'];
						$sem_query = new Query(sprintf("SELECT * FROM apo_wiki_semesters WHERE semester=%d and year=%d", $position_row['semester'], $position_row['year']));
						if ($sem_row = $sem_query->fetch_row()) {
							$ns = $sem_row['namesake_short'];
						}
						else {
							$ns = "Unknown Namesake";
						}
						$content .= "<div class=\"subsection\">";
						$content .= "<h2 class =\"subtitle\">";
						if ($position_type == 5) {
							$content .= "Chairs (" . $ns . ": " . $semester . " " . $year . ")";
						}
						elseif ($position_type == 11) {
							$content .= "Small Family: " . $position_title . " (" . $ns . ": " . $semester . " " . $year . ")";
						}
						elseif ($position_type == 12) {
							$content .= "Big Family: " . $position_title . " (" . $ns . ": " . $semester . " " . $year . ")";
						}
						else {
							$content .= $position_title . " (" . $ns . ": " . $semester . " " . $year . ")";
						}
						$content .= "</h2>";
						$content .= "</div>";
						$content .= "<div class=\"subsection\">";
						$content .= "<table class=\"position_table\">";
						$content .= "<thead class=\"position_table\">";
						$content .= "<tr class=\"position_table\">";
						$content .= "<th class=\"position_table\"><b>Name</b></th>";
						$content .= "<th class=\"position_table\"><b>Pledge Class</b></th>";
						$content .= "<th class=\"position_table\"><b>More Info</b></th>";
						$content .= "</tr>";
						$content .= "</thead>";
						$content .= "<tbody class=\"position_table\">";
						$human_query = new Query(sprintf("SELECT * FROM apo_wiki_positions WHERE basic_info_id=%d ORDER BY ordering ASC", $basic_info_id));
						while($human_row = $human_query->fetch_row()) {
							$user_query = new Query(sprintf("SELECT * FROM apo_users WHERE user_id=%d", $human_row['user_id']));
							$user_row = $user_query->fetch_row();
							$name = "<a href=\"ggwiki.php?user_id=" . $user_row['user_id'] . "#home\" > " . $user_row['firstname'] . " " . $user_row['lastname'] . " </a>";
							$pc = $user_row['pledgeclass'];
							$pt = $human_row['position_title'];
							$content .= "<tr class=\"position_table\">";
							$content .= "<th class=\"position_table\">$name</th>";
							$content .= "<th class=\"position_table\">$pc</th>";
							$content .= "<th class=\"position_table\">$pt</th>";
							$content .= "</tr>";
						}
						$content .= "</tbody>";
						$content .= "</table>";
						if ($is_admin && $_REQUEST['not_admin'] != "true") {
							$content .= "<p class=\"description\"><button href=\"ggwiki_edit.php?function=edit_position_description&content_id=$content_id&basic_info_id=$basic_info_id&page_id=$page_id\" class=\"edit\" onclick=\"return popup('ggwiki_edit.php?function=edit_position_description&content_id=$content_id&basic_info_id=$basic_info_id', 550, 560)\" resize=\"none\"> Edit Position Info / Add People</button></p>";
						}
						$content .= "</div>";
					}
					$content .= "</div>";
					$letter++;
				}
				$content .= "</div>";
				$counter++;
			}
			return $content;
		}
			
		function content_maker_human($user_id) {
            global $g_user;
            $hide_family = $g_user->hide_family($user_id);
			$content .= "<div class=\"position\">";
			$content .= "<div class=\"section\">";
			$content .= "<h2 class=\"title\">";
			$content .= Positions;
			$content .= "</h2>";
            
			$query = new Query(sprintf("SELECT * FROM apo_wiki_positions as pos, apo_wiki_positions_basic_info as bas WHERE user_id=%d and pos.basic_info_id=bas.basic_info_id ORDER BY bas.year ASC, bas.semester ASC, pos.position_type ASC", $user_id));
			while ($row = $query->fetch_row()) {
				$position_type = $row['position_type'];
				$position_title = $row['position_title'];
				$position_name = $row['position_name'];
				$semester = $row['semester'] == 0 ? "Spring" : "Fall";
				if ($semester_year != $semester . " " . $row['year']) {
				  $semester_year = $semester . " " . $row['year'];
				  if ($subcontent != "") {
				    $subcontent .= "</p>";
				    $subcontent .= "</div>";	
				  }
				  $subcontent .= "<div class=\"subsection\">";
				  $subcontent .= "<h2 class =\"subtitle\">";
				  $sem_query = new Query(sprintf("SELECT * FROM apo_wiki_semesters WHERE semester=%d and year=%d", $row['semester'], $row['year']));
				  if ($sem_row = $sem_query->fetch_row()) {
					$ns = $sem_row['namesake_short'];
				  }
				  else {
					$ns = "Unknown Namesake";
				  }
				  $subcontent .= $ns . " Semester (" . $semester_year  . ")";
				  $subcontent .= "</h2>";
				  $subcontent .= "<p class=\"description\">";
				  $array = array();
				}
				if ($position_type == 1 || $position_type == 2 || $position_type == 3 || $position_type == 4 || $position_type == 7 || $position_type == 8 || $position_type == 15) {
				  	if ($position_type == 3 || $position_type == 4 || $position_type == 15) {
						$sentence = "<b>" . $position_name . "</b>: " . $position_title . "<br />";
					}
					else {
						$sentence = "<b>" . $position_title . "</b><br />";
					}
				}
				elseif ($position_type == 6 || $position_type == 11 || $position_type == 12 || $position_type == 13) {
				  	if ($position_type == 11) {
						$sentence = $position_title . " for " . $position_name . " (Small Family)<br />"; 
                        if ($hide_family) {
                            $sentence = "";
                        }
					}
				  	elseif ($position_type == 12) {
						$sentence = $position_title . " for " . $position_name . " (Big Family)<br />"; 
                        if ($hide_family) {
                            $sentence = "";
                        }
					}
					else {
						$sentence = $position_title . " for " . $position_name . "<br />"; 
					}
				}
				elseif ($position_type == 5) {
				  $sentence = "<b>Chairing</b>: " . $position_title . " for " . $position_name . "<br />";
				}
				elseif ( $position_type == 9 || $position_type == 10 ) {
				  $sentence = "<b>" . $position_name . " Recipient</b> for " . $position_title . "<br />";
				}
				elseif ( $position_type == 14) {
				  $sentence = $position_title . "<br />";
				}
				if (!in_array($sentence, $array)) {
				  $subcontent .= $sentence;
				  array_push($array, $sentence);
				}
			}
			if ($subcontent != "") {
			  $subcontent .= "</p>";
			  $subcontent .= "</div>";	
			}
			$content .= $subcontent;
			$content .= "</div>";
			$content .= "</div>";
			return $content;
		}
	
		$page_id = 1;
		$user_id = 0;
		$is_human = false;
		if (isset($_REQUEST['page_id']) && is_numeric($_REQUEST['page_id'])) {
			$page_id = $_REQUEST['page_id'];
			$is_human = false;
		}
		elseif (isset($_REQUEST['user_id']) && is_numeric($_REQUEST['user_id'])) {
			$user_id = $_REQUEST['user_id'];
			$is_human = true;
		}

		if ($is_human) {
			$query = new Query(sprintf("SELECT * FROM apo_users WHERE user_id=%d and depledged=0 LIMIT 1", $user_id));
			$row = $query->fetch_row();
			if (!$row) {
				$page_error = "<p class=\"error\">This User Page Does Not Exist</p>";
				$main = "Unknown User ID";
			}
			else {
				$is_admin = $g_user->permit("wiki editing") || $g_user->data['user_id'] == $user_id;
				$main = $row['firstname'] . " " . $row['lastname'];
				$query = new Query(sprintf("SELECT * FROM apo_wiki_user_description WHERE user_id=%d", $user_id));
				$row = $query->fetch_row();
				$description = $row['description'];
				$youtube = auto_youtube($description);
				$description = auto_link($description);
				$description .= $youtube;
				$img_name = "face/" . $user_id;
				if (file_exists($img_name . ".jpg")) {
					$img_name = $img_name . ".jpg";
				}
				elseif (file_exists($img_name . ".png")) {
					$img_name = $img_name . ".png";
				}
				else {
					$img_name = "/ggwiki_images/default.jpg";
				}
				$top_right_info =  top_right_info_maker_human($user_id);
				$content = content_maker_human($user_id);
				if ($is_admin && $_REQUEST['not_admin'] != "true") {
					$edit_main = "<p class=\"description\"><button href=\"ggwiki_edit.php?function=edit_main_human&user_id=$user_id\" class=\"edit\" onclick=\"return popup('ggwiki_edit.php?function=edit_main_human&user_id=$user_id', 550, 560)\" resize=\"none\">Edit Main Description</button></p>";
				}
			}
		}

		else {
			$query = new Query(sprintf("SELECT * FROM apo_wiki_pages WHERE page_id=%d LIMIT 1", $page_id));
			$row = $query->fetch_row();
			if (!$row) {
				$page_error = "<p class=\"error\">This Wiki Page Does Not Exist</p>";
				$main = "Unknown Page ID";
			}
			else {
				$is_admin = $g_user->permit("wiki editing") || $g_user->data['user_id'] == $row['creator_user_id'];
				$main = $row['page_name'];
				$description = $row['description'];
				$youtube = auto_youtube($description);
				$description = auto_link($description);
				$description .= $youtube;
				$jpg_img_name = "ggwiki_images/" . $page_id . ".jpg";
				$png_img_name = "ggwiki_images/" . $page_id . ".png";
				if (file_exists($jpg_img_name)) {
					$img_name = $jpg_img_name;
				}
				elseif (file_exists($png_img_name)) {
					$img_name = $png_img_name;
				}
				else {
					$img_name = "/ggwiki_images/default.jpg";
				}
				$top_right_info = top_right_info_maker($page_id);
				$toc = toc_maker($page_id, $is_admin);
				$content = content_maker($page_id, $is_admin);
				if ($is_admin && $_REQUEST['not_admin'] != "true") {
					$edit_main = "<p class=\"description\"><button href=\"ggwiki_edit.php?function=edit_main&page_id=$page_id\" class=\"edit\" onclick=\"return popup('ggwiki_edit.php?function=edit_main&page_id=$page_id', 550, 560)\" resize=\"none\">Edit Main Description</button></p>";
					$edit_right_top = "<div class=\"edit_button\"><button href=\"ggwiki_edit.php?function=edit_right_top&page_id=$page_id\" class=\"edit\" onclick=\"return popup('ggwiki_edit.php?function=edit_right_top&page_id=$page_id', 550, 560)\" resize=\"none\">Edit Box Info / Upload Picture</button></div>";
					$not_admin_view = "<div class=\"bottom_button\"><input class=\"button\" type=\"button\" href=\"ggwiki.php?not_admin=true&page_id=$page_id#home\" onclick=\"window.location='ggwiki.php?not_admin=true&page_id=$page_id#home'\" value=\"View This Page as a Non-Admin\" /></div>";
					$delete_page = "<br /><br /><br /><div class=\"bottom_button\"><button href=\"ggwiki_edit.php?function=delete_page&page_id=$page_id\" class=\"edit\" onclick=\"return popup('ggwiki_edit.php?function=delete_page&page_id=$page_id', 550, 560)\" resize=\"none\">Delete This Page</button></div>";
				}
			}
		}

		$make_new_page = "<div class=\"bottom_button\"><button href=\"ggwiki_edit.php?function=make_new_page\" class=\"edit\" onclick=\"return popup('ggwiki_edit.php?function=make_new_page', 550, 560)\" resize=\"none\">Make a New Page</button></div>";

		if ($page_error == "") {
		
echo <<<HEREDOC
	<body onmousedown="clicked_position()">
		<div class="wiki_wrapper">
			<div class="top">
				<a name="home" href="ggwiki.php#home">
					<img class="logo" src="/ggwiki_images/ggwiki_logo.png">
				</a>
					
				<div class="search_wrapper">
					<form action="ggwiki_search_result.php#home" method="get">
					<input type="text" name="search_input" id="search_input" onclick="search_help(event, this.value, 0)" onkeyup="search_help(event, this.value, event)" onblur="clean_search(event)" autocomplete="off" />
					<input class="button" type="submit" value="Search" />
					<p id="search_help"></p>
					</form>
				</div>

				<h1 class="title">
					$main
				</h1>

				<div class="right_top">	
					<img class="main" src="$img_name">
					<div class="main_name">
						<b> 
							$main
						</b>
					</div>
					<table>
						$top_right_info
					</table>
					$edit_right_top
				</div>
	
				<p class="description">
					$description
				</p>
				$edit_main
			</div>
			
			$toc

			$content

			<div class="cleaner"></div>

			$not_admin_view

			$make_new_page

			$delete_page

		</div>
	</body>
HEREDOC;

		}
		
		else {

echo <<<HEREDOC
	<body onmousedown="clicked_position()">
		<div class="wiki_wrapper">
			<div class="top">
				<a name="home" href="ggwiki.php#home">
					<img class="logo" src="/ggwiki_images/ggwiki_logo.png">
				</a>
				
				<div class="search_wrapper">
					<input type="text" id="search_input" onclick="search_help(event, this.value, 0)" onkeyup="search_help(event, this.value, event)" onblur="clean_search(event)" />
					<p id="search_help"></p>
				</div>

				<h1 class="title">
					$main
				</h1>
			</div>

			$page_error

			$make_new_page

		</div>
	</body>
HEREDOC;

		}
		
	}
?>

<?php
Template::print_body_footer();
Template::print_disclaimer();
?>
<?php
require("include/includes.php");
require("include/Calendar.class.php");
require("include/Template.class.php");
require("include/Shoutbox.class.php");
require("include/EvalNag.class.php");
require("include/GGManiacNag.class.php");
Template::print_head(array("site.css", "calendar.css", "excel.css"));
Template::print_body_header('Home', 'NEWS');
?>
<h1>Gamma Gamma Maniacs!</h1>
<?php
$year = date("Y");
$semester = (int) (date("m") > 7);
$semester_query = new Query("SELECT semester, namesake_short FROM apo_semesters WHERE id>3 ORDER BY id DESC");
while($sem_row = $semester_query->fetch_row()){
    $semester_name = $sem_row['semester'];
    $namesake = $sem_row['namesake_short'];
    $year = explode(" ", $semester_name);
    $semester = (int) ($year[0]=="Fall");
    $year = $year[1];
    //GG Maniacs
    echo "
    <div class='newsItem'>
    <h2 class='center'>$semester_name $namesake GG Maniacs!</h2>
        <div class='collage-container'>
        <div class='collage-pictures'>";
    
    $query = new Query("SELECT firstname, lastname FROM apo_wiki_positions as pos JOIN apo_users USING (user_id) JOIN apo_wiki_positions_basic_info as bas USING (basic_info_id) WHERE pos.`position_type`=9 AND year=$year AND semester=$semester");
    while($row = $query->fetch_row()){
        $name = $row['firstname'] . " " . $row['lastname'];
        echo "
        <div class='person-picture'>
			<p class='center'>$name</p>
		</div>
        ";  
    }
    echo '
        </div>
        <div style="clear: left;"></div>
        </div>
    </div>';
    
    // Pledge Maniacs
    echo "
    <div class='newsItem'>
    <h2 class='center'>$semester_name $namesake Pledge Maniacs!</h2>
        <div class='collage-container'>
        <div class='collage-pictures'>";
    
    $query = new Query("SELECT firstname, lastname FROM apo_wiki_positions as pos JOIN apo_users USING (user_id) JOIN apo_wiki_positions_basic_info as bas USING (basic_info_id) WHERE pos.`position_type`=10 AND year=$year AND semester=$semester");
    while($row = $query->fetch_row()){
        $name = $row['firstname'] . " " . $row['lastname'];
        echo "
        <div class='person-picture'>
			<p class='center'>$name</p>
		</div>
        ";  
    }
    echo '
        </div>
        <div style="clear: left;"></div>
        </div>
    </div>';
    if ($semester==0){
        $year--;
    }
    $semester = 1-$semester;
}
?>
<?php
Template::print_body_footer();
Template::print_disclaimer();
?>

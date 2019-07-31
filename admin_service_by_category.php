<?php
require("include/includes.php");
require("include/Template.class.php");
Template::print_head(array('admin_view_requirements.css'));
Template::print_body_header('Home', 'ADMIN');

if ($g_user->is_logged_in()) {

    echo '<h1>View Service Hours By Category</h1>
    <p style="padding: 1em 0px">Note that this is only as accurate as what is reported on the calendar. Events need to be <strong>evaluated</strong> and marked with the appropriate event types to count. The service hours for the Youth category is only a lower bound since we dont have a youth category</p>';

    $start = date("Y-m-d", strtotime("now"));
    if (isset($_POST["start"])) {
        $start = $_POST["start"];
    }
    
    $end = date("Y-m-d", strtotime("now"));
    if (isset($_POST["end"])) {
        $end = $_POST["end"];
    }
    
    
    echo <<<HEREDOC
    <form style="margin-top: 1em" action="" method="POST">
    Don't Forget to CHANGE THE DATES, BUT STILL IN THIS FORMAT (year-month-day)!!!
    <p>Start date: <input type="text" name="start" value="$start" /> End date: <input type="text" name="end" value="$end" /> <button type="submit">Submit</button>
    </form>
HEREDOC;
    echo '<table width="80%">
<caption>Service Hours By Category</caption>
<tr><td>Category</td><td>Hours</td></tr>';

    $four_cs = array("campus", "chapter", "country", "community");
    foreach($four_cs as $c){
        $query = new Query("SELECT sum(hours) as s FROM apo_calendar_attend JOIN apo_calendar_event USING (event_id) WHERE flaked=0 AND date BETWEEN '$start' AND '$end' AND type_service_$c=1");
        if ($row = $query->fetch_row()){
            $hours = $row['s'];
            echo "<tr>
                    <td>Service to the $c<td><td>$hours<td>
                </tr>";
    }
    }
    $query = new Query("SELECT sum(hours) as s FROM apo_calendar_attend JOIN apo_calendar_event USING (event_id) WHERE flaked=0 AND date BETWEEN '$start' AND '$end' AND (type_service_campus=1 OR type_service_chapter=1 OR type_service_community=1 OR type_service_country=1) AND (description LIKE '%youth%' OR description LIKE '%kid%' OR description LIKE '%child%')");
        if ($row = $query->fetch_row()){
            $hours = $row['s'];
            echo "<tr>
                    <td>Service to the Youths (lower bound)<td><td>$hours<td>
                </tr>";
    }
        
    echo '</table>';

}

Template::print_body_footer();
Template::print_disclaimer();

?>
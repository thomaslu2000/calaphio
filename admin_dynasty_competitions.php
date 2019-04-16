<?php
require("include/includes.php");
require("include/Template.class.php");
Template::print_head(array());
Template::print_body_header('Home', '');

if (!$g_user->is_logged_in() || !$g_user->permit("admin view requirements"))
{
	trigger_error("You must be logged in as an admin to access this feature", E_USER_ERROR);
} else{
    if (isset($_POST['eid'])){
        $alpha_points = isset($_POST['alpha']) ? $_POST['alpha'] : 0;
        $phi_points = isset($_POST['phi']) ? $_POST['phi'] : 0;
        $omega_points = isset($_POST['omega']) ? $_POST['omega'] : 0;
        $query = new Query(sprintf("
            INSERT INTO apo_dynasty_competitions (event_id, alpha_points, phi_points, omega_points) VALUES (%u, %u, %u, %u)
            ON DUPLICATE KEY UPDATE alpha_points=%u, phi_points=%u, omega_points=%u
        ", $_POST['eid'], $alpha_points, $phi_points, $omega_points, $alpha_points, $phi_points, $omega_points));
    }

?>
<style>
    td {
        border: solid gray 1px;
        padding: 0 5px 0 5px;    
    }
</style>
    <h1>Set Points per Attendee for a Dynasty Event</h1>

    <?php
        if ($g_user->permit("admin view requirements", TRUE)){
            
            $start = date("Y-m-d", strtotime("now"));
            $end = date("Y-m-d", strtotime("now"));
            $sem = "now";
            $query = new Query("SELECT semester, start, end FROM apo_semesters ORDER BY id DESC LIMIT 1");
            if ($row = $query->fetch_row()) {
                $start = date("Y-m-d", strtotime($row['start']));
                $end = date("Y-m-d", strtotime($row['end']));
                $sem = $row['semester'];
            }
            $query = new Query(sprintf(" 
            SELECT title, date, event_id 
            FROM apo_calendar_event 
            WHERE type_interchapter_half=TRUE AND date BETWEEN '%s' AND '%s' ORDER BY date DESC
	       ", $start, $end));
            
            $event_options = "";
            while ($row = $query->fetch_row()) {
                $title = $row['title'];
                $event_id = $row['event_id'];
                $date = $row['date'];
                $event_options .= "<option value='$event_id'>$title $date</option>";
            }

            echo <<<HEREDOC
    <form method="post" action="">
    <table width="100%" >
        <tr>
            <td>Event Name </td>
            <td>Alpha Points Per Person</td>
            <td>Phi Points Per Person</td>
            <td>Omega Points Per Person</td>
        </tr>
        <tr>
            <td>
                <select name="eid">
                    $event_options
                </select>
            </td>
            <td>
                <input type="number" name="alpha" />
            </td>
            <td>
                <input type="number" name="phi" />
            </td>
            <td>
                <input type="number" name="omega" />
            </td>
        </tr>
        <tr><td colspan="4">
            <button type="submit">Submit</button>
        </td></tr>
    </table>
    </form>
    <br><br>
HEREDOC;
        }
    }
Template::print_body_footer();
Template::print_disclaimer();
?>
<?php
require("include/includes.php");
require("include/Template.class.php");
Template::print_head(array());
Template::print_body_header('Home', '');

if (!$g_user->is_logged_in() || !$g_user->permit("admin account disable"))
{
	trigger_error("You must be logged in as an admin to access this feature", E_USER_ERROR);
} else{
    if (isset($_POST['donor-name']) && isset($_POST['pids']) && isset($_POST['credits']) && isset($_POST['reason'])) {
        $pids = explode(" ", $_POST['pids']);
        $names = "";
        foreach ($pids as $pid) {
            if (is_numeric($pid)) {
                $query = new Query(sprintf("SELECT firstname, lastname FROM apo_users WHERE user_id=%u LIMIT 1", $pid));
                if($row = $query->fetch_row()){
                    $names .= $row['firstname'] . " " . $row['lastname'] . ", ";
                    $credits = $_POST['credits'];
                    $query = new Query(sprintf("
                    INSERT INTO apo_leadership_credits (user_id, donor_id, num_credits, reason, date)
                    VALUES ('%d', '%d', '%d', '%s', '%s')", $pid, $_POST['donor-name'], $credits, $_POST['reason'], date("Y-m-d")));
                }
            }
                
            }
            echo "<h2> $names given $credits credits</h2>";
        }

?>

    <h1>Give Leadership Credits to a User</h1>

    <?php
        if ($g_user->permit("admin account disable", TRUE)){
            $donor_id = $g_user->data['user_id'];
            echo <<<HEREDOC
    <form method="post" action="" id="credit-form">
    User Ids (MUST BE SEPARATED BY SPACE): <br><input type="text" name='pids' id='pids'>
    <br>
    Number of Credits: <br><input type="number" name='credits' id='credits'>
    <br>
    <input type="hidden" value="$donor_id" name="donor-name">
    <button type="submit">Submit</button>
    </form>
    <textarea name="reason" form="credit-form" style="width: 600px; height: 50px;" placeholder="Enter Reason For Credits"></textarea>
    <hr>
    <script type="text/javascript" src="ajax.js"></script>
    <script type="text/javascript" src="short_search.js"></script>
    Quick Search: <input id="apo_short_search_input" type="text" />
    <br>
    <div id="apo_short_search_result"></div>
HEREDOC;
        }
    }
Template::print_body_footer();
Template::print_disclaimer();
?>

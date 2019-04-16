<?php
require("include/includes.php");
require("include/Template.class.php");
Template::print_head(array());
Template::print_body_header('Home', '');

if (!$g_user->is_logged_in() || !$g_user->permit("admin account disable"))
{
	trigger_error("You must be logged in as an admin to access this feature", E_USER_ERROR);
} else{
    if (isset($_POST['pids']) && isset($_POST['dynasty'])) {
        $pids = explode(" ", $_POST['pids']);
        $names = "";
        $pids = 'user_id=' . implode(" OR user_id=", $pids);
        $query = new Query(sprintf("UPDATE apo_users SET dynasty='%s' WHERE %s", $_POST['dynasty'], $pids));
        echo "<h2> Dynasties Changed </h2>";
        }

?>

    <h1>Change All IDs to a Certain Dynasty</h1>

    <?php
        if ($g_user->permit("admin account disable", TRUE)){
            $donor_id = $g_user->data['user_id'];
            echo <<<HEREDOC
    <form method="post" action="" id="credit-form">
    User Ids (MUST BE SEPARATED BY A SPACE): <br><br><input type="text" name='pids' id='pids'>
    <br><br>
    <select name='dynasty'>
        <option value='ALPHA'> ALPHA </option>
        <option value='PHI'> PHI </option>
        <option value='OMEGA'> OMEGA </option>
    </select>
    <br><br>
    <button type="submit">Submit</button>
    </form><br><br>
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
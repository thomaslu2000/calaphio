<?php
require("include/includes.php");
require("include/Template.class.php");
Template::print_head(array());
Template::print_body_header('Home', '');

if (!$g_user->is_logged_in() || !$g_user->permit("admin account disable"))
{
	trigger_error("You must be logged in as an admin to access this feature", E_USER_ERROR);
} else{
    if (isset($_POST['pid']) && isset($_POST['disabled']) && isset($_POST['confirmed'])){
        $query = new Query(sprintf("UPDATE apo_users SET disabled=%d WHERE user_id=%u LIMIT 1", 1-$_POST['disabled'], $_POST['pid']));
        if ($query->affected_rows() > 0){
            echo "<h2> User Status Changed to ". ($_POST['disabled']==1 ? 'not disabled' : 'disabled') ."</h2>";
        } else{ 
            echo "<h2> Error Changing Status </h2>";
        }
    } elseif (isset($_POST['pid'])){
        $query = new Query(sprintf("SELECT firstname, lastname, email, disabled FROM apo_users WHERE user_id=%u LIMIT 1", $_POST['pid']));
            if($row = $query->fetch_row()){
                $disabled_status = $row['disabled'] ? 'disabled' : 'not disabled';
                $firstname = $row["firstname"];
                $lastname = $row["lastname"];
                $email = $row["email"];
                $pid = $_POST['pid'];
                $disabled = $row['disabled'];
                echo <<<HEREDOC
            <h2>  $firstname $lastname with email $email is currently $disabled_status. Press submit to change that. </h2>
            <form method="post" action="">
            <input type="hidden" name='pid' value="$pid">
            <input type="hidden" name='disabled' value="$disabled">
            <input type="hidden" name='confirmed' value="true">
            <button type="submit">Submit</button>
            </form>
HEREDOC;
        } else{
                echo "<h2> There is no one with that id </h2>";
            }
}

?>

    <h1>Enter ID number of user</h1>

    <?php
        if ($g_user->permit("admin account disable", TRUE)){
            echo <<<HEREDOC
    <form method="post" action="">
    <input type="number" name='pid' id='pid'>
    <button type="submit">Submit</button>
    </form>
    <br><br>
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
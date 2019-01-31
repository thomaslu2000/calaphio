<?php
require("include/includes.php");
require("include/Template.class.php");
Template::print_head(array());
Template::print_body_header('Home', '');

if (!$g_user->is_logged_in())
{
	trigger_error("You must be logged in as an admin to access this feature", E_USER_ERROR);
}
else
{
    $user_id = $g_user->data['user_id'];
    if (isset($_POST['view-del'])){
        if ($_POST['view-del'] === "view"){
            $hide_del = 0;
        } else{
            $hide_del = 1;
        }
        $query = new Query(sprintf("SELECT 1 FROM apo_user_settings WHERE user_id=%u LIMIT 1", $user_id));
        if($row = $query->fetch_row()){
            $query = new Query(sprintf("UPDATE apo_user_settings SET hide_deleted=%d WHERE user_id=%u", $hide_del, $user_id));
        } else{
            $query = new Query(sprintf("INSERT INTO apo_user_settings (user_id, hide_deleted) values(%u, %d)", $user_id, $hide_del));
            if ($query->affected_rows() == 0) trigger_warning('error adding settings');
        }
            
        $g_user->change_data('hide_deleted', $hide_del);
        echo "
        <h2 style='color: red'> Settings Successfully Changed $a</h2>
        ";
    }
?>

<h1>Change User Settings</h1>

<?php
    if ($g_user->permit("calendar view deleted", TRUE)){
        $sel = (!$g_user->permit("calendar view deleted")) ? " selected":"";
        echo <<<HEREDOC
<form method="post" action="">
<select name="view-del">
    <option value="view">View Deleted Events</option>
    <option value="hide"$sel> Hide Deleted Events</option>
  </select>
<button type="submit">Submit</button>
</form>

HEREDOC;
    }
}
Template::print_body_footer();
Template::print_disclaimer();
?>
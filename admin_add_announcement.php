<?php
require("include/includes.php");
require("include/Template.class.php");
Template::print_head(array());
Template::print_body_header('Home', '');


function db_safe_string($str) {
    $str = htmlentities($str, ENT_QUOTES, 'UTF-8');
    $str = str_replace("\r\n", "<br />", $str);
    $str = str_replace(array("\r", "\n"), "<br />", $str);
    $str = Query::escape_string($str);
    return $str;
}

$permitted = $g_user->permit("admin view requirements") || $g_user->permit("admin view pledge requirements");
if (!$g_user->is_logged_in() || !$permitted)
{
	trigger_error("You must be logged in as an admin to access this feature", E_USER_ERROR);
} else{
    if (isset($_REQUEST['post_id']) && is_numeric($_REQUEST['post_id']) && isset($_POST['delete']) && $_POST['delete']=="delete") {
        $query = new Query(sprintf("DELETE FROM apo_announcements WHERE id=%d", $_REQUEST['post_id']));
        echo "<h1> Deleted! </h1>";
    }
    elseif (isset($_POST['user_id']) && isset($_POST['text']) && isset($_POST['title'])) {
        $text = db_safe_string($_POST['text']);
        $title = db_safe_string($_POST['title']);
        $user_id = $_POST['user_id'];
        if (isset($_REQUEST['post_id']) && is_numeric($_REQUEST['post_id'])){
            $query = new Query(sprintf("UPDATE apo_announcements SET text='%s', title='%s' WHERE id=%d", $text, $title, $_REQUEST['post_id']));
        } else {
            $query = new Query(sprintf("INSERT INTO apo_announcements SET user_id=%d, text='%s', title='%s'", $user_id, $text, $title));
        }
        echo "<h1> Published! </h1>";
    }

?>

    <h1>Submit an Announcement</h1> <br />
    <p style="color:black;">Note: <br />
    you need to use html tags to make links and embolden words, etc <br /><br />
    if you don't know how, use <a href="https://wordtohtml.net/" target="_blank">this website</a> and copy-paste the code
</p>

    <?php
        if ($permitted){
            $user_id = $g_user->data['user_id'];
            echo <<<HEREDOC
    <form method="post" action="" id="announce-form">
    <input type="hidden" value="$user_id" name="user_id">
    Title: <input type="text" name="title" id="title">
    <div>
    <textarea id="main-text" class='text' name='text' style="width: 700px; height: 300px;"></textarea>
    </div>
    <button type="submit">Submit</button>
    </form>
HEREDOC;
        }
    } 

if (isset($_REQUEST['post_id']) && is_numeric($_REQUEST['post_id'])) {
    $query = new Query(sprintf("SELECT title, text FROM apo_announcements WHERE id=%d", $_REQUEST['post_id']));
    if ($row = $query->fetch_row()){
        $title = html_entity_decode($row["title"]);
        $text = html_entity_decode($row["text"]);
    echo <<<HEREDOC
    <form method="post" action="" >
        <input type="hidden" value="delete" name="delete">
        <button type="submit">Delete</button>
    </form>
    
    <script type="text/javascript">
        document.getElementById('title').value = '$title';
        document.getElementById('main-text').value = '$text';
    </script>
HEREDOC;
    }
}

Template::print_body_footer();
Template::print_disclaimer();
?>

<?php
require("include/includes.php");
require("include/Calendar.class.php");
require("include/Template.class.php");
// require("include/Shoutbox.class.php");
require("include/EvalNag.class.php");
require("include/GGManiacNag.class.php");
Template::print_head(array("site.css", "calendar.css", "excel.css"));
Template::print_body_header('Home', 'NEWS');
ini_set('display_errors',1);  error_reporting(E_ALL);

$template = new Template();
$calendar = new Calendar();

$evalnag = new EvalNag();
echo $evalnag->display("2007-01-01");

$gg_maniac_nag = new GGManiacNag();
echo $gg_maniac_nag->display();

// $shoutbox = new Shoutbox();
// $shoutbox->process();
// echo $shoutbox->display();

$calendar->print_upcoming_events(5);

$g_user->process_mailer(false);
$g_user->print_mailer(false);
$g_user->print_personal_messages();
if (!$g_user->is_logged_in()) {
    echo '<img style="float: right" src="images/lfs_banner.png" alt="LFS" />';
}
?>


<?php if ($g_user->is_logged_in()): ?>
   
<!-- template
    <div class="newsItem">
        <h2>CM 2 Recap</h2>
        <p class="date">September 14, 2018 at 10:49pm</p>

            <a href="https://docs.google.com/presentation/d/1D21PuV0KZg_31IdVwL7nvHt7G5wbTswwuNkmil4ApH8/edit#slide=id.p" target="_blank">CM 2 Slides</a><br>
            <a href="https://members.calaphio.com/reimbursement.php" target="_blank">Reimbursements</a><br>
            <a href="https://members.calaphio.com/gg_maniac_vote.php?id=146" target="_blank">CM 3 GG Maniac</a><br>
            <a href="https://docs.google.com/spreadsheets/d/1vDGebsyI3XCyHPidl5y7mCutUcD6aHZCz0xoyj-zcnk/edit#gid=1589878783" target="_blank">ExComm Chairing Positions Available</a><br>
    
    <p>- <a href="profile.php?user_id=4622">Shengmin Xiao (MMC)</a></p>
</div>
-->

<?php 


//auto generate news code
$query = new Query(sprintf("SELECT start, end FROM apo_semesters ORDER BY end DESC LIMIT 1"));
if($row = $query->fetch_row()){
    $start_time = $row['start'];
    $end_time = $row['end'];
    $query = new Query(sprintf(
        "SELECT user_id, id, text, publish_time, title, firstname, lastname, pledgeclass
        FROM apo_announcements 
        JOIN apo_users USING (user_id)
        WHERE publish_time > '%s' AND publish_time < '%s'
        ORDER BY id DESC", $start_time, $end_time));
    }
    while($row = $query->fetch_row()){
        $name_stuff = $row['firstname'] . " " . $row['lastname'] . " (" . $row['pledgeclass'] .")";
?>


<div class="newsItem">
        <h2> 
        <?php 
        echo html_entity_decode($row['title']);
        
        if ($g_user->permit("admin view requirements") || $g_user->permit("admin view pledge requirements")) {
            $post_id = $row['id'];
            echo "
            <a href='admin_add_announcement.php?post_id=$post_id'> (Edit/Delete Post) </a>
            ";
        }
        
        ?> 
        </h2>
        <p class="date"> <?php echo date('M j Y g:i A', strtotime($row['publish_time'])) ?> </p>
    <p>
        <?php echo html_entity_decode($row['text'])?>
    </p>
    <p>- <a href="profile.php?user_id=<?php echo $row['user_id'] ?>"><?php echo $name_stuff ?></a></p>
</div>
<?php } 

// end auto generate news code
?>

<?php endif ?>


<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
    <a href="news_fa19.php">Older News ></a>
<?php endif ?>

<?php
$template->print_body_footer();
$template->print_disclaimer();
?>

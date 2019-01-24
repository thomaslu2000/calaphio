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



<!--
template
<?php if ($g_user->is_logged_in()): ?>
    <div class="newsItem">
        <h2>CM 2 Recap</h2>
        <p class="date">September 14, 2018 at 10:49pm</p>

            <a href="https://docs.google.com/presentation/d/1D21PuV0KZg_31IdVwL7nvHt7G5wbTswwuNkmil4ApH8/edit#slide=id.p" target="_blank">CM 2 Slides</a><br>
            <a href="https://members.calaphio.com/reimbursement.php" target="_blank">Reimbursements</a><br>
            <a href="https://members.calaphio.com/gg_maniac_vote.php?id=146" target="_blank">CM 3 GG Maniac</a><br>
            <a href="https://docs.google.com/spreadsheets/d/1vDGebsyI3XCyHPidl5y7mCutUcD6aHZCz0xoyj-zcnk/edit#gid=1589878783" target="_blank">ExComm Chairing Positions Available</a><br>
    
    <p>- <a href="profile.php?user_id=4622">Shengmin Xiao (MMC)</a></p>
</div>
<?php endif ?>
-->

<?php if ($g_user->is_logged_in()): ?>
    <div class="newsItem">
        <h2>CM 1 Recap</h2>
        <p class="date">January 23, 2018 at 9:26am</p>

    Welcome back actives! 


        <br>

        <p style="margin-bottom: 1em;">CM1 Recap:<br>
            <a href="#" target="_blank">CM 1 Slides - Coming Soon</a><br>
            <a href="https://docs.google.com/spreadsheets/d/1nGL7EFeRhQ29fJM0GRoQS_ZgHgY5GZs2rRDUNLiIRaI/edit?usp=sharing" target="_blank">Spring 2019 Budget</a><br>
 			<a href="https://docs.google.com/spreadsheets/d/1UHi-jXJE81ivCynymgVezzy69_cPS-x5Jxgfaf0HBPE/edit?fbclid=IwAR3t5rzV3nPVztEY26uZq-PVHI5C4jeQDt8J8mHnx6MR-MNr_xy8TiIXWEQ#gid=1589878783" target="_blank">Spring Excomm Chairing Positions</a><br>
 			<a href="https://goo.gl/forms/zMPfMIbR9e5Nyfgu2" target="_blank">Website Suggestion Form</a><br>


            <p>- <a href="profile.php?user_id=4944">Thomas Lu (PVL)</a></p>
        </p>
    </div>
<?php endif ?>



<div class="newsItem">
        <h2>Welcome Gamma Gamma!</h2>
        <p style="margin-bottom: 1em">

    <br>
    Since winter break is now over, it's about time to get back into the APO mentality. Just remember that we're all students first and need to prioritize school, and to focus on quality service over quantity. Good luck this semester!
    <br> 
    
    <p>- <a href="profile.php?user_id=4697">Valerie Hsieh</a></p>
</div>

<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
    <a href="news_fa18.php">Older News ></a>
<?php endif ?>

<?php
$template->print_body_footer();
$template->print_disclaimer();
?>

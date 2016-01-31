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
<div class="newsItem">
        <h2> Announcements </h2>
        <p class="date">Sunday, January 31, 2015</p>
        <p style="margin-bottom: 1em">

        <a href="https://docs.google.com/a/berkeley.edu/forms/d/1MjPg04APdItAfAibr83rpupNiywmLQ-xRQ9i30UfImo/viewform" target="_blank"> Caption Contest </a> </a><br>
        <a href="https://docs.google.com/a/berkeley.edu/forms/d/1JDx2yypHjZj-eUlyFk2wv6Q_n-gNu8MYpNzK7zE2Nt8/viewform?c=0&w=1" target="_blank"> Feedback Form </a> </a><br>
        <a href="https://docs.google.com/spreadsheets/d/1Juk1XldLPt6m2SJw2773ECmbEUHzVCo3S2ZKAnr-1pE/edit#gid=1283827056" target="_blank"> Updated Budget </a> </a><br>
        <a href="https://docs.google.com/a/berkeley.edu/forms/d/1o4f1xuGvHm8iShe0wTSfzeUEIYXLRMw1T_oiXkkb0qU/viewform?edit_requested=true" target="_blank"> Spring 2016 Standing  </a> </a><br>
        <a href="http://members.calaphio.com/event.php?id=149137&sid=1nwRfrB0X-ciuYm54PDTE1" target="_blank"> Big Sib Workshop </a> </a><br>
        <a href="https://docs.google.com/a/berkeley.edu/forms/d/1kD6ylzuLhlWLL-Yt3rWDNG3-U3yrF9vlDOfJgp_RXWA/viewform"> Fat the Cat </a> </a><br>
        <a href="https://docs.google.com/presentation/d/1VoFJLVrgGwgqL4ValsD-7uWP3OZmZQ9CdLlWAy_OfTQ/edit#slide=id.p" target="_blank"> CM 1 Slides </a> </a><br>
        <a href="hhttps://docs.google.com/document/d/1nPYebnIKGZP3BIzdwQhjxgaTiynfCnRrYiX7UbUBC5g/edit " target="_blank"> CM 1 Minutes </a> </a><br>

    <p>-<a href="profile.php?user_id=2859">Trinh Huynh (CM)</a></p>
</div>
<?php endif ?>

<div class="newsItem">
        <h2> Welcome Brothers of Gamma Gamma!</h2>
        <p style="margin-bottom: 1em">

    <br> Alpha Phi Omega welcomes you back to school! </br> 
    
    <p>-<a href="profile.php?user_id=2859">Trinh Huynh (CM)</a></p>
</div>





<a href="news_fa15.php">Older News ></a>
<?php
$template->print_body_footer();
$template->print_disclaimer();
?>
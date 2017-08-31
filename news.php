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
        <h2>CM 4 Recap</h2>
        <p class="date">October 4, 2016 at 11:54pm</p>
        <p style="margin-top: 1em;"><b>ANNOUNCEMENTS:</b><br></p>
        <p style="margin: 0.5em 0px;">
		ExComm still needs chairs! Please contact the ExComm member you would like to chair under if you are interested in any of the following positions. Chairing is a great way to be involved in the chapter, and to take on a leadership role!</p>

        <p style="margin-bottom: 1em 0px;">
            <b><u>ADMIN VP:</u></b><br>
            <b> Stylus </b>(2)<br>
        </p>

        <p style="margin:1.5em 0px 1em 0px;">
            <b><u>SERVICE VP:</u></b><br>
            <b> Service Buddies </b>(1)<br>
            <b> Campus-Wide Service Project </b>(2)<br>
            <b> HallCarn </b>(3)<br>
        </p>

        <p style="margin:1.5em 0px 1em 0px;">
            <b><u>FINANCE VP:</u></b><br>
            <b> Concessions </b>(Infinity)<br>
        </p>

        <p style="margin:1.5em 0px 1em 0px;">
            <b><u>FELLOWSHIP VP:</u></b><br>
            <b> Roll Call </b>(3-4)<br>
            <b> Hotspot </b>(1)<br>
        </p>

        <p style="margin:1.5em 0px 1em 0px;">
            <b><u>HISTORIAN:</u></b><br>
            <b> Alumni Relations </b>(1)<br>
            <b> Film/Slideshow </b>(>1)<br>
        </p>

        <p style="margin-bottom: 1em;">Here are the following documents from CM 1:<br><br>
            <a href="https://docs.google.com/presentation/d/1LEkGmMUdkZhERdsp9OpBrwzVqAB_pDtAQflIRy0Wsfg/edit?usp=sharing" target="_blank">CM 1 Slides</a><br>
            <a href="https://docs.google.com/spreadsheets/u/2/d/1yQqZmaYAqE8-X82CRVUHxz3bFqRBcD3ERXYypFMyZn8/edit?usp=drive_web" target="_blank">Fall 2017 Budget</a><br>
            <a href="https://goo.gl/forms/6dpxFFjr00e4UQ7f2" target="_blank">Membership Status Form (Due 9/5 at 11:59pm)</a><br>
            <a href="https://docs.google.com/document/d/1mabvkUnMcrwgOtRxDbkZ_TkLKQ0dYOuxaSw72mT4Ewg/edit?ts=59a6d068 " target="_blank">Active Requirements</a><br>
            <a href="https://docs.google.com/document/d/1yLsaCbS8MxsIFTlzVspmIJJcvrEizZYdNkGW6qCeGhU/edit?usp=sharing " target="_blank">Pledge Requirements</a><br>
            <a href="https://members.calaphio.com/gg_maniac_vote.php?id=129  " target="_blank">CM 2 GG Maniac (Cannot vote for past pledge/GG maniacs, ExComm/DComm/PComm)</a><br>
            <a href="https://docs.google.com/document/d/1lV7RILSiour6ldjJ2jeZlql792LzcFAgrcEGhUKZmlc/edit?usp=sharing" target="_blank">Smugmug, Chegg, CourseHero Logins</a><br>
        </p>
        <p style="margin: 0.5em 0px;">
        Be excited for rush, everyone!</p>
        <br>
        <p>- <a href="profile.php?user_id=4630">Ryan Lee (MMC)</a></p>
    </div>
<?php endif ?>

<div class="newsItem">
        <h2>Welcome Gamma Gamma!</h2>
        <p style="margin-bottom: 1em">

    <br>Since school is almost starting, it's about time to get back into the APO mentality. Just remember that we're all students first and need to prioritize school, and to focus on quality service over quantity. Good luck this semester!</br> 
    
    <p>- <a href="profile.php?user_id=3571">Bianca Hsueh (RBD)</a></p>
</div>

<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
    <a href="news_sp17.php">Older News ></a>
<?php endif ?>

<?php
$template->print_body_footer();
$template->print_disclaimer();
?>
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

<div class="newsItem">
        <h2> Welcome Back to School, Gamma Gamma!</h2>
        <p class="date">Thursday, September 3, 2015</p>
        <p style="margin-bottom: 1em">

	<br> Alpha Phi Omega welcomes you back to school! We hope everyone is having a wonderful start
    to this new school year. Here are a couple reminders for the next two weeks: <br> 

    <br>Rush Week begins next week, so sign up on the calendar for rush events! This semester's rush requirements includes attending 1 Info Night, Meet the Chapter, and
    1 rush event of your choice. Don't forget your APO gear and smiles! <br>

	If you are still looking for a chair position, these positions are still open: <br>
    <br><br><p style="font-style: italic">  Family Chair (1 open position)
    <br><br> Family System Chair (1)
    <br><br> Spirit Chair (1) 
    <br><br> Roll Call Chair (1)
    <br><br> Service Project Chairs (1-2)
    <br><br> Fundraiser Chairs (3)
    <br><br> Alumni / Professional Development Chairs (3)
    <br><br> Scrapbook Chair (1)
    <br><br> Photography Chairs (3)
    <br><br> Workshop Chair (1) </p> 
    <br><br>

     <p style="margin-bottom: 1em">Happy Thursday, and see your lovely faces around! CM 1 Notes are linked below!<br>
        <br><br> <a href="https://docs.google.com/presentation/d/1A_zBaknYbJV1-uU1R8fHVBL8gGrLd1Yhf0AT8SlP3ss/edit#slide=id.g65a9917d1_4_130">CM 1 Slides</a><br>          
        <div align = center> <iframe width="480" height="360" src="https://www.youtube.com/embed/BeOC_O23zNg" frameborder="0" allowfullscreen></iframe></div> 
	
    <p>-<a href="profile.php?user_id=2192">Audrey(CM)</a></p>
</div>




<a href="news_sp15.php">Older News ></a>
<?php
$template->print_body_footer();
$template->print_disclaimer();
?>

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
        <h2> CM 2 Recap </h2>
        <p class="date">Wednesday, September 16, 2015</p>
        <p style="margin-bottom: 1em">

    <br> <ul> 

        <li> <br>Rush LFS Week continues till Friday, so make sure you attend as many rush events as you can! 
            You must make at least 1 LFS event to make your rush requirement. <br></li> 
        
        <li> <br>Help out with interviews on Sunday 9/20 from 10:30am-12:30pm at the Moffit Basements; please dress in business casual.</li> <br> 

        <br><li> Please fill out your <a href= "tinyurl.com/f15standing"> Fall 2015 Standing </a> by CM 3. <br></li> 

        <li><br> Sign up for Fall Fellowship by 9/20/15 for the early bird special fee of $25.<br></li>

        <li><br> Sign up for <a href="http://tinyurl.com/AMPF2k15 "> the Alumni Mentorship Program </a> by Thursday 9/17, 11:59PM <br></li>
    
    </ul> </br> 

     
    <br> These chairing positions are still recruiting and want you! 
    <br><br><p style="font-style: italic">  Family System Chair (1)
    <br><br> Spirit Chair (1) 
    <br><br> Roll Call Chair (1)
    <br><br> Fundraiser Chairs (3)
    <br><br> Alumni / Professional Development Chairs (2)
    <br><br> Photography Chairs (2)
    <br><br> Workshop Chair (1) </p> 
    <br><br>

    <br> Finally, remember to sign up for service! <br>

    <p style="margin-bottom: 1em"> 
               
        <div align = center> <iframe width="640" height="360" src="https://www.youtube.com/embed/gRLcnc5ivgM" frameborder="0" allowfullscreen></iframe></div> 
        <br><br> <a href="https://docs.google.com/a/calaphio.com/presentation/d/1QMGtWYohj51K8qZzUo8edyfuKoHWI8-aKw_Iuf_uEF0/edit?usp=sharing">CM 2 Notes</a><br>  
    <p>-<a href="profile.php?user_id=2192">Audrey Tsai (CM)</a></p>
</div>
<?php endif ?>



<?php if ($g_user->is_logged_in()): ?>
<div class="newsItem">
        <h2> Welcome Back to School, Gamma Gamma!</h2>
        <p class="date">Thursday, September 3, 2015</p>
        <p style="margin-bottom: 1em">

	<br> Alpha Phi Omega welcomes you back to school! We hope everyone is having a wonderful start
    to this new school year. Here are a couple reminders for the next two weeks: <br> 

    <br>Rush Week begins next week, so sign up on the calendar for rush events! This semester's rush requirements includes attending 1 Info Night, Meet the Chapter, and
    1 rush event of your choice. Don't forget your APO gear and smiles! <br>

	<br> If you are still looking for a chair position, these positions are still open: 
    <br><br><p style="font-style: italic">  Family System Chair (1)
    <br><br> Spirit Chair (1) 
    <br><br> Roll Call Chair (1)
    <br><br> Service Project Chairs (1-2)
    <br><br> Fundraiser Chairs (3)
    <br><br> Alumni / Professional Development Chairs (3)
    <br><br> Scrapbook Chair (1)
    <br><br> Photography Chairs (3)
    <br><br> Workshop Chair (1) </p> 
    <br><br>

     <p style="margin-bottom: 1em">Happy Thursday, and see your lovely faces around! CM 1 Notes are linked below!
        <br><br> <a href="https://docs.google.com/presentation/d/1A_zBaknYbJV1-uU1R8fHVBL8gGrLd1Yhf0AT8SlP3ss/edit#slide=id.g65a9917d1_4_130">CM 1 Slides</a><br>          
        <div align = center> <iframe width="480" height="360" src="https://www.youtube.com/embed/BeOC_O23zNg" frameborder="0" allowfullscreen></iframe></div> 
	
    <p>-<a href="profile.php?user_id=2192">Audrey Tsai (CM)</a></p>
</div>
<?php endif ?>

<div class="newsItem">
        <h2> Welcome Brothers of Gamma Gamma!</h2>
        <p style="margin-bottom: 1em">

    <br> Alpha Phi Omega welcomes you back to school! Here's to another new year of service, friendship, 
    and leadership! Alpha Phi Omega encourages you to find the opportunities that interest you, and take advantage
    of our network and community. </br> 
    
    <p>-<a href="profile.php?user_id=2192">Audrey Tsai (CM)</a></p>
</div>





<a href="news_sp15.php">Older News ></a>
<?php
$template->print_body_footer();
$template->print_disclaimer();
?>

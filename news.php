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
            <h2>Election Platforms</h2>
            <p class="date">November 13, 2016 at 5:30pm</p>

        <p style="margin: 1.5em 0px .5em 0px;">
            Thank you again to those who submitted platforms for elections! Here are the following submissions for each position:
        </p>

        <div>
            <div class="row">
                <div class="span3" style="margin: 1.5em 0px .5em 0px;">
                    <b><u>PRESIDENT:</u></b><br>
                    <p style="padding: 3 0;"><a href="/fall2017_platforms/president.pdf" target="_blank">Stanley Shaw</a></p>
                </div>

                <div class="span3" style="margin: 1.5em 0px .5em 0px;">
                    <b><u>SERVICE VP:</u></b><br>
                    <p style="padding: 3 0;"><a href="/fall2017_platforms/svp.pdf" target="_blank">Edith Lai</a></p>
                </div>

                <div class="span3" style="margin: 1.5em 0px .5em 0px;">
                    <b><u>PLEDGEMASTER:</u></b><br>
                    <p style="padding: 3 0;"><a href="/fall2017_platforms/pm.pdf" target="_blank">Qiao Li</a></p>
                </div>

                <div class="span3" style="margin: 1.5em 0px .5em 0px;">
                    <b><u>FINANCE VP:</u></b><br>
                    <p style="padding: 3 0;"><a href="/fall2017_platforms/finvp.pdf" target="_blank">Shengmin Xiao</a></p>
                </div>

                <div class="span3" style="margin: 1.5em 0px .5em 0px;">
                    <b><u>FELLOWSHIP VP:</u></b><br>
                    <p style="padding: 3 0;"><a href="/fall2017_platforms/fvp.pdf" target="_blank">Seline Ting</a></p>
                </div>
            </div>
        </div>

        <p style="margin: 1.5em 0px;">
            I highly encourage all actives and pledges to read over each platform prior to Elections. In addition, if you did not submit a platform, you may still run on the day of Elections. Good luck to everyone who runs for an ExComm position!
        </p>
        
        <p>- <a href="profile.php?user_id=2978">Ryan Lee (MMC)</a></p>
    </div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
    <div class="newsItem">
        <h2>CM 6 Recap</h2>
        <p class="date">November 1, 2017 at 4:23pm</p>
        <p style="margin-top: 1em;"><b>ANNOUNCEMENTS:</b><br></p>
        <p style="margin: 0.5em 0px;">
            <a href="https://docs.google.com/spreadsheets/d/1GzWw27HozuImRkISRc0K1UID810DkKYpMAK3mJiIkRU/edit?usp=sharing" target="_blank">Nominations</a> <br>
            Congratulations to all of our nominees! Just a reminder that any active is able to run for an ExComm position, regardless if they have a nomination or not. Therefore, if you plan on running, please email your platform to admin-vp@calaphio.com by <b>Sunday, 11/12 11:59pm</b>. If you have any questions about any ExComm position, feel free to talk to anyone on ExComm and we will share with you our thoughts!
            
        </p>
        <br>
        <p style="margin-bottom: 1em;">Here are the following documents from CM 6:<br>
            <a href="https://docs.google.com/presentation/d/1C3sqPUIMP64iuerO84xTHHwCUNXXSoG5DiFy86gvBFg/edit?usp=sharing" target="_blank">CM 6 Slides</a><br>
            <a href="https://goo.gl/forms/Jo6gtPxpLsXNrn8P2" target="_blank">Fill out this form if you are going to Fall Fellowship!</a><br>
            <a href="https://goo.gl/forms/SBxOtddcLhLhTcRe2" target="_blank">Chapter Feedback Form</a><br>
            <a href="/stylus/fa17/CM6_Stylus.pdf" target="_blank">Stylus</a><br>
            <a href="https://docs.google.com/forms/d/e/1FAIpQLSdxjhKWXDYQuROJToXT9DQ1AefSdA5tPZT5E5eyqlZSK17yJA/viewform?vc=0&c=0&w=1" target="_blank">Gear Order Form</a><br>
            <a href="https://goo.gl/forms/0l3xciwCr9iSvMAC3" target="_blank">Banquet RSVP Form</a><br>
            <a href="https://goo.gl/forms/1gj1eKBTFxPJ32Iu2" target="_blank">Caption Contest</a><br>
            <a href="https://www.youtube.com/watch?v=VqdJmVCB7F4">CM 6 Video</a>

            <p>- <a href="profile.php?user_id=4631">Kyle Tse (MMC)</a></p>
        </p>
    </div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
    <div class="newsItem">
        <h2>CM 5 Recap</h2>
        <p class="date">October 18, 2017 at 6:20pm</p>
        <p style="margin-top: 1em;"><b>ANNOUNCEMENTS:</b><br></p>
        <p style="margin: 0.5em 0px;">
            Campout has been moved to Nov 10-11 at Camp Herms! Drivers are needed, so please post whether you can drive or not. The following committees need people to help them out! Please talk to one of the chairs (in parentheses) of the committee to join:         
        </p>
        <ul>
            <li style="list-style-type:disc; margin-left: 2em;"> Stylus (<i>Colleen Yu, Pia Lopez, Shengmin Xiao</i>) </li>
            <li style="list-style-type:disc; margin-left: 2em;"> FunPack (<i>Lara Yedikian, Karissa Lapuz</i>) </li>
            <li style="list-style-type:disc; margin-left: 2em;"> Roll Call (<i>Shengmin Xiao</i>) </li>
            <li style="list-style-type:disc; margin-left: 2em;"> Banquet (<i>Gene Ho, Jia Chen, Hyeonji Shim</i> - <a href="https://goo.gl/forms/pzMOiZxFaaaylsHg1" target="_blank">Banquet Form</a> ) </li>
            <li style="list-style-type:disc; margin-left: 2em;"> Film (<i>Laura Zhu, Christina Liu</i>) </li>
            <li style="list-style-type:disc; margin-left: 2em;"> Photography (<i> Stanley Shaw, Lily Huang</i>) </li>
        </ul>
        <p style="margin: 0.5em 0px;">
            If you are interested in being pen pals with a brother from UIUC, please message Joseph for more information!
        </p>
        <br>
        <p style="margin-bottom: 1em;">Here are the following documents from CM 5:<br>
            <a href="https://docs.google.com/presentation/d/1zHKjMnowMLo_pABU7fPIpAkkpL9NYJkfcevrjTEeV_A/edit?usp=sharing" target="_blank">CM 5 Slides</a><br>
            <a href="https://docs.google.com/forms/d/e/1FAIpQLSdU9x4odc7HkKyVs60i-9MzqTeKbCG9EvS1SIAMzPkzW8poYw/viewform" target="_blank">Fall Fellowship Registration/Info: Please fill this form out by the end of the week, so that rides can be arranged!</a><br>
            <a href="https://goo.gl/forms/SBxOtddcLhLhTcRe2" target="_blank">Chapter Feedback Form</a><br>
            <a href="/stylus/fa17/CM5_Stylus.pdf" target="_blank">Stylus</a><br>
            <a href="https://goo.gl/forms/6G29i05ORDZ3ldLo1" target="_blank">Caption Contest</a><br>
            <a href="https://www.youtube.com/watch?v=k0qxgSqQbkk">CM 5 Video</a>

            <p>- <a href="profile.php?user_id=4630">Ryan Lee (MMC)</a></p>
        </p>


    </div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
    <div class="newsItem">
        <h2>CM 4 Recap</h2>
        <p class="date">October 7, 2017 at 1:20pm</p>
        <p style="margin-top: 1em;"><b>ANNOUNCEMENTS:</b><br></p>
        <p style="margin: 0.5em 0px;">
            As a reminder, if you do service alone, you must take a picture of yourself at the service event, and then upload it to SmugMug (please do not email them to Kerry!).The following committees need people to help them out! Please talk to one of the chairs (in parentheses) of the committee to join: 
        </p>
        <ul>
            <li style="list-style-type:disc; margin-left: 2em;"> Stylus (<i>Colleen Yu, Pia Lopez, Shengmin Xiao</i>) </li>
            <li style="list-style-type:disc; margin-left: 2em;"> FunPack (<i>Lara Yedikian, Karissa Lapuz</i>) </li>
            <li style="list-style-type:disc; margin-left: 2em;"> Hot Spot (<i>Eric Liu, Lara Yedikian</i>) </li>
            <li style="list-style-type:disc; margin-left: 2em;"> Roll Call (<i>Shengmin Xiao</i> - <a href="https://goo.gl/forms/ea8LpljdeZceyVBi1" target="_blank">Roll Call Form</a> ) </li>
            <li style="list-style-type:disc; margin-left: 2em;"> Banquet (<i>Gene Ho, Jia Chen, Hyeonji Shim</i>) </li>
            <li style="list-style-type:disc; margin-left: 2em;"> Film (<i>Laura Zhu, Christina Liu</i>) </li>
            <li style="list-style-type:disc; margin-left: 2em;"> Photography (<i> Stanley Shaw, Lily Huang</i>) </li>
        </ul>
        <br>
        <p style="margin-bottom: 1em;">Here are the following documents from CM 4:<br>
            <a href="https://docs.google.com/presentation/d/14CrjskmVmdxZ9xkyk81sZOgvF5ByXFwbDTmkZYOtSv4/edit?usp=sharing" target="_blank">CM 4 Slides</a><br>
            <a href="https://docs.google.com/forms/d/e/1FAIpQLSdU9x4odc7HkKyVs60i-9MzqTeKbCG9EvS1SIAMzPkzW8poYw/viewform" target="_blank">Fall Fellowship Registration/Info</a><br>
            <a href="https://goo.gl/forms/SBxOtddcLhLhTcRe2" target="_blank">Chapter Feedback Form</a><br>
            <a href="/stylus/fa17/CM4_Stylus.pdf" target="_blank">Stylus</a><br>
            <a href="https://goo.gl/forms/SMoDDzzhXj5DSyyi1" target="_blank">Caption Contest</a><br>
            <a href="https://www.youtube.com/watch?v=HANneC7jTd0">CM 4 Video</a>

            <p>- <a href="profile.php?user_id=4630">Ryan Lee (MMC)</a></p>
        </p>


    </div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
    <div class="newsItem">
        <h2>CM 3 Recap</h2>
        <p class="date">September 21, 2017 at 4:15pm</p>
        <p style="margin-top: 1em;"><b>ANNOUNCEMENTS:</b><br></p>
        <p style="margin: 0.5em 0px;">
            As we welcome our new pledges, please keep in mind what was gone over in today’s CM about creating a safe and welcoming environment for pledges. Our main goal as a chapter in addition to service is to ensure that we have a community that everyone feels comfortable in. If you have any questions or concerns, please feel free to reach out to a member of ExComm.
            <br><br>
            On a separate note, we still need chairs! Please contact Hermes or Sierra if you would like to chair for one of their positions.
        </p>

        <p style="margin-bottom: 1em 0px;">
            <b><u>FINANCE VP:</u></b><br>
            <b> Concessions </b>(∞)<br>
        </p>
        <p style="margin-bottom: 1em 0px;">
            <b><u>FELLOWSHIP VP:</u></b><br>
            <b> Roll Call </b>(3-4) - You don't have to be a dancer<br>
            <b> Hotspot </b>(1) - Must be able to fill Tues 12-2pm slot<br>
        </p>
        <br>
        <p style="margin-bottom: 1em;">Here are the following documents from CM 3:<br>
            <a href="https://docs.google.com/presentation/d/1UKt_NmpzUldRXyPAI2XP33cvMhcUbrAqtNQIGixXiT8/edit?usp=sharing" target="_blank">CM 3 Slides</a><br>
            <a href="https://docs.google.com/forms/d/e/1FAIpQLSdU9x4odc7HkKyVs60i-9MzqTeKbCG9EvS1SIAMzPkzW8poYw/viewform" target="_blank">Fall Fellowship Registration/Info</a><br>
            <a href="https://goo.gl/forms/SBxOtddcLhLhTcRe2" target="_blank">Chapter Feedback Form</a><br>
            <a href="https://members.calaphio.com/gg_maniac_vote.php?id=131" target="_blank">CM 4 GG Maniac (Cannot vote for past pledge/GG maniacs, ExComm/DComm/PComm)</a><br>
            <a href="https://goo.gl/forms/lA3O4FPVsitkxStX2" target="_blank">Caption Contest</a><br>
            <a href="https://docs.google.com/document/d/1lV7RILSiour6ldjJ2jeZlql792LzcFAgrcEGhUKZmlc/edit?usp=sharing" target="_blank">Smugmug, Chegg, CourseHero Logins and Princeton Review Discount Code</a><br>
            <a href="https://www.youtube.com/watch?v=rzh4xyx3YL0">CM 3 Video</a>

            <p>- <a href="profile.php?user_id=3571">Bianca Hsueh (RBD)</a></p>
        </p>
    </div>
<?php endif ?>

<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
    <div class="newsItem">
        <h2>CM 2 Recap</h2>
        <p class="date">September 14, 2017 at 9:01pm</p>
        <p style="margin-top: 1em;"><b>ANNOUNCEMENTS:</b><br></p>
        <p style="margin: 0.5em 0px;">
            Effective immediately, if you are attending a service event alone, you must take a photo of yourself at the event and upload it to SmugMug in order to receive service hours.
            <br><br>
            ExComm still needs chairs! Please contact the ExComm member you would like to chair under if you are interested in any of the following positions. Chairing is a great way to be involved in the chapter, and to take on a leadership role!
        </p>

        <p style="margin-bottom: 1em 0px;">
            <b><u>ADMIN VP:</u></b><br>
            <b> Stylus </b>(2)<br>
        </p>
        <p style="margin-bottom: 1em 0px;">
            <b><u>SERVICE VP:</u></b><br>
            <b> HallCarn </b>(3)<br>
        </p>
        <p style="margin-bottom: 1em 0px;">
            <b><u>FINANCE VP:</u></b><br>
            <b> Concessions </b>(Infinity)<br>
        </p>
        <p style="margin-bottom: 1em 0px;">
            <b><u>FELLOWSHIP VP:</u></b><br>
            <b> Roll Call </b>(3-4)<br>
            <b> Hotspot </b>(1)<br>
        </p>
        <br>
        <p style="margin-bottom: 1em;">Here are the following documents from CM 2:<br>
            <a href="https://docs.google.com/presentation/d/11-Xgzao1torCak0pgjQo8WL2toT-YkTcQayYuEiyGiM/edit?usp=sharing" target="_blank">CM 2 Slides</a><br>
            <a href="https://members.calaphio.com/gg_maniac_vote.php?id=130" target="_blank">CM 3 GG Maniac (Cannot vote for past pledge/GG maniacs, ExComm/DComm/PComm)</a><br>
            <a href="https://goo.gl/forms/ol7uOFtojmeMWdKA2" target="_blank">Caption Contest</a><br>
            <a href="https://docs.google.com/document/d/1lV7RILSiour6ldjJ2jeZlql792LzcFAgrcEGhUKZmlc/edit?usp=sharing" target="_blank">Smugmug, Chegg, CourseHero Logins and Princeton Review Discount Code</a><br>
            <a href="https://www.youtube.com/watch?v=OOIFeke6Yf4">CM 2 Video</a>

            <p>- <a href="profile.php?user_id=4631">Kyle Tse (MMC)</a></p>
        </p>
    </div>
<?php endif ?>

<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
    <div class="newsItem">
        <h2>CM 1 Recap</h2>
        <p class="date">August 30, 2017 at 5:11pm</p>
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
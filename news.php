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
        <h2>CM 3 Recap</h2>
        <p class="date">September 21, 2016 at 12:04am</p>
        <p style="margin-top: 1em;"><b>ANNOUNCEMENTS:</b><br></p>
        <p style="margin: 0.5em 0px;">
        Welcome FH Pledges! I'll be posting a recap of each chapter meeting within 24 hours that it ends. We hope you all enjoy pledging this semester! And good luck to PComm, we hope you guide a great new group of pledges into the chapter!</p>

        <p style="margin: 0.5em 0px;">
        Actives, ExComm still needs chairs for the following positions (amounts needed are in parenthesis). If you are interested in any of them, please contact the respective ExComm member in charge. Thanks!</p>

        <p style="margin-bottom: 1em 0px;">
            <b><u>SERVICE VP:</u></b><br>
            <b>Project Open Hand Chair </b>(1)<br>
            <b>Berkeley Food and Housing Chair </b>(1)<br>
        </p>

        <p style="margin:1.5em 0px 1em 0px;">
            <b><u>FELLOWSHIP VP:</u></b><br>
            <b>IC Events Chair </b>(1)<br>
        </p>

        <p style="margin-bottom: 1em;">Finally, here are the following documents from CM 3:<br><br>
            <a href="https://goo.gl/pfgY4f" target="_blank">CM 3 Slides</a><br>
            <a href="https://goo.gl/HqDKKD" target="_blank">CM 3 Minutes</a><br>
            <a href="https://goo.gl/g5fg9Q" target="_blank">Caption Contest</a><br>
            <a href="https://goo.gl/forms/CoVvEesgevlwga9C3" target="_blank">Om Nom</a><br>
            <a href="https://members.calaphio.com/gg_maniac_vote.php?id=117" target="_blank">GG Maniac 4 Poll </a>(cannot vote for past GG Maniacs or past Pledge Maniacs)<br>
            <a href="https://goo.gl/SdJd5S" target="_blank">Testbank</a><br>
            <a href="https://goo.gl/6sJIuC" target="_blank">Alumni Mentorship Interest Form</a><br>
        </p>
        <p>CM 3 Slideshow:<br><br><iframe width="560" height="315" src="https://www.youtube.com/embed/zOOlwca72Qk" frameborder="0" allowfullscreen></iframe></p>
        <br>
        <p>- <a href="profile.php?user_id=2978">James Young (TT)</a></p>
    </div>
<?php endif ?>

<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
    <div class="newsItem">
        <h2>CM 2 Recap</h2>
        <p class="date">September 13, 2016 at 11:28pm</p>
        <p style="margin-top: 1em;"><b>ANNOUNCEMENTS:</b><br></p>
        <p style="margin: 0.5em 0px;">
        Since <a href="https://members.calaphio.com/event.php?id=150029&sid=PoiVrJ55xC5OaAPfxB5wm1" target="_blank">CM 3</a> is next Tuesday, the <a href="https://members.calaphio.com/gg_maniac_vote.php?id=115">GG Maniac 3 Poll</a> will close on Wednesday 9/14 at 11:59pm! Remember that you cannot vote for past GG Maniacs or past Pledge Maniacs.</p>

        <p style="margin-bottom: 1em;">Also, here are the following documents from CM 2:<br><br>
            <a href="https://goo.gl/rZ5cVS" target="_blank">CM 2 Slides</a><br>
            <a href="https://goo.gl/bmtzHA" target="_blank">CM 2 Minutes</a><br>
            <a href="https://goo.gl/lMru4o" target="_blank">Caption Contest</a><br>
            <a href="https://goo.gl/SdJd5S" target="_blank">Testbank</a><br>
            <a href="https://goo.gl/6sJIuC" target="_blank">Alumni Mentorship Interest Form</a><br>
        </p>
        <p>CM 2 Slideshow:<br><br><iframe src="https://drive.google.com/file/d/0B-KJt7fvwz4OME1UbzlFd1p6WTA/preview" width="560" height="315"></iframe></p>
        <br>
        <p>- <a href="profile.php?user_id=2978">James Young (TT)</a></p>
    </div>
<?php endif ?>

<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
    <div class="newsItem">
        <h2>CM 1 Recap</h2>
        <p class="date">August 31, 2016 at 12:31am</p>
        <p style="margin-top: 1em;"><b>ANNOUNCEMENTS:</b><br></p>
        <p style="margin: 0.5em 0px;">Here are the following documents from CM 1:<br><br>
            <a href="http://goo.gl/1A0TFE" target="_blank">CM 1 Slides</a><br>
            <a href="http://goo.gl/E7zu6E" target="_blank">CM 1 Minutes</a><br>
            <a href="http://goo.gl/AsFDzl" target="_blank">Fall 2016 Budget</a><br>
            <a href="http://goo.gl/iVGGbA" target="_blank">Active Requirements</a><br>
            <a href="http://goo.gl/EmjuND" target="_blank">Pledge Requirements</a><br>
            <a href="http://goo.gl/YPSpnl" target="_blank">Caption Contest</a><br>
            <a href="https://members.calaphio.com/gg_maniac_vote.php?id=114">GG Maniac 2 Poll</a> (cannot vote for past GG Maniacs or past Pledge Maniacs)<br>
        </p>
        <p>CM 1 Slideshow:<br><br><iframe width="560" height="315" src="https://www.youtube.com/embed/siHADfaStaY" frameborder="0" allowfullscreen></iframe></p>
        <br>
        <p>- <a href="profile.php?user_id=2978">James Young (TT)</a></p>
    </div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
<div class="newsItem">
        <h2>Fall 2016 Executive Committee Chairs</h2>
        <p class="date">August 5, 2016 at 12:54pm</p>

    <p style="margin: 1.5em 0px;">
        * Denotes chairing positions with committees
    </p>

    <p style="margin: 1.5em 0px;">
        <b><u>PRESIDENT:</u></b><br>
        <b>* Fall Fellowship Chairs:</b> Gene Ho, Bianca Hsueh, Nick Weis, Stanley Shaw<br>
        <b>Parliamentarian:</b> Joseph Lee<br>
        <b>Sergeant-at-Arms:</b> Calvin Lui, Richard Wong, Naomichi Yamamoto<br>
        <b>IC/Public Relations Chairs:</b> Gordon Mah, Veronica Hall<br>
        <b>* Professional Development Chair:</b> Henry Chen<br>
    </p>

    <p style="margin: 1.5em 0px;">
        <b><u>ADMIN VP:</u></b><br>
        <b>Admin VP Assistant:</b> Jerry Park<br>
        <b>Webmasters:</b> Jeffrey Li, Thaniel Directo, Yuki Mizuno, Edson Romero, Audrey Tsai<br>
        <b>* Stylus Chairs:</b> Bianca Hsueh, Claire Li, Miranda Zhou<br>
        <b>* Funpack Chairs:</b> Nina Nguyen, Lisa Hoang<br>
        <b>Academic Chair:</b> Chris Janssen<br>
    </p>

     <p style="margin: 1.5em 0px;">
        <b><u>MEMBERSHIP VP:</u></b><br>
        <b>* Rush Chairs:</b> Gene Ho, Alice Hsieh, Jessica Tzeng, Scottie Wan<br>
        <b>Dynasty Directors:</b> Joanna Choi, Sierra Lou, Tenzin Paldon, Sherri Zhang, Patrick Chang, Claudia Lim<br>
        <b>Membership VP Assistants:</b> Alice Hsieh, Jessica Tzeng, Yanan Wang, Veronica Hall<br>
        <b>Gear Chairs:</b> Bianca Hsueh, Nina Nguyen<br>
        <b>* Roll Call Chairs:</b> Jessica Lee, Miranda Zhou, Jeremy Lam, Serena Wu<br>
        <b>Sunshine Chairs:</b> Leona Chen, Spencer Liu<br>
    </p>

    <p style="margin: 1.5em 0px;">
        <b><u>SERVICE VP:</u></b><br>
        <b>Service VP Assistants:</b> Kerry Feng, Nina Nguyen, Miranda Zhou<br>
        <b>* Hallcarn Chairs:</b> Leona Chen, Kerry Feng, Claire Li, Gordon Mah, Isaac Zheng<br>
        <b>Active Day of Service Chair:</b> William Liao, Sierra Lou<br>
        <b>IC/GG Sewing Chairs:</b> Kerry Feng, Joanna Choi<br>
        <b>* Campus-Wide Service Project Chairs:</b> Jessica Lee, Nick Weis, Audrey Tsai, Scottie Wan<br>
        <b>YTA Beartrax/Mosswood Chairs:</b> Molly Caldwell, Jayant Raman, Stanley Shaw<br>
        <b>Service Buddies Chairs:</b> Isaac Zheng, Claudia Lim<br>
    </p>

    <p style="margin: 1.5em 0px;">
        <b><u>FINANCE VP:</u></b><br>
        <b>Finance VP Assistants:</b> Hermes Ip, Jessica Tzeng<br>
        <b>Fundraiser Chairs:</b> Joshua Jacobs, Jessica Lee, Jerry Park, Hyeonji Shim<br>
        <b>Reimbursement Chairs:</b> Leona Chen, Alexander Feng<br>
    </p>

    <p style="margin: 1.5em 0px;">
        <b><u>FELLOWSHIP VP:</u></b><br>
        <b>Fellowship VP Assistants:</b> Gene Ho, Spencer Liu<br>
        <b>* Hotspot Chairs:</b> Dinasha Dahanayake, Yanan Wang, Nick Weis, Yitian Zhang, Yuki Mizuno<br>
        <b>GG Sports Chairs:</b> Jayant Raman, Naomichi Yamamoto<br>
        <b>GG Events Chairs:</b> Selena Fung, Ya-An Hsiung<br>
        <b>IC Events Chair:</b> Karen Chou<br>
        <b>* Banquet Chairs:</b> Joshua Jacobs, Jessica Tzeng, Claudia Lim, Joanna Choi<br>
    </p>

    <p style="margin: 1.5em 0px;">
        <b><u>PLEDGEMASTER:</u></b><br>
        <b>Leadership Trainer:</b> Jerianne Lukban<br>
        <b>Fellowship Trainers:</b> Hyeonji Shim, Naomichi Yamamoto<br>
        <b>Service Trainer:</b> Virginia Yan<br>
        <b>Finance Trainers:</b> Joseph Lee, Jerry Park<br>
        <b>Administrative Trainer:</b> Karen Chou<br>
        <b>Historian Trainer:</b> Jeremy Lam<br>
    </p>

    <p style="margin: 1.5em 0px;">
        <b><u>HISTORIAN:</u></b><br>
        <b>Historian Assistant:</b> Stanley Shaw<br>
        <b>Alumni Relations Chairs:</b> William Liao, Gordon Mah, Jeremy Lam, Audrey Tsai<br>
        <b>* Scrapbook Chairs:</b> Molly Caldwell, Kira Wong<br>
        <b>* Photography Chairs:</b> Adrian Peneyra, Jerry Park<br>
        <b>GG Maniac Chairs:</b> Kerry Feng, Kira Wong<br>
        <b>Chapter Wiki Chair:</b> Chris Janssen<br>
    </p>
    
    <p>- <a href="profile.php?user_id=2978">James Young (TT)</a></p>
</div>
<?php endif ?>

<div class="newsItem">
        <h2>Welcome Gamma Gamma!</h2>
        <p style="margin-bottom: 1em">

    <br>Since school is almost starting, it's about time to get back into the APO mentality. Just remember that we're all students first and need to prioritize school, and to focus on quality service over quantity. Good luck this semester!</br> 
    
    <p>- <a href="profile.php?user_id=2978">James Young (TT)</a></p>
</div>

<a href="news_sp16.php">Older News ></a>
<?php
$template->print_body_footer();
$template->print_disclaimer();
?>
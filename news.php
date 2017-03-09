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
        <h2>CM 5 Recap</h2>
        <p class="date">March 8, 2017</p>
        <p style="margin-top: 1em;"><b>ANNOUNCEMENTS:</b><br></p>
        <p style="margin: 0.5em 0px;">Here are the following documents from CM 5:<br><br>
            <a href="https://docs.google.com/presentation/d/10n6Ruku7yz6Dla2juIxu-UTMoZ6V46HGu0TE5eYZTcY" target="_blank">Hitchhiker's Slides to the 5th Chapter Meeting</a><br>
            <a href="https://goo.gl/forms/0jVDJe9NFScdcs4R2" target="_blank">Caption your president11!1!!</a><br>
            <a href="http://springsectionals2017.weebly.com/" target="_blank">Sectionals Registration</a><br>
            Please RSVP to <a href="https://goo.gl/kc25YI" target="_blank">Sectionals!!</a><br>
            <a href="https://goo.gl/forms/afJkND6OhHPnNtWq1" target="_blank">APO LEADS Signup</a><br>
            <a href="https://members.calaphio.com/gg_maniac_vote.php?id=126">GG Maniac Poll</a> (cannot vote for past GG Maniacs or past Pledge Maniacs)<br>
            <a href="https://www.youtube.com/watch?v=PB29WdtGybo" target="_blank">CM5 Video</a> edited by
                <a href="profile.php?user_id=2192">Audrey Tsai (CM)</a><br> and <a href="profile.php?user_id=2924">Kelly Luu (TT)</a> and <a href="profile.php?user_id=2192">Audrey Tsai (CM)</a><br>
        </p>
        <p>CM 4 Video:<br><br><iframe width="560" height="315" src="https://www.youtube.com/embed/PB29WdtGybo" frameborder="0" allowfullscreen></iframe></p>
        <br>
        <p>- <a href="profile.php?user_id=3256">Admin VP</a></p>
    </div>
    <div class="newsItem">
        <h2>CM 4 Recap</h2>
        <p class="date">February 24, 2017</p>
        <p style="margin-top: 1em;"><b>ANNOUNCEMENTS:</b><br></p>
        <p style="margin: 0.5em 0px;">Here are the following documents from CM 4:<br><br>
            <a href="https://docs.google.com/presentation/d/1jsKc14SpgEq1iSmlp-lwq5ansGTjVszPYbyMJ5l0WXk" target="_blank">CM 4 Slides</a><br>
            <a href="https://goo.gl/forms/XHm4DGgMqzFlVNQA3" target="_blank">Caption Contest</a><br>
            <a href="http://springsectionals2017.weebly.com/" target="_blank">Sectionals Registration</a><br>
            <a href="https://goo.gl/kc25YI" target="_blank">Sectionals RSVP</a><br>
            <a href="https://goo.gl/forms/afJkND6OhHPnNtWq1" target="_blank">APO LEADS Signup</a><br>
            <a href="https://members.calaphio.com/gg_maniac_vote.php?id=125">GG Maniac Poll</a> (cannot vote for past GG Maniacs or past Pledge Maniacs)<br>
            <a href="https://www.youtube.com/watch?v=UWZhLP-RQZI" target="_blank">CM4 Video</a> edited by
                <a href="profile.php?user_id=3606">Elaine Chung (FH)</a><br>
        </p>
        <p>CM 4 Video:<br><br><iframe width="560" height="315" src="https://www.youtube.com/embed/UWZhLP-RQZI" frameborder="0" allowfullscreen></iframe></p>
        <br>
        <p>- <a href="profile.php?user_id=3256">Jerry (PMP)</a></p>
    </div>

    <div class="newsItem">
        <h2>CM 3 Recap</h2>
        <p class="date">February 7, 2017</p>
        <p style="margin-top: 1em;"><b>ANNOUNCEMENTS:</b><br></p>
        <p style="margin: 0.5em 0px;">Here are the following documents from CM 3:<br><br>
            <a href="https://docs.google.com/presentation/d/1CPT4BYGePliVWx67NogKaqE1M6gTJZteqESPVm_bNYg" target="_blank">CM 3 Slides</a><br>
            <a href="https://goo.gl/forms/aadmNzMjIQyqpu6Z2" target="_blank">Caption Contest</a><br>
            <a href="https://goo.gl/forms/fmfvwC4LasklDRnu1" target="_blank">Service Buddies Signup</a> (due before CM4)<br>
            <a href="https://goo.gl/forms/DCty53oDaSxnxHux2" target="_blank">Fellowship Buddies Signup</a> (due before CM4)<br>
            <a href="https://members.calaphio.com/gg_maniac_vote.php?id=124">GG Maniac Poll</a> (cannot vote for past GG Maniacs or past Pledge Maniacs)<br>
            <a href="https://goo.gl/forms/SBxOtddcLhLhTcRe2" target="_blank">Chapter Feedback Form</a><br>
            <a href="https://www.youtube.com/watch?v=WRzVTyX1AOs" target="_blank">CM3 Video</a> edited by
                <a href="profile.php?user_id=2924">Kelly Luu (TT)</a> and <a href="profile.php?user_id=2192">Audrey Tsai (CM)</a><br>
        </p>
        <p>CM 3 Video:<br><br><iframe width="560" height="315" src="https://www.youtube.com/embed/WRzVTyX1AOs" frameborder="0" allowfullscreen></iframe></p>
        <br>
        <p>- <a href="profile.php?user_id=3597">Yitian Zhang XD (RBD)</a></p>
    </div>

	<div class="newsItem">
        <h2>CM 2 Recap</h2>
        <p class="date">January 31, 2017</p>
        <p style="margin-top: 1em;"><b>ANNOUNCEMENTS:</b><br></p>
        <p style="margin: 0.5em 0px;">Here are the following documents from CM 2:<br><br>
            <a href="https://docs.google.com/presentation/d/1eVVx1vUafZBov4xw29o5n669GZi6fcOU2RU-tENOSlM" target="_blank">CM 2 Slides</a><br>
            <a href="https://goo.gl/forms/IRuNDdJor6iismek2" target="_blank">Caption Contest</a><br>
            <a href="https://members.calaphio.com/gg_maniac_vote.php?id=123">GG Maniac Poll</a> (cannot vote for past GG Maniacs or past Pledge Maniacs)<br>
            <a href="https://www.youtube.com/watch?v=4jWo9xhuLsk" target="_blank">CM2 Video</a> edited by
                <a href="profile.php?user_id=3292">Stanley Shaw (PMP)</a> and <a href="profile.php?user_id=3606">Elaine Chung (FH)</a><br>
        </p>
        <p>CM 2 Video:<br><br><iframe width="560" height="315" src="https://www.youtube.com/embed/4jWo9xhuLsk" frameborder="0" allowfullscreen></iframe></p>
        <br>
        <p>- <a href="profile.php?user_id=3633">Kimberly Tze (FH)</a></p>
    </div>

    <div class="newsItem">
        <h2>CM 1 Recap</h2>
        <p class="date">January 17, 2017</p>
        <p style="margin-top: 1em;"><b>ANNOUNCEMENTS:</b><br></p>
        <p style="margin: 0.5em 0px;">Here are the following documents from CM 1:<br><br>
            <a href="https://docs.google.com/presentation/d/17dMvDwE3tyZeXL3tTzYkFMbLWwZT89eeRqsUA4RkWvI/" target="_blank">CM 1 Slides</a><br>
            <a href="https://docs.google.com/spreadsheets/d/1TkP2OkJu74SZQuIwbU23hJdPyxCWc3EVlZqSVjI9EpI/" target="_blank">Spring 2017 Budget</a><br>
            <a href="https://docs.google.com/document/d/1GT_rqYP3l715-sKZ30ihllvHhe_P1bNG3kDTTMHCr_0/" target="_blank">Active Requirements</a><br>
            <a href="https://docs.google.com/document/d/1uhJ4PNzjzexz7LmxOlZi1Kp4vaIQ4Wk9CA3xJEtRpUU/" target="_blank">Pledge Requirements</a><br>
            <a href="https://members.calaphio.com/gg_maniac_vote.php?id=122">GG Maniac Poll</a> (cannot vote for past GG Maniacs or past Pledge Maniacs)<br>
        </p>
        <br>
        <p>- <a href="profile.php?user_id=3256">Jerry Park (PMP)</a></p>
    </div>
<?php endif ?>


<!-- <?php if ($g_user->is_logged_in()): ?>
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
        <b>* Funpack Chairs:</b> Gordon Mah, Nina Nguyen, Lisa Hoang<br>
        <b>Academic Chair:</b> Hermes Ip<br>
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
        <b>YTA Beartrax/Mosswood Chairs:</b> Molly Caldwell, Stanley Shaw<br>
        <b>Project Open Hand Chair:</b> Jeffrey Li<br>
        <b>Berkeley Food and Housing Chair:</b> Gene Ho<br>
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
<?php endif ?> -->

<div class="newsItem">
        <h2>Welcome Gamma Gamma!</h2>
        <p style="margin-bottom: 1em">

    <br>Since school is almost starting, it's about time to get back into the APO mentality. Just remember that we're all students first and need to prioritize school, and to focus on quality service over quantity. Good luck this semester!</br> 
    
    <p>- <a href="profile.php?user_id=2978">James Young (TT)</a></p>
</div>

<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
    <a href="news_fa16.php">Older News ></a>
<?php endif ?>

<?php
$template->print_body_footer();
$template->print_disclaimer();
?>
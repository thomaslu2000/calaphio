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

<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
    <div class="newsItem">
            <h2>ExComm Chairing Applications!</h2>
            <p class="date">July 17, 2017 at 3:21pm</p>

        <p style="margin-bottom: 1em">
        Hi Gamma Gamma, <br><br>
        Please take some time to peruse through the applications to see what chairing positions interest you!<br><br>
        The deadline to apply for chairing positions will be Friday, August 17, 2017 at 11:59PM.<br><br>
        <a href="https://goo.gl/forms/Tj4vW250PbgbyGJk2" target="_blank">President</a><br>
        <a href="https://goo.gl/forms/UKajyJJUFAZX8MLi1" target="_blank">Administrative VP</a><br>
        <a href="https://goo.gl/sA4ELH" target="_blank">Membership VP</a><br>
        <a href="https://goo.gl/forms/OvbAyT4YaNKSrdXZ2" target="_blank">Service VP</a><br>
        <a href="https://goo.gl/vkcLTR" target="_blank">Finance VP</a><br>
        <a href="https://goo.gl/forms/dxPaXlkN5Xj9voeC2" target="_blank">Fellowship VP</a><br>
        <a href="https://goo.gl/forms/pn3Kswf3kh80nw033" target="_blank">Historian</a><br>
        </p>

        <p>- <a href="profile.php?user_id=3571">Bianca Hsueh (RBD)</a></p>
    </div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
    <div class="newsItem">
        <br/>
        <h2>Congrats to the Fall 2017 Rush Chairs!</h2>
        <p class="date">May 8, 2016</p>
        <div class="collage-container">
            <div class="collage-pictures">
                <div class="person-picture">
                    <a href="profile.php?user_id=3606"><img src="images/rush_fa17/marilyn.jpg" onmouseover="this.src='images/rush_fa17/elaine.jpg'" onmouseout="this.src='images/rush_fa17/marilyn.jpg'"></img></a>
                    <p class="center"><a href="profile.php?user_id=3606">Elaine Chung</a></p>
                </div>

                <div class="person-picture">
                    <a href="profile.php?user_id=4628"><img src="images/rush_fa17/marilyn.jpg" onmouseover="this.src='images/rush_fa17/pia.jpg'" onmouseout="this.src='images/rush_fa17/marilyn.jpg'"></img></a>
                    <p class="center"><a href="profile.php?user_id=4628">Pia Lopez</a></p>
                </div>

                <div class="person-picture">
                    <a href="profile.php?user_id=4624"><img src="images/rush_fa17/marilyn.jpg" onmouseover="this.src='images/rush_fa17/hailey.jpg'" onmouseout="this.src='images/rush_fa17/marilyn.jpg'"></img></a>
                    <p class="center"><a href="profile.php?user_id=4624">Hailey Swart</a></p>
                </div>

                <div class="person-picture">
                    <a href="profile.php?user_id=4687"><img src="images/rush_fa17/marilyn.jpg" onmouseover="this.src='images/rush_fa17/seline.jpg'" onmouseout="this.src='images/rush_fa17/marilyn.jpg'"></img></a>
                    <p class="center"><a href="profile.php?user_id=4687">Seline Ting</a></p>
                </div>
            </div>
            <div style="clear: left;"></div>
        </div>

        <p>- <a href="profile.php?user_id=2978">James Young (TT)</a></p>
    </div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
    <div class="newsItem">
        <br/>
        <h2>Congrats to the Fall 2017 Pledge Committee!</h2>
        <p class="date">May 3, 2017</p>
        <div class="collage-container">
            <div class="collage-pictures">
                <div class="person-picture">
                    <a href="profile.php?user_id=3617"><img src="images/pcomm_fa17/qiao.jpg" onmouseover="this.src='images/pcomm_fa17/qiao2.jpg'" onmouseout="this.src='images/pcomm_fa17/qiao.jpg'"></img></a>
                    <p class="center"><strong>Leadership Trainer</strong>: <br><a href="profile.php?user_id=3617">Qiao Li</a></p>
                </div>

                <div class="person-picture">
                    <a href="profile.php?user_id=3629"><img src="images/pcomm_fa17/juan.jpg" onmouseover="this.src='images/pcomm_fa17/juan2.jpg'" onmouseout="this.src='images/pcomm_fa17/juan.jpg'"></img></a>
                    <p class="center"><strong>Admin Trainer</strong>: <br><a href="profile.php?user_id=3629">Juan Rosario</a></p>
                </div>

                <div class="person-picture">
                    <a href="profile.php?user_id=3619"><img src="images/pcomm_fa17/vivian.jpg" onmouseover="this.src='images/pcomm_fa17/vivian2.jpg'" onmouseout="this.src='images/pcomm_fa17/vivian.jpg'"></img></a>
                    <p class="center"><strong>Fellowship Trainer</strong>: <br><a href="profile.php?user_id=3619">Vivian Liu</a></p>
                </div>

                <div class="person-picture">
                    <a href="profile.php?user_id=3608"><img src="images/pcomm_fa17/yanni.jpg" onmouseover="this.src='images/pcomm_fa17/yanni2.jpg'" onmouseout="this.src='images/pcomm_fa17/yanni.jpg'"></img></a>
                    <p class="center"><strong>Fellowship Trainer</strong>: <br><a href="profile.php?user_id=3608">Yanni Guo</a></p>
                </div>

                <div class="person-picture">
                    <a href="profile.php?user_id=3292"><img src="images/pcomm_fa17/stanley.jpg" onmouseover="this.src='images/pcomm_fa17/stanley2.jpg'" onmouseout="this.src='images/pcomm_fa17/stanley.jpg'"></img></a>
                    <p class="center"><strong>Service Trainer</strong>: <br><a href="profile.php?user_id=3292">Stanley Shaw</a></p>
                </div>

                <div class="person-picture">
                    <a href="profile.php?user_id=3638"><img src="images/pcomm_fa17/monica.jpg" onmouseover="this.src='images/pcomm_fa17/monica2.jpg'" onmouseout="this.src='images/pcomm_fa17/monica.jpg'"></img></a>
                    <p class="center"><strong>Service Trainer</strong>: <br><a href="profile.php?user_id=3638">Monica Wong</a></p>
                </div>

                <div class="person-picture">
                    <a href="profile.php?user_id=3569"><img src="images/pcomm_fa17/gene.jpg" onmouseover="this.src='images/pcomm_fa17/gene2.jpg'" onmouseout="this.src='images/pcomm_fa17/gene.jpg'"></img></a>
                    <p class="center"><strong>Finance Trainer</strong>: <br><a href="profile.php?user_id=3569">Gene Ho</a></p>
                </div>

                <div class="person-picture">
                    <a href="profile.php?user_id=3628"><img src="images/pcomm_fa17/melissa.jpg" onmouseover="this.src='images/pcomm_fa17/melissa2.jpg'" onmouseout="this.src='images/pcomm_fa17/melissa.jpg'"></img></a>
                    <p class="center"><strong>Finance Trainer</strong>: <br><a href="profile.php?user_id=3628">Melissa Quach</a></p>
                </div>

                <div class="person-picture">
                    <a href="profile.php?user_id=3639"><img src="images/pcomm_fa17/shao.jpg" onmouseover="this.src='images/pcomm_fa17/shao2.jpg'" onmouseout="this.src='images/pcomm_fa17/shao.jpg'"></img></a>
                    <p class="center"><strong>Historian Trainer</strong>: <br><a href="profile.php?user_id=3639">Shao Xu</a></p>
                </div>
            </div>
            <div style="clear: left;"></div>
        </div>

        <p>- <a href="profile.php?user_id=2978">James Young (TT)</a></p>
    </div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
    <div class="newsItem">
        <h2>CM 8 Recap</h2>
        <p class="date">April 26, 2017</p>
        <p style="margin-top: 1em;"><b>ANNOUNCEMENTS:</b><br></p>
        <p style="margin: 0.5em 0px;">Here are the following documents from CM 8:<br><br>
            Apply for the General Leadership, Fellowship, and Service awards!<br>
            <a href="https://members.calaphio.com/awards.php">GG Awards Requirements</a><br>
            <a href="https://docs.google.com/presentation/d/15GTclgqxT_0F3Yu7AQIS-uWhSxilIqQ_kNbZDOlkpGg" target="_blank">CM8 Slides</a><br>
            <a href="https://goo.gl/forms/SBxOtddcLhLhTcRe2" target="_blank">Chapter Feedback</a><br>
            <a href="https://docs.google.com/spreadsheets/u/1/d/1aJt0L4JZVhAA5pA5DX8OaPeFtEvonCT6TPlpMqXW0c8" target="_blank">Banquet Rides</a><br>
            <a href="https://docs.google.com/forms/d/e/1FAIpQLSeTyF_VI6iGImGVGud_1nbn5UgAsvoDOFScco2ddKiEcsK6Fw" target="_blank">IC Families Signup</a><br>
        <p>- <a href="profile.php?user_id=3256">Admin VP Signing out</a></p>
    </div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
    <div class="newsItem">
        <br/>
        <h2>Congrats to the Fall 2017 Executive Committee!</h2>
        <p class="date">April 12, 2017</p>
        <div class="collage-container">
            <div class="collage-pictures">
                <div class="person-picture">
                    <a href="profile.php?user_id=3272"><img src="images/excomm_fa17/joseph.jpg" onmouseover="this.src='images/excomm_fa17/joseph2.jpg'" onmouseout="this.src='images/excomm_fa17/joseph.jpg'"></img></a>
                    <p class="center"><strong>President</strong>: <br><a href="profile.php?user_id=3272">Joseph Lee</a></p>
                </div>

                <div class="person-picture">
                    <a href="profile.php?user_id=3568"><img src="images/excomm_fa17/kerry.jpg" onmouseover="this.src='images/excomm_fa17/kerry2.jpg'" onmouseout="this.src='images/excomm_fa17/kerry.jpg'"></img></a>
                    <p class="center"><strong>Service VP</strong>: <br><a href="profile.php?user_id=3568">Kerry Feng</a></p>
                </div>

                <div class="person-picture">
                    <a href="profile.php?user_id=2979"><img src="images/excomm_fa17/jerianne.jpg" onmouseover="this.src='images/excomm_fa17/jerianne2.jpg'" onmouseout="this.src='images/excomm_fa17/jerianne.jpg'"></img></a>
                    <p class="center"><strong>Pledgemaster</strong>: <br><a href="profile.php?user_id=2979">Jerianne Lukban</a></p>
                </div>

                <div class="person-picture">
                    <a href="profile.php?user_id=3571"><img src="images/excomm_fa17/bianca.jpg" onmouseover="this.src='images/excomm_fa17/bianca2.jpg'" onmouseout="this.src='images/excomm_fa17/bianca.jpg'"></img></a>
                    <p class="center"><strong>Administrative VP</strong>: <br><a href="profile.php?user_id=3571">Bianca Hsueh</a></p>
                </div>

                <div class="person-picture">
                    <a href="profile.php?user_id=2929"><img src="images/excomm_fa17/marilyn.jpg" onmouseover="this.src='images/excomm_fa17/marilyn2.jpg'" onmouseout="this.src='images/excomm_fa17/marilyn.jpg'"></img></a>
                    <p class="center"><strong>Membership VP</strong>: <br><a href="profile.php?user_id=2929">Marilyn Chan</a></p>
                </div>

                <div class="person-picture">
                    <a href="profile.php?user_id=3572"><img src="images/excomm_fa17/hermes.jpg" onmouseover="this.src='images/excomm_fa17/hermes2.jpg'" onmouseout="this.src='images/excomm_fa17/hermes.jpg'"></img></a>
                    <p class="center"><strong>Finance VP</strong>: <br><a href="profile.php?user_id=3572">Hermes Ip</a></p>
                </div>

                <div class="person-picture">
                    <a href="profile.php?user_id=3266"><img src="images/excomm_fa17/sierra.jpg" onmouseover="this.src='images/excomm_fa17/sierra2.jpg'" onmouseout="this.src='images/excomm_fa17/sierra.jpg'"></img></a>
                    <p class="center"><strong>Fellowship VP</strong>: <br><a href="profile.php?user_id=3266">Sierra Lou</a></p>
                </div>

                <div class="person-picture">
                    <a href="profile.php?user_id=3256"><img src="images/excomm_fa17/jerry.jpg" onmouseover="this.src='images/excomm_fa17/jerry2.jpg'" onmouseout="this.src='images/excomm_fa17/jerry.jpg'"></img></a>
                    <p class="center"><strong>Historian</strong>: <br><a href="profile.php?user_id=3256">Jerry Park</a></p>
                </div>
            </div>
            <div style="clear: left;"></div>
        </div>

        <p>- <a href="profile.php?user_id=2978">James Young (TT)</a></p>
    </div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
    <div class="newsItem">
        <h2>CM 7 Recap</h2>
        <p class="date">April 11, 2017</p>
        <p style="margin-top: 1em;"><b>ANNOUNCEMENTS:</b><br></p>
        <p style="margin: 0.5em 0px;">Here are the following documents from CM 7:<br><br>
            <a href="https://docs.google.com/presentation/d/1bBN4kbY_b6fsKY6jatjq4YgMhqGFUR2Y21S8jyjtFrs" target="_blank">CM7 Slides</a><br>
            <a href="https://goo.gl/forms/SBxOtddcLhLhTcRe2" target="_blank">Chapter Feedback</a><br>
            <a href="https://www.youtube.com/watch?v=pEBRqbdaj60" target="_blank">CM7 Video</a> edited by
                <a href="profile.php?user_id=2192">Audrey Tsai (CM)</a>and <a href="profile.php?user_id=2924">Kelly Luu (TT)<br>
        </p>
        <p>CM 7 Video:<br><br><iframe width="560" height="315" src="https://www.youtube.com/embed/pEBRqbdaj60" frameborder="0" allowfullscreen></iframe></p>
        <br>
        <p>- <a href="profile.php?user_id=3256">Your future Historian</a></p>
    </div>
    <div class="newsItem">
            <h2>Election Platforms</h2>
            <p class="date">April 10, 2017</p>

        <p style="margin: 0.5em 0px;">Thank you again to those who submitted platforms for elections! Here are the following submissions for each position:<br><br>
            <a href="https://docs.google.com/a/berkeley.edu/document/d/1BBkNvjRLoj9ggE4pu1s0Sq6ZvRI9dKiTMjZHsZTLK2U/edit?usp=sharing" target="_blank">Service VP Platform Kerry Feng</a><br>
            <a href="https://docs.google.com/document/d/1NBB6cAAZS3GIGs8-ZGSpbjjTRM4mQ9toGpl5sONq9qA/edit?usp=sharing" target="_blank">Admin VP Platform Bianca Hsueh</a><br>
            <a href="https://docs.google.com/document/d/1aR_qMt0Tep3KWmqol8W8C3G7IflyPLj9jlQ53EYeAWI/edit" target="_blank">Membership VP Platform Marilyn Chan</a><br>
            <a href="https://docs.google.com/document/d/1kOfVt0DD56fs54VwAryqm7mY9Br75hcRiwp-u-0wcJo/edit?usp=sharing" target="_blank">Pledgemaster Platform Jerianne Lukban</a><br>
            <a href="https://docs.google.com/document/d/18I4GM6ftFh0-VYNUEt0qX5-II6iGtey7kWfuJDW5hqU/edit" target="_blank">Fellowship VP Platform Josh Jacobs</a><br>
            <a href="https://docs.google.com/document/d/1A0_WtZAH7f31acpr0_QFlm0go9TWnq_avp9Y-hBn6SA/edit" target="_blank">Fellowship VP Platform Sierra Lou</a><br>
        </p>

        <p style="margin: 1.5em 0px;">
            I encourage all actives and pledges to read through these platforms thoroughly, as each candidate has spent a lot of time preparing and revising their platforms. Remember that if you did not submit a platform, you may still run on the day of Elections.
        </p>
        
        <p>- <a href="profile.php?user_id=3256">Jerry Park (PMP)</a></p>
    </div>
    <div class="newsItem">
        <h2>CM 6 Recap</h2>
        <p class="date">March 23, 2017</p>
        <p style="margin-top: 1em;"><b>ANNOUNCEMENTS:</b><br></p>
        <p style="margin: 0.5em 0px;">Here are the following documents from CM 6:<br><br>
            <a href="https://docs.google.com/presentation/d/1QoOSEBuVrEizFrK2aauib0klVjR-Mopp6N0Iou8NDjU/" target="_blank">CM6 Slides</a><br>
            <a href="https://docs.google.com/a/berkeley.edu/forms/d/e/1FAIpQLSdN0uc7RtTlbRppbEdGHnIsbwc_cW_O9bD-SYnbKDLuCyYvZQ" target="_blank">Caption Contest</a><br>
            <a href="http://springsectionals2017.weebly.com/" target="_blank">Sectionals Registration</a><br>
            Please RSVP to <a href="https://goo.gl/kc25YI" target="_blank">Sectionals!!</a><br>
            <a href="https://goo.gl/forms/afJkND6OhHPnNtWq1" target="_blank">APO LEADS Signup</a><br>
            <a href="https://members.calaphio.com/gg_maniac_vote.php?id=127">GG Maniac Poll</a> (cannot vote for past GG Maniacs or past Pledge Maniacs)<br>
            <a href="https://docs.google.com/spreadsheets/d/1s3z9fXhB17v01FK3woyNgyiYjBuBEJ5wpEgR6cvgcHo" target="_blank">Nominations</a><br>
            <a href="https://www.youtube.com/watch?v=IZ6emdzw8ig" target="_blank">CM6 Video</a> edited by
                <a href="profile.php?user_id=3606">Elaine Chung (FH)</a> (8-9 hours of editing, press F to pay respects)<br>
        </p>
        <p>CM 6 Video:<br><br><iframe width="560" height="315" src="https://www.youtube.com/embed/IZ6emdzw8ig" frameborder="0" allowfullscreen></iframe></p>
        <br>
        <p>- <a href="profile.php?user_id=2978">Not Your Admin VP</a></p>
    </div>
    <div class="newsItem">
        <h2>Mr. and Mrs. APO Video</h2>
        <p class="date">March 19, 2017</p>
        <p style="margin-top: 1em;"><b>Go watch the videos presented at Mr and Mrs APhiO!</b><br></p>
            <p><a href="https://www.youtube.com/watch?v=PB29WdtGybo" target="_blank"></a> Edited by the wonderful
                <a href="profile.php?user_id=3292">Stanley Shaw (PMP)</a>
        </p>
        <p><br><iframe width="560" height="315" src="https://www.youtube.com/embed/ecHrkWUZpIo" frameborder="0" allowfullscreen></iframe></p>
        <p><br><iframe width="560" height="315" src="https://www.youtube.com/embed/cG2uJcwWfSM" frameborder="0" allowfullscreen></iframe></p>
        <p>- <a href="profile.php?user_id=3256">Your AVP</a></p>
    </div>
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
                <a href="profile.php?user_id=2192">Audrey Tsai (CM)</a>and <a href="profile.php?user_id=2924">Kelly Luu (TT)<br>
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
    
    <p>- <a href="profile.php?user_id=2978">James E Young (TT)</a></p>
</div>

<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
    <a href="news_fa16.php">Older News ></a>
<?php endif ?>

<?php
$template->print_body_footer();
$template->print_disclaimer();
?>
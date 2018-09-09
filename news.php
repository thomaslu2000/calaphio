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
        <h2>CM 1 Recap</h2>
        <p class="date">September 9, 2018 at 2:41pm</p>

    "Welcome back actives! I hope everyone had a restful and fun summer." - Carol He 


	ExComm still needs chairs! Please contact the respective ExComm member if you are interested in any of the following positions. Chairing is a great way to be involved in the chapter, and to take on a leadership role! Actives need 5 chairing credits to maintain good standing, so please look into the following:</p>


		<p style="margin-bottom: 1em 0px;">
            <b><u>PRESIDENT:</u></b><br>
            <b> Parliamentarian </b>(1)<br>
            <b> Professional Development Chair </b>b>(2)<br>
        </p>

        <p style="margin-bottom: 1em 0px;">
            <b><u>ADMIN VP:</u></b><br>
            <b> AVP Assistant </b>(1)<br>
            <b> Academic Chair </b>(2)<br>
            <b> Webmaster </b>(2)<br>
        </p>

        <p style="margin:1.5em 0px 1em 0px;">
            <b><u>MEMBERSHIP VP:</u></b><br>
            <b> Sunshine Chair </b>(2)<br>
        </p>

        <p style="margin:1.5em 0px 1em 0px;">
            <b><u>FINANCE VP:</u></b><br>
            <b> Concessions </b>(Infinity)<br>
        </p>

        <p style="margin:1.5em 0px 1em 0px;">
            <b><u>FELLOWSHIP VP:</u></b><br>
            <b> GG Events & GG Sports Chair </b>(2)<br>
            <b> Hotspot </b>(1)<br>
        </p>


        <p style="margin-bottom: 1em;">CM1 Recap:<br>
            <a href="https://docs.google.com/presentation/d/1v_AmhhZncpRzXYgHxoWsLEu3tsiUS5ABYUd6XslxILo/edit?usp=sharing" target="_blank">CM 1 Slides</a><br>
            <a href="https://docs.google.com/spreadsheets/d/12kanN2toPyzNI1eTulrm4kQwzENht8A4yp3RRZ_37YI/edit?usp=sharing" target="_blank">Fall 2018 Budget</a><br>
 			<a href="https://docs.google.com/spreadsheets/d/1vDGebsyI3XCyHPidl5y7mCutUcD6aHZCz0xoyj-zcnk/edit#gid=1589878783" target="_blank">Fall Excomm Chairing Positions</a><br>
 			<a href="https://docs.google.com/forms/u/3/d/e/1FAIpQLSfnIYWIUSggBjJZHOMSWaeiJLdQvfptql4iZYxPtS5ya2Vp8w/viewform?usp=send_form" target="_blank">Chapter Feedback Form</a><br>


            <p>- <a href="profile.php?user_id=4622">Shengmin Xiao (MMC)</a></p>
        </p>
    </div>
<?php endif ?>


<?php if ($g_user->is_logged_in()): ?>
    <div class="newsItem">
        <br/>
        <h2>Congrats to the Fall 2018 PComm!</h2>
        <p class="date">September 9, 2018 at 2:29pm</p>
        <div class="collage-container">
            <div class="collage-pictures">
                <div class="person-picture">
                    <a href="profile.php?user_id=4609"><img src="images/pcomm_fa18/eric" onmouseover="this.src='images/pcomm_fa18/valerie'" onmouseout="this.src='images/pcomm_fa18/valerie.jpg'"></img></a>
                    <p class="center"><strong>Leadership Trainer</strong>: <br><a href="profile.php?user_id=4697">Valerie Hse</a></p>
                </div>

                <div class="person-picture">
                    <a href="profile.php?user_id=4609"><img src="images/pcomm_fa18/eric" onmouseover="this.src='images/pcomm_fa18/shengmin'" onmouseout="this.src='images/dcomm_fa17/shengmin.jpg'"></img></a>
                    <p class="center"><strong>Service Trainer</strong>: <br><a href="profile.php?user_id=4622">Shengmin Xiao</a></p>
                </div>

                <div class="person-picture">
                    <a href="profile.php?user_id=4609"><img src="images/pcomm_fa18/eric" onmouseover="this.src='images/pcomm_fa18/Lara'" onmouseout="this.src='images/pcomm_fa18/Lara.jpg'"></img></a>
                    <p class="center"><strong>Fellowship Trainer</strong>: <br><a href="profile.php?user_id=4688">Lara Yedikian</a></p>
                </div>
 
 				<div class="person-picture">
                    <a href="profile.php?user_id=4609"><img src="images/pcomm_fa18/eric" onmouseover="this.src='images/pcomm_fa18/matt'" onmouseout="this.src='images/pcomm_fa18/matt'"></img></a>
                    <p class="center"><strong>Fellowship Trainer</strong>: <br><a href="profile.php?user_id=4782">Matt Chinn</a></p>
                </div>

                <div class="person-picture">
                    <a href="profile.php?user_id=4609"><img src="images/pcomm_fa18/eric" onmouseover="this.src='images/pcomm_fa18/Pearl'" onmouseout="this.src='images/pcomm_fa18/Pearl'"></img></a>
                    <p class="center"><strong>Finance Trainer</strong>: <br><a href="profile.php?user_id=4691">Pearl Yang</a></p>
                </div>

                <div class="person-picture">
                    <a href="profile.php?user_id=4609"><img src="images/pcomm_fa18/eric.jpg" onmouseover="this.src='images/pcomm_fa18/Michelle'" onmouseout="this.src='images/pcomm_fa18/Michelle'"></img></a>
                    <p class="center"><strong>Finance Trainer</strong>: <br><a href="profile.php?user_id=4767">Michelle Zhao</a></p>
                </div>

                <div class="person-picture">
                    <a href="profile.php?user_id=4609"><img src="images/pcomm_fa18/eric.jpg" onmouseover="this.src='images/pcomm_fa18/Tim'" onmouseout="this.src='images/pcomm_fa18/Tim'"></img></a>
                    <p class="center"><strong>Administrative Trainer</strong>: <br><a href="profile.php?user_id=4762">Tim Seller</a></p>
                </div>

                <div class="person-picture">
                    <a href="profile.php?user_id=4609"><img src="images/pcomm_fa18/eric.jpg" onmouseover="this.src='images/pcomm_fa18/Jamie'" onmouseout="this.src='images/pcomm_fa18/Jamie'"></img></a>
                    <p class="center"><strong>Historian Trainer</strong>: <br><a href="profile.php?user_id=4762">Jamie Chen</a></p>
                </div>

                <div class="person-picture">
                    <a href="profile.php?user_id=4609"><img src="images/pcomm_fa18/eric.jpg" onmouseover="this.src='images/pcomm_fa18/Malaya'" onmouseout="this.src='images/pcomm_fa18/Malay'"></img></a>
                    <p class="center"><strong>Historian Trainer</strong>: <br><a href="profile.php?user_id=4781">Mayala Neri</a></p>
                </div>
            </div>
            <div style="clear: left;"></div>
        </div>

        <p>- <a href="profile.php?user_id=4622">Shengmin Xiao (MMC)</a></p>
    </div>
<?php endif ?>


<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
<div class="newsItem">
    <br/>
    <h2>Congratulations to the Fall 2018 Dynasty Directors!</h2>
    <p class="date">September 9, 2018 at 2:38pm</p>
    <div class="collage-container">
        <div class="collage-pictures">
            <div class="person-picture">
                <a href="profile.php?user_id=3617"><img src="images/excomm_sp18/qiao.jpg" onmouseover="this.src='images/dcomm_fa18/fofo'" onmouseout="this.src='images/dcomm_fa18/fofo'"></img></a>
                <p class="center"><strong>Alpha Director</strong>: <br><a href="profile.php?user_id=4692">Phoung Nguyen</a></p>
            </div>

            <div class="person-picture">
                <a href="profile.php?user_id=3617"><img src="images/excomm_sp18/qiao.jpg" onmouseover="this.src='images/dcomm_fa18/vivian'" onmouseout="this.src='images/dcomm_fa18/vivian'"></img></a>
                <p class="center"><strong>Alpha Director</strong>: <br><a href="profile.php?user_id=3619">Vivian Liu</a></p>
            </div>

            <div class="person-picture">
                <a href="profile.php?user_id=3617"><img src="images/excomm_sp18/qiao.jpg" onmouseover="this.src='images/dcomm_fa18/karissa'" onmouseout="this.src='images/dcomm_fa18/karissa'"></img></a>
                <p class="center"><strong>Phi Director</strong>: <br><a href="profile.php?user_id=4685">Karissa Lapuz</a></p>
            </div>

            <div class="person-picture">
                <a href="profile.php?user_id=3617"><img src="images/excomm_sp18/qiao.jpg" onmouseover="this.src='images/dcomm_fa18/edith'" onmouseout="this.src='images/dcomm_fa18/edith'"></img></a>
                <p class="center"><strong>Phi Director</strong>: <br><a href="profile.php?user_id=4607">Edith Lai</a></p>
            </div>

            <div class="person-picture">
                <a href="profile.php?user_id=3617"><img src="images/excomm_sp18/qiao.jpg" onmouseover="this.src='images/dcomm_fa18/melissa'" onmouseout="this.src='images/dcomm_fa18/melissa'"></img></a>
                <p class="center"><strong>Omega Director</strong>: <br><a href="profile.php?user_id=3628">Melissa Quach</a></p>
            </div>

            <div class="person-picture">
                <a href="profile.php?user_id=3617"><img src="images/excomm_sp18/qiao.jpg" onmouseover="this.src='images/dcomm_fa18/jose'" onmouseout="this.src='images/dcomm_fa18/jose'"></img></a>
                <p class="center"><strong>Omega Director</strong>: <br><a href="profile.php?user_id=4798">Jose Reyes-Hernandez</a></p>
            </div>
        </div>
        <div style="clear: left;"></div>
    </div>

        <p>- <a href="profile.php?user_id=4622">Shengmin Xiao (MMC)</a></p>
    </div>
<?php endif ?>


<div class="newsItem">
        <h2>Welcome Gamma Gamma!</h2>
        <p style="margin-bottom: 1em">

    <br>Since school is almost starting, it's about time to get back into the APO mentality. Just remember that we're all students first and need to prioritize school, and to focus on quality service over quantity. Good luck this semester!</br> 
    
    <p>- <a href="profile.php?user_id=4608">Carol He</a></p>
</div>

<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
    <a href="news_sp18.php">Older News ></a>
<?php endif ?>

<?php
$template->print_body_footer();
$template->print_disclaimer();
?>

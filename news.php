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
            <p class="date">December 26, 2016 at 5:51pm</p>

        <p style="margin-bottom: 1em">
        Hello Gamma Gamma, <br><br>
        Please take some time to look over the applications and complete them early so you all don't have to worry about them later on!<br><br>
        The deadline to apply for chairing positions will be January 8th, 2017 at 2:00AM.<br><br>
        <a href="https://goo.gl/forms/8HkvlPsDSqFfo8NA2" target="_blank">President</a><br>
        <a href="https://goo.gl/forms/A43aHLNuH2ljszKf1" target="_blank">Administrative VP</a><br>
        <a href="https://goo.gl/forms/SlLcZuQc5a37SnQQ2" target="_blank">Membership VP</a><br>
        <a href="https://goo.gl/forms/vHH7WvYRTCPyF4up1" target="_blank">Service VP</a><br>
        <a href="https://goo.gl/forms/UACvBM8DRUv8WmN92" target="_blank">Finance VP</a><br>
        <a href="https://goo.gl/oeOixE" target="_blank">Fellowship VP</a><br>
        <a href="https://goo.gl/n4Z15e" target="_blank">Historian</a><br>
        </p>

        <p>- <a href="profile.php?user_id=2978">James Young (TT)</a></p>
    </div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
    <div class="newsItem">
        <br/>
        <h2>Congrats to the Spring 2017 Dynasty Directors!</h2>
        <p class="date">December 26, 2016 at 5:44pm</p>
        <div class="collage-container">
            <div class="collage-pictures">
                <div class="person-picture">
                    <a href="profile.php?user_id=2929"><img src="images/dcomm_sp17/lisa.jpg" onmouseover="this.src='images/pcomm_sp17/marilyn2.jpg'" onmouseout="this.src='images/dcomm_sp17/lisa.jpg'"></img></a>
                    <p class="center"><strong>Alpha Director</strong>: <br><a href="profile.php?user_id=2857">Lisa Hoang</a></p>
                </div>

                <div class="person-picture">
                    <a href="profile.php?user_id=2929"><img src="images/dcomm_sp17/yanni.jpg" onmouseover="this.src='images/pcomm_sp17/marilyn2.jpg'" onmouseout="this.src='images/dcomm_sp17/yanni.jpg'"></img></a>
                    <p class="center"><strong>Alpha Director</strong>: <br><a href="profile.php?user_id=3608">Yanni Guo</a></p>
                </div>

                <div class="person-picture">
                    <a href="profile.php?user_id=2929"><img src="images/dcomm_sp17/bianca.jpg" onmouseover="this.src='images/pcomm_sp17/marilyn2.jpg'" onmouseout="this.src='images/dcomm_sp17/bianca.jpg'"></img></a>
                    <p class="center"><strong>Phi Director</strong>: <br><a href="profile.php?user_id=3571">Bianca Hsueh</a></p>
                </div>

                <div class="person-picture">
                    <a href="profile.php?user_id=2929"><img src="images/dcomm_sp17/elaine.jpg" onmouseover="this.src='images/pcomm_sp17/marilyn2.jpg'" onmouseout="this.src='images/dcomm_sp17/elaine.jpg'"></img></a>
                    <p class="center"><strong>Phi Director</strong>: <br><a href="profile.php?user_id=2913">Elaine Do</a></p>
                </div>

                <div class="person-picture">
                    <a href="profile.php?user_id=2929"><img src="images/dcomm_sp17/virginia.jpg" onmouseover="this.src='images/pcomm_sp17/marilyn2.jpg'" onmouseout="this.src='images/dcomm_sp17/virginia.jpg'"></img></a>
                    <p class="center"><strong>Omega Director</strong>: <br><a href="profile.php?user_id=3279">Virginia Yan</a></p>
                </div>

                <div class="person-picture">
                    <a href="profile.php?user_id=2929"><img src="images/dcomm_sp17/nao.jpg" onmouseover="this.src='images/pcomm_sp17/marilyn2.jpg'" onmouseout="this.src='images/dcomm_sp17/nao.jpg'"></img></a>
                    <p class="center"><strong>Omega Director</strong>: <br><a href="profile.php?user_id=3263">Naomichi Yamamoto</a></p>
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
        <h2>Congrats to the Spring 2017 Pledge Committee!</h2>
        <p class="date">December 7, 2016 at 4:11am</p>
        <div class="collage-container">
            <div class="collage-pictures">
                <div class="person-picture">
                    <a href="profile.php?user_id=2929"><img src="images/pcomm_sp17/marilyn.jpg" onmouseover="this.src='images/pcomm_sp17/marilyn2.jpg'" onmouseout="this.src='images/pcomm_sp17/marilyn.jpg'"></img></a>
                    <p class="center"><strong>Leadership Trainer</strong>: <br><a href="profile.php?user_id=2929">Marilyn Chan</a></p>
                </div>

                <div class="person-picture">
                    <a href="profile.php?user_id=2929"><img src="images/pcomm_sp17/sierra.jpg" onmouseover="this.src='images/pcomm_sp17/marilyn2.jpg'" onmouseout="this.src='images/pcomm_sp17/sierra.jpg'"></img></a>
                    <p class="center"><strong>Fellowship Trainer</strong>: <br><a href="profile.php?user_id=3266">Sierra Lou</a></p>
                </div>

                <div class="person-picture">
                    <a href="profile.php?user_id=2929"><img src="images/pcomm_sp17/gordon.jpg" onmouseover="this.src='images/pcomm_sp17/marilyn2.jpg'" onmouseout="this.src='images/pcomm_sp17/gordon.jpg'"></img></a>
                    <p class="center"><strong>Fellowship Trainer</strong>: <br><a href="profile.php?user_id=3582">Gordon Mah</a></p>
                </div>

                <div class="person-picture">
                    <a href="profile.php?user_id=2929"><img src="images/pcomm_sp17/kerry.jpg" onmouseover="this.src='images/pcomm_sp17/marilyn2.jpg'" onmouseout="this.src='images/pcomm_sp17/kerry.jpg'"></img></a>
                    <p class="center"><strong>Service Trainer</strong>: <br><a href="profile.php?user_id=3568">Kerry Feng</a></p>
                </div>

                <div class="person-picture">
                    <a href="profile.php?user_id=2929"><img src="images/pcomm_sp17/nick.jpg" onmouseover="this.src='images/pcomm_sp17/marilyn2.jpg'" onmouseout="this.src='images/pcomm_sp17/nick.jpg'"></img></a>
                    <p class="center"><strong>Service Trainer</strong>: <br><a href="profile.php?user_id=3592">Nick Weis</a></p>
                </div>

                <div class="person-picture">
                    <a href="profile.php?user_id=2929"><img src="images/pcomm_sp17/adrian.jpg" onmouseover="this.src='images/pcomm_sp17/marilyn2.jpg'" onmouseout="this.src='images/pcomm_sp17/adrian.jpg'"></img></a>
                    <p class="center"><strong>Finance Trainer</strong>: <br><a href="profile.php?user_id=3584">Adrian Peneyra</a></p>
                </div>

                <div class="person-picture">
                    <a href="profile.php?user_id=2929"><img src="images/pcomm_sp17/josh.jpg" onmouseover="this.src='images/pcomm_sp17/marilyn2.jpg'" onmouseout="this.src='images/pcomm_sp17/josh.jpg'"></img></a>
                    <p class="center"><strong>Finance Trainer</strong>: <br><a href="profile.php?user_id=3573">Joshua Jacobs</a></p>
                </div>

                <div class="person-picture">
                    <a href="profile.php?user_id=2929"><img src="images/pcomm_sp17/miranda.jpg" onmouseover="this.src='images/pcomm_sp17/marilyn2.jpg'" onmouseout="this.src='images/pcomm_sp17/miranda.jpg'"></img></a>
                    <p class="center"><strong>Administrative Trainer</strong>: <br><a href="profile.php?user_id=3599">Miranda Zhou</a></p>
                </div>

                <div class="person-picture">
                    <a href="profile.php?user_id=2929"><img src="images/pcomm_sp17/kira.jpg" onmouseover="this.src='images/pcomm_sp17/marilyn2.jpg'" onmouseout="this.src='images/pcomm_sp17/kira.jpg'"></img></a>
                    <p class="center"><strong>Historian Trainer</strong>: <br><a href="profile.php?user_id=3593">Kira Wong</a></p>
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
        <h2>Congrats to the Spring 2017 Rush Chairs!</h2>
        <p class="date">December 7, 2016 at 3:51am</p>
        <div class="collage-container">
            <div class="collage-pictures">
                <div class="person-picture">
                    <a href="profile.php?user_id=2857"><img src="images/rush_sp17/lisa.jpg" onmouseover="this.src='images/pcomm_sp17/marilyn2.jpg'" onmouseout="this.src='images/rush_sp17/lisa.jpg'"></img></a>
                    <p class="center"><a href="profile.php?user_id=2857">Lisa Hoang</a></p>
                </div>

                <div class="person-picture">
                    <a href="profile.php?user_id=3635"><img src="images/rush_sp17/charles.jpg" onmouseover="this.src='images/pcomm_sp17/marilyn2.jpg'" onmouseout="this.src='images/rush_sp17/charles.jpg'"></img></a>
                    <p class="center"><a href="profile.php?user_id=3635">Charles Wang</a></p>
                </div>

                <div class="person-picture">
                    <a href="profile.php?user_id=3578"><img src="images/rush_sp17/claire.jpg" onmouseover="this.src='images/pcomm_sp17/marilyn2.jpg'" onmouseout="this.src='images/rush_sp17/claire.jpg'"></img></a>
                    <p class="center"><a href="profile.php?user_id=3578">Claire Li</a></p>
                </div>

                <div class="person-picture">
                    <a href="profile.php?user_id=3619"><img src="images/rush_sp17/vivian.jpg" onmouseover="this.src='images/pcomm_sp17/marilyn2.jpg'" onmouseout="this.src='images/rush_sp17/vivian.jpg'"></img></a>
                    <p class="center"><a href="profile.php?user_id=3619">Vivian Liu</a></p>
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
        <p class="date">December 2, 2016 at 1:12pm</p>
        <p style="margin-top: 1em;"><b>ANNOUNCEMENTS:</b><br></p>
        <p style="margin: 0.5em 0px;">
        After an unfortunate accident at YTA Mosswood, we have allocated half of Fall Fellowship funds and all of muggings to help rebuild the Mosswood Recreational Center. Thank you to all the actives who showed up to CM, as we had just enough for quorum!</p>

        <p style="margin-bottom: 1em;">Also, here are the following documents from CM 8:<br><br>
            <a href="https://docs.google.com/presentation/d/1PgBiAlWxMHpihgfExLWsV8UZfWqisxkxgRPdMovHFv8/" target="_blank">CM 8 Slides</a><br>
            <a href="https://goo.gl/SdJd5S" target="_blank">Testbank</a><br>
        </p>
        <p>CM 8 Slideshow:<br><br><iframe src="https://drive.google.com/file/d/0B-KJt7fvwz4OX2NTT1h1bzVqOUk/preview" width="560" height="315"></iframe></p>
        <br>
        <p>- <a href="profile.php?user_id=2978">James Young (TT)</a></p>
    </div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
    <div class="newsItem">
        <h2>Applying for Active Awards</h2>
        <p class="date">November 18, 2016 at 7:27pm</p>
        <p style="margin: 0.5em 0px;">
        It is time to apply for active awards! Please preview the respective requirements to obtain each award <a href="https://members.calaphio.com/awards.php" target="_blank">here</a>. Application deadline is the end of <b>CM 8</b> on <b>Tuesday, November 29</b>. Please turn in either a hard copy at CM or submit your application via email to <a href="mailto:president@calaphio.com">president@calaphio.com</a>.</p>

        <p style="margin-top: 0.5em 0px;"><b>Procedure for email submission of application:</b></p>
        <ul>
            <li style="list-style-type: square; margin-left: 1em;">Print out your requirements page in PDF format.</li>
            <li style="list-style-type: square; margin-left: 1em;">Indicate the award(s) you are applying for.</li>
            <li style="list-style-type: square; margin-left: 1em;">Highlight the items on the page that fulfill each award requirement.</li>
            <li style="list-style-type: square; margin-left: 1em;">Email this PDF to <a href="mailto:president@calaphio.com">president@calaphio.com</a> with the subject line: <b>"[APO] LFS Award Application"</b></li>
        <br>
        <p>- <a href="profile.php?user_id=2978">James Young (TT)</a></p>
    </div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
    <div class="newsItem">
        <br/>
        <h2>Congrats to the Spring 2017 Executive Committee!</h2>
        <p class="date">November 16, 2016 at 5:48am</p>
        <div class="collage-container">
            <div class="collage-pictures">
                <div class="person-picture">
                    <a href="profile.php?user_id=3272"><img src="images/excomm_sp17/joseph.jpg" onmouseover="this.src='images/excomm_sp17/joseph2.jpg'" onmouseout="this.src='images/excomm_sp17/joseph.jpg'"></img></a>
                    <p class="center"><strong>President</strong>: <br><a href="profile.php?user_id=3272">Joseph Lee</a></p>
                </div>

                <div class="person-picture">
                    <a href="profile.php?user_id=2905"><img src="images/excomm_sp17/christine.jpg" onmouseover="this.src='images/excomm_sp17/christine2.jpg'" onmouseout="this.src='images/excomm_sp17/christine.jpg'"></img></a>
                    <p class="center"><strong>Service VP</strong>: <br><a href="profile.php?user_id=2905">Christine Fang</a></p>
                </div>

                <div class="person-picture">
                    <a href="profile.php?user_id=2873"><img src="images/excomm_sp17/virgil.jpg" onmouseover="this.src='images/excomm_sp17/virgil2.jpg'" onmouseout="this.src='images/excomm_sp17/virgil.jpg'"></img></a>
                    <p class="center"><strong>Pledgemaster</strong>: <br><a href="profile.php?user_id=2873">Virgil Tang</a></p>
                </div>

                <div class="person-picture">
                    <a href="profile.php?user_id=3256"><img src="images/excomm_sp17/jerry.jpg" onmouseover="this.src='images/excomm_sp17/jerry2.jpg'" onmouseout="this.src='images/excomm_sp17/jerry.jpg'"></img></a>
                    <p class="center"><strong>Administrative VP</strong>: <br><a href="profile.php?user_id=3256">Jerry Park</a></p>
                </div>

                <div class="person-picture">
                    <a href="profile.php?user_id=2858"><img src="images/excomm_sp17/ellie.jpg" onmouseover="this.src='images/excomm_sp17/ellie2.jpg'" onmouseout="this.src='images/excomm_sp17/ellie.jpg'"></img></a>
                    <p class="center"><strong>Membership VP</strong>: <br><a href="profile.php?user_id=2858">Ellie Hung</a></p>
                </div>

                <div class="person-picture">
                    <a href="profile.php?user_id=3572"><img src="images/excomm_sp17/hermes.jpg" onmouseover="this.src='images/excomm_sp17/hermes2.jpg'" onmouseout="this.src='images/excomm_sp17/hermes.jpg'"></img></a>
                    <p class="center"><strong>Finance VP</strong>: <br><a href="profile.php?user_id=3572">Hermes Ip</a></p>
                </div>

                <div class="person-picture">
                    <a href="profile.php?user_id=3264"><img src="images/excomm_sp17/jeremy.jpg" onmouseover="this.src='images/excomm_sp17/jeremy2.jpg'" onmouseout="this.src='images/excomm_sp17/jeremy.jpg'"></img></a>
                    <p class="center"><strong>Fellowship VP</strong>: <br><a href="profile.php?user_id=3264">Jeremy Lam</a></p>
                </div>

                <div class="person-picture">
                    <a href="profile.php?user_id=3292"><img src="images/excomm_sp17/stanley.jpg" onmouseover="this.src='images/excomm_sp17/stanley2.jpg'" onmouseout="this.src='images/excomm_sp17/stanley.jpg'"></img></a>
                    <p class="center"><strong>Historian</strong>: <br><a href="profile.php?user_id=3292">Stanley Shaw</a></p>
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
        <p class="date">November 16, 2016 at 5:33am</p>
        <p style="margin-top: 1em;"><b>ANNOUNCEMENTS:</b><br></p>
        <p style="margin: 0.5em 0px;">
        Fall Fellowship was a success! Thank you to everyone who participated in the event. And as this semester's pledging process nears its end, we hope all the pledges successfully cross. Thanksgiving Break is quickly approaching, so everyone finish strong!</p>

        <p style="margin-bottom: 1em;">Also, here are the following documents from CM 7:<br><br>
            <a href="https://goo.gl/5tXn4z" target="_blank">CM 7 Slides</a><br>
            <a href="https://goo.gl/ePEJdk" target="_blank">CM 7 Minutes</a><br>
            <a href="https://goo.gl/cjYxXC" target="_blank">Caption Contest</a><br>
            <a href="https://goo.gl/forms/CoVvEesgevlwga9C3" target="_blank">Om Nom</a><br>
            <a href="https://members.calaphio.com/gg_maniac_vote.php?id=121" target="_blank">GG Maniac 8 Poll</a><br>
            <a href="https://goo.gl/SdJd5S" target="_blank">Testbank</a><br>
        </p>
        <p>CM 7 Slideshow:<br><br><iframe width="560" height="315" src="https://www.youtube.com/embed/pTMj7cXiE-U" frameborder="0" allowfullscreen></iframe></p>
        <br>
        <p>- <a href="profile.php?user_id=2978">James Young (TT)</a></p>
    </div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
    <div class="newsItem">
            <h2>Election Platforms</h2>
            <p class="date">November 15, 2016 at 1:00am</p>

        <p style="margin: 1.5em 0px .5em 0px;">
            Thank you again to those who submitted platforms for elections! Here are the following submissions for each position:
        </p>

        <div>
            <div class="row">
                <div class="span3" style="margin: 1.5em 0px .5em 0px;">
                    <b><u>PRESIDENT:</u></b><br>
                    <p style="padding: 3 0;"><a href="https://goo.gl/1Qr9ir" target="_blank">Joseph Lee</a></p>
                    <p style="padding: 3 0;"><a href="https://goo.gl/c8rTtF" target="_blank">Antony Nguyen</a></p>
                </div>

                <div class="span2" style="margin: 1.5em 0px .5em 0px;">
                    <b><u>SERVICE VP:</u></b><br>
                    <p style="padding: 3 0;"><a href="https://goo.gl/TCF5ZI" target="_blank">Christine Fang</a></p>
                </div>

                <div class="span3" style="margin: 1.5em 0px .5em 0px;">
                    <b><u>PLEDGEMASTER:</u></b><br>
                    <p style="padding: 3 0;"><a href="https://goo.gl/Qo9E30" target="_blank">Virgil Tang</a></p>
                </div>
            </div>

            <div class="row">
                <div class="span3" style="margin: 1.5em 0px .5em 0px;">
                    <b><u>ADMIN VP:</u></b><br>
                    <p style="padding: 3 0;"><a href="https://goo.gl/46qcre" target="_blank">Jerry Park</a></p>
                </div>

                <div class="span2" style="margin: 1.5em 0px .5em 0px;">
                    <b><u>MEMBERSHIP VP:</u></b><br>
                    <p style="padding: 3 0;"><a href="https://goo.gl/sSL1my" target="_blank">Veronica Hall</a></p>
                    <p style="padding: 3 0;"><a href="https://goo.gl/OjaDpx" target="_blank">Ellie Hung</a></p>
                    <p style="padding: 3 0;"><a href="https://goo.gl/ENKsje" target="_blank">Sierra Lou</a></p>
                </div>

                <div class="span3" style="margin: 1.5em 0px .5em 0px;">
                    <b><u>FINANCE VP:</u></b><br>
                    <p style="padding: 3 0;"><a href="https://goo.gl/wKuapp" target="_blank">Hermes Ip</a></p>
                    <p style="padding: 3 0;"><a href="https://goo.gl/0naf2o" target="_blank">Jessica Lee</a></p>
                </div>
            </div>

            <div class="row">
                <div class="span3" style="margin: 1.5em 0px .5em 0px;">
                    <b><u>FELLOWSHIP VP:</u></b><br>
                    <p style="padding: 3 0;"><a href="https://goo.gl/3mq55V" target="_blank">Jeremy Lam</a></p>
                    <p style="padding: 3 0;"><a href="https://goo.gl/CNCL2T" target="_blank">Claudia Lim</a></p>
                </div>

                <div class="span2" style="margin: 1.5em 0px .5em 0px;">
                    <b><u>HISTORIAN:</u></b><br>
                    <p style="padding: 3 0;"><a href="https://goo.gl/hZzEJl" target="_blank">Stanley Shaw</a></p>
                </div>
            </div>
        </div>

        <p style="margin: 1.5em 0px;">
            I encourage all actives and pledges to read through these platforms thoroughly, as each candidate has spent a lot of time preparing and revising their platforms. Remember that if you did not submit a platform, you may still run on the day of Elections.
        </p>
        
        <p>- <a href="profile.php?user_id=2978">James Young (TT)</a></p>
    </div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
    <div class="newsItem">
        <h2>CM 6 Recap</h2>
        <p class="date">November 1, 2016 at 11:33pm</p>
        <p style="margin-top: 1em;"><b>ANNOUNCEMENTS:</b><br></p>
        <p style="margin: 0.5em 0px;">
        Thank you to everyone who attended nominations today. And congratulations to everyone who accepted a nomination to run for ExComm. It may be a huge responsibility, but your willingness and enthusiasm for the position will help the chapter continue to succeed in providing quality service to the community as well as the active body. If you did not attend nominations, you may view the nominees <a href="https://docs.google.com/spreadsheets/d/1NAxz4GNAgMWXWuf2WI6WSFAv_vc1TzcFa2_VON14t5o/" target="_blank">here</a>.</p>

        <p style="margin: 0.5em 0px;">
        For those who take their nomination seriously, please submit a <b>PLATFORM</b> with your <b>APO RESUME</b> to me by <b>Monday, November 14 at 11:59pm</b>. Please submit your platform in a Google Doc and send it to me either through my email (preferred) at <a href="mailto: admin-vp@calaphio.com">admin-vp@calaphio.com</a> or through Facebook.</p>

        <p style="margin: 0.5em 0px;">
        If you wish to see an example of a platform, you can check out an old one <a href="https://docs.google.com/document/d/1hXmP1ZXWBl-XVhbchMclh07kJHrfXFiyg7aTQ1Y7fTA/" target="_blank">here</a>.</p>

        <p style="margin-bottom: 1em;">Finally, here are the following documents from CM 6:<br><br>
            <a href="https://goo.gl/IYk3f5" target="_blank">CM 6 Slides</a><br>
            <a href="https://goo.gl/RNdE6r" target="_blank">CM 6 Minutes</a><br>
            <a href="https://goo.gl/LQkrzv" target="_blank">Caption Contest</a><br>
            <a href="https://goo.gl/forms/CoVvEesgevlwga9C3" target="_blank">Om Nom</a><br>
            <a href="https://members.calaphio.com/gg_maniac_vote.php?id=120" target="_blank">GG Maniac 7 Poll</a><br>
            <a href="https://goo.gl/SdJd5S" target="_blank">Testbank</a><br>
        </p>
        <p>CM 6 Slideshow:<br><br><iframe width="560" height="315" src="https://www.youtube.com/embed/aVKDScOIRSw" frameborder="0" allowfullscreen></iframe></p>
        <br>
        <p>- <a href="profile.php?user_id=2978">James Young (TT)</a></p>
    </div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
    <div class="newsItem">
        <h2>IC Meeting Dates</h2>
        <p class="date">October 22, 2016 at 10:21am</p>
        <p style="margin: 0.5em 0px;">
        For those of you who wish to complete their IC credit (or just wish to support their IC brothers), here is a list of the weekly IC meeting times:</p>

        <p style="margin-top: 1em;"><b><u>SUNDAYS:</u></b><br></p>
        <ul>
            <li style="list-style-type: square; margin-left: 1em;">UC Merced (Alpha Eta Gamma Chapter) - <b>5PM</b></li>
            <li style="list-style-type: square; margin-left: 1em;">Sacramento State (Kappa Sigma Chapter) - <b>5:30PM</b></li>
            <li style="list-style-type: square; margin-left: 1em;">San Jose State (Gamma Beta Chapter) - <b>6:30PM</b></li>
            <li style="list-style-type: square; margin-left: 1em;">Chico State (Eta Psi Chapter) - <b>6:30PM</b></li>
            <li style="list-style-type: square; margin-left: 1em;">UC Santa Cruz (Alpha Gamma Nu Chapter) - <b>6:30PM</b></li>
            <li style="list-style-type: square; margin-left: 1em;">Stanford (Zeta Chapter) - <b>7PM</b></li>
            <li style="list-style-type: square; margin-left: 1em;">UC Davis (Iota Phi Chapter) - <b>7PM</b></li>
            <li style="list-style-type: square; margin-left: 1em;">University of the Pacific (Alpha Alpha Xi Chapter) - <b>7PM</b></li>
        </ul>

        <p style="margin-top: 1em;"><b><u>MONDAYS:</u></b><br></p>
        <ul>
            <li style="list-style-type: square; margin-left: 1em;">CSU East Bay (Omicron Zeta Chapter) - <b>8PM</b></li>
        </ul>

        <p style="margin-top: 1em;"><b><u>TUESDAYS:</u></b><br></p>
        <ul>
            <li style="list-style-type: square; margin-left: 1em;">San Francisco State (Mu Zeta Chapter) - <b>7:30PM</b></li>
        </ul>

        <p style="margin-top: 1em;"><b><u>WEDNESDAYS:</u></b><br></p>
        <ul>
            <li style="list-style-type: square; margin-left: 1em;">University of San Francisco (Alpha Epsilon Nu Chapter) - <b>6:30PM</b></li>
        </ul>

        <p style="margin-top: 1em;"><b><u>FRIDAYS:</u></b><br></p>
        <ul>
            <li style="list-style-type: square; margin-left: 1em;">CSU Stanislaus (Alpha Eta Kappa Chapter) - <b>5PM</b></li>
        </ul>

        <p style="margin: 0.5em 0px;">If you would like to know more, please contact <a href="https://members.calaphio.com/profile.php?user_id=3582">Gordon Mah</a> or <a href="https://members.calaphio.com/profile.php?user_id=3288">Veronica Hall</a> for more information about how to attend.</p>

        <p>- <a href="profile.php?user_id=2978">James Young (TT)</a></p>
    </div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
    <div class="newsItem">
        <h2>CM 5 Recap</h2>
        <p class="date">October 19, 2016 at 7:35pm</p>
        <p style="margin-top: 1em;"><b>ANNOUNCEMENTS:</b><br></p>
        <p style="margin: 0.5em 0px;">
        Everyone in the family system is a target in assassins now, so remember that there are no killings at calendar events, hotspot, office hours, and in people's homes. You need <b>2 bigs/aunts/uncles</b> and <b>2 littles</b> to make a kill. The <b>2 families</b> with the <b>most deaths</b> by the beginning of next CM will be disqualified from assassins. Good luck!</p>

        <p style="margin-bottom: 1em;">Also, here are the following documents from CM 5:<br><br>
            <a href="https://goo.gl/XZrOip" target="_blank">CM 5 Slides</a><br>
            <a href="https://goo.gl/EPjyQT" target="_blank">CM 5 Minutes</a><br>
            <a href="https://goo.gl/vbU756" target="_blank">Caption Contest</a><br>
            <a href="https://goo.gl/forms/CoVvEesgevlwga9C3" target="_blank">Om Nom</a><br>
            <a href="https://members.calaphio.com/gg_maniac_vote.php?id=119" target="_blank">GG Maniac 6 Poll</a><br>
            <a href="https://goo.gl/SdJd5S" target="_blank">Testbank</a><br>
        </p>
        <p>CM 5 Slideshow:<br><br><iframe width="560" height="315" src="https://www.youtube.com/embed/GZTJzAMrxXg" frameborder="0" allowfullscreen></iframe></p>
        <br>
        <p>- <a href="profile.php?user_id=2978">James Young (TT)</a></p>
    </div>
<?php endif ?>

<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
    <div class="newsItem">
        <h2>Pledge Feedback Form</h2>
        <p class="date">October 12, 2016 at 7:36am</p>
        <p style="margin-top: 1em;">Hello actives,<br></p>
        <p style="margin: 0.5em 0px;">
        PComm wants you to be more involved in the pledge program! We understand that we can’t always be everywhere to observe our pledges, so we would like to extend our invitation to you guys to be our additional eyes and ears. We appreciate you taking the time to mention pledges and we will take your observations into consideration.</p>

        <p style="margin: 0.5em 0px;">
        Below is an active comment Google form. Please use this form for the following purposes:</p>

        <p style="margin: 0.5em 0px;">
        1. General pledge observations – commendable/discouraged behavior</p>

        <p style="margin: 0.5em 0px;">
        2. Pledges’ attitudes – are they proactive/lazy at service? Do they seem well integrated at service/fellowships? Are they committed/dedicated to what they’re doing?</p>

        <p style="margin: 0.5em 0px;">
        3. Merit/demerit suggestions – give specific examples of actions that you believe deserves recognition </p>

        <p style="margin: 0.75em 0px;">
        Please check out the Pledge Feedback Form <a href="https://docs.google.com/a/berkeley.edu/forms/d/e/1FAIpQLScZ88JEXnVBI5luagaAmB1ENZczm-Kgc7EVHM0VBgcL_OohSw/viewform" target="_blank">here</a>.</p>

        <p style="margin: 0.5em 0px;">
        P.S. if you're wondering, pledges can't see this post.</p>

        <br>
        <p>- <a href="profile.php?user_id=2978">James Young (TT)</a></p>
    </div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
    <div class="newsItem">
        <h2>How tf Does Assassins Work?</h2>
        <p class="date">October 5, 2016 at 12:03am</p>
        <p style="margin: 0.5em 0px;">
        There's a lot of rules, but please bear with them.</p>

        <p style="margin-top: 1em;"><b><u>KILLINGS:</u></b><br></p>
        <ul>
            <li style="list-style-type: square; margin-left: 1em;">Families need at least <b>2 bigs/aunts/uncles/unofficials</b> AND <b>2 littles</b> together to kill a target</li>
            <li style="list-style-type: square; margin-left: 1em;">PComm/DComm need at least <b>4 members</b>. If PComm is involved, they must be from at least <b>2 different committees</b> (aka Jerry + Joseph + 2 DComm members will not count).</li>
            <li style="list-style-type: square; margin-left: 1em;">You must shout the name of the target when near them, then everyone must tag the target with spoons. Forks and knives do not count. Throwing the spoons does not count.</li>
        </ul>

        <p style="margin-top: 1em;"><b><u>PROOF OF A KILL:</u></b><br></p>
        <ul>
            <li style="list-style-type: square; margin-left: 1em;">Photo evidence: target must be holding a paper with their own name and the name of the family that killed them (if you get killed, don't refuse to take a picture).</li>
            <li style="list-style-type: square; margin-left: 1em;">Email photo evidence to assassins@calaphio.com (include the date and time of the kill).</li>
            <li style="list-style-type: square; margin-left: 1em;">Failure to complete the above steps will null any kill attempts.</li>
        </ul>

        <p style="margin-top: 1em;"><b><u>IMMUNITY:</u></b><br></p>
        <p style="margin-top: 0.5em;">You may NOT kill people <b>30 minutes before or after</b> the following:</p>
        <ul>
            <li style="list-style-type: square; margin-left: 1em;">Calendar Events</li>
            <li style="list-style-type: square; margin-left: 1em;">Office Hours</li>
            <li style="list-style-type: square; margin-left: 1em;">Chummings</li>
        </ul>
        <p style="margin-top: 0.5em;">You may NOT kill people <b>10 minutes before or after</b> the following:</p>
        <ul>
            <li style="list-style-type: square; margin-left: 1em;">Hotspot</li>
            <li style="list-style-type: square; margin-left: 1em;">Work</li>
            <li style="list-style-type: square; margin-left: 1em;">Class (so don't skip class *cough* Scottie Wan *cough*)</li>
        </ul>
        
        <p style="margin-top: 0.5em;">And you may NOT kill people at their homes/dorms, nor right after they leave. Finally, certain types of targets are immune under the following conditions:</p>
        <ul>
            <li style="list-style-type: square; margin-left: 1em;"><b>Family target:</b> At least <b>2 bigs</b> AND <b>2 littles</b> are together.</li>
            <li style="list-style-type: square; margin-left: 1em;"><b>PComm/DComm targets:</b> At least <b>3 members of PComm</b> or <b>2 members of DComm</b> are together.</li>
            <li style="list-style-type: square; margin-left: 1em;"><b>Pledges:</b> Whenever a pledge is a target, if at least <b>3 pledges</b> are together, PComm/DComm cannot kill them no matter what.</li>
        </ul>

        <p style="margin: 0.5em 0px;">If anyone has questions (there are a lot of rules so it's understandable) then please message Antony. If anyone starts to feel like they cannot go to class or leave their homes because assassins is too intense or the rules are not adequate, please let Antony know as well. Good luck!</p>

        <p>- <a href="profile.php?user_id=2978">James Young (TT)</a></p>
    </div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
    <div class="newsItem">
        <h2>CM 4 Recap</h2>
        <p class="date">October 4, 2016 at 11:54pm</p>
        <p style="margin-top: 1em;"><b>ANNOUNCEMENTS:</b><br></p>
        <p style="margin: 0.5em 0px;">
        Pledges and actives, please join Fall Fellowship Committee, the chairs work incredibly hard and any support from the chapter is much appreciated. A lot of work goes unrecognized in the chapter so please join their committee if you can.</p>

        <p style="margin: 0.5em 0px;">
        Actives, ExComm still needs chairs for the following positions (amounts needed are in parenthesis). If you are interested in any of them, please contact the respective ExComm member in charge. Thanks!</p>

        <p style="margin-bottom: 1em 0px;">
            <b><u>FELLOWSHIP VP:</u></b><br>
            <b>IC Events Chair </b>(1)<br>
        </p>

        <p style="margin:1.5em 0px 1em 0px;">
            <b><u>HISTORIAN:</u></b><br>
            <b>Slideshow Chair </b>(1)<br>
        </p>

        <p style="margin-bottom: 1em;">Finally, here are the following documents from CM 4:<br><br>
            <a href="https://goo.gl/knCSz4" target="_blank">CM 4 Slides</a><br>
            <a href="https://goo.gl/0Sp6V8" target="_blank">CM 4 Minutes</a><br>
            <a href="https://goo.gl/A6knYW" target="_blank">Caption Contest</a><br>
            <a href="https://goo.gl/forms/CoVvEesgevlwga9C3" target="_blank">Om Nom</a><br>
            <a href="https://members.calaphio.com/gg_maniac_vote.php?id=118" target="_blank">GG Maniac 5 Poll </a>(cannot vote for people in this list <a href="https://members.calaphio.com/gg_maniacs.php" target="_blank">here</a>, otherwise the vote will not count)<br>
            <a href="https://goo.gl/SdJd5S" target="_blank">Testbank</a><br>
        </p>
        <p style="margin: 0.5em 0px;">
        There is no slideshow for CM4 gg</p>
        <br>
        <p>- <a href="profile.php?user_id=2978">James Young (TT)</a></p>
    </div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
    <div class="newsItem">
        <h2>CM 3 Recap</h2>
        <p class="date">September 21, 2016 at 12:04am</p>
        <p style="margin-top: 1em;"><b>ANNOUNCEMENTS:</b><br></p>
        <p style="margin: 0.5em 0px;">
        Welcome FH Pledges! I'll be posting a recap of each chapter meeting within 24 hours that it ends. We hope you all enjoy pledging this semester! And good luck to PComm, we hope you guide a great new group of pledges into the chapter!</p>

        <p style="margin-bottom: 1em;">Also, here are the following documents from CM 3:<br><br>
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

<?php if ($g_user->is_logged_in()): ?>
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

<?php if ($g_user->is_logged_in()): ?>
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
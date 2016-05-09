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
    <br/>
    <h2>Congratulations to the Fall Fellowship Chairs!</h2>
    <p class="date">Wednesday, May 4, 2016</p>
    <div class="collage-container">
        <div class="collage-pictures">
            <div class="person-picture">
                <a href="profile.php?user_id=3569"><img src="images/fall_fellowship/gene.jpg"></img></a>
                <p class="center"><a href="profile.php?user_id=3569">Gene Ho</a></p>
            </div>

            <div class="person-picture">
                <a href="profile.php?user_id=3571"><img src="images/fall_fellowship/bianca.jpg"></img></a>
                <p class="center"><a href="profile.php?user_id=3571">Bianca Hsueh</a></p>
            </div>

            <div class="person-picture">
                <a href="profile.php?user_id=3592"><img src="images/fall_fellowship/nick.jpg"></img></a>
                <p class="center"><a href="profile.php?user_id=3592">Nick Weis</a></p>
            </div>

            <div class="person-picture">
                <a href="profile.php?user_id=3292"><img src="images/fall_fellowship/stanley.jpg"></img></a>
                <p class="center"><a href="profile.php?user_id=3292">Stanley Shaw</a></p>
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
    <h2>Congratulations to the Fall 2016 Pledge Committee!</h2>
    <p class="date">Tuesday, May 3, 2016</p>
    <div class="collage-container">
        <div class="collage-pictures">
            <div class="person-picture">
                <a href="profile.php?user_id=2979"><img src="images/pcomm_fa16/jerianne.jpg"></img></a>
                <p class="center"><strong>Leadership Trainer</strong>: <br><a href="profile.php?user_id=2979">Jerianne Lukban</a></p>
            </div>

            <div class="person-picture">
                <a href="profile.php?user_id=3259"><img src="images/pcomm_fa16/karen.jpg"></img></a>
                <p class="center"><strong>Administrative Trainer</strong>: <br><a href="profile.php?user_id=3259">Karen Chou</a></p>
            </div>

            <div class="person-picture">
                <a href="profile.php?user_id=3263"><img src="images/pcomm_fa16/nao.jpg"></img></a>
                <p class="center"><strong>Fellowship Trainer</strong>: <br><a href="profile.php?user_id=3263">Nao Yamamoto</a></p>
            </div>

            <div class="person-picture">
                <a href="profile.php?user_id=3277"><img src="images/pcomm_fa16/hyeonji.jpg"></img></a>
                <p class="center"><strong>Fellowship Trainer</strong>: <br><a href="profile.php?user_id=3277">Hyeonji Shim</a></p>
            </div>

            <div class="person-picture">
                <a href="profile.php?user_id=3279"><img src="images/pcomm_fa16/virginia.jpg"></img></a>
                <p class="center"><strong>Service Trainer</strong>: <br><a href="profile.php?user_id=3279">Virginia Yan</a></p>
            </div>

            <div class="person-picture">
                <a href="profile.php?user_id=3256"><img src="images/pcomm_fa16/jerry.jpg"></img></a>
                <p class="center"><strong>Finance Trainer</strong>: <br><a href="profile.php?user_id=3256">Jerry Park</a></p>
            </div>

            <div class="person-picture">
                <a href="profile.php?user_id=3272"><img src="images/pcomm_fa16/joseph.jpg"></img></a>
                <p class="center"><strong>Finance Trainer</strong>: <br><a href="profile.php?user_id=3272">Joseph Lee</a></p>
            </div>

             <div class="person-picture">
                <a href="profile.php?user_id=3264"><img src="images/pcomm_fa16/jeremy.jpg"></img></a>
                <p class="center"><strong>Historian Trainer</strong>: <br><a href="profile.php?user_id=3264">Jeremy Lam</a></p>
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
    <h2>Congratulations to the Fall 2016 Rush Chairs!</h2>
    <p class="date">Sunday, May 1, 2016</p>
    <div class="collage-container">
        <div class="collage-pictures">
            <div class="person-picture">
                <a href="profile.php?user_id=2461"><img src="images/rush_f16/scottie.jpg"></img></a>
                <p class="center"><a href="profile.php?user_id=2461">Scottie Wan</a></p>
            </div>

            <div class="person-picture">
                <a href="profile.php?user_id=3590"><img src="images/rush_f16/jessica.jpg"></img></a>
                <p class="center"><a href="profile.php?user_id=3590">Jessica Tzeng</a></p>
            </div>

            <div class="person-picture">
                <a href="profile.php?user_id=3569"><img src="images/rush_f16/gene.jpg"></img></a>
                <p class="center"><a href="profile.php?user_id=3569">Gene Ho</a></p>
            </div>

            <div class="person-picture">
                <a href="profile.php?user_id=3570"><img src="images/rush_f16/alice.jpg"></img></a>
                <p class="center"><a href="profile.php?user_id=3570">Alice Hsieh</a></p>
            </div>
        </div>
    </div>
    <p>- <a href="profile.php?user_id=2978">James Young (TT)</a></p>
</div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
<div class="newsItem">
    <br/>
    <h2>Congratulations to the Fall 2016 Executive Committee!</h2>
    <p class="date">Wednesday, April 13, 2016</p>
    <div class="collage-container">
        <div class="collage-pictures">
            <div class="person-picture">
                <a href="profile.php?user_id=2873"><img src="images/excomm_f16/virgil.jpg"></img></a>
                <p class="center"><strong>President</strong>: <br><a href="profile.php?user_id=2873">Virgil Tang</a></p>
            </div>

            <div class="person-picture">
                <a href="profile.php?user_id=2913"><img src="images/excomm_f16/elaine.jpg"></img></a>
                <p class="center"><strong>Service VP</strong>: <br><a href="profile.php?user_id=2913">Elaine Do</a></p>
            </div>

            <div class="person-picture">
                <a href="profile.php?user_id=2858"><img src="images/excomm_f16/ellie.jpg"></img></a>
                <p class="center"><strong>Pledgemaster</strong>: <br><a href="profile.php?user_id=2858">Ellie Hung</a></p>
            </div>

            <div class="person-picture">
                <a href="profile.php?user_id=2978"><img src="images/excomm_f16/james.jpg"></img></a>
                <p class="center"><strong>Administrative VP</strong>: <br><a href="profile.php?user_id=2978">James Young</a></p>
            </div>

            <div class="person-picture">
                <a href="profile.php?user_id=2869"><img src="images/excomm_f16/antony.jpg"></img></a>
                <p class="center"><strong>Membership VP</strong>: <br><a href="profile.php?user_id=2869">Antony Nguyen</a></p>
            </div>

            <div class="person-picture">
                <a href="profile.php?user_id=2929"><img src="images/excomm_f16/marilyn.jpg"></img></a>
                <p class="center"><strong>Finance VP</strong>: <br><a href="profile.php?user_id=2929">Marilyn Chan</a></p>
            </div>

            <div class="person-picture">
                <a href="profile.php?user_id=2902"><img src="images/excomm_f16/caroline.jpg"></img></a>
                <p class="center"><strong>Fellowship VP</strong>: <br><a href="profile.php?user_id=2902">Caroline Ba</a></p>
            </div>

            <div class="person-picture">
                <a href="profile.php?user_id=2905"><img src="images/excomm_f16/christine.jpg"></img></a>
                <p class="center"><strong>Historian</strong>: <br><a href="profile.php?user_id=2905">Christine Fang</a></p>
            </div>

        </div>
        <div style="clear: left;"></div>
    </div>

    <p>- <a href="profile.php?user_id=2859">Trinh Huynh (KHK)</a></p>
</div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
<div class="newsItem">
    <h2> ELECTION PLATFORMS </h2>
    <p class="date">Monday, April 11, 2016</p>
    <p style="margin-bottom: 1em">

    <br> Hey everyone! Elections is coming up tomorrow, so please take the time to read the platforms of your fellow 
    candidates in preparation. </br> 
    <br> 
    <a href="https://docs.google.com/document/d/1Y4K2GaPYeCWTyvdV_ogeQESonxJy6Mqin5mwNllFqlE" target="_blank"> Pledgemaster Platform Kirk Chiu </a> </a><br>
    <a href="https://docs.google.com/document/d/1Ri2Dw2M15cq9kDrK9WyrOF4tdFPROuap9zAMJXaee7w" target="_blank"> Pledgemaster Platform Ellie Hung</a> </a><br>
    <a href="https://docs.google.com/document/d/1QBp0ehhCEIQZ8eo9VOi5kW0rz-60Jzojk0SX4ajZF24" target="_blank"> Admin VP Carrie Lin</a> </a><br>
    <a href="https://docs.google.com/document/d/1rLWbfIdBVxl8CcmioBx87py0rxXOTqjTHFITBBhmnGw" target="_blank"> Admin VP James Young </a> </a><br>
    <a href="https://docs.google.com/document/d/14HLIsonQaN6aXNse7BL92Cc5AwpTpy0UIB130RjqmLU" target="_blank"> Historian VP Stanley Shiau </a> </a><br>
    <a href="https://docs.google.com/document/d/1caehLk1PBUCqGoAfjFLCOA2p_lbbNXIotMjW_dfmxKA" target="_blank"> Membership VP Antony Nguyen </a> </a><br>
    <a href="https://docs.google.com/document/d/1uAleZeVtbwpt7gRPs0kcvpYClA1wlNdG3xO0KMY-AIM" target="_blank"> Service VP Elaine Do </a> </a><br>
    <a href="https://docs.google.com/document/d/1sl_cNXRlmQ8p4IPpnm1HBuXA9J6uZ36E_g5v8tVqNng" target="_blank"> Service VP Christine Fang </a> </a><br>

    <p>- <a href="profile.php?user_id=2859">Trinh Huynh (KHK)</a></p>
</div> 
<?php endif ?>

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

<p>- <a href="profile.php?user_id=2859">Trinh Huynh (KHK)</a></p>
</div>
<?php endif ?>

<div class="newsItem">
        <h2> Welcome Brothers of Gamma Gamma!</h2>
        <p style="margin-bottom: 1em">

    <br> Alpha Phi Omega welcomes you back to school! </br> 
    
    <p>- <a href="profile.php?user_id=2859">Trinh Huynh (KHK)</a></p>
</div>

<a href="news_fa15.php">Older News ></a>
<?php
$template->print_body_footer();
$template->print_disclaimer();
?>
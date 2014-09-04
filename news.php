<?php
require("include/includes.php");
require("include/Calendar.class.php");
require("include/Template.class.php");
require("include/Shoutbox.class.php");
require("include/EvalNag.class.php");
require("include/GGManiacNag.class.php");
Template::print_head(array("site.css", "calendar.css", "excel.css"));
Template::print_body_header('Home', 'NEWS');

$evalnag = new EvalNag();
echo $evalnag->display("2007-01-01");

$gg_maniac_nag = new GGManiacNag();
echo $gg_maniac_nag->display();

$shoutbox = new Shoutbox();
$shoutbox->process();
echo $shoutbox->display();

Calendar::print_upcoming_events(5);

$g_user->process_mailer(false);
$g_user->print_mailer(false);
$g_user->print_personal_messages();

if (!$g_user->is_logged_in()) {
	echo '<img style="float: right" src="images/lfs_banner.png" alt="LFS" />';
}

?>

<?php if ($g_user->is_logged_in()): ?>
<div class="newsItem">
    <h2>Notes From CM 1</h2>
    <p class="date">September 3, 2014</p>
    <p style="margin-bottom: 1em">Here are the documents from CM1!<br>
        Excomm Powerpoint Slides:<a href="https://docs.google.com/a/calaphio.com/presentation/d/1dku3CjI3UstuiPeTZRBDWYiwxnJ4tz7bB3ghofgFO5M/edit#slide=id.g3a97cdccd_185"> CM1 Slides</a><br>
    </p>
    <iframe style="margin-bottom: 1em" width="480" height="360" src="https://www.youtube.com/watch?v=kFYDE5jWdHw&feature=youtu.be" frameborder="0" allowfullscreen></iframe>
    <p>-<a href="profile.php?user_id=2055">Kelsey Chan (KK)</a></p>
</div>
<?php endif ?>

<div class="newsItem">
    <h2>Congratulations to the Fall 2014 Rush Chairs!</h2>
    <p class="date">May 10, 2014</p>
    <p class="center"> Please join me in congratulating the Fall 2014 Rush Chairs!</p>
    <div class="collage-container">
    <div class="collage-pictures">
        <div class="person-picture">
            <img src="documents/fa14/rush/rebecca_phuong.jpg"></img>
            <p class="center"><a href="profile.php?user_id=1405">Rebecca Phuong</a></p>
            
        </div>
        <div class="person-picture">
            <img src="documents/fa14/rush/kevin_lu.jpg"></img>
            <p class="center"><a href="profile.php?user_id=2532">Kevin Lu</a></p>
        </div>
        <div class="person-picture">
            <img src="documents/fa14/rush/vivian_rubio.jpg"></img>
            <p class="center"><a href="profile.php?user_id=2464">Vivian Rubio</a></p>
        </div>
    </div>
    <div style="clear: left;"></div>
    </div>
    <p>I know they will recruit amazing new additions to the chapter!</p>
    <p>-<a href="profile.php?user_id=2055">Kelsey Chan (KK)</a></p>
</div>

<?php if ($g_user->is_logged_in()): ?>
<div class="newsItem">
    <br/>
    <h2>Congratulations to the Fall 2014 Pledge Committee</h2>
    <p class="date">May 10th, 2014</p>
    <p class="center"> Please congratulate the Fall 2014 pledge committee when you see them!</p>
    <div class="collage-container">
    <div class="collage-pictures">
        <div class="person-picture">
            <img src="documents/fa14/pcomm/edith_ho.jpg"></img>
            <p class="center"><strong>Leadership Trainer</strong>: <a href="profile.php?user_id=2142">Edith Ho</a></p>
            
        </div>
        <div class="person-picture">
            <img src="documents/fa14/pcomm/tyler_weng.jpg"></img>
            <p class="center"><strong>Fellowship Trainer</strong>: <a href="profile.php?user_id=1378">Tyler Weng</a></p>
            
        </div>
        <div class="person-picture">
            <img src="documents/fa14/pcomm/sharon_wang.jpg"></img>
            <p class="center"><strong>Fellowship Trainer</strong>: <a href="profile.php?user_id=2155">Sharon Wang</a></p>
            
        </div>
        <div class="person-picture">
            <img src="documents/fa14/pcomm/james_wang.jpg"></img>
            <p class="center"><strong>Service Trainer</strong>: <a href="profile.php?user_id=1443">James Wang</a></p>
            
        </div>
        <div class="person-picture">
            <img src="documents/fa14/pcomm/pooja_shah.jpg"></img>
            <p class="center"><strong>Service Trainer</strong>: <a href="profile.php?user_id=1673">Pooja Shah</a></p>
            
        </div>
        <div class="person-picture">
            <img src="documents/fa14/pcomm/joanna_chang.jpg"></img>
            <p class="center"><strong>Finance Trainer</strong>: <a href="profile.php?user_id=2139">Joanna Chang</a></p>
            
        </div>
        <div class="person-picture">
            <img src="documents/fa14/pcomm/angela_wu.jpg"></img>
            <p class="center"><strong>Finance Trainer</strong>: <a href="profile.php?user_id=2153">Angela Wu</a></p>
            
        </div>
        <div class="person-picture">
            <img src="documents/fa14/pcomm/lakana_bun.jpg"></img>
            <p class="center"><strong>Historian Trainer</strong>: <a href="profile.php?user_id=2136">Lakana Bun</a></p>
            
        </div>
        
    </div>
    <div style="clear: left;"></div>
    </div>

    <p>-<a href="profile.php?user_id=2055">Kelsey Chan (KK)</a></p>
</div>
<?php endif ?>



<a href="news_sp14.php">Older News ></a>
<?php
Template::print_body_footer();
Template::print_disclaimer();
?>

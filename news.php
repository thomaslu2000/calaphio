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
    <h2>Notes From CM 3</h2>
    <p class="date">September 23, 2014</p>

    <p style="margin-bottom: 1em">
        <b>“Welcome KHK Pledges!”</b><br>
        Here are the documents from CM 3!<br>
        Excomm Powerpoint Slides: <a href="https://docs.google.com/a/calaphio.com/presentation/d/1zZkkhMKyisGavt2z0LNilxzLVfOSv9dsP5JUJF3LVZc/edit#slide=id.p">CM 3 Slides</a><br>
        Here are the <a href="https://docs.google.com/a/calaphio.com/file/d/0B1PYMBbhnLMsNEFUcHY5NERfUGc/edit">CM 3 Minutes.</a><br>
        And here is also this week's <a href="https://docs.google.com/a/calaphio.com/file/d/0B1PYMBbhnLMsQmlxclk3ME9IYTQ/edit">Stylus</a>.<br></p>
    <iframe style="margin-bottom: 1em" width="480" height="360" src="//www.youtube.com/embed/d9Jpf3PkLgs" frameborder="0" allowfullscreen></iframe>
    <p>-<a href="profile.php?user_id=2055">Kelsey Chan (KK)</a></p>
</div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
<div class="newsItem">
    <h2>Notes From CM 2</h2>
    <p class="date">September 16, 2014</p>
    <p style="margin-bottom: 1em">Here are the documents from CM2!<br>
        Excomm Powerpoint Slides:<a href="https://docs.google.com/a/calaphio.com/presentation/d/1bieo_FUF7AB-Xysj7TLhutvA6D5oB-rSYcwdASBLtOo/edit"> CM 2 Slides</a><br>
        And here are the <a href="https://docs.google.com/a/calaphio.com/file/d/0B1PYMBbhnLMsVmgyWkltdENtQzQ/edit">CM 2 Minutes</a></p>
        <b>Feature Article</b>: Check out this week’s<a href="https://docs.google.com/a/calaphio.com/file/d/0B1PYMBbhnLMsTzN6ODVYSXk1cW8/edit"> feature article </a>written by <a href="profile.php?user_id=1425">Ryan Fong</a>!<br>
    <iframe style="margin-bottom: 1em" width="480" height="360" src="//www.youtube.com/embed/cb5E8S8t4gk" frameborder="0" allowfullscreen></iframe>
    <p>-<a href="profile.php?user_id=2055">Kelsey Chan (KK)</a></p>
</div>
<?php endif ?>

<div class="newsItem">
    <h2>Congratulations Fall 2014 Executive Committee!</h2>
    <p class="date">September 3, 2014</p>

        <div class="collage-container">
    <div class="collage-pictures">
        <div class="person-picture">
            <img src="documents/fa14/excomm/president.jpg"></img>
            <p class="center"><strong>President</strong>: <a href="profile.php?user_id=1412">Jeff Ma</a></p>
            
        </div>
        <div class="person-picture">
            <img src="documents/fa14/excomm/service.jpg"></img>
            <p class="center"><strong>Service VP</strong>: <a href="profile.php?user_id=1426">Susan Guan</a></p>
            
        </div>
        <div class="person-picture">
            <img src="documents/fa14/excomm/pledgemaster.jpg"></img>
            <p class="center"><strong>Pledgemaster</strong>: <a href="profile.php?user_id=1591">Christopher Wen</a></p>
            
        </div>
        <div class="person-picture">
            <img src="documents/fa14/excomm/admin.jpg"></img>
            <p class="center"><strong>Administrative VP</strong>: <a href="profile.php?user_id=2055">Kelsey Chan</a></p>
            
        </div>
        <div class="person-picture">
            <img src="documents/fa14/excomm/membership.jpg"></img>
            <p class="center"><strong>Membership VP</strong>: <a href="profile.php?user_id=1400">Debbie Yan</a></p>
            
        </div>
        <div class="person-picture">
            <img src="documents/fa14/excomm/finance.jpg"></img>
            <p class="center"><strong>Finance VP</strong>: <a href="profile.php?user_id=1437">Jane Tam</a></p>
            
        </div>
        <div class="person-picture">
            <img src="documents/fa14/excomm/fellowship.jpg"></img>
            <p class="center"><strong>Fellowship VP</strong>: <a href="profile.php?user_id=1623">Karen Wu</a></p>
            
        </div>
        <div class="person-picture">
            <img src="documents/fa14/excomm/historian.jpg"></img>
            <p class="center"><strong>Historian</strong>: <a href="profile.php?user_id=1433">Rita Mae Nuevo</a></p>
            
        </div>
        
    </div>
    <div style="clear: left;"></div>
    </div>
    </p>
    <p>-<a href="profile.php?user_id=2055">Kelsey Chan (KK)</a></p>
</div>


<?php if ($g_user->is_logged_in()): ?>
<div class="newsItem">
    <h2>Notes From CM 1</h2>
    <p class="date">September 2, 2014</p>
    <p style="margin-bottom: 1em">Here are the documents from CM 1!<br>
        Excomm Powerpoint Slides:<a href="https://docs.google.com/a/calaphio.com/presentation/d/1dku3CjI3UstuiPeTZRBDWYiwxnJ4tz7bB3ghofgFO5M/edit#slide=id.g3a97cdccd_185"> CM 1 Slides</a><br>
        And here are the <a href="https://docs.google.com/a/calaphio.com/file/d/0B1PYMBbhnLMsWlFSSWR3YnBRUTA/edit">Active Requirements & Budget.</a></p>
    <iframe style="margin-bottom: 1em" width="480" height="360" src="//www.youtube.com/embed/kFYDE5jWdHw" frameborder="0" allowfullscreen></iframe>
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

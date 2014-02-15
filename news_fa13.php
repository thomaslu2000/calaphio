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

<div class="newsItem">
	<h2>The amazing and memorable banquet slideshow is up!</h2>
	<p class="date">December 16, 2013</p>
	<iframe width="560" height="315" src="//www.youtube.com/embed/Pi9FrTNXoOc?fmt=36" frameborder="0" allowfullscreen></iframe>
	<p style="margin-bottom:1.5em">What an amazing semester and I can't wait for next semester!</p>
</div>
<?php if ($g_user->is_logged_in()): ?>
<div class="newsItem">
    <h2>Spring 2014 Chairing Applications Are Available!</h2>
    <p class="date">December 15, 2013</p>
    <p style="margin-bottom: 1.5em">Please take your time to review the chairing applications that you are interested in applying for! All the chairing applications 
	are due on January 10th, 2014!</p>
    <p style="margin-bottom: 1.5em">Excomm looks forward to reading your applications! The links for each excomm chairing position can be found below:</p>
    <p style="margin-bottom: 1.5em">
	<strong>Presidential:</strong> <a href="https://docs.google.com/forms/d/1w1f6iDmRjuWytItvRxlTJu5vaZb7c2a7BFxVBuknOOk/viewform" target="_blank">Chairing Application</a><br/>
	<strong>Administrative:</strong> <a href="https://docs.google.com/forms/d/1WASjkYOCgsOmvaA75CmsyiuteFg4vfoNtCyyN892KVQ/viewform" target="_blank">Chairing Application</a><br/>
	<strong>Membership:</strong> <a href="https://docs.google.com/forms/d/1h_pSYdYQZNOlq6gJMHkN88mBHtY9v-91rKJxFMkF4OI/viewform" target="_blank">Chairing Application</a><br/>
	<strong>Service:</strong> <a href="https://docs.google.com/a/berkeley.edu/forms/d/1K-g75qjyBCfgclxl5D-KGN6JWq1PMZYEUSOB8r3q-XU/viewform" target="_blank">Chairing Application</a><br/>
	<strong>Finance:</strong> <a href="https://docs.google.com/forms/d/1ye_ZZ8qAiQl9wre2S8VWcZcs0p2xtLha33YPt4ceGuw/viewform" target="_blank">Chairing Application</a><br/>
	<strong>Fellowship:</strong> <a href="https://docs.google.com/forms/d/1BkLHheqy2qlBXjT7_dZmPLdWaFEkedYQqmDpyZc2axU/viewform" target="_blank">Chairing Application</a><br/>
	<strong>Historian:</strong> <a href="https://docs.google.com/forms/d/1YyTV-BokBUGFyV2ppWLktz9SUHfrFBTo-hiiYb9dsnU/viewform" target="_blank">Chairing Application</a><br/>
    </p>
    <p style="margin-bottom: 1.5em">Good luck on finals! I know you all will do just great! Apply when you are all done though because we just can't do without everyone in the chapter!</p>
    <p style="margin-bottom: 1.5em">-<a href="roster.php?function=Search&user_id=1584">Ngoc Tran (MH)</a></p>
</div>
<?php endif ?>
<div class="newsItem">
    <h2>Congratulations to Tin Oi for winning GG Maniac!</h2>
    <p class="date">December 13, 2013</p>
    <img src="/documents/fa13/ggmaniac7.jpg" width=300 style="border:1px solid black"/></a><br><br>
    <p style="margin-bottom: 1.5em">She goes by many names, but the most memorable one is Tin Wa. She pledged KK semester
and has been actively contributing to the chapter ever since. This semester (DE), she worked under the president as one
of the Seargeant-at-Arms, and also contributed to planning an amazing Active Retreat! </p>
    <p>Please join me in congratulating her
when you see her!</p>
    <p>-<a href="roster.php?function=Search&user_id=1584">Ngoc Tran (MH)</a></p>
</div>

    <div class="newsItem">
        <h2>CM8 Recap</h2>
        <p class="date">December 3, 2013</p>
        <p style="margin-bottom: 1.5em"><a href="/documents/fa13/CM8Minutes.pdf">Minutes from CM 8</a></p>
	 <p style="margin-bottom: 1.5em"><a href="/documents/fa13/F13 CM 8 Slides.pdf">Slides from CM 8</a></p>
        <p style="margin-bottom: 1.5em"><a href="http://www.youtube.com/watch?v=m0YrG7Avfik&feature=youtu.be">Slideshow.</a></p>
    <p>-<a href="roster.php?function=Search&user_id=1411">Andrew Cai (JS)</a></p>
    </div>

<div class="newsItem">
    <h2>Congratulations to Jejee for winning GG Maniac!</h2>
    <p class="date">November 30, 2013</p>
    <img src="/documents/fa13/ggmaniac6.jpg" width=300 style="border:1px solid black"/></a><br><br>
    <p style="margin-bottom: 1.5em">Jejee has been a dedicated member since her pledging semester (KK). She led Gamma Gamma's
roll-call this semester as they made a debut with their Korean pop dance styles at Fall Fellowship! She is also a big for Nunchops, and
her family loves her presence just as the chapter appreciates everything she has done to help!
    <p>Remember to congratulate her when you see her! </p>
    <p>-<a href="roster.php?function=Search&user_id=1584">Ngoc Tran (MH)</a></p>
</div>

<div class="newsItem">
	<h2>Congratulations Spring 2014 Executive Committee!</h2>
	<p class="date">November 21, 2013</p>
	    <p> <strong>President</strong>: Jeff Ma<br/>
        <strong>Service VP</strong>: Susan Guan<br/>
        <strong>Pledgemaster</strong>: Vivian Nguyen<br/>
        <strong>Administrative VP</strong>: Ngoc Tran<br/>
        <strong>Membership VP</strong>: Stephanie Chan<br/>
        <strong>Finance VP</strong>: Jane Tam<br/>
        <strong>Fellowship VP</strong>: Sarah Wang<br/>
        <strong>Historian</strong>: Kelsey Chan
    </p>
	<p>-<a href="roster.php?function=Search&user_id=1411">Andrew Cai (JS)</a></p>
</div>

<?php if ($g_user->is_logged_in()): ?>
    <div class="newsItem">
        <h2>Election Platforms!</h2>
        <p class="date">November 18, 2013</p>
        <p style="margin-bottom: 1.5em">Please read these Election Platforms so you guys can all be informed this Tuesday during Elections!<br><br>

        <a href="fa13platforms.php">Election Platforms Link</a><br>

        <p>-<a href="roster.php?function=Search&user_id=1289">Benjamin Le (KS)</a></p>
    </div>
<?php endif ?>

<div class="newsItem">
    <h2>Congratulations to GG Maniac, Christopher Ching</h2>
    <p class="date">November 17, 2013</p>
    <img src="/documents/fa13/ggmaniac5.jpg" width=300 style="border:1px solid black"/></a><br><br>
    <p style="margin-bottom: 1.5em">Christopher pledged CPZ semester and bigged twice and was Membership VP in MH semester.</p>
    <p style="margin-bottom: 1.5em">Congratulations Christopher!</p>
    <p>-<a href="roster.php?function=Search&user_id=1411">Andrew Cai (JS)</a></p>
</div>

<div class="newsItem">
	<h2>POTW #5</h2>
	<p class="date">November 17, 2013</p>
	<img src="/documents/fa13/potw5a.jpg" width=300 style="border:1px solid black"/></a><br><br>
	<p style="margin-bottom: 1.5em">We rock the house!</p>
	<img src="/documents/fa13/potw5b.jpg" width=300 style="border:1px solid black"/></a><br><br>
	<p style="margin-bottom: 1.5em">LFS.</p>
   <p>-<a href="roster.php?function=Search&user_id=1411">Andrew Cai (JS)</a></p>
</div>

<?php if ($g_user->is_logged_in()): ?>
<div class="newsItem">
	<h2>CM6</h2>
	<p class="date">November 5, 2013</p>
	<p style="margin-bottom: 1.5em">Nominations went by quickly and efficiently.</p>
	<p style="margin-bottom: 1.5em"><a href="/documents/fa13/CM6.rar">Slides and Minutes.</a></p>
	<p style="margin-bottom: 1.5em"><a href="#">Slideshow!</a></p>
   <p>-<a href="roster.php?function=Search&user_id=1411">Andrew Cai (JS)</a></p>
</div>
<?php endif ?>

<div class="newsItem">
    <h2>Congratulations to GG Maniac, Ben Le</h2>
    <p class="date">November 5, 2013</p>
    <img src="/documents/fa13/ggmaniac4.jpg" width=300 style="border:1px solid black"/></a><br><br>
    <p style="margin-bottom: 1.5em">Ben pledged KS semester and was Admin VP as well as continuing to contribute to the chapter as webmaster and developing a new Ruby on Rails mobile-compatible website.</p>
    <p style="margin-bottom: 1.5em">Congratulations Ben!</p>
    <p>-<a href="roster.php?function=Search&user_id=1411">Andrew Cai (JS)</a></p>
</div>

<div class="newsItem">
	<h2>POTW #4</h2>
	<p class="date">October 27, 2013</p>
	<img src="/documents/fa13/potw4.jpg" width=300 style="border:1px solid black"/></a><br><br>
	<p style="margin-bottom: 1.5em">Hue hue hue.</p>
   <p>-<a href="roster.php?function=Search&user_id=1411">Andrew Cai (JS)</a></p>
</div>

<?php if ($g_user->is_logged_in()): ?>
<div class="newsItem">
	<h2>CM5</h2>
	<p class="date">October 27, 2013</p>
	<p style="margin-bottom: 1.5em"><a href="/documents/fa13/CM5.rar">Slides and Minutes.</a></p>
	<br />
	<iframe width="420" height="315" src="//www.youtube.com/embed/RErmzafrAEA" frameborder="0" allowfullscreen></iframe>
   <p>-<a href="roster.php?function=Search&user_id=1411">Andrew Cai (JS)</a></p>
</div>
<?php endif ?>

<div class="newsItem">
	<h2>POTW #3</h2>
	<p class="date">October 27, 2013</p>
	<img src="/documents/fa13/potw3.jpg" width=300 style="border:1px solid black"/></a><br><br>
	<p style="margin-bottom: 1.5em">KK represent!</p>
   <p>-<a href="roster.php?function=Search&user_id=1411">Andrew Cai (JS)</a></p>
</div>

<div class="newsItem">
    <h2>Congratulations to GG Maniac, Zachary Lee</h2>
    <p class="date">October 24, 2013</p>
    <img src="/documents/fa13/ggmaniac3.jpg" width=300 style="border:1px solid black"/></a><br><br>
    <p style="margin-bottom: 1.5em">Zachary pledged GL semester and has been a long-standing member of this chapter and contributed as IC Chair, Alumni Relations Chair, Sergeant-at-Arms, just to name a few.</p>
    <p style="margin-bottom: 1.5em">Please help us in congratulating him!</p>
    <p>-<a href="roster.php?function=Search&user_id=1411">Andrew Cai (JS)</a></p>
</div>

<?php if ($g_user->is_logged_in()): ?>
<div class="newsItem">
	<h2>CM4</h2>
	<p class="date">October 10, 2013</p>
	<p style="margin-bottom: 1.5em"><a href="/documents/fa13/CM4.rar">Slides and Minutes.</a></p>
	<p style="margin-bottom: 1.5em"><a href="http://www.vimeo.com/76535729">Annie has really outdone herself this time. Without a doubt the best slideshow I've seen any Historian make!</a></p>
   <p>-<a href="roster.php?function=Search&user_id=1411">Andrew Cai (JS)</a></p>
</div>
<?php endif ?>

<div class="newsItem">
	<h2>Photo of the Week #2</h2>
	<p class="date">September  26, 2013</p>
	<img src="/documents/fa13/potw2.jpg" width=300 style="border:1px solid black"/></a><br><br>
	<p style="margin-bottom: 1.5em">Lovely.</p>
   <p>-<a href="roster.php?function=Search&user_id=1411">Andrew Cai (JS)</a></p>
</div>

<div class="newsItem">
    <h2>Congratulations to GG Maniac, Kevin Nguyen</h2>
    <p class="date">September  26, 2013</p>
    <img src="/documents/fa13/ggmaniac2.jpg" width=300 style="border:1px solid black"/></a><br><br>
    <p style="margin-bottom: 1.5em">Kevin pledged KK semester and has been actively contributing to the chapter as Active Retreat, IC, and GG Sports Chair.</p>
    <p style="margin-bottom: 1.5em">Please help us in congratulating him!</p>
    <p>-<a href="roster.php?function=Search&user_id=1411">Andrew Cai (JS)</a></p>
</div>

<?php if ($g_user->is_logged_in()): ?>
<div class="newsItem">
    <h2>CM3 Recap</h2>
    <p class="date">September  26, 2013</p>
    <p style="margin-bottom: 1.5em">This week's CM passed remarkably fast as we passed a groundbreaking ammendment to the Bylaws.</p>
    <p style="margin-bottom: 1.5em">For more information download the slideshow and minutes <a href="/documents/fa13/CM3.rar">here</a>.</p>
    <iframe width="420" height="315" src="//www.youtube.com/embed/b72MJSMaQuQ" frameborder="0" allowfullscreen></iframe>
    <br><br>
    <p>-<a href="roster.php?function=Search&user_id=1411">Andrew Cai (JS)</a></p>
</div>
<?php endif ?>

<div class="newsItem">
	<h2>Photo of the Week</h2>
	<p class="date">September  25, 2013</p>
	<img src="/documents/fa13/potw1.jpg" width=300 style="border:1px solid black"/></a><br><br>
	<p style="margin-bottom: 1.5em">No comment.</p>
   <p>-<a href="roster.php?function=Search&user_id=1411">Andrew Cai (JS)</a></p>
</div>

<div class="newsItem">
    <h2>Congratulations to GG Maniac, Sridatta Thatipamala</h2>
    <p class="date">September  19, 2013</p>
    <img src="/documents/fa13/ggmaniac1.jpg" width=300 style="border:1px solid black"/></a><br><br>
    <p style="margin-bottom: 1.5em">Sridatta pledged KK semester and has been very active in contributing to the chapter as Rush and Fundraising Chair and plans on bigging this semester.</p>
    <p style="margin-bottom: 1.5em">Please help us in congratulating him!</p>
    <p>-<a href="roster.php?function=Search&user_id=1411">Andrew Cai (JS)</a></p>
</div>

<?php if ($g_user->is_logged_in()): ?>
<div class="newsItem">
	<h2>CM2 Recap</h2>
    <p class="date">September 17, 2013</p>
    <p style="margin-bottom: 1.5em">
	Although we did not have quorum, some interesting proposals were put to the table. Look forward to voting on them next week!<br><br>
	For brothers who have not attended CM, please peruse the following:<br>
	<a href="https://docs.google.com/document/d/1DrHNeue9H06_0BD9PJOdHrxwxx1Jp0RuM8-uL-OneUE/edit">Proposed Amendment to Bylaws</a><br>
	<a href="https://docs.google.com/document/d/1WlyzUq4KMwBf9L2VK3FGODXsV7F0CWBzz4AyJvG5CQY/edit">Appeals Form</a><br>
	To download the slides and minutes, click <a href="/CM-documents/CM2-Slides-Minutes.rar">here</a>.
    </p>
    <p style="margin-bottom: 1.5em">
	   CM2 Slideshow!
    </p>
    <iframe width="420" height="315" src="//www.youtube.com/embed/wBMK7fOKYoM" frameborder="0" allowfullscreen></iframe>
    <br>
    <p>-<a href="profile.php?user_id=1411">Andrew Cai (JS)</a></p>
</div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
<div class="newsItem">
	<h2>CM1 Slides & Minutes</h2>
    <p class="date">September 5, 2013</p>
    <p style="margin-bottom: 1.5em">
	To download the slides and minutes, click <a href="/CM-documents/CM1-Slides-Minutes.rar">here</a>.
    </p>
    <p style="margin-bottom: 1.5em">
	   CM1 Slideshow!
    </p>
    <iframe width="480" height="360" src="//www.youtube.com/embed/UDp8nnf2dSs" frameborder="0" allowfullscreen></iframe>
    <br>
    <p>-<a href="profile.php?user_id=1411">Andrew Cai (JS)</a></p>
</div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
<div class="newsItem">
	<h2>Fall 2013 Budget & Requirements</h2>
    <p class="date">August 29, 2013</p>
    <p style="margin-bottom: 1.5em">
	Actives! Please stay informed with the new business in preparation for CM1 by reading the documents below.
    </p>
    <p style="margin-bottom: 1.5em">
      <a href="https://docs.google.com/spreadsheet/ccc?key=0AjUhxDpscmUidFF4dkNaT1ZYMnkycTV6WVBPYUVZWGc#gid=0">Budget</a>
      <br><a href="https://docs.google.com/document/d/1pmGOF1Ja128ECRnmLO7rBmrHrEYV3rP566blgA1l89U/edit">Active Requirements</a>
      <br><a href="https://docs.google.com/document/d/14XHz9QJ3SSrlqM-O1ZLvm8R_ZnkrPzVIjE27RSM5eME/edit">Pledge Requirements</a>
    </p>
    <p style="margin-bottom: 1.5em">See you at CM!</p>
    <p>-<a href="profile.php?user_id=1411">Andrew Cai (JS)</a></p>
</div>
<?php endif ?>

<a href="news_sp13.php">Older News ></a>
<?php
Template::print_body_footer();
Template::print_disclaimer();
?>

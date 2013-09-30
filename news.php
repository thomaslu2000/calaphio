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
<!--
<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>

<div class="newsItem">
	<h2>CM3 Documents</h2>
    <p class="date">September 26, 2013</p>

<div class="newsItem">
	<h2>Fall 2013 Budget + Proposed Bylaws Amendment</h2>
    <p class="date">August 29, 2013</p>
    <p style="margin-bottom: 1.5em">Budget: <a></a><br>Amendment: <a></a>
    <p style="margin-bottom: 1.5em"><strong>tl;dr</strong> Points of Interest:
       <ul>
		<li>Active Dues - $50 before CM4, $60 before CM5, $70 before CM7</li>
		<li>Rush - Attend 1 Pre-Recruitment Workshop</li>
		<li>If a pledge does not cross, he or she "may file an appeal for Active Membership".</li>
		<li>The appeal must contain a personal statement and explanation as well as "support and signatures" from three Active brothers and three fellow pledge brothers, all of whom must have crossed and one may be from a cosib.</li>
		<li>Two rounds of evaluation: the first round, ExComm serves as an advisory board to PComm with a necessary two-thirds majority; if a majority is not reached, the second round of evaluation takes place with both ExComm and PComm voting for a two-thirds majority.
       </ul>
    </p>
    <p>-<a href="roster.php?function=Search&user_id=1411">Andrew Cai (JS)</a></p>
</div>	

<?php endif ?>
-->

<?php if (!$g_user->is_logged_in()): ?>
<div class="newsItem">
	<h2>Rush Alpha Phi Omega!</h2>
	<p class="date">September 8, 2013</p>
	<p style="margin-bottom: 1.5em">
	Leadership. Friendship. Service. Interested in pledging Alpha Phi Omega? Head over to <a href="http://rush.calaphio.com">rush.calaphio.com</a>
	</p>
	<p>-<a href="profile.php?user_id=1411">Andrew Cai (JS)</a></p>
</div>

<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>

<div class="newsItem">
	<h2>Photo of the Week</h2>
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

<div class="newsItem">
    <h2>CM3 Recap</h2>
    <p class="date">September  26, 2013</p>
    <p style="margin-bottom: 1.5em">This week's CM passed remarkably fast as we passed a groundbreaking ammendment to the Bylaws.</p>
    <p style="margin-bottom: 1.5em">For more information download the slideshow and minutes <a href="/documents/fa13/CM3.zip">here</a>.</p>
    <iframe width="420" height="315" src="//www.youtube.com/embed/b72MJSMaQuQ" frameborder="0" allowfullscreen></iframe>
    <br><br>
    <p>-<a href="roster.php?function=Search&user_id=1411">Andrew Cai (JS)</a></p>
</div>

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

<div class="newsItem">
	<h2>CM2 Recap</h2>
    <p class="date">September 17, 2013</p>
    <p style="margin-bottom: 1.5em">
	Although we did not have quorum, some interesting proposals were put to the table. Look forward to voting on them next week!<br><br>
	For brothers who have not attended CM, please peruse the following:<br>
	<a href="https://docs.google.com/document/d/1DrHNeue9H06_0BD9PJOdHrxwxx1Jp0RuM8-uL-OneUE/edit">Proposed Amendment to Bylaws</a><br>
	<a href="https://docs.google.com/document/d/1WlyzUq4KMwBf9L2VK3FGODXsV7F0CWBzz4AyJvG5CQY/edit">Appeals Form</a><br>
	To download the slides and minutes, click <a href="/CM-documents/CM2-Slides-Minutes.zip">here</a>.
    </p>
    <p style="margin-bottom: 1.5em">
	   CM2 Slideshow!
    </p>
    <iframe width="420" height="315" src="//www.youtube.com/embed/wBMK7fOKYoM" frameborder="0" allowfullscreen></iframe>
    <br>
    <p>-<a href="profile.php?user_id=1411">Andrew Cai (JS)</a></p>
</div>


<div class="newsItem">
	<h2>CM1 Slides & Minutes</h2>
    <p class="date">September 5, 2013</p>
    <p style="margin-bottom: 1.5em">
	To download the slides and minutes, click <a href="/CM-documents/CM1-Slides-Minutes.zip">here</a>.
    </p>
    <p style="margin-bottom: 1.5em">
	   CM1 Slideshow!
    </p>
    <iframe width="480" height="360" src="//www.youtube.com/embed/UDp8nnf2dSs" frameborder="0" allowfullscreen></iframe>
    <br>
    <p>-<a href="profile.php?user_id=1411">Andrew Cai (JS)</a></p>
</div>


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

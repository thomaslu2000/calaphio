<?php
require("include/includes.php");
require("include/Calendar.class.php");
require("include/Template.class.php");// require("include/Shoutbox.class.php");
require("include/EvalNag.class.php");
Template::print_head(array("site.css", "calendar.css", "excel.css"));
Template::print_body_header('Home', 'NEWS');

$evalnag = new EvalNag();
echo $evalnag->display("2007-01-01");
// $shoutbox = new Shoutbox();// $shoutbox->process();
// echo $shoutbox->display();

Calendar::print_upcoming_events(5);

$g_user->process_mailer(false);
$g_user->print_mailer(false);
$g_user->print_personal_messages();

if (!$g_user->is_logged_in()) {
	echo '<img style="float: right" src="images/lfs_banner.png" alt="LFS" />';
}
?>

<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
	<div class="newsItem">
		<h2>Literary Magazine: Digital Redux</h2>
		<p class="date">May 21, 2009</p>
		<p style="margin-bottom: 1.5em">The digital edition of the ST Literary Magazine (LitMag) is now ready for release:</p>
		<p style="margin-bottom: 1.5em">
	        <a href="documents/sp09/st_digital_litmag.pdf">LitMag - Digital Edition</a><br />
		</p>
        <p style="margin-bottom: 1.5em">Enjoy! And may all of you have a wonderful summer!</p>
		<p>-<a href="roster.php?function=Search&user_id=875">Justin Abantao (CC)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
	<div class="newsItem">
		<h2>Fall 2009 Pledge Committee</h2>
		<p class="date">May 17, 2009</p>
		<p style="margin-bottom: 1.5em">Congratulations to the new Pcomm!</p>
		<p style="margin-bottom: 1.5em">
			<b>Leadership Trainers</b> - Alison Carbonel, Sitong Peng<br />
	        <b>Fellowship Trainers</b> - Kim Saelee, Samantha Paras<br />
	        <b>Finance Trainers</b> - Janet Chau, Karen He<br />
	        <b>Service Trainer</b> - Courtney McLaughlin<br />
	        <b>Historian Trainer</b> - Anna Yee<br />
	        <b>Administrative Trainer</b> - Richard Tam<br />
		</p>
		<p>-<a href="roster.php?function=Search&user_id=899">David Jiang (CC)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
	<div class="newsItem">
		<h2>Aaand that's a wrap!</h2>
		<p class="date">May 16, 2009</p>
		<p style="margin-bottom: 1.5em">Still need more APhiO? Here's some minutes you could read. =]</p>
		<p style="margin-bottom: 1.5em">
			<a href="documents/sp09/endofsemesterforum_minutes.doc">End-of-Semester Chapter Forum Minutes</a><br />
			<a href="documents/sp09/excomm8_minutes.docx">Excomm 8 Minutes</a><br />
			<a href="documents/sp09/cm8_minutes.docx">CM8 Minutes</a><br />
		</p>
		<p style="margin-bottom: 1.5em">Good luck with finals, and see you all next semester!</p>
		<p>-<a href="roster.php?function=Search&amp;user_id=600">Geoffrey Lee (GAS)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
	<div class="newsItem">
		<h2>Fall 2009 Executive Committee</h2>
		<p class="date">April 22, 2009</p>
		<p style="margin-bottom: 1.5em">Congratulations to NexComm!</p>
		<p style="margin-bottom: 1.5em">
		<b>President</b> - Francesca Wang<br />
	        <b>Administrative VP</b> - Justin Abantao<br />
	        <b>Membership VP</b> - Jae Wong<br />
	        <b>Service VP</b> - Laura Lim<br />
	        <b>Finance VP</b> - Beckie Siu<br />
	        <b>Fellowship VP</b> - Michael Cheng<br />
	        <b>Pledgemaster</b> - Julie Truong<br />
	        <b>Historian</b> - Mary Cheung<br />
		</p>
		<p>-<a href="roster.php?function=Search&user_id=979">Samantha Paras (WK)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
	<div class="newsItem">
		<h2><i>Sandali</i>!</h2>
		<p class="date">April 22, 2009</p>
		<p style="margin-bottom: 1.5em">I have your minutes!<br /><br />
			<a href="documents/sp09/cm5_minutes.doc">CM5 Minutes</a><br />
			<a href="documents/sp09/cm7_minutes.docx">CM7 Minutes</a><br />
		</p>
		<p>-<a href="roster.php?function=Search&amp;user_id=979">Samantha Paras (WK)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
	<div class="newsItem">
		<h2>Election Platforms!</h2>
		<p class="date">April 17, 2009</p>
		<p style="margin-bottom: 1.5em">Brothers, I have posted <a href="sp09platforms.php">Election Platforms</a> on this website. If you wish to display your platform online, please e-mail me.</p> 
		<p style="margin-bottom: 1.5em">
		UPDATE 4/17, 1:58am: Added Julie Truong's platform for Pledgemaster.<br />
		</p>
		<p style="margin-bottom: 1.5em">
		UPDATE 4/19, 6:27pm: Added Diny Huang's platform for Administrative VP. -<a href="roster.php?function=Search&amp;user_id=600">geofflee</a><br />
		</p>
		<p>-<a href="roster.php?function=Search&user_id=899">David Jiang (CC)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
	<div class="newsItem">
		<h2>Active Spotlight!</h2>
		<p class="date">April 9, 2009</p>
		<p style="margin-bottom: 1.5em"><img src="images/2009_spring_activespotlight2.jpg" alt="Active Spotlight - Janet Chau" /></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
	<div class="newsItem">
		<h2>Got a Minute? for Photobucket that is..</h2>
		<p class="date">April 8, 2009</p>
		<p style="margin-bottom: 1.5em">
			<a href="documents/sp09/excomm6_minutes.doc">ExComm 6 Minutes</a><br />
			<a href="documents/sp09/cm6_minutes.doc">CM6 Minutes</a><br />
		        <a href="documents/sp09/excomm5_minutes.doc">ExComm 5 Minutes</a><br />
				CM 5 Minutes (to be uploaded)<br />
			  <a href="documents/sp09/midsemesterforum_minutes.doc">Midsemester Forum Minutes</a><br /><br />
		  		Anddd.. We have another Photobucket!<br />
		  	  <a href="http://www.photobucket.com/">Photobucket</a><br />
		  		The Login and Password are... apo_st09
		</p>
		<p>-<a href="roster.php?function=Search&amp;user_id=957">Sitong Peng (WK)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
	<div class="newsItem">
		<h2>Your Minutes, Sir</h2>
		<p class="date">March 8, 2009</p>
		<p style="margin-bottom: 1.5em">
			<a href="documents/sp09/excomm4_minutes.doc">ExComm 4 Minutes</a><br />
			<a href="documents/sp09/cm4_minutes.doc">CM4 Minutes</a><br />

		</p>
		<p>-<a href="roster.php?function=Search&amp;user_id=600">Geoffrey Lee (GAS)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
	<div class="newsItem">
		<h2>Photobucket Info</h2>
		<p class="date">February 23, 2009</p>

		<p style="margin-bottom: 1.5em">
		  Don't forget to upload your pictures into our Photobucket account!<br /><br />
		  <a href="http://www.photobucket.com/">Photobucket</a><br />
		  Login and Password: apo_s09
	   </p>
		<p>-<a href="roster.php?function=Search&user_id=979">Samantha Paras (WK)</a></p>
	</div>

<?php endif ?>

<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
	<div class="newsItem">
		<h2>Active Spotlight!</h2>
		<p class="date">February 19, 2009</p>
		<p style="margin-bottom: 1.5em"><img src="images/2009_spring_activespotlight1.jpg" alt="Active Spotlight - Mary Cheung" /></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
	<div class="newsItem">

		<h2>Moarrr admin lovin!!</h2>
		<p class="date">February 19, 2009</p>
		<p style="margin-bottom: 1.5em">
			<a href="documents/sp09/cm1_minutes.doc">CM1 Minutes</a><br />
			<a href="documents/sp09/excomm2_minutes.doc">ExComm 2 Minutes</a><br />
			<a href="documents/sp09/cm2_minutes.doc">CM2 Minutes</a><br />

			<a href="documents/sp09/excomm3_minutes.doc">ExComm 3 Minutes</a><br />
			<a href="documents/sp09/cm3_minutes.doc">CM3 Minutes</a>
		</p>
<?php if (!$g_user->is_pledge()): ?>
		<p style="margin-bottom: 1.5em">And in case you forgot what family you're in, here's <a href="documents/sp09/families.xls">the list</a>.</p>
<?php endif; ?>
		<p>-<a href="roster.php?function=Search&amp;user_id=600">Geoffrey Lee (GAS)</a></p>

	</div>
<?php endif ?>

	<div class="newsItem">
		<h2>Spring 2009 Namesake Honoree - Sheehan Tejamo</h2>
		<p class="date">January 21, 2009</p>
		<p style="margin-bottom: 1.5em">
			Congratulations to Sheehan Tejamo, our Spring 2009 Namesake! She pledged Gamma Gamma during the TW semester and has served various positions in our chapter such as Service VP, MLN Finance Trainer, and acting as Big Family Parent multiple times. Thank you Sheehan, for all you have done for our chapter.
		</p>

		<p>-<a href="roster.php?function=Search&user_id=979">Samantha Paras (WK)</a></p>
	</div>

<a href="news_fa08.php">Older News ></a>
<?php
Template::print_body_footer();
Template::print_disclaimer();
?>
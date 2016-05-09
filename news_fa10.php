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

<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>Spring 2011 Pledge Committee</h2>
		<p class="date">December 9, 2010</p>
		<p style="margin-bottom: 1.5em">Congratulations to the members of the Spring 2011 Pledge Committee:</p>
		<p style="margin-bottom: 1.5em">
	    <b>Leadership Trainers</b> - Anthony Chiang & Stanley Cheng<br />
	        <b>Fellowship Trainers</b> - Armand Cuevas & Paulo Salta<br />
			<b>Service Trainer</b> - Tomomasa Terazaki<br />
	        <b>Finance Trainers</b> - Mark Donangelo & Pearl Ho<br />
	        <b>Administrative Trainer</b> - Connie Yang<br />
	        <b>Historian Trainer</b> - Janice Cho<br />
		</p>
		<p>-<a href="roster.php?function=Search&user_id=875">Justin Abantao (CC)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>Spring 2011 Executive Committee</h2>
		<p class="date">November 17, 2010</p>
		<p style="margin-bottom: 1.5em">Congratulations to the elected members of the Spring 2011 Executive Committee:</p>
		<p style="margin-bottom: 1.5em">
		<b>President</b> - Courtney McLaughlin<br />
	        <b>Administrative VP</b> - Edward Ho<br />
	        <b>Membership VP</b> - Vera Sun<br />
	        <b>Service VP</b> - Dominic Tsang<br />
	        <b>Finance VP</b> - Michelle Chen<br />
	        <b>Fellowship VP</b> - Christopher Nguyen<br />
	        <b>Pledgemaster</b> - Gloria Wu<br />
	        <b>Historian</b> - Annie Lin<br />
		</p>
		<p>-<a href="roster.php?function=Search&user_id=875">Justin Abantao (CC)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>Read me</h2>
		<p class="date">November 16, 2010</p>
		<p style="margin-bottom: 1.5em">Your fellow brothers have submitted their <a href="fa10platforms.php">Fall 2010 ExComm Election Platforms</a>. Please show them respect by reviewing their platforms carefully so that you may be an informed voter.</p>
		<p>-<a href="roster.php?function=Search&user_id=600">Geoffrey Lee (GAS)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>Spring 2011 ExComm Nominations</h2>
		<p class="date">November 4, 2010</p>
		<p style="margin-bottom: 1.5em">Click <a href="https://spreadsheets.google.com/ccc?key=0Arf8RzNCJX7vdENDVkItWUExUm1DUnZ1TzNCdUNvNUE&hl=en&authkey=CKOVuYwI">HERE</a> to view the list of nominations for the Spring 2011 Executive Committee.
		</p>
		<p style="margin-bottom: 1.5em">A position on ExComm is a high honor and privilege within the fraternity, and I encourage all nominees to seriously consider their candidacy. To all nominees: please remember to submit your platform to the <a href="mailto:apogg-webmasters@googlegroups.com">webmasters</a> well before Elections.<br />
		</p>
		<p>-<a href="roster.php?function=Search&user_id=875">Justin Abantao (CC)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>Fall 2010 Budget</h2>
		<p class="date">October 26, 2010</p>
		<p style="margin-bottom: 1.5em">Click <a href="/documents/fa10/fa10_budget.pdf">HERE</a> to view the Fall 2010 budget, including projected expenses and revenue.<br />
		</p>
		<p>-<a href="roster.php?function=Search&user_id=875">Justin Abantao (CC)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
	<div class="newsItem">
		<h2>Shhhh… this is a secret. Don't tell pledges!</h2>
		<p class="date">October 22, 2010</p>
		<p style="margin-bottom: 1.5em">Hey <strong>actives</strong>, upload your photos here:</p>
		<p style="margin-bottom: 1.5em">
			<a href="http://www.smugmug.com">http://www.smugmug.com</a><br />
			Email: admin-vp@calaphio.com<br />
			Password: GammaGamma10
		</p>
		<p style="margin-bottom: 1.5em;">And tell <strong>pledges</strong> to upload to Photobucket:</p>
		<p style="margin-bottom: 1.5em;">
			<a href="http://www.photobucket.com">http://www.photobucket.com</a><br />
			Username: JLCFall2010<br />
			Password: PledgeClassPhotos
		</p>
		<p>-<a href="roster.php?function=Search&user_id=600">Geoffrey Lee (GAS)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>Minutes Thus Far</h2>
		<p class="date">October 12, 2010</p>
		<p style="margin-bottom: 1.5em">Below are minutes from Chapter meetings and ExComm meetings thus far in the semester:<br /><br />
		<b>Chapter Meetings:</b><br />
			<a href="/documents/fa10/cm1.pdf">CM 1</a> (8/31)<br />
			<a href="/documents/fa10/cm2.pdf">CM 2</a> (9/7)<br />
			<a href="/documents/fa10/cm3.pdf">CM 3</a> (9/21)<br />
			<a href="/documents/fa10/cm4.pdf">CM 4</a> (10/5)<br /><br />
		<b>ExComm Meetings:</b><br />
			<a href="/documents/fa10/excomm_cm1.pdf">ExComm - CM 1</a> (6/4)<br />
			<a href="/documents/fa10/excomm_cm3.pdf">ExComm - CM 3</a> (9/19)<br />
			<a href="/documents/fa10/excomm_cm4.pdf">ExComm - CM 4</a> (10/3)<br />
		</p>
		<p>-<a href="roster.php?function=Search&user_id=875">Justin Abantao (CC)</a></p>
	</div>
<?php endif ?>

	<div class="newsItem">
		<h2>Welcome Pledges!</h2>
		<p class="date">September 24, 2010</p>
		<p style="margin-bottom: 1.5em">Welcome to the JLC pledge class and to a new semester with APO! Our Fall 2010 namesake honoree is James L. Chandler. Be sure to read his bio on the <a href="http://www.apo.org/site/site_files/Torch_Topics/2010namesake_chandler.pdf">national website</a>!</p>
		<p>-<a href="roster.php?function=Search&amp;user_id=875">Justin Abantao (CC)</a></p>
	</div>

<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>Fall 2010 Pledge Committee</h2>
		<p class="date">May 9, 2010</p>
		<p style="margin-bottom: 1.5em">Congratulations to the members of the Fall 2010 Pledge Committee:</p>
		<p style="margin-bottom: 1.5em">
	    <b>Leadership Trainers</b> - Bonnie Lee & Tram-Anh Pham<br />
	        <b>Fellowship Trainers</b> - Christine Vu & Vera Sun<br />
			<b>Service Trainer</b> - Cherry Nguyen<br />
	        <b>Finance Trainers</b> - Michelle Chen & Edward Ho<br />
	        <b>Administrative Trainer</b> - Vanessa Lam<br />
	        <b>Historian Trainer</b> - Mindy Chuang<br />
		</p>
		<p>-<a href="roster.php?function=Search&user_id=875">Justin Abantao (CC)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>Fall 2010 Executive Committee</h2>
		<p class="date">April 14, 2010</p>
		<p style="margin-bottom: 1.5em">Congratulations to the elected members of the Fall 2010 Executive Committee:</p>
		<p style="margin-bottom: 1.5em">
		<b>President</b> - Andy Chau<br />
	        <b>Administrative VP</b> - Hobart Lai<br />
	        <b>Membership VP</b> - Fanny Lee<br />
	        <b>Service VP</b> - Courtney McLaughlin<br />
	        <b>Finance VP</b> - Samuel Blanchard<br />
	        <b>Fellowship VP</b> - Sabrina Cheng<br />
	        <b>Pledgemaster</b> - Alison Carbonel<br />
	        <b>Historian</b> - Jennifer Hung<br />
		</p>
		<p>-<a href="roster.php?function=Search&user_id=875">Justin Abantao (CC)</a></p>
	</div>
<?php endif ?>

<a href="news_sp10.php">Older News ></a>
<?php
Template::print_body_footer();
Template::print_disclaimer();
?>

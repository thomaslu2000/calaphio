<?php
require("include/includes.php");
require("include/Calendar.class.php");
require("include/Template.class.php");
require("include/Shoutbox.class.php");
require("include/EvalNag.class.php");
Template::print_head(array("site.css", "calendar.css", "excel.css"));
Template::print_body_header('Home', 'NEWS');

$evalnag = new EvalNag();
echo $evalnag->display("2007-01-01");

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
		<h2>GG Maniac #7</h2>
		<p class="date">April 24, 2012</p>
		<p style="margin-bottom: 1.5em">Please congratulate <b>Robert Yu</b> for winning GG Maniac!<br><br>

		Robert is a Carpe Noctem Big, and he did a lot of work this semester as Rush Chair, Sergeant-at-Arms, and Talent Show Chair. Congratulations, Robert!<br><br>

		<img src="/documents/sp12/ggmaniac7.jpg" width=250 style="border:1px solid black"><br>

		</p>
		<p>-<a href="roster.php?function=Search&user_id=1324">Victor Chang (CPZ)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>Notes from CM8</h2>
		<p class="date">April 24, 2012</p>
		<p style="margin-bottom: 1.5em">Here are the documents from CM8, the final CM of the semester!<br><br>

		<a href="/documents/sp12/minutes_cm8.pdf">CM8 Minutes</a><br>
		<a href="/documents/sp12/minutes_excomm8.pdf">ExComm Meeting 8 and End of Semester Forum Minutes</a><br>
		<a href="http://www.youtube.com/watch?v=kB2irmVVIVE&feature=youtu.be">CM8 Slideshow!</a><br>
		</p>
		<p>-<a href="roster.php?function=Search&user_id=1324">Victor Chang (CPZ)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>GG Maniac #6</h2>
		<p class="date">April 11, 2012</p>
		<p style="margin-bottom: 1.5em">Please congratulate <b>Peggy Wu</b> for winning GG Maniac!<br><br>

		Peggy Wu was an outstanding pledge last semester and is really involved as a Doggy Style big this semester. On top of doing over 90 service hours this semester already, she is doing a great job as MVP Assistant and Banquet Chair. Congrats, Peggy!<br><br>

		<img src="/documents/sp12/ggmaniac6.jpg" width=250 style="border:1px solid black"><br>

		</p>
		<p>-<a href="roster.php?function=Search&user_id=1077">Edward Ho (JM)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>Notes from CM7</h2>
		<p class="date">April 11, 2012</p>
		<p style="margin-bottom: 1.5em">Here are the documents from CM7!<br><br>

		<a href="/documents/sp12/minutes_cm7.pdf">CM7 Minutes</a><br>
		<a href="/documents/sp12/minutes_excomm7.pdf">ExComm Meeting 7</a><br>
		<a href="/documents/sp12/stylus_cm7.pdf">CM7 Stylus</a><br>
		<a href="http://youtu.be/0XwpFa9MIBM">CM7 Slideshow!</a><br><br>
		
		<b>Caption Contest</b> [<a href="mailto:stylus@calaphio.com?subject=CM7 Caption">submit stylus@calaphio.com</a>]<br><br>
		<img src="/documents/sp12/CC7.jpg" width=250 style="border:1px solid black"></a>
		
		
		</p>
		<p>-<a href="roster.php?function=Search&user_id=1077">Edward Ho (JM)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>Fall 2012 Executive Committee</h2>
		<p class="date">April 11, 2012</p>
		<p style="margin-bottom: 1.5em">Congratulations to the elected members of the Fall 2012 Executive Committee:</p>
		<p style="margin-bottom: 1.5em">
		<b>President</b> - Stanley Cheng<br />
		<b>Service VP</b> - Joseph Kao<br />
		<b>Pledgemaster</b> - Celina Zeng<br />
	        <b>Administrative VP</b> - Benjamin Le<br />
	        <b>Membership VP</b> - Yong Yu Xie<br />
	        <b>Finance VP</b> - Jamie Hum<br />
	        <b>Fellowship VP</b> - Robert Yu<br />     
	        <b>Historian</b> - Daisy Chan<br />
		</p>
		<p>-<a href="roster.php?function=Search&user_id=1077">Edward Ho (JM)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>Please Read: Spring 2012 Election Platforms</h2>
		<p class="date">April 9, 2012</p>
		<p style="margin-bottom: 1.5em">Your fellow brothers have submitted their <a href="sp12platforms.php">Spring 2012 ExComm Election Platforms</a>. Please show them respect by reviewing their platforms carefully so that you may be an informed voter. The deadline to submit platforms will be at <font color=red><b>11:00 AM ON APRIL 10TH</b></font>. <br>
		<br>
		Update: Please <b>RE</b>submit your election platform to <a href="mailto:admin-vp@calaphio.com, victorchang91@gmail.com, edhuoho@gmail.com?subject=Election Platform">admin-vp@calaphio.com, webmasters</a> if you don't see your platform here.<br>
		<br>
		<font color="red">April, 10 UPDATED</font>: Added Celina Zeng's platform for Pledgemaster<br>
		<font color="red">April, 10 UPDATED</font>: Added Robert Yu's platform for Fellowship VP<br>
		<font color="red">April, 10 UPDATED</font>: Added Joseph Kao's platform for Service VP<br>
		<font color="red">April, 10 UPDATED</font>: Added Benjamin Le's platform for Administrative VP<br>
		<font color="red">April, 9 UPDATED</font>: Added Tony Le's platform for Pledgemaster<br>
		<p>-<a href="roster.php?function=Search&user_id=1077">Edward Ho (JM)</a></p>
	</div>
<?php endif ?>

<a href="news.php">Older News ></a>
<?php
Template::print_body_footer();
Template::print_disclaimer();
?>

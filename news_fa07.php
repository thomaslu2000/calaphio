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
?>
        <img style="float: right" src="images/lfs_banner.png" alt="LFS" />
<?php
}
function print_service_buddy($begin, $end, $posted_date)
{
	global $g_user;
	if ($g_user->is_logged_in()) {
		$service_buddy_begin = date("Y-m-d H:i:s", strtotime($begin));
		$service_buddy_end = date("Y-m-d H:i:s", strtotime($end));
		$subject_begin_date = date("M d", strtotime($begin));
		$subject_end_date = date("M d", strtotime($end));
		$post_date = date("F d, Y", strtotime($posted_date));
		$user_name = $g_user->data['firstname'];
		$query = new Query(sprintf("SELECT firstname, lastname, pledgeclass
			FROM %sservice_buddy
			JOIN %susers ON (buddy_id = %susers.user_id)
			WHERE %sservice_buddy.user_id = %d AND begin = '%s' AND end = '%s'",
			TABLE_PREFIX,
			TABLE_PREFIX, TABLE_PREFIX,
			TABLE_PREFIX, $g_user->data['user_id'], $service_buddy_begin, $service_buddy_end));
		if ($row = $query->fetch_row()) {
			$service_buddy = "<a href=\"roster.php?function=Search&firstname=$row[firstname]&lastname=$row[lastname]&pledgeclass=$row[pledgeclass]\">$row[firstname] $row[lastname] ($row[pledgeclass])</a>";
			echo <<<DOCHERE
		<div class="newsItem">
		<h2>Service Buddy for $subject_begin_date to $subject_end_date!</h2>
		<p class="date">$post_date</p>
		<p>Hi $user_name, your service buddy until the next chapter meeting is $service_buddy. Earn points by attending service projects with your buddy, and the people with the top points will win prizes at banquet! -<a href="roster.php?function=Search&firstname=Geoffrey&lastname=Lee&pledgeclass=GAS">Geoffrey Lee (GAS)</a></p>
		</div>

DOCHERE;
		} else {
			echo <<<HEREDOC
		<div class="newsItem">
		<h2>Service Buddy for $subject_begin_date to $subject_end_date!</h2>
		<p class="date">$post_date</p>
		<p>Hi $user_name, you were not assigned a service buddy. If you wish to have a service buddy, please let me know asap! -<a href="roster.php?function=Search&firstname=Geoffrey&lastname=Lee&pledgeclass=GAS">Geoffrey Lee (GAS)</a></p>
		</div>

HEREDOC;
		}
	}
}
?>
<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()) { ?>
	<div class="newsItem">
		<h2>Administrivia</h2>
		<p class="date">December 5, 2007</p>
		<p style="margin-bottom: 1.5em"><a href="documents/fa07/cm8_minutes.doc">CM8 Minutes</a> are now available. The last CM of the semester. *tear</p>
		<p style="margin-bottom: 1.5em">UPDATE 1/20: Forgot to post <a href="documents/fa07/cm8_minutes.doc">End-of-Semester Chapter Forum Minutes</a>.</p>
		<p>-<a href="roster.php?function=Search&user_id=600">Geoffrey Lee (GAS)</a></p>
	</div>
	<div class="newsItem">
		<h2>Administrivia</h2>
		<p class="date">November 22, 2007</p>
		<p style="margin-bottom: 1.5em"><a href="documents/fa07/cm7_minutes.doc">CM7 Minutes</a> are posted. Gobble gobble.</p>
		<p>-<a href="roster.php?function=Search&user_id=600">Geoffrey Lee (GAS)</a></p>
	</div>
<?php } ?>
	<div class="newsItem">
		<h2>Election Platforms!</h2>
		<p class="date">November 11, 2007</p>
		<p style="margin-bottom: 1.5em">Brothers, I have posted <a href="fa07platforms.php">Election Platforms</a> on this website. If you wish to display your platform online, please e-mail me.</p>
		<p style="margin-bottom: 1.5em">UPDATE 11/12, 4:12pm: Added Jon Lam's platform for President.</p>
		<p style="margin-bottom: 1.5em">UPDATE 11/12, 10:22pm: Added Nick Yap's platform for Pledgemaster.</p>
		<p style="margin-bottom: 1.5em">UPDATE 11/13, 11:50am: Added Francesca Wang's platform for Membership VP.</p>
		<p>-<a href="roster.php?function=Search&user_id=600">Geoffrey Lee (GAS)</a></p>
	</div>
<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()) { ?>
	<div class="newsItem">
		<h2>Administrivia</h2>
		<p class="date">November 5, 2007</p>
		<p style="margin-bottom: 1.5em"><a href="documents/fa07/MidSemesterChapterForum.doc">Mid-Semester Chapter Forum Minutes</a> and <a href="documents/fa07/cm6_minutes.doc">CM6 Minutes</a> are up up up. Good luck with the second wave of midterms!</p>
		<p>-<a href="roster.php?function=Search&user_id=600">Geoffrey Lee (GAS)</a></p>
	</div>
	<div class="newsItem">
		<h2>Administrivia</h2>
		<p class="date">October 27, 2007</p>
		<p style="margin-bottom: 1.5em"><a href="documents/fa07/cm5_minutes.doc">CM5 Minutes</a> are up.</p>
		<p>-<a href="roster.php?function=Search&user_id=600">Geoffrey Lee (GAS)</a></p>
	</div>
	<div class="newsItem">
		<h2>Administrivia</h2>
		<p class="date">October 5, 2007</p>
		<p style="margin-bottom: 1.5em"><a href="documents/fa07/cm4_minutes.doc">CM4 Minutes</a> are now available online.</p>
		<p>-<a href="roster.php?function=Search&user_id=600">Geoffrey Lee (GAS)</a></p>
	</div>
<?php } ?>
	<div class="newsItem">
		<h2>Sectionals!</h2>
		<p class="date">October 2, 2007</p>
		<p style="margin-bottom: 1.5em">Hey hey! Hau made us a wonderful website for Sectionals! Check it out at <a href="http://www.calaphio.com/sectionals">http://www.calaphio.com/sectionals</a> and register for sectionals! The last day for early registration is Oct 6.</p>
		<p>Peace out. -<a href="roster.php?function=Search&user_id=600">Geoffrey Lee (GAS)</a></p>
	</div>
<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()) { ?>
	<div class="newsItem">
		<h2>Administrivia</h2>
		<p class="date">September 21, 2007</p>
		<p style="margin-bottom: 1.5em"><a href="documents/fa07/cm2_minutes.doc">CM2 Minutes</a> and <a href="documents/fa07/cm3_minutes.doc">CM3 Minutes</a> are now available online.</p>
		<p>-<a href="roster.php?function=Search&user_id=600">Geoffrey Lee (GAS)</a></p>
	</div>
	<div class="newsItem">
		<h2>Administrivia</h2>
		<p class="date">September 2, 2007</p>
		<p style="margin-bottom: 1.5em">Hey chapter, our web server has run out of disk space, so I'm going to delay setting up the Fall 2007 photo album until we get this problem fixed.</p>
		<p style="margin-bottom: 1.5em">Also, CM1 minutes have been uploaded: <a href="documents/fa07/cm1_minutes.doc">CM1 Minutes</a>.</p>
		<p style="margin-bottom: 1.5em">Lastly, just as a friendly reminder to everybody, our chapter mailing list is: <a href="mailto:apo@ocf.berkeley.edu">apo@ocf.berkeley.edu</a>.</p>
		<p>That is all. Have a nice day! =) -<a href="roster.php?function=Search&user_id=600">Geoffrey Lee (GAS)</a></p>
	</div>
<?php } ?>
<a href="news_sp07.php">Older News ></a>
<?php
Template::print_body_footer();
Template::print_disclaimer();
?>
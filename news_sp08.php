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
		<p class="date">May 10, 2008</p>
		<p style="margin-bottom: 1.5em">Sigh, that's the last CM (ever) of this school year; it was such a good semester. Here are your <a href="documents/sp08/cm8_minutes.doc">CM8 Minutes</a> and <a href="documents/sp08/EndOfSemesterChapterForum.doc">End-of-Semester Chapter Forum Minutes</a>.</p>
		<p>-<a href="roster.php?function=Search&user_id=600">Geoffrey Lee (GAS)</a></p>
	</div>
	<div class="newsItem">
		<h2>Senior Farewells</h2>
		<p class="date">May 4, 2008</p>
		<p>Alright, so we know it's almost the end of the year and our lovely seniors are graduating! =(</p>
		<p style="margin-bottom: 1.5em;">So why not show your love for them by writing them a nice farewell note on the wonderful memories you had with them or thanking them for all that they have done for you and the chapter. Come on bigs, littles, and parents--let's show them some LOVE! Email me your notes at <a href="mailto:shelleywoo@berkeley.edu">shelleywoo@berkeley.edu</a> by May 7th and they will be published in FunPack. Thanks a bunch!</p>
		<p>Seniors:</p>
		<ul style="list-style: square inside; padding-left: 7px; margin-bottom: 1.5em;">
			<li>Alex Ang</li>
			<li>Jasmine Asuncion</li>
			<li>James Byun</li>
			<li>Mike Chang</li>
			<li>Jeannie Fong</li>
			<li>Constance Ip</li>
			<li>Judy Lai</li>
			<li>Maynard Lam</li>
			<li>Geoffrey Lee</li>
			<li>Vivian Lee-Su</li>
			<li>Jenny Lee</li>
			<li>Helen Louie</li>
			<li>Dennis Mo</li>
			<li>Tuan Pham</li>
			<li>Jennifer Sun</li>
			<li>Linan Sun</li>
			<li>Sheehan Tejamo</li>
			<li>Lynn Wang</li>
			<li>David Wei</li>
			<li>Mei Wu</li>
			<li>Nicholas Yap</li>
			<li>Simon Yee</li>
			<li>Allen Yu</li>
		</ul>
		<p style="margin-bottom: 1.5em;">DON'T FORGET TO BUY YOUR FUNPACKS FROM CHRISTINA LEE FOR ONLY $5! EMAIL HER @ <a href="mailto:christinalee@berkeley.edu">christinalee@berkeley.edu</a>.</p>
		<p>-<a href="roster.php?function=Search&user_id=940">Shelley Woo (CC)</a></p>
	</div>
	<div class="newsItem">
		<h2>Administrivia</h2>
		<p class="date">May 1, 2008</p>
		<p style="margin-bottom: 1.5em;">Better late than never... More minutes for your perusal!</p>
		<ul style="list-style: square inside; padding-left: 7px; margin-bottom: 1.5em;">
			<li><a href="documents/sp08/excomm6_minutes.doc">Excomm 6 Minutes</a>, <a href="documents/sp08/cm6_minutes.doc">CM6 Minutes</a></li>
			<li><a href="documents/sp08/excomm7_minutes.doc">Excomm 7 Minutes</a>, <a href="documents/sp08/cm7_minutes.doc">CM7 Minutes</a></li>
		</ul>
		<p style="margin-bottom: 1.5em;">Btw, I added RSS feeds on the Shoutbox and the Calendar, cause, you know, I press that Refresh button quite often. ;)</p>
		<p>-<a href="roster.php?function=Search&user_id=600">Geoffrey Lee (GAS)</a></p>
	</div>
<?php } ?>
	<div class="newsItem">
		<h2>Buy Your Banquet Tickets Online!</h2>
		<p class="date">April 15, 2008</p>
		<p style="margin-bottom: 1.5em">You're going to banquet, riiight? (You better be, cause there are some awesome people graduating.) So, <a href="shop_sp08.php">buy your banquet tickets online</a> now before prices go up at elections.</p>
		<p style="margin-bottom: 1.5em">EDIT: We didn't realize that the transaction fee was so expensive ($1.08 per person), so we've increased the online price. If you do not want to pay the transaction fee, you may pay Banquet Comm in-person (Debbie, Tracy, and Vivian).</p>
		<p>-<a href="roster.php?function=Search&user_id=600">Geoffrey Lee (GAS)</a></p>
	</div>
<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()) { ?>
	<div class="newsItem">
		<h2>Active Spotlight!</h2>
		<p class="date">April 8, 2008</p>
		<p style="margin-bottom: 1.5em"><img src="images/activespotlight3.jpg" alt="Active Spotlight - Kalvin Van Gaasbeck" /></p>
	</div>
	<div class="newsItem">
		<h2>Administrivia</h2>
		<p class="date">April 3, 2008</p>
		<p style="margin-bottom: 1.5em">You guys missed out on all the fun, so out of our graciousness, the <a href="documents/sp08/MidSemesterChapterForum.doc">Mid-Semester Chapter Forum Minutes</a> are online for you to read!</p>
		<p>-<a href="roster.php?function=Search&user_id=600">Geoffrey Lee (GAS)</a></p>
	</div>
<?php } ?>
	<div class="newsItem">
		<h2>Website Downtime Issues</h2>
		<p class="date">March 30, 2008</p>
		<p style="margin-bottom: 1.5em">I sincerely apologize for the recent spate of chapter website downtime. Since I don't have control of this issue, I have setup a temporary mirror for our chapter website on my personal website until our web-host can fix their problems. You can reach the temporary mirror here: <a href="http://calaphio-mirror.dreamhosters.com">http://calaphio-mirror.dreamhosters.com</a></p>
		<p>-<a href="roster.php?function=Search&user_id=600">Geoffrey Lee (GAS)</a></p>
	</div>
<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()) { ?>
	<div class="newsItem">
		<h2>Administrivia</h2>
		<p class="date">March 20, 2008</p>
		<p style="margin-bottom: 1.5em"><a href="documents/sp08/excomm5_minutes.doc">ExComm Meeting 5 Minutes</a> and <a href="documents/sp08/cm5_minutes.doc">CM5 Minutes</a>, yo.</p>
		<p>-<a href="roster.php?function=Search&user_id=600">Geoffrey Lee (GAS)</a></p>
	</div>
	<div class="newsItem">
		<h2>Administrivia</h2>
		<p class="date">March 4, 2008</p>
		<p style="margin-bottom: 1.5em"><a href="documents/sp08/cm3_minutes.doc">CM3 Minutes</a> and <a href="documents/sp08/cm4_minutes.doc">CM4 Minutes</a> are now available. Also, check out the <a href="documents/sp08/spring_2008_class_schedule.xls">Spring 2008 Class Schedule</a> to find study buddies!</p>
		<p>-<a href="roster.php?function=Search&user_id=600">Geoffrey Lee (GAS)</a></p>
	</div>
	<div class="newsItem">
		<h2>Active Spotlight!</h2>
		<p class="date">March 4, 2008</p>
		<p style="margin-bottom: 1.5em"><img src="images/activespotlight2.jpg" alt="Active Spotlight - Maynard Lam" /></p>
	</div>
	<div class="newsItem">
		<h2>Proposed Constitutional Amendments!</h2>
		<p class="date">February 21, 2008</p>
		<p style="margin-bottom: 1.5em">Hey Brothers, as announced at the last chapter meeting, the Bylaws Committee has proposed changes to our chapter constitution, <a href="documents/sp08/proposed_constitutional_amendments.doc">posted here</a> for your review. This amendment will require an affirmative vote of 3/4 of the Active membership present. You may also view our current <a href="documents/sp08/constitution_nov_2007.doc">chapter constitution</a> and <a href="documents/sp08/bylaws_nov_2007.doc">bylaws</a>. Note that pledges do not have the privilege to vote, but you are all encouraged to voice your opinions when we discuss this motion.</p>
		<p>-<a href="roster.php?function=Search&user_id=600">Geoffrey Lee (GAS)</a></p>
	</div>
	<div class="newsItem">
		<h2>Active Spotlight!</h2>
		<p class="date">February 21, 2008</p>
		<p style="margin-bottom: 1.5em"><img src="images/activespotlight1.jpg" alt="Active Spotlight - Jennifer Hom" /></p>
	</div>
<?php } ?>
	<div class="newsItem">
		<h2>Rush Alpha Phi Omega!</h2>
		<p class="date">February 10, 2008</p>
		<p style="margin-bottom: 1.5em"><a href="pledging.php"><img src="images/rush_flyer_sp08.jpg" alt="Rush Alpha Phi Omega. Welcome to the good life!" /></a></p>
		<p style="margin-bottom: 1.5em"><a href="pledging.php">Click for more information</a></p>
	</div>
	<div class="newsItem">
		<h2>Requirements Posted!</h2>
		<p class="date">February 7, 2008</p>
		<p style="margin-bottom: 1.5em">Hey y'all, so I'm a total dork and forgot to update the requirements page. Anyway, <a href="requirements.php">it's updated now!</a></p>
		<p>-<a href="roster.php?function=Search&user_id=600">Geoffrey Lee (GAS)</a></p>
	</div>
<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()) { ?>
	<div class="newsItem">
		<h2>Administrivia</h2>
		<p class="date">February 2, 2008</p>
		<p style="margin-bottom: 1.5em"><a href="documents/sp08/cm1_minutes.doc">CM1 Minutes</a> and <a href="documents/sp08/cm2_minutes.doc">CM2 Minutes</a> are now available.</p>
		<p>-<a href="roster.php?function=Search&user_id=600">Geoffrey Lee (GAS)</a></p>
	</div>
	<div class="newsItem">
		<h2>Preliminary Budget!</h2>
		<p class="date">January 22, 2008</p>
		<p style="margin-bottom: 1.5em">The <a href="documents/sp08/spring_2008_budget.xls">Spring 2008 Preliminary Budget</a> is up. Go look at it and make sure you have enough money for any projects you're chairing before we vote on it!</p>
		<p>-<a href="roster.php?function=Search&user_id=600">Geoffrey Lee (GAS)</a></p>
	</div>
<?php } ?>
	<div class="newsItem">
		<h2>Website Updates!</h2>
		<p class="date">January 12, 2008</p>
		<p style="margin-bottom: 1.5em">Welcome back! We just finished transferring to our spiffy new web server at <a href="http://www.dreamhost.com">Dreamhost</a>. They are offering awesome free web hosting to us for being a non-profit, so major thanks go out to them for supporting our chapter and the community.</p>
		<p>-<a href="roster.php?function=Search&user_id=600">Geoffrey Lee (GAS)</a></p>
	</div>
<a href="news_fa07.php">Older News ></a>
<?php
Template::print_body_footer();
Template::print_disclaimer();
?>
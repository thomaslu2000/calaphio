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

	<div class="newsItem">
	<h2>Funpack Now Available Online</h2>
	<p class="date">April 17, 2007</p>
	<p>Funpacks are now available to buy online! So go visit the wonderful shop now and get yourself some collated memories. Sorry for the spam!</p>
	<p>-<a href="roster.php?firstname=Hau&lastname=&major=&pledgeclass=&function=Search5">Hau Tran (TT)</a></p>
	</div>
	
	<div class="newsItem">
	<h2>Deadline to buy Banquet Ticket is FAST Approaching! P.S. Buy your Grams too :D</h2>
	<p class="date">April 15, 2007</p>
	<p>Go go go! Banquet Tickets are $40 for actives, alumni, and pledges; $45 for guests and bad-standing actives. Banquet Grams are also now available at the shop! $1 each or $5 for 6. Instructions as to how to submit them are on the shop. Go to Brothers --> Shop. Beware the deadlines:<br>
<b>Banquet Tickets</b>: Midnight, April 17, 2007!<br>
<b>Banquet Gram Submissions</b>: Midnight, April 25, 2007!</p>
<p>Thanks and have a wonderful day ^___^</p>
	<p>-<a href="roster.php?firstname=Hau&lastname=&major=&pledgeclass=&function=Search5">Hau Tran (TT)</a></p>
	</div>
	
	<div class="newsItem">
	<h2>Buy Your Banquet Ticket Online!</h2>
	<p class="date">March 7, 2007</p>
	<p>Hello Gamma Gammas! You can now purchase your banquet ticket online! Just go Brothers --> Shop. You must be logged in :P Also, please don't be turned off by Google Checkout :D It's a wonderful wonderful system. Hurry! Prices go up by $10 on March 21.</p>
	<p>-<a href="roster.php?firstname=Hau&lastname=&major=&pledgeclass=&function=Search5">Hau Tran (TT)</a></p>
	</div>

	<div class="newsItem">
	<h2>ACTIVES!</h2>
	<p class="date">February 9, 2007</p>
	<p>Show up at 6:30PM at 2050 VLSB on Friday to find out where to meet your littles! =)</p>
	<p><br />YAAAAAAAAAAY.</p>
	<p>-<a href="roster.php?function=Search&user_id=605">Juana Du (GAS)</a></p>
	</div>

	<div class="newsItem">
	<h2>Updates Updates!</h2>
	<p class="date">February 7, 2007</p>
	<p>A few new suprises for you guys on the website. I'll let you figure out the new features that I've added. ;) -<a href="roster.php?function=Search&user_id=600">Geoffrey Lee (GAS)</a></p>
	</div>

	<div class="newsItem">
	<h2>New Website Policy!</h2>
	<p class="date">January 28, 2007</p>
	<p>Bad standing actives will no longer have the privilege of accessing their account on this website. If this applies to you or if your access has been deactivated in error, contact the Membership VP (Juana Du - juana at berkeley edu) to learn how you can restore your access. -<a href="roster.php?function=Search&firstname=Geoffrey&lastname=Lee&pledgeclass=GAS">Geoffrey Lee (GAS)</a></p>
	</div>
<a href="news_fa06.php">Older News ></a>
<?php
Template::print_body_footer();
Template::print_disclaimer();
?>
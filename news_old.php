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

	<div class="newsItem">
	<h2>Presenting...</h2>
	<p class="date">December 17, 2006</p>
	<p>Hau's wonderful new layout! :D Well ok, it's not new because it's always been there, just hidden from view, but I figured my layout's been up for long enough so now it's Hau's turn. That's an oak tree in the background, btw. Thanks Hau! -<a href="roster.php?function=Search&firstname=Geoffrey&lastname=Lee&pledgeclass=GAS">Geoffrey Lee (GAS)</a></p>
	</div>

	<div class="newsItem">
	<h2>Funpack!</h2>
	<p class="date">December 2, 2006</p>
	<p>Make Funpack yours by</p>
	<br />
	<p>1) Writing the graduating brothers a message!</p>
	<br />
	<p>Soemoe Aung</p>
	<p>Chris Cheuk</p>
	<p>Billy Cheung</p>
	<p>Tu-Uyen Do</p>
	<p>Le-Quyen Le</p>
	<p>Krystal Leong</p>
	<p>Liz Milks</p>
	<p>Spondee Shen</p>
	<p>Hau Tran</p>
	<p>Erica Tu</p>
	<p>Bianca Yip</p>
	<br />
	<p>2) buying an ad! $5 full page / $3 half page<br />
	send JPEGs to bigjunkyard at gmail.com [keep in mind the funpack is black and white]</p>
	<br />
	<p>3) Filling out the Funpack Survey! <a href="http://www.meloncollie.net/funpack/survey.php" target="_blank">http://www.meloncollie.net/funpack/survey.php</a></p>
	<br />
	<p>4) Pre ordering a Funpack! ONLY $5!</p>
	<br />
	<p>Everything is due Sunday, December 3rd.</p>
	<p>-<a href="roster.php?function=Search&firstname=Elise&lastname=Nguyen&pledgeclass=GAS">Elise Nguyen (GAS)</a></p>
	</div>

	<div class="newsItem">
	<h2>ATTENTION ALL ACTIVE MEMBERS!!!!!!!!!!!!!!!!!!!!!</h2>
	<p class="date">November 15, 2006</p>
	<p>If you were more than 20 minutes late or if you left early, you DID NOT get credit for elections.</p>
	<br />
	<p>If you were late or left early (for each day):</p>
	<p>+3 service hours</p>
	<br />
	<p>If you missed an election day (for each day):</p>
	<p>+3 service hours and +1 chapter event (ritual, activation, mid-semester, end-of-semester chapter forum)</p>
	<p>-<a href="roster.php?function=Search&firstname=Grace&lastname=Lee&pledgeclass=JJJ">Grace Lee (JJJ)</a></p>
	</div>

<?php
print_service_buddy("2006-11-14 19:00:00", "2006-12-05 19:00:00", "2006-11-14 00:00:00");
?>

	<div class="newsItem">
	<h2>Introducing... Fall 2006 Campout!</h2>
	<p class="date">November 4, 2006</p>
	<p>Come check out all the awesome reasons to go to campout this year - a <a href="documents/fall_2006_camp_out_presentation.ppt">Powerpoint presentation</a> by your lovely FunComm. And remember, campout is next weekend, so go grab your sleeping bags and flashlights! -<a href="roster.php?function=Search&firstname=Geoffrey&lastname=Lee&pledgeclass=GAS">Geoffrey Lee (GAS)</a></p>
	</div>

<?php
print_service_buddy("2006-10-31 19:00:00", "2006-11-14 19:00:00", "2006-10-31 00:00:00");
?>

	<div class="newsItem">
	<h2>Last Day To Buy A Giant Microbe!</h2>
	<p class="date">October 25, 2006</p>
	<p>Hey you all, <a href="roster.php?function=Search&firstname=Jennifer&lastname=Sun&pledgeclass=GAS">Jennifer Sun</a> wants to say that today is the absolute last day to let her know if you want a microbe. They only cost $5, which is cheaper than retail price, so go go go! -<a href="roster.php?function=Search&firstname=Geoffrey&lastname=Lee&pledgeclass=GAS">Geoffrey Lee (GAS)</a></p>
	</div>

	<div class="newsItem">
	<h2>Chairing Policy Changed (again)!</h2>
	<p class="date">October 22, 2006</p>
	<p>During CM5 discussion, the chapter voted to amend the chairing policy such that chairs may now only drop 5 days before the event. This rule is now enforced on the website calendar. -<a href="roster.php?function=Search&firstname=Geoffrey&lastname=Lee&pledgeclass=GAS">Geoffrey Lee (GAS)</a></p>
	</div>

<?php
print_service_buddy("2006-10-17 19:00:00", "2006-10-31 19:00:00", "2006-10-18 00:00:00");
?>

	<div class="newsItem">
	<h2>Service Buddies Posted!</h2>
	<p class="date">October 18, 2006</p>
	<p>Hey chapter, service buddies have now been paired up. If you don't see a notice about your service buddy after logging in and you would like to have a service buddy, please contact me or <a href="roster.php?function=Search&firstname=Sheehan&lastname=Tejamo&pledgeclass=TT">Sheehan</a>. -<a href="roster.php?function=Search&firstname=Geoffrey&lastname=Lee&pledgeclass=GAS">Geoffrey Lee (GAS)</a></p>
	</div>

	<div class="newsItem">
	<h2>Photo Gallery Posted!</h2>
	<p class="date">October 11, 2006</p>
	<p>Wow, sorry about the huge delay guys, but the <a href="gallery.php">photo gallery</a> is finally up! It can be found under the Brothers section. Let one of us webmasters know if you encounter any trouble with the gallery.</p>
	<br />
	<p>Btw, do you have the perfect photo that you believe represents LFS? If so, submit it to us and we'll post it onto the random photo thing-a-ma-bobber up above! (If you can come up with a better name for the random photo thing, please do share.) -<a href="roster.php?function=Search&firstname=Geoffrey&lastname=Lee&pledgeclass=GAS">Geoffrey Lee (GAS)</a></p>
	</div>

	<div class="newsItem">
	<h2>Chairing Policy Changed!</h2>
	<p class="date">October 2, 2006</p>
	<p>Due to abuse of chairing powers, ExComm has made the decision to disallow chairs from dropping themselves out of events. Chairing is a responsibility that should be taken seriously, and that means working to make sure that your event is a success. If you are an event chair and need to drop, then please talk to the appropriate ExComm officer (eg. Service VP for service projects and Finance VP for fundraisers). This change in policy only affects event chairs. -<a href="roster.php?function=Search&firstname=Geoffrey&lastname=Lee&pledgeclass=GAS">Geoffrey Lee (GAS)</a></p>
	</div>

	<div class="newsItem">
	<h2>Rush Hours Updated!</h2>
	<p class="date">September 24, 2006</p>
	<p>Rush hours have been updated. Let me know if there are still problems with your rush hours not being reported. -<a href="roster.php?function=Search&firstname=Geoffrey&lastname=Lee&pledgeclass=GAS">Geoffrey Lee (GAS)</a></p>
	</div>

	<div class="newsItem">
	<h2>Requirements Page Posted!</h2>
	<p class="date">September 19, 2006</p>
	<p>Hey chapter, I've finally put up the requirements page. It can be found under Calendar or Brothers. If anything doesn't work correctly, let me know right away. -<a href="roster.php?function=Search&quick_search=Geoffrey%20Lee">Geoffrey Lee (GAS)</a></p>
	</div>

<?php
if ($g_user->is_logged_in() && !$g_user->is_pledge()) {
?>
	<div class="newsItem">
	<h2>Fall 2006 Families!</h2>
	<p class="date">September 18, 2006</p>
<table x:str border=0 cellpadding=0 cellspacing=0 width=696 style='border-collapse:
 collapse;table-layout:fixed;width:522pt'>
 <col width=135 style='mso-width-source:userset;mso-width-alt:4937;width:101pt'>
 <col width=74 style='mso-width-source:userset;mso-width-alt:2706;width:56pt'>
 <col width=88 style='mso-width-source:userset;mso-width-alt:3218;width:66pt'>
 <col width=96 style='mso-width-source:userset;mso-width-alt:3510;width:72pt'>
 <col width=116 style='mso-width-source:userset;mso-width-alt:4242;width:87pt'>
 <col width=76 style='mso-width-source:userset;mso-width-alt:2779;width:57pt'>
 <col width=111 style='mso-width-source:userset;mso-width-alt:4059;width:83pt'>
 <tr height=18 style='height:13.5pt'>
  <td colspan=7 height=18 class=xl26 width=696 style='height:13.5pt;width:522pt'>Parents</td>
 </tr>
 <tr height=17 style='height:12.75pt'>
  <td height=17 class=xl24 style='height:12.75pt'>Nicholas Yap</td>
  <td class=xl24>Nicole Fels</td>
  <td class=xl24>Esther Chung</td>
  <td></td>
  <td class=xl25>Dennis Mo</td>
  <td class=xl25>Kevin Wong</td>
  <td class=xl25>Geoffrey Lee</td>
 </tr>
 <tr height=17 style='height:12.75pt'>
  <td height=17 class=xl24 style='height:12.75pt'>Krystal Leong</td>
  <td class=xl24>Mary Ma</td>
  <td class=xl24>Ed Yung</td>
  <td></td>
  <td class=xl25>JaneYuen</td>
  <td class=xl25>Erica Tu</td>
  <td class=xl25>Liana Leung</td>
 </tr>
 <tr height=17 style='height:12.75pt'>
  <td height=17 colspan=7 style='height:12.75pt;mso-ignore:colspan'></td>
 </tr>
 <tr height=18 style='height:13.5pt'>
  <td colspan=7 height=18 class=xl26 style='height:13.5pt'>Small Families</td>
 </tr>
 <tr height=17 style='height:12.75pt'>
  <td height=17 class=xl24 style='height:12.75pt'>Anna Lau</td>
  <td></td>
  <td class=xl24>Melissa Ying</td>
  <td></td>
  <td class=xl25>Christa Culver</td>
  <td></td>
  <td class=xl25>Scott Lin</td>
 </tr>
 <tr height=17 style='height:12.75pt'>
  <td height=17 class=xl24 style='height:12.75pt'>Jennifer Sun</td>
  <td></td>
  <td class=xl24>Jenny Lee</td>
  <td></td>
  <td class=xl25>Candice Park</td>
  <td></td>
  <td class=xl25>Anne Chen</td>
 </tr>
 <tr height=17 style='height:12.75pt'>
  <td height=17 class=xl24 style='height:12.75pt'>Elise Ngyuen</td>
  <td></td>
  <td class=xl24>Michael Chew</td>
  <td></td>
  <td class=xl25>Emily Liu</td>
  <td></td>
  <td class=xl25>Christina Kuo</td>
 </tr>
 <tr height=17 style='height:12.75pt'>
  <td height=17 class=xl24 style='height:12.75pt'>Jimmy Finkes (Uncle)</td>
  <td></td>
  <td class=xl24>Jon Lee</td>
  <td colspan=3 style='mso-ignore:colspan'></td>
  <td class=xl25>Ray Zhao</td>
 </tr>
 <tr height=17 style='height:12.75pt'>
  <td height=17 colspan=7 style='height:12.75pt;mso-ignore:colspan'></td>
 </tr>
 <tr height=17 style='height:12.75pt'>
  <td height=17 class=xl24 style='height:12.75pt'>Nicole Neto</td>
  <td></td>
  <td class=xl24>Alex Ang</td>
  <td></td>
  <td class=xl25>Sheehan Tejamo</td>
  <td></td>
  <td class=xl25>Kristine Leung</td>
 </tr>
 <tr height=17 style='height:12.75pt'>
  <td height=17 class=xl24 style='height:12.75pt'>Tim Chiu</td>
  <td></td>
  <td class=xl24>Kathy Chung</td>
  <td></td>
  <td class=xl25>Spondee Shen</td>
  <td></td>
  <td class=xl25>Vivian Lee-Su</td>
 </tr>
 <tr height=17 style='height:12.75pt'>
  <td height=17 class=xl24 style='height:12.75pt'>Michael Kao</td>
  <td></td>
  <td class=xl24>Annie Nguyen</td>
  <td></td>
  <td class=xl25>Christina Mi</td>
  <td></td>
  <td class=xl25>Jason Shih</td>
 </tr>
 <tr height=17 style='height:12.75pt'>
  <td height=17 class=xl24 style='height:12.75pt'>Crystal Chou</td>
  <td></td>
  <td class=xl24>Kevin Tse</td>
  <td></td>
  <td class=xl25>Kassandra Finklea</td>
  <td></td>
  <td class=xl25>Mei Wu (Aunt)</td>
 </tr>
 <tr height=17 style='height:12.75pt'>
  <td height=17 class=xl24 style='height:12.75pt'>Grace Lean (Aunt)</td>
  <td></td>
  <td class=xl24>Jessica Oh</td>
  <td></td>
  <td class=xl25>Cheryl Cox</td>
  <td></td>
  <td class=xl25>David Wei (Uncle)</td>
 </tr>
 <tr height=17 style='height:12.75pt'>
  <td height=17 colspan=7 style='height:12.75pt;mso-ignore:colspan'></td>
 </tr>
 <tr height=18 style='height:13.5pt'>
  <td colspan=7 height=18 class=xl26 style='height:13.5pt'>Aunts and Uncles for
  Big Fams</td>
 </tr>
 <tr height=17 style='height:12.75pt'>
  <td height=17 class=xl24 style='height:12.75pt'>Lena Bakman</td>
  <td colspan=3 style='mso-ignore:colspan'></td>
  <td class=xl25>Jeannie Fong</td>
  <td colspan=2 style='mso-ignore:colspan'></td>
 </tr>
 <tr height=17 style='height:12.75pt'>
  <td height=17 colspan=4 style='height:12.75pt;mso-ignore:colspan'></td>
  <td class=xl25>Natasha Arsadjaja</td>
  <td colspan=2 style='mso-ignore:colspan'></td>
 </tr>
 <tr height=17 style='height:12.75pt'>
  <td height=17 colspan=4 style='height:12.75pt;mso-ignore:colspan'></td>
  <td class=xl25>Mary Miao</td>
  <td colspan=2 style='mso-ignore:colspan'></td>
 </tr>
</table>
	</div>
<?php
}
?>
	<div class="newsItem">
	<h2>Rush Events Posted!</h2>
	<p class="date">August 28, 2006</p>
	Here are the rush events and pre-ritual service projects. Refer to the <a href="">Pledging</a> section if you have any questions.
	<br /><a target="_blank" href="http://www.google.com/calendar/render?cid=dqpf6hs87ieqdvc48ieaiud41c@group.calendar.google.com">Add these events to your Google Calendar</a> | View them on <a href="http://www.google.com/calendar/embed?src=dqpf6hs87ieqdvc48ieaiud41c%40group.calendar.google.com&dates=20060901%2F20061001">Google Calendar</a>
	<br /><b>Rush Events</b><br />
	<ul>
	<li><span style="text-decoration: underline; font-weight: bold">Wednesday, September 6, 2006:</span>
	  <br /><span style="font-weight: bold; margin-left: 8px">Info Night #1 - 7:30PM @ 2040 VLSB</span>
	  <br /><span style="margin-left: 8px">Come find out more about what Alpha Phi Omega is all about.</span></li>
	<li><span style="text-decoration: underline; font-weight: bold;">Thursday, September 7, 2006</span>
	  <br /><span style="font-weight: bold; margin-left: 8px">Dessert Social - 7:30 PM @ 56 Barrows</span>
	  <br /><span style="margin-left: 8px">Enjoy some good desserts with us while we get to know each other.</span></li>
	<li><span style="text-decoration: underline; font-weight: bold;">Tuesday, September 12, 2006:</span>
	  <br /><span style="font-weight: bold; margin-left: 8px">Info Night #2 - 7:30 PM @ 2040 VLSB</span>
	  <br /><span style="margin-left: 8px">In case you missed Info Night #1.</span></li>
	<li><span style="text-decoration: underline; font-weight: bold;">Thursday, September 14, 2006</span>
	  <br /><span style="font-weight: bold; margin-left: 8px">Meet the Chapter Night - 7:30 PM @ Kip's</span>
	  <br /><span style="margin-left: 8px">Enjoy free pizza while getting to know actives.</span></li>
	<li><span style="text-decoration: underline; font-weight: bold;">Tuesday, September 19, 2006</span>
	  <br /><span style="font-weight: bold; margin-left: 8px">Ritual - 5:30 PM @ 187 Dwinelle. CM 3 will be immediately after.</span>
	  <br /><span style="margin-left: 8px">Absolutely important to attend if you want to officially become a pledge.</span></li>
	</ul>

	<br />
	<b>Pre-Ritual Service Projects</b>
	<br />Pre-ritual service projects are service projects that interested rushees can attend in order to get a feel for what it's like to volunteer with us, as well as to get a taste of the projects we do. If you're interested in attending, please contact <a href="mailto:sheeshATberkeley.edu">Sheehan</a>, our Service Vice President.
	<br /><b>Note:</b> AHWL stands for Anna Head West Lot, the parking lot between Channing and Haste, and Bowditch and Telegraph.
	<p>

	<ul>
	<li><span style="text-decoration: underline; font-weight: bold">Friday, September 8, 2006:</span>
	  <br /><span style="font-weight: bold; margin-left: 8px">CalStar Yoga - 1:15pm to 3:45pm @ RSF</span>
	  <br /><span style="margin-left: 8px">Come help the elderly do yoga and get to know them on a one-on-one basis.</span></li>
	<li><span style="text-decoration: underline; font-weight: bold;">Saturday, September 9, 2006</span>
	  <br /><span style="font-weight: bold; margin-left: 8px">Glide Church Sandwich Making - 8:15am to 11:00am @ AHWL</span>
	  <br /><span style="margin-left: 8px">Help pack lunches for the homeless with us.</span></li>
	<li><span style="text-decoration: underline; font-weight: bold;">Wednesday, September 13, 2006:</span>
	  <br /><span style="font-weight: bold; margin-left: 8px">SF Food Bank - 6:00pm to 8:00pm @ AHWL</span>
	  <br /><span style="margin-left: 8px">Sort the food used to make dinner for AIDS and HIV patients.</span></li>
	</ul>
	</p>
	</div>

	<div class="newsItem">
	  <h2>New Website!</h2>
	  <p class="date">August 28, 2006</p>
	  <p>After over a month of hard work, we're finally proud to present to you the new Gamma Gamma website! The first thing you'll notice is that your login username is now your e-mail address rather than your SID. We did this because it lets us give accounts to non-students who don't have a SID. If you don't remember your e-mail address, then no problem, just sign in with your SID as your username to retrieve it. And well, we're not totally done with this website yet as there are still several sections under construction, but we promise that they'll be finished very soon! If you'd like to help us, shoot one of the webmasters an e-mail. -<a href="roster.php?function=Search&quick_search=Geoffrey%20Lee">Geoffrey Lee (GAS)</a></p>
	  <p class="link"><a href="#"></a></p>
	</div>
<?php
Template::print_body_footer();
Template::print_disclaimer();
?>
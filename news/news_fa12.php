<?php
require("include/includes.php");
require("include/Calendar.class.php");
require("include/Template.class.php");// require("include/Shoutbox.class.php");
require("include/EvalNag.class.php");
require("include/GGManiacNag.class.php");
Template::print_head(array("site.css", "calendar.css", "excel.css"));
Template::print_body_header('Home', 'NEWS');

$evalnag = new EvalNag();
echo $evalnag->display("2007-01-01");

$gg_maniac_nag = new GGManiacNag();
echo $gg_maniac_nag->display();
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
		<h2>Spring 2013 Pledge Committee</h2>
		<p class="date">Dec 5, 2012</p>

		<p style="margin-bottom: 1.5em">Congratulations to the Spring 2013 P-Comm!</p>
		<p style="margin-bottom: 1.5em">
		<b>Leadership Trainers</b>:Vivian Nguyen and Jeffrey Zeng<br/>
		<b>Fellowship Trainers</b>: Austin Shieh and Stephanie Chan<br/>
		<b>Service Trainer</b>: Elizabeth Sabiniano<br/>
		<b>Finance Trainers</b>: Pamudh Kariyawasam and Alyssa Ferrell<br/>
		<b>Administrative Trainer</b>: Jeffrey Swartwout<br/>
		<b>Historian Trainer</b>: Justina Liang
		</p>
		
		<p>-<a href="roster.php?function=Search&user_id=1289">Benjamin Le (KS)</a></p>
		</div>
<?php endif ?>

<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
	<div class="newsItem">
		<h2>Banquet Slideshow</h2>
		<p class="date">December 5, 2012</p>
		<p style="margin-bottom: 1.5em"> Didn't watch Banquet Slideshow yet? Watch it <a href="http://www.youtube.com/watch?v=8msdf78RJ1g&feature=g-upl">here</a>! Directed and Developed by the amazing Ex-Historian <b>Daisy Chan</b>!<br><br>

		</p>
		<p>-<a href="roster.php?function=Search&user_id=1216">Tony Le (JLC)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
	<div class="newsItem">
		<h2>GG Maniac #7</h2>
		<p class="date">December 5, 2012</p>
		<p style="margin-bottom: 1.5em">Please congratulate <b>Elizabeth Sabiniano</b> for winning GG Maniac!<br><br>

		So one time... Elizabeth pledged JS semester and this semester she was Scrapbook and Funpack Chair. She also attended 15+ Fellowship, did 50+ Service Hours, and participated in RollCall. She is also a Big for Monkey Bizness and can sometimes be mistaken for a child. Congrats again Elizabeth!<br><br>

		<img src="/documents/fa12/ggmaniac7.jpg" width=250 style="border:1px solid black"><br>

		</p>
		<p>-<a href="roster.php?function=Search&user_id=1216">Tony Le (JLC)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
	<div class="newsItem">
		<h2>Notes from CM8</h2>
		<p class="date">December 5, 2012</p>
		<p style="margin-bottom: 1.5em">Here are the documents from CM8!<br><br>

		<a href="/documents/fa12/CM8Minutes.docx">CM8 Minutes</a><br>
		<a href="http://www.youtube.com/watch?v=IIVoEYQVvVw&feature=g-upl">CM8 Slideshow!</a><br><br>
		
		</p>
		<p>-<a href="roster.php?function=Search&user_id=1289">Tony Le (JLC)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
	<div class="newsItem">
		<h2>GG Maniac #6</h2>
		<p class="date">November 19, 2012</p>
		<p style="margin-bottom: 1.5em">Please congratulate <b>Pamudh Kariyawasam</b> for winning GG Maniac!<br><br>

		Pamudh pledged JS semester and has contributed a lot towards APO this semester! He was College Day Chair, Talent Show Chair, and Assassins Chair. He also participated in roll call and is also a Big for Fiat Cupido. Not to metion, he also creates these intense workout fellowships that people are too scared to attend LOL. Keep up the great work, Pamudh! Congrats again!<br><br>

		<img src="/documents/fa12/ggmaniac6.jpg" width=250 style="border:1px solid black"><br>

		</p>
		<p>-<a href="roster.php?function=Search&user_id=1289">Benjamin Le (KS)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
	<div class="newsItem">
		<h2>Spring 2013 Executive Committee</h2>
		<p class="date">November 14, 2012</p>
		<p style="margin-bottom: 1.5em">Congratulations to the elected members of the Spring 2012 Executive Committee:</p>
		<p style="margin-bottom: 1.5em">
		<b>President</b> - Wiemond Wu<br />
		<b>Service VP</b> - Kaitlin Fronberg<br />
		<b>Pledgemaster</b> - Tonia Tran<br />
	        <b>Administrative VP</b> - Tony Le<br />
	        <b>Membership VP</b> - Christopher Ching<br />
	        <b>Finance VP</b> - Rebecca Phuong<br />
	        <b>Fellowship VP</b> - Polly Luu<br />     
	        <b>Historian</b> - Katie Chen<br />
		</p>
		<p>-<a href="roster.php?function=Search&user_id=1289">Benjamin Le (KS)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
	<div class="newsItem">
		<h2>Notes from CM7</h2>
		<p class="date">November 14, 2012</p>
		<p style="margin-bottom: 1.5em">Here are the documents from CM7!<br><br>

		<a href="/documents/fa12/CM7Minutes.docx">CM7 Minutes</a><br>
		<a href="http://www.youtube.com/watch?v=3ByR5HdUITI&feature=youtu.be">CM7 Slideshow!</a><br><br>
		<a href="/documents/fa12/CM7Stylus.pdf">CM7 Stylus (NOT UP YET)</a><br>
		
		<b>Caption Contest</b> [<a href="mailto:admin-vp@calaphio.com?subject=CM7 Caption">submit admin-vp@calaphio.com</a>]<br><br>
		<img src="/documents/fa12/CC7.jpg" width=300 style="border:1px solid black"></a>
		</p>
		<p>-<a href="roster.php?function=Search&user_id=1289">Benjamin Le (KS)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
	<div class="newsItem">
		<h2>Election Platforms!</h2>
		<p class="date">November 12, 2012</p>
		<p style="margin-bottom: 1.5em">Please read these Election Platforms so you guys can all be informed tomorrow during Elections!<br><br>

		<a href="fa12platforms.php">Election Platforms Link</a>
		</p>
		<p>-<a href="roster.php?function=Search&user_id=1289">Benjamin Le (KS)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
	<div class="newsItem">
		<h2>GG Maniac #5</h2>
		<p class="date">November 4, 2012</p>
		<p style="margin-bottom: 1.5em">Please congratulate <b>Vivian Nguyen</b> for winning GG Maniac!<br><br>

		Vivian pledged JS semester and is very dedicated Spirit Chair! She is actively participating and organizing practice for rollcall and she also made up amazing new cheers for our chapter. "Go Gamma Gamma, Go Gamma Gamma, WHAT?!" She is also a big for NBD and has a baby making playlist on spotify ;D. Keep up the great work Vivian! Congrats again!<br><br>

		<img src="/documents/fa12/ggmaniac5.jpg" width=250 style="border:1px solid black"><br>

		</p>
		<p>-<a href="roster.php?function=Search&user_id=1289">Benjamin Le (KS)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
	<div class="newsItem">
		<h2>Notes from CM6</h2>
		<p class="date">October 30, 2012</p>
		<p style="margin-bottom: 1.5em">Here are the documents from CM6!<br><br>

		<a href="/documents/fa12/CM6Minutes.docx">CM6 Minutes</a><br>
		<a href="http://www.youtube.com/watch?v=HUHeDpR7Fc8&feature=youtu.be">CM6 Slideshow!</a><br><br>
		<a href="/documents/fa12/CM6Stylus.pdf">CM6 Stylus</a><br>
		
		<b>Caption Contest</b> [<a href="mailto:admin-vp@calaphio.com?subject=CM6 Caption">submit admin-vp@calaphio.com</a>]<br><br>
		<img src="/documents/fa12/CC6.jpg" width=300 style="border:1px solid black"></a>
		</p>
		<p>-<a href="roster.php?function=Search&user_id=1289">Benjamin Le (KS)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
	<div class="newsItem">
		<h2>GG Maniac #4</h2>
		<p class="date">October 17, 2012</p>
		<p style="margin-bottom: 1.5em">Please congratulate <b>Derek Young</b> for winning GG Maniac!<br><br>

		Derek pledged KS semester and is very active this semester! He has already done 50+ service hours and 10+ Fellowships. He is also an uncle for AISA and in charge of the Beartrax Serive Event. Keep up the great work! Congrats again Derek!<br><br>

		<img src="/documents/fa12/ggmaniac4.png" width=250 style="border:1px solid black"><br>

		</p>
		<p>-<a href="roster.php?function=Search&user_id=1289">Benjamin Le (KS)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
	<div class="newsItem">
		<h2>Notes from CM5</h2>
		<p class="date">October 16, 2012</p>
		<p style="margin-bottom: 1.5em">Here are the documents from CM5!<br><br>

		<a href="/documents/fa12/CM5Minutes.docx">CM5 Minutes</a><br>
		<a href="http://www.youtube.com/watch?v=DAx5QgXlLGM&feature=youtu.be">CM5 Slideshow!</a><br><br>
		<a href="/documents/fa12/CM5Stylus.pdf">CM5 Stylus</a><br>
		
		<b>Caption Contest</b> [<a href="mailto:admin-vp@calaphio.com?subject=CM5 Caption">submit admin-vp@calaphio.com</a>]<br><br>
		<img src="/documents/fa12/CC5.jpg" width=300 style="border:1px solid black"></a>
		</p>
		<p>-<a href="roster.php?function=Search&user_id=1289">Benjamin Le (KS)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
	<div class="newsItem">
		<h2>Awards Info</h2>
		<p class="date">October 9, 2012</p>
		<p style="margin-bottom: 1.5em">Link to awards info bellow<br>

		<a href="awards.php">Awards Info</a>

		</p>
		<p>-<a href="roster.php?function=Search&user_id=1289">Benjamin Le (KS)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
	<div class="newsItem">
		<h2>GG Maniac #3</h2>
		<p class="date">October 3, 2012</p>
		<p style="margin-bottom: 1.5em">Please congratulate <b>Jeffrey Swartwout</b> for winning GG Maniac!<br><br>

		Jeff pledged JS semester and is an amazing active this semester!  He was Active Retreat Chair and currently Stylus and IM Sports Chair. He is definitely dedicated to the "F"/brotherhood by already having 19 fellowships and he is also a big for J.Crew.  Congrats again Jeff!<br><br>

		<img src="/documents/fa12/ggmaniac3.jpg" width=400 style="border:1px solid black"><br>

		</p>
		<p>-<a href="roster.php?function=Search&user_id=1289">Benjamin Le (KS)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
	<div class="newsItem">
		<h2>Notes from CM4</h2>
		<p class="date">October 3, 2012</p>
		<p style="margin-bottom: 1.5em">Here are the documents from CM4!<br><br>

		<a href="/documents/fa12/CM4Minutes.docx">CM4 Minutes</a><br>
		<a href="http://www.youtube.com/watch?v=AvG3G-0tu5U&feature=youtu.be ">CM4 Slideshow!</a><br><br>
		<a href="/documents/fa12/CM4Stylus.pdf">CM4 Stylus</a><br>
		
		<b>Caption Contest</b> [<a href="mailto:admin-vp@calaphio.com?subject=CM4 Caption">submit admin-vp@calaphio.com</a>]<br><br>
		<img src="/documents/fa12/CC4.jpg" width=500 style="border:1px solid black"></a>
		</p>
		<p>-<a href="roster.php?function=Search&user_id=1289">Benjamin Le (KS)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
	<div class="newsItem">
		<h2>GG Maniac #2</h2>
		<p class="date">September 20, 2012</p>
		<p style="margin-bottom: 1.5em">Please congratulate <b>Austin Shieh</b> for winning GG Maniac!<br><br>

		Austin pledged last semester and was an amazing pledge.  He was a great and responsible Rush Chair and is also currently IM Sports Chair and IC Basketball Chair. He is always willing to help out others during service projects and is Bigging this semester. Keep up the good work Austin! Congrats again!<br><br>

		<img src="/documents/fa12/ggmaniac2.jpg" width=500 style="border:1px solid black"><br>

		</p>
		<p>-<a href="roster.php?function=Search&user_id=1289">Benjamin Le (KS)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
	<div class="newsItem">
		<h2>Membership Spotlight #2</h2>
		<p class="date">September 19, 2012</p>
		<p style="margin-bottom: 1.5em">Please congratulate <b>Tony Le</b> for being CM3's Membership Spotlight!<br><br>

		Tony Le has been an amazing friend and mentor to many people in the chapter. He offered assistance to many actives and will continues to offer his support to the chapter as well as the new pledges. His presence and dedication in the chapter will never fade away. It is a great honor to present to him the Membership Spotlight. Congratulation, Tony!!!<br><br>

		<img src="/documents/fa12/membershipspotlight2.jpeg" width=250 style="border:1px solid black"><br>

		</p>
		<p>-<a href="roster.php?function=Search&user_id=1289">Benjamin Le (KS)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
	<div class="newsItem">
		<h2>Membership Spotlight #1</h2>
		<p class="date">September 19, 2012</p>
		<p style="margin-bottom: 1.5em">Please congratulate <b>Gloria Santos</b> for being CM2's Membership Spotlight!<br><br>

		Gloria Santos has been an active in APO for three semesters. Not only is she a wonderful friend, but she is always willing to help out the chapter when asked to. If you have not met her up, do get to know her!!! I am proud to present her the first Membership Spotlight for this semester to Gloria Santos. Congratulation, Gloria!!!<br><br>

		<img src="/documents/fa12/membershipspotlight1.jpeg" width=250 style="border:1px solid black"><br>

		</p>
		<p>-<a href="roster.php?function=Search&user_id=1289">Benjamin Le (KS)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
	<div class="newsItem">
		<h2>Notes from CM3</h2>
		<p class="date">September 18, 2012</p>
		<p style="margin-bottom: 1.5em">Here are the documents from CM3!<br><br>

		<a href="/documents/fa12/CM3Minutes.docx">CM3 Minutes</a><br>
		<a href="http://www.youtube.com/watch?v=5WT43XMD49w&feature=youtu.be ">CM3 Slideshow!</a><br><br>
		<a href="/documents/fa12/CM3Stylus.pdf">CM3 Stylus</a><br>
		
		<b>Caption Contest</b> [<a href="mailto:stylus@calaphio.com?subject=CM3 Caption">submit stylus@calaphio.com</a>]<br><br>
		<img src="/documents/fa12/CC3.jpg" width=500 style="border:1px solid black"></a>
		</p>
		<p>-<a href="roster.php?function=Search&user_id=1289">Benjamin Le (KS)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
	<div class="newsItem">
		<h2>GG Maniac #1</h2>
		<p class="date">September 11, 2012</p>
		<p style="margin-bottom: 1.5em">Please congratulate <b>Stephanie Chan</b> for winning GG Maniac!<br><br>

		Stephanie pledged JS and was an outstanding pledge last semester. Not only did she do a great job as Rush Chair and GG BBQ/ Relay Chair, she will also be chairing one more position as Banquet Chair! Congrats Stephanie!<br><br>

		<img src="/documents/fa12/ggmaniac1.jpg" width=250 style="border:1px solid black"><br>

		</p>
		<p>-<a href="roster.php?function=Search&user_id=1289">Benjamin Le (KS)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
	<div class="newsItem">
		<h2>Notes from CM2</h2>
		<p class="date">September 11, 2012</p>
		<p style="margin-bottom: 1.5em">Here are the documents from CM2!<br><br>

		<a href="/documents/fa12/CM2Minutes.docx">CM2 Minutes</a><br>
		<a href="http://www.youtube.com/watch?v=E24oM7z9tvs&feature=g-upl ">CM2 Slideshow!</a><br><br>
		<a href="/documents/fa12/CM2Stylus.pdf">CM2 Stylus</a><br>
		
		<b>Caption Contest</b> [<a href="mailto:stylus@calaphio.com?subject=CM3 Caption">submit stylus@calaphio.com</a>]<br><br>
		<img src="/documents/fa12/CC2.jpg" width=500 style="border:1px solid black"></a>
		</p>
		<p>-<a href="roster.php?function=Search&user_id=1289">Benjamin Le (KS)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
	<div class="newsItem">
		<h2>Notes from CM1</h2>
		<p class="date">August 28, 2012</p>
		<p style="margin-bottom: 1.5em">Here are the documents from CM1, the first CM of the semester!<br><br>

		<a href="/documents/fa12/CM1Minutes.docx">CM1 Minutes</a><br>
		<a href="http://www.youtube.com/watch?v=ANIJBXmum0U&feature=g-upl">CM1 Slideshow!</a><br><br>
		
		<b>Caption Contest</b> [<a href="mailto:stylus@calaphio.com?subject=CM1 Caption">submit stylus@calaphio.com</a>]<br><br>
		<img src="/documents/fa12/CC1.jpg" width=250 style="border:1px solid black"></a>
		</p>
		<p>-<a href="roster.php?function=Search&user_id=1289">Benjamin Le (KS)</a></p>
	</div>
<?php endif ?>

<?php if (!$g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>Fall 2012 Rush!</h2>
		<p class="date">August 24, 2012</p>
		<p style="margin-bottom: 1.5em">Interested in pledging Alpha Phi Omega? <a href="https://www.facebook.com/events/275328205914770">Join</a> our Facebook event and then check out our <a href="http://live.calaphio.com/pledging.php">PLEDGING PAGE!</a> for all information pertaining to rush!
		<p>-<a href="roster.php?function=Search&user_id=1289">Benjamin Le (KS)</a></p>
	</div>
	<?php endif ?>

<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
	<div class="newsItem">
		<h2>Fall 2012 Budget and Requirements!</h2>
		<p class="date">August 27, 2012</p>
		<p style="margin-bottom: 1.5em"> Hello Everybody! As you may know, CM1 is tomorrow and we will need to have quorum to vote on this semesters's new budget and requirements. <br><br> 
		In order to facilitate discussion tomorrow and keep everyone informed about the budget and requirements for tomorrow, I have decided to post the documents online. Everyone at CM1 tomorrow
		will still get a hardcopy of these documents tomorrow but please overview the budget and requirements when you have time to be an informed voter.<br><br>
		
		Thanks you for your time!
		</p>
		
		<a href="documents/fa12/Budget + Requirements.doc">Budget + Requirements </a><br><br>
		
		<p>-<a href="roster.php?function=Search&user_id=1289">Benjamin Le (KS)</a></p>
	</div>
<?php endif ?>	

<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
	<div class="newsItem">
		<h2>Please List Your Cell Phone Carrier!</h2>
		<p class="date">June 16, 2012</p>
		<p style="margin-bottom: 1.5em"> Hello Everybody! I hope you guys had a wonderful summer so far! <br><br> 
		If you guys have the time, please fill out the field in your Account Info called "Phone Carrier" shown in the picture below. Click on the drop down menu and choose your current cell phone carrier.
		Although this is not mandatory, if you guys fill out this field, it will make it alot easier for me
		to create new features for the website in the future (Such as automatic text-message reminders for APO events. AWESOME!).<br><br>
		
		Thanks you for your time!
		</p>
		
		<img src="/documents/fa12/PhoneCarrier.png" width=400 style="border:1px solid black"><br>
		
		<p>-<a href="roster.php?function=Search&user_id=1289">Benjamin Le (KS)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
	<div class="newsItem">
		<h2>Online Calendar Integration!</h2>
		<p class="date">June 9, 2012</p>
		<p style="margin-bottom: 1.5em">For all of you iCalendar/Google Calendar/Other Online Calendar people out there. There is now going to be a way
		to be a way to add APO events to those calendars! In order to do so, please download an <strong>.ics</strong> file(An file type used by most major electronic calendars)
		by clicking on the button circled in the picture below called "Add to your own calendar." Open the file called APOEvent.ics with your iCalendar application to add the event!</strong><br><br>
		
		For Google calendar people, please refer to the link below in order to learn how to import <strong>.ics</strong> files to your calendar. Also FYI for Google calendar people, there is a known bug in which
		once you import the <strong>.ics</strong> file and accidently remove the event, you are unable to import the event a second time(I know how to fix this though so please ask me if you have a problem with this).<br><br> 
		
		<a href="http://support.google.com/calendar/bin/answer.py?hl=en&answer=37118">How to import .ics file into Google Calendar</a><br><br>
		
		Please let me know if you run into any bugs!<br><br>

		<img src="/documents/fa12/CalendarButton.png" width=400 style="border:1px solid black"><br>

		</p>
		<p>-<a href="roster.php?function=Search&user_id=1289">Benjamin Le (KS)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
	<div class="newsItem">
		<h2>Small Change When Evaluating Events</h2>
		<p class="date">June 5, 2012</p>
		<p style="margin-bottom: 1.5em">There is now going to be an extra field that chairs need to fill out when evaluating events on the form. If there is someone driving to/from an event,
		please calculate the total miles they drove to/from the event using Google Maps and fill it out the the section of the form circled in the picture below. For example, if someone drove 50 miles to/from San Francisco
		for an event, give the driver 100 miles driven. <br><br>

		Please fill out these fields so we can recognize the most prolific drivers in APO!<br><br>

		<img src="/documents/fa12/Miles Drove.png" width=400 style="border:1px solid black"><br>

		</p>
		<p>-<a href="roster.php?function=Search&user_id=1289">Benjamin Le (KS)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
	<div class="newsItem">
		<h2>Search by Phone #!</h2>
		<p class="date">May 7, 2012</p>
		<p style="margin-bottom: 1.5em">
			
		Ever had that incident where someone texts you about an APO event and you have no idea who the hell that person is and you end up searching everywhere through the roster trying to match the number? Now you can search the roster by phone numbers to simplify the process! Search the roster with your area code now to see who else is from your area code!
		<br>
		<br>
		
		Idea Creds to Sarah Bae.

		</p>
		<p>-<a href="roster.php?function=Search&user_id=1289">Benjamin Le (KS)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
	<div class="newsItem">
		<h2>Fall 2012 Pledge Committee</h2>
		<p class="date">May 3, 2012</p>

		<p style="margin-bottom: 1.5em">Congratulations to the Fall 2012 P-Comm!</p>
		<p style="margin-bottom: 1.5em">
		<b>Leadership Trainers</b>: Nicki Nario and Wiemond Wu<br/>
		<b>Fellowship Trainers</b>: Polly Luu and Christopher Ching<br/>
		<b>Service Trainer</b>: Peggy Wu<br/>
		<b>Finance Trainers</b>: Carmen Yung and Melisa Li<br/>
		<b>Administrative Trainer</b>: Matthew Chong<br/>
		<b>Historian Trainer</b>: Tannia Soto
		</p>
		
		<p>-<a href="roster.php?function=Search&user_id=1289">Benjamin Le (KS)</a></p>
		</div>
<?php endif ?>

<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
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
		<p>-<a href="roster.php?function=Search&user_id=1289">Benjamin Le (KS)</a></p>
	</div>
<?php endif ?>

<?php if (!$g_user->is_logged_in()): ?>
<div class="newsItem">
	<h2>Good Luck on Finals!</h2>
	<p class="date">January 14, 2012</p>
	<p style="margin-bottom: 1.5em">Good Luck on Finals Everybody! Summer is almost here!
	<p>-<a href="roster.php?function=Search&user_id=1289">Benjamin Le (KS)</a></p>
</div>
<?php endif ?>

<a href="news_sp12.php">Older News ></a>
<?php
Template::print_body_footer();
Template::print_disclaimer();
?>

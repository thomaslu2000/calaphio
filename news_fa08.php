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
		<h2>Happy Holidays and Happy New Semester! =)</h2>
		<p class="date">December 24, 2008</p>
		<p style="margin-bottom: 1.5em">Here are the <a href="documents/fa08/11.18.08CM7.doc">CM7 Minutes</a>, <a href="documents/fa08/End-of-Semester Chapter Forum.doc">End-of-Semester Chapter Forum Minutes</a>, <a href="documents/fa08/11.18.08Elections.doc">Elections Minutes</a>, <a href="documents/fa08/12.7.08ExComm8.doc">ExComm8 Minutes</a>, and <a href="documents/fa08/12.09.08CM8.doc">CM8 Minutes</a>.</p>
		<p>-<a href="roster.php?function=Search&amp;user_id=600">Geoffrey Lee (GAS)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>Congratulations NextComm!</h2>
		<p class="date">December 1, 2008</p>
		<p style="margin-bottom: 1.5em">Here are next semester's 	Executive Committee members:</p>
		<p style="margin-bottom: 1.5em">
		<b>President:</b> Francesca Wang<br>
		<b>Service Vice President:</b> Lily Lam<br>
		<b>Pledgemaster:</b> Elaine Chow<br>
		<b>Administrative Vice President:</b> Karen Wu<br>
		<b>Membership Vice President:</b> Andy Chau<br>
		<b>Finance Vice President:</b> Beckie Siu<br>
		<b>Fellowship Vice President:</b> Evar Saelee<br>
		<b>Historian:</b> Jennifer Woo
		</p>
		<p>-<a href="roster.php?function=Search&user_id=899">David Jiang (CC)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>Election Platforms!</h2>
		<p class="date">November 17, 2008</p>
		<p style="margin-bottom: 1.5em">Brothers, I have posted <a href="fa08platforms.php">Election Platforms</a> on this website. If you wish to display your platform online, please e-mail me.</p> 
		<p style="margin-bottom: 1.5em">
		UPDATE 11/18, 12:35am: Added Andy Chau's platform for Membership Vice President.<br>
		UPDATE 11/18, 12:10am: Added Evar Saelee's platform for Fellowship Vice President.<br>
		UPDATE 11/17, 8:30pm: Added Jason Shih's platform for Pledgemaster.<br>
		UPDATE 11/17, 5:40pm: Added Elaine Chow's platform for Pledgemaster.<br>
		</p>
		<p>-<a href="roster.php?function=Search&user_id=899">David Jiang (CC)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>Admin Lovin'</h2>
		<p class="date">November 14, 2008</p>
		<p style="margin-bottom: 1.5em">
		<a href="documents/fa08/11.04.08CM6.doc">CM6 Minutes</a> await your viewing pleasure.<br>
		<a href="documents/fa08/11.02.08ExComm6.doc">ExComm6 Minutes</a> await your viewing pleasure.<br>
		<a href="documents/fa08/11.16.08ExComm7.doc">ExComm7 Minutes</a> await your viewing pleasure.<br>
		<a href="documents/fa08/Mid-Semester Chapter Forum.doc">Mid-Semester Chapter Forum Minutes</a> await your viewing pleasure.<br>
		</p>
		<p>-<a href="roster.php?function=Search&amp;user_id=912">Alexander Lin (CC)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>Active Spotlight!</h2>
		<p class="date">November 6, 2008</p>
		<p style="margin-bottom: 1.5em"><img src="images/2008_fall_activespotlight2.jpg" alt="Active Spotlight - Diny Huang" /></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>Admin Lovin'</h2>
		<p class="date">October 21, 2008</p>
		<p style="margin-bottom: 1.5em"><a href="documents/fa08/10.21.08CM5.doc">CM5 Minutes</a> await your viewing pleasure.</p>
		<p>-<a href="roster.php?function=Search&amp;user_id=912">Alexander Lin (CC)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>Admin Lovin'</h2>
		<p class="date">October 21, 2008</p>
		<p style="margin-bottom: 1.5em"><a href="documents/fa08/10.19.08ExComm5.doc">ExComm5 Minutes</a> are ready for you... :] </p>
		<p>-<a href="roster.php?function=Search&amp;user_id=912">Alexander Lin (CC)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>Admin Lovin'</h2>
		<p class="date">October 10, 2008</p>
		<p style="margin-bottom: 1.5em"><a href="documents/fa08/10.05.08ExComm4.doc">ExComm4 Minutes</a> and <a href="documents/fa08/10.07.08CM4.doc">CM4 Minutes</a> are here!! </p>
		<p>-<a href="roster.php?function=Search&amp;user_id=912">Alexander Lin (CC)</a></p>
	</div>
<?php endif ?>
<div class="newsItem">
		<h2>Join our LinkedIn group!</h2>
		<p class="date">October 7, 2008</p>
		<p style="margin-bottom: 1.5em">Hey Gamma Gammas! Aphio - UC Berkeley is now on LinkedIn! Come find us on the website to get acquainted with alumni and other actives! Here is the link: <a href="http://www.linkedin.com/e/gis/963567">http://www.linkedin.com/e/gis/963567</a>
		<p>
			See you on LinkedIn!<br />
			Peace out bean sprouts!<br />
			-<a href="roster.php?function=Search&amp;user_id=730">Christina Lee (MLN)</a>
		</p>
	</div>
<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>Active Spotlight!</h2>
		<p class="date">October 7, 2008</p>
		<p style="margin-bottom: 1.5em"><img src="images/2008_fall_activespotlight1.jpg" alt="Active Spotlight - Lora Lim" /></p>
	</div>
	<div class="newsItem">
		<h2>Administrivia</h2>
		<p class="date">October 7, 2008</p>
		<p style="margin-bottom: 1.5em"><a href="documents/fa08/09.21.08ExComm3.doc">ExComm Meeting #3 Minutes</a> and <a href="documents/fa08/09.23.08CM3.doc">CM3 Minutes</a> are up up up.</p>
		<p>-<a href="roster.php?function=Search&amp;user_id=600">Geoffrey Lee (GAS)</a></p>
	</div>
	<div class="newsItem">
		<h2>New Chapter E-mail Address</h2>
		<p class="date">September 19, 2008</p>
		<p style="margin-bottom: 1.5em">Brothers, we have migrated our chapter mailing list to Google Groups. The new e-mail address is <a href="mailto:chapter@calaphio.com">chapter@calaphio.com</a>. If you have problems receiving chapter e-mails, you can visit <a href="http://groups.google.com/group/calaphio-chapter">http://groups.google.com/group/calaphio-chapter</a> to view the mailing list at any time. We will stop accepting chapter e-mails to the old address after next week.</p>
		<p>-<a href="roster.php?function=Search&user_id=600">Geoffrey Lee (GAS)</a></p>
	</div>
	<div class="newsItem">
		<h2>Administrivia</h2>
		<p class="date">September 18, 2008</p>
		<p style="margin-bottom: 1.5em"><a href="documents/fa08/09.02.08CM1.doc">CM1 Minutes</a> and <a href="documents/fa08/09.09.08CM2.doc">CM2 Minutes</a> are available for your viewing pleasure y'all.</p>
		<p>-<a href="roster.php?function=Search&amp;user_id=912">Alexander Lin (CC)</a></p>
	</div>
	<div class="newsItem">
		<h2>Concession Stands Alcohol Training!</h2>
		<p class="date">Sept 9, 2008</p>
		<p style="margin-bottom: 1.5em">
			Do you want to sell alcohol (for a charitable cause)?? Then <a href="http://www.surveymonkey.com/s.aspx?sm=fjdD13yTOMqKLHeUtPy2zw_3d_3d">vote here</a> for the dates and times that you can attend a ~3 hour alcohol training for Cal Football games.
		</p>
		<p>-<a href="roster.php?function=Search&user_id=600">Geoffrey Lee (GAS)</a></p>
	</div>
<?php endif ?>
<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
	<div class="newsItem">
		<h2>Aphio Banquet Video!</h2>
		<p class="date">Sept 6, 2008</p>
		<p style="margin-bottom: 1.5em">
			Hi hi! Aphio Banquet video is posted online! Sorrrry it took me so long! =/ <a href="http://video.yahoo.com/watch/3427988/9567093">http://video.yahoo.com/watch/3427988/9567093</a>
		</p>
		<p style="margin-bottom: 1.5em">
			Enjoy! Peace out bean sprouts! :)
		</p>
		<p>-<a href="roster.php?function=Search&user_id=730">Christina Lee (MLN)</a></p>
	</div>
<?php endif ?>
	<div class="newsItem">
		<h2>Fall 2008 Namesake Honoree - Wilfred Krenek!</h2>
		<p class="date">Aug 13, 2008</p>
		<p style="margin-bottom: 1.5em">
			For those of you who missed the announcement, our Fall 2008 namesake honoree is Wilfred Krenek who pledged in 1971 at Alpha Rho chapter, University of Texas at Austin. Brother Krenek is a past national president and currently serves as chair for the Alpha Phi Omega Endowment Trustees. <a href="http://www.apo.org/show/About_Us/Board_of_Directors/Members/Bio?id=246">Check out the rest of his biography</a> at the national website.
		</p>
		<p>-<a href="roster.php?function=Search&user_id=600">Geoffrey Lee (GAS)</a></p>
	</div>
	<div class="newsItem">
		<h2>2008 National Convention!</h2>
		<p class="date">May 29, 2008</p>
		<p style="margin-bottom: 1.5em">
			<a href="http://www.apo.org/show/Conferences_and_Events/National_Convention/Registration">Registration</a> is now open for the <a href="http://www.convention.apo.org">2008 National Convention</a> in Boston, MA. Nationals is one of the biggest and most exciting APO events where brothers from across the United States (and internationally!) gather to attend workshops and have fun, like our Sectionals but on major steroids. This event runs from December 27 to December 30 and costs $75 for actives (hotel room is $104/night for a double). If you want to go, you should <strong>start planning your trip and accomodations now.</strong> Also, if you go as one of our chapter's two voting-delegates, the chapter will pay for your trip. (Just remember to keep all of your receipts for reimbursements!)
		</p>
		<p style="margin-bottom: 1.5em">
			Lastly, the deadline to <a href="http://www.apo.org/show/Conferences_and_Events/National_Convention/How_to_Propose_Legislation">propose legislation for amendments to the National Bylaws</a> is September 28, 2008.
		</p>
		<p>-<a href="roster.php?function=Search&user_id=600">Geoffrey Lee (GAS)</a></p>
	</div>
<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>Congratulations to Kevin Wong, DSK Recipient</h2>
		<p class="date">May 12, 2008</p>
		<p style="margin-bottom: 1.5em">
			Tonight, Gamma Gamma awarded Kevin Wong with the chapter Distinguished Service Key, our chapter's highest award for brothers who embody and exemplify LFS. Kevin Wong pledged Joe Yang class in spring of 2001 as an undergraduate and has since served our chapter in more ways than imaginable. Throughout the years, he has served as Leadership Committee trainer, Membership VP, Service VP, and President. And despite all that, he still found the time to be a big-sib or parent each semester. Kevin is always willing to help others in times of need, and he hopes to dedicate his life to serving the community through non-profit work. His leadership in the chapter, caring for fellow brothers, and dedication to service is truly inspiring and deserving of our highest award. Congratulations, Kevin!
		</p>
		<p>-<a href="roster.php?function=Search&user_id=600">Geoffrey Lee (GAS)</a></p>
	</div>
<?php endif ?>
<a href="news_sp08.php">Older News ></a>
<?php
Template::print_body_footer();
Template::print_disclaimer();
?>
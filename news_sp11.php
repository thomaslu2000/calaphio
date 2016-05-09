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

<div class="newsItem">
	<h2>"Like" our new Facebook Page</h2>
	<p class="date">May 31, 2011</p>
	<p style="margin-bottom: 1.5em">Oh look, a Facebook "Like" button. I think you should click it.</p>
	<iframe src="http://www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fpages%2FAlpha-Phi-Omega-UC-Berkeley-Gamma-Gamma%2F127132677367569&amp;width=292&amp;colorscheme=light&amp;show_faces=true&amp;border_color&amp;stream=false&amp;header=false&amp;height=280" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:292px; height:300px;" allowTransparency="true"></iframe>
	<p>-<a href="roster.php?function=Search&user_id=600">Geoffrey Lee (GAS)</a></p>
</div>

<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>Fall 2011 Pledge Committee</h2>
		<p class="date">May 6, 2011</p>
		<p style="margin-bottom: 1.5em">Congratulations to the Fall 2011 P-Comm!</p>
		<p style="margin-bottom: 1.5em"><b>Leadership Trainers</b>: Celina Zeng and Tatiana Supnet<br/>
		<b>Fellowship Trainers</b>: Derrick Hau and Jessie Chen<br/>
		<b>Service Trainer</b>: Laura Lim<br/>
		<b>Finance Trainers</b>: Amul Kalia and Lizi Feng<br/>
		<b>Administrative Trainer</b>: Tony Le<br/>
		<b>Historian Trainer</b>: Aico Nguyen</p>
		
		<p>-<a href="roster.php?function=Search&user_id=979">Samantha Paras (WK)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>Banquet Follow-up</h2>
		<p class="date">May 5, 2011</p>
		<p style="margin-bottom: 1.5em">We hope everyone enjoyed Banquet! Make sure to thank banquet chairs for planning such a great event!</p>
		<p style="margin-bottom: 1.5em">Here are the slideshow and service video presented during Banquet:<br><br>
						<a href="http://www.youtube.com/user/linannie25?feature=mhum">Banquet Slideshow</a><br><br>
						<a href="http://www.youtube.com/watch?v=xo4rMASizrgn">KS Service Video</a>
						</p>
		
		<p>-<a href="roster.php?function=Search&user_id=1077">Edward Ho (JM)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>Banquet</h2>
		<p class="date">April 28, 2011</p>
		<p style="margin-bottom: 1.5em">Banquet will be next Monday, May 2nd.</p>
		<p style="margin-bottom: 1.5em">Please arrive at Spenger's Fish Grotto by 6:45 PM.</p>
		<p style="margin-bottom: 1.5em">Don't forget to dress nice and spiffy! And by spiffy I mean formal.</p><br>
		
		<p>-<a href="roster.php?function=Search&user_id=1077">Edward Ho (JM)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>CM 8 Stuff</h2>
		<p class="date">April 28, 2011</p>
		<p style="margin-bottom: 1.5em">Here's the stuff from CM8!<br><br>
		
		<a href="/documents/sp11/minutes_excomm7.docx">Excomm 7 Minutes</a><br><br>
		<a href="/documents/sp11/minutes_cm8.docx">CM 8 Minutes</a><br><br>
		<a href="/documents/sp11/stylus7.pdf">Stylus 7</a><br><br>
		</p>
		<p>-<a href="roster.php?function=Search&user_id=1077">Edward Ho (JM)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>Activation</h2><BR>
		Activation will be this Friday, April 22, 2011.<br><BR>
		Dress is Business Casual. Do not forget to bring an extra pair of clean underwear!<br><BR>
		</p>
		<p>-<a href="roster.php?function=Search&user_id=1172">Virginia Lieu (GL)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>Fall 2011 Executive Committee</h2>
		<p class="date">April 15, 2011</p>
		<p style="margin-bottom: 1.5em">Congratulations to the elected members of the Fall 2011 Executive Committee:</p>
		<p style="margin-bottom: 1.5em">
		<b>President</b> - Courtney McLaughlin<br />
		<b>Service VP</b> - Armand Cuevas<br />
		<b>Pledgemaster</b> - Christine Vu<br />
	        <b>Administrative VP</b> - Tomomasa Terazaki<br />
	        <b>Membership VP</b> - Bonnie Lee<br />
	        <b>Finance VP</b> - Michelle Chen<br />
	        <b>Fellowship VP</b> - Stanley Cheng<br />     
	        <b>Historian</b> - Peggy Chuang<br />
		</p>
		<p>-<a href="roster.php?function=Search&user_id=1077">Edward Ho (JM)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>CM 7 Stuff</h2>
		<p class="date">April 15, 2011</p>
		<p style="margin-bottom: 1.5em">Here's the stuff from CM7!<br><br>
		
		<a href="/documents/sp11/minutes_excomm6.docx">Excomm 6 Minutes</a><br><br>
		<a href="/documents/sp11/minutes_cm7.docx">CM 7 Minutes</a><br><br>
		<a href="/documents/sp11/stylus6_watermark.pdf">Stylus 6</a><br><br>
		<a href="http://www.megaupload.com/?d=C03BGMKB">CM7 Slideshow</a><br><br>

		
		<b>Caption Contest</b> [<a href="mailto:stylus@calaphio.com?subject=CM7 Caption">submit</a>]<br>
		<img src="/documents/sp11/cc_cm7.jpg" width=300 style="border:1px solid black"></a>
		</p>
		<p>-<a href="roster.php?function=Search&user_id=1077">Edward Ho (JM)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>GG Maniac!</h2>
		<p class="date">April 15, 2011</p>
		<p style="margin-bottom: 1.5em">GG Maniac goes to...<br>
		<p style="margin-bottom: 1.5em"><b>Celina Zeng and Tony Le!</b><br>

		<p style="margin-bottom: 1.5em">Celina Zeng: Celina is always ready to lend a helping hand and always willing to drive. Actives and pledges all know of her because her loud, friendly personality. She is especially known for her position in Stylus. Without her, Stylus would not have been as successful. Congrats, Celina! <br></p>

		<img src="/documents/sp11/gg_cm7_1.jpg" width=300 style="border:1px solid black"></a><br><br>

<p style="margin-bottom: 1.5em">Tony Le: Tony is always smiling and very easy to approach. He is a very responsible chair and always strives to do the best he can. Tony pledged JLC semester and shows much dedication to becoming and maintaining his standing as a good active.  Congrats, Tony!  <br></p>

		<img src="/documents/sp11/gg_cm7_2.jpg" width=300 style="border:1px solid black"></a><br><br>
		<p>-<a href="roster.php?function=Search&user_id=1077">Edward Ho (JM)</a></p>
	</div>
<?php endif ?>


<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>Read me</h2>
		<p class="date">April 12, 2011</p>
		<p style="margin-bottom: 1.5em">Your fellow brothers have submitted their <a href="sp11platforms.php">Spring 2011 ExComm Election Platforms</a>. Please show them respect by reviewing their platforms carefully so that you may be an informed voter.</p>
		<p>-<a href="roster.php?function=Search&user_id=1077">Edward Ho (JM)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>IC Luau & Thank You Banquet</h2>
		<p><b><br>IC Luau</b><br><br>
		Sign up for IC Luau this Saturday, April 9, at Kvamme Atrium, Rm 300, in Sudartja Hall. <br><br>
		The event costs $5 for Gamma Gamma members and lasts from 6pm to 9:30pm. <br><br>
		Come chill with brothers from other chapters while eating delicious food!<br><br><br>
		</p>
		<p><b>Thank You Banquet</b><br><Br>
		Just a reminder to pledges and actives that this Sunday is Thank You Banquet. <Br><br>
		Pledges, it's your chance to show your bigs / aunts / uncles / parents your appreciation!<br><br><br>
		</p>
		<p>-<a href="roster.php?function=Search&user_id=1172">Virginia Lieu (GL)</a></p>
	</div>
<?php endif ?>


<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>CM 6 Stuff</h2>
		<p class="date">April 1, 2011</p>
		<p style="margin-bottom: 1.5em">Here's the stuff from CM6!<br><br>
		
		<a href="/documents/sp11/minutes_excomm5.docx">Excomm 5 Minutes</a><br><br>
		<a href="/documents/sp11/minutes_cm6.docx">CM 6 Minutes</a><br><br>
		<a href="/documents/sp11/stylus5_watermark.pdf">Stylus 5</a><br><br>
		<a href="
http://www.megaupload.com/?d=13C8HHT4">CM6 Slideshow</a><br><br>
				<b>Caption Contest</b> [<a href="mailto:stylus@calaphio.com?subject=CM6 Caption">submit</a>]<br>
		<a href="
http://i1141.photobucket.com/albums/n597/ksspring11/Chipotle%20Speed%20Eating%20Competition-Hye%20Yoo/IMG_2609.jpg"><img src="/documents/sp11/cc_cm6.jpg" width=300 style="border:1px solid black"></a><br><Br>
Tomorrow is Campout! It is now $20!<br>
Sign up on the calendar if you are still planning to go. <br>
Meet at 10am at Underhill tomorrow and if you have any campout materials, like coolers and lamps, please let us borrow them! 
		
</p>
		<p>-<a href="roster.php?function=Search&user_id=1172">Virginia Lieu (GL)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>Active Spotlight!</h2>
		<p class="date">March 17, 2011</p>
		<p style="margin-bottom: 1.5em">Active Spotlight goes to...<br>
		<p style="margin-bottom: 1.5em"><b>Celina Zeng!</b><br>

		<p style="margin-bottom: 1.5em">Celina is currently a Pimps Ahoy big and Stylus Chair!  She has chaired countless events and has stepped up as a great leader and friend with her positive attitude.  Congrats, Celina!<br></p>

		<a href="http://calaphio.smugmug.com/JLC/Fellowship/Fall-Fellowship/IMG9813/1090822651_PoUia-XL.jpg"><img src="/documents/sp11/as_cm5.jpg" width=300 style="border:1px solid black"></a>
		<p>-<a href="roster.php?function=Search&user_id=1077">Edward Ho (JM)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>CM 5 Stuff</h2>
		<p class="date">March 11, 2011</p>
		<p style="margin-bottom: 1.5em">Here's the stuff from CM5!<br><br>
		
		<a href="/documents/sp11/minutes_excomm4.docx">Excomm 4 Minutes</a><br<br>
		<a href="/documents/sp11/minutes_cm5.docx">CM 5 Minutes</a><br><br>
		<a href="/documents/sp11/stylus4_watermark.pdf">Stylus 4</a><br><br>
		
		<b>Caption Contest</b> [<a href="mailto:stylus@calaphio.com?subject=CM5 Caption">submit</a>]<br>
		<a href="http://a3.sphotos.ak.fbcdn.net/hphotos-ak-snc6/196597_10150124748245009_628735008_6958798_6566381_n.jpg"><img src="/documents/sp11/cc_cm5.jpg" width=300 style="border:1px solid black"></a>
		</p>
		<p>-<a href="roster.php?function=Search&user_id=1077">Edward Ho (JM)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>CM 4 Stuff</h2>
		<p class="date">March 1, 2011</p>
		<p style="margin-bottom: 1.5em">Here's the stuff from CM4!<br><br>
		
		<a href="/documents/sp11/minutes_excomm3.docx">Excomm 3 Minutes</a><br<br>
		<a href="/documents/sp11/minutes_cm4.docx">CM 4 Minutes</a><br><br>
		<a href="/documents/sp11/stylus3_watermark.pdf">Stylus 3</a><br><br>
		
		<b>Caption Contest</b> [<a href="mailto:stylus@calaphio.com?subject=CM4 Caption">submit</a>]<br>
		<a href="http://a4.sphotos.ak.fbcdn.net/hphotos-ak-snc6/183015_10150137726725656_512430655_8548444_3969700_n.jpg47_2088019_n.jpg"><img src="/documents/sp11/cc_cm4.jpg" width=300 style="border:1px solid black"></a>
		</p>
		<p>-<a href="roster.php?function=Search&user_id=1172">Virginia Lieu (GL)</a></p>
	</div>
<?php endif ?>


<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>CM 3 Stuff</h2>
		<p class="date">February 10, 2011</p>
		<p style="margin-bottom: 1.5em">Here's the stuff from CM3!<br><br>
		
		<a href="/documents/sp11/minutes_excomm2.docx">Excomm 2 Minutes</a><br<br>
		<a href="/documents/sp11/minutes_cm3.docx">CM 3 Minutes</a><br><br>
		<a href="/documents/sp11/stylus2_watermark.pdf">Stylus 2</a><br><br>

		<b>Caption Contest</b> [<a href="mailto:stylus@calaphio.com?subject=CM3 Caption">submit</a>]<br>
		<a href="http://a5.sphotos.ak.fbcdn.net/hphotos-ak-snc6/167163_10150089148342758_717892757_6262047_2088019_n.jpg"><img src="/documents/sp11/cc_cm3.jpg" style="border:1px solid black"></a>
		</p>
		<p>-<a href="http://i1216.photobucket.com/albums/dd369/KSeaster/OH-NO-YOU-FOUND-ME-NOT-UMAD.jpg">Edward Ho (JM)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>CM 2 Stuff</h2>
		<p class="date">February 5, 2011</p>
		<p style="margin-bottom: 1.5em">Here's the stuff from CM2!<br><br>
		
		<a href="/documents/sp11/minutes_excomm1.docx">Excomm 1 Minutes</a><br<br>
		<a href="/documents/sp11/minutes_cm2.docx">CM 2 Minutes</a><br><br>
		<a href="/documents/sp11/stylus1_watermark.pdf">Stylus 1</a><br><br>

		<b>Caption Contest</b> [<a href="mailto:stylus@calaphio.com?subject=CM2">submit</a>]<br>
		<a href="http://sphotos.ak.fbcdn.net/hphotos-ak-ash1/hs734.ash1/162798_482639275905_606985905_6447071_7250518_n.jpg"><img src="/documents/sp11/cc_cm2.jpg" style="border:1px solid black"></a>
		</p>
		<p>-<a href="roster.php?function=Search&user_id=979">Samantha Paras (WK)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
	<div class="newsItem">
		<h2>Secret SmugMug</h2>
		<p class="date">January 25, 2010</p>
		<p style="margin-bottom: 1.5em">Actives, here is the new SmugMug login:</p>
		<p style="margin-bottom: 1.5em">
			<a href="http://www.smugmug.com">http://www.smugmug.com</a><br />
			Email: admin-vp@calaphio.com<br />
			Password: GammaGamma11
		</p>
		<p style="margin-bottom: 1.5em">Remember to keep this a secret from pledges!</p>
		<p>-<a href="roster.php?function=Search&user_id=979">Samantha Paras (WK)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>CM 1 Stuff</h2>
		<p class="date">January 24, 2011</p>
		<p style="margin-bottom: 1.5em">Sorry for the delay... here's the stuff from CM1!<br><br>
		
		<a href="/documents/sp11/minutes_cm1.docx">CM 1 Minutes</a><br><br>

		<b>Caption Contest</b> [<a href="mailto:stylus@calaphio.com?subject=CM1">submit</a>]<br>
		<a href="http://sphotos.ak.fbcdn.net/hphotos-ak-ash1/hs888.ash1/179669_10150128394206271_542346270_8229490_6250935_n.jpg"><img src="/documents/sp11/cc_cm1.jpg" style="border:1px solid black"></a>
		</p>
		<p>-<a href="roster.php?function=Search&user_id=979">Samantha Paras (WK)</a></p>
	</div>
<?php endif ?>

	<div class="newsItem">
		<h2>Congratulations to Katherine Strausser!</h2>
		<p class="date">January 24, 2011</p>
		<p style="margin-bottom: 1.5em">Katherine (Katie) Ann Strausser has been elected our Spring 2011 namesake. Congratulations Katie!</p>
		<p style="margin-bottom: 1.5em">Katie pledged Alpha Phi Omega at Kappa Chapter at Carnegie Mellon University in the Fall of 2003 (RH semester).  She decided to pledge after having spent the previous 3 summers as a counselor at a Boy Scout camp.  Having seen the impact that scouting could have on the lives of young men, she was seeking to continue her involvement with the Boy Scouts in college.  Alpha Phi Omega offered both involvement with scouting and service opportunities.</p>
		<p style="margin-bottom: 1.5em">During her time at Kappa Chapter, Katie served the chapter as Service VP, Membership VP, Pledgemaster, President, and Sectionals Convention Chair.  Her involvement in scouting continued as a merit badge counselor for Kappa’s annual Boy Scout Merit Badge University (MBU) and a counselor for their Girl Scout Scouting College and Interest Project (SCIP) day.  She eventually took over as the chair of MBU for two years.  Katie also had the opportunity to be involved in APO’s involvement in scouting at the National Convention in Louisville where she served as chair of the Scouting & Youth Services Committee. She was also elected as the Kappa Chapter Alumni Association President, an office she held for 2 years.</p> 
		<p style="margin-bottom: 1.5em">Katie was awarded the Leadership in Service award from Kappa Chapter in 2005 and the Kappa Chapter Distinguished Service Key in May 2008.</p> 
		<p style="margin-bottom: 1.5em">After graduation from Carnegie Mellon, Katie became a brother at Gamma Gamma. During her time at Gamma Gamma, Katie became a big, started Dinner for the Poor, chaired GG sewing, was a voting delegate at 2010 Nationals, and became a LEADS presenter.</p>
		<p>-<a href="roster.php?function=Search&user_id=979">Samantha Paras (WK)</a></p>
	</div>


<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>New Semester, New Budget!</h2>
		<p class="date">January 17, 2011</p>
		<p style="margin-bottom: 1.5em">In preparation for CM1, click <a href="/documents/sp11/budget.pdf">here</a> to read over the budget!
		</p>
		<p>-<a href="roster.php?function=Search&user_id=979">Samantha Paras (WK)</a></p>
	</div>
<?php endif ?>

<a href="news_fa10.php">Older News ></a>
<?php
Template::print_body_footer();
Template::print_disclaimer();
?>

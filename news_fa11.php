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

<!--
<?php if (!$g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>Regionals X 2012 Final Forms!!!</h2>
		<p class="date">January 08, 2011</p>
		<p style="margin-bottom: 1.5em">

<iframe src="https://docs.google.com/spreadsheet/embeddedform?formkey=dDM0ZU1YcWEySXNTZnlLcDZoUERsZXc6MQ" width="680" height="600" frameborder="0" marginheight="0" marginwidth="0">Loading...</iframe>

		</p>
		<p>-<a href="roster.php?function=Search&user_id=1190">Tomomasa Terazaki (GL)</a></p>
	</div>
<?php endif ?>

<?php if (!$g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>Regionals X 2012: Announcements!</h2>
		<p class="date">December 30, 2011</p>
		<p style="margin-bottom: 1.5em">
		<b>Participating in Roll Call?:</b><br>
		Fill out this <a href="https://docs.google.com/spreadsheet/viewform?formkey=dHBIMEVRcTJvc2hNMjNic0ItUEtubGc6MQ" target="_blank">Google Form</a><br>
		<br>
		<b>Registration:</b><br>
		Registration is done!<br>
		<br>
		<b>In One Week!</b>:<br>
		We can't wait to see all of you!<br>
		</p>
		<p>-<a href="roster.php?function=Search&user_id=1190">Tomomasa Terazaki (GL)</a></p>
	</div>
<?php endif ?>

<?php if (!$g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>Regionals X 2012 Pages</h2>
		<p class="date">December 8, 2011</p>
		<p style="margin-bottom: 1.5em">	
		<b>Homepage</b>:<br>
		<a href="http://www.wix.com/regionalsx2012/regionalsx2012#!" target="_blank">http://www.wix.com/regionalsx2012/regionalsx2012#!</a><br>
		<br>
		<b>Have Food Allergies?</b> <br>
		<a href="https://docs.google.com/spreadsheet/viewform?formkey=dGtEVnRTSm8yRVBpMHFPNXhvWmtuMXc6MQ#gid=0" target="_blank">Write what you can't eat here</a><br/>
		</p>
		<p>-<a href="roster.php?function=Search&user_id=1190">Tomomasa Terazaki (GL)</a></p>
	</div>
<?php endif ?>
-->

<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>Spring 2012 Pledge Committee</h2>
		<p class="date">December 7, 2011</p>

		<p style="margin-bottom: 1.5em">Congratulations to the Spring 2012 P-Comm!</p>
		<p style="margin-bottom: 1.5em">
		<b>Leadership Trainers</b>: Mindy Chu and Tonia Tran<br/>
		<b>Fellowship Trainers</b>: Minnie Dasgupta and Susana Lau Lui<br/>
		<b>Service Trainer</b>: Rachel Palmer<br/>
		<b>Finance Trainers</b>: Jenny Muliawan and Jason Tran<br/>
		<b>Administrative Trainer</b>: Joey Chen<br/>
		<b>Historian Trainer</b>: Angela Chan
		</p>
		
		<p>-<a href="roster.php?function=Search&user_id=1190">Tomomasa Terazaki (GL)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>Banquet Slideshow!</h2>
		<p class="date">December 7, 2011</p>

		<a href="http://www.youtube.com/watch?v=QQ04AIpSLi0">YouTube Link: Banquet Slideshow</a>. <b>I recommend you watching it on <a href="http://www.youtube.com/watch?v=QQ04AIpSLi0">YouTube with fullscreen</a></b> because it is beautiful : ) But if the music is taken away due to copyright issues, watch it here!<br>
<br>
		<a href="/documents/fa11/Fall2011BanquetSlideShow.mp4">Banquet Slideshow</a><br>
		<br>
		</p>
		<p>-<a href="roster.php?function=Search&user_id=1190">Tomomasa Terazaki (GL)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>CM8 Recap & End of Semester Forum</h2>
		<p class="date">December 7, 2011</p>
		<p style="margin-bottom: 1.5em">Here are the stuff from CM8 & End of Semester Forum if you missed it!<br><br>

		<a href="/documents/fa11/CM8-Minutes.pdf">CM8 Minutes</a><br>
		<a href="/documents/fa11/ExComm-Meeting-8.pdf">ExComm Meeting 8</a><br>
		<a href="/documents/fa11/EndOfSemesterForum.pdf">End of Semester Forum</a><br>

		</p>
		<p>-<a href="roster.php?function=Search&user_id=1190">Tomomasa Terazaki (GL)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>GG Maniac #3</h2>
		<p class="date">December 1, 2011</p>
		<p style="margin-bottom: 1.5em">Please Congratulate <b>Toshiki Nakashige</b> for winning GG Maniac!<br><br>

		Toshiki is very involved as a big for VVV this semester. He did 41 service hours. He is the Photographer Chair and takes a lot of great pictures for the chapter. Puts up a lot of awesome, very elaborate, and well prepared fellowships like Basics of DSLR Camera and APhiOtoshoot! Good luck as our chapter Historian next semester!<br><br>

		<img src="/documents/fa11/ggm3.jpg" width=250 style="border:1px solid black"><br>

		</p>
		<p>-<a href="roster.php?function=Search&user_id=1190">Tomomasa Terazaki (GL)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>ACTIVES! Finish Your Requirements + PComm & Rush Applications!</h2>
		<p class="date">November 23, 2011</p>
		<p style="margin-bottom: 1.5em">Actives! Don't forget that you need to <font color="red">finish all your requirements</font> before CM 8 on November 29th, 2011 which is next Tuesday! If you still do not have your <font color="red">fundraiser requirement</font> done, don't forget that you can do the basketball game fundraisers on December 7th or December 11th and still get your fundraiser credit for this semester. For other requirements, you MUST FINISH them before CM 8!<br>
		<br>
		Also, if you are applying for next semester's Pledge Committee, do not forget that the <font color="red">PComm Application</font> is also due on the same day. You need to print out your application and give it to Armand Cuevas before CM 8 starts. <br>
		<br>
		Another reminder! The <font color="red">Rush Chair Application</font> is due the day after CM 8 so Wednesday, November 30th, 2011.  
		</p>
		<p>-<a href="roster.php?function=Search&user_id=1190">Tomomasa Terazaki (GL)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>Good Luck Pledges!</h2>
		<p class="date">November 21, 2011</p>
		<p style="margin-bottom: 1.5em">Pledge Test is Tonight! Good Luck CPZ Pledges!
		</p>
		<p>-<a href="roster.php?function=Search&user_id=1190">Tomomasa Terazaki (GL)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>GG Maniac #2</h2>
		<p class="date">November 17, 2011</p>
		<p style="margin-bottom: 1.5em">Please Congratulate <b>Tonia Tran</b> for winning GG Maniac!<br><br>

		Tonia has done lots of service this semester and she is close of having 100 hours right now. She chaired big events like IC Basketball and IC Cookoff this semester. You see Tonia almost at every APO event so if you see her please praise her for all the time she puts for our chapter.<br><br>

		<img src="/documents/fa11/ggm2.jpg" width=250 style="border:1px solid black"><br>

		</p>
		<p>-<a href="roster.php?function=Search&user_id=1190">Tomomasa Terazaki (GL)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>CM7 Recap</h2>
		<p class="date">November 17, 2011</p>
		<p style="margin-bottom: 1.5em">Here are the stuff from CM7!<br><br>

		<a href="/documents/fa11/CM7-Minutes.pdf">CM7 Minutes</a><br>
		<a href="/documents/fa11/ExComm-Meeting-7.pdf">ExComm Meeting 7</a><br>
		<a href="/documents/fa11/stylusCM7.pdf">CM7 Stylus</a><br>
		<a href="/documents/fa11/ElectionPlatformCM7.pdf">Election Platforms</a><br><br>

		<b>Caption Contest</b> [<a href="mailto:stylus@calaphio.com?subject=CM7 Caption">submit stylus@calaphio.com</a>]<br>
		<img src="/documents/fa11/cc6.jpg" width=250 style="border:1px solid black"></a>

		</p>
		<p>-<a href="roster.php?function=Search&user_id=1190">Tomomasa Terazaki (GL)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>Spring 2012 Executive Committee</h2>
		<p class="date">November 16, 2011</p>
		<p style="margin-bottom: 1.5em">Congratulations to the elected members of the Spring 2012 Executive Committee:</p>
		<p style="margin-bottom: 1.5em">
		<b>President</b> - Stanley Cheng<br />
		<b>Service VP</b> - Nicki Nario<br />
		<b>Pledgemaster</b> - Armand Cuevas<br />
	        <b>Administrative VP</b> - MK Kim<br />
	        <b>Membership VP</b> - Derrick Hau<br />
	        <b>Finance VP</b> - Jamie Hum<br />
	        <b>Fellowship VP</b> - Amul Kalia<br />     
	        <b>Historian</b> - Toshiki Nakashige<br />
		</p>
		<p>-<a href="roster.php?function=Search&user_id=1190">Tomomasa Terazaki (GL)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>Please Read: Fall 2011 Election Platforms</h2>
		<p class="date">November 9, 2011</p>
		<p style="margin-bottom: 1.5em">Your fellow brothers have submitted their <a href="fa11platforms.php">Fall 2011 ExComm Election Platforms</a>. Please show them respect by reviewing their platforms carefully so that you may be an informed voter.<br>
		<br>
		<font color="red">Nov. 15 UPDATED</font>: Added Connie Yang's platform for Finance Vice President<br>
                <font color="red">Nov. 15 UPDATED</font>: Modified Hanh Nguyen's platform for Fellowship Vice President<br>
                <font color="red">Nov. 15 UPDATED</font>: Added Janice Chan's platform for Fellowship Vice President<br>
                <font color="red">Nov. 15 UPDATED</font>: Modified Michelle Chen's platform for Pledgemaster<br>
                <font color="red">Nov. 15 UPDATED</font>: Added Armand Cuevas' platform for Pledgemaster<br>
                <font color="red">Nov. 15 UPDATED</font>: Modified Amul Kalia's platform for Fellowship Vice President<br>
                <font color="red">Nov. 15 UPDATED</font>: Added Michelle Chen's platform for Pledgemaster<br>
                <font color="red">Nov. 15 UPDATED</font>: Added Hanh Nguyen's platform for Fellowship Vice President<br>
                <font color="red">Nov. 15 UPDATED</font>: Modified Stanley Cheng's platform for President<br>
                <font color="red">Nov. 15 UPDATED</font>: Added Amul Kalia's platform for Fellowship Vice President<br>
		<font color="red">Nov. 13 UPDATED</font>: Added Derrick Hau's platform for Membership Vice President<br>
		<font color="red">Nov. 12 UPDATED</font>: Added Nicki Nario's platform for Service Vice President<br>
		<font color="red">Nov. 10 UPDATED</font>: Added Stanley Cheng's platform for President<br>
		<font color="red">Nov. 09 UPDATED</font>: Added Toshiki Nakashige's platform for Historian</p>
		<p>-<a href="roster.php?function=Search&user_id=1289">Benjamin Le (KS)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>Send Your Election Platforms</h2>
		<p class="date">November 7, 2011</p>
		<p style="margin-bottom: 1.5em"> 
		If you are interested in running for one of the ExComm positions, we highly recommend you to send in your election platform. Write out your ideas on how to make next semester better. Don't forget that you can run for any position even if you didn't accept during Nominations. Also, please come talk to the current ExComm members if you have any question about our positions.<br>
		<br>
		Send your election platform to <a href="mailto:admin-vp@calaphio.com, benjaminhoanle@gmail.com?subject=Election Platform">admin-vp@calaphio.com, benjaminhoanle@gmail.com</a>.<br>
		<br>
		<br>
		<br>
		Don't forget about Caption Contest<br>
		[<a href="mailto:stylus@calaphio.com?subject=CM6 Caption">submit stylus@calaphio.com</a>]<br>
		<img src="/documents/fa11/cc5.jpg" width=200 style="border:1px solid black"></a>
		</p>
		<p>-<a href="roster.php?function=Search&user_id=1190">Tomomasa Terazaki (GL)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>Talent Show is Friday!</h2>
		<p class="date">November 2, 2011</p>
		<p style="margin-bottom: 1.5em"> 
		Talent Show is this Friday from 7:00 PM to 10:00 PM at 60 Evans. <br>
		<br>
		<a href="https://docs.google.com/spreadsheet/viewform?formkey=dG9GcURkZjMtbWpZSWpFOXFhWGJoLXc6MQ" target="_blank">SUBMIT YOUR ACTS HERE!</a><br>
		<br>
		Remember that priority goes to live acts, then to order of submission so submit ASAP! If it goes past 10:00 PM, your media presentation might not be played. PERFORMANCES SHOULD BE 3-4 MINUTES LONG.
		</p>
		<p>-<a href="roster.php?function=Search&user_id=1190">Tomomasa Terazaki (GL)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>Active Spotlight #3!</h2>
		<p class="date">November 2, 2011</p>
		<p style="margin-bottom: 1.5em">Please Congratulate <b>Jamie Hum</b> for winning Active Spotlight!<br><br>
		
		Jamie pledged Alpha Phi Omega JM semester and she is still around after 2 years! She was a big during GL semester and is serving as an Aunt of TGE now! She stood up and volunteered for Eshelman surge. She continues to do numerous amounts of service & chairing Showcase this semester! Good Job Jamie!<br>
		<br>
		<img src="/documents/fa11/as3.jpg" width=300 style="border:1px solid black"><br>
		</p>
		<p>-<a href="roster.php?function=Search&user_id=1190">Tomomasa Terazaki (GL)</a></p>
	</div>
<?php endif ?>


<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>CM6 Recap</h2>
		<p class="date">November 2, 2011</p>
		<p style="margin-bottom: 1.5em">In case you didn't get one, but you want to read it.<br><br>

		<a href="/documents/fa11/CM6-Minutes.pdf">CM6 Minutes</a><br>
		<a href="/documents/fa11/ExComm-Meeting-6.pdf">ExComm Meeting 6</a><br>
		<a href="/documents/fa11/stylusCM6.pdf">CM6 Stylus</a><br><br>

		<font color="red">PLEDGES!</font> Check how to get <a href="cpz_excomm.php">ExComm Signatures here</a>. Don't forget to go to our Office Hours!<br><br>	

		<b>Caption Contest</b> [<a href="mailto:stylus@calaphio.com?subject=CM6 Caption">submit stylus@calaphio.com</a>]<br>
		<img src="/documents/fa11/cc5.jpg" width=400 style="border:1px solid black"></a>

		</p>
		<p>-<a href="roster.php?function=Search&user_id=1190">Tomomasa Terazaki (GL)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>CM6 is Nominations</h2>
		<p class="date">October 31, 2011</p>
		<p style="margin-bottom: 1.5em">
		CM6 is going to be held at 159 Mulford @ 7:00 PM tomorrow (don't be late). <br>
		<br>
		Don't forget that CM6 is <font color="red">Nominations</font>. Think about who you want to nominate beforehand so the process will run smoothly. For your information, CPZ Pledges CAN nominate actives BUT CAN'T nominate other CPZ Pledges.<br>
		<br>
		Also, <font color="red">Regionals</font> price goes up on Nov. 5th, which means CM6 is the last CM before that deadline. We will accept checks. <a href="regionalsx2012.php">CHECK HERE FOR REGIONALS INFO</a><br>
		</p>
		<p>-<a href="roster.php?function=Search&user_id=1190">Tomomasa Terazaki (GL)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>Fall Fellowship! GO GO GO GAMMA GAMMA!</h2>
		<p class="date">October 27, 2011</p>
		<p style="margin-bottom: 1.5em">
		If you are going to Fall Fellowship, watch this video and practice your GG Cheer! Show our chapter spirit!<br>
		<br>
		<iframe width="420" height="315" src="http://www.youtube.com/embed/KfyMddd0G9E" frameborder="0" allowfullscreen></iframe><br>
		<br>
		Our other cheers are: <br>
		<br>
		1. <font color="blue">Boys: GG What?</font><br>
		<font color="red">Girls: GG Who?</font><br>
		<b>Everyone</b>: GG Gamma Gamma! That's Who!<br>
		<br>
		2. <font color="blue">A: Gamma!</font><br>
		<font color="red">B: GAMMA GAMMA GAMMA!</font> (Pacman pose)<br>
		(repeat)<br>
		<br>
		3. <font color="blue">A: You know it?</font><br>
		<font color="red">B: What?</font><br>
		<font color="blue">A: We're Gamma Gamma!</font><br>
		<font color="red">B: YEA!</font><br>
		<b>Everyone</b>: You tell the whole damn world that we like to go bananas.<br>
		Bananas yea yea Bananas yea yea Bananas (while doing the Bananas Dance)<br>
		<br>
		Also don't forget to advertise <font size="4" color="red">Regionals</font> because the ticket price will increase after November 05th!
		</p>
		<p>-<a href="roster.php?function=Search&user_id=1190">Tomomasa Terazaki (GL)</a></p>
	</div>
<?php endif ?>

<!--
<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
	<h2>CM6 Stylus: Movie Theme!</h2>
	<p class="date">October 24, 2011</p>
	<iframe src="https://docs.google.com/spreadsheet/embeddedform?formkey=dHZ2MU00WWpraTNPa1RyZkRyR0ZxaUE6MQ" width="700" height="400" frameborder="0" marginheight="0" 	marginwidth="0">Loading...</iframe>
	<br>
	<br>
	If you can't answer the survey for some reason, <a href="https://docs.google.com/spreadsheet/viewform?formkey=dHZ2MU00WWpraTNPa1RyZkRyR0ZxaUE6MQ" target="_blank">DO IT HERE</a> and answer the survey :)
	<br>
	<br>
	<p>-<a href="roster.php?function=Search&user_id=1190">Tomomasa Terazaki (GL)</a></p>
	</div>
<?php endif ?>
-->

<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>CM5 Recap</h2>
		<p class="date">October 20, 2011</p>
		<p style="margin-bottom: 1.5em">Here are the stuff from CM5!<br><br>

		<a href="/documents/fa11/CM5-Minutes.pdf">CM5 Minutes</a><br>
		<a href="/documents/fa11/ExComm-Meeting-5.pdf">ExComm Meeting 5</a><br>
		<a href="/documents/fa11/Mid-Semester-Forum-Minutes.pdf">Mid-Semester Forum Minutes</a><br>
		<a href="/documents/fa11/stylusCM5.pdf">CM5 Stylus</a><br><br>

		<font color="red">PLEDGES!</font> Check how to get <a href="cpz_excomm.php">ExComm Signatures here</a>. Don't forget to go to our Office Hours!<br><br>	

		<b>Caption Contest</b> [<a href="mailto:stylus@calaphio.com?subject=CM5 Caption">submit stylus@calaphio.com</a>]<br>
		<img src="/documents/fa11/cc4.jpg" width=400 style="border:1px solid black"></a>
		</p>
		<p>-<a href="roster.php?function=Search&user_id=1190">Tomomasa Terazaki (GL)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>Broomball!</h2>
		<p class="date">October 13, 2011</p>
		<p style="margin-bottom: 1.5em"> Don't forget that Broomball is coming up soon!<br><br>

		- Saturday, October 15th at 6:45 PM<br>
		- Meet at Underhill Parking Lot<br>
		- Price: $20<br>
		- Location: Oakland Ice Rink<br>
		- See family Representative for details<br>
		- Theme is Good (TGE) vs Bad (Swag Wagon)<br>
		- Email <a href="mailto:cpz-funcomm@googlegroups.com?subject=Broomball">cpz-funcomm@googlegroups.com</a> for more information<br>
		</p>
		<p>-<a href="roster.php?function=Search&user_id=1190">Tomomasa Terazaki (GL)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>List of Chairs and Committees</h2>
		<p class="date">October 12, 2011</p>
		<p style="margin-bottom: 1.5em"> Actives and Pledges. If you want to join a committee to fulfill your requirement, <a href="cpz_chairs.php">search for one here</a>. It has a list of all the chairs, and the positions that look like <font color="red">* This</font> mean that there are committees for those positions. 
		</p>
		<p>-<a href="roster.php?function=Search&user_id=1190">Tomomasa Terazaki (GL)</a></p>
	</div>
<?php endif ?>

<!--
<?php if (!$g_user->is_logged_in()): ?>
<div class="newsItem">
	<h2>Regionals 2012: Hosted by Gamma Gamma & Zeta!</h2>
	<p class="date">October 11, 2011</p>
	<p style="margin-bottom: 1.5em">Hello Region X IC Brothers!<br>
	<br>
	This is a message from our President, Courtney McLaughlin.<br>
	<br>
	Brothers,<br>
	<br>
	On behalf of the Gamma Gamma and Zeta chapters, I would like to cordially invite you to the 21st biannual <font size="3" color="blue">Region X Conference to be held January 13-15, 2012 at the University of California, Berkeley.</font> <br>
	<br>
	We have been planning and preparing since spring, so you are guaranteed to have a weekend full of activities and IC brotherhood. 
For now we have just a few things to tell you about Regionals 2012! <br>
	<br>
	The theme is... <font size="3" color="purple">New York City!</font> We will be living it up in the bay area, Big Apple style. <br>
	<br>
	Housing will be provided with Gamma Gamma brothers if you would like (just designate so when you register!), or we have a recommended list of hotels on our website that you can make reservations at. <br>
	<br>
	The conference will begin on Friday at 1pm, and end Sunday at 4pm. However, we know that some of you have classes on Friday, so we will hold the opening ceremony on Saturday morning. We will have check-in open all day Friday while the events of the day go on. <br>
	<br>
	We will be hosting a ROLL CALL during lunchtime on Saturday; we hope every chapter will bring their game for this great regional tradition!<br>
	<br>
	Our website is now up and running! You can check out the schedule, places to stay and FAQ, as well as <font color="red">register for the conference!</font> <br>
	<br>
	Banquet will have a limited number of seats, so register early if you want to guarantee a spot!<br>
	<br>
	Check out our <a href="http://www.wix.com/regionalsx2012/regionalsx2012#!" target="_blank"><font size="4" color="red"><u>Regionals 2012 WEBSITE HERE</u></font></a> for more info!<br>
	<br>
	Payment will include a T-shirt and souvenir, breakfast on Saturday and Sunday, lunch on Saturday, and all of the workshops, roundtables, fellowships, service projects and big events traditional to Regional conferences we can pack in. The banquet + conference cost includes all of the above, plus a fabulous banquet Saturday night held at the International House at UC Berkeley. <br>
	<br>
	Costs are as follows: <br>
	<font size="4" color="blue">Until Nov. 5th: $45 w/o banquet, $60 w/ banquet.</font><br>
	Nov. 5th-Dec. 5th: $55 w/o banquet, $70 w/ banquet. <br>
	Dec. 5th-Jan. 5th: $65 w/o banquet, $80 w/ banquet. <br>
	<br>
	Please e-mail us with any thoughts, questions or concerns at <a href="mailto:regionalsx2012chairs@gmail.com?subject=Regionals 2012 Question">regionalsx2012chairs@gmail.com</a>.<br>
	<br>
	We are so excited to see you all in January! <br>
	<br>
	In Leadership, Friendship and Service,<br> 
	<br>
	The Region X Regionals 2012 chairs
	</p>
	<p>-<a href="roster.php?function=Search&user_id=190">Tomomasa Terazaki (GL)</a></p>
</div>
<?php endif ?>
-->

<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>CM4 Recap</h2>
		<p class="date">October 7, 2011</p>
		<p style="margin-bottom: 1.5em">Here are the stuff from CM4!<br><br>
		
		<a href="/documents/fa11/CM4-Minutes.docx">CM4 Minutes</a><br>
		<a href="/documents/fa11/ExComm-Meeting-4.docx">ExComm Meeting 4</a><br>
		<a href="/documents/fa11/stylusCM4.pdf">CM4 Stylus</a><br><br>

		<b>Caption Contest</b> [<a href="mailto:stylus@calaphio.com?subject=CM4 Caption">submit stylus@calaphio.com</a>]<br>
		<img src="/documents/fa11/cc3.jpg" width=200 style="border:1px solid black"></a>
		</p>
		<p>-<a href="roster.php?function=Search&user_id=1190">Tomomasa Terazaki (GL)</a></p>
	</div>
<?php endif ?>


<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
	<div class="newsItem">
		<h2>Upload to SmugMug!</h2>
		<p class="date">October 7, 2011</p>
		<p style="margin-bottom: 1.5em">Actives, upload all your APO photos to SmugMug! <b>Don't worry! The Pledges cannot see this</b>:</p>
		<p style="margin-bottom: 1.5em">
			<a href="http://www.smugmug.com">http://www.smugmug.com</a><br />
			Email: admin-vp@calaphio.com<br />
			Password: GammaGamma11
		</p>
		<p style="margin-bottom: 1.5em">Remember to keep this a secret from the pledges!</p>
		<p>-<a href="roster.php?function=Search&user_id=1190">Tomomasa Terazaki (GL)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in() && $g_user->is_pledge()): ?>
	<div class="newsItem">
		<h2>ExComm Signatures</h2>
		<p class="date">October 7, 2011</p>
		<p style="margin-bottom: 1.5em">You can check how to get <a href="cpz_excomm.php">ExComm Signatures here</a>.		
		</p>
		<p>-<a href="roster.php?function=Search&user_id=1190">Tomomasa Terazaki (GL)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>Active Spotlight #2 & GG Maniac #1!</h2>
		<p class="date">October 5, 2011</p>
		<p style="margin-bottom: 1.5em">Please Congratulate <b>Hobart Lai</b> for winning Active Spotlight and <b>Nicki Nario</b> for winning GG Maniac!<br><br>
		
		Hobart has Bigged five times, Uncled once, and now he is a Big Fam Parent for The Great Explorer! He pledged CC Semester but he continues to be a visible member of our chapter. He is one of the first people to sign up for Fall Fellowship and he devotes countless hours of service! Congratulations Hobart!<br><br>

		<img src="/documents/fa11/as2.jpg" width=200 style="border:1px solid black"><br><br>

		Nicki already has over 120 hours of service and chaired 1/3 of the whole service projects. She also stepped up a lot as rush chair this semester among other responsibilities. She helped us find a service project. She is always very enthusiastic and fun to talk to so please congratulate Nicki!<br><br>

		<img src="/documents/fa11/ggm1.jpg" width=200 style="border:1px solid black"><br>

		</p>
		<p>-<a href="roster.php?function=Search&user_id=1190">Tomomasa Terazaki (GL)</a></p>
	</div>
<?php endif ?>


<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>CM3 Recap</h2>
		<p class="date">September 23, 2011</p>
		<p style="margin-bottom: 1.5em">Here are the stuff from CM3!<br>
		<br>
		<a href="/documents/fa11/CM3-Minutes.docx">CM3 Minutes</a><br>
		<a href="/documents/fa11/ExComm-Meeting-3.docx">ExComm Meeting 3</a><br>
		<a href="/documents/fa11/stylusCM3.pdf">CM3 Stylus</a><br>
		<br>
		<b>Caption Contest</b> [<a href="mailto:stylus@calaphio.com?subject=CM3 Caption">submit stylus@calaphio.com</a>]<br>
		<img src="/documents/fa11/cc2.jpg" width=300 style="border:1px solid black"></a><br>
		</p>
		<p>-<a href="roster.php?function=Search&user_id=1190">Tomomasa Terazaki (GL)</a></p>
	</div>
<?php endif ?>

<?php if (!$g_user->is_logged_in() || $g_user->is_pledge()): ?>
	<div class="newsItem">
		<h2>Welcome CPZ Pledges!</h2>
		<p class="date">September 22, 2011</p>
		<p style="margin-bottom: 1.5em">
		Welcome to the CPZ pledge class and to a new semester with APO! Our Fall 2011 namesake honoree is Charles P. Zlatkovich. Be sure to read his bio on the <a href="http://www.apo.org/articles/show/31">national website</a>! Also, check out his <a href="http://www.apo.org/site/site_files/cp_challenge.pdf">pledge class challenge</a>.
		</p>
		<p>-<a href="roster.php?function=Search&user_id=1190">Tomomasa Terazaki (GL)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>Ritual & CM3</h2>
		<p class="date">September 19, 2011</p>
		<p style="margin-bottom: 1.5em">

		Tomorrow night, Tuesday Sept. 20th, is the ritual ceremony and then CM3 in 159 Mulford at 7:00 PM.<br><br>

		<i><b>Ritual:</b></i><br>
		Please wear <b>business casual attire</b>. Similar to what we expect the pledges to wear:<br>
		No jeans/sweatshirts/sneakers<br>
		No clubbing clothes<br>
		Don't forget your pins!<br>
		No laptops and cell phones during the event<br><br>

		Please arrive in <font color="red">159 Mulford no later than 7:00 PM</font> (try to be there at 6:50 PM to be safe)!	
		</p>
		<p>-<a href="roster.php?function=Search&user_id=1190">Tomomasa Terazaki (GL)</a></p>
	</div>
<?php endif ?>

<?php if (!$g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>Pledging Alpha Phi Omega?</h2>
		<p class="date">September 17, 2011</p>
		<p style="margin-bottom: 1.5em">You should have gotten an email from our chapter Pledgemaster on how to pledge Alpha Phi Omega if you went to one of our rush events. If you did not get an email or have some question about pledging, please contact <a href="mailto:pledgemaster@calaphio.com?subject=Fall 2011 Pledging">pledgemaster@calaphio.com</a> about your problem.<br><br>

		If you do choose to pledge, do not forget to come to our Ritual on Tuesday, September 20th, which is a mandatory event in business casual attire (no jeans, no tennis shoes, etc.). It will start from 5:00 PM but you will only find out where the Ritual takes place after filling out the Google Form, which you will receive from the Pledgemaster.
		</p>
		<p>-<a href="roster.php?function=Search&user_id=1190">Tomomasa Terazaki (GL)</a></p>
	</div>
<?php endif ?>

<?php if (!$g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>Thanks for coming to our Rush Events!</h2>
		<p class="date">September 17, 2011</p>
		<p style="margin-bottom: 1.5em">All of our Rush Events are officially over and thank you for all of you who came to our events! If you did not go to Info Night 1 & 2, here is a pamphlet about pledging Alpha Phi Omega so check it out:<br><br>

		<a href="/documents/fa11/APOPamphlet.pdf">APO Fall 2011 Rush Pamphlet</a><br><br>

		If you have a BURNING last minute question about pledging Alpha Phi Omega, contact <a href="mailto:pledgemaster@calaphio.com?subject=Fall 2011 Pledging Question">pledgemaster@calaphio.com</a>. If you do choose to pledge, do not forget to come to our Ritual on Tuesday, September 20th, in business casual attire (no jeans, no tennis shoes, etc.).
		</p>
		<p>-<a href="roster.php?function=Search&user_id=1190">Tomomasa Terazaki (GL)</a></p>
	</div>
<?php endif ?>

<?php if (!$g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>Meet The Chapter is this Friday!</h2>
		<p class="date">September 14, 2011</p>
		<p style="margin-bottom: 1.5em"><b>Meet The Chapter</b> is your last chance to rush Alpha Phi Omega. If you still have not been to any of our rush events, we recommend you to go to this event. Just come chill with the brothers of APhiO while enjoying some <b>FREE FOOD!</b> It is at Sun Hong Kong/Kip's Restaurant (2439 Durant Ave. and the cross streets are Telegraph & Dana) starting at 7PM this Friday, September 16th.<br><br>

		Also dont forget about our <a href="pledging.php#service">Pre-Ritual Service Projects</a>! We have <b>CalStar Yoga</b> on Friday, <b>California Coastal Clean-Up Day</b> on Saturday, <b>Dinner for the Poor</b> on Saturday, and <b>Project Open-Hand</b> on Monday. Please contact <a href="mailto:membership-vp@calaphio.com?subject=Pre-Ritual Service Projects">membership-vp@calaphio.com</a> if you want to attend any of the service projects. <br><br>

		<b>Note</b>: For projects meeting at Underhill, meet on the north side of Underhill Parking Lot, located on Channing Ave. which is across from Unit 1.
		</p>
		<p>-<a href="roster.php?function=Search&user_id=1190">Tomomasa Terazaki (GL)</a></p>
	</div>
<?php endif ?>

<?php if (!$g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>Last Week to Rush APO!</h2>
		<p class="date">September 11, 2011</p>
		<p style="margin-bottom: 1.5em">We have three rush events left so please come check them out!<br><br>

		<span style="text-decoration: underline; font-weight: bold;">Game Night</span>
		<br /><span style="font-weight: bold">Monday, September 12th, 2011 - 203 Wheeler @ 7pm</span>
		<br />We're having a board game night.  Come hang out with the actives while enjoying dessert!<br /><br />
		
		<span style="text-decoration: underline; font-weight: bold;">Info Night #2:</span>
		<br /><span style="font-weight: bold;">Tuesday, September 13th, 2011 - 159 Mulford @ 7pm</span>
		<br />Just in case you missed the first one.
		<br />Afterwards, we will be heading out to <b>Fenton's</b> so potential pledges can mingle with some of the actives. Let us know if you want to do the challenge!<br /><br />

		<span style="text-decoration: underline; font-weight: bold;">Meet The Chapter:</span>
		<br /><span style="font-weight: bold;">Friday, September 16th, 2011 - Sun Hong Kong/Kip's Restaurant @ 7pm</S></span>
		<br />Enjoy free food? Come chill with the brothers of Alpha Phi Omega.  We'd love to meet you.<br /><br />

		Also dont forget about our <a href="pledging.php#service">Pre-Ritual Service Projects</a>! We have <b>Project Open-Hand</b> on Monday, <b>SF Food Bank</b> on Wednesday, and <b>CalStar Yoga</b> on Friday. Please contact <a href="mailto:membership-vp@calaphio.com?subject=Pre-Ritual Service Projects">membership-vp@calaphio.com</a> if you want to attend any of the service projects. 

		</p>
		<p>-<a href="roster.php?function=Search&user_id=1190">Tomomasa Terazaki (GL)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>CM2 Recap</h2>
		<p class="date">September 8, 2011</p>
		<p style="margin-bottom: 1.5em">Here are the stuff from CM2!<br><br>
		
		<a href="/documents/fa11/CM2-Minutes.docx">CM2 Minutes</a><br>
		<a href="/documents/fa11/ExComm-Meeting-2.docx">ExComm Meeting 2</a><br>
		<a href="/documents/fa11/stylusCM2.pdf">CM2 Stylus</a><br>
		<a href="http://www.megaupload.com/?d=CUIT13U3">CM2 Slideshow</a><br><br>

		<b>Caption Contest</b> [<a href="mailto:stylus@calaphio.com?subject=CM2 Caption">submit</a>]<br>
		<img src="/documents/fa11/cc1.jpg" width=300 style="border:1px solid black"></a><br>
		</p>
		<p>-<a href="roster.php?function=Search&user_id=1190">Tomomasa Terazaki (GL)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>Active Spotlight #1!</h2>
		<p class="date">September 7, 2011</p>
		<p style="margin-bottom: 1.5em">Congrats <b>Cindy Lam</b>!<br>
		<p style="margin-bottom: 1.5em">Cindy Lam: Cindy has demonstrated L, F, and S! As an associate last semester, she completed more than 30 hours of service. This semester, she will come back as an active! She is always willing to step up and attend service projects when others are unavailable. Congrats, Cindy! <br></p>

		<img src="/documents/fa11/as1.jpg" width=300 style="border:1px solid black"><br><br>

		<p>-<a href="roster.php?function=Search&user_id=1190">Tomomasa Terazaki (GL)</a></p>
	</div>
<?php endif ?>

<?php if (!$g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>Pre-Ritual Service Projects for Rushees!</h2>
		<p class="date">September 7, 2011</p>
		<p style="margin-bottom: 1.5em">
			Come to our <a href="pledging.php#service">Pre-Ritual Service Projects</a> where you can meet the members of APO while doing community service. If you're interested in attending, please contact our Membership VP at <a href="mailto:membership-vp@calaphio.com?subject=Pre-Ritual Service Projects">membership-vp@calaphio.com</a>.<br>
			<br><b>Note</b>: For projects meeting at Underhill, meet on the north (Channing) side of Underhill Parking Lot, located on Channing Ave. and College Ave. which is across from Unit 1.<br><br>
				<span style="text-decoration: underline; font-weight: bold; text-indent: 10px;">OBUGS Gardening Day:</span>
	  			OBUGS (Oakland Based Urban GardenS) is helping out at a community garden doing things like planting trees, building planters, spreading soil, etc.
			  	<br /<b>Saturday, September 10th, 2011</b> @ 10:00am-2:00pm (Meet at Underhill at 9:40am)
				<br /><br />

				<span style="text-decoration: underline; font-weight: bold">Ghirardelli Chocolate Festival:</span>
	  			Assist vendors putting together desserts and get free dessert samples while you're at it!
	 			<br /><b>Sunday, September 11th, 2011</b> @ 1:30pm-5:30pm (Meet at Underhill at 12:30pm)
	 			<br /><br />

				<span style="text-decoration: underline; font-weight: bold">Project Open-Hand:</span>
	  			Work with Chef Roger to prepare and package meals for people living with HIV/AIDS and other critical diseases in San Francisco. For more info: <a href="http://www.openhand.org/">http://www.openhand.org</a>
				<br /><b>Monday, September 12th, 2011</b> @ 5:00pm-8:00pm (Meet at Underhill at 4:00pm)
				<br /><br />


		Also check out our <a href="pledging.php">Pledging Page</a> and our <a href="https://www.facebook.com/home.php#!/event.php?eid=190229447711976">Facebook Rush Page</a> for more info about pledging APO!
		<br>
		</p>
		<p>-<a href="roster.php?function=Search&user_id=1289">Benjamin Le (KS)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
	<div class="newsItem">
		<h2>Prepare yourself for Rush Events!</h2>
		<p class="date">September 7, 2011</p>
		<p style="margin-bottom: 1.5em">Rush Events officially started! If you see a rushee at an event, go talk to him/her about your experience in APO. If you did not go to the Pre-Recruitment Workshop, look at the slides and check what kind of things you should talk about. Even if you did go, look at it again before the Rush Events!<br><br>
		
		<a href="/documents/fa11/Pre-Recruitment101.pptx">Pre-Recruitment Workshop Slides</a><br>
		</p>
		<p>-<a href="roster.php?function=Search&user_id=1190">Tomomasa Terazaki (GL)</a></p>
	</div>
<?php endif ?>

<?php if (!$g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>Come to our Rush Events!</h2>
		<p class="date">September 5, 2011</p>
		<p style="margin-bottom: 1.5em">If you are thinking about pledging Alpha Phi Omega, we have two rush events this week:<br><br>

		<span style="text-decoration: underline; font-weight: bold">Info Night #1</span>
	  	<br /><span style="font-weight: bold;">Wednesday, September 07th, 2011 - 20 Barrows @ 7pm</span>
	  	<br />Want to know more about what Alpha Phi Omega does as a chapter? Interested in pledging? Want to meet some awesome, new people? Get your questions answered at Info Night! 
	  	<br /><br />Afterwards, we will be heading out to <b>In-N-Out</b> so potential pledges can mingle with some of the actives while pigging out on fries!  <br /><br />
		
		 <span style="text-decoration: underline; font-weight: bold;">Big C Hike</span>
		  <br />
		  <span style="font-weight: bold">Thursday, September 08th, 2011 - Kroeber Fountain @ 7pm</span>
		  <br />Always wanted to hike up to the BIG C? Come out and hike up there with fellow brothers of APO! <br />
		</p>
		<p>-<a href="roster.php?function=Search&user_id=1190">Tomomasa Terazaki (GL)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
	<div class="newsItem">
		<h2>Don't tell the pledges... SmugMug!</h2>
		<p class="date">September 1, 2011</p>
		<p style="margin-bottom: 1.5em">Actives, upload all your APO photos to SmugMug! <b>Don't worry! The Pledges cannot see this</b>:</p>
		<p style="margin-bottom: 1.5em">
			<a href="http://www.smugmug.com">http://www.smugmug.com</a><br />
			Email: admin-vp@calaphio.com<br />
			Password: GammaGamma11
		</p>
		<p style="margin-bottom: 1.5em">Remember to keep this a secret from the pledges!</p>
		<p>-<a href="roster.php?function=Search&user_id=1190">Tomomasa Terazaki (GL)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>CM1 Recap</h2>
		<p class="date">August 31, 2011</p>
		<p style="margin-bottom: 1.5em">Here are the stuff from CM1!<br><br>
		
		<a href="/documents/fa11/CM1-Minutes.docx">CM1 Minutes</a><br>
		<a href="/documents/fa11/ExComm-Meeting-1A.docx">ExComm Meeting 1 Part A</a><br>
		<a href="/documents/fa11/ExComm-Meeting-1B.docx">ExComm Meeting 1 Part B</a><br>
		<a href="http://www.youtube.com/watch?v=Hbjq3iPB-h8">CM1 Slideshow</a><br>
		<a href="http://www.youtube.com/watch?v=mBL79ymiZ1w">The 10 Steps of Chairing Music Video</a><br>
		</p>
		<p>-<a href="roster.php?function=Search&user_id=1190">Tomomasa Terazaki (GL)</a></p>
	</div>
<?php endif ?>

<?php if (!$g_user->is_logged_in()): ?>
<div class="newsItem">
	<h2>Interested in Joining Alpha Phi Omega?</h2>
	<p class="date">August 26, 2011</p>
	<p style="margin-bottom: 1.5em">Are you interested in pledging Alpha Phi Omega? Then check out our <a href="pledging.php">PLEDGING PAGE!</a> There is information on our <a href="pledging.php#events">Rush Events</a> and <a href="pledging.php#service">Pre-Ritual Service Projects</a>, where you can meet the members of Alpha Phi Omega!</p>
	<p style="margin-bottom: 1.5em">If you have any question about our rush events, please contact <a href="mailto:membership-vp@calaphio.com?subject=Fall 2011 Rush Question">membership-vp@calaphio.com</a>. If you have any specific question about pledging Alpha Phi Omega, contact <a href="mailto:pledgemaster@calaphio.com?subject=Fall 2011 Pledging Question">pledgemaster@calaphio.com</a>.</p>
	<p style="margin-bottom: 1.5em">Race to the finish line... Rush for the service.<br>
	<Center><a style="cursor: pointer" onClick="window.open('images/rush_flyer_fa11_front.jpg','','width=1000,height=666')"><img src="images/rush_flyer_fa11_front.jpg" width="200" hspace="10" /></a>
	<a style="cursor: pointer" onClick="window.open('images/rush_flyer_fa11_back.jpg','','width=1000,height=666')"><img src="images/rush_flyer_fa11_back.jpg" width="200" hspace="10" /></a></Center><br>
	</p>
	<p>-<a href="roster.php?function=Search&user_id=1190">Tomomasa Terazaki (GL)</a></p>
</div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
<div class="newsItem">
	<h2>New Semester! New APhiO!</h2>
	<p class="date">August 10, 2011</p>
	<p style="margin-bottom: 1.5em">Hope everyone had an amazing summer! Everything is set for the semester to begin so let's make it a good one!</p>
	<p>-<a href="roster.php?function=Search&user_id=1190">Tomomasa Terazaki (GL)</a></p>
</div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
<div class="newsItem">
	<h2>"Like" our new Facebook Page</h2>
	<p class="date">May 31, 2011</p>
	<p style="margin-bottom: 1.5em">Oh look, a Facebook "Like" button. I think you should click it.</p>
	<iframe src="http://www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fpages%2FAlpha-Phi-Omega-UC-Berkeley-Gamma-Gamma%2F127132677367569&amp;width=292&amp;colorscheme=light&amp;show_faces=true&amp;border_color&amp;stream=false&amp;header=false&amp;height=280" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:292px; height:300px;" allowTransparency="true"></iframe>
	<p>-<a href="roster.php?function=Search&user_id=600">Geoffrey Lee (GAS)</a></p>
</div>
<?php endif ?>

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

<a href="news_sp11.php">Older News ></a>
<?php
Template::print_body_footer();
Template::print_disclaimer();
?>

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


<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>Send Your Election Platforms!</h2>
		<p class="date">April 2, 2012</p>
		<p style="margin-bottom: 1.5em"> 
		If you are interested in running for one of the ExComm positions, we highly recommend you to send in your election platform. Write out your ideas on how to make next semester better. Don't forget that you can run for any position even if you didn't accept during Nominations. Also, please come talk to the current ExComm members if you have any question about our positions.<br>
		<br>
		Send your election platform to <a href="mailto:admin-vp@calaphio.com, victorchang91@gmail.com, edhuoho@gmail.com?subject=Election Platform">admin-vp@calaphio.com, webmasters</a>.<br>
		</p>
		<p>-<a href="roster.php?function=Search&user_id=1324">Victor Chang (CPZ)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>GG Maniac #5</h2>
		<p class="date">March 21, 2012</p>
		<p style="margin-bottom: 1.5em">Please congratulate <b>Tannia Soto</b> for winning GG Maniac!<br><br>

		Tannia has done over 50 service hours for this semester. She is a big for Carpe Noctem, GG Maniac chair, and
		and is also doing a great lob as Spirit Chair, leading Roll Call for Sectionals. Congratulations Tannia!<br><br>

		<img src="/documents/sp12/ggmaniac5.jpg" width=250 style="border:1px solid black"><br>

		</p>
		<p>-<a href="roster.php?function=Search&user_id=1324">Victor Chang (CPZ)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>Notes from CM6</h2>
		<p class="date">March 21, 2012</p>
		<p style="margin-bottom: 1.5em">Here are the documents from CM6!<br><br>

		<a href="/documents/sp12/minutes_cm6.pdf">CM6 Minutes</a><br>
		<a href="/documents/sp12/minutes_excomm6.pdf">ExComm Meeting 6</a><br>
		<a href="/documents/sp12/stylus_cm6.pdf">CM6 Stylus</a><br>
		<a href="/documents/sp12/ks_nominations.docx">List of Nominations</a><br><br>
		
		<b>Caption Contest</b> [<a href="mailto:stylus@calaphio.com?subject=CM5 Caption">submit stylus@calaphio.com</a>]<br><br>
		<img src="/documents/sp12/CC6.jpg" width=250 style="border:1px solid black"></a>
		
		</p>
		<p>-<a href="roster.php?function=Search&user_id=1324">Victor Chang (CPZ)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>Election Amendments</h2>
		<p class="date">March 13, 2012</p>
  <p style="margin-bottom: 1.5em"> Hey everyone, keep yourselves informed about amendments with the proposals (and arguments for and against) listed 
  <a href="https://docs.google.com/document/d/16qmrcLrrrloo8aRdZjykP7DKFfFTqjsYRTpc53tiqes/edit">here</a>! <br>

  <p>
  And if you would like to add to the discussion, here is the Google form: <a href="https://docs.google.com/spreadsheet/viewform?formkey=dG53N0E2RFVxdTVHeVJwTkJtblk4cVE6MQ#gid=0/">https://docs.google.com/document/d/16qmrcLrrrloo8aRdZjykP7DKFfFTqjsYRTpc53tiqes/edit</a>
		</p>
  <br>
		<p>-<a href="roster.php?function=Search&user_id=1324">Victor Chang (CPZ)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>GG Maniac #4</h2>
		<p class="date">March 9, 2012</p>
		<p style="margin-bottom: 1.5em">Please congratulate <b>Polly Luu</b> for winning GG Maniac!<br><br>

		She's a big for SauceBau5, has done 74+ service hours, is Rush Chair, Hotspot Chair, and Stylus Chair. Good job Polly!<br><br>

		<img src="/documents/sp12/ggmaniac4.jpg" width=250 style="border:1px solid black"><br>

		</p>
		<p>-<a href="roster.php?function=Search&user_id=1077">Edward Ho (JM)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>Notes from CM5</h2>
		<p class="date">March 9, 2012</p>
		<p style="margin-bottom: 1.5em">Here are the documents from CM5!<br><br>

		<a href="/documents/sp12/minutes_cm5.pdf">CM5 Minutes</a><br>
		<a href="/documents/sp12/minutes_excomm5.pdf">ExComm Meeting 5</a><br>
		<a href="/documents/sp12/stylus_cm5.pdf">CM5 Stylus</a><br>
		<a href="/documents/sp12/midsemester.pdf">Midsemester Forum Minutes</a><br>
		
		<b>Caption Contest</b> [<a href="mailto:stylus@calaphio.com?subject=CM5 Caption">submit stylus@calaphio.com</a>]<br><br>
		<img src="/documents/sp12/CC5.jpg" width=250 style="border:1px solid black"></a>

		</p>
		<p>-<a href="roster.php?function=Search&user_id=1077">Edward Ho (JM)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>Assassins!</h2>
		<p class="date">February 28, 2012</p>
		<p style="margin-bottom: 1.5em">
		
		Hey everyone, Assassins is currently underway, so please refer to <a href="http://apoassassins12.blogspot.com/">this link</a> for the
		rules and the latest updates. Happy hunting!

		</p>
		<p>-<a href="roster.php?function=Search&user_id=1324">Victor Chang (CPZ)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>GG Maniac #3</h2>
		<p class="date">February 23, 2012</p>
		<p style="margin-bottom: 1.5em">Please congratulate <b>April Hishinuma</b> for winning GG Maniac!<br><br>

		April pledged CPZ last semester, and has been super involved in the chapter ever since. Not only is she a big for Coca-Hola,
		she also holds the positions of Service Educator, Active Day of Service Chair, and FVP Assistant! She has chaired numerous events, is 
		talented, and is also really cool to hang out with. Good job April!<br><br>

		<img src="/documents/sp12/ggmaniac3.jpg" width=250 style="border:1px solid black"><br>

		</p>
		<p>-<a href="roster.php?function=Search&user_id=1324">Victor Chang (CPZ)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>Notes from CM4</h2>
		<p class="date">Feburary 22, 2012</p>
		<p style="margin-bottom: 1.5em">Here are the documents from CM4!<br><br>

		<a href="/documents/sp12/minutes_cm4.pdf">CM4 Minutes</a><br>
		<a href="/documents/sp12/minutes_excomm4.pdf">ExComm Meeting 4</a><br>
		<a href="/documents/sp12/stylus_cm4.pdf">CM4 Stylus</a><br>
		<a href="http://www.youtube.com/watch?v=Ovzr2JzvHaM&feature=youtu.be">CM4 Slideshow!</a><br><br>
		
		<b>Caption Contest</b> [<a href="mailto:stylus@calaphio.com?subject=CM4 Caption">submit stylus@calaphio.com</a>]<br><br>
		<img src="/documents/sp12/CC4.jpg" width=250 style="border:1px solid black"></a>

		</p>
		<p>-<a href="roster.php?function=Search&user_id=1324">Victor Chang (CPZ)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>Valentine AphioShoot Time Lapse!</h2>
		<p class="date">Feburary 22, 2012</p>
		<p style="margin-bottom: 1.5em">Enjoy the cuteness!</p>
		<p style="margin-bottom: 1.5em">
			<iframe src="http://player.vimeo.com/video/36697199" width="500" height="281" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
		</p>
		<p>-<a href="roster.php?function=Search&user_id=600">Geoffrey Lee (GAS)</a></p>
	</div>
<?php endif ?>

<?php if (!$g_user->is_logged_in()): ?>
<div class="newsItem">
	<h2>Spring 2012 Rush!</h2>
	<p class="date">January 14, 2012</p>
	<p style="margin-bottom: 1.5em">Are you interested in pledging Alpha Phi Omega? Then check out our <a href="https://sites.google.com/site/calaphiorush/">PLEDGING PAGE!</a> for all information pertaining to rush!
	<p>-<a href="roster.php?function=Search&user_id=1077">Edward Ho (JM)</a></p>
</div>
<?php endif ?>

<!--
<?php if (!$g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>Regionals X 2012 Final Forms!!!</h2>
		<p class="date">January 08, 2012</p>
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
		<h2>GG Maniac #2</h2>
		<p class="date">February 8, 2012</p>
		<p style="margin-bottom: 1.5em">Please congratulate <b>Matthew Chong</b> for winning GG Maniac!<br><br>

		Matthew was a GG BBQ Chair and has done over 16 hours of service. He also helped out a lot at Regionals, is very creative, and was really active as a pledge last semester
		and continues to stay really involved in the chapter! Keep up the good work Matthew!<br><br>

		<img src="/documents/sp12/ggmaniac2.jpg" width=250 style="border:1px solid black"><br>

		</p>
		<p>-<a href="roster.php?function=Search&user_id=1077">Edward Ho (JM)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>Notes from CM3</h2>
		<p class="date">Feburary 8, 2012</p>
		<p style="margin-bottom: 1.5em">Here are the documents from CM3!<br><br>

		<a href="/documents/sp12/minutes_cm3.pdf">CM3 Minutes</a><br>
		<a href="/documents/sp12/minutes_excomm3.pdf">ExComm Meeting 3</a><br>
		<a href="/documents/sp12/stylus_cm3.pdf">CM3 Stylus</a><br>
		<a href="http://youtu.be/mMx7YtmFN3k">CM3 Slideshow!</a><br><br>

		<b>Caption Contest</b> [<a href="mailto:stylus@calaphio.com?subject=CM3 Caption">submit stylus@calaphio.com</a>]<br><br>
		<img src="/documents/sp12/CC3.jpg" width=250 style="border:1px solid black"></a>

		</p>
		<p>-<a href="roster.php?function=Search&user_id=1077">Edward Ho (JM)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>Sectionals Theme!</h2>
		<p class="date">February 6, 2012</p>
		<p style="margin-bottom: 1.5em">We are going to give OZ our top three choices, but I need to know which one will be the one you guys all want.  
		So far, Avatar is beating Spongebob, which is beating Rugrats, so if you prefer one over the other, make your vote!  Stanley is going to close this form 
		Tuesday Feb 7 at 11:59pm and promptly send our response to OZ!<br><br>

		<a href=" https://docs.google.com/spreadsheet/viewform?hl=en_US&pli=1&formkey=dG40Q2ZRQ3YtbDg1cmN0MzRNMDFuaHc6MQ#gid=0">Click here to vote!</a><br>

		</p>
		<p>-<a href="roster.php?function=Search&user_id=1077">Edward Ho (JM)</a></p>
	</div>
<?php endif ?>


<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>GG Maniac #1</h2>
		<p class="date">February 3, 2012</p>
		<p style="margin-bottom: 1.5em">Please congratulate <b>Kaitlin Fronberg</b> for winning GG Maniac!<br><br>

		Kaitlin was a big for Booty Call last semester, and she has chaired numerous events both this semester and last. She has done 25+ service hours already,
		hosted a workshop at Regionals, has started on APO LEADS and also represents a minority in our chapter. Good job Kaitlin!<br><br>

		<img src="/documents/sp12/ggmaniac1.jpg" width=250 style="border:1px solid black"><br>

		</p>
		<p>-<a href="roster.php?function=Search&user_id=1324">Victor Chang (CPZ)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
	<div class="newsItem">
		<h2>Notes from CM2</h2>
		<p class="date">January 31, 2012</p>
		<p style="margin-bottom: 1.5em">Here are the documents from CM2!<br><br>

		<a href="/documents/sp12/minutes_cm2.pdf">CM2 Minutes</a><br>
		<a href="/documents/sp12/minutes_excomm2.pdf">ExComm Meeting 2</a><br>
		<a href="http://www.youtube.com/watch?v=a6NX1e04rZQ&feature=youtu.be">CM2 slideshow!</a><br><br>
		There is no caption contest or stylus this week!
		</p>
		<p>-<a href="roster.php?function=Search&user_id=1324">Victor Chang (CPZ)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
	<div class="newsItem">
		<h2>SmugMug account!</h2>
		<p class="date">January 23, 2012</p>
		<p style="margin-bottom: 1.5em">Actives, upload all your APO photos to SmugMug!
		<p style="margin-bottom: 1.5em">
			<a href="http://www.smugmug.com">http://www.smugmug.com</a><br />
			Email: admin-vp@calaphio.com<br />
			Password: GammaGamma12!
		</p>
		<p style="margin-bottom: 1.5em">Remember to keep this a secret from the pledges!</p>
		<p>-<a href="roster.php?function=Search&user_id=1077">Edward Ho (JM)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
	<div class="newsItem">
		<h2>Notes from CM1</h2>
		<p class="date">January 19, 2012</p>
		<p style="margin-bottom: 1.5em">Here are the notes from CM1!<br><br>

		<a href="/documents/sp12/minutes_cm1.pdf">CM1 Minutes</a><br>
		<a href="/documents/sp12/minutes_excomm1.pdf">ExComm Meeting 1</a><br>
		<a href="/documents/sp12/stylus_cm1.pdf">CM1 Stylus</a><br>
		<a href="http://www.facebook.com/l.php?u=http%3A%2F%2Fwww.youtube.com%2Fwatch%3Fv%3DAJxML8ZbHwg%26context%3DC399fe39ADOEgsToPDskICL67I51sJXsIXkc4DbGJb&h=8AQE3-rHFAQGpgciQsUsBFwrBpd8E7NH9e3YityuaUPfiYA">CM1 slideshow!</a><br><br>

		<b>Caption Contest</b> [<a href="mailto:stylus@calaphio.com?subject=CM1 Caption">submit stylus@calaphio.com</a>]<br>
		<img src="/documents/sp12/CC1.jpg" width=250 style="border:1px solid black"></a>

		</p>
		<p>-<a href="roster.php?function=Search&user_id=1077">Edward Ho (JM)</a></p>
	</div>
<?php endif ?>

<div class="newsItem">
	<h2>Congratulations to our Spring 2012 Namesake, Jennifer Sun!</h2>
	<p class="date">January 18, 2012</p>
	<p style="margin-bottom: 1.5em">Congratulations to the new namesake, Jennifer Sun, for the Spring 2012 pledge class!  Jen Sun continues to be an inspiration to us all as she constantly makes an effort to return to the chapter with a positive aura for service. </p>
	<p style="margin-bottom: 1.5em">Jen pledged GAS semester (Fall 2005) and was a Finance Co-Chair as a pledge.   She continued on with being a Finance Trainer on the KW PComm and then President in Fall 2007.  The semester she was president, Gamma Gamma hosted sectionals and Jenn stepped up to be the chair for it.  In her time in APO, she has also chaired big events like IC Luau and Banquet.  She received Sturdy Oak for 6 semesters, parented 2 times, and bigged 4 times.</p>
	<p style="margin-bottom: 1.5em">Her example in APO of LFS truly inspires us all.  Let us continue our efforts in APO just as Jennifer Sun has.</p>
	<p>-<a href="roster.php?function=Search&user_id=1077">Edward Ho (JM)</a></p>
</div>

<?php if ($g_user->is_logged_in()): ?>
<div class="newsItem">
	<h2>New Year! New APhiO!</h2>
	<p class="date">January 12, 2012</p>
	<p style="margin-bottom: 1.5em">Hope everyone is enjoying their last week of break! Welcome to another semester of APhiO!</p>
	<p>-<a href="roster.php?function=Search&user_id=1077">Edward Ho (JM)</a></p>
</div>
<?php endif ?>


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

<a href="news_fa11.php">Older News ></a>
<?php
Template::print_body_footer();
Template::print_disclaimer();
?>

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

<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
	<div class="newsItem">
		<h2>CM 8 Stylus & SmugMug</h2>
		<p class="date">May 3, 2010</p>
		<p style="margin-bottom: 1.5em">The online edition of CM 8 Stylus: <a href="/documents/sp10/stylus/CM8S7.pdf">Read me!</a></p>
		<p style="margin-bottom: 1.5em">Also, all actives have uploading access to <a href=http://calaphio.smugmug.com/>SmugMug</a>! Please remember to upload all your Banquet pictures. Each family should make their own subgallery within the GL > Banquet gallery.		
		</p>		
		<p>-<a href="roster.php?function=Search&user_id=979">Samantha Paras (WK)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
	<div class="newsItem">
		<h2>Election Platforms</h2>
	  <p class="date">April 11, 2010</p>
		<p style="margin-bottom: 1.5em"><b>Election Platforms are </b> <a href="/sp10platforms.php" target="_new">posted!</a>          
		<p style="margin-bottom: 1.5em">	Brothers, make sure to read candidate platforms before Tuesday so elections will run smoothly.  Start thinking about potential questions for candidates now.      
        <br/>
		<br/>If you are running for a position, please submit your platform to the <a href="mailto:apogg-webmasters@googlegroups.com?subject=Platform">APO webmasters</a>
        <p>-<a href="roster.php?function=Search&user_id=957">Sitong Peng (WK = 6 sneaks)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
	<div class="newsItem">
		<h2>Spring Cleaning</h2>
		<p class="date">April 8, 2010</p>
		<p style="margin-bottom: 1.5em"><b>Visit the Assassins Blog:</b> <a href="http://glassassin.blogspot.com/" target="_new">Killing Spree!</a>
        <br />
        <br /><b>Caption Contest</b>: <a href="mailto:stylus@calaphio.com?subject=Caption">Email us</a> a witty submission =D
        <br /><img src="/documents/sp10/stylus/CM6.jpeg" style="width:400px">
        <br />
        <br />Minutes:
        <br /><a href="/documents/sp10/min_cm6.docx">Chapter Meeting 6</a>
        <br /><a href="/documents/sp10/min_excomm4.docx">Excomm Meeting 4</a>
        <br /><a href="/documents/sp10/min_excomm5.docx">Excomm Meeting 5</a>
        <br /><a href="/documents/sp10/min_midsemesterforum.docx">Midsemester Forum</a>
        <p>-<a href="roster.php?function=Search&user_id=957">Sitong Peng (WeKoo)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
<div class="newsItem">
		<h2>Spring 2010 Banquet: A Venetian Affair</h2>
<p class="date">April 7, 2010</p>
	  <p style="margin-bottom: 1.5em"><b>Join us in Venice on:</b>
          <br />
		<b>May 04, 2010 7:00PM</b>
		  <br />
        <b>Grandview Pavillion (Alameda, CA)</b>
	      <br />
		  <br />   
	    Buy your Banquet Tickets ASAP before the prices go up! You can purchase them from your banquet chairs, Janice Chan, Jennifer Hung, Courtney Mclaughlin, &amp; Kim Saelee. (Write Checks to APO/ASUC)
        <br />
	    $45 until CM7 (April 13)
        <br />
	    $50 until CM8 (April 27)
        <br />
	    $60 (April 27-April 30th)
        <br />
	    <br />
	    Also, please purchase banquet grams from the following banquet committee members! They are $1 each or 6 for $5. You have until April 30th to buy, and give them back to us!
        <br />
	    The people who are selling are: Andria Hidaka, Bonnie Lee, David Li, Daniel Huang, Elizabeth Tran, Heesun Lee, Lauren Simas, Lindsey Sugino, Fred Hsieh, and Pearl Ho.
        <br />
	    <br />
	    It's going to be a great banquet! You won't want to miss out.
        <br />
        <br />
  -<a href="roster.php?function=Search&user_id=957">Sitong Peng (WK)</a>            	      </div>
<?php endif ?>

<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
	<div class="newsItem">
		<h2>Stuff from CM4</h2>
		<p class="date">March 28, 2010</p>
		<p style="margin-bottom: 1.5em"><b>Visit the Assassins Blog:</b> <a href="http://glassassin.blogspot.com/" target="_new">Kill Now!</a>
        <br />
        <br /><b>Caption Contest</b>: <a href="mailto:stylus@calaphio.com?subject=Caption">Email us</a> your submission!
        <br /><img src="/documents/sp10/stylus/cm5.jpg" style="width:400px">
        <br />
        <br />Minutes:
        <br /><a href="/documents/sp10/min_cm5.docx">Chapter Meeting 5</a>
        <p>-<a href="roster.php?function=Search&user_id=979">Samantha Paras (WK)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
	<div class="newsItem">
		<h2>Stuff from CM4</h2>
		<p class="date">March 3, 2010</p>
		<p style="margin-bottom: 1.5em">Sorry for the delay!
		<br />
		<br /><b>Visit the Assassins Blog:</b> <a href="http://glassassin.blogspot.com/" target="_new">Kill Now!</a>
		<br />
		<br /><b>Fill out our Stylus Surveys</b>! 
		<br /><a href="https://spreadsheets.google.com/viewform?formkey=dG43Q3VVWXpZSlBxOGtWMlhOYkVNLXc6MA" target="_new">Part One</a>
        <br /><a href="https://spreadsheets.google.com/viewform?formkey=dENzZDJEREl5U1A2R29vRnR6UVIzVEE6MA" target="_new">Part Two</a>
        <br />
        <br /><b>Caption Contest</b>: <a href="http://spreadsheets.google.com/viewform?hl=en&formkey=dEI2THBJRzhUZC1uVWtTZG0tbmpTV3c6MA" target="_new">Submit your entry here!</a>
        <br /><img src="/documents/sp10/stylus/cm4.jpg" style="width:400px">
        <br />
        <br />And minutes:
        <br /><a href="/documents/sp10/min_cm4.docx">Chapter Meeting 4</a>
        <p>-<a href="roster.php?function=Search&user_id=979">Samantha Paras (WK)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
	<div class="newsItem">
		<h2>Stuff from CM3</h2>
		<p class="date">February 10, 2010</p>
		<p style="margin-bottom: 1.5em"><b>Fill out our Stylus Surveys</b>! 
		<br /><a href="https://spreadsheets.google.com/viewform?formkey=dDI4VVdZM0NaUF9OdnZGVkhGMHlQcmc6MA" target="_new">Part One</a>
        <br /><a href="https://spreadsheets.google.com/viewform?formkey=dEpnMFhIbHlVQThvZVQtU2ltQjQwekE6MA" target="_new">Part Two</a>
        <br />
        <br /><b>SmugMug</b>: <a href="http://calaphio.smugmug.com/" target="_new">calaphio.smugmug.com</a>
        <br />If you're an active and want to see protected albums or upload pictures, please contact <a href="mailto:admin-vp@calaphio.com?subject=SmugMug">Sam</a> or <a href="mailto:historian@calaphio.com?subject=SmugMug">David</a>.
        <br />
        <br /><b>Twitter Info</b>: <a href="http://twitter.com" target="_new">twitter.com</a><br />Login: <i>myaphio</i><br />Password: <i>Gammax2</i>
        <br />Follow us! And feel free to update.
        <br />
        <br /><b>CM 3 Caption Contest</b>: <a href="http://spreadsheets.google.com/viewform?hl=en&formkey=dEI2THBJRzhUZC1uVWtTZG0tbmpTV3c6MA" target="_new">Submit your entry here!</a>
        <br /><img src="/documents/sp10/stylus/cm3.jpg" style="width:400px">
        <br />
        <br />And minutes:
        <br /><a href="/documents/sp10/min_cm3.docx">Chapter Meeting 3</a>
        <p>-<a href="roster.php?function=Search&user_id=979">Samantha Paras (WK)</a></p>
	</div>
<?php endif ?>

	<div class="newsItem">
		<h2>Spring 2010 Namesake Honoree - Geoffrey Lee</h2>
		<p class="date">February 9, 2010</p>
		<p style="margin-bottom: 1.5em">
			Congratulations to Geoffrey Lee, our Spring 2010 Namesake! He pledged Gamma Gamma during the GAS semester and has served various positions in our chapter such as Membership Secretary, Chapter Webmaster, Parliamentarian, Finance VP, and Section 4 Conference Co-Chair. Currently he is our Chapter Advisor, Section 4 Secretary/Treasurer, and Region X Finance Chair. Thank you Geoffrey!
		</p>

		<p>-<a href="roster.php?function=Search&user_id=979">Samantha Paras (WK)</a></p>
	</div>

<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
	<div class="newsItem">
		<h2>Stuff from CM2</h2>
		<p class="date">January 26, 2010</p>
		<p style="margin-bottom: 1.5em"><b>Fill out our Stylus Surveys</b>! <a href="https://spreadsheets.google.com/viewform?hl=en&formkey=dFU1ZVo3b2ZuRVVwNEV4OGFWUUFreWc6MA" target="_new"><br />Part One</a><br /><a href="https://spreadsheets.google.com/viewform?hl=en&formkey=dDdUcmQ4YjBoUmhCaHlFNHRWT1hwZWc6MA" target="_new">Part Two</a>
        <br />
        <br /><b>Twitter Info</b>: <a href="http://twitter.com" target="_new">twitter.com</a><br />Login: <i>myaphio</i><br />Password: <i>Gammax2</i>
        <br />
        <br /><b>CM 2 Caption Contest</b>:<br /><a href="http://spreadsheets.google.com/viewform?hl=en&formkey=dGdOTkI5eDc0RDk3dVJjOXFlelZrcGc6MA">Submit your entry here!</a><br />
        <br /><img src="/documents/sp10/stylus/cm2.jpg">
        <br />
        <br />And finally, minutes:
        <br /><a href="/documents/sp10/min_excomm1.docx">ExComm Meeting 1</a>
        <br /><a href="/documents/sp10/min_cm2.docx">Chapter Meeting 2</a>
        <p>-<a href="roster.php?function=Search&user_id=979">Samantha Paras (WK)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
	<div class="newsItem">
		<h2>Stylus Info</h2>
		<p class="date">January 20, 2010</p>
		<p style="margin-bottom: 1.5em">If you're interested in being on the Stylus Committee, let us know! Your column can be <i>anything</i> you want -- just pitch your ideas to us! This counts as joining an Executive Committee and will get you Leadership Credit.
		<br />
        <br />We are also still accepting regular submissions. If you have anything, please email it to us at <a href="mailto:stylus@calaphio.com?subject=Stylus">stylus@calaphio.com</a>. They are due Sunday at 5PM!
        <br />
        <br />If you're bored and want to procrastinate, fill out our Stylus Surveys! <a href="http://spreadsheets.google.com/viewform?formkey=dERCNHMyUUhhb2Z2bE40b0QwTWFwTEE6MA" target="_new">One</a>c and <a href="http://spreadsheets.google.com/viewform?formkey=dERwVHFWeDVRQXI4RG0zTHcyckZFYmc6MA" target="_new">Two</a>
        <br />
        <br />This week's caption contest: (<a href="mailto:stylus@calaphio.com?subject=Caption">Submit!</a>)
        <br /><img src="/documents/sp10/stylus/cm1.jpg">
        <p>-<a href="roster.php?function=Search&user_id=979">Samantha Paras (WK)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
	<div class="newsItem">
		<h2>1 down, 7 more to go...</h2>
		<p class="date">January 20, 2010</p>
		<p style="margin-bottom: 1.5em"><a href="/documents/sp10/min_cm1.docx">CM 1 Minutes</a>
		<br />
        <br />A few reminders:
        <br />- Ex-Comm Meeting this Sunday in 189 Dwinelle!
        <br />- Info Night #1 is on Monday in 145 Dwinelle. Please bring $45 Active Dues so you can get your Rush Shirt!
        <br />- CM 2 is Tuesday in 2040 VLSB. Don't forget your pins!
        <br />- If you want your pictures in the Slideshow/Scrapbook/Funpack, don't forget to upload them!
        <br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="http://photobucket.com/" target="_new">Photobucket</a> // <b>login/pass:</b> ggspring10
        <p>-<a href="roster.php?function=Search&user_id=979">Samantha Paras (WK)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
	<div class="newsItem">
		<h2>Get ready for CM1!</h2>
		<p class="date">January 18, 2010</p>
		<p style="margin-bottom: 1.5em">Here are the files you may find useful to review for CM 1:
		<br />
		<br /><a href="/documents/sp10/Spring2010Budget.jpg">Budget</a>
        <br /><a href="/documents/sp10/ActiveRequirements.txt">Active Requirements</a>
        <br /><a href="/documents/sp10/Spring2010PledgeRequirements.doc">Pledge Requirements</a>
        <br />
        <br />Don't forget your $45 Active Dues (especially if you want your Rush Shirt!). Wear the first set of letters you recieved and your pin. See you then!</p>
		<p>-<a href="roster.php?function=Search&user_id=979">Samantha Paras (WK)</a></p>
	</div>
<?php endif ?>

	<div class="newsItem">
		<h2>It's all about your Service State of Mind</h2>
		<p class="date">January 18, 2010</p>
		<p style="margin-bottom: 1.5em">The <a href="pledging.php">pledging</a> page is updated, link your friends!
        <br />
        <br />A big thank you to our Spring 2010 Rush Chairs and Membership VP for all the hard work they've been putting out</p>
		<p>-<a href="roster.php?function=Search&user_id=957">Sitong Peng (WK)</a></p>
	</div>

	<div class="newsItem">
		<h2>It's a new semester with Alpha Phi Omega!</h2>
		<p class="date">January 10, 2010</p>
		<p style="margin-bottom: 1.5em"><br />Hope everyone had a good holidays, everything is set for the semester to begin so let's make it a good one!</p>
		<p>-<a href="roster.php?function=Search&user_id=957">Sitong Peng (WK)</a></p>
	</div>

<a href="news_fa09.php">Older News ></a>
<?php
Template::print_body_footer();
Template::print_disclaimer();
?>

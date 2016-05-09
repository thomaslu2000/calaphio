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

<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>Last Minute Minutes</h2>
		<p class="date">January 1, 2010</p>
		<p style="margin-bottom: 1.5em">Because it's never too late for Minutes! And you may need some Winter Break reading:<br />
			<a href="documents/fa09/min_excomm7.doc">ExComm 7 Minutes</a><br />
			<a href="documents/fa09/min_cm7.doc">CM 7 Minutes</a><br />
			<a href="documents/fa09/min_cm8.doc">CM 8 Minutes</a><br />
			<a href="documents/fa09/min_endofsemesterforum.doc">End of Semester Forum Minutes</a><br />
		</p>
		<p>-<a href="roster.php?function=Search&user_id=979">Samantha Paras (WK)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>Spring 2010 Pledge Committee</h2>
		<p class="date">December 12, 2009</p>
		<p style="margin-bottom: 1.5em">Congratulations to the members of the Spring 2010 Pledge Committee:</p>
		<p style="margin-bottom: 1.5em">
	        <b>Leadership Trainers</b> - Fanny Lee & Gloria Wu<br />
	        <b>Fellowship Trainers</b> - Christopher Nguyen & Ken Shimizu<br />
	        <b>Finance Trainers</b> - Nancy Chu & Vansen Wong<br />
	        <b>Service Trainer</b> - Shelley Woo<br />
	        <b>Administrative Trainer</b> - Beckie Siu<br />
	        <b>Historian Trainer</b> - Connie Chan<br />
		</p>
		<p>-<a href="roster.php?function=Search&user_id=875">Justin Abantao (CC)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>Spring 2010 Executive Committee</h2>
		<p class="date">November 19, 2009</p>
		<p style="margin-bottom: 1.5em">Congratulations to the elected members of the Spring 2010 Executive Committee:</p>
		<p style="margin-bottom: 1.5em">
		<b>President</b> - Andy Chau<br />
	        <b>Administrative VP</b> - Samantha Paras<br />
	        <b>Membership VP</b> - Mary Cheung<br />
	        <b>Service VP</b> - Hui Yeung<br />
	        <b>Finance VP</b> - Sam Blanchard<br />
	        <b>Fellowship VP</b> - Felix Jiang<br />
	        <b>Pledgemaster</b> - Richard Tam<br />
	        <b>Historian</b> - David Huang<br />
		</p>
		<p>-<a href="roster.php?function=Search&user_id=875">Justin Abantao (CC)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>Caption Contest #4</h2>
		<p class="date">November 17, 2009</p>
		<p style="margin-bottom: 1.5em"><img src="images/2009_fall_caption4.jpg" alt="Picture for Caption Contest #4 (CM 7)" /><br />
		<br />Congraulations to Edward Ho, winner of Caption Contest #3!<br />Congratulations to Cherry Nguyen, winner of Caption Contest #4!<br /><br /><s>Submit entries for Caption Contest #4 to <a href="mailto:apostylus@gmail.com?subject=Caption Contest 4">apostylus@gmail.com</a>. Use subject line "Caption Contest 4." All entries due by 11:59 PM, Tuesday, December 1. Winner will be contacted by the Stylus Chairs, and will be rewarded with dinner at CM 8.</s> The deadline to submit has passed.</p>
		<p>-<a href="roster.php?function=Search&user_id=875">Justin Abantao (CC)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>Election Platforms Posted</h2>
		<p class="date">November 15, 2009</p>
		<p style="margin-bottom: 1.5em">Election platforms have been posted <a href="fa09platforms.php">here</a>. Please read up on them before Elections!<br/><br/>
		If you are running for a position and wish to put up your platform, please email it to <a href="mailto:apogg-webmasters@googlegroups.com?subject=Election Platform">apogg-webmasters@googlegroups.com</a>.</p>
		<p>-<a href="roster.php?function=Search&amp;user_id=600">Geoffrey Lee (GAS)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>Lots of Minutes</h2>
		<p class="date">November 12, 2009</p>
		<p style="margin-bottom: 1.5em">Sorry for the delay... here are the minutes!<br/><br/>
		<a href="documents/fa09/min_excomm5.doc">ExComm 5 Minutes</a><br />
		<a href="documents/fa09/min_cm5.doc">CM 5 Minutes</a><br />
		<a href="documents/fa09/min_excomm6.doc">ExComm 6 Minutes</a><br />
		<a href="documents/fa09/min_cm6.doc">CM 6 Minutes</a><br />
		<a href="documents/fa09/min_midsem.doc">Midsemester Forum Minutes</a><br />
		</p>
		<p>-<a href="roster.php?function=Search&amp;user_id=979">Samantha Paras (WK)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>Election Platforms</h2>
		<p class="date">November 3, 2009</p>
		<p style="margin-bottom: 1.5em">Platforms will be uploaded <a href="fa09platforms.php">here</a>. Please read up on them before Elections!<br/><br/>
		If you are running for a position and wish to put up your platform, please email it to <a href="mailto:apogg-webmasters@googlegroups.com?subject=Election Platform">apogg-webmasters@googlegroups.com</a>.</p>
		<p>-<a href="roster.php?function=Search&amp;user_id=979">Samantha Paras (WK)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>Caption Contest #3</h2>
		<p class="date">November 3, 2009</p>
		<p style="margin-bottom: 1.5em">(Click <a href="http://live.calaphio.com/images/2009_fall_caption3.jpg">here</a> for the Caption Contest #3 image)<br />
		<br />Congraulations to Vanessa Lam, winner of Caption Contest #2!<br /><br /><s>Submit entries for Caption Contest #3 to <a href="mailto:apostylus@gmail.com?subject=Caption Contest 3">apostylus@gmail.com</a>. Use subject line "Caption Contest 3." All entries due by 11:59 PM, Tuesday, November 10. Winner will be contacted by the Stylus Chairs, and will be rewarded with dinner at CM 7.</s> The deadline to submit has passed.</p>
		<p>-<a href="roster.php?function=Search&user_id=875">Justin Abantao (CC)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>APO Assassins</h2>
		<p class="date">October 21, 2009</p>
		<p style="margin-bottom: 1.5em">
			Here are the rules for Assassins this semester:
			<br/>
			<a href="assassins_fa2009.php">Assassin Rules</a>
			<br/><br/>

			Be sure to check out our blog to see the latest new, updates, and DEATHS:
			<br/>
			<a href="http://deathbypost-it.blogspot.com/">Death By Post-It</a>
		</p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>Caption Contest #2</h2>
		<p class="date">October 20, 2009</p>
		<p style="margin-bottom: 1.5em">(Click <a href="http://live.calaphio.com/images/2009_fall_caption2.jpg">here</a> for the Caption Contest #2 image)<br />
		<br />Congraulations to Jovi Bondoc, winner of Caption Contest #1!<br /><br /><s>Submit entries for Caption Contest #2 to <a href="mailto:apostylus@gmail.com?subject=Caption Contest 2">apostylus@gmail.com</a>. Use subject line "Caption Contest 2." All entries due by 11:59 PM, Tuesday, October 27. Winner will be contacted by the Stylus Chairs, and will be rewarded with dinner at CM 6.</s> The deadline to submit has passed.</p>
		<p>-<a href="roster.php?function=Search&user_id=875">Justin Abantao (CC)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>Add the JM Pledge Class on Facebook!</h2>
		<p class="date">October 10, 2009</p>
		<p style="margin-bottom: 1.5em">Actives: Want to get to meet the new JM Pledge Class?<br />Pledges: Want to help yourselves meet your fellow JM pledges?<br />Now you can! On Facebook, at least. Follow these steps to do so:<br /></p>
		<ul style="list-style-type: decimal; margin-left: 27px;">
			<li>Download this <a href="documents/fa09/jm_csvlist.csv">CSV file</a></li>
			<li>When logged into Facebook, navigate to "Friends" on the top bar, and click on "Find Friends"</li>
			<li>Click "Upload Contact File" on the the top-right portion of the page</li>
			<li>Upload the CSV file that you downloaded in Step 1</li>
			<li>Add everyone :)</li>
		</ul><br />
		<p style="margin-bottom: 1.5em">NOTE: The CSV file also includes the Fall 2009 ExComm and PComm members.</p>
		<p>-<a href="roster.php?function=Search&user_id=875">Justin Abantao (CC)</a></p>
	</div>
<?php endif ?>


<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>JM Pledge Website and Minutes</h2>
		<p class="date">October 6, 2009</p>
		<p style="margin-bottom: 1.5em">Big Shoutout to JM AdminComm, amazing website for the pledges:<br />
        	<a href="http://aphiojm.50webs.com/">Jamaican Me Techsavvy</a> (don't forget to bookmark me!)<br />
            <br />Here are the recent ExComm/CM Minutes, read them to stay updated on our chapter's news & issues!<br />
			<a href="documents/fa09/min_excomm3.doc">ExComm 3 Minutes</a><br />
			<a href="documents/fa09/min_cm3.doc">CM 3 Minutes</a><br />
            <a href="documents/fa09/min_excomm4.doc">ExComm 4 Minutes</a><br />
			<a href="documents/fa09/min_cm4.doc">CM 4 Minutes</a><br />
		</p>
		<p>-<a href="roster.php?function=Search&user_id=957">Sitong Peng (WK)</a></p>
	</div>
<?php endif ?>




	<div class="newsItem">
		<h2>Welcome Pledges!</h2>
		<p class="date">September 26, 2009</p>
		<p style="margin-bottom: 1.5em">Welcome to the JM pledge class! Our Fall 2009 namesake honoree is Jack McKenzie. Read his bio on the <a href="http://www.apo.org/show/About_Us/Bios/Jack_McKenzie">national website</a>!</p>
		<p>-<a href="roster.php?function=Search&amp;user_id=979">Samantha Paras (WK)</a></p>
	</div>


<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>Willard Youth Support</h2>
		<p class="date">September 9, 2009</p>
		<p style="margin-bottom: 1.5em">Good afternoon,
		<p style="margin-bottom: 1.5em">I work for the <a href="http://youthsupportprogram.org">Willard Youth Support program</a>, a non-profit mentoring organization looking to recruit student mentors from the UC Berkeley campus as a way not only to support local youth but to also give Cal students a chance to interact in a meaningful way with the community in which they live. By mentoring for 3 hours a week and attending a one-hour support class once a week, Cal students get 2 units of credit through the Departments of Education or Social Welfare.</p>
		<p style="margin-bottom: 1.5em">We are currently accepting mentor applications for the Fall semester. We would love to get the Alpha Phi Omega Gamma Gamma Chapter involved with our program. This is a fantastic opportunity for your members to get school credit while serving their community. Furthermore, involvement in the program certainly looks impressive on resumes and lends valuable life experience.</p>
		<p style="margin-bottom: 1.5em">We have our first official class this Wednesday (today) at 5pm in 210 Wheeler Hall. Students will receive a syllabus, a mentoring application and the CCN they need to add the class. If students cannot make this first class, they can still join our program. We would appreciate it if you had the opportunity to pass on/forward this information to any APO member that might be interested. Thank you so much for your time. I have listed all of the Willard YSP's contact information below - again, please encourage anyone who wants to mentor to contact us.</p>
		<p style="margin-bottom: 1.5em">
			Respectfully,<br /><br />
			Selina Eadie<br />
			YSP Assistant Coordinator
		</p>
		<p style="margin-bottom: 1.5em">
			Willard Youth Support Program<br />
			2425 Stuart Street<br />
			Berkeley, CA 94705<br />
			510-644-6228<br />
			<a href="mailto:willardyouthsupport@berkeley.k12.ca.us">willardyouthsupport@berkeley.k12.ca.us</a><br />
			<a href="http://youthsupportprogram.org">youthsupportprogram.org</a>
		</p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>More Minutes / More Photobucket</h2>
		<p class="date">September 9, 2009</p>
		<p style="margin-bottom: 1.5em">Minutes for you:<br />
			<a href="documents/fa09/min_excomm2.doc">ExComm 2 Minutes</a><br />
			<a href="documents/fa09/min_cm2.doc">CM 2 Minutes</a><br />
		</p>
		<p style="margin-bottom: 1.5em">Photobucket for you:<br />
			Login/Password: apofall09</p>
		<p>-<a href="roster.php?function=Search&user_id=979">Samantha Paras (WK)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>Volunteering Opportunities</h2>
		<p class="date">September 2, 2009</p>
		<p style="margin-bottom: 1.5em">Hi,</p>
		<p style="margin-bottom: 1.5em">I'm an APhiO alumni and part of the JJJ pledging class. I hope to share some volunteering opportunities with the Gamma Gamma chapter.</p>
		<p style="margin-bottom: 3em">In LFS,<br /> Jacalyn Yuan</p>
		<p style="margin-bottom: 1.5em">The Asian Advocacy Project, a program of Community Action Marin that is headed by Vinh Luu, helps Asian immigrants to achieve the American dream. We work to empower the Asian community, individually and collectively, so that it can fully and actively participate in the educational, economic, social and political process of American society. This program is designed to help Southeast Asian immigrants and refugees become self-sufficient through a range of services.</p>
		<h3 style="font-weight: bold; font-size: 1em; margin-left: 5px;">ESL Teacher needed in the Vietnamese Community</h3>
		<p style="margin-bottom: 1.5em">Help break down cultural barriers between Vietnamese speaking and English speaking neighbors. We need someone who can teach a class the basics of English conversation. They have a variety of needs and abilities, so we need a flexible yet motivated instructor. This is a flexible opportunity that can work around the volunteer's availability.</p>
		<p style="margin-bottom: 1.5em">Skills needed: Experience teaching ESL preferred, but not required. We will provide training; the teacher should be at least 18 years of age. Volunteers must be fluent in Vietnamese and may be asked to undergo a fluency evaluation</p>
		<p style="margin-bottom: 1.5em">Your time and work is greatly valued by the community.</p>
		<p style="margin-bottom: 1.5em">For more information please call Gail Crain, Volunteer Coordinator, Community Action Marin 415-526-7522 or email <a href="mailto:gcrain@camarin.org">gcrain@camarin.org</a></p>
		<h3 style="font-weight: bold; font-size: 1em; margin-left: 5px;">ESL Teaching Assistant need in the Vietnamese Community</h3>
		<p style="margin-bottom: 1.5em">Help break down cultural barriers between Vietnamese speaking and English speaking neighbors. Become a conversation partner and tutor for people learning English. You will assist lead teachers in a small group setting to teach English to the Vietnamese population. Materials and training provided. Duration of commitment is flexible.</p>
		<p style="margin-bottom: 1.5em">Skills needed: Prefer bi-lingual (Vietnamese/English) adults 18 years of age or older. We accept tutors with any level of expertise or experience.</p>
		<p style="margin-bottom: 1.5em">Your time and work is greatly valued by the community.</p>
		<p style="margin-bottom: 1.5em">For more information please call Gail Crain, Volunteer Coordinator, Community Action Marin 415-526-7522 or email <a href="mailto:gcrain@camarin.org">gcrain@camarin.org</a></p>
		<h3 style="font-weight: bold; font-size: 1em; margin-left: 5px;">Vietnamese Interpreters for a Variety of needs</h3>
		<p style="margin-bottom: 1.5em">We seek interpreters to assist our clients at various medical, judicial, or student-teacher/school appointments. Interpreters translate verbal messages to and from the non-English speaking clients. This position would be offered on an as-needed basis.</p>
		<p style="margin-bottom: 1.5em">Skills needed: Volunteers must be fluent in Vietnamese and may be asked to undergo a fluency evaluation. Interpreters only need to have moderate availability</p>
		<p style="margin-bottom: 1.5em">If you are interested in this position, please call Gail Crain, Volunteer Coordinator, Community Action Marin 415-526-7522 or email <a href="mailto:gcrain@camarin.org">gcrain@camarin.org</a> and include your availability during the five day work week.</p>
		<p style="margin-bottom: 1.5em">Your time and work is greatly valued by the community.</p>
		<p style="margin-bottom: 1.5em">For more information please call Gail Crain, Volunteer Coordinator, Community Action Marin 415-526-7522 or email <a href="mailto:gcrain@camarin.org">gcrain@camarin.org</a></p>
		<h3 style="font-weight: bold; font-size: 1em; margin-left: 5px;">Financial Literacy Teacher and Mentor to the Vietnamese Community</h3>
		<p>Be a positive influence in the lives of the hard working Vietnamese community. Help them become successful in financial literacy. As a teacher or mentor, you will provide a group of individuals with access and information. For example:</p>
		<ul style="list-style: inside disc; margin-left: 10px;">
			<li>What is a credit report?</li>
			<li>How do you open a saving account?</li>
		</ul>
		<p style="margin-bottom: 1.5em">Access to such information could lead to greater financial independence and sound financial decisions.</p>
		<p style="margin-bottom: 1.5em">Skills needed:<br /> We will provide training; the teacher should be at least 18 years of age. Volunteers must be fluent in Vietnamese and may be asked to undergo a fluency evaluation.</p>
		<h3 style="font-weight: bold; font-size: 1em; margin-left: 5px;">Health Education Outreach to the Vietnamese Community</h3>
		<p style="margin-bottom: 1.5em">Help distribute information on the chemicals used at Nail Salons. The Vietnamese population, in particular, dominates the nail salon industry as both owners and workers.</p>
		<p style="margin-bottom: 1.5em">The nail salon workers handle toxic solvents, chemicals, and glues known to be carcinogenic and/or suspected to cause reproductive harm or other health impacts. These chemicals may be inhaled or absorbed through the skin. Childbearing women may also pass these toxins to fetuses or to newborns when breastfeeding.  Help distribute information to the nail salon workers to inform them on safety measure.</p>
		<p style="margin-bottom: 1.5em">Skills needed:<br /> We will provide training and materials. Volunteers must be fluent in Vietnamese and may be asked to undergo a fluency evaluation.</p>
		<p style="margin-bottom: 1.5em">For more information please call Gail Crain, Volunteer Coordinator, Community Action Marin 415-526-7522 or email <a href="mailto:gcrain@camarin.org">gcrain@camarin.org</a></p>
		<p>-<a href="roster.php?function=Search&user_id=511">Jacalyn Yuan (JJJ)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>Got a Minute?</h2>
		<p class="date">September 1, 2009</p>
		<p style="margin-bottom: 1.5em">Because you loved CM that much...</p>
		<p style="margin-bottom: 1.5em">
	        <a href="documents/fa09/min_cm1.doc">CM1 Minutes</a><br />
		</p>
		<p>-<a href="roster.php?function=Search&user_id=979">Samantha Paras (WK)</a></p>
	</div>
<?php endif ?>


	<div class="newsItem">
		<h2>Fall Rush is GO</h2>
		<p class="date">September 1, 2009</p>
		<p style="margin-bottom: 1.5em">Check out the new Pledging page on the tab above, or click below:</p>
		<p style="margin-bottom: 1.5em">
	        <a href="pledging.php">Alpha Phi Omega Fall 2009 Rush - Get Into The Game!</a><br />
		</p>
        <p style="margin-bottom: 1.5em">Thanks Rush Chairs + MVP!</p>
		<p>-<a href="roster.php?function=Search&user_id=957">Sitong Peng (WK)</a></p>
	</div>


	<div class="newsItem">
		<h2>Welcome back everyone!</h2>
		<p class="date">August 25, 2009</p>
		<p style="margin-bottom: 1.5em">Hope everyone had an amazing summer!</p>
		<p>-<a href="roster.php?function=Search&amp;user_id=899">David Jiang (CC)</a></p>
	</div>

<a href="news_sp09.php">Older News ></a>
<?php
Template::print_body_footer();
Template::print_disclaimer();
?>

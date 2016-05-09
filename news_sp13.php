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
<!--
<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>

<div class="newsItem">
	<h2>Motion to Amend Chapter Constitution</h2>
    <p class="date">April 9, 2013</p>
    <p style="margin-bottom: 1.5em">An Active has motioned to amend the Constitution. The Constitution reads: "Amendments to this document and the Chapter Bylaws to be voted upon must be posted on the
	Chapter web site for at least one week or presented to the membership at a previous Chapter
	meeting prior to voting on them."</p>
    <p style="margin-bottom: 1.5em">Given that it says or, we have allowed this motion to be posted on the website.</p>
    <p style="margin-bottom: 1.5em">The motion can be found <a href="https://docs.google.com/document/d/1InFHsOpsUKsPWTOayfNFQ4fyIq1dCCXwOtIbDm_k_FA/edit">here.</a></p>
    <p style="margin-bottom: 1.5em">Feel free to ask Excomm if you guys have any questions.</p>
    <p>-<a href="roster.php?function=Search&user_id=1216">Tony Le (JLC)</a></p>
</div>

<?php endif ?>
-->

<?php if ($g_user->is_logged_in()): ?>
<div class="newsItem">
    <h2>Congratulations to GG Maniac, Susan Guan</h2>
    <p class="date">May 15, 2013</p>
    <img src="/documents/sp13/CM8/ggmaniac.jpg" width=300 style="border:1px solid black"/></a><br><br>
    <p style="margin-bottom: 1.5em">Susan Guan pledged MH semester and has been actively contributing to the chapter with her dance moves. She is currently a big for Les Sporks and will be on PComm next semester! She was also responsible for orchestrating Roll Call this semester!</p>
    <p style="margin-bottom: 1.5em">Please help us in congratulating her!</p>
    <p>-<a href="roster.php?function=Search&user_id=1216">Tony Le (JLC)</a></p>
</div>

<div class="newsItem">
    <h2>Membership Spotlight: Anh Thu Pham </h2>
    <p class="date">May 15, 2013</p>
    <img src="/documents/sp13/CM8/membershipspotlight.jpg" width=300 style="border:1px solid black"/></a><br><br>
    <p style="margin-bottom: 1.5em">Anh pledged APO during Jennifer Sun semester and plays an active role in APHIO this semester as an aunt for Les Sporks. She is also Stylus chair and is graduating this semester! </p
    ></p>
    <p style="margin-bottom: 1.5em">Remember to congratulate her when you see her!</p>
    <p>-<a href="roster.php?function=Search&user_id=1216">Tony Le (JLC)</a></p>
</div>

<div class="newsItem">
    <h2>Notes From CM 8</h2>
    <p class="date">May 15, 2013</p>
    <p style="margin-bottom: 1.5em">Here are the documents from CM8!<br><br>
        <a href="https://docs.google.com/presentation/d/1W0VT6xFYH0W8uRI7BGXfg5FSHxgtcqGhDhcSpmPdj04/edit">CM8 Slides</a><br><br>
        <a href="http://vimeo.com/65946288">CM 8 Slideshow</a>
        <a href="http://vimeo.com/65946288">Banquet Slideshow</a>
    </p>
    <p>-<a href="roster.php?function=Search&user_id=1216">Tony Le (JLC)</a></p>
</div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
<div class="newsItem">
	<h2>Congratulations to the new Excomm!</h2>
    <p class="date">April 17, 2013</p>
    <p> <strong>President</strong>: Wiemond Wu<br/>
        <strong>Service VP</strong>: Rachel Palmer<br/>
        <strong>Pledgemaster</strong>: Jeffrey Zeng<br/>
        <strong>Administrative VP</strong>: Andrew Cai<br/>
        <strong>Membership VP</strong>: Alyssa Ferrell<br/>
        <strong>Finance VP</strong>: Rebecca Phuong<br/>
        <strong>Fellowship VP</strong>: Elizabeth Sabiniano<br/>
        <strong>Historian</strong>: Anne Ferguson
    </p>
        <p>Please congratulate the new leaders of our Gamma Gamma Chapter!</p>
</div>
<div class="newsItem">
	<h2>Congratulations to GG Maniac, Karen Wu</h2>
    <p class="date">April 17, 2013</p>
    <img src="/documents/sp13/CM7/wu_karen.jpg" width=300 style="border:1px solid black"/></a><br><br>
    <p style="margin-bottom: 1.5em">Karen Wu pledged MH semester and has been actively contributing to the chapter through her trolling. According to many people in the chapter, she is half-black. She is currently a big for DMDN, and I'm sure they are sensing that trolling presence that is so strongly present in her. She is Talent Show Chair and Finance Chair!</p>
    <p style="margin-bottom: 1.5em">Congratulate her by trolling her!</p>
    <p>-<a href="roster.php?function=Search&user_id=1216">Tony Le (JLC)</a></p>
</div>

<div class="newsItem">
    <h2>Notes From CM 7</h2>
    <p class="date">April 17, 2013</p>
    <p style="margin-bottom: 1.5em">Here are the documents from CM7!<br><br>
	<a href="https://docs.google.com/presentation/d/1-H2I1ZY28K5BP3L1p5JQSmH073vQKvTYWsFBIEx8qS8/edit#slide=id.gbaafad42_2_18">CM7 Slides</a><br><br>
	<a href="/documents/sp13/CM7/CM 7 Minutes.docx">CM7 Minutes</a><br><br>
		<a href="http://www.youtube.com/watch?v=FyDfXkop1D8&feature=youtu.be">Slideshow!</a>
    </p>
    <p>-<a href="roster.php?function=Search&user_id=1216">Tony Le (JLC)</a></p>
</div>
<?php endif ?>
<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>Election Platforms!</h2>
		<p class="date">April 14, 2012</p>
		<p style="margin-bottom: 1.5em">Please read these Election Platforms so you guys can all be informed this Tuesday during Elections!<br><br>
		<font color="red">Apr. 15 UPDATED</font>: Added Alyssa Ferrell's platform for Membership Vice President<br>
		<font color="red">Apr. 14 UPDATED</font>: Added Andrew Cai's platform for Admin Vice President<br>
		<font color="red">Apr. 14 UPDATED</font>: Added Rachel Palmer's platform for Service Vice President<br><br>

		<a href="sp13platforms.php">Election Platforms Link</a><br>

		<p>-<a href="roster.php?function=Search&user_id=1289">Benjamin Le (KS)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>

<div class="newsItem">
	<h2>Congratulations to GG Maniac, Debbie Yan</h2>
    <p class="date">April 8, 2013</p>
    <img src="/documents/sp13/CM6/GGManiac.jpg" width=300 style="border:1px solid black"/></a><br><br>
    <p style="margin-bottom: 1.5em">Debbie Yan pledged during Jennifer Sun semester and has been very visible in APO since. Not only did she big last semester, but she is also bigging again this semester which shows her dedication to the chapter. She also is Fundraiser Chair, Mr. APhiO chair, and is helping organizing Banquet this semester!</p>
    <p style="margin-bottom: 1.5em">Please help us in Congratulating her. Yay Debbie!</p>
    <p>-<a href="roster.php?function=Search&user_id=1216">Tony Le (JLC)</a></p>
</div>

<div class="newsItem">
    <h2>Notes From CM 6</h2>
    <p class="date">April 8, 2013</p>
    <p style="margin-bottom: 1.5em">Here are the documents from CM6!<br><br>
	<a href="https://docs.google.com/presentation/d/1N2ZNMdzab6_yoG_4kwMcnq8Dm4GnyNJX0WRNM1TBUZg/edit#slide=id.g19a5b4ff3_10">CM6 Slides</a><br><br>
	<a href="https://docs.google.com/document/d/116PNnSBZ3SOMn3AkC2w5wX0BE8H3IN7Pg1auleKnr44/edit">Nominations</a><br><br>
	<a href="/documents/sp13/CM6/CM 6.docx">CM6 Minutes</a><br><br>
        <a href="/documents/sp13/CM6/Stylus.pdf">CM 6 Stylus</a><br><br>
		<b>Caption Contest</b> [<a href="mailto:admin-vp@calaphio.com?subject=CM6 Caption Contest">submit admin-vp@calaphio.com</a>]<br><br>
		<img src="/documents/sp13/CM6/CC.jpg" width=300 style="border:1px solid black"/></a><br><br>
		<a href="https://www.youtube.com/watch?feature=player_embedded&v=mwTkjicHOBw">Slideshow!</a>
    </p>
    <p>-<a href="roster.php?function=Search&user_id=1216">Tony Le (JLC)</a></p>

    </p>

</div>

<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
<div class="newsItem">
    <h2>Notes From CM 5</h2>
    <p class="date">March 12, 2013</p>
    <p style="margin-bottom: 1.5em">Here are the documents from CM5!<br><br>
	<a href="https://docs.google.com/presentation/d/1rmBggNgpwaTbxF6CkiimhPDWSVwCytC0x_A7maa9PSQ/edit#slide=id.ga7cd0752_2_65">CM5 Slides</a><br><br>
        <a href="/documents/sp13/CM5/CM 5 Minutes.docx">CM5 Minutes</a><br><br>
        <a href="/documents/sp13/CM5/Stylus5.pdf">CM 5 Stylus</a><br><br>
        <!--<a href="http://www.youtube.com/watch?v=_GCZzZBlk8Y">CM 5 Slideshow!</a><br><br>--> CM 5 Slideshow Coming Soon!<br />
		<b>Caption Contest</b> [<a href="mailto:admin-vp@calaphio.com?subject=CM1 Caption Contest">submit admin-vp@calaphio.com</a>]<br><br>
		<img src="/documents/sp13/CM5/matthew.jpg" width=300 style="border:1px solid black"/></a>
    </p>
    <p>-<a href="roster.php?function=Search&user_id=1216">Tony Le (JLC)</a></p>

    </p>

</div>

<div class="newsItem">
	<h2>Membership Spotlight: Anne Ferguson </h2>
    <p class="date">March 12, 2013</p>
    <img src="/documents/sp13/CM5/annie.jpg" width=300 style="border:1px solid black"/></a>
    <p style="margin-bottom: 1.5em">Annie pledged APO during Jennifer Sun semester and plays an active role in APHIO this semester as an aunt for Bear Naked family. With her orange-reddish colored hair, she can easily be spotted within the Gamma Gamma chapter. She is also stylus chair and contributes her creative insights with her stories and articles. </p
    ></p>
    <p style="margin-bottom: 1.5em">Remember to say hi to her and tell her how awesome she is when you see her! Also, adore her orange-colored hair!</p>
    <br><p>-<a href="roster.php?function=Search&user_id=1216">Tony Le (JLC)</a></p>
</div>

<div class="newsItem">
	<h2>Congratulations to GG Maniac, Yoyo Tsai</h2>
    <p class="date">March 12, 2013</p>
    <img src="/documents/sp13/CM5/yoyo.jpg" width=300 style="border:1px solid black"/></a>
    <p style="margin-bottom: 1.5em">Yoyo Tsai loves Elephants. She draws elephants, ALOT! She pleged Maura Harty semester and is currently the Funpack and IC chair for the chapter. Currently, Yoyo is a big for Bear Naked and her littles adore her as well as her love of elephants.</p>
    <p style="margin-bottom: 1.5em">Congratulate her by talking to her about elephants.</p>
    <br><p>-<a href="roster.php?function=Search&user_id=1216">Tony Le (JLC)</a></p>
</div>

<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
<div class="newsItem">
    <h2>Notes From CM 4</h2>
    <p class="date">February 28, 2013</p>
    <p style="margin-bottom: 1.5em">Here are the documents from CM4!<br><br>
	<a href="https://docs.google.com/presentation/d/1LfAU1lTd-ipTaueZoMc_aeaZC2uiTuFxV9pu_B3LIFw/edit#slide=id.ga7cd0752_2_65">CM4 Slides</a><br><br>
        <a href="/documents/sp13/CM4/CM 4 Minutes.docx">CM4 Minutes</a><br><br>
        <a href="/documents/sp13/CM4/Stylus4.pdf">CM 4 Stylus</a><br><br>
        <a href="http://www.youtube.com/watch?v=_GCZzZBlk8Y">CM 4 Slideshow!</a><br><br>
		<b>Caption Contest</b> [<a href="mailto:admin-vp@calaphio.com?subject=CM1 Caption Contest">submit admin-vp@calaphio.com</a>]<br><br>
		<img src="/documents/sp13/CM4/kevin_jordan.jpg" width=300 style="border:1px solid black"/></a>
    </p>
    <p>-<a href="roster.php?function=Search&user_id=1216">Tony Le (JLC)</a></p>

    </p>

</div>

<div class="newsItem">
	<h2>Membership Spotlight: Debra Yan </h2>
    <p class="date">February 28, 2013</p>
    <img src="/documents/sp13/CM4/debbie.jpg" width=300 style="border:1px solid black"/></a>
    <p style="margin-bottom: 1.5em">Pledging Jennifer Sun semester, Debbie has since devoted much of her time to APHIO. Although she is often quiet, she contributes to the chapter with her positive attitude. When situations appear tense, she is the one to spearhead a compromise. Last semester, Debbie chaired three positions for APHIO and did a great job! Debbie is currently chairing Mr. APHIO and she is also bigging for Victoriou$ecret. I'm sure her littles will discover her bubbly attitude.</p
    ></p>
    <p style="margin-bottom: 1.5em">Remember to show her your appreciation by signing up for Mr.APHIO!</p>
    <br><p>-<a href="roster.php?function=Search&user_id=1216">Tony Le (JLC)</a></p>
</div>

<div class="newsItem">
	<h2>Congratulations to GG Maniac, Sara Vidovic</h2>
    <p class="date">February 28, 2013</p>
    <img src="/documents/sp13/CM4/sara.jpg" width=300 style="border:1px solid black"/></a>
    <p style="margin-bottom: 1.5em">Sara pledged Maura Harty semester and currently dedicates herself to three chairing positions: Fundraiser, Talent Show, and Spring Youth Day of Service. She loves Boba and can be easily trolled. In fact, she was the first one to get snuck by ExComm, but she was also one of the first ones to "Catch Excomm". Sara is currently bigging for Les Sporkupines and by now her littles have probably realized her energy, enthusiasm, and the unique presence she contributes to the chapter.</p>
    <p style="margin-bottom: 1.5em">Congratulate her by buying her Boba, asking to touch "Cactus" (her hair's name), or just trolling her.</p>
    <br><p>-<a href="roster.php?function=Search&user_id=1216">Tony Le (JLC)</a></p>
</div>

<div class="newsItem">
	<h2>Membership Spotlight: Benjamin H. Le!</h2>
	<p class="date">February 13, 2013</p>
<img src="/documents/sp13/CM3/ben.jpg" width=300 style="border:1px solid black"/></a>
	<p style="margin-bottom: 1.5em">Ben pledged Katherine Strausser semester and spent his time in our chapter constantly revolutionizing the website. Ben is always approchable and his down-to-earth nature keeps us calm during the chaotic times. He was our past Administrative Vice President but he continues to update the website. This semester, Ben is bigging again and we're sure that his littles will appreciate his genuineness and his eyebrows.</p>
	<p style="margin-bottom: 1.5em">Keep up the good work, Ben!</p>
	<br><p>-<a href="roster.php?function=Search&user_id=1216">Tony Le (JLC)</a></p>

</div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
<div class="newsItem">
	<h2>Congratulations to GG Maniac, Nancy Tran!</h2>
	<p class="date">February 13, 2013</p>
<img src="/documents/sp13/CM3/nancy.jpg" width=300 style="border:1px solid black"/></a>
	<p style="margin-bottom: 1.5em">Nancy's influential voice has helped her project Leadership, Friendship, and Service. She has been actively sending the chapter emails, updating us on the upcoming services. As SVP assistant, Nancy is also producing a Service video to be displyed at banquet. Although that project is still in progress, her most recent contribution as a Rush Chair has helped exposed Alpha Phi Omega to the campus. Thanks, Nancy! </p>
	<p style="margin-bottom: 1.5em">Please congratulate her when you see her!</p>
	<br><p>-<a href="roster.php?function=Search&user_id=1216">Tony Le (JLC)</a></p>
</div>
<?php endif ?>


<?php if ($g_user->is_logged_in()): ?>
<div class="newsItem">
		<h2>Notes from CM3</h2>
		<p class="date">February 13, 2013</p>
		<p style="margin-bottom: 1.5em">Here are the documents from CM3!<br><br>

		<a href="https://docs.google.com/presentation/d/1OD2HbgRapL9Cr2pxiV_7Zm3MkZXVtpX5BBnRTz3KGZc/edit?usp=sharing">CM3 Slides</a><br><br>

<a href="https://docs.google.com/document/d/1EX8nO13uvByXD6OBg_poJmX3MKobN8v4tkgZT2xJ9KY/edit">CM 3 Minutes</a><br><br>

<a href="/documents/sp13/CM3/Stylus2.pdf">CM 3 Stylus</a><br><br>

<a href="http://youtu.be/RZkFG_M_UlU">CM 3 Slideshow!</a><br><br>



		<b>Caption Contest</b> [<a href="mailto:admin-vp@calaphio.com?subject=CM1 Caption Contest">submit admin-vp@calaphio.com</a>]<br><br>
		<img src="/documents/sp13/CM3/sara.jpg" width=300 style="border:1px solid black"></a>
		</p>
		<p>-<a href="roster.php?function=Search&user_id=1216">Tony Le (JLC)</a></p>
	</div>
<?php endif ?>


<?php if ($g_user->is_logged_in()): ?>
<div class="newsItem">
	<h2>Membership Spotlight: Jamie Hum!</h2>
	<p class="date">February 05, 2013</p>
<img src="/documents/sp13/CM2/jamie.jpg" width=300 style="border:1px solid black"></a>
	<p style="margin-bottom: 1.5em">Jamie pledged Jack Mckenzie semester and has stuck around with Gamma Gamma for 7 semesters. This semester will be her eighth! Jamie dedicated her time in our chapter as a big, parent, and most recently, the 2012 Finance Vice President. Jamie continues to be a positive influence in our chapter with her charming personality and lightheartedness. Thank you, Jamie!</p>
	<p style="margin-bottom: 1.5em">Please show her some love when you can!</p>
	<br><p>-<a href="roster.php?function=Search&user_id=1216">Tony Le (JLC)</a></p>
</div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
<div class="newsItem">
	<h2>Congratulations to GG Maniac, Rosie Fan!</h2>
	<p class="date">February 05, 2013</p>
<img src="/documents/sp13/CM2/rosie.jpg" width=300 style="border:1px solid black"></a>
	<p style="margin-bottom: 1.5em">Rosie has been very active since the beginning of this semester. She has stepped up to chair numerous ExComm committees, done over 47 hours, and takes initiative to attend IC events over Winter Break. Her dedication is most accentuated by her endeavors in raising funds for our chapter under the Finance VP. Good work, Rosie! </p>
	<p style="margin-bottom: 1.5em">Please congratulate her when you can!</p>
	<br><p>-<a href="roster.php?function=Search&user_id=1216">Tony Le (JLC)</a></p>
</div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
<div class="newsItem">
		<h2>Notes from CM2</h2>
		<p class="date">January 23, 2013</p>
		<p style="margin-bottom: 1.5em">Here are the documents from CM2!<br><br>

		<a href="/documents/sp13/CM2/CM2Notes.pdf">CM2 Minutes</a><br><br>

<a href="/documents/sp13/CM2/Stylus 1.pdf">CM 2 Stylus</a><br><br>

<a href="http://www.youtube.com/watch?v=lAF6KI9V9WA">CM 2 Slideshow!</a><br><br>



		<b>Caption Contest</b> [<a href="mailto:admin-vp@calaphio.com?subject=CM1 Caption Contest">submit admin-vp@calaphio.com</a>]<br><br>
		<img src="/documents/sp13/CM2/CC2.jpg" width=300 style="border:1px solid black"></a>
		</p>
		<p>-<a href="roster.php?function=Search&user_id=1216">Tony Le (JLC)</a></p>
	</div>
<?php endif ?>


<?php if ($g_user->is_logged_in()): ?>
<div class="newsItem">
	<h2>Congratulations to our Spring 2013 Namesake, Kingsley Kuang!</h2>
	<p class="date">January 23, 2013</p>
<img src="/documents/sp13/CM1/kingsley.jpg" width=300 style="border:1px solid black"></a>
	<p style="margin-bottom: 1.5em">Kingsley Kuang pledged Chris Cheuk, Spring 2008. During activehood, Kingsley served as Fundraiser Chair during JM, Fall 2009. Later on, Kingsley served as the Academy of Friends Chair during KS, Fall 2011. Besides serving on various Executive Committees, he was also extremely involved in the family system by being a great big and parent numerous times. Kingsley is known to have done an exceedingly high amount of service and fundraisers during activehood. Even as an alumnus to our chapter, Kingsley continues to coordinate with the chapter and attend as many service events as he can. It is without a doubt that Kingsley continues to show true dedication to the principles of Alpha Phi Omega by excelling in leadership, friendship, and service. Together, he sets a wonderful example to our chapter members.</p>
	<p style="margin-bottom: 1.5em">His example in APO of LFS truly inspires us all.  Let us continue our efforts in APO just as Kingsley has. Please congratulate Kingsley when you can!</p>
	<br><p>-<a href="roster.php?function=Search&user_id=1216">Tony Le (JLC)</a></p>
</div>
<?php endif ?>



<?php if ($g_user->is_logged_in()): ?>
<div class="newsItem">
		<h2>Notes from CM1</h2>
		<p class="date">January 23, 2013</p>
		<p style="margin-bottom: 1.5em">Here are the documents from CM1!<br><br>

		<a href="https://docs.google.com/document/d/1PT7cdSr6cOddwoAMCGP_-CnwhQJKJMaY6z0CtuOLPUs/edit">CM1 Minutes</a><br><br>
		<a href="https://docs.google.com/document/d/1t_XxXOQD4VYSWQ4cA3_U5bVUCAMd9exdAV-WMoOCPv8/edit">Active Requirements</a><br>
<a href="https://docs.google.com/spreadsheet/ccc?key=0AuBHDr13KG8LdFNBR3l1eXVTSnBvam5kTFpkb2xhMGc#gid=0">Budget</a><br><br>
		<a href="/documents/sp13/CM1/SeniorityMembershipConstitutionAmendment.pdf">Seniority Status Constitution Amendment</a><br>
		<a href="https://docs.google.com/document/d/1W5c31oL3jsa_CKIXraC8m97rJTkwOx2SVJrlHAoyic0/edit">Seniority Status Bylaw Amendment</a><br><br>

		<b>Caption Contest</b> [<a href="mailto:admin-vp@calaphio.com?subject=CM1 Caption Contest">submit admin-vp@calaphio.com</a>]<br><br>
		<img src="/documents/sp13/CM1/caption.jpg" width=300 style="border:1px solid black"></a>
		</p>
		<p>-<a href="roster.php?function=Search&user_id=1216">Tony Le (JLC)</a></p>
	</div>
<?php endif ?>



<?php if ($g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>Spring 2013 Budget and Requirements!</h2>
		<p class="date">January 22, 2013</p>
		<p style="margin-bottom: 1.5em"> Here are the proposed requirements and budget drafted by ExComm.
		Please take a moment to look through the two documents before CM1 and bring any questions or comments you may have regarding these proposals.<br><br>
		Thanks you for your time!<br><br>

		<a href="https://docs.google.com/spreadsheet/ccc?key=0AuBHDr13KG8LdFNBR3l1eXVTSnBvam5kTFpkb2xhMGc#gid=0">Budget</a><br><br>

		<a href="https://docs.google.com/document/d/1t_XxXOQD4VYSWQ4cA3_U5bVUCAMd9exdAV-WMoOCPv8/edit">Requirements</a><br><br>

		</p>

		<p>-<a href="roster.php?function=Search&user_id=1289">Benjamin Le (KS)</a></p>
	</div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
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

<?php if ($g_user->is_logged_in()): ?>
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

<?php if (!$g_user->is_logged_in()): ?>
	<div class="newsItem">
		<h2>Spring 2013 Rush!</h2>
		<p class="date">Janauary 22, 2012</p>
		<p style="margin-bottom: 1.5em">Interested in pledging Alpha Phi Omega? <a href="http://www.facebook.com/events/197127807093270/?fref=ts">Join</a> our Facebook event and then check out our <a href="http://live.calaphio.com/pledging.php">PLEDGING PAGE!</a> for all information pertaining to rush!
		<p>-<a href="roster.php?function=Search&user_id=1289">Benjamin Le (KS)</a></p>
	</div>
	<?php endif ?>

<a href="news_fa12.php">Older News ></a>
<?php
Template::print_body_footer();
Template::print_disclaimer();
?>

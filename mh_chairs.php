<?php
require("include/includes.php");
require("include/Calendar.class.php");
require("include/Template.class.php");
Template::print_head(array());
Template::print_body_header('Home', 'NEWS');
if (!$g_user->is_logged_in()) {
	trigger_error("You must be logged in to view the chairing positions.", E_USER_ERROR);
} else {
	echo <<<HEREDOC
<h1 style="margin-bottom: 1em;">TT Semester Committees</h1>

<font color="red">* Position</font>: Email the ExComm members or chair of any commitee to join!<br>
<br>
<h2 style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
Presidential Committees: Karen Wu
</h2>
<div style="max-width: 50em; margin-bottom: 3em; line-height: 1.5;">
	<p style="margin: 1.5em 0px;">
None! BUT, check out some of the other awesome committees below!

</p>
</div>

<h2 style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
Administrative Committees: Jason Lee
</h2>
<div style="max-width: 50em; margin-bottom: 3em; line-height: 1.5;">
	<p style="margin: 1.5em 0px;">
<b>Stylus:</b> Stylus Chair: Elizabeth Yuen, Trinh Huynh, Dana Lin<br>
*Submit one or more article in the bi-weekly stylus! <br><br>
<b>FunPack:</b> Elizabeth Yuen, Bertha Chui, Lisa Hoang<br>
*Help us create the end of the semester yearbook! No design experience needed!<br><br>
</p>
</div>

<h2 style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
Membership Chairs: Rebecca Phuong
</h2>
<div style="max-width: 50em; margin-bottom: 3em; line-height: 1.5;">
	<p style="margin: 1.5em 0px;">
	
<b>Rush:</b> Bella Tsay, Joanna Choi, Nicki Bartak, Antony Nguyen<br>
*Come help us recruit some AWESOME new pledges! <font color "red">Note: This committee is now closed</font><br><br>
<b>Roll Call:</b> Tenzin Paldon, Sangmo Arya, Chris Wen<br>
*Come rep Gamma Gamma at Sectionals by participating in Roll Call! No dance experience necessary!<br><br>
</p>
</div>

<h2 style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
Service Committees: Debbbie Yan
</h2>
<div style="max-width: 50em; margin-bottom: 3em; line-height: 1.5;">
	<p style="margin: 1.5em 0px;">
	
<b>Spring Youth Service Day:</b> Virgil Tang, Joanna Choi, Sangmo Arya<br>
*Help up make crafts and design games for Spring Youth Service Day<br><br>	
</p>
</div>

<h2 style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
Finance Chairs: Kelsey Chan
</h2>
<div style="max-width: 50em; margin-bottom: 3em; line-height: 1.5;">
	<p style="margin: 1.5em 0px;">
	
None! But you can help the Finance department by signing up for fundraisers!

</p>
</div>

<h2 style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
Fellowship Committees: Ann Chan
</h2>
<div style="max-width: 50em; margin-bottom: 3em; line-height: 1.5;">
	<p style="margin: 1.5em 0px;">

<b>Hot Spot</b>: Dana Lin, Tenzin Paldon, Winnie looc, Jeffrey Kuan, Allison Tong, Kirk Chiu<br>
* Come help us set up the hottest-spot in town! <font color "red">Note: This committee is now full! Sorry! </font> <br><br>
<b> Banquet</font>: Susan Guan, Ellie Hung, April Liu, Jane Tam<br>
*Like to decorate? Plan events? BANQUENT COMMITTEE WANTS YOU! (Pledges welcome to join!)<br>
</p>
</div>

<h2 style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
Pledgemaster Committees: James Wang
</h2>
<div style="max-width: 50em; margin-bottom: 3em; line-height: 1.5;">
	<p style="margin: 1.5em 0px;">

<font color="red">Unfortunetly, the pledge committee for this semester is full!.</font><br>

</p>
</div>

<h2 style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
Historian Committees: Lakana Bun
</h2>
<div style="max-width: 50em; margin-bottom: 3em; line-height: 1.5;">
	<p style="margin: 1.5em 0px;">

<b>Scrapbook</b>:Elizabeth Yuen, Sherri Zhang<br>
*Help us make the end-of semester Scrapbook! <br><br>
<b>Photography</b>: Benjamin Le, Yoyo Tsai, Moncarol Wang<br>
*Join the photo committee by taking pictures at events and uploading them to smugmug! Professional Camera not required!<br><br>
<b>Chapter Wiki Chair:</b> Yoyo Tsai, Kathleen Wong, Pooja Shah<br>
*Help the Wiki Chairs in creating a new Chapter Wiki! No programming experince required!
</p>
</div>

HEREDOC;
}
Template::print_body_footer();
Template::print_disclaimer();
?>

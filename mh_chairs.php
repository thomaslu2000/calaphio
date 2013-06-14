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
<h1 style="margin-bottom: 1em;">KK Semester Chairs</h1>

<font color="red">* Position</font>: Denotes a chairing position with a committee. Email the ExComm members or chairs in order to join.<br>
<br>
<h2 style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
Presidential Chairs: 
</h2>
<div style="max-width: 50em; margin-bottom: 3em; line-height: 1.5;">
	<p style="margin: 1.5em 0px;">

Sergeant-at-Arms: Christopher Wen, Cindy Luu, Justin Devera, Daisy Chan<br>
IC Relations: Rosie Fan, Yoyo Tsai<br>
Parliamentarian: Zachary Lee<br>

</p>
</div>


<h2 style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
Administrative Chairs:
</h2>
<div style="max-width: 50em; margin-bottom: 3em; line-height: 1.5;">
	<p style="margin: 1.5em 0px;">

<font color="red">* Stylus</font>: Anh Pham, Benjamin Le, Matthew Chong, Annie Fergusno<br>
Webmasters: Benjamin Le, Ngoc Tran<br>
<font color="red">* FunPack</font>: Cindy Luu, Yoyo Tsai<br>

</p>
</div>

<h2 style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
Membership Chairs: 
</h2>
<div style="max-width: 50em; margin-bottom: 3em; line-height: 1.5;">
	<p style="margin: 1.5em 0px;">

<font color="red">* Rush</font>: Nancy Tran, Steven Tse, Jane Tam<br>
MVP Assistant: Celina Zeng, Debera Hsiao<br>
Sib Social: Letitia Liu, Jennifer Pham<br>
Academic: Yong Yu Xie, Tannia Soto<br>
<font color="red">* Spirit</font>: Susan Guan, Rita Mae Nuevo<br>
Assassins: Preston Chan, Nancy Tran<br>
Active Retreat: James Wang, Justin Devera<br>

</p>
</div>

<h2 style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
Service Chairs:
</h2>
<div style="max-width: 50em; margin-bottom: 3em; line-height: 1.5;">
	<p style="margin: 1.5em 0px;">

<font color="red"> * IC/GG Sewing</font>: Peggy Wu, Theresa Hoang<br>	
<font color="red"> * Spring Youth Service Day</font>: Rosie Fan, Susan Guan, Sara Vidovic<br>
SVP Assistant: Nancy Tran<br>
Beartrax: Rebecca Orr<br>
Project Open Hand Liaison: Andrew Cai<br>
Active Day of Service: Theresa Hoang

</p>
</div>

<h2 style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
Financial Chairs:
</h2>
<div style="max-width: 50em; margin-bottom: 3em; line-height: 1.5;">
	<p style="margin: 1.5em 0px;">

Organizer: Karen Wu, Sara Vidovic<br>
Reimbursement: Celina Zeng, Dominic Tsang<br>
Fundraiser: Debra Yan, Dominic Tsang, Rosie Fan, Jane Tam, Yoyo Tsai<br>
<font color="red">* Mr. APhiO</font>: Debra Yan, James Wang, Hanh Nguyen<br>

</p>
</div>

<h2 style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
Fellowship Chairs: 
</h2>
<div style="max-width: 50em; margin-bottom: 3em; line-height: 1.5;">
	<p style="margin: 1.5em 0px;">

<font color="red">* Hot Spot</font>: Diandra Prayitno, Tannia Soto, James Wang<br>
Talent Show: Karen Wu, Sara Vidovic<br>
FVP Assistant: Esther Chung<br>
IC Poker: Ryan Fong, Jason Nguyen, Christopher Wen<br>
<font color="red">GG BBQ & Potluck</font>: Rebecca Orr, Jane Tam, Yong Yu Xie<br>
IM Sports: Ryan Fong, Christopher Wen<br>
<font color="red">* Banquet</font>: Susan Guan, Melisa Li, Diandra Prayitno, Debra Yan<br>

</p>
</div>

<h2 style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
Pledgemaster Chairs: 
</h2>
<div style="max-width: 50em; margin-bottom: 3em; line-height: 1.5;">
	<p style="margin: 1.5em 0px;">

Leadership Trainers: Jeff Zeng, Vivian Nguyen<br>
Fellowship Trainers: Austin Shieh, Stephanie Chan<br>
Service Trainer: Elizabeth Sabiniano<br>
Finance Trainers: Pamudh Kariyawasam, Alyssa Ferrell<br>
Administrative Trainer: Jeff Swartwout<br>
Historian Trainer: Justin Liang<br>

</p>
</div>

<h2 style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
Historian Chairs:
</h2>
<div style="max-width: 50em; margin-bottom: 3em; line-height: 1.5;">
	<p style="margin: 1.5em 0px;">

Alumni Relations: Jamie Hum, Zachary Le, Celina Zeng<br>
<font color="red">* Scrapbook</font>: Daisy Chan, Melisa Li<br>
<font color="red">* Photographer</font>: Tannia Soto, Rita Mae Nuevo<br>
GG Maniac: Jennifer Pham, Letitia Liu<br>
Jeweler: Peggy Wu
Chapter Wiki: Daisy Chan<br>

</p>
</div>

HEREDOC;
}
Template::print_body_footer();
Template::print_disclaimer();
?>
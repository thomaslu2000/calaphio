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
<h1 style="margin-bottom: 1em;">JS Semester Chairs</h1>

<font color="red">* Position</font>: Denotes a chairing position with a committee. Email the ExComm members or chairs in order to join.<br>
<br>
<h2 style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
Presidential Chairs: 
</h2>
<div style="max-width: 50em; margin-bottom: 3em; line-height: 1.5;">
	<p style="margin: 1.5em 0px;">

Sergeant-at-Arms: Robert Yu, Alyssa Ferrell, Wiemond Wu, Kevin Su<br>
IC Relations: Zack Lee, Patty Chen<br>
Jeweler: Angelica Chavez<br>
Parliamentarian: Hye Yoo<br>

</p>
</div>


<h2 style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
Administrative Chairs:
</h2>
<div style="max-width: 50em; margin-bottom: 3em; line-height: 1.5;">
	<p style="margin: 1.5em 0px;">

<font color="red">* Stylus</font>: Lizi Feng, Yi Zhong, Polly Luu<br>
Webmasters: Edward Ho, Victor Chang<br>
CEO (Chief Email Officer): Krista Kracher<br>

</p>
</div>

<h2 style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
Membership Chairs: 
</h2>
<div style="max-width: 50em; margin-bottom: 3em; line-height: 1.5;">
	<p style="margin: 1.5em 0px;">

<font color="red">* Rush</font>: Robert Yu, Polly Luu, Nancy Pham<br>
MVP Assistant: Kaitlin Fronberg, Peggy Wu<br>
Sib Social: Joyce Pang, Gloria Santos<br>
Academic: Kendall Agbulos<br>
<font color="red">* Spirit</font>: Jane Schott, Tannia Soto<br>
Assassins: Yi Zhong, Joyce Pang<br>
Active Event: Derek Lau, Debera Hsiao<br>
Active Retreat: Michelle Chen, Christine Vu<br>

</p>
</div>

<h2 style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
Service Chairs:
</h2>
<div style="max-width: 50em; margin-bottom: 3em; line-height: 1.5;">
	<p style="margin: 1.5em 0px;">
	
Liaison: Ashley Scott<br>
Educator: April Hishinuma, Francesca Paterno, Brent Nguyen<br>
Active Day of Service: April Hishinuma, Jo Kao, Courtney McLaughlin, Tony Le<br>
IC/GG Sewing: Yong Yu Xie, Daisy Chan<br>
IC Joint Service: Andria Hidaka, Jessica Nadalin, Sunwoo Yoo<br>
<font color="red">* Pennies for Patients</font>: email Nicki Nario

</p>
</div>

<h2 style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
Financial Chairs:
</h2>
<div style="max-width: 50em; margin-bottom: 3em; line-height: 1.5;">
	<p style="margin: 1.5em 0px;">

Organizer: Tiffany Wong, Derrick Cheng<br>
<font color="red">* Showcase</font>: Ashley Scott, Sylvia Dong<br>
Reimbursement: Connie Yang, Weijie Chen<br>
Fundraiser: Jennifer Lee, Laura Lim, Melisa Li, Derek Liu<br>

</p>
</div>

<h2 style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
Fellowship Chairs: 
</h2>
<div style="max-width: 50em; margin-bottom: 3em; line-height: 1.5;">
	<p style="margin: 1.5em 0px;">

<font color="red">* Hot Spot</font>: Yi Zhong, Polly Luu, Melisa Li, Tony Le<br>
Talent Show: Robert Yu, Sandy Yuen<br>
FVP Assistants: April Hishinuma<br>
IC Poker: Derek Liu, Jessica Nadalin<br>
IM Sports: Kendall Agbulos, Chris Ching<br>
<font color="red">* Banquet</font>: Peggy Wu, Krista Kracher, Carmen Yung, Kristi Nguyen<br>
GG Sky High: Tiffany Wong, Jo Kao<br>
<font color="red">* GG BBQ</font>: Wiemond Wu, Andria Hidaka, Nancy Pham, Matthew Chong<br>

</p>
</div>

<h2 style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
Pledgemaster Chairs: 
</h2>
<div style="max-width: 50em; margin-bottom: 3em; line-height: 1.5;">
	<p style="margin: 1.5em 0px;">

Leadership Trainers: Mindy Chu, Tonia Tran<br>
Fellowship Trainers: Minnie Dasgupta, Susana Lau Lui<br>
Service Trainer: Rachel Palmer<br>
Finance Trainers:  Jenny Muliawan, Jason Tran<br>
Administrative Trainer:  Joey Chen<br>
Historian Trainer:  Angela Chan<br>

</p>
</div>

<h2 style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
Historian Chairs:
</h2>
<div style="max-width: 50em; margin-bottom: 3em; line-height: 1.5;">
	<p style="margin: 1.5em 0px;">

Alumni Relations: Gloria Wu, Stephen Hom<br>
<font color="red">* FunPack</font>: Melisa Li, Matthew Chong<br>
<font color="red">* Scrapbook</font>: Carmen Yung, Patty Chen<br>
<font color="red">* Photographer</font>: Ryan Pounds, Angelica Chavez<br>
GG Maniac: Yong Yu Xie, Tannia Soto<br>
Historian Assistant: Dana Baba<br>
Chapter Wiki: Stephen Hom, Victor Chang<br>

</p>
</div>

HEREDOC;
}
Template::print_body_footer();
Template::print_disclaimer();
?>
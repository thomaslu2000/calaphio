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
<h1 style="margin-bottom: 1em;">CPZ Semester Chairs</h1>

<font color="red">* Position</font>: Denotes a chairing position with a committee. Email the ExComm members or chairs in order to join.<br>
<br>
<h2 style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
Presidential Chairs: 
</h2>
<div style="max-width: 50em; margin-bottom: 3em; line-height: 1.5;">
	<p style="margin: 1.5em 0px;">

Sergeant of Arms: Dana Baba, Hobart Lai, Anand Narayanan, Amy Yee<br>

</p>
</div>


<h2 style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
Administrative Chairs:
</h2>
<div style="max-width: 50em; margin-bottom: 3em; line-height: 1.5;">
	<p style="margin: 1.5em 0px;">

<font color="red">* Stylus</font>: MK Kim, Hobart Lai, Rachel Morgan, Derek Young<br>

</p>
</div>

<h2 style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
Membership Chairs: 
</h2>
<div style="max-width: 50em; margin-bottom: 3em; line-height: 1.5;">
	<p style="margin: 1.5em 0px;">

<font color="red">* Rush</font>: Joey Chen, Susana Lau Lui, Nicki Nario<br>

</p>
</div>

<h2 style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
Service Chairs:
</h2>
<div style="max-width: 50em; margin-bottom: 3em;">
	<p style="margin: 1.5em 0px;">

<font color="red">* HallCarn</font>: Daisy Chan, Rachel Palmer, Francesca Paterno, Victoria Ponce<br>

</p>
</div>

<h2 style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
Financial Chairs: <span style="font-weight: normal;">Michelle Chen (JM)</span>
</h2>
<div style="max-width: 50em; margin-bottom: 3em;">
	<p style="margin: 1.5em 0px;">

Fundraiser Finder: Yong Yu Xie, Eileen Zhao<br>

</p>
</div>

<h2 style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
Fellowship Chairs: 
</h2>
<div style="max-width: 50em; margin-bottom: 3em;">
	<p style="margin: 1.5em 0px;">

<font color="red">* Hot Spot</font>: Zach Lee, Gloria Santos, Yong Yu Xie<br>

</p>
</div>

<h2 style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
Pledgemaster Chairs: 
</h2>
<div style="max-width: 50em; margin-bottom: 3em;">
	<p style="margin: 1.5em 0px;">

Pledge Committee: Tatiana Supnet, Celina Zeng, Jessie Chen, Derrick Hau, Laura Lim, Lizi Feng, Amul Kalia, Tony Le, Aico Nguyen<br>

</p>
</div>

<h2 style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
Historian Chairs:
</h2>
<div style="max-width: 50em; margin-bottom: 3em;">
	<p style="margin: 1.5em 0px;">

Alumni Relations: Rebecca Kung, Hanh Nguyen, Jennifer Zheng<br>

</p>
</div>

HEREDOC;
}
Template::print_body_footer();
Template::print_disclaimer();
?>
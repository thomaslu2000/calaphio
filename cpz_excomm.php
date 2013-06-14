<?php
require("include/includes.php");
require("include/Calendar.class.php");
require("include/Template.class.php");
Template::print_head(array());
Template::print_body_header('Home', 'NEWS');
if (!$g_user->is_logged_in()) {
	trigger_error("You must be logged in to view the signature options.", E_USER_ERROR);
} else {
	echo <<<HEREDOC
<h1 style="margin-bottom: 1em;">ExComm Signatures</h1>
<h2 style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
President: <span style="font-weight: normal;">Courtney McLaughlin (WK)</span>
</h2>
<div style="max-width: 50em; margin-bottom: 3em; line-height: 1.5;">
	<p style="margin: 1.5em 0px;">

- Talk to me!<br>
<br>
- Super awesome things to do<br>
o Go to Fall Fellowship<br>
o Go to more than 1 IC event :]

</p>
</div>


<h2 style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
Administrative VP: <span style="font-weight: normal;">Tomomasa Terazaki (GL)</span>
</h2>
<div style="max-width: 50em; margin-bottom: 3em; line-height: 1.5;">
	<p style="margin: 1.5em 0px;">

Submit to Stylus once (submit to <a href="mailto:stylus@calaphio.com?subject=Pledge Submission">stylus@calaphio.com</a>):<br>
- For CM7: Everyone who didn't submit (submit with a funny/embarassing photo of you!)<br>
<font color="red">The deadline is sunday noon before CM. You can't get my signature if you miss this deadline because it will be the last stylus!</font><br>
<br>
- Send me an email with these information (submit with your funny/embarassing photo!):<br>
o Basic Info: Name, Year, Major, Where you're from, etc.<br>
o Hobbies.<br>
o One random/interesting fact about you.<br>
o Your funny/embarassing Photo!
</p>
</div>

<h2 style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
Membership VP: <span style="font-weight: normal;">Bonnie Lee (JM)</span>
</h2>
<div style="max-width: 50em; margin-bottom: 3em; line-height: 1.5;">
	<p style="margin: 1.5em 0px;">

- TALK TO ME! <br><br>- Highly Recommended:<br>o Upload 3 Tests to Test Bank.<br>o Attend Fall Fellowship.

</p>
</div>

<h2 style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
Service VP: <span style="font-weight: normal;">Armand Cuevas (GL)</span>
</h2>
<div style="max-width: 50em; margin-bottom: 3em;">
	<p style="margin: 1.5em 0px;">

- Join Hallcarn committee.<br>
- 40 hours of service.<br>
- Do Roll Call<br>
- Talk to me!

</p>
</div>

<h2 style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
Finance VP: <span style="font-weight: normal;">Michelle Chen (JM)</span>
</h2>
<div style="max-width: 50em; margin-bottom: 3em;">
	<p style="margin: 1.5em 0px;">

Talk to me! Except if you're Yi Zhong. You can just go away.

</p>
</div>

<h2 style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
Fellowship VP: <span style="font-weight: normal;">Stanley Cheng (CC)</span>
</h2>
<div style="max-width: 50em; margin-bottom: 3em;">
	<p style="margin: 1.5em 0px;">

- Required:<br>o Get to know me - not be hesitant of saying your name, bad memory, help me remember.<br>o If you see me on campus, say "Hi!"<br><br>- Highly Recommended:<br>o FVP Committee (Hot Spot, Banquet, IC Cook-Off, IC Basketball).

</p>
</div>

<h2 style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
Historian: <span style="font-weight: normal;">Peggy Chuang (JLC)</span>
</h2>
<div style="max-width: 50em; margin-bottom: 3em;">
	<p style="margin: 1.5em 0px;">

- Talk to me!<br>
- Upload at least 15 pictures onto photobucket (email me and let me know too).

</p>
</div>

HEREDOC;
}
Template::print_body_footer();
Template::print_disclaimer();
?>
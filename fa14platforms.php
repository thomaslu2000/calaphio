<?php
require("include/includes.php");
require("include/Calendar.class.php");
require("include/Template.class.php");
Template::print_head(array("site.css"));
Template::print_body_header('Home', 'NEWS');
if (!$g_user->is_logged_in()) {
	trigger_error("You must be logged in to view the election platforms.", E_USER_ERROR);
} else {
	echo <<<HEREDOC
<h1 style="margin-bottom: 1em;">Fall 2014 Election Platforms</h1>

Service VP | <a href="#">No Platforms Yet</a> | <br/>
Pledgemaster | <a href="#">No Platforms Yet</a>  | <br/>
Admin VP | <a href="#ac">No Platforms Yet</a> | <br/>
Membership VP | <a href="#">No Platforms Yet</a> | <br/>
Fellowship VP | <a href="#">No Platforms Yet</a> | <br/>
Historian | <a href="#">No Platforms Yet</a> | <br/>
<br/>
<br/>

<!--
<h2 style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
<a name="ac">
Admin Vice President: <span style="font-weight: normal;">Andrew Cai (JS)</span>
</a>
</h2>

<div style="max-width: 75em; margin-bottom: 3em; line-height: 1.5;">
	<p style="margin: 1.5em 0px;">My platform is as follows:</p>

	<p style="margin: 1.5em 0px;"> Brothers, many of you might agree with me that something needs to be done about the current state of affairs of our chapter. What we have right now are brothers who are afraid to bear the responsibility, who are afraid to commit, and who are afraid to be the one to go against the flow. Well to them I say, "suck it up!" Did that pledging semester mean nothing to you? Can you so easily forsake what has been entrusted to you?
I can promise you one thing. And that is that I will not be afraid to piss off a couple of people if that means a better solution for everyone.
Certain concrete results that I wish to achieve are:

	<ul style="text-align: left; list-style: inside disc; margin-bottom: 1.5em;">
	<li>Reduce CM slides to maximum of 2</li>
	<li>Streamline Stylus (no more mandatory submissions)</li>
	<li>Stricter room reservations (event with more people get more priority)</li>
	<li>Scaling up Funpack to be more like Yearbook</li>
	<li>Getting rid of Caption Contest</li>
	<li>Candidate shadowing</li>
	<li>Reworking of Office Hour (no longer a waste of time) to be more like workshop</li>
	<li>Recruiting of graphic designers (very much needed!)</li>
	</ul>

	</p>

	<p style="margin: 1.5em 0px;"> Inevitably, all of us will come across moments when we think "Why the hell am I doing this" or "This is so pointless". Those are the things that need to be changed. While the AVP cannot make a huge impact on the chapter alone, the position affords the chance to experiment and discover solutions so that others may follow. </p>

	<p style="margin: 1.5em 0px;">-Andrew Cai</p>
</div>
-->




HEREDOC;
}
Template::print_body_footer();
Template::print_disclaimer();
?>
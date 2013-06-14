<?php
require("include/includes.php");
require("include/Calendar.class.php");
require("include/Template.class.php");
Template::print_head(array());
Template::print_body_header('Home', 'NEWS');
if (!$g_user->is_logged_in()) {
	trigger_error("You must be logged in to view the election platforms.", E_USER_ERROR);
} else {
	echo <<<HEREDOC
<div style="font-size: 1.5em; font-weight: bold; margin-bottom: 1em;">
<p style="margin: 1.5em 0px; line-height: 1.5;"></p>Assassins Rules</p>
</div>

<div style="line-height: 1.5;">
	<p style="margin: 1.5em 0px; line-height: 1.5;"></p>
	Brothers,
	<br/><br/>

	There is a mission that must be accomplished. We must see who is the ultimate sneaky assassin in the chapter.
	<br/><br/>
	
	In this mission, everyone is going to be assigned a target to kill, so thus, everyone will also BE someone else's target. You will have 2 weeks to kill your person, and email us to say:
	<br/><br/>
	<ul>
		<li>1. Who you killed</li>
		<li>2. How you killed (ie: when, where, etc;)</li>
		<li>3. What you guys talked about (because you guys have to talk)</li>
	</ul>
	<br/>
	And I will email you your next target within 12 hours.
	</p>
</div>
<br/>
<br/>

<div style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">How to Kill Someone:</div>
<div style="line-height: 1.5;">
	<p style="margin: 1.5em 0px; line-height: 1.5;">
	<ul>
		<li>1. Take a post-it or sticker <b>with your target's name</b> on it. (post-it's are cheap and come in large quantities!)</li>
		<li>2. You must sneak up on your target, and place it on their back while saying their name out loud, loud enough for them to <b>HEAR YOU SAY IT</b>.</li>
		<li>3. Your target must <b>NOT</b> see you when you stick the post-it on your back. If they see you fair and square while you do it, the kill <b>DOES NOT COUNT</b> and your target now knows who you are. <!--and can <b>DEFEND</b> against you.--> </li>
		<li>4. The post-it must be <b>STICKY</b>. You can use stickers if you'd like, but the post-it or sticker MUST stick to their back.</li>
		<li>5. If all the above conditions apply, you have successfully killed someone.</li>
		<li>6. Email <a href="mailto:apoassassinsfa09@gmail.com">APOAssassinsFa09@gmail.com</a> with the above information and I will give you your next target.</li>
		<br/>
		<li><b>NOTE</b>: You cannot kill you next target (even if you know who you have next) until I email you your next assignment!<!--Yes, this also means you cannot be defended againsts during this time.--></li>
	</ul>
	</p>
</div>
<br/>
<br/>

<!--<div style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">How to Defend Yourself:</div>
<div style="line-height: 1.5;">
<p style="margin: 1.5em 0px; line-height: 1.5;">
	<ul>
		<li>1. If you know who your killer is, you can hit them with a <b>CLEAN</b> sock (NOTE: I say hit, not <b>THROW A SOCK AT THEM</b>. You must <b>HIT</b> them) before they kill you, and say their name outloud as you do so. This will give killers incentive to be sneaky about killing their targets.</li>
		<li>2. If you are defending and you successfully defend against your assigned assassin, the assassin will be killed. Then, the assassin's assassin will be assigned to the defender.</li>
		<p style="padding-left: 3em;"><b>For example</b>: If David Jiang has to kill Fran Wang, and Fran Wang knows that David Jiang has to kill her, Fran Wang can hit David Jiang with a sock and yell, "David Jiang" and David Jiang would have died and David's killer will now be assigned to Fran Wang.</p><br/>
		<li>3. If you defend and accidentally defend against the wrong person, YOU will be dead.</li>
		<p style="padding-left: 3em;"><b>For example</b>: David Jiang has to kill Fran Wang. Fran Wang accidentally defends against Michael Cheng. Fran Wang has killed herself, and David Jiang is assigned to Fran Wang's target.</p><br/>
		<li>4. E-mail <a href="mailto:apoassassinsfa09@gmail.com">APOAssassinsFa09@gmail.com</a> if you've defended against your killer, accidentally killed yourself, or have been defended against.</li>
	</ul>
</p>
</div>
<br/>
<br/>-->

<div style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">Off-Limit Events/Safe Zones:</div>
<div style="line-height: 1.5;">
<p style="margin: 1.5em 0px; line-height: 1.5;">
	<ul>
		<li>1. ALL Events on the calendar (DO NOT PUT FELLOWSHIPS ON THE CALENDAR THE DAY OF IN ORDER TO AVOID BEING KILLED.)</li>
		<li>2. Small Fam/Big Fam Dinners.</li>
		<li>3. Office Hours (for Pcomm and pledges, just to be fair)</li>
	</ul>
	<br/>
	<b>NOTE</b>: You are immune 5 minutes before and after the above events. So 5 minutes after the <b>Toast Song</b> has been sung, everyone is no longer immue and can be killed.
	
	<br/><br/>
	4. You cannot be killed DURING CLASS (Berkeley Time) when the target is INSIDE the classroom during the scheduled time. This means that:
	<br/><br/>
	<ul style="padding-left: 3em;">
		<li>a. If someone goes early to class, they can be killed in the classroom.</li>
		<li>b. If someone is running late to class, they can be killed if not inside the classroom.</li>
		<br/>
		<b>For example</b>: If someone has a class from 2-3pm, they are only safe if that person is INSIDE the correct classroom from 2:10 - 3 pm. Any time before or after that time, the target is vulnerable, and if the person is not inside the classroom from those times, they can also be killed.
	</ul>
</p>
</div>
<br/>

YOU HAVE TO KILL YOUR TARGET BY THE NEXT CM. IF YOU FAIL TO DO SO, THEN NATURAL DISASTER WILL HIT AND YOU WILL DIE.
<br/><br/>
Good luck on your mission.
<br/>

HEREDOC;
}
Template::print_body_footer();
Template::print_disclaimer();
?>
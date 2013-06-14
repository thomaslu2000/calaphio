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
<h1 style="margin-bottom: 1em;">Spring 2013 Election Platforms</h1>

Service VP | <a href="#rp">Rachel Palmer</a> | <br>
Pledgemaster | | <br>
Admin VP | <a href="#ac">Andrew Cai</a> | <br>
Membership VP | <a href="#af">Alyssa Ferrell</a> | <br>
Fellowship VP | | <br>
Historian | | <br>
<br>
<br>

<h2 style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
<a name="rp">
Service Vice President: <span style="font-weight: normal;">Rachel Palmer (KS)</span>
</a>
</h2>

<div style="max-width: 75em; margin-bottom: 3em; line-height: 1.5;">
	<p style="margin: 1.5em 0px;">Hi! My name is Rachel Palmer and I'd like to be your Service VP next semester!</p>

	<p style="margin: 1.5em 0px;">Why Service VP?</p>

	<p style="margin: 1.5em 0px;">Service has always been a huge part of why I’m in APO. The whole idea of a service-oriented Fraternity is what initially inspired me to join, and it’s what has made me want to come back semester after semester. I’ve heard it said throughout the chapter that your pledging semester is the best one; for me, this is definitely not the case. I love being an active, and part of the reason is because I continue to get more and more involved in the service aspect of our Fraternity, and am continuously learning more and more about what it takes, and more importantly what it means, to put service first in an organization like this. I loved being the Service Trainer on P-Comm; I learned so much about organization, got to influence the pledging program, and got a chance to show the pledges just how worthwhile service is. However, I don’t feel that I’ve reached my potential in terms of what I can do for our Chapter. I feel that the initial excitement people feel about being in a service fraternity dwindles with the years for many actives, some of the reasons for which I discuss below, and I’d really like to turn that around. I want to show pledges and actives alike that their experience in APO can get better and better, and remind them of what makes APO different than any other club on campus.</p>

	<p style="margin: 1.5em 0px;">Things I’d Like to Do:</p>

	<p style="margin: 1.5em 0px;">One of the most pressing problems in our chapter is active retention. There are, of course, a variety of factors that contribute to actives not wanting to come anymore. I’ve observed, though, that those factors include a lack of fulfilment in terms of the service aspect of APO. I’ve seen it happen several times where an active will initially be very drawn to the idea of being part of a service organization, but then be so overwhelmed or focused on requirements, that their time spent doing service simply becomes another requirement to check off of their list of things to do. I want to work to change this, so that more actives will feel a desire to be involved in a service project, rather feel obligated. One of the factors in an attitude of obligation is that the person isn’t enjoying what they’re doing, or it doesn’t give them a sense of satisfaction. People don’t just want to make a difference; they want to make a difference in something that they personally feel is important. And these things are different for each person. We’ve tried to address this by offering a variety of service projects on our calendar. However, with our busy schedules, it’s often a hassle to go through every project on the calendar until we find the few that we enjoy.</p>

	<p style="margin: 1.5em 0px;">To address this, I’d like to propose a Service Survey. Actives (and maybe pledges) would fill out the survey, in which questions about their interests and personality would be stated. In return, they would receive a list of service projects that appeal to their particular personality. This “suggested service project list” would include descriptions, pictures, and even dates and times of the service projects suggested. This would not only save time for actives, but also expose them to some projects that they may not have been aware of.</p>

	<p style="margin: 1.5em 0px;">If possible, I could even collaborate with the Administrative VP to categorize service projects on the website. There could be a page, for example, that has a list of categories (examples: animals, nature, pollution, children, poverty, cooking, health etc.), and members could simply click on a category and see all of the service projects offered that semester that have to do with that theme. And every time someone added a new service project, it would ask (aside from the date, time, etc.) what category they would like that project to be placed under, so that the list is constantly being updated.</p>

	<p style="margin: 1.5em 0px;">Another possible time-management option for the Chapter would be to include in the Survey (or on the website as another Service VP-Admin VP collaboration effort), a “Service Schedule-finder.” It takes time to go through the calendar events to plan which service projects fit into our class schedules. With this option, members could simply fill out their schedule and list their other time commitments, and receive a list (similar to the personality list) of the service projects that are offered that do not conflict with their other time commitments (kind of like their own, personalized APO calendar!)</p>

	<p style="margin: 1.5em 0px;">I feel that this Survey (the personality and time-management calendar combined) and the possible Service-categorization on the website would really benefit active retention, as it would not only make managing requirements and organizing service projects a lot more efficient, but allow members to have immediate access to the service projects that apply to their interests-- some of which they’ve never had the time to research on their own. I would create the survey and the matching criteria myself, and in order to ensure that people are receiving a detailed list, I would have a “Survey Chair”, whose sole responsibility is to create the individual lists of projects to match the individual personalities and schedules (similar to the chairs in the Membership sector of APO that match personalities to small-fams).</p>

	<p style="margin: 1.5em 0px;">Another aspect of APO I’d like there to be more focus on, is the creation\search for new service projects. I feel as if there are many people in APO that are interested in addressing problems or engaging in types of service that are not as present on the calendar as other themes (example: service projects that involve singing, craft-making, animals, etc.). For this we recommend creating or finding their own service project. However, this can often be a difficult task, and it’s sometimes hard to know where to start. To address this, I’d like to offer a series of Service-Finder Workshops. Similar to the Service Workshop I initiated in the pledge program, these workshops will offer a step-by-step guide on how to find or initiate a service project, including how to organize various factors and communicate with other organizations in a way that conveys the professional nature of APO. This workshop, though, will take it a step further, as the people in attendance will actually collaborate during the workshop to create or find a service project that will be put on the calendar (the time spent at the workshop would also count as service hours, since finding service projects for the chapter can be considered a service to the chapter). There would be about 4 to 6 workshops in the semester, each with a different theme, so that people interested in that theme can come together to make it happen!</p>

	<p style="margin: 1.5em 0px;">I’d also like to include a word to anyone considering chairing under the Service VP position. I was a Hallcarn Chair and a College Day Chair, so I know how much time and organization goes into large service events, and can imagine that it’s the same for the other chairing positions under the Service VP. Given my experience, I would be more than happy to provide any sort of guidance or assistance that my chairs may need and, if I am elected, I will make sure that I make myself extra available to them in case they have any questions or issues. (Actually the same goes for if I am not elected. If anyone needs any help or advice, just let me know!)</p>

	<p style="margin: 1.5em 0px;">I’m very excited about these ideas, and if I become Service VP I will dedicate my time and efforts to addressing the problems I’ve mentioned, as well as others that are brought to my attention. I hope to see you all next semester and have a great summer!</p>

	<p style="margin: 1.5em 0px;">-Rachel Palmer</p>

	<h3 style="font-weight: bold; text-decoration: underline;">Qualifications</h3>
	<br>

	<ul style="list-style: inside disc; margin-bottom: 1.5em;">
	<li>Service Committee (Chair)</li>
	<li>Hallcarn Chair</li>
	<li>Big for Booty Call</li>
	<li>S-comm Trainer</li>
	<li>Fundraiser Chair</li>
	<li>College Day Chair</li>
	<li>153.5 hours of service</li>
	</ul>

</div>

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

<h2 style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
<a name="af">
Membership Vice President: <span style="font-weight: normal;">Alyssa Ferrell (KS)</span>
</a>
</h2>

<div style="max-width: 75em; margin-bottom: 3em; line-height: 1.5;">
	<p style="margin: 1.5em 0px;">Hi Gamma Gamma!</p>

	<p style="margin: 1.5em 0px;">My name is Alyssa Ferrell and I am running to be your next Membership Vice President! I’m running
for this position because without a good rush and good active retention, our chapter wouldn’t be able to
reach its potential! I’d like to run a successful rush and help to implement a few of my ideas in order to
make active’s experience in the brotherhood better.</p>

	<p style="margin: 1.5em 0px;">1. Rush – I would want to cut it back to two weeks instead of the three weeks from this
semester. The reason for this is that I would want to concentrate a huge push on our
part to get rushies’ attention and to keep their attention on us, by having it only a two-
week period. (Another idea to promote unity within our chapter and get ourselves notice
is to) make sure that we order rush t-shirts. I want these t-shirts to not have a specific
theme to our rush theme, but instead be used for the full calendar year, as general apo
rush t-shirts. This way the t-shirts will be able to be used again by actives in the future,
as they can choose to wear them again when flyering for future rush events. At the rush
workshop, along with talking about good flyering techniques, I would also like to cover
good speaking techniques with rushies (such as I feel, I felt, I found technique which
I learned and works really well when speaking with a potential pledge at events). The
reason I would like to add this portion to the workshop, is that I believe polishing our
speaking skills, will help us to retain the rushies we bring out to events and encourage
them to pledge. I would also be cutting back the 4 required rush events to 3 to ensure that
actives will be able to complete the requirement during the shortened two weeks of rush.</p>

	<p style="margin: 1.5em 0px;">2. Academics – I would want to establish a group of volunteer tutors within the active
body, whom, if anyone needs there services, would be able to gain one leadership credit
per three hours of tutoring another member of apo. This would encourage brother to
brother tutoring and offer an incentive for others to help their brother in schoolwork,
ensure academic success and providing another form of completing an apo requirement.</p>

	<p style="margin: 1.5em 0px;">3. I would want to have two additional apo gear opportunities for people to order from if
they wish to spend their own money. As an active I wanted to show off my letters with
pride, but only had the active t-shirt and the pledge class sweatshirt to wear. I always
wished to have other options of clothing with apo on it to wear and eventually just made
my own. I would like to have the opportunity to order another t-shirts in the fall besides
the rush one (potentially a cal themed one, as it is football season) and then a winter item
such as a cardigan or quarter zip.</p>

	<p style="margin: 1.5em 0px;">4. Family System – I would make each family have a minimum of three bigs, in order to
ensure that the littles have an adequate amount of bigs around them for support during
the semester. I would rather have a smaller amount of families with more bigs, then more
families including ones that have few bigs.</p>

	<p style="margin: 1.5em 0px;">-Alyssa Ferrell</p>

	<h3 style="font-weight: bold; text-decoration: underline;">Qualifications</h3>
	<br>

	<h3 style="font-weight: bold; text-decoration: none;">KS Semester - Spring 2011</h3>
	<ul style="list-style: inside disc; margin-bottom: 1.5em;">
	<li>Funcomm Trainee</li>
	<li>Spirit (Roll Call) Committee Member</li>
	<li>48 Hours of Service</li>
	<li>23 Fellowships</li>
	</ul>

	<h3 style="font-weight: bold; text-decoration: none;">CPZ Semester - Fall 2011</h3>
	<ul style="list-style: inside disc; margin-bottom: 1.5em;"> 
	<li>Veni Vidi Veni Big</li>
	<li>Rush Committee Member</li>
	<li>Banquet Chair</li>
	<li>Regionals Banquet Committee Member</li>
	</ul>

	<h3 style="font-weight: bold; text-decoration: none;">JS semester - Spring 2012</h3>
	<ul style="list-style: inside disc; margin-bottom: 1.5em;">
	<li>Sergeant of Arms</li>
	<li>Stylus Committee Member</li>
	<li>Mile High Big Fam Aunt</li>
	<li>46 Service Hours</li>
	<li>9 Fellowships</li>
	</ul>

	<h3 style="font-weight: bold; text-decoration: none;">MH semester - Fall 2012</h3>
	<ul style="list-style: inside disc; margin-bottom: 1.5em;">
	<li>Fiat Cupido Aunt</li>
	<li>Associate</li>
	<li>IC Cook Off Chair</li>
	</ul>

		<h3 style="font-weight: bold; text-decoration: none;">KK semester - Spring 2013</h3>
	<ul style="list-style: inside disc; margin-bottom: 1.5em;">
	<li>Pledge Committee Finance Trainer</li>
	<li>Stylus Committee Member</li>
	<li>Spirit (Roll Call) Committee Member</li>
	<li>32 Service Hours</li>
	<li>12 Fellowships</li>
	</ul>

</div>

HEREDOC;
}
Template::print_body_footer();
Template::print_disclaimer();
?>
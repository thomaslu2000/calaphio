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
Pledgemaster | <a href="#dy">No Platforms Yet</a>  | <br/>
Admin VP | <a href="#ac">No Platforms Yet</a> | <br/>
Membership VP | <a href="#">No Platforms Yet</a> | <br/>
Fellowship VP | <a href="#ps">Poojah Shah</a> | <br/>
Historian | <a href="#">No Platforms Yet</a> | <br/>
<br/>
<br/>
<h2 style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
<a name="dy">
Pledge Master: <span style="font-weight: normal;">Debra Yan (JS)</span>
</a>
</h2>
<div style="max-width: 75em; margin-bottom: 3em; line-height: 1.5;">
			<p><b>Dear Gamma Gamma,</b></p>
			<p>I am running for pledgemaster! During my time in APO, I have seen many semesters; great ones and not so great ones. The main issue that I see with the chapter now is that there is a lack of <b>quality service and dedication to service</b>. I feel that this stems from the pledge program. Although we may not be able to achieve an average of 50 hours of service per active/ pledge again, I would like to educate the neophytes of our chapter to find <b>meaning behind service</b>. It is great to achieve a large number of service hours, but I feel that the more important motivation behind this pillar of our organization is meaning. I would like to dedicate this semester not only creating a fun program, but also one that allows the pledges as well as my committee to grow by finding themselves and their love for service. </p>
			<p><b>Pledge Program</b></p>
			<p><b>Service emphasized</b></p>
			<p>During the course of this semester, I would like each committee to create or find a service project that they attend as a committee and also open up to others in the chapter. Service Committee will be the only committee where each trainee must create/ find a service project. </p>
			<p>I also want to introduce Pledges vs. Pcomm for service hours! I believe that this will motivate pledges more to do at least more service if it is seen as a more playful thing rather than a requirement. </p>
			<p>I feel that journaling is an essential part of finding purpose and self-awareness. In order to create more meaning behind service, I would like to introduce Circles at the end of each PR where pledges will be journaling specifically about their time doing service. The journals/ reflections will be reworked to include questions about service and the meaning that it holds to people, as well as more personal questions that will promote bonding. These journals must be prepared before hand and pledges will bring them to PR and will share during Circles. This will promote bonding with other pledges, as they will be divulging personal stories, but also be emphasizing the meaning of service. Additionally, these Circles will be a conduit towards pledge and pcomm personal growth as they facilitate self-reflection and feedback. </p>
			<p>I also would like to create an awards system much like the chapter awards where pledges receive certificates for their dedication to LFS. These awards will be announced and included in the manual and will be awarded at the end of the semester. </p>
			<p><b>Pledge-&gt;Actives</b></p>
			<p><b>Quality relationships</b></p>
			<p>I would like to continue using the Active signature sheet, but I feel that it is largely not very useful because pledges don’t really get to know an active well. I would like to work with the MVP to create Chum dates- Chumming. Chumming is when an active is paired with a pledge every 1 or 2 weeks (depends on active participation) and hang out with a pledge for an hour or so doing something fun like working out, our getting dinner. I feel that actives should also want to participate in this since pledges are an important part of our chapters’ maintenance so getting to know the next generation is also important. </p>
			<p>Besides this, I will also be requiring interviews, but at a lesser capacity. </p>
			<p>The relationships with Excomm is also very important, and I would like to shift the signature requirement back to something more than just asking Excomm a few questions. </p>
			<p><b>PComm qualities</b></p>
			<p><b>Responsible, Service-Oriented, Respectful and Respectable</b></p>
			<p>As the role models of this chapter, it is very important that the pledge committee is composed of people with these 4 qualities. As someone who is dedicated to the development of quality service in this pledge class, I need people who are on the same page, or are willing to get on board. I also desire people who are capable of completing their own work in a timely manner, with a good humor. It is furthermore crucial that the role models of the next pledge class are people who can in fact be good role models: people who are able to maintain a reasonable conversation and people who are capable of inspiring others with their actions and leadership. </p>
			<p><b>~</b></p>
			<p>I hope that moving forward, I can serve as this chapters’ pledgemaster and achieve a better program of service and to cultivate the future leaders of this organizations</p>
			<p><b>Qualifications</b></p>
			<p><b>JS</b></p>
			<p>-LComm trainee</p>
			<p>-Pledge Oak </p>
			<p>-48 Hours of Service</p>
			<p>-25 Fellowships</p>
			<p><b>MH</b></p>
			<p>-Chairing: MVP assistant, GG Maniac, IC chair</p>
			<p>-Big for NBD<br />
			-32.5 Service hours</p>
			<p>-10 Fellowships</p>
			<p><b>KK</b></p>
			<p>-Chairing: Banquet, Fundraiser, Mr. APO</p>
			<p>-Big for V$</p>
			<p>-General SL awards</p>
			<p>-Presidential Service Award</p>
			<p>-Sturdy Oak</p>
			<p>-74.25 Service hours</p>
			<p>-16 Fellowships</p>
			<p><b>DE</b></p>
			<p>-Pledge Committee- Finance Trainer</p>
			<p>-General SL Awards</p>
			<p>-Sturdy Oak</p>
			<p>-70 service hours</p>
			<p>-11 fellowships</p>
			<p><b>CM</b></p>
			<p>-Chairing: Fundraising, GG Maniac</p>
			<p>-Big for DY$f(x)</p>
			<p>-50.5 service hours</p>
			<p>-6 fellowships</p>
			<p style="margin: 1.5em 0px;">-Debra Yan</p>
</div>
<h2 style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
<a name="ps">
Fellowship Vice President: <span style="font-weight: normal;">Pooja Shah (JS)</span>
</a>
</h2>
<div style="max-width: 75em; margin-bottom: 3em; line-height: 1.5;">
	<p><b>Hello Gamma Gamma! </b></p>
	<p>In the interest in saving your eyes from having to read ANOTHER giant block of Text, I did bullet points!!! (^_^)</p>
	<p><b>Name: Pooja Shah</b></p>
	<p><b>Year: Senior! (Obviously graduating in the Fall, J) </b></p>
	<p><b>Pledge Class: KK</b></p>
	<p><b>Goals/Ideas as Fellowship VP:</b></p>
	<p>· Create Fellowship Superstars competition between families by averaging the number of fellowships per small and big fam. Potential prizes given to members of winning families at banquet!</p>
	<p>· Re-establish IC Cook-Off Fellowship held at Gamma Gamma in the Fall </p>
	<p>· Co-Sponsor 2 IC Fellowships during the summer (one in Nor-Cal and one in So-Cal) to help actives meet IC requirement</p>
	<p>· Plan 3-4 major Gamma Gamma wide fellowships during the semester (Ice Skating, Mini-Golf, Lazer Tag, Rafting, Rock-Climbing, Sky-High, Bowling, Cruise around the Bay, Dave &amp; Busters, Six Flags)</p>
	<p>· Encourage the creation of regular weekly fellowships such as “Fatty Fridays” and “Tabletop Thursdays” to help actives/pledges meet other actives with similar interests </p>
	<p>· Create and promote attendance of fellowships during the summer time outside of Berkeley</p>
	<p>· Encourage chapter use of Venmo as means of payment for drivers money and fellowship costs during events</p>
	<p>· Work to minimize the cost of banquet, while maintaining the high standard APhiO has come to know</p>
	<p><b>Personal Goals as a member of ExComm:</b></p>
	<p>· Mentorship to pledges: Personal goal of meeting all pledges by PR2</p>
	<p>· Complete at least double the amount of active requirements to maintain visibility (40 Service hours, 10 fellowships, 2 IC Events)</p>
	<p>· In the event the Pledgemaster chooses to return the ExComm signature requirement, I promise to make my signature requirement something that can benefit the chapter/pledge program from a Fellowship perspective</p>
	<p><b>Suggested Chairs:</b></p>
	<p>A problem I observed this semester was not enough actives applying/available to act as chairs. To help remedy this problem, I am hoping to select 1-2 younger members in the chapter (ideally CM or DE) who are interested in applying to be on ExComm in the future to be my assistant. They will not only help me monitor the calendar, but will also act as Co-Chairs/Committee Members for certain events.</p>
	<br />
	<p>· Fellowship VP Assistant (1-2)</p>
	<p>· IC Fellowship* (1-2)</p>
	<p>· Hotspot* (2-3)</p>
	<p>· GG Sports (2)</p>
	<p>· Banquet* (3-4)</p>
	<p>· Talent Show* (1-2)</p>
	<p>· GG Events Chair (1-2)</p>
	<b><br />
	</b><p><b>Qualifications:</b></p>
	<table border="1" cellspacing="0" cellpadding="0" >
		<tbody>
			<tr>
				<td valign="top" ><p><b>KK semester - Spring 2013</b></p>
					<p>· Leadership Committee</p>
					<p>· Hotspot Committee</p>
					<p>· 35.5 Service Hours</p>
					<p>· 24 Fellowships (Most in Pledge Class)</p>
				</td>
				<td valign="top" ><p><b>DE semester - Fall 2013</b></p>
					<p>· JDP Big</p>
					<p>· JDP Family Representative</p>
					<p>· Fundraiser Chair</p>
					<p>· Banquet Chair</p>
					<p>· 33 Service Hours</p>
					<p>· 23 Fellowships</p>
				</td>
				<td valign="top" ><p><b>CM semester - Spring 2014</b></p>
					<p>· BYoD Aunt</p>
					<p>· Sargent-at-arms for President</p>
					<p>· Stylus Chair</p>
					<p>· IC Poker Chair</p>
					<p>· 32+ Service Hours</p>
					<p>· 17+ Fellowships</p>
				</td>
			</tr>
		</tbody>
	</table>
	<p><b>TL/DR: Vote for me to be your next fellowship vice president! I’m super outgoing, have a lot of cool ideas, promise to work hard, and am super qualified! </b></p>
</div>
-->
HEREDOC;
}
Template::print_body_footer();
Template::print_disclaimer();
?>
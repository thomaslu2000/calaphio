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
<h1 style="margin-bottom: 1em;">Fall 2010 Election Platforms</h1>
<h2 style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
President: <span style="font-weight: normal;">Courtney McLaughlin (WK)</span>
</h2>
<div style="max-width: 50em; margin-bottom: 3em; line-height: 1.5;">
	<blockquote style="margin: 1.5em 4em; font-style: italic;">Alpha Phi Omega teaches us through our principles of <strong>Leadership, Friendship and Service</strong> that we are <strong>the architects of our own ambitions</strong> and that each of us has the opportunity to develop ourselves to be whatever we seek to be. In the area of leadership, from within our own fraternity, people are transformed <strong>from followers to leaders</strong> sometimes without really being aware of the development. It can happen gradually, or it might happen overnight—<strong>today a follower tomorrow a leader.</strong></blockquote>
	<div style="margin-left: 25em; font-style: italic;">-Alpha Phi Omega National Manual, Pg. 4</div>
	<p style="margin: 1.5em 0px;">I don’t remember the precise moment when I became a leader, but I know it was not overnight. During my pledging semester in the Fall of 2008, I never imagined I would accomplish enough to be on the executive committee, let alone the president of this chapter. However, what I realized over the semesters is that you don’t need to make a huge accomplishment to become a leader. I felt like I took a standard path of any active in Alpha Phi Omega, maybe I have just been around more than most. But somehow, my path here has brought me to where I am now: running to be the president of the Gamma Gamma chapter for the 2011 year.</p>
	<p style="margin: 1.5em 0px;">I believe that I am qualified and ready for this position. Having had experience in the family system, the Pledge Committee as well as the Executive Committee, my overall knowledge of the chapter is strong. I’ve held many chairing positions, and know the fraternity on an individual, family, committee, chapter, sectional and national level.  I really do believe in the values our fraternity is based on; I try to stay true to them, and intend to continue to do so if elected.</p>
	<p style="margin: 1.5em 0px;">I intend to focus on three things to improve about the chapter: inter-chapter relations, upholding the national values of the fraternity, and empowering actives.</p>
	<p style="margin: 1.5em 0px;">Interchapter relations is something we have been trying to improve for a while, and we are getting stronger little by little. To continue that progress we need to work on being more open as a chapter. There are always a couple of people at IC events who are assertive and make IC friends, but the majority of us stick together with what we know, maybe because it’s comfortable or maybe because it doesn’t seem worth it to forge relationships with people we only see twice a semester. The solution is not just forcing people to talk to IC brothers. Our chapter has a sense, as most other chapters do as well, that we have the best systems, organization, programs and ways of doing things. But this cannot always be true. As a chapter we have to grow to value the other chapters; to see what they do well, and see what we can learn from them.  Although we are different from many chapters in our fraternity system, academic environment, our family system and many other ways, that does not take away from what we can learn from others as a chapter. By having more knowledge about other chapters, both nationally as well as in our section, we will be able to forge better IC relations and appreciate and value IC events and IC brothers more.  This starts with brothers going to more IC events and talking to people; if talking just about themselves is difficult, then learning about their chapter would be a great alternative. Another way is to be more aware of national activities, such as LEADS workshops and knowing your pledge class namesake.  Anything that helps us develop an idea of our chapter as a part of a much bigger system, a system with countless resources and opportunities even as undergraduate students is beneficial. The national manual states that “The status of APO results directly from the maturity and meaningfulness of the local chapter programs.” The national organization of the fraternity gives us our values, goals and structure. “Without constant reminders, teaching, help and advice, even the best of us lose sight of our larger goal. We become introverted, concentrated on our own selfish ends, forgetful that we come this way but once and that our challenge is to serve others.” Although the backbone of the fraternity is individual chapters, it is the fraternity as a whole that gives us our foundation.</p>
	<p style="margin: 1.5em 0px;">The values of our fraternity is what we are founded on, the basis of which we call ourselves an organization and a fraternity dedicated to service. As president, I hope to keep these values a visible goal for our fraternity. It seems that we often get lost in the drama of families, counting hours or choosing committees, and the real purposes of the fraternity get forgotten about: creating strong leaders, forming strong brotherhood bonds, and providing the community with quality service. Although committees, service hours and the family system are a large integral part of our chapter, as president I hope to also keep our broader principles in sight. In order to do this, I will work with my executive committee to have a level of solidarity for the values of the fraternity. As the leaders and model for this fraternity, we as an executive committee will lead by example, emphasizing the values of the fraternity, and having a standard with which we treat our position and our work in the fraternity, in the hopes that the active brothers will follow.</p>
	<p style="margin: 1.5em 0px;">The last issue I want to focus on is on empowering actives. Over the last year I have noticed a drop in the active participation, and more activity, initiative, control and decisions made from the past and present Executive Committees and Pledge Committees. In 2008, regular actives participated more in discussions at CM and forums, and took initiative in the events they chaired. Although we do have strong actives, I feel that they are taking less initiative and tend to take a backseat in participation. After much thought, I believe this is because actives are less empowered than they were two years ago. As president I want to make an environment where regular actives feel comfortable taking leadership roles and initiative in what they want to do, voicing their opinion and making change. It is not ExComm’s job to make rules and tell actives what to do, it is the chapter as a whole’s job to make decisions and organize the chapter in a way that suits everyone.</p>
	<p style="margin: 1.5em 0px;">In closing, I want to thank you for reading through this platform. I believe the points I address are important if we aspire to improve the chapter, but they are not the only things. As president I intend to do my best to serve the chapter in all respects. I believe in Alpha Phi Omega, but mostly I believe in the greatness of Gamma Gamma.</p>
	<p style="margin: 1.5em 0px;">In Leadership, Friendship and Service, <br /><br />Courtney Marie McLaughlin</p>
</div>


<h2 style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
Pledgemaster: <span style="font-weight: normal;">Kim Saelee (WK)</span>
</h2>
<div style="max-width: 50em; margin-bottom: 3em; line-height: 1.5;">
	<p style="margin: 1.5em 0px;">Hello Gamma Gamma,</p>

<p style="margin: 1.5em 0px;">I believe that I am qualified and have the passion and drive necessary to be Gamma Gamma’s next Pledgemaster. Please review my platform for more information regarding why I want to be Pledgemaster, my ideas relating to the pledge program, and my qualifications for this position.</p>

<p style="margin: 1.5em 0px;">As a pledge five semesters ago, I was initially pretty quiet and found it sometimes difficult to contribute to the pledge class since it was so large. However, I recall my Pledge Committee constantly encouraging the pledges to speak up, to be involved in chapter operations, and to contribute more than is expected of a pledge. This really spoke to me as a pledge, and from then on, I was determined to one day become involved in inspiring future pledges.
As an active, I have taken on various chairing positions, and as a result, I have grown more than I could have ever imagined. Every semester I come back excited about chairing another big event, or trying something new like attending another LEADS workshop. Alpha Phi Omega has so many resources to offer to its’ pledges. As Pledgemaster, I hope to make pledges well aware of this, and to encourage them to pursue their interests in developing as leaders, brothers of the fraternity, and volunteers of the community.</p>

<p style="margin: 1.5em 0px;">So you are probably wondering why I would want to spend my last semester in college serving as the Pledgemaster, which is a huge time commitment. As seen by my qualifications, I haven’t had a single semester since I pledged where I have not been involved. Before I graduate, I want to contribute something bigger than I ever have for Gamma Gamma, and with my knowledge of this chapter thus far, I feel that I am qualified to be Pledgemaster. I understand that actives are very important in the chapter because they serve as the backbone; without actives, we have no chapter. In my eyes, the best way to strengthen the chapter is to start with the pledges, and instill within them the values of the fraternity. Good actives are the result of good pledges. When I was a pledge, I felt like the chapter was strong. Now, as an active, I know that the chapter is just as strong, but I recognize that we can still grow and be even better. I believe that in order to go further, we need to strengthen the way in which we educate our pledges about the morals and values of the fraternity. With the help of the pledge committee, I know that we can accomplish this goal of creating an even stronger chapter.</p>

<p style="margin: 1.5em 0px;">The Ideal Pledge Committee<br>
If elected Pledgemaster, a main priority of mine will be to emphasize unity among the pledge committee, so that together we will succeed in developing the new pledges into future actives who will be knowledgeable, respectful, and dedicated to the chapter. As Pledgemaster, I would regard my Pledge Committee as a team, striving for a common goal. Although the Pledgemaster is ultimately in charge of the program, it is the trainers who work directly with the pledges, and really influence the pledges’ views of the fraternity as a whole. I intend to work with the pledge committee to find a common ground so that we are united on how we represent ourselves, both before the chapter and the pledges. I plan to encourage my pledge committee to develop personal friendships with their pledges, while also acknowledging the line of professionalism between friend and trainer. When I was Fellowship Trainer, I put effort into bonding with my trainees outside of Pledge Reviews, so that they would feel comfortable working with me as well as developing a true friendship. We all know from firsthand experience that pledging is not easy - having an good trainer there to help you through the tough times will only make it better.</p>

<p style="margin: 1.5em 0px;">The Pledge-Active Connection<br>
Chapter Unity is also of special importance to me. Although in the past it has not been associated with the position of Pledgemaster, I feel that it is especially important for the Pledgemaster to advocate stronger chapter unity. With such a large chapter, it can be somewhat frightening for pledges to approach actives, especially those outside of their family. I propose that the Pledgemaster work directly with the Membership Vice President to organize large chapter-wide fellowships, where both pledges and all actives are encouraged to attend. Imagine Interfam, but at a much larger level. Sometimes actives who are not in the family system feel left out and experience difficulty in meeting the new pledges. These events will encourage actives to get to know pledges, whether they are in the family system or not. This will lead to creating greater chapter unity, which will directly benefit the chapter as a whole. Getting pledges pumped up and excited about Sectional and Regional conferences, and encouraging them to take part in the chapter roll call is key to getting them more committed to the chapter. Brothers who are spirited as pledges tend to continue to show support for the chapter when they are actives. Most importantly, chapter spirit is infectious - if actives see that pledges are having the time of their lives, they will want to join in on the fun as well!</p>

<p style="margin: 1.5em 0px;">Pledge Class Solidarity<br>
My most important focus as Pledgemaster will be to encourage pledge class unity. Unity in a pledge class is so important because the experiences a pledge have shapes their overall experience in Alpha Phi Omega. Pledging is the time when brothers first develop their loyalty for the chapter, and build respect for Leadership, Friendship, and Service. Pledges who excel during their pledging semester and create strong bonds with their pledge class will more likely come back in the future to serve the chapter as leaders. This current semester, the pledge class is a fraction of what it usually is. As a result, the JLC’s have been privileged to really get to know the majority of their pledge class, creating a much stronger pledge class bond than has been seen these past few semesters. I plan to limit the number of pledges based on how much interest there is during Rush, as well as the number of Bigs we will have available. I also plan to encourage the Pledge Class President to create and promote pledge class bonding events, similar to those initiated by the current pledges. My hope is that we will create a tightly-knit pledge class that will value the traditions of the chapter, and eventually step up and contribute to the chapter on an even greater level as actives.</p>

<p style="margin: 1.5em 0px;">Pledge Education<br>
The pledging program is an integral component of our chapter operations. Gamma Gamma runs on the success of the pledge program - through the events, education, and excitement that comes with pledging. For the most part, I would not implement any drastic changes to the pledging curriculum. Here at Gamma Gamma, we have an extremely strong pledge program, supported by an even stronger active body, and I see no necessary changes. However, I do plan to work with my P-Comm to brainstorm more interactive methods to teach pledges the fraternity history and traditions. Some ideas I have include games and activities to help the pledges better learn the material, instead of just memorizing it and forgetting it after the pledge test. In addition, I will also encourage pledges to participate in LEADS workshops - I’ve completed Launch & Serve and really enjoyed it. Through LEADS workshops, pledges have the opportunity to really develop skills that cannot be learned by reading or through our pledge reviews. </p>

<p style="margin: 1.5em 0px;">If elected Pledgemaster, I plan to dedicate time and effort into strengthening the pledge program, to create a culture that encourages pledges to go above and beyond what is expected of them, and to support them in their journey to activehood. Most importantly, I plan to stress respect for the fraternity and its founding principles. Creating the foundation for a strong pledge class is necessary, since it will directly lead to forming an even stronger active backbone for the future of Gamma Gamma. </p>

<p style="margin: 1.5em 0px;">In Leadership, Friendship, and Service,<br>
Kim Maylin Saelee</p>

<p style="margin: 1.5em 0px;">Qualifications<br><br>

<b>Fall 2008 – Wilfred Krenek Pledge Semester</b><br>
Fellowship Committee<br>
Banquet Committee, Fellowship<br>
**Pledge Oak Recipient<br>
<b>Spring 2009 – Sheehan Tejamo Pledge Semester</b><br>
Rush Chair, Membership<br>
Sergeant-at-Arms, President<br>
Banquet Committee, Fellowship<br>
Scrapbook Committee, Historian<br>
Family System - Juicy For Ya Big<br>
*GG Maniac Recipient<br>
**Sturdy Oak Recipient<br>
** Attended LEADS: Launch<br>
Completed 100+ hours of community service<br>
Attended 25+ Fellowships<br>
<b>Fall 2009 – Jack A. McKenzie Pledge Semester</b><br>
Fellowship (FunComm) Co-Trainer, Pledge Committee<br>
Banquet Committee, Fellowship<br>
**Sturdy Oak Recipient<br>
<b>Spring 2010 – Geoffrey Lee Pledge Semester</b><br>
Banquet Chair, Fellowship<br>
Family System – FUDs Parent<br>
Sectionals Committee, Membership<br>
**Completed 75+ Hours of Service<br>
**Attended LEADS: Serve <br>
**Sturdy Oak Recipient <br>
<b>Fall 2010 – James L. Chandler Pledge Semester</b><br>
Sergeant-at-Arms, President<br>
Sib-Week Co-Chair, Membership<br>
IC-Carnival Co-Chair, Fellowship<br>
Banquet Committee, Fellowship<br>
Family System – Hyphy Train Aunt
</p>


</div>


<h2 style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
Administrative Vice President: <span style="font-weight: normal;">Edward Ho (JM)</span>
</h2>
<div style="max-width: 50em; margin-bottom: 3em; line-height: 1.5;">
	<p style="margin: 1.5em 0px;">Dear fellow brothers,</p>
	<p style="margin: 1.5em 0px;">When I started out as a pledge in Alpha Phi Omega, I never thought that I would run for the highly influential positions in the Pledge Committee or the Executive Committee. I came in as a shy and quiet kid who never really had the guts to speak in front of huge crowds much less lead and teach people. My short career so far here at Alpha Phi Omega has taught me to speak up and speak out and has put me in unfamiliar situations where I have had to think on my feet.</p>
	<p style="margin: 1.5em 0px;">I was an uncle, by title, for the Spaghetti-Hos but I showed up to every event because I loved hanging out with my small fam and helping the littles do the best they could during their pledging semester. At the end of that semester I applied for Pledge Committee because Richard told me it would be fun. I never thought that I would have to work so hard but it has been very rewarding personally. Because of what these events have given to me and how they have made me grow as an individual, I feel the need to give back to a chapter (and its members) that has taught me so much.</p>
	<p style="margin: 1.5em 0px;">One way I thought of giving back was to run for Executive Committee. Administrative Vice President is the position on Executive Committee that I feel most suited for. The main responsibilities for this office are reserving suitable rooms for each event, overseeing and regulating the chapter’s Stylus, and maintaining the chapter website along with the webmasters. There isn’t much to improve on reserving rooms but I promise that I will try my best and my hardest to get the room that is best-suited for each of our events.</p>
	<p style="margin: 1.5em 0px;">The chapter website is a tool that is used most by all the members of the chapter. It is the only way anyone in the chapter can access service projects and fellowships as well as the contact information of all the brothers. Maintenance of the website is very important and I feel that I am a good candidate to help maintain the website because of my programming background; I pick up programming languages fairly easily and am willing to learn whatever I need to help out with the maintenance of the chapter website.</p>
	<p style="margin: 1.5em 0px;">And finally, the Stylus helps connect people in the chapter to what is going on in people’s lives. There have been problems with members not submitting any articles. I want to encourage people to write quality articles, therefore I would give the person who wrote the best article a free dinner, if budget allows. And also, to address the issue of lost Styluses and members who were not at CM but want to read the Stylus, I will post an electronic version of the Stylus online.</p>
	<p style="margin: 1.5em 0px;">I feel that being on Excomm will help develop my individual abilities and I hope that I can become an Admin Vp worthy of your vote. Thank you for your consideration.</p>
	<h3 style="font-weight: bold; text-decoration: none;">JM Semester: Fall 2009</h3>
	<ul style="list-style: inside disc; margin-bottom: 1.5em;">
		<li>Admin Trainee</li>
		<li>Scrapbook Committee</li>
		<li>Pledge Oak</li>
	</ul>
	<h3 style="font-weight: bold; text-decoration: none;">GL Semester: Spring 2010</h3>
	<ul style="list-style: inside disc; margin-bottom: 1.5em;">
		<li>Uncle(technically a big) for Spaghetti-Hos!
		<li>Service Email Chair
		<li>Participated in Sectionals Roll Call
	</ul>
	<h3 style="font-weight: bold; text-decoration: none;">JLC Semester: Fall 2010</h3>
	<ul style="list-style: inside disc; margin-bottom: 1.5em;">
		<li>Pledge Committee - Co-Finance Trainer
	</ul>
</div>


<h2 style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
Membership Vice President: <span style="font-weight: normal;"></span>
</h2>
<div style="max-width: 50em; margin-bottom: 3em; line-height: 1.5;">
	<p style="margin: 1.5em 0px;"></p>
</div>


<h2 style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
Finance Vice President: <span style="font-weight: normal;">Michelle Chen (JM)</span>
</h2>
<div style="max-width: 50em; margin-bottom: 3em;">
	<p style="margin: 1.5em 0px;">Hello Gamma Gamma! I’m running for Finance VP because through my past APO Finance experience I have found that I am qualified for this position and that it is a field that I enjoy and really want to continue in.</p>
	<p style="margin: 1.5em 0px;">My first experience as dealing with finances was at GL Semester’s Post Info Night Fellowship at Fenton’s. As you can imagine splitting the bill amongst 30 actives and the rushes isn’t the easiest thing to do. I’d heard of the semester before where those who had calculated the bill had come up approx $100 short. I was extremely nervous that this would happen again, so I devised a way in which to figure out the bill while everybody was eating and how much each person would have to pay so we wouldn’t run into this problem.</p>
	<p style="margin: 1.5em 0px;">I was also fundraiser chair as part of Sam Blanchard’s Fundraiser Committee during the GL Spring Semester. I have done a total of 10 fundraisers and have chaired 9 of them, a few of the ones that I have chaired of which I have actually chaired on my own. In doing several of these fundraisers I’ve developed strong relations with several of the employees at Sodexo. I would have continued to be a fundraiser chair during this JLC Fall Semester if I hadn’t gone onto PComm.</p>
	<p style="margin: 1.5em 0px;">Which brings me to my next qualification, I am currently one of the trainers for Finance on PComm. I believe that this qualifies me as it’s a step toward being a Finance VP. I believe that I’ve gained experience in calculating the budget and distributing reimbursements amongst PComm. I’ve had to plan out the budget at the beginning of the semester before the pledges arrived and it was rather difficult since I didn’t know exactly how much money would be coming in. Throughout the semester I’ve had to track down how much money has been spent and to figure out where every dollar has been going. I do realize that working with finances in a small group cannot compare to handling the finances of the whole of the chapter, but I am up to the challenge and I do believe that I can meet it head on.</p>
	<p style="margin: 1.5em 0px;">I do realize that one of the biggest issues I'll have to face is the fact that there will be no more football games for Gamma Gamma to use as fundraisers, leaving us to search for different sources of income. I am dedicated to finding other possible fundraisers, such as working concession stands for Warriors Games and doing restaurant fundraisers.</p>
	<p style="margin: 1.5em 0px;">I know that being the Finance Vice President is a rather daunting task that everybody will think twice before choosing who they think is best suited for this position. However, with this platform I hope that it has encouraged you all to give me a chance. Thank you all for listening!</p>
	<h3 style="font-weight: bold; text-decoration: none;">JM Semester</h3>
	<ul style="list-style: inside disc; margin-bottom: 1.5em;">
		<li>Service Committee</li>
		<li>Pledge Oak Recipient</li>
	</ul>
	<h3 style="font-weight: bold; text-decoration: none;">GL Semester</h3>
	<ul style="list-style: inside disc; margin-bottom: 1.5em;">
		<li>Fundraiser Chair</li>
		<li>125 Service Hours</li>
		<li>Cherry Blossom Festival Chair</li>
		<li>Scrapbook Chair</li>
		<li>Sturdy Oak Recipient</li>
	</ul>
	<h3 style="font-weight: bold; text-decoration: none;">JLC Semester</h3>
	<ul style="list-style: inside disc; margin-bottom: 1.5em;">
		<li>JLC PComm Finance Co-Trainer</li>
	</ul>
</div>


<h2 style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
Fellowship Vice President: <span style="font-weight: normal;"></span>
</h2>
<div style="max-width: 50em; margin-bottom: 3em; line-height: 1.5;">
	<p style="margin: 1.5em 0px;"></p>
</div>


<h2 style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
Historian: <span style="font-weight: normal;"></span>
</h2>
<div style="max-width: 50em; margin-bottom: 3em; line-height: 1.5;">
	<p style="margin: 1.5em 0px;"></p>
</div>

HEREDOC;
}
Template::print_body_footer();
Template::print_disclaimer();
?>
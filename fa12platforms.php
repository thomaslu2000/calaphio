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
<h1 style="margin-bottom: 1em;">Fall 2012 Election Platforms</h1>

President | <a href="#ww">Wiemond Wu</a> | <a href="#ac">Andrew Cai</a> |<br>
Service VP | <a href="#kf">Kaitlin Fronberg</a> | <br>
Pledgemaster | <a href="#tt">Tonia Tran</a> | <br>
Admin VP | <a href="#tl">Tony Le</a> | <br>
Membership VP | <a href="#af">Alyssa Ferrell</a> | <br>
Finance VP | | <br>
Fellowship VP | <a href="#pl">Polly Luu</a> | <br>
Historian | | <br>
<br>
<br>

<h2 style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
<a name="ww">
President: <span style="font-weight: normal;"> Wiemond Wu (CPZ)</span>
</a>
</h2>

<div style="max-width: 75em; margin-bottom: 3em; line-height: 1.5;">
	<p style="margin: 1.5em 0px;">Greetings, Gamma Gamma,</p>

	<p style="margin: 1.5em 0px;"> As President, I seek to maintain four standards for the chapter: (<b>i</b>) set an <b>example</b> to both pledges and actives, (<b>ii</b>) oversee operations in all aspects of the chapter, with an emphasis on <b>chapter spirit</b>, (<b>iii</b>) keep actives motivated and inspired to continue to do <b>quality</b> service, and (<b>iv</b>) <b>lower/revert back</b> to Active requirements in hopes of active and pledge retention. With this platform, I request you to consider my bid for the presidency. </strong>

	<p style="margin: 1.5em 0px;">

	<h3 style="font-weight: bold; text-decoration: underline;">Why President?</h3>
	<p style="margin: 1.5em 0px;"> I initially thought my biggest contribution to the chapter’s success was to serve as Pledgemaster. I now realize my greatest contribution to Gamma Gamma would be serving as President. I originally want to set an example to just the pledges by being Pledgemaster. After careful consideration, I want to expand my leadership and influence by setting an example to both actives and pledges simultaneously. The President holds a greater sphere of influence throughout the chapter. As President, I want to help revamp the chapter’s Active requirements through several voluptuous proposals, ultimately lessening active requirements and refocusing on chapter spirit and dedication for quality service. </p>

	<h3 style="font-weight: bold; text-decoration: underline;">Expectations of the Executive Committee</h3>
	<p style="margin: 1.5em 0px;"> <b>Leadership</b> As leaders, I expect ExComm to symbolize what the chapter believes in by going above and beyond the minimum in both service and fellowships. Professionalism will be set as a standard for the ExComm and the chapter, which is something that has not been stressed. Seeing professional development workshops such as public speaking, time-management, and resume workshops would be a great addition to the chapter. A Professional Development chair might be in the horizon; I will also push for LEADS courses for the chapter on a semester basis.  </p>

	<p style="margin: 1.5em 0px;"> <b>Friendship</b> As a brotherhood, I will enforce the Transparency Policy between the ExComm and actives/pledges. I will encourage actives/pledges to tell ExComm their frustrations and concerns so ExComm can work towards making positive improvements to the chapter. As President, I will set aside time for actives/pledges to stop by my additional Office Hours (once a week) to discuss any concerns they may have with the chapter (i.e. bigging, chairing, etc.). I accept the responsibility to represent ExComm, so I will be sure to pass on all concerns people have to their respective ExComm member, if they have not done so already. All ExComm members will complete at least 10 fellowships throughout the semester to maintain visibility. </p>

	<p style="margin: 1.5em 0px;"> <b>Service Service</b> is the epitome of the chapter. I expect service being carried out at maximum effort by actives/pledges. All ExComm members will complete at least 5 extra service hours (in addition to the minimum) throughout the semester to maintain visibility. I want to share that responsibility with the Service Vice President to encourage quality and quantity of service projects throughout the Bay Area. We have a reputation as the <b>largest international service fraternity</b>, and I expect nothing less than living up to that name. </p>

	<h3 style="font-weight: bold; text-decoration: underline;">Policy Changes</h3>
	<p style="margin: 1.5em 0px;"> <b>Inter-Chapter Relations</b> Unlike MH semester, attending IC CMs should be counted as one full IC credit instead of half on one condition. Attendees must share what happened at other chapter’s CM (i.e. new ideas, events,  differences etc.) to our chapter during our own CM. If this is not completed, then no IC credit will be rewarded. This gives our brothers a view of what other chapters are doing differently. It keeps actives/pledges alert during IC CMs, so we can always be innovative within our own chapter with new ideas and propositions. This reinforces the idea that visiting other chapters are important. It also provides incentive for actives/pledges to go elsewhere and explore other chapters to complete their IC requirement. In return, I would expect everyone to attend at least one GG hosted event a semester, and those can be counted as either a service or fellowship. </p>

	<p style="margin: 1.5em 0px;"> <b>Awards Committee</b> As President, I understand there is a strong importance of awarding actives. However, a set standard of requirements for actives to reach to qualify as going “above and beyond” is unnecessary. “Above and beyond” pertains various definitions; having a set standard this semester may not encompass all the various ways an active can show their involvement and contribution to the chapter. If elected, I would remove the Awards Committee. Similarly to past semesters, Active members should respect the Executive Committee’s judgement about Sturdy Oaks. I also believe the General Awards are not necessary, as Sturdy Oaks should be the highest award an Active member can get aside from the Distinguished Service Key award. </p>

	<p style="margin: 1.5em 0px;"> <b>Jeweler</b> As President, I would reinstate the Jeweler. I hope for the Jeweler to work closely with the Chapter Historian and I to make something memorable together for the chapter. </p>

	<h3 style="font-weight: bold; text-decoration: underline;">My Chapter Vision</h3>
	<p style="margin: 1.5em 0px;"> My concentration as President will be focused on rebuilding the chapter. I understand that inter-chapter relations with other chapters are important, but the chapter needs my attention first. In my experience as an active in APO, I have seen actives leave in large numbers. It is in my belief that actives are leaving because they see APO as a set of requirements. If it is one thing I have learned as an active, it is that APO is an extracurricular activity. I want to remind people that APO is for those who want to partake in leadership, friendship, and service on their free time and to have fun with it. I support lowering active requirements in hope for actives to stay longer in APO. I promise to do my best to fulfill these goals for 2013 at the best of my abilities. I believe that my leadership and work ethics will enable me to lead the chapter and make me an excellent candidate. </p>

	<p style="margin: 1.5em 0px;"> I hope to accomplish my vision as a team with the next Executive Committee, as my term as President will hopefully be nothing short of revolutionary. After attending Fall Fellowship this semester, I know our chapter has pride and commitment. I only hope to begin fostering and building upon that potential. It can be as simple as saying our cheer after every CM. So please join me in cheering, Go Gamma Gamma, Go Gamma Gamma, WHAT?! </p>

	<p style="margin: 1.5em 0px;">iLFS,<br>
	Wiemond Wu</p>

	<h3 style="font-weight: bold; text-decoration: underline;">Qualifications</h3>
	<br>

	<h3 style="font-weight: bold; text-decoration: none;">CPZ Semester - Fall 2011</h3>
	<ul style="list-style: inside disc; margin-bottom: 1.5em;">                                                                                                            
	<li>Leadership Committee Trainee</li>
	<li>Spirit Committee</li>
	<li>HallCarn Committee</li>
	<li>Pledge GG Maniac</li>
	<li>Pledge Oak Recipient</li>
	<li>49 Service Hours, 25 Fellowships</li>
	</ul>

	<h3 style="font-weight: bold; text-decoration: none;">JS semester - Spring 2012</h3>
	<ul style="list-style: inside disc; margin-bottom: 1.5em;">
	<li>Carpe Noctem Big</li>
	<li>Sergeant-at-Arms</li>
	<li>GG BBQ Retreat Chair</li>
	<li>Banquet Committee</li>
	<li>Presidental Service Award</li>
	<li>Sturdy Oak Recipient</li>
	<li>66 Service Hours, 20 Fellowships</li>
	</ul>

	<h3 style="font-weight: bold; text-decoration: none;">MH semester - Fall 2012</h3>
	<ul style="list-style: inside disc; margin-bottom: 1.5em;">
	<li>Leadership Co-Trainer</li>
	<li>Spirit Committee</li>
	<li>35 Service Hours, 21 Fellowships</li>
	</ul>
	</ul>

</div>

<h2 style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
<a name="ac">
President: <span style="font-weight: normal;"> Andrew Cai (JS)</span>
</a>
</h2>

<div style="max-width: 75em; margin-bottom: 3em; line-height: 1.5;">
<p style="margin: 1.5em 0px;">Hello,</p>
<p style="margin: 1.5em 0px;">While I have not had the opportunity to be a high-visibility role in APO, I have been in executive positions previously and I do believe I have the ability to make sweeping changes and to carry out the role of President well.</p>
<p style="margin: 1.5em 0px;">My main target is the requirements.</p>
<p style="margin: 1.5em 0px;">For those of you who don't know, APO has a recurring problem of retention, which stems from the enormous time commitment. If we continue with the way things are now, we will fall in danger of the chapter here at Berkeley being deactivated.</p>
<p style="margin: 1.5em 0px;">Proposal: For every additional semester while active in APO, the amount of requirements is decreased by 50%. 
<p style="margin: 1.5em 0px;">Corollaries:
<ul style="list-style: inside disc; margin-bottom: 1.5em;">                                                                                                            
	<li>Decentralizing the power of Excomm. In doing so will empower actives to change aspects they see fit, further improving the overall health of the chapter in the long run.</li>
	<li>Greater flexibility to get involved in different aspects of the chapter without being constrained by requirements.</li>
	<li>Greater pledge class diversity, and consequently, greater age diversity. Having a solid member body of upperclassmen makes an organization extremely strong.
	<li>Increasing academic diversity in APO. Where are the BioE, Physics, Chemistry, Math, Electrical Engineering majors? No sane Physics major would join APO because of the time-commitment.</li>
	<li>Removing the associate status. There is no need to go associate if next semester your requirements are going to decrease anyways.</li>
</ul>

<p style="margin: 1.5em 0px;">The quality of the pledge experience must remain top-notch so I propose waiving all <strong>regular</strong> active requirements for bigs and PComm, of course that means that they still have to attend Campout and Broomball and other pledge-required events. Excomm will also not be required to fulfill <strong>any</strong> requirements, but this does not mean that the standard for Excomm will be any less, because the true leaders will step up and still complete the regular active requirements if they intend to set an example. Doing this will simply eliminate the "lower bound" but does not change anything.
There are other things (3 C's, the IC credit, etc.) I want to change but none quite as substantial as above.</p>
</div>

<h2 style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
<a name="kf">
Service Vice President: <span style="font-weight: normal;">Kaitlin Fronberg (KS)</span>
</a>
</h2>

<div style="max-width: 75em; margin-bottom: 3em; line-height: 1.5;">
	<p style="margin: 1.5em 0px;">Hey Gamma Gamma,</p>

	<p style="margin: 1.5em 0px;"> I know that I have not been around this semester, and believe me, it has been driving me crazy to not have a steady stream of service! When I pledged Alpha Phi Omega during KS semester, I realized that I had found my home. No other place in Berkeley is as mindful and dedicated to service as here. Service is what drew me in, and service is one of the main reasons why I come back. Yes, I haven’t been here this semester, but that does not, in any way, diminish my passion and love for service, or Alpha Phi Omega. </p>

	<p style="margin: 1.5em 0px;"> I have spent my entire time in APO learning about how to be a leader – a leader is someone who goes a step beyond chairing and organizing and represents people’s interests and preferences with flexibility. Beyond APO LEADS and beyond multiple chairing and committee positions, I spent this semester writing advocacy activities and pieces about supporting young children at the state and federal level; I have learned overarching bureaucracy and how to conduct work groups to correct for large system errors and contend for contingency problems. I would like to believe that I have the gusto, know-how, and vision to push Gamma Gamma’s service forward. </p>

	<p style="margin: 1.5em 0px;"> Gamma Gamma has been known to have one of the best service programs in Section 4 and I would love to see that again. I don’t believe that we can take service for granted; I propose making service a little bit more fun—more focused on a wide range of events for everyone. </p>

	<h3 style="font-weight: bold; text-decoration: none;">Expanding Large Service Projects</h3>
	<p style="margin: 1.5em 0px;"> I want to revitalize Spring Youth Service Day to not only include Cal Day events, but also an elementary school focus in April, on the 19th or 21st. For instance, this could be a scouting event—a large badge workshop for local elementary school scouting groups . I would like to plan an all-day Gamma Gamma initiated IC service project, such as a Bioswale Cleanup. While I love both IC Sewing and joint service projects, I would like to expand spring’s large service projects and bring focus back to service. </p>

	<h3 style="font-weight: bold; text-decoration: none;">Revitalizing Community Partner Relationships</h3>
	<p style="margin: 1.5em 0px;"> I would like to refocus on fun past service like the Academy of Friends Gala. I would like to rekindle relationships with our community partners like Project Open Hand, SF Food Bank, Dinner for the Poor, GLIDE church in SF, and Scouting Troops. On top of that, I want to reinitiate positions like the Service Communication Chair, who was responsible for regular contact with these long-time partners and maintaining these types of relationships to last us for years to come. </p>
	<p style="margin: 1.5em 0px;"> Our long-standing community partners have been tried and true when it comes to good service and part of our positive reputation as a chapter depends on maintaining these relationships. By furthering Scouting relationships, we can open up more opportunities for service to country. </p>

	<h3 style="font-weight: bold; text-decoration: none;">Feedback</h3>
	<p style="margin: 1.5em 0px;"> I want to re-evaluate how we look at quality events. Events that have had good past evaluations should be highlighted. I would also like to work with the Administrative VP to allow non-event-chairs to evaluate and give feedback for events so that everyone has a better idea of what these projects entail. I also plan to increase the SVP’s visibility by extending office hours beyond pledging so that actives can give feedback about service events. Feedback translates to quality and I want our service projects to have quality. </p>
	<p style="margin: 1.5em 0px;"> Service should always be fun. Regardless of whether or not you are cuddling kittens or sifting through compost at the SF Green Festival. It is important to be well informed on service events based on what other people have previously said about these events. </p>

	<h3 style="font-weight: bold; text-decoration: none;">Campus Outreach</h3>
	<p style="margin: 1.5em 0px;"> I want to invite other Berkeley service organizations like Rotaracts or Circle K to participate in some of our events, like GG Sewing or Pennies for Patients. My internship this semester has taught me how to organize and present at large work groups in order to gain effective community feedback. APO is not alone in Berkeley and it is time to invest in more local, campus service like CalSTAR Yoga, Eggster Egg Hunt, and Berkeley Project’s spring service month. Plus, by increasing on-campus partner relationships, we will also increase service to campus opportunities! </p>

	<h3 style="font-weight: bold; text-decoration: none;">Service Rewards</h3>
	<p style="margin: 1.5em 0px;"> In order to inspire actives to help initiate and maintain service projects, I propose a reward system. For every two new service projects that are put on the calendar with a chair, a brother will receive a special award from the SVP. This reward process will run on a gradient system: wherein the first reward is small like a chocolate bar, the second is a small personalized object, etc. Finding a new project does not have to be hard, it could be could be as easy as involving APO with one of the other service-minded student groups (like Theater for Charity or IMPACT Academy for Youth) or just a service project you found and thought would be fun. </p>
	<p style="margin: 1.5em 0px;"> This reward system will hopefully encourage further community outreach and help invite brothers to share some of their service passions with the chapter. This reward system would also offer individual recognition for brothers that are taking an active role initiating service. </p>

	<h3 style="font-weight: bold; text-decoration: none;">Issue Discussion Groups</h3>
	<p style="margin: 1.5em 0px;"> It is easy for us to do service without thinking about it and what it means. This past semester, I regularly attended Theta Chi’s (George Washington University’s) chapter meetings. Theta Chi has an advocacy hour program where they spend time after each chapter meeting talking about advocacy issues and why they do service. I propose a similar venture: we create three separate issue discussions about broad topics and challenges that brothers may face during service (e.g. bullying) to be held throughout the semester. </p>
	<p style="margin: 1.5em 0px;"> These should be open discussions that are meant to increase mindfulness and will count towards service to the chapter as well as present educational information on how to approach difficult subjects. </p>

	<h3 style="font-weight: bold; text-decoration: none;">Service Impact Video</h3>
	<p style="margin: 1.5em 0px;"> Armand initially inspired this idea. I want to create a video detailing how APO’s service has benefitted and impacted our community and ourselves. We hear, again and again, how service makes a difference, but we rarely get to see that visualized. This video is meant to inspire service and continue to promote mindfulness. </p>
	<p style="margin: 1.5em 0px;"> Gamma Gamma, I am passionate about APO’s role in service and the direction that we can take over the next semester. What we need is solid direction, a bit more focus on quality events and community relationships, and a little bit of evidence about why volunteering matters. Thank you, for taking the time to read through all of this and I hope that you consider me for you next Service Vice President. </p>

	<p style="margin: 1.5em 0px;">iLFS,<br>
	Kaitlin Fronberg</p>

	<h3 style="font-weight: bold; text-decoration: underline;">Qualifications</h3>
	<br>

	<h3 style="font-weight: bold; text-decoration: none;">KS Semester - Spring 2011</h3>
	<ul style="list-style: inside disc; margin-bottom: 1.5em;">
	<li>SComm Trainee</li>
	<li>Cal Day/Spring Youth Service Day Chair</li>
	<li>Cont. Cal Day Kid Zone and created the MYEEP student tour</li>
	<li>Event published on the National website as a model Spring Youth Service Day event</li>
	<li>Pennies For Patients Committee</li>
	<li>37 Service Hours</li>
	</ul>

	<h3 style="font-weight: bold; text-decoration: none;">CPZ Semester - Fall 2011</h3>
	<ul style="list-style: inside disc; margin-bottom: 1.5em;">                                                                                                            
	<li>Booty Call Big</li>
	<li>Active Event Chair</li>
	<li>College Day Chair</li>
	<li>38 Service Hours</li>
	<li>Sturdy Oak Recipient</li>
	</ul>

	<h3 style="font-weight: bold; text-decoration: none;">JS semester - Spring 2012</h3>
	<ul style="list-style: inside disc; margin-bottom: 1.5em;">
	<li>Cereal Killers Big</li>
	<li>Membership VP Assistant</li>
	<li>Stylus Chair</li>
	<li>Rush Committee</li>
	<li>Reginals Banquet Committee</li>
	<li>Banquet Committee</li>
	<li>100 Service Hours</li>
	<li>Presidental Service Award - Bronze</li>
	<li>Chairs 10 Events covering 29 Hours</li>
	<li>Sturdy Oak Recipient</li>
	<li>APO LEADS: Launch, Explore, Achieve, and Serve</li>
	</ul>

	<h3 style="font-weight: bold; text-decoration: none;">Summer 2012</h3>
	<ul style="list-style: inside disc; margin-bottom: 1.5em;">
	<li>Pennies for Patients Chair</li>
	</ul>

</div>

<h2 style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
<a name="tt">
Pledgemaster: <span style="font-weight: normal;">Tonia Tran (KS)</span>
</a>
</h2>

<div style="max-width: 75em; margin-bottom: 3em; line-height: 1.5;">
	<p style="margin: 1.5em 0px;">Hello Gamma Gamma,</p>

	<p style="margin: 1.5em 0px;">To those of you who know me or, at least, know what I’ve done within the chapter, it’s not too surprising I’m running for Pledemaster; rather, it’s almost expected for me to run – as if I groomed myself for this position. To be honest, deciding to run is, by far, the most difficult decision I’ve had to make. At first, I definitely believed becoming PM was a tangible goal I had for myself. But, after being on PComm, I realized being PM is more than just having the “right APO qualifications”, especially with how dramatically the chapter has changed and morphed into a fraternity which has strayed from its core principles of Leadership, Friendship, and Service. </p>

	<p style="margin: 1.5em 0px;">And with that, my decision to run for PM stems from my belief that for positive, far-reaching change to be had for the chapter it begins with the pledge program. The decline in pledge and active retention is rooted in a flawed system. Any requirement or modification to my pledge program is intended to mold pledges into good actives. The changes I plan to implement arose through an evaluation of what the pledge program should strive to become–an open forum to exchange ideas of what LFS means and how pledges (and later, as actives) ought to demonstrate those three pillars which our chapter was founded upon. </p>

	<h3 style="font-weight: strong; text-decoration: underline;"> Pledge Program </h3></br>

	<strong> Pledge Class Size </strong>
	<p style="margin: 1.5em 0px;"> From seeing the general state of the chapter, I cannot imagine having a small pledge class. So, I have <strong>no inclination</strong> to limit the pledge class / to deter rushees from pledging. The difficulty now with having a large class is the dwindling number of actives available as Bigs and/or Parents. Nevertheless, I still want to have <strong>upwards to 40-50 pledges</strong> in hopes there will be even less emphasis on money-spending and more on quality time & time management. </p>

	<strong> Pledging + Academia </strong>
	<p style="margin: 1.5em 0px;"> Study Session. The <strong>weekly Study Sessions</strong> will remain on the calendar. Moreover, these sessions are <strong>open for actives</strong> as well. The goal is for everyone in APO, pledges & actives alike, to receive passing grades for classes, so limiting study sessions to just pledges is unnecessarily exclusive and defeats the purpose of having these events on the calendar. With this change, I plan to speak with the next FVP & MVP about making them function as study tables held by the Academic Chairs. </p> 
	<p style="margin: 1.5em 0px;"> Office Hours. In addition, to promote student life over pledge life, I will continue Celina’s <strong>“Negative Hours”</strong> rule if pledges ditch class to attend Office Hours. </p>

	<strong> Pledging-Active Relationship (ASS) </strong>
	<p style="margin: 1.5em 0px;"> Similarly to previous PMs, I want older pledge classes to be acquainted with the pledges and vice versa. Therefore, the <strong>Active Signature Sheet</strong> will remain as a requirement. Rather than limiting the sheet to a few dozen actives, I want the sheet to include all active (& possibly associate) members. From the list, pledges must attain signatures from at least one-third or one-half (unsure until I know how many actives there are for next semester) of actives to fulfill the requirement. The sheet serves as a broad introduction to the Brothers without confining them to search for only a handful of chosen actives within the chapter. </p>

	<strong> Interviews (MABs) & Reflections </strong>
	<p style="margin: 1.5em 0px;"> I propose Interviews/MABs & Reflections to be <strong>turned in at CM</strong>. Normally, most pledges scramble to study for PR quizzes, which also cover more material now, and to finish up their Interviews/Reflection. So, I want pledges to focus on studying for the quiz before PR rather than worrying about three different things entering into it. The intent of spacing out these “homework assignments” is to lessen the stress of doing too much before PR. </p>

	<strong> Format of PR </strong>
	<p style="margin: 1.5em 0px;"> The above proposition is also meant to fit a change in how PR is conducted. PR should be more than just simply reading information out of the pledge & chapter manuals. Instead, I will allot time for a <strong>20-30 minute discussion</strong> about various topics relevant to the chapter, its principles, and its structure. As PComm, we feed random facts and rules to pledges, which I find less conducive for teaching them the importance of what it means to be a Brother in the chapter. Having these dialogues is meant to allow pledges and PComm to share their thoughts and critiques to better learn why we want to be in Alpha Phi Omega and how we want to better the chapter. </p>
	
	<h3 style="font-weight: strong; text-decoration: underline;"> PLEDGE COMMITEE </h3></br>
	<strong> PComm Qualities </strong>
	<p style="margin: 1.5em 0px;"> In selecting actives to be in PComm, I want the trainers to possess three qualities: <strong>sociability/openness, visibility, and transparency/honesty.</strong> More than any other criteria, I want PComm to be a role model, to pledges; I believe these qualities will allow the trainers to be just that for pledges. </p>
	<p style="margin: 1.5em 0px;"> Sociability. PComm should take the first step to welcome pledges and be a genuine source of support and guidance for them. Having a good rapport with pledges builds trust and forges a more natural bond between them while they’re under our tutelage. </p>
	<p style="margin: 1.5em 0px;"> Visibility. It is the responsibility for leaders to set an example for younger members in the chapter. Leaders should not have high expectations of others if they are unable to live up to their own standards. So, I’m not expecting PComm to sign up for every event on the calendar, but I want trainers who are accessible to pledges outside of office hours, PRs, and CMs. If PComm requires pledges to “get to know us” then we ought to be visible and available to pledges first. So, I am holding PComm, Excomm, and myself accountable to how we portray ourselves in front of pledges. </p>
	<p style="margin: 1.5em 0px;"> Transparency. PComm must be open and honest about their pledges’ progress as well as their reasoning for making their decisions. I want there to be open lines of communication between pledges and PComm as well as actives and PComm so neither misunderstanding nor mistrust will develop to prevent pledges and actives from coming to PComm with questions or concerns. </p>

	<strong> Signature Requirement </strong>
	<p style="margin: 1.5em 0px;"> For the past couple of semesters, there has been a discrepancy between missing signatures and crossed pledges. This disparity has essentially lessened the value and weight of signatures during Judgment Night. Part of the reason is the different standards PComm holds to judge whether a pledge is deserving of their signature.  As PM, to temporarily tackle this issue, I will <strong>eliminate Signatures as a requirement</strong> yet they will still play a fundamentally important role throughout pledging, especially at Judgment Night.  Each acquired signature from PComm & ExComm basically act as vouchers/“saves”, so pledges will have a good idea of where they stand at Judgment Night. The purpose is for signatures to focus more on whether pledges demonstrated LFS, not necessarily about them being BFFs with PComm or ExComm. </p>
	<p style="margin: 1.5em 0px;"> In sum, running for Pledgemaster and implementing my vision for the pledge program serve a single purpose: teaching pledges the importance of Leadership, Friendship, and Service during pledging so they continue to follow and respect these core principles into activehood.  Thank you for reading! </p>

	<p style="margin: 1.5em 0px;">iLFS,<br>
	Tonia Tran</p>

	<h3 style="font-weight: bold; text-decoration: underline;">Qualifications</h3>
	<br>

	<h3 style="font-weight: bold; text-decoration: none;">KS Semester - Spring 2011</h3>
	<ul style="list-style: inside disc; margin-bottom: 1.5em;">
	<li>Finance Committee Trainee</li>
	<li>Spirit Committee (Sectionals Roll Call Participant)</li>
	<li>Banquet Committee</li>
	<li>Pledge Maniac Recipient</li>
	<li>Pledge Oak Recipient</li>
	<li>85+ Service Hours</li>
	<li>25+ Fellowships</li>
	</ul>

	<h3 style="font-weight: bold; text-decoration: none;">CPZ Semester - Fall 2011</h3>
	<ul style="list-style: inside disc; margin-bottom: 1.5em;">  
	<li>Ho'chata Big</li>
	<li>IC Basketball Co-Chair</li>
	<li>IC Cook-Off Co-Chair</li>
	<li>Fundraiser Co-Chair</li>
	<li>Rush Committee</li>
	<li>Banquet Commitee</li>
	<li>GG Maniac Recipient</li>
	<li>Sturdy Oak Recipient</li>
	<li>100+ Service Hours</li>
	<li>20 Fellowships</li>
	</ul>

	<h3 style="font-weight: bold; text-decoration: none;">JS semester - Spring 2012</h3>
	<ul style="list-style: inside disc; margin-bottom: 1.5em;">
	<li>Regionals Banquet Co-Chair</li>
	<li>Leadership Committee Co-Chair</li>
	<li>Banquet Committee</li>
	<li>Sturdy Oak Recipient</li>
	<li>100+ Service Hours</li>
	<li>35 Fellowships</li>
	</ul>

	<h3 style="font-weight: bold; text-decoration: none;">MH semester - Fall 2012</h3>
	<ul style="list-style: inside disc; margin-bottom: 1.5em;">
	<li>Chief Email Officer (Email Moderator)</li>
	<li>Active Retreat Co-Chair</li>
	<li>IC Basketball Committee</li>
	<li>47.5 Hours</li>
	<li>10+ Fellowships</li>
	</ul>

	<h3 style="font-weight: bold; text-decoration: none;">Time Commitment</h3>
	<ul style="list-style: inside disc; margin-bottom: 1.5em;">
	<li>16 units core/major classes</li>
	</ul>

</div>

<h2 style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
<a name="tl">
Admin Vice President: <span style="font-weight: normal;">Tony Le (JLC)</span>
</a>
</h2>

<div id="award_requirements" style="max-width: 75em; margin-bottom: 3em; line-height: 1.5;">
	<p style="margin: 1.5em 0px;">Dear Gamma Gamma,</p>

	<p style="margin: 1.5em 0px;"> I entered this chapter two years ago looking to do service and make a few friends. By now, I have way exceeded my expectations and have served this chapter wholeheartedly for the past five semesters. My dedication and passion for this chapter is shown through my maintenance of good standing each active semester over the past four semesters. Last semester, I ran for Pledgemaster, thinking that I would contribute to the chapter through raising good pledges to become good actives, but looking at the state of the chapter now, I feel that running for Administrative Vice President would be best suited for me. Good actives and retention stems all the way back from ExComm. Actives look at their ExComm who are their bigs, their littles, their PComm, their sponsors, and their friends and feel a sense of connection. This connection helps keep actives in the chapter doing the things that we all used to do. “Why should you do Admin VP and not another position?” I feel that the Administrative aspects of this chapter is what I am good at. I have chaired Stylus committee, so I understand how the newsletter comes together. As an Admin trainer, I have worked with the pledge newsletter and done many room reservations. “But you don't know how to code!” Of course I don't; but that is what the webmasters are for. There have been semesters where the Admin VPs are not EECS majors. Anyway, the point is: I want to give back to the chapter by setting an example as a strong active and doing the things I know how to do best. </p>

	<p style="margin: 1.5em 0px;"> “What changes can you bring?” Well, since I am not a coding whiz, all inquiries for website development and changes can be directed to the webmasters. As for the Stylus, I plan to change its logistics and production. My ideal plan is to have a relatively medium to large committee, with the chairs as “editors-in-chief.” We would be running under a consistent schedule to keep the production smooth and organized. Committee members would have six days to write their stories and the chairs have five days to review. The two weekend days are used for laying out the pages. A sample schedule is produced below. </p>

	<table>
		<tr>
			<td style="width: 141px"><b> Monday </b></br> Stories due/Chairs Review </td>
			<td style="width: 141px"><b> Tuesday </b></br> Chairs review </td>
			<td style="width: 141px"><b> Wednesday </b></br> Chairs review </td>
			<td style="width: 141px"><b> Thursday </b></br> Chairs review </td>
			<td style="width: 141px"><b> Friday </b></br> Chairs Review </td>
			<td style="width: 141px"><b> Saturday </b></br> Layout</td>
			<td style="width: 141px"><b> Sunday </b></br> Layout </td>
		</tr>
		<tr>
			<td><b> Monday </b></br> Print </td>
			<td><b> Tuesday </b></br> CM - Announce Theme </td>
			<td><b> Wednesday </b></br> </td>
			<td><b> Thursday </b></br> </td>
			<td><b> Friday </b></br> </td>
			<td><b> Saturday </b></br> </td>
			<td><b> Sunday </b></br> </td>
		</tr>
	</table>

	<p style="margin: 1.5em 0px;"> I plan to hold “Admin Workshops” during the weekends of layouts, which are basically an hour or two of laying out the pages for Stylus. That way, committee members can learn how to use the Adobe programs (which are useful to have in one's toolset). When I was co-chair for the Stylus committee, we had a theme for each Stylus such as “favorite celebrity crush” or “favorite restaurants in Berkeley.” In these Styluses/Styli, ideas and thoughts of the chapter collected from common subject gave a sense of unity and connection. I also plan to revamp the Stylus layout a little, to have more organization and flow. Also, if possible, I plan to print the Stylus on newsprint and the themed stuff can be in the centerspread. If not, Stylus will just be produced on white paper. </p>

	<p style="margin: 1.5em 0px;"> Regarding room reservations, that is out of our control. I can only submit requests early. </p>

	<p style="margin: 1.5em 0px;"> Anyway, thank you for your time and consideration! </p>

	<p style="margin: 1.5em 0px;">iLFS,<br>
	Tony Le</p>

	<h3 style="font-weight: bold; text-decoration: underline;">Qualifications</h3>
	<br>

	<h3 style="font-weight: bold; text-decoration: none;">JLC Semester - Fall 2010</h3>
	<ul style="text-align: left; list-style: inside disc; margin-bottom: 1.5em;">
	<li>Administrative Committee</li>
	<li>Stylus Committee</li>
	<li>IC Carnival Committee</li>
	<li>Participated in Roll Call</li>
	<li>Pledge GG Maniac</li>
	<li>Pledge Oak Recipient</li>
	<li>48 Service Hours</li>
	</ul>

	<h3 style="font-weight: bold; text-decoration: none;">KS Semester - Spring 2011</h3>
	<ul style="text-align: left; list-style: inside disc; margin-bottom: 1.5em;">
	<li>Big For Dinomite</li>
	<li>Funpack Chair</li>
	<li>Stylus Chair</li>
	<li>Rush Committee</li>
	<li>GG Maniac</li>
	<li>Sturdy Oak Recipient</li>
	<li>44 Service Hours</li>
	</ul>

	<h3 style="font-weight: bold; text-decoration: none;">CPZ Semester - Fall 2011</h3>
	<ul style="text-align: left; list-style: inside disc; margin-bottom: 1.5em;">  
	<li>Administrative Committee Trainer</li>
	<li>Funpack Committee</li>
	<li>Regionals Banquet Committee</li>
	<li>Sturdy Oak Recipient</li>
	<li>41 Service Hours</li>
	</ul>

	<h3 style="font-weight: bold; text-decoration: none;">JS semester - Spring 2012</h3>
	<ul style="text-align: left; list-style: inside disc; margin-bottom: 1.5em;">
	<li>Drop, Pop, Shock Parent</li>
	<li>HotSpot Co-Chair</li>
	<li>Active Day of Service Chair</li>
	<li>Funpack Committee</li>
	<li>Banquet Committee</li>
	<li>62 Service Hours</li>
	</ul>

	<h3 style="font-weight: bold; text-decoration: none;">MH semester - Fall 2012</h3>
	<ul style="text-align: left; list-style: inside disc; margin-bottom: 1.5em;">
	<li>Monkey Bizness Uncle</li>
	<li>MVP Assistant</li>
	<li>HallCarn Co-Chair</li>
	<li>GG BBQ Co-Chair</li>
	<li>Funpack Committee</li>
	<li>Scrapbook Committee</li>
	<li>38+ Service Hours</li>
	</ul>

</div>

<h2 style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
<a name="af">
Membership Vice President: <span style="font-weight: normal;">Alyssa Ferrell (KS)</span>
</a>
</h2>

<div style="max-width: 75em; margin-bottom: 3em; line-height: 1.5;">
	<p style="margin: 1.5em 0px;">Hi Gamma Gamma,</p>

	<p style="margin: 1.5em 0px;">  I'm Alyssa Ferrell and I pledged KS Semester: Spring 2011. I'm running for Membership VP because I believe that I could be a good leader in our fraternity. While leadership and definitely service are crucial pieces that make up our fraternity, without the brotherhood aspect of the fraternity we would definitely be lacking in spirit and support of one another. This is why I decided to run for Membership VP, as this position oversees rush as well as active retention, which are both pieces that make up the brotherhood in our chapter. I am very passionate about tackling the problems of active retention and having a successful rush,  as keeping a strong supporting brotherhood helps each of us to reach a higher standard. </p>

	<p style="margin: 1.5em 0px;"> Now that you know why I'm passionate about running for this position, I would like to address my platform. </p>

	<h3 style="font-weight: bold; text-decoration: none;">My platform is:</h3>
	<p style="margin: 1.5em 0px;"> 1. I would create a new chair under my position which would be a gear chair. I would like for the gear chair to design items such as t-shirts, tanks, cardigans, etc. that brothers can buy and wear. This way we would strive for brothers to wear APO gear at least once a week to increase the visibility of APO on campus. </p>

	<p style="margin: 1.5em 0px;"> 2. I would like to increase focus on academics, as I believe it is something that deserves more focus on, after all we are all here for our amazing education. I would like to help organize a few volunteer tutors in APO, that would hold an OH during one of the study secessions available per week, that way brothers can get help in subjects that another brother is strong in. I would also try to encourage people in the same classes to form groups and all go to a study fellowship before a midterm, as working in groups increases performance. I would also like to highlight people that helped a brother with some form of school aspect, or did well on an assignment every CM, and people could submit nominations through my email, with the winner receiving a candy treat from me. </p>

	<p style="margin: 1.5em 0px;"> 3. I would like to also show that there is support outside of the family system for everyone. By having a "Lovable Brother of the Meeting" in which a brother would get recognized for exemplifying true support towards another brother (NOT in their family). I would like to have people submit a brother that they feel did this for them "ex: I was feeling really sad but then Blank bought me a coffee and gave me a pat on the back to cheer me up and tell me everything will be alright". That person would then nominate Blank for "LBM" and then I would pick one nomination out of random to showcase at meeting. I think it's important to remind everyone that as a fraternity we should all show each other the respect and caring everyone deserves. And that the smallest acts deserve to be recognized in order to remind us, that all those times we volunteer no matter what task we are doing, we are making a difference. </p>

	<p style="margin: 1.5em 0px;">iLFS,<br>
	Alyssa Ferrell</p>

	<h3 style="font-weight: bold; text-decoration: underline;">Qualifications</h3>
	<br>

	<h3 style="font-weight: bold; text-decoration: none;">KS Semester - Spring 2011</h3>
	<ul style="list-style: inside disc; margin-bottom: 1.5em;">
	<li>Funcomm Trainee</li>
	<li>Spirit (Roll Call) Committee Member</li>
	<li>48 Hours of Service</li>
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
	</ul>

	<h3 style="font-weight: bold; text-decoration: none;">MH semester - Fall 2012</h3>
	<ul style="list-style: inside disc; margin-bottom: 1.5em;">
	<li>Fiat Cupido Aunt</li>
	<li>Associate</li>
	</ul>

</div>

<h2 style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
<a name="pl">
Fellowship Vice President: <span style="font-weight: normal;">Polly Luu (CPZ)</span>
</a>
</h2>

<div style="max-width: 75em; margin-bottom: 3em; line-height: 1.5;">
	<p style="margin: 1.5em 0px;">Hi Gamma Gamma,</p>

	<p style="margin: 1.5em 0px;">My name is Polly Luu and I am running to be your next Fellowship Vice President. Why do I want to be your next Fellowship Vice President? I strongly believe that Friendship is very important and it is the most important aspect to me in APO. </p>

	<p style="margin: 1.5em 0px;"> As FVP, I would like to make multiple changes to the fellowship program of our chapter. First, I will change the requirement of 7 fellowships to 5 fellowships. I strongly believe that fellowships are events that help brothers bond and have fun at the same time. Increasing fellowships will only put a burden on our brothers and as FVP, I want you to have fun and not feel as though they are just requirements you have to fulfill. I would rather have brothers go to 5 meaningful and fun fellowships that they enjoy than to go to 7 “requirements.” </p>

	<p style="margin: 1.5em 0px;"> As stated before, fellowships are a way to have fun but similarly to service, we need an organized way to keep track of all these fellowships. I would have a 1 day drop deadline for all fellowships. Being on Pledge Committee, many pledges were confused about fellowship guidelines. Many thought that there was a 3 day drop deadline or none at all. To make fellowships more organized, the default will be 1 day unless otherwise stated by the chair. Other chairing guidelines still apply to fellowships. </p>

	<p style="margin: 1.5em 0px;"> Fellowships are made for everyone to bond but I know that it is hard for fellowships to have only family members. So as for the family rule, I would like to change it to 20% outside of family. This will lessen the burden on the chairs to find people outside of their family to attend. </p>

	<p style="margin: 1.5em 0px;"> I would like to completely take out the active event requirement. It is important to bond with actives in APO but it is also very hard to find an active event to go to. After pledging starts, actives are more involved with their families so it is very difficult to find time to attend an active event. Even though active event is no longer a requirement, I would still have GG BBQ/Picnic as a fellowship in the beginning of the semester. I will try my best to have active fellowships, but it will no longer be required. </p>

	<p style="margin: 1.5em 0px;"> As Hotspot chair during Spring 2012, I found it very successful and many brothers came out to talk and hang out. This semester, I often walked around Sproul and never saw the table. I want Hotspot to be more visible and to do so, I will start small and only have Hotspot for two days a week. I will try to constantly promote Hotspot and I will even hold my Office Hours there. </p>

	<p style="margin: 1.5em 0px;"> As FVP, I will try my very best to “drop by” at fellowships to see how things go. An even better way for me to know how fellowships are going, are by attending. By attending and signing up on the calendar, I will know whether or not the chair is doing the 3 day email reminder and the 1 day call/text reminder. </p>

	<p style="margin: 1.5em 0px;">iLFS,<br>
	Polly Luu</p>

	<h3 style="font-weight: bold; text-decoration: underline;">Qualifications</h3>
	<br>

	<h3 style="font-weight: bold; text-decoration: none;">CPZ Semester - Fall 2011</h3>
	<ul style="list-style: inside disc; margin-bottom: 1.5em;"> 
	<li>Fellowship Committee Trainee</li>
	<li>Hall Carn Committee</li>
	<li>Pledge Oak Recipient</li>
	<li>68 Service Hours</li>
	<li>21 Fellowships</li>
	</ul>

	<h3 style="font-weight: bold; text-decoration: none;">JS semester - Spring 2012</h3>
	<ul style="list-style: inside disc; margin-bottom: 1.5em;">
	<li>Rush Co-Chair</li>
	<li>Stylus Co-Chair</li>
	<li>Hotspot Co-Chair</li>
	<li>Banquet Committee</li>
	<li>Sauce Bau5 Big</li>
	<li>GG Maniac Recipient</li>
	<li>Presidental Service Award Recipient</li>
	<li>106 Service Hours</li>
	<li>15 Fellowships</li>
	</ul>

	<h3 style="font-weight: bold; text-decoration: none;">MH semester - Fall 2012</h3>
	<ul style="list-style: inside disc; margin-bottom: 1.5em;">
	<li>Fellowship Committee Trainer</li>
	<li>Spirit Committee</li>
	<li>59+ Service Hours</li>
	<li>19+ Fellowships</li>
	</ul>

</div>

HEREDOC;
}
Template::print_body_footer();
Template::print_disclaimer();
?>
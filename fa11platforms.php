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
<h1 style="margin-bottom: 1em;">Fall 2011 Election Platforms</h1>

President | <a href="#sc">Stanley Cheng</a> | <br>
Service VP | <a href="#nn">Nicki Nario</a> | <br>
Pledgemaster | <a href="#mc">Michelle Chen</a> | <a href="#ac">Armand Cuevas</a> | <br>
Admin VP | <a href="#avp">None</a> | <br>
Membership VP | <a href="#dh">Derrick Hau</a> | <br>
Finance VP | <a href="#cy">Connie Yang</a> | <br>
Fellowship VP | <a href="#jc">Janice Chan</a> | <a href="#ak">Amul Kalia</a> | <a href="#hn">Hanh Nguyen</a> | <br>
Historian | <a href="#tn">Toshiki Nakashige</a> | <br>
<br>
<br>

<h2 style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
<a name="sc">
President: <span style="font-weight: normal;">Stanley Cheng (CC)</span>
</a>
</h2>
<div style="max-width: 50em; margin-bottom: 3em; line-height: 1.5;">
	<p style="margin: 1.5em 0px;">Hello Gamma Gamma!</p>

        <p style="margin: 1.5em 0px;">I am running for President for the upcoming year of Alpha Phi Omega.  I believe that I am well qualified for this position because of the many years I’ve been actively involved in APO.  I pledged back in Spring 2008, Chris Cheuk semester, and have enjoyed APO ever since.  Even leaving for two years didn’t stop me from coming back.  In honesty, when I was gone, the only thing I was excited about coming back to Cal was returning to APO.  Since then, I have grown personally and mentally and have been actively involved in the family system, pledge committee and executive committee as well as other committees in APO.</p>

        <p style="margin: 1.5em 0px;">I want to advocate three things: a refocus of members back to the three cardinal principles LFS, lead by example (personally and with excomm), and increase interchapter relations and communication.</p>

        <p style="margin: 1.5em 0px;"><b><u>LFS</u></b><br>My main platform is to refocus the vision of APO members back to when I pledged APO.  Over some years, the brothers’ vision of being a leader, friend and of service has slid through the cracks, I hope to refocus everyone back to that.</p>

        <p style="margin: 1.5em 0px;"><b><u>Example</u></b><br>One way I can do that is by setting a good example.  I believe in the power of influence and not by coercion.  For example, you will never see me under the influence or make a fool of myself from that.  Hypocrisy is what causes people to doubt leaders, and I will do my absolute best to follow the principles of LFS, which are qualities that I confidently proclaim I have lived over the years, not only because of APO, but also because of good examples of people in my life who possess these same qualities.  </p>

        <p style="margin: 1.5em 0px;">I understand that ExComm and PComm are big influences to the chapter, and hope to unify both committees and maintain constant communication between them.  I will advocate for each one of us to further exemplify L, F, and S in hopes to encourage all actives to do the same.  I believe that our examples as a whole will help elevate the chapter’s spirit.  I also believe in goal setting and I will help each ExComm member to set goals to better run the chapter.</p>
          
        <p style="margin: 1.5em 0px;"><b><u>IC Relations</u></b><br>Interchapter relation is important in order to maintain a unifying international organization.  I am fascinated with the way other chapters manage their chapter.  I will keep constant communication with other chapters and assist in their resolving of problems, promoting of activities and upholding of standards.  IC relations are relatively neglected in our chapter, but I plan to make sure we attend their IC activities.
</p>

        <p style="margin: 1.5em 0px;"><b><u>Vision</u></b><br>Because we are a fraternity and a brotherhood, I believe that we should all be able to assist and support each brother.  I envision APO to be the place to ask anyone for help, not only your family.  I believe that we can form lasting bonds with more people than just our family.  I believe that even a smile or a “hello” to a fellow brother will strengthen our relationship with one another.</p>

        <p style="margin: 1.5em 0px;">I am an honest and sincere person.  I am fun and entertaining but also serious when I need to be and remain stern until demands are met.  I strongly believe in the power of trust, and I promise to unify the leaders in APO so that you can trust us.  I promise to keep myself visible in APO and continue to talk with everyone in the chapter.  As a whole, we have accomplished so much, and we can accomplish even more!  Even though the President does a lot of the behind the scenes work, the change and support comes from you!  If elected, I promise this organization will grow and multiply in the spirit of Leadership, Friendship and Service.</p>

	<h3 style="font-weight: bold; text-decoration: none;"><u>Qualifications				</u></h3>
        <br>                                                                                                                                                                                                                               
	<h3 style="font-weight: bold; text-decoration: none;">CC Spring 2008</h3>
	<ul style="list-style: inside disc; margin-bottom: 1.5em;">
	<li>Leadership Committee</li>                                                                                                                                                                                                              <li>-Chaired Pledge Class Retreat</li>                                                                                                                                                                                                                            
	<li>*Pledge Oak Recipient</li>	<li>*Pledge Superlative: Most Spirited</li>	</ul>
	<h3 style="font-weight: bold; text-decoration: none;">Active Information</h3>	<h3 style="font-weight: bold; text-decoration: none;">JLC Fall 2010</h3>
	<ul style="list-style: inside disc; margin-bottom: 1.5em;">
	<li>Family System - Surf Ride the Whip: Big</li>	<li>Rush Committee, Membership</li>	<li>-Chaired Game Night</li>	<li>Banquet Committee, Fellowship</li>	<li>*Active Spotlight</li>	<li>*Sturdy Oak Recipient</li>
	</ul>
	<h3 style="font-weight: bold; text-decoration: none;">KS Spring 2011</h3>
	<ul style="list-style: inside disc; margin-bottom: 1.5em;">
	<li>Pledge Committee, Leadership Co-Trainer</li>	<li>*Sturdy Oak Recipient</li>	<li>*50 hours of service</li>	</ul>
	<h3 style="font-weight: bold; text-decoration: none;">CPZ Fall 2011</h3>
	<ul style="list-style: inside disc; margin-bottom: 1.5em;">
	<li>Executive Committee, Fellowship VP</li>	<li>Fam System - Swag Wagon Big Fam: Uncle</li>
	<li>*50 hours of service</li>	</ul>
	<p style="margin: 1.5em 0px;">In LFS,<br>	Stanley Cheng<br>	CC Pledge Class</p>
</div>

<h2 style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
<a name="nn">
Service Vice President: <span style="font-weight: normal;">Nicki Nario (KS)</span>
</a>
</h2>
<div style="max-width: 50em; margin-bottom: 3em; line-height: 1.5;">

	<p style="margin: 1.5em 0px;">Hey, Gamma Gamma!</p>	<p style="margin: 1.5em 0px;">While I was pledging Alpha Phi Omega last semester, I was always conscious of my role within the chapter. I constantly asked myself: In what ways would I be able to contribute? How can I best make my presence count? What are the needs of the chapter? For a while, I did not have answers to those questions, but as summer ended and the academic year progressed, I gradually settled on the idea of adopting leadership through service. In effect, I am hoping to be elected as your next Service Vice President. </p>	<p style="margin: 1.5em 0px;">I like to think that one of my strongest traits is my leadership ability. Being an effective leader not only entails having a vision and/or goals to work towards, but also necessitates inspiring others to want to participate in that process. The Service Vice President position is a great opportunity for me to apply what I have learned as a leader, a pledge, an active, a community member, and a student. By undertaking this position, I sincerely believe that I can have the most impact for the benefits of the chapter as well as those of the community. As Service Vice President, I aim to focus on three aspects of service: (1) expansion, (2) diversity, and (3) quality. </p>	<p style="margin: 1.5em 0px;"><b>EXPANSION OF SERVICE</b><br>Our current SVP has done a tremendous job of expanding our service projects this semester. Nonetheless, one thing I do not believe in is stagnation. In order to continue our reputation for providing amazing service, I hope that I can lead the chapter in ongoing expansion. As one of this year's Bonner Leaders through the Cal Corps Public Service Center, I remain in close contact with numerous campus-based and community-based organizations. Thus, as SVP, I will be able <u>to initiate service outreach</u> to Alameda Point Collaborative, Berkeley Food and Housing Project, Cal in the Capital, Cal in the Local Government, Community Alliance for Learning - WriterCoach Corps, Creative Residencies for Emerging Artists Teaching, Greater Richmond Interfaith Program, Greening Berkeley, The Magnolia Project, Residential Service Initiative, Society of St. Vincent de Paul of Alameda County, Think College Now, Volunteer income Tax Assistance Program, Oakland Community Builders, Destination College, BUILD Literacy Tutors, and many more! In addition, I also have extensive social networking and knowledge to guarantee that our chapter is provided with an abundance of service events and projects.</p>	<p style="margin: 1.5em 0px;"><b>DIVERSITY OF SERVICE</b><br>From its founding, Alpha Phi Omega has espoused giving back to the four C's - chapter, campus, community, and country. As SVP, I would like <u>to encourage this service design in the chapter</u>. Perhaps a way to go about this process would involve having actives fulfill a diversity of service projects: a service project that pertains to the chapter, another to the community, and so one and so forth. </p>	<p style="margin: 1.5em 0px;">Another way I hope to increase service diversity is to improve inter-chapter relations through service. Although our chapter engages in a number of stellar service projects together, our chapter can also benefit from carrying out service projects with our fellow IC brothers. To ensure this course of action, I plan to work closely with the Inter-Chapter Relations Chairs to establish communication and/or to plan joint service events with other APO chapters. </p>	<p style="margin: 1.5em 0px;"><b>QUALITY OF SERVICE</b><br>As SVP, I am most interested in having actives be involved in meaningful and quality service. I have recently learned quality service can be accomplished through educating oneself on the social issue, completing service that includes application of learned tools and resources, and engaging in reflection following the service. Although this seems to a daunting endeavor within the chapter, I am hoping to implement a new service requirement, which entails having actives attend at least ONE social justice conference or service workshop per semester. These social justice conferences occur multiple times throughout the year and address underlying social issues that are often overlooked such as poverty, education, health, homelessness, disaster relief, food justice, etc. I propose that these events be treated like fundraisers - <u>attending a conference or workshop will count for both conference/workshop requirement AND service hours</u>. </p>	<p style="margin: 1.5em 0px;">By requiring actives to attend a conference or workshop, I hope <u>to promote more informed APO members and to inspire them to be initiators of change</u>. Not only that, but perhaps actives can also gain a new perspective about everything surrounding them and allow them to reflect on the larger role they would like to have within our chapter and our society. </p>	<p style="margin: 1.5em 0px;">I do not intend to change the perspectives of everyone in the chapter, but if I can inspire a few actives to play a greater role and contribute more to the chapter, to the campus, to the community, and to the country - I would be a happy camper. =] I hope you guys consider me for your next Service Vice President. </p>	<p style="margin: 1.5em 0px;">On that note: Be PROACTIVE. Be INFORMED. Be INVOLVED. </p>	<p style="margin: 1.5em 0px;">iLFS, <br>	Nicki Nario</p>	<h3 style="font-weight: bold; text-decoration: none;">Qualifications: </h3>	<br>	<h3 style="font-weight: bold; text-decoration: none;">KS Semester - Spring 2011</h3>
	<ul style="list-style: inside disc; margin-bottom: 1.5em;">	<li>Leadership Committee</li>	<li>chaired Pledge Class Retreat</li>	<li>IC Luau Committee</li>	<li>30+ Service Hours</li>	</ul>
	<h3 style="font-weight: bold; text-decoration: none;">CPZ Semester - Fall 2011</h3>
	<ul style="list-style: inside disc; margin-bottom: 1.5em;">	<li>Rush Co-Chair</li>	<li>Chief E-mail Officer</li>	<li>Scavenger Hunt Co-Chair</li>
	<li>GG Maniac Recipient</li>	<li>New Service Project: Preschool Enrichment Program</li>	<li>College Day Committee</li>	<li>HallCarn Committee</li>	<li>Aunt for Ho'chatas</li>	<li><u>190+ Service Hours</u></li>
	</ul>
</div>

<h2 style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
<a name="mc">
Pledgemaster: <span style="font-weight: normal;">Michelle Chen (JM)</span>
</a>
</h2>
<div style="max-width: 50em; margin-bottom: 3em; line-height: 1.5;">
	<p style="margin: 1.5em 0px;"></p>
<p style="margin: 1.5em 0px;">Hi Gamma Gamma!</p>

<p style="margin: 1.5em 0px;">I'm running for the position of Pledgemaster for this upcoming Spring semester. Some of you may be wondering why, since I've held a few positions already. While that's true, that doesn't mean I’ve stopped caring about the direction of where this chapter is going nor have I stopped wanting to give back to the chapter. Because APO has given so much to me, I feel that I can contribute the most back as pledgemaster--by helping the new pledges to not only find their place within the chapter but also at CAL. 
After having been in APO since Fall 2009 (JM Semester), I've seen several pledges come and go, how they are as actives, and how previous PComms have been, and it has given me my own perspectives and ideas on how I would want to help educate pledges about the chapter, how I would want my PComm to be run, and what message they would send to the pledges. </p>

<p style="margin: 1.5em 0px;">KEEPING PLEDGES ACTIVE<br><br>
Pledges come into APO for a variety of reasons. They could be coming for the multitude of service opportunities that we offer, to meet new people, but also to just try something new. As the chapter has grown and moved along, I've noticed how people have slowly been forgetting about two of our core principles--leadership and service--and mainly sticking around for the friends. I don't believe that's a problem, but I do believe people slowly forget that we are a community service organization and one that is dedicated to help others the best way we can and to help its members develop as leaders in the chapter and in the community. I think this change needs to start with the pledge class by keeping them dedicated to service, by encouraging them to step up into leadership roles, and by raising their morale so that they would want to add their own influence, and in turn, can help the chapter grow. 
I do believe in a system that reward pledges for their hardwork. Pledging takes up a lot of time and pledges often sacrifice a lot in order to complete the process. One program that Christine brought up which I really appreciate is the "PComm for a Day" where the pledges with the top hours were able to experience being PComm for a day. While it gives them an idea of how PComm works and how much work that they put in, it also gives them a chance to be the ones in charge and to be able to have fun and experience what it is like to be on the other side. 
I want actives to feel the drive to do more and to experience more, but I believe that this drive starts when they’re pledges. Once they become actives it does become more difficult to stay involved in the chapter and I would want all of them to feel that they can contribute to the chapter in any way that they can. </p>

<p style="margin: 1.5em 0px;">FAMILY INVOLVEMENT<br><br>
What I really like about this semester is how PComm has been keeping in greater touch with the families to let them know if one of their littles might be in trouble or if there’s something to keep an eye on, or even just to let them know that their littles are doing a good job. Having bigged and parented, I understand how much littles mean to bigs and how much they care for each other. I would want to be as transparent with the families so that they know what’s going on so that they won’t ever be blindsided by any decisions that are made. 
I do realize that PComm makes final decisions and they’re the ones who pledges work with the most in the pledging process, but I also believe that families also see a side of their littles that PComm is unable to because littles can be more comfortable with their bigs and in that way be able to talk to them in a way that PComm would not. I would want bigs to feel comfortable enough so that they would be able to approach me or the trainers to talk about any problems that they feel there might be. The pledging process doesn’t only concern the pledges, it also concerns all the people who have been there every step of the way encouraging them to move forward. </p>

<p style="margin: 1.5em 0px;">TRANSPARENCY WITH PLEDGES<br><br>
While it’s good to let families know how their littles are doing, I also believe that it is important to let the pledges know how they are doing, to be able to guide and help them in every step of the process. I’ve noticed how this semester’s PComm have even made google docs for their trainees to let them know what they’ve finished, what they need to complete, if there are any make-ups that they need to do, and this is something that I would want to continue. This way pledges know what they have to do so that they can better keep track of what they have left and hopefully this will help them balance out the rest of their activities with APO. </p>

<p style="margin: 1.5em 0px;">PCOMM<br><br>
In terms of choosing PComm, I’m looking for a PComm that would be similar to CPZ PComm. I really appreciate how they’ve been more open to the pledges. I don’t believe that meeting and talking to PComm should be a one way street. I believe that it should be a process where they meet each other halfway. I would encourage my PComm to set up one-on-ones and to attend more events so that they are able to get to know the pledges better. 
In regards to signatures, I have seen through the semesters how pledges have become more stressed about the signatures. This is a process which I would want to change. After all the requirements that pledges have to go through, the point of signatures is for pledges to have more motivation to talking to PComm, to be able to get to know them not only as a person but also as a friend. I truly believe that pledges deserve signatures when trainers believe that they deserve to cross. When I say they deserve to cross, I speak about not only the effort they put into pledging, but also how they could be seen as actives. I would still put emphasis on the signature page since I would still consider it to be a requirement, but it would not be so significant as to cause too much stress for the pledges. </p>

<p style="margin: 1.5em 0px;">WHY PLEDGEMASTER?<br><br>
When I came into APO I wasn't the loud, in-your-face person that you see today (I know, shocking, huh?). I was the one who never said anything, the one who stayed in the background, the one who just let everybody else talk while I just stayed in the back and listened. My freshman year in CAL I was the loner on my floor (don't feel bad for me, I kinda liked it). It was my mom who was the one who told me to join an organization since she thought I felt lonely. I tell this story for a reason. When I joined APO, my personality began to grow into what it’s become today. I've become more confident, more outgoing, more open, and I owe this to APO. As corny as this sounds, I believe that I have found my place in college and, in a way, discovered parts of me that I never knew existed. I love it! This is probably the main reason why I want to be pledgemaster. I want to help the pledges find their place and grow as a person like I did and to assure them that I’ll always be there no matter what. I want to be the pledgemaster who pledges can come up to with no reservations, no fear (surprised there too huh?), so they can come talk to me about any problems that they may have whether they be about the pledging process or anything else that is going on in their lives. </p>

<p style="margin: 1.5em 0px;">All in all, I want to be able to give the new pledges what I’ve been given through APO. A chance to grow and a place in CAL to be who they are. </p>

<p style="margin: 1.5em 0px;">iLFS,<br>
Michelle Chen</p>

	<h3 style="font-weight: bold; text-decoration: none;">JM Semester Fall 2009</h3>
	<ul style="list-style: inside disc; margin-bottom: 1.5em;">
	<li>Service Committee</li>
	<li>Pledge Oak Recipient</li>
	<li>48 Service Hours</li>
	</ul>

	<h3 style="font-weight: bold; text-decoration: none;">GL Semester Spring 2010</h3>
	<ul style="list-style: inside disc; margin-bottom: 1.5em;">
	<li>Scrapbook Chair</li>
	<li>Cherry Blossom Festival Chair</li>
	<li>Fundraiser Chair</li>
	<li>Quackheads Big</li>
	<li>Sturdy Oak Recipient</li>
        <li>109 Service Hours</li>
	</ul>

	<h3 style="font-weight: bold; text-decoration: none;">JLC Semester Fall 2010</h3>
	<ul style="list-style: inside disc; margin-bottom: 1.5em;">
	<li>Finance Committee Co-Trainer</li>
	<li>Sturdy Oak Recipient</li>
	<li>38 hours of Service</li>
	</ul>

	<h3 style="font-weight: bold; text-decoration: none;">KS Semester Spring 2011</h3>
	<ul style="list-style: inside disc; margin-bottom: 1.5em;">
	<li>Finance Vice President</li>
	<li>Sturdy Oak Recipient</li>
	<li>HFU Aunt</li>
	<li>115 Service Hours</li>
	</ul>

	<h3 style="font-weight: bold; text-decoration: none;">CPZ Semester Fall 2012</h3>
	<ul style="list-style: inside disc; margin-bottom: 1.5em;">
	<li>Finance Vice President</li>
	<li>TGE Parent</li>
	<li>41 Service Hours</li>
	</ul>
</div>

<h2 style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
<a name="ac">
Pledgemaster: <span style="font-weight: normal;">Armand Cuevas (GL)</span>
</a>
</h2>
<div style="max-width: 50em; margin-bottom: 3em; line-height: 1.5;">
	<p style="margin: 1.5em 0px;"></p>
<p style="margin: 1.5em 0px;">Dear Gamma Gamma,</p>

<p style="margin: 1.5em 0px;">There has always been a problem of retention within our chapter and I believe one of the best ways to fix this is to start at the very beginning, the pledges. I want to improve our chapter and create a stronger sense of brotherhood and a greater dedication to service. The first way to do that is to lead by example. PComm are the most visible actives to the pledges and I want them to exemplify what being a good brother of Alpha Phi Omega means.</p>

<p style="margin: 1.5em 0px;">I see myself with a PComm in between KS and CPZ. I want to have the visibility of KS PComm and the approachability and openness of CPZ PComm. I like a lot of the changes that CPZ PComm made and I want to expand upon them, such as the specific interview questions and PComm-for-a-day. Finally, I would expect my PComm to do just as much as the pledges by going above and beyond the requirements at the same time as pledges come in. Meeting PComm at service projects/fellowships is more natural than typical office hours. I would expect my Pcomm to do 30+ service hours and 10 fellowships AFTER PR0. Although this sounds like burn-out, I think it would ease signatures for a lot for the pledges and it would prevent too many one-on-ones at the end of the semester. Besides, what’s wrong with doing more service and going to more fellowships?</p>

<p style="margin: 1.5em 0px;">To address retention, I believe the biggest problem is size. While some chapters seem to have little retention with their 100+ pledge classes, chapters with smaller pledge classes of about 20-30 are a lot better. I want to limit our pledge class to about 40. It’s virtually impossible to get to know 50+ people in your pledge class, PComm, ExComm, and 90+ actives as well. I believe that by starting with smaller pledge classes, we can form a smaller community where it’s easier to form a sense of brotherhood. Although it’s unfair to reject people who want to do service, this is also a fraternity and I believe that we are creating more quality pledges who will step up to do more service in the long run because they are doing service with their good friends.</p>

<p style="margin: 1.5em 0px;">Secondly, I want to expand the role of actives in the pledging process more by adding the requirement of getting to know actives, specifically people like Parents, chairs (IE College Day chair, IC chair) etc. People often complain that in APO, unless you are ExComm or PComm, there isn’t much room for growth or a sense of importance due to being outside the pledge program. However, if I require pledges to do more interviews of actives or maybe even get their signatures (some chapters require pledges to get signatures of 75% of the actives), actives can play a larger role in the pledge process and will stay around longer. This may seem harder for pledges, but I would then lessen the strictness of PComm and ExComm’s signatures in return.</p>

<p style="margin: 1.5em 0px;">Thirdly, I want to change PR quizzes and Pledgetest. I want to end memorization of useless trivia like the Boy Scout Oath or the address of national office as well as cut the amount of Pledgemasters, DSKs, and Namesakes they have to memorize in half. Instead, I want to test pledges on their knowledge of each other and the actives. This can start with name and pledge class and expand into major, year, etc. I want pledges to know everyone in the chapter, what family they are in, what chairing position they have, etc. It sounds daunting but I believe it will strengthen the bonds between the pledges and actives.</p>

<p style="margin: 1.5em 0px;">Fourthly, I want pledges to keep up their academics so I want to shorten PRs and create mandatory, one-hour study sessions at the end of PRs to force them to keep their grades up. I’ve heard of other Greek organizations that do this and thus, a lot of the Greek fraternities/sororities have pretty decent GPAs. </p>

<p style="margin: 1.5em 0px;">Finally, I want to expand the visibility of the pledges to their bigs even more and allow actives to see things the PComm googledocs of Office Hours, pin checks, passing PR quizzes, etc. That way, they don’t have to wait till the mid-semester report and actives can be more proactive in helping their littles.</p>

<p style="margin: 1.5em 0px;">I plan to be fully involved in the pledging program. I am only taking 13 units, 5 of which is Filipino so in reality, I’m only taking 8 units (I’m not fluent, the class is just easy). I also only plan to be captain of my dance team, TrueLement.</p>

<p style="margin: 1.5em 0px;">To summarize my platform:<br>
-Mix between KS PComm and CPZ PComm<br>
-Expect my own PComm to go above and beyond their requirements<br>
-Limit the pledge class to about 40<br>
-Expand role of actives through involvement in pledge program<br>
-Change PR Quizzes/Pledgetest with focus on knowledge of each other instead of useless facts<br>
-Shorter PRs but mandatory study sessions after<br>
-Visibility of pledging program to bigs with access to googledocs<br>
-Commitments: Only 13 units and dance team captain</p>

<p style="margin: 1.5em 0px;">Gamma Gamma, I promise you that I will fully dedicate myself to the pledging program and I will do whatever I can to improve our chapter. I am a very understanding person, open to criticisms and change. I believe I am qualified for the job and I know that if elected, I will do the best I can. Thank you for reading.</p>

<p style="margin: 1.5em 0px;">iLFS,<br>
Armand Cuevas</p>

	<h3 style="font-weight: bold; text-decoration: none;">Qualifications</h3>
	<br>

	<h3 style="font-weight: bold; text-decoration: none;">GL Semester - Spring 2010</h3>
	<ul style="list-style: inside disc; margin-bottom: 1.5em;">
	<li>FunComm Trainee</li>
	<li>Pledge Oak Recipient</li>
	<li>Participated in Roll Call</li>
	<li>26 service hours</li>
	</ul>

	<h3 style="font-weight: bold; text-decoration: none;">JLC Semester - Fall 2010</h3>
	<ul style="list-style: inside disc; margin-bottom: 1.5em;">                                                                                                                                                                                <li>Uncle (techincally a Big) for Tres Equis</li>
	<li>Photographer</li>
	<li>Fall Fellowship Spirit Chair</li>
	<li>GG Maniac Recipient</li>
	<li>Sturdy Oak Recipient</li>
        <li>30 service hours</li>
	</ul>

	<h3 style="font-weight: bold; text-decoration: none;">KS semester - Spring 2011</h3>
	<ul style="list-style: inside disc; margin-bottom: 1.5em;">
	<li>Pledge Committee Fellowship Co-Trainer</li>
        <li>IM Sports Chair</li>
        <li>Sturdy Oak Recipient</li>
        <li>50 service hours</li>
	</ul>

	<h3 style="font-weight: bold; text-decoration: none;">CPZ semester - Fall 2011</h3>
	<ul style="list-style: inside disc; margin-bottom: 1.5em;">
	<li>Service Vice President</li>
	<li>Swag Wagon Big Fam Parent</li>
        <li>58 service hours</li>
	</ul>

</div>


<h2 style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
<a name="avp">
Administrative Vice President: <span style="font-weight: normal;"></span>
</a>
</h2>
<div style="max-width: 50em; margin-bottom: 3em; line-height: 1.5;">
	<p style="margin: 1.5em 0px;"></p>
</div>

<h2 style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
<a name="dh">
Membership Vice President: <span style="font-weight: normal;">Derrick Hau (JLC)</span>
</a>
</h2>
<div style="max-width: 50em; margin-bottom: 3em; line-height: 1.5;">

	<p style="margin: 1.5em 0px;">Hey Gamma Gamma!</p>

	<p style="margin: 1.5em 0px;">This is Derrick and I want to be your next Membership Vice President. I pledged Alpha Phi Omega JLC semester (Fall 2010). That was my first semester at Berkeley, and pledging was the best decision I've made since coming to CAL.</p>

	<p style="margin: 1.5em 0px;">I've heard that Membership Vice President can be a lonely position and requires being  thick skinned. So why would I ever want a position like this? Membership Vice President has many perks. You oversee the Rush process. You monitor all members and their requirements. You get the chapter excited and spirited. You ensure there's a balance between academia and Alpha Phi Omega; and lastly, you bring together Actives and Pledges through the family system.</p>

	<p style="margin: 1.5em 0px;">The job entails a lot of work, but I am up for the challenge. I have many new ideas that I feel will boost chapter morale and involvement. I am going to break down everything I envision. Feel free to ask me any questions or concerns as you are reading this.</p>

	<p style="margin: 1.5em 0px;">RUSH - This is possibly the largest event for the members of the chapter. Rush has always been three weeks long and the process seems grueling as we wait for the entry of pledges. My first idea is to change rush from three weeks to one and a half/two weeks long. Rush would start right away and span for the first 2 weeks. At this point, people will feel settled into the semester at this point.</p>

	<p style="margin: 1.5em 0px;">FAMILY SYSTEM - Everyone starts off in a family, so we all have experience within this department of Alpha Phi Omega. The Membership Vice President is in charge of putting together families. Sometimes they get it right, but sometimes there are faults in the family system. I want to implement something new: Sponsor/Sponsoree week. This would compensate for cutting one week out of Rush. I would set up large service projects and fellowships for actives and pledges to get to know each other. This would give me an opportunity to take note of who would be a good match in terms of the family system.</p>

	<p style="margin: 1.5em 0px;">ACTIVE RETREAT - I will dedicate much of what I can to make sure these happen on a regular basis. Our chapter may be centered around the pledges, but actives need some time away from the little suckers ones in a while. I will work hard with my chairs to plan getaways (Tahoe, Santa Cruz, Russian River... etc).</p>

	<p style="margin: 1.5em 0px;">REWARDS - I don't know about you, but I love getting rewarded for doing things. So for members that go above and beyond any of the Three Principles: Leadership, Friendship and Service, they would be recognized in some way or another for their efforts. Mu Zeta has two moose where they give it to their member spotlights to take care of until the next CM. I would like to get two Golden Bears and we can have member sign it signifying they received the award. Also start giving Active Dollars to redeem things during elections.</p>


	<p style="margin: 1.5em 0px;">All in all, I really just want to give back to the Chapter. I may not be the most organized person, but I get my stuff done. I may not always have a smile on my face, but I'm always open to talk to anyone. Rest assured, if you elect me as Membership Vice President, I promise to give it my all. Thank you for taking the time to read this.</p>

	<p style="margin: 1.5em 0px;">iLFS,<br>
	Derrick Hau</p>

	<h3 style="font-weight: bold; text-decoration: none;">JLC Semester</h3>
	<ul style="list-style: inside disc; margin-bottom: 1.5em;">
	<li>Fellowship Committee Trainee</li>
	<li>IC Carnival Committee Member</li>
	<li>HallCarn Committee Member</li>
	<li>Pledge Oak Recipient</li>
	<li>55+ hours of Service</li>
	</ul>

	<h3 style="font-weight: bold; text-decoration: none;">KS Semester</h3>
	<ul style="list-style: inside disc; margin-bottom: 1.5em;">
	<li>Rush Chair</li>
	<li>Spirit Chair</li>
	<li>Banquet Committee Member</li>
	<li>Big for HFU</li>
	<li>Sturdy Oak Recipient</li>
	<li>55+ Service Hours</li>
	</ul>

	<h3 style="font-weight: bold; text-decoration: none;">CPZ Semester</h3>
	<ul style="list-style: inside disc; margin-bottom: 1.5em;">
	<li>Fun Committee Trainer</li>
	<li>Rush Committee Member</li>
	<li>Spirit Committee Member</li>
	<li>30+ Service Hours</li>
	</ul>
</div>

<h2 style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
<a name="cy">
Finance Vice President: <span style="font-weight: normal;">Connie Yang (GL)</span>
</a>
</h2>
<div style="max-width: 50em; margin-bottom: 3em; line-height: 1.5;">

	<p style="margin: 1.5em 0px;">Hey Gamma Gamma,</p>

	<p style="margin: 1.5em 0px;">I'm Connie Yang and I am running to be your next Finance Vice President. Truth be told, it took me a while to be able to say that with conviction because this year-long position necessitates considerable commitment and responsibility. Nonetheless, I believe I have thought it through carefully, and I am confident that I have the motivation to stay involved, as well as the qualifications and drive to make a difference in this chapter.</p>

	<p style="margin: 1.5em 0px;">One of the Finance Vice President's primary responsibilities is to maintain our chapter's strong relationship with employees at Sodexo and the ASUC. I can't say I've worked one-on-one with Sodexo employees at fundraisers. But I am very familiar with our past relations through having thoroughly learned from and worked with Richard Tam (a past Finance VP), as well as our chapter's ASUC Student Group Advisor, Millicent Morris Chaney. I believe I can handle the demands in order to sustain our strong rapport with Sodexo and utilize concession events for fundraising.</p>

	<p style="margin: 1.5em 0px;">On the matter of reimbursements, I realize that every semester, it's frustrating for drivers to not be paid gas money or actives to lose money to BART doing service every month. That said, I hope to improve the reimbursement system we have going and I encourage actives to give any feedback and suggestions they might have regarding improving accountability. I intend to be as receptive and accommodating as possible. Moreover, I have several ideas for how we can strengthen our current fundraising methods and undertake new ones.</p>

	<p style="margin: 1.5em 0px;">In closing I just want to say, thank you for taking to the time to hear me out. Elections is a long and strenuous process and I encourage you to think carefully about the direction you wish to see this chapter grow in and vote for the candidates you believe can best lead such change.</p>

	<p style="margin: 1.5em 0px;">iLFS,<br>
	Connie Yang</p>

	<h3 style="font-weight: bold; text-decoration: none;">GL (pledging) semester</h3>
	<ul style="list-style: inside disc; margin-bottom: 1.5em;">
	<li>Leadership Committee member</li>
	<li>Scrapbook Committee member</li>
 	</ul>

	<h3 style="font-weight: bold; text-decoration: none;">JLC semester</h3>
	<ul style="list-style: inside disc; margin-bottom: 1.5em;">
	<li>Reimbursement Chair</li>
	<li>Family system: big for Booty Pebbles</li>
	<li>Rush Committee member</li>
	<li>Chief Communications Officer</li>
	<li>Sturdy Oak recipient</li>
 	</ul>

	<h3 style="font-weight: bold; text-decoration: none;">KS semester</h3>
	<ul style="list-style: inside disc; margin-bottom: 1.5em;">
	<li>PComm, Admin trainer</li>
	<li>IC Luau Committee</li>
	<li>Sturdy Oak recipient</li>
 	</ul>

	<h3 style="font-weight: bold; text-decoration: none;">CPZ (associate) semester</h3>
	<ul style="list-style: inside disc; margin-bottom: 1.5em;">
	<li>Aunt for Swag Wagon</li>
	<li>Banquet chair</li>
	</ul>

</div>

<h2 style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
<a name="jc">
                            Fellowship Vice President: <span style="font-weight: normal;"> Janice Chan (JM)</span>
</a>
</h2>
<div style="max-width: 50em; margin-bottom: 3em; line-height: 1.5;">
        <p style="margin: 1.5em 0px;">Hi, my name is Janice Chan and I want to run for Fellowship Vice President. I want to run for this position because I believe in the fellowship aspect of APO. After being a semester abroad, I decided to come back to APO because of the friends that are still here and the opportunities to meet people, which are some of the reasons I stayed in APO. So if I have the opportunity to be your Fellowship Vice President, I hope to continue and keep this brotherhood in APO. </p>

<p style="margin: 1.5em 0px;">I feel that I am qualified for this position because I have taken many leadership positions regarding fellowship. As both a pledge and an active, I have chaired a few of our chapter's biggest events – campout, broomball, and banquet. Through chairing these events, I have learned time management, organization, and how to oversee committee members – all important skills necessary in running a successful event. In addition, I am willing to listen to what actives have to say about fellowship. The reasons fellowships exist are to create bonds between brothers of the chapter and for people to have fun, so people should have a say in what fellowships they want to have on the calendar. </p>

<p style="margin: 1.5em 0px;">One problem the chapter has is not having enough fellowships in the beginning of the semester. One thing I want to implement is a chapter wide event at the beginning of the semester so people can get back into APO. At the beginning of the semester, there are not many big events so people are not motivated to create or attend fellowships. By having a chapter wide event, people can reconnect with fellow brothers, thus creating a motivation to start attending fellowships again early on in the semester. I know that we usually have a GG picnic at the beginning of the semester, but I hope to have another chapter-wide fellowship that people are willing to go, so I hope to hear people's opinions about what fellowship they want.</p>

<p style="margin: 1.5em 0px;">Another problem is the rule regarding the family rule. It is important to implement to ensure that there is a diversity of people at the fellowships so everyone has a chance to bond with their fellow brothers. But at the same time, the rule should be less strict so people of the same family can still hang out during fellowships. One way to ensure this is to make sure that no fellowships only consist of people from the same family and that fellowships cannot be automatically closed up when added onto the calendar. By enforcing these rules, I hope to have a more diverse group of people at fellowships with a less strict family rule. </p>

<p style="margin: 1.5em 0px;">Overall, I feel that I am qualified and have the motivation for this position. The one aspect I care more about in APO is fellowship, which is the main reason I decided to come back. Through my previous experiences and love for fellowship, I feel that I will fulfill my duty as Fellowship Vice President if I am elected. </p>

<p style="margin: 1.5em 0px;">iLFS,<br> 
Janice Chan</p>

	<h3 style="font-weight: bold; text-decoration: none;">JM semester</h3>
	<ul style="list-style: inside disc; margin-bottom: 1.5em;">
	<li>Fellowship Committee trainee</li>
	<li>Scrapbook Committee member</li>
        <li>19 FellowShips</li>
        <li>Pledge Oak Recipient</li>
	</ul>

	<h3 style="font-weight: bold; text-decoration: none;">GL Semester</h3>
	<ul style="list-style: inside disc; margin-bottom: 1.5em;">
	<li>Quakheads Big</li>
	<li>Alumni Event chair</li>
	<li>Banquet Chair</li>
	<li>Rush Committee member</li>
        <li>13 fellowships</li>
        <li>Sturdy Oak recipient</li>
	</ul>

	<h3 style="font-weight: bold; text-decoration: none;">JLC Semester</h3>
	<ul style="list-style: inside disc; margin-bottom: 1.5em;">
	<li>Ridin' Dirty Aunt</li>
	<li>Service Vice President calender assistant</li>
	<li>Scrapbook chair</li>
	<li>6 fellowships</li>
	</ul>

	<h3 style="font-weight: bold; text-decoration: none;">CPZ semester (associate)</h3>
	<ul style="list-style: inside disc; margin-bottom: 1.5em;">
	<li>TGE parent</li>
	<li>Historian Vice President assistant</li>
	</ul>
</div>

<h2 style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
<a name="ak">
                            Fellowship Vice President: <span style="font-weight: normal;"> Amul Kalia (GL)</span>
</a>
</h2>
<div style="max-width: 50em; margin-bottom: 3em; line-height: 1.5;">
        <p style="margin: 1.5em 0px;">Sup Gamma Gamma!</p>

        <p style="margin: 1.5em 0px;">My name is Amul and I am running to be your next Fellowship Vice President! I will keep it short and sweet and get right to the point.</p>

	<p style="margin: 1.5em 0px;">I will start off with what my definition of what fellowships are supposed to be. Fellowships are supposed to be fun and not having many rules about them is what makes them fun. Fellowships are supposed to foster brotherhood in the chapter and bring everyone close together. In terms of concrete steps I want to take and change from this and past semester are:</p>
                            
        <p style="margin: 1.5em 0px;">One thing I want to try is something I call ‘Fellowship Highlights.’ Fellowship highlights would be something where I would highlight fellowships that are creative and unique. The intention behind it is to encourage people to put awesome fellowships and that would create competition among brothers to outdo each other. Fellowships coming up on the calendar and ones from the past will be highlighted. It will also have the effect of encouraging brothers to go to some fellowships and would also make pledges go to them. Because as a chapter, we can always do more to encourage more active-pledge bonding. </p>

        <p style="margin: 1.5em 0px;">I would make the family rule less extreme in fellowships. It would be 80:20 ratio or something more feasible. I really like the family rule, I believe it is good because it makes us branch out and not be limited and cliquey within our family. I realize it is hard, but it is important that we are all making an effort to get to know ALL of the brothers in the chapter. On the other hand, I do think it needs to be less strict. Sometimes it can be really difficult to get people together, but that should not necessarily stop people from getting together and have fun. I definitely want to discourage things like last minute Boba runs to get the leadership credit with only the small family attending the event. To get the leadership credit, you should have to demonstrate leadership.  </p>

        <p style="margin: 1.5em 0px;">The other thing I want to focus on is the problem this semester of people showing up for fellowships events whenever they feel like without telling the chairs. I feel as though if you commit to something, you should be there and if you cannot, you should be responsible enough to tell the chair you would not be there. </p>

        <p style="margin: 1.5em 0px;">I would make an effort to make fellowships at the beginning of the semester because there is always a dearth. Having early fellowships will make the recently crossed pledges feel like active brothers and mingle with other brothers. The more bonding there is, the better it is.</p>

        <p style="margin: 1.5em 0px;">I would make a concerted effort to promote HotSpot excessively. I would also limit it to two days a week so brothers know exactly which two days to go there. If the brothers know which specific days there is HotSpot, they are more likely to go.</p>

        <p style="margin: 1.5em 0px;">I hope to further discuss my ideas with you and hope you give me a change to serve you. Thanks! </p>

	<p style="margin: 1.5em 0px;">iLFS,<br>
	Amul Kalia</p>

	<h3 style="font-weight: bold; text-decoration: none;">Qualifications</h3>
	<br>

	<h3 style="font-weight: bold; text-decoration: none;">GL Semester</h3>
	<ul style="list-style: inside disc; margin-bottom: 1.5em;">
	<li>Finance Committee</li>
	<li>T-Shirt Chair</li>
	<li>Banquet Committee Chair</li>
	<li>35 Hours</li>
	</ul>

	<h3 style="font-weight: bold; text-decoration: none;">JLC Semester</h3>
	<ul style="list-style: inside disc; margin-bottom: 1.5em;">
	<li>Big JLC Semester</li>
	<li>Rush Committee</li>
	<li>Meet the Chapter Chair</li>
	<li>Talent Show Chair</li>
	<li>32 Hours</li>
	</ul>

	<h3 style="font-weight: bold; text-decoration: none;">KS semester</h3>
	<ul style="list-style: inside disc; margin-bottom: 1.5em;">
	<li>Stylus Committee</li>
	</ul>

	<h3 style="font-weight: bold; text-decoration: none;">CPZ semester</h3>
	<ul style="list-style: inside disc; margin-bottom: 1.5em;">
	<li>FineComm Trainer</li>
	<li>FunPack Committee</li>
        <li>18 FellowShips!</li>
	</ul>
</div>


<h2 style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
<a name="hn">
                            Fellowship Vice President: <span style="font-weight: normal;"> Hanh Nguyen (KS)</span>
</a>
</h2>
<div style="max-width: 50em; margin-bottom: 3em; line-height: 1.5;">

<p style="margin: 1.5em 0px;">Hey Gamma Gamma Brothers, </p>
<p style="margin: 1.5em 0px;">My name is Hanh Nguyen and I pledged KS semester last spring. I am running for Fellowship VP because I feel as if there are many fellowship aspects of APO that I can expand and improve upon with the position. The two main components of fellowship that I would like to address are intrachapter and interchapter relations. </p>
<p style="margin: 1.5em 0px;"><b>Intrachapter</b></p>
<p style="margin: 1.5em 0px;">It has come to my attention that for many actives who aren't in the family system, their experience in grasping brotherhood has become fairly limited. Older actives have lamented on the fact that though our chapter is growing in numbers, the interactions between that of brothers and pledges have become difficult to get to know one another on a first name basis, let alone consider each other a Brother. APhiO isn't just any service organization, one of the most appealing aspects are the fraternal bonds that are formed in the name of fellowship. I want to create more opportunities that allow for members to do so despite the growing discrepancy between older members and incoming pledges that has prevented many potential friendships from forming. </p>
<p style="margin: 1.5em 0px;">Though the overall idea of APhiO Hotspot in having members chill and hang out while getting to know each other in a lax and laid back environment is quite brilliant, its success this semester is questionable. I have heard from other members as well as experienced the organizational inefficiency of Hotspot and propose to change this while addressing the aforementioned concern of limited pledge-active interactions. Walking through Sproul Plaza, we are faced with many concerns from trying to dodge the flyering frenzy as well as watching out for defecating seagulls. It is even more difficult when you're trying to find Hotspot in the process which is why I plan on changing the locality of Hotspot in hopes of improving participation. As of now, I hope to have Bear's Lair as a considerable possibility given that P-Comm Office Hours continued to be held here. As a pledge, I remember many of my pledge brothers would linger here even between classes or whilst waiting for Office Hours. What's better than having Hotspot at the pledge location that receives the most traffic?  Actives then would have the chance to interact with new pledges as well as old actives given a better location without having to worry about setting up/closing, bad weather, lack of participation. To prevent potential disturbances with office hours, separate areas such as opposite ends of Bear's Lair can be taken into effect to ensure that interactions between groups are not imposed upon each other while the potential for intermixing conversation is still there if it is wanted. </p>
<p style="margin: 1.5em 0px;">Furthermore, there has been much debate about the newly implemented 40% family rule as well as chairing evaluations. Fellowships are meant to nurture friendships and are meant to be fun. When there are too many rules and regulations, it can be questioned whether the fun is left. Families should not be penalized if their Bigs want to support their Littles, and it is not fair to dictate how brotherhood should go about. Though the motive behind the 40% family rule is in all full of good intention - to limit the cliques that keep out the incorporation of new members, I feel as if there is a better way to address this without such harsh regulation. Instead of mandatory chair evaluations, surprise visits at fellowships (either by my assistants or I) will occur on certain occasions to ensure that everyone is fully participating. </p>
<p style="margin: 1.5em 0px;">To ensure that members have the chance to keep in contact with all their Brothers rather than just their intimate circle of friends, I plan on initiating more large-scale chapter wide fellowships. Moreover, holding more simple outdoor field events that would encourage physical activities would allow for team building and the opportunity to bond in various ways. Though there was some difficulty with attendance and enthusiasm with this semester's chapter fellowships, polls and general inquiries asked in person will be in effect to gauge a time and date that allows for the majority to participate. To nurture an atmosphere where we can develop a strong brotherhood, it is important that we maintain efforts as a whole to bond with one another. </p>
<p style="margin: 1.5em 0px;"><b>Interchapter</b></p>
<p style="margin: 1.5em 0px;">IC events have always allowed us the great opportunity to mingle with other chapter Brothers. Unfortunately, Gamma Gamma is known for its tendency to circle up in our groups and socialize with each other rather than other IC Brothers. With this, it has become somewhat troublesome for many to initiate conversations with us since we are in large numbers and it can be intimidating to approach us all. For IC events, I intend to plan with my committees more group activities that separate clinginess and encourage us to talk to IC Brothers while limiting socializing amongst just ourselves. This can be achieved by structuring events in a way that disperse GG brothers amongst other chapter brothers to foster interchapter interactions. Furthermore, more efforts for our IC events should be put into place since we cannot always expect IC Brothers to come support our events when we rarely return the favor. Therefore, we should instead bring our events to them. To encourage greater IC participation, we should hold another IC event that displays our willingness to get to know other chapter Brothers. One idea is an IC Bonfire at Ocean Beach; by bringing the IC event in close proximity to several chapters (in this case, those located near SF) this will improve interchapter relations. In order for us to understand how APhiO operates in other chapters and their varying approaches to upholding the foundations of leadership, friendship, and service, it is of significance that we must be willing to break out of our old habits to take steps towards embracing the greater brotherhood. </p>
<p style="margin: 1.5em 0px;">I understand my presence in the chapter is relatively new given that I have just recently crossed but I believe my values in representing everyone's opinions as well as young and growing passion for APhiO can positively drive fellowship in a new direction. It is my utmost hope that you will consider my candidacy for Fellowship Vice President. </p>

	<p style="margin: 1.5em 0px;">iLFS,<br>
	Hanh Nguyen</p>

	<h3 style="font-weight: bold; text-decoration: none;">Qualifications:</h3>
	<br>

	<h3 style="font-weight: bold; text-decoration: none;">KS Spring 2011</h3>
	<ul style="list-style: inside disc; margin-bottom: 1.5em;">
	<li>Leadership Committee</li>
	<li>Pledge Class Retreat Chair</li>
	<li>Stylus Committee</li>
	</ul>

	<h3 style="font-weight: bold; text-decoration: none;">CPZ Fall 2011</h3>
	<ul style="list-style: inside disc; margin-bottom: 1.5em;">
	<li>Regionals Chair -Fellowship</li>
	<li>Alumni Relations Chair</li>
        <li>Inter-Chapter Relations Chair</li>
        <li>GG Scavenger Hunt Chair</li>
        <li>Down To Fiesta Aunt</li>
	</ul>
</div>

<h2 style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
<a name="tn">
Historian: <span style="font-weight: normal;">Toshiki Nakashige (KS)</span>
</a>
</h2>
<div style="max-width: 50em; margin-bottom: 3em; line-height: 1.5;">
	<p style="margin: 1.5em 0px;">Dear Gamma Gamma,</p>

	<p style="margin: 1.5em 0px;">My name is Toshiki Nakashige, and I am running for Historian for Spring 2012. The responsibilities of Historian include taking minutes at chapter meetings and forums, overseeing the Scrapbook and FunPack, organizing photographs in slide shows, administering the GG Maniac prizes, and planning alumni events. While I believe that many of these aspects of the fraternity are already successful and will not address them in my platform, there is still some room for improvement that I believe I could help bring to the chapter.</p>

	<p style="margin: 1.5em 0px;">One of the difficulties of preserving memories through photographs is not that brothers do not take enough pictures, but having them uploaded online so that they are available for slide shows and the scrapbook. Having been Photographer Chair this past semester, I have witnessed this firsthand, and because this was the first Photographer Committee (rather than just a small number of Photographers), I envision more structure to the committee to encourage picture-taking and uploading--including requiring the chairs to give progress reports to committee members regularly, especially the actives--and communicating more with the Historian Trainer and Committee. More structure to the photography aspect of the fraternity would also be facilitated by the organization of fun, themed photo shoots, which I have worked to implement this semester in APhiOtoshoot. In general, as a photographer myself, I would also like to encourage people (or even teach people how) to take more engaging photos--many of the photos I see online are unusable because they are too candid or repetitive. Also, I believe that fellowships are well-represented but would like to stress the importance of taking photos at service projects, to emphasize our fraternity's involvement in the community.</p>

	<p style="margin: 1.5em 0px;">The biggest challenge as Historian is organizing events that attract alumni, as they are largely working adults now. In general, I would try to communicate with alumni at the beginning of the semester to get an idea of what kinds of events would be worth traveling back to the area. Inviting alumni to HallCarn this semester was a good opportunity for pledges and actives to mingle with alumni, so I would try to continue inviting alumni to large-scale events in conjunction with alumni events. My ideas for alumni events include a really laid-back gathering on Memorial Glade playing ultimate frisbee and picnicking and a larger scale event where we get out of Berkeley. Also, I would like to hold some sort of alumni panel (as previously held) to help upperclassmen network for careers and post-graduation life.</p>

	<p style="margin: 1.5em 0px;">I believe that the position of Historian is perfect for me. I am enthusiastic about taking pictures, creative in the arts, and knowledgeable of media programs (such as Photoshop, Illustrator, and iMovie). Additionally, because I am graduating soon, I have a lot of incentive to continue a precedent for fun and engaging events for alumni to return to Gamma Gamma. I hope you consider voting for me for Historian for Spring 2012. Thank you for your time!</p>

	<p style="margin: 1.5em 0px;">In Leadership, Friendship, and Service,<br>
	Toshiki Nakashige</p>

	<h3 style="font-weight: bold; text-decoration: none;">Qualifications</h3>
	<br>
	<h3 style="font-weight: bold; text-decoration: none;">KS Spring 2011</h3>
	<ul style="list-style: inside disc; margin-bottom: 1.5em;">
	<li>Pledge Class President</li>
	<li>Pledge GG Maniac</li>
	<li>Roll Call at Sectionals</li>
	<li>Pennies for Patients Committee</li>
	</ul>
	<h3 style="font-weight: bold; text-decoration: none;">CPZ Fall 2011</h3>
	<ul style="list-style: inside disc; margin-bottom: 1.5em;">
	<li>Veni Vidi Veni Big</li>
	<li>Photographer Chair</li>
	<li>College Day Committee</li>
	<li>HallCarn Committee</li>
	<li>FunPack Committee</li>
	</ul>
</div>

HEREDOC;
}
Template::print_body_footer();
Template::print_disclaimer();
?>
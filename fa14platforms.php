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
<h1 style="margin-bottom: 1em;">Spring 2015 Election Platforms</h1>

President | <a href="#kc">Kelsey Chan</a> | <a href="#kw">Karen Wu</a> | <br>
Service VP | <a href="#ps">Pooja Shah</a> | <br>
Pledgemaster | <a href="#lb">Lakana Bun</a> | <a href="#jt">Jane Tam</a> | <a href="#jw">James Wang</a> | <br>
Administrative VP | <a href="#jl">Joohyung (Jason) Lee</a> | <br>
Membership VP | <a href="#cy">Cathy Yin</a> | <br>

<br>

<h2 style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
<a name="kc">
President: <span style="font-weight: normal;"> Kelsey Chan (KK)</span>
</a>
</h2>

<div style="max-width: 75em; margin-bottom: 3em; line-height: 1.5;">
<p style="margin: 1.5em 0px;">Dear Chapter,</p>

<p style="margin: 1.5em 0px;">For the past four semesters, Alpha Phi Omega has become an important aspect of my life as a 
college student and as a growing individual. I pledged APO with friendship in mind, but since then, 
I have gained so much more. I have gained not only a loving family and supportive pledge brothers, 
but also a drive to develop my leadership skills and give back to the community that has already 
given me so much. When I pledged, I never would have thought that I would become an officer on the Executive Committee, 
let alone a candidate for President. This just goes to show how much I have grown since then. I am ready to commit 
myself to APhiO for another year because I believe in my vision for the chapter and what this fraternity stands for. </p>


<p style="margin: 1.5em 0px;"><strong>Leading by Example</strong><br>
During the two consecutive semesters I have served on ExComm as Historian and Administrative VP, 
I have realized the strength in leading by example. I strongly believe that whether people want to admit it or even come to realize it, 
they are influenced by the attitudes and actions of those around them. As the main representatives of the fraternity, 
I want to hold ExComm and the Pledge Committee to a higher standard because as leaders in this organization, 
it should be their desire and responsibility to be role models for not only pledges but actives as well. 
If these leaders are not in the right mindset or performing to the best of their abilities, 
what makes them think that the rest will not follow suit? 
The bottom line is that people should be excited about Alpha Phi Omega and respect the boundaries 
that we have created within the organization. </p>

<p style="margin: 1.5em 0px;"><strong>Inter-Chapter Relations </strong> <br>
Our chapter has a history of not being the most active IC chapter in our section. 
This, I acknowledge cannot be changed overnight or in one semester, but all it takes is a step in the right direction. 
I hope that with a fresh start, the chapter can begin with a new attitude and desire to get to know brothers in other 
chapters as well as how the different chapters operate. Our actives are busy with academics and other extracurricular 
and think that there is nothing outside this chapter, but I believe that there is always something that can be learned 
by networking and interacting with people coming from different backgrounds. </p>

<p style="margin: 1.5em 0px;"><strong>Chapter Feedback</strong><br>
It is important that every active and pledge in the chapter has a voice, even if it is anonymous. 
I hope to start a feedback box that can be passed around during chapter meetings for people to 
leave comments, critiques, and suggestions. In addition to this, I also want to make this type 
of feedback available online via the website or Google Forms. My ExComm and I will be made accessible 
to the chapter through office hours that are held throughout the week so that individuals may 
comfortably approach us on a more casual setting. </p>

<p style="margin: 1.5em 0px;"><strong>Vision</strong><br>
I believe that, overall, as President I can impact the chapter the most through facilitating conversation. 
I will have my opinions and judgments, but it is my job to listen, not just hear, the voices around me. 
It is important that I remain open-minded and objective towards discussion. 
Perhaps I am just an overly optimistic individual, but I have hope and expectations for what this chapter 
can accomplish. I believe that we, as Berkeley students, more than anyone else, 
have the capability to accomplish our goals if we set our minds to it. </p>

<h3 style="font-weight: bold; text-decoration: underline;">Qualifications:</h3>
<br>
<h3 style="font-weight: bold; text-decoration: none;">KK semester</h3>
<ul style="list-style: inside disc; margin-bottom: 1.5em;">                                                                                                            
<li>Pledge Maniac</li>
<li>Finance Committee</li>
<li>23 service hours, 13 fellowships</li>
</ul>

<h3 style="font-weight: bold; text-decoration: none;">DE semester</h3>
<ul style="list-style: inside disc; margin-bottom: 1.5em;">                                                                                                            
<li>Sturdy Oak Recipient</li>
<li>Gear Chair</li>
<li>Fundraiser Chair</li>
<li>44 service hours, 22 fellowships</li>
</ul>

<h3 style="font-weight: bold; text-decoration: none;">CM semester</h3>
<ul style="list-style: inside disc; margin-bottom: 1.5em;">                                                                                                            
<li>Sturdy Oak Recipient</li>
<li>ExComm: Historian</li>
<li>35.25 service hours, 18 fellowships</li>
</ul>

<h3 style="font-weight: bold; text-decoration: none;">KHK semester</h3>
<ul style="list-style: inside disc; margin-bottom: 1.5em;">                                                                                                            
<li>ExComm: Administrative VP</li>
<li>35.75 service hours, 8 fellowships (to date)</li>
</ul>
</div>


<h2 style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
<a name="kw">
President: <span style="font-weight: normal;"> Karen Wu (MH)</span>
</a>
</h2>

<div style="max-width: 75em; margin-bottom: 3em; line-height: 1.5;">
<p style="margin: 1.5em 0px;">Hi Brothers,</p>

<p style="margin: 1.5em 0px;">I pledged Alpha Phi Omega my first semester at Cal not knowing 
what was in store for me three years down the road - and now I am running for President. Alpha 
Phi Omega has become more than just a club or organization to me. Being a part of this fraternity 
has: given me the vision of being a leader, taught me many interpersonal skills, and expanded my 
views on community service. In addition, it has given me a chance to meet lifelong friends that 
will laugh with me until our dentures fall out. </p>


<p style="margin: 1.5em 0px;"><strong>LFS</strong><br>
All the requirements both actives and pledges are expected to complete each semester are more than 
just a set of numbers. They revolve around our fraternity’s three cardinal principles: Leadership, 
Friendship, and Service. I would like our brothers to understand that each requirement has its own 
intrinsic purpose and that I highly encourage everyone to make the most out of it! </p>

<p style="margin: 1.5em 0px;"><strong>Inter-Chapter Relations</strong> <br>
Alpha Phi Omega is the nation’s largest collegiate fraternity, a fraternity that has a rich history of brotherhood 
and community, among and between chapters. Yet our IC bonding has been dulled over time. I believe that we must revitalize 
and build strong relationships with IC brothers. From these relationships, we will be networking, learning from the 
processes and perspectives of other chapters, and, most importantly, creating long lasting friendships. We can build 
an even stronger Alpha Phi Omega community and become better individuals, brothers, and community leaders together. </p>

<p style="margin: 1.5em 0px;"><strong>Pledge Committee and Executive Committee</strong><br>
One of the more complex issues is bridging the gap between Pledge Committee and Executive Committee. 
These two groups play essential roles in the success of our chapter and our chapter’s future. I personally 
have served on both committees and I understand the difficulty to maintain constant communication when one is 
swamped with pledges or keeping track of chairs. Unfortunately, time isn’t always the issue regarding the disjunction 
of the committees. There has been an instance where the two committees are perceived as opposing factions. PComm and 
ExComm cooperation and teamwork is crucial to maintaining a safe and enjoyable environment for both the active 
brothers and pledges.  I would like to suggest a possible PComm and ExComm bonding event to kindle a closer relationship 
between the members of the two committees. Also to avoid any discrepancy, I hope to maintain clear communication between 
the two committees by utilizing an ExComm and PComm GroupMe as well as a Facebook group. </p>

<p style="margin: 1.5em 0px;"><strong>Vision</strong><br>
As President, I hope to maintain the stability of the chapter through building a strong brotherhood and upholding 
a pleasant atmosphere. I believe that brothers are happier and more inclined to give back to the chapter when Alpha 
Phi Omega becomes much more than just another club. </p>

<p style="margin: 1.5em 0px;">Thank you for considering me as a possible candidate.</p>
<p style="margin: 1.5em 0px;">iLFS,</p>
<p style="margin: 1.5em 0px;">Karen Wu</p>

<h3 style="font-weight: bold; text-decoration: underline;">Qualifications:</h3><br>

<h3 style="font-weight: bold; text-decoration: none;">MH semester -- Fall 2012</h3>
<ul style="list-style: inside disc; margin-bottom: 1.5em;">                                                                                                            
<li>Finance Committee</li>
<li>Pledge Spotlight</li>
</ul>

<h3 style="font-weight: bold; text-decoration: none;">KK semester -- Spring 2013</h3>
<ul style="list-style: inside disc; margin-bottom: 1.5em;">                                                                                                            
<li>DMND Big</li>
<li>Fundraiser Organizer</li>
<li>Talent Show Chair</li>
<li>GG Maniac</li>
</ul>

<h3 style="font-weight: bold; text-decoration: none;">DE semester -- Fall 2013</h3>
<ul style="list-style: inside disc; margin-bottom: 1.5em;">                                                                                                            
<li>Finance Committee Trainer</li>
<li>Sturdy Oak Recipient</li>
</ul>

<h3 style="font-weight: bold; text-decoration: none;">CM semester -- Spring 2014</h3>
<ul style="list-style: inside disc; margin-bottom: 1.5em;">                                                                                                            
<li>Family Chair</li>
<li>1LLIONAIRE Big</li>
</ul>

<h3 style="font-weight: bold; text-decoration: none;">KHK semester -- Fall 2014</h3>
<ul style="list-style: inside disc; margin-bottom: 1.5em;">                                                                                                            
<li>Fellowship VP</li>
<li>A\$AP KR3W Aunt</li>
</ul>

<h3 style="font-weight: bold; text-decoration: none;">Total: 150+ Service Hours, 70+ Fellowships</h3>
</div>


<h2 style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
<a name="ps">
Service VP: <span style="font-weight: normal;"> Pooja Shah (KK)</span>
</a>
</h2>
<br>

<div style="max-width: 75em; margin-bottom: 3em; line-height: 1.5;">
<ul style="list-style: inside disc; margin-bottom: 1.5em;">
<li>I believe Alpha Phi Omega is a platform for all of us to utilize the finances and manpower of a 
fraternity to share means of service we are individually passionate about. At the end of the day, 
I would count anything reasonable in which time or money is given to those who need it as service. 
If this inflates service hours, so be it. People need to stop viewing service as a requirement, and 
more as a way of living their lives. In the event a service has difficult to quantify hours: a way to 
quantify hours will be created.  I would consider donating blood, attending/participating a charity event 
and even voting as service.</li>
<li>Begin a “2 hours a week” “society” within Alpha Phi Omega. The goal for this group is for everyone to 
commit at least 2 hours of week of selfless giving to other people. This makes completing the service requirement 
much less daunting, and also facilitates a good lifestyle habit for graduation and beyond as adults.</li>
<li>Have more “self-initiated” and “chapter-initiated” service projects on the calendar. Allow people to 
complete service that involves making things to be done on their own time. Being “too busy” shouldn’t 
be a reason not to give back.</li>
<li>Work with Finance VP to create a Service VP discretionary budget. This would allow actives to potentially 
obtain funding from the chapter to initiate their own service projects (sorta like a grant system).</li>
<li>Create and promote holiday-oriented service projects over winter break. Ideas include decorating floats for 
the Rose Parade in Pasadena (the area where many of us are from), and volunteer gift-wrapping.</li>
<li>Encourage individuals to complete more community and country oriented service projects by only allowing 
half-credit hours for fundraisers. Work with finance VP to create other incentives for actives to complete fundraisers.</li>
<li>Create an internal GG bronze, silver and gold award for service upon reaching milestones during the semester. Bronze at 
25 hours, Silver and 50 and Gold at 75 hours. Award prizes at the CM in which the active reaches silver and gold.</li>
</ul>


<h3 style="font-weight: bold; text-decoration: none;">Personal Goals as a member of ExComm:</h3>
<ul style="list-style: inside disc; margin-bottom: 1.5em;">
<li>Mentorship to pledges (again):  Personal goal of meeting all pledges by PR2</li>
<li>Complete at least double the amount of active requirements to maintain visibility (40 Service hours, 10 fellowships)</li>
<li>In the event the Pledgemaster chooses to return the ExComm signature requirement, I promise to make my signature requirement 
something that can benefit the chapter/pledge program from a Service perspective.</li>
<li>Mentorship and teamwork with newly appointed service trainer(s) to create service projects that meet the demand of new pledges.</li>
</ul>

<h3 style="font-weight: bold; text-decoration: none;">Suggested Chairs:</h3>
<ul style="list-style: inside disc; margin-bottom: 1.5em;">
<li>Service VP Assistant (2-3)</li>
<li>Spring Youth Service Day Chair (3)</li>
<li>Beartrax Chair (2)</li>
<li>Active Day of Service Chair (1)</li>
<li>IC/GG Sewing Chair (1)</li>
<li>College Day Chair (2)</li>
</ul>

<p style="margin: 1.5em 0px;"><strong>Other potential chairs (Based solely on Active Interest):</strong><br>
Karma Kitchen Chair, Project Open Hand Chair (ideally someone with a car), Berkeley Food & Housing Project Chair, 
YTA Mosswood Chair, Cal Star Yoga Chair, American Red Cross Chair, IC Academy of Friends Chair
</p>

<h3 style="font-weight: bold; text-decoration: underline;">Qualifications</h3><br>

<h3 style="font-weight: bold; text-decoration: none;">KK Semester - Spring 2013</h3>
<ul style="list-style: inside disc; margin-bottom: 1.5em;">
<li>Leadership Committee</li>
<li>Hotspot Committee</li>
<li>35.5 Service Hours</li>
<li>24 Fellowships (Most in Pledge Class)</li>
</ul>

<h3 style="font-weight: bold; text-decoration: none;">DE Semester - Fall 2013</h3>
<ul style="list-style: inside disc; margin-bottom: 1.5em;">
<li>JDP Big/ Family Representative</li>
<li>Fundraiser Chair for Fin. VP</li>
<li>Banquet Chair for Fell. VP</li>
<li>33 Service Hours</li>
<li>23 Fellowships</li>
</ul>

<h3 style="font-weight: bold; text-decoration: none;">CM Semester – Spring 2014</h3>
<ul style="list-style: inside disc; margin-bottom: 1.5em;">
<li>BYoD Aunt</li>
<li>Sergeant-at-arms for President</li>
<li>Stylus Chair for Admin VP</li>
<li>IC Poker Chair for Fell VP</li>
<li>30 Service Hours</li>
<li>22 Fellowships</li>
<li>Sturdy Oak Recipient</li>
</ul>

<h3 style="font-weight: bold; text-decoration: none;">KHK Semester - Fall 2014</h3>
<ul style="list-style: inside disc; margin-bottom: 1.5em;">
<li>Service Trainer for PM</li>
<li>Sergeant-at-arms for President</li>
<li>Jeweler for Historian</li>
<li>Created pledging website</li>
<li>60+ Service Hours</li>
<li>10+ Fellowships</li>
</ul>
</div>


<h2 style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
<a name="lb">
Pledgemaster: <span style="font-weight: normal;"> Lakana Bun (DE) </span>
</a>
</h2>

<div style="max-width: 75em; margin-bottom: 3em; line-height: 1.5;">
<p style="margin: 1.5em 0px;">Hello everyone. My name is Lakana Bun and I am running for Pledge Master. 
For a long time I always imagine myself doing a certain position and think about what I will do when I 
am in that position. But for the longest time my introverted nature prevented me from doing so. This is 
the first time I am running for a big position. I will be nervous, shy, awkward etc but I do have confidence 
in myself that I can run the Pledge program. </p>

<p style="margin: 1.5em 0px;">Why?</p>

<p style="margin: 1.5em 0px;">I am running for this position because I want to greatly contribute to the chapter 
and what is the best way than running for Pledge Master. I want to continue to be a part of the pledge process 
and be that support system for the pledges and my pcomm. In addition I want to create a fun and meaningful pledge 
programs for them to enjoy. </p>

<p style="margin: 1.5em 0px;">The Pledge Program: </p>
<p style="margin: 1.5em 0px;">A good amount of the program such as active and Excomm signatures, interviews, traditions, 
and the general pledge requirements will stay the same. I also want the program to continue to focus on service. We are 
a service fraternity and there should be big emphasis on it. Of course there is also L and F, but those two aspects can 
be obtained through service. Pledges can learn leadership skills such as chairing the event, and continue to make more 
new friends through service. </p>

<p style="margin: 1.5em 0px;">But there some things I definitely want to change. </p>

<p style="margin: 1.5em 0px;">PRs: I want to keep it short (if possible), but also a fun environment where the pledges 
and pcomm are interacting with each other instead of them sitting down the whole time. There will also be discussion 
time to talk about the pledge program and how the pledges are feelings and to see if we need to change anything.</p>

<p style="margin: 1.5em 0px;">Interviews: I definitely want to change the questions to make it more interactive with the 
pledges and actives. This should be a fun time to learn about an active brother instead of doing it just for the requirement.</p>

<p style="margin: 1.5em 0px;">Pledge Environment: Fun, friendly, supportive and respectful environment, where pledges are free 
to express their opinions whenever they want. This should also be a stress-free environment where APO shouldn’t run their lives. 
Yes pledging is important and we want them to fulfill their requirements, but this should not affect their academics life.</p>

<p style="margin: 1.5em 0px;">Pledge Committee: </p>

<p style="margin: 1.5em 0px;">I definitely want someone who is responsible, respectful, open-minded, and friendly. I want a group 
of people who can have fun but also get their work done. In addition I have a high value for respect. I expect my Pcomm to respect 
the pledges, myself and each other; “Treat others how the way you want to be treated”</p>

<p style="margin: 1.5em 0px;">Thank you for taking your time to look at my platform!</p>

<h3 style="font-weight: bold; text-decoration: underline;">APO Resume</h3><br>

<h3 style="font-weight: bold; text-decoration: none;">DE Semester - Fall 2013</h3>
<ul style="list-style: inside disc; margin-bottom: 1.5em;">
<li><b>Pledge Oak Recipient</b></li>
<li><b>GG Pledge Maniac Recipient</b> for CM6</li>
<li>Little for Over the Hedgehog (Small Family)</li>
<li>Historian Committee for David Emery Pledge Class</li>
<li>57 Service Hours</li>
<li>27 Fellowships</li>
</ul>

<h3 style="font-weight: bold; text-decoration: none;">CM Semester – Spring 2014</h3>
<ul style="list-style: inside disc; margin-bottom: 1.5em;">
<li><b>Chairing: </b>Banquet for Fellowship VP</li>
<li><b>Chairing: </b>Rush for Membership VP</li>
<li><b>Chairing: </b>Talent Show for Fellowship VP</li>
<li><b>Chairing: </b>Spring Youth Service Day for Service VP</li>
<li><b>Sturdy Oak Recipient</b></li>
<li>Big for Whale.I.Am (Small Family)</li>
<li>General Friendship Award for GG Awards</li>
<li>General Service Award for GG Awards</li>
<li>Interchapter Award for GG Awards</li>
<li>Bronze for Presidential Service Award</li>
<li>General Leadership Award for GG Awards</li>
<li>113 Service Hours</li>
<li>18 Fellowships</li>
</ul>

<h3 style="font-weight: bold; text-decoration: none;">KHK Semester - Fall 2014</h3>
<ul style="list-style: inside disc; margin-bottom: 1.5em;">
<li><b>Pledge Committee</b>: Historian Committee Trainer</li>
<li>90+ Service Hours</li>
<li>10+ Fellowships</li>
</ul>
</div>



<h2 style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
<a name="jt">Pledgemaster: <span style="font-weight: normal;"> Jane Tam (MH) </span></a></h2>

<div style="max-width: 75em; margin-bottom: 3em; line-height: 1.5;">
<p style="margin: 1.5em 0px;">Hello Gamma Gamma Brothers,</p>
<p style="margin: 1.5em 0px;">While the term “iLFS” for some may stand for “I Live For Service,” 
for many of us, we are looking for something more from Alpha Phi Omega. To me, finding APO was similar to finding a second home; 
this organization has so much to offer in all avenues of leadership, friendship, and service that it is only right that 
I continue my duty as an active brother and give back to the organization that has taught me so much. 
Every semester in APO has given me the chance for personal growth and has taught me how to give selflessly to our organization. 
Please take the time to read my platform below and consider my bid for Pledgemaster of the Spring 2015 semester. </p>

<p style="margin: 1.5em 0px;"><strong>Qualities of Pledge Committee</strong><br>
<i>PComm providing support and guidance:</i> Pledges have many areas of support during their pledging 
semester and I want their trainers to be one of their biggest supporters.  It is important to me that 
PComm remains visible and approachable during the semester so pledges understand that we are here for 
them through their tough times.  While we have to remain professional, trainers should be striving to 
build camaraderie with their trainees, and furthermore, the other pledges as well. </p>

<p style="margin: 1.5em 0px;">
<i>PComm as active brothers:</i> In my opinion, the brothers of pledge committee should act as the leading 
role models to the incoming pledge class.  I expect a higher standard from these brothers compared to other 
actives and want pledges to understand that each brother of PComm has demonstrated LFS in their time here 
in Alpha Phi Omega. In order to constantly motivate PComm and myself, I want to introduce a friendly competition 
between pledges and PComm in regards to our cardinal principles of leadership, friendship, and service. 
This system can be utilized to keep PComm, myself included, active and visible during the semester, and also 
help gauge how PComm is doing as active brothers. </p>

<p style="margin: 1.5em 0px;">
<i>PComm as a growing experience:</i> No matter what each PComm member has done within APO or in other organizations, 
there’s always room for improvement:  fine-tuning their leadership abilities, being team players, actively participating 
in service and so on.  So, I want PComm to understand that I am constantly observing them, hoping to further develop their 
skills so they learn more about themselves and their brothers from their experience on PComm.  Being a member of Alpha Phi 
Omega should mean constant growth and I want each member to grow in all aspects of L, F, and S. If they come across a problem, 
I want them to be able to come to me because I’m not only there to observe but also to facilitate in that development. </p>

<p style="margin: 1.5em 0px;">
<i>Unity as PComm:</i> As Pledgemaster, I want to promote constant and open communication and teamwork among 
my PComm; since I am searching for transparency between the Bigs and PComm, my PComm should be informed on 
specifics of each pledge event and how each pledge is doing in terms of their requirements and their comfortability 
within the chapter.  PComm should support one another and also act professionally when needed; if the pledges see 
that we do not respect one another as PComm, it will be difficult for us to earn their respect, and more importantly, 
even harder for them to respect the pledging process. </p>


<p style="margin: 1.5em 0px;"><strong>Why Pledgemaster?</strong><br>
In my last active semester here, I believe that I can make my biggest contribution to the chapter as Pledgemaster as 
I plan on having a structured pledge program with an equal emphasis in L, F, and S and also want to be proactive when 
it comes to any feedback regarding the pledge program from both actives and pledges. It is apparent that our chapter’s 
system revolves around the pledge program and the family system and from my understanding, membership retention should 
begin during the pledge process. Pledging is a period of learning about our chapter and helping pledges understand why 
being a part of Gamma Gamma can become an important part of their college career. </p>

<p style="margin: 1.5em 0px;">Thank you for taking the time to read and consider my platform.</p>
<p style="margin: 1.5em 0px;">in Leadership, Friendship, and Service,</p>
<p style="margin: 1.5em 0px;">Jane Tam</p>


<h3 style="font-weight: bold; text-decoration: underline;">APO Resume</h3><br>

<h3 style="font-weight: bold; text-decoration: none;">Maura Harty - Fall 2012</h3>
<ul style="list-style: inside disc; margin-bottom: 1.5em;">                                                                                                            
<li>Leadership Committee</li>
<li>Pledge Maniac</li>
<li>Pledge Oak Recipient</li>
<li>100 Service Hours, 44 Fellowships</li>
</ul>

<h3 style="font-weight: bold; text-decoration: none;">Kingsley Kuang - Spring 2013</h3>
<ul style="list-style: inside disc; margin-bottom: 1.5em;">
<li>Victoriu\$ecret Big</li>
<li>Rush Chair</li>
<li>Fundraiser Chair</li>
<li>GG BBQ Chair</li>
<li>General LFS Award</li>
<li>Silver Presidential Service Award</li>
<li>Sturdy Oak Recipient</li>
<li>147 Service Hours, 48 Fellowships</li>
</ul>

<h3 style="font-weight: bold; text-decoration: none;">Dave Emery - Fall 2013</h3>
<ul style="list-style: inside disc; margin-bottom: 1.5em;">
<li>Leadership Committee Co-Trainer</li>
<li>Fundraiser Chair</li>
<li>General LFS Award</li>
<li>Sturdy Oak Recipient</li>
<li>145 Service Hours, 37 Fellowships</li>
</ul>

<h3 style="font-weight: bold; text-decoration: none;">Courtney McLaughlin – Spring 2014</h3>
<ul style="list-style: inside disc; margin-bottom: 1.5em;">
<li>Finance Vice President</li>
<li>Dy\$function Big</li>
<li>General LFS Award, IC Award</li>
<li>Gold Presidential Service Award</li>
<li>Sturdy Oak Recipient</li>
<li>157 Service Hours, 49 Fellowships</li>
</ul>

<h3 style="font-weight: bold; text-decoration: none;">Kay Hairgrove Krenek - Fall 2014</h3>
<ul style="list-style: inside disc; margin-bottom: 1.5em;">
<li>Finance Vice President</li>
<li>121 Service Hours, 18 Fellowships</li>
</ul>
</div>

<h2 style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
<a name="jw">Pledgemaster: <span style="font-weight: normal;"> James Wang (MH)</span></a></h2>

<div style="max-width: 75em; margin-bottom: 3em; line-height: 1.5;">
<p style="margin: 1.5em 0px;">To most of you, I am a large, friendly Asian man who is relaxed and always optimistic. 
To others, I am just someone who simply eats too much food. My lax demeanor sometimes creates a sense that I am not 
serious about the chapter or pledging, but I can assure you that this view is mistaken. I am writing this platform 
and running for the pledge master position because I am not only truly dedicated to this organization, but believe 
that I can make the biggest difference in shaping a happy, active pledge class whom will contribute to this chapter 
in the future. </p>

<p style="margin: 1.5em 0px;">
My philosophy regarding pledging and APHIO in general is that you should enjoy helping others through service, 
enjoy interacting with people, enjoy forming friendships and enjoy having fun. Realistically, these are the only 
aspects that APHIO can offer and thus should be the emphasis of the pledge program. As Berkeley students, we already 
have enough things to stress over and APHIO definitely should not be one of them. Instead, APHIO should be something 
that everyone looks forward to, in the midst of academic commitments, for personal support, camaraderie and 
opportunities to help the community. </p>

<p style="margin: 1.5em 0px;">
This attitude; however, does not necessarily compromise the formalities of APHIO as an organization. 
On a logistical level, the pledge master and pledge committee chairs exist to structure the pledge program 
through directorial roles. On a different level, the pledge committee serve as role models that pledges both 
respect and feel comfortable around. At the very beginning of the semester, I plan to instill into the minds 
of the pledges that as a pledge committee, we have their best interests at heart and everything we do goes 
towards making pledging as smooth and enjoyable as possible. </p>

<p style="margin: 1.5em 0px;"><i>Pledge Program Goals</i><br></p>

<p style="margin: 1.5em 0px;">
The focus of pledging is two-fold: bonding with people, and helping the community through service 
(hopefully, one makes the other more pleasurable and vice versa). The formalities of the pledge program 
will thus reflect this focus. Pledge committee, executive committee and active signatures will remain the same. 
Office hours will remain the same with the addition of executive committee office hours as they provide another 
outlet for interaction between brothers (and sisters). PR lengths will be shortened and designed to focus more 
on service spotlights and group discussions and less on reviewing quiz material. If there is an issue between 
pledges, pledge committee chairs or the Pledgemaster, the key is to communicate and communicate and communicate 
some more. Finally, requirements such as interviews will be changed to reflect a more substantive bonding experience. 
Instead of mindlessly interviewing eight members, pledges and actives will be randomly assigned (once a week) to 
engage in some sort of activity together such as working out or grabbing dinner. This change also supports my goal 
of incorporating actives more tightly within the pledge program. Of course, this will require the support and enthusiasm 
of the chapter to be successful.  </p>

<p style="margin: 1.5em 0px;">
Basically, the plan is for pledges to suppress their judgments and open themselves to talk to everyone 
through service, fellowships, PR’s, CM’s and office hours. </p>

<p style="margin: 1.5em 0px;">
In terms of selecting a pledge committee, the characteristics that I value the most are maturity, 
approachability, enthusiasm and visibility. Maturity is a vital part of respecting others, approachability 
is an indication of friendliness, enthusiasm signifies dedication towards the chapter/service and 
visibility is a reflection of involvement. </p>


<h3 style="font-weight: bold; text-decoration: underline;">APO Qualifications</h3><br>

<h3 style="font-weight: bold; text-decoration: none;">Maura Harty - Fall 2012</h3>
<ul style="list-style: inside disc; margin-bottom: 1.5em;">                                                                                                            
<li>Pledge Oak Recipient</li>
<li>Finance Committee</li>
<li>49 Service Hours</li>
<li>26 Fellowships</li>
</ul>

<h3 style="font-weight: bold; text-decoration: none;">Kingsley Kuang - Spring 2013</h3>
<ul style="list-style: inside disc; margin-bottom: 1.5em;">
<li>Sturdy Oak Recipient</li>
<li>Active Retreat Chair (Membership VP)</li>
<li>Mr. APHIO Chair (Finance VP)</li>
<li>Hotspot Chair (Fellowship VP)</li>
<li>31 Service Hours</li>
<li>16 Fellowships</li>
</ul>

<h3 style="font-weight: bold; text-decoration: none;">Dave Emery - Fall 2013</h3>
<ul style="list-style: inside disc; margin-bottom: 1.5em;">
<li>Sturdy Oak Recipient</li>
<li>Fundraiser Chair (Finance VP)</li>
<li>23 Service Hours</li>
<li>8 Fellowships</li>
</ul>

<h3 style="font-weight: bold; text-decoration: none;">Courtney McLaughlin – Spring 2014</h3>
<ul style="list-style: inside disc; margin-bottom: 1.5em;">
<li>Sturdy Oak Recipient</li>
<li>Fundraiser Chair (Finance VP)</li>
<li>GG Maniac</li>
<li>61.5 Service Hours</li>
<li>24 Fellowships</li>
</ul>

<h3 style="font-weight: bold; text-decoration: none;">Kay Hairgrove Krenek - Fall 2014</h3>
<ul style="list-style: inside disc; margin-bottom: 1.5em;">
<li>Pledge Committee Service Trainer (Pledgemaster)</li>
<li>Sergeant At Arms (President)</li>
<li>55+ Service Hours</li>
<li>10+ Fellowships</li>
</ul>
</div>


<h2 style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
<a name="jl">
Administrative VP: <span style="font-weight: normal;"> Joohyung (Jason) Lee (CM)</span>
</a>
</h2>

<div style="max-width: 75em; margin-bottom: 3em; line-height: 1.5;">
<p style="margin: 1.5em 0px;">Hello Gamma Gamma!</p>
<p style="margin: 1.5em 0px;">My name is Jason Lee and I am running to be your next Admin Vice President.  
Thinking back about my experience in Alpha Phi Omega, APO has been center of my college life where I met my 
loving friends but also allowed me to grow and develop myself in various aspects. Unfortunately, ‘but fortunately,’ 
I am graduating next semester and will not be able to continue APO journey as an active member. So now that I really 
would like to step up and give something back to the chapter. </p>

<p style="margin: 1.5em 0px;"><strong>Things that I would like to achieve</strong><br>
Thanks to former Admin VP, I found no major concerns in room reservations, 
Fun pack, and CM slides. So I would like to mostly focus on website improvement and some changes on Stylus. <br>
1. Website Improvement: organizing website contents, website design, adding formatting function and photo/video 
attachment function to event creation page. <br>
2. Stylus: include more variety, informative contents such as National office news, news from brothers, and Birthdays. </p>

<h3 style="font-weight: bold; text-decoration: underline;">Qualifications</h3><br>

<h3 style="font-weight: bold; text-decoration: none;">Courtney McLaughlin – Spring 2014</h3>
<ul style="list-style: inside disc; margin-bottom: 1.5em;">
<li>Fellowship committee trainee</li>
<li>Pledge Maniac Recipient</li>
<li>34 Fellowships</li>
<li>25 Service hours</li>
</ul>

<h3 style="font-weight: bold; text-decoration: none;">Kay Hairgrove Krenek - Fall 2014</h3>
<ul style="list-style: inside disc; margin-bottom: 1.5em;">
<li>Big of JustWTH</li>
<li>GG Event chair</li>
<li>GG Sports chair</li>
<li>GG Maniac Recipient</li>
<li>20+fellowships</li>
<li>20 Service hours</li>
</ul>
</div>


<h2 style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
<a name="cy">
Membership VP: <span style="font-weight: normal;"> Cathy Yin (CM)</span>
</a>
</h2>

<div style="max-width: 75em; margin-bottom: 3em; line-height: 1.5;">
<p style="margin: 1.5em 0px;">Hey y'all!</p>
<p style="margin: 1.5em 0px;">I am running for MVP. Here are three major domains under MVP 
and what I want to do with them. </p>

<h3 style="font-weight: bold; text-decoration: none;">Rush</h3>
<ul style="list-style: inside disc; margin-bottom: 1.5em;">
<li>I want to have more visible and fun rush events (ex.: barbecue, water fight, scavenger hunt, 
glow in the dark tag, etc.)</li>
<li>I want to set up a referral system in addition to or in place of chalking so that I can directly 
contact people you think would be a good fit for APO.</li>
</ul>

<h3 style="font-weight: bold; text-decoration: none;">Families</h3>
<ul style="list-style: inside disc; margin-bottom: 1.5em;">
<li>I want to encourage more people to step up and become bigs.</li>
<li>I want to promote closer relationships between pledges and actives outside of families.</li>
</ul>

<h3 style="font-weight: bold; text-decoration: none;">Active Retention</h3>
<ul style="list-style: inside disc; margin-bottom: 1.5em;">
<li>To encourage more actives to be more involved, I would have more active-only events and 
rewards (I would not add more requirements)</li>
</ul>
</div>


HEREDOC;
}
Template::print_body_footer();
Template::print_disclaimer();
?>
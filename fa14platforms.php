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
<h1 style="margin-bottom: 1em;">Fall 2013 Election Platforms</h1>

President | <a href="#kc">Kelsey Chan</a> | <br>
Administrative VP | <a href="#jl">Jason Lee</a> | <br>
Pledgemaster | <a href="#jt">Jane Tam</a> | <a href="#jw">James Wang</a> <br>

<br>
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
myself to APhiO for another year because I believe in my vision for the chapter and what this fraternity stands for.
</p>


<p style="margin: 1.5em 0px;"><strong>
Leading by Example</strong><br>
During the two consecutive semesters I have served on ExComm as Historian and Administrative VP, 
I have realized the strength in leading by example. I strongly believe that whether people want to admit it or even come to realize it, 
they are influenced by the attitudes and actions of those around them. As the main representatives of the fraternity, 
I want to hold ExComm and the Pledge Committee to a higher standard because as leaders in this organization, 
it should be their desire and responsibility to be role models for not only pledges but actives as well. 
If these leaders are not in the right mindset or performing to the best of their abilities, 
what makes them think that the rest will not follow suit? 
The bottom line is that people should be excited about Alpha Phi Omega and respect the boundaries 
that we have created within the organization. </p>

<p style="margin: 1.5em 0px;">
<strong>Inter-Chapter Relations </strong> <br>
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
comfortably approach us on a more casual setting.</p>

<p style="margin: 1.5em 0px;"><strong>Vision</strong><br>
I believe that, overall, as President I can impact the chapter the most through facilitating conversation. 
I will have my opinions and judgments, but it is my job to listen, not just hear, the voices around me. 
It is important that I remain open-minded and objective towards discussion. 
Perhaps I am just an overly optimistic individual, but I have hope and expectations for what this chapter 
can accomplish. I believe that we, as Berkeley students, more than anyone else, 
have the capability to accomplish our goals if we set our minds to it.
</p>

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
<li>21 Fellowships</li>
<li>General Leadership and Service Award Recipient</li>
<li>Sturdy Oak Recipient</li>
</ul>

<h3 style="font-weight: bold; text-decoration: none;">CM semester</h3>
<ul style="list-style: inside disc; margin-bottom: 1.5em;">                                                                                                            
<li>Sturdy Oak Recipient/li>
<li>ExComm: Historian/li>
<li>35.25 service hours, 18 fellowships/li>
</ul>

<h3 style="font-weight: bold; text-decoration: none;">KHK semester</h3>
<ul style="list-style: inside disc; margin-bottom: 1.5em;">                                                                                                            
<li>ExComm: Administrative VP</li>
<li>35.75 service hours, 8 fellowships (to date)</li>
</ul>
</div>


<h2 style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
<a name="jl">
Administrative VP: <span style="font-weight: normal;"> Jason Lee (CM)</span>
</a>
</h2>

<div style="max-width: 75em; margin-bottom: 3em; line-height: 1.5;">
<p style="margin: 1.5em 0px;">Hello my fellow brothers of Gamma Gamma!</p>
<p style="margin: 1.5em 0px;">For the past year, Alpha Phi Omega has become an important aspect of my life as a college student and as a growing individual. I pledged APO with friendship in mind, but since then, I have gained so much more. I have gained not only a loving family and supportive pledge brothers, but also a drive to develop my leadership skills and give back to the community. I am now ready to take my commitment to APO and what the fraternity stands for to another level.</p>
<p style="margin: 1.5em 0px;">After being a Big in the Family System and an active member in the chapter, I have developed my goals for this spring semester to center around two themes: responsibility and communication.</p>
<p style="margin: 1.5em 0px;"><strong>RUSH:</strong> This is not only the first big project of the semester, but also the chapter&#39;s opportunity to start off 

on the right foot. I want Rush to take place during the first two weeks of school, beginning with the first 

day of instruction. It is important that we put ourselves out there from the very beginning to establish our 

presence on campus and to attract a larger pool of students/rushees who will choose us as their first choice. 

I will work closely with my Rush Chairs throughout the break to make sure they are meeting deadlines 

and completing their tasks in a timely manner. Even though Rush is the chairs&#39; opportunities to shine, it is 

also essential and necessary that I communicate with them frequently to ensure everyone is on the same 

page and working together as a unified team. It is essential that at least one chair and/or myself is present 

during each and every event, tabling hour, and chalking shift. In addition to chairs, it is very 

important that actives are actively participating and talking to rushees during Rush. This is their

opportunity to attract the future active body of APO, so I hope to see them actively flyering on Sproul
AND waking up bright and early to chalk with me. </p>
<p style="margin: 1.5em 0px;"><strong>FAMILY SYSTEM:</strong> Gamma Gamma&#39;s family system is an integral part of the fraternity and is what

makes us different from other service organizations. I want to improve the match-making procedure we

currently have so that <i>Sib Social is pushed back until the 4th week of pledging (between PR2 and PR3).</i>

This is because it is often hard to judge an individual when you first meet them or by just reading a piece

of paper. Between Ritual and this time, potential Bigs and pledges will be encouraged to actively sign up 

for events so they can meet and interact with as many people as possible. During this time, ExComm, 

PComm, Family Committee, and I will actively be attending events and observing how pledges are

getting along with others so that we can make an informed decision when placing pledges into families. I 

would also like to implement an <i>application process for becoming a Big</i> with the extra time allowed

from a later Sib Social. Bigs serve as role models, guides, and friends to their Littles, and picking up

should be a privilege that is earned &#45; not taken for granted. Being a Big is a very rewarding experience, 

but it is not a responsibility that should be taken lightly. It is important for me to stress that no one should 

feel pressured to become a Big. Only pick up because you feel you are ready, not because you feel 

pressured to continue family lines. You can still be an integral part of the family system by becoming an 

Aunt or Uncle.</p>

<p style="margin: 1.5em 0px;">In addition to the points above, I would also like to propose the <i>integration of a 1:1 Big/Little pairing.</i> I 

strongly believe this approach to the family system will not only greatly benefit our chapter but also 

encourage our active members to become more responsible and better leaders. Actives who intend to pick

up a Little should work to prove themselves to the chapter that they are able and capable of taking care of

another individual besides themselves. They will strive to be a good influence on their Littles and do

everything they can to make sure their Littles cross over. Giving each pledge an active that can devote

their entire focus to him/her will have a positive effect on the pledge&#39;s attitude and efforts towards the 

pledging process and APO. Available Bigs will help Littles integrate themselves into the chapter and form 

and strong connection with the people in it. This direct relationship will also give the active a reason to 

step up and make sure that the pledge is getting the attention and guidance he/she needs.</p>

<p style="margin: 1.5em 0px;"><strong>SPIRIT:</strong> I want to bring back <i>Spirit themes</i> at CM. I hope to encourage as many people to participate as

possible by creating a small friendly competition that will end at the end of the semester. The Small 

Family or Big Family with the most points at the end of the semester will get a reward (to be decided 

after discussion with ExComm).</p>
<p style="margin: 1.5em 0px;"><strong>RETENTION:</strong> Whenever I think about active retention, the phrase &#34;people come for service, but stay for 

friends&#34; always comes to mind. I want to tackle active retention with a permanent family system such that 

there are continuous lineages being extended every semester. I hope this tactic will encourage actives

and/or associates who are not picking up pledges to stay involved in the fraternity by attending various 

family bonding events and activities. I want members of APO who are not Bigging, on PComm, or on 

ExComm to feel included and welcomed in the chapter. With a permanent family system, members will 

always have a family to return to and a group of people to connect with no matter what level of 

involvement they decide to commit to.</p>

<p style="margin: 1.5em 0px;"><strong>COMMUNICATION:</strong> What I say and what I do affects how active members behave and how others

perceive APO. Because of this, I will strive to set a good example in the chapter by being visible to all

members and pledges during service and fellowship events. I want to be accessible to everyone and all the

comments and concerns they may have about requirements or anything. I will work closely with the

Pledgemaster and Family Heads to ensure that there are open lines of communication between us such

that misunderstandings and gaps in planning do not arise. I am always open to sharing and discussing 

ideas, but in the case that someone has a concern or comment that he/she does not wish to openly address, 

then he/she will have access to a Google form where he/she can submit his/her comment to me 

anonymously.</p>

<p style="margin: 1.5em 0px;">Lastly, I want to point out that even though my authority as Membership VP allows me to implement the 

changes I see fit, what I do and accomplish will not be feasible without the support of the chapter. I may 

have a plan, but it is up to you, the active, whether or not this plan will succeed. Everyone should feel 

empowered that they can make a difference in Gamma Gamma and what Alpha Phi Omega stands for.</p>

<p style="margin: 1.5em 0px;">iLFS,</p>
<p style="margin: 1.5em 0px;">Kelsey Chan</p>
<h3 style="font-weight: bold; text-decoration: underline;">Qualifications:</h3>
<br>
<h3 style="font-weight: bold; text-decoration: none;">Kingsley Kuang - Spring 2013</h3>
<ul style="list-style: inside disc; margin-bottom: 1.5em;">                                                                                                            
<li>Finance Committee</li>
<li>Spirit Committee</li>
<li>Hotspot Committee</li>
<li>Banquet Committee</li>
<li>Pledge Class Maniac Recipient</li>
</ul>
<h3 style="font-weight: bold; text-decoration: none;">David Emery - Fall 2013</h3>
<ul style="list-style: inside disc; margin-bottom: 1.5em;">                                                                                                            
<li>Big for $uper $mash Hos</li>
<li>Fundraising Chair</li>
<li>Gear Chair</li>
</ul>
</div>


<h2 style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
<a name="jt">Pledgemaster: <span style="font-weight: normal;"> Jane Tam (MH)</span></a></h2>

<div style="max-width: 75em; margin-bottom: 3em; line-height: 1.5;">
<p style="margin: 1.5em 0px;">Hello Gamma Gamma Brothers,</p>
<p style="margin: 1.5em 0px;">While the term “iLFS” for some may stand for “I Live For Service,” 
for many of us, we are looking for something more from Alpha Phi Omega. To me, finding APO was similar to finding a second home; 
this organization has so much to offer in all avenues of leadership, friendship, and service that it is only right that 
I continue my duty as an active brother and give back to the organization that has taught me so much. 
Every semester in APO has given me the chance for personal growth and has taught me how to give selflessly to our organization. 
Please take the time to read my platform below and consider my bid for Pledgemaster of the Spring 2015 semester.
</p>

<p style="margin: 1.5em 0px;"><strong>Qualities of Pledge Committee</strong><br>
<i>PComm providing support and guidance:</i> Pledges have many areas of support during their pledging 
semester and I want their trainers to be one of their biggest supporters.  It is important to me that 
PComm remains visible and approachable during the semester so pledges understand that we are here for 
them through their tough times.  While we have to remain professional, trainers should be striving to 
build camaraderie with their trainees, and furthermore, the other pledges as well.
</p>

<p style="margin: 1.5em 0px;">
<i>PComm as active brothers:</i> In my opinion, the brothers of pledge committee should act as the leading 
role models to the incoming pledge class.  I expect a higher standard from these brothers compared to other 
actives and want pledges to understand that each brother of PComm has demonstrated LFS in their time here 
in Alpha Phi Omega. In order to constantly motivate PComm and myself, I want to introduce a friendly competition 
between pledges and PComm in regards to our cardinal principles of leadership, friendship, and service. 
This system can be utilized to keep PComm, myself included, active and visible during the semester, and also 
help gauge how PComm is doing as active brothers.
</p>

<p style="margin: 1.5em 0px;">
<i>PComm as a growing experience:</i> No matter what each PComm member has done within APO or in other organizations, 
there’s always room for improvement:  fine-tuning their leadership abilities, being team players, actively participating 
in service and so on.  So, I want PComm to understand that I am constantly observing them, hoping to further develop their 
skills so they learn more about themselves and their brothers from their experience on PComm.  Being a member of Alpha Phi 
Omega should mean constant growth and I want each member to grow in all aspects of L, F, and S. If they come across a problem, 
I want them to be able to come to me because I’m not only there to observe but also to facilitate in that development.
</p>

<p style="margin: 1.5em 0px;">
<i>Unity as PComm:</i> As Pledgemaster, I want to promote constant and open communication and teamwork among 
my PComm; since I am searching for transparency between the Bigs and PComm, my PComm should be informed on 
specifics of each pledge event and how each pledge is doing in terms of their requirements and their comfortability 
within the chapter.  PComm should support one another and also act professionally when needed; if the pledges see 
that we do not respect one another as PComm, it will be difficult for us to earn their respect, and more importantly, 
even harder for them to respect the pledging process.
</p>


<p style="margin: 1.5em 0px;"><strong>Why Pledgemaster?</strong><br>
In my last active semester here, I believe that I can make my biggest contribution to the chapter as Pledgemaster as 
I plan on having a structured pledge program with an equal emphasis in L, F, and S and also want to be proactive when 
it comes to any feedback regarding the pledge program from both actives and pledges. It is apparent that our chapter’s 
system revolves around the pledge program and the family system and from my understanding, membership retention should 
begin during the pledge process. Pledging is a period of learning about our chapter and helping pledges understand why 
being a part of Gamma Gamma can become an important part of their college career.
</p>

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
in the future.
</p>

<p style="margin: 1.5em 0px;"><strong>Qualities of Pledge Committee</strong><br>
My philosophy regarding pledging and APHIO in general is that you should enjoy helping others through service, 
enjoy interacting with people, enjoy forming friendships and enjoy having fun. Realistically, these are the only 
aspects that APHIO can offer and thus should be the emphasis of the pledge program. As Berkeley students, we already 
have enough things to stress over and APHIO definitely should not be one of them. Instead, APHIO should be something 
that everyone looks forward to, in the midst of academic commitments, for personal support, camaraderie and 
opportunities to help the community.
</p>

<p style="margin: 1.5em 0px;">
This attitude; however, does not necessarily compromise the formalities of APHIO as an organization. 
On a logistical level, the pledge master and pledge committee chairs exist to structure the pledge program 
through directorial roles. On a different level, the pledge committee serve as role models that pledges both 
respect and feel comfortable around. At the very beginning of the semester, I plan to instill into the minds 
of the pledges that as a pledge committee, we have their best interests at heart and everything we do goes 
towards making pledging as smooth and enjoyable as possible. 
</p>

<p style="margin: 1.5em 0px;"><strong>Pledge Program Goals</strong><br></p>

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
of the chapter to be successful. 
</p>

<p style="margin: 1.5em 0px;">
Basically, the plan is for pledges to suppress their judgments and open themselves to talk to everyone 
through service, fellowships, PR’s, CM’s and office hours.
</p>

<p style="margin: 1.5em 0px;">
In terms of selecting a pledge committee, the characteristics that I value the most are maturity, 
approachability, enthusiasm and visibility. Maturity is a vital part of respecting others, approachability 
is an indication of friendliness, enthusiasm signifies dedication towards the chapter/service and 
visibility is a reflection of involvement.
</p>


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

HEREDOC;
}
Template::print_body_footer();
Template::print_disclaimer();
?>
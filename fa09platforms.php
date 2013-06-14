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
<h1 style="margin-bottom: 1em;">Fall 2009 Election Platforms</h1>
<h2 style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
President: <span style="font-weight: normal;">Andy Chau (JCJ)</span>
</h2>
<div style="max-width: 50em; margin-bottom: 3em;">
<h3 style="text-decoration: none; font-weight: bold; font-size: 1.1em; margin-top: 1.5em;">Dear Brothers,</h3>
<p style="margin: 1.5em 0px;">
With elections for the Spring 2010 Executive Committee cabinet approaching, I ask that you all consider my bid of candidacy for President of the Gamma Gamma chapter of Alpha Phi Omega, here at the University of California, Berkeley. Having taken the oath to dedicate myself to the morals of this fraternity and all that encompasses pledging almost two and a half years ago, I have seen the chapter grow and prosper to an unimaginable extent, and with it, I too have undergone drastic transformation. What has not changed through my past five semesters with the chapter however, is the passion and respect that I have for this fraternity. Listed below are a few key issues that I would like to present to each of you - each of which if elected President, I plan to engage in targeting directly.
</p>
<h3 style="text-decoration: none; font-weight: bold; font-size: 1.1em;">Goal Setting</h3>
<p style="margin: 1.5em 0px;">
Throughout my five semesters with Gamma Gamma, I have seen and experienced firsthand the implementation of numerous changes that exemplify progressive deviations from the normal way in which the chapter is generally run. If elected President, I would like to further enhance various parts of the programs offered by our chapter in order to maximize the productivity of the events put forth, and to increase the available resources presented to actives. This means meeting with each individual member of the elected Executive Committee before the start of the semester in order to devise clear-cut goals for the semester. This will assist us in jumpstarting the semester, so that we may possibly look to new innovative ideas to improve our Service, Fellowship, and even Leadership programs. Included would be a discussion with regards to a new chapter initiated service project, how to increase the variety of fellowships, bringing more LEADS courses to Berkeley, and developing new IC events.
</p>
<h3 style="text-decoration: none; font-weight: bold; font-size: 1.1em;">Inter-Chapter Relations</h3>
<p style="margin: 1.5em 0px;">
Over the past few semesters, I have noticed a trend of deteriorating relations with our fellow brothers from the nearby chapters of the fraternity. I recall that as a pledge, IC brothers from Mu Zeta, Omicron Zeta, and Alpha Alpha Xi were almost always present at our bimonthly Chapter Meetings (CMs). Although I am unclear as to the cause of this digression of IC relations, as President, I would work closely with each of the presidents from the respective chapters of Region 4, Sections 10, in order to reestablish a dynamic and enduring bond with our fellow IC brothers. This would entail everything from encouraging fellow actives and pledges to attend other chapter meetings, to the undertaking of devising brand new events geared towards establishing a strong relationship with nearby chapters, one at a time.
</p>
<h3 style="text-decoration: none; font-weight: bold; font-size: 1.1em;">Executive Committee Solidarity</h3>
<p style="margin: 1.5em 0px;">
Perhaps what I valued the most about being a part of the Executive Committee when I was MVP was the strength embodied by our team. I believe that although each of the Executive members possess extremely different duties and qualities, we strive for the same goal - to serve our chapter, through making choices and decisions that will result in the betterment of our fellow active and pledge brothers. Thus, if elected President, I plan to promote the emergence of a strong coalition, as opposed to having a group of disconnected officers focused on their own projects.
</p>
<h3 style="text-decoration: none; font-weight: bold; font-size: 1.1em;">Executive Committee-Pledge Committee Cohesiveness</h3>
<p style="margin: 1.5em 0px;">
Undoubtedly, of absolute equal importance is the bond between the Pledge Committee and the Executive Committee. As an older active once told me, the Pledging process is at the core of which Gamma Gamma runs, and the path through which it continues to achieve success, for that matter. In order to cultivate a more welcoming and friendly environment for the pledges to enter and grow, the Executive Committee must take a role in interacting frequently with the Pledge Committee.
</p>
<h3 style="text-decoration: none; font-weight: bold; font-size: 1.1em;">Chapter Feedback</h3>
<p style="margin: 1.5em 0px;">
As is evident by the continuous trend of growth of the size of recent pledge classes, our chapter is without a doubt experiencing close to exponential growth. Having said that, I believe that the Executive Committee, a group of elected officials chosen to represent the voices of the constituents of the chapter, must be constantly subject to both positive and negative feedback by our fellow brothers. This could be through motivating more actives to go to chapter forums, or even making an anonymous suggestion box available at Chapter Meetings.
</p>
<h3 style="text-decoration: none; font-weight: bold; font-size: 1.1em;">Internal Chapter Relations</h3>
<p style="margin: 1.5em 0px;">
Because our chapter has grown so large so quickly, I feel it necessary for the President to work closely with the Membership Vice President in order to increase retention efforts. This initiative would involve reviewing active requirements before the start of the semester, identifying actives that need a little more motivation to finish their requirements, and working with these actives to get them more involved with the chapter. Other internal relations would include working with the Historian to perhaps revamp Alumni Bonfire, and possibly establish a brand new Alumni event to get alumni members more excited about coming back and contributing to the chapter.
</p>
<p style="margin: 1.5em 0px;">
I thank you all for taking the time to read through my lengthy platform, and I hope that regardless of the candidate you support, that you do take the time to review who you think the best candidate for President is. Remember that regardless of whomever who choose to vote for, your vote and your voice truly does matter! <em style="font-style: italic;">Below is a summary of my past and present participation with Alpha Phi Omega.</em>
</p>
<h3 style="text-decoration: none; font-weight: bold; font-size: 1.1em; margin-bottom: 1.5em;">Qualifications:</h3>
<h4>Fall 2007 - John C. "Jack" Jadel Pledge Semester</h4>
<ul>
<li>Fellowship Committee Chair, <em style="font-style: italic;">JCJ Fellowship Committee</em></li>
<li>Sectionals Committee, <em style="font-style: italic;">President</em></li>
</ul>
<h4>Spring 2008 - Chris Cheuk Pledge Semester</h4>
<ul>
<li>Stylus Co-Chair, <em style="font-style: italic;">Administrative</em></li>
<li>Meet the Chapter Co-Chair, <em style="font-style: italic;">Rush Committee</em></li>
<li><em style="font-style: italic;">Family System</em> - Magic Stix Big</li>
</ul>
<h4>Fall 2008 - Wilfred Krenek Pledge Semester</h4>
<ul>
<li><em style="text-decoration: underline;">Fellowship (FunComm) Co-Trainer</em>, <em style="font-style: italic;">Pledge Committee</em></li>
<li>Halloween Carnival Co-Chair, <em style="font-style: italic;">Service</em></li>
<li>Sergeant at Arms, <em style="font-style: italic;">President</em></li>
<li>Meet the Chapter Co-Chair, <em style="font-style: italic;">Rush Committee</em></li>
<li><em style="font-style: italic;">Family System</em> - Stix' N Dip Big</li>
</ul>
<h4>Spring 2009 - Sheehan Tejamo Pledge Semester</h4>
<ul>
<li><em style="text-decoration: underline;">Membership Vice President</em>, <em style="font-style: italic;">Executive Committee</em></li>
<li>Rush Chair, <em style="font-style: italic;">Rush Committee</em></li>
<li>Family System - Juicy For Ya Uncle</li>
<h4>Fall 2009 - Jack A. McKenzie Pledge Semester</h4>
<ul>
<li>Alumni Bonfire Co-Chair, <em style="font-style: italic;">Historian</em></li>
<li><em style="font-style: italic;">Rush Committee</em></li>
<li><em style="font-style: italic;">Family System</em> - Finger Lickin' Good Uncle</li>
</ul>
</div>



<h2 style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
President: <span style="font-weight: normal;">Karen He (WK)</span>
</h2>
<div style="max-width: 50em; margin-bottom: 3em;">
<p style="margin: 1.5em 0px;">
Alpha Phi Omega is a place, which taught me that there is always room for improvement. I gained invaluable experiences that helped strengthen my confidence in APO and grow as an individual through Leadership, Friendship and Service. The question "Do you see yourself in Excomm?" has crossed to me twice during the Line of Fire: once when I was a pledge and second time as Pcomm trainer. As a pledge, I knew I would want to become an Excomm officer and be actively involved with the chapter. That aspiration has persisted over the course of my involvement in APO and I finally have the opportunity to give back to the chapter as much as I can, as the president and voice of the chapter.
</p>
<h3 style="text-decoration: none; font-weight: bold; font-size: 1.1em;">CHAPTER UNITY</h3>
<p style="margin: 1.5em 0px;">
Unity among actives is the core foundation that keeps Alpha Phi Omega running. As your president, I will do everything in my ability to promote chapter unity by carrying out our chapter's traditions and establishing new ideas to improve our network among actives and pledges. In other words, actives will be on the same page as they compile different ideas to create a solidified and common goal for the chapter. I am open to new ideas from a diversified group of actives and not just listen to the same group of people repeatedly. In order for change to happen, I would like actives that aren't always at the front of the chapter to voice their ideas.
</p>
<p style="margin: 1.5em 0px;">
I believe that friendship and networking within our chapter are the main sources that keep our chapter running smoothly and I will cultivate relationships among actives and pledges so the chapter fortifies as one. Actives told me that they stay because they have lasting relationships within the chapter. This may not be true for others, but I will to promote extended networks all around the chapter so that no brother is left behind. Every active needs feel that they have a purpose, a reason to stay in the chapter. As a result, closer ties among actives will contribute to teamwork, leadership and a sense of belonging, allowing actives to become more connected with the chapter. I believe that Gamma Gamma has potential to create something bigger as the chapter unites as one.
</p>
<h3 style="text-decoration: none; font-weight: bold; font-size: 1.1em;">EXECUTIVE COMMITTEE INVOLVEMENT</h3>
<p style="margin: 1.5em 0px;">
In order to unify the chapter further, I will integrate the Executive committee with further involvement with the chapter. In many cases, Excomm is in charge of promoting unity and active involvement through different events. Excomm and myself serve as a resource for the chapter. Rather than having Excomm listen to the same people regularly, I will encourage Excomm to dig deeper into getting actives involved and select different actives to be in their committees. That way, different ideas are being heard from those who do not usually voice their opinions. I want to foster a strong relationship between Excomm and actives so actives can approach to Excomm with new ideas, suggestions and challenges, and not just think that Excomm are just the Big Guys talking at CMs. Excomm can begin talking to actives in Excomm meetings or individually to be aware and see what improvements actives want to see.
</p>
<h3 style="text-decoration: none; font-weight: bold; font-size: 1.1em;">ALUMNI RELATIONS</h3>
<p style="margin: 1.5em 0px;">
I also want to strengthen ties with our alumni. Aside from serving our community, we have to remember that we are all students and we want to build professional connections outside of the chapter that would help us in our careers. The link between alums and actives will help instill a professional image and guidance for actives interested in the professional world. We could start by setting up some events ranging from active vs. alumni football or volleyball, substantial resume building or interview workshops, and alumni panels as opposed to just having a single event to meet the alumni. I would like to encourage actives to seek alums as big brothers or a channel to guide us in the right track for life after college.
</p>
<h3 style="text-decoration: none; font-weight: bold; font-size: 1.1em;">INTER-CHAPTER INVOLVEMENT</h3>
<p style="margin: 1.5em 0px;">
IC events are apart of our requirements but aren't focused on in our chapter. I want to broaden our relationships with other chapters. Gamma Gamma is run differently from other chapters but I want this chapter to be aware of how other chapters run. I believe that with a stronger bond with other chapters, we could unite with other chapters to serve a bigger role in our community, such as having interchapter service projects. In order to connect and become familiar with other chapters in section 4, we will have to build a foundation with each chapter at a time. In the Mu Zeta BBQ a week ago, Gamma Gamma and Mu Zeta brothers bonded where they would not have been able to at chapter meetings where there is minimal IC involvement and sectional/regional events. Having small IC events with one other chapter at a time brings two advantages: we get to know the other chapter at a more personal level and actives will actually enjoy going to such event rather than just signing up to fulfill the requirement.
</p>
<p style="margin: 1.5em 0px;">
Thank you for being patient and please consider the points above as you vote for the best candidate for President.
</p>
<p style="margin: 1.5em 0px;">
iLFS,<br />
Karen He
</p>
<h3 style="text-decoration: none; font-weight: bold; font-size: 1.1em; margin-bottom: 1.5em;">Karen He's Resume</h3>
<h4>Fall 2009 - Jack McKenzie Semester</h4>
<ul style="margin-bottom: 1.5em; padding-left: 1em;">
<li>
<strong>Pledge Committee - Finance Co-Trainer</strong>
<div style="padding-left: 1em;">
-Guided, and prepared pledges to become actives<br />
-Organized various fundraisers<br />
-Managed the pledge class budget and reimbursements
</div>
</li>
<li>
<strong>InterChapter Co-Chair</strong>
<div style="padding-left: 1em;">
-Communicated and promoted with other chapters about Interchapter events.<br />
-Worked closely IC representatives to foster a stronger relationship with their chapters<br />
-Added additional interactive IC events to assist actives and pledges to fulfill their IC requirements<br />
*Mu Zeta BBQ
</div>
</li>
<li>
<strong>*Completed 50+ service hours</strong>
</li>
</ul>
<h4>Spring 2009 - Sheehan Tejamo Semester</h4>
<ul style="margin-bottom: 1.5em; padding-left: 1em;">
<li>
<strong>Spirit Co-Chair</strong>
<div style="padding-left: 1em;">
-Organized Roll Call and T-Shirts
</div>
</li>
<li>
<strong>InterChapter Co-Chair</strong>
<div style="padding-left: 1em;">
-Recruited Mrs. APO
-Communicated and promoted with other chapters about Inter-Chapter events
-Added additional IC events to assist actives with their IC requirements
</div>
</li>
<li>
<strong>Co-Stylus Chair</strong>
<div style="padding-left: 1em;">
-Layout- helped revamp the Stylus logo
-Created several new sections in the Stylus- Birthday section, Top 7, What's Hot/What's Not, Free-style drawing, Pledge Review Corner and brought back Sudoku
</div>
</li>
<li>
<strong>Rush Committee</strong>
<div style="padding-left: 1em;">
-Co-Chaired: Sib-Social Night - implemented new activies such as Carrot on a Bottle	and brought back Big Fam Scavengerhunt
</div>
</li>
<li>
<strong>Big Bad Kahuna Big</strong>
</li>
<li>
<strong>Nationals Committee</strong>
<div style="padding-left: 1em;">
*One of the two WK actives to attend, had better understanding of APO at national level
</div>
</li>
<li>
<strong>*Completed 53 service hours</strong>
</li>
<li>
<strong>*Earned Gamma Gamma Maniac (active)</strong>
</li>
<li>
<strong>*Earned Sturdy Oak</strong>
</li>
</ul>
<h4>Fall 2008 - Wilfred Krenek Semester</h4>
<ul style="margin-bottom: 1.5em; padding-left: 1em;">
<li>
<strong>Administrative Committee</strong>
<div style="padding-left: 1em;">
-Worked closely with trainer and committee to complete Pledge newsletter, designed and put together Pledge Newsletter
-Worked with Admin to complete Literary Magazine, made layout and put together magazine
</div>
</li>
<li>
<strong>Spirit Chair</strong>
<div style="padding-left: 1em;">
-Roll Call
-Assisted Mrs. APO with costumes and music
</div>
</li>
<li>
<strong>*Completed 57 Service Hours</strong>
</li>
<li>
<strong>*Earned Gamma Gamma Maniac (Pledge)</strong>
</li>
<li>
<strong>*Earned Pledge Oak</strong>
</li>
</ul>
</div>

<h2 style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
Service Vice President: <span style="font-weight: normal;">Courtney McLaughlin (WK)</span>
</h2>
<div style="max-width: 50em; margin-bottom: 3em;">
<p style="margin: 1.5em 0px;">
Dear Gamma Gammas,
</p>
<p style="margin: 1.5em 0px;">
After spending the last three semesters in APhiO, I would like to be your service VP for the spring semester of 2010. I have been involved in the service area of APhiO for the past two semesters, last semester serving on the service committee and this semester as the service trainer in pledge committee. As the basis of our chapter, the service program greatly affects the overall outcome of each semester. Service is what sets our fraternity apart, and thus should be one of the top concerns of our chapter.
</p>
<p style="margin: 1.5em 0px;">
As our chapter is growing each semester, our service program must grow too. I intend to keep all of our traditional service projects going, as well as initiate at least one project that can be ongoing, similar to POH or SF Food Bank, as well as ensure we have at least one chapter initiated service project, as well as one or two IC service projects, which have not been on the calendar for a few semesters.  Other projects that will be coming around in the spring that I will continue include Academy of Friends, Eggster, GG Sewing, Cherry Blossom Festival and others. I also intend to collaborate with at least one organization on campus, like Circle K or Habitat, and organize something such that we can do a project with another group on campus who are also a service organization.
</p>
<p style="margin: 1.5em 0px;">
Although these goals are not new to our chapter, I feel that I would be able to complete those which have been difficult to in the past.  As SVP I would be able to organize things like inter-club, interchapter and chapter initiated service projects because our service project base in currently so strong, and we have such a large number of brother willing to chair and initiate projects. although the growing size of our chapter sometimes makes  the service project difficult to keep up with, I believe that with a strong service committee and other actives and pledges dedicated to service in our fraternity, we would be able to extend our service program beyond what it currently is and introduce new ideas.
</p>
<p style="margin: 1.5em 0px;">
Being on PComm this semester has prepared me for this position. Not only have I learned about finding and organizing service projects, as well as the logistics of our service program, but I have also grown a lot in my leadership abilities of leading and being part of a committee. After this semester of growth as well as the past three semester I have spent in APhiO, I believe that I am prepared and qualified for the position of Service VP.
</p>
<h3 style="text-decoration: none; font-weight: bold; font-size: 1.1em; margin-bottom: 1.5em;">Resume</h3>
<h4>WK Semester</h4>
<ul style="margin-bottom: 1.5em; padding-left: 1em;">
<li>
<strong>Leadership</strong>
<div style="padding-left: 1em;">
- Historian Committee<br />
</div>
</li>
<li>
<strong>Friendship</strong>
<div style="padding-left: 1em;">
- 23 fellowships<br />
- winner of Assassins<br />
- Attended Fall Fellowship<br />
</div>
</li>
<li>
<strong>Service</strong>
<div style="padding-left: 1em;">
- 48 Service Hours<br />
</div>
</li>
<li>
</ul>
<h4>ST Semester</h4>
<ul style="margin-bottom: 1.5em; padding-left: 1em;">
<li>
<strong>Leadership</strong>
<div style="padding-left: 1em;">
- 23 fellowships<br />
- Rush Committee<br />
- Service Committee<br />
- Participated in Sectionals Roll Call<br />
- Attended LEADS: Launch<br />
- B3P Big<br />
- Received Gamma Gamma Maniac<br />
</div>
</li>
<li>
<strong>Friendship</strong>
<div style="padding-left: 1em;">
- Co-chaired Alumni Bonfire<br />
- 17 Fellowships<br />
</div>
</li>
<li>
<strong>Service</strong>
<div style="padding-left: 1em;">
- Chaired Academy of Friends<br />
- Chaired multiple small service projects<br />
- 80 Service Hours<br />
</div>
</li>
<li>
</ul>
<h4>JM Semester</h4>
<ul style="margin-bottom: 1.5em; padding-left: 1em;">
<li>
<strong>Leadership</strong>
<div style="padding-left: 1em;">
- Pledge Committee<br />
- Co-chaired an active event<br />
</div>
</li>
<li>
<strong>Friendship</strong>
<div style="padding-left: 1em;">
- 15 fellowships<br />
- Participating in IC Powderpuff<br />
</div>
</li>
<li>
<strong>Service</strong>
<div style="padding-left: 1em;">
- Pledge Class Service Committee Trainer<br />
- 50+ service hours<br /><br />
</div>
</li>
</ul>
</p>

<h2 style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
Pledgemaster: <span style="font-weight: normal;">Richard "Dick" Tam (MLN)</span>
</h2>
<div style="max-width: 50em; margin-bottom: 3em;">
<p style="margin: 1.5em 0px;">
As always, I try to make people laugh so before onto some serious stuff, I would like to pass on some words from a very wise woman I know who pledged KW semester.
</p>
<h3 style="text-align: center; font-weight: bold; margin-bottom: 1.5em;">"A Word to Yo Mutha"</h3>
<p style="margin: 1.5em 0px;">
Is unusually loyal = wanted by no one else<br />
Active socially = drinks heavily<br />
Unlimited potential = will stick with us until retirement<br />
Quick thinking = a true master at bs-sing<br />
Takes pride in work = conceited<br />
Takes advantage of every opportunity to progress = buys drinks for others<br />
Approaches difficult problems with logic = finds someone else to do the job<br />
Keen sense of humor = knows a LOT of dirty jokes
</p>
<p style="margin: 1.5em 0px;">
Okay, onto some more serious business. Name is Richard "Dick" Tam and I pledged MLN (Spring 07). To be honest, I really didn't see myself pledging at any time until my friend dragged me to ritual and got me sucked into this. However I do not regret joining APO at all. Instead I made it almost the center of my life here at Berkeley for the past 3 years. As you can look through my qualifications, I was entrusted with various positions around the chapter and I would like to believe that I excelled at them. Taking on these hard challenges by myself was a new experience and had a great learning curve. Many of you guys have been here to witness my work throughout my APO career.
</p>
<p style="margin: 1.5em 0px;">
But now we move onto the question, "Why Pledgemaster?" I have been here for awhile have seen a variety of pledge classes come and go along with the ups and downs of our chapter. Looking through all these semester of APO, the basis of a great chapter is the active base. The actives greatly influence the pledges and are the strong majority of the image of this chapter. Wherever we go, the image of APO is reflected of how the actives reflect the image and the pledges follow. But these actives do not come out of nowhere. They come from the pledgemaster and his/her pcomm. I have looked through the positions of excomm and feel that my last semester in APO can be dedicated to making an impression on the new pledges so that their work will last throughout as long as they can be in APO, just like I have done.
</p>
<p style="margin: 1.5em 0px;">
Now onto the question, "Why am I qualified?" Simply, look at my APO resume. I have been around in all aspects of APO, from the family system, the administrative work, and fellowship work. I believe with the collection of my APO career, I can incorporate all of it into my role as pledgemaster onto the incoming pledges.
</p>
<p style="margin: 1.5em 0px;">
Now "What are some of the issues of the pledge program that I can identify?" Throughout my many semester of APO, I have noticed a variety of levels of pledge class bonding which in effect reflects onto the closeness of the pledge class and their retention in APO. Membership retention doesn't start at the active level, but rather when they are pledges. If people don't feel they belong, of course they aren't going to stay. This semester, I have tried to start an inter-committee tradition where a slightly larger group but still small enough to get to know everyone. I will ask families to mingle with other small families rather than just among themselves. This can be over anything they choose to do. If they cannot think of anything, I will do my best to facilitate the organizing of events as I know from personal experiences that it is difficult to organize events. When I was pledging, we only had 33 people, so getting to know to know people was easier. However our chapter has changed, so I will incorporate some of the old aspects along with updates to adjust for the larger pledge classes.
</p>
<p style="margin: 1.5em 0px;">
Secondly, I have maintained contact with some of the alumni of our chapter and have learned a great deal about some of the lost traditions of APO. As Admin trainer, I have done my best to incorporate the lost traditions into Admin from what I have learned that has made our chapter great. As pledgemaster, I will do my best to educate the trainers about these traditions and the incoming pledge class.
</p>
<p style="margin: 1.5em 0px;">
Thirdly, many people have come to me discussing the difficulty of addressing ex-comm. Sometimes talking to them on AIM is difficult as they do not respond when people are trying to talk to them. The best way for interaction is always in person. I have learned that myself throughout my year as finance. Some people I have felt very disconnected from because I did not make the effort to get to know them and I do admit this is my fault. However it some something I have learned that I do not want the upcoming pledge classes to repeat. I will ask excomm to hold one hour a week of office hours so then the pledges can get a better grasp as to what excomm does and who they are. The purpose of the signature page is to make sure the pledges talk to excomm and pcomm and get to know their roles so that when people leave APO, the knowledge of the positions still exist in the chapter. In my last semester of APO, I will do my best to keep the knowledge of the old and let them continue on.
</p>
<p style="margin: 1.5em 0px;">
To end on a lighter note, some people find it hilarious but I find it something meaningful to my APO career. In my pcomm application I wrote, "Loyalty to Fanny and Sarah (LFS)." A short thing about that is we joked around about how that was Connie Chan's version of LFS. Believe me, that was hilarious when I first heard it and used in my pcomm app. But that kind of friendship that is so strong is so hard to witness firsthand is something great. That is something I would like to foster overall as my semester if elected pledgemaster. Throughout my 3 years here at APO, not only have I developed leadership and service, but fellowship. I have made many friends that I know that will extend into the future and that is something that we are all here for. College is an experience of meeting new people everywhere from different places and APO is an instrument that can foster that.
</p>
<p style="margin: 1.5em 0px;">
I thank you for reading this long and tedious platform and hope you consider these issues when putting in your vote for pledgemaster.
</p>
<p style="margin: 1.5em 0px;">
inLFS,<br />
-	Richard Tam
</p>
<h3 style="text-align: center; font-weight: bold; margin-bottom: 1.5em;">Richard Tam APO Resume</h3>
<ul style="margin-bottom: 1.5em;">
<li>
<strong>My Linh Nguyen (Spring 07)</strong><br />
-	Administrative Committee
</li>
<li>
<strong>Jack C. Jadel (Fall 07)</strong><br />
-	Stylus Editor<br />
-	Weathermen Big
</li>
<li>
<strong>Chris Cheuk (Spring 08)</strong><br />
-	Finance Vice President<br />
-	My Fattius Dick Big
</li>
<li>
<strong>Wilfred Krenek (Fall 08)</strong><br />
-	Finance Vice President
</li>
<li>
<strong>Sheehan Tejamo (Spring 09)</strong><br />
-	Taste the Rainbow Bitch! Parent
</li>
<li>
<strong>Jack McKenzie (Fall 09)</strong><br />
-	Administrative Committee Trainer
</li>
</ul>
<h3 style="text-align: center; font-weight: bold; margin-bottom: 1.5em;">Endorsements and Pledged Pledgemaster Advisors</h3>
<ul>
<li>Alexander Ang (DW) - MLN Administrative Committee Trainer & JCJ Administrative VP</li>
<li>Erica Tu (AC) - GAS Pledgemaster</li>
<li>David Wei (DW) - JCJ Service VP</li>
<li>Joey Wong (JJJ) - JSC Pledge Committee</li>
<li>Jennifer Sun (GAS) - JCJ Membership VP and President</li>
<li>Jonathan Lam (MLN) - ST Pledge Committee, CC & WK President</li>
<li>Kevin Wong (JY) - TOO MANY TO LIST</li>
</ul>
</div>

<h2 style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black; margin-bottom: 1.5em;">
Pledgemaster: <span style="font-weight: normal;">Sitong Peng (WK)</span>
</h2>
<div style="max-width: 50em; margin-bottom: 3em;">
<h3 style="font-weight: bold; font-size: 1.1em; text-decoration: none;">Changes to the pledge program:</h3>
<p style="margin: 1.5em 0px;">
Additional small assignments: 3 goals (specific) for the semester, due PR1 | Review of Goals Assignment, Revise 1 goal, 2 new goals , due PR3) | Review of all goals, due Pledge Test
</p>
<h3 style="font-weight: bold; font-size: 1.1em; text-decoration: none;">Personal Statement</h3>
<p style="margin: 1.5em 0px;">
I have wanted to be pledgemaster since pledging last year. Because of the way our chapter is set up, a lot of attention and focus goes into our pledge program. The importance of teaching pledges is not to be overlooked. Actives are the backbone of the chapter, but pledges are the factors that replenish and strength the chapter in the long run. The experiences a pledge has in their pledging semester are critical to the development of their aspirations in our three cardinal principles when they become actives. Those that take leadership roles, build lasting ties with fraternity brothers, and have the willingness to help others are the ones that will go far in our chapter. But there are inevitably those that need a helping hand to encourage them into roles they may not have volunteered for. I hope that as pledgemaster, I will be there to push every pledge to excel, whether they show the volition to succeed themselves or need that helping hand. 
</p>
<p style="margin: 1.5em 0px;">
From the moment I crossed last year, I have felt a sort of nostalgia toward pledging. I miss the excitement of gathering as a pledge class to bond, do service, and especially to sneak. With that said, I've tried to occupy myself with roles that pertain to pledges this past year, namely being a rush chair, big, serving on end of the semester committee's, serving as leadership co-trainer. As a rush chair, I learned a lot about how potential pledges perceive our fraternity. Generally, the reasons rushees' have for pledging fall into categories split between fellowship and service. Developing leadership values is a distant third to these two principles. One of my major goals as pledgemaster is to guide pledges to be leaders in fellowship and service. I want them to take the initiative to bring new ideas into our chapter and help guide others to do the same. As a big, I learned much about the individual needs of pledges. Everyone is different and our pledge program will affect pledges in different ways. I expect to address individual issues effectively such that everyone can proceed with the program at the same pace. As a peer to newly crossed pledges on end of the semester committees, I learned that working with pledges needs to be fun. The atmosphere in which they are willing to learn and grow is extremely important. I will work hard to make sure pledges have an amazing experience in their pledging semesters. Finally, my experience on pledge committee this semester has easily taught me the most about working with pledges. When one is in charge of pledges it is important to keep a careful balance between their perception of you as a friend and as an authority figure. While I personally would enjoy being a friend all the time, I know that will not be likely with problem cases. My solution to problem cases is confrontation because it is the most effective way to communicate that there is an issue. Confrontation also addresses issues directly and the ability to address these issues is a necessary trait for a pledgemaster.
</p>
<p style="margin: 1.5em 0px;">
I hope to give back to the fraternity by sharing my experiences with being a leader and I know that I can have that opportunity as pledgemaster. Ever since pledging Alpha Phi Omega, I have found myself very much enjoying the leadership roles I've had, and I definitely want to use the skills I've acquired in educating another generation of actives. My tenure in Alpha Phi Omega has been relatively short, however, I have both the maturity to succeed as your pledgemaster and the well focused experiences that have kept me close to the pledge program. I am confident that with me, you will not be disappointed with the results of next semester and I plan to use my knowledge of the pledge system to ensure that.
</p>
<h3 style="font-weight: bold; font-size: 1.1em; text-decoration: none; margin-bottom: 1.5em;">Themes I will focus on as pledgemaster:</h3>
<h4>Unity</h4>
<p style="margin: 1.5em 0px;">
I advocate that without cohesive strength, a committee will not reach its potential. This philosophy applies to the pledging program in two ways. First off, I plan to build a pledge committee that will exemplify the power of teamwork to the pledges. Pledges expect pledge committee to work as a singular unit and to be organized as such. To accomplish this bond, I plan to work extensively with pledge committee early in the semester and run them through a variety of exercises and bonding expectations. The second aspect of unity in the pledge program lies with the individual pledge committees. I will encourage pledge trainers to emphasize cohesion in their committees. When pledges feel connected to their committees they are apt to take ownership in their work, which will undoubtedly improve the quality of their work. A bit of committee pride is a good tool to encourage pledges to take more active roles in their pledging semesters, which is the ultimate goal for the pledgemaster.
</p>
<h4>Motivation</h4>
<p style="margin: 1.5em 0px;">
This is the overarching goal I have for next semester. I wish to motivate incoming pledges to be proactive. I share, with most active brothers, the common philosophy that one's pledging semester is largely based on what one makes of it. With that said, I believe that it is imperative that pledges are pushed to take charge of their own pledging experience because a good semester with APO is what will keep them coming back. There are two necessary conditions to develop a proactive attitude. First, pledges must have a nurturing environment that constantly motivates them to push their boundaries. To achieve this goal, I plan to actively encourage pledges to go above and beyond. On top of that, as actions often speak louder than words, I plan to also lead by example and expect my pledge committee to do the same. The second condition depends on the pledge's personal motivation. Now while I cannot instill motivation in a pledge that does not accept it, I can cultivate and build up the basic motivation they have for pledging. I plan to do this by adding a short "goals and expectations" assignment due at PR1, PR3, and Pledge Test. The PR1 assignment will be to list 3 goals they have for the semester. I will ask for personalized and specific goals so something like: "15 Service Hours by PR3" or "Make 2 meaningful connections with people in the chapter". The PR3 assignment will be to review the PR1 goals and to revise 1 of their PR1 goals and make 2 new goals. The Pledge Test assignment will be to review all 5 of their goals. The reviews will be short responses describing what measures the pledge has taken to accomplish their goal and how to ensure that they accomplish their goal if they hadn't already. By having pledges write specific goals and review them actively, I will be empowering the pledges to take charge of their own pledge experiences. The idea is for these goals is for pledges to have a personal measure for how motivated they are in APO. If they don't manage to accomplish any PR1 goals, they should be brainstorming how they can not disappoint themselves at PR3. I also plan to conduct a special exercise involving their goals during activation that will celebrate how far each of them has come in pledging.
</p>
<h4>Communication</h4>
<p style="margin: 1.5em 0px;">
I have always valued people that are easily accessible and are fast and effective communicators. These are also traits that I value in myself. As pledgemaster, I will make sure that everyone is on the same page to the best of my ability. I want to make sure that pledges aren't isolated from actives, especially since actives can play a large role in keeping pledges motivated. I believe that some transparency in the pledge program is beneficial to the chapter and actives, namely bigs, should be entitled to know of certain issues a pledge may be having. While I cannot pledge full transparency, I will encourage more open communication between trainers and bigs. After all, we all share the common goal of training good actives so the lines of communication between trainers and bigs should be more open - especially since bigs are such an important influence on pledges.
</p>
<h3 style="font-weight: bold; font-size: 1.1em; text-decoration: none; margin-bottom: 1.5em;">Alpha Phi Omega Resume</h3>
<h4 style="float: left">Fall 2009 [In Progress]</h4>
<p style="text-align: right; margin-bottom: 0.5em;">Jack McKenzie</p>
<ul style="margin-bottom: 1.5em;">
<li style="margin-bottom: 0.5em;">
Leadership Committee Co-Trainer
<div style="font-size: 0.8em;">
-	Led 11 pledges through the leadership committee program with events: Pledge Class Retreat and Leadership Workshop among others
</div>
</li>
<li style="margin-bottom: 0.5em;">
UCSC Powder Puff Co-Chair
<div style="font-size: 0.8em;">
-	Led and taught the UCSC Powder Puff Halftime Routine
</div>
</li>
<li style="margin-bottom: 0.5em;">
Rush/Hall Carn/Web Committee
<div style="font-size: 0.8em;">
-	Flyering and Tabling, attended most rush events, consulted on flyer<br />
-	Attended many Hall Carn Workshop Shifts and both Hall Carn Shifts<br />
-	General website maintenance, user account access, uploading minutes
</div>
</li>
<li style="margin-bottom: 0.5em;">
75+ Service Hours
</li>
<li style="margin-bottom: 0.5em;">
10+ Fellowships
<li style="margin-bottom: 0.5em;">
</ul>
<h4 style="float: left">Spring 2009</h4>
<p style="text-align: right; margin-bottom: 0.5em;">Sheehan Tejamo</p>
<ul style="margin-bottom: 1.5em;">
<li style="margin-bottom: 0.5em;">
Rush Co-Chair
<div style="font-size: 0.8em;">
-	Worked on rush logistics, oversaw rush committee, presented and fielded questions from rushee's<br />
-	Headed production of Rush Video and consulted on flyer and gift
</div>
</li>
<li style="margin-bottom: 0.5em;">
Spirit/Web/Banquet Committee
<div style="font-size: 0.8em;">
-	Roll Call performance<br />
-	General website maintenance, user account access, uploading minutes<br />
-	Worked on making invitations, banquet gifts, banquet grams; sold banquet grams and keychains
</div>
</li>
<li style="margin-bottom: 0.5em;">
Big Bad Kahuna's Big
</li>
<li style="margin-bottom: 0.5em;">
50+ Service Hours
</li>
<li style="margin-bottom: 0.5em;">
10+ Fellowships
</li>
</ul>
<h4 style="float: left">Fall 2008; Pledge Semester</h4>
<p style="text-align: right; margin-bottom: 0.5em;">Wilfred Krenek</p>
<ul style="margin-bottom: 1.5em;">
<li style="margin-bottom: 0.5em;">
Leadership Committee
<div style="font-size: 0.8em;">
-	Co-chaired Pledge Class Retreat: led pledge class and pledge committee in many bonding games and relays<br />
-	Co-presented "Finding your Inner Leader" for Leadership Workshop
</div>
</li>
<li style="margin-bottom: 0.5em;">
Spirit/Hall Carn Committee
<div style="font-size: 0.8em;">
-	Roll Call performance<br />
-	Attended many Hall Carn Workshop Shifts and both Hall Carn shifts
</div>
</li>
<li style="margin-bottom: 0.5em;">
50+ Service Hours
</li>
<li style="margin-bottom: 0.5em;">
20+ Fellowships
</li>
</ul>
<h4>AWARDS</h4>
<ul>
<li>-	Sturdy Oak [Spring 2009]</li>
<li>-	Pledge Oak [Fall 2008]</li>
<li>-	Pledge Gamma Gamma Maniac [Fall 2008]</li>
</ul>
</div>

<h2 style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
Administrative Vice President: <span style="font-weight: normal;"></span>
</h2>
<div style="max-width: 50em; margin-bottom: 3em;">
<p style="margin: 1.5em 0px;">
</p>
</div>

<h2 style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
Membership Vice President: <span style="font-weight: normal;"></span>
</h2>
<div style="max-width: 50em; margin-bottom: 3em;">
<p style="margin: 1.5em 0px;">
</p>
</div>

<h2 style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
Finance Vice President: <span style="font-weight: normal;">Sam Blanchard (WK)</span>
</h2>
<div style="max-width: 50em; margin-bottom: 3em;">
<p style="margin: 1.5em 0px;">
Actives of Gamma Gamma,
</p>
<p style="margin: 1.5em 0px;">
I don't want to write something that's insanely long in the interest of your time, so I'll try to keep things short. I am running for Finance Vice President because I believe I am very qualified for the position.
</p>
<p style="margin: 1.5em 0px;">
As a WK pledge, I was in Finance Committee and chaired my first fundraiser. As an active, and as part of Beckie Siu's Fundraiser Committee, I have been available to assist her when needed and chair fundraisers that she could not attend. In all, I have participated in 12 fundraisers, chairing six of them. In my time doing fundraisers for the chapter, I have built up a strong rapport with several of the employees at Sodexo (the company that we collaborate with in selling concessions at Cal Athletics events), and I believe this is important for securing prime fundraising opportunities and maintaining our strong relationship with the company.
</p>
<p style="margin: 1.5em 0px;">
I am also aware of the substantial responsibilities and time commitment that come with the position and I believe I can handle them. On matters like the chapter's budget and reimbursements, I hope to be transparent and receptive to suggestions by responding in a timely fashion and making information available and accessible. I also believe I can bring to the table creative ideas in pursuing new fundraising opportunities.
</p>
<p style="margin: 1.5em 0px;">
I hope this platform has made more transparent my qualifications and ideas for the Finance Vice President position. With that being said, I encourage you to give a lot of thought to your votes, because I think the election process is an important outlet for this chapter's members to shape the way it is run. The main thing that I ask from you is to vote for the person who you think will lead the chapter the way you want it to be run.
</p>
</div>

<h2 style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
Fellowship Vice President: <span style="font-weight: normal;">Felix Jiang (ST)</span>
</h2>
<div style="max-width: 50em; margin-bottom: 3em;">
<p style="margin: 1.5em 0px;">
Greetings Gamma Gamma,
</p>
<p style="margin: 1.5em 0px;">
Compared to the previous semester, and semesters before that as I have heard, the gamma gamma chapter at UC Berkeley has seen a tremendous increase in size. With so many people in the program now, it is becoming more difficult to connect with each and every one of the chapters' amazing brothers at the level at which it is needed. To reinstill the brotherhood aspect of our fraternity, I plan to take on the Fellowship VP position with a more holistic view of what people do for fun, as well as when and how often they can attend. In this way, more people will be inclined to participate in more fellowships than before and hopefully this will instigate the chapter to become closer and more socially comfortable as an integrated service organization.
</p>
<p style="margin: 1.5em 0px;">
In the past, some fellowships have been proposed in places that either require driving long distances or are during breaks (spring break, labor day weekend). These ideas are great and I will see that they are still planned and executed in the following semesters. However, I feel that when taking into account the current chapter size, it would be necessary to create more fellowships that are close to campus, and just during regular weekends so that everyone can participate in them. Some ideas that I have previously thought about are picnics/frisbee at memorial glade, gift-making sessions for bigs/littles at an apartment or room (in dwinelle), and others that are centered around the probability that brothers are able to attend. Furthermore, to make increase the variability of fellowships each week, I will try my best to re-organize similar fellowships that fall on the same week (3 boba fellowships in one week) into different weeks so that people stay satisfied. In addition, I will do my best to come up with short ice-breakers in the beginning of fellowships so that brothers that don't know each other will be more likely to bond during the event. On another note, I will be very careful to make announcements/e-mails as much as possible for the new fellowships created each week. I understand that this is someone else's job at the moment, but I would be more than happy to take it if I am elected.
</p>
<p style="margin: 1.5em 0px;">
As a person I am very simple, charismatic, open and accepting. During the rush period of this semester when I served on the rush committee, I made myself very approachable to the rushees, and plan to do the same with new pledges and actives in the semesters to come. The formation of a fellowship on the calendar implies that at least someone is willing to attend. With this said, there is no bad fellowship idea and I think that any idea should be posted on the website. Furthermore, I am very good at looking at the positive aspects of a fellowship, and can project these ideas very easily onto others who are still ambivalent about attending, or who think they shouldn't attend at all. I think that this skill will help the number of people attending fellowships increase, and that the end result will impart a very positive sense of pride and affiliation with our chapter. Feel free to ask me any questions about my position on anything, and I hope you will consider my bid as a candidate for Fellowship VP!
</p>
<p style="margin: 1.5em 0px;">
iLFS,<br /><br />
Felix Jiang
</p>
</div>

<h2 style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
Historian: <span style="font-weight: normal;">Jennifer Hung (CC)</span>
</h2>
<div style="max-width: 50em; margin-bottom: 3em;">
<p style="margin: 1.5em 0px;">
Hey Gamma Gamma,
</p>
<p style="margin: 1.5em 0px;">
I'm Jenn Hung and I would like to be your Historian VP next semester. Some of you may not know me because I went to study abroad in Japan last semester. While I was there, I took a lot of pictures, one folder per day. :P I even won a photo contest. As you can see I love taking pictures, but I know that's not the only qualification needed as a historian. I have worked on and chaired funpack committee in the past semesters. I have also worked on scrapbooking. So I know and love all the committees that a historian has to run. I also love being creative and working on arts and crafts. But I know being a leader is not just about doing everything on your own, but to enlist the help of other brothers. I propose that we also have committee members that are designated photographers so that we can record the wonderful memories of our semester from all different angles. Since our chapter is getting so big I think it would be a good idea that we have more photographers because then we can get all those precious, priceless candid moments. So I look for forwards to working with all of you and serving you as Historian VP if you guys give me the chance. :D
</p>
<p style="margin: 1.5em 0px;">
iLFS,<br />
Jenn Hung (CC)
</p>
</div>


<h2 style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
Historian: <span style="font-weight: normal;">Anna Yee(CC)</span>
</h2>
<div style="max-width: 50em; margin-bottom: 3em;">
<p style="margin: 1.5em 0px;">
Hey Gamma Gamma,
</p>
<p style="margin: 1.5em 0px;">
GGs in the HOUSE! 
</p>
<p style="margin: 1.5em 0px;">
My first question to you: "Have you ever received a gift that left you speechless because it was so amazing that someone would take the time and day to make you feel special?" Yeah, that feeling. Well, I try my hardest to invoke that feeling every time I start an art project. 
</p>
<p style="margin: 1.5em 0px;">
For as long as I can remember, I've always been in love with arts and crafts. It's something that I find pleasure in because it helps me express myself in ways that words never could. It was a source of outlet for me when things went wrong. And it didn't matter the kinds of arts and crafts I did (drawing, sewing, coloring, photography) because I enjoyed it all. 
</p>
<p style="margin: 1.5em 0px;">
One of the reasons I applied to be on Pcomm was to challenge myself. I've always been a very shy person and it's hindered my ability to make friends and talk to strangers. I've never gotten over this fear and I might never be able to but I'm not going to let it stop me. The only way that I've learned to deal with this problem is to throw myself out there and to force myself to step out of my box. One of my goals on Pcomm is to work closely with the pledges and to get to know them. So far, I've been pretty successful. I feel that I've grown from this experience because I take more initiative to meet people. Now, I'm going to challenge myself once again by running for Historian VP but this time, my goal is to be able to work closely with actives so I can get to know my Brothers. 
</p>
<p style="margin: 1.5em 0px;">
My second question to you: "Picture yourself as an alumni, what would be the driving force that encourages you to come back every semester?" I thought long and hard and realized that alumni are just like us. We don't want to be forgotten and we want to have voice. So, I've though of a few ways to improve alumni relations: (1) creating fellowships consisting of a few alumni and roughly 10-20 actives/pledges. This creates a more intimate setting for alums, actives and pledges to get to know each other. The fellowships can be of anything, which brings me to my second idea: (2) to send out a questionnaire asking alums how we can better accommodate them in the chapter. This way, we can learn a bit about them and we can create fellowships based on their preferences. Lastly, (3) show more appreciation for our alumni. We can do simple things: i.e. send cards or little gifts on their birthdays, give them thank you gifts for coming out, bake them desserts, things that families and friends would normally do for each other. If alumni feel like they are still welcomed and a part of APO, they will come back! For free baked goods, who wouldn't come back? 
</p>
<p style="margin: 1.5em 0px;">
Jack McKenzie (Fall 09)<br>
-	Historian Committee Trainer<br>
Sheehan Tejamo (Spring 09)<br>
-	Gravy Baby Big<br>
-	Service Committee<br>
-	Banquet Co-Chair <br>
Wilfred Krenek (Fall 08)<br>
-	2 Much 2 Handle Big<br>
Chris Cheuk (Spring 08)<br>
-	Admin Committee<br>
-	Scrapbook Committee
</p>
</div>

HEREDOC;
}
Template::print_body_footer();
Template::print_disclaimer();
?>
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
Fall 2007 Election Platforms
</div>
<div style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
President: <span style="font-weight: normal;">Jason Shih</span>
</div>
<p style="margin: 1.5em 0px;">
Gang,
</p>
<p style="margin: 1.5em 0px;">
Chapter meetings aren't exactly "fun." I can't guarantee they'll be any better if I'm president excepted that y'all be lookin' at a sexy thang up at the podium (I'm going to work out over the Winter, I promise!) Going into my fifth semester with APO, I've had a few thoughts and suggestions in my time as an active member. I can't promise any drastic changes or more returning actives, but what I CAN do, is foster a greater sense of communication between the members of ExComm, work more closely with the pledge committee and the pledges themselves, and set an example for both actives and pledges to follow. The main points I wish to tackle are our gradually declining active retention rate, fostering a sense of inclusion among all members, and increasing our professional image. Firstly, I plan on working closely with our MVP to establish a system of merits and demerits for bad-standing actives, and widening the line of communication with current pledges to address their concerns and to make APO a homier place for them. Second, I find that much of the exclusion currently occurring stems from the structure of our family system. To decrease this exclusivity, I would strongly encourage potential parents and bigs not to sign up together, but to try to big and parent with other actives outside of their immediate social groups. Finally, to foster a greater sense of professionalism within APO, I plan to strengthen ties with our alumni, and have them play a bigger role in the pledge process as well as the fraternity. Hopefully, increased alumni presence and activity would allow us to better highlight the professional network available to all actives. The success of my goals and targets rely heavily upon the cohesiveness of our Executive Committee, which is why I plan to have several events that'd allow ExComm to bond and grow as a team. I have absolute confidence that I will be able to achieve my goals during my term, and hope you all give me such opportunity.
</p>
<p style="margin: 1.5em 0px; padding-left: 50em;">
Jason S.
</p>

<div style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
President: <span style="font-weight: normal;">Jon Lam</span>
</div>
<p style="margin: 1.5em 0px;">
Ey Yo
</p>
<p style="margin: 1.5em 0px;">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yeah, I know, I'm really running for president. I know I may not have the most experience or may not have been around the longest, but I honestly feel that I can make a positive difference in the chapter. I've always felt that relationships are important, and I want to foster that same value within the chapter. To start, I'd like to integrate my excomm further into the chapter. Even to pledges, we encourage all members to bring their own service projects to the chapter, to initiate change within it. But it's hard to make a difference when you don't know who to go to, or what to do. Honestly, I had no idea what many of the excomm positions did until I stepped up and talked to them. Like with Jen Sun's cookie cards, I'd like to establish a link between my excomm with actives and pledges alike. From what I've seen, our alumni retention is quite low and it's understandable. I'd like to make it in some cases more inviting for our alumni to return to converse with the current crop of active and pledges. I'd want to bring a medium where they can build relationships that will bring them back. Maybe start a couple events or reboot some that are more open to alumni and actives, like the alumni football events we had last semester. The same is true with our own actives. Outside of family time, there isn't quite as much activity between actives of the chapter. I understand that cliques are inevitable. But I've come to see that cliques aren't necessarily a bad thing, it gives people a place to belong. The only time it becomes troublesome is when they're exclusive. I don't want to make any big promises I can't follow through on, but I'd like to see you all building relationships with each other. I feel that I can honestly talk to any one of you and I'd like you all to feel the same about talking to me or any other member of our fraternity; building the types of bonds that keep us together.
</p>
<p style="margin: 1.5em 0px;">
-Jon L.
</p>

<div style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
Pledgemaster: <span style="font-weight: normal;">Nick Yap</span>
</div>
<p style="margin: 1.5em 0px;">
Brotherhood. It's what makes us unique from all the other service organizations and what brings so
many actives back semester after semester. Yet how can we show how important brotherhood is to
all of us? How can I demonstrate to the incoming pledges that if it weren't for Aphio, I wouldn't
own stunna shades or know how to use chopsticks? There's so many things I now take for granted
that were a direct result of me joining Aphio, and I'm sure it's the same for so many of you guys as
well. Yet I honestly don't even know if there is any way we can show what brotherhood means.
But I do think above all we should give the pledges the opportunity to find out for themselves.
</p>
<p style="margin: 1.5em 0px;">
I do take a rather paternalistic view to being Pledgemaster. Basically I would take the same
approach to being Pledgemaster as the four fun-filled and memorable semesters I've parented. I do
take things like how I and the rest of Pcomm present themselves importantly because I believe in
the value of a good first impression at the start of the pledging semester. Haha and I don't mean
this in a superficial way either; I actually think this would help bring a sense of professionalism to
the fraternity. I would go out of my way (through emails, IMs, and talking in person) to make sure
everything is going alright with the pledges and that they and the rest of the actives are aware of
what's going on each week. I think that with so many events going on and so many new faces it can
be immensely overwhelming, but I feel that a strong, organized pledge committee can bring some
much needed structure to the pledge program. Using the same philosophy as when I was MLN
FunComm trainer, I think I can establish early on that we intend to have lots of fun but are also
truly serious about our responsibilities and will get work done.
</p>
<p style="margin: 1.5em 0px;">
I want to promote brotherhood with not just the pledges, but also the actives, alumni, and even ICs
as well. I think it's important to ride this wave of IC relations and chapter pride that came from our
chairing Sectionals and put forth a strong showing at the Spring Sectionals at Zeta. I will strongly
encourage the pledges to both attend Sectionals and participate in Roll Call with the actives. Doing
my part as a member of ExComm, I intend to spice up CMs by pushing the trainers to put on skits
with their committees. And I mean truly planned out skits along the lines of a CTU blackout raid to
announce Broomball. Along with working the pledges into CMs, I want to get the actives involved
more in PRs as well. I believe it would be worth the time to have ExComm, Parents, and chairs of
big events to come to PR and talk about why they took on such roles and what it means for them to
be in Aphio. I think that would help provide a new perspective on the fraternity for the pledges and
also allow the actives to have more of an impact on the pledge program. I also know people will
have their respective complaints about the pledging program, so instead of saying "Suck it," or
"Wait til next semester and you can make a change," I would challenge the actives right then to step
it up and take on leadership roles or find new events, and I would invite them to PR so they
themselves can introduce such events straight to the pledges.
</p>
<p style="margin: 1.5em 0px;">
I don't have any problems with the current pledge requirements. I believe I can get the pledges to
care enough about Aphio to want to do their interviews and have fun with them too, along with
completing the rest of their requirements. I want the pledges to realize how valuable brotherhood is
and that it's what LFS stems from. I want to encourage the pledges to become better leaders, not
just for themselves, but for their friends as well. Furthermore, I want to challenge the pledges to
always strive to be a better friend for others and strengthen all those relationships. And I think
service, through all 4 C's, gives us that opportunity. We have the pledging process for a reason: it's
what distinguishes us as a fraternity, as a true brotherhood.
</p>

<div style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
Membership VP: <span style="font-weight: normal;">Francesca Wang</span>
</div>
<p style="margin: 1.5em 0px;">
<div style="font-style: italic;">"Reflection Assignment #4:  What role do you see yourself taking in the chapter in the future?"</div>
A semester ago, this reflection assignment was when I first thought about running for the position of Membership Vice President. Although I had not anticipated writing this platform this early in my APO career, my first semester experience as an active has prompt me to run for MVP, in the hopes of better serving the chapter.
</p>
<p style="margin: 1.5em 0px;">
This specific position means a lot to me because as much as I value and recognize the importance of pledges, I still believe that the very basis of a great chapter relies on the dedication and performance of actives. If you really think about it, actives form the soul of our chapter; they sustain the chapter, influence pledges, and shape the future. But somehow, they are often left feeling underappreciated and lost. One thing I would like to do is organize more active retreats throughout the semester. I feel that because of the great emphasis placed on our family system, actives lose time with each other, weakening the relationships that were once built. I'm not promoting the exclusion of pledges, but setting aside time solely for actives to bond would strengthen the chapter internally.
</p>
<p style="margin: 1.5em 0px;">
According to the job description, the MVP oversees the internal affairs of the chapter, and I believe that the chapter's overall morale is relevant. Our chapter lacks a bit of pride, and I know many of you felt it at our Fall Sectionals. However, that by no means undermines the merit of our chapter because quite frankly, I am very proud to be in Gamma Gamma. And I want YOU to feel proud to be apart of Alpha Phi Omega, Gamma Gamma Chapter. So for starters, I want to improve on our Sectionals attendance and participation. On top of that, I would like to organize a Spirit Committee that is responsible for our chapter's cheers, costumes, Miss APhiO, and Rollcall. Aside from Sectionals, I personally will do my best to give you a taste of my own pride, whether that's being happy at CM, coming out to hella events, or even wearing an article of APO gear everyday of the week (hmmm..).
</p>
<p style="margin: 1.5em 0px;">
Thank you for taking the time to get to know me and my ambitions. If you take anything away from this, I just hope that you know I will undoubtedly give 100% as MVP to serving our chapter.
</p>

HEREDOC;
}
Template::print_body_footer();
Template::print_disclaimer();
?>
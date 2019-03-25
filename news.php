<?php
require("include/includes.php");
require("include/Calendar.class.php");
require("include/Template.class.php");
// require("include/Shoutbox.class.php");
require("include/EvalNag.class.php");
require("include/GGManiacNag.class.php");
Template::print_head(array("site.css", "calendar.css", "excel.css"));
Template::print_body_header('Home', 'NEWS');
ini_set('display_errors',1);  error_reporting(E_ALL);

$template = new Template();
$calendar = new Calendar();

$evalnag = new EvalNag();
echo $evalnag->display("2007-01-01");

$gg_maniac_nag = new GGManiacNag();
echo $gg_maniac_nag->display();

// $shoutbox = new Shoutbox();
// $shoutbox->process();
// echo $shoutbox->display();

$calendar->print_upcoming_events(5);

$g_user->process_mailer(false);
$g_user->print_mailer(false);
$g_user->print_personal_messages();
if (!$g_user->is_logged_in()) {
    echo '<img style="float: right" src="images/lfs_banner.png" alt="LFS" />';
}
?>


<?php if ($g_user->is_logged_in()): ?>
   
<!-- template
    <div class="newsItem">
        <h2>CM 2 Recap</h2>
        <p class="date">September 14, 2018 at 10:49pm</p>

            <a href="https://docs.google.com/presentation/d/1D21PuV0KZg_31IdVwL7nvHt7G5wbTswwuNkmil4ApH8/edit#slide=id.p" target="_blank">CM 2 Slides</a><br>
            <a href="https://members.calaphio.com/reimbursement.php" target="_blank">Reimbursements</a><br>
            <a href="https://members.calaphio.com/gg_maniac_vote.php?id=146" target="_blank">CM 3 GG Maniac</a><br>
            <a href="https://docs.google.com/spreadsheets/d/1vDGebsyI3XCyHPidl5y7mCutUcD6aHZCz0xoyj-zcnk/edit#gid=1589878783" target="_blank">ExComm Chairing Positions Available</a><br>
    
    <p>- <a href="profile.php?user_id=4622">Shengmin Xiao (MMC)</a></p>
</div>   
-->
   <div class="newsItem">
        <h2>Spring Break Opportunities!</h2>
        <p class="date">March 25, 2019 at 10:49pm</p>
        <p>
            Happy Spring Break!<br><br>

Do you want to VOLUNTEER or attend IC events in SOCAL? Here are some of the upcoming events:<br><br>

            <a href="http://members.calaphio.com/event.php?id=156321" target="_blank">Sketchers Marathon with UCLA APhiO</a>: <br>
Sun 3/24 Multiple Shifts<br><br>


            <a href="http://members.calaphio.com/event.php?id=156329" target="_blank">Hollywood Food Coalition</a> (think Berkeley Food and Housing) with UCLA APhiO<br>
Everyday 2-6:30pm OR 5:45-8:30PM<br><br>

            <a href="http://members.calaphio.com/event.php?id=156320&refresh=true#" target="_blank">[IC] USC General Meeting</a><br>
Mon 7:30-8:30pm<br><br>

            <a href="http://members.calaphio.com/event.php?id=156288" target="_blank">[IC] SDSU General Meeting</a><br>
Mon 7-9pm
        </p>
    
    <p>- <a href="profile.php?user_id=4622">Shengmin Xiao (MMC)</a></p>
    </div>
    <div class="newsItem">
        <h2>CM 5 Recap</h2>
        <p class="date">March 18, 2019 at 10:49pm</p>
            <a href="https://docs.google.com/presentation/d/1yBeONzD3RAhqSj0pK_nrC1BzAoi0iRj9-GtHZNh5MqE/edit?usp=sharing">CM 5 Slides</a><br>
            <a href="https://docs.google.com/document/d/1A8pb2Ym3EDk3Et1lL-PX0p-fGFd-M0J_5aPU4qirUew/edit?usp=sharing">Mid-Semester Forum</a><br>
    
    <p>- <a href="profile.php?user_id=4943">Tiffany Ho (PVL)</a></p>
    </div>
    <div class="newsItem">
        <h2>Biweekly Service Newsletter #3</h2>
        <p class="date">March 18, 2019 at 10:49pm</p>
           <p>
            The SVP brings to you the biweekly SERVICE NEWSLETTER #3!
<br><br>
These are two of our most important APO events are occurring next month. I recommend you signing up for at least one of them to experience what it’s like to host a service event on our own!
<br><br>
               • April 13: <a href="http://tinyurl.com/yyr3fsof" target="_blank">SPRING YOUTH SERVICE DAY (SYSD): </a><br>
A super chill and fun Kids Zone event where you’ll be managing a booth and helping kids have fun on Cal Day. <br>
<br>
               • April 26: <a href="http://tinyurl.com/yxgjzh38" target="_blank">COLLEGE DAY: </a><br>
An important event where we show high school kids what college life is about, give them a tour of the campus, and have a panel of students (you may be one of them) to give them your personal take on your academic journey so far.
<br><br>
UPCOMING OPEN SERVICE EVENTS:
<br><br>
               • Mar 19-20 <a href="http://tinyurl.com/y6pl3sxu" target="_blank">Blood Drive:</a><br>
We’re sponsoring American Red Cross in their Blood Drive! Help promote the event by tabling/flyering. Canteening shifts are full already!<br>
<br>
               • Mar 22 <a href="https://tinyurl.com/y5vblz2p" target="_blank">Esh/Cage Cleanup for SYSD: </a><br>
We’re scouring through Esh and the Cage to make sure we know what we have and what we need to buy for Spring Youth Service Day. Come help if you’re free, it’ll be chill.<br>
<br>
               • Mar 22-24 <a href="http://tinyurl.com/yxh4mm4c" target="_blank">Chinese Martial Arts Tournament (CMAT) 27: </a><br>
Help make this tournament as awesome as it can be!<br>
<br>
               • Apr 3/5 <a href="https://tinyurl.com/y4quel4e" target="_blank">Dog/Cat Friend Orientation: </a><br>
Walk dogs and/or pet cats at the Berkeley Animal shelter! You must attend orientation before you can volunteer, and commit to 6 months of volunteering (i.e. 24 hours) – but they’re very flexible with this, so you can spread the hours out as much as you need to! *Highly recommend*<br>
<br>
               • Apr 5 <a href="https://tinyurl.com/y2cr5g8b" target="_blank">Oakland First Fridays: </a><br>
Volunteer to make this monthly Oakland event as smooth as possible! Volunteer roles include photographer, gate greeter, booth coordination, social media volunteer, runner, among others.<br>
<br>
               • Apr 10 <a href="https://tinyurl.com/y3pjbqq3" target="_blank">Shadow Day: </a><br>
Show a high school student what a day in your life at college is life by bringing them along!<br>
<br>
               • Apr 12 <a href="https://tinyurl.com/y2l7r4yj" target="_blank">Phi Delta Epsilon Philanthropy Show Painting: </a><br>
A really artsy philanthropy event where artists will paint organs on the models’ bodies. You can volunteer to be an artist or model, with the money being donated to the Children’s Miracle Network Hospital.<br>
<br>
               • Apr 15-19 <a href="https://tinyurl.com/yygzlk5w" target="_blank">Museum of Tomorrow: </a><br>
Help out at the climate change pop-up museum right here on UC Berkeley!!
<br><br>
SOME REMINDERS ABOUT DOING SERVICE:
<br><br>
• Sign up for SYSD and/or College Day! They are organized by your fellow bros in the chapter and show the effort that goes into hosting our own service events.<br>
<br>
• If you’re chairing, you’re responsible for taking pictures (or finding someone who will take pictures) and uploading them to SmugMug, thanks.<br>
<br>
• Sing the toast song at the end of the service event! This is non-negotiable, unless there’s only 2 of you in which case it would be really awkward so don’t do it.<br><br>
The weather is getting better-ish, so the SVP is expecting to see more active bros doing service these coming weeks!<br>
        </p>
    <p>- <a href="profile.php?user_id=4792">Michelle Chang (RT)</a></p>
    </div>
   <div class="newsItem">
        <h2>CM 4 Recap</h2>
        <p class="date">March 3, 2019 at 10:49pm</p>

            <a href="https://docs.google.com/presentation/d/1Vn4geIDuUAOJvPKGjIr7bGPXDsrLKtraleFYvVi-gLw/edit?fbclid=IwAR0Q3J6lEXplIHRiKxxUHWLTDDvZUmQFvjWEQk0_9psBCNqADoBdOLvjYww#slide=id.g4e8950cc98_0_256">CM 4 Slides</a><br>
    
    <p>- <a href="profile.php?user_id=4943">Tiffany Ho (PVL)</a></p>
    </div>
    
    <div class="newsItem">
        <h2>Biweekly Service Newsletter</h2>
        <p class="date">March 3, 2019 at 10:49pm</p>
        <p>
            The SVP brings to you the biweekly SERVICE NEWSLETTER!
<br><br>
Before we get into the upcoming events, I would just like to encourage you all to sign up for our two major APO-INITIATED EVENTS, which will occur in April:<br><br>

• April 13: <a href="http://tinyurl.com/yyr3fsof" target="_blank">SPRING YOUTH SERVICE DAY (SYSD): </a><br>
A super chill and fun Kids Zone event where you’ll be managing a booth and helping kids enjoy Cal Day 😊<br>
<br>
            • April 26: <a href="http://tinyurl.com/yxgjzh38" target="_blank">COLLEGE DAY:</a><br>
We’ll be showing high school kids from Oakland what college life is like, give them a tour of the Cal campus, and have a panel of guest speakers (you may be one of them!) to give them some guidance on their academic journey<br>
<br>
UPCOMING OPEN SERVICE EVENTS:<br>
<br>
            • Mar 6: <a href="http://tinyurl.com/y6o6c7h9" target="_blank">iPhoneography, a Free Photo Berkeley Workshop: </a><br>
Learn to take bomb pics with your phone 😉<br>
<br>
            • Mar 9: <a href="http://tinyurl.com/yxtjrh6f" target="_blank">Engineering for Kids Day: </a><br>
Help kids have a fun day learning about science and engineering!<br>
<br>
            • Mar 10: <a href="http://tinyurl.com/y4a9nu7u" target="_blank">Community Photoshoot hosted by FPB: </a><br>
Putting our photography skillz to practice photographing ASUC Senator Khan's office<br>
<br>
            • Mar 16: Suicide Prevention Walk:</a><br>
Come volunteer, support and cheer on the people walking for this cause 😊<br>
<br>
• Mar 17: <a href="http://tinyurl.com/yyrh64ce" target="_blank">Jewish Contemporary Museum: </a><br>
It'll be like an adventure disguised as service<br>
<br>
• Mar 20: <a href="http://tinyurl.com/y6pl3sxu" target="_blank">Blood Drive: </a><br>
Help make blood donations as smooth and safe as possible<br>
I will also put up calendar events to help table (promote) for this event<br>
<br>
• Mar 22: <a href="http://tinyurl.com/yybvfk8r" target="_blank">IC/GG Service: </a><br>
Do a chill service activity with your IC bros!<br>
<br>
• Mar 22-24: <a href="http://tinyurl.com/yxh4mm4c" target="_blank">Chinese Martial Arts Tournament (CMAT) 27: </a><br>
Help make this tournament as awesome as it can be!<br>
<br>
• Mar 30: <a href="http://tinyurl.com/y3madde6" target="_blank">San Francisco Zoo:</a> <br>
Volunteering at the zoo? Sounds like an adventure for animals!<br>
<br>
SOME TIPS ABOUT DOING SERVICE:<br>
<br>
• Take goddamn pictures and videos and upload them to SmugMug! Even if you’re not by yourself! It helps everyone to see pictures of events that they haven’t attended, as it’s the one way that we can encourage each other to attend unfamiliar service events.<br>
<br>
• Consider adopting a recurring service event to attend to! You will learn so much from going to an event regularly and interacting with the organizers and other volunteers there.<br>
<br>
• Do not be discouraged by slow/boring service events! In these moments, try to be proactive and look for ways to be helpful. Doing service oftentimes involves a lot of waiting around, patience, and mundane tasks, but don’t let that deter you from giving your time selflessly to others 😊<br>
<br>
Enjoy!!
        </p>
    
    <p>- <a href="profile.php?user_id=4792">Michelle Chang (RT)</a></p>
    </div>
    
    <div class="newsItem">
        <h2>CM 3 Recap</h2>
        <p class="date">February 15, 2019 at 10:49pm</p>

            <a href="https://docs.google.com/presentation/d/1pPuxW_C5XxYEulUcZFHjM1sJ_ptwEkJbIlqR86ClCgc/edit#slide=id.g4ef1cfe739_7_0" target="_blank">CM 3 Slides</a><br>
            <a href="https://tinyurl.com/apowebsite" target="_blank">Website Maintainance Form</a><br>
            <a href="https://tinyurl.com/s19stylus" target="_blank">Stylus Suggestion Form</a><br>
            <a href="https://goo.gl/forms/seK1QqmjdrW5p6Is2" target="_blank">Service Feedback Form</a><br>
            <a href="https://goo.gl/forms/1ZB1yodHOUJkqjVC2" target="_blank">GG Event Suggestion Form</a><br>
            <a href="https://goo.gl/forms/2xlq1GABhboIfbGE2" target="_blank">Join Hotspot Committee Form</a><br>
    
    <p>- <a href="profile.php?user_id=4943">Tiffany Ho (PVL)</a></p>
    </div>
     <div class="newsItem">
        <br/>
        <h2>Congrats to the Spring 2019 Executive Committee!</h2>
        <p class="date">February 2, 2019</p>
        <div class="collage-container">
            <div class="collage-pictures">
                <div class="person-picture">
                    <a href="profile.php?user_id=4622"><img src="images/excomm_sp19/shengmin.jpg"  onmouseover="this.src='images/excomm_sp19/shengmin2.jpg'" onmouseout="this.src='images/excomm_sp19/shengmin.jpg'"></img></a>
                    <p class="center"><strong>President</strong>: <br><a href="profile.php?user_id=4622">Shengmin Xiao</a></p>
                </div>

                <div class="person-picture">
                    <a href="profile.php?user_id=4792"><img src="images/excomm_sp19/michelle.jpg"  onmouseover="this.src='images/excomm_sp19/michelle2.jpg'" onmouseout="this.src='images/excomm_sp19/michelle.jpg'"></img></a>
                    <p class="center"><strong>Service VP</strong>: <br><a href="profile.php?user_id=4792">Michelle Chang</a></p>
                </div>

                <div class="person-picture">
                    <a href="profile.php?user_id=4781"><img src="images/excomm_sp19/malaya.jpg"  onmouseover="this.src='images/excomm_sp19/malaya2.jpg'" onmouseout="this.src='images/excomm_sp19/malaya.jpg'"></img></a>
                    <p class="center"><strong>Pledgemaster</strong>: <br><a href="profile.php?user_id=4781">Malaya Neri</a></p>
                </div>

                <div class="person-picture">
                    <a href="profile.php?user_id=4697"><img src="images/excomm_sp19/valerie.jpg"  onmouseover="this.src='images/excomm_sp19/valerie2.jpg'" onmouseout="this.src='images/excomm_sp19/valerie.jpg'"></img></a>
                    <p class="center"><strong>Administrative VP</strong>: <br><a href="profile.php?user_id=4697">Valerie Hsieh</a></p>
                </div>

                <div class="person-picture">
                    <a href="profile.php?user_id=4688"><img src="images/excomm_sp19/lara.jpg" onmouseover="this.src='images/excomm_sp19/lara2.jpg'" onmouseout="this.src='images/excomm_sp19/lara.jpg'"></img></a>
                    <p class="center"><strong>Membership VP</strong>: <br><a href="profile.php?user_id=4688">Lara Yedikian</a></p>
                </div>

                <div class="person-picture">
                    <a href="profile.php?user_id=4798"><img src="images/excomm_sp19/jose.jpg" onmouseover="this.src='images/excomm_sp19/jose2.png'" onmouseout="this.src='images/excomm_sp19/jose.jpg'"></img></a>
                    <p class="center"><strong>Finance VP</strong>: <br><a href="profile.php?user_id=4798">Jose Reyes-Hernandez</a></p>
                </div>

                <div class="person-picture">
                    <a href="profile.php?user_id=4782"><img src="images/excomm_sp19/matt.jpg"  onmouseover="this.src='images/excomm_sp19/matt2.jpg'" onmouseout="this.src='images/excomm_sp19/matt.jpg'"></img></a>
                    <p class="center"><strong>Fellowship VP</strong>: <br><a href="profile.php?user_id=4782">Matt Chinn</a></p>
                </div>

                <div class="person-picture">
                    <a href="profile.php?user_id=4804"><img src="images/excomm_sp19/ralen.jpg"  onmouseover="this.src='images/excomm_sp19/ralen2.jpg'" onmouseout="this.src='images/excomm_sp19/ralen.jpg'"></img></a>
                    <p class="center"><strong>Historian</strong>: <br><a href="profile.php?user_id=4804">Ralen Van Domelen</a></p>
                </div>
            </div>
            <div style="clear: left;"></div>
        </div>
    </div>
    
    <div class="newsItem">
        <br/>
        <h2>Congrats to the Spring 2019 Pledge Committee!</h2>
        <p class="date">February 2, 2019</p>
        <div class="collage-container">
            <div class="collage-pictures">
                <div class="person-picture">
                    <a href="profile.php?user_id=4789"><img src="images/pcomm_sp19/hang.jpg" onmouseover="this.src='images/pcomm_sp19/hang2.png'" onmouseout="this.src='images/pcomm_sp19/hang.jpg'"></img></a>
                    <p class="center"><strong>Leadership Trainer</strong>: <br><a href="profile.php?user_id=4789">Hang Mai</a></p>
                </div>

                <div class="person-picture">
                    <a href="profile.php?user_id=4804"><img src="images/pcomm_sp19/ralen.jpg"   onmouseover="this.src='images/pcomm_sp19/ralen2.jpg'" onmouseout="this.src='images/pcomm_sp19/ralen.jpg'"></img></a>
                    <p class="center"><strong>Administrative Trainer</strong>: <br><a href="profile.php?user_id=4804">Ralen Van Domelen</a></p>
                </div>

                <div class="person-picture">
                    <a href="profile.php?user_id=4919"><img src="images/pcomm_sp19/chloe.jpg" onmouseover="this.src='images/pcomm_sp19/chloe2.jpg'" onmouseout="this.src='images/pcomm_sp19/chloe.jpg'"></img></a>
                    <p class="center"><strong>Fellowship Trainer</strong>: <br><a href="profile.php?user_id=4919">Chloe Coultrip</a></p>
                </div>

                <div class="person-picture">
                    <a href="profile.php?user_id=4753"><img src="images/pcomm_sp19/alex.jpg"  onmouseover="this.src='images/pcomm_sp19/alex2.jpg'" onmouseout="this.src='images/pcomm_sp19/alex.jpg'"></img></a>
                    <p class="center"><strong>Fellowship Trainer</strong>: <br><a href="profile.php?user_id=4753">Alex Liu</a></p>
                </div>

                <div class="person-picture">
                    <a href="profile.php?user_id=4921"><img src="images/pcomm_sp19/alissa.jpg"  onmouseover="this.src='images/pcomm_sp19/alissa2.jpg'" onmouseout="this.src='images/pcomm_sp19/alissa.jpg'"></img></a>
                    <p class="center"><strong>Finance Trainer</strong>: <br><a href="profile.php?user_id=4921">Alissa Byun</a></p>
                </div>

                <div class="person-picture">
                    <a href="profile.php?user_id=4788"><img src="images/pcomm_sp19/michael.jpg" onmouseover="this.src='images/pcomm_sp19/michael2.jpg'" onmouseout="this.src='images/pcomm_sp19/michael.jpg'"></img></a>
                    <p class="center"><strong>Finance Trainer</strong>: <br><a href="profile.php?user_id=4788">Michael Tang</a></p>
                </div>

                <div class="person-picture">
                    <a href="profile.php?user_id=4807"><img src="images/pcomm_sp19/melanie.jpg"  onmouseover="this.src='images/pcomm_sp19/melanie2.jpg'" onmouseout="this.src='images/pcomm_sp19/melanie.jpg'"></img></a>
                    <p class="center"><strong>Service Trainer</strong>: <br><a href="profile.php?user_id=4807">Melanie Gee</a></p>
                </div>
                
                <div class="person-picture">
                    <a href="profile.php?user_id=4808"><img src="images/pcomm_sp19/gary.jpg"  onmouseover="this.src='images/pcomm_sp19/gary2.jpg'" onmouseout="this.src='images/pcomm_sp19/gary.jpg'"></img></a>
                    <p class="center"><strong>Service Trainer</strong>: <br><a href="profile.php?user_id=4808">Gary Zhu</a></p>
                </div>

                <div class="person-picture">
                    <a href="profile.php?user_id=4686"><img src="images/pcomm_sp19/christina.jpg"  onmouseover="this.src='images/pcomm_sp19/christina2.jpg'" onmouseout="this.src='images/pcomm_sp19/christina.jpg'"></img></a>
                    <p class="center"><strong>Historian Trainer</strong>: <br><a href="profile.php?user_id=4686">Christina Liu</a></p>
                </div>
            </div>
            <div style="clear: left;"></div>
        </div>
    </div>
    
    <div class="newsItem">
        <br/>
        <h2>Congrats to the Spring 2019 Dynasty Committee!</h2>
        <p class="date">February 2, 2019</p>
        <div class="collage-container">
            <div class="collage-pictures">
                <div class="person-picture">
                    <a href="profile.php?user_id=4609"><img src="images/dcomm_sp19/eric.jpg" onmouseover="this.src='images/dcomm_sp19/eric2.jpg'" onmouseout="this.src='images/dcomm_sp19/eric.jpg'"></img></a>
                    <p class="center"><strong>Alpha Dynasty Director</strong>: <br><a href="profile.php?user_id=4609">Eric Liu</a></p>
                </div>

                <div class="person-picture">
                    <a href="profile.php?user_id=4805"><img src="images/dcomm_sp19/sabrina.jpg"  onmouseover="this.src='images/dcomm_sp19/sabrina2.jpg'" onmouseout="this.src='images/dcomm_sp19/sabrina.jpg'"></img></a>
                    <p class="center"><strong>Phi Dynasty Director</strong>: <br><a href="profile.php?user_id=4805">Sabrina Chua</a></p>
                </div>

                <div class="person-picture">
                    <a href="profile.php?user_id=4691"><img src="images/dcomm_sp19/pearl.jpg"  onmouseover="this.src='images/dcomm_sp19/pearl2.jpg'" onmouseout="this.src='images/dcomm_sp19/pearl.jpg'"></img></a>
                    <p class="center"><strong>Omega Dynasty Director</strong>: <br><a href="profile.php?user_id=4691">Pearl Yang</a></p>
                </div>

                <div class="person-picture">
                    <a href="profile.php?user_id=4803"><img src="images/dcomm_sp19/samantha.jpg" onmouseover="this.src='images/dcomm_sp19/samantha2.jpg'" onmouseout="this.src='images/dcomm_sp19/samantha.jpg'"></img></a>
                    <p class="center"><strong>Alpha Dynasty Director</strong>: <br><a href="profile.php?user_id=4803">Samantha Wang</a></p>
                </div>

                <div class="person-picture">
                    <a href="profile.php?user_id=4794"><img src="images/dcomm_sp19/kevinm.jpg"  onmouseover="this.src='images/dcomm_sp19/kevinm2.jpg'" onmouseout="this.src='images/dcomm_sp19/kevinm.jpg'"></img></a>
                    <p class="center"><strong>Phi Dynasty Director</strong>: <br><a href="profile.php?user_id=4794">Kevin Ma</a></p>
                </div>

                <div class="person-picture">
                    <a href="profile.php?user_id=4795"><img src="images/dcomm_sp19/kevinc.jpg"  onmouseover="this.src='images/dcomm_sp19/kevinc2.jpg'" onmouseout="this.src='images/dcomm_sp19/kevinc.jpg'"></img></a>
                    <p class="center"><strong>Omega Dynasty Director</strong>: <br><a href="profile.php?user_id=4795">Kevin Chuang</a></p>
                </div>
            </div>
            <div style="clear: left;"></div>
        </div>
    </div>
     
      <?php if (!$g_user->is_pledge()): ?>
    
      <div class="newsItem">
            <h2>Proposed Amendment</h2>
            <p class="date">February 6, 2018 at 10:49pm</p>
            <p>
                Section 4.5 (Open Meetings) of the bylaws to be changed from: <br><br>
                "All Chapter meetings shall be open to all members of the chapter. 
                Exceptions may be made when certain aspects of the pledge program are being discussed."
                <br><br> to include the highlighted: <br><br>
                "All Chapter meetings shall be open to all members of the chapter.
                <b style="background-color: Yellow"> Any person from outside the chapter may only attend if given an invitation by the chair.</b>
                Exceptions may be made when certain aspects of the pledge program are being discussed."
            </p>
        </div>   
    <?php endif ?>
      <div class="newsItem">
        <h2>CM 2 Recap</h2>
        <p class="date">February 6, 2018 at 10:49pm</p>

            <a href="https://docs.google.com/presentation/d/1kk0rhXaQqbnD4M5HayIK5Q753mov665nI2D9XBOExv8/edit#slide=id.p" target="_blank">CM 2 Slides</a><br>
    
    <p>- <a href="profile.php?user_id=4943">Tiffany Ho (PVL)</a></p>
    </div>
       <div class="newsItem">
            <h2>Award Information</h2>
            <p class="date">January 28, 2018 at 10:49pm</p>
            <table style="width: 100%;">
              <caption><h3>Presidential Service Awards</h3></caption>
              <tr>
                <td><h4 style="color: #cd7f32">Bronze Award: </h4></td>
                <td>100 hours</td>
              </tr>
              <tr>
                <td><h4 style="color: #939393">Silver Award: </h4></td>
                <td>175 hours</td>
                </tr>
            <tr>
                <td><h4 style="color: #DAA520;">Gold Award: </h4></td>
                <td>250 hours</td>
            </tr>
            </table>
            <table style="width: 100%;">
              <caption><h3>
                  General Awards Requirements <br>
              </h3></caption>
              <tr>
                <th>General Leadership</th>
                <th>General Friendship</th>
                <th>General Service</th>
              </tr>
              <tr>
                  <td style="vertical-align: text-bottom">
                      <ul style="list-style-type:disc";>
                          <li>Chair 5 fellowships/service</li>
                          <li>At least 1 chairing position</li>
                          <li>At least 1 of 3:
                              <ul style="list-style-type:circle; padding-left: 10px;">
                                <li>LEADS</li>
                                <li>Leadership Workshop</li>
                                <li>Sectionals/Nationals</li>
                              </ul> 
                          </li>
                      </ul>
                  </td>
                  <td style="vertical-align: text-bottom">
                  <ul style="list-style-type:disc;";>
                      <li>Chair at least 3 fellowships</li>
                      <li>Attend at least 20 fellowships</li>
                      <li>Attend 1 IC or GG Fellowship</li>
                  </ul>
                   </td>
                  <td style="vertical-align: text-bottom">
                  <ul style="list-style-type:disc";>
                      <li>Chair at least 3 service projects</li>
                      <li>At least 40 hours of service</li>
                      <li>4 C's or chapter initiated event</li>
                  </ul></td>
              </tr>
            </table>
            
            <table style="width: 100%;">
              <caption><h3>Maniac Awards (no application required)</h3></caption>
              <tr>
                <th>Interchapter Maniac</th>
                <th>Driving Maniac</th>
              </tr>
              <tr>
                <td>Awarded to 2 brothers who attended the most ic events</td>
                <td>Awarded to 3 brothers who drive the most for the chapter</td>
              </tr>
            </table>
        </div>   
    
    
    <div class="newsItem">
        <h2>CM 1 Recap</h2>
        <p class="date">January 23, 2018 at 9:26am</p>

    Welcome back actives! 


        <br><br>

        <p style="margin-bottom: 1em;">CM1 Recap:<br>
            <a href="https://docs.google.com/presentation/d/1OZVChKEq2kEQ_zy6Dx_gJ8EIDG9oRGUy0YdojF0lFPM/edit?fbclid=IwAR1JudikQRpfBD_SGaEpyMCKiKAw--eTfJHU7qZB_rEoU8JDGKvj4kMb_uU#slide=id.g4e3a01238a_1_104" target="_blank">CM 1 Slides</a><br>
            <a href="https://docs.google.com/spreadsheets/d/1nGL7EFeRhQ29fJM0GRoQS_ZgHgY5GZs2rRDUNLiIRaI/edit?usp=sharing" target="_blank">Spring 2019 Budget</a><br>
 			<a href="https://docs.google.com/spreadsheets/d/1UHi-jXJE81ivCynymgVezzy69_cPS-x5Jxgfaf0HBPE/edit?fbclid=IwAR3t5rzV3nPVztEY26uZq-PVHI5C4jeQDt8J8mHnx6MR-MNr_xy8TiIXWEQ#gid=1589878783" target="_blank">Spring Excomm Chairing Positions</a><br>


            <p>- <a href="profile.php?user_id=4944">Thomas Lu (PVL)</a></p>
        </p>
    </div>
<?php endif ?>



<div class="newsItem">
        <h2>Welcome Gamma Gamma!</h2>
        <p style="margin-bottom: 1em">

    <br>
    Since winter break is now over, it's about time to get back into the APO mentality. Just remember that we're all students first and need to prioritize school, and to focus on quality service over quantity. Good luck this semester!
    <br> 
    <br>
    <a href="https://goo.gl/forms/zMPfMIbR9e5Nyfgu2" target="_blank">Website Suggestion Form</a><br>
    
    <p>- <a href="profile.php?user_id=4697">Valerie Hsieh</a></p>
</div>

<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
    <a href="news_fa18.php">Older News ></a>
<?php endif ?>

<?php
$template->print_body_footer();
$template->print_disclaimer();
?>

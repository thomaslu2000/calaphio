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

 <div class="newsItem">
        <br/>
        <h2>Congratulations to the Spring 2016 Executive Committee!</h2>
        <p class="date">Wednesday November 18, 2015</p>
        <div class="collage-container">
            <div class="collage-pictures">
                <div class="person-picture">
                    <img src="/images/excomm16/virgil.jpg"></img>
                    <p class="center"><strong>President</strong>: <a href="profile.php?user_id=2873">Virgil Tang</a></p>
                </div>

                <div class="person-picture">
                    <img src="/images/excomm16/hannah.jpg"></img>
                    <p class="center"><strong>Service VP</strong>: <a href="profile.php?user_id=2920">Hannah Schnell</a></p>
                </div>

                <div class="person-picture">
                    <img src="/images/excomm16/karen.jpg"></img>
                    <p class="center"><strong>Pledgemaster</strong>: <a href="profile.php?user_id=1623">Karen Wu</a></p>
                </div>

                <div class="person-picture">
                    <img src="/images/excomm16/trinh.jpg"></img>
                    <p class="center"><strong>Admin VP</strong>: <a href="profile.php?user_id=2859">Trinh Huynh</a></p>
                </div>

                <div class="person-picture">
                    <img src="/images/excomm16/bella.jpg"></img>
                    <p class="center"><strong>Membership VP</strong>: <a href="profile.php?user_id=2073">Bella Tsay</a></p>
                </div>

                <div class="person-picture">
                    <img src="/images/excomm16/marilyn.jpg"></img>
                    <p class="center"><strong>Finance VP</strong>: <a href="profile.php?user_id=2929">Marilyn Chan</a></p>
                </div>

                <div class="person-picture">
                    <img src="/images/excomm16/joseph.jpg"></img>
                    <p class="center"><strong>Fellowship VP</strong>: <a href="profile.php?user_id=2175">Joseph Gapuz</a></p>
                </div>

                <div class="person-picture">
                    <img src="/images/excomm16/ryan.jpg"></img>
                    <p class="center"><strong>Historian</strong>: <a href="profile.php?user_id=2993">Ryan Yen</a></p>
                </div>

            </div>
            <div style="clear: left;"></div>
        </div>

        <p>-<a href="profile.php?user_id=2192">Audrey Tsai (CM)</a></p>
    </div>


<?php if ($g_user->is_logged_in()): ?>
<div class="newsItem">
        <h2> ELECTION PLATFORMS </h2>
        <p class="date">Monday, November 16, 2015</p>
        <p style="margin-bottom: 1em">

    <br> Hello everyone! Elections is coming up tomorow. Please take the time to read the platforms of your fellow 
    candidates in preparation. </br> 
    <br> 
    <a href="https://docs.google.com/document/d/1ChhGHX3hmeYQIpeepbybwjhy1gHcnC86nA9OJG4nsE8/edit?usp=sharing" target="_blank"> President Platform Elise Hayashi </a> </a><br>
    <a href="https://docs.google.com/document/d/1gSbOlB4OYj0Sie3V4t3YzhaP4AFQVzfSn4lp6GR2PdI/edit" target="_blank"> President Platform Ellie Hung</a> </a><br>
    <a href="https://docs.google.com/document/d/1PA63S07j-WmEDvxoEQlDhPPckkbPom-l3i9CaVwrjnc/edit?usp=sharing" target="_blank"> President Platform Virgil Tang </a> </a><br>
    <a href="https://docs.google.com/document/d/1yWrqy5R2v_M3w3eE3Pvpb1xUOK33uPijkMnG1C_vHjE/edit?usp=sharing" target="_blank"> Pledgemaster Platform Kirk Chiu </a> </a><br>
    <a href="https://docs.google.com/document/d/1hW1e3AInAKSgwQg3mfF5b7wfpHI4PO5kXSDpHq5iLCg/edit" target="_blank"> Pledgemaster Platform Justin Fang </a> </a><br>
    <a href="https://docs.google.com/document/d/1PwSw_NaL9EIHukSfBIIr_BFG450DvJd1zHIqVIwO-jI/edit" target="_blank"> Pledgemaster Platform Joseph Gapuz </a> </a><br>
    <a href="https://docs.google.com/document/d/1hXmP1ZXWBl-XVhbchMclh07kJHrfXFiyg7aTQ1Y7fTA/edit?ts=564b7b38" target="_blank"> Pledgemaster Platform Karen Wu </a> </a><br>
    <a href="https://docs.google.com/document/d/1F0bBHQR1PO1xQAt-Avc4TY23aCECDK-YRl_K0OP1iWU/edit?usp=sharing" target="_blank"> Membership Platform Bella Tsay </a> </a><br>
     <a href="https://docs.google.com/document/d/10UoThBWXdv_YPDlq7F7BSbBPSCdoCRcqTsz1Ln77swc/edit" target="_blank"> Service Platform Hannah Schnell </a> </a><br>




    <br> Also, remember to sign up for <a href="https://docs.google.com/a/berkeley.edu/forms/d/1Pt65BzEwwuiQ_8qCQIxsfD_d3y80EPGsZv9q2j4K_Ko/viewform" target="_blank"> Talent Show </a> this Thursday, November 19th!<br>
    <p>-<a href="profile.php?user_id=2192">Audrey Tsai (CM)</a></p>
<div> 
<?php endif ?>


<?php if ($g_user->is_logged_in()): ?>
<div class="newsItem">
        <h2> CM 6 Recap </h2>
        <p class="date">Thursday, November 12, 2015</p>
        <p style="margin-bottom: 1em">

    <br> 
    <br> ANNOUNCEMENTS: <br> 

        <br>
        <br> - Banquet tickets are on sale for $50 till CM 7, November 17th </a><br>
        <br> - Upload files and access chapter <a href="https://drive.google.com/folderview?id=0B1PYMBbhnLMsNms3Uk4wcFQxLTQ&usp=drive_web" target="_blank"> Test Bank</a> </a><br>
        <br> - Elections is coming up! If you are interested in running, please send your platform to me at admin-vp@calaphio.com and forward Karen Wu at president@calaphio.com. You may view 
        <a href="https://docs.google.com/spreadsheets/d/15LmMG3J9SihdrVF3DMralnU9RwHOh2j8B7PYOXxJv7Y/edit?usp=sharing" target="_blank"> Nominations </a> here.  </a><br>
 
    <p style="margin-bottom: 1em"> 
        <br><br> <a href="https://docs.google.com/presentation/d/1BT_GyPrF2KYPGkCTmxXnBMPaOTr6LqAWopH3xHb5HDY/edit?usp=sharing" target="_blank"> CM 6 Slides</a><br>  
        <iframe width="560" height="315" src="https://www.youtube.com/embed/UPisONg_h3g" frameborder="0" allowfullscreen></iframe> 
    <p>-<a href="profile.php?user_id=2192">Audrey Tsai (CM)</a></p>
<div> 
<?php endif ?>



<?php if ($g_user->is_logged_in()): ?>
<div class="newsItem">
        <h2> CM Recap </h2>
        <p class="date">Wednesday, October 28, 2015</p>
        <p style="margin-bottom: 1em">

    <br> 
    <br> ANNOUNCEMENTS: <br> 

        <br>
        <br> - Sign up for Fall Fellowship November 14, 2015 by November 2nd for $35. <br>
        <br> - Banquet tickets are on sale for $40 till CM 6, November 3rd </a><br>
        <br> - Upload files and access chapter <a href="https://drive.google.com/folderview?id=0B1PYMBbhnLMsNms3Uk4wcFQxLTQ&usp=drive_web" target="_blank"> Test Bank</a> </a><br>
        <br>

    <p style="margin-bottom: 1em"> 
        <div align = center><iframe width="560" height="315" src="https://www.youtube.com/embed/CDV8t3Q97H8" frameborder="0" allowfullscreen></iframe> </div> 
        <br><br> <a href="https://docs.google.com/a/calaphio.com/presentation/d/1p67KeUHzZKx2Ssdp6HIPlkbFWd6ZdXgdXk5JWcDysFU/edit?usp=sharing" target="_blank">CM 5 Slides</a><br>  
        <br><br> <a href="https://docs.google.com/a/calaphio.com/presentation/d/1YvHsGyyNAhszoot74Kc2oJ6rQzQCQFv1c_3GPcMsrR4/edit?usp=sharing" target="_blank">CM 4 Slides</a><br>  
    <p>-<a href="profile.php?user_id=2192">Audrey Tsai (CM)</a></p>
<div> 
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
<div class="newsItem">
        <h2> CM 3 Recap </h2>
        <p class="date">Monday, September 28, 2015</p>
        <p style="margin-bottom: 1em">

    <br> 
    <br> ANNOUNCEMENTS: <br> 

        <br>
        <br> - Sign up for Fall Fellowship November 14, 2015 by October 18 for $30. Prices will rise after this date, so get your ticket now! <br>
        <br> - Participate in APO Leads Launch course October 14 - 15 by registering on the calendar. <br>
        <br> - If you haven't done so already, please fill out your <a href= "tinyurl.com/f15standing"> Fall 2015 Standing. </a><br>
        <br> - These chairing positions are still recruiting and want you! <br> 
            <br><br> Spirit Chair (1) 
            <br><br> Fundraiser Chairs (3)
            <br><br> Alumni / Professional Development Chairs (2)
            <br><br> Photography Chairs (2)
            <br><br> Workshop Chair (1) 
            <br><br>
        <br><p style = "font-weight: bold">  Finally, SIGN UP FOR SERVICE! :) </p><br>
        <br>

    <p style="margin-bottom: 1em"> 
        <div align = center> <iframe width="640" height="360" src="https://www.youtube.com/embed/hrQP2WaZ6OY" frameborder="0" allowfullscreen></iframe> </div> 
        <br><br> <a href="https://docs.google.com/a/calaphio.com/presentation/d/1v4m_gpe0IGZQg1sSp-04KkIOIZOYnMOr6cV6b-t5s9E/edit?usp=sharing" target="_blank">CM 3 Slides</a><br>  
    <p>-<a href="profile.php?user_id=2192">Audrey Tsai (CM)</a></p>
<div> 
<?php endif ?>



<?php if ($g_user->is_logged_in()): ?>
<div class="newsItem">
        <h2> CM 2 Recap </h2>
        <p class="date">Wednesday, September 16, 2015</p>
        <p style="margin-bottom: 1em">

    <br> 
    <br> Announcements: <br> 

        <br>
        <br> - Rush LFS Week continues till Friday, so make sure you attend as many rush events as you can! 
            You must make at least 1 LFS event to make your rush requirement. <br> 
        <br> - Help out with interviews on Sunday 9/20 from 10:30am-12:30pm at the Moffit Basements; please dress in business casual.<br>
        <br> - Please fill out your <a href= "tinyurl.com/f15standing"> Fall 2015 Standing </a> by CM 3. <br>
        <br> - Sign up for Fall Fellowship by 9/20/15 for the early bird special fee of $25.<br>
        <br> - Sign up for <a href="http://tinyurl.com/AMPF2k15 "> the Alumni Mentorship Program </a> by Thursday 9/17, 11:59PM <br>
        <br> - These chairing positions are still recruiting and want you! <br> 
            <br><br><p style="font-style: italic">  Family System Chair (1)
            <br><br> Spirit Chair (1) 
            <br><br> Roll Call Chair (1)
            <br><br> Fundraiser Chairs (3)
            <br><br> Alumni / Professional Development Chairs (2)
            <br><br> Photography Chairs (2)
            <br><br> Workshop Chair (1) </p> 
            <br><br>
        <br> Finally, remember to sign up for service! <br>
        <br>

    <p style="margin-bottom: 1em"> 
        <div align = center> <iframe width="640" height="360" src="https://www.youtube.com/embed/gRLcnc5ivgM" frameborder="0" allowfullscreen></iframe></div> 
        <br><br> <a href="https://docs.google.com/a/calaphio.com/presentation/d/1QMGtWYohj51K8qZzUo8edyfuKoHWI8-aKw_Iuf_uEF0/edit?usp=sharing" target="_blank">CM 2 Notes</a><br>  
    <p>-<a href="profile.php?user_id=2192">Audrey Tsai (CM)</a></p>
<div> 
<?php endif ?>



<?php if ($g_user->is_logged_in()): ?>
<div class="newsItem">
        <h2> Welcome Back to School, Gamma Gamma!</h2>
        <p class="date">Thursday, September 3, 2015</p>
        <p style="margin-bottom: 1em">

    <br> Alpha Phi Omega welcomes you back to school! We hope everyone is having a wonderful start
    to this new school year. Here are a couple reminders for the next two weeks: <br> 

    <br>Rush Week begins next week, so sign up on the calendar for rush events! This semester's rush requirements includes attending 1 Info Night, Meet the Chapter, and
    1 rush event of your choice. Don't forget your APO gear and smiles! <br>

    <br> If you are still looking for a chair position, these positions are still open: 
    <br><br><p style="font-style: italic">  Family System Chair (1)
    <br><br> Spirit Chair (1) 
    <br><br> Roll Call Chair (1)
    <br><br> Service Project Chairs (1-2)
    <br><br> Fundraiser Chairs (3)
    <br><br> Alumni / Professional Development Chairs (3)
    <br><br> Scrapbook Chair (1)
    <br><br> Photography Chairs (3)
    <br><br> Workshop Chair (1) </p> 
    <br><br>

     <p style="margin-bottom: 1em">Happy Thursday, and see your lovely faces around! CM 1 Notes are linked below!
        <br><br> <a href="https://docs.google.com/presentation/d/1A_zBaknYbJV1-uU1R8fHVBL8gGrLd1Yhf0AT8SlP3ss/edit#slide=id.g65a9917d1_4_130" target="_blank">CM 1 Slides</a><br>          
        <div align = center> <iframe width="480" height="360" src="https://www.youtube.com/embed/BeOC_O23zNg" frameborder="0" allowfullscreen></iframe></div> 
    
    <p>-<a href="profile.php?user_id=2192">Audrey Tsai (CM)</a></p>
</div>
<?php endif ?>

<div class="newsItem">
        <h2> Welcome Brothers of Gamma Gamma!</h2>
        <p style="margin-bottom: 1em">

    <br> Alpha Phi Omega welcomes you back to school! Here's to another new year of service, friendship, 
    and leadership! Alpha Phi Omega encourages you to find the opportunities that interest you, and take advantage
    of our network and community. </br> 
    
    <p>-<a href="profile.php?user_id=2192">Audrey Tsai (CM)</a></p>
</div>





<a href="news_sp15.php">Older News ></a>
<?php
$template->print_body_footer();
$template->print_disclaimer();
?>
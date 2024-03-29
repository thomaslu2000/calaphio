<?php
require("include/includes.php");
require("include/Calendar.class.php");
require("include/Template.class.php");
// require("include/Shoutbox.class.php");
require("include/EvalNag.class.php");
require("include/GGManiacNag.class.php");
Template::print_head(array("site.css", "calendar.css", "excel.css"));
Template::print_body_header('Home', 'NEWS');

$evalnag = new EvalNag();
echo $evalnag->display("2007-01-01");

$gg_maniac_nag = new GGManiacNag();
echo $gg_maniac_nag->display();

// $shoutbox = new Shoutbox();
// $shoutbox->process();
// echo $shoutbox->display();

Calendar::print_upcoming_events(5);

$g_user->process_mailer(false);
$g_user->print_mailer(false);
$g_user->print_personal_messages();

if (!$g_user->is_logged_in()) {
    echo '<img style="float: right" src="images/lfs_banner.png" alt="LFS" />';
}

?>
<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
<div class="newsItem">
    <h2>Congratulations to Pooja Shah for getting GG Maniac!</h2>
    <p class="date">May 2nd 2014</p>
    <img src="/documents/sp14/ggmaniac/ggmaniac7.jpg" width=300 style="border:1px solid black"/></a><br><br>
    <p style="margin-bottom: 1.5em">Ever since pledging during her KK semester, Pooja has been actively involved in Gamma Gamma's activities. Each semester, she takes on 
        many chairing positions to contribute to the chapter. This semester she was IC poker chair and she is going to be on PCOMM next semester! Please give her your
        congratulations when you see her!</p>
    <p>-<a href="/profile.php?user_id=1584">Ngoc Tran (MH)</a></p>
</div>
<?php endif ?>

<?php if($g_user->is_logged_in() && !$g_user->is_pledge()): ?>    
<div class="newsItem">
    <h2>Notes From CM 8</h2>
    <p class="date">May 2nd, 2014</p>
    <p style="margin-bottom: 1em">Here are the documents from CM8!<br>
        Excomm Powerpoint Slides:<a href="https://docs.google.com/presentation/d/1g3tp6tvR2OmwseZU3zZJrr9AqFcbF3S1GMs12PH_59U/edit?usp=sharing"> CM8 Slides</a><br>
    </p>
    <p style="margin-bottom: 1em">Here are the <a href="https://word.office.live.com/wv/WordView.aspx?FBsrc=https%3A%2F%2Fwww.facebook.com%2Fdownload%2Ffile_preview.php%3Fid%3D636812013067682%26time%3D1399704628%26metadata&access_token=100002340245060%3AAVI823PRXGeVx51Ujh6VXTBK6PCvlBW3T27fZBLAE5hNzQ&title=CM8+Minutes.docx">CM 8 Minutes</a></p>

    <iframe width="420" height="315" src="//www.youtube.com/embed/-sREi4mbeEA" frameborder="0" allowfullscreen></iframe>
    <p>-<a href="/profile.php?user_id=1584">Ngoc Tran (MH)</a></p>
</div>
<?php endif ?>

<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
<div class="newsItem">
    <h2>Notes From CM 7</h2>
    <p class="date">April 15, 2014</p>
    <p style="margin-bottom: 1em">Here are the documents from CM7!<br>
        Excomm Powerpoint Slides:<a href="https://docs.google.com/presentation/d/1lBT8n2tdE_5DRN0gOq38pEqEm1unRXKJ2wyKFVVXvjo/edit?usp=sharing"> CM7 Slides</a><br>
    </p>
    <p style="margin-bottom: 1em">Here are the <a href="https://drive.google.com/file/d/0B2qOHCQXVkc3LUdhLWgzX2NINFk/edit?usp=sharing">CM 7 Minutes</a></p>
    <p style="margin-bottom: em"> Here is our wonderful <a href="">CM 7 STYLUS! </a> Read it and enjoy a great laugh! </p>

    <iframe width="420" height="315" src="//www.youtube.com/embed/dnA9zU-MafQ" frameborder="0" allowfullscreen></iframe>
    <p>-<a href="/profile.php?user_id=1584">Ngoc Tran (MH)</a></p>
</div>
<?php endif ?>

<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
<div class="newsItem">
    <h2>Elections is Coming Up! Send in Your Past Election Platforms</h2>
    <p class="date">April 7, 2014</p>
    <p style="margin-bottom: 1 em;">Hello everyone! As you all know, elections is coming up and it is highly favourable that anyone who is running for an Executive Committee
        position submit a platform prior so that everyone else in the chapter can read and review it!</p>
    <p style="margin-bottom: 1 em;">Drafting an election platform may be a daunting and hard task so I provided some example Election Platforms from the past for anyone who is interested in taking a look!</p>
    <p><ul style="margin-left: 1em; list-style: inside disc; margin-bottom: 1.5em;">
        <li><a target="_blank" href="fa13platforms.php">Fall 2013 Platforms</a></li>
        <li><a target="_blank" href="sp13platforms.php">Spring 2013 Platforms</a></li>
        <li><a target="_blank" href="fa12platforms.php">Fall 2012 Platforms</a></li>
        <li><a target="_blank" href="sp12platforms.php">Spring 2012 Platforms</a></li>
        <li><a target="_blank" href="fa11platforms.php">Fall 2011 Platforms</a></li>
        <li><a target="_blank" href="sp11platforms.php">Spring 2011 Platforms</a></li>
        <li><a target="_blank" href="fa10platforms.php">Fall 2010 Platforms</a></li>
        <li><a target="_blank" href="sp10platforms.php">Spring 2010 Platforms</a></li>
        <li><a target="_blank" href="fa09platforms.php">Fall 2009 Platforms</a></li>
        <li><a target="_blank" href="sp09platforms.php">Spring 2009 Platforms</a></li>
    </ul></p>
    <p>Submit all Spring 2014 Platforms to me at admin-vp@calaphio.com. In addition, I will be doing LIVE UPDATES as soon as a candidate submits their platforms for Fall 2014 Excomm. The link to view Spring 2014 Platforms as soon as they
        get submitted will be: <br/><br/>
        We have submissions from the following people:
        <ul style="margin-left: 1em; list-style: inside disc; margin-bottom: 1.5em;">
            <li><a href="/profile.php?user_id=1673">Pooja Shah (KK)</a>for Fellowship VP! Submitted 12:34pm, Monday, April 14, 2014</li>
            <li><a href="profile.php?user_id=1400">Debra Yan (JS)</a> for Pledgemaster! Submitted 3:03pm, Tuesday, April 15, 2014.</li>
        </ul>
        Please go to the link below to see it! <br/><br/>
        <a target="_blank" style="margin-left: 1em;"href="sp14platforms.php">Fall 2014 Platforms</a>
        <br/>
    </p>
</div>
<?php endif ?>

<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
<div class="newsItem">
    <h2>Congratulations to Angela Wu for getting GG Maniac!</h2>
    <p class="date">April 1st, 2014</p>
    <img src="/documents/sp14/ggmaniac/ggmaniac5.jpg" width=300 style="border:1px solid black"/></a><br><br>
    <p style="margin-bottom: 1.5em">Ever since pledging APO during Dave Emery(DE) semester, she has been a great help and contributed a lot of Gamma Gamma's active chapter.
    This semester, she is a chair for College Day! She is rather shy, but if you see her around, don't be afraid to engage
    in a conversation with her because she is extremely friendly. </p>
    <p>-<a href="/profile.php?user_id=1584">Ngoc Tran (MH)</a></p>
</div>
<?php endif ?>

<?php if($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
<!--<div class="newsItem">
<h2>Submit to Caption Contest! Last day to submit is April 1, 2014 at 5pm before CM 6 starts!</h2>
<p class="date">March 27, 2014</p>
<img src="/documents/sp14/caption_contest/caption contest4.jpg" width="300" style="border:1px solid black"/>
<p>Submit! We want all the funny comments you can dish out there! Winners will get <em><b>$5 Jamba Juice or Yogurt Land Gift Card!</b></em></p>
<img src="/documents/sp14/caption_contest/caption_contest4_1.jpg" width="300" style="border:1px solid black"/>
<p style="margin-bottom: 1.5em">We have another picture as well! We will have two $5 winners! There will be a winner for each photo so please submit</p>
<p style="margin-bottom: 1.5em"><a href="https://docs.google.com/forms/d/1D1W2-wtDM1mIIiEG8eQKJqi6K_UiGAMU3adFIiYtvwg/viewform">Submit to Caption Contest!</a></p>
<p style="margin-bottom: 1.5em"><b>Also, if you got something dirt or something funny you want everyone else to know, submit to the <a href="https://docs.google.com/forms/d/1ELsVwAiney9Rm7AoXn7CZYv7t68iXD749siiO3Cx-JQ/viewform">Stylus Dirt Box!</a>
    It really helps to make a better Caption Contest!</b></p>
<p>-<a href="roster.php?function=Search&user_id=1216">Ngoc Tran (MH)</a></p>
</div>-->
<div class="newsItem">
    <h2>Notes From CM 6</h2>
    <p class="date">April 1, 2014</p>
    <p style="margin-bottom: 1em">Here are the documents from CM6!<br>
        Excomm Powerpoint Slides:<a href="https://docs.google.com/presentation/d/1iU_xCGpzzwKHojZFBWwxZiELlb1KCRg6SPnXzix4G98/edit?usp=sharing"> CM6 Slides</a><br>
    </p>
    <p style="margin-bottom: 1em">Here are the <a href="https://drive.google.com/file/d/0B2qOHCQXVkc3T3ViVEtndFdadUk/edit?usp=sharing">CM 6 Minutes</a></p>
    <p style="margin-bottom: em"> Here is our wonderful <a href="https://drive.google.com/file/d/0B2qOHCQXVkc3QThHY3VLdXRtcTA/edit?usp=sharing">CM 6 STYLUS! </a> Read it and enjoy a great laugh! </p>

    <iframe width="420" height="315" src="//www.youtube.com/embed/gYSu6pkV9F0" frameborder="0" allowfullscreen></iframe>
    <p>-<a href="profile.php?user_id=1584">Ngoc Tran (MH)</a></p>
</div>
<?php endif ?>

<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
<div class="newsItem">
    <h2>Congratulations to Ryan Fong for getting GG Maniac!</h2>
    <p class="date">March 16, 2014</p>
    <img src="/documents/sp14/ggmaniac/ggmaniac4.jpg" width=300 style="border:1px solid black"/></a><br><br>
    <p style="margin-bottom: 1.5em">Ryan is one of the nicest and most inspirational people that you will ever meet in APO! Many people will recognize Ryan from his amazing 
    hand gestures whenever he talks, but also because he is always super energetic. He pledged Maura Harty semester and has been contributing so much to APO since then. This
    semester, he stepped up to become the Spirit Chair and is leading the Roll Call Dance Team! I can tell we are going to have an amazing dance team already! </p>
    <p style="margin-bottom: 1.5em">If you see Ryan, congratulate him and talk to him if you don't know him! I promise you won't regret it! Everyone who knows Ryan 
        feels very lucky because he is one of the coolest and down to earth people you will ever meet!</p>
    <p>-<a href="profile.php?user_id=1584">Ngoc Tran (MH)</a></p>
</div>
<?php endif ?>

<?php if($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
<div class="newsItem">
    <h2>Notes From CM 5</h2>
    <p class="date">March 15, 2014</p>
    <p style="margin-bottom: 1em">Here are the documents from CM5!<br>
        Excomm Powerpoint Slides:<a href="https://docs.google.com/presentation/d/1iU_xCGpzzwKHojZFBWwxZiELlb1KCRg6SPnXzix4G98/edit?usp=sharing"> CM5 Slides</a><br>
    </p>
    <p style="margin-bottom: 1em">Here are the <a href="https://drive.google.com/file/d/0B2qOHCQXVkc3QUFvY0hrd2pINmc/edit?usp=sharing">CM 5 Minutes</a></p>
    <p style="margin-bottom: em"> Here is our wonderful <a href="https://drive.google.com/file/d/0B2qOHCQXVkc3amZNZWV2dXdieWc/edit?usp=sharing">CM 5 STYLUS! </a> Read it and enjoy a great laugh! </p>

    <iframe width="420" height="315" src="//www.youtube.com/embed/4Cem30N-gRc" frameborder="0" allowfullscreen></iframe>
    <p>-<a href="profile.php?user_id=1584">Ngoc Tran (MH)</a></p>
</div>
<?php endif ?>

<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
<div class="newsItem">
    <h2>Congratulations to Annie Ferguson for getting GG Maniac!</h2>
    <p class="date">March 1, 2014</p>
    <img src="/documents/sp14/ggmaniac/ggmaniac3.jpg" width=300 style="border:1px solid black"/></a><br><br>
    <p style="margin-bottom: 1.5em">Please congratulate Annie Ferguson for winning GG Maniac! Annie pledged Jennifer Sun semester and was Historian last semester. She is currently an aunt for Whale I Am 
    and chairing YTA Mosswood where she helps tutor little kids! She has always been a great friend to many in APhiO and is always involved to help her family out! </p>
    <p style="margin-bottom: 1.5em">When you see Annie, thank her to show your appreciation! Maybe give her a ducky or two as well!</p>
    <p>-<a href="profile.php?user_id=1584">Ngoc Tran (MH)</a></p>
</div>
<?php endif ?>

<?php if($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
<div class="newsItem">
    <h2>Submit to Caption Contest! Last day to submit is March 11, 2014 at 5pm before CM 5 starts!</h2>
    <p class="date">March 05, 2014</p>
    <img src="/documents/sp14/caption_contest/caption contest4.jpg" width="300" style="border:1px solid black"/>
    <p>Submit! We want all the funny comments you can dish out there! Winners will get <em><b>$5 Jamba Juice or Yogurt Land Gift Card!</b></em></p>
    <img src="/documents/sp14/caption_contest/caption_contest4_1.jpg" width="300" style="border:1px solid black"/>
    <p style="margin-bottom: 1.5em">We have another picture as well! We will have two $5 winners! There will be a winner for each photo so please submit</p>
    <p style="margin-bottom: 1.5em"><a href="https://docs.google.com/forms/d/1D1W2-wtDM1mIIiEG8eQKJqi6K_UiGAMU3adFIiYtvwg/viewform">Submit to Caption Contest!</a></p>
    <p style="margin-bottom: 1.5em"><b>Also, if you got something dirt or something funny you want everyone else to know, submit to the <a href="https://docs.google.com/forms/d/1ELsVwAiney9Rm7AoXn7CZYv7t68iXD749siiO3Cx-JQ/viewform">Stylus Dirt Box!</a>
        It really helps to make a better Caption Contest!</b></p>
    <p>-<a href="profile.php?user_id=1584">Ngoc Tran (MH)</a></p>
</div>
<?php endif ?>

<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
<div class="newsItem">
    <h2>Notes From CM 4</h2>
    <p class="date">March 01, 2014</p>
    <p style="margin-bottom: 1em">Here are the documents from CM4!<br>
        Excomm Powerpoint Slides:<a href="https://docs.google.com/presentation/d/1vIXK59gco0iRwziCzmYLXEpmpt42e3_zJQEvayrSmrA/edit?usp=sharing"> CM4 Slides</a><br>
    </p>
    <p style="margin-bottom: 1em">Here are the <a href="https://drive.google.com/file/d/0B2qOHCQXVkc3UW05VTA5MzAwMjQ/edit?usp=sharing">CM 4 Minutes</a></p>
    <p style="margin-bottom: em"> Here is our wonderful <a href="https://drive.google.com/file/d/0B2qOHCQXVkc3ZVpEZ2tOYmR0UEU/edit?usp=sharing">CM 4 STYLUS! </a> Read it and enjoy a great laugh! </p>

    <iframe style="margin-bottom: 1em" width="480" height="360" src="//www.youtube.com/embed/ixXIrP9Vgb8" frameborder="0" allowfullscreen></iframe>
    <p>-<a href="profile.php?user_id=1584">Ngoc Tran (MH)</a></p>
</div>
<?php endif ?>

<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
<div class="newsItem">
    <h2>Congratulations to James Wang for getting GG Maniac!</h2>
    <p class="date">February 11, 2014</p>
    <img src="/documents/sp14/ggmaniac/ggmaniac2.jpg" width=300 style="border:1px solid black"/></a><br><br>
    <p style="margin-bottom: 1.5em">Please congratulate James Wang for winning GG Maniac! James is like a teddy bear and is loved by his family and friends in Alpha Phi Omega! James pledged Maura Harty semester
and is now bigging again this semester! Whenever you need someone to fill up a spot for you at a fellowship, fundraiser, or service, James will be there to help you out! </p>
    <p style="margin-bottom: 1.5em">When you see James, give him a hug and show him your appreciation. For those who do end up being his littles, you will really love having him around! </p>
    <p>-<a href="profile.php?user_id=1584">Ngoc Tran (MH)</a></p>
</div>
<?php endif ?>

<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
<div class="newsItem">
    <h2>Notes From CM 3</h2>
    <p class="date">February 11, 2014</p>
    <p style="margin-bottom: 1em">Here are the documents from CM3!<br>
        Excomm Powerpoint Slides:<a href="https://docs.google.com/presentation/d/1tn75YPWZ_BCyMeDeBhmhGMJdWGUfKmSvIWsZT2qbqxU/edit?usp=sharing"> CM3 Slides</a><br>
    </p>
    <p style="margin-bottom: 1em">Here are the <a href="https://docs.google.com/file/d/0B2qOHCQXVkc3VEVlMWtqSUFjYVE/edit">CM 3 Minutes</a></p>
    <p style="margin-bottom: em"> Here is our wonderful <a href="https://docs.google.com/file/d/0B2qOHCQXVkc3WkVIbjVwSldRc28/edit">CM 3 STYLUS!</a> Read it and enjoy a great laugh! </p>

    <iframe style="margin-bottom: 1em" width="480" height="360" src="//www.youtube.com/embed/58kugX6pBiA" frameborder="0" allowfullscreen></iframe>
    <p>-<a href="profile.php?user_id=1584">Ngoc Tran (MH)</a></p>
</div>
<?php endif ?>

<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
<div class="newsItem">
    <h2>Congratulations to Rebecca Phuong for getting GG Maniac!</h2>
    <p class="date">February 05, 2014</p>
    <img src="/documents/sp14/ggmaniac/ggmaniac1.jpg" width=300 style="border:1px solid black"/></a><br><br>
    <p style="margin-bottom: 1.5em">Please congratulate Rebecca Phuong for winning GG Maniac! She has been a big, but has always been there for her family by being an aunt and no one questions that she
does as much, if not more than a big should. She pledged JS semester and was Gamma Gamma's Finance Vice President last semester! </p>
    <p style="margin-bottom: 1.5em">Without her, the chapter wouldn't have made it this far! If you see her, please
remember to thank her and congratulate her because she deserves it after putting in so much work!</p>
    <p>-<a href="profile.php?user_id=1584">Ngoc Tran (MH)</a></p>
</div>
<?php endif ?>

<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
<div class="newsItem">
    <h2>Notes From CM 2</h2>
    <p class="date">February 05, 2014</p>
    <p style="margin-bottom: 1em">Here are the documents from CM2!<br><br>
        Excomm Powerpoint Slides:<a href="https://docs.google.com/presentation/d/1Ig_RB6qDtSggxrpvgmjyo-ECbRk69deYZMJEveq33X4/edit?usp=sharing"> CM2 Slides</a><br><br>
    </p>
    <p style="margin-bottom: 1em">Here are the <a href="https://docs.google.com/file/d/0B2qOHCQXVkc3d1hwOUZjUVdFVEE/edit">CM 2 Minutes</a></p>
    
    </p>
    <iframe style="margin-bottom: 1em" width="480" height="360" src="//www.youtube.com/embed/uygn3MZplUw" frameborder="0" allowfullscreen></iframe>
    <p>-<a href="profile.php?user_id=1584">Ngoc Tran (MH)</a></p>
</div>
<?php endif ?>

<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
<div class="newsItem">
    <h2>Notes From CM 1</h2>
    <p class="date">January 22, 2014</p>
    <p style="margin-bottom: 1em">Here are the documents from CM1!<br><br>
        Excomm Powerpoint Slides:<a href="https://docs.google.com/presentation/d/151wXXN87QKPoquhJzYC8-2d5vPxjbEf5IJiiE1IhSqs/edit?usp=sharing"> CM1 Slides</a><br><br>
    </p>
    <p style="margin-bottom: 1em">Here are the <a href="https://drive.google.com/file/d/0B2qOHCQXVkc3a1pYU1lWVVNENTQ/edit?usp=sharing">CM 1 Minutes</a></p>
    <p style="margin-bottom: 1em"> Since this is our first CM, we also had the Following Business Documents!<br/>
     1) <a href="https://drive.google.com/file/d/0B2qOHCQXVkc3MjRMOEFmanM5MHM/edit?usp=sharing">Active Requirements</a><br/>
     2) <a href="https://drive.google.com/file/d/0B2qOHCQXVkc3X1pxLWZRcmpmTUU/edit?usp=sharing">Pledge Requirements</a>
    </p>
    <iframe style="margin-bottom: 1em" width="480" height="360" src="//www.youtube.com/embed/GZ2u6Cd-lvg" frameborder="0" allowfullscreen></iframe>
    <p>-<a href="profile.php?user_id=1584">Ngoc Tran (MH)</a></p>
</div>
<?php endif ?>

<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
<div class="newsItem">
    <h2>Congratulations to Courtney for getting namesake!</h2>
    <p class="date">January 21, 2014</p>
    <img src="/documents/sp14/courtney_namesake.jpg" width=300 style="border:1px solid black"/></a><br><br>
    <p style="margin-bottom: 1.5em">Please congratulate Courtney for all her achievements in Alpha Phi Omega. She pledged in the Fall of 2008 (WK pledge class).
    Ever since then, she has served as Service Trainer, Service Vice President, and eventually becoming President in the Spring of 2011 and also chaired Regionals! Although she has graduated,
    she still contributes to the chapter and was recently a parent for Sour Ratch Kids in the Spring of 2013. The chapter is proud to have Courtney as our namesake!</p>
    <p style="margin-bottom: 1.5em">If you ever see Courtney, please join me in congratulating her and strike a conversation to get a feel of her dazzling personality!</p>
    <p>-<a href="profile.php?user_id=1584">Ngoc Tran (MH)</a></p>
</div>
<?php endif ?>

<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
<div class="newsItem">
    <h2>Take a look at our approved Budget!</h2>
    <p class="date">January 21, 2014</p>
    <p style="margin-bottom: 1.5em">Check out our budget below!</p>
    <p style="margin-bottom: 1.5em"><a href="https://docs.google.com/spreadsheet/ccc?key=0AjUhxDpscmUidDQtVkNWVVFpSWhvMzY3Z3ZOcEVWX1E&usp=sharing#gid=0">Spring 2014 Budget!</a></p>
    <p>-<a href="profile.php?user_id=1584">Ngoc Tran (MH)</a></p>
</div>
<div class="newsItem">
    <h2>Flyer for Rush!</h2>
    <p class="date">January 21, 2014</p>
    <p style="margin-bottom: 1.5em">Sign up for flyering and get some good <strong>CM</strong> pledges!</p>
    <p style="margin-bottom: 1.5em"><a href="https://docs.google.com/spreadsheets/d/1SSCfj2-rx_HMjs2zx9N-nGbKQk1rf7iPkTyZw-s7SXM/edit#gid=1267904948">Flyering and Chalking Sign Ups!</a></p>
    <p>-<a href="profile.php?user_id=1584">Ngoc Tran (MH)</a></p>
</div>
<?php endif ?>

<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
<div class="newsItem">
    <h2>Congratulations to the Spring 2014 Rush Chairs!</h2>
    <p class="date">December 13, 2013</p>
    <p class="center"> Please join me in congratulating the new Rush Chairs!</p>
    <div class="collage-container">
    <div class="collage-pictures">
        <div class="person-picture">
            <img src="documents/sp14/rush/lakana_bun.jpg"></img>
            <p class="center">Lakana Bun</p>
            
        </div>
        <div class="person-picture">
            <img src="documents/sp14/rush/sharon_wang.jpg"></img>
            <p class="center">Sharon Wang</p>
        </div>
        <div class="person-picture">
            <img src="documents/sp14/rush/wiemond_wu.jpg"></img>
            <p class="center">Wiemond Wu</p>
        </div>
    </div>
    <div style="clear: left;"></div>
    </div>
    <p>I know they will recruit amazing new additions to the chapter!</p>
    <p>-<a href="profile.php?user_id=1584">Ngoc Tran (MH)</a></p>
</div>
<?php endif ?>

<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
<div class="newsItem">
    <br/>
    <h2>Congratulations to the Spring 2014 Pledge Committee</h2>
    <p class="date">December 13, 2013</p>
    <p class="center"> Please congratulate the new pledge committee when you see them!</p>
    <div class="collage-container">
    <div class="collage-pictures">
        <div class="person-picture">
            <img src="documents/sp14/pcomm/bella_tsay.jpg"></img>
            <p class="center"><strong>Leadership Trainer</strong>: Bella Tsay</p>
            
        </div>
        <div class="person-picture">
            <img src="documents/sp14/pcomm/ann_chan.jpg"></img>
            <p class="center"><strong>Fellowship Trainer</strong>: Ann Chan</p>
            
        </div>
        <div class="person-picture">
            <img src="documents/sp14/pcomm/kevin_nguyen.jpg"></img>
            <p class="center"><strong>Fellowship Trainer</strong>: Kevin Nguyen</p>
            
        </div>
        <div class="person-picture">
            <img src="documents/sp14/pcomm/preston_chan.jpg"></img>
            <p class="center"><strong>Service Trainer</strong>: Preston Chan</p>
            
        </div>
        <div class="person-picture">
            <img src="documents/sp14/pcomm/jejee_hasdarngkul.jpg"></img>
            <p class="center"><strong>Finance Trainer</strong>: Jejee Hasdarngkul</p>
            
        </div>
        <div class="person-picture">
            <img src="documents/sp14/pcomm/tinoi_lui.jpg"></img>
            <p class="center"><strong>Finance Trainer</strong>: TinOi Lui</p>
            
        </div>
        <div class="person-picture">
            <img src="documents/sp14/pcomm/janice_lai.jpg"></img>
            <p class="center"><strong>Historian Trainer</strong>: Janice Lai</p>
            
        </div>
        
    </div>
    <div style="clear: left;"></div>
    </div>

    <p>-<a href="profile.php?user_id=1584">Ngoc Tran (MH)</a></p>
</div>
<?php endif ?>

<a href="news_fa13.php">Older News ></a>
<?php
Template::print_body_footer();
Template::print_disclaimer();
?>
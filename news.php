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
    <div class="newsItem">
        <h2>CM 4 Recap</h2>
        <p class="date">March 7, 2018 at 11:56am</p>
        <p> Dues: $60 until CM5 </p>
        <p style="margin-bottom: 1em;">Here are the following documents from CM 4:<br>
            <a href="https://docs.google.com/presentation/d/10Ki9JX1GMC9e-Qf6scBwDPvlX8rMYxpgoeaZnpbLm3Q/edit?usp=sharing" target="_blank">CM 4 Slides</a><br>
            <a href="https://www.youtube.com/watch?v=syKTFEHTfYc" target="_blank">CM 4 Video</a><br>
            <a href="https://docs.google.com/forms/d/1jYpbYVNAuX_pZaC0ZuAQYoq99hyG0ele5j0Z5ao7uTg/edit" target="_blank">Caption Contest</a><br>

            <p>- <a href="profile.php?user_id=4631">Kyle Tse (MMC)</a></p>
        </p>
    </div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
    <div class="newsItem">
        <h2>CM 3 Recap</h2>
        <p class="date">February 8, 2018 at 8:52pm</p>
        <p> Welcome to Gamma Gamma, pledges!! xD This semester will be a long and tiring one, but it will be worth it! Don’t stress too much about pledging, and remember to have fun and think about why you decided to first pledge. Never place any Aphio events before your academics, but do try to find a way to manage your time in order to balance out the two! If you ever feel overwhelmed about anything, feel free to message anyone. Good luck this semester! - Melissa </p>
        <p> Dues: $60 until CM6 (cash or checks only. NO VENMO) </p>
        <p style="margin-bottom: 1em;">Here are the following documents from CM 3:<br>
            <a href="https://docs.google.com/presentation/d/182SmK016m2b_P4XXuks65WJiEI17-HccIITUCdois9I/edit?usp=sharing" target="_blank">CM 3 Slides</a><br>
            <a href="https://vimeo.com/254634367?activityReferer=1" target="_blank">CM 3 Video</a><br>
            <a href="tinyurl.com/captioncontestxDDD" target="_blank">Caption Contest</a><br>
            <a href="https://members.calaphio.com/gg_maniac_vote.php?id=139" target="_blank">CM 4 GG Maniac </a><br>
            <a href="https://docs.google.com/forms/d/1x3rj7I7teFdftMdoLj92g-Be_SYUeUL30sHhirFpne0/edit?ts=5a71670c" target="_blank">Alumni Mentorship Program</a><br>
            <a href="tinyurl.com/stylusxD" target="_blank">Stylus Ideas</a><br>
            <p>- <a href="profile.php?user_id=4610">Jeffrey Zhang (MMC)</a></p>
        </p>
    </div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
    <div class="newsItem">
        <h2>CM 2 Recap</h2>
        <p class="date">February 2, 2018 at 10:52pm</p>
        <p style="margin-bottom: 1em;">Here are the following documents from CM 2:<br>
            <a href="https://docs.google.com/presentation/d/1s5jE8q4m7jCUOvS2wWNvmmGoQtAueVso7iA0PbnI53A/edit?usp=sharing" target="_blank">CM 2 Slides</a><br>
            <a href="https://www.youtube.com/watch?v=EPDcg6dHOyc" target="_blank">CM 2 Video</a><br>
            <a href="https://docs.google.com/forms/d/1FgN80OuoJ49-4K6PCJGrK7pEYZIywEILoyhk5aYmUMU/viewform?edit_requested=true" target="_blank">Caption Contest</a><br>
            <a href="https://members.calaphio.com/gg_maniac_vote.php?id=138" target="_blank">CM 3 GG Maniac</a><br>
            <a href="tinyurl.com/servicebuds" target="_blank">Service Buddies Sign Up</a><br>
            <a href="tinyurl.com/kittyservice" target="_blank">Interested in volunteering with cats?</a><br>

            <p>- <a href="profile.php?user_id=4631">Kyle Tse (MMC)</a></p>
        </p>
    </div>
<?php endif ?>

<?php if ($g_user->is_logged_in()): ?>
    <div class="newsItem">
        <h2>CM 1 Recap</h2>
        <p class="date">January 30, 2018 at 11:15am</p>
        <p style="margin-bottom: 1em;">Here are the following documents from CM 1:<br>
            <a href="https://docs.google.com/presentation/d/1rzOUkpWzjOHGnuqsk_-doUtlHvFTWBeQKvZG6v9iMKQ/edit?usp=sharing" target="_blank">CM 1 Slides</a><br>

            <p>- <a href="profile.php?user_id=4631">Kyle Tse (MMC)</a></p>
        </p>
    </div>
<?php endif ?>

<div class="newsItem">
        <h2>Welcome Gamma Gamma!</h2>
        <p style="margin-bottom: 1em">

    <br>Since school is almost starting, it's about time to get back into the APO mentality. Just remember that we're all students first and need to prioritize school, and to focus on quality service over quantity. Good luck this semester!</br> 
    
    <p>- <a href="profile.php?user_id=3628">Melissa Quach (FH)</a></p>
</div>

<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
    <a href="news_fa17.php">Older News ></a>
<?php endif ?>

<?php
$template->print_body_footer();
$template->print_disclaimer();
?>

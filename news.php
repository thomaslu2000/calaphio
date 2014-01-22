<?php
require("include/includes.php");
require("include/Calendar.class.php");
require("include/Template.class.php");
require("include/Shoutbox.class.php");
require("include/EvalNag.class.php");
require("include/GGManiacNag.class.php");
Template::print_head(array("site.css", "calendar.css", "excel.css"));
Template::print_body_header('Home', 'NEWS');

$evalnag = new EvalNag();
echo $evalnag->display("2007-01-01");

$gg_maniac_nag = new GGManiacNag();
echo $gg_maniac_nag->display();

$shoutbox = new Shoutbox();
$shoutbox->process();
echo $shoutbox->display();

Calendar::print_upcoming_events(5);

$g_user->process_mailer(false);
$g_user->print_mailer(false);
$g_user->print_personal_messages();

if (!$g_user->is_logged_in()) {
	echo '<img style="float: right" src="images/lfs_banner.png" alt="LFS" />';
}

?>
<div class="newsItem">
	<h2>Congratulations to Courtney for getting namesake!</h2>
    <p class="date">January 21, 2014</p>
    <img src="/documents/sp14/courtney_namesake.jpg" width=300 style="border:1px solid black"/></a><br><br>
	<p style="margin-bottom: 1.5em">Please congratulate Courtney for all her achievements in Alpha Phi Omega. She pledged in the Fall of 2009 (JM pledge class).
	Ever since then, she has served as Service Trainer, Service Vice President, and eventually becoming President in the Fall of 2011! Although she has graduated,
	she still contributes to the chapter and was recently a parent for Sour Ratch Kids in the Spring of 2013. The chapter is proud to have Courtney as our namesake!</p>
	<p style="margin-bottom: 1.5em">If you ever see Courtney, please join me in congratulating her and strike a conversation to get a feel of her dazzling personality!</p>
    <p>-<a href="roster.php?function=Search&user_id=1216">Ngoc Tran (MH)</a></p>
</div>
<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>

<div class="newsItem">
	<h2>Take a look at our approved Budget!</h2>
    <p class="date">January 21, 2014</p>
    <p style="margin-bottom: 1.5em">Check out our budget below!</p>
	<p style="margin-bottom: 1.5em"><a href="https://docs.google.com/spreadsheet/ccc?key=0AjUhxDpscmUidDQtVkNWVVFpSWhvMzY3Z3ZOcEVWX1E&usp=sharing#gid=0">Spring 2014 Budget!</a></p>
    <p>-<a href="roster.php?function=Search&user_id=1216">Ngoc Tran (MH)</a></p>
</div>
<div class="newsItem">
	<h2>Flyer for Rush!</h2>
    <p class="date">January 21, 2014</p>
    <p style="margin-bottom: 1.5em">Sign up for flyering and get some good <strong>CM</strong> pledges!</p>
	<p style="margin-bottom: 1.5em"><a href="https://docs.google.com/spreadsheets/d/1SSCfj2-rx_HMjs2zx9N-nGbKQk1rf7iPkTyZw-s7SXM/edit#gid=1267904948">Flyering and Chalking Sign Ups!</a></p>
    <p>-<a href="roster.php?function=Search&user_id=1216">Ngoc Tran (MH)</a></p>

</div>

<?php endif ?>
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
    <p>-<a href="roster.php?function=Search&user_id=1584">Ngoc Tran (MH)</a></p>
</div>
<?php if ($g_user->is_logged_in()): ?>
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

    <p>-<a href="roster.php?function=Search&user_id=1584">Ngoc Tran (MH)</a></p>
</div>
<?php endif ?>
<a href="news_fa13.php">Older News ></a>
<?php
Template::print_body_footer();
Template::print_disclaimer();
?>

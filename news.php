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
      <?php if (!$g_user->is_pledge()): ?>
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
    <?php endif ?>
    
    
    <div class="newsItem">
        <h2>CM 1 Recap</h2>
        <p class="date">January 23, 2018 at 9:26am</p>

    Welcome back actives! 


        <br><br>

        <p style="margin-bottom: 1em;">CM1 Recap:<br>
            <a href="https://docs.google.com/presentation/d/1OZVChKEq2kEQ_zy6Dx_gJ8EIDG9oRGUy0YdojF0lFPM/edit?fbclid=IwAR1JudikQRpfBD_SGaEpyMCKiKAw--eTfJHU7qZB_rEoU8JDGKvj4kMb_uU#slide=id.g4e3a01238a_1_104" target="_blank">CM 1 Slides</a><br>
            <a href="https://docs.google.com/spreadsheets/d/1nGL7EFeRhQ29fJM0GRoQS_ZgHgY5GZs2rRDUNLiIRaI/edit?usp=sharing" target="_blank">Spring 2019 Budget</a><br>
 			<a href="https://docs.google.com/spreadsheets/d/1UHi-jXJE81ivCynymgVezzy69_cPS-x5Jxgfaf0HBPE/edit?fbclid=IwAR3t5rzV3nPVztEY26uZq-PVHI5C4jeQDt8J8mHnx6MR-MNr_xy8TiIXWEQ#gid=1589878783" target="_blank">Spring Excomm Chairing Positions</a><br>
 			<a href="https://goo.gl/forms/zMPfMIbR9e5Nyfgu2" target="_blank">Website Suggestion Form</a><br>


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
    
    <p>- <a href="profile.php?user_id=4697">Valerie Hsieh</a></p>
</div>

<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
    <a href="news_fa18.php">Older News ></a>
<?php endif ?>

<?php
$template->print_body_footer();
$template->print_disclaimer();
?>

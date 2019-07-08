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

<?php 


//auto generate news code
$query = new Query(sprintf("SELECT start, end FROM apo_semesters ORDER BY id DESC LIMIT 1"));
if($row = $query->fetch_row()){
    $start_time = $row['start'];
    $end_time = $row['end'];
    $query = new Query(sprintf(
        "SELECT user_id, id, text, publish_time, title, firstname, lastname, pledgeclass
        FROM apo_announcements 
        JOIN apo_users USING (user_id)
        WHERE publish_time > '%s' AND publish_time < '%s'
        ORDER BY id DESC", $start_time, $end_time));
    }
    while($row = $query->fetch_row()){
        $name_stuff = $row['firstname'] . " " . $row['lastname'] . " (" . $row['pledgeclass'] .")";
?>


<div class="newsItem">
        <h2> 
        <?php 
        echo html_entity_decode($row['title']);
        
        if ($g_user->permit("admin view requirements") || $g_user->permit("admin view pledge requirements")) {
            $post_id = $row['id'];
            echo "
            <a href='admin_add_announcement.php?post_id=$post_id'> (Edit Post) </a>
            ";
        }
        
        ?> 
        </h2>
        <p class="date"> <?php echo date('M j Y g:i A', strtotime($row['publish_time'])) ?> </p>
    <p>
        <?php echo html_entity_decode($row['text'])?>
    </p>
    <p>- <a href="profile.php?user_id=<?php echo $row['user_id'] ?>"><?php echo $name_stuff ?></a></p>
</div>
<?php } 

// end auto generate news code
?>


<div class="newsItem">
        <h2>Summer Service Smugmug!</h2>
        <p class="date">July 5, 2019 at 10:49pm</p>
<p>
<a href="https://calaphio.smugmug.com/upload/TcKh9q/allenwongsummer" target="_blank"> Summer Service Uploads: </a> <br /> <a href="https://calaphio.smugmug.com/upload/TcKh9q/allenwongsummer" target="_blank"> https://calaphio.smugmug.com/upload/TcKh9q/allenwongsummer </a>
</p>
    <p>- <a href="profile.php?user_id=4937">Edward Hsu (PVL)</a></p>
    </div>
<div class="newsItem">
        <h2>Summer Service Update!</h2>
        <p class="date">May 28, 2019 at 10:49pm</p>
           <p>
            Hello brothers! Hope you all are enjoying the start of your summer. I have a couple announcements:
<br><br>
1) <b>SUMMER VOLUNTEER OPPORTUNITY:</b> The Berkeley Student Food Collective (that little grocery store across from Eshleman Hall) is currently taking volunteer applications for Summer 2019. If you want to know what it's like to run a grocery store, love food, and can commit at least 2 hours per week over the summer, learn more about this opportunity <a href="http://www.foodcollective.org/apply-for-membership" target="_blank">here.</a> 
<br>
If you want to volunteer for BSFC and would like those hours to count for your active requirement, please message me. Please note that YOU are responsible for holding yourself to the 2 hour/week requirement that BSFC asks for. Please do not apply for membership if you cannot commit to BSFC.
<br><br>
2) <b>FREE PHOTO BERKELEY:</b> I will be in Berkeley all summer starting June 3, so if you want to sharpen your photography skills (and potentially be my Free Photo Berkeley chair), hit me up and we can practice taking photos together! Also, if you have a service project that you want to bring to life, summer is the perfect time for us to develop and hash it out. Message me if you want to meet up :)
<br><br>
3) <b>LINKEDIN GROUP:</b> We now have a LinkedIn group for alumni and active brothers! If you would like to be part of the group, add me on LinkedIn and message me so I can add you to the group.
        </p>
    <p>- <a href="profile.php?user_id=4937">Edward Hsu (PVL)</a></p>
    </div>

       <div class="newsItem">
            <h2>Award Information</h2>
            <p class="date">May 28, 2018 at 10:49pm</p>
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
        <h2>Welcome Gamma Gamma!</h2>
        <p style="margin-bottom: 1em">

    <br>
    Since Spring is now over, it's about time to get back into the APO mentality. Just remember that we're all students first and need to prioritize school, and to focus on quality service over quantity. Good luck this semester!
    <br> 
    <br>
    <a href="https://goo.gl/forms/zMPfMIbR9e5Nyfgu2" target="_blank">Website Suggestion Form</a><br>
    
    <p>- <a href="profile.php?user_id=4697">Jenessa Cordero</a></p>
</div>

<?php if ($g_user->is_logged_in() && !$g_user->is_pledge()): ?>
    <a href="news_sp19.php">Older News ></a>
<?php endif ?>

<?php
$template->print_body_footer();
$template->print_disclaimer();
?>

<?php
require("include/includes.php");
require("include/Calendar.class.php");
require("include/Template.class.php");
Template::print_head(array());
Template::print_body_header('Fellowship', '');
?>
<h2><a name="intro">Fellowship</a></h2><br/>
<?php if ($g_user->is_logged_in()): ?>

<strong>Fellowship</strong>
</p>
<?php endif ?>
<div style="float: right;"><img src="images/fellowship01.png" hspace="10" /></div>
<p>"Fellowships" are what Alpha Phi Omega calls its activities for its fraternity brothers.  These fellowships foster better friendships and relationships between one another and bring brothers closer together.  Fellowships can range from any type of event, from going out to eat at a cheap or nice restaurant, to playing basketball on a Sunday afternoon. Anything goes!  These fellowships are designed for brother to meet other brothers who normally do not interact with each other.  When people are brought together in a common interest, they tend to connect better with others.  The only thing we ask for you to do is that each time you walk home from a fellowship, you feel closer to, or have gotten to know at least one person better than you did before starting the fellowship.</p><br/>
<strong>Fellowship Guidelines</strong>
<p style="margin-bottom: 1em">
<br>
1) Email the Fellowship VP to put a new event on the calendar. <br><br>
2) No back-to-back fellowships. <br><br>
3) At least 24 hours before and the event must last at least an hour! <br><br>
4)	Chairs are responsible for fellowships.<br>
a.	Introduce and facilitate conversation between people attending. Make sure no one is excluded! <br>
b.	Random emails/drop-ins by FVP and FVP assistant will occur at fellowships to ensure that the rules are being followed. <br>
c.	Normal rules regarding emailing three days before and calling/texting the day before apply. <br>
d.	<b>Chairing credit will be retroactively revoked unless these rules are followed! </b> <br><br>
5)	For first 5 attendees, at least 2 must be outside your small family. For every additional 5 attendees, 1 out 5 must be outside your small family.For first 5 attendees, at least 2 must be outside your small family. For every additional 5 attendees, 1 out 5 must be outside your small family.<br>
a.	Associates/unofficials will be counted as being part of the small family.<br>
b.	Affiliations begin with last semester small families.<br>
c.	<b>Fellowships will not count unless they adhere to these rules!</b> <br><br>
<strong>Active Event Guidelines</strong><br>
These events can be anything! Similar to fellowships, but only actives can attend! 
<p style="margin-bottom: 1em">
1) Email FVP beforehand.<br><br>
2) Should have 3 Actives outside your small fam.<br><br>
3) 12 brothers minimum.<br><br>
4) At least 2 hours.<br><br>
5) Same rules as Fellowships vis-a-vis reminders, evaluations etc.<br><br>

<div style="float: left;"><img src="images/fellowship02.png" hspace="60"></div>

<?php
Template::print_body_footer();
Template::print_disclaimer();
?>
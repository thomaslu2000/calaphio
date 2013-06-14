<?php
require("include/includes.php");
require("include/Calendar.class.php");
require("include/Template.class.php");
Template::print_head(array("site.css", "calendar.css", "contact.css"));
Template::print_body_header('Contact', '');
?>

<?php if ($g_user->is_logged_in()):  ?>
	<h1 style="text-align:center;">Excomm Emails</h1>
	<table style="width: 60%;margin-left:25%%; margin-right:15%;">
	<tr>
	<td>President</td>
	<td>president@calaphio.com</td>
	</tr>
	<tr>
	<td>Administrative Vice President:</td> <td>admin-vp@calaphio.com</td>
	</tr>
	<tr>
	<td>Membership Vice President:</td> <td>membership-vp@calaphio.com</td>
	</tr>
	<tr>
	<td>Service Vice President:</td> <td>service-vp@calaphio.com</td>
	</tr>
	<tr>
	<td>Finance Vice President:</td> <td>finance-vp@calaphio.com</td>
	</tr>
	<tr>
	<td>Fellowship Vice President:</td> <td>fellowship-vp@calaphio.com</td>
	</tr>
	<tr>
	<td>Pledgemaster:</td> <td>pledgemaster@calaphio.com</td>
	</tr>
	<tr>
	<td>Historian:</td> <td>historian@calaphio.com</td>
	</tr>
	</table>
<?php endif ?><br>
<?php
$g_user->process_mailer(true);
$g_user->print_mailer(true);
?>


<?php
Template::print_body_footer();
Template::print_disclaimer();
?>
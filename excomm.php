<?php
require("include/includes.php");
require("include/Template.class.php");
require("include/Calendar.class.php");
Template::print_head(array());
Template::print_body_header('Home', 'OFFICERS');

echo <<<DOCHERE_print_gg_maniac_poll_create
	<div id='galleryDiv' text-align='center'>
		<h1 align='center'> Fall 2014 Excomm </h1>
		<br>
		<br>
		<ul id='gallery'>
			<li>
			<a class="pic" href="excomm/fa14/president.jpg">
			<img src="excomm/fa14/president.jpg" id="excomm" alt="President, Jeff Ma">
			</a>
			<p align='center'> <b>PRESIDENT</b> <br><a href="profile.php?user_id=1412">Jeff Ma</a><br>Pledged Jennifer Sun <br> <a href="mailto:president@calaphio.com">president@calaphio.com</a></p>

			</li>
			<li>
			<a class="pic" href="excomm/fa14/admin.jpg">
				<img src="excomm/fa14/admin.jpg" id="excomm" alt="Administrative Vice President, Kelsey Chan">
			</a>
			<p align='center'> <b>ADMINISTRATIVE VICE PRESIDENT</b> <br><a href="profile.php?user_id=2055">Kelsey Chan</a><br>Pledged Kingsley Kuang<br> <a href="mailto:admin-vp@calaphio.com">admin-vp@calaphio.com</a></p>
			</li>
			
			<li>
			<a class="pic" href="excomm/fa14/membership.jpg">
				<img src="excomm/fa14/membership.jpg" id="excomm"" alt="Membership Vice President, Debra Yan">
			</a>
			<p align='center'> <b>MEMBERSHIP VICE PRESIDENT</b> <br><a href="profile.php?user_id=1400">Debbie Yan</a><br>Pledged Jennifer Sun<br> <a href="mailto:membership-vp@calaphio.com">membership-vp@calaphio.com</a> </p>
			</li>

			<li>
			<a class="pic" href="excomm/fa14/service.jpg">
				<img src="excomm/fa14/service.jpg" id="excomm" alt="Service Vice President, Susan Guan">
			</a>
			<p align='center'> <b>SERVICE VICE PRESIDENT</b> <br><a href="profile.php?user_id=1426">Susan Guan</a><br>Pledged Maura Harty<br> <a href="mailto:service-vp@calaphio.com">service-vp@calaphio.com</a> </p>
			</li>
			<li>
			<a class="pic" href="excomm/sp14/finance.jpg">
				<img src="excomm/fa14/finance.jpg" id="excomm" alt="Finance Vice President, Jane Tam">
			</a>
			<p align='center'> <b>FINANCE VICE PRESIDENT</b><br><a href="profile.php?user_id=1437">Jane Tam</a><br>Pledged Maura Harty<br> <a href="mailto:finance-vp@calaphio.com">finance-vp@calaphio.com</a></p>
			</li>
			<li>
			<a class="pic" href="excomm/fa14/fellowship.jpg">
				<img src="excomm/fa14/fellowship.jpg" id="excomm" alt="Fellowship Vice President, Karen Wu">
			</a>
			<p align='center'> <b>FELLOWSHIP VICE PRESIDENT</b><br><a href="profile.php?user_id=1623">Karen Wu</a><br>Pledged Maura Harty<br> <a href="mailto:fellowship-vp@calaphio.com">fellowship-vp@calaphio.com</a></p>
			</li>
			<li>
			<a class="pic" href="excomm/fa14/pledgemaster.jpg">
				<img src="excomm/fa14/pledgemaster.jpg" id="excomm" alt="Pledgemaster, Christopher Wen">
			</a>
			<p align='center'> <b>PLEDGEMASTER</b> <br><a href="profile.php?user_id=1591">Christopher Wen</a><br>Pledged Maura Harty<br> <a href="mailto:pledgemaster@calaphio.com">pledgemaster@calaphio.com</a></p>
			</li>
			<li>
			<a class="pic" href="excomm/fa14/historian.jpg">
				<img src="excomm/fa14/historian.jpg" id="excomm" alt="Chapter Historian, Rita Mae Nuevo">
			</a>
			<p align='center'> <b>CHAPTER HISTORIAN</b><br><a href="profile.php?user_id=1433">Rita Mae Nuevo</a><br>Pledged Maura Harty<br> <a href="mailto:historian@calaphio.com">historian@calaphio.com</a></p>
			</li>
			</ul>
	</div>

	<script>
		$('#galleryDiv').photobox('a.pic',{ thumbs:true });
	</script>
DOCHERE_print_gg_maniac_poll_create;

Template::print_body_footer();
Template::print_disclaimer();
?>
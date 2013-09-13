<?php
require("include/includes.php");
require("include/Template.class.php");
require("include/Calendar.class.php");
Template::print_head(array());
Template::print_body_header('Home', 'OFFICERS');

echo <<<DOCHERE_print_gg_maniac_poll_create
	<div id='galleryDiv' text-align='center'>
		<h1 align='center'> Fall 2013 Excomm </h1>
		<br>
		<br>
		<ul id='gallery'>
			<li>
			<a class="pic" href="excomm/fa13/President.jpg">
			<img src="excomm/fa13/President.jpg" id="excomm" alt="President, Wiemond Wu">
			</a>
			<p align='center'> <b>PRESIDENT</b> <br><a href="profile.php?user_id=1368">Wiemond Wu</a><br>Pledged Charles P. Zlatkovich <br> <a href="mailto:president@calaphio.com">president@calaphio.com</a></p>

			</li>
			<li>
			<a class="pic" href="excomm/fa13/AVP.jpg">
				<img src="excomm/fa13/AVP.jpg" id="excomm" alt="Administrative Vice President, Andrew Cai">
			</a>
			<p align='center'> <b>ADMINISTRATIVE VICE PRESIDENT</b> <br><a href="profile.php?user_id=1411">Andrew Cai</a><br>Pledged Jennifer Sun<br> <a href="mailto:admin-vp@calaphio.com">admin-vp@calaphio.com</a></p>
			</li>
			
			<li>
			<a class="pic" href="excomm/fa13/MVP.jpg">
				<img src="excomm/fa13/MVP.jpg" id="excomm"" alt="Membership Vice President, Alyssa Ferrell ">
			</a>
			<p align='center'> <b>MEMBERSHIP VICE PRESIDENT</b> <br><a href="profile.php?user_id=1276">Alyssa Ferrell</a><br>Pledged Katherine Strausser<br> <a href="mailto:membership-vp@calaphio.com">membership-vp@calaphio.com</a> </p>
			</li>

			<li>
			<a class="pic" href="excomm/fa13/SVP.jpg">
				<img src="excomm/fa13/SVP.jpg" id="excomm" alt="Service Vice President, Rachel Palmer">
			</a>
			<p align='center'> <b>SERVICE VICE PRESIDENT</b> <br><a href="profile.php?user_id=1305">Rachel Palmer</a><br>Pledged Katherine Strausser<br> <a href="mailto:service-vp@calaphio.com">service-vp@calaphio.com</a> </p>
			</li>
			<li>
			<a class="pic" href="excomm/fa13/Finance.jpg">
				<img src="excomm/fa13/Finance.jpg" id="excomm" alt="Finance Vice President, Rebecca Phuong">
			</a>
			<p align='center'> <b>FINANCE VICE PRESIDENT</b><br><a href="profile.php?user_id=1405">Rebecca Phuong</a><br>Pledged Jennifer Sun<br> <a href="mailto:finance-vp@calaphio.com">finance-vp@calaphio.com</a></p>
			</li>
			<li>
			<a class="pic" href="excomm/fa13/FVP.jpg">
				<img src="excomm/fa13/FVP.jpg" id="excomm" alt="Fellowship Vice President, Elizabeth Sabiniano">
			</a>
			<p align='center'> <b>FELLOWSHIP VICE PRESIDENT</b><br><a href="profile.php?user_id=1387">Elizabeth Sabiniano</a><br>Pledged Jennifer Sun<br> <a href="mailto:fellowship-vp@calaphio.com">fellowship-vp@calaphio.com</a></p>
			</li>
			<li>
			<a class="pic" href="excomm/fa13/PM.jpg">
				<img src="excomm/fa13/PM.jpg" id="excomm" alt="Pledgemaster, Jeffrey Zeng">
			</a>
			<p align='center'> <b>PLEDGEMASTER</b> <br><a href="profile.php?user_id=1408">Jeffrey Zeng</a><br>Pledged Jennifer Sun<br> <a href="mailto:pledgemaster@calaphio.com">pledgemaster@calaphio.com</a></p>
			</li>
			<li>
			<a class="pic" href="excomm/fa13/Historian.jpg">
				<img src="excomm/fa13/Historian.jpg" id="excomm" alt="Chapter Historian, Annie Ferguson">
			</a>
			<p align='center'> <b>CHAPTER HISTORIAN</b><br><a href="profile.php?user_id=1416">Annie Ferguson</a><br>Pledged Jennifer Sun <br> <a href="mailto:historian@calaphio.com">historian@calaphio.com</a></p>
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
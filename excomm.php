<?php
require("include/includes.php");
require("include/Template.class.php");
require("include/Calendar.class.php");
Template::print_head(array());
Template::print_body_header('Home', 'OFFICERS');

echo <<<DOCHERE_print_gg_maniac_poll_create
	<div id='galleryDiv' text-align='center'>
		<h1 align='center'> Spring 2013 Excomm </h1>
		<br>
		<br>
		<ul id='gallery'>
			<li>
			<a href="excomm/President.jpg">
				<img src="excomm/President.jpg" width="210" height="315"" alt="President, Wiemond Wu">
			</a>
			<p align='center'> <b>PRESIDENT</b> <br>Wiemond Wu<br>Political Science & Legal Studies, 2014<br>Pledged Charles P. Zlatkovich <br> <a href="mailto:president@calaphio.com">president@calaphio.com</a></p>

			</li>
			<li>
			<a href="excomm/AVP2.jpg">
				<img src="excomm/AVP2.jpg" width="210" height="315" alt="Administrative Vice President, Tony Le">
			</a>
			<p align='center'> <b>ADMINISTRATIVE VICE PRESIDENT</b> <br>Tony Le <br>Molecular & Cell Biology, 2013<br>Pledged James L. Chandler<br> <a href="mailto:admin-vp@calaphio.com">admin-vp@calaphio.com</a></p>
			</li>
			
			<li>
			<a href="excomm/MVP2.jpg">
				<img src="excomm/MVP2.jpg" width="210" height="315" alt="Membership Vice President, Christopher Ching">
			</a>
			<p align='center'> <b>MEMBERSHIP VICE PRESIDENT</b> <br>Christopher Ching<br>Molecular & Cell Biology, 2013<br>Pledged Charles P. Zlatkovich<br> <a href="mailto:membership-vp@calaphio.com">membership-vp@calaphio.com</a> </p>
			</li>

			<li>
			<a href="excomm/SVP2.jpg">
				<img src="excomm/SVP2.jpg" width="210" height="315" alt="Service Vice President, Kaitlin Fronberg">
			</a>
			<p align='center'> <b>SERVICE VICE PRESIDENT</b> <br>Kaitlin Fronberg <br> Political Science & Psychology, 2013<br>Pledged Katherine Strausser<br> <a href="mailto:service-vp@calaphio.com">service-vp@calaphio.com</a> </p>
			</li>
			<li>
			<a href="excomm/Finance2.jpg">
				<img src="excomm/Finance2.jpg" width="210" height="315" alt="Finance Vice President, Rebecca Phuong">
			</a>
			<p align='center'> <b>FINANCE VICE PRESIDENT</b><br> Rebecca Phuong <br>Public Health, 2015<br>Pledged Jennifer Sun<br> <a href="mailto:finance-vp@calaphio.com">finance-vp@calaphio.com</a></p>
			</li>
			<li>
			<a href="excomm/FVP2.jpg">
				<img src="excomm/FVP2.jpg" width="210" height="315" alt="Fellowship Vice President, Polly Luu">
			</a>
			<p align='center'> <b>FELLOWSHIP VICE PRESIDENT</b><br> Polly Luu <br>Economics, 2014<br>Pledged Charles P. Zlatkovich<br> <a href="mailto:fellowship-vp@calaphio.com">fellowship-vp@calaphio.com</a></p>
			</li>
			<li>
			<a href="excomm/PM2.jpg">
				<img src="excomm/PM2.jpg" width="210" height="315" alt="Pledgemaster, Tonia Tran">
			</a>
			<p align='center'> <b>PLEDGEMASTER</b> <br>Tonia Tran <br>Political Science, 2013<br>Pledged Katherine Strausser<br> <a href="mailto:pledgemaster@calaphio.com">pledgemaster@calaphio.com</a></p>
			</li>
			<li>
			<a href="excomm/Historian2.jpg">
				<img src="excomm/Historian2.jpg" width="210" height="315" alt="Chapter Historian, Katie Chen">
			</a>
			<p align='center'> <b>CHAPTER HISTORIAN</b><br> Katie Chen<br>Integrative Biology, 2013<br>Pledged Jennifer Sun <br> <a href="mailto:historian@calaphio.com">historian@calaphio.com</a></p>
			</li>
			</ul>
	</div>

	<script>
		$('#galleryDiv').photobox('a',{ thumbs:true });
	</script>
DOCHERE_print_gg_maniac_poll_create;

Template::print_body_footer();
Template::print_disclaimer();
?>
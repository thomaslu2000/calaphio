<?php
require("include/includes.php");
require("include/Calendar.class.php");
require("include/Template.class.php");
Template::print_head(array());
Template::print_body_header('Calendar', 'REIMBURSE');
?>


	<h2><b>REIMBURSEMENTS</h2><br/>

	<p>You are required to fill out the following <a href="https://goo.gl/forms/6nRJD4CyjqbIv1WF3" target="_blank">FORM</a><br/>

	<p>Electronic Receipts - Submit necessary documents on google form<br/><br/>

	
	<p>Physical Copy of Receipts - write down these information for reimbursements  <br/>
	and give it to either <a href="profile.php?user_id=4946">Amber Yim</a>, <a href="profile.php?user_id=4957">George Wang</a>, <a href="profile.php?user_id=5087">Ozzy Valadez</a>, or <a href="profile.php?user_id=5016">Rachelle DeGuzman</a>: <br/><br/>
	Name <br/>
	SID <br/>
	E-Mail <br/>
	Address <br/>
	Phone Number <br/>
	Reason for Reimbursement<br/><br/>

	Don't forget that you can get half your public transportation fee reimbursed too, <br />
	such as BART tickets if you get the receipt by paying with credit card. <br />
	However, if you cross any toll bridge, ask for a receipt and you'll get reimbursed full if you are driving. <br />
	Note: these only pertain to service event <br/>





<?php
Template::print_body_footer();
Template::print_disclaimer();
?>

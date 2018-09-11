<?php
require("include/includes.php");
require("include/Calendar.class.php");
require("include/Template.class.php");
Template::print_head(array());
Template::print_body_header('Calendar', 'REIMBURSE');
?>

if (!$g_user->is_logged_in()) {
    echo '<img style="float: right" src="images/lfs_banner.png" alt="LFS" />';
}
?>

<?php if ($g_user->is_logged_in()): ?>


	<h2><b>REIMBURSEMENTS</h2><br/>

	<p>You are required to fill out the following <a href="https://goo.gl/forms/wl4B7QyoexsN5R4c2" target="_blank">FORM</a><br/>


	<p>Electronic Receipts - Submit necessary documents on google form<br/><br/>

	<p>Physical Copy of Receipts - write down these information for reimbursements  <br/>
	and give it to either <a href="profile.php?user_id=4803">Samantha Wang</a>, <a href="profile.php?user_id=4795">Kevin Chuang</a>, or <a href="profile.php?user_id=4796">Evelyn Chan</a>: <br/><br/>
	Name <br/>
	SID <br/>
	E-Mail <br/>
	Address <br/>
	Phone Number <br/>
	Reason for Reimbursement<br/><br/>

	Don't forget that you can get half your public transportation fee reimbursed too, <br />
	such as BART tickets if you get the receipt by paying with credit card. <br />
	However, if you cross any toll bridge, ask for a receipt and you'll get reimbursed full if you are driving. <br />
	*Note: these only pertain to service events <br />



<?php
Template::print_body_footer();
Template::print_disclaimer();
?>
<?php
require("include/includes.php");
require("include/Calendar.class.php");
require("include/Template.class.php");
Template::print_head(array());
Template::print_body_header('Calendar', 'REIMBURSE');
?>
<h2><b>REIMBURSEMENTS/b></h2><br/>

<b>You are required to fill out the following form:</b><br/>
https://goo.gl/forms/7ad3kGYINWXaCNNx2


<p><b>Electronic Receipts</b> - Submit necessary documents on google form<br/><br/>

<p><b>Physical Copy of Receipts</b> - write down these information for reimbursements  <br/>
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
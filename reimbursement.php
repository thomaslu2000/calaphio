<?php
require("include/includes.php");
require("include/Calendar.class.php");
require("include/Template.class.php");
Template::print_head(array());
Template::print_body_header('Calendar', 'REIMBURSE');
?>
<h2><b>How Reimbursements Work</b></h2><br/>
<p>You need the receipt and write down these information for reimbursements  <br/>
and give it to either the Finance VP or Reimbursement Chair: <br/><br/>
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
<h2><b>Driver Reimbursement Form</b></h2><br/>
<p><a href="/documents/TransportReimbForm.pdf"> TransportReimbForm.pdf </a></p><br/>		
<p>Only for service events. Fill out all fields except "Bus fare" and "BART fare," attach receipts, and turn into reimbursement chair.</p>
<?php
Template::print_body_footer();
Template::print_disclaimer();
?>
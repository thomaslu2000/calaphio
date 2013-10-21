<?php
require("include/includes.php");
require("include/Calendar.class.php");
require("include/Template.class.php");
Template::print_head(array());
Template::print_body_header('Brothers', 'ALUMNI');
?>
<p>Visit the <a href="http://www.facebook.com/group.php?gid=101430558612">Gamma Gamma Alumni Association Facebook Group</a>.</p>
<h2> Alumni Mentors! </h2>
<iframe width="940" height="500" src="https://docs.google.com/spreadsheet/pub?key=0Ar71tLU30hK3dHJCNkJfWE5xeXN1MkhMZFpSNUVlNHc&output=html"></iframe>
<?php
Template::print_body_footer();
Template::print_disclaimer();
?>
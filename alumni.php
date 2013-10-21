<?php
require("include/includes.php");
require("include/Calendar.class.php");
require("include/Template.class.php");
Template::print_head(array());
Template::print_body_header('Brothers', 'ALUMNI');
?>
<iframe src="https://docs.google.com/spreadsheet/pub?key=0Ar71tLU30hK3dHJCNkJfWE5xeXN1MkhMZFpSNUVlNHc&output=html"></iframe>
<p>Visit the <a href="http://www.facebook.com/group.php?gid=101430558612">Gamma Gamma Alumni Association Facebook Group</a>.</p>
<?php
Template::print_body_footer();
Template::print_disclaimer();
?>
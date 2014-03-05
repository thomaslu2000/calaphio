<?php
require("include/includes.php");
require("include/Calendar.class.php");
require("include/Template.class.php");
Template::print_head(array());
Template::print_body_header('Brothers', 'ALUMNI');
?>
<p>Visit the <a href="http://www.facebook.com/group.php?gid=101430558612">Gamma Gamma Alumni Association Facebook Group</a>.</p>
<?php if ($g_user->is_logged_in()): ?>
<h2> Alumni Mentors! </h2>
<iframe width="940" height="500" src="https://docs.google.com/a/calaphio.com/spreadsheet/ccc?key=0AqwRWZpwK78jdExCbzJtdVpxMDBONmNtcXBKTkp3UHc&usp=sharing"></iframe>
<?php endif ?>
<?php
Template::print_body_footer();
Template::print_disclaimer();
?>
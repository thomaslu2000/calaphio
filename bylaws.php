<?php
require("include/includes.php");
require("include/Calendar.class.php");
require("include/Template.class.php");
Template::print_head(array());
Template::print_body_header('Home', 'BYLAWS');
if (!$g_user->is_logged_in()) {
	trigger_error("You must be logged in to view our Bylaws and Constitution.", E_USER_ERROR);
} else {
	echo <<<HEREDOC
<h2><b>Constitution and Bylaws</b></h2><br/>
<p>This is our Bylaws and Constitution. If you are interested, please read it.<br>
<br>
<br>
<a href="https://docs.google.com/document/d/1VLHwuLhXGo4POvNqJw3Z0VKzfBA0U3_sk1xcKrqC5bw/edit#">Gamma Gamma Constitution and Bylaws</a><br>
<br>
<a href="https://docs.google.com/document/d/1jYqmqp5uSSdhQLpTCtSpUEkWaRvT4JKftiD-n2Q-HgI#">Gamma Gamma Risk Management Policy</a><br>
<br>
</p>
HEREDOC;
}
Template::print_body_footer();
Template::print_disclaimer();
?>
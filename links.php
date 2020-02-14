<?php
require("include/includes.php");
require("include/Calendar.class.php");
require("include/Template.class.php");
Template::print_head(array());
Template::print_body_header('Home', 'USEFUL LINKS');
if (!$g_user->is_logged_in()) {
	trigger_error("You must be logged in to view our Useful Links.", E_USER_ERROR);
} else {
	echo <<<HEREDOC
<h2><b>Useful Links</b></h2><br />
<p>These are some Useful Links provided by our lovely Admin VP. Make sure you are signed into your Berkeley email and signed out of all other accounts before trying to access them.<br>
<br>
<br>
<a href="https://docs.google.com/forms/d/e/1FAIpQLScREpZacbUIqMidtcpTXfNpqPXmVETOlcEV4X2PiIUGFLsmWQ/viewform?edit">Spring 2020 Feedback Form</a>
<br>
<br>
<a href="https://docs.google.com/forms/d/1LV5UcYRKmrGvSyYNUJCliFSXEwEFrPBxiQFignWRboU/edit?usp=sharing">Website Suggestion Form</a>
<br>
<br>
<a href="https://docs.google.com/forms/d/1d56fnlldXb4aSoDlavL6Nj03hIZQZuCS2ATfWJ1XkBE/edit">Room Reservation Requests</a>
<br>
<br>
<a href="https://docs.google.com/forms/d/1Lyt30DjsV6WqRAw67tgWj6xyEOuvAkpql_f1-92rCYE/edit">Interest Form for Being a Tutor</a>
<br>
<br>
<a href="https://docs.google.com/forms/d/1CaUPwSKNuRQa6kqmQtQW05klES2aNNK-2OsONXIS8uI/edit">Tutoring Request Form</a>
<br>
<br>
<a href="https://docs.google.com/forms/d/1hH7zoxlOeE2hOD0lI5WgserfbmD5r8AsTUu0QkL7qvE/edit">Chegg / Coursehero Request Form</a>
<br>
<br>
<a href="https://docs.google.com/document/d/1Ndh2pYdeZtB-l6xaLhAi23Kr7IfakBJoZokbJ4d3o-k/edit?usp=sharing">Gamma Gamma Constitution and Bylaws</a>
<br>
<br>
<a href="https://docs.google.com/document/d/1jYqmqp5uSSdhQLpTCtSpUEkWaRvT4JKftiD-n2Q-HgI#">Gamma Gamma Risk Management Policy</a>
<br>
<br>
</p>
HEREDOC;
}
Template::print_body_footer();
Template::print_disclaimer();
?>
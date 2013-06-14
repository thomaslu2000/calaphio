<?php
require("include/includes.php");
require("include/Template.class.php");
Template::print_head(array());
Template::print_body_header('Home', 'ADMIN');

echo <<<HEREDOC
<script type="text/javascript" src="ajax.js"></script>
<script type="text/javascript" src="short_search.js"></script>
<h2>Membership Roster</h2>
<form method="get" action="" onsubmit="return false">
Quick Search: <input id="apo_short_search_input" type="text" />
</form>
<div id="apo_short_search_result" style="padding-left: 15ex"></div>

HEREDOC;

Template::print_body_footer();
Template::print_disclaimer();
?>
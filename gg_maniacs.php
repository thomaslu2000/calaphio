<?php
require("include/includes.php");
require("include/Calendar.class.php");
require("include/Template.class.php");
require("include/Shoutbox.class.php");
require("include/EvalNag.class.php");
require("include/GGManiacNag.class.php");
Template::print_head(array("site.css", "calendar.css", "excel.css"));
Template::print_body_header('Home', 'NEWS');
?>
<h1 class="center"></h1>
<div class="newsItem">
    <h2>DE Semester GG Maniacs!</h2>
    <div class="collage-container">
	<div class="collage-pictures">
		<div class="person-picture">
			<img src="documents/sp14/rush/lakana_bun.jpg"></img>
			<p class="center">Lakana Bun</p>
			
		</div>
		<div class="person-picture">
			<img src="documents/sp14/rush/sharon_wang.jpg"></img>
			<p class="center">Sharon Wang</p>
		</div>
		<div class="person-picture">
			<img src="documents/sp14/rush/wiemond_wu.jpg"></img>
			<p class="center">Wiemond Wu</p>
		</div>
	</div>
	<div style="clear: left;"></div>
    </div>
</div>
<?php
Template::print_body_footer();
Template::print_disclaimer();
?>
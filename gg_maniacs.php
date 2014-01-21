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
<h1 class="center">Gamma Gamma Maniacs!</h1>
<div class="newsItem">
    <h2 class="center">DE Semester GG Maniacs!</h2>
    <div class="collage-container">
	<div class="collage-pictures">
		<div class="person-picture">
			<p class="center">Sridatta Thatipamala </p>
		</div>
		<div class="person-picture">
			<p class="center">Kevin Nguyen</p>
		</div>
		<div class="person-picture">
			<p class="center">Zachary Lee</p>
		</div>
		<div class="person-picture">
			<p class="center">Ben Le</p>
			
		</div>
		<div class="person-picture">
			<p class="center">Christopher Ching</p>
		</div>
		<div class="person-picture">
			<p class="center">Jejee Alisa Hasdarngkul</p>
		</div>
		<div class="person-picture">
			<p class="center">TinOi Lui</p>
		</div>
		
	</div>
	<div style="clear: left;"></div>
    </div>
</div>
<div class="newsItem">
    <h2 class="center">DE Semester Pledge Maniacs!</h2>
    <div class="collage-container">
	<div class="collage-pictures">
		<div class="person-picture">
			<p class="center">Sharon Wang </p>
		</div>
		<div class="person-picture">
			<p class="center">Lakana Bun</p>
		</div>
		<div class="person-picture">
			<p class="center">Dennis Lee</p>
		</div>

	</div>
	<div style="clear: left;"></div>
    </div>
</div>
<?php
Template::print_body_footer();
Template::print_disclaimer();
?>
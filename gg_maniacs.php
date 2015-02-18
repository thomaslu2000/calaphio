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
<h1>Gamma Gamma Maniacs!</h1>
<div class="newsItem">
    <h2 class="center">TT Semester GG Maniacs!</h2>
    <div class="collage-container">
	<div class="collage-pictures">
		<div class="person-picture">
			<p class="center">Antony Nguyen </p>
		</div>
	</div>
	<div style="clear: left;"></div>
    </div>
</div>
<div class="newsItem">
    <h2 class="center">KHK Semester GG Maniacs!</h2>
    <div class="collage-container">
	<div class="collage-pictures">
		<div class="person-picture">
			<p class="center">Jason Lee </p>
		</div>
		<div class="person-picture">
			<p class="center">Scottie Wan</p>
		</div>
		<div class="person-picture">
			<p class="center">Michael Zhu</p>
		</div>
		<div class="person-picture">
			<p class="center">Cathy Yin</p>
		
		</div>
		<div class="person-picture">
			<p class="center">Vivian Rubio</p>
		</div>
		<div class="person-picture">
			<p class="center">Alex Quan</p>
		</div>
		<div class="person-picture">
			<p class="center">Kathleen Wong</p>
		</div>
		
	</div>
	<div style="clear: left;"></div>
    </div>
</div>
<div class="newsItem">
    <h2 class="center">KHK Semester Pledge Maniacs!</h2>
    <div class="collage-container">
	<div class="collage-pictures">
		<div class="person-picture">
			<p class="center">Virgil Tang</p>
		</div>
		<div class="person-picture">
			<p class="center">Joanna Choi</p>
		</div>
		<div class="person-picture">
			<p class="center">Nicki Bartak</p>
		</div>
	</div>
	<div style="clear: left;"></div>
    </div>
</div>
<div class="newsItem">
    <h2 class="center">CM Semester GG Maniacs!</h2>
    <div class="collage-container">
	<div class="collage-pictures">
		<div class="person-picture">
			<p class="center">Rebecca Phuong </p>
		</div>
		<div class="person-picture">
			<p class="center">James Wang</p>
		</div>
		<div class="person-picture">
			<p class="center">Annie Ferguson</p>
		</div>
		<div class="person-picture">
			<p class="center">Ryan Fong</p>
		
		</div>
		<div class="person-picture">
			<p class="center">Angela Wu</p>
		</div>
		<div class="person-picture">
			<p class="center">Christopher Wen</p>
		</div>
		<div class="person-picture">
			<p class="center">Pooja Shah</p>
		</div>
		
	</div>
	<div style="clear: left;"></div>
    </div>
</div>
<div class="newsItem">
    <h2 class="center">CM Semester Pledge Maniacs!</h2>
    <div class="collage-container">
	<div class="collage-pictures">
		<div class="person-picture">
			<p class="center">The Lee</p>
		</div>
		<div class="person-picture">
			<p class="center">Jason Lee</p>
		</div>
		<div class="person-picture">
			<p class="center">Kevin Li Lu</p>
		</div>
	</div>
	<div style="clear: left;"></div>
    </div>
</div>
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

<div class="newsItem">
    <h2 class="center">KK Semester GG Maniacs!</h2>
    <div class="collage-container">
	<div class="collage-pictures">
		<div class="person-picture">
			<p class="center">Sara Vidovic</p>
		</div>
		<div class="person-picture">
			<p class="center">Susan Guan</p>
		</div>
		<div class="person-picture">
			<p class="center">Yoyo Tsai</p>
		</div>
		<div class="person-picture">
			<p class="center">Nancy Tran</p>
			
		</div>
		<div class="person-picture">
			<p class="center">Karen Wu</p>
		</div>
		<div class="person-picture">
			<p class="center">Debbie Yan</p>
		</div>
		<div class="person-picture">
			<p class="center">Rosie Fan</p>
		</div>
		
	</div>
	<div style="clear: left;"></div>
    </div>
</div>
<div class="newsItem">
    <h2 class="center">KK Semester Pledge Maniacs!</h2>
    <div class="collage-container">
	<div class="collage-pictures">
		<div class="person-picture">
			<p class="center">Kelsey Chan </p>
		</div>
		<div class="person-picture">
			<p class="center">Bella Tsay</p>
		</div>
		<div class="person-picture">
			<p class="center">Karen Kim</p>
		</div>

	</div>
	<div style="clear: left;"></div>
    </div>
</div>

<div class="newsItem">
    <h2 class="center">MH Semester GG Maniacs!</h2>
    <div class="collage-container">
	<div class="collage-pictures">
		<div class="person-picture">
			<p class="center">Elizabeth Sabiniano</p>
		</div>
		<div class="person-picture">
			<p class="center">Pamudh K. </p>
		</div>
		<div class="person-picture">
			<p class="center">Vivian Nguyen</p>
		</div>
		<div class="person-picture">
			<p class="center">Derek Young</p>
			
		</div>
		<div class="person-picture">
			<p class="center">Jeff S.</p>
		</div>
		<div class="person-picture">
			<p class="center">Austin Shieh</p>
		</div>
		<div class="person-picture">
			<p class="center">Stephanie Chan</p>
		</div>
		
	</div>
	<div style="clear: left;"></div>
    </div>
</div>
<div class="newsItem">
    <h2 class="center">MH Semester Pledge Maniacs!</h2>
    <div class="collage-container">
	<div class="collage-pictures">
		<div class="person-picture">
			<p class="center">Ngoc Tran </p>
		</div>
		<div class="person-picture">
			<p class="center">Cindy Pear Luu</p>
		</div>
		<div class="person-picture">
			<p class="center">Jane Tam</p>
		</div>

	</div>
	<div style="clear: left;"></div>
    </div>
</div>

<div class="newsItem">
    <h2 class="center">JS Semester GG Maniacs!</h2>
    <div class="collage-container">
	<div class="collage-pictures">
		<div class="person-picture">
			<p class="center">Polly Luu</p>
		</div>
		<div class="person-picture">
			<p class="center">Robert Yu </p>
		</div>
		<div class="person-picture">
			<p class="center">April Hishinuma</p>
		</div>
		<div class="person-picture">
			<p class="center">Tannia Soto</p>
			
		</div>
		<div class="person-picture">
			<p class="center">Peggy Wu</p>
		</div>
		<div class="person-picture">
			<p class="center">Matthew Chong</p>
		</div>
		<div class="person-picture">
			<p class="center">Kaitlin Fronberg</p>
		</div>
		
	</div>
	<div style="clear: left;"></div>
    </div>
</div>
<div class="newsItem">
    <h2 class="center">JS Semester Pledge Maniacs!</h2>
    <div class="collage-container">
	<div class="collage-pictures">
		<div class="person-picture">
			<p class="center">Jeff Ho </p>
		</div>
		<div class="person-picture">
			<p class="center">Jeff Zeng</p>
		</div>
		<div class="person-picture">
			<p class="center">Justina Liang</p>
		</div>

	</div>
	<div style="clear: left;"></div>
    </div>
</div>

<div class="newsItem">
    <h2 class="center">CPZ Semester GG Maniacs!</h2>
    <div class="collage-container">
	<div class="collage-pictures">
		<div class="person-picture">
			<p class="center">Toshiki</p>
		</div>
		<div class="person-picture">
			<p class="center">Tonia Tran </p>
		</div>
		<div class="person-picture">
			<p class="center">Nicki Fox</p>
		</div>	
	</div>
	<div style="clear: left;"></div>
    </div>
</div>
<div class="newsItem">
    <h2 class="center">CPZ Semester Pledge Maniacs!</h2>
    <div class="collage-container">
	<div class="collage-pictures">
		<div class="person-picture">
			<p class="center">Patty Chen </p>
		</div>
		<div class="person-picture">
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

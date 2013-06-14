<?php
require("include/includes.php");
require("include/Calendar.class.php");
require("include/Template.class.php");
Template::print_head(array("site.css", "calendar.css"));
Template::print_body_header('Calendar', 'AWARDS');
?>

<?php if ($g_user->is_logged_in()): ?>
	<div id="awards">
		
		<h1> Gamma Gamma Chapter Awards </h1>
		</br>
		<p>The Gamma Gamma Chapter Awards Program has been recently developed for the purpose of formally recognizing and acknowledging accomplishments by actives. The Awards Program is a way for the chapter to express gratitude to each outstanding active who has gone above and beyond to embody one, or all, of the principles of Leadership, Friendship, and Service.</p></br>

		<h2>Active Awards Program</h2>
			<ul>
				<li>General Awards are awarded to everyone who fulfills the requirements.</li>
						</ul></br>

			<h2>How to get Awards</h2>
			<ul>
				<li>Provide a list of events attended (Print your requirements page).</li>
				<li>Due at CM 8 to ExComm.</li>
				<li>General awards WILL NOT be used to determine Sturdy Oak.</li>
			</ul></br>


			<h2>Driving Awards</h2>
			<ul>
				<li>1st place: Most miles driven ($30 gas card).</li>
				<li>2nd place: ($25 gas card).</li>
				<li>3rd place: ($20 gas card).</li>
			</ul></br>
	</div>
	<div id="award_requirements">
		<table>
			<tr>
				<td><strong>General Leadership</strong></td>
				<td><strong>General Friendship</strong></td>
				<td><strong>General Service</strong></td>
				
			</tr>
			<tr>
				<td>Chair at least 5 fellowships/service</td>
				<td>Chair at least 3 fellowships</td>
				<td>Chair at least 3 service projects</td>
			
			</tr>
			<tr>
				<td>Hold at least 1 ExComm chairing position</td>
				<td>Attend at least 20 fellowships</td>
				<td>Complete at least 40 hours of service</td>
				
			</tr>
			<tr>
				<td>Go to 1 of 3 (LEADS, Leadership Workshop, Sectionals/Fall Fellowship/Regionals/Nationals)</td>
				<td>Attend 1 IC or GG Fellowship</td>
				<td>Complete 4 C's or one of the chapter-initiated service events</td>
			</tr>

			<tr>
				<td colspan="1">
					<ul>
					<li style="text-decoration:underline;"><strong>Inter-Chapter Maniac</strong></li>
					<li>Awarded to 2 brothers who attended the most IC events (no application required).</li>
					</ul>
				</td>
				<td colspan="2">
					<ul>
					<li style="text-decoration:underline;"><strong>Driving Maniac</strong></li>
					<li>Awarded to 3 brothers who drives the most for the chapter (no application required).</li>

				</ul>
		</table>
		</div>
	</div>
<?php endif ?>

<?php
Template::print_body_footer();
Template::print_disclaimer();
?>
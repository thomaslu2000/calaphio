<?php
require("include/includes.php");
require("include/Template.class.php");
Template::print_head(array("site.css", "calendar.css", "excel.css"));
Template::print_body_header('Home', 'NEWS');

$survey_id=1;
$user_id=$g_user->data['user_id'];

$query = new Query("SELECT * FROM apo_surveys WHERE survey_id=$survey_id LIMIT 1");
$query2 = new Query("SELECT questions.question_id FROM apo_survey_questions AS questions JOIN apo_survey_responses AS responses ON (questions.question_id = responses.question_id) WHERE survey_id=$survey_id AND user_id=$user_id LIMIT 1");
if (!($row = $query->fetch_row())) {
	$g_user->redirect("index.php");
} else if (!$g_user->is_logged_in()) {
	trigger_error("You must be logged in to view this page.");
//} else if ($user_id != $row['user_id']) {
//	trigger_error("Only the survey creator may view the results.");
} else {
	echo <<<HEREDOC
<h1 style="margin-bottom: 1em;">$row[title]</h1>

HEREDOC;
	
	$query = new Query("SELECT questions.* FROM apo_survey_questions AS questions WHERE survey_id=$survey_id ORDER BY questions.priority");
	$query2 = new Query("SELECT options.question_id, options.value, count(*) AS count FROM apo_survey_questions AS questions JOIN apo_survey_question_options AS options ON (questions.question_id = options.question_id) JOIN apo_survey_responses AS responses ON (options.option_id = responses.option_id) WHERE survey_id=$survey_id GROUP BY options.question_id, options.value, responses.option_id ORDER BY questions.priority, options.priority");
	$options = $query2->fetch_row();
	if (!$options) {
		echo "<strong>No results yet</strong>\r\n";
	}
	while ($questions = $query->fetch_row()) {
		if (!$options) {
			break;
		} else if ($options['question_id'] != $questions['question_id']) {
			continue;
		} else {
			echo <<<HEREDOC
<strong>$questions[question]</strong>
<ul style="margin: 0px 0px 1em 0px; margin-left: 1em;">

HEREDOC;
			do {
				echo <<<HEREDOC
<li>$options[value] - $options[count]</li>

HEREDOC;
				$options = $query2->fetch_row();
			} while ($options && $options['question_id'] == $questions['question_id']);
			echo <<<HEREDOC
</ul>

HEREDOC;
		}
	}
}

Template::print_body_footer();
Template::print_disclaimer();
?>
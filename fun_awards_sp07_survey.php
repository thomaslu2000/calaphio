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
	trigger_error("You must be logged in to take this survey.");
} else if ($query2->fetch_row()) {
	trigger_error("You've already taken this survey.");
} else if (isset($_POST['submit'])) {
	$query = new Query("SELECT questions.* FROM apo_survey_questions AS questions WHERE survey_id=$survey_id ORDER BY questions.priority");
	while ($questions = $query->fetch_row()) {
		if (isset($_POST['question_' . $questions['question_id']]) && is_numeric($_POST['question_' . $questions['question_id']])) {
			$response = $_POST['question_' . $questions['question_id']];
			new Query("INSERT INTO apo_survey_responses (question_id, user_id, option_id) VALUES ($questions[question_id], $user_id, $response)");
		}
	}
	echo <<<HEREDOC
<h1 style="margin-bottom: 1em;">$row[title]</h1>
<strong>Thanks for submitting!</strong>

HEREDOC;
} else {
	echo <<<HEREDOC
<h1 style="margin-bottom: 1em;">$row[title]</h1>
<form method="post" action="">

HEREDOC;
	
	$query = new Query("SELECT questions.* FROM apo_survey_questions AS questions WHERE survey_id=$survey_id ORDER BY questions.priority");
	$query2 = new Query("SELECT options.* FROM apo_survey_questions AS questions JOIN apo_survey_question_options AS options ON (questions.question_id = options.question_id) WHERE survey_id=$survey_id ORDER BY questions.priority, options.priority");
	$options = $query2->fetch_row();
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
<li><input type="$questions[type]" name="question_$options[question_id]" value="$options[option_id]" /> $options[value]</li>

HEREDOC;
				$options = $query2->fetch_row();
			} while ($options && $options['question_id'] == $questions['question_id']);
			echo <<<HEREDOC
</ul>

HEREDOC;
		}
	}
	
	echo <<<HEREDOC
<button type="submit" name="submit" value="1">Submit</button>
</form>

HEREDOC;
}

Template::print_body_footer();
Template::print_disclaimer();
?>
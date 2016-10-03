<?php
	$to = 'jyoung96@berkeley.edu';
    $email = $_POST['event_post_comment'];
    $subject = 'Test';
    $message = 'Will this actually work?';

    mail($to, $email, $subject, $message);
?>
<?php
    $email=$_POST['event_post_comment'];
    $subject = 'Test';
    $message = 'Will this actually work?';

    mail($email, $subject, $message);
?>
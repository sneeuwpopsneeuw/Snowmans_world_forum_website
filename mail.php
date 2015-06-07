<?php
$to      = 'sneeuwpopsneeuw@live.nl';
$subject = 'the subject';
$message = 'jemoeder.com';
$headers = 'From: jammer@jammer.com' . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
?>


<?php
// The message
$message = "Line 1\r\nLine 2\r\nLine 3";

// In case any of our lines are larger than 70 characters, we should use wordwrap()
$message = wordwrap($message, 70, "\r\n");

// Send
mail('sneeuwpopsneeuw@live.nl', 'My Subject', $message);
?>
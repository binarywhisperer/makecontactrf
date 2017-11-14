<?php
$recipients = [
    'Bryce<bryce@brycesharp.com>',
    'Bryce Sharp<bryceriverrsharp@gmail.com>',
    'Winners<social@tournamentofwinners.com>'
];
$email = $_POST['email'];
$name = $_POST['name'];
$message = $_POST['message'];
$to = implode($recipients,',');
$headers = "From: $email\r\nReply-To:$email\r\n";
$subject = "$name - MakeContactRF";
$sent = mail($to, $subject, $message, $headers);

session_start();
$_SESSION = $_POST;
$_SESSION['sent'] = $sent;
header('Location: http://makecontact.rf');
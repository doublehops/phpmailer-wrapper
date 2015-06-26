<?php

    require_once 'vendor/autoload.php';
    require_once 'Mailer.php';

    $mailer = new \Mailer(['host' => '',
                           'port' => 587,
                           'username' => '',
                           'password' => '',
                           'from' => '',
                           'fromName' => '',
                           'toAddress' => '',
                           'toName' => '', 
    ]);

    $name = $mailer->validateString($_POST['name'], 'name');
    $email = $mailer->validateEmail($_POST['email']);
    $subject = $mailer->validateString($_POST['subject'], 'subject');
    $message = $mailer->validateString($_POST['message'], 'message');

    $subject = 'Website enquiry: '. $subject;

    $body = "Mail sent from website\n\n";
    $body .= 'From: '. $name .'; email: '. $email ."\n\n";
    $body .= $message;

    $mailer->sendMail($subject, $body);

<?php require_once 'vendor/autoload.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<title>Form submission</title>
   
    <link href="css/mobile-style.css" rel="stylesheet" type="text/css">
    <link rel="icon" type="image/png" href="/img/favicon.png" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="js/form-submit.js"></script>
</head>
<body>
            	<form action="send-mail.php" id="form" class="form" method="post" enctype="application/x-www-form-urlencoded" accept-charset="UTF-8">
    <h1>Rocket Orange</h1>
    <div class="content">
        <div class="intro"></div>
        <div id="section0" >
        </div>
        <h2 class="section">Melbourne, Vic</h2>
        <div id="section1" >
            <div class="loader" style="display: none;"><div class="transbox"></div></div>
            <div class="field"><label for="name">Name</label><input type="text" id="name" name="name" placeholder="Name (required)" maxlength="140" size="50%" required></div>
            <div class="field"><label for="email">Email</label><input type="email" id="email" name="email" placeholder="Email (required)" maxlength="140" required></div>
            <div class="field"><div class="edit-options"><div class="edit"></div><div class="delete"></div></div><label for="subject">Subject</label><input type="text" id="subject" name="subject" placeholder="Subject (required)" maxlength="140" required></div>
            <div class="field"><label for="message">Message</label><textarea id="message" name="message" placeholder="Message (required)" maxlength="2000" wrap="hard" required></textarea></div>
            <div class="field"><input type="submit" id="submit" name="submit" value="SUBMIT"></div>
        </div>
    </div>
</form>
</body>
</html>

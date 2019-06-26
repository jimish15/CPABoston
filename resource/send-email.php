<?php

require 'class.phpmailer.php';

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Port = 587;
$mail->Host = 'smtp.gmail.com';
$mail->IsHTML(true);
$mail->Mailer = 'smtp';
$mail->SMTPSecure = 'tls';

$mail->SMTPAuth = true;
$mail->Username = "jimish827@gmail.com";
$mail->Password = "Pwd@1234";

//Sender Info
$mail->From = "no-reply@boston.gov";
$mail->FromName = "City of Boston";
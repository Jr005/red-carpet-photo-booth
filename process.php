<?php
require('mailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
//$mail->SMTPDebug = 3;                               
$fromname='contact us';
$row='sales@redcarpetphotobooth.com';
//$mail->isSMTP(); 
// start smtp authentication                                     
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'webdevelpoer016@gmail.com'; // here your any gmail id (LESS SECURE APP option must be ON for this go to security tab)
$mail->Password = 'panchi.com.pk'; // correct password
$mail->SMTPSecure = 'ssl';  
$mail->Port = 465;                                
$mail->FromName=$fromname;
$mail->addBCC($row,$fromname);
$mail->AddReplyTo($_POST['email']);          
$mail->isHTML(true);                                  
$mail->Subject = 'Received New Email';
$mail->Body    = '<b><font color=green>HI, Admin you have received an email from '.$_POST['name'].' detail is below:</font></b><br>Name: '.$_POST['name'].'<br>Email: '.$_POST['email'].'<br>Phone: '.$_POST['phone'].'<br>Event Address: '.$_POST['address'].'<br>Event Type: '.$_POST['event'].'<br>How Did You Hear About Us?: '.$_POST['hear'].'<br>Photo Booth Interested In: '.$_POST['membership'].'<br>Event Date: '.$_POST['eventd'].'<br>Photo Booth Rental Start Time: '.$_POST['stime'].'<br>Photo Booth Rental End Time: '.$_POST['etime'].'<br>Message: '.$_POST['message'].'<br>Thank you...';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
   echo'<div style="color:white;"><strong>Thank you! Email has been sent.</strong></div>';
    echo'<script>$("#reset")[0].reset()</script>';
}


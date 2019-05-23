<?php
/**
 * This example shows sending a message using PHP's mail() function.
 */

require 'phpmailer/PHPMailerAutoload.php';

//Create a new PHPMailer instance
$mail = new PHPMailer;
//Set who the message is to be sent from
$mail->setFrom('zsolt@example.com', 'Zsolt Gere');
//Set an alternative reply-to address
$mail->addReplyTo('zsolt@example.com', 'Zsolt Gere');
//Set who the message is to be sent to
$mail->addAddress('peter@example.com', 'Peter Reporter');
//Set the subject line
$mail->Subject = 'Weekly chart';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->Body = 'Hello Peter, <br /> please find attached this week\'s chart for your report. <br />Regards, <br /> Zsolt Gere';
//Replace the plain text body with one created manually
$mail->AltBody = 'Hello Peter, please find attached this week\'s chart for your report. Regards, Zsolt Gere';
//Attach an image file
$mail->addAttachment('exporter/chart-images/exporting-a-chart-as-an-image.png', 'exporting-a-chart-as-an-image.png');

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}

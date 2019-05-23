<?php
//Get PHPmailer from https://github.com/Synchro/PHPMailer
require 'phpmailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->From = 'zsolt.gere@company.com';
$mail->FromName = 'Zsolt Gere';

$mail->addAddress('reporting@company.com', 'Peter Reporter');	

$mail->Subject = 'Chart for this week';
$mail->Body    = 'Hello Peter, <br /> please find attached this week\'s chart for your report. <br />Regards, <br /> Zsolt Gere';
$mail->AltBody = 'Hello Peter, please find attached this week\'s chart for your report. Regards, Zsolt Gere';

$mail->addAttachment('exporter/chart-images/exporting-a-chart-as-an-image.png', 'exporting-a-chart-as-an-image.png');

if(!$mail->send()) {
    echo 'Email could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Email has been sent';
}
?>
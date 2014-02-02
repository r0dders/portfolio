
<?php
function Send_Mail($to,$subject,$body)
{
	require 'class.phpmailer.php';
	$from = "robbowden78@gmail.com";
	$mail = new PHPMailer();
	$mail->IsSMTP(true); // SMTP
	$mail->SMTPDebug = 1;
	$mail->SMTPAuth   = true;  // SMTP authentication
	$mail->SMTPSecure = 'ssl';
	$mail->Mailer = "smtp";
	$mail->Host       = "smtp.gmail.com"; // Amazon SES server, note "tls://" protocol
	$mail->Port       = 465;                    // set the SMTP port
	$mail->Username   = "robbowden78@gmail.com";  // SES SMTP  username
	$mail->Password   = "r0dd3rs007";  // SES SMTP password
	$mail->SetFrom($from, 'Test Server');
	$mail->AddReplyTo($from,'Home test server');
	$mail->Subject = $subject;
	$mail->MsgHTML($body);
	$address = $to;
	$mail->AddAddress($address, $to);

	if(!$mail->Send()){
		echo "Mailer Error: " . $mail->ErrorInfo;
		} else {
		echo "Message sent!";

	}
}
?>
<?php
function send_mail($to,$subject,$body)
{
    error_reporting(E_STRICT);

    require '/php_mailer/class.phpmailer.php';
    $from       = "robbowden78@gmail.com";
    $mail       = new PHPMailer();
    $mail->IsSMTP(true);    // use SMTP
    $mail->SMTPDebug = 1;   // enables SMTP debug information (for testing)
                            // 1 = errors and messages
                            // 2 = messages only
    $mail->SMTPAuth   = true;                  // enable SMTP authentication
    $mail->Host       = "smtp.gmail.com";    // SMTP host
    $mail->Port       =  465;    // SMTP port
    $mail->Username   = "robbowden78@gmail.com";    // SMTP username
    $mail->Password   = "r0dd3rs007";    // SMTP  password
    $mail->SetFrom($from, 'Test');
    $mail->AddReplyTo($from,"robbowden78@gmail.com");
    $mail->Subject    = $subject;
    $mail->MsgHTML($body);
    $address = $to;
    $mail->AddAddress($address, $to);
    $mail->Send();

    if(!$mail->Send()) {
      echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
      echo "Message sent!";
    }

}
?>
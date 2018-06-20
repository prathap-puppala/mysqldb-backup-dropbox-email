<?php
    require_once('class.phpmailer.php');
    function sendmail($to,$subject,$message,$name)
    {
                  $mail             = new PHPMailer();
                  $body             = $message;
                  $mail->IsSMTP();
                  $mail->SMTPAuth   = true;
                  $mail->Host       = "smtp.zoho.com";
                  $mail->Port       = 587;
                  $mail->Username   = "bes@smartquint.com";
                  $mail->Password   = "";
                  $mail->SMTPSecure = 'tls';
                  $mail->SetFrom('bes@smartquint.com', 'SmartQuint BES');
                  $mail->AddReplyTo("bes@smartquint.com","SmartQuint BES");
                  $mail->Subject    = $subject;
                  $mail->AltBody    = "Any message.";
                  $mail->MsgHTML($body);
                  $address = $to;
                  $mail->AddAddress($address, $name);
                  if(!$mail->Send()) {
                      return 0;
                  } else {
                        return 1;
                 }
    }

      $to       =   "prathappuppala13@gmail.com";
      $subject  =   "This week Top Posts";
      $message  =   "hello <br>";
      $name     =   "Prathap Puppala";
      $mailsend =   sendmail($to,$subject,$message,$name);
      if($mailsend==1){
        echo '<h2>email sent.</h2>';
      }
      else{
        echo '<h2>There are some issue.</h2>';
      }
?>
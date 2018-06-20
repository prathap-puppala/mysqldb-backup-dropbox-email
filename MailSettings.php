<?php
date_default_timezone_set("Asia/Kolkata");
require_once('phpmailer/class.phpmailer.php');
function sendmail($dbname,$filename,$status){
//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded
$mail = new PHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch
$d=strtotime(date("h:ia M d Y"));
$mail->IsSMTP(); // telling the class to use SMTP
try {
  $mail->Host       = "ssl://smtp.zoho.com"; // SMTP server
  $mail->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)
  $mail->SMTPAuth   = true;                  // enable SMTP authentication
  $mail->Host       = "ssl://smtp.zoho.com"; // sets the SMTP server
  $mail->Port       = 465;                    // set the SMTP port for theserver
  $mail->Username   = "mail@yourname.com"; // SMTP account username
  $mail->Password   = "password";        // SMTP account password
  $mail->AddReplyTo('mail@yourname.com', 'First Last');
  $mail->AddAddress('mail@yourname.com', 'First Last');
  $mail->SetFrom('mail@yourname.com', 'First Last');
  $mail->AddReplyTo('mail@yourname.com', 'First Last');
  if($status=="success"){$mail->Subject = 'Backup of '.$dbname.' to DropBox is succeded as on '.date("Y-m-d h:i:sa", $d);}
  else{$mail->Subject = 'Backup of '.$dbname.' is failed as on '.date("Y-m-d h:i:sa", $d);}
  $mail->AltBody = 'To view the message, please use an HTML compatible email viewer!'; // optional - MsgHTML will create an alternate automatically
  $mail->MsgHTML("Status of Backup is ".$status);
  $mail->Send();
  return true;
} catch (phpmailerException $e) {
  return $e->errorMessage(); //Pretty error messages from PHPMailer
} catch (Exception $e) {
  return $e->getMessage(); //Boring error messages from anything else!
}
}

?>

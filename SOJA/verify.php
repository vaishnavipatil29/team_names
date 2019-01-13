<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/OAuth.php';
function sendMail($emailadd) {
	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = "tls";
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 587;
	$mail->Username = 'iitdhmusicclub@gmail.com';
	$mail->Password = 'music@iitdh';
	$mail->Subject = trim("Email Verifcation");
	$mail->SetFrom('iitdhmusicclub@gmail.com', 'Rhapsody Official');
	$mail->AddAddress($emailadd);
	$message = '<p>Hello! Let us See if this Works. Please copy this link to <a href="10.250.1.187/index.php">verify</a> your email.</p><p>Please note this mail is send from a php file ;)</p>';
	$mail->MsgHTML($message);
	try {
		$mail->send();
	} catch (Exception $ex) {
	  echo $msg = $ex->getMessage();
	}
}
?>

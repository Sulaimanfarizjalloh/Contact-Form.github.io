<?php
use PHPMailer\PHPMailer\PHPMailer;

IF(isset($_POST['name']) && isset($_POST['email'])){
	$name = $_POST['name'];
	$email = $_POST['email'];
	$subject = $_POST['subject'];
	$body = $_POST['body'];

	require_once "PHPMailer/PHPMailer.php"
	require_once "PHPMailer/SMTP.php"
	require_once "PHPMailer/Exception.php"

	$mail = new PHPMailer();

	//smtp settings
	$mail->isSMTP()
	$mail->Host = "smtp.gmail.com"
	$mail->SMTPAuth = true;
	$mail->Username = "craftmultimediasl@gmail.com";
	$mail->Password = 'Business1.com';
	$mail->Port = 465;
	$mail->SMTPSecure = 'ssl'

	//email setting
	$mail->isHTML(true);
	$mail->setFrom($email, $name);
	$mail->addAddress("craftmultimediasl@gmail.com");
	$mail->subject = ("$email ($subject)");
	$mail->Body = $body;

	if ($mail->send()){
		$status = "success;"
		$response = "Email is sent!"
	}
	else
	{
		$status = "fail"
		$response = "something is wrong: <br>" . $mail->Errorinfo;
	}

	exit(json_encode(array("status" => $statu, "response" => $response)));

}

?>
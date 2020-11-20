<?php
require('PHPMailer/PHPMailerAutoload.php');

$mail = new PHPMailer();

$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'charlou190@gmail.com';
$mail->Password = 'Venom190';
$mail->SMTPSecure = 'tls';
$mail->Port = 465; // 587;           // par default, selon la documentation

$mail->setFrom('charlou190@gmail.com', 'Charles');
$mail->addAddress('charlou190@gmail.com');              // adresse de destination

$mail->isHTML(true);

$mail->Subject = 'Cet email est un test';
$mail->Body = 'Afin de valider votre adresse email, merci de cliquer sur le lien suivant';

if(!$mail->send()){
	echo "Mail non envoyé, ";
	echo 'Erreurs :'.$mail->ErrorInfo;
}else{
	echo "Votre email a bien été envoyé";
}
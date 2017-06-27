<?php
function nuevomail($asunto,$destinatarios,$html)
{
include "./phpmailer/class.phpmailer.php";
include "./phpmailer/class.smtp.php";
include "./includes/mail.php";

$from_name = "CIFP TXURDINAGA LHII (JILK)";


$phpmailer = new PHPMailer();
// ---------- datos de la cuenta de Gmail -------------------------------
$phpmailer->Username = $MailUserGmail;
$phpmailer->Password = $MailPass;
//-----------------------------------------------------------------------
// $phpmailer->SMTPDebug = 1;
$phpmailer->SMTPSecure = 'ssl';
$phpmailer->Host = "smtp.gmail.com"; // GMail
$phpmailer->Port = 465;
$phpmailer->IsSMTP(); // use SMTP
$phpmailer->SMTPAuth = true;
$phpmailer->setFrom($phpmailer->Username,$from_name);

//acentos y Ñ
$phpmailer->CharSet = 'UTF-8';

//meter los dwestinatarios enviados en un array //DESTINATARIO
foreach ($destinatarios as &$destinatario) {  $phpmailer->AddBCC($destinatario); }// recipients email enviado en CC }

//$phpmailer->AddAddress($destinatarios); // recipients email

$phpmailer->Subject = $asunto;


$phpmailer->Body= $html;
//ADJUNTOS
//$phpmailer->AddAttachment('./imagenes/logoTX.png','logoTX.png');

$phpmailer->IsHTML(true);
$phpmailer->Send();



}
?>

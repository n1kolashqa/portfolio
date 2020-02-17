<?php 

$user_name = $_POST['user_name'];
$user_mail = $_POST['user_mail'];

require 'phpmailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->isSMTP();

$mail->Host = 'smtp.yandex.ru';
$mail->SMTPAuth = true;
$mail->Username = 'abdulinnikolay@yandex.ru'; // логин от вашей почты
$mail->Password = 'n1Ko6116Lay008n1'; // пароль от почтового ящика
$mail->SMTPSecure = 'ssl';
$mail->Port = '465';

$mail->CharSet = 'UTF-8';
$mail->From = 'abdulinnikolay@yandex.ru'; // адрес почты, с которой идет отправка
$mail->FromName = 'Carina Businka - Интернет-магазин украшений ручной работы'; // имя отправителя
$mail->addAddress('abdulinnikolay@gmail.com'); // адрес почты, куда отправляется письмо
//$mail->addAddress('email2@email.com', 'Имя 2');
//$mail->addCC('email3@email.com');

$mail->isHTML(true);

$mail->Subject = 'Заказ с сайта';
$mail->Body = '
Новый заказ! Ура! <br>
Имя: ' .$user_name. ' <br>
Почта: ' .$user_mail. ''; 
$mail->AltBody = '';
//$mail->addAttachment('img/Lighthouse.jpg', 'Картинка Маяк.jpg');
// $mail->SMTPDebug = 1;

if( $mail->send() ) {
	header ('location: pg1.html');
} else{
	echo 'Письмо не может быть отправлено. ';
	echo 'Ошибка: ' . $mail->ErrorInfo;
}

?>
<?php
include '../core/database/config.php';
define("WEBMASTER_EMAIL", 'admin@evict.ro');

error_reporting (E_ALL ^ E_NOTICE);

$post = (!empty($_POST)) ? true : false;

if($post)
{

$name = stripslashes($_POST['name']);
$email = trim($_POST['email']);
$subject = stripslashes($_POST['subject']);
$message = stripslashes($_POST['message']);


$error = '';



if(!$error)
{
$mail = mail(WEBMASTER_EMAIL, $subject, $message,
     "From: ".$name." <".$email.">\r\n"
    ."Reply-To: ".$email."\r\n"
    ."X-Mailer: PHP/" . phpversion());
mysql_query("INSERT INTO `contact` (nume, email, subiect, continut) VALUE ('$name', '$email', '$subject', '$message')");

if($mail)
{
echo 'OK';
}

}


}
?>
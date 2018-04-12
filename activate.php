<?php ob_start(); ?>
<?php
include 'core/init.php';
include 'include/header.php';
include 'include/head.php';
if(logged_in() === true)
echo 'E&#351;ti logat';
else
{
if (isset($_GET['success']) === true && empty($_GET['success']) === true) {
?>
	<h2>Mul&#355;umim pentru &#238;nregistrare , contul t&#259;u este activ...</h2>
	<p>Acum te po&#355;i <a href="accescont.php">loga</a><p>
<?php
} else if (isset($_GET['email'], $_GET['email_code']) === true) {
	$email 	    = trim($_GET['email']);
	$email_code = trim($_GET['email_code']); 
	
	if (email_exists($email) === false) {
	    $errors = 'Oops, nu g&#259;sesc adresa de email &#238;n baza de date';
	} else if (activate($email, $email_code) === false) {
	    $errors[] = 'S-a produs o eroare la activarea contului t&#259;u';
	}
	
	if (empty($errors) === false) {
	?>
	    <h2>Oops...</h2>
	<?php
       	    echo output_errors($errors);
	} else {
	    exit(header('Location: activate.php?success'));
	}
	
} else {
	exit(header('Location: login.php'));
}
}

?>
<?php ob_flush(); ?>
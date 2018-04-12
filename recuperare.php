<?php ob_start(); ?>
<?php
include 'core/init.php';
include 'include/head.php';
include 'include/header.php';
if(logged_in() === true) {
	exit(header('Location:login.php'));
}
?>
<h1>Recuperare date</h1>
<?php 
if(isset($_GET['success']) === true && empty ($_GET['success']) === true) {
?>
    <p>Mul&#355;umim , &#355;i-am trimis un email de recuperare a datelor . Te rug&#259;m s&#259; verifici &#351;i folderul "Spam" &#238;n caz ca mailul nu intr&#259; &#238;n "Inbox".</p>
<?php
} else {
$mode_allowed = array ('utilizator', 'parola');
if (isset($_GET['mode']) === true && in_array($_GET['mode'], $mode_allowed) === true) {
	if (isset($_POST['email']) === true && empty($_POST['email']) === false) {
		if (email_exists($_POST['email']) === true) {
			recuperare($_GET['mode'], $_POST['email']);
			exit(header('Location: recuperare.php?success'));
		} else {
		echo '<p>Adresa de email introdus&#259; nu coincide cu una din baza noastr&#259; de date .';
		}
	}
	
?>

<form action="" method="post">
	<ul>
		Te rug&#259;m s&#259; introduci adresa de email:   
		<input type="text" name="email"> <input type="submit" name="Recuperare">
		
	</ul>
</form>

<?php	
} else {
 	exit(header('Location: index.php'));
} 
}
?>


<?php ob_flush(); ?>
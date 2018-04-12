<?php
ob_start();
include 'include/head.php';
include 'include/header.php';
include 'core/database/config.php';
include 'core/init.php';
if(logged_in()==1)
include 'include/logat.php';
else
{
if (empty($_POST) === false) {
	$utilizator = $_POST['utilizator'];
	$parola = $_POST['parola'];
	if (empty($utilizator) === true || empty($parola) === true) {
		$errors[] = 'Te rug&#259;m s&#259; introduci un nume de utilizator &#351;i o parol&#259;. ';
	} else if (user_exists($utilizator) === false) {
		$errors[] = 'Numele de utilizator nu coincide cu unul din baza noastr&#259; de date . Nu de&#355;ii cont?';
	} else if (user_active($utilizator) === false){
		$errors[] = 'Nu &#355;i-ai activat contul!';
	} else {
		if (strlen($parola) > 32) {
			$errors[] = 'Parola e prea lung&#259;. ';
		}

		$login = login($utilizator, $parola);
		if ($login === false) {
			$errors[] = 'Utilizatorul sau parola introdus&#259; este gre&#351;it&#259;. ';
		} else {
			$_SESSION['id'] = $login;
			exit(header("Location: login.php"));
		}
	}
} 
}

if (empty($errors) === false) {
?>
<?php
	echo output_errors($errors) .'<a href="accescont.php"><input type="submit" class="btn btn-theme" action="accescont.php" value="Re&#238;ncercare"></a>';
}


ob_end_flush();
?>
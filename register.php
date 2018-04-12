<?php ob_start(); ?>
<?php
include 'core/init.php';
include 'include/head.php';
include 'include/header.php'; 
if(logged_in()==1)
echo 'Esti logat!';
else
{
if (empty($_POST) === false) {
    $required_fields = array('utilizator', 'parola', 'nume', 'prenume', 'localitate', 'varsta', 'email');
    foreach($_POST as $key=>$value) {
    if (empty($value) && in_array($key, $required_fields) === true){
    	$errors[] = 'C&#226;mpurile marcate cu "*" sunt obligatorii !';
    	break 1;
    	}
    }
    if(empty($errors) === true) {
    	if (user_exists($_POST['utilizator']) === true) {
    	$errors[] = 'Ne scuza&#355;i, dar numele de utilizator \'' . $_POST['utilizator'] . '\'  este deja &#238;n uz.';
    	}
    if(preg_match("/\\s/", $_POST['utilizator']) == true) {
	$errors[] = 'Numele de utilizator nu trebuie s&#259; con&#355;in&#259; spa&#355;ii';
	}
    if(strlen($_POST['parola']) < 6) {
	$errors[] = 'Parola trebuie s&#259; con&#355;in&#259; mai mult de 6 caractere';
	}
    if ($_POST['parola'] !== $_POST['repetare_parola']) {
        $errors[] = 'Parolele nu corespund.';
        }
    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
	$errors[] = 'Te rug&#259;m s&#259; introduci o adres&#259; de email valid&#259;';
	}
    if (email_exists($_POST['email']) === true) {
	$errors[] = 'Ne scuza&#355;i, dar adresa de email \'' . $_POST['email'] . '\'  este deja &#238;n uz.';
	}
    }
    
}
?> 
<?php
if(isset($_GET['success']) && empty($_GET['success'])) {
	echo 'Te-ai &#238;ntregistrat cu succes! Te rog s&#259;-&#355;i activezi contul prin linkul trimis pe email! Te rug&#259;m s&#259; verifici &#351;i folderul "Spam" &#238;n caz ca mailul nu intr&#259; &#238;n "Inbox".';
} else {
if (empty($_POST) === false && empty ($errors) ===true) {
	$register_data = array(
		'utilizator' 		=> $_POST['utilizator'],
		'parola' 		=> $_POST['parola'],
		'nume' 			=> $_POST['nume'],
		'prenume' 		=> $_POST['prenume'],
		'localitatea' 		=> $_POST['localitatea'],
		'scoala' 		=> $_POST['scoala'],
		'varsta' 		=> $_POST['varsta'],
		'email' 		=> $_POST['email'],
		'profesor'		=> $_POST['profesor'],
		'email_code' 		=> md5($_POST['utilizator'] + microtime())
	);
	register_user($register_data);
	header('Location: register.php?success');
	exit();
} else if (empty($errors) === false) {
	echo output_errors($errors);
	}
	?>
	<link href="css/lr.css" rel="stylesheet" />
<div class="wrapper">
			<div class="content">
				<div id="form_wrapper" class="form_wrapper">
					<form class="register active" action="" method="post">
						<h3>Înregistrare</h3>
            <div class="column">
              <div>
                <label>Utilizator*:</label>
                <input type="text" name="utilizator"/>
              </div>
              <div>
                <label>Parol&#259;*:</label>
                <input type="password" name="parola"/>
              </div>
              <div>
                <label>Repetare parol&#259;*:</label>
                <input type="password" name="repetare_parola"/>
              </div>
              <div>
                <label>Nume*:</label>
                <input type="text" name="nume"/>
              </div>
              <div>
                <label>Prenume*:</label>
                <input type="text" name="prenume"/>
              </div>
            </div>
            <div class="column">
              <div>
                <label>Localitatea*:</label>
                <input type="text" name="localitatea"/>
              </div>
              <div>
                <label>&#350;coala*:</label>
                <input type="text" name="scoala"/>
              </div>
              <div>
                <label>V&#226;rsta*:</label>
                <input type="text" name="varsta"/>
              </div>
              <div>
                <label>Email*:</label>
                <input type="text" name="email"/>
              </div>
              <div>
                <label>Profesor:</label>
                <input type="text" name="profesor"/>
              </div>
            </div>
						<div class="bottom">
							<input type="submit" value="&#206;nregistrare" />
							<a href="accescont.php">Ai deja cont? Apas&#259; aici!</a>
							<div class="clear"></div>
						</div>
					</form>
				
				</div>
				<div class="clear"></div>
			</div>
			
		</div>
<?php
}
}
?>
 <?php ob_flush(); ?>
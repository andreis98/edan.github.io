<?php ob_start(); ?>
<?php
include 'core/init.php';
include 'include/header.php';
include 'include/head.php';
protect_page();

if (empty($_POST) === false) {
	$required_fields = array('parola_curenta', 'parola', 'repetare_parola');
	foreach($_POST as $key=>$value) {
    	if (empty($value) && in_array($key, $required_fields) === true){
    		$errors[] = 'C&#226;mpurile marcate cu "*" sunt obligatorii !';
    		break 1;
    		}	
       }  
       
       if(md5($_POST['parola_curenta']) === $user_data['parola']) {
          if(trim($_POST['parola']) !== trim($_POST['repetare_parola'])) {
             $errors[] = 'Noile parole nu corespund';
          } else if (strlen($_POST['parola']) < 6) {
              $errors[] = 'Parola trebuie sa con&#355;in&#259; cel pu&#355;in 6 caractere';	
          }
       } else {
       	  $errors[] = 'Parola introdus&#259; este incorect&#259;';
       }
       
}

?>

<?php
if (isset($_GET['success']) && empty($_GET['success'])) {
	echo 'Parola ta a fost schimbat&#259;';
} else {
 
if (empty($_POST) === false && empty ($errors) === true) {
    schimbare_parola($session_id, $_POST['parola']);
    header('Location: changepass.php?success');
} else if (empty($errors) === false) {
    echo output_errors($errors);
}
?>
<link href="css/lr.css" rel="stylesheet" />
<div class="wrapper">
			<div class="content">
				<div id="form_wrapper" class="form_wrapper">
					<form class="register active" action="" method="post">
						<h3>Schimbare parol&#259;</h3>
            <div class="column">
              <div>
                <label>Parola curent&#259;:</label>
	    		<input type="password" name="parola_curenta">
              </div>
              <div>
                <label>Parola nou&#259;:</label>
                <input type="password" name="parola">
              </div>
              <div>
                <label>Repetare parol&#259;:</label>
				<input type="password" name="repetare parola">
              </div>
            </div>

						<div class="bottom">
							<input type="submit" value="Actualizare" />
							<div class="clear"></div>
						</div>
					</form>
				</div>
				<div class="clear"></div>
			</div>
			
		</div>

	

<?php
}

?>
<?php ob_flush(); ?>
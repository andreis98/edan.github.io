<?php ob_start(); ?>
<?php
include 'include/header.php';
include 'include/head.php';
include 'core/init.php';
protect_page();

if (empty($_POST) === false) {
    $required_fields = array('nume', 'email');
    foreach($_POST as $key=>$value) {
    	if (empty($value) && in_array($key, $required_fields) === true){
    		$errors[] = 'C&#226;mpurile marcate cu "*" sunt obligatorii !';
    		break 1;
	}
    }
    
    if(empty($errors) === true) {
    	if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)=== false) {
    		$errors[] = 'Te rug&#259;m s&#259; introduci o adres&#259; de email valid&#259;';
    	} else if (email_exists($_POST['email']) === true && $user_data['email'] !== $_POST['email']) {
    	    $errors[] = 'Ne scuza&#355;i, dar adresa de email \'' . $_POST['email'] . '\'  este deja &#238;n uz.';
    	}
    }
}

?>

<?php
if (isset($_GET['success']) === true && empty($_GET['success']) === true) {
	echo 'Detaliile dumneavoastr&#259;. au fost actualizate';
}
if (empty($_POST) === false && empty($errors) === true) {
	$update_data = array (
	  'nume'	 => $_POST['nume'],
	  'prenume'	 => $_POST['prenume'],
	  'localitatea'	 => $_POST['localitatea'],
	  'scoala'	 => $_POST['scoala'],
 	  'varsta'	 => $_POST['varsta'],
 	  'email'	 => $_POST['email'],
 	  'profesor'	 => $_POST['profesor']
	);
	update_user($session_id, $update_data);
	exit(header('Location: setari.php?success'));
	
} else if (empty($errors) === false){
	echo output_errors($errors);
} 
?>
<link href="css/lr.css" rel="stylesheet" />
<div class="wrapper">
			<div class="content">
				<div id="form_wrapper" class="form_wrapper">
					<form class="register active" action="" method="post">
						<h3>Set&#259;ri cont</h3>
            <div class="column">
              <div>
                <label>Nume:</label>
	    		<input type="text" name="nume" value="<?php echo $user_data['nume']; ?>">
              </div>
              <div>
                <label>Prenume:</label>
                <input type="text" name="prenume" value="<?php echo $user_data['prenume']; ?>">
              </div>
              <div>
                <label>Localitatea:</label>
				<input type="text" name="localitatea" value="<?php echo $user_data['localitatea']; ?>">
              </div>
              <div>
                <label>&#350;coala:</label>
                <input type="text" name="scoala" value="<?php echo $user_data['scoala']; ?>">
              </div>
              </div>
              <div class="column">
              <div>
                <label>Varsta:</label>
                <input type="text" name="varsta" value="<?php echo $user_data['varsta']; ?>">
              </div>
              <div>
                <label>Email:</label>
              	<input type="text" name="email" value="<?php echo $user_data['email']; ?>">
              </div>
              <div>
                <label>Profesor:</label>
                <input type="text" name="profesor" value="<?php echo $user_data['profesor']; ?>">
              </div>
            </div>

						<div class="bottom">
							<input type="submit" value="Actualizare" />
							<a href="changepass.php">Schimbare parol&#259;</a>
							<div class="clear"></div>
						</div>
					</form>
				
				</div>
				<div class="clear"></div>
			</div>
			
		</div>

	
</form>


<?php ob_flush(); ?>
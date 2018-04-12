<?php ob_start(); ?>
<?php
include 'core/init.php';
include 'include/header.php';
include 'include/head.php';
header('Content-type: text/html; charset=utf-8');
protect_page();

if (isset($_GET['utilizator']) === true && empty($_GET['utilizator']) === false) {
	$utilizator = $_GET['utilizator'];
	
	if (user_exists($utilizator) === true){
	$id = user_id_from_username($utilizator);
	$date_profil = user_data($id, 'nume', 'prenume', 'localitatea', 'scoala', 'varsta', 'email', 'profesor');
	?>
	    
	    <h1>Profilul lui 
	    <?php 
	    echo $date_profil['prenume']; 
	    echo ' ';
	    echo $date_profil['nume']; 
	    ?>
	    </h1></br>
	    <h2>Date personale:</h2> 
	    <p>V&#226;rsta :<?php echo $date_profil['varsta']; ?> ani</p>
	    <p>Localitatea :<?php echo $date_profil['localitatea']; ?></p>
	    <p>&#350;coala :<?php echo $date_profil['scoala']; ?></p>
	    <p>Email :<?php echo $date_profil['email']; ?></p>
	    <p>Profesor :<?php echo $date_profil['profesor']; ?></p>
	  <?php if($user_data['tip_utilizator'] != 1 || $user_data['utilizator'] == $utilizator) {?>
	    <h2>Rezultate examene:</h2> 
	    <?php
	    $query = mysql_query("SELECT * FROM punctaje where utilizator = '".sanitize($_GET['utilizator'])."'");
	while($row = fetch($query)){
		$punctaj = $row['punctaj'];
		$categorie = $row['categorie'];
		echo htmlspecialchars_decode($categorie).' : ';
		echo htmlspecialchars_decode($punctaj);
		?>
		</br> <?php
	}
}
	?>
	<?php
	} else {
            echo 'Acest utilizator nu exist&#259;!';
	}
} else {
	exit(header('Location: index.php'));
} 


?>
<?php ob_flush(); ?>
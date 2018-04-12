<?php ob_start();?>
<?php
include 'include/header.php';
include 'include/head.php';
include 'core/init.php';

if (isset($_POST['search'])) {
	$searchq = $_POST['search'];
	echo '<div class="main_bg"><!-- start main -->
			<div class="container">
				<div class="about details row">
					<!--style="width:400px; height:65px"-->
					<p class="para"> ';
	header('Content-type: text/html; charset=utf-8');
	$cerereSQL = 'SELECT * FROM `lectii` WHERE `titlu` LIKE "%'.$searchq.'%"'; 
	$rezultat = mysql_query($cerereSQL);
	if($rezultat === FALSE) { 
    	die(mysql_error());
	}
		while($rand = mysql_fetch_array($rezultat))	{
			$continut = $rand['continut'];
			$titlu = $rand['titlu'];
			?> <h1><center> <?php echo "$titlu"; ?> </h1></center>
			<?php echo "
				<div class=\"para\">
					<p>
						".$continut."
					</p>
				</div> ";
		}
	echo '<script src="lightbox/js/jquery-1.10.2.min.js"></script>
			<script src="lightbox/js/lightbox-2.6.min.js"></script>
			</div>
		</div>';
		  
}

if (isset($_POST['search'])) {
	$searchq = $_POST['search'];
	$searchp = $_POST['search'];
	echo '<div class="main_bg"><!-- start main -->
			<div class="container">
				<div class="about details row">
					<!--style="width:400px; height:65px"-->
					<p class="para"> ';
	header('Content-type: text/html; charset=utf-8');
	$cerereSQL = 'SELECT * FROM `utilizatori` WHERE `nume` LIKE "%'.$searchq.'%"'; 
	$rezultat = mysql_query($cerereSQL);
	if($rezultat === FALSE) { 
    	die(mysql_error());
	}
		while($rand = mysql_fetch_array($rezultat))	{
			$utilizator = $rand['utilizator'];
			exit(header("Location: $utilizator"));
		}
	echo '<script src="lightbox/js/jquery-1.10.2.min.js"></script>
			<script src="lightbox/js/lightbox-2.6.min.js"></script>
			</div>
		</div>';
		  
}

?>

<?php ob_flush();?>
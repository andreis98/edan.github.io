<?php ob_start(); ?>
<?php
include ('include/header.php');
include ('include/head.php');
include ('core/init.php');
?>
<?php
if($user_data['tip_utilizator'] != 1)
{ 
?>
<form method="post">
	&nbsp&nbsp&nbsp<input type="text" cols="25" name="titlu" placeholder="Introduce&#355;i titlul lec&#355;iei"></br>
	&nbsp&nbsp&nbsp<textarea rows="20" cols="150" name="continut" placeholder="Introduce&#355;i continutul lec&#355;iei"></textarea></br>
	&nbsp&nbsp&nbsp<input type="submit" class="btn btn-theme" name="submit" value="Trimite"></br>
</form>
<?php
} else {
	echo 'Nu de&#355;ii permisiunile necesare pentru a &#238;ncarca o lec&#355;ie';
}

if(logged_in() === false) {
	protect_page();
} else
{
if(isset($_POST['submit'])){

	if(isset($_POST['titlu']) && $_POST['titlu'] != "" && isset($_POST['continut']) && $_POST['continut'] != ""){
	$titlu = mysql_real_escape_string($_POST['titlu']);
	$continut = mysql_real_escape_string($_POST['continut']);
	$inserare = mysql_query("INSERT INTO lectii (titlu,continut) values ('".$titlu."','".$continut."')");
	if($inserare){
		echo 'Lec&#355;ia a fost introdus&#259; cu succes. O po&#355;i vedea dup&#259; validarea administratorului.';
	} else {
		echo 'Lec&#355;ia nu a fost introdus&#259;. Te rug&#259;m sa re&#238;ncerci.';
	}
}
}
}

?>
<?php ob_flush(); ?>
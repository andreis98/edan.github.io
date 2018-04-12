<?php ob_start(); ?>
<?php
include 'include/head.php';
include 'include/header.php';
include 'core/database/config.php';
include 'core/functii/general.php';
header('Content-type: text/html; charset=utf-8');
	$query = mysql_query("SELECT * FROM lectii where id = '".sanitize($_GET['id'])."'");
	while($row = fetch($query)){
		$titlu = $row['titlu'];
		$continut = $row['continut'];
		echo '<center>'.'<h2>'.htmlspecialchars_decode($titlu).'</h2>'.'</center>';
		echo '<Br>'.htmlspecialchars_decode($continut);
	}
?>
<div align="right"><p>Bibliografie: Manual Educa&#355;ie Antreprenoriala - Clasa a X-a </p></div>
<?php ob_flush(); ?>
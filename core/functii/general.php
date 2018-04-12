<?php
function exam_exists($category, $utilizator) {
	return (mysql_result(mysql_query("SELECT COUNT(`id`) FROM `punctaje` WHERE `categorie` = '$category' AND `utilizator` = '$utilizator'"), 0) == 1) ? true : false;
}
function protect_page() {
	if(logged_in() === false) {
	exit (header('Location: accescont.php'));
	}
}

function array_sanitize(&$item) {
	$item = mysql_real_escape_string($item);
}
function sanitize($data) {
	return mysql_real_escape_string($data);	
}
function fetch($data) {
	return mysql_fetch_array($data);
}
function output_errors($errors) {
	return '<ul><li>' . implode('</li><li>', $errors) . '</li></ul>';
}
?>
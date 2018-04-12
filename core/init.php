<?php ob_start(); ?>
<?php
session_start();

require 'database/config.php'; 
require 'functii/general.php';
require 'functii/utilizatori.php';

if (logged_in() === TRUE) {
$session_id = $_SESSION['id'];
$user_data = user_data($session_id, 'id', 'utilizator', 'parola', 'nume', 'prenume', 'localitatea','scoala', 'varsta', 'email', 'profesor', 'tip_utilizator');

}
$errors = array();
ob_flush(); 
?>
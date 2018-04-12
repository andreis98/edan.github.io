<?php
error_reporting(E_ALL ^ E_DEPRECATED);
$connect_error = 'Ne cerem scuze , problema este in curs de remediere';
mysql_connect('localhost', 'root', '') or die($connect_error);
mysql_select_db('edan') or die($connect_error);
$sql = "SET NAMES 'utf8'";
?>
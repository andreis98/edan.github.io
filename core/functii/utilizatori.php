<?php
function recuperare($mode, $email) {
	$mode 	= sanitize($mode);
	$email 	= sanitize($email);
	
	$user_data = user_data(user_id_from_email($email), 'id', 'prenume', 'utilizator');
	
	if ($mode == 'utilizator') {
		email($email, 'Numele tau de utilizator', "Salut " . $user_data['prenume'] . ", \n\n Numele tau de utilizator este: " . $user_data['utilizator'] . "\n\n - Educatie antreprenoriala - Soft educational online");
	} else if ($mode == 'parola') {

$generare_parola = substr(md5(rand(999, 999999)), 0, 8);

schimbare_parola($user_data['id'], $generare_parola);
update_user($user_data['id'], array('recuperare_parola' => '1'));
email($email, 'Noua ta parola', "Salut " . $user_data['prenume'] . ", \n\n Noua ta parola este: " . $generare_parola . "\n\n - Educatie antreprenoriala - Soft educational online");
			}
			
}

function update_user($id, $update_data) {

	$update = array();
	array_walk($update_data, 'array_sanitize');
	
	foreach($update_data as $field=>$data) {
		$update[] = '`' . $field . '` = \'' . $data . '\'';
	}
	mysql_query("UPDATE `utilizatori` SET " . implode (', ', $update) . " WHERE `id` = $id");
}

function activate($email, $email_code) {
	$email 	    = mysql_real_escape_string($email);
	$email_code = mysql_real_escape_string($email_code);
	
	if (mysql_result(mysql_query("SELECT COUNT(`id`) FROM `utilizatori` WHERE `email` = '$email' AND `email_code` = '$email_code' AND `tip_utilizator` = 0"), 0) == 1) {
	    mysql_query("UPDATE `utilizatori` SET `tip_utilizator` = 1 WHERE `email` = '$email'");
	   return true;
	} else {
	   return false;
	}
}

function email($pentru, $subiect, $continut) {
	mail($pentru, $subiect, $continut, 'From:admin@evict.ro');
}

function schimbare_parola($id, $parola) {
    $id = (int)$id;
    $parola = md5($parola);
    
    mysql_query("UPDATE `utilizatori` SET `parola` = '$parola' WHERE `id` = $id");
}

function register_user($register_data) {
	array_walk($register_data, 'array_sanitize');
	$register_data['parola'] = md5($register_data['parola']);
	
	$fields = '`' . implode('`, `', array_keys($register_data)) . '`';
	$data = '\'' . implode('\', \'', $register_data) . '\'';

	mysql_query("INSERT INTO `utilizatori` ($fields) VALUES ($data)");
	email($register_data['email'], 'Activeaza-ti contul', "Salut " . $register_data['prenume'] . ",\n\n Contul tau necesita activare, te rog sa urmezi linkul:\n\n http://evict.ro/edan/activate.php?email=" . $register_data['email'] . "&email_code=" . $register_data['email_code'] . " \n\n - Educatie  Antreprenoriala - Soft educational online");
}
function user_data($id) {
	$data = array();
	$id = (int)$id;
	$func_num_args = func_num_args();
	$func_get_args = func_get_args();
	if ($func_num_args > 1) {
		unset($func_get_args[0]);
		$fields = '`' . implode('`, `', $func_get_args) . '`'; 
		$data = mysql_fetch_assoc(mysql_query("SELECT $fields FROM `utilizatori` WHERE `id` = $id"));
		return $data;
	}
}
function logged_in() {
	return (isset($_SESSION['id'])) ? true : false;
}
function user_exists($utilizator) {
	$utilizator = sanitize($utilizator);
	return (mysql_result(mysql_query("SELECT COUNT(`id`) FROM `utilizatori` WHERE `utilizator` = '$utilizator'"), 0) == 1) ? true : false;
}
function email_exists($email) {
	$email = sanitize($email);
	return (mysql_result(mysql_query("SELECT COUNT(`id`) FROM `utilizatori` WHERE `email` = '$email'"), 0) == 1) ? true : false;
}
function user_active($utilizator) {
	$utilizator = sanitize($utilizator);
	return (mysql_result(mysql_query("SELECT COUNT(`id`) FROM `utilizatori` WHERE `utilizator` = '$utilizator' AND `tip_utilizator` != 0"), 0) == 1) ? true : false;
}
function user_id_from_username($utilizator) {
	$utilizator = sanitize($utilizator);
	return mysql_result(mysql_query("SELECT (`id`) FROM `utilizatori` WHERE `utilizator` = '$utilizator'"), 0, 'id');
}
function user_id_from_email($email) {
	$email = sanitize($email);
	return mysql_result(mysql_query("SELECT (`id`) FROM `utilizatori` WHERE `email` = '$email'"), 0, 'id');
}
function login($utilizator, $parola) {
	$id = user_id_from_username($utilizator);
	$utilizator = sanitize($utilizator);
	$parola = md5($parola);
	return (mysql_result(mysql_query("SELECT COUNT(`id`) FROM `utilizatori` WHERE `utilizator` = '$utilizator' AND `parola` = '$parola'"), 0) == 1) ? $id : false;
}
?>

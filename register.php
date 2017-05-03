<?php 
require('inc/common.php');

$sql = 'INSERT INTO `user` (`u_login`, `u_nom`, `u_prenom`, `u_mail`, `u_password`) 
		VALUES ( :login, :nom, :prenom, :mail, :password)';

$bind = array(	"login" => $_POST['login'],
				"nom" => $_POST['nom'],
				"prenom" => $_POST['prenom'],
				"mail" => $_POST['mail'],
				"password" => $_POST['password']);		 

$register = new Manager(DB_HOST, DB_NAME, DB_USER, DB_PASS);

if ($register->MakeStatement($sql, $bind) !== false) {
	header('Location:index.php');
	exit();
}
else {
	echo "ERREUR";
}

?>
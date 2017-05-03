<?php

require_once('inc/common.php');

// Connexion à la bdd
$manager = new Manager(DB_HOST, DB_NAME, DB_USER, DB_PASS);


// A MODIFIER AVEC LA NOUVELLE FONCTION executeQuery()
// $sql = 'SELECT * FROM `user` ';

// $user = $manager->MakeSelect($sql, $param = array(), $fetchStyle = PDO::FETCH_ASSOC, $fetchArg = NULL, "user" );

// foreach($user as $item)
// {
// 	echo $item->GetNom() . ' ' .  $item->GetPrenom() .  '<br>';
	
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
	<form action="register.php" method="post">
		<input type="text" name="login" placeholder="login">
		<input type="text" name="nom" placeholder="nom">
		<input type="text" name="prenom" placeholder="prenom">
		<input type="text" name="mail" placeholder="mail">
		<input type="password" name="password" placeholder="password">
		<input type="submit">
	</form>
</body>
</html>
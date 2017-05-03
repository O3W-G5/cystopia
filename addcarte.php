<?php 
require('inc/common.php');

$sql = 'INSERT INTO `carte`(`c_nom`, `c_mana_cout`, `c_type`, `c_attaque`, `c_vie`, `c_bouclier`, `c_legendaire`, `c_visuel`, `c_citation`, `f_id_fk`)
		VALUES (:nom, :mana, :type, :attaque, :vie, :bouclier, :legendaire, :visuel, :citation, :faction)';

$bind = array(	"nom" => $_POST['c_nom'],
				"mana" => $_POST['c_mana'],
				"type" => $_POST['c_type'],
				"attaque" => $_POST['c_attaque'],
				"vie" => $_POST['c_vie'],
				"bouclier" => $_POST['c_bouclier'],
				"legendaire" => $_POST['c_legendaire'],
				"visuel" => $_POST['c_visuel'],
				"citation" => $_POST['c_citation'],
				"faction" => $_POST['c_faction']
				);		 

$register = new Manager(DB_HOST, DB_NAME, DB_USER, DB_PASS);

if ($register->MakeStatement($sql, $bind) !== false) {
	header('Location:admin.php');
	exit();
}
else {
	echo "ERREUR";
}

?>


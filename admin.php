<?php  
require_once('inc/common.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin</title>
	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
	<form method="post" action="addcarte.php">
		<input type="text" name="c_nom" placeholder="Nom">
		<input type="number" name="c_mana" placeholder="Coût en mana">
		<select name="c_type" placeholder="Type">
			<option value="0">Creature</option>
			<option value="1">Sort</option>
		</select>
		<input type="number" name="c_attaque" placeholder="Point d'attaque">
		<input type="number" name="c_vie" placeholder="Point de vie">
		<select name="c_bouclier" placeholder="Est-ce un Bouclier ?">
			<option value="0">Non</option>
			<option value="1">Oui</option>
		</select>
		<select name="c_legendaire" placeholder="Est-ce un Légendaire ?">
			<option value="0">Non</option>
			<option value="1">Oui</option>
		</select>
		<input type="file"  accept="image/*" name="c_visuel" placeholder="URL du visuel">
		<input type="text" name="c_citation" placeholder="Citation">
		<select name="c_faction">
			<?php  
			$sql = 'SELECT * FROM `faction`';

			$factions = new Manager(DB_HOST, DB_NAME, DB_USER, DB_PASS);

			$result = $factions -> MakeSelect($sql, $param = array(), $fetchStyle = PDO::FETCH_ASSOC, $fetchArg = NULL, "faction");

			foreach ($result as $faction) {
				echo '<option value="'. $faction->GetFID() .'">'. $faction->GetFNom() .'</option>';
			}
			?>
		</select>
		<input type="submit">
	</form>
</body>
</html>
<!-- 
!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
RESTE A FAIRE :
AFFICHER TOUTES LES CARTES
CHOISIR UNE CARTE A MODIFIER / SUPPRIMER
AVOIR L'ADRESSE COMPLETE DU VISUEL (CONCATENER des chaines de caractere en sql)
AFFINER LES TESTS : NE PAS POUVOIR POSTER N'IMPORTE QUOI 
!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 -->
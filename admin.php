<?php  
require_once('inc/common.php');

$card = new CardManager(SPDO::getInstance(DB_HOST, DB_NAME, DB_USER, DB_PASS)->getPDO());

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
		<label for="">Bouclier</label>
		<select name="c_bouclier" placeholder="Est-ce un Bouclier ?">
			<option value="0">Non</option>
			<option value="1">Oui</option>
		</select>
		<label for="">Légendaire</label>
		<select name="c_legendaire" placeholder="Est-ce un Légendaire ?">
			<option value="0">Non</option>
			<option value="1">Oui</option>
		</select>
		<input type="file"  accept="image/*" name="c_visuel" placeholder="URL du visuel">
		<input type="text" name="c_citation" placeholder="Citation">
		<select name="c_faction">
			<?php  
			$sql = 'SELECT `f_nom`,`f_id` FROM `faction`';

			$factionRequest = $card->executeQuery($sql);

			foreach ($factionRequest as $faction) {
				echo '<option value="'. $faction['f_id'] .'">'. $faction['f_nom'] .'</option>';

			}

			?>
		</select>
		<?php 
			var_dump($factionRequest);

		 ?>
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
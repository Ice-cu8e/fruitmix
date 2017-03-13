<?php
function connexion_bd() {
	$hote = 'localhost';
	$utilisateur = 'root';
	$mdp = '';
	$base='fruitmix';

	@$connect = mysqli_connect($hote, $utilisateur, $mdp,$base); //Permet de se connecter a la bdd fruitmix localhost
	$connect->query("SET NAMES UTF8"); //Permet de passer les caractères en UTF8

	if (!$connect) {
		die ('Erreur de connexion à la base de donn�es...');
		return false;
	}
	else {
		return $connect;
	}
}
?>

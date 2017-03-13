<?php

$msg_erreur = "Erreur,  les champs suivants doivent être obligatoirement remplis: <br/><br/>";
$msg_erreur_2 = "Erreur,  vos informations de connexion sont érronées <br/>";
$msg_ok = "connexion en cours...";
$message_error = $msg_erreur;

//Verification des champs
if (empty($_POST['login'])) {
  $message_error .= "Votre login<br/>";
}
if (empty($_POST['mdp'])) {
  $message_error .= "Votre mot de passe";
}

//On vérifie les erreur de champs
if (strlen($message_error) > strlen($msg_erreur)) {
  echo "$message_error"; die();
}

//On envoie les valeurs à la base de données
$login = $_POST['login'];
$mdp = $_POST['mdp'];

//connexion a la bdd
//On selectionne les champs de la table administration dans un tableau
$mysqli =new mysqli("localhost", "root", "", "fruitmix");
$requete = $mysqli->query("SELECT * FROM administration;");

//Association des valeurs à leurs colonnes
$row = mysqli_fetch_assoc($requete);

//Verification des informations de connexion
if ($login == $row['login'] && $mdp == $row['mdp']) {
  echo $msg_ok;
  include ('admin.php');
}
//Si il y a une erreur on affiche un message erreur
else {
  echo $msg_erreur_2;
}

?>

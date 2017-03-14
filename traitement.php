<?php
// sélection de la base de données
$msg_erreur = "Erreur,  les champs suivants doivent être obligatoirement remplis: <br/><br/>";
$msg_ok = "Votre  demande a bien été prise en compte.";
$message_error = $msg_erreur;

define('MAIL_DESTINATAIRE', 'mtournet@fruitmix.com');//Mettre l'email voulu
define('MAIL_SUJET','exemple@exemple.com');

// vérification des champs
if (empty($_POST['mail']))
$message_error .= "Votre mail<br/>";
if (empty($_POST['ville']))
$message_error .= "Votre ville<br/>";
if (empty($_POST['cp']))
$message_error .= "Votre code postal<br/>";

//On envoie les valeurs à la base de données
$civilite = $_POST['civilite'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$age = $_POST['age'];
$mail = $_POST['mail'];
$ville = $_POST['ville'];
$cp = $_POST['cp'];
$type = $_POST['type'];
$message = $_POST['message'];

//On vérifie les erreur de champs
//Test 1
if (strlen($message_error) > strlen($msg_erreur)) {
  echo "$message_error"; die();
}

//Test 2
/*
error_reporting(E_ALL);
$obligatoire = array('mail','ville','cp');
if (!empty($_POST)) {
  $retour = 1;
  foreach ($obligatoire as $val) {
    if (empty($_POST[$val]) || trim($_POST[$val]) == '') {
      $corrige[] = $val;
      $retour = 0;
    }
  }
  if ($retour == 0) {
    echo "Les champs ", implode(', ', $corrige), ' sont obligatoires'; die();
  }

  else {
    echo "C\' est bon, on poursuit donc l\'éxécution du script";
  }
}
*/

//On envoie par mail
//Préparation de l'entête
$mail_entete = "Test-Version : 1.0\r\n";
$mail_entete .= "From : {$_POST['nom']}"
             ."<{$_POST['mail']}";
$mail_entete .= "Reply-To : ".$_POST["mail"]."\r\n";
$mail_entete .= "Content-Type : text/plain; charset='utf-8'";
$mail_entete .= "\r\nContent-Transfert-Encoding : 8bit\r\n";
$mail_entete .= "X-Mailer:PHP/". phpversion()."\r\n";

//Préparation du corps
$mails_corps = "Message de : $civilite $nom\n";
$mails_corps .= "Adresse : $cp $ville\n";
$mails_corps .= "Son type de message : $type\n\n\n";
$mails_corps .= "$message";

//envoie du mail
if (mail(MAIL_DESTINATAIRE, MAIL_SUJET, $mails_corps, $mail_entete)){
  //le mail est bien expédié
  echo $msg_ok;
} else {
  //le mail n'est pas envoyé
  echo "Une erreur est survenue lors de l'envoie du formulaire par email";
}

//On se connecte à la base de données
$mysqli =new mysqli("localhost", "root", "", "fruitmix");
$res =$mysqli->query("INSERT INTO contact(`civilite`,`nom`,`prenom`,`age`,`mail`,`ville`,`cp`,`type`,`message`)

/VALUES ('$civilite','$nom','$prenom','$age','$mail','$ville','$cp','$type','$message', now())");

 $res =$mysqli->query(" INSERT INTO contact(`civilite`,`nom`,`prenom`,`age`,`mail`,`cp`,`ville`,`type`,`message`)
							VALUES ('$civilite','$nom','$prenom','$age','$mail','$cp','$ville','$type','$message')
							");
?>

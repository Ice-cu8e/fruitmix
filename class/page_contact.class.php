<?php
class page_contact extends page_base {
	private $connect; /* identificant de connexion � la base de donn�es */


	/* constructeur */
	public function __construct($p)
   {
		parent::__construct($p);

		/* connexion : elle sera utilis�e dans toutes
		les m�thodes de la classe gr�ce � la propri�t� $connect */
		include_once ('./inc/connexion.php');
		$this->connect=connexion_bd();
	}
private function verifSaisie()
	{
		// On commence par r�cup�rer les champs du formulaire
		if(isset($_POST['nom']))
				$nom	=$_POST['nom'];
		else    $nom="";

		if(isset($_POST['prenom']))
				$prenom	=$_POST['prenom'];
		else	$prenom="";

		if(isset($_POST['mail']))
				$mail=$_POST['mail'];
		else 	$mail="";

		if(isset($_post['ville']))
				$ville=$post['ville'];
		else	$ville="";

		if(isset($_post['code postal']))
				$code_postal=$post['code postal'];
		else	$code_postal="";

		if(isset($_post['type de message']))
				$type_de_message=$post[''];
		else	$type_de_message="";

		if(isset($_post['message']))
				$message=$post['message'];
		else	$message="";
		// On v�rifie si les champs sont vides
		if (empty($nom) OR empty($prenom) OR empty($mail) or empty($ville) or empty($code_postal) or empty($type_de_message) or empty($message))
		{
			echo 'Attention, saisie des champs obligatoires !' ;
		}
		else
			{ return true ; }
	}

	/* m�thode red�finie de la classe m�re */
	protected function affiche_contenu() {
			include ('vues/formulaire.php');


		}

}
?>

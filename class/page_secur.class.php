<?php

//connexion a la bdd
//On selectionne les champs de la table administration dans un tableau
$mysqli =new mysqli("localhost", "root", "", "fruitmix");
$requete = $mysqli->query("SELECT * FROM administration;");

//Association des valeurs à leurs colonnes
$row = mysqli_fetch_assoc($requete);

class page_secur extends page_base {
	public function __construct() {
		parent::__construct('admin');
		$this->style='administration';
		if (isset($_POST['login']) && $_POST['login']==$row['login'] && $_POST['mdp']==$row['mdp'])
			$_SESSION['login'] = $row['login'];
	}

	protected function affiche_corps() {
		parent::affiche_contenu();
	}

	final protected function affiche_contenu() {
		if (isset($_SESSION['login']))
			$this->affiche_corps();
		else
			include('vues/login.php');
	}

	private function menu_admin() {
	?>
		<ul class='menu_admin'>
			<li><a href="admin_cat_produit.php">Catégories de fruits</a></li>
			<li><a href="admin_produit.php">Fruits</a></li>
			<li><a href="">Catégories de cocktails</a></li>
			<li><a href="">Cocktails</a></li>
		</ul>
	<?php
	}

	protected function affiche_barre_verticale() {
		if (isset($_SESSION['login'])) {
			$this->menu_admin();
			?>
				<div id='deconnexion'>
					<a href="index.php?deconnexion">se déconnecter</a>
				</div>
			<?php
		}
	}
}
?>

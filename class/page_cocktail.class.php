<?php
header('Content-Type: text/html; charset=utf-8');

class page_cocktail extends page_base {
	private $connect; /* identificant de connexion � la base de donn�es */
	private $nbProduits; /* nombre de produits total correspondant � la demande */

	/* constructeur */
	public function __construct($p) {
		parent::__construct($p);

		/* connexion : elle sera utilisée dans toutes
		les m�thodes de la classe gr�ce � la propri�t� $connect */
		include_once ('./inc/connexion.php');
		$this->connect=connexion_bd();
	}

	/* m�thode permettant de retourner toutes les cat�gories de cocktail */
	private function les_categories_cocktails() {
		/* construction de la requ�te */
		$requete = 'SELECT * FROM catcocktail;';

		/* renvoie du r�sultat de la requ�te */
		return $this->connect->query($requete);
	}

	/* m�thode retournant tous les produits de la cat�gorie en cours */
	private function les_cocktails() {
		/* construction de la requ�te */
		$requete = 'SELECT * FROM cocktail';
		if (isset($_GET['categorie']))
			$requete .= ' WHERE categorie='.$_GET['categorie'];

		/* Initialisation du nombre de produits */
		$result = $this->connect->query($requete);
		$this->nbProduits = $result->num_rows;

		/* restriction � 6 produits maximums */
		if (isset($_GET['min']))
			$requete .= ' limit '.$_GET['min'].',6';
		else
			$requete .= ' limit 0,6';

		/* renvoi du r�sultat de la requ�te */
		return $this->connect->query($requete);
	}

	/* m�thode retournant l'occurrence correspondant � la cat�gorie en cours */
	private function categorie_en_cours() {
		if (isset($_GET['categorie'])) {
			$requete = 'select * from catcocktail where id='.$_GET['categorie'];
			return $this->connect->query($requete);
		}
		else {	return false;	}
	}
	/* méthode redéfinie de la classe mère */
	/* Gère les boutons détails de chaque produits */
	protected function affiche_barre_verticale() {
	?>
		<h3>Catégories</h3>
		<ul class='liste_categorie_cocktails'>
	<?php
		$lesCategories = $this->les_categories_cocktails();
		while ($uneOccurrence = $lesCategories->fetch_object()) {
		echo '
		<div class="button raised blue">
			<div class="center">
				<li><a class="lien" href="?categorie='.$uneOccurrence->id.'">'.$uneOccurrence->libCatCocktail.'</a></li>
			</div>
		</div>';
		}
	?>
		</ul>
	<?php
	}

	/* m�thode red�finie de la classe m�re */
	protected function affiche_contenu() {
		/* r�cup�re l'occurrence correspondant � la cat�gorie demand�e
		ou la valeur false si aucune cat�gorie n'est demand�e en particulier */
		$laCategorie = $this->categorie_en_cours();

		/* r�cup�re les produits (6 au maximum) demand�s */
		$lesProduits =  $this->les_cocktails();

		/* si une cat�gorie n'est pas demand�e en particulier, on affiche tous les produits,
		sinon, on affiche le nom de la cat�gorie et le texte correcpondant */
		if (!$laCategorie) {
			echo '
			<div id="cardProdTitre">
	      <div class="cardCocktail">
						<h1>Tous nos cocktails ('.$this->nbProduits.' cocktail(s))</h1>
							<p>Nos cocktails sont tous délicieux et fait maison.</p>
						 </div>
					 </div>
					 ';
		}
		else {
			$cat = $laCategorie->fetch_object();
			echo '
			<div id="cardProdTitre">
	      <div class="cardCocktail">
					<h1>'.$cat->libCatCocktail.' ('.$this->nbProduits.' cocktail(s))</h1>
					<p>'.$cat->description.'</p>
				</div>
			</div>
			';
		}
		?>

		<?php
		/* on parcourt toutes les occurrences de produits � afficher */
		while ($uneOccurrence = $lesProduits->fetch_object()) {
			?>
			<div id="cardCocktail">
	      <div class="cardCocktail">
					<img src='img/Cocktail/<?php echo $uneOccurrence->image ?>.jpg' class="imageCocktails" alt='<?php $uneOccurrence->libCocktail ?>' />
					<h3><?php echo $uneOccurrence->libCocktail ?></h3>
					<p><?php echo substr($uneOccurrence->description,0,1000) ?></p>
					<div class='bouton'>
						<div class="button raised blue">
							<div class="centerDetail">
								<li class="detail"><form class="lien" onclick="var maFenetre = window.open('', 'popup', 'width=700,height=400,left=200,top=200,scrollbars=1');  maFenetre.document.write('<?php echo $uneOccurrence->recette; ?>');" >Detail</form></li>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
		}

		/* construction du pied de la page avec les bouton Premier, Pr�c�dent, Suivant et Dernier
		On construit notamment le lien ($paramURL) qui sera associ� � la balise a de chaque bouton */

		/* on teste si le nombre de produit est sup�rieur � 6 */
		if ($this->nbProduits > 6)
		{
			/* on teste si une cat�gorie �tait demand�e en particulier */
			if (isset($_GET['categorie'])) /* une cat�gorie �tait pr�cis�e, on la repasse dans l'URL */
				$paramURL = '?categorie='.$_GET['categorie'].'&';
			else	/* aucune cat�gorie n'�tait pr�cis�e */
				$paramURL='?';

			/* d�but de l'affichage des boutons */
			echo '<div id="parcours">';
			echo '<ul>';
			if (isset($_GET['min'])) /* une valeur pour le minimum �tait d�j� indiqu� */
				$min = $_GET['min']; /* on la r�cup�re */
			else
				$min = 0; /* aucune valeur pour le minimum �tait indiqu�, on prend 0 */

			/* si le minimum est diff�rent de 0, il y a une page pr�c�dente */
			if ($min != 0) {
				echo '
				<div class="button raised blue">
					<div class="centerDetail">
						<li class="detail"><a class="lien" href="'.$paramURL.'min=0">Premier</a></li>
					</div>
				</div>';
				echo '
				<div class="button raised blue">
					<div class="centerDetail">
						<li class="detail"><a class="lien" href="'.$paramURL.'min='.($min-6).'">Précédent</a></li>
					</div>
				</div>';
			}
			else { /* on est d�j� sur la premi�re page */
				echo '<!-- on peut rajouter du code si besoin -->';
			}

			/* on teste si on est sur la derni�re page */
			if ($min+6 > $this->nbProduits) { /* on est sur la derni�re page, il n'y en a pas � suivre */
				echo '<!-- on peut rajouter du code si besoin -->';
			}
			else { /* il y a une page au moins � suivre */
				echo '
				<div class="button raised blue">
					<div class="centerDetail">
						<li class="detail"><a class="lien" href="'.$paramURL.'min='.($min+6).'">Suivant</a></li>
					</div>
				</div>';
				echo '
				<div class="button raised blue">
					<div class="centerDetail">
						<li class="detail"><a class="lien" href="'.$paramURL.'min='.(((int)($this->nbProduits/6))*6).'">Dernier</a></li>
					</div>
				</div>';
			}
			echo '</ul></div>';
		}
	}
}
?>

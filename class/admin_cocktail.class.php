<?php

class admin_cocktail extends page_secur
{
    private $connect;

    // Constructeur
    public function __construct()
    {
        // Appel du constructeur de la classe parent
        parent::__construct();

        // On stocke dans une variable de session la cat�gorie choisie par l'internaute dans la liste d�roulante
        if (isset($_POST['categorie'])) {
            $_SESSION['categorie'] = $_POST['categorie'];
        } else {
            $_SESSION['categorie'] = 'tout';
        }

        /* connexion : elle sera utilis�e dans toutes
        les m�thodes de la classe gr�ce â la propri�t� $connect */
        include_once('./inc/connexion.php');
        $this->connect=connexion_bd();
    }

    // Affichage de la liste des categorie�gorie dans un formulaire pour permettre
    // � l'internaute de n'afficher qu'une cat�gorie de fruits
    private function liste_categories()
    {
        ?>
		<!-- d�but du formulaire - renvoi vers ce m�me script, par la m�thode POST -->
		<form action='#' method='post'>
		Sélectionnez la catégorie désirée :
		<select name='categorie' size='1'>
		<!-- option du formulaire permettant l'affichage de toutes les cat�gories -->
		<option value='tout'>Toutes les catégories</option>
		<?php
        // Construction de la requ�te
        $requete = 'select * from cocktail order by libCocktail;';
        // Ex�cution de la requ�te permettant de r�cup�rer toutes les cat�gories de fruits
        $result = $this->connect->query($requete);
        while ($ligne=$result->fetch_object()) {
            // Si la cat�gorie trait�e correspond � celle s�lectionn�e par l'internaute
            if ($_SESSION['categorie'] == $ligne->id) {
                // Si oui, elle appara�t comme s�lectionn�e (attribut selected)
                echo '<option selected value='.$ligne->id.'>'.$ligne->libCocktail.'</option>';
            } else {
                // Si non, pas d'attribut selected
                echo '<option value='.$ligne->id.'>'.$ligne->libCocktail.'</option>';
            }
        } ?>
		</select>
		<input type="submit" name="valid" value="Rechercher" />
		</form>
		<?php

    }

    // m�thode permettant de retourner toutes les cat�gories de produits
    private function les_produits()
    {
        // construction de la requ�te
        $requete = 'select * FROM cocktail inner join catcocktail on categorie = catcocktail.id;';
        // si une cat�gorie a �t� s�lectionn�e par l'internaute, on ajoute une condition � la requ�te
        if (isset($_SESSION['categorie']) && $_SESSION['categorie']!='tout') {
            $requete .= ' where categorie='.$_SESSION['categorie'];
        }

        // renvoie du r�sultat de la requ�te
        return $this->connect->query($requete);
    }

    // Affichage de la liste des produits
    private function liste_produits()
    {
        echo '
				<div id="cardAdmin">
					<div class="cardAdmin">
						<h1>Cocktails</h1>';
        // Affichage de la liste d�roulante de s�lection d'une cat�gorie de fruits
        $this->liste_categories();

        // R�cup�ration des fruits correspondant � la cat�gorie s�lectionn�e par l'internaute
        $lesCocktails = $this->les_produits(); ?>
		<br />
		<table class="tableauLigne">
		<tr class="tableauLigne" style="height:50px"><th>Libellé</th><th>Description</th><th>Recette</th></tr>
		<?php
        // Parcours des r�sultats obtenus
        while ($uneOccurrence = $lesCocktails->fetch_object()) {
            ?>
			<tr class="tableauLigne">
			<td style="padding-left:20px"><strong><?php echo $uneOccurrence->libCocktail; ?></strong></td>
			<td style="padding-left:50px"><?php echo $uneOccurrence->description; ?> ...</td>
			<td style="padding-left:50px"><em><?php echo substr($uneOccurrence->recette, 0, 40); ?></em></td>

			<td style="padding-left:50px">
				<div class="button raised blue">
					<div class="centerDetail">
						<li class="detail"><a class="lien" href="?action=modif&id='.$uneOccurrence->id.'">Modifier</a></li>
					</div>
				</div>
			</td>

			<td>
				<div class="button raised blue">
					<div class="centerDetail">
						<li class="detail"><a class="lien" href="?action=suppr&id='.$uneOccurrence->id.'">Supprimer</a></li>
					</div>
				</div>
			</td>
			</tr>

			<?php

        } ?>
				</table>
				<div class="button raised blue">
  					<div class="centerDetail">
  						<li class="detail"><a class="lien" href="?action=ajout">Ajouter</a>
						</div>
					</div>
				</div>
			</div>
		<?php

    }

    // Formulaire vierge d'ajout d'une cat�gorie
    private function form_ajout()
    {
        ?>
        <div id='cardCocktail'>
          <div class='cardCocktail'>
            <form style="margin-bottom:0" action='?action=valid_ajout' method='post'>
              <table>  <!-- le tableau est utilis� dans la mise en forme afin de garantir l'alignement des diff�rents champs de saisie -->
                <tr>
                  <td>Libelle de la catégorie :</td> <!-- Libell� de la cat�gorie -->
                  <td><input style="margin-left:20px" type='text' name='libelle' size='40' maxlength='50' /></td>
                </tr>
                <tr>
                  <td>Description :</td> <!-- Texte de la cat�gorie -->
                  <td><textarea style="margin-left:20px" name='description'></textarea></td>
                </tr>
                <tr>
                  <form action='#' method='post'>
              		Sélectionnez la catégorie désirée :
              		<select name='categorie' size='1'>
              		<!-- option du formulaire permettant l'affichage de toutes les cat�gories -->
              		<option value='tout'>Toutes les catégories</option>
              		<?php
                      // Construction de la requ�te
                      $requete = 'select * from cocktail order by libCocktail;';
                      // Ex�cution de la requ�te permettant de r�cup�rer toutes les cat�gories de fruits
                      $result = $this->connect->query($requete);
                      while ($ligne=$result->fetch_object()) {
                          // Si la cat�gorie trait�e correspond � celle s�lectionn�e par l'internaute
                          if ($_SESSION['categorie'] == $ligne->id) {
                              // Si oui, elle appara�t comme s�lectionn�e (attribut selected)
                              echo '<option selected value='.$ligne->id.'>'.$ligne->libCocktail.'</option>';
                          } else {
                              // Si non, pas d'attribut selected
                              echo '<option value='.$ligne->id.'>'.$ligne->libCocktail.'</option>';
                          }
                      } ?>
              		</select>
              		</form>
                </tr>
                <tr>
                  <td>Recette :</td> <!-- Texte de la cat�gorie -->
                  <td><textarea style="margin-left:20px" name='recette'></textarea></td>
                </tr>
                <tr>
                  <td>Nom de l'image :</td> <!-- Libell� de la cat�gorie -->
                  <td><input style="margin-left:20px" type='text' name='image' size='40' maxlength='50' /></td>
                </tr>
                <tr>
                  <td><input type='submit' name='valid' value='valider' /></td>
                  <td><input type='reset' name='valid' value='recommencer' /></td>
                </tr>
              </table>
            </form>
          </div>
        </div>
    <?php

    }


    // M�thode de la classe m�re red�finie afin de permettre l'affichage du contenu de la page
    protected function affiche_corps()
    {
        if (!isset($_GET['action'])) {
            // Si aucune action n'a �t� d�finie, on affiche simplement la liste des produits
            $this->liste_produits();
        } else {
            // Si une action a �t� d�finie (clic sur un bouton), on agit en fonction
            switch ($_GET['action']) {
                case 'ajout': // Formulaire vierge d'ajout d'une cat�gorie
                    // Le formulaire devra permettre le choix de la cat�gorie dans une liste d�roulante
                    // Le nom de l'image sera simplement saisi
                    $this->form_ajout();
                    break;
                case 'modif': // Formulaire pr�rempli avec la cat�gorie � modifier
                    // Le formulaire devra permettre le choix de la cat�gorie dans une liste d�roulante
                    // A compl�ter
                    break;
                case 'suppr': // Demande de confirmation de suppression
                    // A compl�ter
                    break;
                case 'valid_ajout': // Insertion dans la BdD des informations saisies dans le formulaire
                    $requete = 'insert into cocktail(libCocktail, description, categorie, recette, image)
								                values ("'.$_POST['libelle'].'","'.$_POST['description'].'","'.$_POST['categorie'].'","'.$_POST['recette'].'","'.$_POST['image'].'")';
                    // Ex�cution de la requ�te
                    $result = $this->connect->query($requete);
                    if ($result) {
                        // Si la requ�te s'est bien ex�cut�e
                                                echo '
												<div id="cardAdmin">
									        <div class="cardAdmin">
														<p class="message">L\'insertion s\'est faite avec succès</p>
													</div>
												</div>';
                    } else {
                        // S'il y a eu une erreur d'ex�cution
                                                echo '
												<div id="cardAdmin">
													<div class="cardAdmin">
														<p class="message">Echec lors de l\'insertion</p>
													</div>
												</div>';
                    }
                    // Affichage de la liste des cat�gories
                    $this->liste_produits();
                    break;
                case 'valid_modif': // Modification dans la BdD � partir des informations saisies
                    // A compl�ter
                    $this->liste_produits();
                    break;
                case 'valid_suppr': // Suppression de la cat�gorie et des produits associ�s
                    // A compl�ter
                    $this->liste_produits();
                    break;
            }
        }
    }
}

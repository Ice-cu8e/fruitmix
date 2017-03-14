<?php

class admin_cat_cocktail extends page_secur
{
    private $connect;

    // Constructeur
    public function __construct()
    {
        // Ex�cution du constructeur de la classe m�re
        parent::__construct();

        // Connexion : elle sera utilis�e dans toutes les m�thodes de la classe gr�ce � la propri�t� $connect
        include_once('./inc/connexion.php');
        $this->connect=connexion_bd();
    }

    // M�thode permettant de retourner toutes les cat�gories de produits
    private function les_categories()
    {
        // construction de la requ�te
        $requete = 'select * from catcocktail;';

        // renvoi du r�sultat de la requ�te
        return $this->connect->query($requete);
    }

    // Affichage de la liste des cat�gories
    private function liste_categories()
    {
        // On r�cup�re l'occurrence correspondant � la cat�gorie demand�e ou la valeur false si aucune cat�gorie n'est demand�e en particulier
        $lesCategories = $this->les_categories(); ?>
				<div id='cardAdmin'>
	        <div class='cardAdmin'>
        		<h1>Catégories de fruits</h1>
        		<table class="tableauLigne">
        		<tr class="tableauLigne" style="height:50px"><th>Libellé</th><th>Description</th></tr>
		<?php
        while ($uneOccurrence = $lesCategories->fetch_object()) {
            ?>
			<tr class="tableauLigne">
				<td style="padding-left:20px"><strong><?php echo $uneOccurrence->libCatCocktail; ?></strong></td>
				<td style="padding-left:50px"><?php echo substr($uneOccurrence->description, 0, 30); ?> ...</td>
				<td style="padding-left:50px">
					<div class="button raised blue">
						<div class="centerDetail">
							<li class="detail"><a class="lien" href="?action=modif&id=<?php echo $uneOccurrence->id; ?>">Modifier</a>
						</div>
					</div>
				</td>

				<td>
					<div class="button raised blue">
						<div class="centerDetail">
							<li class="detail"><a class="lien" href="?action=suppr&id=<?php echo $uneOccurrence->id; ?>">Supprimer</a>
						</div>
					</div>
				</td>
			</tr>
			<?php

        } ?>
				</table>
				<div class="button raised blue">
					<div class="centerDetail">
						<li class="detail"><a class="lien" href="?action=ajout">Ajouter</a></li>
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
									<td>Texte associé :</td> <!-- Texte de la cat�gorie -->
									<td><textarea style="margin-left:20px" name='texte'></textarea></td>
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

    // Formulaire de modification des donn�es
    private function form_modif()
    {
        // On r�cup�re les informations de la cat�gorie que l'utilisateur souhaite modifier
        $requete = 'select * from catcocktail where id='.$_GET['id'];

        // Ex�cution de la requ�te
        $result = $this->connect->query($requete);

        if (!$result) {
            // Si l'ex�cution de la requ�te ne s'est pas bien pass�e
            echo '
						<div id="cardAdmin">
							<div class="cardAdmin">
								<p class="message">Modification impossible</p>
							</div>
						</div>';
            // Affichage de la liste des cat�gories
            $this->liste_categorie();
        } else {
            // Si l'ex�cution de la requ�te s'est bien pass�e
            $laCategorie = $result->fetch_object(); ?>
						<div id='cardCocktail'>
			        <div class='cardCocktail'>
								<form style="margin-bottom:0" action='?action=valid_modif' method='post'>
									<input type='hidden' name='ident' value='<?php echo $laCategorie->id; ?>'> <!-- Identifiant de la cat�gorie (en champ cach�) -->
									<table>  <!-- le tableau est utilis� dans la mise en forme afin de garantir l'alignement des diff�rents champs de saisie -->
										<tr>
											<td>Libelle : </td> <!-- Libell� de la cat�gorie -->
											<td><input style="margin-left:20px" type='text' value='<?php echo $laCategorie->libCatCocktail; ?>' name='libelle' size='40' maxlength='50' /></td>
										</tr>
										<tr>
											<td>Texte : </td> <!-- Texte de la cat�gorie -->
											<td><textarea style="margin-left:20px; height: 50px" name='texte'><?php echo $laCategorie->description; ?></textarea></td>
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
    }

    // Formulaire de demande de confirmation de la suppression
    private function form_suppr()
    {
        ?>
				<div id='cardCocktail'>
	        <div class='cardCocktail'>
						<p>Confirmez vous la suppression de cette catégorie ?</p>
						<form style="margin-bottom:0" action='?action=valid_suppr' method='post'>
							<table>  <!-- le tableau est utilis� dans la mise en forme afin de garantir l'alignement des diff�rents champs de saisie -->
								<tr>
									<td></td>
									<!-- Identifiant de la cat�gorie, en champ cach� -->
									<td><input type='hidden' name='id' value='<?php echo $_GET['id']; ?>'/></td>
								</tr>
								<tr>
									<td><input type='submit' name='valid' value='valider' /></td>
									<td><input type='submit' name='valid' value='annuler' /></td>
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
            // Si aucune action n'est d�finie, on affiche la liste des cat�gories
            $this->liste_categories();
        } else {
            // Si une action est d�finie, on agit en fonction
            switch ($_GET['action']) {
                case 'ajout': // Formulaire vierge d'ajout d'une cat�gorie
                    $this->form_ajout();
                    break;

                case 'modif': // Formulaire pr�rempli avec la cat�gorie � modifier
                    $this->form_modif();
                    break;

                case 'suppr': // Demande de confirmation de suppression
                    $this->form_suppr();
                    break;

                case 'valid_ajout': // Insertion dans la BdD des informations saisies dans le formulaire
                    // Construction de la requ�te d'insertion
                    // exemple : insert into catcocktail(lib, texte) values ("Fruits secs", "Lorem Ipsum");
                    $requete = 'insert into catcocktail(libCatCocktail, description)
								values ("'.$_POST['libelle'].'","'.$_POST['texte'].'")';
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
                    $this->liste_categories();
                    break;

                case 'valid_modif': // Modification dans la BdD � partir des informations saisies
                    // Construction de la requ�te de modification
                    // exemple : update catcocktail set lib="aurantiac�es", texte="Lorrem Ipsum" where id=3;
                    $requete = 'update catcocktail
								set libCatCocktail="'.$_POST['libelle'].'", description="'.$_POST['texte'].'"
								where id='.$_POST['ident'];
                    // Ex�cution de la requ�te
                    $result = $this->connect->query($requete);
                    if ($result) {
                        // Si la requ�te s'est bien ex�cut�e
                                                echo '
												<div id="cardAdmin">
													<div class="cardAdmin">
														<p class="message">La modification s\'est faite avec succès</p>
													</div>
												</div>';
                    } else {
                        // S'il y a eu une erreur d'ex�cution
                                                echo '
												<div id="cardAdmin">
													<div class="cardAdmin">
														<p class="message">Echec lors de la modification</p>
													</div>
												</div>';
                    }
                    // Affichage de la liste des cat�gories
                    $this->liste_categories();
                    break;

                case 'valid_suppr': // Suppression de la cat�gorie et des produits associ�s
                    if ($_POST['valid'] == 'valider') { // Si l'utilisateur a valid� la suppression
                        // Construction de la requ�te de suppression des produits de la cat�gorie choisie
                        // exemple : delete from produit where cat=6;
                        $requete = 'delete from catcocktail
									where id='.$_POST['id'].';';
                        // Ex�cution de la requ�te
                        $result = $this->connect->query($requete);
                        if ($result) {
                            // Si la requ�te de suppression des produits s'est bien ex�cut�e
                            // Construction de la requ�te de suppression de la cat�gorie
                            // exemple : delete from catcocktail where id=6;
                            $requete = 'delete from catcocktail
										where id='.$_POST['id'].';';
                            // Ex�cution de la requ�te
                            $result = $this->connect->query($requete);
                            if ($result) {
                                // Si la requ�te s'est bien ex�cut�e
                                echo '
																<div id="cardAdmin">
													        <div class="cardAdmin">
																		<p class="message">La suppression s\'est faite avec succès</p>
																	</div>
																</div>';
                            } else {
                                // S'il y a eu une erreur d'ex�cution
                                echo '
																<div id="cardAdmin">
																	<div class="cardAdmin">
																		<p class="message">Echec lors de la suppression</p>
																	</div>
																</div>';
                            }
                        } else {
                            // S'il y a eu une erreur d'ex�cution
                            echo '
														<div id="cardAdmin">
															<div class="cardAdmin">
																<p class="message">Echec lors de la suppression</p>
															</div>
														</div>';
                        }
                    }
                    // Affichage de la liste des cat�gories
                    $this->liste_categories();
                    break;
            }
        }
    }
}

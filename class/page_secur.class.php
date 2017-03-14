<?php

session_start();

class page_secur extends page_base
{
    public function __construct()
    {
        parent::__construct('admin');
        $this->style='administration';

        if (isset($_POST['login']) && $_POST['login']=='admin' && $_POST['mdp']=='admin') {
            $_SESSION['login'] = 'admin';
        }
    }

    protected function affiche_corps()
    {
        parent::affiche_contenu();
    }

    final protected function affiche_contenu()
    {
        if (isset($_SESSION['login'])) {
            $this->affiche_corps();
        } else {
            include('vues/login.php');
        }
    }

    private function menu_admin()
    {
        ?>
    <div id="barre_horizontale">
        <ul class="pad_list">
            <div class="button raised blue">
                <div class="centerDetail">
                    <li class="detail"><a class="lien" href="admin_cat_produit.php">Catégories fruits</a></li>
                </div>
            </div>
            <div class="button raised blue">
                <div class="centerDetail">
                    <li class="detail"><a class="lien" href="admin_produit.php">Fruits</a></li>
                </div>
            </div>
            <div class="button raised blue">
                <div class="centerDetail">
                    <li class="detail"><a class="lien" href="admin_cat_cocktail.php">Catégories cocktails</a></li>
                </div>
            </div>
            <div class="button raised blue">
                <div class="centerDetail">
                    <li class="detail"><a class="lien" href="admin_cocktail.php">Recettes</a></li>
                </div>
            </div>
            <?php

    }

    protected function affiche_barre_verticale()
    {
        if (isset($_SESSION['login'])) {
            $this->menu_admin(); ?>
                <div class="button raised blue">
                    <div class="centerDetail">
                        <li class="detail"><a class="lien" href="index.php?deconnexion">se déconnecter</a></li>
                    </div>
                </div>
        </ul>
    </div>
    <?php

        }
    }
}
?>

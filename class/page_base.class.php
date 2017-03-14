<?php
class page_base
{
    protected $titre;
    private $style=array('principal');
    private $script=array();
    protected $corps;
    protected $barre_verticale;
    private $page;

    /***** Constructeur ****/
    public function __construct($Page)
    {
        if (isset($_GET['deconnexion'])) {
            session_destroy();
        }
        $this->page = $Page;
    }

    public function __set($propriete, $valeur)
    {
        switch ($propriete) {
            case 'style':  {
                $this->style[count($this->style)+1] = $valeur;
                break;
            }
            case 'script': {
                $this->script[count($this->script)+1] = $valeur;
                break;
            }
            case 'corps': {
                $this->corps .= $valeur;
                break;
            }
            case 'titre': {
                $this->titre = $valeur;
                break;
            }
            case 'barre_verticale': {
                $this->barre_verticale = $valeur;
                break;
            }
        }
    }
    /****************** Gestion du titre  **************/
    /*Insertion du titre */
    private function affiche_titre()
    {
        echo $this->titre;
    }
    /**************** Gestion des scripts JavaScript */
    /* Insertion des inclusions de scripts   */
    private function affiche_script()
    {
        foreach ($this->script as $s) {
            echo "<script type='text/javascript' src='js/".$s.".js' />\n";
        }
    }
    /*********************Gestion des styles *************/
    /*  Insertion des feuilles de style  */
    private function affiche_style()
    {
        foreach ($this->style as $s) {
            echo "<link rel='stylesheet' type='text/css' href='css/".$s.".css' />\n";
        }
    }
    /********************* Affichage de la partie ent�te *****/
//	protected function affiche_entete()
//	{
//		//appel de la vue affichage ent�te de page
//		require 'Vues/affiche_entete.php';
//	}


// Permet d'afficher le contenu d'une bdd sur la page
    protected function affiche_contenu()
    {
        echo $this->corps;
    }

    //Permet d'afficher la barre verticale pour les catégories
    protected function affiche_barre_verticale()
    {
        echo $this->barre_verticale;
    }
    /*************** Affichage de la zone conteneur **********/
    public function affiche_conteneur()
    {
        //appel de la vue du contenu de page
        require 'vues/affiche_conteneur.php';
    }
    /************* Affichage du pied de la page *************/
    public function affiche_pied()
    {
        //appel de la vue du pied de page
        require 'vues/affiche_pied.php';
    }
    //Permet d'appeler la barre verticale responsive
    public function barre_verticale()
    {
        require 'vues/affiche_barre_verticale.php';
    }
    //Permet d'appeler l'entete
    public function entete()
    {
        require 'vues/affiche_entete.php';
    }
    /** Fonction permettant l'affichage de la totalité de la page ****/
    public function affiche_page()
    {
        //appel de la vue permettant l'affichage complet de la page
        require 'vues/affiche_page.php';
    }
}

<?php
/* index.php permet d'afficher la page d'accueil du site
    Deux fichiers sont nécessaires à l'affichage de la page d'accueil :
       - autoload.php qui instancie et charge "page.accueil.php"
       - affiche_accueil.php qui génère et affiche le formulaire de la page d'accueil */

    session_start();

    include_once('class/autoload.php');

    require('vues/affiche_accueil.php');

    $pageAccueil->affiche_page();

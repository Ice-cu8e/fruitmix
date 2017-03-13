<?php
   	include_once('class/autoload.php');

  	$pageProduit = new page_produit('produit');

    $pageProduit->barre_verticale();
    $pageProduit->entete();
  	$pageProduit->affiche_page();
?>

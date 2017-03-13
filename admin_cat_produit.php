<?php
   	include_once('class/autoload.php');

  	$pageAdminCat = new admin_cat_produit();
    $pageAdminCat->barre_verticale();
    $pageAdminCat->entete();
  	$pageAdminCat->affiche_page();
?>

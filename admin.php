<?php
   	include_once('class/autoload.php');

  	$pageAdmin = new page_secur();
    $pageAdmin->barre_verticale();
    $pageAdmin->entete();

  	$pageAdmin->corps = "
    <div id='cardAdmin'>
    	<div class='cardAdmin'>
    		<h1>Espace d'administration</h1>
    		<p>Dans cet espace, vous pouvez gérer les produits et les cocktails, ainsi que les catégories.</p>
    		<p>Veuillez vous servir du menu dans la barre verticale ci-contre pour gérer ces éléments.</p>
      </div>
    </div>
  		";

  	$pageAdmin->affiche_page();
?>

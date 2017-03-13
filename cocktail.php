<?php
    include_once('class/autoload.php');

    $pagecocktail = new page_cocktail('cocktail');

    $pagecocktail->barre_verticale();
    $pagecocktail->entete();
    $pagecocktail->affiche_page();
?>

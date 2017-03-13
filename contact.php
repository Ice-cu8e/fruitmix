<?php
   	include_once('class/autoload.php');

	$pageContact = new page_contact('contact');

  $pageContact->barre_verticale();
  $pageContact->entete();
  $pageContact->affiche_page();
?>

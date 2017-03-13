<?php
/* PHP5 comprend l'Auto-chargement de classes
==> lorsque que l'on va instancier une classe, PHP va automatiquement chercher la définition de cette classe
On réalise ceci grâce la fonction __autoload.  
Dans le cas présent, qu'elle que soit la classe et son nom, PHP va charger en mémoire sa définiton   
----------------------------------------------------------------------------------------------------------*/
function __autoload($nom_classe) 
{
   require_once $nom_classe.'.class.php';
   //Il est conseillé d'utiliser require_once() : dans ce cas, le fichier ne sera inclu qu'une seule fois //
 }
 ?>
 
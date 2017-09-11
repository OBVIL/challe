<?php
return array(
  "title" => 'Robert Challe', // Nom du corpus
  "srcdir" => dirname( __FILE__ ), // dossier source depuis lequel exécuter la commande de mise à jour
  "cmdup" => "git pull 2>&1", // commande de mise à jour
  "pass" => null, // Mot de passe à renseigner obligatoirement à l’installation
  "srcglob" => array( "xml/challe_illustres-francaises.xml" ), // sources XML à publier
  "sqlite" => "challe.sqlite", // nom de la base avec les métadonnées
);
?>

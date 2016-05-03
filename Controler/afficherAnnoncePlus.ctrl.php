<?php

//si pas connecté, affiche pop up 'vous devez vous conncecter pour afficher les infos du vendeur' si connecté renvoie vers formulaire
if(!isset($_SESSION['pseudo'])) {
  $ref =
}
else {
  $ref = "../afficherFormContact.ctrl.php";
}
//////////////////////////


// Partie principale

  // Inclusion du modèle
include_once("../model/DAO.class.php");

$id_annonce = $_GET['id_annonce'];

$annoncePlus = $dao->getAnnoncePlus($id_annonce);

  include("../view/annonces.view.php");

   ?>

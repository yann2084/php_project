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

$cat = $_GET['categorie'];
$reg = $_GET['region'];
$motcle = $_GET['motcle'];

if(!isset($_GET['categorie']) && !isset($_GET['region']) && !isset($_GET['motcle'])){
  $annonces = $dao->firstN(20);
}
else if(isset($_GET['categorie']) && !isset($_GET['region']) && !isset($_GET['motcle'])){
{
  $annonces = $dao->firstNcat($cat,20);
}
else if(!isset($_GET['categorie']) && isset($_GET['region']) && !isset($_GET['motcle'])){
  $annonces = $dao->firstNreg($reg,20);
}
else if(!isset($_GET['categorie']) && !isset($_GET['region']) && isset($_GET['motcle'])){
  $annonces = $dao->firstNmotcle($motcle, 20);
}
else if(isset($_GET['categorie']) && isset($_GET['region']) && !isset($_GET['motcle'])){
  $annonces = $dao->firstNcatReg($act,$reg,20);
}
else if(isset($_GET['categorie']) && !isset($_GET['region']) && isset($_GET['motcle'])){
  $annonces = $dao->firstNcatMotcle($cat, $motcle, 20);
}
else if(!isset($_GET['categorie']) && isset($_GET['region']) && isset($_GET['motcle'])){
  $annonces = $dao->firstNregMotcle($reg,$motcle, 20);
}
else{
  $annonces = $dao->firstNcatRegMotcle($cat,$reg,$motcle, 20);
}



  include("../view/annonces.view.php");

   ?>

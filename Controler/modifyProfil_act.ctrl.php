<p<?php

  include_once("../model/DAO.class.php");

session_start();

//partie recupoeration de données


if(isset($_SESSION['pseudo'])) {

  $pseudo = $_SESSION(['pseudo']);


  $nom = $_POST(['nom']);
  $prenom = $_POST(['prenom']);
  $codePostal = $_POST(['codePostal']);
  $ville = $_POST(['ville']);
  $mail =  $_POST(['mail']);
  $photo = $_POST(['photo']);
  $estConnecte = true;



}
else {
  $estConnecte = false;

}



// Partie traitement , acces au modele

if($estConnecte){

$profil = $dao->modifyProfil($pseudo, $nom, $prenom, $codePostal, $ville, $photo);
  $profil = $dao->getMesInfos($pseudo);

}

//partie choix de la vue


if($estConnecte){
  include("../view/modifyProfil_act.view.php");

}else{
  echo 'Merci de vous authentifier pour accéder à cette page';
  include('../auth.view.php');
}

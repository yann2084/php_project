<p<?php

session_start();

if(!isset($_SESSION['pseudo'])) {
  echo 'Merci de vous authentifier pour accéder à cette page';
  include('../auth.view.php');
  exit;
}
// Partie principale

  // Inclusion du modèle
  include_once("../model/DAO.class.php");
  $pseudo = $_SESSION(['pseudo']);
  $profil = $dao->getMesInfos($pseudo);

  include("../view/modifyProfil.view.php");

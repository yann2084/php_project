<p<?php

session_start();

if(!isset($_SESSION['pseudo'])) {
  echo 'Merci de vous authentifier pour accéder à cette page';
  include('login.htm');
  exit;
}
// Partie principale

  // Inclusion du modèle
  include_once("../model/DAO.class.php");
  $pseudo = $_SESSION(['pseudo']);
  $id_user = $dao->getIdUser($pseudo);
  $mesAnnonces = $dao->getMesAnnonces($id_user['id_user']);

  include("../view/mes_annonces.view.php");

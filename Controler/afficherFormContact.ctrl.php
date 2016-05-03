<?php
session_start();

if(!isset($_SESSION['pseudo'])) {
  echo 'Merci de vous authentifier pour accéder à cette page';
  include('login.htm');
  exit;
}

include_once("../model/DAO.class.php");

include("../view/formulaireContact.view.php");




?>

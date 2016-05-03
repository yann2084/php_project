<?php

include_once("../model/DAO.class.php");

if(isset($_POST) && !empty($_POST['pseudo']) && !empty($_POST['mdp'])) {
 extract($_POST);

$mdp = $_POST['mdp'];
$pseudo = $_POST['pseudo'];

$tab = getMdpUser($pseudo);


//








 if($tab['mdp'] != $mdp) {
   echo '<p>Les informations saisies n\'ont pas permises de vous authentifier. Merci de recommencer</p>';
   include("../view/auth.view.php");
   exit;
 }
   else {
     session_start();
     $_SESSION['pseudo'] = $pseudo;

     include("../view/index_user.view.php");
   }
}
else {
 echo '<p>Merci de remplir les deux champs.</p>';

 include("../view/auth.view.php");
  exit;
}

//rajouter les vues selon res

?>

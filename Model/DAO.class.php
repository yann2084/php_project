<?php



require_once("../model/user.class.php");
require_once("../model/annonces.class.php");
require_once("../model/region.class.php");
require_once("../model/marque.class.php");
require_once("../model/categorie.class.php");


$n = 20;
    // Definition de l'unique objet de DAO
    $dao = new DAO();

    // Le Data Access Object
    // Il représente la base de donnée
    class DAO {
        // L'objet local PDO de la base de donnée
        private $db;
        // Le type, le chemin et le nom de la base de donnée
        private $database = 'sqlite:../data/bd/vehicules.bd';

        // Constructeur chargé d'ouvrir la BD
        function __construct() {

            try {
                $this->db = new PDO($this->database);
                if (!$this->db) {
                    die ("Database error");
                }
                // Positionne PDO pour lancer les erreurs sous forme d'exeptions
                $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("PDO Error :".$e->getMessage()." $this->database\n");
            }
        }


        function getIdUser($pseudo){
          try {
              $r = $this->db->query("SELECT id_user FROM user WHERE pseudo = '$pseudo'");
              $res = $r->fetchAll(PDO::FETCH_CLASS,'Annonces');
          } catch (PDOException $e) {
              die("PDO Error :".$e->getMessage());
          }
          return $res;



        }

        //retourne un tableau d'objets annonces
        function getMesAnnonces($pseudo) {


          try {
              $r = $this->db->query("SELECT * FROM annonces WHERE pseudo = '$pseudo'");
              $res = $r->fetch(PDO::FETCH_ASSOC);
          } catch (PDOException $e) {
              die("PDO Error :".$e->getMessage());
          }
          return $res;
        }


        //retourne le mdp du user
        function getMdpUser($pseudo){
          try {
              $r = $this->db->query("SELECT mdp FROM user WHERE pseudo = '$pseudo'");
              $res = $r->fetch(PDO::FETCH_ASSOC);
          } catch (PDOException $e) {
              die("PDO Error :".$e->getMessage());
          }
          return $res;
        }

        function getMesInfos($pseudo){
          try {
              $r = $this->db->query("SELECT * FROM user WHERE pseudo = '$pseudo'");
              $res = $r->fetch(PDO::FETCH_ASSOC);
          } catch (PDOException $e) {
              die("PDO Error :".$e->getMessage());
          }
          return $res;
        }

        function modifyProfil($pseudo, $nom, $prenom, $codePostal, $ville, $photo){
          try {
              $r = $this->db->query("UPDATE user SET nom = '$nom', prenom = '$prenom', codePostal = $codePostal, ville = '$ville', photo = $photo WHERE pseudo = '$pseudo'");
              //$res = $r->fetch(PDO::FETCH_ASSOC);
          } catch (PDOException $e) {
              die("PDO Error :".$e->getMessage());
          }
          return $res;
        }

        function getAnnoncePlus($id_annonce){
            try {
                $r = $this->db->query("SELECT * FROM annonce WHERE id_annonce = '$id_annonce'");
                $res = $r->fetch(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                die("PDO Error :".$e->getMessage());
            }
            return $res;
          }

        }


//         UPDATE table
// SET colonne_1 = 'valeur 1', colonne_2 = 'valeur 2', colonne_3 = 'valeur 3'
// WHERE condition



        //retourne les n premières annonces
        function firstN($n){
          try {
              $r = $this->db->query("SELECT * FROM annonces ORDER BY date_mel ASC LIMIT $GLOBALS['n']");
              $res = $r->fetchAll(PDO::FETCH_CLASS,'Annonces');
          } catch (PDOException $e) {
              die("PDO Error :".$e->getMessage());
          }
          return $res;
        }

        //retourne n annonces de telle categorie
        function firstNcat($cat,$n) {
          try {
              $r = $this->db->query("SELECT * FROM annonces WHERE id_cat = '$cat' ORDER BY date_mel ASC LIMIT $n");
              $res = $r->fetchAll(PDO::FETCH_CLASS,'Annonces');
          } catch (PDOException $e) {
              die("PDO Error :".$e->getMessage());
          }
          return $res;
        }

        //retourne n annonces de telle region
        function firstNreg($reg,$n) {
          try {
              $r = $this->db->query("SELECT * FROM annonces WHERE id_reg = '$reg' ORDER BY date_mel ASC LIMIT $n");
              $res = $r->fetchAll(PDO::FETCH_CLASS,'Annonces');
          } catch (PDOException $e) {
              die("PDO Error :".$e->getMessage());
          }
          return $res;
        }

        //retourne n annonces contenant tel mot cle
        function firstNmotcle($motcle,$n) {
          try {
              $r = $this->db->query("SELECT * FROM annonces WHERE titre LIKE '$motcle' ORDER BY date_mel ASC LIMIT $n");
              $res = $r->fetchAll(PDO::FETCH_CLASS,'Annonces');
          } catch (PDOException $e) {
              die("PDO Error :".$e->getMessage());
          }
          return $res;
        }

        //retourne n annonces de telle categorie et telle region
        function firstNcatReg($cat,$reg,$n) {
          try {
              $r = $this->db->query("SELECT * FROM annonces WHERE id_cat = '$cat' AND id_reg = '$reg' ORDER BY date_mel ASC LIMIT $n");
              $res = $r->fetchAll(PDO::FETCH_CLASS,'Annonces');
          } catch (PDOException $e) {
              die("PDO Error :".$e->getMessage());
          }
          return $res;
        }

        function firstNcatMotcle($cat,$motcle,$n) {
          try {
              $r = $this->db->query("SELECT * FROM annonces WHERE id_cat = '$cat' AND titre LIKE '$motcle' ORDER BY date_mel ASC LIMIT $n");
              $res = $r->fetchAll(PDO::FETCH_CLASS,'Annonces');
          } catch (PDOException $e) {
              die("PDO Error :".$e->getMessage());
          }
          return $res;
        }

        function firstNregMotcle($reg,$motcle,$n) {
          try {
              $r = $this->db->query("SELECT * FROM annonces WHERE id_region = '$reg' AND titre LIKE '$motcle' ORDER BY date_mel ASC LIMIT $n");
              $res = $r->fetchAll(PDO::FETCH_CLASS,'Annonces');
          } catch (PDOException $e) {
              die("PDO Error :".$e->getMessage());
          }
          return $res;
        }

        function firstNcatRegMotcle($cat, $reg,$motcle,$n) {
          try {
              $r = $this->db->query("SELECT * FROM annonces WHERE id_cat = '$cat' AND id_region = '$reg' AND titre LIKE '$motcle' ORDER BY date_mel ASC LIMIT $n");
              $res = $r->fetchAll(PDO::FETCH_CLASS,'Annonces');
          } catch (PDOException $e) {
              die("PDO Error :".$e->getMessage());
          }
          return $res;
        }

        //voir comment inclure le prix à la requete (bornes)


        // $req = "SELECT [ce_que_tu_veux]
        //         FROM taTable
        //         WHERE type = '".$typeVenantDuFormulaire."'
        //         AND prix = ".$prixVenantDuFormulaire."
        //         AND localisation = '".$localisationVenantDuFormulaire."'";
        //
        // $result = mysql_query($req) or die(mysql_error());
        // $data = myql_fetch_assoc($result);



      }
?>

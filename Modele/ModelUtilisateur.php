<?php
	require_once File::build_path(array("Modele","Model.php"));
	class ModelUtilisateur{
		private $idUtil;
		private $nomUtil;
		private $pseudoUtil;
                private $mdpUtil;
                private $prenomUtil;
                private $ageUtil;
                private $villeUtil;
                private $isAdmin;
                private $nonce;
		
		
		//Guetters et Setters
		public function getIdUtilisateur(){
			return $this->idUtil;
		}
		public function getNomUtil(){
			return $this->nomUtil;
		}
		public function getPseudoUtil(){
			return $this->pseudoUtil;
		}
                public function getMdpUtil(){
			return $this->mdpUtil;
		}
       
                public function getPrenomUtil(){
			return $this->prenomUtil;
                }
                public function getAgeUtil(){
			return $this->ageUtil;
		}
                public function getVilleUtil(){
			return $this->villeUtil;
		}
                public function getisAdmin(){
			return $this->isAdmin;
		}
                  public function getNonce(){
			return $this->nonce;
		}
                
                	
		public function setIdUtilisateur($IdUtil2){
			$this->idUtil=$IdUtil2;
		}
		public function setNomUtil($nomUtil2){
			$this->nomUtil=$nomUtil2;
		}
		public function setPseudoUtil($pseudo2){
			$this->pseudoUtil=$pseudo2;
		}
		public function setMdpUtil($MdpUtil2){
			$this->mdpUtil=$MdpUtil2;
		}
		public function setPrenomUtil($prenomUtil2){
			$this->prenomUtil=$prenomUtil2;
		}
		public function setAgeUtil($age2){
			$this->ageUtil=$age2;
		}
                public function setVilleUtil($ville2){
			$this->villeUtil=$ville2;
		}
                 public function setisAdmin($boolean){
			$this->isAdmin=$boolean;
		}
                 public function setNonceNULL(){
			$this->nonce = NULL;
		}
		
		
		//Constructeur
		public function __construct($id = NULL, $nom = NULL, $pseudo = NULL, $mdp = NULL, $prenom = NULL, $age = NULL, $ville = NULL, $isAdmin= NULL, $nonce=NULL){
			if (!is_null($nom) && !is_null($pseudo) && !is_null($mdp) && !is_null($prenom) && !is_null($age) && !is_null($ville)) {
				$this->idUtil = $id;
				$this->nomUtil = $nom;
				$this->pseudoUtil = $pseudo;
                                $this->mdpUtil = $mdp;
				$this->prenomUtil = $prenom;
				$this->ageUtil = $age;
                                $this->villeUtil = $ville;
                                $this->isAdmin= $isAdmin;
                                $this->nonce= $nonce;
			} 
		}
		
		//Fonctions
		public static function getAllUtilisateur(){
			$rep = Model::$pdo->query("SELECT idUtil,pseudoUtil,prenomUtil,nomUtil,ageUtil,villeUtil FROM Utilisateur");
			$rep->setFetchMode(PDO::FETCH_CLASS, 'ModelUtilisateur');
			$tab_obj = $rep->fetchAll();
			return $tab_obj;
		}
		
                

                public static function getUtilisateurbyId($login){
			$rep = Model::$pdo->query("SELECT * FROM Utilisateur WHERE idUtil='$login'");
			$rep->setFetchMode(PDO::FETCH_CLASS, 'ModelUtilisateur');
			$tab_obj = $rep->fetchAll();
                        if (empty($tab_obj))
                             return false;
			return $tab_obj[0];
		}
                
		public static function getUtilisateurbyLogin($login){
			$rep = Model::$pdo->query("SELECT * FROM Utilisateur WHERE pseudoUtil='$login'");
			$rep->setFetchMode(PDO::FETCH_CLASS, 'ModelUtilisateur');
			$tab_obj = $rep->fetchAll();
                        if (empty($tab_obj))
                             return false;
			return $tab_obj[0];
		}
                
                public static function getUtilisateurId($login){
			$rep = Model::$pdo->query("SELECT idUtil FROM Utilisateur WHERE pseudoUtil=$login");
			$rep->setFetchMode(PDO::FETCH_CLASS, 'ModelUtilisateur');
			$tab_obj = $rep->fetchAll();
                        if (empty($tab_obj))
                             return false;
			return $tab_obj[0];
		}
                
           
		public static function deleteUtilisateurById($idUtil){
			$rep = Model::$pdo->query("DELETE FROM Utilisateur WHERE idUtil='$idUtil'");
			$rep->setFetchMode(PDO::FETCH_CLASS, 'ModelUtilisateur');
			
		}
                
                
		//modif le 1/12/17
		public function save(){
			$sql = "INSERT INTO Utilisateur (idUtil,nomUtil,prenomUtil,mdpUtil,pseudoUtil,ageUtil,villeUtil,isAdmin,nonce) VALUES (:id,:nom,:prenom,:mdp,:pseudo,:age,:ville,:isAdmin,:nonce)";
			$req_prep = Model::$pdo->prepare($sql);
			$values = array(
                                "id" => $this->idUtil,
				"nom" => $this->nomUtil,
                                "prenom" => $this->prenomUtil,
                                "mdp" => $this->mdpUtil,
                                "pseudo" => $this->pseudoUtil,
				"age" => $this->ageUtil,
                                "ville" => $this->villeUtil,
                                "isAdmin" => $this->isAdmin,
                                "nonce" => $this->nonce,
                                
			);
			$req_prep->execute($values);
		}
                
                public static function checkPseudo($login){ //renvoie true si pseudo pas utilisé
                                $rep = Model::$pdo->query("SELECT COUNT(*) AS NbPseudo FROM Utilisateur WHERE pseudoUtil='$login'");
                                $nombre = $rep->fetch();
                                $rep->closeCursor();
                                
                                if($nombre['NbPseudo'] ==1){
                                    return false;
                                }
                                else{

                                return true;
                                
                            }
                }
                
                public static function checkPassword($login,$mot_de_passe_chiffre){
                   $rep = Model::$pdo->query("SELECT COUNT(*) AS NbPseudo FROM Utilisateur WHERE pseudoUtil='$login' AND mdpUtil='$mot_de_passe_chiffre'" );
                    $nombre = $rep->fetch();
                    $rep->closeCursor();

                    if($nombre['NbPseudo'] == 1){
                         return true;
                    }
                    else{
                        return false;
                    }
                }
                                 
              public static function update($u){
			//check si le pseudo n'existe pas déjà dans la bd
			
			if(!(ModelUtilisateur::checkPseudo($u->getPseudoUtil()))){
				$sql = "UPDATE Utilisateur SET pseudoUtil=:pseudo,mdpUtil=:mdp,nomUtil=:nom,prenomUtil=:prenom,ageUtil=:age,villeUtil=:ville,isAdmin=:isAdmin,nonce=:nonce WHERE idUtil=:id";
				$req_prep = Model::$pdo->prepare($sql);
				$values = array(
					"id" => $u->idUtil,
                                        "pseudo" => $u->pseudoUtil,
                                        "mdp" => $u->mdpUtil,
					"nom" => $u->nomUtil,
					"prenom" => $u->prenomUtil,
					"age" => $u->ageUtil,
					"ville" => $u->villeUtil,
                                        "isAdmin" => $u->isAdmin,
                                        "nonce" => $u->nonce,
				);
				$req_prep->execute($values);
			}
			else{
				$pagetitle = "error";
				$controller="utilisateur";
				$view="error";
				require File::build_path(array("Vues","view.php"));
			}
		}
                
                public static function updateNonce($login){
                    $sql = "UPDATE Utilisateur SET nonce=:nonce WHERE pseudoUtil=:login";
                    $req_prep = Model::$pdo->prepare($sql);
                    $values = array(
                        "nonce" => NULL,
                        "login" => $login,
                    );
                    $req_prep->execute($values);

                }



}
		
?>
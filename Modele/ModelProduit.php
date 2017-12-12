<?php
	require_once File::build_path(array("Modele","Model.php"));
        
	class ModelProduit{
		private $idProduit;
		private $nomProduit;
		private $Couleur;
                private $quantiteProdStock;
                private $prixProd;
		
		
		//Guetters et Setters
		public function getIdProduit(){
			return $this->idProduit;
		}
		public function getNomProduit(){
			return $this->nomProduit;
		}
		public function getCouleur(){
			return $this->Couleur;
		}
                
                public function getPrixProd()
                {
                    return $this->prixProd;
                }
		
                public function getQuantiteProdStock()
                {
                    return $this->quantiteProdStock;
                }
                
		public function setIdProduit($idProduit2){
			$this->idProduit=$idProduit2;
		}
		public function setNomProduit($nomProduit2){
			$this->nomProduit=$nomProduit2;
		}
		public function setCouleur($Couleur2){
			$this->Couleur=$Couleur2;
		}
                
                public function setQuantiteProdStock($quant)
                {
                    $this->quantiteProdStock=$quant;
                }
                
                public static function getPrixById($idProduit)
                {
                    $sql=Model::$pdo->query("SELECT prixProd FROM Produit WHERE idProduit=$idProduit");
                    $rep=$sql->fetch();
                    $sql->closeCursor();
                    return $rep[0];
                }
		
		
		//Constructeur
		public function __construct($id = NULL, $nom = NULL, $coul = NULL,$quant = NULL,$prix =  NULL){
			if (!is_null($quant) && !is_null($prix) && !is_null($nom) && !is_null($coul)) {
				$this->idProduit = $id;
				$this->nomProduit = $nom;
				$this->Couleur = $coul;
                                $this->quantiteProdStock = $quant;
                                $this->prixProd = $prix;
			}
		}
		
		//Fonctions
		public static function getAllProduit(){
			$rep = Model::$pdo->query("SELECT * FROM Produit");
			$rep->setFetchMode(PDO::FETCH_CLASS, 'ModelProduit');
			$tab_obj = $rep->fetchAll();
			return $tab_obj;
		}
		public static function getProduitbyNom($nomProduit){
			$rep = Model::$pdo->query("SELECT * FROM Produit WHERE nomProduit=$nomProduit");
			$rep->setFetchMode(PDO::FETCH_CLASS, 'ModelProduit');
			$tab_obj = $rep->fetchAll();
			return $tab_obj;
		}
		public static function getProduitbyId($idProduit){
			$rep = Model::$pdo->query("SELECT * FROM Produit WHERE idProduit=$idProduit");
			$rep->setFetchMode(PDO::FETCH_CLASS, 'ModelProduit');
			$tab_obj = $rep->fetchAll();
                        if (empty($tab_obj)) {
                             return false;
                            }
                        return $tab_obj[0];
		}
                
           
		public static function deleteProduitById($idProduit){
			$rep = Model::$pdo->query("DELETE FROM Produit WHERE idProduit=$idProduit");
			$rep->setFetchMode(PDO::FETCH_CLASS, 'ModelProduit');
		}
                
		public function save(){
			$sql = "INSERT INTO Produit (idProduit,nomProduit,couleur,quantiteProdStock,prixProd) VALUES (:id,:nom,:couleur,:quantite,:prix)";
			$req_prep = Model::$pdo->prepare($sql);
			$values = array(
				"id" => $this->idProduit,
				"nom" => $this->nomProduit,
				"couleur" => $this->Couleur,
                                "quantite" => $this->quantiteProdStock,
                                "prix" => $this->prixProd,
			);
			$req_prep->execute($values);
		}
                

                
                public static function findProduit($search)
                {
                    $sql = "SELECT * FROM Produit WHERE nomProduit LIKE '%$search%' ORDER BY nomProduit";
                    $req = Model::$pdo->query($sql);
                    $req->setFetchMode(PDO::FETCH_CLASS, 'ModelProduit');
                    $tab_prod = $req->fetchAll();
                    return $tab_prod;
                }
                

		public function update(){
		}
	}
		
?>
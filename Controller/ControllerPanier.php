<?php
require_once (File::build_path(array('Modele','ModelPanier.php')));

    class ControllerPanier{
		
		public static function readAll() {
			$tab_panier = ModelPanier::getAllProduitDuPanier($_SESSION['idUtil']);
			$pagetitle="Liste des produits de votre panier";
			$controller="panier";
			$view="list";
			require File::build_path(array("Vues","view.php"));
		}
                
                public static function read()
                {
                    $prod_panier = ModelPanier::getProduitDuPanier(myGet('id'));
                    $pagetitle="Détail du produit de votre panier";
                    $controller="panier";
                    $view="detail";
                    require File::build_path(array("Vues","view.php"));
                }
    
    
		public static function error(){
			$pagetitle="Erreur";
			$controller="panier";
			$view="error";
			require File::build_path(array("Vues","view.php"));
		}
                
                public static function create()
                {
                    $v=ModelProduit::getProduitbyId(myGet('idProduit'));
                    $pagetitle="Confirmation de l'ajout";
                    $controller="panier";
                    $view="create";
                    require File::build_path(array("Vues","view.php"));
                }
		
	
		public static function created(){
                        $produit_panier= new ModelPanier(myGet('idProduit'),$_SESSION['idUtil'],myGet('quantite'));
                        $produit_panier->save();
			$pagetitle="Produit ajout�";
			$controller="panier";
			$view="created";
			require File::build_path(array("Vues","view.php"));
                }
                
                public static function update()
                {
                     $idUtili=$_SESSION['idUtil'];
                     $idProduit=myGet('idProduit');
                     $quantiteProd=myGet('quantite');
                     ModelPanier::update($idUtili,$idProduit,$quantiteProd);
                     $pagetitle="Produit ajouté";
                     $controller="panier";
                     $view="updated";
                     require File::build_path(array("Vues","view.php"));
                }
                
                public static function incrementeQuant()
                {
                    ModelPanier::incrementeQuantite(myGet('idProduit'),$_SESSION['idUtil']);
                    ControllerPanier::readAll();
                    
                }
                
                public static function decrementeQuant()
                {
                    ModelPanier::decrementeQuantite(myGet('idProduit'),$_SESSION['idUtil']);
                    ControllerPanier::readAll();
                }
	
		public static function deleted(){
			$v = ModelProduit::getProduitById(myGet('idProduit'));
			if($v == false){
				ControllerPanier::error();
			}	//"redirige" vers les erreurs
			else{
				ModelPanier::deleteProduitById(myGet('idProduit'),$_SESSION['idUtil']);
				$pagetitle="Produit enlevé";
				$controller="panier";
				$view="deleted";
				require File::build_path(array("Vues","view.php"));
			}
		}
    }
?>


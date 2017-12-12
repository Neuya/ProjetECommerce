<?php 
require_once (File::build_path(array('Modele','ModelCommande.php')));

    class ControllerCommande{
		
		public static function readAll() {
			$tab_commande = ModelCommande::getAllCommande($_SESSION['idUtil']);
			$pagetitle="Liste de vos commandes";
			$controller="commande";
			$view="list";
			require File::build_path(array("Vues","view.php"));
		}
    
                public static function read()
                {
                    $idCom=myGet('id');
                    $tab_commande = ModelCommande::getAllProduitCommande($idCom, $_SESSION['idUtil']);
                    $pagetitle="Liste des produits de votre commande";
                    $controller="commande";
                    $view="detail";
                    require File::build_path(array("Vues","view.php"));
                }
                    
                
		public static function error()
                {
			$pagetitle="Erreur";
			$controller="commande";
			$view="error";
			require File::build_path(array("Vues","view.php"));
		}
    
                public static function create()
                {
                    $pagetitle="Confirmation de vos achats";
                    $controller="commande";
                    $view="create";
                    require File::build_path(array("Vues","view.php"));
                }
	
		public static function created(){
                        $idCom=ModelCommande::getIdCommandeDeUtil($_SESSION['idUtil']);
                        $v=ModelPanier::getAllProduitDuPanier($_SESSION['idUtil']);
                        $idCom=$idCom+1;
                        foreach ($v as $v_produit_panier)
                        {
                        $quantitePanier = $v_produit_panier->getQuantite();
                        $idProduit= $v_produit_panier->getIdProduit();
                        $produit_commande= new ModelCommande($idCom,$idProduit,$_SESSION['idUtil'],$quantitePanier);
                        $produit_commande->save();
                        $v_produit_panier->deleteProduitById($idProduit,$_SESSION['idUtil']);
                        ModelCommande::enleveStock($idProduit, $quantitePanier);
                        }
			$pagetitle="Produits ajoutÃ©s a votre commande";
			$controller="commande";
			$view="created";
			require File::build_path(array("Vues","view.php"));
		}
                
                
	
		public static function deleted(){
			$v = ModelProduit::getProduitById(myGet('idProduit'));
			if($v == false){
				ControllerPanier::error();
			}	                        //"redirige" vers les erreurs
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
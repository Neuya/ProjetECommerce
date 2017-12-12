<?php

	require_once (File::build_path(array('Controller','ControllerProduit.php')));
        require_once (File::build_path(array('Controller','ControllerPanier.php')));
        require_once (File::build_path(array('Controller','ControllerCommande.php')));
        require_once (File::build_path(array('Controller','ControllerUtilisateur.php')));

         
      
            
            function myGet($nomvar){
                    if(isset($_GET[$nomvar])){
                        return $_GET[$nomvar];
                    }
                    else if(isset($_POST[$nomvar])){
                        return $_POST[$nomvar];
                    }
                    else {
                        return NULL;
                    }
            } 
        
         
       
        
	// On recupère l'action passée dans l'URL
	if(!is_null(myGet('action'))){
		$action = myGet('action'); 
	}
	else{
		$action='accueil';
    
	} 
        
        if(!is_null(myGet('controller'))){
		$controller = myGet('controller'); 
	}
	else{
		$controller='accueil';
    
	} 
        
        if($action=='accueil' && $controller=='accueil'){
            ControllerProduit::accueil();
        }
                    
        else{         
            $controller_class='Controller'.$controller;
            $tab_class=get_class_methods($controller_class); 
            if(class_exists($controller_class)){

                if(in_array($action,$tab_class)){
                        $controller_class::$action();
                    }
                    else{
                        $controller_class::error();
                    }

            }

            else{
                ControllerProduit::accueil();
            }
        }
        
        

?>

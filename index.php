<?php 
    if (!isset($_SESSION['pseudoUtil'])) {
     session_start();
    }
?>


<?php
        // put your code here
    
       
        require_once __DIR__ . DIRECTORY_SEPARATOR . 'lib' . DIRECTORY_SEPARATOR . 'File.php';
        require_once (File::build_path(array('Controller','routeur.php')));
        
        
        if (!isset($_SESSION['pseudoUtil'])) {
            $_SESSION['pseudoUtil']='Visiteur';
            $_SESSION['idUtil']='2';
            $_SESSION['isAdmin']=false;
        }
        
        
        
       
 ?>
        
 


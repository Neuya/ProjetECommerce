<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $pagetitle; ?></title>
        <link rel="stylesheet" href="Css/style.css">
    </head>
    <body>
        <div id="Menu">
            <a class="active" href="index.php?">Accueil</a><!-- whitespace -->
            <a href="index.php?action=readAll&controller=produit" >Liste des produits</a>
            
           
            <?php 
            
                if($_SESSION['pseudoUtil']=='Visiteur'){ 


                   echo "<a href='index.php?action=create&controller=utilisateur'>S'inscrire</a>";
                   }  
                if($_SESSION['pseudoUtil']!='Visiteur'){
                    echo "<a href='index.php?action=readAll&controller=commande'>Mes Commandes</a>";
                    echo "<a href='index.php?action=read&controller=utilisateur'>Gestion du compte</a>";
                     echo "<a href='index.php?action=readAll&controller=panier'>Mon Panier</a>";
                                  
                   }  
                
            ?>
            
            
            <?php
            if($_SESSION['pseudoUtil']=='Visiteur'){
                   echo "<span class='loginVisit'><a href='index.php?action=connect&controller=utilisateur'>Se Connecter</a></span>"; 
                   }  
            else {
                if (Session::is_admin())
                {
                   echo "<span class='login'><a href='index.php?action=read&controller=utilisateur'>Bienvenue ".$_SESSION['pseudoUtil']." (admin)</a></span>";  
                }
                else{
                echo "<span class='login'><a href='index.php?action=read&controller=utilisateur'>Bienvenue ".$_SESSION['pseudoUtil']."</a></span>"; 
                }

                echo "<span class='deco'><a href='index.php?action=deconnected&controller=utilisateur'>Se Déconnecter</a></span>";

            }
 ?> 
        </div>

           <article>
			<h1><?php echo $pagetitle; ?></h1>
                        
           </article>

   
       
        <article>
       <?php
            
            $filepath = File::build_path(array("Vues", $controller, "$view.php"));
            require $filepath; 
         ?>
        </article> 
        

     

         <footer>
            <div id="textfoot"> Site de Ecommerce réalisé par OZIOL Raphaël, GILOT Simon, ROS Yann.</div>                                                                                     
        </footer>
     
    </body>
   


</html>

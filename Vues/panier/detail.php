<?php
            
            $v = $prod_panier;
            
            $vCouleur= htmlspecialchars($v->getCouleur());
            $vNomProduit= htmlspecialchars($v->getNomProduit());
            $vIdProduit= htmlspecialchars($v->getIdProduit());
            $vQuantite = htmlspecialchars(ModelPanier::getQuantiteById($_SESSION['idUtil'],$vIdProduit));
            $vPrix = htmlspecialchars($v->getPrixProd());
            $vPrixTotal = htmlspecialchars($vPrix*$vQuantite);
        
            echo "<img id='imageproduit' src='http://webinfo.iutmontp.univ-montp2.fr/~rosy/Projet/Projet/Vues/images/$vNomProduit _$vCouleur.jpg'  alt='un texte'>";
            
            
            
            
            echo "<div id='detailprod'>";
            echo "<p>$vNomProduit</p>";
            echo "<p> Couleur : $vCouleur. </p>";
            echo "<p> Prix d'un exemplaire : $vPrix € TTC</p>";
            echo '<p> Quantité dans votre panier: ' . $vQuantite .' exemplaire(s). </p>';
            echo "<p> Prix dans votre panier : $vPrixTotal € TTC</p>";
            echo "</div>";
            
          
				
           
           
    
             
           
            
            
            echo "<p><div class='bouton_cliquable'><a href='index.php?action=deleted&controller=panier&idProduit=$vIdProduit'>Retirer du panier</a></div></p>";
            echo "<p><div class='bouton_cliquable'><a href='index.php?action=readAll&controller=panier'>Retour à votre panier</a></div></p>";

            
            ?>
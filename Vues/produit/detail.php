
        <?php
            
        
        
            $vCouleur= htmlspecialchars($v->getCouleur());
            $vNomProduit= htmlspecialchars($v->getNomProduit());
            $vIdProduit= htmlspecialchars($v->getIdProduit());
            $vQuantite = htmlspecialchars($v->getQuantiteProdStock());
            $IdUrl = rawurlencode($vIdProduit);
        
          echo "<img id='imageproduit' src='http://webinfo.iutmontp.univ-montp2.fr/~rosy/Projet/Projet/Vues/images/$vNomProduit _$vCouleur.jpg'  alt='un texte'>";
            
            
            
            
            echo "<div id='detailprod'>";
            echo "<p>$vNomProduit</p>";
            echo "<p> Couleur : $vCouleur. </p>";
            echo '<p> Quantité en stock : ' . $vQuantite .' exemplaire(s). </p>';
            echo "</div>";
            
            
				
           if($_SESSION['pseudoUtil']!=='Visiteur')
           {
            echo "<form method='get' action='index.php'>";
            echo "<fieldset>";
            echo "<input type='hidden' name='action' value='create'>";
            echo "<input type='hidden' name='controller' value='panier'>";
            echo "<input type='hidden' name='idProduit' value='$vIdProduit'>";
             
            echo "<label for='quantite'>Quantité souhaitée : </label>";
            echo "<input id='quantiteAjout' type='number' value='1' min='1' max='$vQuantite' name='quantite' id='quantite' required/>";
            
            echo "<p>";
            echo "<div class='bouton_cliquable'><input type='submit' value='Ajouter au panier'></div>";
            echo "</p>";
            echo "</fieldset>";
            echo "</form>";
           }
           
           else
           {
               echo "<p>Afin d'ajouter ce produit à ce panier, veuillez vous connecter</p>";
               echo "<p>Si vous n'êtes pas encore inscrit, inscrivez-vous dès à présent.</p>";
               echo "<p><div class='bouton_cliquable'><a href='index.php?action=create&controller=utilisateur'>S'inscrire</a></div></p>";
               echo "<p><div class='bouton_cliquable'><a href='index.php?action=connect&controller=utilisateur'>Se connecter</a></div></p>";
           }
            
           if (Session::is_admin())
           {    
            echo "<p><div class='bouton_admin'><a href='index.php?action=update&controller=produit'>Modifier le produit</a></div></p>";
            echo "<p><div class='bouton_admin'><a href='index.php?action=delete&controller=produit&id=$IdUrl'>Supprimer le produit</a></div></p>";
           }
           
           
            echo "<p><div class='bouton_cliquable'><a href='index.php?action=readAll&controller=produit'>Retour à la liste des produits</a></div></p>";
        ?>
 


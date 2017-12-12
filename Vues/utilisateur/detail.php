<?php

            $u= ModelUtilisateur::getUtilisateurbyLogin($_SESSION['pseudoUtil']);

            $uAge= htmlspecialchars($u->getAgeUtil());
            $uNom= htmlspecialchars($u->getNomUtil());
            $uLogin= htmlspecialchars($u->getPseudoUtil());
            $uPrenom= htmlspecialchars($u->getPrenomUtil());
            $uVille= htmlspecialchars($u->getVilleUtil());
            $uMdp = htmlspecialchars($u->getMdpUtil());
            $id=$_SESSION['idUtil'];
            $login=$_SESSION['pseudoUtil'];
            echo '<p> Login : ' . $uLogin . '.</p>';
            echo '<p> Votre Nom : ' . $uNom . '</p>';
            echo '<p> Votre Prénom : ' . $uPrenom .'</p>';
            echo '<p> Votre Age : ' . $uAge . '.</p>';
            echo '<p> Votre Ville : ' . $uVille . '</p>';
            echo '<p> Votre adresse email :'.$id.'</p>';
            
            

            echo "<article>";
            echo "<div class='infoUtil'>";
                          
            if(Session::is_user($login)){
                 echo "<div id='lienprod'><a href='index.php?action=update&controller=utilisateur&id=$id'>Mise à jour du compte </a></div>";
                }
            
            

            echo "</div>";
            echo "</article>";
            
            

            echo "<article>";
            echo "<div class='suppUtil'>";
            if(Session::is_user($login)){
                echo "<div id='lienprod'><a href='index.php?action=deleted&controller=utilisateur&id=$id'>Supprimer le compte </a></div>";
             }


            echo "</div>";
            echo "</article>";
           
           /*
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
            
            
            
            echo "<div id='retourListProd'><a href='index.php?action=readAll&controller=produit'>Retour à la liste des produits</a></div>";*/
        ?>
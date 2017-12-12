
        <?php

        echo "<article>";
        echo"<form method='get' action='index.php'>";
         echo "<input type='hidden' name='action' value='recherche'>";
         echo "<input type='hidden' name='controller' value='produit'>";
        echo "<label for='id'>Rechercher un produit </label> :";
        echo "<input type='search' placeholder='Entrez un nom de produit' name='search'>";
        echo "<input type='submit' value='Rechercher' />";
        echo "</form>";
        echo "</article>";
        
        if (Session::is_admin())
        {
            echo "<article>";
            echo "<p><div class='bouton_admin'><a href='index.php?action=create&controller=produit'>Ajouter un produit</a></div></p>";
            echo "</article>";
        }
        

        
        echo "<p><strong>Pour ajouter un produit à votre  panier veuillez cliquer dessus</strong></p> ";
        
        foreach ($tab_v as $v){
            $vNomProduit= htmlspecialchars($v->getNomProduit());
            $vCouleurProduit = htmlspecialchars($v->getCouleur());
            $vQuantiteProd = htmlspecialchars($v->getQuantiteProdStock());
            $prixProduit= htmlspecialchars($v->getPrixProd());
            $IDurl=rawurlencode($v->getIdProduit());
           
            if($vQuantiteProd>0)
            {
            echo "<article>";
            echo "<img class='imagelist' src='http://webinfo.iutmontp.univ-montp2.fr/~rosy/Projet/Projet/Vues/images/$vNomProduit _$vCouleurProduit.jpg'  alt='un texte'>";
            
            echo "<div class='listeproduit'>";
            
            echo "<div id='lienprod'><a href='index.php?action=read&controller=produit&id=$IDurl'>$vNomProduit || Prix : $prixProduit € </a></div><div id='quantiteProdStock'><p>Quantite du produit en stock : $vQuantiteProd</p></div> ";
            echo "<div id='coulprod'>Couleur : $vCouleurProduit</div>";
            echo "</div>";
            echo "</article>";
            }
        }
        ?>

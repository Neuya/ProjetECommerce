<?php


if (empty($tab_s))
{
    echo "<p><strong>Votre recherche ne correpond à aucun produit de notre Site</strong></p>";
    echo "<p>Il est probable que ce produit ne soit plus disponible dans nos stocks.</p>";
    
}

 foreach ($tab_s as $v){
            
     
     
            $vNomProduit= htmlspecialchars($v->getNomProduit());
            $vCouleurProduit = htmlspecialchars($v->getCouleur());
            $vQuantiteProd = htmlspecialchars($v->getQuantiteProdStock());
            $prixProduit= htmlspecialchars($v->getPrixProd());
            $IDurl=rawurlencode($v->getIdProduit());
           
            if($vQuantiteProd>0)
            {
            echo "<article>";
            echo "<div class='listeproduit'>";
            echo "<div id='lienprod'><a href='index.php?action=read&controller=produit&id=$IDurl'>$vNomProduit de couleur $vCouleurProduit || Prix : $prixProduit € </a></div><div id='quantiteProdStock'><p>Quantite du produit en stock : $vQuantiteProd</p></div> ";
            echo "</div>";
            echo "</article>";
            }
            
           
        }
        
         echo "<p><div class='bouton_cliquable'><a href='index.php?action=readAll&controller=produit'>Retour à la liste des produits</a></div></p>";
        
?>
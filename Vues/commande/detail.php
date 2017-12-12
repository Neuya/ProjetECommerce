<?php

$prixTotal=0;

foreach($tab_commande as $v)
{
    echo "<article>";
    $v_Produit= ModelProduit::getProduitbyId($v->getIdProduit());
    $v_QuantitePanier= htmlspecialchars($v->getQuantite());
    
    
    $v_nomProduit= htmlspecialchars($v_Produit->getNomProduit());
    $couleur= htmlspecialchars($v_Produit->getCouleur());
    $v_idProduit = htmlspecialchars($v_Produit->getIdProduit());
    
    
    $nom = htmlspecialchars($v_Produit->getNomProduit());
    $prix = htmlspecialchars($v_Produit->getPrixProd());
    $quantitA = htmlspecialchars(ModelCommande::getQuantiteProdDeCommande($idCom, $_SESSION['idUtil'], $v_idProduit));
    $prixST= htmlspecialchars($prix*$quantitA);
    $prixTotal=$prixTotal+$prixST;
    
    echo "<p>Nom du produit : $nom de couleur $couleur</p>";
    echo "<p>Cout de base : $prix €</p>";
    echo "<p>Quantite achetée : $quantitA</p>";
    echo "<p>Prix total : $prixST €</p>";
    echo "</article>";
}

echo "<p>Prix global de votre commande : $prixTotal €</p>";


echo "<p><div class='bouton_cliquable'><a href='index.php?action=readAll&controller=commande'>Retour</a></div></p>";
?>  

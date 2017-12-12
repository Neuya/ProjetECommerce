<?php

require_once (File::build_path(array('Modele','ModelProduit.php')));


if(empty($tab_panier))
{
    echo "Il n'y a aucun article dans votre panier, il vous faut d'abord en ajouter via la liste des produits.";
    echo "<p><div class='bouton_cliquable'><a href='index.php?action=readAll&controller=produit'>Retour à la liste des produits</a></div></p>";
}
 else {
    

$TotalPanier = 0;

foreach ($tab_panier as $v)
{
    
    $v_Produit= ModelProduit::getProduitbyId($v->getIdProduit());
    $v_QuantitePanier= htmlspecialchars($v->getQuantite());
    
    $v_nomProduit= htmlspecialchars($v_Produit->getNomProduit());
    $v_couleurProduit= htmlspecialchars($v_Produit->getCouleur());
    $IDurl= rawurlencode($v_Produit->getIdProduit());
    $prixSs = $v_Produit->getPrixProd() * $v->getQuantite();
    $TotalPanier=$TotalPanier+$prixSs;
    
    echo "<article class='panier'>";
    echo "<div id='prodPanier'><a href='index.php?action=read&controller=panier&id=$IDurl'>$v_nomProduit de couleur $v_couleurProduit quantité : $v_QuantitePanier Sous total : $prixSs €</a></div>";
    echo "<div class='bouton_cliquable_panier'><a href='index.php?action=deleted&controller=panier&idProduit=$IDurl'>Retirer du panier</a></div>";
    echo "<div class='bouton_cliquable_panier'><a href='index.php?action=incrementeQuant&controller=panier&idProduit=$IDurl'><strong>+1</strong></a></div>";
    echo "<div class='bouton_cliquable_panier'><a href='index.php?action=decrementeQuant&controller=panier&idProduit=$IDurl'><strong>-1</strong></a></div>";
    echo "</article>";
}

echo "<p><strong>Total de votre panier : $TotalPanier €</strong></p>";
echo "<p><div class='bouton_cliquable'><a href='index.php?action=create&controller=commande'>Acheter</a></div></p>";
echo "<p><div class='bouton_cliquable'><a href='index.php?action=readAll&controller=produit'>Retour à la liste des produits</a></div></p>";
}
?>

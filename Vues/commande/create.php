<?php


echo "<p>Confirmez vous vos achats?</p>";


$pan=ModelPanier::getAllProduitDuPanier($_SESSION['idUtil']);

$prixTotalCommande=0;
foreach ($pan as $v)
{
    $idProduit=$v->getIdProduit();
    $prixTotalCommande=$prixTotalCommande+ModelProduit::getPrixById($idProduit)*ModelPanier::getQuantiteById($_SESSION['idUtil'],$idProduit);
}

echo "<p>Prix total de votre commande : $prixTotalCommande € TTC</p>";

echo "<p><div class='bouton_cliquable'><a href='index.php?action=created&controller=commande'>Confirmer</a></div></p>";
echo "<p><div class='bouton_cliquable'><a href='index.php?action=readAll&controller=panier'>Retour au panier</a></div></p>";

?>
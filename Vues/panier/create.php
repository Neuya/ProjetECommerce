<?php

$vCouleur= htmlspecialchars($v->getCouleur());
$vNomProduit= htmlspecialchars($v->getNomProduit());
$vIdProduit= htmlspecialchars($v->getIdProduit());
$vQuantite = myGet('quantite');
$vPrixUn=$v->getPrixProd();
$vPrix= htmlspecialchars($vPrixUn*$vQuantite);
$idUtili=$_SESSION['idUtil'];

            
if(ModelPanier::aDejaProd($idUtili, $vIdProduit))
{
    $P_Quantite= ModelPanier::getQuantiteById($idUtili, $vIdProduit);
    echo"<p>Vous avez deja $P_Quantite exemplaires de $vNomProduit de couleur $vCouleur dans votre panier</p>";
    echo "<p>Confirmez vous l'ajout de : $vNomProduit $vCouleur en $vQuantite exemplaires ?</p>";
    echo "<p>Cela vous coutera : $vPrix € TTC en plus</p>";
    echo "";
    echo "<p><div class='bouton_cliquable'><a href='index.php?action=update&controller=panier&idProduit=$vIdProduit&quantite=$vQuantite'>Confirmer</a></div></p>";
}

else{
echo "Confirmez vous l'ajout de : $vNomProduit $vCouleur en $vQuantite exemplaires à votre panier ?";
echo "<p>Cela vous coutera : $vPrix € TTC</p>";
echo "<p><div class='bouton_cliquable'><a href='index.php?action=created&controller=panier&idProduit=$vIdProduit&quantite=$vQuantite'>Confirmer</a></div></p>";
}




echo "<p><div class='bouton_cliquable'><a href='index.php?action=read&controller=produit&id=$vIdProduit'>Retour à la description du produit</a></div>";
echo "<p><div class='bouton_cliquable'><a href='index.php?action=readAll&controller=produit'>Retour à la liste des produits</a></div></p>";

?>
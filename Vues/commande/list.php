<?php

if(empty($tab_commande))
{
    
    echo"<p>Vous n'avez effectué aucune commande dans notre site, acheter un ou plusieurs articles via votre panier pour voir vos commandes figurer à cet emplacement</p>";
    echo "<p><div class='bouton_cliquable'><a href='index.php?action=readAll&controller=panier'>Aller à votre panier</a></div></p>";
}

else
{
foreach ($tab_commande as $v)
{

    $idCommande = $v->getIdCommande();
    echo "<p><div class='bouton_cliquable'><a href='index.php?action=read&controller=commande&id=$idCommande'>Consulter la commande n°=$idCommande</a></div></p>";
    
}
}
$idCom=ModelCommande::getIdCommandeDeUtil($_SESSION['idUtil']);
echo "<p><div class='bouton_cliquable'><a href='index.php?action=readAll&controller=produit'>Retour à la liste des produits</a></div></p>";
echo "Nombre de vos commandes : $idCom";
?> 
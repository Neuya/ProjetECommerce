<?php



echo "<p>Etes vous sur de vouloir supprimer ce produit de la vente?</p>";
echo "<p>Nom : $vNomProduit</p>";
echo "<p>Quantite en stock : $vQuantite exemplaire(s)</p>";


$vIdProduit = rawurldecode($_GET['id']);
$idUrl = rawurlencode($vIdProduit);

echo "<p><div class='bouton_admin'><a href='index.php?action=deleted&controller=produit&id=$idUrl'>Confirmer la suppresion</a></div></p>";

?>

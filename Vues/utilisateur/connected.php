<?php

echo "<h1>Bienvenue ". $_SESSION['pseudoUtil']." !</h1>";
echo "<p>Nous sommes heureux de votre retour parmis nous ! </p>";

echo "<p>";
echo "<div class='bouton_cliquable'><a href='index.php?'>Aller à la page d'accueil</a></div>";
echo "</p>";
echo "<p>";
echo "<div class='bouton_cliquable'><a href='index.php?action=readAll&controller=produit'>Aller à la liste des produits</a></div>";
echo "</p>";
echo "<p>";
echo "<div class='bouton_cliquable'><a href='index.php?action=readAll&controller=panier'>Aller à votre panier</a></div>";
echo "</p>";
echo "<p>";
echo "<div class='bouton_cliquable'><a href='index.php?action=readAll&controller=commande'>Consulter mes commandes</a></div>";
echo "</p>";


?>

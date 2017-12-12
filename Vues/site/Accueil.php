



<?php


echo "<article>Bienvenue sur ce site dédié à la vente en ligne de tablettes de toutes marques.</article>";
echo "<article id='ArticleAcc'>";
echo "<div class='bouton_accueil'>";

if ($_SESSION['pseudoUtil']==='Visiteur')
{
    echo "<p>";
    echo "<a href='index.php?action=create&controller=utilisateur' >Me créer un compte</a>";
    echo"</p>";
    echo "<p>";
    echo"<a href='index.php?action=connect&controller=utilisateur'>Me connecter</a>";
    echo"</p>";
}
else{
echo "<p>";
echo "<a href='index.php?action=readAll&controller=utilisateur' >Acceder à mon compte</a>";
echo"</p>";
echo "<p>";
echo "<a href='index.php?action=readAll&controller=commande'>Consulter mes commandes</a>";
echo"</p>";

echo "<p>";
echo  "<a href='index.php?action=readAll&controller=panier'>Accèder à mon panier</a>";
echo"</p>";
}

echo '<img id="imageaccueil" src="http://localhost/ProjetPHP/Projet/Vues/images/NY.jpg" height="450" width="550"  alt="un texte">';


echo "<p>";
echo "<a href='index.php?action=readAll&controller=produit' >Consulter la liste des produits</a>";
echo"</p>";
echo "</div>";
echo "</article>"
?>

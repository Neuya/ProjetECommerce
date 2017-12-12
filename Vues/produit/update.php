<html>
	
	<body>
         <?php
         
            $id= htmlspecialchars($tab->getIdProduit());
            $nomProduit=htmlspecialchars($tab->getNomProduit());
            $couleur=htmlspecialchars($tab->getCouleur());
            
echo <<<EOT
		<form method="get" action='index.php'>
			<fieldset>
                           
				<legend>Mise à jour du produit :</legend>
					<p>     
                                                <input type='hidden' name='action' value='updated'>
						<label for="produit_id">Id du produit</label> :
						<input value='{$id}' type="text" placeholder="Ex : 5" name="idProduit" id="produit_id" required/>
					</p>
					<p>
						<label for="nomProduit">Libellé du produit</label> :
						<input value='{$nomProduit}' type="text" placeholder="Ex : Stylo" name="nom" id="nomProduit" required/>
					</p>
					<p>
						<label for="couleur_id">Couleur</label> :
						<input value='{$couleur}' type="text" placeholder="Ex : bleu" name="couleur" id="couleur_id" required/>
					</p>
					<p>
						<input type="submit" value="Envoyer" />
					</p>
			</fieldset> 
		</form>
EOT;
          
         ?>
	</body>
</html>

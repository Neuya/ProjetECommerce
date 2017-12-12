
		<form method="get" action='index.php'>
                  


			<fieldset>
                           
				<legend>Ajouter un produit</legend>
                                                 <input type='hidden' name='action' value='created'>
                                                 <input type='hidden' name='controller' value='produit'>
					<p>
						<label for="nom">Nom complet du produit</label> :
						<input type="text" placeholder="Ex : Stylo" name="nomproduit" id="nom" required/>
					</p>
					<p>
						<label for="couleur">Couleur</label> :
						<input type="text" placeholder="Ex : bleu" name="couleur" id="couleur" required/>
					</p>
                                        <p>
						<label for="quantite">Quantité en stock</label> :
						<input type="text" placeholder="Ex : 2" name="quantite" id="quantite" required/>
					</p>
                                         <p>
						<label for="prix">Prix à l'unité</label> :
						<input type="text" placeholder="Ex : 50" name="prix" id="prix" required/>
					</p>
					<p>
						<input type="submit" value="Ajouter" />
					</p>
			</fieldset> 
		</form>	

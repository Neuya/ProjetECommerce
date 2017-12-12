<html>
		<body>
			<?php
			$nom="";
			$prenom="";
			$pseudo="";
			$age="";
			$ville="";
			$mdp="";
                        $email="";
			////initialise l'action en fonction de create/update et met les champ mdp en required si action=create
			$required="required";
			$action='index.php?action=created&controller=utilisateur';
			if (myGet('action')=="update"){
				$required=" ";
				$action='index.php?action=updated&controller=utilisateur';
				$nom= htmlspecialchars($tab->getNomUtil());
				$prenom=htmlspecialchars($tab->getPrenomUtil());
				$pseudo=htmlspecialchars($tab->getPseudoUtil());
				$age=htmlspecialchars($tab->getAgeUtil());
				$ville=htmlspecialchars($tab->getVilleUtil());
				$mdp=htmlspecialchars($tab->getMdpUtil());
                               
			}
                        ?>
			<form method="post" action=<?php echo"$action" ?>>
				<fieldset>      
					<legend>Modifier votre compte</legend>
						<p>     
							<input type='hidden' name='action' value='updated'>
							<input type='hidden' name='controller' value='utilisateur'>
							<label for="nom">Nom</label> :
							<input type="text" <?php echo"value='{$nom}'"?> placeholder="Ex : Dupond" name="nom" id="nom" required/>
						</p>
						<p>
							<label for="prenom">Prenom</label> :
							<input type="text" <?php echo"value='{$prenom}' "?>  placeholder="Ex : Arnaud" name="prenom" id="prenom" required/>
						</p>
											<p>
							<label for="pseudo">Pseudonyme</label> :
							<input type="text" <?php echo"value='{$pseudo}'"?>  placeholder="Ex : Rubis" name="pseudo" id="pseudo" required/>
						</p>
						<p>
							<label for="age">age</label> :
							<input type="text" <?php echo"value='{$age}' "?>  placeholder="Ex : 25" name="age" id="age" required/>
						</p>
						<p>
							<label for="ville">ville</label> :
							<input type="text" <?php echo"value='{$ville}' "?>  placeholder="Ex : Paris" name="ville" id="ville" required/>
						</p>
                                                <?php if (myGet('action')=="create"){
                                                echo'<p>';
						echo'	<label for="email">Adresse email</label> :';
						echo'	<input type="email" placeholder="Ex : prenom.nom@gmail.com" name="email" id="email" required/>';
						echo'</p>';
                                                }
                                                ?>
                                               
                                                
						<p>
							<label for="mdp">mot de passe</label> :
							<input type="password" placeholder=" " name="mdp" id="mdp" <?php echo"$required" ?>/>
						</p>
						<p>
							<label for="mdp2">confirmez mot de passe</label> :
							<input type="password" placeholder=" " name="mdp2" id="mdp2" <?php echo"$required" ?>/>
						</p>
						<p>
							<input type="submit" value="Envoyer" />
						</p>
				</fieldset> 
			</form>	
			
		</body>
</html>
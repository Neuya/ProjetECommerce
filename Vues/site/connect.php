
		<form method="get" action='index.php'>
			<fieldset>      
				<legend>Se Connecter</legend>
					<p>     
                        <input type='hidden' name='action' value='connected'>
                        <input type='hidden' name='controller' value='utilisateur'>
						<label for="login">Login</label> :
						<input type="text" placeholder="Ex : rubis" name="login" id="login" required/>
					</p>
					<p>
						<label for="mdp">Mot de passe</label> :
						<input type="password" placeholder="Ex : apple" name="mdp" id="mdp" required/>
					</p>
                                        <p>
						<input type="submit" value="Se connecter" />
					</p>
                                      
			</fieldset> 
		</form>	
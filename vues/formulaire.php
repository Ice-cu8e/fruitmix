<?php
echo "
		<html>
			<head>
				<meta charset='UTF-8'>
				<link rel='stylesheet' type='text/css' href='css/formulaire.css'>
			</head>

				<body>
					<div id='cardContact'>
			      <div class='cardContact'>
							<form method='post' action='traitement.php'>
									<p class='titre'>Coordonnées</p>
								<fieldset id='coordonnees'>
									<p id='civilite'><label>Civilité : </label>
									<input type='radio' name='civilite' value='Monsieur' />M.
									<input type='radio' name='civilite' value='Madame' />Mme
									</p>
								  <label>Nom: </label>
									<input type='text' name='nom' size='30' /><br />

								  <label>Prénom: </label>
									<input type='text' name='prenom' size='30' /><br />

								  <label>Age: </label>
									<input type='text' name='age' size='5' /><br />

								  <label>Mail (*): </label>
									<input type='text' name='mail' size='30' /><br />

								  <label>Ville (*): </label>
									<input type='text' name='ville' size='30' /><br />

								  <label>Code postal (*): </label>
									<input type='number' name='cp' size='5' /><br />

								  <p id='type'><label>Type de message: </label>
										<input type='radio' name='type' value='remarque' />Remarque
										<input type='radio' name='type' value='commentaire' />Commentaire<br/>
								  </p>
								  <p>(*) obligatoire</p>

								</fieldset>
								<p class='titre'>Message</p>
								<fieldset id='message'>
								  <textarea name='message' rows='5' cols='40' placeholder='caract&egrave;res limit&#233;s &agrave; 1024 ' onkeyup='reste(this.value);'></textarea>

								</fieldset>
								<p id='buttons'>
								  <input type='submit' value='Envoyer' />
								  <input type='reset' value='Recommencer' />
								</p>
							</form>
						</div>
					</div>
				</body>
		</html>
"

?>

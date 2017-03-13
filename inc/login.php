<html>

<head>
	<meta charset='UTF-8'>
	<link rel='stylesheet' type='text/css' href='css/formulaire.css'>
	<link rel='stylesheet' type='text/css' href='css/principal.css'>
</head>

<div id='cardContact'>
	<div class='cardContact'>
		<p>Vous devez vous identifer pour acc�der � cette page :</p>
			<form action='#' method='post'>
				<table>  <!-- le tableau est utilis� dans la mise en forme afin de garantir l'alignement des diff�rents champs de saisie -->
					<tr>
						<td>Identifiant : </td>
						<td><input type='text' name='ident' size='40' maxlength='50' /></td>
					</tr>
					<tr>
						<td>Mot de passe : </td>
						<td><input type='password' name='mdp' size='40' maxlength='50' /></td>
					</tr>
					<tr>
						<td><input type='submit' name='valid' value='valider' /></td>
						<td><input type='reset' name='valid' value='recommencer' /></td>
					</tr>
				</table>
			</div>
		</div>
	</form>
	</html>

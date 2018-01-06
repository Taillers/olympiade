<?php
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>HTML</title>
		<meta name="author" content="NIKIEMA.DELWENDEARIA" />
		<!-- Date: 2017-12-14 -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script>
		$(document).ready(function (){
		  $(document).keyup(function(){
		  	if ($('#nom').val() != '' && $('#firstname').val() != '' && $('#mail').val() != '' && $('#password').val() != '' && $('#âge').val() != ''){
		  	$('#submit').removeAttr('disabled');
		  	}
		  })
		})
	</script>
	
	
	</head>
	<body>

		<?php
			include('inclusion/menu.htm');
		?>
		<center>
		<div class="header">
			<h1>Bienvenue Capitaine</h1>
		</div>
		
	
		
		<form method="POST" action="gerer_equipe">
						<table>
			<tr><td align="right">			<label>Nom du capitaine</label>
				<input type="text" placeholder= "Entrez votre nom " name="nom" pattern="[A-Za-z]{1,}" id="nom" />
			</td></tr>
			
			<tr><td align="right">			<label>Prénom du capitaine</label>
				<input type="text" placeholder= "Entrez votre prénom " name="prenom" pattern="[A-Za-z]{1,}" id="firstname" />
			</td></tr>
			
			<tr><td align="right">			<label>Numéro de téléphone</label>
				<input type="text" placeholder= "Entrez votre numéro de téléphone " name="num" id="num"/>
			</td></tr>
			
			<tr><td align="right">			<label>Email</label>
			<input type="email" placeholder= "Entrez votre email" name="email" id="mail" />
			</td></tr>
			
			<tr><td align="right">			<label>Mot de passe </label>
			<input type="text" placeholder= "Entrez votre mot de passe " name="mdp" id="mdp" />
			</td></tr>
			
			<tr><td align="right">
			<label>fumeur</label>
			<input type="radio"  name="fumet" value="true" id="fume"> oui
			<input type="radio"  name="fumet" value="false" id="fume"> non
			</td></tr>
			
			<tr><td align="right">
			<label>Affliation club</label>
			<input type="text" placeholder= "Entrez votre club" name="club" id="club">
			</td></tr>
			
			<tr><td align="right">
			<label>Sport pratiqué</label>
			<input type="text" placeholder= "sport pratiqué" name="sport" id="sport">
			</td></tr>
			
			
			
			
			<tr><td align="right">
			<label>Date de naissance</label>
			<input type="date" placeholder= "Entrez votre date de naissance" name="age" id="age">
			</td></tr>
			
			
			
			
			<tr><td align="right">
			<label>Etablissement<select name="etabl"></label>
			<?php
		include('./inclusion/connect.inc');
		$idc = connectToDb();
		$sql = 'select num_etablissement, nom_etablissement from etablissement order by nom_etablissement ';
		$rs = pg_exec($idc, $sql);
		while ($ligne = pg_fetch_assoc($rs)) {
			print('<option value="' . $ligne['num_etablissement'] . '" >' . $ligne['nom_etablissement'] . '</option>' . "\n");
		}
		?>
		</td></tr>
		
		<tr><td align="right">
			<label>Formation<select name="forme"></label>
			<?php
		$sql = 'select num_formation, nom_formation from formation order by nom_formation ';
		$rs = pg_exec($idc, $sql);
		while ($ligne = pg_fetch_assoc($rs)) {
			print('<option value="' . $ligne['num_formation'] . '" >' . $ligne['nom_formation'] . '</option>' . "\n");
		}
		?>
		</td></tr>
		
			<tr><td align="right">
			<label>Civilité<select name="civilité"></label>
			<?php
		$sql = 'select num_civilite, nom_civilite from civilite order by nom_civilite ';
		$rs = pg_exec($idc, $sql);
		while ($ligne = pg_fetch_assoc($rs)) {
			print('<option value="' . $ligne['num_civilite'] . '" >' . $ligne['nom_civilite'] . '</option>' . "\n");
		}
		?>
		</td></tr>
		<tr><td align="right">
			<label>Choisir activité principale<select name="principal"></label>
			<?php
		$sql = 'select principal, nom_activite, num_activite from activite order by nom_activite ';
		$rs = pg_exec($idc, $sql);
		while ($ligne = pg_fetch_assoc($rs)) {
			if ($ligne['principal'] == "t") {
				print('<option value="' . $ligne['num_activite'] . '" >' . $ligne['nom_activite'] . '</option>' . "\n");
			}
		}
		?>
		</td></tr>
			</table>
			
			<input  id="submit" type="submit" name="connexion" value="Continuer" disabled="disabled"/>
			</form>

	</center>
	</body>
	<br/> <br/>
	
		
		
</html>


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
		<!-- Date: 2017-12-12 -->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script>
		$(document).ready(function (){
		  $(document).keyup(function(){
		  	if ($('#nom').val() != '' && $('#mdp').val() != '' ){
		  	$('#submit').removeAttr('disabled');
		  	}
		  })
		})
	</script>
	</head>
	<body>
		<form method="POST" action="index_prime">
			
	<center>
		<?php
			include('inclusion/menu.htm');
		?>
		<H1>Bienvenue sur le site</H1>
		<p>Login</p>		
		<input type="text" placeholder="Votre login" name="zs_login"><br />
		<p>Mot de passe</p>
		<input type="password" placeholder="Votre mot de passe" name="zs_pass" id="nom"><br /><br />
		<input  id="submit" type="submit" name="connexion" value="Je me connecte" disabled="disabled" id="mdp"/><br /><br />
			
		
		</center>
		</form>
	</body>
</html>


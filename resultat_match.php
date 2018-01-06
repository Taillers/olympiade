<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>HTML</title>
		<meta name="author" content="NIKIEMA.DELWENDEARIA" />
		<!-- Date: 2017-12-19 -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script>
		$(document).ready(function (){
		  $(document).keyup(function(){
		  	if ($('#scoref').val() != '' || $('#scoreb').val() !='' ){
		  	$('#submit').removeAttr('disabled');
		  	}
		  })
		})
		</script>
		
	</head>
	<body>
		
		<form method="POST" action="enreg_resultat.php">
		<center>
		<H1>Olympiade 2017</H1>
		<div class="header">
<h2>Enregistrer le résultat d'un match</h2>
</div>
</center>

<tr><td align="right">
			<label>Selectionner une équipe<select name="equipe"></label>
			<?php
		include('./inclusion/choisir_eq.php');
		$idc=choisir_eq();
		$sql='select num_equipe, nom_equipe from equipe order by nom_equipe ';
		$rs=pg_exec($idc, $sql);
		while($ligne=pg_fetch_assoc($rs)){
		print('<option value="'.$ligne['num_equipe'].'" >'.$ligne['nom_equipe'].'</option>'."\n");
	}
?>
<br />
			<input type="button" value="Afficher" onclick="afficher()"/>
			<div id="aff"></div>
		
			<h3>Activité principale</h3>
			<?php
			include('inclusion/connect.inc');
			$idc=connect();
			
			$sql='select nom_activite, principal from activite';
			$rs=pg_exec($idc,$sql);
			$ligne=pg_fetch_assoc($rs);
			print('<input type="number" name="scoref" value="'.$ligne['principal'].'" >'.$ligne['nom_activite'].'&nbsp &nbsp');
			$ligne=pg_fetch_assoc($rs);
			print('<input type="number" name="scoreb" value="'.$ligne['principal'].'" >'.$ligne['nom_activite'].'&nbsp &nbsp');
			
			$sql='select num_activite from activite';
			$rs=pg_exec($idc,$sql);
			$ligne=pg_fetch_assoc($rs);
			print('<input type="number" name="activite" value="'.$ligne['num_activite'].'">');
			
			$sql='select num_olympiade from olympiade';
			$rs=pg_exec($idc,$sql);
			$ligne=pg_fetch_assoc($rs);
			print('<input type="number" name="olymp" value="'.$ligne['num_olympiade'].'">')
			?>
					
			<input id="submit" type="submit" name="connexion" value="Enregistrer" disabled="disabled"/>
			<h3>Activités secondaires</h3>
			<table border="3">
		<tr ><td>Nom activité</td><td>Points</td></tr>
		<?php
		
		$sql='select nom_activite, principal from activite' ;
		$rs=pg_exec($idc, $sql);
		while($ligne=pg_fetch_assoc($rs)){
		if ($ligne['principal']!="t" || $ligne['principal']==""){
			print('<tr><td>'.$ligne['nom_activite'].'</td></tr/> &nbsp &nbsp');
			}
			
			
	}
		?>
		&nbsp &nbsp
		
		
		
		</form>
	
	</body>
</html>




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
		  	if ($('#nom').val() != '' && $('#nom1').val() != '' && $('#nom2').val() != '' && $('#nom3').val() != '' && $('#nom4').val() != '' && $('#nom5').val() != ''
		  &&	$('#nom6').val() != ''){
		  	$('#submit').removeAttr('disabled');
		  	}
		  })
		})
	</script>
	
	<script language="javascript" src="./js/fonctions_utf8.js">
	</script>
	<script language ="javascript">
	var httpRequest;

function creer_httpr()
{
	var h;
	if (window.XMLHttpRequest) 
	{ // Mozilla, Safari, ...
		h = new XMLHttpRequest();
		if (h.overrideMimeType) 
		{
            h.overrideMimeType('text/xml');
		}

	}
	else 
	{
		if (window.ActiveXObject) 
		{ // IE
			h = new ActiveXObject("Microsoft.XMLHTTP");
		}
	}
	return(h);
}

function recup_data()
{
	if (httpRequest.readyState == 4 
	    && httpRequest.status == 200) 
	{
    	mydiv.innerHTML=httpRequest.responseText;
	} 
}
function synchro_lst()
{
	httpRequest = creer_httpr();
	var prg = "./suite_eq.php";
	
	var num = document.frm["nom"].value
	
	var param="?num="+num;
	var ns= document.frm["nom1"].value
	var param=param+"&nom1="+ns;	
	// si un autre param�tre ajouter :
	// num2=document.frm["xxxxxx"].value;
	// param=param+"&num2="+num2;

	httpRequest.onreadystatechange = recup_data;
	httpRequest.open("GET", prg+param, 2);
	httpRequest.send(null);
}

</script>
	</head>
	<body>
		<div class="header">
			<center><h1>Olympiade 2017</h1></center>
		</div>

		<div class="menu">
			<ul>
				<center>
				<a href="index_connexion.php">Connexion</a> &nbsp &nbsp
				<a href="inscription_choix.php">Inscription</a> &nbsp &nbsp
				<a href="#">Informations et contact</a> &nbsp &nbsp
				<a href="reglements.php">Règlement et mentions légales</a>
				</center>
			</ul>
		</div>

		<?php
	// include('./inclusion/connect.inc');
	// $idc = connectToDb();
	// $sql='insert into participant(nom_participant, prenom_participant, fumeur, sports_pratiques, date_naissance, affiliation_club )
	// values (\''.$nom.'\',\''.$firstname.'\',\''.$fume.'\',\''.$sport.'\',\''.$age.'\',\''.$club.'\') returning num_participant';
	// $id_participant = pg_query($idc,$sql);
	
	// $id = pg_fetch_array($id_participant);
	// $NumCapitaine = $id[0];
		if(empty($truc))
		{
			"toto";
		}
		else
		{
			$truc;
		}

		empty($truc)?"toto":$truc;
	?>
<form method="POST" action="creer_index.php">
<?php
	$nom = empty($_POST['nom'])?"Inconnu":$_POST['nom'];
	$prenom = empty($_POST['prenom'])?"Inconnu":$_POST['prenom'];
	$num = empty($_POST['num'])?"Inconnu":$_POST['num'];
	$email = empty($_POST['email'])?"Inconnu":$_POST['email'];
	$mdp = empty($_POST['mdp'])?"Inconnu":$_POST['mdp'];
	$fumet = empty($_POST['fumet'])?"Inconnu":$_POST['fumet'];
	$club = empty($_POST['club'])?"Inconnu":$_POST['club'];
	$sport = empty($_POST['sport'])?"Inconnu":$_POST['sport'];
	$age = empty($_POST['age'])?"Inconnu":$_POST['age'];

	print '<input id="nom" name="nom" value='.$nom.' type="hidden"/>';
	print '<input id="prenom" name="prenom" value='.$prenom.' type="hidden"/>';
	print '<input id="num" name="num" value='.$num.' type="hidden"/>';
	print '<input id="email" name="email" value='.$email.' type="hidden"/>';
	print '<input id="mdp" name="mdp" value='.$mdp.' type="hidden"/>';
	print '<input id="fumet" name="fumet" value='.$fumet.' type="hidden"/>';
	print '<input id="club" name="club" value='.$club.' type="hidden"/>';
	print '<input id="sport" name="sport" value='.$sport.' type="hidden"/>';
	print '<input id="age" name="age" value='.$age.' type="hidden"/>';
?>
			<table>
				<center>
							<H1>Nom de l'équipe</H1>
			<input type="text" placeholder= "Choisissez un nom pour l'équipe " name="equipe" id="nom" />
			</center>
			
		 <center>	
			<p>Inscrire le Joueur 1</p>		
		<input type="text" placeholder="Entrer le nom du joueur 1" name="nomone" id="nom1"><br /><br />
		<input type="text" placeholder="Entrer le prénom du joueur 1" name="firstnameone" id="prenom1"><br /><br />
		<input type="date" placeholder="Entrer la date de naissance du joueur 1" name="age1" id="age1"><br /><br/>
		<label>Sexe</label>
			<input type="radio"  name="sexeone" value="2" id="sexeone" checked="true"> Femme
			<input type="radio"  name="sexeone" value="1" id="sexeone"> Homme
			<br/>	<br/>
			
			
		
				<p>Inscrire le Joueur 2</p>		
		<input type="text" placeholder="Entrer le nom du joueur 2" name="nomtwo" id="nom2"><br /><br />
		<input type="text" placeholder="Entrer le prénom du joueur 2" name="firstnametwo" id="prenom2"><br /><br />
		<input type="date" placeholder="Entrer la date de naissance du joueur 2" name="age2" id="age2"><br /><br/>
		<label>Sexe</label>
			<input type="radio"  name="sexetwo" value="2" id="sexetwo" checked="true"> Femme
			<input type="radio"  name="sexetwo" value="1" id="sexetwo"> Homme
			
			<br/>	<br/>
			
				<p>Inscrire le Joueur 3</p>		
		<input type="text" placeholder="Entrer le nom du joueur 3" name="nomthree" id="nom3"><br /><br />
		<input type="text" placeholder="Entrer le prénom du joueur 3" name="firstnamethree" id="prenom3"><br /><br />
		<input type="date" placeholder="Entrer la date de naissance du joueur 3" name="age3" id="age3"><br /><br/>
		<label>Sexe</label>
			<input type="radio"  name="sexethre" value="2" id="sexethre" checked="true"> Femme
			<input type="radio"  name="sexethre" value="1" id="sexethre"> Homme
			
			<br/>	<br/>
			
				<p>Inscrire le Joueur 4</p>		
		<input type="text" placeholder="Entrer le nom du joueur 4" name="nomfor" id="nom4"><br /><br />
		<input type="text" placeholder="Entrer le prénom du joueur 4" name="firstnamefor" id="prenom4"><br /><br />
		<input type="date" placeholder="Entrer la date de naissance du joueur 4" name="age4" id="age4"><br /><br/>
		<label>Sexe</label>
			<input type="radio"  name="sexefor" value="2" id="sexefor" checked="true"> Femme
			<input type="radio"  name="sexefor" value="1" id="sexefor"> Homme
			
			<br/>	<br/>
			
		
				<p>Inscrire le Joueur 5</p>		
		<input type="text" placeholder="Entrer le nom du joueur 5" name="nomfiv" id="nom5"><br /><br />
		<input type="text" placeholder="Entrer le prénom du joueur 5" name="firstnamefiv" id="prenom5"><br /><br />
		<input type="date" placeholder="Entrer la date de naissance du joueur 5" name="age5" id="age5"><br /><br/>
		<label>Sexe</label>
			<input type="radio"  name="sexefiv" value="2" id="sexefiv" checked="true"> Femme
			<input type="radio"  name="sexefiv" value="1" id="sexefiv"> Homme
		
			<br/>
			</center>
			
			</table>
		<center>	<input id="submit" type="submit" name="Créer" value="Créer" disabled="disabled"/></center>
			<form/>
			<div id="mydiv"></div>
	</body>
</html>


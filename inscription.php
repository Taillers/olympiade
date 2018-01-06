<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
   "http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>templates</title>
	<meta name="author" content="DELWENDE" />
	<!-- Date: 2017-12-13 -->
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
	var prg = "./inscription_index.php";
	
	var num = document.frm["etabl"].value
	
	var param="?num="+num;
	var ns= document.frm["civilité"].value
	var param=param+"&civilite="+ns;	
	// si un autre param�tre ajouter :
	// num2=document.frm["xxxxxx"].value;
	// param=param+"&num2="+num2;

	httpRequest.onreadystatechange = recup_data;
	httpRequest.open("GET", prg+param, true);
	httpRequest.send(null);
}

</script>
</head>
<body>

<center>
		<H1>Bienvenue sur le site</H1>
		<div class="header">
			<h1>Olympiade 2017</h1>
		</div>

		
		<form method="POST" action="inscription_index.php">
			<table>
				<tr><td align="right">			<label>Nom </label>
			<input type="text" placeholder= "Entrez votre nom " name="nom" id="nom" pattern="[A-Za-z]{1,}" 
					value="<?php if (isset($_POST['nom_partipant'])) echo htmlentities(trim($_POST['nom_partcipant']));?>" required>
			</td></tr>
			
			<tr><td align="right">			<label>Prénom</label>
			<input type="text" placeholder= "Entrez votre prénom " name="prenom" id="firstname" pattern="[A-Za-z]{1,}" required>
			</td></tr>
			
			<tr><td align="right">			<label>Email</label>
			<input type="email" placeholder= "Entrez votre email " name="email" id="mail" required>
			</td></tr>
			
			<tr><td align="right">
			<label>Mot de passe:</label>
			<input type="password" placeholder= "Entrez votre mot de passe" name="Mdp" id="password" required>
			</td></tr>
			
			<tr><td align="right">
			<label>Date de naissance</label>
			<input type="datetime" placeholder= "Entrez votre date de naissance" name="age" id="âge" required>
			
			</td></tr>
			
			
			
			<tr><td align="right">
			<label>Affliation club</label>
			<input type="club" placeholder= "Entrez votre club" name="club" id="club"required>
			</td></tr>
			
			<tr><td align="right">
			<label>Sport pratiqué</label>
			<input type="sport" placeholder= "sport pratiqué" name="sport" id="sport" required>
			</td></tr>
			
			<tr><td align="right">
			<label>fumeur</label>
			<input type="radio"  name="fumet" value="true" id="fume"> oui
			<input type="radio"  name="fumet" value="false" id="fume" checked> non
			</td></tr>
			
			</td></tr>
			<tr><td align="right">
			<label>Etablissement<select name="etabl"></label>
			<?php
		include('./inclusion/frequenter.php');
		$idc=frequenter();
		$sql='select num_etablissement, nom_etablissement from etablissement order by nom_etablissement ';
		$rs=pg_exec($idc, $sql);
		while($ligne=pg_fetch_assoc($rs)){
		print('<option value="'.$ligne['num_etablissement'].'" >'.$ligne['nom_etablissement'].'</option>'."\n");
	}
		?>
		</td></tr>
		
		<tr><td align="right">
			<label>Formation<select name="forme"></label>
			<?php
		include('./inclusion/former.php');
		$idc=former();
		$sql='select num_formation, nom_formation from formation order by nom_formation ';
		$rs=pg_exec($idc, $sql);
		while($ligne=pg_fetch_assoc($rs)){
		print('<option value="'.$ligne['num_formation'].'" >'.$ligne['nom_formation'].'</option>'."\n");
	}
		?>
		</td></tr>
		
			<tr><td align="right">
			<label>Civilité<select name="civilité"></label>
			<?php
		include('./inclusion/inscrire.php');
		$idc=inscrire();
		$sql='select num_civilite, nom_civilite from civilite order by nom_civilite ';
		$rs=pg_exec($idc, $sql);
		while($ligne=pg_fetch_assoc($rs)){
		print('<option value="'.$ligne['num_civilite'].'" >'.$ligne['nom_civilite'].'</option>'."\n");
	}
		?>
		<tr><td align="right">
			<label>Integrer une équipe<select name="equipe"></label>
			<?php
		include('./inclusion/choisir_eq.php');
		$idc=choisir_eq();
		$sql='select num_equipe, nom_equipe from equipe order by nom_equipe ';
		$rs=pg_exec($idc, $sql);
		while($ligne=pg_fetch_assoc($rs)){
		print('<option value="'.$ligne['num_equipe'].'" >'.$ligne['nom_equipe'].'</option>'."\n");
	}
?>
		
			</table>
			<br/>
			<input id="submit" type="submit" name="connexion" value="Je m'inscris" />
		</form>
		<?php
		//if(isset($erreur))
		//{
			//echo $erreur;
		//}
		?>
</body>
</html>


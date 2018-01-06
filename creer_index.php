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
		<link rel="stylesheet" href="./style.css">
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
print_r($_POST);

    include('./inclusion/connect.inc');
	$idc = connectToDb();
	//Insertion du capitaine dans la table des participants
	$sql='insert into participant(nom_participant, prenom_participant, fumeur, sports_pratiques, date_naissance, affiliation_club )
	values (\''.$_POST['nom'].'\',\''.$_POST['prenom'].'\',\''.$_POST['fumet'].'\',\''.$_POST['sport'].'\',\''.$_POST['age'].'\',\''.$_POST['club'].'\') returning num_participant';
	$id_participant = pg_query($idc,$sql);
	$id = pg_fetch_array($id_participant);
	$NumCapitaine = $id[0];

	//Calcul du nombre de filles
	$NbFille = 0;
    if($_POST['sexeone'] == 2) $NbFille++;
    if($_POST['sexetwo'] == 2) $NbFille++;
    if($_POST['sexethre'] == 2) $NbFille++;
    if($_POST['sexefor'] == 2) $NbFille++;
    if($_POST['sexefiv'] == 2) $NbFille++;

	//Calcul de l'age moyen
	$now = new DateTime("now");
	$dateNaissance = DateTime::createFromFormat('Y-m-j',$_POST['age']);
    $ageCapitaine = $now->diff($dateNaissance);
    $Age_moyen = intval($_POST['age1']) + intval($_POST['age2']) + intval($_POST['age3']) + intval($_POST['age4']) + intval($_POST['age5'] + $ageCapitaine->y);
    $Age_moyen = $Age_moyen/6;

	$Bonus = 10 * $NbFille;
	//Création de l'équipe
    $sql='insert into equipe(nom_equipe, bonus_initial, age_moyen )  values (\''.$_POST['equipe'].'\','.$Bonus.','.$Age_moyen.') returning num_equipe';
    $id_equipe = pg_query($idc,$sql);
    $id = pg_fetch_array($id_equipe);
    $num_equipe = $id[0];

	//Inserer les membres de l'équipe dans la table des participants
	InsertParticipant($idc,$_POST['nomone'],$_POST['firstnameone'], $_POST['age1'], $_POST['sexeone'], $num_equipe );
	InsertParticipant($idc,$_POST['nomtwo'],$_POST['firstnametwo'], $_POST['age2'], $_POST['sexetwo'], $num_equipe );
	InsertParticipant($idc,$_POST['nomthree'],$_POST['firstnamethree'], $_POST['age3'], $_POST['sexethre'], $num_equipe );
	InsertParticipant($idc,$_POST['nomfor'],$_POST['firstnamefor'], $_POST['age4'], $_POST['sexefor'],$num_equipe );
	InsertParticipant($idc,$_POST['nomfiv'],$_POST['firstnamefiv'], $_POST['age5'], $_POST['sexefiv'], $num_equipe );
	

	//Mettre à jour le numéro de l équipe pour la capitaine
	$sql ='update participant set num_equipe = '.$num_equipe.' where num_participant = '.$NumCapitaine;
	pg_query($idc,$sql);

	//Insérer le couple équipe/capitaine dans la table diriger
	$sql='insert into diriger(mail, telephone,num_equipe, num_participant) values (\''.$_POST['email'].'\',\''.$_POST['num'].'\','.$num_equipe.','.$NumCapitaine.')';
	pg_query($idc,$sql)
	//Revenir à l écran principal


	// vérifier fumeur
	//nomone, firstnameone, age1, sexeone, nomwto, firstnametwo, age2, sexetwo, nomthree, firstnamethree, age3, nomfor, age4, sexefor, nomfiv, age5, sexefiv
    // sexeone = civilité dans la bd sql
    // $sql='insert into equipe(nom_equipe, bonus_initial, age_moyen, nom_activite )  values (\''.$_POST['nom_eq'].'\','.$Bonus.','.$Age_moyen)';
?>
	</body>
</html>


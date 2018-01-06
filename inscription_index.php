
	<?php
	include('inclusion/connect.inc');
	include('inclusion/fcts_dates.inc');
		$idc=connect();
		$nom=$_POST['nom'];
		$prenom=$_POST['prenom'];
		$mail=$_POST['email'];
		$mdp=$_POST['Mdp'];
		$age=$_POST['age'];
		//$formation=$_POST['formation'];
		
		
		
		
	$sql='insert into participant(nom_participant, prenom_participant)
	values(\''.$nom.'\',\''.$prenom.'\')';
	pg_query($idc,$sql);
	
	
	echo "Votre inscription a ete enregistre";

	//''.$nom.'\'
	//'.$nom.'\'
	?>
	
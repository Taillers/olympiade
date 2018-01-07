<?php
function connectToDb ()
{
	 $idc=pg_connect("host=127.0.0.1 dbname=Projet user=postgres password=edd40b");
	 return($idc);
}

function InsertParticipant($idc, $nom, $prenom, $age, $sexe, $Equipe, $etablissement)
{
	$sql = 'insert into participant(nom_participant, prenom_participant, date_naissance, num_civilite, num_equipe, num_etablissement  )
	values (\''.$nom.'\',\''.$prenom.'\',\''.$age.'\','.$sexe.','.$Equipe.','.$etablissement.')' ;
	pg_query($idc,$sql);	
}
?>
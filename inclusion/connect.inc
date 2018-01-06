<?php
function connectToDb ()
{
	 $idc=pg_connect("host=127.0.0.1 dbname=Projet user=postgres password=edd40b");
	 return($idc);
}

function InsertParticipant($idc, $nom, $prenom, $age, $sexe, $Equipe)
{
	$sql = 'insert into participant(nom_participant, prenom_participant, date_naissance, num_civilite, num_equipe  )
	values (\''.$nom.'\',\''.$prenom.'\',\''.$age.'\','.$sexe.','.$Equipe.')' ;
	pg_query($idc,$sql);	
}
?>
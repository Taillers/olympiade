<?php
function connectToDb ()
{
	 $idc=pg_connect("host=127.0.0.1 dbname=Projet user=postgres password=edd40b");
	 return($idc);
}

// la fonction pour add un participant dans la base de données
function InsertParticipant($idc, $nom, $prenom, $age, $sexe, $Equipe, $etablissement)
{
	$sql = 'insert into participant(nom_participant, prenom_participant, date_naissance, num_civilite, num_equipe, num_etablissement  )
	values (\''.$nom.'\',\''.$prenom.'\',\''.$age.'\','.$sexe.','.$Equipe.','.$etablissement.')' ;
	pg_query($idc,$sql);	
}
// fonction pour savoir quelle olympiade est celle "en cours" et la distinguer de celles qui sont passées. 
function GetCurrentOlymp($idc)
{
	$numolympe = 0;
	$sql= 'select num_olympiade from olympiade order by date_olympiade desc limit 1';
	$rs = pg_exec($idc, $sql);
    if($ligne = pg_fetch_assoc($rs)){
		$numolympe = $ligne['num_olympiade'];
	}
	return ($numolympe);
}

?>
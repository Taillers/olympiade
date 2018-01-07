<?php
    include('inclusion/connect.inc');
	$idc=connectToDb();

	$sql='insert into etablissement(nom_etablissement) 	values(\''.$_POST['etablissement'].'\')';
	pg_query($idc,$sql);
	
	header("Location: formation.php");
?>
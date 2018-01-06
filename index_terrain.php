<?php
include('inclusion/connect.inc');
	$idc=connect();
		$activite=$_POST['activite'];
		$terrain=$_POST['terrain'];
		
		$sql='insert into terrain(nom_terrain)
	values(\''.$terrain.'\')';
	pg_query($idc,$sql);
	
	$sql='insert into activite(nom_activite)
	values(\''.$activite.'\')';
	pg_query($idc,$sql);
	header("Location: terrain.php");
	?>
	
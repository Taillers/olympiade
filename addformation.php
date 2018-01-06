<?php
    include('inclusion/connect.inc');
	$idc=connectToDb();

	$sql='insert into formation(nom_formation) 	values(\''.$_POST['formation'].'\')';
	pg_query($idc,$sql);
	
	header("Location: formation.php");
?>
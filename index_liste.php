<?php
	session_start();
	if (!isset($_SESSION['Connected']) || $_SESSION['Connected'] == false) {
		header('Location: index.php');
	}
	include('inclusion/connect.inc');
	$idc=connectToDb();
	foreach ($_POST as $key => $value) {
		$sql="update participant set present=".$value." where num_participant=".$key;
		pg_exec($idc, $sql);
	}
	header("Location: liste_equipe.php");
?>
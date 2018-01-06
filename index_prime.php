<?php
	session_start();
	if($_POST['zs_login'] == 'admin' && $_POST['zs_pass'] == "0lymp1ade2017")
	{
		$_SESSION['Connected'] = true;
		header('Location: index.php');
	}
	else
	{
		header('Location: index_connexion.php');
		session_destroy();
	}
?>


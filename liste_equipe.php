<?php
session_start();
if (!isset($_SESSION['Connected']) || $_SESSION['Connected'] == false) {
	header('Location: index.php');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>HTML</title>
		<meta name="author" content="NIKIEMA.DELWENDEARIA" />
		<!-- Date: 2017-12-19 -->
	</head>
	<body>
		<?php
			include('inclusion/menu.htm');
		?>
	<center>
	<h3>Liste des équipes</h3>

<form name="frm" action="index_liste.php" method="POST">
	
	<table border="6">
		<tr ><td>Nom équipe</td><td>Participants</td><td>Présence</td></tr>
		<?php
			include('inclusion/connect.inc');
			$idc = connectToDb();
			$sql = 'select nom_participant,num_participant,present,nom_equipe from equipe,participant where
				equipe.num_equipe=participant.num_equipe
				order by nom_equipe';
			$rs = pg_exec($idc, $sql);
			while ($ligne = pg_fetch_assoc($rs))
			{
				if ($ligne['present'] == "t") 
				{
					print('<tr><td>' . $ligne['nom_equipe'] . '</td><td>' . $ligne['nom_participant'] . '</td><td><input type="radio" name="' . $ligne['num_participant'] . '" value="TRUE" checked/>OUI<input type="radio" name="' . $ligne['num_participant'] . '" value="FALSE"/>NON</td></tr>');
				} 
				else 
				{
					print('<tr><td>' . $ligne['nom_equipe'] . '</td><td>' . $ligne['nom_participant'] . '</td><td><input type="radio" name="' . $ligne['num_participant'] . '" value="TRUE"/>OUI<input type="radio" name="' . $ligne['num_participant'] . '" value="FALSE" checked/>NON</td></tr>');
				}
			}
		?>
	</table>
	<input type="submit" value="Valider"></input>
</form>
<form method='POST' action='mix_equipe.php'>
	<input type="submit" value="Mixer présent"></input>
</form>

</center>

	</body>
</html>


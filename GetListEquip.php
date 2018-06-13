<?php
    if(isset($_POST['CurrentOlympiadeId']))
    {
//        print('<H1>Juste pour un essai avec le code ' .$_POST['CurrentOlympiadeId'] . '</h1>');
		print('<form name="frm" action="index_liste.php" method="POST">');
		print('<table border="6">');
		print('<tr ><td>Nom équipe</td><td>Participants</td><td>Présence</td></tr>');
		include('inclusion/connect.inc');
		$idc = connectToDb();
		$CurrentOlymp = GetCurrentOlymp($idc);
		$sql = 'select nom_participant,num_participant,present,nom_equipe from equipe,participant where
							equipe.num_equipe=participant.num_equipe and equipe.num_olympiade = ' . $_POST['CurrentOlympiadeId'] . '
							order by nom_equipe';
		$rs = pg_exec($idc, $sql);
		while ($ligne = pg_fetch_assoc($rs)) {
			if ($ligne['present'] == "t") {
				print('<tr><td>' . $ligne['nom_equipe'] . '</td><td>' . $ligne['nom_participant'] . '</td><td><input type="radio" name="' . $ligne['num_participant'] . '" value="TRUE" checked/>OUI<input type="radio" name="' . $ligne['num_participant'] . '" value="FALSE"/>NON</td></tr>');
			} else {
				print('<tr><td>' . $ligne['nom_equipe'] . '</td><td>' . $ligne['nom_participant'] . '</td><td><input type="radio" name="' . $ligne['num_participant'] . '" value="TRUE"/>OUI<input type="radio" name="' . $ligne['num_participant'] . '" value="FALSE" checked/>NON</td></tr>');
			}
		}
				
		print('</table>');
		if($CurrentOlymp == $_POST['CurrentOlympiadeId'])
		{
			print('<input type="submit" value="Valider"></input>');
			print('</form>');
			print("<form method='POST' action='mix_equipe.php'>");
			print('<input type="submit" value="Mixer présent"></input>');
			print('</form>');
		}
    }
?>
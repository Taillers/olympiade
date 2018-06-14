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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<!-- Date: 2017-12-19 -->
	</head>
	<body>
	<?php
		include('inclusion/menu.htm');
	?>
	<center>
	<h3>Liste des équipes</h3>

    </form>
	
		<label>Liste olympiades : <select name="liste_olympe" id="liste_olympe"></label>
		<?php
			include('inclusion/connect.inc');
			$idc = connectToDb();
			$sql = 'select num_olympiade, date_olympiade, lieu from olympiade order by date_olympiade desc ';
			$rs = pg_exec($idc, $sql);
			while ($ligne = pg_fetch_assoc($rs)) {
				print('<option value="' . $ligne['num_olympiade'] . '" >Olympiade du ' . $ligne['date_olympiade'] . ' &agrave; ' . $ligne['lieu'] . '</option>' . "\n");
			}
		?>
		</select>
		<br> </br>
	



	<div id=listEquip>
		<form name="frm" action="index_liste.php" method="POST">
		
			<table border="6">
				<tr ><td>Nom équipe</td><td>Participants</td><td>Présence</td></tr>
				<?php
				// include('inclusion/connect.inc');
				// $idc = connectToDb();
					$CurrentOlymp = GetCurrentOlymp($idc);

				$sql = 'select nom_participant,num_participant,present,nom_equipe from equipe,participant where
							equipe.num_equipe=participant.num_equipe and equipe.num_olympiade = ' . $CurrentOlymp . '
							order by nom_equipe';
				$rs = pg_exec($idc, $sql);
				while ($ligne = pg_fetch_assoc($rs)) {
					if ($ligne['present'] == "t") {
						print('<tr><td>' . $ligne['nom_equipe'] . '</td><td>' . $ligne['nom_participant'] . '</td><td><input type="radio" name="' . $ligne['num_participant'] . '" value="TRUE" checked/>OUI<input type="radio" name="' . $ligne['num_participant'] . '" value="FALSE"/>NON</td></tr>');
					} else {
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
	</div>
	</center>

	</body>
</html>

 
<script type="text/javascript"> 
//  Rafraichir les équipes affichées en fonction de l'olympiade selectionnée
//  On utilise du jquerry pour vérifier le changement de sélection de la listbox avec l'identifiant list_olympe
// On récupère l'identifiant de l'olympiade et on utilise ajax pour récupérer les informations sur le serveur des équipes inscrites pour cette olympiade
// La fonction function(data)  est le retour de l'appel GetListEquip.php et permet de mettre à jour le contenu de la div identifié par listequip et donc d'afficher les informations 
	$(document).ready(function () { // on attend que le navigateur client remplisse les info
		$("#liste_olympe").change(function(){
			$.post(
				'GetListEquip.php', // on transmet au serveur
				{
					CurrentOlympiadeId : $("select option:selected").val() // qui va renvoyer les données uniquement de l'olympiade selectionnée
				}, 
				function(data){
					$("#listEquip").html(data); // en donnant les valeurs à listEquip
				},
				'text'
			);
		});

	});
</script>
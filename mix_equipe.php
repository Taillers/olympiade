<?php
	session_start();
	if (!isset($_SESSION['Connected']) || $_SESSION['Connected'] == false) {
		header('Location: index.php');
	}
	include('inclusion/connect.inc');
	$idc=connectToDb();
    // Faire des packs par formation
    //TODO Rajouter la récupération du sexe et de l'age des participants
    $sql = 'select part.num_participant, part.nom_participant, part.num_etablissement, etab.nom_etablissement from participant part, etablissement etab where part.present = true and part.num_etablissement = etab.num_etablissement and part.num_equipe IN (select distinct num_equipe from participant where present = false) order by num_etablissement';
    $rs = pg_exec($idc, $sql);
    $all = pg_fetch_all($rs);
    $CountPerEtab = array();
    $first = Count($all);
    // if($first % 6 != 0)
    // {
    //     print '<td>On ne peut pas faire constituer toutes les équipes</td>';
    // }
    // else
    // {
    //     print '<td>on a un compte rond</td>';
    // }
    foreach($all as $prem)
    {
        if(!isset($CountPerEtab[$prem['num_etablissement']]))
        {
            $CountPerEtab[$prem['num_etablissement']] = 0;
        }
        $CountPerEtab[$prem['num_etablissement']]++;
        // print '<p>Numéro de participant : '.$prem['num_participant'].' Numéro etablissement : '.$prem['num_etablissement'].'</p>';
    }
    // print_r($CountPerEtab);
    // En prendre des pack de 6
    // foreach($CountPerEtab as $travail)
    // {
    //     if($travail >= 6 )
    //     {
    //         $nbEqu = (int)($travail / 6);
    //         $poubelle = $travail % 6;
    //         print '<td>on peut faire '.$nbEqu.' equipe(s) et '.$poubelle.' doivent être réaffecté</div></td>';

    //     }
    //     else
    //     {
    //         print '<td>On ne peut pas faire une équipe</td>';
    //     }
    // }
    // Quand plus de gp de 6 dans un pack, tout remelanger et continuer
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>HTML</title>
		<meta name="author" content="NIKIEMA.DELWENDEARIA" />
		<!-- Date: 2017-12-14 -->
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script>
		$(document).ready(function (){
		  $(document).mouseup(function(){
              if($(":checkbox:checked").length == 5)
              {
                  $('#submit').removeAttr('disabled');
              }
              else
              {
                // $('#submit').prop("disabled", true);
              }
		  })
		})
	</script>
	
	<script language="javascript" src="./js/fonctions_utf8.js">
	</script>
	<script language ="javascript">
    </script>
	</head>
	<body>
		<?php
			include('inclusion/menu.htm');
        ?>
<form method= 'POST' action='mixer_manuel.php'>
    <center>	
        <table>
            <tr><th>Nom de la personne</th><th>Etablissement</th><th>Association</th></tr>
            <?php
                $compteur = 0;
                foreach($all as $travail)
                {
                    //TODO Ajouter le sexe et l'age des participants dans les champs hidden
                    $temp = '<input name=\'num_etab'.$compteur.'\' value='.$travail['num_etablissement'].' type="hidden"/><input name=\'num_participant'.$compteur.'\' value='.$travail['num_participant'].' type="hidden"/>';
                    print '<tr><td>'.$travail['nom_participant'].'</td><td>'.$travail['nom_etablissement'].'</td><td><input type="checkbox" name=\''.$compteur.'\'>'.$temp.'</td></tr>';
                    $compteur++;
                }
            ?>
        </table>
        <input id="submit" type="submit" name="Créer" value="Associer" disabled="disabled"/>
    </center>
</form>
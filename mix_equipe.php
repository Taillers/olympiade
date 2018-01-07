<?php
	session_start();
	if (!isset($_SESSION['Connected']) || $_SESSION['Connected'] == false) {
		header('Location: index.php');
	}
	include('inclusion/connect.inc');
	$idc=connectToDb();
    // Faire des packs par formation
    $sql = 'select num_participant, num_etablissement from participant where present = true and num_equipe IN (select distinct num_equipe from participant where present = false) order by num_etablissement';
    $rs = pg_exec($idc, $sql);
    while ($ligne = pg_fetch_assoc($rs))
    {
        print 'num-participant = '.$ligne['num_participant'].' num_etablissement = '.$ligne['num_etablissement']; 
    }
    // En prendre des pack de 6
    // Quand plus de gp de 6 dans un pack, tout remelanger et continuer

    
?>
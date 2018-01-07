<?php
	session_start();
	if (!isset($_SESSION['Connected']) || $_SESSION['Connected'] == false) {
		header('Location: index.php');
	}
	include('inclusion/connect.inc');
	$idc=connectToDb();
    print_r($_POST);
    $nb = count($_POST);
    print $nb;
    $participant = array();
    $compteur = 0;
    for($i = 0; $i < $nb; $i++)
    {
        if(isset($_POST[$i]))
        {
            $newParticipant = array();
            $newParticipant['num_participant'] = $_POST['num_participant'.$i];
            $newParticipant['num_etablissement'] = $_POST['num_etab'.$i];
            print '<p>Le participant '.$_POST['num_participant'.$i].' est selectionné</p>';
            $participant[$compteur] = $newParticipant;
            $compteur++;
        }
    }
    //TODO Calculer bonus
    $Bonus = 30;
    //TODO Calculer age moyen
    $Age_moyen = 18;
    print_r($participant);
    $sql='insert into equipe(nom_equipe, bonus_initial, age_moyen )  values (\'Equipe\','.$Bonus.','.$Age_moyen.') returning num_equipe';
    $id_equipe = pg_query($idc,$sql);
    $id = pg_fetch_array($id_equipe);
    $num_equipe = $id[0];
    for($i = 0; $i < 6; $i++)
    {
        $sql = 'update participant set num_equipe ='.$num_equipe.' where num_participant = '.$participant[$i]['num_participant'];
        pg_query($idc,$sql);
    }
    //TODO inserer des informations dans  la table diriger

    header('Location: mix_equipe.php');
?>
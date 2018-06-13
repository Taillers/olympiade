<?php
	session_start();
	if (!isset($_SESSION['Connected']) || $_SESSION['Connected'] == false) {
		header('Location: index.php');
	}
    include('inclusion/connect.inc');
        $time = strtotime($_POST['date_olymp']);
    if ($time) {
        //$new_date = DateTime::createFromFormat('Y-m-d', $time);
        $idc=connectToDb();
        if(isset($_POST['num_olymp']))
        {
            // update la table
            $sql='update olympiade set date_olympiade = TIMESTAMP \''.$_POST['date_olymp'].'\', lieu = \''.$_POST['lieu_olymp'].'\' , meteo = \''.$_POST['meteo_olymp'].'\'
                where num_olympiade = ' .$_POST['num_olymp'] ;
            pg_query($idc,$sql);
                
        }
        else 
        {
            // créer la ligne dans la table
            
            $sql='insert into olympiade(date_olympiade, lieu, meteo)
                    values(TIMESTAMP \''.$_POST['date_olymp'].'\',\''.$_POST['lieu_olymp'].'\',\''.$_POST['meteo_olymp'].'\')';
            pg_query($idc,$sql);
        }
        
        
    }
	header("Location: Gestion_olympiade.php"); 
?>
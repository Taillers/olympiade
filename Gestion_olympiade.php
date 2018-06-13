<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>HTML</title>
		<meta name="author" content="Cocquerez.Alexandre" />
        <!-- Date: 2018-06-11 -->
       
</head>
    <body>
    <?php
			include('inclusion/menu.htm');
		?>
    <center>
    <form name="frm" action="gererolymp.php" method="POST">
	
	<table border="6">
		<tr ><td>Date</td><td>Lieu</td><td>Météo</td><td></td></tr>
		<?php
    include('inclusion/connect.inc');
    $today= new DateTime("now");

    $cancreate = true;
    $idc = connectToDb();
    $sql = 'select num_olympiade,date_olympiade,lieu,meteo from olympiade
				order by date_olympiade';
    $rs = pg_exec($idc, $sql);
    while ($ligne = pg_fetch_assoc($rs)) {
        $dateevent = new DateTime($ligne['date_olympiade']);
        if($dateevent > $today){
            print('<tr><td><input type="date" value= '.$ligne['date_olympiade'].' name="date_olymp" id="date_olymp"/></td><td><input type = "text" value= ' . $ligne['lieu'] . ' name="lieu_olymp" id="lieu_olymp"/></td><td><input type = "text" value= ' . $ligne['meteo'] . ' name="meteo_olymp" id="meteo_olymp"/></td><td><input type = "hidden" name = "num_olymp" id ="num_olymp" value = '.$ligne['num_olympiade'].'></input> <input type="submit" value="Modifier"></input></td></tr>');
            // print('<tr><td>' . $ligne['date_olympiade'] . '</td><td>' . $ligne['lieu'] . '</td><td>' . $ligne['meteo'] . '</td><td><input type="submit" value="Modifier"></input> </td></tr>');
            $cancreate = false;
        }
        else{ 
            print('<tr><td>' . $ligne['date_olympiade'] . '</td><td>' . $ligne['lieu'] . '</td><td>' . $ligne['meteo'] . '</td></tr>');   
            
        }
   }

    if($cancreate == true){
     print('<tr><td><input type="date" placeholder= "Date de l olympiade " name="date_olymp" id="date_olymp"/></td><td><input type = "text" placeholder= "Lieu de l olympiade" name="lieu_olymp" id="lieu_olymp"/></td><td><input type = "text" placeholder= "Météo prévue pour l olympiade" name="meteo_olymp" id="meteo_olymp"/></td><td><input type="submit" value="Valider"></input></td></tr>');
    }
    ?>
    </table>
     
	</form>
    </center>
    
    </body>
    		
	
</html>
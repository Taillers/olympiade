<?php
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>HTML</title>
		<meta name="author" content="NIKIEMA.DELWENDEARIA" />
		<!-- Date: 2017-12-12 -->
		<link rel="stylesheet" href="./style.css">
	</head>
	<body>
		<?php
			include('inclusion/menu.htm');
        ?>
        <center>
        <table>
            <tr>
                <th>Nom de la formation</th><th>Action</th>
            </tr>
            <?php
                include('inclusion/connect.inc');
                $idc = connectToDb();
                $sql = 'select num_formation, nom_formation from formation order by nom_formation';
                $rs = pg_exec($idc, $sql);
                while ($ligne = pg_fetch_assoc($rs))
                {
                    print '<form method="POST" action="deleteformation">';
                    print('<tr><td><input type="text" name="formation" value="'.$ligne['nom_formation'].'" readonly ><input type="hidden" name="idx" value='.$ligne['num_formation'].'> </td><td><input  id="submit" type="submit" name="Suppression" value="Suppression"/></td>');
                    print '</form>';
                }
                print '<form method="POST" action="addformation">';
                print('<tr><td><input type="text" name="formation"></td><td><input  id="submit" type="submit" name="Ajout" value="Ajout"/></td>');
                print '</form>';
            

            ?>
        </table>
        
        <table>
            <tr>
                <th>Nom de l'établissement</th><th>Action</th>
            </tr>
            <?php
        
                $sql = 'select num_etablissement, nom_etablissement, adr_etablissemnt from etablissement order by nom_etablissement';
                $rs = pg_exec($idc, $sql);
                while ($ligne = pg_fetch_assoc($rs))
                {
                    print '<form method="POST" action="deleteetablissement">';
                    print('<tr><td><input type="text" name="etablissement" value="'.$ligne['nom_etablissement'].'" readonly ><input type="hidden" name="idx" value='.$ligne['num_etablissement'].'> </td><td><input  id="submit" type="submit" name="Suppression" value="Suppression"/></td>');
                    print '</form>';
                }
                print '<form method="POST" action="addetablissement">';
                print('<tr><td><input type="text" name="etablissement"></td><td><input  id="submit" type="submit" name="Ajout" value="Ajout"/></td>');
                print '</form>';
            

            ?>
        </table>
        </center>
	</body>
</html>



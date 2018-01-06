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
            <td>
                <th>Nom de la formation</th><th>Action</th>
            </td>
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
        <form method="POST" action="ajouter_etablissement.php">

        </form>
        </center>
	</body>
</html>



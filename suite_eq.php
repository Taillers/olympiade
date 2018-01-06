<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>HTML</title>
		<meta name="author" content="NIKIEMA.DELWENDEARIA" />
		<!-- Date: 2017-12-18 -->
	</head>
	<body>
<?php
include('./inclusion/fcts_dates.inc');
include('./inclusion/connect.php');
$idc=connect();

$nom_equipe=$_POST['nom'];
$num_sexe=$_POST['nom1'];
foreach($_POST as $key=>$value){
    echo $key.' '.$value."\n";
}
?>
	</body>
</html>


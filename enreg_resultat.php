<?php
include('inclusion/connect.inc');
$idc=connect();
$scoref=$_POST['scoref'];
$scoreb=$_POST['scoreb'];
$activite=$_POST['activite'];
$olymp=$_POST['olymp'];

$sql='insert into olympiade (num_olympiade)
values(\''.$olymp.'\')';
pg_query($idc,$sql);

$sql='insert into attribuer(nb_points,num_activite,num_olympiade)
values(\''.$scoref.'\', \''.$activite.'\',\''.$olymp.'\')';
pg_query($idc,$sql);

$sql='insert into attribuer(nb_points,num_activite,num_olympiade)
values(\''.$scoreb.'\',)';
echo abs($scoref); 
if ($scoref!=abs($scoref)){
	print('Entrez un score valide');
}
?>


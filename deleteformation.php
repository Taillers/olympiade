<?php
    include('inclusion/connect.inc');
    $idc=connectToDb();
    $sql='delete from formation where num_formation = '.$_POST['idx'];
	pg_query($idc,$sql);
	header("Location: formation.php");
?>
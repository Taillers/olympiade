<?php
    include('inclusion/connect.inc');
    $idc=connectToDb();
    $sql='delete from etablissement where num_etablissement = '.$_POST['idx'];
	pg_query($idc,$sql);
	header("Location: formation.php");
?>
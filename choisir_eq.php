<?php
function choisir_eq(){
	$idc=pg_connect('host=localhost user=postgres password=postgres dbname=bd_cocquerez_nikiema_projetinfos3');
	return($idc);
}
?>
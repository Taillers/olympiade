<?php

	function date_us_2_fr($dus)
	{
		$t=explode('-',$dus);
		$dfr=$t[2].'/'.$t[1].'/'.$t[0];
		return($dfr);
	}


	// exercice 6
	function zerog($v){
		$res=$v;
		if($res<10){
			$res = '0'.$res;
		}
		return($res);
	}
	// exercice 8  version 1
	function jourf_v1($numj)
	{
		if($numj==0){
			$nomj='Dimanche';
		}
		else{
			if($numj==1){
				$nomj='Lundi';
			}
			else{
				if($numj==2){
					$nomj='Mardi';
				}
				else{
					if($numj==3){
						$nomj='Mercredi';
					}
					else{
						if($numj==4){
							$nomj='Jeudi';
						}
						else{
							if($numj==5){
								$nomj='Vendredi';
							}
							else{
								$nomj='Samedi';
							}
						}
					}
				}
			}
		}
		return($nomj);
	}
	
	// exercice 8  version 2
	function jourf_v2($numj)
	{
		switch($numj){
			case 0: $nomj='Dimanche';	break;
			case 1: $nomj='Lundi'; 		break;
			case 2: $nomj='Mardi'; 		break;
			case 3: $nomj='Mercredi'; 	break;
			case 4: $nomj='Jeudi';		break;
			case 5: $nomj='Vendredi';	break;
			case 6: $nomj='Samedi';		break;
			default: $nomj='Erreur';	break;
		}		
		return($nomj);
	}
	// exercice 8  version 3
	function jourf_v3($numj)
	{
		$t=array('Grosmanche','Landi','Maardi','Credi',
				 'Jodi','Dredi','Sadi');
		$nomj=$t[$numj];
		return($nomj);
	}
	// exercice 10
	function moisf($numm)
	{
		
		$t=array(1=>'Janvier','Février','Mars','Avril',
				 'Mai','Juin','Juillet','Aout','Septembre',
				 'Octobre','Novembre','Décembre');
		$nomm=$t[$numm];
		return($nomm);
	}
	

?>
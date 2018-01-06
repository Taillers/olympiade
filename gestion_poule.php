<?php
$elements=$_POST[''];
	/*
	 * Classe permettant de stocker des éléments
	 * et de les récupérer dans un ordre aléatoire
	 */
	class sac_a_malice{
		private $elements = array();
	   	private $nb_elem = 0;
		
		/* 
		 * Fonction retournant au hasard, un élément du sac.
		 * Dans le cas où le sac est vide génère une exception
		 */	
		 
		public function donner(){
	    	if ( $this->nb_elem==0) {
	            throw new OutOfBoundsException(sprintf('Le panier est vide!'));
	        }
			      
			$ind=rand(0, $this->nb_elem-1);
	        $element = $this->elements[$ind];
	        unset($this->elements[$ind]);
	        $this->elements = array_values($this->elements);
			$this->nb_elem--;
	        return $element;
	    }
		
		/* 
		 * Permet d'ajouter un élément dans le sac
		 */
		public function ajouter($nouveau){
	        $this->elements[] = $nouveau;
			$this->nb_elem++;
	    }
		
		/* 
		 * Fonction booléenne indiquant si le sac est vide ou pas
		 */
		public function vide(){
			return($this->nb_elem==0);
		}
		
		/* 
		 * Fonction qui retourne le nombre d'éléments contenus dans le sac
		 */
		public function nombre_elements(){
			return($this->nb_elem);
		}
		
	}
?>
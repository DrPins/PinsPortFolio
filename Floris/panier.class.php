<?php

class panier {

	private $DB;


	public function __construct ($DB){
		if (!isset($_SESSION)){					//verifie si la session est ouverte
			session_start();
		}
		if (!isset($_SESSION['panier'])){		//verifie si le panier est setté
			$_SESSION['panier']=array();
		}
		$this->DB=$DB;

		if(isset($_GET['delPanier'])){
			$this->del($_GET['delPanier']);
		}

		if(isset($_GET['validInscrits'])){
			$this->valid($_GET['validInscrits']);
		}

		if(isset($_GET['suppInscrits'])){
			$this->supp($_GET['suppInscrits']);
		}
	}

	public function valid ($inscrits_id){				//valide une iscription
		$validation=$this->DB->query ('UPDATE client SET valider = 1 WHERE id ='.$inscrits_id);
	}

	public function supp ($inscrits_id){				//supprime une iscription
		$suppression=$this->DB->query ('DELETE FROM client WHERE id ='.$inscrits_id);
	}

	public function count(){
		return array_sum($_SESSION['panier']);
	}

	public function add ($prod_id){				//ajoute au panier 
		if(isset($_SESSION['panier'][$prod_id])){//test si l'element a deja été rajouté au panier
			$_SESSION['panier'][$prod_id] ++;
		}
		else{$_SESSION['panier'][$prod_id] = 1;} 
	}

	public function del ($prod_id){				//supprime du panier
		unset($_SESSION['panier'][$prod_id]);
	}

	public function total(){
		$total=0;
		$ids = array_keys($_SESSION['panier']);
		if (empty($ids)){
			$prod_pannier=array();
		} 
		else{$prod_pannier=$this->DB->query ('SELECT id, prix, promotion FROM produit WHERE id IN ('.implode(',', $ids).')');
		}
		foreach ($prod_pannier as $product) {
			
			if ($product->promotion == 1){
				$total= $total + ($product->prix * 0.70 * $_SESSION['panier'][$product->id]);
			}
			elseif ($product->promotion == 2) {
				$total= $total + ($product->prix * 0.50 * $_SESSION['panier'][$product->id]);
			}
			else{
			$total= $total + ($product->prix * $_SESSION['panier'][$product->id]);
			}
		}
		return $total;
	}

	
}

?>
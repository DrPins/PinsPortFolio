<?php

class inscription {

	private $DB;


	public function __construct ($DB){
		if (!isset($_POST['Envoyer'])){					//verifie si la session est ouverte
			session_start();
		}
		
	}
}

?>
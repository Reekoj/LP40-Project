<?php
	function ToutCompte(){
		$xml = new DomDocument;
		$xml->load("xml/gestion.xml");
		$liste_compte=$xml-> getElementsByTagName("compte");
		return $liste_compte;
	}
	function supprimerCompte(){}
?>
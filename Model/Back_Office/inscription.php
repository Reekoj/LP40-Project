<?php
function idClient() {
	$xml = new DomDocument ();
	$xml->load ( '../../xml/gestion.xml' );
	$xpath = new DOMXPath($xml);
	$liste = $xpath->query ( '//clients/client' );
	$cpt = 1;
	foreach ( $liste as $client ) {
		$cpt ++;
	}
	return $cpt;
}
function ajouterClient($cin, $nom, $prenom, $adresse, $email, $sexe) {
	$xml = new DomDocument ();
	$xml->preserveWhiteSpace = true;
	$xml->load ( '../../xml/gestion.xml' );
	$xpath = new DOMXPath ( $xml );
	
	$cinc = $xml->createElement ( 'cin', $cin );
	$nomc = $xml->createElement ( 'nom', $nom );
	$prenomc = $xml->createElement ( 'prenom', $prenom );
	$adressec = $xml->createElement ( 'adresse_complet', $adresse );
	$emailc = $xml->createElement ( 'mail', $email );
	$sexec = $xml->createElement ( 'sexe', $sexe );
	$idclient = idClient ();
	
	$client = $xml->createElement ( 'client' );
	$client->setAttribute ( 'id', 'idclient' . $idclient );
	$listeclients = $xpath->query ( '//clients' )->item ( 0 );
	$listeclients->appendChild ( $client );
	
	$client->appendChild ( $cinc );
	$client->appendChild ( $nomc );
	$client->appendChild ( $prenomc );
	$client->appendChild ( $adressec );
	$client->appendChild ( $emailc );
	$client->appendChild ( $sexec );
	
	$xml->save ( "../../xml/gestion.xml" );
}
function ajouterCompte($pseudo, $motdepasse, $email, $image) {
	$xml = new DomDocument ();
	$xml->preserveWhiteSpace = true;
	$xml->load ( '../../xml/gestion.xml' );
	$xpath = new DOMXPath ( $xml );
	
	$emailc = $xml->createElement ( 'mail', $email );
	$pseudoc = $xml->createElement ( 'pseudo', $pseudo );
	$motdepassec = $xml->createElement ( 'password', $motdepasse );
	$imgc = $xml->createElement ( 'img', $image );
	$idcompte = idClient () - 1;
	
	$compte = $xml->createElement ( 'compte' );
	$compte->setAttribute ( 'id', 'idclient' . $idcompte );
	$listecomptes = $xpath->query ( '//comptes' )->item ( 0 );
	$listecomptes->appendChild ( $compte );
	
	$compte->appendChild ( $pseudoc );
	$compte->appendChild ( $motdepassec );
	$compte->appendChild ( $emailc );
	$compte->appendChild ( $imgc );
	
	$xml->save ( "../../xml/gestion.xml" );
}
function inscrireClient($cin, $nom, $prenom, $adresse, $email, $sexe, $pseudo, $motdepasse, $image) {
	ajouterClient ( $cin, $nom, $prenom, $adresse, $email, $sexe );
	ajouterCompte ( $pseudo, $motdepasse, $email, $image );
}
?>
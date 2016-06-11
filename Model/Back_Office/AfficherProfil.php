<?php
function infoClient($id_client) {
	$xml = new DomDocument ();
	$xml->load ( "xml/gestion.xml" );
	$xpath = new DOMXPath ( $xml );
	$liste = $xpath->query ( '//clients/client[@id="' . $id_client . '"]' );
	return $liste;
}
	
function infoReservationClient($id_client){
	$xml = new DomDocument ();
	$xml->load ( "xml/gestion.xml" );
	$xpath = new DOMXPath ( $xml );
	$liste = $xpath->query ( '//reservations/reservation[id_client="' . $id_client . '"]' );
	return $liste;
	
	
	
}
	
	
	
	
	


?>
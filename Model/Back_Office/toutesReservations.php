<?php
function TouteReservation() {
	$xml = new DomDocument ();
	$xml->load ( "xml/gestion.xml" );
	$liste_reservation = $xml->getElementsByTagName ( "reservation" );
	return $liste_reservation;
}
?>
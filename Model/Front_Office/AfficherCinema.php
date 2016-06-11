<?php

function cinemaById($idCinema) {
	$xml = new DomDocument ();
	$xml->load ( "xml/gestion.xml" );
	$xpath = new DOMXPath ( $xml );
	$liste = $xpath->query ( '//cinemas/cinema[@id="' . $idCinema . '"]' );
	return $liste;
}

?>
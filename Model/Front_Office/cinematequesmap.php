<?php
function latlngcinemateques() {
	$xml = new DomDocument ();
	$xml->load ( 'xml/gestion.xml' );
	$liste = $xml->getElementsByTagName ( "latlng" );
	return $liste;
}
function nomcinemateques() {
	$xml = new DomDocument ();
	$xml->load ( 'xml/gestion.xml' );
	$liste = $xml->getElementsByTagName ( "nom_cinema" );
	return $liste;
}
function imgcinemateques() {
	$xml = new DomDocument ();
	$xml->load ( 'xml/gestion.xml' );
	$liste = $xml->getElementsByTagName ( "img_path" );
	return $liste;
}
function idcinemateques() {
	$xml = new DomDocument ();
	$xml->load ( 'xml/gestion.xml' );
	$xpath = new DOMXPath ( $xml );
	$liste = $xpath->query ( '//cinemas/cinema' );
	return $liste;
}
?>
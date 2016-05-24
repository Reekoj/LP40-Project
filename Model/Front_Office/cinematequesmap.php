<?php
function latlngcinemateques() {
	$xml = new DomDocument ();
	$xml->load ( 'xml/gestion.xml' );
	$liste = $xml->getElementsByTagName ( "latlng" );
	return $liste;
}

?>
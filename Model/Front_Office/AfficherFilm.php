<?php

function filmById($idFilm) {
	$xml = new DomDocument ();
	$xml->load ( "xml/gestion.xml" );
	$xpath = new DOMXPath ( $xml );
	$liste = $xpath->query ( '//cinemas/cinema/films/film[@id="' . $idFilm . '"]' );
	return $liste;
}

?>
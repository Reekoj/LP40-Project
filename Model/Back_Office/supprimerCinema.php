<?php

require_once 'ajoutFilm.php';
require_once 'supprimerFilm.php';
function supprimerCinema($idcinema) {
	$xml = new DomDocument ();
	$xml->load ( 'xml/gestion.xml' );
	$xpath = new DOMXPath ( $xml );
	
	$liste_film = film ( $idcinema );
	foreach ( $liste_film as $film ) {
		$idfilm = ($film->getAttribute ( "id" )) ? $film->getAttribute ( "id" ) : "";
		echo $idfilm;
		supprimerFilmxpath ( $idfilm , $xpath);
	}
	
	$cinema = $xpath->query ( '//cinemas/cinema[@id="' . $idcinema . '"]' );
	foreach ( $cinema as $cn ) {
		$targetimg = $cn->getElementsByTagName ( "img_path" )->item ( 0 )->nodeValue;
		if (file_exists ( $targetimg ))
			unlink ( $targetimg );
		$cn->parentNode->removeChild ( $cn );
	}
	
	$xml->save ( "xml/gestion.xml" );
}

?>
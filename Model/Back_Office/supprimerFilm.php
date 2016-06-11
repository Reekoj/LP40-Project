<?php

function supprimerFilm($idfilm){
	$xml = new DomDocument ();
	$xml->load ( 'xml/gestion.xml' );
	$xpath = new DOMXPath ( $xml );

	$reservations = $xpath->query ( '//reservations/reservation[id_film="' . $idfilm . '"]' );
	foreach ($reservations as $res){
		$res->parentNode->removeChild($res);
		echo "supprime";
	}

	$film = $xpath->query ( '//cinemas/cinema/films/film[@id="' . $idfilm . '"]' );
	foreach ($film as $f){
		$targetimg = $f->getElementsByTagName ( "photo" )->item ( 0 )->nodeValue;
		if (file_exists ( $targetimg )) unlink($targetimg);
		$f->parentNode->removeChild($f);
	}

	$xml->save ( "xml/gestion.xml" );
}
function supprimerFilmxpath($idfilm,$xpath){
	
	$reservations = $xpath->query ( '//reservations/reservation[id_film="' . $idfilm . '"]' );
	foreach ($reservations as $res){
		$res->parentNode->removeChild($res);
		echo "supprime";
	}

	$film = $xpath->query ( '//cinemas/cinema/films/film[@id="' . $idfilm . '"]' );
	foreach ($film as $f){
		$targetimg = $f->getElementsByTagName ( "photo" )->item ( 0 )->nodeValue;
		if (file_exists ( $targetimg )) unlink($targetimg);
		$f->parentNode->removeChild($f);
	}

}

?>
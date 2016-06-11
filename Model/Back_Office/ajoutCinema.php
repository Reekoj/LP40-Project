<?php
function idCinema() {
	$xml = new DomDocument ();
	$xml->load ( '../../xml/gestion.xml' );
	$xpath = new DOMXPath($xml);
	$liste = $xpath->query ( '//cinemas/cinema' );
	$cpt = 1;
	foreach ( $liste as $cinema ) {
		$cpt ++;
	}
	return $cpt;
}

function cinema() {
	$xml = new DomDocument ();
	$xml->load ( "xml/gestion.xml" );
	$xpath = new DOMXPath ( $xml );
	$liste = $xpath->query ( '//cinemas/cinema' );
	return $liste;
}
function infoCinemas() {
	$xml = new DomDocument ();
	$xml->load ( 'xml/gestion.xml' );
	$xpath = new DOMXPath ( $xml );
	$liste = $xpath->query ( '//cinemas/cinema' );
	
	$cpt = 0;
	$li=[];
	foreach ( $liste as $l ) {
		$li [$cpt] ['id_cinema'] = $l->getAttribute ( "id" );
		$li [$cpt] ['nom_cinema'] = $l->getElementsByTagName ( "nom_cinema" )->item ( 0 )->nodeValue;
		$li [$cpt] ['img_path'] = $l->getElementsByTagName ( "img_path" )->item ( 0 )->nodeValue;
		$cpt++;
	}
	
	return $li;
}

function ajouterCinema($nom, $numero, $rue, $cp, $ville, $localisation, $lat, $lng,$img) {
	$xml = new DomDocument ();
	$xml->preserveWhiteSpace = true;
	$xml->load ( '../../xml/gestion.xml' );
	$xpath = new DOMXPath ( $xml );
	
	$nomc = $xml->createElement ( 'nom_cinema', $nom );
	
	$numeroc = $xml->createElement ( 'numero', $numero );
	$ruec = $xml->createElement ( 'rue', $rue );
	$cpc = $xml->createElement ( 'cp', $cp );
	$villec = $xml->createElement ( 'ville', $ville );
	$adressec = $xml->createElement ( 'adresse');
	$adressec->appendChild($numeroc);
	$adressec->appendChild($ruec);
	$adressec->appendChild($cpc);
	$adressec->appendChild($villec);
	
	$localisationc = $xml->createElement ( 'localisation', $localisation );
	
	$latc = $xml->createElement ( 'lat', $lat );
	$lngc = $xml->createElement ( 'lng', $lng );
	$latlngc = $xml->createElement ( 'latlng' );
	$latlngc->appendChild($latc);
	$latlngc->appendChild($lngc);
	
	$imgc = $xml->createElement ( 'img_path', $img );
	$idcinema = idCinema ();
	
	$filmsc = $xml->createElement ( 'films' );
	
	$cinema = $xml->createElement ( 'cinema' );
	$cinema->setAttribute ( 'id', 'idcinema'.$idcinema );
	$listecinemas = $xpath->query ( '//cinemas' )->item ( 0 );
	$listecinemas->appendChild ( $cinema );
	
	$cinema->appendChild ( $nomc );
	$cinema->appendChild ( $adressec );
	$cinema->appendChild ( $localisationc );
	$cinema->appendChild ( $latlngc );
	$cinema->appendChild ( $imgc );
	$cinema->appendChild ( $filmsc );
	
	$xml->save ( "../../xml/gestion.xml" );
}
?>
<?php
function idFilm($idCinema) {
	$xml = new DomDocument ();
	$xml->load ( '../../xml/gestion.xml' );
	$xpath = new DOMXPath ( $xml );
	$liste = $xpath->query ( '//cinemas/cinema[@id="' . $idCinema . '"]/films/film' );
	$cpt = 1;
	foreach ( $liste as $film ) {
		$cpt ++;
	}
	return $cpt;
}

function film($idCinema) {
	$xml = new DomDocument ();
	$xml->load ( "xml/gestion.xml" );
	$xpath = new DOMXPath ( $xml );
	$liste = $xpath->query ( '//cinemas/cinema[@id="' . $idCinema . '"]/films/film' );
	return $liste;
}
function recentFilm() {
	$xml = new DomDocument ();
	$xml->load ( "xml/gestion.xml" );
	$xpath = new DOMXPath ( $xml );
	$listecinemas = $xpath->query ( '//cinemas/cinema' );
	$filmsrecent = [ ];
	$cpt = 0;
	foreach ( $listecinemas as $cinema ) {
		$listefilms = $cinema->getElementsByTagName ( "film" );
		$recent = 0;
		$imgrecent = "";
		$nomcinemarecent = "";
		$noterecent = "";
		$genrerecent = "";
		$datesortierecent = "";
		$titrerecent = "";
		foreach ( $listefilms as $film ) {
			$datecharb = $film->getElementsByTagName ( "date_sortie" )->item ( 0 )->nodeValue;
			$datechar = preg_replace ( '#/#', '$1', "$datecharb" );
			$dateint = intval ( $datechar );
			if ($recent < $dateint) {
				$recent = $dateint;
				$nomcinemarecent = $cinema->getElementsByTagName ( "nom_cinema" )->item ( 0 )->nodeValue;
				$titrerecent = $film->getElementsByTagName ( "titre" )->item ( 0 )->nodeValue;
				$imgrecent = $film->getElementsByTagName ( "photo" )->item ( 0 )->nodeValue;
				$datesortierecent = $datecharb;
				$genrerecent = $film->getElementsByTagName ( "genre" )->item ( 0 )->nodeValue;
				$noterecent = $film->getElementsByTagName ( "note" )->item ( 0 )->nodeValue;
			}
		}
		if ($imgrecent != "") {
			$filmsrecent [$cpt] ['nom_cinema'] = $nomcinemarecent;
			$filmsrecent [$cpt] ['titre'] = $titrerecent;
			$filmsrecent [$cpt] ['photo'] = $imgrecent;
			$filmsrecent [$cpt] ['date_sortie'] = $datesortierecent;
			$filmsrecent [$cpt] ['genre'] = $genrerecent;
			$filmsrecent [$cpt] ['note'] = $noterecent;
			$cpt ++;
		}
		
	}
	return $filmsrecent;
}
function ajouterFilm($idCinema, $titre, $realisateur, $genre, $note, $duree, $tabacteurs, $tabdates, $tabheureDebuts, $tabnbplaces, $img, $date_sortie) {
	$xml = new DomDocument ();
	$xml->preserveWhiteSpace = true;
	$xml->load ( '../../xml/gestion.xml' );
	$xpath = new DOMXPath ( $xml );
	
	$titref = $xml->createElement ( 'titre', $titre );
	$realisateurf = $xml->createElement ( 'realisateur', $realisateur );
	$genref = $xml->createElement ( 'genre', $genre );
	$notef = $xml->createElement ( 'note', $note );
	$dureef = $xml->createElement ( 'duree', $duree );
	
	$acteursf = $xml->createElement ( 'acteurs' );
	for($cpt = 0; $cpt < sizeof ( $tabacteurs ); $cpt ++) {
		$acteurf = $xml->createElement ( 'acteur', $tabacteurs [$cpt] );
		$acteursf->appendChild ( $acteurf );
	}
	
	$date_sortief = $xml->createElement ( 'date_sortie', $date_sortie );
	
	$seancesf = $xml->createElement ( 'seances' );
	for($cpt = 0; $cpt < sizeof ( $tabdates ); $cpt ++) {
		$datef = $xml->createElement ( 'date', $tabdates [$cpt] );
		$heureDebutf = $xml->createElement ( 'heureDebut', $tabheureDebuts [$cpt] );
		$nbplacesf = $xml->createElement ( 'nbplaces', $tabnbplaces [$cpt] );
		$seancef = $xml->createElement ( 'seance' );
		$seancef->appendChild ( $datef );
		$seancef->appendChild ( $heureDebutf );
		$seancef->appendChild ( $nbplacesf );
		$seancesf->appendChild ( $seancef );
	}
	
	$photof = $xml->createElement ( 'photo', $img );
	$idfilm = idFilm ( $idCinema );
	
	$film = $xml->createElement ( 'film' );
	$film->setAttribute ( 'id', $idCinema . 'idfilm' . $idfilm );
	$listefilms = $xpath->query ( '//cinemas/cinema[@id="' . $idCinema . '"]/films' )->item ( 0 );
	$listefilms->appendChild ( $film );
	
	$film->appendChild ( $titref );
	$film->appendChild ( $realisateurf );
	$film->appendChild ( $genref );
	$film->appendChild ( $acteursf );
	$film->appendChild ( $notef );
	$film->appendChild ( $dureef );
	$film->appendChild ( $photof );
	$film->appendChild ( $date_sortief );
	$film->appendChild ( $seancesf );
	
	$xml->save ( "../../xml/gestion.xml" );
}
?>
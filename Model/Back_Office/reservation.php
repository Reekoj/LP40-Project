<?php
function idReservation() {
	$xml = new DomDocument ();
	$xml->load ( '../../xml/gestion.xml' );
	$xpath = new DOMXPath ( $xml );
	$liste = $xpath->query ( '//reservations/reservation' );
	$cpt = 1;
	foreach ( $liste as $reservation ) {
		$cpt ++;
	}
	return $cpt;
}
function TouteReservation() {
	$xml = new DomDocument ();
	$xml->load ( "../../xml/gestion.xml" );
	$liste_reservation = $xml->getElementsByTagName ( "reservation" );
	return $liste_reservation;
}
function reserverFilm($idclient, $idcinema, $idfilm, $datedef, $heure) {
	$xml = new DomDocument ();
	$xml->preserveWhiteSpace = true;
	$xml->load ( '../../xml/gestion.xml' );
	$xpath = new DOMXPath ( $xml );
	
	$counter = 0;
	$bool = false;
	
	$liste = $xpath->query ( '//reservations/reservation' );
	$liste_nbreplaces = $xpath->query ( '//cinemas/cinema[@id="' . $idcinema . '"]/films/film[@id="' . $idfilm . '"]/seances/seance[date="' . $datedef . '"][heureDebut="' . $heure . '"]/..' );
	if($liste_nbreplaces!=null){
	$nbreplaces = $liste_nbreplaces [0]->getElementsByTagName ( "nbplaces" )->item ( 0 )->nodeValue;
	foreach ( $liste as $reserva ) {
		if (($reserva->getElementsByTagName ( "id_cinema" )->item ( 0 )->nodeValue == $idcinema) and ($reserva->getElementsByTagName ( "id_film" )->item ( 0 )->nodeValue == $idfilm) and ($reserva->getElementsByTagName ( "date_diffusion" )->item ( 0 )->nodeValue == $datedef) and ($reserva->getElementsByTagName ( "heure" )->item ( 0 )->nodeValue == $heure)) {
			$counter ++;
		}
	}
	
	if ($counter < $nbreplaces) {
		
		$bool = true;
		
		$idclientr = $xml->createElement ( 'id_client', $idclient );
		$idcinemar = $xml->createElement ( 'id_cinema', $idcinema );
		$idfilmr = $xml->createElement ( 'id_film', $idfilm );
		$datedefr = $xml->createElement ( 'date_diffusion', $datedef );
		$heurer = $xml->createElement ( 'heure', $heure );
		
		$idreservation = idReservation ();
		
		$reserv = $xml->createElement ( 'reservation' );
		$reserv->setAttribute ( 'id', 'idreservation'.$idreservation );
		$liste_reserv = $xpath->query ( '//reservations' )->item ( 0 );
		$liste_reserv->appendChild ( $reserv );
		
		$reserv->appendChild ( $idclientr );
		$reserv->appendChild ( $idcinemar );
		$reserv->appendChild ( $idfilmr );
		$reserv->appendChild ( $datedefr );
		$reserv->appendChild ( $heurer );
		
		$xml->save ( "../../xml/gestion.xml" );
	}
	}
	
	return $bool;
}

?>

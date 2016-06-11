<?php
require_once 'Model/Back_Office/toutesReservations.php';
$liste = TouteReservation();
$cpt = 0;
foreach ( $liste as $l ) {
	$li [$cpt] ['id_reservation'] = $l->getAttribute ( "id" );
	$li [$cpt] ['id_client'] = $l->getElementsByTagName ( "id_client" )->item ( 0 )->nodeValue;
	$li [$cpt] ['id_cinema'] = $l->getElementsByTagName ( "id_cinema" )->item ( 0 )->nodeValue;
	$li [$cpt] ['id_film'] = $l->getElementsByTagName ( "id_film" )->item ( 0 )->nodeValue;
	$li [$cpt] ['date_diffusion'] = $l->getElementsByTagName ( "date_diffusion" )->item ( 0 )->nodeValue;
	$li [$cpt] ['heure'] = $l->getElementsByTagName ( "heure" )->item ( 0 )->nodeValue;
	$cpt++;
}



require_once 'Vue/Back_Office/Admin/AfficherReservations.php';
?>

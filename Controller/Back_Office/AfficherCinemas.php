<?php
require_once 'Model/Back_Office/ajoutCinema.php';
$liste = cinema ();
$cpt = 0;
foreach ( $liste as $l ) {
	$li [$cpt] ['id_cinema'] = $l->getAttribute ( "id" );
	$li [$cpt] ['nom_cinema'] = $l->getElementsByTagName ( "nom_cinema" )->item ( 0 )->nodeValue;
	$li [$cpt] ['numero'] = $l->getElementsByTagName ( "adresse" ) [0]->getElementsByTagName ( 'numero' )->item ( 0 )->nodeValue;
	$li [$cpt] ['rue'] = $l->getElementsByTagName ( "adresse" ) [0]->getElementsByTagName ( 'rue' )->item ( 0 )->nodeValue;
	$li [$cpt] ['cp'] = $l->getElementsByTagName ( "adresse" ) [0]->getElementsByTagName ( 'cp' )->item ( 0 )->nodeValue;
	$li [$cpt] ['ville'] = $l->getElementsByTagName ( "adresse" ) [0]->getElementsByTagName ( 'ville' )->item ( 0 )->nodeValue;
	$li [$cpt] ['localisation'] = $l->getElementsByTagName ( "localisation" )->item ( 0 )->nodeValue;
	$li [$cpt] ['lat'] = $l->getElementsByTagName ( "latlng" ) [0]->getElementsByTagName ( 'lat' )->item ( 0 )->nodeValue;
	$li [$cpt] ['lng'] = $l->getElementsByTagName ( "latlng" ) [0]->getElementsByTagName ( 'lng' )->item ( 0 )->nodeValue;
	$li [$cpt] ['img_path'] = $l->getElementsByTagName ( "img_path" )->item ( 0 )->nodeValue;
	$cpt++;
}


require_once 'Vue/Back_Office/Admin/AfficherCinemas.php';
?>

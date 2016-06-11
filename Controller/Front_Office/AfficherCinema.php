<?php
require_once 'Model/Front_Office/AfficherCinema.php';
$id_cinema = (isset ( $_GET ["id_cinema"] )) ? $_GET ["id_cinema"] : "";
$liste = cinemaById ( $id_cinema );
$cpt = 0;
$li = [ ];
$exist=false;
foreach ( $liste as $l ) {
	$li [$cpt] ['id_cinema'] = $l->getAttribute ( "id" );
	if (($exist==false) and ($li [$cpt] ['id_cinema']!="")) $exist=true;
	$li [$cpt] ['nom_cinema'] = $l->getElementsByTagName ( "nom_cinema" )->item ( 0 )->nodeValue;
	$li [$cpt] ['numero'] = $l->getElementsByTagName ( "numero" )->item ( 0 )->nodeValue;
	$li [$cpt] ['rue'] = $l->getElementsByTagName ( "rue" )->item ( 0 )->nodeValue;
	$li [$cpt] ['cp'] = $l->getElementsByTagName ( "cp" )->item ( 0 )->nodeValue;
	$li [$cpt] ['ville'] = $l->getElementsByTagName ( "ville" )->item ( 0 )->nodeValue;
	$li [$cpt] ['localisation'] = $l->getElementsByTagName ( "localisation" )->item ( 0 )->nodeValue;
	$li [$cpt] ['img_path'] = $l->getElementsByTagName ( "img_path" )->item ( 0 )->nodeValue;
	$cpt ++;
}
if(!$exist) {
	echo "Veuillez vérifier le cinéma demandé";
	header('Refresh: 2;URL= index.php?section=acceuil');
}
else 
require_once 'Vue/Front_Office/AfficherCinema.php';
?>
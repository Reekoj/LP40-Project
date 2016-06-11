<?php
require_once 'Model/Back_Office/ajoutFilm.php';
$id_cinema = (isset ( $_GET ["id_cinema"] )) ? $_GET ["id_cinema"] : "";
$liste = film ( $id_cinema );
$cpt = 0;
foreach ( $liste as $l ) {
	$li [$cpt] ['id_film'] = $l->getAttribute ( "id" );
	$li [$cpt] ['titre'] = $l->getElementsByTagName ( "titre" )->item ( 0 )->nodeValue;
	$li [$cpt] ['realisateur'] = $l->getElementsByTagName ( "realisateur" )->item ( 0 )->nodeValue;
	$li [$cpt] ['genre'] = $l->getElementsByTagName ( "genre" )->item ( 0 )->nodeValue;
	
	$listeacteur = $l->getElementsByTagName ( "acteur" );
	$nbract = 0;
	$seperate = "";
	$li [$cpt] ['acteurs'] = "";
	foreach ( $listeacteur as $la ) {
		if ($nbract > 0) {
			$seperate = " - ";
		}
		$li [$cpt] ['acteurs'] .= $seperate . "" . $la->nodeValue;
		$nbract ++;
	}
	
	$listeseance = $l->getElementsByTagName ( "seance" );
	$nbract = 0;
	$seperate = "";
	$li [$cpt] ['seances'] = "";
	foreach ( $listeseance as $la ) {
		if ($nbract > 0) {
			$seperate = " - ";
		}
		$li [$cpt] ['seances'] .= $seperate . "" . "dates : " . $la->getElementsByTagName ( "date" )->item ( 0 )->nodeValue . " heure : " . $la->getElementsByTagName ( "heureDebut" )->item ( 0 )->nodeValue . " places : " . $la->getElementsByTagName ( "nbplaces" )->item ( 0 )->nodeValue;
		$nbract ++;
	}
	
	$li [$cpt] ['note'] = $l->getElementsByTagName ( "note" )->item ( 0 )->nodeValue;
	$li [$cpt] ['duree'] = $l->getElementsByTagName ( "duree" )->item ( 0 )->nodeValue;
	$li [$cpt] ['date_sortie'] = $l->getElementsByTagName ( "date_sortie" )->item ( 0 )->nodeValue;
	$li [$cpt] ['photo'] = $l->getElementsByTagName ( "photo" )->item ( 0 )->nodeValue;
	$cpt ++;
}
if (isset ( $_GET ["front"] )) {
	if ($_GET ["front"] == "y"){
		$li [0] ['id_cinema']=$id_cinema;
		require_once 'Vue/Front_Office/AfficherFilms.php';
	}
} else
	require_once 'Vue/Back_Office/Admin/AfficherFilms.php';
?>

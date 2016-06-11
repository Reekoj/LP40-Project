<?php
require_once 'Model/Front_Office/AfficherFilm.php';
$id_film = (isset ( $_GET ["id_film"] )) ? $_GET ["id_film"] : "";
$liste = filmById ( $id_film );
$cpt = 0;
$li = [ ];
$exist=false;
foreach ( $liste as $l ) {
	$li [$cpt] ['id_film'] = $l->getAttribute ( "id" );
	if (($exist==false) and ($li [$cpt] ['id_film']!="")) $exist=true;
	$li [$cpt] ['titre'] = $l->getElementsByTagName ( "titre" )->item ( 0 )->nodeValue;
	$li [$cpt] ['realisateur'] = $l->getElementsByTagName ( "realisateur" )->item ( 0 )->nodeValue;
	$li [$cpt] ['genre'] = $l->getElementsByTagName ( "genre" )->item ( 0 )->nodeValue;
	
	$listeacteur= $l->getElementsByTagName ( "acteur" );
	$nbract=0;
	$seperate="";
	$li [$cpt] ['acteurs']="";
	foreach ($listeacteur as $la){
		if ($nbract > 0){
		$seperate=" - ";}
		$li [$cpt] ['acteurs'].=$seperate."".$la->nodeValue;
		$nbract++;
	}
	
	$listeseance= $l->getElementsByTagName ( "seance" );
	$li [$cpt] ['seances']="";
	foreach ($listeseance as $la){

			$li [$cpt] ['seances'].="<br/>-<b>date</b> : ".$la->getElementsByTagName ( "date" )->item ( 0 )->nodeValue." <b>heure</b> : ".$la->getElementsByTagName ( "heureDebut" )->item ( 0 )->nodeValue." <b>places</b> : ".$la->getElementsByTagName ( "nbplaces" )->item ( 0 )->nodeValue."<br/>";
			$nbract++;
	}
	
	$li [$cpt] ['note'] = $l->getElementsByTagName ( "note" )->item ( 0 )->nodeValue;
	$li [$cpt] ['duree'] = $l->getElementsByTagName ( "duree" )->item ( 0 )->nodeValue;
	$li [$cpt] ['date_sortie'] = $l->getElementsByTagName ( "date_sortie" )->item ( 0 )->nodeValue;
	$li [$cpt] ['photo'] = $l->getElementsByTagName ( "photo" )->item ( 0 )->nodeValue;
	$cpt++;
}
$li [0] ['id_cinema']=(isset ($_GET ["id_cinema"])) ? $_GET ["id_cinema"] : "";
if(!$exist) {
	echo "Veuillez vérifier le film demandé";
	header('Refresh: 2;URL= index.php?section=acceuil');
}
else 
require_once 'Vue/Front_Office/AfficherFilm.php';
?>
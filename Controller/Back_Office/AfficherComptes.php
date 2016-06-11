<?php
require_once 'Model/Back_Office/Compte.php';
$liste = ToutCompte();
$cpt = 0;
foreach ( $liste as $l ) {
	$li [$cpt] ['id_compte'] = $l->getAttribute ( "id" );
	$li [$cpt] ['pseudo'] = $l->getElementsByTagName ( "pseudo" )->item ( 0 )->nodeValue;
	$li [$cpt] ['password'] = $l->getElementsByTagName ( "password" )->item ( 0 )->nodeValue;
	$li [$cpt] ['mail'] = $l->getElementsByTagName ( "mail" )->item ( 0 )->nodeValue;
	$li [$cpt] ['img'] = $l->getElementsByTagName ( "img" )->item ( 0 )->nodeValue;
	$cpt++;
}



require_once 'Vue/Back_Office/Admin/AfficherComptes.php';
?>

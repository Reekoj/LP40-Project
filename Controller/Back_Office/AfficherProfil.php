<?php
require_once 'Model/Back_Office/AfficherProfil.php';
if(session_id() == "") session_start();
$id_client = (isset ( $_SESSION['id'] )) ? $_SESSION['id'] : "";
$listeclient=infoClient($id_client);
$cpt=0;
$li [$cpt] ['cin']=$listeclient[0]->getElementsByTagName ( "cin" )->item ( 0 )->nodeValue;
$li [$cpt] ['nom']=$listeclient[0]->getElementsByTagName ( "nom" )->item ( 0 )->nodeValue;
$li [$cpt] ['prenom']=$listeclient[0]->getElementsByTagName ( "prenom" )->item ( 0 )->nodeValue;
$li [$cpt] ['adresse_complet']=$listeclient[0]->getElementsByTagName ( "adresse_complet" )->item ( 0 )->nodeValue;
$li [$cpt] ['mail']=$listeclient[0]->getElementsByTagName ( "mail" )->item ( 0 )->nodeValue;
$li [$cpt] ['sexe']=$listeclient[0]->getElementsByTagName ( "sexe" )->item ( 0 )->nodeValue;

$inforeservationclient = infoReservationClient($id_client);
foreach ($inforeservationclient as $inforeserv){
	$li [$cpt] ['id_reservation'] = $inforeserv->getAttribute ( "id" );
	$li [$cpt] ['date_diffusion'] = $inforeserv->getElementsByTagName ( "date_diffusion" )->item ( 0 )->nodeValue;
	$li [$cpt] ['heure'] = $inforeserv->getElementsByTagName ( "heure" )->item ( 0 )->nodeValue;
	$cpt++;
}

require_once 'Vue/Back_Office/Client/AfficherProfil.php';
?>
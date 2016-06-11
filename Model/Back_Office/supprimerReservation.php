<?php

function supprimerResrvation($idreservation){
$xml = new DomDocument ();
$xml->load ( 'xml/gestion.xml' );
$xpath = new DOMXPath ( $xml );

$reservations = $xpath->query ( '//reservations/reservation[@id="' . $idreservation . '"]' );
foreach ($reservations as $res){
$res->parentNode->removeChild($res);
}
$xml->save ( "xml/gestion.xml" );
}

?>
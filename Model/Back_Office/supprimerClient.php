<?php

function supprimerClient($idclient){
	$xml = new DomDocument ();
	$xml->load ( 'xml/gestion.xml' );
	$xpath = new DOMXPath ( $xml );
	
	$reservations = $xpath->query ( '//reservations/reservation[id_client="' . $idclient . '"]' );
	foreach ($reservations as $res){
		$res->parentNode->removeChild($res);
	}
	
	$compte = $xpath->query ( '//comptes/compte[@id="' . $idclient . '"]' );
	foreach ($compte as $cp){
		$targetimg = $cp->getElementsByTagName ( "img" )->item ( 0 )->nodeValue;
		if (file_exists ( $targetimg )) unlink($targetimg);
		$cp->parentNode->removeChild($cp);
	}
	
	$client = $xpath->query ( '//clients/client[@id="' . $idclient . '"]' );
	foreach ($client as $cl){
		$cl->parentNode->removeChild($cl);
	}
	$xml->save ( "xml/gestion.xml" );
}

?>
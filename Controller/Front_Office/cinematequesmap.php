<?php
require_once 'Model/Front_Office/cinematequesmap.php';
$liste=latlngcinemateques();
$positions=[];
$cpt=0;
foreach ($liste as $l) {
$positions[$cpt]=["lat"=>$l->getElementsByTagName("lat")->item(0)->nodeValue,"lng"=>$l->getElementsByTagName("lng")->item(0)->nodeValue];
$cpt++;
}
$liste=nomcinemateques();
$nomscinemas=[];
$cpt=0;
foreach ($liste as $l) {
	$nomscinemas[$cpt]=[$l->nodeValue];
	$cpt++;
}
$liste=imgcinemateques();
$imgscinemas=[];
$cpt=0;
foreach ($liste as $l) {
	$imgscinemas[$cpt]=[$l->nodeValue];
	$cpt++;
}
$liste=idcinemateques();
$idcinemas=[];
$cpt = 0;
foreach ( $liste as $l ) {
	$idcinemas [$cpt] = $l->getAttribute ( "id" );
	$cpt++;
}
require_once 'Vue/Front_Office/cinematequesmap.php';
?>
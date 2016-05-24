<?php
require_once 'Model/Front_Office/cinematequesmap.php';
$liste=latlngcinemateques();
$positions=[];
$cpt=0;
foreach ($liste as $l) {
$positions[$cpt]='{"lat":"'.$l->getElementsByTagName("lat")->item(0)->nodeValue.'","lng":"'.$l->getElementsByTagName("lng")->item(0)->nodeValue.'"}';
$cpt++;
echo $positions[$cpt-1];
}
require_once 'Vue/Front_Office/cinematequesmap.php';
?>
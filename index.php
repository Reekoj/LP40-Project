<?php
$section = (isset ( $_GET ["section"] )) ? $_GET ["section"] : "accueil";
switch ($section) {
	case "map" : include_once 'Controller/Front_Office/cinematequesmap.php';
		break;
	case "weather" : include_once 'require/weather.php';
		break;
	case "accueil" : include_once 'Controller/Front_Office/accueil.php';
		break;
	default : echo 'nine';
}
?>
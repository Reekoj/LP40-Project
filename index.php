<?php
$section = (isset ( $_GET ["section"] )) ? $_GET ["section"] : "acceuil";
switch ($section) {
	case "acceuil" : include_once 'Controller/Front_Office/cinematequesmap.php';
		break;
	case "acceuil111" : include_once 'Vue/Front_Office/cinematequesmap.php';
		break;
	default : echo 'nine';
}



?>
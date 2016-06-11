<?php
$section = (isset ( $_GET ["section"] )) ? $_GET ["section"] : "acceuil";
switch ($section) {
	case "acceuil" :
		include 'Vue/Front_Office/Acceuil.php';
		break;
	case "map" :
		include 'Controller/Front_Office/cinematequesmap.php';
		break;
	case "weather" :
		include_once 'require/weather.php';
		break;
	case "ajtcinema" :
		include_once 'Vue/Back_Office/Admin/ajoutCinema.php';
		break;
	case "ajtfilm" :
		include 'Vue/Back_Office/Admin/ajoutFilm.php';
		break;
	case "reserver" :
		include 'Controller/Back_Office/reservation.php';
		break;
	case "afficheC" :
		include 'Controller/Back_Office/AfficherCinemas.php';
		break;
	case "supprimeC" :
		include 'Controller/Back_Office/supprimerCinema.php';
		break;
	case "afficheF" :
		include 'Controller/Back_Office/AfficherFilms.php';
		break;
	case "supprimeF" :
		include 'Controller/Back_Office/supprimerFilm.php';
		break;
	case "afficheR" :
		include 'Controller/Back_Office/AfficherReservations.php';
		break;
	case "supprimeR" :
		include 'Controller/Back_Office/supprimerReservation.php';
		break;
	case "afficheCt" :
		include 'Controller/Back_Office/AfficherComptes.php';
		break;
	case "supprimeCt" :
		include 'Controller/Back_Office/supprimerClient.php';
		break;
	case "profil" :
		include 'Controller/Back_Office/AfficherProfil.php';
		break;
	case "infocin" :
		include 'Controller/Front_Office/AfficherCinema.php';
		break;
	case "infoflm" :
		include 'Controller/Front_Office/AfficherFilm.php';
		break;
	default :
		include 'Model/Back_Office/supprimerReservation.php';
}
?>
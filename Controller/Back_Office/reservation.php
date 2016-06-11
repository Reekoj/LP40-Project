<?php
require_once '../../Model/Back_Office/reservation.php';

if(session_id() == "")
	session_start();
	if ($_POST["id_cinema"]!="" and $_POST["id_film"]!="" and $_POST["date"]!="" and $_POST["heureDebut"]!="") {
         	$reponse=reserverFilm ( $_SESSION['id'], $_POST["id_cinema"], $_POST["id_film"], $_POST["date"], $_POST["heureDebut"] );
         	if ($reponse ==true) echo "Réservation effectuer avec succes.";
			else echo "Reservation impossible : Toutes les places sont reservées ou il n'y a pas de diffusion à la date choisie. Veuillez choisir une autre date ou un autre film.";}
	else echo "Un probléme temporaire. Veuillez essayer de nouveau.";
			header("Refresh:5;URL= ../../index.php");
        /*$xml = new DomDocument();
        $xml->preserveWhiteSpace = true;
        $xml->load('xml/gestion.xml');
        $xpath = new DOMXPath($xml);
        
        $idcinema="idcinema1";
        $idfilm="idcinema1idfilm1";
        $datedef="30/05/2016";
        $heure="14";
        $nbreplaces = $xpath->query ( '//cinemas/cinema[@id="' . $idcinema . '"]/films/film[@id="'.$idfilm.'"]/seances/seance[date="'.$datedef.'"][heureDebut="'.$heure.'"]/..' );
       
        echo $nbreplaces[0]->getElementsByTagName("nbplaces")->item(0)->nodeValue;*/
?>
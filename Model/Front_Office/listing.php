<?php
function getCinemas() {
	$xml = new DomDocument ();
	$xml->load ( 'xml/gestion.xml' );
	$liste = $xml->getElementsByTagName ( "cinema" );
	
	$liste_cinemas = array();
	$i = 0;
	foreach($liste as $cinema){
		// Je n'ai pas trouvé comment récupérer la valeur de l'attribut id, donc en attendant j'ai rajouté une balise <id>
		// mais il faudra changer ça
		$liste_cinemas[$i]["id"] = $cinema->getElementsByTagName("id")->item(0)->nodeValue;
		$liste_cinemas[$i]["nom_cinema"] =  $cinema->getElementsByTagName("nom_cinema")->item(0)->nodeValue;
		$i++;
	}
	//var_dump($liste_cinemas);
	return $liste_cinemas;
}
function getFilms($id) {
	$xml = new DomDocument ();
	$xml->load ( '../../xml/gestion.xml' );
	
	$liste = $xml->getElementsByTagName ( "cinema" );
	
	$liste_cinemas = array();
	$i = 0;
	$list_films = array();
	foreach($liste as $cinema){
		if(($cinema->getElementsByTagName("id")->item(0)->nodeValue) == $id) {
			$films = $cinema->getElementsByTagName("film");
			foreach ($films as $film) {
				$list_films[$i]["titre"] = $film->getElementsByTagName("titre")->item(0)->nodeValue;
				$list_films[$i]["realisateur"] =  $film->getElementsByTagName("realisateur")->item(0)->nodeValue;
				$list_films[$i]["acteurs"] =  $film->getElementsByTagName("acteurs")->item(0)->nodeValue;
				$list_films[$i]["note"] =  $film->getElementsByTagName("note")->item(0)->nodeValue;
				$list_films[$i]["duree"] =  $film->getElementsByTagName("duree")->item(0)->nodeValue;
				$list_films[$i]["photo"] =  $film->getElementsByTagName("photo")->item(0)->nodeValue;
				$i++;
			}
		}
	}
	
	return $list_films;
}
?>
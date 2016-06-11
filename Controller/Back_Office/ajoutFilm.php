<?php
require_once '../../Model/Back_Office/ajoutFilm.php';
$target_dir = "../../img/films/";
$target_file = $target_dir . "film_" . basename ( $_FILES ["image"] ["name"] );
$uploadOk = 1;
$imageFileType = pathinfo ( $target_file, PATHINFO_EXTENSION );

// Check if image file is a actual image or fake image
if (isset ( $_POST ["submit"] )) {
	$check = getimagesize ( $_FILES ["image"] ["tmp_name"] );
	if ($check !== false) {
		// echo "File is an image - " . $check["mime"] . ".";
		$uploadOk = 1;
	} else {
		echo "Le fichier n'est pas une image.";
		$uploadOk = 0;
	}
}
// Check if file already exists
if (file_exists ( $target_file )) {
	echo "Cette image existe déjà.";
	$uploadOk = 0;
	// header ( "Refresh:6;URL= ../../index.php" );
}
// Check file size
if ($_FILES ["image"] ["size"] > 500000000000000) {
	echo "La taille de l'image est trop grande , veuillez choisir une moins volumineuse.";
	$uploadOk = 0;
	// header ( "Refresh:6;URL= ../../index.php" );
}
if ($imageFileType != ("JPG" || "jpg") && $imageFileType != ("png" || "PNG") && $imageFileType != ("jpeg" || 'JPEG') && $imageFileType != ("gif" || "GIF")) {
	echo "Seulement JPG, JPEG, PNG & GIF sont acceptées.";
	$uploadOk = 0;
}
if ($uploadOk == 0) {
	echo "Votre images n'est pas téléchargée et l'ajout n'est pas effectué";
	// header ( "Refresh:6;URL= ../../index.php" );
} else {
	if (move_uploaded_file ( $_FILES ["image"] ["tmp_name"], $target_file )) {
		
		$dest = "img/films/";
		$ancien_nom = $_FILES ['image'] ['tmp_name'];
		$new_nom = $_FILES ['image'] ['name'];
		$new_nom = "film_" . stripslashes ( $new_nom );
		$destfinale = $dest . $new_nom;
		move_uploaded_file ( $ancien_nom, $destfinale );
		$img = $destfinale;
		
		$titre = $_POST ['titre'];
		$realisateur = $_POST ['realisateur'];
		$genre = $_POST ['genre'];
		$note = $_POST ['note'];
		$duree = $_POST ['duree'];
		$date_sortie = $_POST ['date_sortie'];
		
		$tabacteurs = [ ];
		$tabacteurs [] = $_POST ['acteur'];
		for($cpt = 2; $cpt <= intval ( $_POST ['nbreacteurs'] ); $cpt ++) {
			$tabacteurs [] = $_POST ['acteur' . $cpt . ''];
		}
		
		$tabdates = [ ];
		$tabdates [] = $_POST ['date'];
		for($cpt = 2; $cpt <= intval ( $_POST ['nbreseances'] ); $cpt ++) {
			$tabdates [] = $_POST ['date' . $cpt . ''];
		}
		
		$tabheureDebuts = [ ];
		$tabheureDebuts [] = $_POST ['heureDebut'];
		for($cpt = 2; $cpt <= intval ( $_POST ['nbreseances'] ); $cpt ++) {
			$tabheureDebuts [] = $_POST ['heureDebut' . $cpt . ''];
		}
		
		$tabnbplaces = [ ];
		$tabnbplaces [] = $_POST ['nbplaces'];
		for($cpt = 2; $cpt <= intval ( $_POST ['nbreseances'] ); $cpt ++) {
			$tabnbplaces [] = $_POST ['nbplaces' . $cpt . ''];
		}
		$id_cinema = (isset ( $_POST ["id_cinema"] )) ? $_POST ["id_cinema"] : "";
		ajouterFilm ( $id_cinema, $titre, $realisateur, $genre, $note, $duree, $tabacteurs, $tabdates, $tabheureDebuts, $tabnbplaces, $img, $date_sortie );
		echo "Hamdoullah Sucés d'ajout du film";
		header ( "Refresh:5;URL= ../../index.php" );
	} else {
		echo "Une erreur est prevenue lors du téléchargement de votre image.";
		 header ( "Refresh:5;URL= ../../index.php" );
	}
}
?>
<?php
require_once '../../Model/Back_Office/ajoutCinema.php';
$target_dir = "../../img/cinemas/";
$target_file = $target_dir . "cinema_" . basename ( $_FILES ["image"] ["name"] );
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
	//header ( "Refresh:6;URL= ../../index.php" );
}
// Check file size
if ($_FILES ["image"] ["size"] > 500000000000000) {
	echo "La taille de l'image est trop grande , veuillez choisir une moins volumineuse.";
	$uploadOk = 0;
	//header ( "Refresh:6;URL= ../../index.php" );
}
if ($imageFileType != ("JPG" || "jpg") && $imageFileType != ("png" || "PNG") && $imageFileType != ("jpeg" || 'JPEG') && $imageFileType != ("gif" || "GIF")) {
	echo "Seulement JPG, JPEG, PNG & GIF sont acceptées.";
	$uploadOk = 0;
}
if ($uploadOk == 0) {
	echo "Votre image n'est pas téléchargée et l'ajout n'est pas effectué";
	//header ( "Refresh:6;URL= ../../index.php" );
} else {
	if (move_uploaded_file ( $_FILES ["image"] ["tmp_name"], $target_file )) {
		
		$dest = "img/cinemas/";
		$ancien_nom = $_FILES ['image'] ['tmp_name'];
		$new_nom = $_FILES ['image'] ['name'];
		$new_nom = "cinema_" . stripslashes ( $new_nom );
		$destfinale = $dest . $new_nom;
		move_uploaded_file ( $ancien_nom, $destfinale );
		$img = $destfinale;
		
		$nom = $_POST ['nom'];
		$numero = $_POST ['numero'];
		$rue = $_POST ['rue'];
		$cp = $_POST ['cp'];
		$ville = $_POST ['ville'];
		$localisation = $_POST ['localisation'];
		$lat = $_POST ['lat'];
		$lng = $_POST ['lng'];
		
		ajouterCinema ( $nom, $numero, $rue, $cp, $ville, $localisation, $lat, $lng, $img );
		echo "Succés d'ajout";
		header ( "Refresh:5;URL= ../../index.php" );
	} else {
		echo "Une erreur est prevenue lors du téléchargement de votre image.";
		header ( "Refresh:5;URL= ../../index.php" );
	}
}
?>
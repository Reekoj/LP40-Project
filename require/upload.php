<?php

$target_dir = "../img/comptes/";
$target_file = $target_dir ."client_". basename($_FILES["fichier"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fichier"]["tmp_name"]);
    if($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "Le fichier n'est pas une image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Cette image existe déjà.";
    $uploadOk = 0;
    //header("Refresh:6;URL= ../../index.php");
}
else
    if($imageFileType != ("JPG" || "jpg") && $imageFileType != ("png" || "PNG" ) && $imageFileType !=( "jpeg" || 'JPEG')&& $imageFileType != ("gif" || "GIF") ) {
    echo "Seulement JPG, JPEG, PNG & GIF sont acceptées.";
    $uploadOk = 0;
}else
if ($_FILES["fichier"]["size"] > 500000000000000) {
    echo "La taille de l'image est trop grande , veuillez choisir une moins volumineuse.";
    $uploadOk = 0;
  //  header("Refresh:6;URL= ../../index.php");
}



if ($uploadOk == 0) {
    echo "Votre images n'est pas téléchargée et l'inscription n'est pas effectuée";
//header("Refresh:6;URL= ../../index.php");
} else{
    if (move_uploaded_file($_FILES["fichier"]["tmp_name"], $target_file)) {
        $dest="img/comptes/"; 

    $ancien_nom=$_FILES['fichier']['tmp_name'];

    $new_nom=$_FILES['fichier']['name'];

    $new_nom="Client_".stripslashes($new_nom); 

    $destfinale=$dest.$new_nom;

    move_uploaded_file($ancien_nom,$destfinale); 

    $image=$destfinale;
	$cin=$_POST["cin"];
    $nom=$_POST["nom"];
    $prenom=$_POST["prenom"];
    $pseudo=$_POST["pseudo"];
    $motdepasse=$_POST["password"];
    $email=$_POST["email"];
    $adresse=$_POST["adresse"];
    $sexe=$_POST["sexe"];


//header("Refresh:1;URL= ../../index.php");

}else {
        echo "Une erreur est prevenue lors du téléchargement de votre image.";
       // header("Refresh:6;URL= ../../index.php");

    }
}

?>
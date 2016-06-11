<?php

require_once 'Model/Back_Office/supprimerFilm.php';
$idfilm = (isset($_GET ['id_film'])) ? $_GET ['id_film'] : "";
supprimerFilm($idfilm);
if (isset($_GET ['id_cinema'])) {if ($_GET ['id_cinema']!="") header('Location: index.php?section=afficheF&&id_cinema='.$_GET ["id_cinema"]);}
else header('Location: index.php');

?>
<?php

require_once 'Model/Back_Office/supprimerCinema.php';
$idcinema = (isset($_GET ['id_cinema'])) ? $_GET ['id_cinema'] : "";
supprimerCinema($idcinema);
header('Location: index.php?section=afficheC');

?>
<?php

require_once 'Model/Back_Office/supprimerReservation.php';
$idreservation = (isset($_GET ['id_reservation'])) ? $_GET ['id_reservation'] : "";
supprimerResrvation($idreservation);
if (isset($_GET ['Front'])) header('Location: index.php?section=profil');
else header('Location: index.php?section=afficheR');

?>
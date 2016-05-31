<?php
	require_once '../../Model/Front_Office/listing.php';
	$id = $_GET["idCine"];
	$films = getFilms($id);
	require_once '../../Vue/Front_Office/listingFilms.php';
?>
<?php
require_once 'Model/Back_Office/supprimerClient.php';
$idclient = (isset ( $_GET ['id_client'] )) ? $_GET ['id_client'] : "";
supprimerClient ( $idclient );
if (isset ( $_GET ['Front'] )) {
	if ($_GET ['Front'] == "y") {
		echo "Désincription est faite à bientôt.";
		require_once 'Model/Back_Office/Connection.php';
		deconnecter();
	}
	header ( "Refresh:2;URL= index.php" );
}
else header ( 'Location: index.php?section=afficheCt' );

?>
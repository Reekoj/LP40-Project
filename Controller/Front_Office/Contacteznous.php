<?php
if (session_id () == "")
	session_start ();
$message = "";
$mail = "khalilhomri@gmail.com";
if ($_POST ['email'] != "" and $_POST ['Nom'] != "" and $_POST ['contenu'] != "") {

	$email = $_POST ['email'];
	
	if (filter_var ( $email, FILTER_VALIDATE_EMAIL )) {
		if (! preg_match ( "#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail )) {
			$passage_ligne = "\r\n";
		} else {
			$passage_ligne = "\n";
		}
		
		// ==========
		
		// =====Création de la boundary
		$boundary = "-----=" . md5 ( rand () );
		// ==========
		
		// =====Définition du sujet.
		$sujet = "Contacter-Site-cenimatheque";
		$Nom = $_POST ['Nom'];
		// =========
		$From = "From: " . $email;
		$message_txt = $From . $passage_ligne . $Nom . $passage_ligne . "Identifiant : " . $email . $passage_ligne . "Message :  " . $passage_ligne . $_POST ['contenu'] . $passage_ligne;
		// =====Création du header de l'e-mail.
		$header = "From: \"From\"" . $email . $passage_ligne;
		$header .= "MIME-Version: 1.0" . $passage_ligne;
		$header .= "Content-Type: multipart/alternative;" . $passage_ligne . " boundary=\"$boundary\"" . $passage_ligne;
		$header .= "MIME-Version: 1.0" . $passage_ligne;
		$header .= "Content-Type: multipart/alternative;" . $passage_ligne . " boundary=\"$boundary\"" . $passage_ligne;
		// ==========
		// =====Envoi de l'e-mail.
		$message .= $passage_ligne . $message_txt . $passage_ligne;
		$message .= $passage_ligne . "--" . $boundary . "--" . $passage_ligne;
		
		$succes = mail ( $mail, $sujet, $message, $header );
		// ==========
		if (! ($succes)) {
			echo "Erreur lors de l'envoi du message veuillez réessayer...";
			print_r(error_get_last());
			//header ( "Refresh: 2;URL=../../Index.php" );
		} else {
			echo "Votre message est envoyé avec succes ...";
			header ( "Refresh: 2;URL=../../index.php" );
		}
	} else {
		echo "Entrez un e-mail valide";
		header ( "Refresh: 2;URL=../../index.php" );
	}
} else {
	echo "Remplisez tous les champs dans le formulaire et Merci....";
	header ( "Refresh: 2;URL=../../index.php" );
}
?>

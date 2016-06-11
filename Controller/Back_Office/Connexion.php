<?php
	require_once '../../Model/Back_Office/Connection.php';
	if(empty($_POST['pseudo']) or empty($_POST['password'])){
		header('Refresh: 2;URL=../../index.php?section=acceuil');
	}else{
		$pseudo=$_POST['pseudo'];
		$password=$_POST['password'];
		$find=connecter($pseudo,$password);
		if($find ==false){
			/*------------------- Instead of redirection a pop up to say the info entred was false please retry--------------------------*/
			echo "Veuillez vérifier votre pseudo et votre mot de passe";
		 	header('Refresh: 2;URL= ../../index.php?section=acceuil');
		 	
		}else{
			/******************* redirection***********/
			echo "Veuillez";
			header('Location: ../../index.php?section=acceuil');
		}
	}
?>
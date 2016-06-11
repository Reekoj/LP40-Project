<?php
//interdiction d'acces redirection
function connecter($pseudo,$password){
	$i=0;
	$find=false;
	$xml = new DomDocument;
	$xml->load("../../xml/gestion.xml");
	$compte=$xml-> getElementsByTagName("compte");
	 foreach($compte as $c){
		$liste_pseudo=$c->getElementsByTagName("pseudo")->item(0);
		if($pseudo==$liste_pseudo->nodeValue ){
			$password=$c->getElementsByTagName("password")->item(0);
				if($mp==$mdp->nodeValue){
						session_start();
						$_SESSION['id'] = $c->attributes->getNamedItem('id')->nodeValue;;
						$_SESSION['logincnx'] = $pseudo;
						$_SESSION['email'] = $c->getElementsByTagName("mail")->item(0)->nodeValue;
						$_SESSION['pic'] = $c->getElementsByTagName("img")->item(0)->nodeValue;
						$_SESSION["active"] = 1;
				/*************** ouverture session ****************************/
						//echo "cnx réussite";
						$find=true;
						return $find;
						}
				else
					//echo "mp faux";
						$find=false;
		
			}
		}
return $find;
}
function deconnecter(){
	// On appelle la session
	session_start();
	// On écrase le tableau de session
	$_SESSION = array();
	// On détruit la session
	session_destroy();
}
?>
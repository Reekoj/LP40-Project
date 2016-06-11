<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="css/style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="css/slider.css" />
<link rel="stylesheet" href="css/gallerie.css" />
<title>Cinema</title>
</head>
<body class="centrage">
		<?php 
		if(session_id() == "")
			session_start();
		require 'require/menu.php';?>
	
		
		<div id="cheader1">
		<div id="corpss">

		<img class ="affich-imgcinema" src="<?php print_r($li [0] ['img_path']); ?>"/> 
	
	    <div>

		  <img class ="carte-cinema" src="https://maps.googleapis.com/maps/api/staticmap?center=<?php print_r($li [0] ['localisation']); ?> "/> 
	   
	    </div>
		<div class="affiche-det-cinema">                    
		<p><span class="active"> <b>Nom</b></span>: <?php print_r( $li [0] ['nom_cinema'] ); ?></p>
		<p><span class="active"> <b>Adresse</b></span>: </p>
		</div>
		<div class="affiche-det-cinema">  
	    <p><span class="active"> <b>Numero</b></span>: <?php print_r($li [0] ['numero']  ); ?></p>
	    <p><span class="active"> <b>Rue</b></span>: <?php print_r( $li [0] ['rue'] ); ?></p>
	    </div>
	    <div class="affiche-det-cinema">  
	    <p><span class="active"> <b>Code postal</b></span>: <?php print_r( $li [0] ['cp'] ); ?></p>
	    <p><span  class="active"> <b>Ville</b></span>: <?php print_r( $li [0] ['ville'] ); ?></p>	       
        </div>
         <div class="affiche-det-cinema"> 
         <input class ="btn" type="button" name="lienfilms" value="Voir les films" onclick="self.location.href='index.php?section=afficheF&&front=y&&id_cinema=<?php print_r($li[0]['id_cinema']);?>'" > 
		</div>
    </div>
	</div>	
		
		
		
		
		<?php require 'require/footer.php';?>
		
		<script type="text/javascript" src="js/slider.js"></script>
</body>
</html>
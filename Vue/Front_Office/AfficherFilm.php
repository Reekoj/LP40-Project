<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="css/style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="css/gallerie.css" />
<title>Cinema</title>
</head>
<body class="centrage">
		<?php 
		if(session_id() == "")
			session_start();
		require 'require/menu.php';
		$testadmin=true;
		$testcnx=false;
		if (isset ( $_SESSION ["active"] )) {
			if ($_SESSION["active"]==1){
			$testcnx=true;
			if ($_SESSION ['logincnx'] != "Admin") $testadmin=false;
			}
		}	
		?>
	
		<div id="cheader1">
		<div id="corpss">

		<img class ="affich-imgfilm" src="<?php print_r($li[0]['photo']);?>"/> 
	
	    <div class="affich-det-film">
         
                                    <p><span class="active"> <b>titre</b></span>:<?php print_r($li[0]['titre']);?></p>
                                    <p><span class="active"> <b>realisateur</b></span>:<?php print_r($li[0]['realisateur']);?></p>
                                    <p><span class="active"> <b>genre</b></span>:<?php print_r($li[0]['genre']);?></p>
                                    <p><span class="active"> <b>acteurs</b></span>:<?php print_r($li[0]['acteurs']);?></p>
                                    <p><span class="active"> <b>seances</b></span>:<?php print_r($li[0]['seances']);?></p>
                                    <p><span class="active"> <b>note</b></span>:<?php print_r($li[0]['note']);?></p>
                                    <p><span class="active"> <b>duree</b></span>:<?php print_r($li[0]['duree']);?></p>
                                    <p><span class="active"> <b>date_sortie</b></span>:<?php print_r($li[0]['date_sortie']);?></p>



                             <?php 
                             if(($testcnx==true) and ($testadmin==false)){ ?>
		  							<a <?php print_r('onclick="cal()"'); ?>>
						          	<button id="btnreserver" class="btn" type="button">Réserver</button>
						        </a>
		  							
		  							<div id="overlayboxd" name="7" class="obox">
                    <a  onclick="popunderd()" style="position:absolute; width:100%; height:100%"></a>
                </div>
                <div id="date" name="8" class="popup" >
                    <form method="POST" action="Controller/Back_Office/reservation.php" >
                        
                    	<ul class="form-style-1">
                            <li>Date : <input type="text"  name="date"></li>
                            <li>heure : <input type="text" name="heureDebut"></li>
                            <li><input type="text" name="id_film" value="<?php print_r($li[0]['id_film']);?>"  style="visibility: hidden;"/></li>
                            <li><input type="text" name="id_cinema" value="<?php print_r($li[0]['id_cinema']);?>"  style="visibility: hidden;"/></li>
                            <li>  <input class="btn" type="submit" value="Valider" /></li>  

                               
                        </ul>
                    </form>
                </div>
                <?php } elseif($testcnx==false){?>
                <p><span class="reservealarm">S'inscrire ou se connecter pour pouvoir réserver un film</span></p>
                <?php } ?>
                
		  							
		  							
		  							
	   
	    </div>
		
		</div></div>
		<?php require 'require/footer.php';?>
		
</body>
</html>
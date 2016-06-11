<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="css/style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="css/slider.css" />
<link rel="stylesheet" href="css/gallerie.css" />
<title>Reservations</title>
</head>
<body class="centrage">
		<?php 
		if(session_id() == "")
			session_start();
		require 'require/menu.php';?>
	
        <div id="cheader1">
            <div id='corpss'>
                   <div>
                   <h1>Vos Données Personnelles</h1>
                   <?php 
			print_r('<span class="infocli"><b>CIN</b></span> : '.$li [0] ['cin'].'<br/><span class="infocli"><b>NOM</b></span> : '.$li [0] ['nom'].'<br/><span class="infocli"><b>PRENOM</b></span> : '.$li [0] ['prenom'].'<br/><span class="infocli"><b>ADRESSE</b></span> : '.$li [0] ['adresse_complet'].'<br/><span class="infocli"><b>EMAIL</b></span> : '.$li [0] ['mail'].'<br/><span class="infocli"><b>SEXE</b></span> : '.$li [0] ['sexe']);
?>
                   </div>
                   <div>
                   <input class ="btnd reservealarm" type="button" name="supprimerct" value="Se désinscrire" onclick="self.location.href='index.php?section=supprimeCt&&Front=y&&id_client=<?php print_r($_SESSION['id']);?>'" >
                   </div>
                <div class="t">
                <?php  $i=0;
                       foreach ($inforeservationclient as $inforeserv){
                       if ($i==0 ) {?>
                <h1>Horaires de toutes vos réservations</h1>
                            <table class="tablev">
                                 <thead>
                                <tr>
                                    <th>Date Diffusion</th>
                                    <th>Heure</th>
                                    <th>Annuler</th>
                                </tr>
                            <tbody>
                                    <?php } ?>
                                    
                                <tr>
                                    <td><?php print_r($li[$i]['date_diffusion']);?></td>
                                    <td><?php print_r($li[$i]['heure']);?></td>
                                    <td><input class ="btn" type="button" name="supprimerp" value="Annuler reservation" onclick="self.location.href='index.php?section=supprimeR&&Front=y&&id_reservation=<?php print_r($li[$i]['id_reservation']);?>'" ></td>
                                </tr>
                                                          
                                     <?php 
                                       $i++; 
                                        }
                                    ?> 
                            </tbody> 
                        </table>
                </div>
            </div>  
        </div>
        <?php require 'require/footer.php';?>
    </body>
</html>

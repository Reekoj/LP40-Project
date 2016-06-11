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

                <div class="t">
                            <table class="tablev">
                                 <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>ID Client</th>
                                    <th>ID Cinema</th>
                                    <th>ID Film</th>
                                    <th>Date Diffusion</th>
                                    <th>Heure</th>
                                    <th>Supprimer</th>
                                </tr>
                            <tbody>
                                    <?php 
                        
                                        $i=0;
                                        foreach($liste as $l){
                                     ?>
                                    
                                <tr>
                                    <td><?php print_r($li[$i]['id_reservation']);?></td>
                                    <td><?php print_r($li[$i]['id_client']);?></td>
                                    <td><?php print_r($li[$i]['id_cinema']);?></td>
                                    <td><?php print_r($li[$i]['id_film']);?></td>
                                    <td><?php print_r($li[$i]['date_diffusion']);?></td>
                                    <td><?php print_r($li[$i]['heure']);?></td>
                                    <td><input class ="btn" type="button" name="supprimera" value="Annuler reservation" onclick="self.location.href='index.php?section=supprimeR&&id_reservation=<?php print_r($li[$i]['id_reservation']);?>'" ></td>
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
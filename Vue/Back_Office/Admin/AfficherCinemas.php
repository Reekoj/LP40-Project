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
            <div id='corpss'>
                <div class="middle">
                    <div class="button" data-original-title="Ajouter">
                        <a href="index.php?section=ajtcinema">
                            <span class="ajt"></span>
                            <span class="text">Ajouter<br></span>                     
                        </a>                    

                    </div> 
                </div>           

                <div class="t">
                            <table class="tablev">
                                 <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nom</th>
                                    <th>Numero</th>
                                    <th>Rue</th>
                                    <th>Code postal</th>
                                    <th>Ville</th>
                                    <th>Lattitude</th>
                                    <th>Longitude</th>
                                    <th>Image</th>
                                    <th>Supprimer</th>
                                </tr>
                                </thead>
                            <tbody>
                                    <?php 
                        
                                        $i=0;
                                        foreach($liste as $l){
                                     ?>
                                    
                                <tr>
                                    <td><a href="index.php?section=afficheF&&id_cinema=<?php print_r($li[$i]['id_cinema']);?>"><?php print_r($li[$i]['id_cinema']);?></a></td>
                                    <td><?php print_r($li[$i]['nom_cinema']);?></td>
                                    <td><?php print_r($li[$i]['numero']);?></td>
                                    <td><?php print_r($li[$i]['rue']);?></td>
                                    <td><?php print_r($li[$i]['cp']);?></td>
                                    <td><?php print_r($li[$i]['ville']);?></td>
                                  
                                    <td><?php print_r($li[$i]['lat']);?></td>
                                    <td><?php print_r($li[$i]['lng']);?></td>
                                    <td><img class="imgv3" src="<?php print_r($li[$i]['img_path']);?>"/></td>
                                    <td><input class ="btn" type="button" name="supprimercn" value="Supprimer" onclick="self.location.href='index.php?section=supprimeC&&id_cinema=<?php print_r($li[$i]['id_cinema']);?>'" ></td>
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
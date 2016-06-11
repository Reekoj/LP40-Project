<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="css/style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="css/slider.css" />
<link rel="stylesheet" href="css/gallerie.css" />
<title>Acceuil</title>
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
                                    <th>Pseudo</th>
                                    <th>Mot de passe</th>
                                    <th>email</th>
                                    <th>Image</th>
                                    <th>Supprimer</th>
                                </tr>
                            <tbody>
                                    <?php 
                        
                                        $i=0;
                                        foreach($liste as $l){
                                     ?>
                                    
                                <tr>
                                    <td><?php print_r($li[$i]['id_compte']);?></td>
                                    <td><?php print_r($li[$i]['pseudo']);?></td>
                                    <td><?php print_r($li[$i]['password']);?></td>
                                    <td><?php print_r($li[$i]['mail']);?></td>
                                    <td><img class="imgv3 imgct" src="<?php print_r($li[$i]['img']);?>"/></td>
                                    <td><input class ="btn" type="button" name="supprimerct" value="Supprimer client" onclick="self.location.href='index.php?section=supprimeCt&&id_client=<?php print_r($li[$i]['id_compte']);?>'" ></td>
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
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
	
		<?php $id_cinema = (isset ( $_GET ["id_cinema"] )) ? $_GET ["id_cinema"] : "";
		if(session_id() == "")
			session_start();
		require 'require/menu.php';?>
        
        <div id="cheader1">
            <div id='corpss'>
                <div class="middle">
                    <div class="button" data-original-title="Ajouter">
                        <a href="index.php?section=ajtfilm&&id_cinema=<?php print_r($id_cinema); ?>">
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
                                    <th>Titre</th>
                                    <th>Realisateur</th>
                                    <th>Genre</th>
                                    <th>Acteurs</th>
                                    <th>Seances</th>
                                    <th>Note</th>
                                    <th>Duree</th>
                                    <th>Date de sortie</th>
                                    <th>Image</th>
                                    <th>Supprimer</th>
                                </tr>
                            <tbody>
                                    <?php 
                                        $i=0;
                                        foreach($liste as $l){
                                     ?>
                                    
                                <tr>
                                    <td><?php print_r($li[$i]['id_film']);?></td>
                                    <td><?php print_r($li[$i]['titre']);?></td>
                                    <td><?php print_r($li[$i]['realisateur']);?></td>
                                    <td><?php print_r($li[$i]['genre']);?></td>
                                    <td><?php print_r($li[$i]['acteurs']);?></td>
                                    <td><?php print_r($li[$i]['seances']);?></td>
                                    <td><?php print_r($li[$i]['note']);?></td>
                                    <td><?php print_r($li[$i]['duree']);?></td>
                                    <td><?php print_r($li[$i]['date_sortie']);?></td>
                                    <td><img class="imgv3" src="<?php print_r($li[$i]['photo']);?>"/></td>
                                    <td><input class ="btn" type="button" name="supprimerf" value="Supprimer film" onclick="self.location.href='index.php?section=supprimeF&&id_cinema=<?php print_r($id_cinema);?>&&id_film=<?php print_r($li[$i]['id_film']);?>'" ></td>
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
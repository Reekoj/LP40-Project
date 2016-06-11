<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="css/style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="css/gallerie.css" />
<title>Acceuil</title>
<style>
.photofilms >li {
margin-bottom:15px;
  /* position: relative;*/
   display: inline-block;/*  pour enlever les liste à puce */
}
.photofilms li>a {
  display: block;
}
.article{
float: left;
}
.imgfilm {
	width:   240px;
	height: 200px;
}
</style>
</head>
<body class="centrage">
		<?php 
		if(session_id() == "")
			session_start();
		require 'require/menu.php';?>
		<div id="cheader1">
		<div id ="corpss">
		<article class="article">
		
		<ul class="photofilms">
		
		                <?php 
                                        $i=0;
                                        foreach($liste as $l){
                                     ?>
						<li><img class ="imgfilm"src="<?php print_r($li[$i]['photo']);?>"/><a href="index.php?section=infoflm&&id_film=<?php print_r($li[$i]['id_film']);?>&&id_cinema=<?php print_r($li[0]['id_cinema']);?>"><b><?php print_r($li[$i]['titre']);?></b></a></li>
						<?php 
                                        $i++;
                                        }
                                    ?> 
				</ul>

		</article>
		</div>	
</div>	
<?php require 'require/footer.php';?>
		
</body>
</html>
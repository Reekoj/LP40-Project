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
	
		<section>
		
		<?php for($i=0; $i<sizeof($cinemas);$i++){ ?>
			  <div class="mySlides fade">
			<img src="<?php print_r($cinemas[$i]['img_path']);?>"
				style="width: 100%">
		</div>
		<?php }?>
			  <a class="prev" onclick="plusSlides(-1)">&#10094;</a> <a
			class="next" onclick="plusSlides(1)">&#10095;</a>
		</div>
	</section>

	<section>
		<div></div>
		<div class="bloc1">
			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
				nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat
				volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation
				ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo
				consequat.</p>
			<p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit
				esse molestie consequat, vel illum dolore eu feugiat nulla facilisis
				at vero eros et accumsan et iusto odio dignissim qui blandit
				praesent luptatum zzril delenit augue duis dolore te feugait nulla
				facilisi.</p>
			<p>Ut wisi enim ad minim veniam, quis nostrud exerci tation
				ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo.</p>
		</div>
	</section>
	
	<?php
	
	require_once 'Model/Back_Office/ajoutFilm.php';
	$tabfilms = recentFilm ();
	?>
		<section style="clear: right;">
		<hr />
			<?php 
			require_once 'require/weather.php';
			require_once 'require/Twitterhashtag.php';
			for($i=0; $i<sizeof($tabfilms);$i++){ ?>
			<div class="img">
			<a target="_blank" href="<?php print_r($tabfilms[$i]['photo']);?>"> <img
				src="<?php print_r($tabfilms[$i]['photo']);?>">
			</a>
			<div class="desc">
			  <?php
				
				print_r ( '<b>Titre</b> : ' . $tabfilms [$i] ['titre'] . '<br/>' );
				print_r ( '<b>Cinéma</b> : ' . $tabfilms [$i] ['nom_cinema'] . '<br/>' );
				print_r ( '<b>Sortie</b> : ' . $tabfilms [$i] ['date_sortie'] . '<br/>' );
				print_r ( '<b>Genre</b> : ' . $tabfilms [$i] ['genre'] . '<br/>' );
				print_r ( '<b>Note</b> : ' . $tabfilms [$i] ['note'] );
				?>
			  </div>
		</div>
			<?php } ?>
		</section>
		<?php require 'require/footer.php';?>
		
		<script type="text/javascript" src="js/slider.js"></script>
</body>
</html>
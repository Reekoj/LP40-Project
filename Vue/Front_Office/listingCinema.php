<!DOCTYPE html>
<html>
	<head> 
		<meta charset="utf-8">
	</head>
	<body>
		<div id="menu"> 
			<ul id="list_deroulante">
				<li><a href=""/><span>Accueil</span></a></li>
				<li><a href=""/><span>Cinémas</span></a>
					<ul>
						<?php 
							foreach ($cinemas as $cine) {
								echo "<li><a href='/Controller/Front_Office/listingFilms.php?idCine=".$cine['id']."'>".$cine['nom_cinema']."</a></li>";
							}
						?>
					</ul>
				</li>
				<li><a href=""/><span>Catégorie 3</span></a></li>
				<li><a href=""/><span>Catégorie 4</span></a></li>      
				<li><a href=""/><span>...</span></a></li>
			</ul>  
		</div>
	</body>
</html>
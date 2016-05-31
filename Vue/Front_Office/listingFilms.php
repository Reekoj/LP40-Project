<!DOCTYPE html>
<html>
	<head> 
		<meta charset="utf-8">
	</head>
	<body>
		<div id="listeFilms">
			<?php 
				foreach ($films as $film) {
					// TODO : quand on clique sur un film, on affiche ses détails
					echo "
						<div>
							<img src=".$film['photo']." width='128px' height='128px'><br>
							".$film['titre']."
						</div>";
				}
			?>
		</div>
	</body>
</html>

<!-- http://pastebin.com/QsEEvLTq -->
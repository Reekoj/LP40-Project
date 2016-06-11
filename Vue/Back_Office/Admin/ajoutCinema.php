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

	<div id="cheader2">
		<div id='corps'>
			<div id="ajoutcinemas">
				<form action="Controller/Back_Office/ajoutCinema.php" method="post"
					enctype="multipart/form-data">

					<div class="formline">
						<div>Selectionner l'image de la salle de cinéma:</div>
						<input id="upload" type="file" name="image" id="image" required="required">
					</div>

					<div class="formline">
						<div>Nom:</div>
						<input type="text" name="nom" required="required">
					</div>

					<div class="formline">
						<div>Numero rue:</div>
						<input type="text" name="numero" required="required">
					</div>

					<div class="formline">
						<div>Nom rue:</div>
						<input type="text" name="rue" required="required">
					</div>

					<div class="formline">
						<div>Code postal:</div>
						<input type="text" name="cp" required="required">
					</div>

					<div class="formline">
						<div>Ville:</div>
						<input type="text" name="ville" required="required">
					</div>

					<div class="formline">
						<div>Localisation:</div>
						<input type="text" name="localisation" required="required">
					</div>

					<div class="formline">
						<div>Lattitude:</div>
						<input type="text" name="lat" required="required">
					</div>

					<div class="formline">
						<div>Longitude:</div>
						<input type="text" name="lng" required="required">
					</div>

					<div class="formline subv">
						<input id="submit" type="submit" value="Valider" name="submit"
							required="required">
					</div>

				</form>
			</div>
		</div>
	</div>
<?php require 'require/footer.php';?>
</body>
</html>
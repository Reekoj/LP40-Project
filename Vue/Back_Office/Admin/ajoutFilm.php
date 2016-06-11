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

	<div id="cheader2">
		<div id='corps'>

			<div id="ajoutfilm">
				<form action="Controller/Back_Office/ajoutFilm.php" method="post"
					enctype="multipart/form-data">

					<div class="formline">
						<div>Selectionner l'image du film :</div>
						<input id="upload" type="file" name="image" id="image"
							required="required">
					</div>

					<div class="formline">
						<div>Titre :</div>
						<input type="text" name="titre" required="required">
						<input type="hidden" name="id_cinema" value=<?php print_r($id_cinema);?> />
					</div>

					<div class="formline">
						<div>Realisateur :</div>
						<input type="text" name="realisateur" required="required">
					</div>

					<div class="formline">
						<div>Genre :</div>
						<input type="text" name="genre" required="required">
					</div>

					<div class="formline">
						<div>Note :</div>
						<input type="text" name=note required="required">
					</div>

					<div class="formline">
						<div>Duree :</div>
						<input type="text" name="duree" required="required">
					</div>
					<div class="formline">
						<div>Date de sortie :</div>
						<input type="text" name="date_sortie" required="required">
					</div>
					<div class="formline" id="acteurs">
						Acteurs<br />
						<div class="formline">
							<div>Acteur principal :</div>
							<input type="text" name="acteur" required="required">
						</div>
						<input id="nbreacteurs" type="hidden" name="nbreacteurs" value=1 />
						<div class="formline">
							<label>Ajouter un acteur : </label>
							<button type="button" id="ajoutActeur" onclick="ajoutacteur()">Ajouter</button>
						</div>
					</div>
					<div class="formline" id="seances">
						Seances<br />
						<div class="formline">
							Seance 1<br />
							<div class="formline">
								<div>Date :</div>
								<input type="text" name="date" required="required">
							</div>
							<div class="formline">
								<div>Heure Debut :</div>
								<input type="text" name="heureDebut" required="required">
							</div>
							<div class="formline">
								<div>Nombre de places :</div>
								<input type="text" name="nbplaces" required="required">
							</div>
						</div>
						<input id="nbreseances" type="hidden" name="nbreseances" value=1 />
						<div class="formline">
							<label>Ajouter une seance : </label>
							<button type="button" id="ajoutSeance" onclick="ajoutseance()">Ajouter</button>
						</div>
					</div>

					<div class="formline subv">
						<input id="submit" type="submit" value="Valider" name="submit"
							required="required">
					</div>

				</form>
			</div>
		</div>
	</div>
	<script type="text/javascript"> 
function ajoutacteur(){	
 var divnbreacteurs = document.getElementById('nbreacteurs');
 var nbreacteurs =parseInt(divnbreacteurs.value); 
 nbreacteurs+=1;
 divnbreacteurs.value=nbreacteurs;
 var divacteur = document.getElementById('acteurs');
 var num = divacteur.childElementCount-2;
 divacteur.innerHTML = divacteur.innerHTML +  '<div class="formline"><div>Acteur '+num+' :</div><input type="text" name="acteur'+num+'" required="required"></div>';
 }
function ajoutseance(){
	var divnbreseances = document.getElementById('nbreseances');
	 var nbreseances =parseInt(divnbreseances.value); 
	 nbreseances+=1;
	 divnbreseances.value=nbreseances;
	var divseance = document.getElementById('seances');
	var num = divseance.childElementCount-2;
	divseance.innerHTML = divseance.innerHTML + '<div class="formline">Seance '+num+'<br/><div class="formline"><div>Date :</div><input type="text" name="date'+num+'" required="required"></div><div class="formline"><div>Heure Debut :</div><input type="text" name="heureDebut'+num+'" required="required"></div><div class="formline"><div>Nombre de places :</div><input type="text" name="nbplaces'+num+'" required="required"></div></div>';
}
 </script>
 <?php require 'require/footer.php';?>
</body>
</html>
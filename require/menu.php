<link rel="stylesheet" href="css/header.css" />
<script type="text/javascript" src="js/popup.js"></script>
<header>
	<div>
		<div>
			<div class="logo">
				<img src="img/logo.png">
			</div>
			<div style="padding-top: 7px">
				<input type="text" name="search" placeholder="Search..."
					style="float: left">
				<button>Rechercher</button>
			</div>
		</div>
		<div></div>
	</div>

	<nav style="clear: left;">
		<ul class="barre_menu" id="menu">
			<li class="dropdown"><a class="active dropbtn" href="index.php?section=acceuil">Accueil</a>
			</li>
			<li class="avcsousmenu"><a>Liste Cinémas</a>
				<?php
				$admin=false;
require_once 'Model/Back_Office/ajoutCinema.php';
				$cinemas = infoCinemas ();
				?>
					<ul class="submenu">
					<?php for($i=0; $i<sizeof($cinemas);$i++){?>
						<li><a href="index.php?section=infocin&id_cinema=<?php print_r($cinemas[$i]['id_cinema']);?>"><?php print_r($cinemas[$i]['nom_cinema']);?></a></li>
						<?php }?>
					</ul></li>
			<li><a href="index.php?section=map">Carte des cinemas</a></li>
				<?php
				if ((! (isset ( $_SESSION ["active"] ))) or ((isset ( $_SESSION ["active"] )) and ($_SESSION ['logincnx'] != "Admin"))) {
					?>
				<li><a onclick="popupC()">Contactez Nous</a></li>
				<?php
					;
				}
				if (! (isset ( $_SESSION ["active"] ))) {
					?>
				<li><a onclick="popup()">Se connecter</a></li>
			<li><a onclick="popupI()">S'inscrire</a></li>
				<?php
					;
				} else {
					if ($_SESSION ['logincnx'] == "Admin") {
					$admin=true;	
					?>
				<li><a>Paramétrage</a>
				<ul class="submenu">
				<li><a href="index.php?section=afficheC">Cinémas</a></li>
				<li><a href="index.php?section=afficheCt">Comptes</a></li>
				<li><a href="index.php?section=afficheR">Reservations</a></li>
				</ul></li>
				<?php ;} else {?> 
				<li><a href="index.php?section=profil">Profil</a></li>
				<?php ;} ?>
				<li style="float: right"><a href="Controller/Back_Office/Deconnexion.php">Déconnexion</a></li>
				<?php ;} ?>

			</ul>
			<div id="overlaybox" name="1" class="obox">
                    <a  onclick="popunder()" style="position:absolute; width:100%; height:100%"></a>
                </div>
                <div id="authentification" name="2" class="popup auth" >
                        <form method="POST" action="Controller/Back_Office/Connexion.php" style="margin:0;" name="form">
                            <h2>Conectez-vous</h2>
                            <table>
                                <tr>
                                    <th>Login: </th>
                                    <th>
                                        <input class="inputtext" type="text" placeholder="Pseudo " name="pseudo"  size="10px" required="required"/>
                                    </th>
                                </tr>
                                <tr>
                                    <th>password</th>
                                    <th>
                                        <input class="inputtext" type="password" placeholder="mot de passe" name="password" size="10px" required="required"/>
                                    </th>
                                </tr>
                                <tr>
                                    <th colspan="2">                                
                                        <INPUT class="btn" type="submit" value="Connexion">
                                    </th>
                                </tr>
                            </table>                          
                        </form>  
                </div>
                <div id="overlayboxC" name="3" class="obox">
                    <a  onclick="popunderC()" style="position:absolute; width:100%; height:100%"></a>
                </div>
                <div id="ContacterNous" name="4" class="popup" >
                    <div id="contactN">
                        <form method="post" action="Controller/Front_Office/Contacteznous.php">                        
                            <table>
                                <tr>
                                    <th>E-mail</th>
                                    <td><input class="inputtext" name="email" type="text" class="txt"  placeholder="Entrer votre email" required="required" /></td>
                                </tr>
                                <tr>
                                    <th>Nom</th>
                                    <td><input class="inputtext" name="Nom" type="text" class="txt" placeholder="Emetteur" required="required" /></td>
                                </tr> 
                                <tr>
                                    <th>Contenu</th>
                                    <td><textarea type="text" name="contenu" class="txt" cols="21" rows="3"  placeholder="message" required="required" /></textarea></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <input type="submit" class="btn" value="Envoyer" style="float:right;"/>
                                    </td>
                                </tr>
                            </table>                  
                        </form>
                    </div>
                </div>
                
          <div id="overlayboxI" name="5" class="obox">
                    <a  onclick="popunderI()" style="position:absolute; width:100%; height:100%"></a>
                </div>
                <div id="insc" name="6" class="popup2" >
                 <form method="POST" action="Controller/Back_Office/inscription.php" enctype="multipart/form-data">  
                <!--  <form method="POST" action="require/upload.php" enctype="multipart/form-data">-->  
                        <ul class="form-style-1">
                            <li><label>NOM COMPLET <span class="required">*</span></label>
                                <input required="required" type="text" name="nom" class="field-divided" placeholder="NOM" />&nbsp;
                                <input type="text" name="prenom" class="field-divided" placeholder="PRENOM" required="required"/>
                            </li>
                            <li>
                                <label>Pseudo <span class="required">*</span></label>
                                <input type="text" name="pseudo" class="field-long" required="required"/>
                            </li>
                            <li>
                                <label>MOT DE PASSE <span class="required">*</span></label>
                                <input type="password" name="password" class="field-long" required="required"/>
                            </li>
                            <li>
                                <label>E-mail<span class="required">*</span></label>
                                <input type="email" name="email" class="field-long" required="required"/>
                            </li>
                            <li>
                                <label>CIN <span class="required">*</span></label>
                                <input type="text" name="cin" class="field-long" required="required"/>
                            </li>
                            <li>
                                <label>ADRESSE<span class="required">*</span></label>
                                <input type="text" name="adresse" class="field-long" />
                            </li></br>
                            <li>
                                <label class="radio-inline">SEXE:</label>
                                <label class="radio-inline">
                                    <input type="radio" name="sexe" id="inlineRadio1" value="M"> Homme
                                </label> 
                                <label class="radio-inline">
                                    <input type="radio" name="sexe" id="inlineRadio1" value="F"> Femme
                                </label>
                            </li>
                            <div class="form-group">
                            <li>
                                <label>Image: </label>
                                <input type="file" name="fichier"  id="fichier"/>
                            </li>
                            </div></br>
                            </ul>                      
                            <input class="btn" type="submit" value="Valider" style="margin-bottom:10px"/>
                    </form>
                </div>
	</nav>

	<div><?php if (!$admin){?>
		<p style="margin: 1%">Découvrez notre recherche de séances cinéma, les
			news et dossiers cinéma et séries TV, les émissions AlloCiné, les
			dernières bandes-annonces et plus encore..</p>
			<?php ;}
			else {?>
				<p style="margin: 5%"></p>
			<?php ;}?>
	</div>
</header>
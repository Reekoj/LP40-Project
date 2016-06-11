
	<aside class="contaside">
		<h1>Météo</h1>

		<form method="POST">
			<div>
				<input type="text" id="citySearchWeather">
				<button class ="btn" type="button" id="searchWeather">Rechercher</button>
			</div>
		</form>
		<table id="tabmeteo">
                    <?php
						require_once 'Citysearchweather.php';
					?>
                    </table>
	</aside>
	<script type="text/javascript" src="js/ajax.js"></script>
	<script type="text/javascript" src="js/searchWeatherAjax.js"></script>
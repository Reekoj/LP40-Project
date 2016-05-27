<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
<style type="text/css">
aside {
	margin: 10px;
	padding: 5px;
	width: 30%;
	height: 100%;
	float: left;
	border-right: solid rgba(0, 0, 0, 0.2);
}

.meteoicon img {
	width: 100px;
}

#tabmeteo {
	background-color: rgba(195, 195, 195, 0.2);
	margin: 10px;
	text-align: center;
}
</style>
</head>
<body>
	<aside>
		<h1>Météo</h1>

		<form method="POST">
			<div>
				<label>Search</label> <input type="text" id="citySearchWeather">
				<button type="button" id="searchWeather">Search</button>
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
</body>
</html>
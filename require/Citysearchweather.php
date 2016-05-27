<?php
$city = (isset ( $_POST['city'] )) ? $_POST['city'] : "Belfort";
$url="http://api.openweathermap.org/data/2.5/forecast/daily?q=".$city."&mode=json&units=metric&cnt=03&lang=fr&APPID=821f1294263cd7b1ac256fac0a22bbca";
$json=file_get_contents($url);
$data = json_decode($json,true);
$result=(isset ( $_POST['city'] ))? "" :"<p id='citymap'>".$data['city']['name']."</p>";
foreach($data['list'] as $data){
	$strWeather = $data['weather'][0]['description'];
	$temp = $data['temp']['day'];
	$wind = $data['speed'];
	$result.="<tr><th clospan='2'>".date('d/m/Y', $data['dt'])."</th></tr>";
	$result.='<tr class="meteoicon"><td>';
	if ($strWeather=="légères neiges"||$strWeather=="neige")
		$result.="<img src='img/icones/snow.png'>";
	else if ($strWeather=="légères pluies")
		$result.="<img src='img/icones/W1.png'>";
	else if ($strWeather=="Fortes pluies"||$strWeather=="pluies modérées")
		$result.="<img src='img/icones/drizzle.png'>";
	else if ($strWeather=="ensoleillé")
		$result.="<img src='img/icones/sunny.png'>";
	else if ($strWeather=="nuageux")
		$result.="<img src='img/icones/cloudy.png'>";
	else if ($strWeather=="peu nuageux")
		$result.="<img src='img/icones/mostlycloudy.png'>";
	else
		$result.="<img src='http://openweathermap.org/img/w/10d.png'>";
	$result.="</td><td>";
	$result.=$strWeather."<br/>".$temp." °C<br/>Vent : ".$wind." km/h</td></tr>";
}
    echo $result;
?>
                      
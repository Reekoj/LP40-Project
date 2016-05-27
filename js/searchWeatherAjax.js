/**
 * 
 */
var button = document.getElementById('searchWeather');
button.onclick = function() {
	var city = document.getElementById('citySearchWeather');
	var citySearchWeather = city.value;
	if (/^[a-zA-Z0-9]+$/.test(citySearchWeather))
	CitySearchWeatherAjax(citySearchWeather);
};
function CitySearchWeatherAjax(citySearchWeather){
	var xhr= getXMLHttpRequest();
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
			document.getElementById("tabmeteo").innerHTML = xhr.responseText;
			document.getElementById("citymap").innerHTML = citySearchWeather;
			
		} 
	  };
	xhr.open("POST", "require/Citysearchweather.php", true);
	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhr.send("city="+citySearchWeather);
	
	
	console.log(xhr.responseText);
}
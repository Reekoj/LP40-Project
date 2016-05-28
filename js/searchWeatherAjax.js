/**
 * 
 */
var button = document.getElementById('searchWeather');
button.onclick = function() {
	var city = document.getElementById('citySearchWeather');
	var citySearchWeather = city.value;
	if (/^[a-zA-Z0-9ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ]+$/.test(citySearchWeather))
	CitySearchWeatherAjax(citySearchWeather);
};
function CitySearchWeatherAjax(citySearchWeather){
	var xhr= getXMLHttpRequest();
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
			var response = JSON.parse(xhr.responseText);
			document.getElementById("tabmeteo").innerHTML = response[0].table;
			document.getElementById("citymap").innerHTML = response[0].cityResultWeather;	
		} 
	  };
	xhr.open("POST", "require/Citysearchweather.php", true);
	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhr.send("city="+citySearchWeather);
}
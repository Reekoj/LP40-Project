/**
 * 
 */
var contents =["<div class='infoWindow'>Pathé Belfort</div>","<div class='infoWindow'><img alt=\"qsd\" class=\"ii\"  align=\"left\"border=\"0\" src=\"img/pathe.jpg\">UGC Ciné Cité Strasbourg</div>","<div class='infoWindow'>Pathé Belfort</div>","<div class='infoWindow'>Pathé Belfort</div>"];
var infoWindows = [];
var markers = [];
var map;
function execute(positions){
	initMap();
	drop(positions);
}
function initMap() {
	var latlng = new google.maps.LatLng(46.7245765,4.0021249);
    map = new google.maps.Map(document.getElementById('corps'), {
    center:  latlng,
    zoom : 6,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  });
}

function drop(positions) {
  clearMarkers();
  for (var i = 0; i < positions.length; i++) {
	  addMarkerInfoWindowWithTimeout(positions[i],contents[i], i * 2000); 
  }
}

function addMarkerInfoWindowWithTimeout(position,content, timeout) {
  window.setTimeout(function() {
		console.log(JSON.parse(position))
console.log("jj")
	var marker=new google.maps.Marker({
	      position: position,
	      map: map,
	      animation: google.maps.Animation.DROP,
	      icon : {          
	          url: 'img/icones/icomap.png',        
	          size: new google.maps.Size(32, 32),               
	          origin: new google.maps.Point(0,0),               
	          anchor: new google.maps.Point(0, 20)
	          }
	    });
	var infowindow =new google.maps.InfoWindow({
    	maxWidth : 200,
        content: content
    });
    markers.push(marker);
    infoWindows.push(infowindow);
    google.maps.event.addListener(marker, 'click', function() {
    	infowindow.open(map,marker)});
  }, timeout);
}

function clearMarkers() {
  for (var i = 0; i < markers.length; i++) {
    markers[i].setMap(null);
  }
  markers = [];
  infoWidows=[];
}
function initialiser() {
    var latlng = new google.maps.LatLng(46.7245765,4.0021249);
    var options={
        center : latlng,
        zoom : 6,
        mapTypeId:google.maps.MapTypeId.ROADMAP
        };
    var image = {          
        url: 'img/icones/icomap.png',        
        size: new google.maps.Size(32, 32),               
        origin: new google.maps.Point(0,0),               
        anchor: new google.maps.Point(0, 20)
        };
    var carte = new google.maps.Map(document.getElementById("corps"),options);
    var infowindow = new google.maps.InfoWindow({
    	maxWidth : 200,
        content: "<div class='infoWindow'>Pathé Belfort</div>"
    });            
    var infowindow2 = new google.maps.InfoWindow({
    	maxWidth : 200,
        content: "<div class='infoWindow'><img alt=\"qsd\" class=\"ii\"  align=\"left\"border=\"0\" src=\"img/pathe.jpg\">UGC Ciné Cité Strasbourg</div>"
    });
    var marker = new google.maps.Marker({
        position: new google.maps.LatLng(47.6307263, 6.8593849),
        map: carte,
        icon: image
    });
    var marker2 = new google.maps.Marker({
        position: new google.maps.LatLng(48.572594, 7.766130),
        map: carte,
        icon: image,
        animation: google.maps.Animation.DROP
    });
    google.maps.event.addListener(marker, 'click', function() {
        infowindow.open(carte,marker);
    });      
    google.maps.event.addListener(marker2, 'dbclick', function() {
        infowindow2.open(carte,marker2);
    });
    google.maps.event.addListener(marker2, 'click',function() {
    	  if (marker2.getAnimation() !== null) {
    	    marker2.setAnimation(null);
    	  } else {
    	    marker2.setAnimation(google.maps.Animation.BOUNCE);
    	  }
    	});
}	

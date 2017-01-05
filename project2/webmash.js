// Put your zillow.com API key here

var username = "yashtawade";
var request = new XMLHttpRequest();

function initialize()
{
    initMap();
}
//initMap() which initiates map to a location
function initMap() {

	//initialize map
    var map;
    map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: 32.75, lng: -97.13},
        zoom: 17
    });

    //Initialized the geocoders and infowindows
    var geocoder = new google.maps.Geocoder;
    var infowindow = new google.maps.InfoWindow;

    makeMarker(map);
     //Initialize a mouse click event on map which then calls reversegeocode function
    google.maps.event.addListener(map,'click',function(event){
        reversegeocode(geocoder, map,event.latLng,infowindow,marker);
        //makeMarker(event.latLng, map);
        console.log(event.latLng);
    });

}


//makes the marker appear on the map on clicking a location
function makeMarker(map){
     marker = new google.maps.Marker({
      //position: latlng,
      map: map,
      title: 'Hello World!'
  });
    //marker.setPosition(latlng)

}


// Reverse Geocoding 
function reversegeocode(geocoder, map, latlng, infowindow, marker) {

    geocoder.geocode({'location': latlng}, function(results, status) {
      if (status === 'OK') {
        if (results[0]) {
          map.setZoom(17);
        //   var marker = new google.maps.Marker({
        //     position: latlng,
        //     map: map
        // });
          marker.setPosition(latlng);
          //Find latitude and longitude of the point on the map where clicked
          var latitude = latlng.lat();
          var longitude = latlng.lng();
          //Finding address based on latitude and longitude
          sendRequest(latitude,longitude,infowindow,results[0].formatted_address);
          infowindow.open(map, marker);
      } else {
          window.alert('No results found');
      }
  } else {
    window.alert('Geocoder failed due to: ' + status);
}
});

  
}// end of geocodeLatLng()

//clears the div
function clear1()
{
  console.log("here");
    document.getElementById("output").innerHTML = "";
    alert("Your previous searches have been cleared!")
}

// Displays the required parameters in the infowindow of the map as well as the html <div>. On every click, a new set of parameters will get appended.
function displayResult (infowindow,address) {
    if (request.readyState == 4) {
        var xml = request.responseXML.documentElement;
        var temperature = xml.getElementsByTagName("temperature")[0].childNodes[0].nodeValue;
        var wind = xml.getElementsByTagName("windSpeed")[0].childNodes[0].nodeValue;
        var cloud = xml.getElementsByTagName("clouds")[0].childNodes[0].nodeValue;
        console.log("Temperature : " + temperature + " Wind : " + wind + " Cloud :" + cloud); 
        infowindow.setContent("Address : "+address+"<br> Temperature : " + temperature + "<sup> o </sup>" + "C" + "<br> Wind : " + wind + " mph" + "<br> Clouds :" + cloud);
        document.getElementById("output").innerHTML += "Address : "+address+"<br> Temperature : " + temperature + "<sup> o </sup>" + "C" + "<br> Wind : " + wind + " mph" + "<br> Clouds :" + cloud + "<br> <br>";
    }
}

function sendRequest (latitude,longitude,infowindow,address) {
    request.onreadystatechange = function(){displayResult(infowindow,address);};
    var lat = latitude;
    var lng = longitude;
    request.open("GET"," http://api.geonames.org/findNearByWeatherXML?lat="+lat+"&lng="+lng+"&username="+username);
    //request.withCredentials = "true";
    request.send(null);
}

//Clear Button Testing
//document.getElementById("butn").onclick(function(){
//console.log("her2");
//this.innerHTML="";
//});

// Put your Last.fm API key here
/*var api_key = "c111bc67961ebb0cf5453a76f13bcac6";

function sendRequest () {
    var xhr = new XMLHttpRequest();
    var method = "artist.getinfo";
    var artist = encodeURI(document.getElementById("form-input").value);
    xhr.open("GET", "proxy.php?method="+method+"&artist="+artist+"&api_key="+api_key+"&format=json", true);
    xhr.setRequestHeader("Accept","application/json");
    xhr.onreadystatechange = function () {
        if (this.readyState == 4) {
            var json = JSON.parse(this.responseText);
            var str = JSON.stringify(json,undefined,2);
            document.getElementById("output").innerHTML = "<pre>" + str + "</pre>";
        }
    };
    xhr.send(null);
}*/


var api_key = "4fc8249a08e99c9dc3f6df62e3e0e57c";

function sendRequest () {
    var xhr = new XMLHttpRequest();
   // var method = "artist.getinfo";
    var city = encodeURI(document.getElementById("form-input").value);
    xhr.open("GET", "proxy.php?q="+city+"&appid="+api_key+"&format=json&units=metric", true);
    xhr.setRequestHeader("Accept","application/json");
    xhr.onreadystatechange = function () {
        if (this.readyState == 4) {
            var json = JSON.parse(this.responseText);
            var str = JSON.stringify(json,undefined,2);
            document.getElementById("carry").innerHTML = "<strong> Current Weather </strong>";
            document.getElementById("cityname").innerHTML = "<strong> Name of the city : </strong>" + json.name;
            document.getElementById("longitude").innerHTML = "<strong> Longitude : </strong>" + json.coord.lon + "<sup> o </sup>";
            document.getElementById("latitude").innerHTML = "<strong> Latitude : </strong>  "+ json.coord.lat + "<sup> o </sup>";
            document.getElementById("sunrise").innerHTML = "<strong> Time of Sunrise : </strong>" + convert(json.sys.sunrise);
            document.getElementById("sunset").innerHTML =  "<strong> Time of Sunset : </strong>" + convert(json.sys.sunset);
            document.getElementById("humidity").innerHTML = "<strong> Humidity : </strong>" + json.main.humidity + "%";
            document.getElementById("pressure").innerHTML = "<strong> Pressure : </strong>" + json.main.pressure + " hPa";
            document.getElementById("temp").innerHTML = "<strong> Temperature : </strong>" + json.main.temp + "<sup> o </sup>" + "C";
            document.getElementById("mintemp").innerHTML = "<strong> Minimum Temperature : </strong>" + json.main.temp_min + "<sup> o </sup>" + "C";
            document.getElementById("maxtemp").innerHTML = "<strong> Maximum Temperature : </strong>" + json.main.temp_max + "<sup> o </sup>" + "C";
            document.getElementById("clouds").innerHTML = "<strong> Clouds : </strong>" + json.clouds.all + "%";
            document.getElementById("visibility").innerHTML = "<strong> Visibility : </strong>" + visib(json.weather[0].id);
            document.getElementById("message").innerHTML = "<strong> Message: </strong>";

            //document.getElementById("output").innerHTML = "<pre>" + str + "</pre>";
            sendNotif(json);
        }
    };
    xhr.send(null);

}

//Function convert simply converts the UTC time to a 24 hour clock format.
function convert(input){
    var a = new Date(input*1000);
    return a.getHours() + ":" + a.getMinutes() + ":" + a.getSeconds() + ' (Local time in the 24-hour clock format)';

}

//Function visib takes json.weather[0].id codes to return the value of visibility depending on fog,haze,smoke etc.
function visib(visid){
    console.log(visid);
    if (visid == 701 || visid == 711 || visid == 721 || visid == 741){
        console.log("Bad Visibility");
       return "Bad Visibility";
    }
    else {
        //document.getElementById("visibility").innerHTML = "Good Visibility";
        console.log("Good Visibility");
        return "Good Visibility";
    }
}

//Function sendNotif displays an alert message based on the weather and also displays the same message on the web page
function sendNotif(inputJson){
	console.log(inputJson.weather[0].main);
    if(inputJson.weather[0].main == "Clear")
    {
        alert("It's a clear sky. You're good to go!"); 
        document.getElementById("messageh").innerHTML = "It's a clear sky. You're good to go!";
    }
    if(inputJson.weather[0].main == "Rain")
    {
        alert("Do carry an umbrella, it will be raining!"); 
        document.getElementById("messageh").innerHTML = "Do carry an umbrella, it will be raining!";
    }
    if(inputJson.weather[0].main == "Snow")
    {
        alert("Please carry a thick coat, it's snowing outside!");
        document.getElementById("messageh").innerHTML = "Please carry a thick coat, it's snowing outside!"; 
    }
    if(inputJson.weather[0].main == "Clouds")
    {
        alert("Carry an umbrella, there are chances of rain"); 
        document.getElementById("messageh").innerHTML = "Carry an umbrella, it's cloudy and there are chances of rain!";
    }
    if(inputJson.weather[0].main == "Extreme")
    {
        alert("We advise you not to step outside, it's unsafe!"); 
        document.getElementById("messageh").innerHTML = "We advise you not to step outside, it's unsafe!";
    }
}
sendNotif(json.weather);

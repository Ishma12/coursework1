<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prototype 2</title>
</head>
<style>
    body{
        margin: 0;
	    padding: 0;
	    height: 100vh;
	    display: flex;
        align-items: center;
	    justify-content: center;
	    font-family: 'Zen Loop',Georgia, 'Times New Roman', Times, serif;
	    color:whitesmoke;
	    background-image: url(Miami.jpg);
    
    }
    .card{
          background-color: cadetblue;
          border-radius: 50px;
          border: 4px solid burlywood;
          box-shadow: 5px 5px 10px lavender, -5px -5px 10px lightcyan;
          padding: 5%;
          text-align:center;
        
    }
  

</style>
<script>
    // Register service worker
if ('serviceWorker' in navigator) {
window.addEventListener('load', function() {
navigator.serviceWorker.register('service.js').then(function(registration) {

console.log('ServiceWorker registration successful');
}, function(err) {
// registration failed :(
console.log('ServiceWorker registration failed: ', err);
});
});

}

if(localStorage.when != null
&& parseInt(localStorage.when) + 1000 > Date.now()) {
let freshness = Math.round((Date.now() - localStorage.when)/1000) + " second(s)";
        document.getElementById("weather").innerHTML=localStorage.weather
        document.getElementById("city").innerHTML=localStorage.city
        document.getElementById("temperature").innerHTML=localStorage.temperature+"°C"
        document.getElementById("humidity").innerHTML=localStorage.humidity + "%"
        document.getElementById("speed").innerHTML=localStorage.speed+"km/hr"
        document.getElementById("pressure").innerHTML=localStorage.pressure + " hPa"
        document.getElementById("date").innerHTML=localStorage.date
        //document.getElementById('icon').src=` http://openweathermap.org/img/wn/${localStorage.icon}@2x.png`
        document.getElementById("update").innerHTML = freshness;
// No local cache, access network
} else {
// Fetch weather data from API for given city
fetch('getapi.php?city=Miami') //retrive the data from the php.
// Convert response string to json object
.then(response => response.json())
.then(response => {
// Copy one element of response to our HTML paragraph
        document.getElementById("weather").innerHTML=response.weather
        document.getElementById("city").innerHTML=response.weather_city
        document.getElementById("temperature").innerHTML=response.temperature+"°C"
        document.getElementById("humidity").innerHTML=response.humidity + "%"
        document.getElementById("speed").innerHTML=response.speed+"km/hr"
        document.getElementById("pressure").innerHTML=response.pressure + " hPa"
        document.getElementById("date").innerHTML=response.datetimes
        //document.getElementById('icon').src=` http://openweathermap.org/img/wn/${response.weather_icon}@2x.png`

// Save new data to browser, with new timestamp
localStorage.weather = response.weather;
localStorage.temperature = response.temperature + '°';
localStorage.when = Date.now(); // milliseconds since January 1 1970
localStorage.city = response.weather_city;
localStorage.humidity = response.humidity;
localStorage.speed = response.speed;
localStorage.pressure = response.pressure;
localStorage.date = response.datetimes;


})
.catch(err => {
    if(localStorage.when != null) {
// Get data from browser cache
let freshness = Math.round((Date.now() - localStorage.when)/1000) + " second(s)";
document.getElementById("weather").innerHTML=localStorage.weather
        document.getElementById("city").innerHTML=localStorage.city
        document.getElementById("temperature").innerHTML=localStorage.temperature+"°C"
        document.getElementById("humidity").innerHTML=localStorage.humidity + "%"
        document.getElementById("speed").innerHTML=localStorage.speed+"km/hr"
        document.getElementById("pressure").innerHTML=localStorage.pressure + " hPa"
        document.getElementById("date").innerHTML=localStorage.date
        document.getElementById("update").innerHTML = freshness; 
} else {
// Display errors in console
console.log(err);
}


});
}


</script>
<body>
    <div class ="card">
        <h1>Weather in City</h1>
        <table>
            <tr>
                <td><img id="icon" src="" ></td>
            </tr>
            <tr>
                <td>City:</td>
                <td id="city"></td>
            </tr>
            <tr>
                <td>Weather:</td>
                <td id="weather"></td>
            </tr> 
            <tr>
                <td>Temperature in Celsius:</td>
                <td id="temperature"></td>
            </tr>
            <tr>
                <td>Pressure in hPa:</td>
                <td id="pressure"></td>
            </tr>
            <tr>
                <td>Humidity in %:</td>
                <td id="humidity"></td>
            </tr>
            <tr>
                <td>Wind Speed in m/s:</td> 
                <td id="speed"></td>

            </tr>
            <tr>
                <td>Datetimes:</td>
                <td id="date"></td>

            
            </tr>
            <tr>
                <td>MyLastUpdated:</td>
                <td id="update"></td>
            </tr>
        </table>
    </div>
    
</body>
</html>
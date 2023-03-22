

var latitude = document.getElementById("latitude");


latitude.addEventListener("keydown", function (event) {
    // Blocca la modifica dell'input tramite l'Inspector del browser
    event.preventDefault();
});

var longitude = document.getElementById("longitude");


longitude.addEventListener("keydown", function (event) {
    // Blocca la modifica dell'input tramite l'Inspector del browser
    event.preventDefault();
});


const API_KEY = "hJqueTcOWatAGBZnKxzHkdEbmyM9feG4";

const centerCoords = [document.getElementById('longitude').value, document.getElementById('latitude').value]

const map = tt.map({
    key: API_KEY,
    container: "map",
    center: centerCoords,
    style: `https://api.tomtom.com/style/1/style/*?map=2/basic_street-satellite&poi=2/poi_dynamic-satellite&key=${API_KEY}`,
    zoom: 17
});

const marker = new tt.Marker().setLngLat(centerCoords).addTo(map);

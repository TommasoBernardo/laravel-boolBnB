
var options = {
    searchOptions: {
        key: "hJqueTcOWatAGBZnKxzHkdEbmyM9feG4",
        language: "it-IT",
        limit: 5,
    },
    autocompleteOptions: {
        key: "hJqueTcOWatAGBZnKxzHkdEbmyM9feG4",
        language: "it-IT"
    },
    placeholder: "Inserisci indirizzo",
}
var ttSearchBox = new tt.plugins.SearchBox(tt.services, options)
var searchBoxHTML = ttSearchBox.getSearchBoxHTML()

let latitudine = null
let longitudine = null
let address = null

ttSearchBox.on('tomtom.searchbox.resultselected', function (data) {


    console.log(data.data.result);


    latitudine = data.data.result.position.lat;
    longitudine = data.data.result.position.lng;
    address = data.data.result.address.freeformAddress;




    console.log(latitudine, longitudine);

    const inputLatidudine = document.getElementById('latitude').setAttribute('value', latitudine)
    const inputLongitudine = document.getElementById('longitude').setAttribute('value', longitudine)
    const inputAddress = document.getElementById('address').setAttribute('value', address)

    document.getElementById('latitude').value = latitudine
    document.getElementById('longitude').value = longitudine
    document.getElementById('address').value = address


});


document.getElementById("searchBox").append(searchBoxHTML)


document.getElementById('latitude').addEventListener('input', () => {
    document.getElementById('latitude').value = latitudine
})


document.getElementById('longitude').addEventListener('input', () => {
    document.getElementById('longitude').value = longitudine
})

document.getElementById('address').addEventListener('input', () => {
    document.getElementById('address').value = address
})

// document.getElementById('latitude').disabled = true;
// document.getElementById('longitude').disabled = true;
// document.getElementById('address').disabled = true;

var options = {
    searchOptions: {
        key: "hJqueTcOWatAGBZnKxzHkdEbmyM9feG4",
        language: "it-IT",
        limit: 5,
    },
    autocompleteOptions: {
        key: "hJqueTcOWatAGBZnKxzHkdEbmyM9feG4",
        language: "it-IT",
    },
}
var ttSearchBox = new tt.plugins.SearchBox(tt.services, options)
var searchBoxHTML = ttSearchBox.getSearchBoxHTML()

ttSearchBox.on('tomtom.searchbox.resultselected', function (data) {
    console.log(data.data.result);


    let latitudine = data.data.result.position.lat;
    let longitudine = data.data.result.position.lng;
    let address = data.data.result.address.freeformAddress;




    console.log(latitudine, longitudine);

    const inputLatidudine = document.getElementById('latitude').setAttribute('value',latitudine)
    const inputLongitudine = document.getElementById('longitude').setAttribute('value', longitudine)
    const inputAddress = document.getElementById('address').setAttribute('value', address)





});


document.getElementById("searchBox").append(searchBoxHTML)

// const input = document.querySelector('input.tt-search-box-input').setAttribute('name','address')
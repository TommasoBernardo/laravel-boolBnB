
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

    console.log(latitudine, longitudine);



});


document.getElementById("searchBox").append(searchBoxHTML)
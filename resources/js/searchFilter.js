
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


ttSearchBox.on('tomtom.searchbox.resultselected', function (data) {



    console.log(data.data.result);


    latitudine = data.data.result.position.lat;
    longitudine = data.data.result.position.lng;
    // address = data.data.result.address.freeformAddress;

    console.log(latitudine, longitudine);

    const inputLatidudine = document.getElementById('latitude').setAttribute('value', latitudine)
    const inputLongitudine = document.getElementById('longitude').setAttribute('value', longitudine)
    // const inputAddress = document.getElementById('address').setAttribute('value', address)

    document.getElementById('latitude').value = latitudine
    document.getElementById('longitude').value = longitudine

});


window.addEventListener('load', () => {

    if (window.location.href == 'http://127.0.0.1:8000/apartments') {
        localStorage.clear();
    }
    const searchInput = document.querySelector('input.tt-search-box-input');
    const searchValue = localStorage.getItem('searchboxValue');
    console.log(window.location.href)
    if (searchValue) {
        searchInput.value = searchValue;
    }

});

document.getElementById('formFilter').addEventListener('submit', (event) => {

    const searchInput = document.querySelector('input.tt-search-box-input');
    localStorage.setItem('searchboxValue', searchInput.value);

});


document.getElementById("searchBox").append(searchBoxHTML)


const input = document.querySelector('input.tt-search-box-input').setAttribute('name', 'address')


document.getElementById('latitude').addEventListener('input', () => {
    document.getElementById('latitude').value = latitudine
})


document.getElementById('longitude').addEventListener('input', () => {
    document.getElementById('longitude').value = longitudine
})

// document.getElementById('address').addEventListener('input', () => {
//     document.getElementById('address').value = address
// })

// document.getElementById('latitude').disabled = true;
// document.getElementById('longitude').disabled = true;
// document.getElementById('address').disabled = true;
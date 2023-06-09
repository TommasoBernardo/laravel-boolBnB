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
    placeholder: "Enter an address",
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

    document.getElementById('latitude').setAttribute('value', latitudine)
    document.getElementById('longitude').setAttribute('value', longitudine)
    // const inputAddress = document.getElementById('address').setAttribute('value', address)

    document.getElementById('latitude').value = latitudine
    document.getElementById('longitude').value = longitudine

});


window.addEventListener('load', () => {

    if (window.location.href == 'http://127.0.0.1:8000/apartments') {
        localStorage.clear();
    }
    if (window.location.href == 'http://127.0.0.1:8000/') {
        localStorage.clear();
    }
    const searchInput = document.querySelector('input.tt-search-box-input')
    const inputLatidudine = document.getElementById('latitude')
    const inputLongitudine = document.getElementById('longitude');
    const inputBeds = document.getElementById('beds');
    const inputRooms = document.getElementById('rooms');
    const inputDistanzaKm = document.getElementById('distanceKm');
    const searchValue = localStorage.getItem('searchboxValue');
    const searchValueLongitude = localStorage.getItem('searchValueLongitude');
    const searchValueLatitude = localStorage.getItem('searchValueLatitude');
    const searchValueBeds = localStorage.getItem('searchValueBeds');
    const searchValueRooms = localStorage.getItem('searchValueRooms');
    const searchValueDistanceKm = localStorage.getItem('searchValueDistanceKm');


    const checkboxes = document.querySelectorAll('.myCheckbox');

    checkboxes.forEach((checkbox) => {
        const checkboxValue = checkbox.value;

        // Controlla se il valore della checkbox è già stato salvato in localStorage
        const isChecked = localStorage.getItem(checkboxValue) === 'true';
        checkbox.checked = isChecked;

        // Aggiungi l'evento change per salvare lo stato della selezione in localStorage
        checkbox.addEventListener('change', () => {
            localStorage.setItem(checkboxValue, checkbox.checked);
        });
    });




    // console.log(window.location.href)

    if (searchValue) {
        searchInput.value = searchValue;
        inputLatidudine.value = searchValueLongitude;
        inputLongitudine.value = searchValueLatitude;
        inputBeds.value = searchValueBeds
        inputRooms.value = searchValueRooms
        inputDistanzaKm.value = searchValueDistanceKm
    }

});





document.getElementById('formFilter').addEventListener('submit', (event) => {

    const searchInput = document.querySelector('input.tt-search-box-input');
    const inputLatidudine = document.getElementById('latitude')
    const inputLongitudine = document.getElementById('longitude');
    const inputBeds = document.getElementById('beds');
    const inputRooms = document.getElementById('rooms');
    const inputDistanzaKm = document.getElementById('distanceKm');

    localStorage.setItem('searchboxValue', searchInput.value);
    localStorage.setItem('searchValueLongitude', inputLatidudine.value);
    localStorage.setItem('searchValueLatitude', inputLongitudine.value);

    if(inputBeds){
        localStorage.setItem('searchValueBeds', inputBeds.value);
        localStorage.setItem('searchValueRooms', inputRooms.value);
        localStorage.setItem('searchValueDistanceKm', inputDistanzaKm.value);   
    }
    
    const checkboxes = document.querySelectorAll('.myCheckbox');
    checkboxes.forEach((checkbox) => {
        const checkboxValue = checkbox.value;
        const isChecked = checkbox.checked;
        if (isChecked) {
            localStorage.setItem(checkboxValue, isChecked);
        } else {
            localStorage.removeItem(checkboxValue);
        }
    });


    if (document.getElementById('latitude').value == '') {
        event.preventDefault();
        document.getElementById('mexErrore').classList.remove('d-none')
    }

});



document.getElementById("searchBox").append(searchBoxHTML)


const input = document.querySelector('input.tt-search-box-input')

input.setAttribute('name', 'address')

input.setAttribute('autocomplete', 'off')

input.addEventListener('click', () => {
    document.getElementById('mexErrore').classList.add('d-none')
})

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

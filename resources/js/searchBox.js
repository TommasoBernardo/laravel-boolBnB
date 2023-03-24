
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

let latitudine = null
let longitudine = null
let address = null

ttSearchBox.on('tomtom.searchbox.resultselected', function (data) {
    console.log(data.data.result);


    latitudine = data.data.result.position.lat;
    longitudine = data.data.result.position.lng;
    address = data.data.result.address.freeformAddress;




    console.log(latitudine, longitudine);

    document.getElementById('latitude').setAttribute('value',latitudine)
    document.getElementById('longitude').setAttribute('value', longitudine)
    document.getElementById('address').setAttribute('value', address)


    document.getElementById('latitude').value = latitudine
    document.getElementById('longitude').value = longitudine
    document.getElementById('address').value = address


});


document.getElementById("searchBox").append(searchBoxHTML)

// const input = document.querySelector('input.tt-search-box-input').setAttribute('name','address')

if (window.location.href == "http://127.0.0.1:8000/dashboard/apartment/create"){
    
    document.querySelector('input.tt-search-box-input').required = true;
    document.getElementById('cover_image').required = true;
}

if (document.getElementById('address').value){
    document.querySelector('input.tt-search-box-input').value = document.getElementById('address').value
}


const checkboxes = document.querySelectorAll('input[type="checkbox"]');

document.getElementById('formCrud').addEventListener('submit', (event) => {

    let isChecked = false;

    checkboxes.forEach((checkbox) => {
        if (checkbox.checked) {
            isChecked = true;
        }
    });

    if (!isChecked) {
        event.preventDefault();

        const mexErrore = document.getElementById('errorMex').classList.add('d-block');
    }


    if (document.getElementById('latitude').value == '') {
        event.preventDefault();
        document.getElementById('mexErrore').classList.remove('d-none')
    }

   


});

document.querySelector('input.tt-search-box-input').addEventListener('click', () => {

    document.getElementById('latitude').value = ''
    document.getElementById('longitude').value = ''
    document.getElementById('address').value = ''



    document.getElementById('mexErrore').classList.add('d-none')


})

checkboxes.forEach((checkbox) => {
    checkbox.addEventListener('click',()=>{
        document.getElementById('errorMex').classList.remove('d-block');
    })
});

document.getElementById('latitude').addEventListener('input',()=>{
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

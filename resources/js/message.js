import './bootstrap';
import '~resources/scss/app.scss';
import '~resources/scss/message.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])

const elementMessage = document.querySelectorAll("div#message");
const elementButtons = document.querySelectorAll("button#button");
elementButtons.forEach((elementButton, index) => {
    elementButton.addEventListener("click" ,()=>{ 
        elementMessage[index].classList.toggle("d-none");
    
    })
    
});


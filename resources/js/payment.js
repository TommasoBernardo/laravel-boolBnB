var button = document.querySelector('#submit-button');

braintree.dropin.create({
    authorization: 'sandbox_g42y39zw_348pk9cgf3bgyw2b',
    selector: '#dropin-container'
}, function (err, instance) {
    button.addEventListener('click', function (event) {
        event.preventDefault();
        instance.requestPaymentMethod(function (err, payload) {
            if (err) {
                // alert('An error occurred during the payment process. Please check your payment details and try again.');
                return;
            } else {
                // invia il form
                event.target.closest('form').submit();
            }
        });
    })
});

let payButtons = document.querySelectorAll('button#pay-btn');



payButtons.forEach((payButton, index) => {
    payButton.addEventListener('click', () => {
        document.getElementById('sponsor_id').setAttribute('value', index + 1)
    })
});


document.getElementById('sponsor_id').addEventListener('click',function () {
    
    document.getElementById('sponsor_id').setAttribute('readonly', true);

})
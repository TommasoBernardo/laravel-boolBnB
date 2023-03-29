var button = document.querySelector('#submit-button');

braintree.dropin.create({
    authorization: 'sandbox_g42y39zw_348pk9cgf3bgyw2b',
    selector: '#dropin-container'
}, function (err, instance) {
    button.addEventListener('click', function () {
        instance.requestPaymentMethod(function (err, payload) {

        });
    })
});

let payButtons = document.querySelectorAll('button#pay-btn');
let braintreeBox = document.getElementById('braintree-box');
let cancelPaymentBtn = document.getElementById('cancel-payment');

cancelPaymentBtn.addEventListener('click', () => {
    braintreeBox.classList.add('d-none')
})

payButtons.forEach((payButton, index) => {
    payButton.addEventListener('click', () => {
        document.getElementById('sponsor_id').setAttribute('value', index + 1)
        braintreeBox.classList.remove('d-none');
    })
});

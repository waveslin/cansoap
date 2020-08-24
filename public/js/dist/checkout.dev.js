"use strict";

var stripe = Stripe('pk_test_aOvKwY0hZwlnVVF9aEK4rKB800LhsB1x91');
var elements = stripe.elements({
  locale: 'en'
});
var style = {
  base: {
    fontSize: '16px',
    color: '#32325d'
  }
};
var card = elements.create('card', {
  style: style,
  hidePostalCode: true
});
card.mount('#card-element');

(function () {
  'use strict';

  window.addEventListener('load', function (token) {
    var stop = false;
    var forms = $('.needs-validation');
    var validation = Array.prototype.filter.call(forms, function (form) {
      form.addEventListener('submit', function (event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }

        form.classList.add('was-validated');
      }, false);
    });
  }, false);

  if ($('.needs-validation').hasClass('was-validated')) {}
})();

$('#payment-form').submit(function (event) {
  event.preventDefault();
  stripe.createToken(card).then(function (result) {
    if (result.error) {
      $('#card-errors').textContent = result.error.message;
    } else {
      stripeTokenHandler(result.token);
    }
  });
});

function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);
  form.submit();
}
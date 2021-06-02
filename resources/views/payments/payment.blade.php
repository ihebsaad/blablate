@extends('layouts.app') 



<link rel="stylesheet" href="{{ asset('public/css/style.css') }}" />
<script src="https://js.stripe.com/v3/"></script>
@section('content')
<div class="container">
<style>
.card-element{width:100%;padding-bottom:20px;}
</style>
<form action="{{ url('charge') }}" method="post" id="payment-form">
    <div class=" " style="width:40%">
        <div class="row form-group"><input class="form-control" type="text" name="amount" placeholder="Montant" /></div>
        <div class="row form-group"><input class="form-control" type="email" name="email" placeholder="Email" /></div>
        <div class="row form-group"><label for="card-element">
        Carte de Crédit
        </label>
		</div>
		<div class="row">
        <div id="card-element">
        <!-- A Stripe Element will be inserted here. -->
        </div>
		</div>
        <!-- Used to display form errors. -->
        <div id="card-errors" role="alert"></div>
    </div>
    <button class="btn btn-lg btn-success">Submit Payment</button>
    {{ csrf_field() }}
</form>
</div>

<script>
 //var publishable_key = '{{ env('STRIPE_PUBLISHABLE_KEY') }}';
 var publishable_key = '{{ env('STRIPE_PUBLISHABLE_KEY') }}';
 
</script>
<!--<script src="{{ asset('public/js/card.js') }}"></script>-->
<script>
// Create a Stripe client.
var stripe = Stripe(publishable_key);
  
// Create an instance of Elements.
var elements = stripe.elements();
  
// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
    base: {
        color: '#32325d',
        fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
        fontSmoothing: 'antialiased',
        fontSize: '16px',
        '::placeholder': {
            color: '#aab7c4'
        }
    },
    invalid: {
        color: '#fa755a',
        iconColor: '#fa755a'
    }
};
  
// Create an instance of the card Element.
var card = elements.create('card', {style: style});
  
// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');
  
// Handle real-time validation errors from the card Element.
card.addEventListener('change', function(event) {
    var displayError = document.getElementById('card-errors');
    if (event.error) {
        displayError.textContent = event.error.message;
    } else {
        displayError.textContent = '';
    }
});
  
// Handle form submission.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
    event.preventDefault();
  
    stripe.createToken(card).then(function(result) {
        if (result.error) {
            // Inform the user if there was an error.
            var errorElement = document.getElementById('card-errors');
            errorElement.textContent = result.error.message;
        } else {
            // Send the token to your server.
            stripeTokenHandler(result.token);
        }
    });
});
  
// Submit the form with the token ID.
function stripeTokenHandler(token) {
    // Insert the token ID into the form so it gets submitted to the server
    var form = document.getElementById('payment-form');
    var hiddenInput = document.createElement('input');
    hiddenInput.setAttribute('type', 'hidden');
    hiddenInput.setAttribute('name', 'stripeToken');
    hiddenInput.setAttribute('value', token.id);
    form.appendChild(hiddenInput);
  
    // Submit the form
    form.submit();
}
</script>

 @endsection

 
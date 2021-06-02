@extends('layouts.app') 


@section('content')
<link rel="stylesheet" href="{{ asset('public/css/style.css') }}" />
<div class="container">
<script src="https://js.stripe.com/v3/"></script>
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
<script>
 var publishable_key = '{{ env('STRIPE_PUBLISHABLE_KEY') }}';
</script>
<script src="{{ asset('public/js/card.js') }}"></script>
</div>
 @endsection

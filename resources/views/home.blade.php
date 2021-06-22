@extends('layouts.app')

@section('content')
 <?php use App\Http\Controllers\UsersController;
 
$type='';
if (Auth::check()) {

$user = auth()->user();
 $iduser=$user->id;
$type=$user->type;
$expire=$user->expire;
} 
$now=date('Y-m-d- H:i');

?>
 <link rel="stylesheet" href="{{ asset('public/css/style.css') }}" />
<script src="https://js.stripe.com/v3/"></script>

<div class="container">

	<?php  if($expire > $now ){
	?>
	 <h2 style="float:right" readonly class="btn btn-success">Abonné jusqu'à <i><?php  echo date('d/m/Y H:i', strtotime( $user->expire ));?></i></h2> 
	<?php
	$abonne=true;
	}
	else
	{
	?>	
	 <h2 style="float:right" readonly class="btn btn-danger">Non Abonné</h2> 
	
	<?php
	$abonne=false;
	}
	
	
	?>
	
  

  					
					
<link  href="{{ asset('/public/css/sb-admin-2.min.css') }}"    rel="stylesheet">
			
	<script src="{{ asset('/public/js/chatify/font.awesome.min.js') }}"></script>
				



 <div class="col-xl-10 col-md-10 mb-10"   style="margin-bottom:25px" >
	<h2>Avantages de l'abonnement Blablate:</h2>
	<ul>
		<li>Accès illimité sur le site</li>
		<li>Création et accès aux salons privés</li>
		<li>Envoi des emails aux membres</li>
		<li>Envoi des images</li>
		<li>Utilisation des Emojis ...</li>
	</ul>
<style>
#card-element{width:100%;margin-bottom:20px;}
</style>
<?php 		 $user = auth()->user();
?>
<form action="{{ url('charge') }}" method="post" id="payment-form" style="">
    <div class="formpayment " style="">
	<img style="width:100px;float:right;margin-right:50px" src="{{ asset('storage/logos/stripe.png') }}"    />
        <div class="row form-group"><input class="form-control" type="hidden" name="amount" placeholder="Montant" value="8.90" /></div>
        <div class="row form-group"><input class="form-control" type="hidden" name="email" placeholder="Email" value="<?php echo UsersController::ChampById('email',$user['id'])?>" /></div>
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
	<?php if($abonne)
	{ ?>
    <button class="btn btn-lg btn-success">Prolonger mon abonnement (8.90 €)</button>
		
	<?php
	}else
	{
		?>
    <button class="btn btn-lg btn-success">S'abonner (8.90 €)</button>
		
	<?php } ?>
    {{ csrf_field() }}
</form>
</div>
<div class="clearfix"></div>

  <div class="row justify-content-center">
   
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
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
	
	
	
	</div>
   <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-6 col-md-6 mb-6"  style="margin-bottom:25px;float:left" >
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div style="font-size:22px;margin-bottom:25px" class="text-xs font-weight-bold text-primary text-uppercase mb-1">Chat</div>
                      <div class=" "><a href="{{ route('chat') }}">Chat</a> </div>
 
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comment fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
 
 
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-6 col-md-6 mb-6"   style="margin-bottom:25px;float:left" >
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div style="font-size:22px;margin-bottom:25px"  class="text-xs font-weight-bold text-success text-uppercase mb-1">Compte</div>
                   <?php if($type=='admin'){ ?>   <div class="  "><a  href="{{route('users')}}">Utilisateurs</a> </div><?php } ?>
                      <div class="  "><a  href="{{route('profile')}}">Mon Profil</a> </div>
                      <div class="  "><a  href="{{route('logout')}}">Déconnexion</a> </div>
                                         </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
  <?php if($type=='admin'){   ?>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-6 col-md-6 mb-6"   style="margin-bottom:25px;float:left" >
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div style="font-size:22px;margin-bottom:25px"  class="text-xs font-weight-bold text-info text-uppercase mb-1">Abonnements</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                      <div class="  "><a  href="{{route('abonnements')}}" >Abonnements </a> </div>
                       </div>
                  
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
			
  <?php } 
  
  if($type=='admin'){ ?>
            <!-- Pending Requests Card Example -->
            <div class="col-xl-6 col-md-6 mb-6"   style="margin-bottom:25px;float:left" >
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div style="font-size:22px;margin-bottom:25px"  class="text-xs font-weight-bold text-warning text-uppercase mb-1">Paramètres</div>
				        <div class="  "><a  href="{{route('salons')}}">Salons </a> </div>
                     </div>
                    <div class="col-auto">
                      <i class="fas  fa-cogs fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
 
  <?php } ?>							
					
					
<style>	
@media (min-width: 1281px) {
  
.formpayment
{width:60%;}
  
}

/* 
  ##Device = Laptops, Desktops
  ##Screen = B/w 1025px to 1280px
*/

@media (min-width: 1025px) and (max-width: 1280px) {
  
.formpayment
{width:60%;}  
}


				
</style>					
					
                </div>
            </div>
  <!--      </div>
    </div>
</div>-->
@endsection

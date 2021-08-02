{{-- ---------------------- Image modal box ---------------------- --}}
<div id="imageModalBox" class="imageModal">
    <span class="imageModal-close">&times;</span>
    <img class="imageModal-content" id="imageModalBoxSrc">
  </div>
  
  {{-- ---------------------- Delete Modal ---------------------- --}}
  <div class="app-modal" data-name="delete">
      <div class="app-modal-container">
          <div class="app-modal-card" data-name="delete" data-modal='0'>
              <div class="app-modal-header">Êtes-vous sûr de vouloir supprimer ceci?</div>
              <div class="app-modal-body">Vous ne pouvez pas annuler cette action</div>
              <div class="app-modal-footer">
                  <a href="javascript:void(0)" class="app-btn cancel">Annuler</a>
                  <a href="javascript:void(0)" class="app-btn a-btn-danger delete">Supprimer</a>
              </div>
          </div>
      </div>
  </div>
  {{-- ---------------------- Alert Modal ---------------------- --}}
  <div class="app-modal" data-name="alert">
      <div class="app-modal-container">
          <div class="app-modal-card" data-name="alert" data-modal='0'>
              <div class="app-modal-header"></div>
              <div class="app-modal-body"></div>
              <div class="app-modal-footer">
                  <a href="javascript:void(0)" class="app-btn cancel">Annuler</a>
              </div>
          </div>
      </div>
  </div>
  {{-- ---------------------- Settings Modal ---------------------- --}}
  <div class="app-modal" data-name="settings">
      <div class="app-modal-container">
          <div class="app-modal-card" data-name="settings" data-modal='0'>
              <form id="updateAvatar" action="{{ route('avatar.update') }}" enctype="multipart/form-data" method="POST">
                  @csrf
                  <div class="app-modal-header">Mettez à jour les paramètres de votre profil</div>
                  <div class="app-modal-body">
                      {{-- Udate profile avatar --}}
                      <div class="avatar av-l upload-avatar-preview"
                      style="background-image: url('{{ asset('storage/app/'.config('chatify.user_avatar.folder').'/'.Auth::user()->avatar) }}');"
                      ></div>
                      <p class="upload-avatar-details"></p>
                      <label class="app-btn a-btn-primary update">
                          Télécharger une photo de profil
                          <input class="upload-avatar" accept="image/*" name="avatar" type="file" style="display: none" />
                      </label>
                      {{-- Dark/Light Mode  --}}
                      <p class="divider"></p>
                      <p class="app-modal-header">Dark Mode <span class="
                        {{ Auth::user()->dark_mode > 0 ? 'fas' : 'far' }} fa-moon dark-mode-switch"
                         data-mode="{{ Auth::user()->dark_mode > 0 ? 1 : 0 }}"></span></p>
                      {{-- change messenger color  --}}
                      <p class="divider"></p>
                      <p class="app-modal-header">Changer {{ config('chatify.name') }} Couleur</p>
                      <div class="update-messengerColor">
                            <a href="javascript:void(0)" class="messengerColor-1"></a>
                            <a href="javascript:void(0)" class="messengerColor-2"></a>
                            <a href="javascript:void(0)" class="messengerColor-3"></a>
                            <a href="javascript:void(0)" class="messengerColor-4"></a>
                            <a href="javascript:void(0)" class="messengerColor-5"></a>
                            <br/>
                            <a href="javascript:void(0)" class="messengerColor-6"></a>
                            <a href="javascript:void(0)" class="messengerColor-7"></a>
                            <a href="javascript:void(0)" class="messengerColor-8"></a>
                            <a href="javascript:void(0)" class="messengerColor-9"></a>
                            <a href="javascript:void(0)" class="messengerColor-10"></a>
                      </div>
                  </div>
                  <div class="app-modal-footer">
                      <a href="javascript:void(0)" class="app-btn cancel">Annuler</a>
                      <input type="submit" class="app-btn a-btn-success update" value="Modifier" />
                  </div>
              </form>
          </div>
      </div>
  </div>
  
  
 {{-- ----------------------  Emojis Modal ---------------------- --}}
  <div class="app-modal" data-name="emojis">
      <div class="app-modal-container">
          <div class="app-modal-card" data-name="emojis" data-modal='0'>
                  <div class="app-modal-header">emojis</div>
                  <div class="app-modal-body">
     
	 <style>
.emoji{float:left; margin-left:10px;cursor:pointer;font-size:32px;}
</style>
<div class="emoji">😀</div> <div class="emoji">😁</div> <div class="emoji">😂</div> <div class="emoji">😃</div> <div class="emoji">😄</div> <div class="emoji">😅</div> <div class="emoji">😆</div> <div class="emoji">😇</div>
<div class="emoji">😈</div> <div class="emoji">😉</div> <div class="emoji">😊</div> <div class="emoji">😋</div> <div class="emoji">😌</div> <div class="emoji">😍</div> <div class="emoji">😎</div> <div class="emoji">😏</div>
<div class="emoji">😐</div> <div class="emoji">😑</div> <div class="emoji">😒</div> <div class="emoji">😓</div> <div class="emoji">😔</div> <div class="emoji">😕</div> <div class="emoji">😖</div> <div class="emoji">😗</div> 
<div class="emoji">😘</div> <div class="emoji">😙</div> <div class="emoji">😚</div> <div class="emoji">😛</div> <div class="emoji">😜</div> <div class="emoji">😝</div> <div class="emoji">😞</div> <div class="emoji">😟</div>
<div class="emoji">😠</div> <div class="emoji">😡</div> <div class="emoji">😢</div> <div class="emoji">😣</div> <div class="emoji">😤</div> <div class="emoji">😥</div> <div class="emoji">😦</div> <div class="emoji">😧</div>
<div class="emoji">😨</div> <div class="emoji">😩</div> <div class="emoji">😪</div> <div class="emoji">😫</div> <div class="emoji">😬</div> <div class="emoji">😭</div> <div class="emoji">😮</div> <div class="emoji">😯</div>
<div class="emoji">😰</div> <div class="emoji">😱</div> <div class="emoji">😲</div> <div class="emoji">😳</div> <div class="emoji">😴</div> <div class="emoji">😵</div> <div class="emoji">😶</div> <div class="emoji">😷</div> 

                  </div>
                  <div class="app-modal-footer">
                      <a href="javascript:void(0)" class="app-btn cancel emojis-close">Fermer</a>
                   </div>
           </div>
      </div>
  </div>
  
 
 {{-- ----------------------  Users Modal ---------------------- --}}
  <div class="app-modal" data-name="userslist">
      <div class="app-modal-container">
          <div class="app-modal-card" data-name="userslist" data-modal='0'>
                  <div class="app-modal-header">Utilisateurs Connectés</div>
                  <div class="app-modal-body" style="padding-top:20px">
     
	   <?php $users= \App\User::where('active_status',1)->get(); ?>
	   
	   <table style="height:300px;overflow-y:scroll;display:block;">
	   <thead>
	   <th>Utilisateur</th><th>Salon</th>
	   </thead>
	   <?php 
	   foreach($users as $user)
	   { 
	   		if($user->sexe=='masculin'){$color='#4167d5';}else{$color='#ec3aa5';}

			$salon=\App\Salon::where('id',$user->salon)->first();
		if($user->salon>0){$tot= '('.\App\User::where('salon',$salon['id'])->where('active_status',1)->count().')'; }else{$tot='';}
			echo '<tr><td>'.$user->prefixe.' '.$user->username.' ('.$user->age.' ans)</td><td>'.$salon['name'].' '.$tot.'</td></tr>';
	   }
	   ?>
	   </table>
	   
	    
 
		
                  </div>
                  <div class="app-modal-footer">
                      <a href="javascript:void(0)" class="app-btn cancel userslist-close">Fermer</a>
                   </div>
           </div>
      </div>
  </div>
  
  
 {{-- ----------------------  Emojis Modal ---------------------- --}}
  <div class="app-modal" data-name="myemojis">
      <div class="app-modal-container">
          <div class="app-modal-card" data-name="myemojis" data-modal='0'>
                  <div class="app-modal-header">Mon Emojis</div>
                  <div class="app-modal-body">
     
	 <style>
.myemoji{float:left; margin-left:10px;margin-bottom:5px;cursor:pointer;font-size:32px;}
</style>
 
<div class="myemoji">❤️</div> <div class="myemoji">💕</div> <div class="myemoji">💔</div> <div class="myemoji">💛</div> <div class="myemoji">💚</div> <div class="myemoji">💙</div> <div class="myemoji">💋</div> <div class="myemoji">👫</div><div class="clearfix"></div>
<div class="myemoji">👸</div> <div class="myemoji">👪</div> <div class="myemoji">💑</div> <div class="myemoji">👱</div> <div class="myemoji">👦</div> <div class="myemoji">👧</div> <div class="myemoji">👰</div> <div class="myemoji">💍</div><div class="clearfix"></div>
<div class="myemoji">👑</div> <div class="myemoji">👒</div> <div class="myemoji">💄</div> <div class="myemoji">💼</div> <div class="myemoji">🎓</div> <div class="myemoji">💩</div> <div class="myemoji">🎨</div> <div class="myemoji">🎬</div><div class="clearfix"></div>
<div class="myemoji">👔</div> <div class="myemoji">🎮</div> <div class="myemoji">‍🎨</div> <div class="myemoji">🎾</div> <div class="myemoji">🎱</div> <div class="myemoji">⚽️</div> <div class="myemoji">🏀</div> <div class="myemoji">♟</div><div class="clearfix"></div>
<div class="myemoji">👨</div> <div class="myemoji">‍💼</div> <div class="myemoji">🍹</div> <div class="myemoji">🍝</div> <div class="myemoji">🍰</div> <div class="myemoji">💐 </div> <div class="myemoji">🎣</div> <div class="myemoji">🎤</div><div class="clearfix"></div>
<div class="myemoji">🎂</div> <div class="myemoji">👅</div> <div class="myemoji">👀</div> <div class="myemoji">🌼</div> <div class="myemoji">🍜</div> <div class="myemoji">🌷</div> <div class="myemoji">🎧</div> <div class="myemoji">🎭</div><div class="clearfix"></div>
<div class="myemoji">😈</div> <div class="myemoji">👿</div> <div class="myemoji">👺</div> <div class="myemoji">🎃</div> <div class="myemoji">👹</div> <div class="myemoji">💀</div> <div class="myemoji">🌺</div> <div class="myemoji">🎲</div><div class="clearfix"></div>
<div style="border:1px solid grey;width:40px;height:40px;" class="myemoji empty"></div>
 <div class="myemoji">👻</div> <div class="myemoji">🌻</div> <div class="myemoji">👽</div> <div class="myemoji">🌾</div> <div class="myemoji">💐</div> <div class="myemoji">👾</div> <div class="myemoji">☠️</div><div class="clearfix"></div>


<div class="clearfix"></div>
       <form  method="post" action="{{ route('setprefixe') }}"   enctype="multipart/form-data">
			  {{ csrf_field() }}
		<input type="hidden" id="input-emojis" name="prefixe" />

		  
		   <div class="form-group">
			<div class="row">
			<div class="col-lg-12">
				<button  type="submit"  class="btn btn-primary">Insérer</button>
			</div>
		 
			</div>
			</div>
		
		</form>	
		
                  </div>
                  <div class="app-modal-footer">
                      <a href="javascript:void(0)" class="app-btn cancel myemojis-close">Fermer</a>
                   </div>
           </div>
      </div>
  </div>

  
	
 {{-- ----------------------  Salons Modal ---------------------- --}}
  <div class="app-modal" data-name="salons">
      <div class="app-modal-container">
          <div class="app-modal-card" data-name="salons" data-modal='0'>
                  <div class="app-modal-header"><b>Créer un salon</b></div>
                  <div class="app-modal-body">	
	
    <form method="post"    enctype="multipart/form-data">
			  {{ csrf_field() }}
   				 
       <div class="form-group" style="margin-top:20px">
			<div class="row">
			  <div class="col-lg-12">
                <label for="image">Image :</label>
                    <input id="salon_img" type="file" class="form-control" name="image"  accept="image/*"/>
 			 </div>
			
			
          </div>
        </div> 
		
           <div class="form-group">
			<div class="row">
			  <div class="col-lg-12">
                <label for="name">Nom *:</label>
                <input id="salon_nom"   type="text" class="form-control" name="name"  value="" required />
 			 </div>
			
			
          </div>
        </div> 
		
	     <div class="form-group">
			<div class="row">
			<div class="col-lg-12">	
			<label for="description">Description:</label>
				<textarea class="form-control" name="description" id="salon_desc"></textarea>
			 </div>
			
			
          	 </div>
          </div>  
				 
        <input type="hidden"name="type" id="salon_type" value="vip"/>

		   <div class="form-group">
			<div class="row">
			<div class="col-lg-12">
				<button  type="button"  onclick="addsalon()" class="btn btn-primary">Créer Salon</button>
			</div>
			 
			</div>
			</div>
			
			</form>	

                  </div>
                  <div class="app-modal-footer">
                      <a href="javascript:void(0)" class="app-btn cancel salons-close">Fermer</a>
                   </div>
           </div>
      </div>
  </div>			
  
  
   {{-- ----------------------  Send Message Modal ---------------------- --}}
  <div class="app-modal" data-name="email">
      <div class="app-modal-container">
          <div class="app-modal-card" data-name="email" data-modal='0'>
                  <div class="app-modal-header"><B>Envoyer un email</B></div>
                  <div class="app-modal-body">
         <form  method="post" action="{{ route('sendemail') }}"   enctype="multipart/form-data">
			  {{ csrf_field() }}
		 <input type="hidden" id="user-email" name="user-email" > 
		 
	 	   <div class="form-group" style="margin-top:20px">
			<div class="row">
			<div class="col-lg-12">	
			<label for="content">Message:</label>
				<textarea class="form-control" name="content" id="content"></textarea>
			 </div>
		 
          	 </div>
          </div>  
		  
		  
		   <div class="form-group">
			<div class="row">
			<div class="col-lg-12">
				<button  type="submit"  class="btn btn-primary">Envoyer</button>
			</div>
		 
			</div>
			</div>
		
		</form>		
			
				  </div>
                  <div class="app-modal-footer">
                      <a href="javascript:void(0)" class="app-btn cancel email-close">Fermer</a>
                   </div>
           </div>
      </div>
  </div>	 
  
  
  
    
   {{-- ----------------------  Gift Modal ---------------------- --}}
  <div class="app-modal" data-name="gift">
      <div class="app-modal-container">
          <div class="app-modal-card" data-name="gift" data-modal='0'>
                  <div class="app-modal-header"><B>Envoyer un Cadeau</B></div>
                  <div class="app-modal-body">

 <link rel="stylesheet" href="{{ asset('public/css/style.css') }}" />
<script src="https://js.stripe.com/v3/"></script>

<style>
#card-element{width:100%;margin-bottom:20px;}
</style>
<?php 		 $user = auth()->user();
?>
<form action="{{ url('charge') }}" method="post" id="payment-form" style="">
	  <input type="hidden" id="user-gift" name="usergift" > 
<br>
    <div class="formpayment " style="">
	<img style="width:100px;float:right;margin-right:50px" src="{{ asset('storage/logos/cards.png') }}"    />
        <div class="row form-group">
		<!--<input class="form-control" type="hidden" name="amount" placeholder="Montant" value="8.90" />-->
				<select name="amount" required >
				<option value="7.90">Diamond (7.90 €)</option>
				<option value="5.90">Premium (5.90 €)</option>
				</select>
		</div>
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
 
    <button class="btn btn-lg btn-success">Envoyer un cadeaux </button>
		
	 
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
                  <div class="app-modal-footer">
                      <a href="javascript:void(0)" class="app-btn cancel gift-close">Fermer</a>
                   </div>
           </div>
      </div>
  </div>	 
  
  
  
  
  
    {{-- ----------------------  protection Modal ---------------------- --}}
  <div class="app-modal" data-name="protection">
      <div class="app-modal-container">
          <div class="app-modal-card" data-name="protection" data-modal='0'>
                  <div class="app-modal-header"><B>Protection</B></div>
                  <div class="app-modal-body">
         <form  method="post" action="{{ route('protection') }}"   enctype="multipart/form-data">
			  {{ csrf_field() }}
 		 
			<br><br>Voulez vous vraiment activer la protection Anti Bloquage<br> (1 heure, 1 fois par jour) ?<br><br>
		  
		  
		   <div class="form-group">
			<div class="row">
			<div class="col-lg-12">
				<button  type="submit"  id="" class="btn btn-primary">Activer</button>
			</div>
		 
			</div>
			</div>
		
		</form>		
			
				  </div>
                  <div class="app-modal-footer">
                      <a href="javascript:void(0)" class="app-btn cancel protection-close">Fermer</a>
                   </div>
           </div>
      </div>
  </div>	 
  
  
  
  
      
   {{-- ----------------------  Signal Modal ---------------------- --}}
  <div class="app-modal" data-name="signal">
      <div class="app-modal-container">
          <div class="app-modal-card" data-name="signal" data-modal='0'>
                  <div class="app-modal-header"><B>Signaler</B></div>
                  <div class="app-modal-body">
         <form  method="post" action="{{ route('signaler') }}"   enctype="multipart/form-data">
			  {{ csrf_field() }}
		 <input type="hidden" id="user-signal" name="user-signal" > 
		 
			<br><br>Voulez vous vraiment Signaler cet utilisateur ?<br><br>
		  
		  
		   <div class="form-group">
			<div class="row">
			<div class="col-lg-12">
				<button  type="button"  id="signaluser" class="btn btn-primary">Signaler</button>
			</div>
		 
			</div>
			</div>
		
		</form>		
			
				  </div>
                  <div class="app-modal-footer">
                      <a href="javascript:void(0)" class="app-btn cancel signal-close">Fermer</a>
                   </div>
           </div>
      </div>
  </div>	 
  
  
  
  
  
   {{-- ----------------------  Bloc Modal ---------------------- --}}
  <div class="app-modal" data-name="bloc">
      <div class="app-modal-container">
          <div class="app-modal-card" data-name="bloc" data-modal='0'>
                  <div class="app-modal-header"><B>Bloquer</B></div>
                  <div class="app-modal-body">
         <form  method="post" action="{{ route('bloqueruser') }}"   enctype="multipart/form-data">
			  {{ csrf_field() }}
		 <input type="hidden" id="user-bloc" name="user" > 
		 
			<br><br>Voulez vous vraiment Bloquer cet utilisateur ?<br><br>
		  
		  
		   <div class="form-group">
			<div class="row">
			<div class="col-lg-12">
				<button  type="submit"  id="blocuser" class="btn btn-primary">Bloquer</button>
			</div>
		 
			</div>
			</div>
		
		</form>		
			
				  </div>
                  <div class="app-modal-footer">
                      <a href="javascript:void(0)" class="app-btn cancel bloc-close">Fermer</a>
                   </div>
           </div>
      </div>
  </div>	 
  
  
  

	
	










 
  
 <style> 
  
 
 /* 
  ##Device = Desktops
  ##Screen = 1281px to higher resolution desktops
*/

@media (min-width: 1281px) {
  
  /* CSS */
  
}

/* 
  ##Device = Laptops, Desktops
  ##Screen = B/w 1025px to 1280px
*/

@media (min-width: 1025px) and (max-width: 1280px) {
  
 .myemoji , .emoji
 {
	 font-size:28px!important;
 }  
}

/* 
  ##Device = Tablets, Ipads (portrait)
  ##Screen = B/w 768px to 1024px
*/

@media (min-width: 768px) and (max-width: 1024px) {
  
 .myemoji , .emoji
 {
	 font-size:24px!important;
 }  
}

/* 
  ##Device = Tablets, Ipads (landscape)
  ##Screen = B/w 768px to 1024px
*/

@media (min-width: 768px) and (max-width: 1024px) and (orientation: landscape) {
  
 .myemoji , .emoji
 {
	 font-size:22px!important;
 }  
}

/* 
  ##Device = Low Resolution Tablets, Mobiles (Landscape)
  ##Screen = B/w 481px to 767px
*/

@media (min-width: 481px) and (max-width: 767px) {
  
 .myemoji , .emoji
 {
	 font-size:20px!important;
 }  
}

/* 
  ##Device = Most of the Smartphones Mobiles (Portrait)
  ##Screen = B/w 320px to 479px
*/

@media (min-width: 320px) and (max-width: 480px) {
  
 .myemoji , .emoji
 {
	 font-size:20px!important;
 }
  
}
 
 
 
 </style> 
 
 
 
 
 
 
 
@include('Chatify::layouts.headLinks')
<div class="messenger" >
    {{-- ----------------------Users/Groups lists side---------------------- --}}
<?php  if (Auth::check()) {

$user = auth()->user();
 $iduser=$user->id;
  $abonnement=$user->abonnement;

$type=$user->type;
$statut=$user->statut;

$expire=Auth::user()->expire;
$now=date('Y-m-d- H:i');
if($expire > $now ){
	$abonne=true;
}else{
	$abonne=false;
}

} 


?>
    <div class="messenger-listView">
        {{-- Header and search bar --}}
        <div class="m-header">
            <nav>
                <a href="#"><i class="fas fa-inbox"></i> <span class="messenger-headTitle"> <?php echo Auth::user()->prefixe .' '. Auth::user()->username ;?></span><?php if($statut==2){echo '<span style="margin-left:30px" class="btn btn-danger">Bloqué</span>';}  if($abonne==2){echo '<span style="margin-left:30px" class="btn btn-success">Abonné</span>';}else{echo '<span style="margin-left:30px" class="btn btn-danger">Non Abonné</span>';} ?> </a>
                {{-- header buttons --}}
                <nav class="m-header-right">
<?php  if($abonne && $statut < 2  &&  $abonnement==2 ){ ?>
<a href="javascript:void(0)" class=" myemojis-btn"><i class="fas fa-smile"></i></a> 
<a href="javascript:void(0)" class=" protection-btn"><i class="fas fa-trophy"></i></a> 
<?php   } ?>				
                    <a href="javascript:void(0)"><i class="fas fa-cog settings-btn"></i></a>
                    <a href="javascript:void(0)" class="listView-x"><i class="fas fa-times"></i></a>

                </nav>
            </nav>
            {{-- Search input --}}
            <input type="text" class="messenger-search" placeholder="Recherche par pseudo ou ville" />
            {{-- Tabs --}}
            <div class="messenger-listView-tabs">
                <a id="personnes" href="javascript:void(0)" @if($route == 'user') class="active-tab" @endif data-view="users">
                    <span class="far fa-user"></span> Personnes</a>
                <a id="salons" href="javascript:void(0)" @if($route == 'group') class="active-tab" @endif data-view="groups">
                    <span class="fas fa-users" ></span> Salons</a>
            </div>
        </div>
        {{-- tabs and lists --}}
        <div class="m-body">
           {{-- Lists [Users/Group] --}}
           {{-- ---------------- [ User Tab ] ---------------- --}}
           <div class="@if($route == 'user') show @endif messenger-tab app-scroll" data-view="users">

               {{-- Favorites --}}
               <p style='margin-top:15px' class="messenger-title">Favoris</p>
                <div class="messenger-favorites app-scroll-thin"></div>

               {{-- Saved Messages --}}
               {!! view('Chatify::layouts.listItem', ['get' => 'saved','id' => $id])->render() !!}

               {{-- Contact --}}
               <div class="listOfContacts" style="width: 100%;height: calc(100% - 200px);"></div>
               
           </div>

           {{-- ---------------- [ Group Tab ] ---------------- --}}
           <div class="@if($route == 'group') show @endif messenger-tab app-scroll" data-view="groups">
                {{-- items --}}
               {!! view('Chatify::layouts.salons', ['get' => 'saved','id' => $id])->render() !!}
             </div>

             {{-- ---------------- [ Search Tab ] ---------------- --}}
           <div class="messenger-tab app-scroll" data-view="search">
                {{-- items --}}
                <p class="messenger-title">Recherche</p>
                <div class="search-records">
                    <p class="message-hint"><span>Tapez pour chercher..</span></p>
                </div>
             </div>
        </div>
    </div>

    {{-- ----------------------Messaging side---------------------- --}}
    <div class="messenger-messagingView">
        {{-- header title [conversation name] amd buttons --}}
        <div class="m-header m-header-messaging">
            <nav>
                {{-- header back button, avatar and user name --}}
                <div style="display: inline-flex;">
                    <a href="javascript:void(0)" class="show-listView"><i class="fas fa-arrow-left"></i></a>
                    <div class="avatar av-s header-avatar" style="margin: 0px 10px; margin-top: -5px; margin-bottom: -5px;">
                    </div>
                    <a href="javascript:void(0)" class="user-name" style="font-family:'Nunito';margin-right:50px;">{{ config('chatify.name') }}</a>
               
  @if ($errors->any())
             <div class="alert alert-danger">
                 <ul>
                     @foreach ($errors->all() as $error)
                         <li>{{ $error }}</li>
                     @endforeach
                 </ul>
             </div><br />
         @endif

    @if (!empty( Session::get('success') ))
        <div class="alert alert-success">
        {{ Session::get('success') }}
        </div>

    @endif				   
			   
			   </div>
                {{-- header buttons --}}
                <nav class="m-header-right">
                    <a href="javascript:void(0)" class="add-to-favorite"><i class="fas fa-star"></i></a>
                    <a href="{{ route('home') }}"><i class="fas fa-home"></i></a>
                    <a href="javascript:void(0)" class="show-infoSide"><i class="fas fa-info-circle"></i></a>
                </nav>
            </nav>
        </div>
        {{-- Internet connection --}}
        <div class="internet-connection">
            <span class="ic-connected">Connecté</span>
            <span class="ic-connecting">Connexion...</span>
            <span class="ic-noInternet">Pas d'accès Internet</span>
        </div>
        {{-- Messaging area --}}
        <div class="m-body app-scroll">
            <div class="messages">
                <p class="message-hint" style="margin-top: calc(30% - 126.2px);"><span>Veuillez sélectionner un chat pour commencer la messagerie</span></p>
            </div>
            {{-- Typing indicator --}}
            <div class="typing-indicator">
                <div class="message-card typing">
                    <p>
                        <span class="typing-dots">
                            <span class="dot dot-1"></span>
                            <span class="dot dot-2"></span>
                            <span class="dot dot-3"></span>
                        </span>
                    </p>
                </div>
            </div>
            {{-- Send Message Form --}}
            @include('Chatify::layouts.sendForm')
        </div>
    </div>
    {{-- ---------------------- Info side ---------------------- --}}
    <div class="messenger-infoView app-scroll">
        {{-- nav actions --}}
        <nav>
            <a href="javascript:void(0)"><i class="fas fa-times"></i></a>
        </nav>
        {!! view('Chatify::layouts.info')->render() !!}
    </div>
</div>

 
@include('Chatify::layouts.modals')
@include('Chatify::layouts.footerLinks')
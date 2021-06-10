<?php
$statut=Auth::user()->statut;
$expire=Auth::user()->expire;
$now=date('Y-m-d- H:i');
if($expire > $now ){
	$abonne=true;
}else{
	$abonne=false;

}
?>

{{-- user info and avatar --}}
<div class="avatar av-l"  style="background-image: url('{{ asset('storage/logos/blabla.png') }}');"></div><br>
<center><span style="color:#f9b12b;margin:15px 15px 15px 15px;" class="abonne"></span></center><br><p class="info-name" style="font-family:'Nunito'">{{ config('chatify.name') }}</p>
<p class="ville" style="font-family:'Nunito';font-weight:bold"></p>
<p class="bio" style="font-family:'Nunito';font-weight:normal;font-size:13px"></p><br>


{{-- Liste des membres salon --}}
<div id="salon-users">
 
</div>

<style>
.list-users{ 
	text-align: left;
    padding-left: 60px;
    font-weight: 600;
    list-style: none;
}
</style>
<?php if($abonne && $statut < 2){ ?>
<center><button id='send-email'   class="email-btn btn btn-info" style="color:white"><i class="fa fa-envelope"></i>  Envoyer un email</button></center>
<?php } ?>
<div class="messenger-infoView-btns">
    {{-- <a href="#" class="default"><i class="fas fa-camera"></i>par défault</a> --}}
    <a href="#" class="danger delete-conversation"><i class="fas fa-trash-alt"></i> Supprimer la conversation</a>
</div>
{{-- shared photos --}}
<div class="messenger-infoView-shared">
    <p class="messenger-title">Images paratagées</p>
    <div class="shared-photos-list"></div>
</div>
{{-- user info and avatar --}}
<div class="avatar av-l"  style="background-image: url('{{ asset('storage/logos/blabla.png') }}');"></div>
<p class="info-name" style="font-family:'Nunito'">{{ config('chatify.name') }}</p>
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

<div class="messenger-infoView-btns">
    {{-- <a href="#" class="default"><i class="fas fa-camera"></i>par défault</a> --}}
    <a href="#" class="danger delete-conversation"><i class="fas fa-trash-alt"></i> Supprimer la conversation</a>
</div>
{{-- shared photos --}}
<div class="messenger-infoView-shared">
    <p class="messenger-title">Images paratagées</p>
    <div class="shared-photos-list"></div>
</div>
{{-- user info and avatar --}}
<div class="avatar av-l"  style="background-image: url('{{ asset('storage/logos/bb.png') }}');"></div>
<p class="info-name" style="font-family:'Nunito'">{{ config('chatify.name') }}</p>
<div class="messenger-infoView-btns">
    {{-- <a href="#" class="default"><i class="fas fa-camera"></i>par défault</a> --}}
    <a href="#" class="danger delete-conversation"><i class="fas fa-trash-alt"></i> Supprimer la conversation</a>
</div>
{{-- shared photos --}}
<div class="messenger-infoView-shared">
    <p class="messenger-title">Images paratagées</p>
    <div class="shared-photos-list"></div>
</div>
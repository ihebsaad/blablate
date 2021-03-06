

{{-- -------------------- All users/group list -------------------- --}}
@if($get == 'users')
<table class="messenger-list-item @if($user->id == $id && $id != "0") m-list-active @endif" data-contact="{{ $user->id }}">
    <tr data-action="0">
        {{-- Avatar side --}}
        <td style="position: relative">
            @if($user->active_status)
                <span class="activeStatus"></span>
            @endif
        <div class="avatar av-m" 
        style="background-image: url('{{ asset('storage/app/'.config('chatify.user_avatar.folder').'/'.$user->avatar) }}');">
        </div>
        </td>
        {{-- center side --}}
        <td>
			<?php
			// vérifier si utilisateur bloqué
			$mon_id=Auth::user()->id;
			  $blocs1=\App\Bloc::where('par',$mon_id)->where('user',$user->id)->count();
			  $blocs2=\App\Bloc::where('par',$user->id)->where('user',$mon_id)->count();
			  $blocs= $blocs1+$blocs2; 
			  if($blocs>0){
			  $suffixe='[🚫 Bloqué]';
			  }
			  else{
				  $suffixe='';				  
			  }
			  // Protection
			  $now=date('Y-m-d H:i:s');
			  if($user->protection>$now){
				$suffixe.=' [ 👑 Protégé]';  
			  }
			  
			  ?>
        <p data-id="{{ $type.'_'.$user->id }}">
            {{ strlen($user->username) > 12 ? trim(substr($user->username,0,12)).'..' : $user->prefixe.' '.$user->username.' '.$suffixe }} 
        <?php if(isset($lastMessage)){?>    <span>{{ $lastMessage->created_at->diffForHumans() }}</span></p>
        <span>
            {{-- Last Message user indicator --}}
            {!!
                $lastMessage->from_id == Auth::user()->id 
                ? '<span class="lastMessageIndicator">Vous :</span>'
                : ''
            !!}
            {{-- Last message body --}}
            @if($lastMessage->attachment == null)
            {{
                strlen($lastMessage->body) > 30 
                ? trim(substr($lastMessage->body, 0, 30)).'..'
                : $lastMessage->body
            }}
            @else
            <span class="fas fa-file"></span> Attachement
            @endif
        </span>
        {{-- New messages counter --}}
            {!! $unseenCounter > 0 ? "<b>".$unseenCounter."</b>" : '' !!}
        <?php } ?></td>
        
    </tr>
</table>
@endif

{{-- -------------------- Search Item -------------------- --}}
@if($get == 'search_item')
<table class="messenger-list-item" data-contact="{{ $user->id }}">
    <tr data-action="0">
        {{-- Avatar side --}}
        <td>
        <div class="avatar av-m"
        style="background-image: url('{{ asset('storage/app/'.config('chatify.user_avatar.folder').'/'.$user->avatar) }}');">
        </div>
        </td>
        {{-- center side --}}
        <td>
        <p data-id="{{ $type.'_'.$user->id }}">
            {{ strlen($user->username) > 12 ? trim(substr($user->username,0,12)).'..' : $user->username }} 
        </td>
        
    </tr>
</table>
@endif

{{-- -------------------- Shared photos Item -------------------- --}}
@if($get == 'sharedPhoto')
<div class="shared-photo chat-image" style="background-image: url('{{ $image }}')"></div>
@endif


<input id="id_user" type="hidden" value="<?php echo Auth::user()->id ;?>">
<script>

    
</script>
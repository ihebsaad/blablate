

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
        <p data-id="{{ $type.'_'.$user->id }}">
            {{ strlen($user->username) > 12 ? trim(substr($user->username,0,12)).'..' : $user->username }} 
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
            {{ strlen($user->name) > 12 ? trim(substr($user->name,0,12)).'..' : $user->name }} 
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

    $('.salons').click(function(){
    // var  messenger = $(this).find('p[data-id]').attr('data-id');
	// var salon= messenger.split('_')[1];
   //  var   messenger = $(this).attr('data-id');
         //  var type = $('#type').val();
        var user = $('#id_user').val();
         //if ( (val != '')) {
       // var _token = $('input[name="_token"]').val();
        var _token = $('meta[name="csrf-token"]').attr('content');
		
        $.ajax({
            url: "{{ route('users.updating') }}",
            method: "POST",
            data: {user: user , champ:'salon' ,val:0, _token: _token},
            success: function (data) {
      
             }
        });
        // } else {

        // }
   });

</script>
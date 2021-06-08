{{-- -------------------- The default card (white) -------------------- --}}
<?php 
//use DB;
use App\Http\Controllers\UsersController;

  $Message=DB::table('messages')->where('id',$id)->first() ;
  if (Auth::check()) {

$user = auth()->user();
 $iduser=$user->id;
$type=$user->type;
} 
  
  ?>
@if($viewType == 'default')
    @if($from_id != Auth::user()->id)
    <div class="message-card" data-id="{{ $id }}"  id='message-{{ $id }}' >
	@if($Message->salon >0)<div class="sender" style="border-radius:15px;padding:3px 3px;color:white;background-color:<?php echo UsersController::ChampById('messenger_color',$from_id);?>"><?php echo UsersController::ChampById('username',$from_id);?></div><br> @endif
        <p>{!! ($message == null && $attachment != null && @$attachment[2] != 'file') ? $attachment[1] : nl2br($message) !!}
            <sub title="{{ $fullTime }}">{{ $time }}</sub>
            {{-- If attachment is a file --}}
            @if(@$attachment[2] == 'file')
            <a href="{{ route(config('chatify.attachments.route'),['fileName'=>$attachment[0]]) }}" style="color: #595959;" class="file-download">
                <span class="fas fa-file"></span> {{$attachment[1]}}</a>
            @endif
        </p>
    </div>
    {{-- If attachment is an image --}}
    @if(@$attachment[2] == 'image')
    <div id='message-{{ $id }}' >
        <div class="message-card">
	@if($Message->salon >0)<div class="sender" style="border-radius:15px;padding:3px 3px;color:white;background-color:<?php echo UsersController::ChampById('messenger_color',$from_id);?>"><?php echo UsersController::ChampById('username',$from_id);?></div><br> @endif
            <div class="image-file chat-image" style="width: 250px; height: 150px;background-image: url('{{ asset('storage/app/'.config('chatify.attachments.folder').'/'.$attachment[0]) }}')">
            </div>
        </div>
    </div>
    @endif
    @endif
	<?php if($user->type=='admin'){ ?><a   style="margin-left:5px;margin-bottom:5px;" href="{{action('UsersController@deletemsg', $id)}}"><i class="fa fa-trash"></i></a><?php } ?>
@endif

{{-- -------------------- Sender card (owner) -------------------- --}}
@if($viewType == 'sender')
    <div class="message-card mc-sender" data-id="{{ $id }}">
         <p>{!! ($message == null && $attachment != null && @$attachment[2] != 'file') ? $attachment[1] : nl2br($message) !!}
            <sub title="{{ $fullTime }}" class="message-time">
                <span class="fas fa-{{ $seen > 0 ? 'check-double' : 'check' }} seen"></span>{{ $time }}</sub>
                {{-- If attachment is a file --}}
            @if(@$attachment[2] == 'file')
            <a href="{{ route(config('chatify.attachments.route'),['fileName'=>$attachment[0]]) }}" class="file-download">
                <span class="fas fa-file"></span> {{$attachment[1]}}</a>
            @endif
        </p>
    </div>
    {{-- If attachment is an image --}}
    @if(@$attachment[2] == 'image')
    <div>
        <div class="message-card mc-sender">
            <div class="image-file chat-image" style="width: 250px; height: 150px;background-image: url('{{ asset('storage/app/'.config('chatify.attachments.folder').'/'.$attachment[0]) }}')">
            </div>
        </div>
    </div>
    @endif
@endif

  
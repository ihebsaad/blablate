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
<div class="messenger-sendCard">
  <?php if($statut<2 ){  ?> 
  <form id="message-form" method="POST" action="{{ route('send.message') }}" enctype="multipart/form-data">
        @csrf
		<input type="hidden" id="salon" value="0" />
		<input type="hidden" id="current_user" value="<?php echo Auth::user()->id  ?>" />
 <?php if($abonne){?>      <label><span class="fas fa-paperclip"></span><input disabled='disabled' type="file" class="upload-attachment" name="file" accept="image/*, .txt, .rar, .zip" /></label><?php } ?>
 <?php if($abonne){?>      <label class="emojis-btn"><span class="fas fa-smile"></span>  </label><?php } ?>
        <textarea readonly='readonly' name="message" class="m-send app-scroll" placeholder="Tapez un message.."></textarea>
   <button disabled='disabled'><span class="fas fa-paper-plane"></span></button> 
    </form>
	<?php } ?>
</div>
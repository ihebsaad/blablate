<div class="messenger-sendCard">
    <form id="message-form" method="POST" action="{{ route('send.message') }}" enctype="multipart/form-data">
        @csrf
		<input type="hidden" id="salon" value="0" />
        <label><span class="fas fa-paperclip"></span><input disabled='disabled' type="file" class="upload-attachment" name="file" accept="image/*, .txt, .rar, .zip" /></label>
        <label class="emojis-btn"><span class="fas fa-smile"></span>  </label>
        <textarea readonly='readonly' name="message" class="m-send app-scroll" placeholder="Tapez un message.."></textarea>
        <button disabled='disabled'><span class="fas fa-paper-plane"></span></button>
    </form>
</div>
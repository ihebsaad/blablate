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
<div class="emoji">😀</div> <div class="emoji">😁</div> <div class="emoji">😂</div> <div class="emoji">😃</div> <div class="emoji">😄</div> <div class="emoji">😅</div> <div class="emoji">😆</div> <div class="emoji">😇</div> <div class="emoji">😈</div> <div class="emoji">😉</div> <div class="emoji">😊</div> <div class="emoji">😋</div> <div class="emoji">😌</div> <div class="emoji">😍</div> <div class="emoji">😎</div> <div class="emoji">😏</div>
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
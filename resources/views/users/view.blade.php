
@extends('layouts.app') 
 
@section('content')
   <style>.btn{margin-top:15px;}</style>

<div class="container">

     <input type="hidden" id="iduser" value="{{$user->id}}" name="id" />
        
 		<img style="width:100px;float:right;margin-right:50px" src="{{ asset('storage/app/'.config('chatify.user_avatar.folder').'/'.$user->avatar) }}"    />
		 <div class="clearfix"></div>
          <div class="form-group">
			<div class="row">
			  <div class="col-lg-6">
                <label for="username">Pseudo:</label>
                <input id="username"   type="text" class="form-control" name="username"  value="{{ $user->username }}"  readonly/>
 			 </div>
			 <div class="col-lg-6">
                    <label for="email">Adresse Email:</label>
               <input id="email" autocomplete="off"  type="text" class="form-control" name="email" id="email" value="{{ $user->email }}"  />                 
            
			 <?php if($user->email_verified_at==null){?><span class="btn btn-danger"> Non vérifié</span><?php }else{?><span class="btn btn-success"> Vérifié</span><?php } ?>

			</div>
          </div>
        </div> 
		
		
          <div class="form-group">
			<div class="row">
			  <div class="col-lg-6">
              <label for="eleve">Age:</label>
              <input id="naissance" autocomplete="off"  type="text" class="form-control datepicker"  name="age"  id="age" value="{{ $user->age }}" />
 			 </div>
			 <div class="col-lg-6">
			 <label for="eleve">Sexe:</label>
              <input id="sexe" autocomplete="off"  type="text" class="form-control datepicker"  name="sexe"  id="sexe" value="{{ $user->sexe }}" />
             </div>
          </div>
        </div>
			  
				 
                <div class="form-group">
                    <label for="eleve">N° Tel:</label>
			<div class="row">
			<div class="col-lg-6">
			<input id="tel"   type="text" class="form-control" name="tel"  id="tel" value="{{ $user->tel }}" />
          	 </div>
			 <div class="col-lg-6">
			 <?php if($user->tel_valide==0){?><span class="btn btn-danger"> Non vérifié</span><?php }else{?><span class="btn btn-success"> Vérifié</span><?php } ?>
          	 </div>
          	 </div>
          	 </div>
			 
			 <div class="form-group">
                    <label for="eleve">Biographie:</label>

			<textarea  class="form-control" name="bio"  id="bio">{{ $user->bio }}</textarea>
          	 </div>
</div>		

@endsection			 
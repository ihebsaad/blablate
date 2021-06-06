@extends('layouts.app')
 
 @section('content')
  <?php
//use App\Http\Controllers\HomeController ;

 
  ?>
  <style>.btn{margin-top:15px;}</style>
  
	<div class="row">
 <div class="col-lg-2  ">
 </div>
                        <!-- Content Column -->
                        <div class="col-lg-9 mb-4">

						 <div class="card shadow mb-4">
                                <div class="  ">
                                    <a href="#div1" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">								
                                    <h6 class="m-0 font-weight-bold text-primary">Mon profil</h6>
									</a>
                                </div>
                                <div id="div1" class="card-body">

                                    <form class="user"   method="post" action="{{ route('updateuser') }}"    >
                                        <input type="hidden" value="{{$id}}" id="iduser" name="user">
                                        {{ csrf_field() }}
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
											<label>Pseudo</label>											
                                                <input type="text" class="form-control form-control-user" id="username" name="username"  readonly value="{{ $user->username }}"   
                                                       placeholder="Pseudo"/>
                                       
										
                                            </div>
                                             <div class="col-sm-6">
											<!-- 	<label>Nom complet</label>
                                                <input type="text" class="form-control form-control-user" id="name" name="name"  value="{{ $user->name }}"   
                                                       placeholder="Nom">
															-->
												<label>Adresse Email</label>											
                                                <input type="email" class="form-control form-control-user" id="email" name="email"  readonly value="{{ $user->email }}"
                                                       placeholder="Adresse Email">	
			 <?php if($user->email_verified_at==null){?><span class="btn btn-danger"> Non vérifié</span> <a style="margin:10px 10px" href="{{ route('verify') }}"> vérfier mon email</a> <?php }else{?><span class="btn btn-success"> Vérifié</span><?php } ?>
											 
											     </div> 

                                        </div>
                                        <style>
                                            #sexe:placeholder-shown{
                                                color: darkgrey;
                                            }								 
                                        </style>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
											<label>Sexe</label>											
                                                <select class="form-control  " id="sexe" name="sexe"  placeholder="Sélectionnez votre sexe"   
                                                        style="font-size: 0.8rem;border-radius: 10rem;padding-left:15px;padding-top:10px;height:50px;font-family:Nunito">
                                                     <option value="masculin" <?php if($user->sexe=='masculin'){echo 'selected="selected"';}  ?> >Homme</option>
                                                    <option value="feminin" <?php if($user->activity=='feminin'){echo 'selected="selected"';}  ?> >Femme</option>
                                                  </select>
                                            </div>
                                            <div class="col-sm-6 mb-3 mb-sm-0">
											 <label>Age</label>											
                                                <input type="text" class="form-control form-control-user" id="age"  name="age"   value="{{ $user->age }}"
                                               placeholder="Age*">
											 
			
                                         											
                                             </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
											<label>Téléphone Mobile</label>											
                                                <input type="text" class="form-control form-control-user" id="tel" name="tel" pattern=".{10,10}" value="{{ $user->tel }}"   
                                                       placeholder="Téléphone Mobile">
                                            </div>
                                            <div class="col-sm-6 mb-3 mb-sm-0">
										  <?php if($user->tel_valide==0){?><span class="btn btn-danger"> Non vérifié</span><?php }else{?><span class="btn btn-success"> Vérifié</span><?php } ?>
											</div>
											
											
                                        </div>

                                        <div class="form-group row">
                         
                                       <div class="col-sm-6 mb-3 mb-sm-0">
											<label>Mot de passe</label>											
                                                <input type="password" class="form-control form-control-user" name="password"   pattern=".{6,30}"    style="width:100%"  autocomplete="off"
                                                       id="password" placeholder="Mot de passe">
 										 </div>
										<div class="col-sm-6 mb-3 mb-sm-0">
										<label>Confirmation</label>											
                                                <input type="password" class="form-control form-control-user" name="confirmation"   pattern=".{6,30}"    style="width:100%"  autocomplete="off"
                                                       id="confirmation" placeholder="Confirmation">
										 
                                        </div>
                                        </div>
										 <div class="form-group row">

                                            <div class="col-sm-6 mb-3 mb-sm-0">
											<label>Ville</label>											
                                                <input type="text" class="form-control form-control-user" name="ville"   value="{{ $user->ville }}"    style="width:100%"  autocomplete="off"
                                                       id="ville" placeholder="Ville">   
											</div>
											
                                            <div class="col-sm-6 mb-3 mb-sm-0">
											<label>Bibliographie</label>											
											<textarea class="form-control form-control-user" name="bio" id="bio">{{$user->bio}}</textarea>
											</div>
											
										</div>

                                        <div class="form-group row pl-20">

								<button value="update"  name="update"   type="submit"  class="pull-right btn btn-success btn-icon-split ">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-save"></i>
                                        </span>
                                        <span class="text" style="width:120px" >Modifier</span>
                                    </button>
                                        </div>

                                    </form>


                                </div>
                            </div>
 

                       

                        </div>

 
 
 				
   </div>


    <script>

 function showing(elm) {
  var div  = document.getElementById('lesadresses');
 
  if ( div.style.display == 'none'){
	  $('#lesadresses').fadeIn('slow');
 }else{ 
 	  $('#lesadresses').fadeOut('slow');

 }

 }
 
 
    /*    function changing(elm) {
            var champ = elm.id;

            var val = document.getElementById(champ).value;

            var user = $('#iduser').val();
            //if ( (val != '')) {
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: "{{ route('users.updating') }}",
                method: "POST",
                data: {user: user, champ: champ, val: val, _token: _token},
                success: function (data) {
                    $('#' + champ).animate({
                        opacity: '0.1',
                    });
                    $('#' + champ).animate({
                        opacity: '1',
                    });

                    $.notify({
                        message: 'Modifié avec succès',
                        icon: 'glyphicon glyphicon-check'
                    },{
                        type: 'success',
                        delay: 3000,
                        timer: 1000,
                        placement: {
                            from: "bottom",
                            align: "right"
                        },
                    });

                }
            });

        }
		*/

    </script>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Inscription</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                     <!--   <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nom complet</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>-->
                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">Pseudo</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>

                                @if ($errors->has('username'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Age</label>

                            <div class="col-md-6">
                                <input id="age" type="number" class="form-control{{ $errors->has('age') ? ' is-invalid' : '' }}" name="age" value="{{ old('age') }}" required autofocus>

                            </div>
                        </div>	
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Sexe</label>

                            <div class="col-md-6">
 								<select id="sexe" class="form-control" name="sexe" required autofocus>
								<option value="masculin">Masculin</option>
								<option value="feminin">F??minin</option>
								</select>
                            </div>
                        </div>							
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail <small>(sera valid??)</small></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tel" class="col-md-4 col-form-label text-md-right">T??l??phone</label>

                            <div class="col-md-6">
                                <input id="tel" type="tel" class="form-control{{ $errors->has('tel') ? ' is-invalid' : '' }}" name="tel" value="+33" required>

                                @if ($errors->has('tel'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tel') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>						

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Mot de passe</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirmation</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

						 <div class="form-group row">
                            <label for="captcha" class="col-md-4 col-form-label text-md-right">Captcha</label>
								 
                            <div class="col-md-6">
								 <div class="captcha">
									<span>{!! captcha_img('math') !!}</span>
									<button type="button" class="btn btn-success  btn-refresh">Actualiser</button>
								</div>
								
                                <br><input id="captcha" type="text" class="form-control{{ $errors->has('captcha') ? ' is-invalid' : '' }}" name="captcha" required placeholder="Enter the captcha" >

                                @if ($errors->has('captcha'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('captcha') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
<script   src="https://code.jquery.com/jquery-3.5.1.js"  ></script>
<script>
$(function () {

			$('.btn-refresh').click(function(){
 	var _token = $('input[name="_token"]').val();
        $.ajax({
            url: "{{ route('refresh') }}",
            method: "GET",
            success: function (data) {
 			$('.captcha span').html(data);
            }
        });
   });
});
	
</script>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Inscription
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

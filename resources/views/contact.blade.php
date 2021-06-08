<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

<meta content="Sit de chat Français" name="description">
  <meta content="tchat, chat en france,site de rencontres, site de discussions" name="keywords">
     <link href="{{ asset('/public/css/app.css') }}" rel="stylesheet">

 
<meta property="og:title"              content="Blablate, site de chat français" />
<meta property="og:description"        content="votre site pour rencontrer des nouveaux amis" />
<meta property="og:image"              content="{{ asset('storage/logos/blabla.png') }}" />

<meta name="twitter:title" content="Blablate, site de chat français">
<meta name="twitter:description" content="votre site pour rencontrer des nouveaux amis">
<meta name="twitter:image" content="{{ asset('storage/logos/blabla.png') }}">
<meta name="twitter:card" content="summary_large_image">


  <!-- Favicons -->
  <link href="{{ asset('storage/logos/fav.png') }}"  rel="icon">
  <link href="{{ asset('storage/logos/fav.png') }}" rel="apple-touch-icon">
      <title>Blablate, site de chat français</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
              /*  text-align: center;*/
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
			h2{
				text-transform:uppercase;
			}
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Accueil</a>
                    @else
                        <a href="{{ route('login') }}">Connexion</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Inscription</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
			
  <a href="{{route('welcome')}}"> <img src="{{ asset('storage/logos/blabla.png') }}"  width="80"/></a><br><br>
    @if ($errors->any())
             <div class="alert alert-danger">
                 <ul>
                     @foreach ($errors->all() as $error)
                         <li>{{ $error }}</li>
                     @endforeach
                 </ul>
             </div><br />
         @endif

    @if (!empty( Session::get('success') ))
        <div class="alert alert-success">

        {{ Session::get('success') }}
        </div>

    @endif
	
 <h2>Envoyer un message</h2>
         <form method="post" action="{{ route('sendmessage') }}"  enctype="multipart/form-data">
			  {{ csrf_field() }}
		 
	 		 <div class="form-group">
                    <label for="email">Email:</label>
                    <input id="email" type="email" class="form-control" name="email"  required/>
             </div>	
  
			 <div class="form-group">
                    <label for="sujet">Sujet:</label>
                    <input id="sujet" type="text" class="form-control" name="sujet"  required/>
             </div>	
				<div class="form-group ">
                    <label for="contenu">Contenu:</label>
                         <textarea style="min-height: 150px;"  id="contenu" type="text"  class="form-control" placeholder="Votre Question/Suggestion .." name="contenu" required  ></textarea>
 				</div>
 
          <div class="form-group ">
      <button  type="submit"  class="btn btn-primary">Envoyer</button>
  			 </div>

             </form>
			
            </div>
        </div>
    </body>
</html>

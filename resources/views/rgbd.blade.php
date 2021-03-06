<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

<meta content="Sit de chat moderne" name="description">
  <meta content="tchat, chat en france,site de rencontres, site de discussions" name="keywords">

 
<meta property="og:title"              content="Blablate, site de chat moderne" />
<meta property="og:description"        content="votre site pour rencontrer des nouveaux amis" />
<meta property="og:image"              content="{{ asset('storage/logos/blabla.png') }}" />

<meta name="twitter:title" content="Blablate, site de chat moderne">
<meta name="twitter:description" content="votre site pour rencontrer des nouveaux amis">
<meta name="twitter:image" content="{{ asset('storage/logos/blabla.png') }}">
<meta name="twitter:card" content="summary_large_image">


  <!-- Favicons -->
  <link href="{{ asset('storage/logos/fav.png') }}"  rel="icon">
  <link href="{{ asset('storage/logos/fav.png') }}" rel="apple-touch-icon">
      <title>Blablate, site de chat moderne</title>

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
			
  <a href="{{route('welcome')}}"> <img src="{{ asset('storage/logos/blabla.png') }}"  width="80"/></a><br>

<h2>Blablate : SIMPLE ET EFFICACE</h2>
<p>Blablate est un site de rencontres moderne pro et sympa. Chaque jour, des centaines se retrouvent sur Blablate pour discuter, ??changer et faire de nouvelles rencontres.</p>
<p>Blablate est rapide, simple d'utilisation et surtout tr??s efficace pour d??velopper son r??seau d'amis. </p>

<h2>DISCR??TION ASSUR??E - VIE PRIV??E RESPECT??E</h2>
 
<p>Blablate est un service de chat enti??rement anonyme, il ne demande pas des infos priv??es (identit??, adresse, famille, job ..) et garde les discussion priv??es en secret.</p>
 
<h2>Mod??ration</h2>
<p> Blablate a le droit de bloquer temporairement ou supprimer des utilisateurs selon leurs comportement ou les demandes des autres membres (violence,racisme..)

	<h4>Abonnement Blablate Premium:</h4>
	<ul>
 		<li>Cr??ation et acc??s aux salons priv??s</li>
		<li>Envoi des emails aux membres</li>
 		<li>Utilisation des Emojis ...</li>
	</ul>
	<h4>Abonnement Blablate Diamond:</h4>
	 <ul>
 		<li>Avantages Premium</li>
 		<li>Insertion d'un emoji devant votre pseudo</li>
		<li>Devenir inbanissable pendant une heure </li>
		<li>Savoir dans quel salon se trouve chaque connect??  </li>
 	</ul>
 
            </div>
        </div>
    </body>
</html>

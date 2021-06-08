<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

<meta content="Sit de chat Français" name="description">
  <meta content="tchat, chat en france,site de rencontres, site de discussions" name="keywords">

 
<meta property="og:title"              content="Blablate, site de chat français" />
<meta property="og:description"        content="votre site pour rencontrer des nouveaux amis" />
<meta property="og:image"              content="https://diminuer-mes-mensualites.fr/assets/img/clients/ros.jpg" />

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
			
  <a href="{{route('welcome')}}"> <img src="{{ asset('storage/logos/blabla.png') }}"  width="80"/></a><br>

<h2>Blablate : SIMPLE ET EFFICACE</h2>
<p>Blablate est un site de rencontres français pro et sympa. Chaque jour, des centaines de français et françaises se retrouvent sur Blablate pour discuter, échanger et faire de nouvelles rencontres.</p>
<p>Blablate est rapide, simple d'utilisation et surtout très efficace pour développer son réseau d'amis. </p>

<h2>DISCRÉTION ASSURÉE - VIE PRIVÉE RESPECTÉE</h2>
 
<p>Blablate est un service de chat entièrement anonyme, il ne demande pas des infos privées (nom réel, adresse, famille, job ..) et garde les discussion privées en secret.</p>
 
<h2>Modération</h2>
<p> Blablate a le droit de bloquer temporairement ou supprimer des utilisateurs selon leurs comportement ou les demandes des autres membres (violence,racisme..)

<h2>Avantages Abonnés</h2>
	<ul>
		<li>Accès illimité sur le site</li>
		<li>Création de salons privés</li>
		<li>Envoi des emails aux membres</li>
		<li>Envoi des images</li>
		<li>Utilisation des Emojis</li>
	</ul>
 
            </div>
        </div>
    </body>
</html>

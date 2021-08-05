 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<meta content="Site de chat moderne" name="description">
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
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="app_url" content="<?php echo env('APP_URL'); ?>">

    <title>Blablate, site de chat moderne</title>
   <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

{{-- Meta tags --}}
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="route" content="{{ $route }}">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="url" content="{{ url('').'/'.config('chatify.path') }}" data-user="{{ Auth::user()->id }}">

{{-- scripts --}}
<script src="{{ asset('/public/js/chatify/font.awesome.min.js') }}"></script>
<script src="{{ asset('/public/js/chatify/autosize.js') }}"></script>
<script src="{{ asset('/public/js/app.js') }}" async  defer></script>
<script src='https://unpkg.com/nprogress@0.2.0/nprogress.js'></script>

{{-- styles --}}
<link rel='stylesheet' href='https://unpkg.com/nprogress@0.2.0/nprogress.css'/>
<link href="{{ asset('/public/css/chatify/style.css') }}" rel="stylesheet" />
<link href="{{ asset('/public/css/chatify/'.$dark_mode.'.mode.css') }}" rel="stylesheet" />
<link href="{{ asset('/public/css/app.css') }}" rel="stylesheet" />

{{-- Messenger Color Style--}}
@include('Chatify::layouts.messengerColor')
<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Untree.co">
  <link rel="shortcut icon" href="{{asset('favicon.png')}}">
  <meta name="description" content="" />
  <meta name="keywords" content="bootstrap, bootstrap4" />

		<!-- Bootstrap CSS -->
		<link href="{{asset('css/bootstrap.min.css') }}" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
		<link href="{{ asset('css/tiny-slider.css') }}" rel="stylesheet">
		<link href="{{asset('css/style.css') }}" rel="stylesheet">
		<title>{{ $title }} </title>
	</head>

	<body>

		<!-- Start Header/Navigation -->
     
		<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

			<div class="container">
				<a class="navbar-brand" href="{{route('home')}}">Furni<span>.</span></a>

				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarsFurni">
					<ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">

            @foreach ($menus as $menu)
            
              <li @class([
                            "nav-item",
                            "active"=>Route::is(app()->getLocale().'.'.$menu->menu_url)])>

							<a class="nav-link" href="{{url('/'.$menu->menu_url)===route('home')?'/':url('/'.$menu->menu_url)}}">{{json_decode($menu->menu_title,true)[app()->getLocale()]}}</a>
						  </li>
            @endforeach

						<!-- Linklerr -->
					</ul>

					<ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
              

          @if (Route::has('login'))
          <li>
                                @auth
                                    <a
                                        href="{{ url('/dashboard') }}"
                                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                    >
                                    <img src="{{ asset('images/user.svg') }}">
                                    </a>
                                @else
                                    <a
                                        href="{{ url('/login') }}"
                                        class="nav-link"
                                    >
                                        <img src="{{ asset('images/user.svg') }}">
                                    </a>
                                @endauth
                              </li>
                        @endif
						<li><a class="nav-link" href="{{ url('/cart')}}"><img src="{{ asset('images/cart.svg') }}"></a></li>
            <li>
              
</li>
					</ul>
          
          <div class="dropdown">
  <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
    {{  strtoupper(app()->getLocale())  }}
  </button>
  <ul class="dropdown-menu">

  @foreach($languages as $lang) 
  <li><a class="dropdown-item" href="{{ Route::localizedUrl($lang->name) }}">{{$lang->title}}</a>  </li>
@endforeach
  </ul>
</div>

          
				</div>
			</div>
				
		</nav>

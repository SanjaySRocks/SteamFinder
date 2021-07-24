<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.2.0/mdb.min.css"/>

	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Exo+2:wght@300;400;500;700&display=swap">
	<style>
	body {
	font-family: 'Exo 2', sans-serif; 
	}

	.btn-primary{
	font-size: 15px;
	}
	</style>
	<link rel="icon" type="image/png" href="{{ asset('/favicon.ico') }}"/>
</head>
<body class="bg-light">

	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container">
		  <a class="navbar-brand" href="/">Steam Finder</a>
		  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
			<div class="navbar-nav">
			  <a class="nav-link active" aria-current="page" href="/"><i class="fas fa-home"></i> Home</a>
			  {{-- <a class="nav-link" href="/"><i class="fas fa-search"></i> Search</a> --}}
			  <a class="nav-link" href="https://amsgaming.in">Main Website</a>
			  <a class="nav-link" href="https://amsgaming.in/buyvip"> VIP Store</a>
			  {{-- <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a> --}}
			</div>
		  </div>
		</div>
	  </nav>


@yield('support')


<div class="container pt-2">

	@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
	@endif

	@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
	@endif

	<form action="/search" method="post">
	@csrf
	Enter SteamID
	<div class="input-group mb-3">
	<div class="input-group-prepend">
	<span class="input-group-text"><i class="fab fa-steam-symbol"></i></span>
	</div>
		<input id="searchText" name="steamid" type="text" class="form-control" placeholder="SteamID / SteamID3 / SteamID64 / Custom URL / Complete URL" autofocus required>
	</div>

	<button id="search" class="btn btn-primary btn-block mb-3"><i class="fas fa-search"></i> Search</button>
	</form>
</div>

@yield('content')




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.6/clipboard.min.js"></script>
<script>var clipboard = new ClipboardJS('.btn-outline-dark');</script>
<script type="text/javascript" src="{{ asset('js/script.js') }}"></script>

<footer style="padding-top: 60px;" class="mb-4">
<div class="container text-center">
<br>
<hr> 
<h6>© SteamID Finder 2020 | <a target="_blank" class="text-primary" href="http://steampowered.com/">Powered by Steam</a> | <a target="_blank" href="https://github.com/SanjaySRocks"><i class="fab fa-github"></i> GitHub </a></h6>
</div>
</footer>

</body>
</html>
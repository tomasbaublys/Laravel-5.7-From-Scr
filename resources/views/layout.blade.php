<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('title', 'My First Page')</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.min.css">
<style>
    .is-compelte {
        text-decoration: line-through;
    }
</style>
<script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
</head>
<body>
<nav class="navbar is-info" role="navigation" aria-label="main navigation">    
    <div class="container">
    <div class="navbar-menu">
        <div class="navbar-start">
            <a class="navbar-item" href="/">Home</a>
        <div class="navbar-start">
            <a class="navbar-item" href="/about">About</a>
        </div>
        <div class="navbar-start">
            <a class="navbar-item" href="/contact">Contact</a>
        </div>        
        <div class="navbar-start">
            <a class="navbar-item" href="/projects">Projects</a>
        </div>
        </div>
        <div class="navbar-start"></div>
        </div>
    </div>
</nav>
  <section class="section">
    <div class="container">
        <div class="tile is-ancestor">
            <div class="tile is-vertical is-4">
		      @yield('content')
          </div>
        </div>   

     </div>
</section>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>@yield('title')</title>


  <link href="https://getbootstrap.com/docs/5.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@100;400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{URL::asset('css/styles.css');}}">


   

  
  </head>
  <body >
    <nav class="navbar navbar-expand-lg bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="{{route('home')}}"><img class="QuizStang" src="https://cdn-icons-png.flaticon.com/512/32/32406.png" width="30"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link"  href="{{route('register')}}">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link"  href="{{route('login')}}">Login</a>
            </li>
          </ul>
        </div> 
        
      </div>
    </nav>
    <section class="text-center">
      
    @yield('body')
    </section>

    
  </body>
</html>
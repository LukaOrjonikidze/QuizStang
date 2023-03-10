<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/32/32406.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@100;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{URL::asset('css/styles.css');}}">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="{{route('home')}}"><img class="QuizStang" src="https://cdn-icons-png.flaticon.com/512/32/32406.png" width="30"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
          @if (isset(Auth::user()->id))
              <li class="nav-item">
                <a class="nav-link"  href="{{route('my_quizzes')}}">My Quizzes</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('create_quiz')}}">Create Quiz</a>
              </li>
              @if (Auth::user()->id == 1)   
              <li class="nav-item float-end">
                <a class="nav-link" href="{{route('admin')}}">Admin</a>
              </li>
              @endif
              <li class="nav-item float-end">
                <a class="nav-link" href="{{route('logout')}}">Logout</a>
              </li>
          @else
              <li class="nav-item">
                <a class="nav-link"  href="{{route('register')}}">Register</a>
              </li>
              <li class="nav-item">
                <a class="nav-link"  href="{{route('login')}}">Login</a>
              </li>
          @endif
            </ul>
          </div> 
          
        </div>
      </nav>
    <section class="text-center px-5">
    @yield('body')
  </section>
</body>
</html>
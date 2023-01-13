@extends('auth.layout')

@section('title', 'login')


@section('body')
<main class="form-signin w-25 m-auto">
    <form method="POST">
      @csrf
      <img class="mb-4" src="https://cdn-icons-png.flaticon.com/512/32/32406.png" width="200">
      <h1 class="h3 mb-3 fw-normal">Login</h1>
  
      <div class="form-floating">
        <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
        <label for="floatingInput">Email address</label>
      </div>
      <br>
      <div class="form-floating">
        <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
        <label for="floatingPassword">Password</label>
      </div>
      <br>
      <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
      <p class="mt-5 mb-3 text-muted">&copy; QuizStang</p>
    </form>
  </main>   
@endsection
@extends('layout')
@section('title', 'Home')


@section('body')
    <h1 style="font-weight:700; margin-bottom:2rem;">QuizStang <img src="https://cdn-icons-png.flaticon.com/512/32/32406.png" width="40"></h1>
    <div class="row">
    @forelse ($quizzes as $quiz)
        <div class="col-lg-3">
            <a href="{{route('quiz', ["quiz"=>$quiz])}}">
                <div class="card mx-auto " style="max-width: 540px; margin-bottom:2rem">
                    <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{$quiz->photo}}" class="img-fluid rounded-start" >
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                        <h5 class="card-title">{{$quiz->name}}</h5>
                        <p class="card-text">{{$quiz->description}}</p>
                        <p class="card-text"><small class="text-muted">{{$quiz->questions()->get()->count()}} questions </small></p>
                        </div>
                    </div>
                    </div>
                </div>
            </a>
        </div>

    @empty
        <p>No Quiz Available</p>
    @endforelse
</div>    

@endsection
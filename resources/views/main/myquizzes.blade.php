@extends('layout')
@section('title', 'My Quizzes')


@section('body')
    <section>
    <div class="row">
    @forelse ($quizzes as $quiz)
        <div class="col-lg-3">
            <div class="card text-bg-light mx-auto" style="width: 15rem; margin-bottom:1rem; ">
                <img src="{{$quiz->photo}}" class="card-img-top">
                <div class="card-body">
                <h5 class="card-title">{{$quiz->name}}</h5>
                <p class="card-text">{{$quiz->description}}</p>
                <p class="card-text"><small class="text-muted">{{$quiz->questions()->get()->count()}} questions </small></p>
                </div>
                <ul class="list-group list-group-flush">
                <li class="list-group-item"><a class="card-link" href="{{route('update_quiz', ["quiz"=>$quiz])}}"><button class="btn btn-info btn-sm">Change</button></a></li>
                <li class="list-group-item"><a class="card-link" href="{{route('quiz', ["quiz"=>$quiz])}}"><button class="btn btn-primary btn-sm">Try Out</button></a></li>
                <li class="list-group-item"><a class="card-link" href="{{route('delete_quiz', ["quiz"=>$quiz])}}"><button class="btn btn-danger btn-sm">Delete</button></a></li>
                </ul>
            </div>
        </div>
    @empty
        <p>No Quizzes Available</p>
    @endforelse
    </div>
</section>
@endsection
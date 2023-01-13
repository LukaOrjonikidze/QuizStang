@extends('layout')
@section('title', $quiz->name)


@section('body')

        <h1>{{$quiz->name}}</h1>
        <form method="post">
        @csrf
        <div class="row"> 
            <div class="col">
                <input class="form-control" type="text" name="name" placeholder="name" value="{{$quiz->name}}"> 
            </div>
            <div class="col">
                <input class="form-control" type="text" name="photo" placeholder="photo" value="{{$quiz->photo}}"> 
            </div>
            <div class="col">
                <input class="form-control" type="text" name="description" placeholder="description" value="{{$quiz->description}}"> 
            </div>
        </div>
    
        <h2>Questions</h2>
        @forelse ($questions as $question)
            <br>
            <div class="row">
                <input type="hidden" name="question_id[]" value="{{$question->id}}">
                <div class="col-md-2"><input class="form-control" type="text" name="question[]" value="{{$question->question}}"> </div>
                <div class="col-md-1"><input class="form-control" type="text" name="answer1[]" value="{{$question->answer1}}"> </div>
                <div class="col-md-1"><input class="form-control" type="text" name="answer2[]" value="{{$question->answer2}}"> </div>
                <div class="col-md-1"><input class="form-control" type="text" name="answer3[]" value="{{$question->answer3}}"> </div>
                <div class="col-md-1"><input class="form-control" type="text" name="answer4[]" value="{{$question->answer4}}"> </div>
                <div class="col-md-2"><input class="form-control" type="text" name="question_photo[]" value="{{$question->photo}}"> </div>
                <div class="col-md-2"><input class="form-control" type="text" name="correct_answer[]" value="{{$question->correct_answer}}"> </div>
                <input class="hiddenPosition" type="hidden" name="position[]" value="{{$question->position}}"> 
                <div class="col-md-2"><a href="{{route('delete_question', compact("question"))}}"><button type="button" class="btn btn-sm btn-danger">Delete Question</button></a></div>
            </div>
            <br>
        @empty
            <p>No Questions</p>
        @endforelse
            <button class="btn btn-info btn-sm" id="question" type="button">Add a Question</button> <br>
            <hr>
            <button class="btn btn-primary btn-lg">Update</button>
        </form>

    
    <script>
        let position = (Number($(".hiddenPosition").last().val())) || 0;
        $("#question").click(()=>{
            position++;
            const question = `
                            <div class="row">
                            <div class="col-md-2"><input class="form-control" type="text" name="question[]" placeholder="question"> </div>
                            <div class="col-md-1"><input class="form-control" type="text" name="answer1[]" placeholder="answer1"> </div>
                            <div class="col-md-1"><input class="form-control" type="text" name="answer2[]" placeholder="answer2"> </div>
                            <div class="col-md-1"><input class="form-control" type="text" name="answer3[]" placeholder="answer3"> </div>
                            <div class="col-md-1"><input class="form-control" type="text" name="answer4[]" placeholder="answer4"> </div>
                            <div class="col-md-2"><input class="form-control" type="text" name="question_photo[]" placeholder="Photo Url"> </div>
                            <div class="col-md-2"><input class="form-control" type="text" name="correct_answer[]" placeholder="Correct Answer"> </div>
                            <div class="col-md-2"></div>
                            <input type="hidden" class="hiddenPosition" name="position[]" value="${position}"></div><br>`
            $("#question").before(question);
        })
    </script>
@endsection
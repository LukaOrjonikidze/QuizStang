@extends('layout')
@section('title', 'Create a Quiz')


@section('body')
    <form method="post">
        @csrf
        <h1>Quiz</h1>
        <div class="row"> 
            <div class="col">
                <input class="form-control" type="text" name="name" placeholder="name">
            </div>
            <div class="col">
                <input class="form-control" type="text" name="photo" placeholder="photo"> 
            </div>
            <div class="col">
                <input class="form-control" type="text" name="description" placeholder="description"> 
            </div>
        </div>
        <h2>Questions</h2>
        <div class="row">
            <div class="col-md-2"><input class="form-control" type="text" name="question[]" placeholder="question"> </div>
            <div class="col-md-2"><input class="form-control" type="text" name="answer1[]" placeholder="answer1"> </div>
            <div class="col-md-2"><input class="form-control" type="text" name="answer2[]" placeholder="answer2"> </div>
            <div class="col-md-2"><input class="form-control" type="text" name="answer3[]" placeholder="answer3"> </div>
            <div class="col-md-2"><input class="form-control" type="text" name="answer4[]" placeholder="answer4"> </div>
            <div class="col-md-1"><input class="form-control" type="text" name="question_photo[]" placeholder="Photo Url"> </div>
            <div class="col-md-1"><input class="form-control" type="text" name="correct_answer[]" placeholder="Correct Answer"> </div>
            <input type="hidden" name="position[]" value="1">
        </div>
        <br>
        <button class="btn btn-info btn-sm" id="question" type="button">Add a Question</button> <br> <br>
        <button class="btn btn-primary btn-lg" type="submit">Create Quiz</button>
    </form>
    <script>
        let position = 1;
        $("#question").click(()=>{
            position++;
            const question = `<div class="row">
                            <div class="col-md-2"><input class="form-control" type="text" name="question[]" placeholder="question"> </div>
                            <div class="col-md-2"><input class="form-control" type="text" name="answer1[]" placeholder="answer1"> </div>
                            <div class="col-md-2"><input class="form-control" type="text" name="answer2[]" placeholder="answer2"> </div>
                            <div class="col-md-2"><input class="form-control" type="text" name="answer3[]" placeholder="answer3"> </div>
                            <div class="col-md-2"><input class="form-control" type="text" name="answer4[]" placeholder="answer4"> </div>
                            <div class="col-md-1"><input class="form-control" type="text" name="question_photo[]" placeholder="Photo Url"> </div>
                            <div class="col-md-1"><input class="form-control" type="text" name="correct_answer[]" placeholder="Correct Answer"> </div>
                            <input type="hidden" name="position[]" value="${position}"></div><br>`
            $("#question").before(question);
        })
    </script>
@endsection
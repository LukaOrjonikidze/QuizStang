@extends('layout')
@section('title', $quiz->name)


@section('body')
    <style>
        .answer{
            cursor: pointer;
        }
    </style>
    <div class="row">
        <div class="col-sm-6">
            <div id="question">
            
            </div>
        
        </div>
        <div class="col-sm-6">
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
        </div>
            
        </div>
    </div>
    <br>
    <button class="btn btn-primary btn-lg" id="start">Start Quiz</button>
    <input type="hidden" id="quiz" value="{{json_encode($quiz)}}">
    
    
    <script>
        const quizObject = JSON.parse($("#quiz").val());
        let position = 0;
        let score = 0;
        let highestScore = 0;
        let questionsCount = 0;
        $("#question").hide();
        $("#start").click(()=>{
            $("#start").hide();
            $("#question").prepend('<p style="color:blue" id="progress"></p>')
            fetch(`http://localhost:8000/api/quizzes/${quizObject.id}`, {
                method: "POST",
                headers: {
                'Content-Type': 'application/json'},
                body: JSON.stringify({
                    position: position,
                })
            })
            .then(response =>{
            return response.json();
            }).then(data =>{
                console.log(data);
                let answers = `<ul class="list-group" id="answers">
                    <li class="list-group-item">${data.question}</li>
                    <li class="list-group-item"><img src="${data.imageURL}" style="width:200px; height:auto;"></li>
                    <li class="answer list-group-item list-group-item-action list-group-item-info" onclick="addListenerToAnswer(this)">${data.answer1}</li>
                    <li class="answer list-group-item list-group-item-action list-group-item-info" onclick="addListenerToAnswer(this)">${data.answer2}</li>
                    <li class="answer list-group-item list-group-item-action list-group-item-info" onclick="addListenerToAnswer(this)">${data.answer3}</li>
                    <li class="answer list-group-item list-group-item-action list-group-item-info" onclick="addListenerToAnswer(this)">${data.answer4}</li>
                    </ul>`;
                questionsCount = data.questionsCount;
                $("#progress").html(`(${position + 1} of ${questionsCount})`);
                $("#question").append(answers);
                $("#question").fadeIn();
            })
        })
        function addListenerToAnswer(element){
                    let answer = $(element).text();
                    console.log(answer);
                    position++;
                    fetch(`http://localhost:8000/api/quizzes/${quizObject.id}`, {
                        method: "POST",
                        headers: {
                        'Content-Type': 'application/json'},
                        body: JSON.stringify({
                            position: position,
                            answer: answer
                        })
                    })
                    .then(response =>{
                    return response.json();
                    }).then(data =>{
                        if (data.wasCorrectAnswer){
                            score++;
                            $(element).addClass('list-group-item-success active', 1000);
                        } else {
                            $(element).addClass('list-group-item-danger active', 1000);
                        }
                        
                        $("#question").fadeOut(()=>{
                            $("#answers").fadeOut(()=>{
                                $("#answers").remove();
                                console.log(data);
                                highestScore++;
                                
                                if (data.isFinished){
                                    const finalMessage = `<h1>Your final score is ${score}/${highestScore}</h1> <hr>
                                                <a href="${quizObject.id}"><button class="btn btn-primary btn-lg">Try again</button></a>`;
                                    $("#question").append(finalMessage);
                                    $("#question").fadeIn();
                                } else {
                                    let answers = `<ul class="list-group" id="answers">
                                    <li class="list-group-item">${data.question}</li>
                                    <li class="list-group-item"><img src="${data.imageURL}" style="width:200px; height:auto;"></li>
                                    <li class="answer list-group-item list-group-item-action list-group-item-info" onclick="addListenerToAnswer(this)">${data.answer1}</li>
                                    <li class="answer list-group-item list-group-item-action list-group-item-info" onclick="addListenerToAnswer(this)">${data.answer2}</li>
                                    <li class="answer list-group-item list-group-item-action list-group-item-info" onclick="addListenerToAnswer(this)">${data.answer3}</li>
                                    <li class="answer list-group-item list-group-item-action list-group-item-info" onclick="addListenerToAnswer(this)">${data.answer4}</li>
                                    </ul>`;
                                    $("#progress").html(`(${position + 1} of ${questionsCount})`);
                                    $("#question").append(answers);
                                    $("#question").fadeIn();
                                }
                            });
                        });
                        
                    })
                
        }

        
    </script>

@endsection
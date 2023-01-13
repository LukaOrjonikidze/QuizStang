<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    public function quizPage(Quiz $quiz)
    {
        return view("main.quiz", ["quiz" => $quiz]);
    }
    public function myQuizzesPage()
    {   
        $user = Auth::user();
        $quizzes = Quiz::where("user_id", $user->id)->latest()->get();
        return view("main.myquizzes", ["quizzes" => $quizzes, 'user' => $user]);
    }
    public function createQuizPage()
    {
        return view("main.newquiz");
    }

    public function createQuiz(Request $request)
    {
        $quiz = Quiz::create([
            "name" => $request->input('name'),
            "photo" => $request->input('photo'),
            "description" => $request->input('description'),
            "user_id" => Auth::user()->id
        ]);
        $length = count($request->input('position'));
        for ($i=0; $i < $length ; $i++) { 
            Question::create([
                "question" => $request->input("question")[$i],
                "photo" => $request->input("question_photo")[$i],
                "answer1" => $request->input("answer1")[$i],
                "answer2" => $request->input("answer2")[$i],
                "answer3" => $request->input("answer3")[$i],
                "answer4" => $request->input("answer4")[$i],
                "position" => $request->input("position")[$i],
                "correct_answer" => $request->input("correct_answer")[$i],
                "quiz_id" => $quiz->id
            ]);
        }
        return redirect()->route('my_quizzes');
    }
    public function deleteQuiz(Quiz $quiz)
    {
        $quiz->questions()->delete();
        $quiz->delete();
        return redirect()->back();
    }
    public function deleteQuestion(Question $question)
    {
        $question->delete();
        return redirect()->back();
    }
    public function updateQuizPage(Quiz $quiz)
    {
        $questions = $quiz->questions()->orderBy("position", 'asc')->get();
        return view("main.updatequiz", compact("quiz", "questions"));
    }
    public function updateQuiz(Quiz $quiz, Request $request)
    {
        $quiz->update([
            "name" => $request->input("name"),
            "photo" => $request->input("photo"),
            "description" => $request->input("description")
        ]);
        $countQuestions = count($request->input("question"));
        for ($i=0; $i < $countQuestions; $i++) { 
            if (isset($request->input("question_id")[$i])){
                Question::where("id", $request->input("question_id")[$i])->update([
                    "question" => $request->input("question")[$i],
                    "answer1" => $request->input("answer1")[$i],
                    "answer2" => $request->input("answer2")[$i],
                    "answer3" => $request->input("answer3")[$i],
                    "answer4" => $request->input("answer4")[$i],
                    "photo" => $request->input("question_photo")[$i],
                    "correct_answer" => $request->input("correct_answer")[$i],
                    "position" => $request->input("position")[$i]
                ]);
            } else {
                Question::create([
                    "question" => $request->input("question")[$i],
                    "answer1" => $request->input("answer1")[$i],
                    "answer2" => $request->input("answer2")[$i],
                    "answer3" => $request->input("answer3")[$i],
                    "answer4" => $request->input("answer4")[$i],
                    "photo" => $request->input("question_photo")[$i],
                    "correct_answer" => $request->input("correct_answer")[$i],
                    "quiz_id" => $quiz->id,
                    "position" => $request->input("position")[$i]
                ]);
            }
            
        }
        $questions = $quiz->questions;
        
        return redirect()->route("update_quiz", compact("quiz", "questions"));
    }


    public function getQuestion(Quiz $quiz, Request $request){
        if ($request->input('answer')){
            $wasCorrectAnswer = false;
            if ($request->input('answer') == $quiz->questions()->get()[$request->input('position') - 1]->correct_answer){
                $wasCorrectAnswer = true;
            }
            $questionsCount = $quiz->questions()->get()->count();
            if ($questionsCount - 1 < $request->input('position')){
                return response()->json([
                    "wasCorrectAnswer" => $wasCorrectAnswer,
                    "isFinished" => true
                ]);
            }else {
                $answers = $quiz->questions()->select("answer1", "answer2", "answer3", "answer4")
                        ->get()[$request->input('position')];
                return response()->json([
                    "question" => $quiz->questions()->get()[$request->input('position')]->question,
                    "answer1"=>$answers->answer1,
                    "answer2"=>$answers->answer2,
                    "answer3"=>$answers->answer3,
                    "answer4"=>$answers->answer4,
                    "imageURL"=> $quiz->questions()->get()[$request->input('position')]->photo,
                    "wasCorrectAnswer" => $wasCorrectAnswer,
                    "isFinished" => false
                ]);
            }
            
        } else {
            $questionsCount = $quiz->questions()->get()->count();
            $answers = $quiz->questions()->select("answer1", "answer2", "answer3", "answer4")->get()[$request->input('position')];
            return response()->json([
                "question" => $quiz->questions()->get()[$request->input('position')]->question,
                "answer1"=>$answers->answer1,
                "answer2"=>$answers->answer2,
                "answer3"=>$answers->answer3,
                "answer4"=>$answers->answer4,
                "imageURL"=> $quiz->questions()->get()[$request->input('position')]->photo,
                "questionsCount" => $questionsCount
            ]);
            
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MainController extends Controller 
{
    public function homePage()
    {
        $quizzes = Quiz::where("user_id", 1)->orWhere("main", 1)->latest()->get();
        return view('main.home', ["quizzes" => $quizzes]);
    }
    public function publishQuiz(Quiz $quiz){

        $quiz->main = !$quiz->main;
        $quiz->save();
        return redirect()->route('admin');
    }

    public function adminPage()
    {   
        $quizzes = Quiz::select()->latest()->get();
        return view("main.myquizzes", ["quizzes" => $quizzes]);
    }
}

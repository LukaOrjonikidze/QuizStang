<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\QuizController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/", [MainController::class, 'homePage'])->name('home');
Route::get('/register', [AuthController::class, 'registerPage'])->name("register");
Route::post('/register', [AuthController::class, 'register'])->name("registerAction");
Route::get('/login', [AuthController::class, 'loginPage'])->name("login");
Route::post('/login', [AuthController::class, 'login'])->name("loginAction");
Route::get("/quizzes/{quiz}", [QuizController::class, "quizPage"])->name("quiz");

Route::middleware("auth")->group(function (){
    Route::get("/logout", [AuthController::class, 'logout'])->name('logout');
    Route::get("/my_quizzes", [QuizController::class, "myQuizzesPage"])->name("my_quizzes");
    Route::get("/create_quiz", [QuizController::class, "createQuizPage"])->name("create_quiz");
    Route::post("/create_quiz", [QuizController::class, "createQuiz"]);
    
});
Route::middleware("user")->group(function (){
    Route::get("/delete/quizzes/{quiz}", [QuizController::class, "deleteQuiz"])->name("delete_quiz");
    Route::get("/delete/questions/{question}", [QuizController::class, "deleteQuestion"])->name("delete_question");
    Route::get("/update/quizzes/{quiz}", [QuizController::class, "updateQuizPage"])->name("update_quiz");
    Route::post("/update/quizzes/{quiz}", [QuizController::class, "updateQuiz"]);
});


Route::middleware("admin")->group(function (){
    Route::get("/admin", [MainController::class, "adminPage"])->name("admin");
    Route::get("/publish/quizzes/{quiz}", [MainController::class, "publishQuiz"])->name("publish");
});
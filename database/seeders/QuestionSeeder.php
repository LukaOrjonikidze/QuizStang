<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Question;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Question::create([
            "question" => "2 + 2",
            "photo" => "https://play-lh.googleusercontent.com/BJloi-q_yBaYxZzJfUrIB2P6STFjvY6GGVqRoSTiEqMfx1qxtiNCKqMvhqMCJctpEw",
            "answer1" => "3",
            "answer2" => "4",
            "answer3" => "5",
            "answer4" => "2",
            "position" => "1",
            "correct_answer" => "4",
            "quiz_id" => "1"
        ]);
        Question::create([
            "question" => "3 x 3",
            "photo" => "https://3mal3.net/wp-content/uploads/2021/06/cropped-cropped-favicon.png",
            "answer1" => "9",
            "answer2" => "4",
            "answer3" => "5",
            "answer4" => "6",
            "position" => "2",
            "correct_answer" => "9",
            "quiz_id" => "1"
        ]);
        Question::create([
            "question" => "Water boils at ?",
            "photo" => "https://cdn-icons-png.flaticon.com/512/720/720014.png",
            "answer1" => "67 Degrees Celsius",
            "answer2" => "32 Degrees Fahrenheit",
            "answer3" => "100 Degrees Celsius",
            "answer4" => "100 Degrees Fahrenheit",
            "position" => "3",
            "correct_answer" => "100 Degrees Celsius",
            "quiz_id" => "2"
        ]);
        Question::create([
            "question" => "რომელ წელს იყო დიდგორის ბრძოლა?",
            "photo" => "https://cdn-icons-png.flaticon.com/512/720/720014.png",
            "answer1" => "1499",
            "answer2" => "1022",
            "answer3" => "1112",
            "answer4" => "1121",
            "position" => "3",
            "correct_answer" => "1121",
            "quiz_id" => "3"
        ]);
    }
}

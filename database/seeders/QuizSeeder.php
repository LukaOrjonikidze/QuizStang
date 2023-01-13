<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Quiz;

class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Quiz::create([
            "name" => "Math",
            "photo" => "https://cdn-icons-png.flaticon.com/512/3965/3965108.png",
            "description" => "How Well do you know Math?",
            "user_id" => "1"
        ]);
        Quiz::create([
            "name" => "Science",
            "photo" => "https://cdn-icons-png.flaticon.com/512/5741/5741484.png",
            "description" => "How Well do you know Science?",
            "user_id" => "1"
        ]);
        Quiz::create([
            "name" => "History",
            "photo" => "https://cdn-icons-png.flaticon.com/512/2132/2132336.png",
            "description" => "How Well do you know History?",
            "user_id" => "1"
        ]);
    }
}

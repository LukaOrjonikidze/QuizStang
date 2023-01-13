<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    public function quiz(){
        
        return $this->belongsTo(Quiz::class);
    }
    protected $table = "questions";
    protected $fillable = [
        "question",
        "photo",
        "answer1",
        "answer2",
        "answer3",
        "answer4",
        "position",
        "correct_answer",
        "quiz_id"
    ];
}

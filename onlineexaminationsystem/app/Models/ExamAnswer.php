<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamAnswer extends Model
{
    use HasFactory;
    public $table = 'exam_answers';
    protected $fillable =[
        'attempt_id',
        'question_id',
        'answer_id'
    ];
}

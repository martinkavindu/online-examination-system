<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamAttempt extends Model
{
    use HasFactory;

    public $table = 'exams_attempt';
    protected $fillable =[
        'exam_id',
        'user_id'
    ];
}

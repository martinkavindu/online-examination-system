<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class exam extends Model
{
    use HasFactory;

    protected $guarded= [];

    public function Subjects(){
        return $this->belongsTo(Subjects::class);
    }

    public function questions()
{
    return $this->belongsToMany(Question::class,'qna_exam');
}

public function getQnaExam()
{
    return $this->hasMany(QnaExam::class, 'exam_id', 'id');
}
}

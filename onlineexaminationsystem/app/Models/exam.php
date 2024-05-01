<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ExamAttempt;

class exam extends Model
{
    use HasFactory;

    protected $fillable= [
'exam_name',
'subject_name',
'date',
'time',
'attempt',
'prices',
'plan',
'pass_marks'

    ];

protected $appends = ['attempt_counter'];

public $count = '';

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

public function getIdAttribute($value){
$attemptCount = ExamAttempt::where(['exam_id'=>$value,'user_id'=>auth()->user()->id])->count();
$this->count = $attemptCount;

return  $value;
}

public function getAttemptCounterAttribute(){
    return $this->count;
}
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['question_id', 'answer', 'is_correct'];
    use HasFactory;
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}

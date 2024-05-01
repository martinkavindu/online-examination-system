<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Exam;
use Mail;
use App\Models\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Carbon;

class studentController extends Controller
{
    public function paidExam(){
        $exams = Exam::where('plan',1)->with('subjects')->orderBy('date','DESC')->get();

        return view('student.paid_exam',['exams'=>$exams]);
        
    }
}

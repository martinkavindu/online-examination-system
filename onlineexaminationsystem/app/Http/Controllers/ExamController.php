<?php

namespace App\Http\Controllers;
use App\Models\exam;
use App\Models\QnaExam;
use App\Models\ExamAttempt;
use App\Models\ExamAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExamController extends Controller
{

    public function ExamDashboard($id)
    {
        $qnaExams = exam::where('id', $id)->with('getQnaExam')->get();

        if (count($qnaExams) > 0) {
            
            if ($qnaExams[0]['date'] == date('Y-m-d')) {
                
                if (count($qnaExams[0]->getQnaExam) > 0) {

                    $exam = QnaExam::findOrFail($id);
                    $questions = $exam->questions()->inRandomOrder()->with('answer')->get();
                    return view('student.examDashboard', ['success' => true, 'qnaExams' => $qnaExams, 'questions' => $questions,'message' => ''. $qnaExams[0]['exam_name']]);
                } else {
                    return view('student.examDashboard', ['success' => false, 'message' => 'This exam is not available ', 'qnaExams' => $qnaExams]);
                }
            } elseif ($qnaExams[0]['date'] > date('Y-m-d')) {
                return view('student.examDashboard', ['success' => false, 'message' => 'This exam will be done on ' . $qnaExams[0]['date'], 'qnaExams' => $qnaExams]);
            } else {
                return view('student.examDashboard', ['success' => false, 'message' => 'This exam expired on ' . $qnaExams[0]['date'], 'qnaExams' => $qnaExams]);
            }
        } else {
            return view('404');
        }
    }
      
    public function examSubmit(Request $request){

     $attempt_id = ExamAttempt::insertGetId(
            [
                'exam_id' =>$request->exam_id,
                'user_id' =>Auth::user()->id
            ]
            );
            $qcount = count($request->q);
            if($qcount >0){
         
                for($i=0; $i<$qcount;$i++){

                    ExamAnswer::insert([
                        'attempt_id'=>$attempt_id,
                        'question_id'=>$request->q[$i],
                        'answer_id' => request()->input('ans_'.($i+1))
                    ]);
                }
            }
            return view('student.thank_you');
    }
}    

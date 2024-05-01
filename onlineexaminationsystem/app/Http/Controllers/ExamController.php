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
$attemptCount = ExamAttempt::where(['exam_id'=>$qnaExams[0]['id'],'user_id'=>auth()->user()->id])->count();
if($attemptCount >= $qnaExams[0]['attempt']){
    
    return view('student.examDashboard', ['success' => false, 'message' => 'Your exam attempt  has been completed ,wait for results ', 'qnaExams' => $qnaExams]);
}
            
            else if ($qnaExams[0]['date'] == date('Y-m-d')) {
                
                if (count($qnaExams[0]->getQnaExam) > 0) {

                    $exam = QnaExam::findOrFail($id);
                    $questions = $exam->questions()->inRandomOrder()->with('answer')->get();
            
                    return view('student.examDashboard', ['success' => true, 'qnaExams' => $qnaExams, 'questions' => $questions, 'time' => isset($time) ? $time : null, 'message' => ''. $qnaExams[0]['exam_name']]);
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

    public function resultsDashboard(){

  $attempt = ExamAttempt::where('user_id',Auth::user()->id)->with('exam')->orderBy('updated_at')->get();
    return view('student.result',compact('attempt'));
     
    }
    public function studentQsn(Request $request){
   try {
   $attemptdata = ExamAnswer::where('attempt_id',$request->attempt_id)->with(['question','answers'])->get();
return response()->json(['success'=>true,'data'=>$attemptdata]);
   } catch (\Exception $e) {
return response()->json(['success'=>false,'msg'=>$e->getMessage()]);
   }


    }


}    

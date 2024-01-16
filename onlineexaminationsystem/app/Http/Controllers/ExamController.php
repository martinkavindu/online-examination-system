<?php

namespace App\Http\Controllers;
use App\Models\exam;
use App\Models\QnaExam;
use Illuminate\Http\Request;

class ExamController extends Controller
{

    public function ExamDashboard($id)
    {
        $qnaExam = exam::where('entrance_id', $id)->with('getQnaExam')->get();

        if (count($qnaExam) > 0) {
            
            if ($qnaExam[0]['date'] == date('Y-m-d')) {
                
                 if (count($qnaExam[0]['getQnaExam']) > 0) {
                  
                    $qna = QnaExam::where('exam_id',$qnaExam[0]['id'])->with('questions','answers')->get();
                    return view ('student.examDashboard',['success'=>true,'exam'=>$qnaExam,'qna'=>$qna]);
                 }
                 else{
                    return view('student.examDashboard', ['success' => false, 'message' => 'This exam is not available ', 'exam' => $qnaExam]);
                 }
            } elseif ($qnaExam[0]['date'] > date('Y-m-d')) {
                return view('student.examDashboard', ['success' => false, 'message' => 'This exam will be done on ' . $qnaExam[0]['date'], 'exam' => $qnaExam]);
            } else {
                return view('student.examDashboard', ['success' => false, 'message' => 'This exam expired on ' . $qnaExam[0]['date'], 'exam' => $qnaExam]);
            }
        } else {
            return view('404');
        }
    }

   
      
}    

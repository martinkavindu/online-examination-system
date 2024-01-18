<?php

namespace App\Http\Controllers;
use App\Models\exam;
use App\Models\QnaExam;
use Illuminate\Http\Request;

class ExamController extends Controller
{

    public function ExamDashboard($id)
    {
        $qnaExams = exam::where('entrance_id', $id)->with('getQnaExam')->get();

        if (count($qnaExams) > 0) {
            
            if ($qnaExams[0]['date'] == date('Y-m-d')) {
                
                if (count($qnaExams[0]->getQnaExam) > 0) {

                    $questions = [];

                    foreach ($qnaExams[0]->getQnaExam as $exam) {
                        // Assuming 'questions' is the relationship method in QnaExam model
                        $questions[] = $exam->questions;
                    }
                    dd($questions);

                    return view('student.examDashboard', ['success' => true, 'qnaExams' => $qnaExams, 'questions' => $questions]);
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
      
}    

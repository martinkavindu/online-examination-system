<?php

namespace App\Http\Controllers;
use App\Models\exam;
use App\Models\QnaExam;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function ExamDashboard($id){

        $examqsn = exam::where('entrance_id',$id)->with('qnaExam')->get();
         if(count($examqsn) > 0){
  
            if($examqsn[0]['date'] == date('Y-m-d')){

                if (count($examqsn[0]['qnaExam']) >0 ){
                    

                }
                else{
                    
   return view ('student.examDashboard',['success'=>false,'message'=>'This exam is not available!']);

                }
                
            }else if($examqsn[0]['date'] > date('Y-m-d')){

   return view ('student.examDashboard',['success'=>false,'message'=>'This exam will start on ' .$examqsn[0]['date'],'exam'=>$examqsn]);


            }else{
  return view ('student.examDashboard',['success'=>false,'message'=>'This exam  is Expired' .$examqsn[0]['date'],'exam'=>$examqsn]);
   
            }

         }else
         {
            return view('404');

         }

    }
}

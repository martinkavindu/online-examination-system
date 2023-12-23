<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subjects;
use App\Models\Answers;
use App\Models\Questions;
use App\Models\exam;

class AdminController extends Controller
{
    
    // subject methods

    public function AddSubject (){
        return view('subjects.add_subject');
    }

    public function StoreSubject(Request $request){

        $request->validate([
            "subject_name"=>'required'
        ]);

        Subjects::insert([
            'subject_name'=>$request->subject_name,
          
          
        ]);

        return redirect()->route('allsubject')->with('message','subject created successfully'); 


    }

    public function AllSubject (){

        $subjects = Subjects::all();

        return view('subjects.all_subject',compact('subjects'));

    }
    public function EditSubject ($id){

        $subjects = Subjects::findOrFail($id);
        return view('subjects.edit_subject',compact('subjects'));
    }

    public function UpdateSubject (Request $request, $id){

        $sid = $request->id;
         
        Subjects::findOrFail($sid)->update([
            'subject_name'=>$request->subject_name,
           
        ]);

        return redirect()->route('allsubject')->with('message','subject updated successfully');
    }

    public function DeleteSubject ($id) {

        Subjects::findOrFail($id)->delete();

        return back()->with('message',"subject deleted successfully");
    }

    //all exams methods

    public function AllExam (){

   


 $exams = exam::latest()->get();

 return view ('exam.all_exam',compact('exams'));


    }
    public function AddExam (){

        $subjects = Subjects::pluck('subject_name','id');

        return view('exam.add_exam',compact('subjects'));
    }
    public function StoreExam(Request $request)
    {
        exam::insert([
            'exam_name' => $request->exam_name,
            'subject_name' => $request->subject_name,
            'date' => $request->date,
            'time' => $request->time,
            'attempt' => $request->attempt
        ]);
    
        return redirect()->route('allexam')->with('message', 'Exam added successfully');
    }

    public function EditExam ($id){

    $exams =  exam::findOrFail($id);

return view('exam.edit_exam',compact('exams'));

    }
    public function UpdateExam (Request $request, $id){

        $eid = $request->id;
         
        exam::findOrFail($eid)->update([
          
            'exam_name' => $request->exam_name,
            'subject_name' => $request->subject_name,
            'date' => $request->date,
            'time' => $request->time,
            'attempt' => $request->attempt
        ]);

        return redirect()->route('allexam')->with('message','exam updated successfully');
    }

    
    public function DeleteExam ($id) {

        exam::findOrFail($id)->delete();

        return back()->with('message',"exam deleted successfully");
    }
    
    //q$a methods

    public function qnaDashboard(){

        return view('exam.qnadashboard');
    }

    public function StoreQna(Request $request)
    {
        $request->validate([
            'question' => 'required|string',
            'answers' => 'required|array',
            'answers.*.answer' => 'required|string',
            'answers.*.is_correct' => 'required|boolean',
        ]);
    
        Questions::insert([
            'question' => $request->question,

        ]);
        Answers::insert([
            'question_id' => $request->question_id,
            'answer' => $request->answer,
            'is_correct'=>$request->is_correct

        ]);
      
    
        return redirect()->back()->with('success', 'Question and answers added successfully');
    }
    
}

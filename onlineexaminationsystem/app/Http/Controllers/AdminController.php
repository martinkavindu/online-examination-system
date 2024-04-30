<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subjects;
use App\Models\Answer;
use App\Models\Question;
use App\Models\exam;
use App\Models\ExamAttempt;
use App\Models\QnaExam;
use App\Models\User;
use App\Imports\QnaImport;
use App\Exports\studentExport;
use App\Models\ExamAnswer;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Hash;
use Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
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
        $unique_id = uniqid('EXM');
        exam::insert([
            'exam_name' => $request->exam_name,
            'subject_name' => $request->subject_name,
            'date' => $request->date,
            'time' => $request->time,
            'attempt' => $request->attempt,
            'entrance_id' => $unique_id
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

        return view('exam.addquestion');
    }


    public function StoreQns (Request $request){
        Question::insert([
            'question'=> $request->question,
            'explanation'=>$request->explanation
        ]);
        return redirect()->route('allqna')->with('message', 'Question added successfully');
    }

    public function AddAnswer (){

        $questions = Question::pluck('question','id');
        return view ('exam.addanswer',compact('questions'));
    }

    public function StoreAnswer(Request $request)
{


    $correctAnswerIndex = $request->input('is_correct');
    $questionId = $request->input('question_id');

    foreach ($request->input('answers') as $index => $answerData) {
        $isCorrect = $index === (int)$correctAnswerIndex ? 1 : 0;

        Answer::create([
            'question_id' => $questionId,
            'answer' => $answerData['text'],
            'is_correct' => $isCorrect,
        ]);
    }
    
    return redirect()->route('allqna')->with('message',"Answers created successfully");
}

 /*   public function storeQna(Request $request)
    {
        // Validate the form data
        $request->validate([
            'question' => 'required|string',
            'answer' => 'required|array',
            'answer.*' => 'string',
            'is_correct' => 'required|array',
        ]);

        // Create a new question
        $question = Question::create([
            'question' => $request->input('question'),
        ]);

        // Create answers
        foreach ($request->input('answer') as $key => $answerText) {
            $isCorrect = $request->input('is_correct.' . $key) === 'on';
            
            Answer::create([
                'question_id' => $question->id,
                'answer' => $answerText,
                'is_correct' => $isCorrect,
            ]);
        }

        return redirect()->route('allqna')->with('message', 'Q&A created successfully');
    }

*/

        public function Allqna (){
            $questions = Question::with('answer')->get();

            return view('exam.allqna',compact('questions'));
        }
      
    
        public function Answers($id){ 
            $question = Question::findOrFail($id);
            $answers = $question->answer;

            return view('exam.answers', compact('answers'));
        
        }

        public function Importqna (){
            return view ('exam.importqna');
        }
    
        public function Import (){
            Excel::import(new QnaImport, $request->file('file'));

            return redirect()->route('allqna')->with('message','Questions and answers uploaded successfully');

        }

        //students

        public function Allstudents (){

    $students = User::where('is_admin',0)->get();
    
    return view('admin.allstudents',compact('students'));
        }
    
        public function Addstudent(){
            return view('admin.addstudent');
        }
        public function storeStudent(Request $request)
        {
            $password = Str::random(8);
        
            try {
                // Attempt to insert the student
                User::insert([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($password)
                ]);
        
            /*    $url = URL::to('/');
                $data['url'] = $url;
                $data['email'] = $request->email;
                $data['password'] = $password;
                $data['title'] = 'Student registration on OES';
        
                Mail::send('registrationMail', ['data' => $data], function ($message) use ($data) {
                    $message->to($data['email'])->subject($data['title']);
                });
                */
        
                return redirect()->route('students')->with('message', 'Student added successfully');
            } catch (QueryException $e) {
                // Check if the error code indicates a duplicate entry violation
                if ($e->getCode() == '23000') {
                    // Duplicate entry violation
                    return redirect()->route('students')->with('error', 'Email already exists');
                }
        
                // Handle other database errors
                return redirect()->route('students')->with('error', 'Error adding student');
            }
        
        }

        public function DeleteStudent($id){

            $user = User::findOrFail($id);
    
            if(!is_null($user)){
        
                $user->delete();
            }
            return redirect()->route('students')->with('message','student deleted successfuly');
    
        }


        public function exportStudent(){
return excel::download(new studentExport,'students.xlsx');
        
        }
        // add questions to the exams   
        public function Questions(Request $request, $exam_id)
        {
            $exam = exam::findOrFail($exam_id);
            $questions = Question::all();
            return view('exam.questions', compact('questions', 'exam'));
        }
        

        public function storeQnaExam(Request $request)
        {
          
                // Validate the form data
                $request->validate([
                    'exam_id' => 'required|exists:exams,id',
                    'question_id' => 'required|array',
                    'question_id.*' => 'exists:questions,id',
                ]);
        
                // Retrieve exam
                $exam = exam::findOrFail($request->input('exam_id'));
        
                // Attach selected questions to the exam using Eloquent's createMany method
                $qnaExams = [];
                foreach ($request->input('question_id') as $questionId) {
                    $qnaExams[] = [
                        'exam_id' => $exam->id,
                        'question_id' => $questionId,
                    ];
                }
        
                QnaExam::insert($qnaExams);
        
                return redirect()->route('allexam')->with('message', 'Questions added to exam successfully');

        }
        
        public function AllQuestions($id)
{
    $exam = QnaExam::findOrFail($id);
    $questions = $exam->questions;



    return view('exam.allquestions', compact('exam', 'questions'));
}
//marks

public function loadMarks(){

    $exams = exam::with('getQnaExam')->get();
    return view('admin.marks',compact('exams'));
        
}

public function Updatemarks(Request $request){

    try {

        exam::where('id',$request->exam_id)->update([
            'marks'=>$request->marks,
            'pass_marks'=>$request->pass_marks
        ]);

        return response()->json(['success'=>TRUE,'message'=>'exam marks updated successfully']);

        
    } catch (\Exception $e) {

        return response()->json(['success'=>FALSE,'message'=>"failed to update exam marks"]); 
       
    }
}

public function  reviewExam (){

    $attempts= ExamAttempt::with(['user','exam'])->orderBy('id')->get();

return view('admin.examreview',compact('attempts'));

}

public function reviewQna(Request $request){

  try {

    $attemptData = ExamAnswer::where('attempt_id',$request->attempt_id)->with(['question','answers'])->get();

    return response()->json(['success'=>true,'data'=>$attemptData]);
    

  } catch (\Exception $e) {

    return response()->json(['success'=>FALSE,'message'=>"failed to update exam marks"]); 
 
  }
}

public function approvedQ(Request $request){
    try {
        $attempt_id = $request->attempt_id;
        $examData = ExamAttempt::where('id', $attempt_id)->with(['exam','user'])->first();
        $marks = $examData->exam->marks;

        $attemptData = ExamAnswer::where('attempt_id', $attempt_id)->with('answers')->get();

        $totalMarks = 0;

        foreach($attemptData as $attempt){
            if($attempt->answers->is_correct == 1){
                $totalMarks += $marks;
            }
        }

        ExamAttempt::where('id', $attempt_id)->update([
            'status' => 1,
            'marks' => $totalMarks
        ]);

        $url = URL::to('/');
        $data['url'] = $url.'/results';
        $data['name'] = $examData->user->name;
        $data['email'] = $examData->user->email;
        $data['marks'] = $totalMarks;
        $data['exam_name'] = $examData->exam->exam_name;
        $data['title'] = $examData->exam->exam_name.' Result';

        Mail::send('result-mail', ['data' => $data], function($message) use ($data){
            $message->to($data['email'])->subject($data['title']);
        });

        return response()->json(['success' => true, 'msg' => 'Approved successfully', 'data' => $attemptData]);
    } catch (\Exception $e) {
        \Log::error('Error approving exam: '.$e->getMessage());
        return response()->json(['success' => false, 'msg' => 'Failed to approve exam: '.$e->getMessage()]);
    }
}


}

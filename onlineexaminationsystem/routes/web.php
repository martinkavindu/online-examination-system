<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\studentController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('login');
});

Route::get('/register',[AuthController::class,'loadingRegister'])->name('register');
Route::post('/register',[AuthController::class,'studentRegister'])->name('studentregister');

Route::get('/login', function () {
    return redirect('/');
});


Route::get('/login',[AuthController::class,'loadingLogin'])->name('login');
Route::post('/login',[AuthController::class,'userLogin'])->name('userlogin');


Route::get('/logout',[AuthController::class,'Logout'])->name('logout');

Route::get('/forgetpassword',[AuthController::class,'ForgetPassword'])->name('forgetpassword');
Route::post('/forgotpassword',[AuthController::class,'ForgotPassword'])->name('forgotpassword');


Route::group(['middleware'=>['web','checkAdmin']],function(){

    Route::get('/admin/dashboard',[AuthController::class,'AdminDashboard'])->name('admindashboard');

    //subjects routes
    Route::get('/add/subject',[AdminController::class,'AddSubject'])->name('addsubject');
    Route::post('/store/subject',[AdminController::class,'StoreSubject'])->name('storesubject');

    Route::get('/all/subject',[AdminController::class,'AllSubject'])->name('allsubject');
    Route::get('/edit/subject/{id}',[AdminController::class,'EditSubject'])->name('editsubject');
    Route::post('/update/subject/{id}',[AdminController::class,'UpdateSubject'])->name('updatesubject');
    Route::get('/delete/subject/{id}',[AdminController::class,'DeleteSubject'])->name('deletesubject');

    //exams routes

    Route::get('/all/exams',[AdminController::class,'AllExam'])->name('allexam');
    Route::get('/add/exam',[AdminController::class,'AddExam'])->name('addexam');
    Route::post('/store/exam',[AdminController::class,'StoreExam'])->name('storexam');
    Route::get('/edit/exam/{id}',[AdminController::class,'EditExam'])->name('editexam');
    Route::post('/update/exam/{id}',[AdminController::class,'UpdateExam'])->name('updateexam');
    Route::get('/delete/exam/{id}',[AdminController::class,'DeleteExam'])->name('deleteexam');

    //Q&A routes
    Route::get('/all/q&a',[AdminController::class,'qnaDashboard'])->name('addqsn');
    Route::post('/store/qsn',[AdminController::class,'StoreQns'])->name('storeqsn');
    Route::get('/all/qna',[AdminController::class,'Allqna'])->name('allqna');
    Route::get('/answers/{id}',[AdminController::class,'Answers'])->name('answers');
    Route::get('/add/answers',[AdminController::class,'AddAnswer'])->name('addanswer');
    Route::post('/store/answer',[AdminController::class,'StoreAnswer'])->name('storeanswer');

    Route::get('/import/qna',[AdminController::class,'Importqna'])->name('importqna');
    Route::post('/import',[AdminController::class,'Import'])->name('import');

    // all students routes
    Route::get('/all/students',[AdminController::class,'Allstudents'])->name('students');
    Route::get('/add/student',[AdminController::class,'Addstudent'])->name('addstudent');
    Route::post('/store/student',[AdminController::class,'StoreStudent'])->name('storestudent');
    Route::get('/delete/student/{id}',[AdminController::class,'DeleteStudent'])->name('deletestudent');
    Route::get('/export/student',[AdminController::class,'exportStudent'])->name('exportstudent');
    //add marks
    Route::get('/admin/marks',[AdminController::class,'loadMarks'])->name('marks');
    Route::post('/update/marks',[AdminController::class,'Updatemarks'])->name('updatemarks');

    //review markss
    Route::get('/admin/review',[AdminController::class,'reviewExam'])->name('reviewexams');
    Route::get('/admin/reviewQna',[AdminController::class,'reviewQna'])->name('reviewQna');
    Route::post('/approved/qna',[AdminController::class,'approvedQ'])->name('approvedQ');
    
// add questions to exams 
// web.php
Route::get('/questions/{exam_id}', [AdminController::class, 'Questions'])->name('questions');

Route::post('/store/qnaexam',[AdminController::class,'StoreQnaExam'])->name('storeqnaexam');
Route::get('/all/questions/{id}', [AdminController::class, 'AllQuestions'])->name('allquestions');


});

Route::group(['middleware'=>['web','checkStudent']],function(){

Route::get('/dashboard',[AuthController::class,'Dashboard'])->name('dashboard');
Route::get('/exam/{id}',[ExamController::class,'ExamDashboard'])->name('examdashboard');
Route::post('/exam_submit',[ExamController::class,'examSubmit'])->name('examsubmit');
Route::get('/results', [ExamController::class, 'resultsDashboard'])->name('results');
Route::get('/studentqsn', [ExamController::class, 'studentQsn'])->name('studentqsn');
Route::get('/paidexams', [studentController::class, 'paidExam'])->name('paidexams');
});




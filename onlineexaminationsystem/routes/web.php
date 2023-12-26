<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

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
    Route::get('/all/q&a',[AdminController::class,'qnaDashboard'])->name('q&a');
    Route::post('/store/qna',[AdminController::class,'StoreQna'])->name('storeqna');
    
    
});

Route::group(['middleware'=>['web','checkStudent']],function(){

Route::get('/dashboard',[AuthController::class,'Dashboard'])->name('dashboard');

});




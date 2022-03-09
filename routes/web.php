<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ParentsController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PaymentController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Routes for Website

Route::get('/', function () {
    return view('welcome');
});

Route::get('/' , [HomeController::class, 'index']);

//Routes for managing students 

Route::get('/students', [StudentsController::class, 'index'])->middleware('auth');

Route::get('/deleteStudent/{id}', [StudentsController::class, 'deleteStudentRecords'])->middleware('auth');

Route::post('/editStudentDetails/{id}', [StudentsController::class, 'editStudentDetails'])->middleware('auth');

Route::post('/studentRegistration', [StudentsController::class, 'registerNewStudent'])->middleware('auth');

Route::get('/importStudents', [StudentsController::class, 'importStudentsView'])->middleware('auth');

Route::post('/importStudentsDetails', [StudentsController::class, 'importStudentsDetails'])->middleware('auth');

Route::get('/exportStudentsDetails', [StudentsController::class, 'exportStudentsDetails'])->middleware('auth');

Route::get('/studentProfile', [StudentsController::class, 'studentProfile'])->middleware('auth');

//Routes for managing users

Route::get('/login', [UsersController::class, 'showLoginForm']);

Route::post('/redirectAfterLogin', [UsersController::class, 'userLogin']);

Route::get('/logout', [UsersController::class, 'userLogout'])->middleware('auth');

//Routes for managing Dashboard

Route::get('/dashboard', [AdminController::class, 'index'])->middleware('auth');

Route::get('/gendersummary', [AdminController::class, 'genderSummary']);

//Routes for managing Parents

Route::get('/parents', [ParentsController::class, 'index'])->middleware('auth');

Route::get('/parent/{id}/profile', [ParentsController::class, 'profile'])->middleware('auth');

Route::post('/addParentDetails', [ParentsController::class, 'addNewParentDetails'])->middleware('auth');

Route::get('/sendMailsToAllParents', [ParentsController::class, 'sendMailsToParents'])->middleware('auth');

Route::get('/schoolFeeSms', [ParentsController::class, 'sendSchoolFeeSms'])->middleware('auth');

Route::post('/sendCustomSMSToParent/{id}', [ParentsController::class, 'sendCustomSMS'])->middleware('auth');

//Routes for managing Payment

Route::get('/payment', [PaymentController::class, 'index'])->middleware('auth');

Route::post('/addPayment', [PaymentController::class, 'addNewPaymentRecord'])->middleware('auth');

Route::get('/viewPayments/{id}', [PaymentController::class, 'viewPaymentsRecords'])->middleware('auth');

Route::get('/deletePaymentRecord/{id}', [PaymentController::class, 'deletePaymentRecord'])->middleware('auth');

//Routes for managing Roles and Permissions

Route::group(['middleware' => ['auth']], function(){
    Route::resource('/roles', RolesController::class);
    Route::resource('/users', UsersController::class);
   

});
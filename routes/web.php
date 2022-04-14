<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\ParentsController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ClassesController;
use App\Models\User;
use Spatie\Permission\Contracts\Role;

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

Route::get('/login', [UsersController::class, 'showLoginForm'])->name('login');

Route::post('/redirectAfterLogin', [UsersController::class, 'userLogin']);

Route::get('/logout', [UsersController::class, 'userLogout'])->middleware('auth');

Route::get('/users', [UsersController::class, 'index'])->middleware('auth');

Route::get('/users/create', [UsersController::class, 'createForm'])->middleware('auth');

Route::post('/users/saveUser', [UsersController::class, 'createUser'])->middleware('auth');

Route::get('/user/{id}/profile', [UsersController::class, 'userProfile'])->middleware('auth');

Route::get('/user/{id}/edit/profile', [UsersController::class, 'showEditForm'])->middleware('auth');

Route::post('/user/{id}/edit', [UsersController::class, 'updateUser'])->middleware('auth');

Route::get('/deleteUser/{id}', [UsersController::class, 'deleteUserDetails'])->middleware('auth');

Route::post('/user/{id}/sendEMail', [UsersController::class, 'sendCustomEmailToUser'])->middleware('auth');

Route::get('/user/{id}/sendEmail', [UsersController::class, 'showEmailForm'])->middleware('auth');

Route::get('/users/notifications/email', [UsersController::class, 'emailsNotificationForm'])->middleware('auth');

Route::get('/users/notifications/sms', [UsersController::class, 'smsNotificationForm'])->middleware('auth');

Route::post('/users/notification/emails/send', [UsersController::class, 'mailNotificationToStaff'])->middleware('auth');

Route::post('/users/notification/sms/send', [UsersController::class, 'smsNotificationToStaff'])->middleware('auth');

//Routes for managing Dashboard

Route::get('/dashboard', [AdminController::class, 'index'])->middleware('auth');

// Route::get('/dashboard', [AdminController::class, 'staffGenderSummary'])->middleware('auth');

Route::get('/gendersummary', [AdminController::class, 'genderSummary']);

//Routes for managing Parents

Route::get('/parents', [ParentsController::class, 'index'])->middleware('auth');

Route::get('/parent/{id}/profile', [ParentsController::class, 'profile'])->middleware('auth');

Route::post('/addParentDetails', [ParentsController::class, 'addNewParentDetails'])->middleware('auth');

Route::get('/sendMailsToAllParents', [ParentsController::class, 'sendMailsToParents'])->middleware('auth');

Route::get('/schoolFeeSms', [ParentsController::class, 'sendSchoolFeeSms'])->middleware('auth');

Route::post('/sendCustomSMSToParent/{id}', [ParentsController::class, 'sendCustomSMS'])->middleware('auth');

Route::post('/parent/{id}/sendEmail', [ParentsController::class, 'sendCustomEmail'])->middleware('auth');

//Routes for managing Payment

Route::get('/payment', [PaymentController::class, 'index'])->middleware('auth');

Route::post('/addPayment', [PaymentController::class, 'addNewPaymentRecord'])->middleware('auth');

Route::get('/viewPayments/{id}', [PaymentController::class, 'viewPaymentsRecords'])->middleware('auth');

Route::get('/deletePaymentRecord/{id}', [PaymentController::class, 'deletePaymentRecord'])->middleware('auth');

//Routes for managing Roles and Permissions

Route::group(['middleware' => ['auth']], function(){

    Route::resource('/roles', RolesController::class);

});

//Routes to Manage classes

Route::get('/classes', [ClassesController::class, 'index'])->middleware('auth');

Route::get('/class/create', [ClassesController::class, 'createClassForm'])->middleware('auth');

Route::post('/class/saveClass', [ClassesController::class, 'createClass'])->middleware('auth');

//Routes to Manage Attendances

Route::get('/attendance', [AttendanceController::class, 'index']);
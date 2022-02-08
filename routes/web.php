<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ParentsController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UsersController;


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

Route::get('/students', [StudentsController::class, 'index']);

Route::get('/deleteStudent/{id}', [StudentsController::class, 'deleteStudentRecords']);

Route::post('/editStudentDetails/{id}', [StudentsController::class, 'editStudentDetails']);

Route::post('/studentRegistration', [StudentsController::class, 'registerNewStudent']);

Route::get('/importStudents', [StudentsController::class, 'importStudentsView']);

Route::post('/importStudentsDetails', [StudentsController::class, 'importStudentsDetails']);

Route::get('/exportStudentsDetails', [StudentsController::class, 'exportStudentsDetails']);

//Routes for managing Dashboard

Route::get('/dashboard', [AdminController::class, 'index']);

//Routes for managing Students Parents

Route::get('/parents', [ParentsController::class, 'index']);

Route::post('/addParentDetails', [ParentsController::class, 'addNewParentDetails']);

Route::get('/sendMailsToAllParents', [ParentsController::class, 'sendMailsToParents']);

//Routes for managing Roles and Permissions

Route::group(['middleware' => ['auth']], function(){
    Route::resource('/roles', RolesController::class);
    Route::resource('/users', UsersController::class);
    Route::resource('/parents', RolesController::class);

});
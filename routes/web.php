<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\StudyDaysController;
use Illuminate\Support\Facades\Route;
// use App\Models\Student;

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

Route::get('/', [StudentController::class, 'index']);

// // Single User
// Route::get('/students/{id}', function ($id) {
//     return view('student', [
//         'student' => Student::find($id)
//     ]);
// });

// Show Create Student
Route::get('/students/create', [StudentController::class, 'create']);

// Store Student Data
Route::post('/students', [StudentController::class, 'store']);

// Single User
Route::get('/students/{student}', [StudentController::class, 'show']);



// status //

// Show All Student's Statuses
Route::get('/students/{student}/statuses', [StatusController::class, 'showAllStudentStatuses']);

// Show Create Status
Route::get('/students/{id}/statuses/create', [StatusController::class, 'create']);

// Store Status Data
Route::post('/students/{id}/statuses', [StatusController::class, 'store']);


// study_days //

// Show All Student's Statuses
Route::get('/students/{student}/study_days', [StudyDaysController::class, 'showAllStudentStudyDays']);

// Show Create Study Days
Route::get('/students/{id}/study_days/create', [StudyDaysController::class, 'create']);

// Store Study Days Data
Route::post('/students/{id}/study_days', [StudyDaysController::class, 'store']);

// Delete Study Days
Route::delete('/students/{id}/study_days', [StudyDaysController::class, 'destroy']);

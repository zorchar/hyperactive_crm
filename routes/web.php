<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\StudyDayController;
use App\Http\Controllers\UserController;
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

// Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login');

// Authenticate
Route::post('/authenticate', [UserController::class, 'authenticate']);

// Logout User
Route::post('/logout', [UserController::class, 'logout']);

// Show Home Page
Route::get('/', [UserController::class, 'login']);

// Show My Profile
Route::get('/me', [UserController::class, 'show']);

// // Single User
// Route::get('/students/{id}', function ($id) {
//     return view('student', [
//         'student' => Student::find($id)
//     ]);
// });

// Show All Users Of Type
Route::get('/students', [StudentController::class, 'index'])->middleware('authTeacher');

// Show All Teachers
Route::get('/teachers', [StudentController::class, 'indexTeachers'])->middleware('authAdmin');

// Show Create User
Route::get('/{userType}/create', [StudentController::class, 'create'])->middleware('authTeacher');

// Store User Data
Route::post('/{userType}', [StudentController::class, 'store'])->middleware('authTeacher');

// Single Student
Route::get('/students/{user}', [StudentController::class, 'show']);

// Single Teacher
Route::get('/teachers/{user}', [StudentController::class, 'show'])->middleware('authTeacher');

// Delete User
Route::get('/{userType}/{user}/confirm_delete', [StudentController::class, 'showDestroy'])->middleware('authAdmin');

// Delete User
Route::delete('/users/{user}', [StudentController::class, 'destroy'])->middleware('authAdmin');



// status //

// Show All Student's Statuses
Route::get('/students/{student}/statuses', [StatusController::class, 'showAllStudentStatuses'])->middleware('authTeacher');

// Show All Teacher's Statuses
Route::get('/teachers/{student}/statuses', [StatusController::class, 'showAllStudentStatuses'])->middleware('authAdmin');

// Show Create Status
Route::get('/students/{id}/statuses/create', [StatusController::class, 'create'])->middleware('authTeacher');

// Show Create Teacher Status
Route::get('/teachers/{id}/statuses/create', [StatusController::class, 'create'])->middleware('authAdmin');

// Store Status Data
Route::post('/users/{user}/statuses', [StatusController::class, 'store'])->middleware('authTeacher');


// study_days //

// Show All Student's Study Days
Route::get('/students/{student}/study_days', [StudyDayController::class, 'showAllStudentStudyDays'])->middleware('auth'); // add auth of exact user or teacher and above

// Show Create Study Days
Route::get('/students/{id}/study_days/create', [StudyDayController::class, 'create'])->middleware('authAdmin');

// Store Study Days Data
Route::post('/students/{id}/study_days', [StudyDayController::class, 'store'])->middleware('authAdmin');

// Delete Study Days
Route::delete('/students/{id}/study_days', [StudyDayController::class, 'destroy'])->middleware('authAdmin');


// questions //

// Show All Student's Questions
Route::get('/students/{student}/questions', [QuestionController::class, 'showAllStudentQuestions']);

// Show Create Question
Route::get('/students/{studentId}/questions/create', [QuestionController::class, 'create']);

// Store Question Data
Route::post('/students/{studentId}/questions', [QuestionController::class, 'store']);

// Show Edit Question
Route::get('/students/{student}/questions/{question}', [QuestionController::class, 'edit']);

// Update Question
Route::put('/students/{studentId}/questions/{question}', [QuestionController::class, 'update']);


// attendances

// Show All Student's Attendances
Route::get('/students/{student}/attendances', [AttendanceController::class, 'showAllStudentAttendances'])->middleware('authTeacher');

// Store Attendance
Route::get('/students/{user}/attendances/validate', [AttendanceController::class, 'store']);

// Update Attendance
Route::put('/students/{student}/attendances/{attendance}', [AttendanceController::class, 'update'])->middleware('authTeacher');

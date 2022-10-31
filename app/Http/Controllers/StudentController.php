<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    // Show All Students
    public function index()
    {
        // if (!session('students')) // check if needs to ask for students every time or take from session
        session(['students' => User::orderBy('first_name')->where('role', 'like', 1)->get(['id', 'first_name', 'last_name'])]);

        return view('students.students', [
            'students' => session('students')
        ]);
    }

    public function showReport()
    {
        // $statusesView = Status::orderBy('user_id', 'asc')->orderBy('created_at', 'desc')->select('user_id')->distinct()->get(['user_id', 'created_at']);
        $results = DB::select(DB::raw("select u.id, curriculum, lfs.description, lfs.created_at  
                from users u 
                left join student_last_statuses  lfs on u.id = lfs.user_id   "));

        //  $results = DB::select(DB::raw("with last_statuses as (
        //     select user_id, max(id) as id
        //     from statuses 
        //     group by user_id ),
        //     full_last_statuses as (
        //         select ls.user_id, s.created_at, description 
        //         from last_statuses ls 
        //         join statuses s on  s.id = ls.id
        //      )
        //    select u.id, curriculum,  fls.created_at, fls.description 
        //    from users u 
        //    left join full_last_statuses fls on u.id = fls.user_id "));

        dd($results);



        // dd(User::orderBy('first_name')->where('role', 'like', 1)->joinSub($statusesView, 'statuses', function ($join) {
        //     $join->on('users.id', '=', 'statuses.user_id');
        // })->get(['users.id', 'first_name', 'last_name', 'curriculum', 'description', 'statuses.created_at']));
        return view('report', [
            'students' => User::orderBy('first_name')->where('role', 'like', 1)->join('statuses', function ($join) {
                $join->latest()->on('users.id', '=', 'statuses.user_id');
            })->get(['users.id', 'first_name', 'last_name', 'curriculum', 'description', 'statuses.created_at'])
        ]);
    }

    // Show Single Student
    public function show(User $student)
    {
        unset($student['password']);
        unset($student['remember_token']);
        unset($student['created_at']);
        unset($student['updated_at']);
        session(['queriedUser' => $student]); // check later if needed

        return view('students.student', [
            'student' => $student,
            'status' => Status::latest()->filter($student['id'])->get()->first(),
            'question' => Question::latest()->filter($student['id'])->get()->first(),
            // 'User' => User::class
        ]);
    }

    // Show Create Form
    public function create()
    {
        return view('students.create');
    }

    // Store Student Data
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'national_id' => ['required', Rule::unique('users', 'national_id')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed'],
            'phone' => 'required',
            'address' => 'required',
            'curriculum' => 'nullable',
            'starting_date' => 'required'
        ]);

        // Hash Password
        $formFields['password'] = bcrypt($formFields['password']);

        $formFields['role'] = 1;

        User::create($formFields);

        return redirect('/')->with('message', 'Student Created!');
    }
}

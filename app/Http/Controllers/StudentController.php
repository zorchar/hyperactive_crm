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
        $results = DB::select(DB::raw("select u.id,first_name,last_name, curriculum, lfs.description, lfs.created_at
        from users u 
        left join student_last_statuses  lfs on u.id = lfs.user_id
        where u.role = 1
        order by last_name, first_name
        "));

        $collection = collect($results);

        return view('report', [
            'users' => $collection,
            'userType' => 'students'
        ]);
    }

    public function indexTeachers()
    {
        $results = DB::select(DB::raw("select u.id,first_name,last_name, curriculum, lfs.description, lfs.created_at
        from users u 
        left join student_last_statuses  lfs on u.id = lfs.user_id
        where u.role = 2
        order by last_name, first_name
        "));

        $collection = collect($results);

        return view('report', [
            'users' => $collection,
            'userType' => 'teachers'
        ]);
    }

    // Show Single Student
    public function show(User $user)
    {
        if (!auth()->user() || auth()->user()->id != $user->id && auth()->user()->role == 1)
            return redirect('/')->with('message', 'Not Authorized');

        unset($user['password']);
        unset($user['remember_token']);
        unset($user['created_at']);
        unset($user['updated_at']);
        session(['queriedUser' => $user]); // check later if needed

        if ($user->role == 1)
            $userType = 'students';
        if ($user->role == 2)
            $userType = 'teachers';

        return view('students.student', [
            'user' => $user,
            'userType' => $userType,
            'status' => Status::latest()->filter($user['id'])->get()->first(),
            'question' => Question::latest()->filter($user['id'])->get()->first(),
        ]);
    }

    // Show Create Form
    public function create($userType)
    {
        if (
            $userType == 'teachers' && auth()->user()?->role > 2 ||
            $userType == 'students' && auth()->user()?->role > 1
        ) {
            return view('students.create', [
                'userType' => $userType
            ]);
        }

        return redirect('/')->with('message', 'Not Authorized');
    }

    // Store Student Data
    public function store($userType, Request $request)
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

        if ($userType == 'students')
            $formFields['role'] = 1;
        if ($userType == 'teachers')
            $formFields['role'] = 2;

        User::create($formFields);

        return redirect('/' . $userType)->with('message', 'User Created!');
    }

    public function showDestroy($_, User $user)
    {
        return view('students.confirmDelete', [
            'user' => $user
        ]);
    }

    public function destroy(User $user)
    {
        if ($user->role == 1)
            $userType = 'students';
        if ($user->role == 2)
            $userType = 'teachers';

        $user->delete();

        return redirect('/' . $userType)->with('message', 'User Deleted!');
    }
}

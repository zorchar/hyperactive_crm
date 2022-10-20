<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    // Show All Students
    public function index()
    {
        return view('welcome', [
            // 'students' => Student::latest()->get()
            'students' => Student::get()
        ]);
    }

    // Show Single Student
    public function show(Student $student)
    {
        return view('students.student', [
            'student' => $student,
            'status' => Status::latest()->filter($student['id'])->get()->first()
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
            'national_id' => 'required',
            'email' => ['required', 'email', Rule::unique('students', 'email')],
            'phone' => 'required',
            'address' => 'required',
            'curriculum' => 'nullable',
            'starting_date' => 'required'
        ]);

        Student::create($formFields);

        return redirect('/')->with('message', 'Student Created!');
    }
}

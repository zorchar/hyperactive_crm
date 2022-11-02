<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    // Show All Student's Statuses
    public function showAllStudentStatuses(User $student)
    {
        return view('statuses.statuses', [
            'student' => $student,
            'statuses' => Status::latest()->filter($student['id'])->get(),
            'User' => User::class
        ]);
    }

    // Show Create Form
    public function create($id)
    {
        return view('statuses.create', [
            'id' => $id
        ]);
    }

    // Store Status Data
    public function store(User $user, Request $request)
    {
        if ($user->role == 1)
            $userType = 'students';
        if ($user->role == 2)
            $userType = 'teachers';

        $formFields = $request->validate([
            'description' => 'required', // add trim
        ]);

        $formFields['creator'] = auth()->id(); // todo
        $formFields['user_id'] = $user->id;
        $formFields['created_at'] = now();

        Status::create($formFields);

        return redirect('/' . $userType . '/' . $user->id . '/statuses')->with('message', 'Status Created!');
    }
}

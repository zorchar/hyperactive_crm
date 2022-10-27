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
            'statuses' => Status::latest()->filter($student['id'])->get()
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
    public function store($id, Request $request)
    {
        $formFields = $request->validate([
            'description' => 'required', // add trim
        ]);

        $formFields['creator'] = 'add real creator'; // todo
        $formFields['user_id'] = $id;
        $formFields['created_at'] = now();

        Status::create($formFields);

        return redirect('/students/' . $id . '/statuses')->with('message', 'Status Created!');
    }
}

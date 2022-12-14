<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

// use Illuminate\Support\Facades\Validator;

class AttendanceController extends Controller
{

    // Show All User Attendances
    public function showAllStudentAttendances(User $student)
    {
        return view('attendances.attendances', [
            'student' => $student,
            'attendances' => Attendance::filter($student['id'])->get()
        ]);
    }

    // Store Attendance
    public function store(User $user)
    {
        include '../app/utils/roles.php';
        include '../app/utils/attendedToday.php';

        if (!auth()->user() || auth()->user()->id != $user->id && auth()->user()->role == $roles['student'])
            return redirect('/')->with('message', 'Not Authorized');

        if (!attendedToday($user)) {
            Attendance::create([
                'user_id' => $user->id,
                'created_by' => auth()->id()
            ]);

            return redirect('/');
        }

        return redirect('/')->with('message', 'Already validated attendance');
    }

    // Edit Attendance
    public function update($student, Attendance $attendance, Request $request)
    {
        $formFields = $request->validate(
            [
                'approved_time_of_entry' => ['required', 'date'],
            ]
        );

        if ($request->input('is_approved')) {
            $formFields['approved_by'] = auth()->id();
        } else {
            $formFields['approved_by'] = null;
            $formFields['approved_time_of_entry'] = null;
        }

        // $validator = Validator::make($request->all(), [
        //     'approved_time_of_entry' => ['required', 'date'],
        // ]);

        // if ($validator->fails())
        //     return back()->with('message', 'Must provide date and time.');

        // if (array_key_exists('is_approved', $validator->valid())) {
        //     $formFields['approved_by'] = auth()->id();
        // } else {
        //     $formFields['approved_by'] = null;
        //     $formFields['approved_time_of_entry'] = null;
        // }

        $attendance->update($formFields);

        return redirect('/students/' . $attendance['user_id'] . '/attendances/')->with('message', 'Attendance Changed!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\StudyDay;
use Illuminate\Http\Request;

class StudyDayController extends Controller
{
    // Show Create Form
    public function create($id)
    {
        $studyDays = StudyDay::filter($id)->get();

        $studyDaysMold = [null, null, null, null, null, null, null];
        $daysOfWeek = ['Sunday', 'Monday', 'Tuesday', 'Wednsday', 'Thursday', 'Friday', 'Saturday'];

        for ($i = 0; $i <= 5; $i++) {
            if ($i + 1 <= count($studyDays)) {
                $studyDaysMold[$studyDays[$i]['day_of_week']] = $studyDays[$i];
            }
        }

        return view('study_days.create', [
            'id' => $id,
            'studyDaysMold' => $studyDaysMold,
            'daysOfWeek' => $daysOfWeek
        ]);
    }

    // Show All Student's Study Days
    public function showAllStudentStudyDays(User $student)
    {
        return view('study_days.study_days', [
            'student' => $student,
            'studyDays' => StudyDay::filter($student['id'])->get()
        ]);
    }

    // Store Study Days Data
    public function store($id, Request $request)
    // add deletion of existing StudyDays
    {

        StudyDay::filter($id)->delete();

        for ($i = 1; $i <= 6; $i++) {

            if ($request['checkbox' . $i]) {

                $formFields['day_of_week'] = $i;
                $formFields['user_id'] = $id;
                $formFields['start_time'] = $request['start_time' . $i];
                $formFields['end_time'] = $request['end_time' . $i];
                $formFields['is_remote'] = $request['is_remote' . $i] ? 1 : 0;

                StudyDay::create($formFields);
            }
        }


        return redirect('/students/' . $id . '/study_days')->with('message', 'Study Days Created!');
    }

    // public function destroy(Student $student)
    // {
    //     StudyDay::filter($student['id'])->delete();
    // }
}

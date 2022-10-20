<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\StudyDay;
use Illuminate\Http\Request;

class StudyDaysController extends Controller
{
    // Show Create Form
    public function create($id)
    {
        $studyDays = StudyDay::filter($id)->get();

        $daysOfWeek = [false, false, false, false, false, false, false];

        for ($i = 1; $i <= 6; $i++) {
            if ($i <= count($studyDays)) {
                $daysOfWeek[$studyDays[$i - 1]['day_of_week']] = $studyDays[$i - 1];
            }
        }

        return view('study_days.create', [
            'id' => $id,
            'studyDays' => $studyDays,
            'daysOfWeek' => $daysOfWeek
        ]);
    }

    // Show All Student's Study Days
    public function showAllStudentStudyDays(Student $student)
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

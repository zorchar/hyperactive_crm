<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    // Show All Student's Questions
    public function showAllStudentQuestions(User $student)
    {
        return view('questions.questions', [
            'student' => $student,
            'questions' => Question::latest()->filter($student['id'])->get()
        ]);
    }

    // Show Create Form
    public function create($studentId)
    {
        return view('questions.create', [
            'studentId' => $studentId
        ]);
    }

    // Store Question Data
    public function store($studentId, Request $request)
    {
        $formFields = $request->validate([
            'question' => 'required', // add trim
        ]);

        // $formFields['student_id'] = auth()->id();

        $formFields['student_id'] = $studentId;

        Question::create($formFields);

        return redirect('/students/' . $studentId . '/questions')->with('message', 'Question Created!');
    }

    // Show Edit Form
    public function edit($studentId, Question $question)
    {
        return view('questions.edit', [
            'studentId' => $studentId,
            'question' => $question,
            'User' => User::class
        ]);
    }

    // Update Question
    public function update($studentId, Question $question, Request $request)
    {
        if (auth()->id() != $studentId && !auth()->user()?->role > 1) {
            abort(403, 'Unauthorized Action');
        }

        if (auth()->id() == $studentId) {

            $formFields = $request->validate([
                'question' => 'required', // add trim
            ]);
        } else if (auth()->user()?->role > 1) {

            $formFields = $request->validate([
                'teacher_remark' => 'nullable', // add trim
            ]);
        }

        $formFields['updated_by'] = auth()->id();

        $question->update($formFields);

        return redirect('/students/' . $studentId . '/questions')->with('message', 'Question Edited!');
    }
}

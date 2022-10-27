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

        $formFields['student_id'] = $studentId;

        Question::create($formFields);

        return redirect('/students/' . $studentId . '/questions')->with('message', 'Question Created!');
    }

    // Show Edit Form
    public function edit($studentId, Question $question)
    {
        return view('questions.edit', [
            'studentId' => $studentId,
            'question' => $question
        ]);
    }

    // Update Question
    public function update($studentId, Question $question, Request $request)
    {
        $formFields = $request->validate([
            'question' => 'required', // add trim
        ]);

        $question->update($formFields);

        return redirect('/students/' . $studentId . '/questions')->with('message', 'Question Edited!');
    }
}

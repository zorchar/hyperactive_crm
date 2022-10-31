<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Show Login Form
    public function login()
    {
        if (!auth()->user())
            return view('users.login');

        return view('welcome');
    }

    // Authenticate User
    public function authenticate(Request $request)
    {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect('/')->with('message', 'You have been logged in!');
        }

        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }

    // Logout User
    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been logged out!');
    }

    // Show My Profile
    public function show()
    {
        $user = auth()->user();
        unset($user['password']);
        unset($user['remember_token']);
        unset($user['created_at']);
        unset($user['updated_at']);

        return view('students.student', [
            'student' => $user,
            'status' => Status::latest()->filter(auth()->id())->get()->first(),
            'question' => Question::latest()->filter(auth()->id())->get()->first()
            // 'User' => User::class
        ]);
    }
}

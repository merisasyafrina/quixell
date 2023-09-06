<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register', [
            'title' => 'Register',
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => ['required', 'max:50'],
            'last_name' => ['required', 'max:50'],
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email'), // Optional: Check for unique email
                function ($attribute, $value, $fail) {
                    if (!preg_match('/^.+@.+\..+$/i', $value)) {
                        $fail('The '.$attribute.' format is invalid.');
                    }
                },
            ],
            'gender' => ['required'],
            'password' => ['required', 'min:8', 'confirmed'],
            'picture' => ['nullable', 'url']
        ]);

        $validated['picture'] = $validated['picture'] ?? 'https://images.unsplash.com/photo-1533794299596-8e62c88ff975?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=3687&q=80';

        $validated['password'] = bcrypt($validated['password']);

        User::create($validated);

        return redirect('/login');
    }
}

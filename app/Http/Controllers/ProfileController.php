<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        return view('profile.index', [
            'title' => 'Profile',
            'user' => $user
        ]);
    }

    public function update(Request $request)
    {
        // Retrieve the user to update
        $id = $request->input('id');
        $user = User::findOrFail($id);

        // Validate the incoming data
        $validated = $request->validate([
            'first_name' => ['nullable', 'max:50'],
            'last_name' => ['nullable', 'max:50'],
            'email' => [
                'nullable',
                'email',
                Rule::unique('users', 'email')->ignore($id), // Ignore the current user's email when checking for uniqueness
                function ($attribute, $value, $fail) {
                    if (!empty($value) && !preg_match('/^.+@.+\..+$/i', $value)) {
                        $fail('The ' . $attribute . ' format is invalid.');
                    }
                },
            ],
            'gender' => ['nullable'],
            'password' => ['nullable', 'min:8', 'confirmed'], // Make the password field optional
            'picture' => ['nullable', 'image', 'max:2048'], // Allow only image files up to 2MB and make it optional
        ]);

        // Update the user's data only if provided
        if (!empty($validated['first_name'])) {
            $user->first_name = $validated['first_name'];
        }

        if (!empty($validated['last_name'])) {
            $user->last_name = $validated['last_name'];
        }

        if (!empty($validated['email'])) {
            $user->email = $validated['email'];
        }

        if (!empty($validated['gender'])) {
            $user->gender = $validated['gender'];
        }

        // Check if a new picture was uploaded and save it as a URL
        if ($request->hasFile('picture')) {
            $picturePath = $request->file('picture')->store('user_pictures'); // Store the uploaded file
            $user->picture = Storage::url($picturePath); // Get the URL of the stored file
        }

        // Update the password if provided
        if (!empty($validated['password'])) {
            $user->password = bcrypt($validated['password']);
        }

        $user->save(); // Save the updated user

        return redirect('/profile'); // Redirect to the profile page or another appropriate location
    }
}

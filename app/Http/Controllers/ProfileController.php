<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class ProfileController extends Controller
{
    public function show()
    {
        return view('auth.profile');
    }

    public function update(ProfileUpdateRequest $request)
    {
        // Task: fill in the code here to update name and email
        if ($request->password){
            auth()->user()->update(([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]));
        }
        else {
            auth()->user()->update(([
                'name' => $request->name,
                'email' => $request->email,
            ]));
        }
        // Also, update the password if it is set

        return redirect()->route('profile.show')->with('success', 'Profile updated.');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class account extends Controller
{
    //
    public function updateEmail(Request $request)
    {
        //check if the new email is the same with old email
        if($request->email == auth()->user()->email) {

            return back()->withErrors('You new email is the same with your current email');
        }

        //validate the request data
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);

        //update the current email with the new email
        auth()->user()->update([
            'email' => $request->email,
        ]);

        return redirect()->back();
    }

    public function updatePassword(Request $request)
    {
        //validate the request data
        $request->validate([
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        //update the current password with new password
        auth()->user()->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->back();
    }

    public function updateInfo(Request $request)
    {   

        //validate the request data
        $request->validate([
            'username'      => ['required','string'],
            'firstname'     => ['required','string'],
            'lastname'      => ['required','string'],
            'contactnumber' => ['required','string'],
        ]);

        //update the current email with the new email
        auth()->user()->update([
            'username'      => $request->username,
            'firstname'     => $request->firstname,
            'lastname'      => $request->lastname,
            'contactnumber' => $request->contactnumber,
        ]);

        return redirect()->back();
    }

}

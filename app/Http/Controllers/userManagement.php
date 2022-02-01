<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class userManagement extends Controller
{

    public function getUser ()
    {
        //get the list of users
        $users = User::all();
        return view('dashboard',compact('users'));

    }

    //accept the user

    // OLD WAY
    // public function acceptUser($user)
    // {
    //     $user = User::findOrFail($user);

    //     //validate user status into accept
    //     $user->update([
    //         'status' => 'Accepted'
    //     ]);

    //     //back to the dashboard
    //     return redirect()->back();
    // }

    //BETTER WAY
    public function acceptUser($id)
    {
        // Find the user on the database table User
        $user = User::findOrFail($id);

        //validate user status into accept
        $user->update([
            'status' => 'Accepted'
        ]);

        //back to the dashboard
        return redirect()->back();
    }

    public function rejectUser($id)
    {
        $user = User::findOrFail($id);

        //update the user status into reject
        $user->update([
            'status' => 'Rejected'
        ]);

        //back to the dashboard
        return redirect()->back();
    }
}

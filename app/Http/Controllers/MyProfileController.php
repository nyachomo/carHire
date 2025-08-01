<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class MyProfileController extends Controller
{
    public function profile()
    {
        $user = Auth::user();
        return view('my_profile.managemyprofile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|email|max:255|unique:users,email,' . $user->id,
        //     'password' => 'nullable|string|min:6|confirmed',
        // ]);

        
        $user->email = $request->email;
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

       if ($user) {
            Alert::success('Success', 'New Password has been updated successfully.');
        } else {
            Alert::error('Error', 'Failed to update password.');
        }
        return redirect()->back();
    }
}

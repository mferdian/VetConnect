<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
     // Show the profile page
     public function show()
     {
         return view('auth.profile');
     }

     // Update the profile
     public function update(Request $request)
     {
         $user = Auth::user();

         $request->validate([
             'name' => 'required|string|max:255',
             'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
             'password' => 'nullable|string|min:8|confirmed',
         ]);

         $user->name = $request->name;
         $user->email = $request->email;

         if ($request->password) {
             $user->password = Hash::make($request->password);
         }

        //  $user->save();

         return redirect()->route('profile')->with('success', 'Profile updated successfully!');
     }

     // Delete the account
     public function destroy()
     {
         $user = Auth::user();
        //  $user->delete();
         return redirect('/')->with('success', 'Your account has been deleted.');
     }
}

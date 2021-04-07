<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;
use Hash;

class UserSettingsController extends Controller
{
    public function index()
    {
        return view('user.settings', ["user" => Auth::user()]);
    }

    public function updateAvatar(Request $request)
    {
        if ($request->hasFile('avatar')) {
            $avatar  = $request->file('avatar');
            $fileName = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save(('storage/uploads/avatars/' . $fileName));
            $user = Auth::user();
            $user->avatar = $fileName;
            $user->update();
        }

        return $this->index();
    }

    public function userDetails()
    {
        return view('user.details', ["user" => Auth::user()]);
    }

    public function updateDetails(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'email' => 'required|email',
            'name' => 'required',
        ]);
        $user->email =  $request["email"];
        $user->name =  $request["name"];
        $user->update();

        return redirect()->route('user.settings');
    }

    public function changePassword()
    {
        return view('user.changePassword', ["user" => Auth::user()]);
    }

    public function updatePassword(Request $request)
    {
        //Check if the Current Password matches with what is in the database.
        if (!(Hash::check($request->get('current_password'), Auth::user()->password))) {
            return back()->with('error', 'Your current password does not match with what you provided');
        }
        // Compare the Current Password and New Password using[strcmp function]
        if (strcmp($request->get('current_password'), $request->get('new_password')) == 0) {
            return back()->with('error', 'Your current password cannot be same with the new password');
        }
        if (!strcmp($request->get('new_password'), $request->get('new_password_confirmation')) == 0) {
            return back()->with('error', 'New password must be the same with Confirm password');
        }
        //Validate the Password.
        $request->validate([
            'current_password' => 'required',
            'new_password'     => 'required|string|min:6|confirmed'
        ]);
        // Save the New Password.
        $user = Auth::user();
        $user->password = bcrypt($request->get('new_password'));
        $user->update();
        return back()->with('message', 'Password changed successfully');
    }
}

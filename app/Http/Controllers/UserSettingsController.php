<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;

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
            Image::make($avatar)->resize(300, 300)->save(public_path('/uploads/avatars/' . $fileName));
            $user = Auth::user();
            $user->avatar = $fileName;
            $user->save();
        }
        return $this->index();
    }
}

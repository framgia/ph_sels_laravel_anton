<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserFollowController extends Controller
{
    public function store(User $user)
    {
        Auth::user()->follow($user);

        return redirect()->route('home');
    }

    public function destroy(User $user)
    {
        Auth::user()->unfollow($user);

        return redirect()->route('home');
    }
}

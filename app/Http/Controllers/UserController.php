<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        return view('home', [
            "users" => User::limit(6)->inRandomOrder()->get()->except(Auth::id()),
            "authUser" => Auth::user(),
            "followUser" => Auth::user()->follows->pluck('id')->toArray()
        ]);
    }

    public function show(User $user)
    {
        return view('user.profile', [
            "user" => User::find($user->id),
            "followUser" => Auth::user()->follows->pluck('id')->toArray()
        ]);
    }
}

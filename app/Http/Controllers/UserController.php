<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Lesson;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        return view('home', [
            "users" => User::limit(6)->inRandomOrder()->get()->except(Auth::id()),
            "authUser" => Auth::user(),
            "followUser" => Auth::user()->follows->pluck('id')->toArray(),
            "categories"=> Category::all(),
            "user_mid"=> User::all()
        ]);
    }

    public function show(User $user)
    {
        return view('user.profile', [
            "user" => User::find($user->id),
            "followUser" => Auth::user()->follows->pluck('id')->toArray(),
            "lessons" => $user->lessons,
            "categories"=> Category::all(),
        ]);
    }
}

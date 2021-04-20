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
    public function home()
    {

        $lessons = Lesson::groupBy('category_id', 'user_id')
            ->selectRaw('sum(is_correct) as score,user_id,category_id')
            ->latest('lessons.created_at')->get();

        return view('home', [
            "users" => User::limit(6)->inRandomOrder()->get()->except(Auth::id())->whereNotIn('role_id', 2),
            "authUser" => Auth::user(),
            "followUser" => Auth::user()->follows->pluck('id')->toArray(),
            "categories" => Category::all(),
            "lessons" => $lessons
        ]);
    }

    public function show(User $user)
    {
        return view('user.profile', [
            "user" => User::find($user->id),
            "followUser" => Auth::user()->follows->pluck('id')->toArray(),
            "lessons" => $user->lessons,
            "categories" => Category::all(),
        ]);
    }

    public function index()
    {
        return view('user.index', [
            "users" => User::all()->except(Auth::id())->whereNotIn('role_id', 2),
            "followed_users" => Auth::user()->follows
        ]);
    }
}

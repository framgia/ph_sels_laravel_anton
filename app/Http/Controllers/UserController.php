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
            "users" => User::all()->except(Auth::id()),
            "authUser" => Auth::user(),
            "followUser" => Auth::user()->follows->pluck('id')->toArray()
        ]);
    }
}

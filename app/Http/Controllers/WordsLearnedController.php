<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WordsLearnedController extends Controller
{
    public function index(User $user)
    {
        return view('user.words',[
            "user" => $user,
            "lessons"=> $user->lessons,
            "followUser" => Auth::user()->follows->pluck('id')->toArray(),
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
       return view('home',["users"=> User::where('id','!=',Auth::user()->id)->get()]);
    }
}

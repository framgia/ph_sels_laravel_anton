<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LessonController extends Controller
{
    public function index(Category $category)
    {
        session(['word_count' => 0]);

        return view('lesson.index', [
            "category" => $category,
        ]);
    }

    public function store(Category $category)
    {
        request()->session()->increment('word_count');
        $answer = new Lesson();
        $answer->category_id = $category->id;
        $answer->user_id = Auth::user()->id;
        $answer->user_choice = request()->get('answer');
        $answer->user_word = request()->get('word');

        if (request()->get('answer') == $category->words->where('id', request()->get('word'))->first()->choices->first()->id) {
            $answer->is_correct = true;
        }
        $answer->save();

        if (count($category->words) > request()->session()->get('word_count')) {
            return view('lesson.index', [
                "category" => $category,
            ]);
        } else {
            request()->session()->pull('word_count');

            return $this->result($category);
        }
    }

    public function result(Category $category)
    {
        return view('lesson.result', [
            "category" => $category,
            "lessons" => Lesson::where('category_id', $category->id)->where('user_id', Auth::user()->id)->latest()->get(),
            "correct" => Lesson::where('category_id', $category->id)->where('user_id', Auth::user()->id)->where('is_correct', true)->count()
        ]);
    }
}

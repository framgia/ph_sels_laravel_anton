<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Choice;
use App\Models\Word;
use Illuminate\Http\Request;
use App\Models\WordChoice;

class WordsController extends Controller
{
    public function index(Category $category)
    {
        return view('words.index', [
            "words" => Word::all(),
            "category" => Category::findOrFail($category->id)
        ]);
    }

    public function create(Category $category)
    {
        return view('words.create', ["category" => Category::findOrFail($category->id)]);
    }

    public function store(Category $category, Request $request)
    {
        $word = new Word();
        $word->word = $request->input('word');
        $word->save();

        $correct_choice = new Choice();
        $correct_choice->choice = $request->input('correct_choice');
        $correct_choice->save();

        $wordCorrectChoice = new WordChoice();
        $wordCorrectChoice->word_id = $word->id;
        $wordCorrectChoice->choice_id = $correct_choice->id;
        $wordCorrectChoice->correct_choice_id = $correct_choice->id;
        $wordCorrectChoice->save();

        foreach ($request['choices'] as $value) {
            $wordChoices = new WordChoice();
            $choices = new Choice();
            $choices->choice = $value;
            $choices->save();
            $wordChoices->word_id = $word->id;
            $wordChoices->choice_id = $choices->id;
            $wordChoices->save();
        }

        return redirect()->route('words.index', [
            "words" => Word::all(),
            "category" => Category::findOrFail($category->id)
        ]);
    }

    public function destroy(Category $category, Word $word)
    {
        $word->delete();

        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Choices;
use App\Models\Words;
use Illuminate\Http\Request;
use App\Models\WordChoice;

class WordsController extends Controller
{
    public function index(Categories $category)
    {
        return view('words.index', [
            "words" => Words::all(),
            "category" => Categories::findOrFail($category->id)
        ]);
    }

    public function create(Categories $category)
    {
        return view('words.create', ["category" => Categories::findOrFail($category->id)]);
    }

    public function store(Categories $category, Request $request)
    {
        $word = new Words();
        $word->word = $request->input('word');
        $word->save();

        $correct_choice = new Choices();
        $correct_choice->choice = $request->input('correct_choice');
        $correct_choice->save();

        $wordCorrectChoice = new WordChoice();
        $wordCorrectChoice->word_id = $word->id;
        $wordCorrectChoice->choice_id = $correct_choice->id;
        $wordCorrectChoice->correct_choice_id = $correct_choice->id;
        $wordCorrectChoice->save();

        foreach ($request['choices'] as $value) {
            $wordChoices = new WordChoice();
            $choices = new Choices();
            $choices->choice = $value;
            $choices->save();
            $wordChoices->word_id = $word->id;
            $wordChoices->choice_id = $choices->id;
            $wordChoices->save();
        }

        return redirect()->route('words.index', [
            "words" => Words::all(),
            "category" => Categories::findOrFail($category->id)
        ]);
    }

    public function destroy(Categories $category, Words $word)
    {
        $word->delete();

        return redirect()->back();
    }
}

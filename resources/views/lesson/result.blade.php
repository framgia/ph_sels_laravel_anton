@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="display-4">{{ __('Lesson Result') }}</h1>
        <div class="row">
            <div class="col py-3">
                <div class="row">
                    <div class="col">
                        <h2>{{ $category->title }}</h2>
                    </div>
                    <div class="col">
                        <h2>Result: {{ $correct }} of {{ count($lessons) }} </h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Marks</th>
                            <th scope="col">Word</th>
                            <th scope="col">Answer</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($lessons as $lesson)
                            <tr>
                                <td>
                                    {{ $lesson->is_correct? "⭕":"✖" }}
                                </td>
                                <td>
                                    {{ $category->words->where('id', $lesson->user_word)->first()->word }}
                                </td>
                                <td>
                                    {{ $category->words->where('id', $lesson->user_word)->first()->choices->where('id',$lesson->user_choice)->first()->choice }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">
                                    <h2>{{ __('Word List is empty') }}</h2>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

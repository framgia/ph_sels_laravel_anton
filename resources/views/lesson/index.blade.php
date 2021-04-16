@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="display-4">{{ __('Lesson') }}</h1>
        <div class="row">
            <div class="col py-3">
                <div class="row">
                    <div class="col">
                        <h2>{{ $category->title }}</h2>
                    </div>
                    <div class="col">
                        <p>{{ request()->session()->get('word_count')+1 ?? 0 }} of {{ count($category->words) }}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @if (count($category->words) > request()->session()->get('word_count') )
                    <div class="col-md-6">
                        <h2>{{ $category->words[request()->session()->get('word_count') ?? 0]->word }}</h2>
                    </div>
                    <div class="col-md-6">
                        <form action="{{ route('lesson.store',$category)}}" method="post">
                            @csrf
                                <input type="text" name="word" id="word"
                                    value="{{ $category->words[request()->session()->get('word_count') ?? 0]->id }}" hidden>
                            @foreach ($category->words[request()->session()->get('word_count') ?? 0]->choices->shuffle() as
                            $choices)
                                <button class="btn btn-block btn-outline-primary" type="submit" value="{{ $choices->id }}"
                                    name="answer">{{$choices->choice }}</button>
                            @endforeach
                        </form>
                    </div>
                @else
                    <script>
                        window.location ='{{route('lesson.result',$category)}}';
                    </script>
                @endif
            </div>
        </div>
    </div>
@endsection

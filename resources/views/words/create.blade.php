@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="display-4">{{ __('Add Word') }}</h1>
        <a class="btn btn-primary" href="{{ route('words.index',$category) }}">Back</a>
        <form class="py-5" action="{{route('words.store',$category)}}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <input
                            type="text"
                            class="form-control"
                            id="word"
                            name="word"
                            placeholder="Basic 100">
                        <label for="word">Word</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <input
                            type="text"
                            class="form-control"
                            id="correct_choice"
                            name="correct_choice"
                            placeholder="Basic 100">
                        <label for="correct_choice">Choice 1 <small class="text-danger">(Must be the correct answer)</small></label>
                    </div>
                    <div class="form-floating mb-3">
                        <input
                            type="text"
                            class="form-control"
                            id="choices[]"
                            name="choices[]"
                            placeholder="Basic 100">
                        <label for="choices[]">Choice 2</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input
                            type="text"
                            class="form-control"
                            id="choices[]"
                            name="choices[]"
                            placeholder="Basic 100">
                        <label for="choices[]">Choice 3</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input
                            type="text"
                            class="form-control"
                            id="choices[]"
                            name="choices[]"
                            placeholder="Basic 100">
                        <label for="choices[]">Choice 4</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="display-4">{{ __('Add Category') }}</h1>
    <a class="btn btn-primary" href="{{ route('category.index') }}">Back</a>
    <form class="py-5" action="{{route('category.store')}}" method="post">
        @csrf
        <div class="form-floating mb-3">
            <input
                type="text"
                class="form-control"
                id="title"
                name="title"
                placeholder="Basic 100">
            <label for="title">Title</label>
        </div>
        <div class="form-floating">
            <textarea
                class="form-control"
                placeholder="Leave a comment here"
                name="description"
                id="description"
            ></textarea>
            <label for="description">Description</label>
        </div>
        <div class="mt-4">
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
    </form>
</div>
@endsection

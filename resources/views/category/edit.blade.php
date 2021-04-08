@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="display-4">{{ __('Edit Category') }}</h1>
    <a class="btn btn-primary" href="{{ route('category.index') }}">Back</a>
    <form class="py-5" action="{{route('category.update',$category)}}" method="post">
        @csrf
        @method('PUT')
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="title" placeholder="Title" name="title"
                    value="{{ $category->title }}">
                <label for="title">Title</label>
            </div>
        @error('title')
            <div class="form-floating mb-3 text-danger">
                {{ $message }}
            </div>
        @enderror
            <div class="form-floating">
                <textarea class="form-control" placeholder=" " name="description" >{{ $category->description }}
                </textarea>
                <label for="description">Description</label>
            </div>
        @error('description')
            <div class="form-floating mb-3 text-danger">
                {{ $message }}
            </div>
        @enderror
        <div class="mt-4">
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
    </form>
</div>
@endsection

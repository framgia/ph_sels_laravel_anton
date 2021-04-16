@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="display-4">{{ __('Categories') }}</h1>
        @if (Auth::user()->role_id == 2)
            <a class="btn btn-primary" href="{{ route('category.create') }}">{{ __('Add Category') }}</a>
            <div class="row">
                <div class="col py-3">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($categories as $category)
                                <tr>
                                    <td>{{ $category->title }}</td>
                                    <td>{{ $category->description }}</td>
                                    <td>
                                        <a class="btn btn-outline-primary" href="{{ route('words.index',$category) }}">Add word</a>
                                        <a class="btn btn-outline-primary" href="{{ route('category.show',$category) }}">Edit</a>
                                        <a
                                            class="btn btn-outline-danger"
                                            type="button"
                                            data-bs-toggle="modal"
                                            data-bs-target="#deleteCategoryModal">
                                            Delete
                                        </a>
                                        <div
                                            class="modal fade"
                                            id="deleteCategoryModal"
                                            tabindex="-1"
                                            aria-labelledby="deleteCategoryModalLabel"
                                            aria-hidden="true"
                                        >
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5
                                                            class="modal-title"
                                                            id="deleteCategoryModalLabel"
                                                        >
                                                        Delete Category
                                                        </h5>
                                                        <button
                                                            type="button"
                                                            class="btn-close"
                                                            data-bs-dismiss="modal"
                                                            aria-label="Close"
                                                        >
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Do you want to delete <strong>{{ $category->title }}</strong> ?</p>
                                                        <form
                                                            action="{{ route('category.destroy',$category) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button
                                                                type="button"
                                                                class="btn btn-secondary"
                                                                data-bs-dismiss="modal"
                                                            >
                                                            Cancel
                                                            </button>
                                                            <button
                                                                type="submit"
                                                                class="btn btn-danger"
                                                            >
                                                            Delete
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center">
                                        <h2>{{ __('Category is empty') }}</h2>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        @else
            <div class="row">
                <div class="col py-3">
                    <div class="row">
                        @forelse ($categories as $category)
                            <div class="col-md-6">
                                <div class="card bg-light mb-3" >
                                    <div class="card-header"></div>
                                    <div class="card-body">
                                    <h5 class="card-title">{{ $category->title }}</h5>
                                    <p class="card-text">{{ $category->description }}</p>
                                    <a href="{{ route('lesson.index',$category) }}" class="btn btn-primary  {{ $category->isTakenByUser()?'disabled':''}}">{{ $category->isTakenByUser()?__('Lesson Taken'):__('Take Lesson')}}</a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <h1>empty</h1>
                        @endforelse
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection

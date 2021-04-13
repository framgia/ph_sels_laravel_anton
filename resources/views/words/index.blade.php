@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="display-4">{{ __('Words') }}</h1>
        <a class="btn btn-primary" href="{{ route('words.create',$category) }}">{{ __('Add Word') }}</a>
        <div class="row">
            <div class="col py-3">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Word</th>
                            <th scope="col">Correct Choice</th>
                            <th scope="col">Choices</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($words as $word)
                            <tr>
                                <td>{{ $word->word }}</td>
                                <td>{{ $word->wordChoices->pluck('choice')->first() }}</td>
                                <td>
                                    {{$word->wordChoices->pluck('choice')->implode(', ')}}
                                </td>
                                <td>
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
                                                    <p>Do you want to delete <strong>{{ $word->word }}</strong> ?</p>
                                                    <form
                                                        action="{{ route('words.destroy',[$category,$word]) }}"
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

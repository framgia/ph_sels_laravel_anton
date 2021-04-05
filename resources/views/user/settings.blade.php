@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-2 ">
            <img src="{{asset("uploads/avatars").'/'.Auth::user()->avatar}}" class="card-img-top" alt="...">
            <button type="button" class="btn btn-primary btn-block my-4" data-bs-toggle="modal"
                data-bs-target="#exampleModal">
                Update Avatar
            </button>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update Avatar</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            {{-- <form enctype="multipart/form-data" action="/users/settings" method="post"> --}}
                            <form enctype="multipart/form-data" action="{{ route('user.updateAvatar')}}" method="post">
                                @csrf
                                @method('PUT')
                                <input type="file" name="avatar" id="avatar">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input class="btn btn-primary" type="submit" value="Update Avatar">
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ $user->name }}</div>
                <div class="card-body">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">{{ $user->email }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

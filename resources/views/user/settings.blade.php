@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-2 ">
            <img
                src="{{ ('/storage/uploads/avatars/'.Auth::user()->avatar) }}"
                class="card-img-top"
                alt="{{Auth::user()->avatar}}"
            >
            <button type="button" class="btn btn-primary btn-block my-4" data-bs-toggle="modal"
                data-bs-target="#avatarModal">
                Update Avatar
            </button>
            <div class="modal fade" id="avatarModal" tabindex="-1" aria-labelledby="avatarModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="avatarModalLabel">Update Avatar</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form enctype="multipart/form-data" action="{{ route('user.updateAvatar')}}" method="post">
                                @csrf
                                @method('PUT')
                                <input type="file" name="avatar" id="avatar">
                                <div class="modal-footer">
                                    <input class="btn btn-primary" type="submit" value="Update Avatar">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('User Settings')}}</div>
                <div class="card-body">
                    <div class="card-body">
                        <h5 class="card-title">{{ $user->name }}</h5>
                        <p class="card-text">{{ $user->email }}</p>
                        <a href="{{ route('user.details') }}">Update Details</a>
                        <a href="{{ route('user.changePassword') }}">Update Password</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

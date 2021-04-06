@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('User Settings')}}</div>
                <div class="card-body">
                    <div class="card-body">
                        @if (session()->get('error'))
                        <p class="text-danger">
                           {{ session()->get('error')}}
                        </p>
                        @endif
                        @if (session()->get('message'))
                        <p class="text-success">
                            {{ session()->get('message')}}
                        </p>
                        @endif
                        <form action="{{route('user.updatePassword')}}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" name="current_password"
                                    id="current_password">
                                <label for="current_password">Current Password</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" name="new_password" id="new_password">
                                <label for=" new_password">New Password</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" name="new_password_confirmation"
                                    id="new_password_confirmation">
                                <label for="new_password_confirmation">Confirm Password</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="submit" name="updatePassword" class="btn btn-primary"
                                    value="Update Password">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

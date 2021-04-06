@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('User Settings')}}</div>
                <div class="card-body">
                    <div class="card-body">

                        <form action="{{route('user.updateDetails')}}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="name@example.com" value="{{ $user->email ?? old('email')}}">
                                <label for="email">Email address</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="name" id="name" placeholder="John doe"
                                    value="{{ $user->name  ?? old('name')}}">
                                <label for="name">Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="submit" name="updateDetails" class="btn btn-primary"
                                    value="Update Details">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

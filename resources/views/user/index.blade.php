@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Follow someone')}}</div>
                    <div class="card-body">
                        @foreach ($users as $key => $user)
                            @if (!in_array($user->id,$followed_users->pluck('id')->toArray()))
                                <div class="card mb-3">
                                    <div class="row g-0">
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <p class="card-text">
                                                    <a href="{{ route('user.show',$user)}}">{{$user->name }}</a>
                                                </p>
                                            </div>
                                            <form
                                                action="{{route(!in_array($user->id,$followed_users->pluck('id')->toArray())?"user.follow":"user.unfollow",$user)}}"
                                                method="post">
                                                @csrf
                                                <input class="btn" type="submit"
                                                    value="{{!in_array($user->id,$followed_users->pluck('id')->toArray())?"Follow":"unfollow"}}">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

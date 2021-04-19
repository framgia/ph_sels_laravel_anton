@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{ ('/storage/uploads/avatars/'.$authUser->avatar) }}" class="card-img-top"
                                alt="{{$authUser->avatar}}">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{$authUser->name }}</h5>
                                <p class="card-text"> <a href="{{ route('user.words.index',$authUser)}}">Learned Words</a></p>
                                <p class="card-text"> <a href="http://">Learned Lessons</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                @foreach ($user_mid as $user)
                    @if ($user->lessons->count())
                        @foreach ($user->lessons->groupBy('category_id') as $key => $lesson)
                        <div class="card my-2">
                            <div class="card-body">
                                <div class="card">
                                    <div class="card-body">
                                        <p class="card-text">
                                            <a href="{{ route('user.show',$user) }}">{{ $user->name}}</a>
                                            learned {{ array_sum($lesson->pluck('is_correct')->toArray())  }} out of
                                            {{ count($categories->find($lesson->pluck('category_id')->first())->words) }} in
                                            <a
                                                href="{{ route('category.index') }}">{{ $categories->find($lesson->pluck('category_id')->first())->title }}</a>
                                        </p>
                                        <p class="card-text"><small class="text-muted">Last updated {{$lesson->pluck('created_at')->first()->diffForHumans()}}</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @endif
                @endforeach
            </div>
            <div class="col-md-3">
                @forelse ($users as $user)
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="{{ ('/storage/uploads/avatars/'.$user->avatar) }}" class="card-img-top  "
                                    alt="{{$user->avatar}}">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <p class="card-text">
                                        <a href="{{ route('user.show',$user)}}">{{$user->name }}</a>
                                    </p>
                                </div>
                                <form action="{{route(!in_array($user->id,$followUser)?"user.follow":"user.unfollow",$user)}}"
                                    method="post">
                                    @csrf
                                    <input class="btn" type="submit"
                                        value="{{!in_array($user->id,$followUser)?"Follow":"unfollow"}}">
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="card">
                        <div class="card-body">
                            <a href="">Find Friends . . .</a>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection

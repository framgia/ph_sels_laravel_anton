@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ ('/storage/uploads/avatars/'.Auth::user()->avatar) }}" class="card-img-top"
                            alt="{{Auth::user()->avatar}}">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{Auth::user()->name }}</h5>
                            <p class="card-text"> <a href="http://">Learned Words</a></p>
                            <p class="card-text"> <a href="http://">Learned Lessons</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <p></p>
            {{-- content here --}}
            @php
                $data =Auth::user()->follows->pluck('id')->toArray();
            //  var_dump($data);
            //  echo gettype($data[0]);
            //  echo $data[0] = 2;
                // echo in_array(2,$data);

            @endphp
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                        additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                        additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                        additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            @php
                $data = Auth::user()->follows->pluck('id')->toArray()
            @endphp
            @forelse ($users as $user)
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ ('/storage/uploads/avatars/'.$user->avatar) }}" class="card-img-top  "
                            alt="{{$user->avatar}}">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <p class="card-text">{{$user->name }}</p>
                        </div>
                        <form action="{{route(!in_array($user->id,$data)?"user.follow":"user.unfollow",$user)}}" method="post">
                            @csrf
                            <input class="btn" type="submit" value="{{!in_array($user->id,$data)?"Follow":"unfollow"}}">
                        </form>
                    </div>
                </div>
            </div>
            @empty
            <div class="card">
                <div class="card-body">
                    <a href="http://">Find Friends . . .</a>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</div>
@endsection

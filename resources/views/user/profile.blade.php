@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-2 ">
            <img src="{{ url('/storage/uploads/avatars/'.$user->avatar) }}" class="card-img-top"
                alt="{{$user->avatar}}">
            <hr>
            <div class="row text-center">
                <div class="col">
                    <p> {{ $user->followers()}}
                    </p>
                    Followers
                </div>
                <div class="col">
                    <p>{{ $user->following() }}</p>
                    Following
                </div>
            </div>
            <div class="modal fade" id="avatarModal" tabindex="-1" aria-labelledby="avatarModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="avatarModalLabel">{{$user}}</h5>
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
                <div class="card-header">{{$user->name}} Activities</div>
                <div class="card-body">
                    <div class="card-body">
                        <div class="card">
                            {{-- activiities --}}
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural
                                    lead-in to
                                    additional content. This content is a little bit longer.</p>
                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

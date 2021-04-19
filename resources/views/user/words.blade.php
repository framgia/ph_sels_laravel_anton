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
                    <p>{{ $user->followers()}}</p>
                    Followers
                </div>
                <div class="col">
                    <p>{{ $user->following() }}</p>
                    Following
                </div>
                @if ($user->id != Auth::id())
                <form action="{{route(!in_array($user->id,$followUser)?"user.follow":"user.unfollow",$user)}}"
                    method="post">
                    @csrf
                    <input class="btn" type="submit" value="{{!in_array($user->id,$followUser)?"Follow":"unfollow"}}">
                </form>
                @endif
                <a class="btn btn-primary btn-block mt-2" href="{{ route('user.words.index',$user)}}">Learned Words</a>
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
                <div class="card-header">{{$user->name}} Learned Words</div>
                <div class="card-body">
                    <table class="table">
                        <th>Words</th>
                        <th>Answers</th>
                        @foreach ($lessons as $lesson)
                            @foreach ($lesson->category->words as $word)
                            <tr>
                                @if ($lesson->user_word == $word->id && $lesson->is_correct)
                                <td>{{ $word->word }}</td>
                                <td>{{ $word->choices->first()->choice }}</td>
                                @endif
                            </tr>
                            @endforeach
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
@foreach ($status as $tweet)
<div class="card mw-100 mb-3">
    <div class="card-body">
        <div class="container">
            <div class="row">
                <div class="col-md-1 p-0">
                    <a href="/profile/{{$tweet->user->id}}">
                        <img src="/storage/{{$tweet->user->profile->profileImage()}}" width="100%"
                            class="rounded-circle">
                    </a>
                </div>
                <div class="col-md-11">
                    <div class="d-flex align-items-baseline mb-2">
                        <p class="card-title pr-2 m-0 h6"><strong>{{$tweet->user->name}}</strong></p>
                        <p class="card-subtitle text-muted pr-2 m-0">&#64;{{$tweet->user->username}}</p>
                        <p class="card-subtitle text-muted m-0">&#124;
                            {{date('H:i', strtotime($tweet->created_at))}}
                            ·
                            {{date('d M Y', strtotime($tweet->created_at))}}
                        </p>
                    </div>
                    <a href="/status/{{$tweet->id}}" class="stretched-link text-decoration-none" style="color:black;">
                        <p class="card-text mb-2">{{$tweet->status}}</p>
                    </a>

                    @if ($tweet->image != null)
                    <img src="/storage/{{$tweet->image}}" class="w-50" style="max-height:50vh;">
                    @endif
                    <div class="d-flex align-items-baseline mt-3">
                        <a href="#" class="card-link stretched-link" style="position: relative;"><strong>0</strong>
                            Likes</a>
                        <a href="#" class="card-link stretched-link" style="position: relative;"><strong>0</strong>
                            Retweet</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
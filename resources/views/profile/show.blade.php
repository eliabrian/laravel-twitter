@extends('layouts.app')

@section('content')

<div class="row d-flex align-items-center">
    <div class="col-md-3 p-3">
        <img src="/storage/{{$user->profile->image}}" class="rounded-circle w-100">
    </div>

    <div class="col-md-9">
        <div class="d-flex align-items-center">
            <div>
                <h4 class="m-0">{{$user->name}}</h4>
            </div>
            @auth
            @can('update', $user->profile)
            <div class="pl-2"><a href="/profile/{{$user->id}}/edit" class="btn btn-outline-dark">Edit Profile</a></div>
            @endcan
            @endauth
        </div>
        <div class="text-muted">
            &#64;{{$user->username}}
        </div>
        <div class="pt-2">
            {{$user->profile->bio}}
        </div>
        <div class="d-flex">
            <div class="pr-3 text-muted">{{$user->profile->location}}</div>
            <div><a href="{{$user->profile->url}}">{{$user->profile->url}}</a></div>
        </div>
        <div class="d-flex pb-2">
            <div class="pr-3"><strong>{{$user->statuses->count()}}</strong> Tweets</div>
            <div class="pr-3"><strong>123</strong> Followers</div>
            <div class="pr-3"><strong>154</strong> Following</div>
        </div>
        @auth
        @can('update', $user->profile)
        <div>
            <a href="/status/create" class="btn btn-dark">Make a Tweet</a>
        </div>
        @endcan
        @endauth
    </div>
</div>
<hr>
@foreach ($user->statuses as $status)

<div class="card mw-100 mb-3">
    <div class="card-body">
        <div class="container">
            <div class="row">
                <div class="col-md-1 p-0">
                    <a href="/profile/{{$user->id}}">
                        <img src="/storage/{{$user->profile->image}}" width="100%" class="rounded-circle">
                    </a>
                </div>
                <div class="col-md-11">
                    <div class="d-flex align-items-baseline mb-2">
                        <p class="card-title pr-2 m-0 h6"><strong>{{$user->name}}</strong></p>
                        <p class="card-subtitle text-muted pr-2 m-0">&#64;{{$user->username}}</p>
                        <p class="card-subtitle text-muted m-0">&#124;
                            {{date('H:i', strtotime($status->created_at))}}
                            ·
                            {{date('d M Y', strtotime($status->created_at))}}
                        </p>
                    </div>
                    <a href="/status/{{$status->id}}" class="stretched-link text-decoration-none" style="color:black;">
                        <p class="card-text mb-2">{{$status->status}}</p>
                    </a>

                    @if ($status->image != null)
                    <img src="/storage/{{$status->image}}" class="w-50" style="max-height:50vh;">
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
@extends('layouts.app')

@section('content')

<div class="row d-flex align-items-center">
    <div class="col-md-3 p-3">
        <img src="https://instagram.fjkt1-1.fna.fbcdn.net/vp/01227b56211cac5c3fbeab7756a2fc28/5E2E9805/t51.2885-19/s320x320/72330643_436690263647223_8427017527455907840_n.jpg?_nc_ht=instagram.fjkt1-1.fna.fbcdn.net&_nc_cat=103"
            class="rounded-circle w-100">
    </div>

    <div class="col-md-9">
        <div class="d-flex align-items-center">
            <div>
                <h4 class="m-0">{{$user->name}}</h4>
            </div>
            @auth
            <div class="pl-2"><a href="#" class="btn btn-outline-dark">Edit Profile</a></div>
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
        <div>
            <a href="/status/create" class="btn btn-dark">Make a Tweet</a>
        </div>
    </div>
</div>
<hr>
@foreach ($user->statuses as $status)
<a href="#" class="card-hover text-decoration-none" style="color:black">
    <div class="card w-100 mb-3">
        <div class="card-body">
            <div class="d-flex align-items-baseline mb-2">
                <p class="card-title pr-2 m-0 h6"><strong>{{$user->name}}</strong></p>
                <p class="card-subtitle text-muted pr-2 m-0">&#64;{{$user->username}}</p>
                <p class="card-subtitle text-muted m-0"> &#124; {{$status->created_at}}
                </p>
            </div>
            <p class="card-text mb-2">{{$status->status}}</p>
            @if ($status->image != null)
            <img src="/storage/{{$status->image}}" class="w-100" alt="">
            @endif
            <div class="d-flex align-items-baseline mt-3">
                <a href="#" class="card-link text-muted"><strong>0</strong> Likes</a>
                <a href="#" class="card-link text-muted"><strong>0</strong> Retweet</a>
            </div>
        </div>
    </div>
</a>
@endforeach
@endsection
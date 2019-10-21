@extends('layouts.app')

@section('content')
<h1>Tweet</h1>
<hr>
<div class="card">
    <a href="/profile/{{$status->user->id}}" style="color:#000;">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <div style="max-width: 49px">
                    <img src="/storage/{{$status->user->profile->image}}" width="100%" class="rounded-circle">
                </div>
                <div class="ml-3">

                    <p class="m-0">{{$status->user->name}}</p>


                    <p class="m-0">&#64;{{$status->user->username}}</p>
                </div>
            </div>
        </div>
    </a>
    <div class="card-body">
        <h3 class="m-0 pb-3">{{$status->status}}</h3>
        @if ($status->image != null)
        <img src="/storage/{{$status->image}}" class="w-100">
        @endif
        <div class="d-flex text-muted pt-2">
            {{date('H:i', strtotime($status->created_at))}}
            ·
            {{date('d M Y', strtotime($status->created_at))}}
        </div>

        <hr>
        <div class="d-flex">
            <a href="#" class="card-link stretched-link" style="position: relative;"><strong>0</strong>
                Likes
            </a>
            <a href="#" class="card-link stretched-link" style="position: relative;"><strong>0</strong>
                Retweet
            </a>
        </div>
    </div>
</div>
@endsection
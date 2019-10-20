@extends('layouts.app')

@section('content')
<h1>Edit Your Profile</h1>
<hr>
<form action="/profile/{{$user->id}}" enctype="multipart/form-data" method="POST" class="py-3">
    @csrf
    @method('PATCH')

    <div class="form-group">
        <label for="bio">Bio</label>
        <input class="form-control @error('bio') is-invalid @enderror" id="bio" name="bio"
            value="{{ old('bio') ?? $user->profile->bio }}">
        @error('bio')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="location">Location</label>
        <input class="form-control @error('location') is-invalid @enderror" id="location" name="location"
            value="{{ old('location') ?? $user->profile->location }}">
        @error('location')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="url">Link</label>
        <input class="form-control @error('url') is-invalid @enderror" id="url" name="url"
            value="{{ old('url') ?? $user->profile->url }}">
        @error('url')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="image">Profile Picture</label>
        <input type="file" class="form-control-file" id="image" name="image">
        @error('image')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <button type="submit" class="btn btn-dark">Save Profile</button>
    <a class="btn btn-outline-dark" href="{{url()->previous()}}" role="button">Cancel</a>
</form>
@endsection
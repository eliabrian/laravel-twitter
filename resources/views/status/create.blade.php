@extends('layouts.app')

@section('content')
<h1>Make a Tweet</h1>
<hr>
<form action="/status" enctype="multipart/form-data" method="POST" class="py-3">
    @csrf

    <div class="form-group">
        <label for="status">Tweet Here</label>
        <textarea class="form-control @error('status') is-invalid @enderror" id="status" rows="3" name="status"
            value="{{ old('status') }}" placeholder="What's happening?" required autofocus
            style="resize: none"></textarea>
        @error('status')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="image">Post Your Image</label>
        <input type="file" class="form-control-file" id="image" name="image">
        @error('image')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <button type="submit" class="btn btn-dark">Tweet</button>
    <a class="btn btn-outline-dark" href="{{url()->previous()}}" role="button">Cancel</a>
</form>
@endsection
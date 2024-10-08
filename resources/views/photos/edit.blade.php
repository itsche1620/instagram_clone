@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Photo</h1>
    <form action="{{ route('photos.update', $photo) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="photo">Select New Photo</label>
            <input type="file" name="photo" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection

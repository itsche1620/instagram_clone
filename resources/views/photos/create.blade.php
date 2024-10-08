@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">{{ __('Upload Photo') }}</div>

    <div class="card-body">
        <form action="{{ route('photos.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="photo">Select Photo</label>
                <input type="file" class="form-control" id="photo" name="photo" required>
            </div>
            <button type="submit" class="btn btn-primary">Upload</button>
        </form>
    </div>
</div>
@endsection

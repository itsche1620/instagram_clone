@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h5 class="mt-4 text-center">Photo Upload</h5>
            <div class="row">
                @forelse ($photos as $photo)
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm">
                            <img src="{{ asset('storage/' . $photo->path) }}" class="card-img-top" alt="Photo" style="height: 300px; object-fit: cover;">
                            <div class="card-body text-center">
                                <p class="card-text text-muted">Uploaded by: {{ $photo->user->name }} on {{ $photo->created_at->format('d M Y') }}</p>

                                <form action="{{ route('photos.like', $photo->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-link p-0">
                                        <i class="fas {{ $photo->likedByUser()->where('user_id', Auth::id())->exists() ? 'fa-heart' : 'fa-heart-broken' }}" style="color: {{ $photo->likedByUser()->where('user_id', Auth::id())->exists() ? 'red' : 'black' }};"></i>
                                        <span>{{ $photo->likes->count() }} Likes</span>
                                    </button>
                                </form>

                                @if (Auth::id() == $photo->user_id)
                                    <form action="{{ route('photos.destroy', $photo->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-link p-0">
                                            <i class="fas fa-trash" style="color: black;"></i>
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p>No photos uploaded yet.</p>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center">
                {{ $photos->links() }}
            </div>
        </div>
    </div>
</div>
<style>
    .card {
        border: none;
        border-radius: 10px;
    }

    .card-img-top {
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    .btn-link {
        text-decoration: none;
    }
</style>
@endsection

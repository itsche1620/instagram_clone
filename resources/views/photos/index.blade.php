@forelse ($photos as $photo)
    <div class="col-md-4 mb-4">
        <div class="card">
            <img src="{{ asset('storage/' . $photo->path) }}" class="card-img-top" alt="Photo" style="height: 300px; object-fit: cover;">
            <div class="card-body text-center">
                <p class="card-text text-muted">Uploaded on: {{ $photo->created_at->format('d M Y') }}</p>
                <form action="{{ route('photos.like', $photo->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary">
                        {{ $photo->likedByUser()->where('user_id', Auth::id())->exists() ? 'Unlike' : 'Like' }}
                    </button>
                </form>
                <p>{{ $photo->likes->count() }} Likes</p>
                <form action="{{ route('photos.destroy', $photo->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </div>
        </div>
    </div>
@empty
    <div class="col-12 text-center">
        <p>No photos uploaded yet.</p>
    </div>
@endforelse

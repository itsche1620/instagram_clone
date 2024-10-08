<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    public function index()
    {
        $photos = Photo::with('user')->latest()->get();
        return view('photos.index', compact('photos'));
    }

    public function create()
    {
        return view('photos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $path = $request->file('photo')->store('photos', 'public');

        Photo::create(['path' => $path, 'user_id' => Auth::id()]);

        return redirect()->route('home')->with('success', 'Photo uploaded successfully.');
    }

    public function destroy($id)
    {
        $photo = Photo::findOrFail($id);
        Storage::disk('public')->delete($photo->path);
        $photo->delete();

        return redirect()->back()->with('status', 'Photo deleted successfully.');
    }

    public function like($id)
    {
        $photo = Photo::findOrFail($id);
        if ($photo->likedByUser()->exists()) {
            $photo->likedByUser()->delete();
        } else {
            $photo->likes()->create([
                'user_id' => auth()->id(),
            ]);
        }

        return back();
    }
}

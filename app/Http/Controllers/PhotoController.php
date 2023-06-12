<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PhotoController extends Controller
{
    public function index()
    {
        $photos = Photo::all();

        return view('photos.index', compact('photos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'required|image', // Adjust the validation rules as per your requirements
            'caption' => 'nullable|string|max:255',
        ]);

        $image = $request->file('photo');
        $filename = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('photos'), $filename);

        Photo::create([
            'filename' => $filename,
            'caption' => $request->caption,
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->route('uploader')->with('success', 'Photo uploaded successfully.');
    }
}

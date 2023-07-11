<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;
class PhotoController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if ($user->hasRole('admin')){
            $photos = Photo::all();
        } else {
            $photos = Photo::all()
                ->where('user_id', '=', Auth::id());
        }
        return view('upload-index', compact('photos'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'files.*' => 'required|image',
            'caption' => 'nullable|string|max:255',
        ]);

        $images = $request->file('files');

        foreach ($images as $image) {
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('photos'),$filename);
            $photo = new Photo();
            $photo->filename = $filename;
            $photo->user_id = Auth::id();
            $photo->path = "photos/" . $filename;
            $photo->save();
        }
        return redirect()->route('uploader')
            ->with('success', 'Photo(s) uploaded successfully.');
    }

    public function delete($id)
    {
        Storage::delete("photos/" . Photo::find($id)->filename);
        Photo::destroy($id);
        return redirect()->route('index')
            ->with('success', 'Photo successfully deleted');
    }

    public function showCarousel()
    {
        $photos = Photo::all();
        return view('carousel', compact('photos'));
    }

    public function downloadZip()
    {

    }
}

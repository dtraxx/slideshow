<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VideoController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if ($user->hasRole('admin')){
            $videos = Video::all();
        } else {
            $videos = video::all()
                ->where('user_id', '=', Auth::id());
        }
        return view('videos.video-index', compact('videos'));

    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        $request->validate([
            'files.*' => 'required|video',
        ]);

        $videos = $request->file('files');

        foreach ($videos as $video) {
            $filename = time() . '_' . $video->getClientOriginalName();
            $video->move(public_path('videos'),$filename);
            $video = new video();
            $video->filename = $filename;
            $video->user_id = Auth::id();
            $video->path = "videos/" . $filename;
            $video->save();
        }
        return redirect()->route('uploader')
            ->with('success', 'videos uploaded successfully.');
    }

    public function show(Video $video)
    {
    }

    public function edit(Video $video)
    {
    }

    public function update(Request $request, Video $video)
    {
    }

    public function destroy(Video $video)
    {
    }
}

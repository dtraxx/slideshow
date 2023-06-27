<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Exceptions\PostTooLargeException;
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

        try {
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
                ->with('success', 'videos uploaded successfully.');        } catch (PostTooLargeException $e) {
            return back()->with('error', 'The video size exceeds the maximum allowed limit.');
        }

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

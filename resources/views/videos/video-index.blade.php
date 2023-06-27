@extends('layouts.dash')
@section('content')
    @if($videos->isNotEmpty())
        <div class="">
            @foreach($videos as $video)
                <div class="flex justify-center items-center">
                    <video
                        id="{{$video->id}}"
                        class="video-js"
                        controls
                        preload="auto"
                        width="640"
                        height="264"
                        data-setup="{}"
                    >
                        <source src="{{asset($video->path)}}" type="video/mp4" />
                        <p class="vjs-no-js">
                            To view this video please enable JavaScript, and consider upgrading to a
                            web browser that
                            <a href="https://videojs.com/html5-video-support/" target="_blank"
                            >supports HTML5 video</a
                            >
                        </p>
                    </video>
                </div>
            @endforeach
        </div>
    @else
        <p class="p-16">No video's yet!</p>
    @endif
@endsection

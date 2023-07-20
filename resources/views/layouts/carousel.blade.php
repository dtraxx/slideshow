<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" href="{{asset('img/under_new_management.png')}}" type="image/x-icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://vjs.zencdn.net/8.3.0/video-js.css" rel="stylesheet" />
    <!-- Styles -->
    @livewireStyles
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@glidejs/glide/dist/css/glide.core.min.css">
    <style>
        /* Set the carousel container to full screen */
        .carousel-container {
            height: 100vh;
        }
        /* Set the carousel slide to full screen */
        .carousel-slide {
            height: 100%;
        }
    </style>
</head>
<body >
@if(!$photos->isEmpty())
    <div class="carousel-container">
        <!-- Glide Carousel Slides -->
        <div class="glide carousel-slide">
            <!-- Glide Track -->
            <div class="glide__track content-stretch" data-glide-el="track">
                <ul id="list" class="glide__slides ">
                    @foreach($photos as $photo)
                        <li class="glide__slide">
                            <img onclick=randomize() src="{{asset($photo->path)}}" alt="Slide 1" class="h-screen w-full object-cover">
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@else
    <div class="container justify-items-center">
        <p class="p-16">Oeps.. Nog niets weer te geven. Gelieve foto's op te laden?</p>
    </div>
@endif
<!-- Glide.js JavaScript CDN link -->
<script src="https://cdn.jsdelivr.net/npm/@glidejs/glide/dist/glide.min.js"></script>
<!-- JavaScript for Glide Carousel -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        new Glide('.glide', {
            type: 'carousel',
            startAt: 0, // Start from the first slide
            perView: 1, // Number of slides per view (1 means only one slide visible at a time)
            focusAt: 'center', // Focused slide position
            autoplay: 3000, // Change slide every 5 seconds
            hoverpause: false, // Pause autoplay on hover
            animationDuration: 1000, // Slide animation duration in milliseconds
            peek: 0 // Space between slides
        }).mount();
    });

    function randomize(){
        const ul = document.getElementById('list');
        const liItems = Array.from(ul.getElementsByTagName('li'));

        for (let i = liItems.length - 1; i > 0; i--) {
            const j = Math.floor(Math.random() * (i + 1));
            [liItems[i], liItems[j]] = [liItems[j], liItems[i]];
        }

        liItems.forEach((li) => {
            ul.appendChild(li);
        });
    };

    function refreshPage() {
        location.reload();
        randomize();
    }

    setTimeout(refreshPage, 1800000);
</script>
</body>
</html>

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
    <!-- Styles -->
    @livewireStyles
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@glidejs/glide/dist/css/glide.core.min.css">
</head>
<body>
<!-- Carousel Container -->
<div class="flex items-center justify-center h-screen">
    <!-- Carousel Wrapper -->
    <div class="w-full">
        <!-- Glide Carousel Slides -->
        <div class="glide">
            <!-- Glide Track -->
            <div class="glide__track" data-glide-el="track">
                <ul class="glide__slides">
                    @foreach($photos as $photo)
                        <li class="glide__slide randomize">
                            <img src="{{asset($photo->path)}}" alt="Slide 1" class="w-full h-full object-cover">
                        </li>

                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
<script src="https://unpkg.com/@glidejs/glide@3.6.0/dist/glide.js"></script>
<!-- JavaScript for Glide Carousel -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        new Glide('.glide', {
            type: 'carousel',
            autoplay: 5000, // Change slide every 5 seconds
            hoverpause: true, // Pause autoplay on hover
            animationDuration: 1000, // Slide animation duration in milliseconds
        }).mount();

        var parentDiv = document.body;
        var divs = parentDiv.getElementsByClassName('randomize');
        var divsArray = Array.prototype.slice.call(divs);

        divsArray.sort(function() {
            return 0.5 - Math.random();
        });

        for (var i = 0; i < divsArray.length; i++) {
            parentDiv.appendChild(divsArray[i]);
        }
    });
</script>
</body>
</html>

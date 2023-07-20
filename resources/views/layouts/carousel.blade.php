<!DOCTYPE html>
<html>
<head>
    <!-- Add the Tailwind CSS CDN link -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Glide.js CSS CDN link -->
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
<!-- Carousel Container -->
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
        randomize()
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
</script>
</body>
</html>

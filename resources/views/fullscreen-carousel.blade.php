<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" href="{{asset('img/under_new_management.png')}}" type="image/x-icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Element -->
    <link
        rel="stylesheet"
        href="//cdn.jsdelivr.net/npm/element-plus/dist/index.css"
    />
    <!-- Import Vue 3 -->
    <script src="//cdn.jsdelivr.net/npm/vue@3"></script>
    <!-- Import component library -->
    <script src="//cdn.jsdelivr.net/npm/element-plus"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Styles -->
    @livewireStyles
</head>
<body>
<divv class="container-xl">
    @if(!$photos->isEmpty())
        <template>
            <el-carousel :interval="4000" type="card" height="200px">
                <el-carousel-item v-for="item in 6" :key="item">
                    @foreach($photos as $photo)
                        <img src="{{asset($photo->path)}}">
                    @endforeach
                </el-carousel-item>
            </el-carousel>
        </template>

        <style scoped>
            .el-carousel__item h3 {
                color: #475669;
                opacity: 0.75;
                line-height: 200px;
                margin: 0;
                text-align: center;
            }

            .el-carousel__item:nth-child(2n) {
                background-color: #99a9bf;
            }

            .el-carousel__item:nth-child(2n + 1) {
                background-color: #d3dce6;
            }
        </style>
    @else
        <div class="container">
            <h1 class="display-6 mt-6">Nog geen foto's.</h1>
        </div>
    @endif
</divv>
@livewireScripts
</body>
</html>

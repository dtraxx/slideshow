@extends('layouts.dash')
@section('content')
    @if(session('success'))
        <div class="bg-green-500 p-3 m-2">
            {{ session('success') }}
        </div>
    @endif
    <div class="container">
        <h1 class="text-2xl font-extrabold dark:text-white mb-4">Upload Video's</h1>
        <!-- Display validation errors if present -->
        @if ($errors->any())
            <div class="bg-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="text-danger">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <!-- Form to upload new video -->
        <form action="{{ route('video.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="files">Video:</label>
                <input id="files" type="file" name="files[]" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" multiple required>
            </div>

            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mt-2">Submit</button>
        </form>
    </div>
@endsection

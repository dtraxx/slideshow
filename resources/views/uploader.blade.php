@extends('layouts.dash')
@section('content')
<h1>Upload Photo</h1>

<!-- Display validation errors if present -->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- Form to upload new photo -->
<form action="{{ route('photos.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="photo">Photo:</label>
        <input type="file" name="photo" multiple class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="photo" required>
    </div>
    <div class="form-group">
        <label for="caption" class="block mb-2 text-sm font-medium text-gray-900 dark:text-blue-600">Caption:</label>
        <input type="text" name="caption" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="caption">
    </div>
    <button type="submit" class="text-blue-600 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">Upload</button>
</form>
@endsection


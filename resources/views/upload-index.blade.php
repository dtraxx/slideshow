@extends('layouts.dash')
@section('content')
    @if(session('success'))
        <div class="bg-green-500 p-3 m-2">
            {{ session('success') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="bg-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    image
                </th>
                <th scope="col" class="px-6 py-3">
                    Caption
                </th>
                <th scope="col" class="px-6 py-3">
                    filename
                </th>
                <th scope="col" class="px-6 py-3">
                    delete
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($photos as $photo)
                <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <a href="{{$photo->path}}">
                        <img class="h-20" src="{{asset($photo->path)}}" alt="{{$photo->caption}}">
                        </a>
                    </th>
                    <td class="px-6 py-4">
                        {{$photo->caption}}
                    </td>
                    <td class="px-6 py-4">
                        {{$photo->filename}}
                    </td>
                    <td class="px-6 py-4">
                        <form action="{{ route('photo.delete', ['id' => $photo->id]) }}" method="POST" id="delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

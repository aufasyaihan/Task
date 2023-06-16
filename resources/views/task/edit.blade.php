@extends('layouts.app')

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Task | Edit</title>
</head>

@section('content')
    <div class="pt-5 mx-auto uppercase text-center dark:text-white text-4xl text-bold">
        <p>edit data</p>
    </div>
    <div class="py-5 my-5 mx-auto w-3/4 bg-slate-100 dark:bg-gray-800 rounded-md">
        <div class="w-3/4 mx-auto">
            @if ($errors->any())
                <div class="bg-red-200 px-2 py-0.5 rounded-lg">
                    <div class="m-5 text-red-600 font-semibold">
                        <ul class="list-disc">
                            @foreach ($errors->all() as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
            <form action="{{ url('task/' . $data->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="py-1">
                    <label class="dark:text-white block pb-1 pl-4 after:content-['*'] after:ml-0.5 after:text-red-500"
                        for="Judul">Judul</label>
                    <input
                        class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1"
                        type="text" name="judul" id="judul" placeholder="Masukkan Judul"
                        value="{{ $data->judul }}">
                </div>
                <div class="py-1">
                    <label class="dark:text-white block pb-1 pl-4 after:content-['*'] after:ml-0.5 after:text-red-500"
                        for="deskripsi">Deskripsi</label>
                    <textarea
                        class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1"
                        name="deskripsi" id="deskripsi" cols="30" rows="10" placeholder="Masukkan Deskripsi">{{ $data->deskripsi }}</textarea>
                </div>
                <div class="text-end mt-1">
                    <a
                        class="bg-red-500 text-white py-2.5 px-4 rounded-lg shadow-md hover:bg-red-600 text-sm font-semibold transition-all ease-in-out cursor-pointer mt-1"href="{{ route('task.index') }}">Back</a>
                    <input
                        class="bg-green-500 text-white p-2.5 rounded-lg shadow-md hover:bg-green-600 text-sm font-semibold transition-all ease-in-out cursor-pointer mt-1"
                        type="submit" name="create">
                </div>
            </form>
        </div>
    </div>
@endsection

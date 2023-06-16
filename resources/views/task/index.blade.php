@extends('layouts.app')

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/19f53fb20b.js" crossorigin="anonymous"></script>
    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Task</title>
</head>
@section('content')
    <div class="">
        <div class="w-full md:w-5/6 xl:w-3/4 mx-auto mb-5 mt-3">
            @if (request()->routeIs('task.index') || request()->Is('task/completed') || request()->Is('task/incompleted'))
                <div class="py-5">
                    <a class="bg-blue-600 p-3 rounded-lg hover:bg-blue-700 text-white font-bold uppercase text-sm"
                        href="{{ route('task.create') }}">Tambah Task</a>
                </div>
                @if (Session::has('success'))
                    <div class="bg-green-200 px-2 py-0.5 mt-2 rounded-lg">
                        <div class="m-5 text-green-600 font-semibold">
                            {{ Session::get('success') }}
                        </div>
                    </div>
                @endif

                <div class="mx-50 mt-2 dark:text-white">
                    @if (request()->Is('task/completed'))
                        <p class="text-xl font-bold">Completed Task</p>
                    @else
                        @if (request()->Is('task/incompleted'))
                            <p class="text-xl font-bold">Incompleted Task</p>
                        @else
                            <p class="text-xl font-bold">All Task</p>
                        @endif
                    @endif

                    <hr>
                    <div class="grid grid-cols-4 gap-4 p-3">
                        @foreach ($data as $item)
                            <div class="bg-white dark:bg-slate-700 p-4 rounded-lg">
                                <div class="grid grid-cols-4 mb-5">
                                    <div class="col-start-1 font-bold text-lg">{{ $item->judul }}</div>
                                </div>
                                <div class="text-justify">{{ $item->deskripsi }}</div>
                                <div class="grid grid-cols-4 mb-1">
                                    <div class="col-end-6 text-md ">
                                        <a class="underline decoration-lime-500 underline-offset-4 hover:text-lime-400 transition-all"
                                            href="{{ url('task/' . $item->id) }}">Detail</a>
                                    </div>
                                </div>
                                <hr class="my-2">
                                <div class="grid grid-cols-4">
                                    <div class="col-end-6 text-md ">
                                        <form class="my-1" action="{{ url('task/' . $item->id . '/status') }}"
                                            method="post">
                                            @csrf
                                            @method('PUT')
                                            <select class="appearance-none bg-transparent" name="status" id="status">
                                                <option class=" text-black" value="{{ $item->status }}">{{ $item->status }}
                                                </option>
                                                @if ($item->status == 'Incompleted')
                                                    <option class=" text-black" value="Completed">Completed</option>
                                                @else
                                                    <option class=" text-black" value="Incompleted">Incompleted</option>
                                                @endif
                                            </select>
                                            <button class="m-auto bg-blue-700 hover:bg-blue-800 p-2 text-white rounded-lg"
                                                type="submit" name="create" id='status'>Update
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @elseif (!request()->Is('task/create'))
                    <div class="py-5">
                        <a class="bg-red-600 p-3 rounded-lg hover:bg-red-700 text-white font-bold uppercase text-sm"
                            href="{{ url('task') }}">Kembali</a>
                    </div>
                    @if (Session::has('success'))
                        <div class="bg-green-200 px-2 py-0.5 mt-2 rounded-lg">
                            <div class="m-5 text-green-600 font-semibold">
                                {{ Session::get('success') }}
                            </div>
                        </div>
                    @endif
                    <div class="mx-50 mt-2 dark:text-white">
                        @if (request()->Is('task/completed'))
                            <p class="text-xl font-bold">Completed Task</p>
                        @else
                            @if (request()->Is('task/incompleted'))
                                <p class="text-xl font-bold">Incompleted Task</p>
                            @else
                                <p class="text-xl font-bold">Detailed Task</p>
                            @endif
                        @endif
                        <hr>
                        <div class="bg-slate-700 w-full my-5 p-5 rounded-lg">
                            @foreach ($data as $item)
                                <div class="bg-white dark:bg-slate-700 p-4 rounded-lg">
                                    <div class="grid grid-cols-2 mb-5">
                                        <div class="col-start-1 font-bold text-lg ">{{ $item->judul }}</div>
                                        <div class="col-end text-end">
                                            <form class="m-auto" onsubmit="return confirm('Yakin akan menghapus data?')"
                                                action="{{ url('task/' . $item->id) }}" method="POST">
                                                <a class="underline decoration-amber-500 underline-offset-4 hover:text-amber-500"
                                                    href="{{ url('task/' . $item->id . '/edit') }}">Edit</a>
                                                @csrf
                                                @method('DELETE')
                                                <button
                                                    class="underline decoration-red-500 underline-offset-4 hover:text-red-600 transition-all"
                                                    type="submit" name="submit">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="text-justify">{{ $item->deskripsi }}</div>
                                    <hr class="my-2">
                                    <div class="grid grid-cols-4">
                                        <div class="col-end-6 text-md ">
                                            <form class="my-1" action="{{ url('task/' . $item->id . '/status') }}"
                                                method="post">
                                                @csrf
                                                @method('PUT')
                                                <select class="appearance-none bg-transparent" name="status"
                                                    id="status">
                                                    <option class=" text-black" value="{{ $item->status }}">
                                                        {{ $item->status }}
                                                    </option>
                                                    @if ($item->status == 'Incompleted')
                                                        <option class=" text-black" value="Completed">Completed</option>
                                                    @else
                                                        <option class=" text-black" value="Incompleted">Incompleted
                                                        </option>
                                                    @endif
                                                </select>
                                                <button
                                                    class="m-auto bg-blue-700 hover:bg-blue-800 p-2 text-white rounded-lg"
                                                    type="submit" name="create" id='status'>Update
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
            @endif
        </div>
    </div>
    </div>
@endsection

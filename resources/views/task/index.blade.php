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
    <!--Regular Datatables CSS-->
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
    <!--Responsive Extension Datatables CSS-->
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">

    <style>
        /*Overrides for Tailwind CSS */

        /*Form fields*/
        .dataTables_wrapper select,
        .dataTables_wrapper .dataTables_filter input {
            color: #4a5568;
            /*text-gray-700*/
            padding-left: 1rem;
            /*pl-4*/
            padding-right: 1rem;
            /*pl-4*/
            padding-top: .5rem;
            /*pl-2*/
            padding-bottom: .5rem;
            /*pl-2*/
            line-height: 1.25;
            /*leading-tight*/
            border-width: 2px;
            /*border-2*/
            border-radius: .25rem;
            border-color: #edf2f7;
            /*border-gray-200*/
            background-color: #edf2f7;
            /*bg-gray-200*/
        }

        /*Row Hover*/
        table.dataTable.hover tbody tr:hover,
        table.dataTable.display tbody tr:hover {
            background-color: #ebf4ff;
            /*bg-indigo-100*/
        }

        /*Pagination Buttons*/
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            font-weight: 700;
            /*font-bold*/
            border-radius: .25rem;
            /*rounded*/
            border: 1px solid transparent;
            /*border border-transparent*/
        }

        /*Pagination Buttons - Current selected */
        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            color: #fff !important;
            /*text-white*/
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
            /*shadow*/
            font-weight: 700;
            /*font-bold*/
            border-radius: .25rem;
            /*rounded*/
            background: #667eea !important;
            /*bg-indigo-500*/
            border: 1px solid transparent;
            /*border border-transparent*/
        }

        /*Pagination Buttons - Hover */
        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            color: #fff !important;
            /*text-white*/
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
            /*shadow*/
            font-weight: 700;
            /*font-bold*/
            border-radius: .25rem;
            /*rounded*/
            background: #667eea !important;
            /*bg-indigo-500*/
            border: 1px solid transparent;
            /*border border-transparent*/
        }

        /*Add padding to bottom border */
        table.dataTable.no-footer {
            border-bottom: 1px solid #e2e8f0;
            /*border-b-1 border-gray-300*/
            margin-top: 0.75em;
            margin-bottom: 0.75em;
        }

        /*Change colour of responsive icon*/
        table.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child:before,
        table.dataTable.dtr-inline.collapsed>tbody>tr>th:first-child:before {
            background-color: #667eea !important;
            /*bg-indigo-500*/
        }
    </style>
    <title>Task</title>
</head>
@section('content')
    <div class="">
        <div class="w-full md:w-5/6 xl:w-3/4 mx-auto mb-5 mt-3">
            @if (request()->routeIs('task.index') || request()->Is('task/completed') || request()->Is('task/incompleted'))
                <div class="py-5">
                    <a class="bg-blue-600 p-3 rounded-lg hover:bg-blue-700 text-white font-bold uppercase text-sm"
                        href="{{ url('task/create') }}">Tambah
                        Task</a>
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
                                    <div class="col-end-5">
                                        <a class="underline decoration-amber-500 underline-offset-4 hover:text-amber-500"
                                            href="{{ url('task/' . $item->id . '/edit') }}">Edit</a>
                                    </div>
                                    <div class="col-end-6">
                                        <form class="m-auto" onsubmit="return confirm('Yakin akan menghapus data?')"
                                            action="{{ url('task/' . $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                class="underline decoration-red-500 underline-offset-4 hover:text-red-600 transition-all"
                                                type="submit" name="submit">Delete</button>
                                        </form>
                                    </div>
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
                                            <button class="m-auto bg-blue-500 p-2 text-white rounded-lg" type="submit"
                                                name="create" id='status'>Update
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
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
                                                        <option class=" text-black" value="Incompleted">Incompleted</option>
                                                    @endif
                                                </select>
                                                <button class="m-auto bg-blue-500 p-2 text-white rounded-lg"
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\task;

class taskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = task::all();
        return view('task.index', compact('data'));
    }
    public function completed()
    {
        $data = task::where('status', '=', 'Completed')->get();
        return view('task.index', compact('data'));
    }
    public function incompleted()
    {
        $data = task::where('status', '=', 'Incompleted')->get();
        return view('task.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('task.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required'
        ]);
        $data = [
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
        ];

        task::create($data);
        return redirect()->to('task')->with('success', 'Berhasil Menambahkan Task');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = task::where('id', $id)->get();
        return view('task.index', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = task::where('id', $id)->first();
        return view('task.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required'
        ]);
        $data = [
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi
        ];
        task::where('id', $id)->update($data);
        return redirect()->to('task')->with('success', 'Berhasil Mengudpate Task');

    }
    public function updateStatus(Request $request, string $id)
    {
        $data = [
            'status' => $request->input('status')
        ];
        task::where('id', $id)->update($data);
        return redirect()->to('task')->with('success', 'Berhasil Mengudpate Status');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        task::where('id', $id)->delete();
        return redirect()->to('task')->with('success', 'Berhasil Menghapus Task');
    }
}
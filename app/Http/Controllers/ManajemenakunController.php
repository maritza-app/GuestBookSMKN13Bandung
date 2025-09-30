<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ManajemenakunController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $manajemenakun = User::all();
        return view('manajemenakun.index', compact('manajemenakun')); //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Manajemenakun $manajemenakun)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
public function edit($id)
{
    $manajemenakun = User::findOrFail($id);
    return view('manajemenakun.edit', compact('manajemenakun'));
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $manajemenakun = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'password' => 'required|string',
        ]);

        $manajemenakun->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return redirect()->route('manajemenakun.index')->with('success', 'Data berhasil diperbarui!'); //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $manajemenakun = User::findOrFail($id);
    $manajemenakun->delete();

    return redirect()->route('manajemenakun.index')->with('success', 'Data berhasil dihapus!'); //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\OrangTua;
use Illuminate\Http\Request;

class OrangTuaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orangTua = OrangTua::orderBy('created_at', 'desc')->get();
        return view('orangtua.index', compact('orangTua'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('orangtua.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|unique:orang_tua,nik|max:16',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat' => 'required|string',
            'agama' => 'required|string|max:255',
            'pekerjaan' => 'required|string|max:255',
            'pendidikan' => 'required|string|max:255',
            'no_telepon' => 'required|string|max:15',
            'status' => 'required|in:hidup,meninggal'
        ]);

        OrangTua::create($validated);

        return redirect()->route('orangtua.index')
            ->with('success', 'Data orang tua berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(OrangTua $orangTua)
    {
        return view('orangtua.show', compact('orangTua'));
    }

    /**
     * Show the form for editing the specified resource.
  <?php

namespace App\Http\Controllers;

use App\Models\OrangTua;
use Illuminate\Http\Request;

class OrangTuaController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OrangTua $orangtua) // PASTIKAN huruf kecil
    {
        return view('orangtua.edit', compact('orangtua'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OrangTua $orangtua) // PASTIKAN huruf kecil
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|max:16|unique:orang_tua,nik,' . $orangtua->id,
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat' => 'required|string',
            'agama' => 'required|string|max:255',
            'pekerjaan' => 'required|string|max:255',
            'pendidikan' => 'required|string|max:255',
            'no_telepon' => 'required|string|max:15',
            'status' => 'required|in:hidup,meninggal'
        ]);

        $orangtua->update($validated);

        return redirect()->route('orangtua.index')
            ->with('success', 'Data orang tua berhasil diperbarui!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrangTua $orangTua)
    {
        $orangTua->delete();

        return redirect()->route('orangtua.index')
            ->with('success', 'Data orang tua berhasil dihapus!');
    }
}

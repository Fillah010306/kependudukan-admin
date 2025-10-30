<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penduduk;

class PendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penduduks = Penduduk::all();
        $totalPenduduk = Penduduk::count();
        $pendudukBaru = Penduduk::whereDate('created_at', today())->count();
        
        return view('kependudukan.index', compact('penduduks', 'totalPenduduk', 'pendudukBaru'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kependudukan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|digits:16|unique:penduduks,nik',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'birthday' => 'required|date',
            'gender' => 'required|in:L,P',
            'phone' => 'nullable|string|max:15'
        ], [
            'nik.required' => 'NIK wajib diisi',
            'nik.digits' => 'NIK harus terdiri dari 16 digit angka',
            'nik.unique' => 'NIK sudah terdaftar',
            'first_name.required' => 'Nama depan wajib diisi',
            'last_name.required' => 'Nama belakang wajib diisi',
            'birthday.required' => 'Tanggal lahir wajib diisi',
            'birthday.date' => 'Format tanggal lahir tidak valid',
            'gender.required' => 'Jenis kelamin wajib dipilih',
            'gender.in' => 'Pilihan jenis kelamin tidak valid',
            'phone.max' => 'Nomor telepon maksimal 15 karakter'
        ]);

        try {
            $cleanData = [
                'nik' => trim($request->nik),
                'first_name' => trim($request->first_name),
                'last_name' => trim($request->last_name),
                'birthday' => $request->birthday,
                'gender' => trim($request->gender),
                'phone' => $request->phone ? trim($request->phone) : null,
            ];

            Penduduk::create($cleanData);

            return redirect()->route('penduduk.index')
                ->with('success', 'Data penduduk berhasil ditambahkan!');

        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $penduduk = Penduduk::findOrFail($id);
        return view('kependudukan.show', compact('penduduk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $penduduk = Penduduk::findOrFail($id);
        return view('kependudukan.edit', compact('penduduk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nik' => 'required|digits:16|unique:penduduks,nik,' . $id,
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'birthday' => 'required|date',
            'gender' => 'required|in:L,P',
            'phone' => 'nullable|string|max:15'
        ], [
            'nik.required' => 'NIK wajib diisi',
            'nik.digits' => 'NIK harus terdiri dari 16 digit angka',
            'nik.unique' => 'NIK sudah terdaftar',
            'first_name.required' => 'Nama depan wajib diisi',
            'last_name.required' => 'Nama belakang wajib diisi',
            'birthday.required' => 'Tanggal lahir wajib diisi',
            'birthday.date' => 'Format tanggal lahir tidak valid',
            'gender.required' => 'Jenis kelamin wajib dipilih',
            'gender.in' => 'Pilihan jenis kelamin tidak valid',
            'phone.max' => 'Nomor telepon maksimal 15 karakter'
        ]);

        try {
            $penduduk = Penduduk::findOrFail($id);

            $cleanData = [
                'nik' => trim($request->nik),
                'first_name' => trim($request->first_name),
                'last_name' => trim($request->last_name),
                'birthday' => $request->birthday,
                'gender' => trim($request->gender),
                'phone' => $request->phone ? trim($request->phone) : null,
            ];

            $penduduk->update($cleanData);

            return redirect()->route('penduduk.index')
                ->with('success', 'Data penduduk berhasil diperbarui!');

        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $penduduk = Penduduk::findOrFail($id);
            $penduduk->delete();

            return redirect()->route('penduduk.index')
                ->with('success', 'Data penduduk berhasil dihapus!');

        } catch (\Exception $e) {
            return redirect()->route('penduduk.index')
                ->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }
}

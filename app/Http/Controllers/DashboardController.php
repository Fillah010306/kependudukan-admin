<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Penduduk;
use App\Models\Kelahiran;
use App\Models\OrangTua;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        // Hitung total data saja - tanpa query yang complex
        $totalPenduduk = Penduduk::count();
        $totalKelahiran = Kelahiran::count();
        $totalOrangTua = OrangTua::count();

        return view('dashboard', [
            'username' => $user->name ?? 'Guest',
            'email' => $user->email ?? 'No email',
            'role' => $user->role ?? 'User',
            'login_time' => now()->format('H:i:s'),
            'login_date' => now()->format('d F Y'),

            // Data statistik utama saja
            'totalPenduduk' => $totalPenduduk,
            'totalKelahiran' => $totalKelahiran,
            'totalOrangTua' => $totalOrangTua,
            'totalDokumen' => $totalPenduduk + $totalKelahiran + $totalOrangTua,

            // Data default untuk chart (bisa diubah nanti)
            'persentaseLaki' => 65,
            'persentasePerempuan' => 35,
            'persentaseKelahiranLaki' => 60,
            'persentaseKelahiranPerempuan' => 40,
            'totalKelahiranLaki' => $totalKelahiran > 0 ? round($totalKelahiran * 0.6) : 0,
            'totalKelahiranPerempuan' => $totalKelahiran > 0 ? round($totalKelahiran * 0.4) : 0,

            // Data default lainnya
            'distribusiUsia' => [],
            'aktivitasTerbaru' => $this->getAktivitasSederhana(),
            'statistikOrangTua' => [
                'total' => $totalOrangTua,
                'laki' => round($totalOrangTua * 0.5),
                'perempuan' => round($totalOrangTua * 0.5),
                'dengan_kelahiran' => round($totalOrangTua * 0.7),
                'persentase_laki' => 50,
                'persentase_perempuan' => 50,
            ],

            // User info
            'userId' => $user->id ?? 'N/A',
            'wilayahKerja' => $user->wilayah_kerja ?? 'Kota Jakarta Pusat',
        ]);
    }

    /**
     * Get aktivitas sederhana tanpa query complex
     */
    private function getAktivitasSederhana()
    {
        return [
            [
                'icon' => 'fa-info-circle',
                'judul' => 'Sistem Kependudukan Aktif',
                'waktu' => 'Siap digunakan'
            ],
            [
                'icon' => 'fa-database',
                'judul' => 'Data terintegrasi',
                'waktu' => 'Update: ' . now()->format('d M Y')
            ]
        ];
    }

    /**
     * Display user profile
     */
    public function profile()
    {
        $user = Auth::user();

        return view('dashboard.profile', [
            'user' => $user
        ]);
    }

    /**
     * Display statistics
     */
    public function statistics()
    {
        $user = Auth::user();

        $stats = [
            'total_penduduk' => Penduduk::count(),
            'total_kelahiran' => Kelahiran::count(),
            'total_orang_tua' => OrangTua::count(),
            'system_status' => 'Normal'
        ];

        return view('dashboard.statistics', [
            'stats' => $stats,
            'username' => $user->name ?? 'Guest'
        ]);
    }
}

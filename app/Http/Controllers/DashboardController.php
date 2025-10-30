<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get authenticated user data
        $user = Auth::user();
        
        // Data yang akan dikirim ke view
        $data = [
            'username' => $user->name ?? 'Guest',
            'email' => $user->email ?? 'No email',
            'role' => $user->role ?? 'User',
            'login_time' => now()->format('H:i:s'),
            'login_date' => now()->format('d F Y'),
        ];

        // Return view dengan data
        return view('dashboard', $data);
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
        // Contoh data statistik
        $stats = [
            'total_users' => 150,
            'active_sessions' => 45,
            'today_logins' => 23,
            'system_status' => 'Normal'
        ];

        return view('dashboard.statistics', [
            'stats' => $stats,
            'username' => Auth::user()->name ?? 'Guest'
        ]);
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
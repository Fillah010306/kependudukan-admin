@extends('layouts.app')

@section('title', 'Data Orang Tua - Neo System')
@section('page-title', 'Data Orang Tua')
@section('page-subtitle', 'Kelola data orang tua dengan mudah dan efisien')
@section('add-route', route('orangtua.create'))

@section('content')
<div class="container mb-5">
    <!-- Stats Cards -->
    <div class="row mb-4">
        <div class="col-md-3 mb-3">
            <div class="stats-card">
                <div class="stats-number">{{ $orangTua->count() }}</div>
                <div class="stats-label">Total Orang Tua</div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="stats-card">
                <div class="stats-number">{{ $orangTua->where('jenis_kelamin', 'L')->count() }}</div>
                <div class="stats-label">Laki-laki</div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="stats-card">
                <div class="stats-number">{{ $orangTua->where('jenis_kelamin', 'P')->count() }}</div>
                <div class="stats-label">Perempuan</div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="stats-card">
                <div class="stats-number">{{ $orangTua->where('status', 'hidup')->count() }}</div>
                <div class="stats-label">Masih Hidup</div>
            </div>
        </div>
    </div>

    <!-- Alert Messages -->
    @if(session('success'))
    <div class="alert alert-neo-success mb-4">
        <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-neo-danger mb-4">
        <i class="fas fa-exclamation-circle me-2"></i> {{ session('error') }}
    </div>
    @endif

    <!-- Data Table -->
    <div class="glass-card">
        <div class="card-body p-0">
            @if($orangTua->count() > 0)
            <div class="table-responsive">
                <table class="table table-neo mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Lengkap</th>
                            <th>NIK</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>No Telepon</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orangTua as $item)
                        <tr>
                            <td data-label="No" class="border-end">{{ $loop->iteration }}</td>
                            <td data-label="Nama Lengkap" class="border-end">
                                <strong>{{ $item->nama }}</strong>
                            </td>
                            <td data-label="NIK" class="border-end">
                                <i class="fas fa-id-card me-1 text-muted"></i>
                                {{ $item->nik }}
                            </td>
                            <td data-label="Jenis Kelamin" class="border-end">
                                <span class="badge-gender {{ $item->jenis_kelamin == 'L' ? 'badge-male' : 'badge-female' }}">
                                    {{ $item->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}
                                </span>
                            </td>
                            <td data-label="Alamat" class="border-end">
                                <i class="fas fa-map-marker-alt me-1 text-muted"></i>
                                {{ Str::limit($item->alamat, 30) }}
                            </td>
                            <td data-label="No Telepon" class="border-end">
                                <i class="fas fa-phone me-1 text-muted"></i>
                                {{ $item->no_telepon }}
                            </td>
                            <td data-label="Status" class="border-end">
                                <span class="badge-status {{ $item->status == 'hidup' ? 'badge-alive' : 'badge-deceased' }}">
                                    {{ ucfirst($item->status) }}
                                </span>
                            </td>
                            <td data-label="Aksi">
                                <div class="action-buttons">
                                    <a href="{{ route('orangtua.edit', $item->id) }}" class="btn btn-neo-warning btn-sm" title="Edit Data">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('orangtua.destroy', $item->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-neo-danger btn-sm" title="Hapus Data" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div class="empty-state">
                <i class="fas fa-users"></i>
                <h4>Belum Ada Data Orang Tua</h4>
                <p>Mulai dengan menambahkan data orang tua pertama Anda</p>
                <a href="{{ route('orangtua.create') }}" class="btn btn-neo-primary mt-3">
                    <i class="fas fa-plus-circle me-2"></i> Tambah Data Pertama
                </a>
            </div>
            @endif
        </div>
    </div>
</div>

<style>
/* Tambahan styling untuk garis tabel yang lebih jelas */
.table-neo {
    border-collapse: collapse;
    border: 2px solid #d1d5db;
}

.table-neo th {
    border-right: 2px solid #d1d5db;
    border-bottom: 3px solid #d1d5db;
    padding: 1rem 0.75rem;
    background-color: #f8f9fa;
    font-weight: 700;
    color: #374151;
    font-size: 0.9rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.table-neo th:last-child {
    border-right: none;
}

.table-neo td {
    border-right: 2px solid #d1d5db;
    border-bottom: 2px solid #d1d5db;
    padding: 1rem 0.75rem;
    vertical-align: middle;
    background-color: #ffffff;
}

.table-neo td:last-child {
    border-right: none;
}

.table-neo tbody tr:last-child td {
    border-bottom: 2px solid #d1d5db;
}

.table-neo tbody tr:nth-child(even) td {
    background-color: #f9fafb;
}

.table-neo tbody tr:hover td {
    background-color: #f0f9ff;
    border-color: #3b82f6;
}

.border-end {
    border-right: 2px solid #d1d5db !important;
}

/* Styling untuk badge gender */
.badge-gender {
    padding: 0.5rem 1rem;
    border-radius: 8px;
    font-size: 0.8rem;
    font-weight: 700;
    display: inline-block;
    border: 2px solid;
}

.badge-male {
    background-color: rgba(59, 130, 246, 0.15);
    color: #1e40af;
    border-color: #3b82f6;
}

.badge-female {
    background-color: rgba(236, 72, 153, 0.15);
    color: #be185d;
    border-color: #ec4899;
}

/* Styling untuk badge status */
.badge-status {
    padding: 0.5rem 1rem;
    border-radius: 8px;
    font-size: 0.8rem;
    font-weight: 700;
    display: inline-block;
    border: 2px solid;
}

.badge-alive {
    background-color: rgba(34, 197, 94, 0.15);
    color: #166534;
    border-color: #22c55e;
}

.badge-deceased {
    background-color: rgba(107, 114, 128, 0.15);
    color: #374151;
    border-color: #6b7280;
}

/* Glass card effect */
.glass-card {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(10px);
    border-radius: 12px;
    border: 2px solid rgba(255, 255, 255, 0.3);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
    overflow: hidden;
}

/* Action buttons */
.action-buttons {
    display: flex;
    gap: 0.5rem;
}

/* Responsif untuk mobile */
@media (max-width: 768px) {
    .table-responsive {
        border: 0;
    }

    .table-neo thead {
        display: none;
    }

    .table-neo tbody tr {
        display: block;
        margin-bottom: 1.5rem;
        border: 2px solid #d1d5db;
        border-radius: 10px;
        padding: 1rem;
        background-color: #ffffff;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .table-neo tbody td {
        display: flex;
        justify-content: space-between;
        align-items: center;
        border: none;
        border-bottom: 2px solid #e5e7eb;
        padding: 0.75rem 0;
        background-color: transparent !important;
    }

    .table-neo tbody td:last-child {
        border-bottom: none;
    }

    .table-neo tbody td:before {
        content: attr(data-label);
        font-weight: 700;
        color: #374151;
        font-size: 0.85rem;
    }

    .action-buttons {
        justify-content: flex-end;
        width: 100%;
    }

    .border-end {
        border-right: none !important;
    }

    .table-neo tbody tr:hover td {
        border-color: #e5e7eb;
        background-color: transparent !important;
    }
}
</style>
@endsection

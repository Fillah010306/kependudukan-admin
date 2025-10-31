@extends('layouts.app')

@section('title', 'Data Kelahiran - Neo System')
@section('page-title', 'Data Kelahiran')
@section('page-subtitle', 'Kelola data kelahiran dengan mudah dan efisien')
@section('add-route', route('kelahiran.create'))

@section('content')
<div class="container mb-5">
    <!-- Stats Cards -->
    <div class="row mb-4">
        <div class="col-md-3 mb-3">
            <div class="stats-card">
                <div class="stats-number">{{ $kelahiran->count() }}</div>
                <div class="stats-label">Total Kelahiran</div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="stats-card">
                <div class="stats-number">{{ $kelahiran->where('jenis_kelamin', 'L')->count() }}</div>
                <div class="stats-label">Laki-laki</div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="stats-card">
                <div class="stats-number">{{ $kelahiran->where('jenis_kelamin', 'P')->count() }}</div>
                <div class="stats-label">Perempuan</div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="stats-card">
                <div class="stats-number">{{ $kelahiran->count() }}</div>
                <div class="stats-label">Dalam Sistem</div>
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
            @if($kelahiran->count() > 0)
                <div class="table-responsive">
                    <table class="table table-neo mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Bayi</th>
                                <th>Tanggal Lahir</th>
                                <th>Jenis Kelamin</th>
                                <th>Nama Ayah</th>
                                <th>Nama Ibu</th>
                                <th>Orang Tua</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($kelahiran as $item)
                                <tr>
                                    <td data-label="No" class="border-end">{{ $loop->iteration }}</td>
                                    <td data-label="Nama Bayi" class="border-end">
                                        <strong>{{ $item->nama_bayi }}</strong>
                                    </td>
                                    <td data-label="Tanggal Lahir" class="border-end">
                                        {{ $item->tanggal_lahir->format('d/m/Y') }}
                                    </td>
                                    <td data-label="Jenis Kelamin" class="border-end">
                                        @if($item->jenis_kelamin == 'L')
                                            <span class="badge-gender badge-male">Laki-laki</span>
                                        @else
                                            <span class="badge-gender badge-female">Perempuan</span>
                                        @endif
                                    </td>
                                    <td data-label="Nama Ayah" class="border-end">
                                        <i class="fas fa-user me-1 text-muted"></i>
                                        {{ $item->nama_ayah }}
                                    </td>
                                    <td data-label="Nama Ibu" class="border-end">
                                        <i class="fas fa-user me-1 text-muted"></i>
                                        {{ $item->nama_ibu }}
                                    </td>
                                    <td data-label="Orang Tua" class="border-end">
                                        @if($item->orangtua)
                                            <i class="fas fa-users me-1 text-muted"></i>
                                            {{ $item->orangtua->nama ?? '-' }}
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td data-label="Aksi">
                                        <div class="action-buttons">
                                            <a href="{{ route('kelahiran.edit', $item->id) }}"
                                               class="btn btn-neo-warning btn-sm" title="Edit Data">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('kelahiran.destroy', $item->id) }}"
                                                  method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-neo-danger btn-sm"
                                                        title="Hapus Data"
                                                        onclick="return confirm('Hapus data?')">
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
                    <i class="fas fa-baby"></i>
                    <h4>Belum Ada Data Kelahiran</h4>
                    <p>Mulai dengan menambahkan data kelahiran pertama Anda</p>
                    <a href="{{ route('kelahiran.create') }}" class="btn btn-neo-primary mt-3">
                        <i class="fas fa-plus-circle me-2"></i> Tambah Data Pertama
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>

<style>
/* Tambahan styling untuk garis tabel */
.table-neo {
    border-collapse: collapse;
    border: 1px solid #e0e0e0;
}

.table-neo th {
    border-right: 1px solid #e0e0e0;
    border-bottom: 2px solid #e0e0e0;
    padding: 1rem 0.75rem;
    background-color: #f8f9fa;
    font-weight: 600;
    color: #495057;
}

.table-neo th:last-child {
    border-right: none;
}

.table-neo td {
    border-right: 1px solid #e0e0e0;
    border-bottom: 1px solid #e0e0e0;
    padding: 1rem 0.75rem;
    vertical-align: middle;
}

.table-neo td:last-child {
    border-right: none;
}

.table-neo tbody tr:last-child td {
    border-bottom: none;
}

.border-end {
    border-right: 1px solid #e0e0e0 !important;
}

/* Styling untuk badge gender */
.badge-gender {
    padding: 0.4rem 0.8rem;
    border-radius: 50px;
    font-size: 0.8rem;
    font-weight: 600;
    display: inline-block;
}

.badge-male {
    background-color: rgba(66, 133, 244, 0.1);
    color: #4285F4;
    border: 1px solid rgba(66, 133, 244, 0.3);
}

.badge-female {
    background-color: rgba(234, 67, 53, 0.1);
    color: #EA4335;
    border: 1px solid rgba(234, 67, 53, 0.3);
}

/* Glass card effect */
.glass-card {
    background: rgba(255, 255, 255, 0.8);
    backdrop-filter: blur(10px);
    border-radius: 10px;
    border: 1px solid rgba(255, 255, 255, 0.2);
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    overflow: hidden;
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
        margin-bottom: 1rem;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        padding: 1rem;
    }

    .table-neo tbody td {
        display: flex;
        justify-content: space-between;
        align-items: center;
        border: none;
        border-bottom: 1px solid #e0e0e0;
        padding: 0.5rem 0;
    }

    .table-neo tbody td:last-child {
        border-bottom: none;
    }

    .table-neo tbody td:before {
        content: attr(data-label);
        font-weight: 600;
        color: #495057;
    }

    .action-buttons {
        justify-content: flex-end;
    }

    .border-end {
        border-right: none !important;
    }
}
</style>
@endsection

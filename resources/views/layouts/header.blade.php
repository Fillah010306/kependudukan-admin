<div class="header-section">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h1 class="page-title">@yield('page-title', 'Data Penduduk')</h1>
                <p class="page-subtitle">@yield('page-subtitle', 'Kelola data kependudukan dengan mudah dan efisien')</p>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('dashboard') }}" class="btn btn-neo-primary">
                    <i class="fas fa-arrow-left me-2"></i> Dashboard
                </a>
                @hasSection('add-button')
                    @yield('add-button')
                @else
                    <a href="@yield('add-route', '#')" class="btn btn-neo-primary">
                        <i class="fas fa-plus-circle me-2"></i> Tambah Data
                    </a>
                @endif
            </div>
        </div>
    </div>
</div>

@extends('layouts.admin.app')

@section('content')
    <!-- Alert Session -->
    @if (session('success'))
        <div class="alert">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
    @endif

    <!-- Statistics Grid -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-users"></i>
            </div>
            <div class="stat-number">{{ $totalPenduduk }}</div>
            <div class="stat-label">Total Penduduk</div>
            <div class="stat-trend">
                <i class="fas fa-arrow-up"></i>
                <span>Active</span>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-baby"></i>
            </div>
            <div class="stat-number">{{ $totalKelahiran }}</div>
            <div class="stat-label">Total Kelahiran</div>
            <div class="stat-trend">
                <i class="fas fa-heart"></i>
                <span>New</span>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-user-friends"></i>
            </div>
            <div class="stat-number">{{ $totalOrangTua }}</div>
            <div class="stat-label">Total Orang Tua</div>
            <div class="stat-trend">
                <i class="fas fa-home"></i>
                <span>Families</span>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-file-alt"></i>
            </div>
            <div class="stat-number">{{ $totalDokumen }}</div>
            <div class="stat-label">Total Dokumen</div>
            <div class="stat-trend">
                <i class="fas fa-database"></i>
                <span>Records</span>
            </div>
        </div>
    </div>

    <!-- Charts Section -->
    <div class="charts-grid">
        <!-- Main Chart -->
        <div class="chart-container">
            <div class="chart-header">
                <h3 class="chart-title">
                    <i class="fas fa-chart-line"></i>
                    Grafik Pertumbuhan Penduduk
                </h3>
                <div class="chart-actions">
                    <button class="chart-btn active">Bulanan</button>
                    <button class="chart-btn">Tahunan</button>
                </div>
            </div>
            <div class="chart-wrapper">
                <canvas id="populationChart"></canvas>
            </div>
        </div>

        <!-- Gender Distribution -->
        <div class="chart-container">
            <div class="chart-header">
                <h3 class="chart-title">
                    <i class="fas fa-chart-pie"></i>
                    Distribusi Gender Penduduk
                </h3>
            </div>

            <!-- Donut Chart -->
            <div class="donut-container">
                <div class="donut-chart">
                    <div class="donut-segment"
                        style="background: conic-gradient(#667eea 0% {{ $persentaseLaki }}%, #764ba2 {{ $persentaseLaki }}% 100%);">
                    </div>
                    <div class="donut-center">
                        <span class="donut-percentage">{{ $persentaseLaki }}%</span>
                        <span class="donut-label">Laki-laki</span>
                    </div>
                </div>
            </div>

            <!-- Progress Stats -->
            <div class="progress-stats">
                <div class="progress-item">
                    <div class="progress-info">
                        <div class="progress-label">
                            <span class="gender-indicator male"></span>
                            <span>Laki-laki</span>
                        </div>
                        <span class="progress-value">{{ $persentaseLaki }}%</span>
                    </div>
                    <div class="progress-bar">
                        <div class="progress-fill"
                            style="width: {{ $persentaseLaki }}%; background: linear-gradient(90deg, #667eea, #764ba2);">
                        </div>
                    </div>
                </div>
                <div class="progress-item">
                    <div class="progress-info">
                        <div class="progress-label">
                            <span class="gender-indicator female"></span>
                            <span>Perempuan</span>
                        </div>
                        <span class="progress-value">{{ $persentasePerempuan }}%</span>
                    </div>
                    <div class="progress-bar">
                        <div class="progress-fill"
                            style="width: {{ $persentasePerempuan }}%; background: linear-gradient(90deg, #ef476f, #ff6b6b);">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Additional Charts Row -->
    <div class="charts-grid">
        <!-- Activity Timeline -->
        <div class="chart-container">
            <div class="chart-header">
                <h3 class="chart-title">
                    <i class="fas fa-history"></i>
                    Aktivitas Terbaru
                </h3>
                <div class="chart-actions">
                    <button class="chart-btn"><i class="fas fa-sync-alt"></i></button>
                </div>
            </div>
            <div class="timeline">
                @if (isset($aktivitasTerbaru) && count($aktivitasTerbaru) > 0)
                    @foreach ($aktivitasTerbaru as $aktivitas)
                        <div class="timeline-item">
                            <div class="timeline-icon">
                                <i class="fas {{ $aktivitas['icon'] }}"></i>
                            </div>
                            <div class="timeline-content">
                                <div class="timeline-title">{{ $aktivitas['judul'] }}</div>
                                <div class="timeline-time">{{ $aktivitas['waktu'] }}</div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="timeline-item">
                        <div class="timeline-icon">
                            <i class="fas fa-info-circle"></i>
                        </div>
                        <div class="timeline-content">
                            <div class="timeline-title">Belum ada aktivitas</div>
                            <div class="timeline-time">Mulai tambah data penduduk</div>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <!-- Gender Kelahiran -->
        <div class="chart-container">
            <div class="chart-header">
                <h3 class="chart-title">
                    <i class="fas fa-baby"></i>
                    Gender Kelahiran
                </h3>
            </div>

            <!-- Donut Chart Kelahiran -->
            <div class="donut-container">
                <div class="donut-chart">
                    <div class="donut-segment"
                        style="background: conic-gradient(#667eea 0% {{ $persentaseKelahiranLaki }}%, #764ba2 {{ $persentaseKelahiranLaki }}% 100%);">
                    </div>
                    <div class="donut-center">
                        <span class="donut-percentage">{{ $persentaseKelahiranLaki }}%</span>
                        <span class="donut-label">Laki-laki</span>
                    </div>
                </div>
            </div>

            <!-- Progress Stats Kelahiran -->
            <div class="progress-stats">
                <div class="progress-item">
                    <div class="progress-info">
                        <div class="progress-label">
                            <span class="gender-indicator male"></span>
                            <span>Laki-laki ({{ $totalKelahiranLaki }})</span>
                        </div>
                        <span class="progress-value">{{ $persentaseKelahiranLaki }}%</span>
                    </div>
                    <div class="progress-bar">
                        <div class="progress-fill"
                            style="width: {{ $persentaseKelahiranLaki }}%; background: linear-gradient(90deg, #667eea, #764ba2);">
                        </div>
                    </div>
                </div>
                <div class="progress-item">
                    <div class="progress-info">
                        <div class="progress-label">
                            <span class="gender-indicator female"></span>
                            <span>Perempuan ({{ $totalKelahiranPerempuan }})</span>
                        </div>
                        <span class="progress-value">{{ $persentaseKelahiranPerempuan }}%</span>
                    </div>
                    <div class="progress-bar">
                        <div class="progress-fill"
                            style="width: {{ $persentaseKelahiranPerempuan }}%; background: linear-gradient(90deg, #ef476f, #ff6b6b);">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Distribusi Usia Section -->
    <div class="charts-grid">
        <!-- Age Distribution -->
        <div class="chart-container">
            <div class="chart-header">
                <h3 class="chart-title">
                    <i class="fas fa-child"></i>
                    Distribusi Usia Penduduk
                </h3>
            </div>
            <div class="chart-wrapper">
                <canvas id="ageChart"></canvas>
            </div>

            <!-- Age Stats -->
            <div class="progress-stats">
                @if (isset($distribusiUsia) && count($distribusiUsia) > 0)
                    @foreach ($distribusiUsia as $usia)
                        <div class="progress-item">
                            <div class="progress-info">
                                <div class="progress-label">
                                    <span class="age-indicator" style="background: {{ explode(',', $usia['warna'])[0] }}"></span>
                                    <span>{{ $usia['range'] }} ({{ $usia['count'] }} orang)</span>
                                </div>
                                <span class="progress-value">{{ $usia['persentase'] }}%</span>
                            </div>
                            <div class="progress-bar">
                                <div class="progress-fill"
                                    style="width: {{ $usia['persentase'] }}%; background: linear-gradient(90deg, {{ $usia['warna'] }});">
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="progress-item">
                        <div class="progress-info">
                            <div class="progress-label">
                                <span class="age-indicator" style="background: #667eea"></span>
                                <span>Data belum tersedia</span>
                            </div>
                            <span class="progress-value">0%</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: 0%;"></div>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <!-- Statistik Orang Tua -->
        <div class="chart-container">
            <div class="chart-header">
                <h3 class="chart-title">
                    <i class="fas fa-user-friends"></i>
                    Statistik Orang Tua
                </h3>
            </div>

            <div class="stats-cards">
                <div class="mini-stat-card">
                    <div class="mini-stat-icon" style="background: linear-gradient(135deg, #667eea, #764ba2);">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="mini-stat-content">
                        <div class="mini-stat-value">{{ $statistikOrangTua['total'] ?? 0 }}</div>
                        <div class="mini-stat-label">Total Orang Tua</div>
                    </div>
                </div>

                <div class="mini-stat-card">
                    <div class="mini-stat-icon" style="background: linear-gradient(135deg, #667eea, #764ba2);">
                        <i class="fas fa-male"></i>
                    </div>
                    <div class="mini-stat-content">
                        <div class="mini-stat-value">{{ $statistikOrangTua['laki'] ?? 0 }}</div>
                        <div class="mini-stat-label">Laki-laki</div>
                    </div>
                </div>

                <div class="mini-stat-card">
                    <div class="mini-stat-icon" style="background: linear-gradient(135deg, #ef476f, #ff6b6b);">
                        <i class="fas fa-female"></i>
                    </div>
                    <div class="mini-stat-content">
                        <div class="mini-stat-value">{{ $statistikOrangTua['perempuan'] ?? 0 }}</div>
                        <div class="mini-stat-label">Perempuan</div>
                    </div>
                </div>

                <div class="mini-stat-card">
                    <div class="mini-stat-icon" style="background: linear-gradient(135deg, #4ecdc4, #44a08d);">
                        <i class="fas fa-baby"></i>
                    </div>
                    <div class="mini-stat-content">
                        <div class="mini-stat-value">{{ $statistikOrangTua['dengan_kelahiran'] ?? 0 }}</div>
                        <div class="mini-stat-label">Memiliki Kelahiran</div>
                    </div>
                </div>
            </div>

            <!-- Progress Stats -->
            <div class="progress-stats">
                <div class="progress-item">
                    <div class="progress-info">
                        <div class="progress-label">
                            <span class="gender-indicator male"></span>
                            <span>Laki-laki</span>
                        </div>
                        <span class="progress-value">{{ $statistikOrangTua['persentase_laki'] ?? 0 }}%</span>
                    </div>
                    <div class="progress-bar">
                        <div class="progress-fill" style="width: {{ $statistikOrangTua['persentase_laki'] ?? 0 }}%; background: linear-gradient(90deg, #667eea, #764ba2);"></div>
                    </div>
                </div>
                <div class="progress-item">
                    <div class="progress-info">
                        <div class="progress-label">
                            <span class="gender-indicator female"></span>
                            <span>Perempuan</span>
                        </div>
                        <span class="progress-value">{{ $statistikOrangTua['persentase_perempuan'] ?? 0 }}%</span>
                    </div>
                    <div class="progress-bar">
                        <div class="progress-fill" style="width: {{ $statistikOrangTua['persentase_perempuan'] ?? 0 }}%; background: linear-gradient(90deg, #ef476f, #ff6b6b);"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="content-grid">
        <div class="main-content">
            <h2 class="section-title">Statistik Kependudukan</h2>
            <p>Sistem kependudukan berjalan optimal dengan data real-time yang terintegrasi. Total penduduk
                terdaftar: <strong>{{ $totalPenduduk }} orang</strong>, dengan <strong>{{ $totalKelahiran }} data kelahiran</strong>
                dan <strong>{{ $totalOrangTua }} data orang tua</strong>.</p>
            <p>Monitoring menunjukkan distribusi penduduk berdasarkan wilayah dengan akurasi data mencapai
                99.8%. Sistem telah memproses <strong>{{ $totalDokumen }} dokumen</strong> pencatatan
                sipil dengan efisiensi tinggi.</p>

            <!-- Quick Actions -->
            <div class="quick-actions">
                <a href="{{ route('penduduk.index') }}" class="action-btn">
                    <div class="action-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="action-text">Data Penduduk</div>
                    <div class="action-badge">{{ $totalPenduduk }}</div>
                </a>
                <a href="{{ route('kelahiran.index') }}" class="action-btn">
                    <div class="action-icon">
                        <i class="fas fa-baby"></i>
                    </div>
                    <div class="action-text">Data Kelahiran</div>
                    <div class="action-badge">{{ $totalKelahiran }}</div>
                </a>
                <a href="{{ route('orangtua.index') }}" class="action-btn">
                    <div class="action-icon">
                        <i class="fas fa-user-friends"></i>
                    </div>
                    <div class="action-text">Data Orang Tua</div>
                    <div class="action-badge">{{ $totalOrangTua }}</div>
                </a>
                <a href="{{ route('kelahiran.create') }}" class="action-btn highlight">
                    <div class="action-icon">
                        <i class="fas fa-plus-circle"></i>
                    </div>
                    <div class="action-text">Tambah Data</div>
                </a>
            </div>
        </div>

        <div class="sidebar-right">
            <h2 class="section-title">Informasi Sistem</h2>

            <div class="info-cards">
                <div class="info-card">
                    <div class="info-icon">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <div class="info-content">
                        <div class="info-label">Hari & Tanggal</div>
                        <div class="info-value" id="currentDateTime">Loading...</div>
                    </div>
                </div>

                <div class="info-card">
                    <div class="info-icon">
                        <i class="fas fa-id-card"></i>
                    </div>
                    <div class="info-content">
                        <div class="info-label">ID Petugas</div>
                        <div class="info-value">ADM-{{ $userId ?? rand(1000, 9999) }}</div>
                    </div>
                </div>

                <div class="info-card">
                    <div class="info-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="info-content">
                        <div class="info-label">Wilayah Kerja</div>
                        <div class="info-value">{{ $wilayahKerja ?? 'Kota Jakarta Pusat' }}</div>
                    </div>
                </div>

                <div class="info-card">
                    <div class="info-icon">
                        <i class="fas fa-server"></i>
                    </div>
                    <div class="info-content">
                        <div class="info-label">Status Sistem</div>
                        <div class="info-value status-online">
                            <i class="fas fa-circle"></i> Online
                        </div>
                    </div>
                </div>

                <div class="info-card highlight">
                    <div class="info-icon">
                        <i class="fas fa-database"></i>
                    </div>
                    <div class="info-content">
                        <div class="info-label">Total Data</div>
                        <div class="info-value">
                            <div class="data-item">
                                <span class="data-label">Penduduk:</span>
                                <span class="data-count">{{ $totalPenduduk }}</span>
                            </div>
                            <div class="data-item">
                                <span class="data-label">Kelahiran:</span>
                                <span class="data-count">{{ $totalKelahiran }}</span>
                            </div>
                            <div class="data-item">
                                <span class="data-label">Orang Tua:</span>
                                <span class="data-count">{{ $totalOrangTua }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Alert Styles */
        .alert {
            background: rgba(39, 174, 96, 0.15);
            border: 1px solid rgba(39, 174, 96, 0.3);
            color: #2ecc71;
            padding: 20px;
            border-radius: 12px;
            margin-bottom: 25px;
            backdrop-filter: blur(15px);
            border-left: 4px solid #2ecc71;
            display: flex;
            align-items: center;
            gap: 12px;
            animation: slideIn 0.6s ease-out;
        }

        @keyframes slideIn {
            from {
                transform: translateY(-20px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        /* Statistics Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
            margin-bottom: 35px;
        }

        .stat-card {
            background: var(--card-bg);
            backdrop-filter: blur(20px);
            padding: 25px;
            border-radius: 16px;
            border: 1px solid var(--card-border);
            text-align: center;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            box-shadow: 0 8px 25px var(--shadow-color);
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, var(--accent-primary), var(--accent-secondary), var(--accent-tertiary));
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px var(--shadow-color);
        }

        .stat-icon {
            font-size: 36px;
            margin-bottom: 15px;
            background: linear-gradient(135deg, var(--accent-primary), var(--accent-secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            display: inline-block;
        }

        .stat-number {
            font-size: 42px;
            font-weight: 800;
            margin-bottom: 8px;
            background: linear-gradient(135deg, var(--accent-primary), var(--accent-secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .stat-label {
            color: var(--text-secondary);
            font-size: 14px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 10px;
        }

        .stat-trend {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            font-size: 12px;
            color: var(--text-muted);
            font-weight: 600;
        }

        /* Chart Styles */
        .charts-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 25px;
            margin-bottom: 25px;
        }

        .chart-container {
            background: var(--card-bg);
            backdrop-filter: blur(20px);
            padding: 25px;
            border-radius: 16px;
            border: 1px solid var(--card-border);
            box-shadow: 0 8px 25px var(--shadow-color);
            position: relative;
            transition: all 0.3s ease;
        }

        .chart-container:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 30px var(--shadow-color);
        }

        .chart-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .chart-title {
            font-size: 18px;
            font-weight: 700;
            background: linear-gradient(135deg, var(--accent-primary), var(--accent-secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .chart-actions {
            display: flex;
            gap: 8px;
        }

        .chart-btn {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid var(--card-border);
            padding: 6px 12px;
            border-radius: 8px;
            color: var(--text-secondary);
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .chart-btn.active, .chart-btn:hover {
            background: var(--accent-primary);
            color: white;
            border-color: var(--accent-primary);
        }

        .chart-wrapper {
            position: relative;
            height: 280px;
            width: 100%;
        }

        /* Donut Chart */
        .donut-container {
            display: flex;
            justify-content: center;
            margin: 20px 0;
        }

        .donut-chart {
            position: relative;
            width: 140px;
            height: 140px;
        }

        .donut-segment {
            position: absolute;
            width: 100%;
            height: 100%;
            border-radius: 50%;
            clip-path: polygon(50% 50%, 50% 0%, 100% 0%, 100% 100%, 0% 100%, 0% 0%);
        }

        .donut-center {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 70px;
            height: 70px;
            background: var(--card-bg);
            border-radius: 50%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            border: 2px solid var(--card-border);
        }

        .donut-percentage {
            font-weight: 800;
            font-size: 16px;
            background: linear-gradient(135deg, var(--accent-primary), var(--accent-secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .donut-label {
            font-size: 10px;
            color: var(--text-muted);
            font-weight: 600;
        }

        /* Progress Stats */
        .progress-stats {
            margin-top: 20px;
        }

        .progress-item {
            margin-bottom: 15px;
        }

        .progress-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 8px;
        }

        .progress-label {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            color: var(--text-secondary);
            font-weight: 600;
        }

        .progress-value {
            font-size: 13px;
            font-weight: 700;
            color: var(--text-primary);
        }

        .progress-bar {
            height: 6px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            overflow: hidden;
            position: relative;
        }

        .progress-fill {
            height: 100%;
            border-radius: 10px;
            position: relative;
            transition: width 1.5s ease-in-out;
        }

        .gender-indicator {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            display: inline-block;
        }

        .gender-indicator.male {
            background: linear-gradient(135deg, #667eea, #764ba2);
        }

        .gender-indicator.female {
            background: linear-gradient(135deg, #ef476f, #ff6b6b);
        }

        .age-indicator {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            display: inline-block;
        }

        /* Timeline */
        .timeline {
            margin-top: 15px;
        }

        .timeline-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 15px;
            padding: 15px;
            background: rgba(255, 255, 255, 0.03);
            border-radius: 12px;
            border-left: 3px solid var(--accent-primary);
            transition: all 0.3s ease;
        }

        .timeline-item:hover {
            background: rgba(102, 126, 234, 0.1);
            transform: translateX(5px);
        }

        .timeline-icon {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--accent-primary), var(--accent-secondary));
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            flex-shrink: 0;
        }

        .timeline-icon i {
            color: white;
            font-size: 12px;
        }

        .timeline-content {
            flex: 1;
        }

        .timeline-title {
            font-weight: 600;
            font-size: 13px;
            margin-bottom: 4px;
            color: var(--text-primary);
        }

        .timeline-time {
            font-size: 11px;
            color: var(--text-muted);
        }

        /* Mini Stats Cards */
        .stats-cards {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin-bottom: 20px;
        }

        .mini-stat-card {
            background: rgba(255, 255, 255, 0.05);
            padding: 15px;
            border-radius: 12px;
            border: 1px solid var(--card-border);
            display: flex;
            align-items: center;
            gap: 12px;
            transition: all 0.3s ease;
        }

        .mini-stat-card:hover {
            transform: translateY(-2px);
            background: rgba(255, 255, 255, 0.08);
        }

        .mini-stat-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 16px;
        }

        .mini-stat-content {
            flex: 1;
        }

        .mini-stat-value {
            font-size: 18px;
            font-weight: 800;
            color: var(--text-primary);
            margin-bottom: 2px;
        }

        .mini-stat-label {
            font-size: 11px;
            color: var(--text-muted);
            font-weight: 600;
        }

        /* Content Grid */
        .content-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 25px;
        }

        .main-content {
            background: var(--card-bg);
            backdrop-filter: blur(20px);
            padding: 30px;
            border-radius: 16px;
            border: 1px solid var(--card-border);
            box-shadow: 0 8px 25px var(--shadow-color);
            position: relative;
        }

        .main-content::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, var(--accent-primary), var(--accent-secondary), var(--accent-tertiary));
            border-radius: 16px 16px 0 0;
        }

        .sidebar-right {
            background: var(--card-bg);
            backdrop-filter: blur(20px);
            padding: 30px;
            border-radius: 16px;
            border: 1px solid var(--card-border);
            box-shadow: 0 8px 25px var(--shadow-color);
            position: relative;
        }

        .sidebar-right::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, var(--accent-tertiary), var(--accent-primary), var(--accent-secondary));
            border-radius: 16px 16px 0 0;
        }

        .section-title {
            font-size: 22px;
            margin-bottom: 20px;
            background: linear-gradient(135deg, var(--accent-primary), var(--accent-secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            border-bottom: 2px solid rgba(102, 126, 234, 0.3);
            padding-bottom: 12px;
            font-weight: 700;
        }

        .main-content p {
            color: var(--text-secondary);
            line-height: 1.7;
            font-size: 14px;
            margin-bottom: 15px;
        }

        /* Quick Actions */
        .quick-actions {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 15px;
            margin-top: 25px;
        }

        .action-btn {
            background: var(--card-bg);
            border: 1px solid var(--card-border);
            padding: 20px;
            border-radius: 12px;
            text-align: center;
            text-decoration: none;
            color: var(--text-primary);
            transition: all 0.3s ease;
            backdrop-filter: blur(15px);
            position: relative;
        }

        .action-btn:hover {
            background: rgba(102, 126, 234, 0.1);
            transform: translateY(-3px);
            border-color: var(--accent-primary);
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.2);
        }

        .action-btn.highlight {
            background: linear-gradient(135deg, var(--accent-primary), var(--accent-secondary));
            color: white;
            border-color: transparent;
        }

        .action-btn.highlight:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
        }

        .action-icon {
            font-size: 24px;
            margin-bottom: 10px;
            display: block;
        }

        .action-btn:not(.highlight) .action-icon {
            background: linear-gradient(135deg, var(--accent-primary), var(--accent-secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .action-text {
            font-weight: 600;
            font-size: 13px;
            margin-bottom: 5px;
        }

        .action-badge {
            background: var(--accent-primary);
            color: white;
            padding: 2px 8px;
            border-radius: 10px;
            font-size: 10px;
            font-weight: 700;
            position: absolute;
            top: 10px;
            right: 10px;
        }

        /* Info Cards */
        .info-cards {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .info-card {
            background: rgba(255, 255, 255, 0.05);
            padding: 20px;
            border-radius: 12px;
            border: 1px solid var(--card-border);
            display: flex;
            align-items: center;
            gap: 15px;
            transition: all 0.3s ease;
        }

        .info-card:hover {
            background: rgba(255, 255, 255, 0.08);
            transform: translateX(5px);
        }

        .info-card.highlight {
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.1), rgba(118, 75, 162, 0.1));
            border-color: rgba(102, 126, 234, 0.3);
        }

        .info-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            background: linear-gradient(135deg, var(--accent-primary), var(--accent-secondary));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 16px;
            flex-shrink: 0;
        }

        .info-card.highlight .info-icon {
            background: linear-gradient(135deg, var(--accent-tertiary), var(--accent-primary));
        }

        .info-content {
            flex: 1;
        }

        .info-label {
            color: var(--text-muted);
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .info-value {
            color: var(--text-primary);
            font-size: 14px;
            font-weight: 700;
        }

        .status-online {
            color: #4ecdc4;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .status-online i {
            font-size: 8px;
            animation: pulse 2s infinite;
        }

        .data-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 4px;
        }

        .data-item:last-child {
            margin-bottom: 0;
        }

        .data-label {
            color: var(--text-muted);
            font-size: 11px;
        }

        .data-count {
            color: var(--text-primary);
            font-size: 12px;
            font-weight: 700;
            background: var(--accent-primary);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Responsive Design */
        @media (max-width: 1200px) {
            .charts-grid {
                grid-template-columns: 1fr;
            }
            .content-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .stats-grid {
                grid-template-columns: 1fr 1fr;
            }
            .stats-cards {
                grid-template-columns: 1fr;
            }
            .quick-actions {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 480px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }
            .quick-actions {
                grid-template-columns: 1fr;
            }
        }
    </style>
@endsection

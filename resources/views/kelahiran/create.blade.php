<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Kelahiran - Neo System</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #667eea;
            --secondary-color: #764ba2;
            --success-color: #4ecdc4;
            --warning-color: #ffd166;
            --danger-color: #ef476f;
            --dark-color: #2d3748;
            --light-color: #f8fafc;
            --gradient-primary: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --gradient-secondary: linear-gradient(135deg, #764ba2 0%, #667eea 100%);
            --gradient-success: linear-gradient(135deg, #4ecdc4 0%, #44a08d 100%);
            --gradient-warning: linear-gradient(135deg, #ffd166 0%, #ff9e66 100%);
            --gradient-danger: linear-gradient(135deg, #ef476f 0%, #ff6b6b 100%);
            --gradient-dark: linear-gradient(135deg, #0f0f1b 0%, #1a1a2e 100%);
        }

        body {
            background: var(--gradient-dark);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: white;
            overflow-x: hidden;
            position: relative;
        }

        /* Animated Background */
        .bg-animation {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -2;
        }

        .floating-shape {
            position: absolute;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(102, 126, 234, 0.1) 0%, transparent 70%);
            animation: float 8s ease-in-out infinite;
        }

        .shape-1 { width: 200px; height: 200px; top: 10%; left: 5%; animation-delay: 0s; }
        .shape-2 { width: 150px; height: 150px; top: 60%; right: 10%; animation-delay: 2s; }
        .shape-3 { width: 100px; height: 100px; bottom: 20%; left: 20%; animation-delay: 4s; }
        .shape-4 { width: 180px; height: 180px; top: 30%; right: 15%; animation-delay: 6s; }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg) scale(1); }
            50% { transform: translateY(-25px) rotate(180deg) scale(1.1); }
        }

        /* Cyber Grid */
        .cyber-grid {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background:
                linear-gradient(90deg, rgba(102, 126, 234, 0.03) 1px, transparent 1px),
                linear-gradient(180deg, rgba(102, 126, 234, 0.03) 1px, transparent 1px);
            background-size: 50px 50px;
            animation: gridMove 20s linear infinite;
            z-index: -1;
        }

        @keyframes gridMove {
            0% { transform: translate(0, 0); }
            100% { transform: translate(50px, 50px); }
        }

        .form-container {
            max-width: 900px;
            margin: 40px auto;
            background: rgba(255, 255, 255, 0.07);
            backdrop-filter: blur(25px);
            border-radius: 30px;
            border: 1px solid rgba(102, 126, 234, 0.3);
            box-shadow:
                0 25px 50px rgba(0, 0, 0, 0.4),
                0 0 100px rgba(102, 126, 234, 0.2),
                inset 0 1px 0 rgba(255, 255, 255, 0.1);
            overflow: hidden;
            position: relative;
        }

        .form-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg,
                transparent,
                rgba(102, 126, 234, 0.15),
                transparent);
            transition: left 0.8s ease;
        }

        .form-container:hover::before {
            left: 100%;
        }

        .form-header {
            background: var(--gradient-warning);
            color: white;
            padding: 50px 40px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .form-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" fill="%23ffffff" opacity="0.1"><polygon points="1000,0 1000,100 0,100"></polygon></svg>');
            background-size: cover;
        }

        .form-title {
            font-size: 3rem;
            font-weight: 900;
            margin-bottom: 15px;
            background: linear-gradient(135deg, #ffffff, #e2e8f0, #cbd5e0);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            animation: titleGlow 3s ease-in-out infinite alternate;
            position: relative;
        }

        @keyframes titleGlow {
            from {
                text-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            }
            to {
                text-shadow: 0 12px 45px rgba(0, 0, 0, 0.5), 0 0 60px rgba(255, 255, 255, 0.2);
            }
        }

        .form-subtitle {
            font-size: 1.2rem;
            opacity: 0.9;
            font-weight: 300;
            position: relative;
            color: rgba(255, 255, 255, 0.9);
        }

        .user-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: var(--gradient-warning);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            box-shadow: 0 8px 25px rgba(255, 209, 102, 0.4);
            border: 3px solid rgba(255, 255, 255, 0.2);
        }

        .user-avatar i {
            font-size: 2rem;
            color: white;
        }

        .form-body {
            padding: 50px;
        }

        .form-section {
            margin-bottom: 50px;
            position: relative;
        }

        .section-title {
            font-size: 1.4rem;
            font-weight: 800;
            color: white;
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 2px solid rgba(102, 126, 234, 0.4);
            position: relative;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 100px;
            height: 3px;
            background: var(--gradient-warning);
            border-radius: 3px;
            animation: sectionLine 2s ease-in-out infinite alternate;
        }

        @keyframes sectionLine {
            from { width: 100px; }
            to { width: 150px; }
        }

        .section-title i {
            background: var(--gradient-warning);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-size: 1.3rem;
        }

        .form-label {
            font-weight: 700;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 1rem;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        }

        .form-label i {
            color: var(--warning-color);
            font-size: 1rem;
            width: 20px;
            text-align: center;
        }

        .form-control {
            border: 2px solid rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            padding: 16px 20px;
            font-size: 1rem;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            background: rgba(255, 255, 255, 0.08);
            color: white;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }

        .form-control:focus {
            border-color: var(--warning-color);
            box-shadow:
                0 0 0 4px rgba(255, 209, 102, 0.15),
                0 8px 30px rgba(255, 209, 102, 0.3);
            background: rgba(255, 255, 255, 0.12);
            transform: translateY(-3px);
            color: white;
        }

        .form-control:hover {
            border-color: rgba(255, 209, 102, 0.5);
            transform: translateY(-2px);
            box-shadow: 0 6px 25px rgba(0, 0, 0, 0.3);
        }

        .form-select {
            border: 2px solid rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            padding: 16px 20px;
            font-size: 1rem;
            transition: all 0.4s ease;
            background: rgba(255, 255, 255, 0.08);
            color: white;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            cursor: pointer;
        }

        .form-select:focus {
            border-color: var(--warning-color);
            box-shadow:
                0 0 0 4px rgba(255, 209, 102, 0.15),
                0 8px 30px rgba(255, 209, 102, 0.3);
            background: rgba(255, 255, 255, 0.12);
            transform: translateY(-3px);
        }

        .form-select option {
            background: #2d3748;
            color: white;
        }

        .btn-neo-warning {
            background: var(--gradient-warning);
            border: none;
            color: white;
            padding: 18px 40px;
            border-radius: 18px;
            font-weight: 800;
            font-size: 1.2rem;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow:
                0 12px 35px rgba(255, 209, 102, 0.5),
                0 0 60px rgba(255, 209, 102, 0.3);
            position: relative;
            overflow: hidden;
            letter-spacing: 0.5px;
        }

        .btn-neo-warning::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg,
                transparent,
                rgba(255, 255, 255, 0.4),
                transparent);
            transition: left 0.7s ease;
        }

        .btn-neo-warning:hover::before {
            left: 100%;
        }

        .btn-neo-warning:hover {
            transform: translateY(-6px) scale(1.05);
            box-shadow:
                0 20px 45px rgba(255, 209, 102, 0.7),
                0 0 80px rgba(255, 209, 102, 0.4);
        }

        .btn-neo-secondary {
            background: rgba(255, 255, 255, 0.1);
            border: 2px solid var(--warning-color);
            color: var(--warning-color);
            padding: 18px 40px;
            border-radius: 18px;
            font-weight: 800;
            font-size: 1.2rem;
            transition: all 0.4s ease;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(10px);
            letter-spacing: 0.5px;
        }

        .btn-neo-secondary:hover {
            background: var(--warning-color);
            color: white;
            transform: translateY(-4px);
            box-shadow: 0 12px 35px rgba(255, 209, 102, 0.5);
        }

        .form-actions {
            display: flex;
            gap: 20px;
            justify-content: center;
            margin-top: 50px;
            padding-top: 40px;
            border-top: 2px solid rgba(102, 126, 234, 0.2);
        }

        .input-group {
            position: relative;
        }

        .input-icon {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: rgba(255, 255, 255, 0.5);
            transition: all 0.3s ease;
            z-index: 5;
            font-size: 1.1rem;
        }

        .form-control:focus + .input-icon {
            color: var(--warning-color);
            transform: translateY(-50%) scale(1.2);
            text-shadow: 0 0 10px rgba(255, 209, 102, 0.5);
        }

        .required-field::after {
            content: ' *';
            color: var(--danger-color);
            font-weight: bold;
            text-shadow: 0 0 10px rgba(239, 71, 111, 0.5);
        }

        .form-note {
            background: linear-gradient(135deg, rgba(255, 249, 196, 0.2), rgba(255, 245, 157, 0.15));
            border-left: 4px solid #ffd600;
            padding: 20px 25px;
            border-radius: 15px;
            margin-bottom: 30px;
            font-size: 1rem;
            color: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
        }

        .form-note i {
            color: #ffd600;
            margin-right: 10px;
            font-size: 1.2rem;
        }

        /* Alert Styles */
        .alert {
            border-radius: 15px;
            border: none;
            padding: 20px 25px;
            margin-bottom: 30px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(10px);
            position: relative;
            overflow: hidden;
        }

        .alert-success {
            background: linear-gradient(135deg, rgba(78, 205, 196, 0.2), rgba(68, 160, 141, 0.15));
            border-left: 4px solid var(--success-color);
            color: rgba(255, 255, 255, 0.9);
        }

        .alert-danger {
            background: linear-gradient(135deg, rgba(239, 71, 111, 0.2), rgba(255, 107, 107, 0.15));
            border-left: 4px solid var(--danger-color);
            color: rgba(255, 255, 255, 0.9);
        }

        .alert ul {
            margin-bottom: 0;
        }

        .btn-close {
            filter: invert(1);
            opacity: 0.8;
        }

        .btn-close:hover {
            opacity: 1;
        }

        /* Validation States */
        .is-valid {
            border-color: var(--success-color) !important;
            box-shadow: 0 0 0 3px rgba(78, 205, 196, 0.2) !important;
        }

        .is-invalid {
            border-color: var(--danger-color) !important;
            box-shadow: 0 0 0 3px rgba(239, 71, 111, 0.2) !important;
        }

        .invalid-feedback {
            display: block;
            color: var(--danger-color);
            font-weight: 600;
            margin-top: 8px;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        }

        /* Particle Effects */
        .particles {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: -1;
        }

        .particle {
            position: absolute;
            width: 4px;
            height: 4px;
            background: rgba(255, 209, 102, 0.6);
            border-radius: 50%;
            animation: particleFloat 12s linear infinite;
        }

        @keyframes particleFloat {
            0% {
                transform: translateY(100vh) translateX(0) rotate(0deg);
                opacity: 0;
            }
            10% {
                opacity: 1;
            }
            90% {
                opacity: 1;
            }
            100% {
                transform: translateY(-100px) translateX(100px) rotate(360deg);
                opacity: 0;
            }
        }

        /* Loading animation for submit */
        .btn-loading {
            position: relative;
            color: transparent !important;
        }

        .btn-loading::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 24px;
            height: 24px;
            margin: -12px 0 0 -12px;
            border: 3px solid transparent;
            border-top: 3px solid white;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        @media (max-width: 768px) {
            .form-container {
                margin: 20px auto;
                border-radius: 25px;
            }

            .form-header {
                padding: 40px 25px;
            }

            .form-body {
                padding: 40px 25px;
            }

            .form-title {
                font-size: 2.2rem;
            }

            .form-actions {
                flex-direction: column;
                gap: 15px;
            }

            .btn-neo-warning,
            .btn-neo-secondary {
                width: 100%;
                text-align: center;
            }
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb {
            background: var(--gradient-warning);
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--gradient-primary);
        }
    </style>
</head>
<body>
    <!-- Animated Background -->
    <div class="bg-animation">
        <div class="floating-shape shape-1"></div>
        <div class="floating-shape shape-2"></div>
        <div class="floating-shape shape-3"></div>
        <div class="floating-shape shape-4"></div>
    </div>

    <!-- Cyber Grid -->
    <div class="cyber-grid"></div>

    <!-- Particles -->
    <div class="particles" id="particles"></div>

    <div class="form-container">
        <div class="form-header">
            <div class="user-avatar">
                <i class="fas fa-baby"></i>
            </div>
            <h1 class="form-title">Tambah Data Kelahiran</h1>
            <p class="form-subtitle">Isi form berikut untuk menambahkan data kelahiran baru ke sistem</p>
        </div>

        <div class="form-body">
            <!-- Flash Messages -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle me-2"></i>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-circle me-2"></i>
                    <strong>Terjadi kesalahan:</strong>
                    <ul class="mb-0 mt-2">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Form Note -->
            <div class="form-note">
                <i class="fas fa-info-circle"></i>
                <strong>Informasi Penting:</strong> Field yang ditandai dengan asterisk (*) wajib diisi. Pastikan data yang dimasukkan valid dan akurat.
            </div>

            <form action="{{ route('kelahiran.store') }}" method="POST" id="kelahiranForm">
                @csrf

                <!-- Data Bayi Section -->
                <div class="form-section">
                    <h3 class="section-title">
                        <i class="fas fa-baby"></i>Data Bayi
                    </h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-4">
                                <label for="nama_bayi" class="form-label required-field">
                                    <i class="fas fa-signature"></i>Nama Bayi
                                </label>
                                <div class="input-group">
                                    <input type="text" class="form-control @error('nama_bayi') is-invalid @enderror"
                                           id="nama_bayi" name="nama_bayi"
                                           value="{{ old('nama_bayi') }}"
                                           placeholder="Masukkan nama lengkap bayi" required>
                                    <i class="fas fa-baby input-icon"></i>
                                </div>
                                @error('nama_bayi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-4">
                                <label for="tanggal_lahir" class="form-label required-field">
                                    <i class="fas fa-calendar-alt"></i>Tanggal Lahir
                                </label>
                                <div class="input-group">
                                    <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                           id="tanggal_lahir" name="tanggal_lahir"
                                           value="{{ old('tanggal_lahir') }}" required>
                                    <i class="fas fa-birthday-cake input-icon"></i>
                                </div>
                                @error('tanggal_lahir')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-4">
                                <label for="jenis_kelamin" class="form-label required-field">
                                    <i class="fas fa-venus-mars"></i>Jenis Kelamin
                                </label>
                                <select class="form-select @error('jenis_kelamin') is-invalid @enderror"
                                        id="jenis_kelamin" name="jenis_kelamin" required>
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                                @error('jenis_kelamin')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-4">
                                <label for="orangtua_id" class="form-label required-field">
                                    <i class="fas fa-users"></i>Orang Tua
                                </label>
                                <select class="form-select @error('orangtua_id') is-invalid @enderror"
                                        id="orangtua_id" name="orangtua_id" required>
                                    <option value="">Pilih Orang Tua</option>
                                    @foreach($orangtua as $ortu)
                                        <option value="{{ $ortu->id }}" {{ old('orangtua_id') == $ortu->id ? 'selected' : '' }}>
                                            {{ $ortu->nama }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('orangtua_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Data Orang Tua Section -->
                <div class="form-section">
                    <h3 class="section-title">
                        <i class="fas fa-user-friends"></i>Data Orang Tua
                    </h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-4">
                                <label for="nama_ayah" class="form-label required-field">
                                    <i class="fas fa-user"></i>Nama Ayah
                                </label>
                                <div class="input-group">
                                    <input type="text" class="form-control @error('nama_ayah') is-invalid @enderror"
                                           id="nama_ayah" name="nama_ayah"
                                           value="{{ old('nama_ayah') }}"
                                           placeholder="Masukkan nama ayah" required>
                                    <i class="fas fa-male input-icon"></i>
                                </div>
                                @error('nama_ayah')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-4">
                                <label for="nama_ibu" class="form-label required-field">
                                    <i class="fas fa-user"></i>Nama Ibu
                                </label>
                                <div class="input-group">
                                    <input type="text" class="form-control @error('nama_ibu') is-invalid @enderror"
                                           id="nama_ibu" name="nama_ibu"
                                           value="{{ old('nama_ibu') }}"
                                           placeholder="Masukkan nama ibu" required>
                                    <i class="fas fa-female input-icon"></i>
                                </div>
                                @error('nama_ibu')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Informasi Tambahan Section -->
                <div class="form-section">
                    <h3 class="section-title">
                        <i class="fas fa-info-circle"></i>Informasi Tambahan
                    </h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-4">
                                <label for="tempat_lahir" class="form-label">
                                    <i class="fas fa-map-marker-alt"></i>Tempat Lahir
                                </label>
                                <div class="input-group">
                                    <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror"
                                           id="tempat_lahir" name="tempat_lahir"
                                           value="{{ old('tempat_lahir') }}"
                                           placeholder="Masukkan tempat lahir">
                                    <i class="fas fa-hospital input-icon"></i>
                                </div>
                                @error('tempat_lahir')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-4">
                                <label for="no_akte" class="form-label">
                                    <i class="fas fa-file-alt"></i>No Akte Kelahiran
                                </label>
                                <div class="input-group">
                                    <input type="text" class="form-control @error('no_akte') is-invalid @enderror"
                                           id="no_akte" name="no_akte"
                                           value="{{ old('no_akte') }}"
                                           placeholder="Masukkan nomor akte">
                                    <i class="fas fa-certificate input-icon"></i>
                                </div>
                                @error('no_akte')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-4">
                                <label for="berat_badan" class="form-label">
                                    <i class="fas fa-weight"></i>Berat Badan (kg)
                                </label>
                                <div class="input-group">
                                    <input type="number" step="0.01" class="form-control @error('berat_badan') is-invalid @enderror"
                                           id="berat_badan" name="berat_badan"
                                           value="{{ old('berat_badan') }}"
                                           placeholder="Contoh: 3.25">
                                    <i class="fas fa-weight input-icon"></i>
                                </div>
                                @error('berat_badan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-4">
                                <label for="panjang_badan" class="form-label">
                                    <i class="fas fa-ruler-vertical"></i>Panjang Badan (cm)
                                </label>
                                <div class="input-group">
                                    <input type="number" step="0.01" class="form-control @error('panjang_badan') is-invalid @enderror"
                                           id="panjang_badan" name="panjang_badan"
                                           value="{{ old('panjang_badan') }}"
                                           placeholder="Contoh: 48.5">
                                    <i class="fas fa-ruler input-icon"></i>
                                </div>
                                @error('panjang_badan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="alamat" class="form-label">
                            <i class="fas fa-home"></i>Alamat
                        </label>
                        <textarea class="form-control @error('alamat') is-invalid @enderror"
                                  id="alamat" name="alamat" rows="4"
                                  placeholder="Masukkan alamat lengkap">{{ old('alamat') }}</textarea>
                        @error('alamat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="form-actions">
                    <button type="submit" class="btn btn-neo-warning" id="submitBtn">
                        <i class="fas fa-save me-2"></i>Simpan Data
                    </button>
                    <a href="{{ route('kelahiran.index') }}" class="btn btn-neo-secondary">
                        <i class="fas fa-arrow-left me-2"></i>Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Create particles
        function createParticles() {
            const container = document.getElementById('particles');
            for (let i = 0; i < 50; i++) {
                const particle = document.createElement('div');
                particle.className = 'particle';
                particle.style.left = Math.random() * 100 + 'vw';
                particle.style.animationDelay = Math.random() * 12 + 's';
                particle.style.animationDuration = (Math.random() * 8 + 8) + 's';
                container.appendChild(particle);
            }
        }

        // Form validation and enhancement
        document.addEventListener('DOMContentLoaded', function() {
            createParticles();

            const form = document.getElementById('kelahiranForm');
            const submitBtn = document.getElementById('submitBtn');

            // Add loading state to submit button
            form.addEventListener('submit', function() {
                submitBtn.classList.add('btn-loading');
                submitBtn.disabled = true;
            });

            // Add real-time validation
            const inputs = form.querySelectorAll('input[required], select[required]');
            inputs.forEach(input => {
                input.addEventListener('blur', function() {
                    validateField(this);
                });

                input.addEventListener('input', function() {
                    if (this.value.trim() !== '') {
                        this.classList.remove('is-invalid');
                        this.classList.add('is-valid');
                    }
                });
            });

            function validateField(field) {
                if (field.value.trim() === '') {
                    field.classList.add('is-invalid');
                    field.classList.remove('is-valid');
                } else {
                    field.classList.remove('is-invalid');
                    field.classList.add('is-valid');
                }
            }

            // Add input animations
            const formControls = form.querySelectorAll('.form-control, .form-select');
            formControls.forEach(control => {
                control.addEventListener('focus', function() {
                    this.parentElement.style.transform = 'translateY(-3px)';
                });

                control.addEventListener('blur', function() {
                    this.parentElement.style.transform = 'translateY(0)';
                });
            });

            // Auto-dismiss alerts after 5 seconds
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                setTimeout(() => {
                    if (alert) {
                        const bsAlert = new bootstrap.Alert(alert);
                        bsAlert.close();
                    }
                }, 5000);
            });

            // Add staggered animation to form sections
            const formSections = document.querySelectorAll('.form-section');
            formSections.forEach((section, index) => {
                section.style.opacity = '0';
                section.style.transform = 'translateY(30px)';

                setTimeout(() => {
                    section.style.transition = 'all 0.6s cubic-bezier(0.4, 0, 0.2, 1)';
                    section.style.opacity = '1';
                    section.style.transform = 'translateY(0)';
                }, index * 200 + 300);
            });
        });

        // Add hover effects
        document.querySelectorAll('.form-control, .form-select').forEach(element => {
            element.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-2px)';
            });

            element.addEventListener('mouseleave', function() {
                if (document.activeElement !== this) {
                    this.style.transform = 'translateY(0)';
                }
            });
        });
    </script>
</body>
</html>

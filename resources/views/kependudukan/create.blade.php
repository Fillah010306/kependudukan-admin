<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Penduduk - Neo System</title>
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
            background: var(--gradient-primary);
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
            background: var(--gradient-primary);
            border-radius: 3px;
            animation: sectionLine 2s ease-in-out infinite alternate;
        }

        @keyframes sectionLine {
            from { width: 100px; }
            to { width: 150px; }
        }

        .section-title i {
            background: var(--gradient-primary);
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
            color: var(--primary-color);
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
            border-color: var(--primary-color);
            box-shadow: 
                0 0 0 4px rgba(102, 126, 234, 0.15),
                0 8px 30px rgba(102, 126, 234, 0.3);
            background: rgba(255, 255, 255, 0.12);
            transform: translateY(-3px);
            color: white;
        }

        .form-control:hover {
            border-color: rgba(102, 126, 234, 0.5);
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
            border-color: var(--primary-color);
            box-shadow: 
                0 0 0 4px rgba(102, 126, 234, 0.15),
                0 8px 30px rgba(102, 126, 234, 0.3);
            background: rgba(255, 255, 255, 0.12);
            transform: translateY(-3px);
        }

        .form-select option {
            background: #2d3748;
            color: white;
        }

        .btn-neo-primary {
            background: var(--gradient-primary);
            border: none;
            color: white;
            padding: 18px 40px;
            border-radius: 18px;
            font-weight: 800;
            font-size: 1.2rem;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 
                0 12px 35px rgba(102, 126, 234, 0.5),
                0 0 60px rgba(102, 126, 234, 0.3);
            position: relative;
            overflow: hidden;
            letter-spacing: 0.5px;
        }

        .btn-neo-primary::before {
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

        .btn-neo-primary:hover::before {
            left: 100%;
        }

        .btn-neo-primary:hover {
            transform: translateY(-6px) scale(1.05);
            box-shadow: 
                0 20px 45px rgba(102, 126, 234, 0.7),
                0 0 80px rgba(102, 126, 234, 0.4);
        }

        .btn-neo-secondary {
            background: rgba(255, 255, 255, 0.1);
            border: 2px solid var(--primary-color);
            color: var(--primary-color);
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
            background: var(--primary-color);
            color: white;
            transform: translateY(-4px);
            box-shadow: 0 12px 35px rgba(102, 126, 234, 0.5);
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
            color: var(--primary-color);
            transform: translateY(-50%) scale(1.2);
            text-shadow: 0 0 10px rgba(102, 126, 234, 0.5);
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
            background: rgba(102, 126, 234, 0.6);
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
            
            .btn-neo-primary,
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
            background: var(--gradient-primary);
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--gradient-secondary);
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
            <h1 class="form-title">Tambah Data Penduduk</h1>
            <p class="form-subtitle">Isi form berikut untuk menambahkan data penduduk baru ke sistem</p>
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

            <form action="{{ route('penduduk.store') }}" method="POST" id="pendudukForm">
                @csrf
                
                <!-- Data Pribadi Section -->
                <div class="form-section">
                    <h3 class="section-title">
                        <i class="fas fa-user"></i>Data Pribadi
                    </h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-4">
                                <label for="first_name" class="form-label required-field">
                                    <i class="fas fa-signature"></i>Nama Depan
                                </label>
                                <div class="input-group">
                                    <input type="text" class="form-control @error('first_name') is-invalid @enderror" 
                                           id="first_name" name="first_name" 
                                           value="{{ old('first_name', $penduduk->first_name ?? '') }}" 
                                           placeholder="Masukkan nama depan" required>
                                    <i class="fas fa-user input-icon"></i>
                                </div>
                                @error('first_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-4">
                                <label for="last_name" class="form-label required-field">
                                    <i class="fas fa-signature"></i>Nama Belakang
                                </label>
                                <div class="input-group">
                                    <input type="text" class="form-control @error('last_name') is-invalid @enderror" 
                                           id="last_name" name="last_name" 
                                           value="{{ old('last_name', $penduduk->last_name ?? '') }}" 
                                           placeholder="Masukkan nama belakang" required>
                                    <i class="fas fa-user input-icon"></i>
                                </div>
                                @error('last_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-4">
                                <label for="birthday" class="form-label required-field">
                                    <i class="fas fa-calendar-alt"></i>Tanggal Lahir
                                </label>
                                <div class="input-group">
                                    <input type="date" class="form-control @error('birthday') is-invalid @enderror" 
                                           id="birthday" name="birthday" 
                                           value="{{ old('birthday', $penduduk->birthday ?? '') }}" required>
                                    <i class="fas fa-birthday-cake input-icon"></i>
                                </div>
                                @error('birthday')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-4">
                                <label class="form-label required-field">
                                    <i class="fas fa-venus-mars"></i>Jenis Kelamin
                                </label>
                                <div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input @error('gender') is-invalid @enderror" 
                                               type="radio" name="gender" id="gender_L" value="L" 
                                               {{ (old('gender', $penduduk->gender ?? '') == 'L') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="gender_L">Laki-laki</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input @error('gender') is-invalid @enderror" 
                                               type="radio" name="gender" id="gender_P" value="P" 
                                               {{ (old('gender', $penduduk->gender ?? '') == 'P') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="gender_P">Perempuan</label>
                                    </div>
                                </div>
                                @error('gender')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Kontak Section -->
              <div class="form-section">
    <h3 class="section-title">
        <i class="fas fa-address-book"></i>Informasi Identitas
    </h3>
    <div class="row">
        <div class="col-md-6">
            <div class="mb-4">
                <label for="nik" class="form-label">
                    <i class="fas fa-id-card"></i>Nomor Induk Kependudukan (NIK)
                </label>
                <div class="input-group">
                    <input type="text" class="form-control @error('nik') is-invalid @enderror" 
                           id="nik" name="nik" 
                           value="{{ old('nik', $penduduk->nik ?? '') }}"
                           placeholder="Masukkan 16 digit NIK">
                    <i class="fas fa-fingerprint input-icon"></i>
                </div>
                @error('nik')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-4">
                <label for="phone" class="form-label">
                    <i class="fas fa-phone"></i>Nomor Telepon
                </label>
                <div class="input-group">
                    <input type="text" class="form-control @error('phone') is-invalid @enderror" 
                           id="phone" name="phone" 
                           value="{{ old('phone', $penduduk->phone ?? '') }}"
                           placeholder="Contoh: 081234567890">
                    <i class="fas fa-mobile-alt input-icon"></i>
                </div>
                @error('phone')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
</div>


                <!-- Form Actions -->
                <div class="form-actions">
                    <button type="submit" class="btn btn-neo-primary" id="submitBtn">
                        <i class="fas fa-save me-2"></i>Simpan Data
                    </button>
                    <a href="{{ route('penduduk.index') }}" class="btn btn-neo-secondary">
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

            const form = document.getElementById('pendudukForm');
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

            // Auto-format phone number
            const phoneInput = document.getElementById('phone');
            if (phoneInput) {
                phoneInput.addEventListener('input', function(e) {
                    let value = e.target.value.replace(/\D/g, '');
                    if (value.length > 0) {
                        value = value.substring(0, 13);
                        if (value.length > 4) {
                            value = value.replace(/(\d{4})(\d{4})?(\d{0,4})?/, '$1-$2-$3');
                        }
                    }
                    e.target.value = value;
                });
            }

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
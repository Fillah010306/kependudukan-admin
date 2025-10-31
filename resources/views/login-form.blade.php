<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login admin kependudukan</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        /* (Styles tetap sama seperti sebelumnya) */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', 'Segoe UI', sans-serif;
        }

        body {
            background: linear-gradient(135deg, rgba(15, 15, 27, 0.7) 0%, rgba(26, 26, 46, 0.7) 50%, rgba(22, 33, 62, 0.7) 100%),
                        url('https://unair.ac.id/wp-content/uploads/2021/01/penduduk.jpg') center/cover no-repeat;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
            overflow: hidden;
        }

        .cyber-grid {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background:
                linear-gradient(90deg, rgba(102, 126, 234, 0.08) 1px, transparent 1px),
                linear-gradient(180deg, rgba(102, 126, 234, 0.08) 1px, transparent 1px);
            background-size: 40px 40px;
            animation: gridMove 25s linear infinite;
            z-index: 0;
        }

        @keyframes gridMove {
            0% { transform: translate(0, 0); }
            100% { transform: translate(40px, 40px); }
        }

        .particle {
            position: absolute;
            background: rgba(102, 126, 234, 0.2);
            border-radius: 50%;
            animation: floatParticle 18s linear infinite;
        }

        @keyframes floatParticle {
            0%, 100% {
                transform: translate(0, 0) scale(0);
                opacity: 0;
            }
            50% {
                transform: translate(80px, -40px) scale(1);
                opacity: 0.6;
            }
        }

        .login-container {
            background: rgba(15, 23, 42, 0.85);
            backdrop-filter: blur(15px);
            border-radius: 20px;
            border: 1px solid rgba(102, 126, 234, 0.3);
            padding: 45px 40px;
            width: 100%;
            max-width: 420px;
            position: relative;
            z-index: 1;
            box-shadow:
                0 20px 40px rgba(0, 0, 0, 0.4),
                0 8px 32px rgba(102, 126, 234, 0.2),
                inset 0 1px 0 rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }

        .login-container:hover {
            transform: translateY(-5px);
            box-shadow:
                0 25px 50px rgba(0, 0, 0, 0.5),
                0 12px 40px rgba(102, 126, 234, 0.3),
                inset 0 1px 0 rgba(255, 255, 255, 0.1);
        }

        .login-container::before {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            background: linear-gradient(45deg, #667eea, #764ba2, #4ecdc4, #667eea);
            border-radius: 22px;
            z-index: -1;
            opacity: 0;
            transition: opacity 0.4s ease;
        }

        .login-container:hover::before {
            opacity: 0.4;
        }

        .logo {
            text-align: center;
            margin-bottom: 40px;
        }

        .logo-icon {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            box-shadow: 0 12px 25px rgba(102, 126, 234, 0.4);
            position: relative;
            overflow: hidden;
        }

        .logo-icon::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent, rgba(255,255,255,0.1), transparent);
            transform: rotate(45deg);
            animation: shine 3s infinite;
        }

        @keyframes shine {
            0% { transform: translateX(-100%) translateY(-100%) rotate(45deg); }
            100% { transform: translateX(100%) translateY(100%) rotate(45deg); }
        }

        .logo-icon i {
            font-size: 28px;
            color: white;
            z-index: 1;
        }

        .logo h1 {
            color: white;
            font-size: 26px;
            font-weight: 700;
            margin-bottom: 8px;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        }

        .logo p {
            color: rgba(255, 255, 255, 0.7);
            font-size: 14px;
            font-weight: 400;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .input-field {
            position: relative;
        }

        .input-field input {
            width: 100%;
            padding: 16px 20px 16px 50px;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 12px;
            color: white;
            font-size: 15px;
            transition: all 0.3s ease;
            outline: none;
        }

        .input-field input::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }

        .input-field input:focus {
            border-color: rgba(102, 126, 234, 0.8);
            background: rgba(255, 255, 255, 0.15);
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.15);
            transform: translateY(-2px);
        }

        .input-field i {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: rgba(255, 255, 255, 0.6);
            font-size: 18px;
            transition: all 0.3s ease;
        }

        .input-field input:focus + i {
            color: #667eea;
            transform: translateY(-50%) scale(1.1);
        }

        .btn-login {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            letter-spacing: 0.5px;
        }

        .btn-login:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 25px rgba(102, 126, 234, 0.5);
        }

        .btn-login:active {
            transform: translateY(-1px);
        }

        .btn-login::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent, rgba(255,255,255,0.1), transparent);
            transform: rotate(45deg);
            transition: all 0.3s ease;
        }

        .btn-login:hover::after {
            transform: translateX(100%) translateY(100%) rotate(45deg);
        }

        .alert {
            padding: 14px 18px;
            border-radius: 10px;
            margin-bottom: 25px;
            font-size: 14px;
            font-weight: 500;
            text-align: center;
            animation: slideIn 0.4s ease;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-15px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .alert-error {
            background: rgba(231, 76, 60, 0.25);
            color: #ff6b6b;
            border: 1px solid rgba(231, 76, 60, 0.4);
        }

        .alert-success {
            background: rgba(46, 204, 113, 0.25);
            color: #2ecc71;
            border: 1px solid rgba(46, 204, 113, 0.4);
        }

        .requirements {
            margin-top: 30px;
            padding: 20px;
            background: rgba(255, 255, 255, 0.08);
            border-radius: 12px;
            border-left: 4px solid #667eea;
            backdrop-filter: blur(10px);
        }

        .requirements h4 {
            color: white;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .requirements ul {
            list-style: none;
        }

        .requirements li {
            color: rgba(255, 255, 255, 0.7);
            font-size: 12px;
            margin-bottom: 6px;
            padding-left: 20px;
            position: relative;
            line-height: 1.4;
        }

        .requirements li:before {
            content: "›";
            color: #667eea;
            position: absolute;
            left: 0;
            font-weight: bold;
            font-size: 16px;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            color: rgba(255, 255, 255, 0.5);
            font-size: 12px;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .scan-line {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, transparent, #667eea, #764ba2, transparent);
            animation: scan 3.5s linear infinite;
            opacity: 0;
        }

        @keyframes scan {
            0% {
                top: 0;
                opacity: 0;
            }
            50% {
                opacity: 1;
            }
            100% {
                top: 100%;
                opacity: 0;
            }
        }

        .login-container:hover .scan-line {
            animation: scan 2.5s linear infinite;
        }

        .loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(15, 23, 42, 0.95);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 1000;
            flex-direction: column;
            color: white;
        }

        .loading-spinner {
            width: 50px;
            height: 50px;
            border: 4px solid rgba(102, 126, 234, 0.3);
            border-top: 4px solid #667eea;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin-bottom: 20px;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .register-link {
            text-align: center;
            margin-top: 20px;
            color: rgba(255, 255, 255, 0.7);
            font-size: 14px;
        }

        .register-link a {
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .register-link a:hover {
            color: #764ba2;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <!-- Cyber Grid Background -->
    <div class="cyber-grid"></div>

    <!-- Floating Particles -->
    <div id="particles"></div>

    <!-- Loading Overlay -->
    <div class="loading-overlay" id="loadingOverlay">
        <div class="loading-spinner"></div>
        <p>Mengarahkan ke Dashboard...</p>
    </div>

    <!-- Compact Login Container -->
    <div class="login-container">
        <div class="scan-line"></div>

        <div class="logo">
            <div class="logo-icon">
                <i class="fas fa-user-tie"></i>
            </div>
            <h3>Login</h3>
            <p>Kependudukan Admin</p>
        </div>

        @if(session('error'))
            <div class="alert alert-error">
                <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
            </div>
        @endif

        @if(session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="/auth/login" id="loginForm">
            @csrf
            <div class="form-group">
                <div class="input-field">
                    <input type="email" name="email" placeholder="Enter your email" required value="{{ old('email') }}">
                    <i class="fas fa-envelope"></i>
                </div>
            </div>

            <div class="form-group">
                <div class="input-field">
                    <input type="password" name="password" placeholder="Enter your password" required>
                    <i class="fas fa-lock"></i>
                </div>
            </div>

            <button type="submit" class="btn-login">
                <i class="fas fa-sign-in-alt"></i> ACCESS SYSTEM
            </button>
        </form>

        <div class="register-link">
            Belum punya akun? <a href="/register">Daftar di sini</a>
        </div>

        <div class="requirements">
            <h4><i class="fas fa-shield-alt"></i> AUTHENTICATION RULES</h4>
            <ul>
                <li>Gunakan email yang valid untuk login</li>
                <li>Password: minimal 6 karakter</li>
                <li>Pastikan email sudah terdaftar</li>
                <li>Harus cocok yaa</li>
            </ul>
        </div>

        <div class="footer">
            <i class="fas fa-code"></i>
        </div>
    </div>

    <script>
        // Create floating particles
        function createParticles() {
            const container = document.getElementById('particles');
            for (let i = 0; i < 12; i++) {
                const particle = document.createElement('div');
                particle.className = 'particle';
                particle.style.width = Math.random() * 6 + 2 + 'px';
                particle.style.height = particle.style.width;
                particle.style.left = Math.random() * 100 + 'vw';
                particle.style.top = Math.random() * 100 + 'vh';
                particle.style.animationDelay = Math.random() * 18 + 's';
                container.appendChild(particle);
            }
        }

        // Input focus effects
        const inputs = document.querySelectorAll('input');
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.style.transform = 'scale(1.02)';
            });

            input.addEventListener('blur', function() {
                this.parentElement.style.transform = 'scale(1)';
            });
        });

        // Form submission handler
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            const loadingOverlay = document.getElementById('loadingOverlay');
            loadingOverlay.style.display = 'flex';
        });

        // Initialize
        createParticles();
    </script>
</body>
</html>

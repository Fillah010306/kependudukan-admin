<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Allhamdulillah sudah login</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', 'Segoe UI', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #0f0f1b 0%, #1a1a2e 50%, #16213e 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
            overflow: hidden;
        }

        /* Cyber Grid Background */
        .cyber-grid {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                linear-gradient(90deg, rgba(102, 126, 234, 0.1) 1px, transparent 1px),
                linear-gradient(180deg, rgba(102, 126, 234, 0.1) 1px, transparent 1px);
            background-size: 40px 40px;
            animation: gridMove 30s linear infinite;
            z-index: 0;
        }

        @keyframes gridMove {
            0% { transform: translate(0, 0); }
            100% { transform: translate(40px, 40px); }
        }

        /* Floating Orbs */
        .orb {
            position: absolute;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(102, 126, 234, 0.3), transparent);
            animation: orbFloat 20s linear infinite;
            filter: blur(10px);
        }

        @keyframes orbFloat {
            0%, 100% { 
                transform: translate(0, 0) scale(0.8);
                opacity: 0.3;
            }
            50% { 
                transform: translate(100px, -80px) scale(1.2);
                opacity: 0.6;
            }
        }

        /* Main Container */
        .success-container {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(25px);
            border-radius: 20px;
            border: 1px solid rgba(102, 126, 234, 0.2);
            padding: 50px 40px;
            width: 100%;
            max-width: 480px;
            position: relative;
            z-index: 1;
            box-shadow: 
                0 10px 40px rgba(0, 0, 0, 0.4),
                inset 0 1px 0 rgba(255, 255, 255, 0.1);
            text-align: center;
        }

        /* Neon Border Effect */
        .success-container::before {
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
            animation: neonPulse 3s ease-in-out infinite;
        }

        @keyframes neonPulse {
            0%, 100% { 
                opacity: 0.1;
                filter: blur(5px);
            }
            50% { 
                opacity: 0.3;
                filter: blur(8px);
            }
        }

        /* Success Icon */
        .success-icon {
            width: 100px;
            height: 100px;
            background: linear-gradient(135deg, #27ae60, #2ecc71);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px;
            box-shadow: 
                0 10px 30px rgba(39, 174, 96, 0.4),
                inset 0 -5px 15px rgba(0, 0, 0, 0.2);
            position: relative;
            animation: iconGlow 2s ease-in-out infinite alternate;
        }

        @keyframes iconGlow {
            0% {
                box-shadow: 
                    0 10px 30px rgba(39, 174, 96, 0.4),
                    inset 0 -5px 15px rgba(0, 0, 0, 0.2);
            }
            100% {
                box-shadow: 
                    0 15px 40px rgba(39, 174, 96, 0.6),
                    inset 0 -5px 15px rgba(0, 0, 0, 0.1);
            }
        }

        .success-icon i {
            font-size: 40px;
            color: white;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        }

        .success-icon::after {
            content: '';
            position: absolute;
            width: 120px;
            height: 120px;
            border: 2px solid #27ae60;
            border-radius: 50%;
            animation: ripple 2s ease-out infinite;
        }

        @keyframes ripple {
            0% {
                transform: scale(0.8);
                opacity: 1;
            }
            100% {
                transform: scale(1.3);
                opacity: 0;
            }
        }

        /* Text Content */
        .success-title {
            color: white;
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 10px;
            background: linear-gradient(135deg, #27ae60, #2ecc71);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .success-subtitle {
            color: rgba(255, 255, 255, 0.7);
            font-size: 14px;
            margin-bottom: 30px;
            line-height: 1.5;
        }

        /* User Info Card */
        .user-card {
            background: rgba(255, 255, 255, 0.08);
            border-radius: 15px;
            padding: 25px;
            margin: 25px 0;
            border: 1px solid rgba(102, 126, 234, 0.2);
            position: relative;
            overflow: hidden;
        }

        .user-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background: linear-gradient(90deg, #667eea, #764ba2);
        }

        .user-avatar {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            font-weight: 600;
            font-size: 20px;
            color: white;
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }

        .username {
            color: white;
            font-size: 22px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .user-role {
            color: rgba(255, 255, 255, 0.6);
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Stats Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
            margin: 25px 0;
        }

        .stat-item {
            background: rgba(255, 255, 255, 0.06);
            padding: 15px;
            border-radius: 12px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }

        .stat-item:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: translateY(-3px);
        }

        .stat-icon {
            font-size: 18px;
            margin-bottom: 8px;
            color: #667eea;
        }

        .stat-label {
            color: rgba(255, 255, 255, 0.6);
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 5px;
        }

        .stat-value {
            color: white;
            font-size: 16px;
            font-weight: 600;
        }

        /* Action Buttons */
        .action-buttons {
            display: flex;
            flex-direction: column;
            gap: 12px;
            margin-top: 30px;
        }

        .btn {
            padding: 14px;
            border: none;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
        }

        .btn-secondary {
            background: rgba(255, 255, 255, 0.1);
            color: rgba(255, 255, 255, 0.8);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
        }

        .btn i {
            margin-right: 8px;
        }

        /* Footer */
        .footer {
            margin-top: 25px;
            color: rgba(255, 255, 255, 0.4);
            font-size: 11px;
        }

        /* Scan Animation */
        .scan-line {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, transparent, #27ae60, transparent);
            animation: scan 4s linear infinite;
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

        .success-container:hover .scan-line {
            animation: scan 3s linear infinite;
        }

        /* Binary Rain Effect */
        .binary-rain {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 0;
        }

        .binary-digit {
            position: absolute;
            color: rgba(102, 126, 234, 0.3);
            font-size: 12px;
            font-family: 'Courier New', monospace;
            animation: binaryFall 10s linear infinite;
        }

        @keyframes binaryFall {
            0% {
                transform: translateY(-100px);
                opacity: 0;
            }
            50% {
                opacity: 1;
            }
            100% {
                transform: translateY(100vh);
                opacity: 0;
            }
        }
    </style>
</head>
<body>
    <!-- Cyber Grid Background -->
    <div class="cyber-grid"></div>

    <!-- Floating Orbs -->
    <div id="orbs"></div>

    <!-- Binary Rain -->
    <div class="binary-rain" id="binaryRain"></div>

    <!-- Success Container -->
    <div class="success-container">
        <div class="scan-line"></div>
        
        <div class="success-icon">
            <i class="fas fa-check"></i>
        </div>

        <h1 class="success-title">ACCESS GRANTED</h1>
        <p class="success-subtitle">Authentication successful. Welcome to the system.</p>

        <div class="user-card">
            <div class="user-avatar">
                <i class="fas fa-user"></i>
            </div>
            <div class="username">{{ $username ?? 'Guest' }}</div>
            <div class="user-role">Verified User</div>
        </div>

        <div class="stats-grid">
            <div class="stat-item">
                <div class="stat-icon"><i class="fas fa-calendar"></i></div>
                <div class="stat-label">Login Date</div>
                <div class="stat-value">{{ now()->format('d/m/Y') }}</div>
            </div>
            <div class="stat-item">
                <div class="stat-icon"><i class="fas fa-clock"></i></div>
                <div class="stat-label">Login Time</div>
                <div class="stat-value">{{ now()->format('H:i:s') }}</div>
            </div>
        </div>

        <div class="action-buttons">
            <!-- Dashboard button now on top -->
            <a href="{{ route('dashboard') }}" class="btn btn-primary">
                <i class="fas fa-rocket"></i> Dashboard
            </a>
            
            <!-- Logout button below Dashboard -->
            <a href="/auth" class="btn btn-secondary">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </div>

        <div class="footer">
            <i class="fas fa-terminal"></i> admin login 
        </div>
    </div>

    <script>
        // Create floating orbs
        function createOrbs() {
            const container = document.getElementById('orbs');
            for (let i = 0; i < 8; i++) {
                const orb = document.createElement('div');
                orb.className = 'orb';
                orb.style.width = Math.random() * 200 + 50 + 'px';
                orb.style.height = orb.style.width;
                orb.style.left = Math.random() * 100 + 'vw';
                orb.style.top = Math.random() * 100 + 'vh';
                orb.style.animationDelay = Math.random() * 20 + 's';
                container.appendChild(orb);
            }
        }

        // Create binary rain
        function createBinaryRain() {
            const container = document.getElementById('binaryRain');
            const binaryChars = ['0', '1'];
            
            for (let i = 0; i < 30; i++) {
                const digit = document.createElement('div');
                digit.className = 'binary-digit';
                digit.textContent = binaryChars[Math.floor(Math.random() * binaryChars.length)];
                digit.style.left = Math.random() * 100 + 'vw';
                digit.style.animationDelay = Math.random() * 10 + 's';
                digit.style.animationDuration = (Math.random() * 10 + 5) + 's';
                container.appendChild(digit);
            }
        }

        // Add hover effects to stat items
        document.querySelectorAll('.stat-item').forEach(item => {
            item.addEventListener('mouseenter', function() {
                this.style.borderColor = 'rgba(102, 126, 234, 0.4)';
            });
            
            item.addEventListener('mouseleave', function() {
                this.style.borderColor = 'rgba(255, 255, 255, 0.1)';
            });
        });

        // Initialize effects
        createOrbs();
        createBinaryRain();

        // Add confetti effect on load
        setTimeout(() => {
            createConfetti();
        }, 500);

        function createConfetti() {
            const colors = ['#667eea', '#764ba2', '#27ae60', '#4ecdc4', '#feca57'];
            for (let i = 0; i < 50; i++) {
                setTimeout(() => {
                    const confetti = document.createElement('div');
                    confetti.style.cssText = `
                        position: fixed;
                        width: 8px;
                        height: 8px;
                        background: ${colors[Math.floor(Math.random() * colors.length)]};
                        border-radius: 1px;
                        top: -10px;
                        left: ${Math.random() * 100}vw;
                        animation: confettiFall 2s ease-out forwards;
                        z-index: 1000;
                    `;
                    
                    const style = document.createElement('style');
                    style.textContent = `
                        @keyframes confettiFall {
                            0% {
                                transform: translateY(0) rotate(0deg);
                                opacity: 1;
                            }
                            100% {
                                transform: translateY(100vh) rotate(360deg);
                                opacity: 0;
                            }
                        }
                    `;
                    document.head.appendChild(style);
                    document.body.appendChild(confetti);
                    
                    setTimeout(() => confetti.remove(), 2000);
                }, i * 30);
            }
        }
    </script>
</body>
</html>
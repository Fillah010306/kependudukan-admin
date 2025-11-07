<!-- Header -->
<div class="header">
    <div class="header-content">
        <div class="header-text">
            <p class="welcome">Selamat Datang di Sistem Kependudukan</p>
            <h1>Dashboard Administrator</h1>
        </div>

        <div class="header-actions">
            <!-- Ghost Toggle Switch -->
            <div class="theme-toggle">
                <input type="checkbox" id="theme-toggle" class="toggle-input">
                <label for="theme-toggle" class="toggle-label"></label>
            </div>
            <a href="{{ route('penduduk.index') }}" class="nav-btn">
                <i class="fas fa-users"></i> Kelola Data
            </a>
            <a href="/" class="logout-btn" onclick="return confirm('Yakin ingin logout?')">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </div>
    </div>
</div>

<style>
    /* Header Styles */
    .header {
        background: rgba(255, 255, 255, 0.08);
        backdrop-filter: blur(20px);
        border-radius: 20px;
        border: 1px solid var(--card-border);
        box-shadow: 0 10px 30px var(--shadow-color);
        margin-bottom: 30px;
        position: relative;
        overflow: hidden;
    }

    .header::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(102, 126, 234, 0.1), transparent);
        transition: left 0.6s ease;
    }

    .header:hover::before {
        left: 100%;
    }

    .header-content {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 25px 30px;
        position: relative;
        z-index: 1;
    }

    .header-text {
        flex: 1;
    }

    .welcome {
        color: var(--text-secondary);
        font-size: 14px;
        margin-bottom: 8px;
        font-weight: 500;
    }

    .header h1 {
        background: linear-gradient(135deg, var(--accent-primary), var(--accent-secondary));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        font-size: 32px;
        font-weight: 700;
        margin: 0;
    }

    .header-actions {
        display: flex;
        gap: 15px;
        align-items: center;
    }

    .nav-btn {
        background: linear-gradient(135deg, var(--accent-primary), var(--accent-secondary));
        color: white;
        border: none;
        padding: 12px 24px;
        border-radius: 10px;
        cursor: pointer;
        font-weight: 600;
        font-size: 14px;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
    }

    .nav-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
    }

    /* Logout Button */
    .logout-btn {
        background: linear-gradient(135deg, #ef476f, #ff6b6b);
        color: white;
        border: none;
        padding: 12px 24px;
        border-radius: 10px;
        cursor: pointer;
        font-weight: 600;
        font-size: 14px;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        box-shadow: 0 4px 15px rgba(239, 71, 111, 0.3);
    }

    .logout-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(239, 71, 111, 0.4);
    }

    /* Ghost Toggle Switch */
    .theme-toggle {
        position: relative;
        width: 60px;
        height: 30px;
    }

    .toggle-input {
        display: none;
    }

    .toggle-label {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 0.1);
        border: 2px solid var(--card-border);
        border-radius: 25px;
        cursor: pointer;
        transition: all 0.3s ease;
        backdrop-filter: blur(10px);
    }

    .toggle-label::before {
        content: '';
        position: absolute;
        top: 2px;
        left: 2px;
        width: 22px;
        height: 22px;
        background: linear-gradient(135deg, var(--accent-primary), var(--accent-secondary));
        border-radius: 50%;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 12px;
    }

    .toggle-input:checked + .toggle-label::before {
        transform: translateX(30px);
        background: linear-gradient(135deg, #f59e0b, #d97706);
        content: '☀️';
    }

    .toggle-input:not(:checked) + .toggle-label::before {
        content: '🌙';
    }
</style>

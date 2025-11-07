<div class="sidebar">
    <div class="sidebar-content">
        <div class="sidebar-header">
            <div class="logo">
                <div class="logo-icon">
                    <i class="fas fa-users"></i>
                </div>
                <div class="logo-text">
                    <div class="sidebar-title">Sistem Kependudukan</div>
                    <div class="sidebar-subtitle">Administrator Panel</div>
                </div>
            </div>
        </div>

        <ul class="sidebar-menu">
            <li class="sidebar-item">
                <a href="/dashboard" class="sidebar-link active">
                    <div class="sidebar-icon">
                        <i class="fas fa-tachometer-alt"></i>
                    </div>
                    <div class="sidebar-text">Dashboard</div>
                </a>
            </li>

            <li class="sidebar-item">
                <a href="{{ route('penduduk.index') }}" class="sidebar-link">
                    <div class="sidebar-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="sidebar-text">Data Penduduk</div>
                </a>
            </li>

            <li class="sidebar-item">
                <a href="{{ route('kelahiran.index') }}" class="sidebar-link">
                    <div class="sidebar-icon">
                        <i class="fas fa-baby"></i>
                    </div>
                    <div class="sidebar-text">Data Kelahiran</div>
                </a>
            </li>

            <li class="sidebar-item">
                <a href="{{ route('orangtua.index') }}" class="sidebar-link">
                    <div class="sidebar-icon">
                        <i class="fas fa-user-friends"></i>
                    </div>
                    <div class="sidebar-text">Data Orang Tua</div>
                </a>
            </li>

            <li class="sidebar-item">
                <a href="#" class="sidebar-link">
                    <div class="sidebar-icon">
                        <i class="fas fa-chart-bar"></i>
                    </div>
                    <div class="sidebar-text">Laporan</div>
                </a>
            </li>

            <li class="sidebar-item">
                <a href="#" class="sidebar-link">
                    <div class="sidebar-icon">
                        <i class="fas fa-cog"></i>
                    </div>
                    <div class="sidebar-text">Pengaturan</div>
                </a>
            </li>
        </ul>

        <div class="sidebar-footer">
            <div class="user-profile">
                <div class="user-avatar">
                    <i class="fas fa-user-circle"></i>
                </div>
                <div class="user-info">
                    <div class="user-name">{{ Auth::user()->name ?? 'Administrator' }}</div>
                    <div class="user-role">{{ Auth::user()->role ?? 'Admin' }}</div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Sidebar Styles */
    .sidebar {
        width: 280px;
        background: linear-gradient(180deg, var(--bg-secondary) 0%, var(--bg-primary) 100%);
        border-right: 1px solid var(--card-border);
        box-shadow: 5px 0 25px var(--shadow-color);
        transition: all 0.3s ease;
        position: fixed;
        left: 0;
        top: 0;
        height: 100vh;
        z-index: 1000;
        overflow-y: auto;
    }

    .sidebar-content {
        padding: 0;
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .sidebar-header {
        padding: 30px 25px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        background: rgba(255, 255, 255, 0.05);
    }

    .logo {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .logo-icon {
        width: 40px;
        height: 40px;
        background: linear-gradient(135deg, var(--accent-primary), var(--accent-secondary));
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        color: white;
    }

    .logo-text {
        flex: 1;
    }

    .sidebar-title {
        font-size: 16px;
        font-weight: 700;
        color: var(--text-primary);
        margin-bottom: 2px;
    }

    .sidebar-subtitle {
        font-size: 11px;
        color: var(--text-muted);
        font-weight: 500;
    }

    .sidebar-menu {
        list-style: none;
        padding: 20px 0;
        margin: 0;
        flex: 1;
    }

    .sidebar-item {
        margin-bottom: 5px;
        position: relative;
    }

    .sidebar-link {
        display: flex;
        align-items: center;
        padding: 15px 25px;
        color: var(--text-secondary);
        text-decoration: none;
        transition: all 0.3s ease;
        position: relative;
        border-left: 3px solid transparent;
    }

    .sidebar-link:hover {
        background: rgba(102, 126, 234, 0.1);
        color: var(--text-primary);
        border-left-color: var(--accent-primary);
        transform: translateX(5px);
    }

    .sidebar-link.active {
        background: linear-gradient(90deg, rgba(102, 126, 234, 0.15), transparent);
        color: var(--text-primary);
        border-left-color: var(--accent-primary);
    }

    .sidebar-icon {
        width: 20px;
        margin-right: 15px;
        font-size: 16px;
        text-align: center;
    }

    .sidebar-text {
        flex: 1;
        font-weight: 500;
        font-size: 14px;
    }

    .sidebar-badge {
        background: var(--accent-primary);
        color: white;
        padding: 4px 8px;
        border-radius: 12px;
        font-size: 10px;
        font-weight: 700;
        animation: pulse 2s infinite;
    }

    @keyframes pulse {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.7; }
    }

    .sidebar-footer {
        padding: 20px;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
        background: rgba(255, 255, 255, 0.05);
    }

    .user-profile {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .user-avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--accent-primary), var(--accent-secondary));
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 18px;
    }

    .user-info {
        flex: 1;
    }

    .user-name {
        font-size: 14px;
        font-weight: 600;
        color: var(--text-primary);
        margin-bottom: 2px;
    }

    .user-role {
        font-size: 11px;
        color: var(--text-muted);
        font-weight: 500;
    }
</style>

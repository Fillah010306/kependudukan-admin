<style>
    /* Floating WhatsApp Button */
    .whatsapp-float {
        position: fixed;
        width: 60px;
        height: 60px;
        bottom: 25px;
        right: 25px;
        background: linear-gradient(135deg, #25D366, #128C7E);
        color: white;
        border-radius: 50%;
        text-align: center;
        font-size: 30px;
        box-shadow: 0 8px 25px rgba(37, 211, 102, 0.4);
        z-index: 1000;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        transition: all 0.4s ease;
        border: 2px solid rgba(255, 255, 255, 0.3);
        animation: pulse-whatsapp 2s infinite;
    }

    .whatsapp-float:hover {
        transform: translateY(-5px) scale(1.1);
        box-shadow: 0 15px 35px rgba(37, 211, 102, 0.6);
    }

    .whatsapp-tooltip {
        position: absolute;
        right: 70px;
        top: 50%;
        transform: translateY(-50%);
        background: rgba(0, 0, 0, 0.9);
        color: white;
        padding: 8px 15px;
        border-radius: 8px;
        font-size: 12px;
        font-weight: 600;
        white-space: nowrap;
        opacity: 0;
        pointer-events: none;
        transition: all 0.3s ease;
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .whatsapp-float:hover .whatsapp-tooltip {
        opacity: 1;
        right: 75px;
    }

    @keyframes pulse-whatsapp {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.05); }
    }

    /* Reset & Base Styles */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Inter', 'Segoe UI', sans-serif;
    }

    :root {
        --bg-primary: #0f0f1b;
        --bg-secondary: #1a1a2e;
        --bg-tertiary: #16213e;
        --text-primary: #ffffff;
        --text-secondary: rgba(255, 255, 255, 0.9);
        --text-muted: rgba(255, 255, 255, 0.7);
        --accent-primary: #667eea;
        --accent-secondary: #764ba2;
        --accent-tertiary: #4ecdc4;
        --card-bg: rgba(255, 255, 255, 0.08);
        --card-border: rgba(102, 126, 234, 0.2);
        --shadow-color: rgba(0, 0, 0, 0.3);
        --success: #2ecc71;
        --warning: #f39c12;
        --danger: #e74c3c;
    }

    [data-theme="light"] {
        --bg-primary: #f8fafc;
        --bg-secondary: #e2e8f0;
        --bg-tertiary: #cbd5e1;
        --text-primary: #1e293b;
        --text-secondary: #334155;
        --text-muted: #64748b;
        --accent-primary: #3b82f6;
        --accent-secondary: #8b5cf6;
        --accent-tertiary: #06b6d4;
        --card-bg: rgba(255, 255, 255, 0.95);
        --card-border: rgba(59, 130, 246, 0.2);
        --shadow-color: rgba(0, 0, 0, 0.1);
    }

    body {
        background: linear-gradient(135deg, var(--bg-primary) 0%, var(--bg-secondary) 50%, var(--bg-tertiary) 100%);
        min-height: 100vh;
        color: var(--text-primary);
        position: relative;
        overflow-x: hidden;
        transition: all 0.5s ease;
        line-height: 1.6;
    }

    /* Layout Structure */
    .app-container {
        display: flex;
        min-height: 100vh;
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
        animation: float 6s ease-in-out infinite;
    }

    .shape-1 {
        width: 200px;
        height: 200px;
        top: 10%;
        left: 5%;
        animation-delay: 0s;
    }

    .shape-2 {
        width: 150px;
        height: 150px;
        top: 60%;
        right: 10%;
        animation-delay: 2s;
    }

    .shape-3 {
        width: 100px;
        height: 100px;
        bottom: 20%;
        left: 20%;
        animation-delay: 4s;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0px) rotate(0deg); }
        50% { transform: translateY(-20px) rotate(180deg); }
    }

    /* Cyber Grid */
    .cyber-grid {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, rgba(102, 126, 234, 0.03) 1px, transparent 1px),
                    linear-gradient(180deg, rgba(102, 126, 234, 0.03) 1px, transparent 1px);
        background-size: 50px 50px;
        animation: gridMove 20s linear infinite;
        z-index: -1;
    }

    [data-theme="light"] .cyber-grid {
        background: linear-gradient(90deg, rgba(59, 130, 246, 0.05) 1px, transparent 1px),
                    linear-gradient(180deg, rgba(59, 130, 246, 0.05) 1px, transparent 1px);
    }

    @keyframes gridMove {
        0% { transform: translate(0, 0); }
        100% { transform: translate(50px, 50px); }
    }

    .dashboard-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 20px;
    }

    /* Main Content Area */
    .main-content {
        flex: 1;
        margin-left: 280px;
        padding: 20px;
        transition: all 0.3s ease;
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
        width: 3px;
        height: 3px;
        background: rgba(102, 126, 234, 0.6);
        border-radius: 50%;
        animation: particleFloat 8s linear infinite;
    }

    [data-theme="light"] .particle {
        background: rgba(59, 130, 246, 0.4);
    }

    @keyframes particleFloat {
        0% {
            transform: translateY(100vh) translateX(0) rotate(0deg);
            opacity: 0;
        }
        10% { opacity: 1; }
        90% { opacity: 1; }
        100% {
            transform: translateY(-100px) translateX(100px) rotate(360deg);
            opacity: 0;
        }
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
        .main-content {
            margin-left: 0;
            padding: 15px;
        }
        .content-grid {
            grid-template-columns: 1fr;
        }
        .header {
            flex-direction: column;
            gap: 20px;
            text-align: center;
        }
        .header-actions {
            flex-direction: column;
            width: 100%;
        }
        .stats-grid {
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        }
        .header h1 {
            font-size: 28px;
        }
        .quick-actions {
            grid-template-columns: 1fr 1fr;
        }
        .chart-wrapper {
            height: 250px;
        }
        .dashboard-container {
            padding: 0 15px;
        }
    }

    @media (max-width: 480px) {
        .stats-grid {
            grid-template-columns: 1fr;
        }
        .chart-wrapper {
            height: 200px;
        }
        .chart-container {
            padding: 20px;
        }
        .quick-actions {
            grid-template-columns: 1fr;
        }
    }
</style>

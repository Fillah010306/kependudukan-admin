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
        --gradient-success: linear-gradient(135deg, #4ecdc4 0%, #44a08d 100%);
        --gradient-warning: linear-gradient(135deg, #ffd166 0%, #ff9e66 100%);
        --gradient-danger: linear-gradient(135deg, #ef476f 0%, #ff6b6b 100%);
    }

    body {
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        min-height: 100vh;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .glass-card {
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(10px);
        border-radius: 20px;
        border: 1px solid rgba(255, 255, 255, 0.3);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .header-section {
        background: var(--gradient-primary);
        color: white;
        padding: 30px 0;
        margin-bottom: 30px;
        border-radius: 0 0 30px 30px;
        position: relative;
        overflow: hidden;
    }

    .header-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" fill="%23ffffff" opacity="0.1"><polygon points="1000,0 1000,100 0,100"></polygon></svg>');
        background-size: cover;
    }

    .page-title {
        font-weight: 800;
        font-size: 2.5rem;
        margin-bottom: 0.5rem;
        text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
    }

    .page-subtitle {
        font-size: 1.1rem;
        opacity: 0.9;
        font-weight: 300;
    }

    .btn-neo-primary {
        background: var(--gradient-primary);
        border: none;
        color: white;
        padding: 12px 25px;
        border-radius: 12px;
        font-weight: 600;
        transition: all 0.3s ease;
        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
        position: relative;
        overflow: hidden;
    }

    .btn-neo-primary::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
        transition: left 0.5s ease;
    }

    .btn-neo-primary:hover::before {
        left: 100%;
    }

    .btn-neo-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 30px rgba(102, 126, 234, 0.6);
        color: white;
    }

    .btn-neo-warning {
        background: var(--gradient-warning);
        border: none;
        color: white;
        border-radius: 10px;
        padding: 8px 15px;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(255, 209, 102, 0.4);
    }

    .btn-neo-danger {
        background: var(--gradient-danger);
        border: none;
        color: white;
        border-radius: 10px;
        padding: 8px 15px;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(239, 71, 111, 0.4);
    }

    .btn-neo-warning:hover,
    .btn-neo-danger:hover {
        transform: translateY(-2px);
        color: white;
    }

    .alert-neo-success {
        background: var(--gradient-success);
        color: white;
        border: none;
        border-radius: 15px;
        padding: 20px;
        box-shadow: 0 8px 25px rgba(78, 205, 196, 0.3);
        border-left: 5px solid rgba(255, 255, 255, 0.5);
    }

    .alert-neo-danger {
        background: var(--gradient-danger);
        color: white;
        border: none;
        border-radius: 15px;
        padding: 20px;
        box-shadow: 0 8px 25px rgba(239, 71, 111, 0.3);
        border-left: 5px solid rgba(255, 255, 255, 0.5);
    }

    .table-neo {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        border: none;
    }

    .table-neo thead {
        background: var(--gradient-primary);
        color: white;
    }

    .table-neo thead th {
        border: none;
        padding: 20px 15px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-size: 0.85rem;
    }

    .table-neo tbody tr {
        transition: all 0.3s ease;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    }

    .table-neo tbody tr:hover {
        background: rgba(102, 126, 234, 0.05);
        transform: translateX(5px);
    }

    .table-neo tbody td {
        padding: 18px 15px;
        border: none;
        vertical-align: middle;
        font-weight: 500;
    }

    .badge-gender {
        padding: 6px 12px;
        border-radius: 20px;
        font-weight: 600;
        font-size: 0.75rem;
    }

    .badge-male {
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: white;
    }

    .badge-female {
        background: linear-gradient(135deg, #ff6b6b, #ff8e8e);
        color: white;
    }

    .action-buttons {
        display: flex;
        gap: 8px;
    }

    .empty-state {
        text-align: center;
        padding: 60px 20px;
        color: #6c757d;
    }

    .empty-state i {
        font-size: 4rem;
        margin-bottom: 20px;
        opacity: 0.5;
    }

    .stats-card {
        background: white;
        border-radius: 15px;
        padding: 25px;
        text-align: center;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
        border-left: 5px solid var(--primary-color);
        transition: all 0.3s ease;
    }

    .stats-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
    }

    .stats-number {
        font-size: 2.5rem;
        font-weight: 800;
        background: var(--gradient-primary);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 10px;
    }

    .stats-label {
        color: #6c757d;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-size: 0.85rem;
    }

    @media (max-width: 768px) {
        .page-title {
            font-size: 2rem;
        }

        .action-buttons {
            flex-direction: column;
        }

        .table-neo thead {
            display: none;
        }

        .table-neo tbody tr {
            display: block;
            margin-bottom: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }

        .table-neo tbody td {
            display: block;
            text-align: right;
            padding: 15px;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .table-neo tbody td::before {
            content: attr(data-label);
            float: left;
            font-weight: 600;
            text-transform: uppercase;
            color: var(--primary-color);
        }

        .badge-status {
            padding: 6px 12px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.75rem;
        }

        .badge-alive {
            background: linear-gradient(135deg, #4ecdc4, #44a08d);
            color: white;
        }

        .badge-deceased {
            background: linear-gradient(135deg, #ef476f, #ff6b6b);
            color: white;
        }

        .empty-state i.fa-baby {
            font-size: 4rem;
            margin-bottom: 20px;
            opacity: 0.5;
        }
/* Floating WhatsApp Button */
.whatsapp-float {
    position: fixed;
    width: 60px;
    height: 60px;
    bottom: 40px;
    right: 40px;
    background-color: #25d366;
    color: #FFF;
    border-radius: 50px;
    text-align: center;
    font-size: 30px;
    box-shadow: 0 10px 25px rgba(37, 211, 102, 0.5);
    z-index: 1000;
    transition: all 0.4s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    animation: pulse-whatsapp 2s infinite;
    border: 2px solid white;
}

.whatsapp-float:hover {
    transform: translateY(-5px) scale(1.1);
    box-shadow: 0 15px 35px rgba(37, 211, 102, 0.7);
    animation: none;
}

.whatsapp-tooltip {
    position: absolute;
    right: 70px;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(0, 0, 0, 0.8);
    color: white;
    padding: 8px 15px;
    border-radius: 10px;
    font-size: 14px;
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
    0% {
        box-shadow: 0 0 0 0 rgba(37, 211, 102, 0.7);
    }
    70% {
        box-shadow: 0 0 0 15px rgba(37, 211, 102, 0);
    }
    100% {
        box-shadow: 0 0 0 0 rgba(37, 211, 102, 0);
    }
}

/* WhatsApp Modal */
.whatsapp-modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.7);
    z-index: 2000;
    backdrop-filter: blur(5px);
    animation: fadeIn 0.3s ease;
}

.whatsapp-modal-content {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: var(--card-bg);
    padding: 30px;
    border-radius: 20px;
    width: 90%;
    max-width: 500px;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
    border: 1px solid var(--card-border);
    backdrop-filter: blur(25px);
    animation: slideUp 0.4s ease;
}

.whatsapp-modal-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 25px;
    padding-bottom: 15px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

.whatsapp-modal-title {
    font-size: 24px;
    font-weight: 700;
    background: linear-gradient(135deg, #25d366, #128C7E);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    display: flex;
    align-items: center;
    gap: 10px;
}

.whatsapp-modal-close {
    background: none;
    border: none;
    color: var(--text-muted);
    font-size: 24px;
    cursor: pointer;
    transition: all 0.3s ease;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.whatsapp-modal-close:hover {
    background: rgba(255, 255, 255, 0.1);
    color: var(--text-primary);
    transform: rotate(90deg);
}

.whatsapp-form-group {
    margin-bottom: 20px;
}

.whatsapp-form-label {
    display: block;
    margin-bottom: 8px;
    color: var(--text-secondary);
    font-weight: 600;
    font-size: 14px;
}

.whatsapp-form-input {
    width: 100%;
    padding: 15px;
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid var(--card-border);
    border-radius: 12px;
    color: var(--text-primary);
    font-size: 16px;
    transition: all 0.3s ease;
    backdrop-filter: blur(10px);
}

.whatsapp-form-input:focus {
    outline: none;
    border-color: #25d366;
    box-shadow: 0 0 0 3px rgba(37, 211, 102, 0.2);
    background: rgba(255, 255, 255, 0.15);
}

.whatsapp-form-textarea {
    resize: vertical;
    min-height: 120px;
}

.whatsapp-modal-footer {
    display: flex;
    justify-content: flex-end;
    gap: 15px;
    margin-top: 25px;
}

.whatsapp-btn {
    padding: 12px 25px;
    border: none;
    border-radius: 12px;
    font-weight: 700;
    cursor: pointer;
    transition: all 0.3s ease;
    font-size: 14px;
    display: flex;
    align-items: center;
    gap: 8px;
}

.whatsapp-btn-cancel {
    background: rgba(255, 255, 255, 0.1);
    color: var(--text-primary);
    border: 1px solid var(--card-border);
}

.whatsapp-btn-cancel:hover {
    background: rgba(255, 255, 255, 0.2);
    transform: translateY(-2px);
}

.whatsapp-btn-send {
    background: linear-gradient(135deg, #25d366, #128C7E);
    color: white;
    box-shadow: 0 8px 25px rgba(37, 211, 102, 0.4);
}

.whatsapp-btn-send:hover {
    transform: translateY(-2px);
    box-shadow: 0 12px 30px rgba(37, 211, 102, 0.6);
}

@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

@keyframes slideUp {
    from {
        opacity: 0;
        transform: translate(-50%, -40%);
    }
    to {
        opacity: 1;
        transform: translate(-50%, -50%);
    }
}

/* Responsive Design for WhatsApp Button */
@media (max-width: 768px) {
    .whatsapp-float {
        width: 55px;
        height: 55px;
        bottom: 20px;
        right: 20px;
        font-size: 26px;
    }

    .whatsapp-modal-content {
        width: 95%;
        padding: 20px;
    }

    .whatsapp-modal-title {
        font-size: 20px;
    }
}

@media (max-width: 480px) {
    .whatsapp-float {
        width: 50px;
        height: 50px;
        bottom: 15px;
        right: 15px;
        font-size: 24px;
    }

    .whatsapp-tooltip {
        display: none;
    }
}
    }
</style>

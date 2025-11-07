<script>
    // Theme Toggle Functionality
    const themeToggle = document.getElementById('theme-toggle');
    const currentTheme = localStorage.getItem('theme') || 'dark';

    // Set initial theme
    document.documentElement.setAttribute('data-theme', currentTheme);
    themeToggle.checked = currentTheme === 'light';

    // Theme toggle event
    themeToggle.addEventListener('change', function() {
        if (this.checked) {
            document.documentElement.setAttribute('data-theme', 'light');
            localStorage.setItem('theme', 'light');
        } else {
            document.documentElement.setAttribute('data-theme', 'dark');
            localStorage.setItem('theme', 'dark');
        }
    });

    // Create particles
    function createParticles() {
        const container = document.getElementById('particles');
        for (let i = 0; i < 30; i++) {
            const particle = document.createElement('div');
            particle.className = 'particle';
            particle.style.left = Math.random() * 100 + 'vw';
            particle.style.animationDelay = Math.random() * 8 + 's';
            particle.style.animationDuration = (Math.random() * 6 + 4) + 's';
            container.appendChild(particle);
        }
    }

    // Update waktu real-time
    function updateDateTime() {
        const now = new Date();
        const dateTimeElement = document.getElementById('currentDateTime');

        const options = {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric',
            hour: '2-digit',
            minute: '2-digit'
        };

        const dateTimeString = now.toLocaleDateString('id-ID', options);
        dateTimeElement.textContent = dateTimeString;
    }

    // Initialize charts
    function initializeCharts() {
        // Population Chart
        const populationCtx = document.getElementById('populationChart');
        if (populationCtx) {
            new Chart(populationCtx.getContext('2d'), {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
                    datasets: [{
                        label: 'Jumlah Penduduk',
                        data: [120, 125, 130, 128, 135, 140, 145, 150, 155, 160, 165, 170],
                        borderColor: '#667eea',
                        backgroundColor: 'rgba(102, 126, 234, 0.1)',
                        borderWidth: 3,
                        fill: true,
                        tension: 0.4,
                        pointBackgroundColor: '#667eea',
                        pointBorderColor: '#fff',
                        pointBorderWidth: 2,
                        pointRadius: 5
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: 'rgba(255, 255, 255, 0.1)'
                            }
                        },
                        x: {
                            grid: {
                                color: 'rgba(255, 255, 255, 0.1)'
                            }
                        }
                    }
                }
            });
        }

        // Age Distribution Chart
        const ageCtx = document.getElementById('ageChart');
        if (ageCtx) {
            new Chart(ageCtx.getContext('2d'), {
                type: 'bar',
                data: {
                    labels: ['0-17', '18-35', '36-55', '55+'],
                    datasets: [{
                        label: 'Jumlah Penduduk',
                        data: [45, 85, 60, 30],
                        backgroundColor: [
                            'rgba(102, 126, 234, 0.8)',
                            'rgba(118, 75, 162, 0.8)',
                            'rgba(78, 205, 196, 0.8)',
                            'rgba(239, 71, 111, 0.8)'
                        ],
                        borderColor: [
                            '#667eea',
                            '#764ba2',
                            '#4ecdc4',
                            '#ef476f'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: 'rgba(255, 255, 255, 0.1)'
                            }
                        },
                        x: {
                            grid: {
                                color: 'rgba(255, 255, 255, 0.1)'
                            }
                        }
                    }
                }
            });
        }
    }

    // Add interactive effects
    document.querySelectorAll('.stat-card').forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-8px) scale(1.02)';
        });

        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
        });
    });

    // Initialize effects
    createParticles();
    initializeCharts();

    // Update waktu setiap detik
    setInterval(updateDateTime, 1000);
    updateDateTime();

    // WhatsApp Button Configuration
    function configureWhatsAppButton() {
        const whatsappButton = document.getElementById('whatsappButton');
        const adminPhone = '6281234567890';
        const defaultMessage = 'Halo Admin, saya ingin bertanya tentang sistem kependudukan';
        const encodedMessage = encodeURIComponent(defaultMessage);
        whatsappButton.href = `https://wa.me/${adminPhone}?text=${encodedMessage}`;
    }

    configureWhatsAppButton();

    // Sidebar active state management
    document.querySelectorAll('.sidebar-link').forEach(link => {
        link.addEventListener('click', function() {
            document.querySelectorAll('.sidebar-link').forEach(l => l.classList.remove('active'));
            this.classList.add('active');
        });
    });
</script>

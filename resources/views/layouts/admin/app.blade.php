<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Kependudukan - Neo System</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <!-- Include Styles -->
    @include('layouts.admin.styles')
</head>

<body>
    <!-- Background Animation -->
    <div class="bg-animation">
        <div class="floating-shape shape-1"></div>
        <div class="floating-shape shape-2"></div>
        <div class="floating-shape shape-3"></div>
    </div>

    <!-- Cyber Grid -->
    <div class="cyber-grid"></div>

    <!-- Particles -->
    <div class="particles" id="particles"></div>

    <div class="app-container">
        <!-- Sidebar -->
        @include('layouts.admin.sidebar')

        <!-- Main Content -->
        <div class="main-content">
            <div class="dashboard-container">
                <!-- Header -->
                @include('layouts.admin.header')

                <!-- Main Content Section -->
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Floating WhatsApp Button -->
    <a href="https://wa.me/6281234567890?text=Halo%20Admin%2C%20saya%20ingin%20bertanya%20tentang%20sistem%20kependudukan"
        class="whatsapp-float" target="_blank" id="whatsappButton">
        <i class="fab fa-whatsapp"></i>
        <div class="whatsapp-tooltip">Hubungi Admin</div>
    </a>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Include Footer Scripts -->
    @include('layouts.admin.footer')
</body>
</html>

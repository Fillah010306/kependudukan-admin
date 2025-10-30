<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - NEO SYSTEM</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        /* CSS dari halaman register sebelumnya */
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

        /* Tambahkan semua style dari halaman register sebelumnya */
        .cyber-grid { /* ... */ }
        .particle { /* ... */ }
        .register-container { /* ... */ }
        /* Dan seterusnya... */
    </style>
</head>
<body>
    @yield('content')
</body>
</html>
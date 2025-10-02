<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin Kependudukan</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background: #f5f7fa;
            color: #333;
        }

        header {
            background: linear-gradient(to right, #2980b9, #6dd5fa);
            color: white;
            padding: 30px;
            text-align: center;
            box-shadow: 0 2px 6px rgba(0,0,0,0.2);
        }

        .container {
            max-width: 1000px;
            margin: 40px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        h2 {
            color: #2980b9;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            padding: 14px 18px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #3498db;
            color: white;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .footer {
            text-align: center;
            padding: 20px;
            color: #777;
            font-size: 14px;
            margin-top: 50px;
        }

        .login-info {
            margin-top: 10px;
            font-size: 16px;
        }

    </style>
</head>
<body>

    <header>
        <h1>Selamat Datang, {{ $admin_name }}</h1>
        <p class="login-info">Login terakhir: {{ $last_login }}</p>
    </header>

    <div class="container">
        <h2>Daftar Penduduk</h2>
        <table>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Usia</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($penduduk as $orang)
                    <tr>
                        <td>{{ $orang['nama'] }}</td>
                        <td>{{ $orang['usia'] }} tahun</td>
                        <td>{{ $orang['status'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="footer">
        &copy; {{ date('Y') }} Sistem Informasi Kependudukan. All rights reserved.
    </div>

</body>
</html>

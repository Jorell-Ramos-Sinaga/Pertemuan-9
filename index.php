<?php
include 'config.php';

// Hitung jumlah siswa yang sudah mendaftar
$query = "SELECT COUNT(*) as total FROM calon_siswa";
$result = mysqli_query($koneksi, $query);
$row = mysqli_fetch_assoc($result);
$total_siswa = $row['total'];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Siswa Baru - SMK Coding</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #2563eb;
            --secondary-color: #1e40af;
            --success-color: #16a34a;
            --danger-color: #dc2626;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .navbar {
            background-color: var(--primary-color);
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
        }

        .hero-section {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            padding: 60px 30px;
            margin: 40px auto;
            max-width: 900px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.2);
            text-align: center;
        }

        .hero-section h1 {
            color: var(--secondary-color);
            font-weight: 700;
            margin-bottom: 10px;
            font-size: 2.5rem;
        }

        .hero-section p {
            color: #666;
            font-size: 1.1rem;
            margin-bottom: 30px;
        }

        .menu-buttons {
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
            margin: 40px 0;
        }

        .menu-btn {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border: none;
            color: white;
            padding: 15px 40px;
            border-radius: 50px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 4px 15px rgba(37, 99, 235, 0.3);
        }

        .menu-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 25px rgba(37, 99, 235, 0.5);
            color: white;
            text-decoration: none;
        }

        .stats-card {
            background: white;
            border-radius: 10px;
            padding: 30px;
            margin: 20px auto;
            text-align: center;
            max-width: 400px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }

        .stats-card h3 {
            color: #666;
            font-size: 1rem;
            margin-bottom: 15px;
        }

        .stats-number {
            color: var(--primary-color);
            font-size: 3rem;
            font-weight: 700;
        }

        .footer {
            text-align: center;
            color: white;
            padding: 20px;
            margin-top: 40px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-dark">
        <div class="container-fluid">
            <span class="navbar-brand">
                <i class="fas fa-graduation-cap me-2"></i>SMK Coding
            </span>
        </div>
    </nav>

    <div class="container">
        <div class="hero-section">
            <h1>Pendaftaran Siswa Baru</h1>
            <p>Sistem Pendaftaran Online SMK Coding</p>
            
            <div class="menu-buttons">
                <a href="form-daftar.php" class="menu-btn">
                    <i class="fas fa-user-plus"></i> Daftar Baru
                </a>
                <a href="list-siswa.php" class="menu-btn" style="background: linear-gradient(135deg, var(--success-color), #15803d);">
                    <i class="fas fa-list"></i> Lihat Pendaftaran
                </a>
            </div>

            <div class="stats-card">
                <h3>Jumlah Siswa yang Telah Mendaftar</h3>
                <div class="stats-number"><?php echo $total_siswa; ?></div>
            </div>
        </div>
    </div>

    <div class="footer">
        <p>&copy; 2025 SMK Coding. Semua hak dilindungi.</p>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>

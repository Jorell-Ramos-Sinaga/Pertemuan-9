<?php
include 'config.php';

// Ambil data dari database
$query = "SELECT * FROM calon_siswa ORDER BY id DESC";
$result = mysqli_query($koneksi, $query);
$total_siswa = mysqli_num_rows($result);

$status = isset($_GET['status']) ? $_GET['status'] : '';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pendaftaran - SMK Coding</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px 0;
        }

        .navbar {
            background-color: #2563eb;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
        }

        .page-container {
            background: white;
            border-radius: 15px;
            padding: 30px;
            max-width: 1200px;
            margin: 30px auto;
            box-shadow: 0 10px 40px rgba(0,0,0,0.2);
        }

        .page-container h2 {
            color: #1e40af;
            margin-bottom: 20px;
            font-weight: 700;
        }

        .btn-back {
            background: #6b7280;
            border: none;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }

        .btn-back:hover {
            background: #4b5563;
            color: white;
            text-decoration: none;
        }

        .table {
            border-collapse: collapse;
            margin-top: 20px;
        }

        .table thead th {
            background-color: #2563eb;
            color: white;
            font-weight: 600;
            border: none;
            padding: 15px;
            text-align: left;
        }

        .table tbody td {
            padding: 12px 15px;
            border-bottom: 1px solid #e5e7eb;
        }

        .table tbody tr:hover {
            background-color: #f3f4f6;
        }

        .btn-edit {
            background: #3b82f6;
            color: white;
            padding: 6px 12px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 0.9rem;
            display: inline-block;
            margin-right: 5px;
            transition: all 0.3s ease;
        }

        .btn-edit:hover {
            background: #2563eb;
            color: white;
            text-decoration: none;
        }

        .btn-hapus {
            background: #ef4444;
            color: white;
            padding: 6px 12px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 0.9rem;
            display: inline-block;
            transition: all 0.3s ease;
            cursor: pointer;
            border: none;
        }

        .btn-hapus:hover {
            background: #dc2626;
            color: white;
            text-decoration: none;
        }

        .total-row {
            background-color: #f0f9ff;
            font-weight: 600;
            color: #1e40af;
            margin-top: 20px;
            padding: 15px;
            border-radius: 8px;
            text-align: center;
        }

        .alert-sukses {
            background-color: #d1fae5;
            color: #065f46;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            border-left: 4px solid #10b981;
        }

        .table-responsive-custom {
            overflow-x: auto;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-dark" style="background-color: #2563eb;">
        <div class="container-fluid">
            <span class="navbar-brand">
                <i class="fas fa-graduation-cap me-2"></i>SMK Coding
            </span>
        </div>
    </nav>

    <div class="container">
        <div class="page-container">
            <a href="index.php" class="btn-back">
                <i class="fas fa-arrow-left me-2"></i>Kembali ke Beranda
            </a>

            <?php if($status == 'sukses'): ?>
                <div class="alert-sukses">
                    <i class="fas fa-check-circle me-2"></i>Pendaftaran berhasil disimpan!
                </div>
            <?php endif; ?>

            <h2><i class="fas fa-list-ul me-2"></i>Siswa yang Sudah Mendaftar</h2>

            <?php if($total_siswa > 0): ?>
                <div class="table-responsive-custom">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width: 5%;">No</th>
                                <th style="width: 20%;">Nama</th>
                                <th style="width: 20%;">Alamat</th>
                                <th style="width: 12%;">Jenis Kelamin</th>
                                <th style="width: 12%;">Agama</th>
                                <th style="width: 18%;">Sekolah Asal</th>
                                <th style="width: 13%;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            while($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>".$no."</td>";
                                echo "<td>".$row['nama']."</td>";
                                echo "<td>".$row['alamat']."</td>";
                                echo "<td>".$row['jenis_kelamin']."</td>";
                                echo "<td>".$row['agama']."</td>";
                                echo "<td>".$row['sekolah_asal']."</td>";
                                echo "<td>";
                                echo "<a href='proses-edit.php?id=".$row['id']."' class='btn-edit'><i class='fas fa-edit'></i> Edit</a>";
                                echo "<button onclick=\"if(confirm('Yakin hapus?')) location='hapus.php?id=".$row['id']."'\" class='btn-hapus'><i class='fas fa-trash'></i> Hapus</button>";
                                echo "</td>";
                                echo "</tr>";
                                $no++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

                <div class="total-row">
                    <i class="fas fa-users me-2"></i>Total Siswa: <strong><?php echo $total_siswa; ?></strong>
                </div>
            <?php else: ?>
                <div style="text-align: center; padding: 40px;">
                    <i class="fas fa-inbox" style="font-size: 3rem; color: #ccc; display: block; margin-bottom: 20px;"></i>
                    <p style="color: #999; font-size: 1.1rem;">Belum ada siswa yang mendaftar</p>
                    <a href="form-daftar.php" class="btn btn-primary" style="margin-top: 20px;">
                        <i class="fas fa-user-plus me-2"></i>Daftar Sekarang
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
include 'config.php';

// Validasi input
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);
    $jenis_kelamin = mysqli_real_escape_string($koneksi, $_POST['jenis_kelamin']);
    $agama = mysqli_real_escape_string($koneksi, $_POST['agama']);
    $sekolah_asal = mysqli_real_escape_string($koneksi, $_POST['sekolah_asal']);

    // Validasi tidak ada field kosong
    if($nama != '' && $alamat != '' && $jenis_kelamin != '' && $agama != '' && $sekolah_asal != '') {
        // Insert data ke database
        $query = "INSERT INTO calon_siswa (nama, alamat, jenis_kelamin, agama, sekolah_asal) 
                  VALUES ('$nama', '$alamat', '$jenis_kelamin', '$agama', '$sekolah_asal')";
        
        if(mysqli_query($koneksi, $query)) {
            // Redirect ke halaman sukses
            header('Location: list-siswa.php?status=sukses');
            exit;
        } else {
            $error = "Error: " . mysqli_error($koneksi);
        }
    } else {
        $error = "Semua field harus diisi!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proses Pendaftaran - SMK Coding</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .alert-container {
            background: white;
            border-radius: 15px;
            padding: 30px;
            max-width: 500px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.2);
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="alert-container">
        <?php if(isset($error)): ?>
            <div class="alert alert-danger" role="alert">
                <i class="fas fa-exclamation-circle me-2"></i><?php echo $error; ?>
            </div>
            <a href="form-daftar.php" class="btn btn-primary">
                <i class="fas fa-arrow-left me-2"></i>Kembali
            </a>
        <?php endif; ?>
    </div>
</body>
</html>

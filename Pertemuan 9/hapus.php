<?php
include 'config.php';

$id = isset($_GET['id']) ? $_GET['id'] : '';

if($id != '') {
    $query = "DELETE FROM calon_siswa WHERE id = $id";
    if(mysqli_query($koneksi, $query)) {
        header('Location: list-siswa.php?status=hapus');
        exit;
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
} else {
    header('Location: list-siswa.php');
}
?>

<?php
include '../koneksi.php';

$judul = $_POST['judul_program'];
$deskripsi = $_POST['deskripsi'];

$query = mysqli_query($conn, "INSERT INTO program_latihan (judul_program, deskripsi) VALUES ('$judul', '$deskripsi')");

if($query) {
    header("Location: kel_program.php");
} else {
    echo "Gagal menyimpan data";
}
?>
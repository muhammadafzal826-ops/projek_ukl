<?php
include '../koneksi.php';

$judul = $_POST['judul'];
$isi = $_POST['isi'];


$query = mysqli_query($conn, "INSERT INTO artikel (judul, isi) VALUES ('$judul', '$isi')");

if($query) {
    header("Location: kel_artikel.php");
} else {
    echo "Gagal simpan data: " . mysqli_error($conn);
}
?>
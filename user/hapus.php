<?php
include '../koneksi.php'; 

$id = $_GET['id'];

$query = mysqli_query($conn, "DELETE FROM workouts WHERE id = '$id'");

if($query){
    echo "<script>
            alert('Data aktivitas berhasil dihapus!');
            window.location='riwayat.php';
          </script>";
} else {
    echo "<script>
            alert('Gagal menghapus data: " . mysqli_error($conn) . "');
            window.location='riwayat.php';
          </script>";
}
?>
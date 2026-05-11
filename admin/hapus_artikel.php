<?php
include '../koneksi.php'; 

$id = $_GET['id'];

$query = mysqli_query($conn, "DELETE FROM artikel WHERE id = '$id'");

if($query){
    echo "<script>
            alert('Data aktivitas berhasil dihapus!');
            window.location='kel_artikel.php';
          </script>";
} else {
    echo "<script>
            alert('Gagal menghapus data: " . mysqli_error($conn) . "');
            window.location='kel_artikel.php';
          </script>";
}
?>